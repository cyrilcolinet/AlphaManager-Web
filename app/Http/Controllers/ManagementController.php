<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ManagementController extends Controller {

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
            $data = array_add($data, $systemName, $array);
        }

        return view("management.systems.list", compact("data"));
    }

    public function manageSystemAction($system) {
        if($system == "" || empty($system) || is_null($system))
            throw new NotFoundHttpException();

        return "fraise";
    }

    public function manageMapAction($system, $map) {
        if($system == "" || empty($system) || is_null($system))
            throw new NotFoundHttpException();

        if($map == "" || empty($map) || is_null($map))
            throw new NotFoundHttpException();

        return "$system -> $map";
    }

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