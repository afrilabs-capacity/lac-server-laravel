<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Hash;
//use App\Rtoken;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'names','status','qualification','state_id','gl','sex','phone','email','password','location','zone_id','centre_id','monthly_report'
    ];

    protected $appends=['role','registered','status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


     public function getRoleAttribute(){
        return $this->roles()->first()->name;
    }

    public function getRegisteredAttribute($value){
        return $this->created_at->format('d M Y');
    }

    public function getStatusAttribute($value){
        return "active";
    }

    public function setPasswordAttribute($value) {
    $this->attributes['password'] = Hash::make($value);
    }

    // public function getZoneIdAttribute($value){
    //     return $value==0 ? $value : $this->zone;
    // }

     public function zone()
    {
    return $this->belongsTo('App\Zone');
    }

    public function centre()
    {
    return $this->belongsTo('App\Centre');
    }

    public function state()
    {
    return $this->belongsTo('App\State');
    }

     public function dReport()
    {
    return $this->hasMany('App\Dreport');
    }


    /**
     * Get the role of a user.
     */
    public function role()
    {
    return $this->hasOne('App\Role');
    }

    public function roles()
    {
    return $this->belongsToMany('App\Role'); 
    }

    public function assignRole($role)
    {
    return $this->roles()->attach($role);
    }

    public function hasRole($name)
    {
    foreach($this->roles as $role)
    {
    if($role->name == $name) return true;
    }

    return false;
    }

    public function removeRole($role)
    {
    return $this->roles()->detach($role);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
