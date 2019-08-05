<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Discount extends Model
{
    use Searchable;
    protected $fillable = [
        // input fields
<<<<<<< HEAD
      'name', 'ref_code', 'rate', 'description', 'active'
    ];

=======
      'name', 'ref_code',  'rate', 'description', 'active'
    ];

 	protected $hidden = [
    ];
    
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

    public function setActiveAttribute($value) {
        //sets value into boolean binary
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        //gets value from boolean binary into active and inactive
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
