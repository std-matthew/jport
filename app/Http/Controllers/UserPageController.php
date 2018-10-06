<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserPagePost;
use App\Helpers;

use App\UserIntro;

class UserPageController extends Controller
{
	protected $model = UserIntro::class;
    protected $updateurl = 'intro.update';
    protected $label = 'intro';
    protected $excepts = [];

    /**
     * Display the specified resource.
     *
     * @param  \App\UserIntro  $userIntro
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $page = $this->model::getContent();
        $updateurl = route($this->updateurl);
        
        return view('backend.page.show', [
            'page' => $page,
            'label' => $this->label,
            'updateurl' => $updateurl,
            'excepts' => $this->excepts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserIntro  $userIntro
     * @return \Illuminate\Http\Response
     */
    public function update(UserPagePost $request)
    {
        $user = \Auth::user();
        $vars = $request->except(['image_path']);

        $page = $this->model::getContent();

        $vars = Helpers::storeUserImage($page, $request, $vars);

        $page->update($vars);

        Helpers::flash('You have successfully updated your ' . $this->label);

        return redirect()->back();
    }
}
