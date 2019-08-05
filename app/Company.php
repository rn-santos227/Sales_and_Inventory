<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company';
    protected $fillable = [
<<<<<<< HEAD
         'name','description','logo','address','email','contact','TIN'
    ];

    public function getLogoAttribute() {
        return '/images/logos/' . $this->attributes['logo'];
    }
=======
         'name','description'
    ];
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
}
