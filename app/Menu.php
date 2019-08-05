<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Menu extends Model
{
<<<<<<< HEAD
=======
	use Searchable;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    protected $fillable = [
        'name', 'ref_code', 'description', 'category_id', 'price', 'cost', 'active', 'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    
    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }

    public function getNameAttribute($value) {
        return $this->attributes['name'] = ucwords($value);
    }

    public function getImageAttribute() {
        return $this->attributes['image'] == '' ? '/images/defaults/default.png' : '/images/smalls/' . $this->attributes['image'];
    }

    public function getImageFile() {
        return $this->attributes['image'];
    }
}
