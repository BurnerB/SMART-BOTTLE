<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\settings;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $logo_light = settings::where('name', 'logo_light')->first();
            $logo_dark = settings::where('name', 'logo_dark')->first();
            $favicon = settings::where('name', 'favicon')->first();
            $email = settings::where('name', 'email')->first();
            $mobile = settings::where('name', 'mobile')->first();
            $whatsapp = settings::where('name', 'whatsapp')->first();
            $facebook = settings::where('name', 'facebook')->first();
            $linkedin = settings::where('name', 'linkedin')->first();
            $github = settings::where('name', 'github')->first();
            $custom_css = settings::where('name', 'custom_css')->first();
            $footer_text = settings::where('name', 'footer_text')->first();
            $address = settings::where('name', 'address')->first();
            $map = settings::where('name', 'map')->first();

            return view('admin.settings.setting',compact('logo_dark','footer_text','facebook','logo_light','favicon','email','whatsapp','linkedin','mobile','github','custom_css','address','map'));



     }

    public function store(Request $request)
    {

        $this->validate($request,[
            'logo_light' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'logo_dark' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'logo_favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        if($request->hasFile('logo_light'))
        {
            $logo_light = settings::where('name','logo_light')->first();

            $current_image = 'storage/files/settings/'.substr($logo_light->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $logo_light->value = $request->logo_light->store('public/files/settings');
            $logo_light->save();
        }

        if($request->hasFile('logo_dark'))
        {
            $logo_dark = settings::where('name','logo_dark')->first();

            $current_image = 'storage/files/settings/'.substr($logo_dark->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $logo_dark->value = $request->logo_dark->store('public/files/settings');
            $logo_dark->save();
        }

        if($request->hasFile('favicon'))
        {
            $favicon = settings::where('name','favicon')->first();

            $current_image = 'storage/files/settings/'.substr($favicon->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $favicon->value = $request->favicon->store('public/files/settings');
            $favicon->save();
        }

        $email = settings::where('name','email')->first();
        $email->value = $request->email;
        $email->save();

        $mobile = settings::where('name','mobile')->first();
        $mobile->value = $request->mobile;
        $mobile->save();

        $whatsapp = settings::where('name','whatsapp')->first();
        $whatsapp->value = $request->whatsapp;
        $whatsapp->save();

        $facebook = settings::where('name','facebook')->first();
        $facebook->value = $request->facebook;
        $facebook->save();

        $linkedin = settings::where('name','linkedin')->first();
        $linkedin->value = $request->linkedin;
        $linkedin->save();

        $github = settings::where('name','github')->first();
        $github->value = $request->github;
        $github->save();

        $custom_css = settings::where('name','custom_css')->first();
        $custom_css->value = $request->custom_css;
        $custom_css->save();

        $footer_text = settings::where('name','footer_text')->first();
        $footer_text->value = $request->footer_text;
        $footer_text->save();

        $address = settings::where('name','address')->first();
        $address->value = $request->address;
        $address->save();

        $map = settings::where('name','map')->first();
        $map->value = $request->map;
        $map->save();

        return redirect()->back()->with('success','Settings updated successfully');
    }
}
