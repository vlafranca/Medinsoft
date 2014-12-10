<?php

class AuthController extends \BaseController {

    public function __construct(UserRepository $user)
    {
        $this->_user = $user;
    }

    public function getUserLogin($type = 0)
    {
        echo Request::segment(1). ' Login form';

        switch (Request::segment(1)) {
            case 'recruiter' :
                return "<form action='#' method='post'><input type='hidden' name='type' value='recruiter'><input type='text' name='email' /><input type='password' name='password' /><input type='submit' value='GO' /></form>";
                //return View::make('hello');
                break;
            case 'candidate' :
                //return "<form action='#' method='post'><input type='hidden' name='type' value='candidate'><input type='text' name='email' /><input type='password' name='password' /><input type='submit' value='GO' /></form>";
                return View::make('user.login', ['usertype'=>'candidate']);
                break;
            case 'trainingcenter' :
                return "<form action='#' method='post'><input type='hidden' name='type' value='trainingcenter'><input type='text' name='email' /><input type='password' name='password' /><input type='submit' value='GO' /></form>";
                //return View::make('hello');
                break;
            default :
                App::abort(404);
                break;
        }
    }

    public function postUserLogin()
    {
        Validator::extend('userType', function($field,$value,$parameters){
            return ($value == 'candidate' || $value == 'recruiter' || $value == 'trainingcenter');
        });

        $validator = Validator::make(
            Input::all(),
            array(
                'password' => 'required|min:6',
                'email' => 'required|email',
                'type' => 'required|userType'
            ),
            $messages = array(
                'userType'=>'User type must be passed'
            )
        );

        if(!$validator->fails()) {
            if($this->_user->authenticate(Input::get('email'), Input::get('password'), Input::get('type'))) {
                return Redirect::to(Session::get('type')[0]);
            }else{
                return Redirect::back()->withErrors(['error' => 'User not found or email/password incorrect.']);
            }
        }else{
            return Redirect::back()->withErrors($validator->messages());
        }
    }

    public function getReminder()
    {
        return View::make('reminder');
    }

    public function postReminder()
    {
        echo 'reminder';

        switch ($response = Password::remind(Input::only('email'), function($message)
        {
            $message->subject('Password Reminder');
        })) {
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));
            case Password::REMINDER_SENT:
                return Redirect::back()->with('success', Lang::get($response));
        }
    }

    public function getReset()
    {

    }

    public function postReset()
    {

    }

    public function logout()
    {
        $this->_user->logout();
        return Redirect::to('/');
    }

}
