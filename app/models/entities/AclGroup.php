<?php
/**
 * Created by Valentin.
 * Date: 30/10/2014
 * Time: 16:05
 */

class AclGroup extends Eloquent {

    protected $table = 'acl_group';

    protected $primaryKey = 'group_id';

    protected $fillable = array(
        'name', 'description'
    );

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('Users', 'acl_user_groups', 'group_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('AclPermission', 'acl_group_permissions', 'group_id', 'permission_id');
    }

}