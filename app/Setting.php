<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends UserPage
{
	protected $guarded = [];
    const CONTENT = 'settings';

    public static function getColors()
    {
        return [
            'red',
            'pink',
            'purple',
            'deep-purple',
            'indigo',
            'blue',
            'light-blue',
            'cyan',
            'teal',
            'green',
            'light-green',
            'lime',
            'yellow',
            'amber',
            'orange',
            'deep-orange',
            'brown',
            'grey',
            'blue-grey',
            'black',
        ];
    }

    public static function getDepths()
    {
        return [
            'lighten-5',
            'lighten-4',
            'lighten-3',
            'lighten-2',
            'lighten-1',
            'darken-1',
            'darken-2',
            'darken-3',
            'darken-4',
            'accent-1',
            'accent-2',
            'accent-3',
            'accent-4',
        ];
    }

    /**
     * @Renders
     */
    public function renderColor() {
        $color = $this->color;

        if ($this->color_depth) {
            $color .= ' ' . $this->color_depth;
        }

        return $color;
    }

    public function renderFavicon()
    {
        $image = url('/') . '/images/logo.png';
        
        if ($this->favicon) {
            $image = url('/') . '/storage/' . $this->favicon;
        }

        if ($this->favicon_url) {
            $image = $this->favicon_url;
        }

        return $image;
    }

    public function renderOgImage()
    {
        $image = url('/') . '/images/og_image.png';
        
        if ($this->og_image) {
            $image = url('/') . '/storage/' . $this->og_image;
        }

        if ($this->og_image_url) {
            $image = $this->og_image_url;
        }

        return $image;
    }
}
