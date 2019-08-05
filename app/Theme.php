<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
    	'primary', 'secondary', 'tertiary', 'font_color'
    ];
}
