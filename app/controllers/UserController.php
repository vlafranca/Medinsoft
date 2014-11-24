<?php

class UserController extends \BaseController {

    public function __construct(UserRepository $user)
    {
        $this->_user = $user;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //echo Hash::make('test');
        $credentials = array('username' => 'test', 'password' => 'test');

        if(Auth::attempt($credentials, true)){

            Auth::login(Auth::user(), true);

            // print user information
            print_r(Auth::user());

            //redirect back to homepage
            echo "logged";
        } else {
            echo "failed";
        }
	}

    public function supersecret()
    {
        echo "hello";
        var_dump($this->_user->isAllowed('user.supersecret'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
