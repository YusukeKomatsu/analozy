<?php

class Model_Itunes extends Model
{
	protected static $media_type = array(
		'iOS_Apps',
		'iTunes_U',
		'Mac_App',
		'Podcast',
		'EBooks',
		'Audiobooks',
		'Music',
		'Music_Videos',
		'Movies',
	);

	protected static $country_code = array(
		"VC" => "St. Vincent and The Grenadines",
		"TC" => "Turks and Caicos",
		"GB" => "イギリス",
		"IS" => "アイスランド",
		"IE" => "アイルランド",
		"AZ" => "アゼルバイジャン",
		"AE" => "アラブ首長国連邦",
		"DZ" => "アルジェリア",
		"AR" => "アルゼンチン",
		"AL" => "アルバニア",
		"AM" => "アルメニア",
		"AI" => "アンギラ",
		"AO" => "アンゴラ",
		"AG" => "アンティグア･バーブーダ",
		"YE" => "イエメン",
		"VG" => "イギリス領ヴァージン諸島",
		"IL" => "イスラエル",
		"IT" => "イタリア",
		"IN" => "インド",
		"ID" => "インドネシア",
		"UG" => "ウガンダ",
		"UA" => "ウクライナ",
		"UZ" => "ウズベキスタン",
		"UY" => "ウルグアイ",
		"EC" => "エクアドル",
		"EG" => "エジプト",
		"EE" => "エストニア",
		"SV" => "エルサルバドル",
		"AU" => "オーストラリア",
		"AT" => "オーストリア",
		"OM" => "オマーン",
		"NL" => "オランダ",
		"CV" => "カーボベルデ",
		"GY" => "ガイアナ",
		"KZ" => "カザフスタン",
		"QA" => "カタール",
		"CA" => "カナダ",
		"GM" => "ガンビア",
		"KH" => "カンボジア",
		"GH" => "ガーナ",
		"GW" => "ギニアビサウ",
		"CY" => "キプロス",
		"GR" => "ギリシャ",
		"KG" => "キルギスタン",
		"GT" => "グアテマラ",
		"KW" => "クウェート",
		"GD" => "グレナダ",
		"HR" => "クロアチア",
		"KY" => "ケイマン諸島",
		"KE" => "ケニア",
		"CR" => "コスタリカ",
		"CO" => "コロンビア",
		"CG" => "コンゴ共和国",
		"SA" => "サウジアラビア",
		"ST" => "サントメプリンシペ",
		"SL" => "シエラレオネ",
		"JM" => "ジャマイカ",
		"SG" => "シンガポール",
		"ZW" => "ジンバブエ",
		"CH" => "スイス",
		"SE" => "スウェーデン",
		"ES" => "スペイン",
		"SR" => "スリナム",
		"LK" => "スリランカ",
		"SK" => "スロバキア",
		"SI" => "スロベニア",
		"SZ" => "スワジランド",
		"SC" => "セーシェル",
		"SN" => "セネガル",
		"KN" => "セントクリストファー・ネイビス",
		"LC" => "セントルシア",
		"SB" => "ソロモン諸島",
		"TH" => "タイ",
		"TJ" => "タジキスタン",
		"TZ" => "タンザニア",
		"CZ" => "チェコ共和国",
		"TD" => "チャド",
		"TN" => "チュニジア",
		"CL" => "チリ",
		"DK" => "デンマーク",
		"DE" => "ドイツ",
		"DO" => "ドミニカ共和国",
		"DM" => "ドミニカ国",
		"TT" => "トリニダード・トバゴ",
		"TM" => "トルクメニスタン",
		"TR" => "トルコ",
		"NG" => "ナイジェリア",
		"NE" => "ナイジャ",
		"NA" => "ナミビア",
		"NI" => "ニカラグア",
		"NZ" => "ニュージーランド",
		"NP" => "ネパール",
		"NO" => "ノルウェー",
		"PK" => "パキスタン",
		"PA" => "パナマ",
		"BS" => "バハマ",
		"PG" => "パプアニューギニア",
		"BM" => "バミューダ",
		"PW" => "パラオ",
		"PY" => "パラグアイ",
		"BB" => "バルバドス",
		"HU" => "ハンガリー",
		"BH" => "バーレーン",
		"FJ" => "フィジー",
		"PH" => "フィリピン",
		"FI" => "フィンランド",
		"BR" => "ブラジル",
		"FR" => "フランス",
		"BG" => "ブルガリア",
		"BF" => "ブルキナファソ",
		"BN" => "ブルネイ",
		"BT" => "ブータン",
		"VN" => "ベトナム",
		"BJ" => "ベナン",
		"VE" => "ベネズエラ",
		"BY" => "ベラルーシ",
		"BZ" => "ベリーズ",
		"PE" => "ペルー",
		"BE" => "ベルギー",
		"BW" => "ボツワナ",
		"BO" => "ボリビア",
		"PT" => "ポルトガル",
		"HN" => "ホンジュラス",
		"PL" => "ポーランド",
		"MO" => "マカオ",
		"MK" => "マケドニア",
		"MG" => "マダガスカル",
		"MW" => "マラウイ",
		"ML" => "マリ",
		"MT" => "マルタ",
		"MY" => "マレーシア",
		"FM" => "ミクロネシア連邦",
		"MX" => "メキシコ",
		"MU" => "モーリシャス",
		"MR" => "モーリタニア",
		"MZ" => "モザンビーク",
		"MD" => "モルドバ",
		"MN" => "モンゴル",
		"MS" => "モントセラト",
		"JO" => "ヨルダン",
		"LA" => "ラオス人民民主共和国",
		"LV" => "ラトビア",
		"LT" => "リトアニア",
		"LR" => "リベリア",
		"RO" => "ルーマニア",
		"LU" => "ルクセンブルク",
		"LB" => "レバノン",
		"RU" => "ロシア",
		"KR" => "韓国",
		"HK" => "香港",
		"TW" => "台湾",
		"CN" => "中国",
		"ZA" => "南アフリカ",
		"JP" => "日本",
		"US" => "アメリカ合衆国",
	);
	
