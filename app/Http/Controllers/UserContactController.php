<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserPageController;
use App\UserContact;

class UserContactController extends UserPageController
{
    protected $model = UserContact::class;
    protected $label = 'contact details';
    protected $updateurl = 'contact.update';
    protected $excepts = ['content', 'image_path'];
}
