<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'user_id'; 

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['user_id','emp_code','joining_date','leaving_date', 'experience' ,
                           'status','dob', 'marital_status','gender','qualification'];

    protected $dates = ['joining_date' , 'leaving_date'];

    /**
     * Get the User record associated with the Employee.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}