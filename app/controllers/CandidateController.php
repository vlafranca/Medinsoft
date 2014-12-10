<?php

class CandidateController extends \BaseController {

    public function __construct(CandidateRepository $candidate)
    {
        $this->_candidate = $candidate;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
       /* Mail::send('emails.confirmation', array('token' => 'value'), function($message)
        {
            $message->to('valentin.lafranca@gmail.com', 'John Smith')->subject('Confirmez votre adresse mail');
        });*/

		return View::make('candidate.register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {

        $user = App::make('UserController')->store(Input::only('login','email','password','password_confirmation'), false);

        if(isset($user['ok'])) {
            $validator = Validator::make(
                Input::except('login','email','password','password_confirmation','_token'),
                array(
                    'name' => "required|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
                    'firstname' => "required|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
                    'dob' => 'required|date',
                )
            );

            if($validator->fails()) {
                return Redirect::action('CandidateController@create')
                    ->withInput(Input::except('_token'))
                    ->withErrors($validator->messages());
            } else {
                $token = $this->_candidate->create();

                if($token) {
                    Mail::send('emails.confirmation', array('token' => $token), function($message)
                    {
                        $message->to(Input::get('email'), Input::get('firstname'))->subject('Confirmez votre adresse mail');
                    });

                    return ['ok' => true];
                } else
                    return ['ko' => 'unknow error'];
            }
        }else{
            return Redirect::action('CandidateController@create')
                ->withInput(Input::except('_token'))
                ->withErrors($user['ko']);
        }


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
