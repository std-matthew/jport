<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @Relationships
     */
    public function main() {
        return $this->hasOne(UserMain::class, 'user_id');
    }

    public function intro() {
        return $this->hasOne(UserIntro::class, 'user_id');
    }

    public function work() {
        return $this->hasOne(UserWork::class, 'user_id');
    }

    public function about() {
        return $this->hasOne(UserAbout::class, 'user_id');
    }

    public function contact() {
        return $this->hasOne(UserContact::class, 'user_id');
    }

    public function socials() {
        return $this->hasMany(UserSocial::class, 'user_id');
    }

    public function settings() {
        return $this->hasOne(Setting::class, 'user_id');
    }

    /**
     * @Renders
     */
    public function renderPageTitle() {
        return 'Portfolio | ' . $this->renderFullname();
    }

    public function renderFullname() {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }

    public function renderAvatar() {
        $image = url('/') . '/images/avatar.png';

        if ($this->avatar_path) {
            $image = url('/') . '/storage/' . $this->avatar_path;
        }

        if ($this->avatar_url) {
            $image = $this->avatar_url;
        }

        return $image;
    }

    public function renderBackground() {
        $image = url('/') . '/images/background.jpg';
        
        if ($this->background_path) {
            $image = url('/') . '/storage/' . $this->background_path;
        }

        if ($this->background_url) {
            $image = $this->background_url;
        }

        return $image;
    }

    public function renderUserDirectory() {
        return 'users/' . $this->username;
    }

    public function viewNotifications() {
        return url('/');
    }
}
