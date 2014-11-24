<?php

class OfferModel extends \Eloquent {
	protected $fillable = [];

    public function recruiter() {
        return $this->belongsTo('RecruiterModel','recruiter_id');
    }
}