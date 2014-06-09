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
class Controller_Api_rank extends Controller_Rest
{
	public function get_test()
	{
		return array('status' => TRUE);
	}

	public function post_test()
	{
		return array('status' => FALSE);
	}

	public function get_index()
	{
		$media_type = Input::get('media_type', 'iOS_Apps');
		$country_code = 'JP';
		$category = Input::get('category');
		$genre = Input::get('category', 1);
		$date = Input::get('date', date('Ymd');
		$limit = Input::get('limit', 10);

		$target = array(
			'media_type' => $media_type,
			'country_code' => $country_code,
			'category' => $category,
			'genre' => $genre,
			'date' => $date,
			'limit' => $limit,
		);

		if(empty($media_type) && $media_type == 'iOS_Apps')
		{
			// Invid Media Type
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(media_type)'
					)
				)
			);
		}
		elseif(empty($country_code))
		{
			// Invid Country Code
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(country_code)'
					)
				)
			);
		}
		elseif(Model_Itunes::existFeedType($media_type, $category))
		{
			// Invid Category
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(category)'
					)
				)
			);
		}
		elseif(empty($genre))
		{
			// Invid Genre
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(genre)'
					)
				)
			);
		}
		elseif(! static::validation_date($date))
		{
			// Invid Date
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(date)'
					)
				)
			);
		}
		elseif(! is_numeric($limit) && $limit > 0 && $limit =< 300)
		{
			// Invid Limit
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(limit)'
					)
				)
			);
		}

		$result = Model_Itunes::getRanking($media_type, $country_code, $category, $genre, $date, $limit);

		if(empty($result))
		{
			$result = array(
				'error' => array(
					'code' => '404',
					'message' => 'Not Found'
				)
			);
		}

		return array(
			'target' => $target,
			'result' => $result
		);
	}

	protected static function validation_date($date)
	{
		return preg_match('/^([1-9][0-9]{3})(0[1-9]{1}|1[0-2]{1})(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/', $date);
	}
}
