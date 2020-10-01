<?php
$base_link = ltrim(urldecode($_SERVER['REQUEST_URI']), "/");

if ($countryISO[1] == "en"){
	if ($countryISO[2] == "gb"){
		foreach($libeng as $value){
			if ($base_link == $start_link . $value["name_href"] . $end_link){
				$href_city_en = $start_link . $value["name_href"] . $end_link;
				$name_city_en = $value["name_en"];
			}
		}

		foreach($libcountry as $value){
			if($base_link == $start_link . $value["name_country_href"] . $end_link){
				$name_country_en = $value["name_country_en"];
				$href_country_en = $start_link . $value["name_country_href"] . $end_link;
			}
		}

		foreach($libcountry as $value){
			if($base_link == $start_link . $value["rate_city_country"] . $end_link){
				$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
			}
		}
	} else {
		$start_link = "en/";
		foreach(${"lib" . $countryISO[2]} as $value){
			if ($base_link == $start_link . $value["name_href"] . $end_link){
				$href_city_en = $start_link . $value["name_href"] . $end_link;
				$name_city_en = $value["name_en"];
			}
		}

		foreach($libcountry as $value){
			if($base_link == $start_link . $value["name_country_href"] . $end_link){
				$name_country_en = $value["name_country_en"];
				$href_country_en = $start_link . $value["name_country_href"] . $end_link;
			}
		}

		foreach($libcountry as $value){
			if($base_link == $start_link . $value["rate_city_country"] . $end_link){
				$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
			}
		}
	}		

}

$meta_title = '';

