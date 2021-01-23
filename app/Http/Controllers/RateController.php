<?php

namespace App\Http\Controllers;

use App\Http\Resources\RateResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RateController extends Controller
{
    public function index () : RateResource{
       $base =  \request('base');
        $currency =  \request('currency');

        $data = HTTP::get('https://api.exchangeratesapi.io/latest?base='.$base.'&symbols='.$currency);

//        return $data->getStatusCode();$



    return new RateResource($data->json());
    }
}
