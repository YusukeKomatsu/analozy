<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

Error - 2012-12-01 19:13:34 --> 8 - A non well formed numeric value encountered in /var/www/html/fuelphp/fuel/app/classes/model/itunes.php on line 315
Error - 2012-12-01 19:23:07 --> Error - Call to undefined method Fuel\Core\Database_Query::order_by() in /var/www/html/fuelphp/fuel/app/classes/model/itunes.php on line 316
Error - 2012-12-01 19:24:51 --> Error - Call to undefined method Fuel\Core\Database_Query::limit() in /var/www/html/fuelphp/fuel/app/classes/model/itunes.php on line 317
Error - 2012-12-01 19:26:45 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'rank' in 'order clause' with query: "SELECT
				*
			FROM
				application_row_data
			WHERE
				media_type = 'iOS_Apps'
					AND
				country_code = 'JP'
					AND
				category = 'topfreeapplications'
					AND
				genre = 1
					AND
				create_datetime >= '2012-12-01 00:00:00'
					AND
				create_datetime <= '2012-12-01 23:59:59'
			ORDER BY rank
			LIMIT 10" in /var/www/html/fuelphp/fuel/core/classes/database/pdo/connection.php on line 175
