<?php

namespace App\Http\Controllers;

use App\Http\Services\smsGateways\Whysms;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function test(){
        
        app(Whysms::class)->sendSms('01127332150', 'بتفتحي ليه الواتس ومش بتكلمني؟');

    }
}