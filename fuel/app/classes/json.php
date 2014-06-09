<?php

class Json
{
	const GET_LIMIT = 300;

	public static function _init()
	{
		// initailize
	}
	
	public static function getFileName($country, $type, $genre)
	{
		$file_template = 'http://itunes.apple.com/%s/rss/%s/limit=%s';
		
		$file_name = '';
		if($genre == 1)
		{
			$file_template .= '/json';
			$file_name = sprintf($file_template, $country, $type, self::GET_LIMIT);
		}
		else
		{
			$file_template .= '/genre=%s/json';
			$file_name = sprintf($file_template, $country, $type, self::GET_LIMIT, $genre);
		}
		
		return $file_name;
	}

	public static function get($file_name)
	{
		$data = json_decode(file_get_contents($file_name), true);
		$dataArray = array();

		foreach ($data['feed']['entry'] as $item)
		{
			$dt = new DateTime($item["im:releaseDate"]["label"]);
			$tz = new DateTimeZone("Asia/Tokyo");
			$dt->setTimezone($tz);

			$id = $item['id'];
			$images = $item["im:image"];

			$image = array();
			$image['53'] = $image['75'] = $image['100'] = '';

			foreach($images as $img)
			{
				$height = $img["attributes"]["height"];
				$image[$height] = $img['label'];
			}

			$price = $item["im:price"]["attributes"];

			$dataArray[] = array(
				'id' => $id["attributes"]["im:id"],
				'bundle_id' => $id["attributes"]["im:bundleId"],
				'name' => $item["im:name"]["label"],
				'image_53' => $image['53'],
				'image_75' => $image['75'],
				'image_100' => $image['100'],
				'amount' => $price['amount'],
				'currency' => $price['currency'],
				'copyright' => $item["im:artist"]["label"],
				'release_date' => $dt->format("Y-m-d H:i:s"),
				'description' => (isset($item["summary"]["label"])) ? $item["summary"]["label"] : NULL,
			);
		}

		return $dataArray;
	}
	
	public static function test()
	{
		$file_name = "http://itunes.apple.com/jp/rss/topfreeapplications/limit=300/json";
		$data = static::get($file_name);
		return $data;
	}
}
