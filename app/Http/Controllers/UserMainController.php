<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserPageController;
use App\UserMain;

class UserMainController extends UserPageController
{
    protected $model = UserMain::class;
    protected $label = 'main details';
    protected $updateurl = 'main.update';
    protected $excepts = ['tab_label'];
}