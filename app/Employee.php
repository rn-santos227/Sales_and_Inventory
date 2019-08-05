<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
      'last_name', 'first_name','designation', 'present', 'active'
    ];

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] == 1 ? 'Active' : 'Inactive';
    } 

    public function getImageAttribute() {
        return '/images/smalls/' . $this->attributes['image'];
    }

    public function getImageFile() {
        return $this->attributes['image'];
    }
}
