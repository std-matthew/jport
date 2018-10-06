<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NotifyPost;
use App\Notifications\ContactNotification;

use App\Helpers;

use App\User;

class PageController extends Controller
{
    public function index(Request $request)
    {
    	$user = null;
    	if ($request->has('username')) { $user = User::where('username', $request->input('username'))->first(); }
    	if (!$user) { $user = User::first(); }
        $user = $user;
        $data = [];
        $array = ['main', 'intro', 'work', 'about', 'contact', 'socials', 'settings'];

        foreach ($array as $value) {
            /* Short circuit if any relationship is missing */
            if (!$user->$value) { return abort(404); }
            $data[$value] = $user->$value;
        }

        $data = array_merge($data, ['user' => $user]);

    	return view('frontend.dimension.index', $data);
    }

    public function notify(NotifyPost $request, User $user)
    {
        if (!$user) { $user = User::first(); }

        $user->notify(new ContactNotification($request));

        Helpers::flash('You have successfully sent your message.');

        return redirect()->back();
    }
}
