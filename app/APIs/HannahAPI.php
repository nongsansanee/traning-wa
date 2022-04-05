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
    public function getAdmission($an)
    {
        $headers = ['app' => config('app.HAN_API_SERVICE_SECRET'), 'token' => config('app.HAN_API_SERVICE_TOKEN')];
        $options = ['timeout' => 8.0, 'verify' => false];
        $url = config('app.HAN_API_SERVICE_URL').'admission';
        $response = Http::withHeaders($headers)->withOptions($options)
                         ->post($url, ['an' => $an]);
        
        $data = json_decode($response->getBody(),true);
       
        /*  error http  */
        if($response->status()!=200){
            return ['reply_code' => '1', 'reply_text' => 'request failed','found'=>'false'];
        }
        /*  not found AN */
        if(!$data['found']) {
            return ['reply_code' => '1', 'reply_text' => 'ไม่พบข้อมูลของเลข AN ที่ระบุมา','found'=>'false'];
        }

         /*   found AN  */
        if (strlen($data['dob']) != 0) {
            $dob = Carbon::createFromFormat('Y-m-d', $data['dob']);
            $dateadmit = Carbon::createFromFormat('Y-m-d H:i:s', $data['admitted_at']);
            $data['age'] = $dateadmit->diffInYears($dob);
        } else {
            $data['age'] = 'ไม่พบข้อมูลวันเกิด';
        }
        

        if($data['gender']=='male')
        {
            $data['gender']=1;
        }else{
            $data['gender']=2;
        }

        /******show thai date ******/
        $split_datetime_admit = explode(' ', $data['admitted_at']);
        $split_date_admit = explode('-', $split_datetime_admit[0]);
        $year = (int) $split_date_admit[0] + 543;
        $thaimonth = ['', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
        $date_admit = $split_date_admit[2].'  '.$thaimonth[(int) $split_date_admit[1]].' '.$year;


        $data['date_admit'] = $date_admit.' '.$split_datetime_admit[1];
        $data['date_admit_save'] = $data['admitted_at']; 
        $data['reply_code']=0;
      
        return $data;

     
    }

   
}