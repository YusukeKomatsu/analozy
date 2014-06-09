<?php

/**
 * The Jsontest Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Jsontest extends Controller
{
	public function action_get($country, $type, $genre)
	{
	 	$file_name = Json::getFileName($country, $type, $genre);
		$data = Json::get($file_name);
		
		// test
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
	
	public function action_all()
	{
		//$country_list = Model_Itunes::getCountryList();
		$media_list = Model_Itunes::getMediaList();

		$country_list = array("JP" => "日本");
		foreach($country_list as $country_code => $country_name)
		{
			echo '<h1>' . $country_code . '(' . $country_name . ')' . '</h1>';
			foreach($media_list as $media_type)
			{
				echo '<string>' . $media_type . '</string><br />';
				
				$feed_type_list = Model_Itunes::getFeedTypeByMediaType($media_type);
				if(!is_array($feed_type_list))
				{
					var_dump($feed_type_list);
					return;
				}
				foreach ($feed_type_list as $feed_type)
				{
					echo '<string>' . $feed_type . '</string><br />';

					$feed_genre_list = Model_Itunes::getFeedGenreByMediaType($media_type);
					foreach ($feed_genre_list as $genre_code => $genre)
					{
						echo '<string>' . $genre . '(' . $genre_code . ')' . '</string><br />';
						$file_name = Json::getFileName(strtolower($country_code), $feed_type, $genre_code);
						
						$data = Json::get($file_name);
						echo '<pre>';
						var_dump($data);
						echo '</pre>';
						echo '<br />';
						echo '---------------------------------------------------------------------';
						echo '<br />';
						unset($data);
					}
				}
			}
		}
		
		
	}
}
