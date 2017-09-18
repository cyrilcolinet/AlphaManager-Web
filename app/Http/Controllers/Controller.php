<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redis;

class Controller extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     * Seuls les utilisateurs authorisés ont l'accès
     */
    public function __construct() {
        $this->middleware("auth");
    }

    public function getAvailablePlugins() {
        return Redis::lrange("alphamanager:_config:plugins", 0, -1);
    }

    public function dashboardAction() {
        return view("dashboard");
    }

}
