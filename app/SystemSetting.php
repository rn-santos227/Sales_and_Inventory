<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [
<<<<<<< HEAD
    	'tax_rate', 'non_vat','vatable','service_charge','system_name','system_mode', 'cost_layering_method'
=======
    	'tax_rate', 'non_vat','vatable','system_name','system_mode'
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    ];

    // public function setTaxRateAttribute($value) {
    // 	// sets value into decimal
    //     //$this->attributes['tax_rate'] = $value/100;
    // }
    // public function getTaxRateAttribute($value) {
    // 	// sets value into decimal
    //     //$this->attributes['tax_rate'] = $value*100;
    // }

    public function setNonVatAttribute($value)
    {
        $this->attributes['non_vat'] = (boolean)($value);
    }
}
