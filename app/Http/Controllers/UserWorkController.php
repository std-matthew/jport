<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserWork;

class UserWorkController extends UserPageController
{
    protected $model = UserWork::class;
    protected $label = 'work details';
    protected $updateurl = 'work.update';
}
