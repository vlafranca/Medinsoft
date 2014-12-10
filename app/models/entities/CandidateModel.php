<?php

class CandidateModel extends \Eloquent {
    protected $table = 'candidates';

    protected $fillable = array('user_id', 'dob', 'name', 'firstname');

}