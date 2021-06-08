<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\State;

class Dreport extends Model
{
    //
    protected $table = "daily_report";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender', 'age', 'occupation', 'granted', 'case_type', 'offence', 'complaints', 'location', 'bail_status', 'outcome'];

    protected $appends = ['submited'];

    public function user()
    {
        return $this->belongsTo('App\user');
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

    public function getSubmitedAttribute($value)
    {
         return Carbon::parse($this
            ->created_at
            )->format('d M Y');
    }

    public function getPhotoOneAttribute($value)
    {

        if ($value !== null)
        {
            return url('/uploads/daily/') . "/" . $value;

        }

        return null;
    }

    public function getPhotoTwoAttribute($value)
    {

        if ($value !== null)
        {
            return url('/uploads/daily/') . "/" . $value;

        }

        return null;
    }

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = (int)($value);
    }

}

