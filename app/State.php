<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   public function zone()
    {
    return $this->belongsTo('App\Zone');
    }

     public function Centres()
    {
    return $this->hasMany('App\centre'); 
    }

 

}
