<?php

class AclPermission extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'acl_permissions';

    protected $fillable = array(
        'ident', 'description'
    );

    public $timestamps = false;

    public function groups()
    {
        return $this->belongsToMany('AclGroup', 'acl_group_permissions', 'permission_id', 'group_id');
    }

    public function getKey()
    {
        return $this->attributes['ident'];
    }
}
