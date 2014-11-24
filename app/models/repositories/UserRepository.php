<?php
/**
 * Created by Valentin.
 * Date: 22/11/2014
 * Time: 16:03
 */

class UserRepository extends AbstractRepository implements IUserRepository {

    public function __construct(\UserModel $user)
    {
        $this->_user = $user;
    }

    public function isAllowed($name)
    {
        $logged_user = Auth::user();

        foreach ($logged_user->groups as $group) {
            if($group->permissions->contains($name)) {
                return true;
            }
        }

        return false;
    }
} 