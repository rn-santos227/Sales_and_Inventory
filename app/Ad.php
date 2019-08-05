<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'image',
    ];

    public function getImageAttribute() {
        return '/images/ads/' . $this->attributes['image'];
    }
}
