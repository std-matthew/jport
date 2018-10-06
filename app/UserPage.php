<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPage extends Model
{
	const CONTENT = 'intro';

    /**
     * @Relationships
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @Getters
     */
    public static function getContent() {
    	$user = \Auth::user();
    	$page = static::CONTENT;

        $content = $user->$page;

        if (!$content) {
            $content = $user->$page()->create();
        }

        return $content;
    }

    /**
     * @Renders
     */
    public function renderImage($column = 'image_path')
    {
        $image = url('/') . '/dimension/images/pic01.jpg';
        
        if ($this->$column) {
            $image = url('/') . '/storage/' . $this->$column;
        }

        return $image;
    }
}
