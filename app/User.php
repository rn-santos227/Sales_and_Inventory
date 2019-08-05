<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    protected $fillable = [
        'user_level', 'username', 'first_name', 'last_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst($value);
    }
    
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }

    public function getNameAttribute($value) {
        return $this->attributes['name'] = ucwords($value);
    }

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }

    public function getNameAttribute($value) {
        return $this->attributes['name'] = ucwords($value);
    }
}
