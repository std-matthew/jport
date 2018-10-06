<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserSocialPost;

use App\Helpers;

use App\UserSocial;

class UserSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $types = UserSocial::getTypes();
        $socials = UserSocial::getContent();

        return view('backend.socials.show', [
            'socials' => $socials,
            'types' => $types,
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSocialPost $request)
    {
        $user = \Auth::user();
        $vars = $request->except([]);

        $user->socials()->create($vars);

        Helpers::flash('You have successfully added a new social media link.');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserSocial  $userSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSocial $userSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSocial  $userSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \Auth::user();

        $social = $user->socials()->where('id', $id)->first();
            Helpers::flash('You are unable to delete that social meadia link.', null, 'error');

        if ($social) {
            Helpers::flash('You have successfully deleted your social media link.');
            $social->delete();
        }

        return redirect()->back();
    }
}
