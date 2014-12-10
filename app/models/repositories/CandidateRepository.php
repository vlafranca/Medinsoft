<?php
/**
 * Created by Valentin.
 * Date: 22/11/2014
 * Time: 15:54
 */

class CandidateRepository extends AbstractRepository implements ICandidateRepository {

    public function create()
    {
        $verifyToken = str_random(40);

        DB::transaction(function() use ($verifyToken){
            $user_params = Input::only('login','password','email');
            $user_params['group'] = 'candidate';
            $user = UserModel::create($user_params);

            $candidate_params = Input::only('dob','name','firstname');
            $candidate_params['user_id'] = $user->user_id;
            CandidateModel::create($candidate_params);

            //$user->groups()->attach(2);

            $userVerify = new UserVerifyModel();
            $userVerify->user_id = $user->user_id;
            $userVerify->email = Input::get('email');
            $userVerify->token = $verifyToken;

            $user->tokens()->save($userVerify);

            $userAddr = new PostalAddressModel();
            $userAddr->user_id = $user->user_id;
            $userAddr->address = Input::get('email');
            $userAddr->postal_code = Input::get('cp');
            $userAddr->city = Input::get('city');

            $user->addresses()->save($userAddr);
        });

        return $verifyToken;
    }
} 