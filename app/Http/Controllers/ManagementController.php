<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ManagementController
 * @package App\Http\Controllers
 */
class ManagementController extends Controller {

    /**
     * Display the list of systems.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function systemsListAction() {
        $data = array();
        $connector = Redis::connection();
        $systems = $connector->keys("alphamanager:_config:systems:*");

        foreach ($systems as $system) {
            $array = $connector->hgetall($system);
            $systemName = $connector->hget($system, "real-name");
            $array['_name'] = str_replace('alphamanager:_config:systems:', '', $system);

            // Traitement des maps
            $maps = explode(",", $array['maps']);
            $loop = 0;

            foreach ($maps as $map) {
                $maps[$loop] = '<a href="' . route("management.maps.manage", [$array['_name'], $map]) . '" data-toggle="tooltip" data-placement="top" title="Gérer la map ' . ucfirst($map) . ' du système ' . $systemName . '.">' . $map . '</a>';
                $loop++;
            }

            $array['maps'] = join(", ", $maps);

            // Traitement des plugins
            $plugins = explode(",", $array['plugins']);
            $plugins[count($plugins)] = "AlphasiaManagerBukkit";
            $array['plugins'] = join(", ", $plugins);

            $array['local'] = ($array['local'] == "true" ? true : false);
            $array['multi-map'] = ($array['multi-map'] == "true" ? true : false);
            $data = array_add($data, $systemName, $array);
        }

        return view("management.systems.list", compact("data"));
    }

    /**
     * Add system to configuration (get).
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addSystemAction() {
        $data = array();
        $connector = Redis::connection();
        $systems = $connector->keys("alphamanager:_config:systems:*");
        $plugList = join(", ", $this->getAvailablePlugins());

        foreach ($systems as $system) {
            $array = $connector->hgetall($system);
            $systemName = $connector->hget($system, "real-name");
            $array['_name'] = str_replace('alphamanager:_config:systems:', '', $system);

            // Traitement des maps
            $maps = explode(",", $array['maps']);
            $array['maps'] = '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="' . join(", ", $maps) . '">Voir&nbsp;les&nbsp;maps...</a>';

            // Traitement des plugins
            $plugins = explode(",", $array['plugins']);
            $plugins[count($plugins)] = "AlphasiaManagerBukkit";
            $array['plugins'] = '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="' . join(", ", $plugins) . '">Voir&nbsp;les&nbsp;plugins...</a>';

            $array['multi-map'] = ($array['multi-map'] == "true" ? true : false);
            $data = array_add($data, $systemName, $array);
        }

        return view("management.systems.add", compact("data", "plugList"));
    }

    /**
     * Add system to configuration (post).
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function addSystemPost(Request $request) {
        if($request->isMethod("POST")) {
            $data = Input::all();
            $plugList = $this->getAvailablePlugins();
            $data['real-name'] = $data['name'];
            $data['name'] = htmlspecialchars(strtolower(str_replace(" ", "", trim($data['name']))));

            if(!preg_match('#^\D+$#', $data['name'])) {
                Session::flash("error", "Le nom du système ne doit contenir que des lettres.");
                return redirect()->route("management.systems.add")->withInput();
            }

            $data['plugins'] = str_replace(" ", "", $data['plugins']);
            $data['plugins'] = explode(",", $data['plugins']);

            foreach($data['plugins'] as $plugin) {
                if(!in_array($plugin, $plugList, true)) {
                    Session::flash("error", "Le plugin " . $plugin . " n'est pas un plugin enregistré. <br />S'il n'a pas été ajouté automatiquement à la liste, ajoutez-le via le panel (superuser only).");
                    return redirect()->route("management.systems.add")->withInput();
                }
            }

            $data['plugins'] = join(",", $data['plugins']);
            $data['maps'] = str_replace(" ", "", $data['maps']);
            $data['maps'] = explode(",", $data['maps']);
            $data['maps'] = join(",", $data['maps']);
            $data['local'] = ($data['local'] == "on") ? "false" : "true";

            // Database implementation
            $redisKey = "alphamanager:_config:systems:" . $data['name'];
            $connector = Redis::connection();

            foreach($data as $key => $value) {
                if($key != "_token" && $key != "name")
                    $connector->hset($redisKey, $key, $value);
            }

            Session::flash("success", "Le système <b>" . $data['real-name'] . "</b> a été créé avec succès !<br />Il ne reste plus qu'à <a href=\"" . route("management.maps.add", [$data['name']]) . "\">créer les maps du système</a> !");
            return redirect()->route("management.systems.add");
        } else {
            return redirect()->route("management.systems.add");
        }
    }

    /**
     * Manage system parameters and maps.
     *
     * @param $system
     * @return string
     */
    public function manageSystemAction($system) {
        if($system == "" || empty($system) || is_null($system))
            throw new NotFoundHttpException();

        $connector = Redis::connection();
        $keys = $connector->keys("alphamanager:_config:maps:" . $system . ":*");
        $infos = $connector->hgetall("alphamanager:_config:systems:" . $system);
        $maps = array();

        foreach($keys as $key) {
            $keyResult = $connector->hgetall($key);
            $keyResult['startup-mode'] = strtoupper(trim($keyResult['startup-mode']));
            $maps[$keyResult['name']] = $keyResult;
        }

        return view("management.systems.manage", compact("maps", "infos"));
    }

    /**
     * Manage map of a system configuration.
     *
     * @param $system
     * @param $map
     * @return string
     */
    public function manageMapAction($system, $map) {
        if($system == "" || empty($system) || is_null($system))
            throw new NotFoundHttpException();

        if($map == "" || empty($map) || is_null($map))
            throw new NotFoundHttpException();

        return "$system -> $map";
    }

    /**
     * Create a new map configuration for a system.
     *
     * @param $system
     * @return string
     */
    public function addSystemMapAction($system) {
        return "create map system $system";
    }

    /**
     * Delete system action (confirm).
     *
     * @param $system
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageDeleteSystemAction($system) {
        if($system == "" || empty($system) || is_null($system))
            throw new NotFoundHttpException();

        $connector = Redis::connection();
        $key = "alphamanager:_webmanager:confirm:" . strtolower(Auth::user()->name);

        if($connector->exists($key)) {
            $error = true;
            $data = $connector->hgetall($key);
            $timeout = $connector->ttl($key);
            return view("management.systems.delete", compact("error", "data", "timeout", "system"));
        } else {
            $hash = Hash::make(Auth::user()->name . random_int(1, 99) . $system);
            $error = false;

            $connector->hset($key, "user", Auth::user()->name);
            $connector->hset($key, "hash", $hash);
            $connector->hset($key, "action", "delete system " . $system);
            $connector->expire($key, 5 * 60);

            return view("management.systems.delete", compact("error", "hash", "system"));
        }
    }

}