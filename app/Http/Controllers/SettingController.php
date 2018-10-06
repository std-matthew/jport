<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingsPost;

use App\Helpers;

use App\Setting;

class SettingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $settings = Setting::getContent();
        
        return view('backend.settings.show', [ 
            'settings' => $settings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsPost $request)
    {
        $user = \Auth::user();
        $vars = $request->except(['og_image', 'favicon']);

        $page = Setting::getContent();

        $vars = Helpers::storeUserImage($page, $request, $vars, 'og_image');
        $vars = Helpers::storeUserImage($page, $request, $vars, 'favicon');

        $page->update($vars);

        Helpers::flash('You have successfully updated your settings');

        return redirect()->back();
    }
}
