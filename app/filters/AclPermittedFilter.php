<?php
/**
 * Created by Valentin.
 * Date: 30/10/2014
 * Time: 15:27
 */

class AclPermittedFilter {

    public function __construct(UserRepository $user)
    {
        $this->_user = $user;
    }

    public function filter($route, $request)
    {
        $permitted = false;
//        $user = Auth::user();
//
//        $user->load('groups', 'groups.permissions');
//
//        foreach($user->groups as $group) {
//            //var_dump($group->permissions->has());
            if($this->_user->isAllowed($route->getName())) {
                $permitted = true;
//                break;
            }
//        }

        if(!$permitted) {
            return Redirect::route('user.denied');
        }
    }
} 