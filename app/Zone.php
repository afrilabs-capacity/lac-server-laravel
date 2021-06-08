<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    
     public function states()
    {
    return $this->hasMany('App\State'); 
    }


     public function users()
    {
    return $this->hasMany('App\User'); 
    }

    
}
