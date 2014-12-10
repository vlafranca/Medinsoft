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

    public function create($array)
    {
        return $this->_user->create($array);
    }

    public function isAllowed($name)
    {
        $logged_user = Auth::user();

        //foreach ($logged_user->groups as $group) {
        //if($group->permissions->contains($name)) {
            if($logged_user->group == $name) {
                return true;
            }
       // }

        return false;
    }

    public function confirmEmail($token)
    {
        return UserVerifyModel::destroy(['token' => $token]);
    }

    /* TODO
     *  Push user type into session cookie
     * find a way : ACL, methos parameter passed from controller url param, array of all groups (think this one is good),
     *
     */
    public function authenticate($email, $password, $type)
    {
        if(Auth::attempt(array('email' => $email, 'password' => $password),true)) {
            if(Auth::user()->tokens()->count() > 0)
                die('Verify your email address');

             //   Session::push('allowed', serialize(Auth::user()->groups));
                Session::push('type', $type);
                return true;
        }else
            return false;
    }

    public function logout()
    {
        Auth::logout();
    }

} 