<?php

class Rss
{
	const GET_LIMIT = 300;
	
	public static function _init()
	{
		// initailize
	}
	
	public static function getFileName($country, $type, $genre)
	{
		$file_template = 'http://itunesitunes.apple.com/%s/rss/%s/limit=%s/';
		
		$type = '';
		
		$file_name = '';
		if($genre == 1)
		{
			$file_template .= '/xml';
			$file_name = sprintf($file_template, $country, $type);
		}
		else
		{
			$file_template .= '/genre=%s/xml';
			$file_name = sprintf($file_template, $country, $type, $genre);
		}
		
		return $file_name;
	}

	public static function get($rss_file_name)
	{
		$rss = simplexml_load_file($rss_file_name);
		$rssArray = array();

		foreach ($rss->entry as $item)
		{
			$app_name = htmlspecialchars($item->title);
			$ids = preg_match('/id(?P<id>[0-9]{3,})/', $item->id, $matches);
			$app_id = htmlspecialchars($matches['id']);
			$description = htmlspecialchars($item->summary);
			$image = "";
			foreach($item->link as $params)
			{
				if($params->attributes()->type == "image/jpeg")
				{
					$image = (string) $params->attributes()->href;
				}
			}
			
			$rssArray[] = array(
				'app_id' => $app_id,
				'app_name' => $app_name,
				'image' => $image,
				'description' => $description,
			);
		}
		
		return $rssArray;
	}

	public static function test()
	{
//		$RssFileName = 'http://itunes.apple.com/jp/rss/topfreeapplications/limit=10/xml';
//		$result = static::get($RssFileName);
		var_dump($result);
	}
}
