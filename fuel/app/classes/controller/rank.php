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
class Controller_Rank extends Controller
{
	function action_top()
	{
		$media_type = 'iOS_Apps';
		$country_code = 'JP';
		$category = 'topfreeapplications';
		$genre = 1;
		$date = date('Ymd');
		$limit = 10;
		$result = Model_Itunes::getRanking($media_type, $country_code, $category, $genre, $date, $limit);
//		echo '<pre>';
//		var_dump($result);
//		echo '<pre />';
		
		$view = View::forge('rank/top');
		$view->set('title', 'Top');
		return $view;
	}
}
