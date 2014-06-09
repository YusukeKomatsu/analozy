<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Test extends Controller
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		echo 'hello';
		$result = DB::query('SELECT * FROM ranking_history')->execute();
		var_dump($result);
	
	}

	public function action_json()
	{
                $data = Json::test();
                var_dump($data);
	}

	public function action_test()
	{
		$data = Json::test();
		var_dump($data);
	}
}
