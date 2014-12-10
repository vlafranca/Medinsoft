<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserModel extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    protected $primaryKey = 'user_id';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = array('login', 'email', 'password', 'group');


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

//    public function groups()
//    {
//        return $this->belongsToMany('AclGroup', 'acl_user_groups','user_id','group_id');
//    }

    public function contacts()
    {
        return $this->hasMany('ContactModel','user_id');
    }

    public function tokens()
    {
        return $this->hasMany('UserVerifyModel','user_id');
    }

    public function addresses()
    {
        return $this->hasMany('PostalAddressModel','user_id');
    }

    public function news()
    {
        return $this->hasMany('NewsModel','user_id');
    }

    public function recruiter()
    {
        return $this->hasOne('RecruiterModel','user_id');
    }

    public function trainingCenter()
    {
        return $this->hasOne('TrainingCenterModel','user_id');
    }

    public function candidate()
    {
        return $this->hasOne('CandidateModel','user_id');
    }
}
