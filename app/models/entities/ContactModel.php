<?php

class ContactModel extends \Eloquent {
    protected $table = 'contact';

	protected $fillable = ['contact_name','contact_firstname','user_id','contact_type'];
}