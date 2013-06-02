<?php

class MainController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function post_search()
	{
		$tags = Input::get('tags');
		// var_dump($tags);
		$matches=array();
		preg_match_all('@\s*.+\s*,*@', $tags, $matches);
		$results = $matches[0][0];

		// var_dump($results);
		$results = preg_replace('/\s*,\s*/', ',', $results);
		
		// var_dump($tags);
		$form_tags = explode(',', $results);

		// var_dump($form_tags);
		$results = array();

		foreach($form_tags as $ftag)
		{
			// var_dump($ftag);
			//db query where tag = $ftag
			//db join with user
			//db select for all tags with user_id
			$users = DB::table('resources')->where('tag','LIKE', '%'.$ftag.'%')->get();
			// var_dump($users);
			foreach($users as $user)
			{
				// var_dump($user);
				$user_profile = DB::table('users')
									->where('id', $user->user_id)
									->select('users.id', 'users.name', 'users.email', 'users.about')->first();

				// $users_tags = DB::table('resources')
				// 					->where('user_id', $user->user_id)
				// 					->select('tag')->get();
				$users_tags = DB::table('resources')
									->where('user_id','=', $user->user_id)
									->where('tag', 'LIKE', '%'.$ftag.'%')
									->select('tag', 'type')->get();
				$return_tags = array();

				foreach ($users_tags as $utag) 
				{
					if( ! in_array($utag, $return_tags))
					{
						array_push($return_tags, $utag->tag);
					}
				}

				$result = array(
					'id' => $user_profile->id,
					'name' => $user_profile->name,
					'contact' => $user_profile->email,
					'about' => $user_profile->about,
					'type' => $user->type,
					'tags' => $return_tags,
				);

				if( ! in_array($result, $results))
				{
					array_push($results, $result);
				}
			}
		}

		echo json_encode($results);
	}

}