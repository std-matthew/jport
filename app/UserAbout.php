<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAbout extends UserPage
{
    protected $guarded = [];
    const CONTENT = 'about';
}
