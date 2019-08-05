<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Order;
=======
use DB;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class Order extends Model
{
    protected $fillable = [
      'menu','name','ref_code', 'qty','cost', 'price', 'subtotal', 'receipt_id', 'status'
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt');
    }
}
