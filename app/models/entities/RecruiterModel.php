<?php

class RecruiterModel extends \Eloquent {
	protected $fillable = [];

    public function user() {
        return $this->belongsTo('UserModel','user_id');
    }

    public function offers() {
        return $this->hasMany('OfferModel','user_id');
    }
}