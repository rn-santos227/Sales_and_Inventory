<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Promo extends Model
{
    use Searchable;
    protected $fillable = [
        // input fields
      'name', 'ref_code', 'type', 'value', 'expiration_date', 'description', 'active'
    ];

    public function receipt()
    {
        return $this->hasMany('App\Receipt');
    }


    public function setActiveAttribute($value) {
        //sets value into boolean binary
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        //gets value from boolean binary into active and inactive
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
