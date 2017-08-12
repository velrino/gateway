<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class AppController extends BaseController
{
    /**
     * Return the Eloquent model that will be used
     * to model the JSON API resources.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getDataModel()
    {
        return new Payment();
    }

    function payment(Request $request)
    {
      $makePayment = $this->getDataModel()->makePayment( $request->input() );
      return response()->json(['status' => True], 201);
    }
}
