<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
<<<<<<< HEAD
=======
	use Searchable;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

    protected $fillable = [
        'ref_code', 'name', 'description', 'active',
    ];

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
