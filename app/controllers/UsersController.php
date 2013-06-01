<?php
class UsersController extends BaseController {

	public function get_register()
	{
		return View::make('users/register');
	}

	public function post_register()
	{
		$data = array();

		$rules = array(
			'email' => 'required|email',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required'
		);

		$input = Input::get();
		$validation = Validator::make($input, $rules);

		if($validation->fails())
		{
			return Redirect::to('users/register')->withInput()->withErrors($validation);
		}

		try
		{
			$user = Sentry::register(array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			));

			if( ! $user)
			{
				$data['errors'] = 'There was an issue when adding the user to the database';
			}
		}
		catch (Sentry\SentryException $e)
        {
            $data['errors'] = $e->getMessage();
        }

        if (array_key_exists('errors', $data))
        {
            return Redirect::to('user/register')->withInput()->with('errors', $data['errors']);
        }
        else
        {
            return Redirect::to('/');
        }
	}

	public function post_login()
	{
		$rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $input = Input::get();
        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('/')->withInput()->withErrors($validation);
        }

        try
        {
        	$user = Sentry::getUserProvider()->findByLogin(Input::get('email'));
            Sentry::login($user, false);
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    $data['errors'] = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    $data['errors'] = 'User not activated.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $data['errors'] = 'User not found.';
		}

		if( ! Sentry::check())
		{
			return Redirect::to('/')->withInput()->with('errors', $data['errors']);
		}
		else
		{
			return Redirect::to('member/account');
		}
	}
}