	protected static $feed_type = array(
		'iOS_Apps' => array(
			'topfreeapplications',
			'toppaidapplications',
			'topgrossingapplications',
			'topfreeipadapplications',
			'toppaidipadapplications',
			'topgrossingipadapplications',
			'newapplications',
			'newfreeapplications',
			'newpaidapplications',
		),
	);

	protected static $feed_genre = array(
		'iOS_Apps' => array(
			'1' => 'all',
			'6000' => 'business',
			'6001' => 'weather',
			'6002' => 'utilities',
			'6003' => 'travel',
			'6004' => 'sports',
			'6005' => 'social_networking',
			'6006' => 'Reference',
			'6007' => 'productivity',
			'6008' => 'photo_video',
			'6009' => 'news',
			'6010' => 'navigation',
			'6011' => 'music',
			'6012' => 'lifestyle',
			'6013' => 'health_fitness',
			'6014' => 'game',
			'6015' => 'finance',
			'6016' => 'entertainment',
			'6017' => 'education',
			'6018' => 'books',
			//'6019' => 'books',
			'6020' => 'medical',
			'6021' => 'newsstand',
			'6022' => 'catalogs',
			'6023' => 'food',
		),
	);

	public static function getMediaList()
	{
		return static::$media_type;
	}

	public static function getCountryList()
	{
		return static::$country_code;
	}

	public static function getCountryCodeByName($country_name)
	{
		$country_array = static::$country_code;
		return array_search($country_name, $country_array);
	}

	public static function getCountryNameByCode($country_code)
	{
		$country_array = static::$country_code;
		return (array_key_exists($country_code, $country_array)) ? $country_array[$country_code] : NULL;  
	}

	public static function getFeedGenreList()
	{
		return static::$feed_genre;
	}

	public static function getFeedGenreByMediaType($media_type)
	{
		$feed_genre_array = static::$feed_genre;
		return (array_key_exists($media_type, $feed_genre_array)) ? $feed_genre_array[$media_type] : NULL;
	}

	public static function getFeedTypeList()
	{
		return static::$feed_type;
	}
	
