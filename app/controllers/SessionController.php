<?php

use Illuminate\Support\MessageBag;

class SessionController extends BaseController {

    /**
     * Show the login form
     *
     * @return mixed
     */
    public function create()
	{
		if (Auth::check()) {
            return Redirect::to('events');
        }

        return View::make('auth.login');
	}

    /**
     * Log in the user or send back to the login page with errors
     *
     * @return mixed
     */
    public function store()
    {
        if (Auth::attempt(Input::only('username', 'password'), true)) {
            return Redirect::to('events')->with('message', 'You are now logged in');
        }

        $errors = new MessageBag([
            'password' => ['Username and/or password is invalid']
        ]);

        return Redirect::back()->withInput()->withErrors($errors);
    }

    /**
     * Log out the user
     *
     * @return mixed
     */
    public function destroy()
    {
        Auth::logout();

        return Redirect::to('login');
    }
}
