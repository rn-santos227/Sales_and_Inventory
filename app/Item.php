<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    protected $fillable = [
<<<<<<< HEAD
      'name', 'ref_code', 'category_id', 'supplier_id', 'description', 'image', 'active'
=======
      'name', 'ref_code', 'category_id', 'supplier_id', 'description', 'quantity', 'cost','price', 'active', 'image'
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
<<<<<<< HEAD
        return $this->attributes['active'] == 1 ? 'Active' : 'Inactive';
=======
        return $this->attributes['active'] ? 'Active' : 'Inactive';
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    } 

    public function getImageAttribute() {
        return '/images/smalls/' . $this->attributes['image'];
    }

    public function getImageFile() {
        return $this->attributes['image'];
    }

<<<<<<< HEAD
}
=======
}
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
