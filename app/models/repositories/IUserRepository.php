<?php
/**
 * Created by Valentin.
 * Date: 20/11/2014
 * Time: 17:21
 */

interface IUserRepository extends IRepository {

    /**
     * Check permissions of user
     * @param $name
     * @return mixed
     */
    public function isAllowed($name);

    /**
     * @param $array array
     * @return mixed
     */
    public function create($array);

    /**
     * Auth user
     * @param $email
     * @param $password
     * @param $type
     * @return boolean
     */
    public function authenticate($email, $password, $type);

    /**
     * Destroy session
     * @return void
     */
    public function logout();
} 