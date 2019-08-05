<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Receipt extends Model
{
    protected $fillable = [
<<<<<<< HEAD
      'id', 'total', 'vatable', 'vat','vat_exempt','amount_due','vat_sales','cash','change_due','service_type','user_id', 'status','station_id','count','promo_id','mode'
=======
      'id', 'total', 'vatable', 'vat','vat_exempt','amount_due','vat_sales','cash','change_due','user_id', 'status','station_id','count','mode'
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    ];

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public static function SalesAnalysis($table, $ref_codes) {
    	$transaction = array();
    	foreach($ref_codes as $ref_code) {
            $qty = DB::table($table)->where([
                ['ref_code', $ref_code],
                ['status', 'served']
            ])->sum('qty');

            $cost = DB::table($table)->where([
                ['ref_code', $ref_code],
                ['status', 'served']
            ])->value('cost');

            $price = DB::table($table)->where([
                ['ref_code', $ref_code],
                ['status', 'served']
            ])->value('price');

            $total_cost = floatval($qty * $cost);
            $gross_rev = floatval($price * $qty);
            $profit = number_format($gross_rev - $total_cost, 2);
            $percentage = number_format((($gross_rev - $total_cost) / $gross_rev) * 100, 2);

            $keys = array('qty','cost','price', 'total_cost', 'gross_rev', 'profit', 'gross_rate');
            $values = array($qty, $cost,  $price, $total_cost, $gross_rev, $profit, $percentage);
            $transaction[$ref_code] = array_combine($keys, $values);
        }
        return $transaction;
    }
}
