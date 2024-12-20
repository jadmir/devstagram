<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseControlller;

class Controller extends BaseControlller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
