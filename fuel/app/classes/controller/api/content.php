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
class Controller_Api_content extends Controller_Rest
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
		$app_id = Input::get('app_id');
		$country_code = 'JP'; //@todo Now get only JAPAN
		$date = Input::get('date', date('Ymd'));

		$target = array(
			'app_id' => $app_id,
			'country_code' => $country_code,
			'date' => $date,
		);

		// Aplication ID
		if(empty($app_id))
		{
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(app_id)'
					)
				)
			);
		}
		
		// Date (YYYYMMDD)
		// ex. 20130101
		if(! static::validation_date($date))
		{
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

		// Result
		$result = Model_Itunes::getDataDetail($app_id, $country_code, $date);

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

	//  some span ranking data.
	public function get_history()
	{
        return array(
            'result' => array(
                'error' => array(
                        'code' => '404',
                        'message' => 'Not Found'
                )
            )
        );
	}

	// 7days ranking data.
	public function get_weekly()
	{
		// Aplication ID
		if(empty($app_id))
		{
			return array(
				'target' => $target,
				'result' => array(
					'error' => array(
						'code' => '400',
						'message' => 'Invid parameter(app_id)'
					)
				)
			);
		}
		
		// Date (YYYYMMDD)
		// ex. 20130101
		if(! static::validation_date($date))
		{
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

		$result = Model_Itunes::getRankWeeklyByAppId($app_id, $country_code, $date);

        return array(
            'result' => array(
                'error' => array(
                        'code' => '404',
                        'message' => 'Not Found'
                )
            )
        );
	}

	// help
	public function help()
	{
		return array(
			'result' => array(
				'error' => array(
					'code' => '404',
					'message' => 'Not Found'
				)
			)
		);
	}

	protected static function validation_date($date)
	{
		return preg_match('/^([1-9][0-9]{3})(0[1-9]{1}|1[0-2]{1})(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/', $date);
	}
}
