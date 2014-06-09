<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Tasks;

/**
 * Robot example task
 *
 * Ruthlessly stolen from the beareded Canadian sexy symbol:
 *
 *		Derek Allard: http://derekallard.com/
 *
 * @package		Fuel
 * @version		1.0
 * @author		Phil Sturgeon
 */

class Pickup
{
	public static function run($media_type, $country_code, $feed_type, $genre_code)
	{
		$file_name = \Json::getFileName(strtolower($country_code), $feed_type, $genre_code);

		if(!empty($file_name))
		{
			$data = \Json::get($file_name);
			if(!empty($data))
			{
				\Model_Itunes::addData($media_type, $country_code, $feed_type, $genre_code, $data);
			}
		}
	}

	public static function all()
	{
		//$country_list = Model_Itunes::getCountryList();
		$media_list = \Model_Itunes::getMediaList();

		$country_list = array("JP" => "日本");
		foreach($country_list as $country_code => $country_name)
		{
			foreach($media_list as $media_type)
			{
				$feed_type_list = \Model_Itunes::getFeedTypeByMediaType($media_type);
				if(!is_array($feed_type_list))
				{
					var_dump($feed_type_list);
					return;
				}
				foreach ($feed_type_list as $feed_type)
				{
					$feed_genre_list = \Model_Itunes::getFeedGenreByMediaType($media_type);
					foreach ($feed_genre_list as $genre_code => $genre)
					{
						$file_name = \Json::getFileName(strtolower($country_code), $feed_type, $genre_code);

						$data = \Json::get($file_name);
						\Model_Itunes::addData($media_type, $country_code, $feed_type, $genre_code, $data);
						unset($data);
					}
				}
			}
		}
	}

	public static function test()
	{
		//$country_list = Model_Itunes::getCountryList();
		$media_list = \Model_Itunes::getMediaList();

		$country_list = array("JP" => "日本");
		foreach($country_list as $country_code => $country_name)
		{
			//echo '<h1>' . $country_code . '(' . $country_name . ')' . '</h1>';
			foreach($media_list as $media_type)
			{
				//echo '<string>' . $media_type . '</string><br />';

				$feed_type_list = \Model_Itunes::getFeedTypeByMediaType($media_type);
				if(!is_array($feed_type_list))
				{
					var_dump($feed_type_list);
					return;
				}
				foreach ($feed_type_list as $feed_type)
				{
					//echo '<string>' . $feed_type . '</string><br />';

					$feed_genre_list = \Model_Itunes::getFeedGenreByMediaType($media_type);
					foreach ($feed_genre_list as $genre_code => $genre)
					{
					//echo '<string>' . $genre . '(' . $genre_code . ')' . '</string><br />';
					$file_name = \Json::getFileName(strtolower($country_code), $feed_type, $genre_code);

					$data = \Json::get($file_name);
					//echo '<pre>';
					//var_dump($data);
					//echo '</pre>';
					//echo '<br />';
					//echo '---------------------------------------------------------------------';
					//echo '<br />';
					\Model_Itunes::addData($media_type, $country_code, $feed_type, $genre_code, $data);
					unset($data);
					}
				}
			}
		}
	}
}
