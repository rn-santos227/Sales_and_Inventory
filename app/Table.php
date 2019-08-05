<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
<<<<<<< HEAD
    	'name', 'ref_code', 'receipt_id', 'description', 'active', 'status', 'customer', 
    ];

    public function receipt() 
    {
    	return $this->belongsTo('App\Receipt', 'receipt_id');
    }


    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    } 
=======
    	'status','name','ref_code','description','status','receipt_id'
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt');
    }
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
}
