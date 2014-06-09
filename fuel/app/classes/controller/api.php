<?php

class Controller_Api extends Controller_Rest
{
	public function get_index()
	{
		return array(
			'error' => array(
				'code' => 404,
				'message' => 'use "GET /api/help". You can get all requests'
			)
		);
	}

	public function get_help($base_action=NULL, $request=NULL)
	{
		$all_request = array(
			'content' => array(
				'/' => array(
					'method' => 'GET',
					'parameter' => array(
						'app_id' => array(
							'type' => 'integer',
							'required' => 'Yes',
							'description' => "App Store apllication's id"
						),
						'country_code' => array(
							'type' => 'string',
							'required' => 'No',
							'description' => "Country Code (ISO 3166-1 alpha-2). Sorry only JP now!!"
						),
						'date' => array(
							'type' => 'date',
							'required' => 'No',
							'description' => "request date. YYYYMMDD"
						),
					),
					'description' => 'Writing NOW!',
					'example' => array(
						'request' => '/api/content/?app_id=1',
						'response' => array(
							'Writing NOW!'
						)
					),
				),
				'history' => array(
					'method' => 'GET',
					'parameter' => array(
						'app_id' => array(
							'type' => 'integer',
							'required' => 'Yes',
							'description' => "App Store apllication's id"
						),
						'country_code' => array(
							'type' => 'string',
							'required' => 'No',
							'description' => "Country Code (ISO 3166-1 alpha-2). Sorry only JP now!!"
						),
						'date' => array(
							'type' => 'date',
							'required' => 'No',
							'description' => "request date. YYYYMMDD"
						),
					),
					'description' => 'Writing NOW!',
					'example' => array(
						'request' => '/api/content/history?app_id=1',
						'response' => array(
							'Writing NOW!'
						)
					),
				),
				'weekly' => array(
					'method' => 'GET',
					'parameter' => array(
						'app_id' => array(
							'type' => 'integer',
							'required' => 'Yes',
							'description' => "App Store apllication's id"
						),
						'country_code' => array(
							'type' => 'string',
							'required' => 'No',
							'description' => "Country Code (ISO 3166-1 alpha-2). Sorry only JP now!!"
						),
						'date' => array(
							'type' => 'date',
							'required' => 'No',
							'description' => "request date. YYYYMMDD"
						),
					),
					'description' => 'Writing NOW!',
					'example' => array(
						'request' => '/api/content/weekly?app_id=1',
						'response' => array(
							'Writing NOW!'
						)
					),
				),
			),
		);
		return $all_request;
	}
}
