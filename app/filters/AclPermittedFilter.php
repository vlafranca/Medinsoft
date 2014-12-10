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

        //if($this->_user->group) {
            if($this->_user->isAllowed($route->getPrefix())) {
                $permitted = true;
           }

        if(!$permitted) {
            return Redirect::route('user.denied');
        }
    }
} 