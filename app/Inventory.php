<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
<<<<<<< HEAD
	protected $table = 'inventory';
	
    protected $fillable = [
      'name', 'ref_code', 'quantity', 'cost', 'price', 'reorder_point', 'supplier_id' ,'active',
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
=======
    //
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
}
