<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Attributes as OA;

define("WEB_APP_NAME", config('app.name'));
#[OA\Info(version: "1.0.0", title: WEB_APP_NAME . " Documentation")]
#[OA\Server(url: "/api", description: WEB_APP_NAME)]
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
