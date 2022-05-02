<?php

namespace App\APIs;

use Illuminate\Support\Facades\Http;
use App\Models\Ward;
use Carbon\Carbon;

class HannahAPI 
{

    public function getUser($login)
    {

    }
    public function authenticate($orgId, $password)
    {
        $headers = ['app' => config('app.HAN_API_SERVICE_SECRET'), 'token' => config('app.HAN_API_SERVICE_TOKEN')];
        $options = ['timeout' => 8.0, 'verify' => false];
        $url = config('app.HAN_API_SERVICE_URL').'auth';
        $response = Http::withHeaders($headers)->withOptions($options)
                         ->post($url, ['login' => $orgId, 'password' => $password]);
        
        $data = json_decode($response->getBody(),true);
       
        if($response->status()!=200){
            return ['reply_code' => '1', 'reply_text' => 'request failed','found'=>'false'];
        }
        if(!$data['ok']) {
            return ['reply_code' => '1', 'reply_text' => 'Username or Password is incorrect','found'=>'false'];
        }
        if(!$data['found']) {
            return ['reply_code' => '1', 'reply_text' => $data['body'],'found'=>'false'];
        }
        $data['name'] = $data['full_name'];
        $data['remark'] = $data['office_name']." ".$data['department_name'];
        $data['name_en'] = $data['full_name_en'];
        $data['reply_code'] = 0;
     
       
        return $data;
    
    }

   
}