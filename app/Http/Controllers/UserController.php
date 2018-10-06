<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserPost;
use App\Http\Requests\UpdatePasswordPost;

use App\Helpers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('backend.dashboard.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserIntro  $userIntro
     * @return \Illuminate\Http\Response
     */
    public function update(UserPost $request)
    {
    	$user = \Auth::user();
        $vars = $request->except(['avatar_path', 'background_path']);
        $vars = Helpers::storeUserImage($user, $request, $vars, 'avatar_path');
        $vars = Helpers::storeUserImage($user, $request, $vars, 'background_path');

        $user->update($vars);

        Helpers::flash('You have successfully updated your profile');

        return redirect()->back();
    }

    public function showPassword()
    {
        return view('backend.dashboard.password');
    }

    public function updatePassword(UpdatePasswordPost $request)
    {
        $user = \Auth::user();

        $password = $request->input('password');
        $newPassword = $request->input('new_password');

        Helpers::flash('You have enter the incorrect password.', '', 'error');

        if (\Hash::check($password, $user->password)) {
            Helpers::flash('You have successfully changed your password.');
            $user->password = \Hash::make($newPassword);
            $user->save();
        }

        return redirect()->back();
    }
}
