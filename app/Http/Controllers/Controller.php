<?php

namespace BoardSoc\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs as DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

    use DispatchesCommands, ValidatesRequests;

}