	public static function getFeedTypeByMediaType($media_type)
	{
		$feed_type_array = static::$feed_type;
		return (array_key_exists($media_type, $feed_type_array)) ? $feed_type_array[$media_type] : NULL;
	}

	public static function addData($media_type, $country_code, $feed_type, $feed_genre, $data)
	{
		foreach($data as $rank => $params)
		{
			$value = array(
				'app_id' => $params["id"],
				'country_code' => $country_code,
				'bundle_id' => $params["bundle_id"],
				'app_name' => $params["name"],
				'image_53' => $params["image_53"],
				'image_75' => $params["image_75"],
				'image_100' => $params["image_100"],
				'amount' => $params["amount"],
				'currency' => $params["currency"],
				'copyright' => $params["copyright"],
				'media_type' => $media_type,
				'genre' => $feed_genre,
				'category' => $feed_type,
				'ranking' => $rank,
				'description' => $params["description"],
				'release_date' => $params["release_date"],
				'create_datetime' => date('Y-m-d H:i:s'),
			);
			DB::insert('application_row_data')->set($value)->execute();
		}
	}

	public static function getRanking($media_type, $country_code, $category, $genre, $date, $limit = 10)
	{
		$date = static::default_date_format($date);

		return DB::query('
			SELECT
				app_id,
				app_name,
				image_75 image,
				amount,
				currency,
				copyright
			FROM
				application_row_data
			WHERE
				media_type = :media_type
					AND
				country_code = :country_code
					AND
				category = :category
					AND
				genre = :genre
					AND
				update_timestamp >= :start_date
					AND
				update_timestamp <= :end_date
			ORDER BY ranking
			LIMIT :limit
		')->parameters(array(
			'media_type' => $media_type,
			'country_code' => $country_code,
			'category' => $category,
			'genre' => $genre,
			'start_date' => $date . ' 00:00:00',
			'end_date' => $date . ' 23:59:59',
			'limit' => $limit,
		))->execute()->as_array();
	}

	
	
	public static function getRankWeeklyByAppId($app_id, $country_code = 'JP', $start_date)
	{
		$start_date = static::default_date_format($start_date);
		$end_date = date('Y-m-d', strtotime('+7 day', strtotime($start_date)));

		return DB::query('
			SELECT
				media_type,
				category,
				genre,
				update_timestamp date,
				ranking
			FROM
				application_row_data
			WHERE
				app_id = :app_id
					AND
				country_code = :country_code
					AND
				update_timestamp >= :start_date
					AND
				update_timestamp < :end_date
			ORDER BY country_code, media_type, category, genre, update_timestamp
		')->parameters(array(
			'app_id' => $app_id,
			'country_code' => $country_code,
			'start_date' => $start_date . ' 00:00:00',
			'end_date' => $end_date . ' 00:00:00',
		))->execute()->as_array();
	}
	
	public static function getDataDetail($app_id, $country_code = 'JP', $date)
	{
		$date = static::default_date_format($date);

		$result = DB::query('
			SELECT
				app_id,
				app_name,
				image_75 image,
				amount,
				currency,
				copyright,
				ranking,
				release_date,
				description
			FROM
				application_row_data
			WHERE
				app_id = :app_id
					AND
				country_code = :country_code
					AND
				update_timestamp >= :start_date
					AND
				update_timestamp <= :end_date
			LIMIT 1
		')->parameters(array(
			'app_id' => $app_id,
			'country_code' => $country_code,
			'start_date' => $date . ' 00:00:00',
			'end_date' => $date . ' 23:59:59',
		))->execute()->as_array();
		return $result;
	}

	public static function existFeedType($media_type, $feed_type)
	{
		$feed_types = static::getFeedTypeList();
		if(array_key_exists($media_type, $feed_types))
		{
			$feed_list_by_media = $feed_types[$media_type];
			return array_key_exists($feed_type, $feed_list_by_media);
		}
		else
		{
			return FALSE;
		}
	}

	public static function default_date_format($date)
	{
		return date('Y-m-d', strtotime($date));
	}
}
