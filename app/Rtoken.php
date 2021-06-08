<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtoken extends Model
{

	protected $table="reg_token";
	 protected $fillable = [
        'token','user_id'
    ];
    //
}
