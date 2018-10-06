<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSocial extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	const FACEBOOK = 1;
	const TWITTER = 2;
	const INSTAGRAM = 3;
	const GITHUB = 4;
	
    /**
     * @Relationships
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getTypes() {
    	return [
    		['value' => static::FACEBOOK, 'label' => 'Facebook', 'icon' => 'fa-facebook'],
    		['value' => static::TWITTER, 'label' => 'Twitter', 'icon' => 'fa-twitter'],
    		['value' => static::INSTAGRAM, 'label' => 'Instagram', 'icon' => 'fa-instagram'],
    		['value' => static::GITHUB, 'label' => 'Github', 'icon' => 'fa-github'],
    	];
    }

    public static function getContent() {
    	$user = \Auth::user();

    	return $user->socials;
    }

    public function getConstants($array, $value, $column = null) {

        /* Loop through the array */
        foreach ($array as $obj) {
            
            if($obj['value'] == $value) {

                /* Fetch columm if specified */
                if($column && isset($obj[$column]))
                    return $obj[$column];

                return $obj;
            }
        }
    }

    /**
     * @Renders
     */
    public function renderLabel() {
    	return $this->getConstants(static::getTypes(), $this->type, 'label');
    }

    public function renderIcon() {
    	return $this->getConstants(static::getTypes(), $this->type, 'icon');
    }
}
