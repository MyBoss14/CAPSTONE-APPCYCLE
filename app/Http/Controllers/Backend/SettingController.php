<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\PusherSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $generalSettings = GeneralSetting::first();
        $emailSettings = EmailConfiguration::first();
        $pusherSetting = PusherSetting::first();
        return view('admin.setting.index', compact('generalSettings','emailSettings', 'pusherSetting'));
    }

    public function generalSettingUpdate(Request $request){
        $request->validate([

            'site_name'=>['required','max:200'],
            'layout'=>['required','max:200'],
            'contact_email'=>['required','email'],
            'currency_name'=>['required','max:200'],
            'currency_icon'=>['required', 'max:200'],
            'time_zone'=>['required','max:200'],

        ]);

        GeneralSetting::updateOrCreate(
            ['id'=>1],
            [
                'site_name'=>$request->site_name,
                'layout'=>$request->layout,
                'contact_email'=>$request->contact_email,
                'contact_phone'=>$request->contact_phone,
                'contact_address'=>$request->contact_address,
                'map'=>$request->map,
                'currency_name'=>$request->currency_name,
                'currency_icon'=>$request->currency_icon,
                'time_zone'=>$request->time_zone
            ]
            );

            toastr('Updated succesfully');

            return redirect()->back();
    }

    public function emailConfigSettingUpdate(Request $request)
    {
        $request->validate([
            'email'=>['required', 'email'],
            'host'=>['required','max:200'],
            'username'=>['required','max:200'],
            'password'=>['required','max:200'],
            'port'=>['required','max:200'],
            'encryption'=>['required','max:200']
        ]);

        EmailConfiguration::updateOrCreate(
            ['id'=>1],
            [
                'email'=>$request->email,
                'host'=>$request->host,
                'username'=>$request->username,
                'password'=>$request->password,
                'port'=>$request->port,
                'encryption'=>$request->encryption,
            ]

            );
            toastr('Update Successfully','success', 'Success');

            return redirect()->back();
    }

    // Message API , PUSHER

    function pusherSettingUpdate(Request $request) : RedirectResponse {



        $validatedData =$request->validate(
            [
                'pusher_app_id'=>['required'],
                'pusher_key'=>['required'],
                'pusher_secret'=>['required'],
                'pusher_cluster'=>['required'],
            ]
            );



            PusherSetting::updateOrCreate(
                ['id'=>1],

                    $validatedData

            );

            toastr('Update Sucess!' ,'success', 'Success');





        return redirect()->back();

    }
}
