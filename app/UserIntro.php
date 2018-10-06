<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIntro extends UserPage
{
    protected $guarded = [];
    const CONTENT = 'intro';
}
