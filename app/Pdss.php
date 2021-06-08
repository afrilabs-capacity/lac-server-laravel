<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pdss extends Model
{
    //
     protected $table = "pdss"; 

     // protected $appends = ['submited'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender', 'marital_status', 'occupation', 'offence', 'pod', 'date_arrested', 'date_released', 'duration', 'counsel_assigned', ];

  protected $appends = ['submited'];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
    //   public function getSubmitedAttribute($value)
    // {
    //     return $this
    //         ->created_at
    //         ->format('d M Y');
    // }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

     public function getSubmitedAttribute($value)
    {
        return Carbon::parse($this
            ->created_at
            )->format('d M Y');
    }

    public function getLocationAttribute($value)
    {

        if ($value !== null)
        {
            return ['id' => $value, 'name' => State::find($value)->state

            ];

        }

        return null;
    }

    public function getPhotoOneAttribute($value)
    {

        if ($value !== null)
        {
            return url('/uploads/pdss/') . "/" . $value;

        }

        return null;
    }

    public function getPhotoTwoAttribute($value)
    {

        if ($value !== null)
        {
            return url('/uploads/pdss/') . "/" . $value;

        }

        return null;
    }

}

