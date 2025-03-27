<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Middleware\MiddlewareAware;

abstract class Controller
{
    use AuthorizesRequests, DispatchesJobs;
    // use MiddlewareAware;
}