if ($countryISO[1] == "en") {
			
	$start_link = "en/";
	if ($countryISO[2] != "gb"){
		foreach(${"lib" . $countryISO[2]} as $value){
			if ($base_link == $start_link . $value["name_href"] . $end_link){
				$href_city_en = $start_link . $value["name_href"] . $end_link;
				$name_city_en = $value["name_en"];
			}
		}
	} 
	

	foreach($libcountry as $value){
		if($base_link == $start_link . $value["name_country_href"] . $end_link){
			$name_country_en = $value["name_country_en"];
			$href_country_en = $start_link . $value["name_country_href"] . $end_link;
		}
	}

	foreach($libcountry as $value){
		if($base_link == $start_link . $value["rate_city_country"] . $end_link){
			$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
		}
	}



	if ($base_link == "en/population-of-earth"){
		$meta_title .= "Текущая статистика численности населения: мира, стран, городов";
	} elseif ($base_link == $href_city_en){
		foreach(${"lib" . $countryISO[2]} as $value){
		if ($base_link == $start_link . $value["name_href"] . $end_link){
			$name_city = $value["name_ru"];
			$meta_title .= "Population of $name_city_en in $year - statistics";
		}
	}	
	unset($value);
	} elseif ($base_link == $href_country_en) {
			foreach($libcountry as $value){
			if($base_link == $start_link . $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$meta_title .= "Population of $name_country_en in $year";
			}
		}
	} elseif ($base_link == $href_rate_city_en) {
		foreach($libcountry as $value){
			if($base_link == $start_link . $value["rate_city_country"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$name_country_en = $value["name_country_en"];
				$href_rate_city =  $value["rate_city_country"];
				$meta_title .= "List of cities in $name_country_en by population";
			}
		}
	}

} else {
	$start_link_ru = "ru/";
	if ($server_link != ("/")){
		if ($base_link != "ru/gb/population-of-united-kingdom.html"){
			foreach(${"lib" . $countryISO[2]} as $value){
				if ($base_link == $start_link_ru . $value["name_href"] . $end_link){
					$href_city = $start_link_ru . $value["name_href"] . $end_link;
				}
			}
		}	
	} 

	foreach($libcountry as $value){
		if($base_link == $start_link_ru . $value["name_country_href"] . $end_link){
			$name_country = $value["name_country_ru"];
			$href_country = $start_link_ru . $value["name_country_href"] . $end_link;
		}
	}

	foreach($libcountry as $value){
		if($base_link == $start_link_ru . $value["rate_city_country"] . $end_link){
			$href_rate_city = $start_link_ru .  $value["rate_city_country"] . $end_link;
		}
	}


	if($_SERVER['REQUEST_URI'] == "/"){
		$meta_title .= "Текущая статистика численности населения: мира, стран, городов";
	} elseif ($base_link == "$href_city"){
		foreach(${"lib" . $countryISO[2]} as $value){
		if ($base_link == $start_link_ru . $value["name_href"] . $end_link){
			$name_city = $value["name_ru"];
			$meta_title .= "Население города $name_city. Узнайте сколько людей живет в городе $name_city";
			break;
		}
	}	
	unset($value);
	} elseif ($base_link == "$href_country") {
		foreach($libcountry as $value){
			if($base_link == $start_link_ru . $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$name_country_zz = $value["name_country_ru_zz"];
				$meta_title .= "Население $name_country_zz. Узнайте сколько людей живет в стране $name_country";
			}
		}
	} elseif ($base_link == "$href_rate_city") {
		foreach($libcountry as $value){
			if($base_link == $start_link_ru . $value["rate_city_country"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$name_country_zz = $value["name_country_ru_zz"];
				$href_rate_city = $start_link_ru . $value["rate_city_country"];
				$meta_title .= "Самые крупные города $name_country_zz по численности населения";
			}
		}
	}
}

$meta_descr = '';

if ($countryISO[1] == "en"){
	$start_link = "en/";
	if ($countryISO[2] != "gb"){
		foreach(${"lib" . $countryISO[2]} as $value){
			if ($base_link == $start_link . $value["name_href"] . $end_link){
				$href_city_en = $start_link . $value["name_href"] . $end_link;
				$name_city_en = $value["name_en"];
			}
		}
	}

	foreach($libcountry as $value){
		if($base_link == $start_link . $value["name_country_href"] . $end_link){
			$name_country_en = $value["name_country_en"];
			$href_country_en = $start_link . $value["name_country_href"] . $end_link;
		}
	}

	foreach($libcountry as $value){
		if($base_link == $start_link . $value["rate_city_country"] . $end_link){
			$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
		}
	}

	if($base_link == "en/population-of-earth"){
		$meta_descr .= "Текущая статистика численности населения: мира, стран, городов";
	} elseif ($base_link == $href_city_en){
		foreach(${"lib" . $countryISO[2]} as $value){
		if ($base_link == $start_link . $value["name_href"] . $end_link){
			$name_city = $value["name_ru"];
			$meta_descr .= "Population of the city of $name_city_en in $year";
		}
	}	
	unset($value);
	} elseif ($base_link == $href_country_en) {
		foreach($libcountry as $value){
		if($base_link == $start_link . $value["name_country_href"] . $end_link){
			$name_country =  $value["name_country_ru"];
			$meta_descr .= "Population of the country of $name_country_en in $year";
		}
	}
	} elseif ($base_link == $href_rate_city_en) {
		foreach($libcountry as $value){
		if($base_link == $start_link . $value["rate_city_country"] . $end_link){
			$name_country =  $value["name_country_ru"];
			$name_country_en = $value["name_country_en"];
			$href_rate_city =  $value["rate_city_country"];
			$meta_descr .= "Rating: List of cities in $name_country_en by population - all-populations.com";
		}
	}
	}
} else {
if(urldecode($_SERVER['REQUEST_URI']) == "/"){
	$meta_descr .= "Здесь вы узнаете сколько людей живет на планете, численность населения каждой страны и каждого города. Рейтинги стран и городов по численности населения.";
} elseif ($base_link == "$href_city"){
	foreach(${"lib" . $countryISO[2]} as $value){
	if ($base_link == $start_link_ru . $value["name_href"] . $end_link){
		$name_city = $value["name_ru"];
		$meta_descr .= "Актуальные данные о численности населения города $name_city на 2020 год. Узнайте сколько человек проживает в городе.";
		break;
	}
}	
unset($value);
} elseif ($base_link == "$href_country") {
	foreach($libcountry as $value){
	if($base_link == $value["name_country_href"] . $end_link){
		$name_country =  $value["name_country_ru"];
		$meta_descr .= "Актуальные данные о численности населения $name_country_zz на 2020 год. Узнайте сколько человек проживает в стране.";
	}
}
} elseif ($base_link == "$href_rate_city" . $end_link) {
	foreach($libcountry as $value){
	if($base_link == $value["rate_city_country"] . $end_link){
		$name_country =  $value["name_country_ru"];
		$meta_descr .= "Рейтинг городов $name_country_zz по численности населения на 2020 год. Узнайте список самых крупных городов $name_country_zz";
	}
}
}
}
?>