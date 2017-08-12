<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use Helpers;

    public function __construct()
    {
        \Iugu::setApiKey( env('IUGU_KEY') );
    }

    public function helloWorld()
    {
      return [
          'project' => env('API_NAME'),
          'company' => env('API_COMPANY'),
          'version' => env('API_VERSION'),
          'formart' => env('API_DEFAULT_FORMAT'),
          'timezone' => date_default_timezone_get(),
          ];
    }
}
