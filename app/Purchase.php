<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
<<<<<<< HEAD
      'name', 'qty','cost', 'price', 'subtotal', 'receipt_id', 'ref_code', 'status', 'tax_value'
=======
      'name', 'qty','cost', 'price', 'subtotal', 'receipt_id', 'ref_code', 'status',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt', 'receipt_id', 'receipt_id');
    }
}
