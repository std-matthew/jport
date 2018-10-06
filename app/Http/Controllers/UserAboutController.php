<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserPageController;
use App\UserAbout;

class UserAboutController extends UserPageController
{
    protected $model = UserAbout::class;
    protected $label = 'about details';
    protected $updateurl = 'about.update';
}