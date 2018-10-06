<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserPageController;
use App\UserIntro;

class UserIntroController extends UserPageController
{
    protected $model = UserIntro::class;
    protected $label = 'intro details';
    protected $updateurl = 'intro.update';
}
