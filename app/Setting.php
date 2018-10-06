<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends UserPage
{
	protected $guarded = [];
    const CONTENT = 'settings';

    /**
     * @Renders
     */
    public function renderFavicon()
    {
        $image = url('/') . '/images/logo.png';
        
        if ($this->favicon) {
            $image = url('/') . '/storage/' . $this->favicon;
        }

        return $image;
    }

    public function renderOgImage()
    {
        $image = url('/') . '/images/og_image.png';
        
        if ($this->og_image) {
            $image = url('/') . '/storage/' . $this->og_image;
        }

        return $image;
    }
}
