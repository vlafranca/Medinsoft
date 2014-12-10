<?php

class UserVerifyModel extends \Eloquent {
	protected $fillable = [];

    protected $table = 'users_verifies';

    protected $primaryKey = 'token';

    public $timestamps = false;
}