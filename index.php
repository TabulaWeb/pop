<?php 
$server_link = urldecode($_SERVER['REQUEST_URI']);
$countryISO = explode("/", $server_link);
$end_link = ".html";

if ($countryISO[1] == "en"){
	include 'en/inc/linkadd.php';
} else {
	include 'ru/inc/linkadd.php';
}
if ($countryISO[1] == "en"){
	include 'en/inc/config.php';
} else {
	include 'ru/inc/config.php';
}
include 'core/function.php'; 
if ($_SERVER['REQUEST_URI'] == "/"){
	include 'core/libby.php';
} elseif ( $countryISO[1] == "en" ){
	if ($countryISO[2] == "gb") {
		include "core/libeng.php";
	} else {
		include "core/lib$countryISO[2].php";
	}
} elseif ( $countryISO[1] == "gb") {
	include "core/libeng.php";
} else {
	include "core/lib$countryISO[1].php";
}
include 'core/libcountry.php';

if ($countryISO[1] == "en"){
	if ($countryISO[2] == "gb"){
		foreach($libeng as $value){
			if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
				$href_city_en = $start_link . $value["name_href"] . $end_link;
				$name_city_en = $value["name_en"];
			}
		}

		foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
				$name_country_en = $value["name_country_en"];
				$href_country_en = $start_link . $value["name_country_href"] . $end_link;
			}
		}

		foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
				$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
			}
		}
	} else {
		$start_link = "en/";
		foreach(${"lib" . $countryISO[2]} as $value){
			if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
				$href_city_en = $start_link . $value["name_href"] . $end_link;
				$name_city_en = $value["name_en"];
			}
		}

		foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
				$name_country_en = $value["name_country_en"];
				$href_country_en = $start_link . $value["name_country_href"] . $end_link;
			}
		}

		foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
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
			if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
				$href_city_en = $start_link . $value["name_href"] . $end_link;
				$name_city_en = $value["name_en"];
			}
		}
	} 
	

	foreach($libcountry as $value){
		if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
			$name_country_en = $value["name_country_en"];
			$href_country_en = $start_link . $value["name_country_href"] . $end_link;
		}
	}

	foreach($libcountry as $value){
		if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
			$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
		}
	}



	if (ltrim($server_link, "/") == "en/population-of-earth"){
		$meta_title .= "Текущая статистика численности населения: мира, стран, городов";
	} elseif (ltrim($server_link, "/") == $href_city_en){
		foreach(${"lib" . $countryISO[2]} as $value){
		if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
			$name_city = $value["name_ru"];
			$meta_title .= "Population of $name_city_en in $year - statistics";
		}
	}	
	unset($value);
	} elseif (ltrim($server_link, "/") == $href_country_en) {
			foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$meta_title .= "Population of $name_country_en in $year";
			}
		}
	} elseif (ltrim($server_link, "/") == $href_rate_city_en) {
		foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$name_country_en = $value["name_country_en"];
				$href_rate_city =  $value["rate_city_country"];
				$meta_title .= "List of cities in $name_country_en by population";
			}
		}
	}

} else {

	if ($server_link != ("/")){
		if (ltrim($server_link, "/") != "gb/population-of-united-kingdom.html"){
			foreach(${"lib" . $countryISO[1]} as $value){
				if (ltrim($server_link, "/") == $value["name_href"] . $end_link){
					$href_city = $value["name_href"] . $end_link;
				}
			}
		}	
	} 

	foreach($libcountry as $value){
		if(ltrim($server_link, "/") == $value["name_country_href"] . $end_link){
			$name_country = $value["name_country_ru"];
			$href_country = $value["name_country_href"] . $end_link;
		}
	}

	foreach($libcountry as $value){
		if(ltrim($server_link, "/") == $value["rate_city_country"] . $end_link){
			$href_rate_city =  $value["rate_city_country"] . $end_link;
		}
	}


	if($_SERVER['REQUEST_URI'] == "/"){
		$meta_title .= "Текущая статистика численности населения: мира, стран, городов";
	} elseif (ltrim($server_link, "/") == "$href_city"){
		foreach(${"lib" . $countryISO[1]} as $value){
		if (ltrim($server_link, "/") == $value["name_href"] . $end_link){
			$name_city = $value["name_ru"];
			$meta_title .= "Население города $name_city. Узнайте сколько людей живет в $name_city";
		}
	}	
	unset($value);
	} elseif (ltrim($server_link, "/") == "$href_country") {
		foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$meta_title .= "Население $name_country. Узнайте сколько людей живет в $name_country";
			}
		}
	} elseif (ltrim($server_link, "/") == "$href_rate_city") {
		foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $value["rate_city_country"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$href_rate_city =  $value["rate_city_country"];
				$meta_title .= "Самые крупные города $name_country по численности населения";
			}
		}
	}
}




// ===================================================================== //
?>
<!DOCTYPE html>
<?php
echo $doctypedown;
echo $htmlup;
?>
<html xmlns='http://www.w3.org/1999/xhtml' lang='ru'>
<?php
echo $htmldown;
echo $headup;
?>
<head>
<?php
echo $headdown;

?>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- TITLE -->
	<title> <?php print $meta_title;?></title>
	<!-- DESCRIPTION -->
	<meta name='description' content='
	<?php
		if ($countryISO[1] == "en"){
			$start_link = "en/";
			if ($countryISO[2] != "gb"){
				foreach(${"lib" . $countryISO[2]} as $value){
					if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
						$href_city_en = $start_link . $value["name_href"] . $end_link;
						$name_city_en = $value["name_en"];
					}
				}
			}

			foreach($libcountry as $value){
				if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
					$name_country_en = $value["name_country_en"];
					$href_country_en = $start_link . $value["name_country_href"] . $end_link;
				}
			}

			foreach($libcountry as $value){
				if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
					$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
				}
			}

			if(ltrim($server_link, "/") == "en/population-of-earth"){
				print("Текущая статистика численности населения: мира, стран, городов");
			} elseif (ltrim($server_link, "/") == $href_city_en){
				foreach(${"lib" . $countryISO[2]} as $value){
				if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
					$name_city = $value["name_ru"];
					print("Population of the city of $name_city_en in $year");
				}
			}	
			unset($value);
			} elseif (ltrim($server_link, "/") == $href_country_en) {
				foreach($libcountry as $value){
				if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
					$name_country =  $value["name_country_ru"];
					print "Population of the country of $name_country_en in $year";
				}
			}
			} elseif (ltrim($server_link, "/") == $href_rate_city_en) {
				foreach($libcountry as $value){
				if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
					$name_country =  $value["name_country_ru"];
					$name_country_en = $value["name_country_en"];
					$href_rate_city =  $value["rate_city_country"];
					print "Rating: List of cities in $name_country_en by population - all-populations.com";
				}
			}
			}
		} else {
		if(urldecode($_SERVER['REQUEST_URI']) == "/"){
			print("Здесь вы узнаете сколько людей живет на планете, численность населения каждой страны и каждого города. Рейтинги стран и городов по численности населения.");
		} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_city"){
			foreach(${"lib" . $countryISO[1]} as $value){
			if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
				$name_city = $value["name_ru"];
				print("Актуальные данные о численности населения города $name_city на $year год. Узнайте сколько человек проживает в городе.");
			}
		}	
		unset($value);
		} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_country") {
			foreach($libcountry as $value){
			if(ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				print "Актуальные данные о численности населения $name_country на $year год. Узнайте сколько человек проживает в стране.";
			}
		}
		} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_rate_city" . $end_link) {
			foreach($libcountry as $value){
			if(ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["rate_city_country"] . $end_link){
				$name_country =  $value["name_country_ru"];
				print "Рейтинг городов $name_country по численности населения на 2020 год. Узнайте список самых крупных городов $name_country";
			}
		}
		}
		}
	?>
	'>
	
	<link rel='shortcut icon' href='/favicon.ico' type='image/x-icon'>

    <link href='/assets/css/bootstrap.css' rel='stylesheet'>
    <link href='/assets/css/font-awesome.min.css' rel='stylesheet'>
	<link href='/assets/css/main.css' rel='stylesheet'>
	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
 
<?php
echo $headtop;
?>
  </head>
<?php
echo $headfoot;
echo $bodyup;
?>
<body itemscope='itemscope' itemtype='http://schema.org/WebPageElement'> 
<?php
echo $bodydown;
?>

	<nav class='navbar navbar-inverse navbar-fixed-top' itemscope='' itemtype='http://www.schema.org/SiteNavigationElement'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
		<a class='navbar-brand' href='/'><span style='color: #f3e99a;'>all-</span>populations<span style='color: #eee;'>.com</span></a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav navbar-left'>
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-countries-by-population.html'>Страны</a></li>
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-kingdoms-by-population.html'>Королевства</a></li>
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-republics-by-population.html'>Республики</a></li>
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-cities-by-population.html'>Города</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	<?php  
	if(urldecode($_SERVER['REQUEST_URI']) == "/"){
	  // PAGE HOME__START
	  	include 'Pages/HomePageRu.php';
	  // PAGE HOME__END
	} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_city"){
	  // PAGE CITY__START
		include 'Pages/CityPageRu.php';
	  // PAGE CITY__END
	} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_country"){
	  // PAGE COUNTRY__START
	    include 'Pages/CountryPageRu.php';
	  // PAGE COUNTRY__END
	} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_rate_city" . $end_link){
	  // PAGE RATE CITY START
	    include 'Pages/RateCityRu.php';
	} elseif ($countryISO[1] == "en"){
		// ENG_VERSION

		if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_city_en"){
		  // ENG_VERSION CITY_START
		    include 'Pages/CityPageEn.php';
		  // ENG_VERSION CITY_END
		} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_country_en") {
		  // ENG_VERSION COUNTRY_START
		    include 'Pages/CountryPageEn.php';
		  // ENG_VERSION COUNTRY_END
		} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_rate_city_en"){
		  // ENG_VERSION RATE_CITY_START
		    include 'Pages/RateCityEn.php';
		  // ENG_VERSION RATE_CITY_END
		} 
			
	} else {
		
		?>
		<!-- Страница не найдена -->
		<?php
		// print($_SERVER["SERVER_PROTOCOL"]);
		http_response_code(404);
		include('404.html'); // provide your own HTML for the error page
		die();
	}
	
	?>
		<footer itemscope='itemscope' itemtype='http://schema.org/WPFooter'>
		<?php
		echo $footerup;
		?>
			<div class='container'>
				<div class='row centered' itemprop='text'>
					<p>© All-populations.com - <?php echo $year;?></p>
					<p>Узнайте численность населения в вашем регионе!</p>
				</div>
			</div>
		<?php
		echo $footerdown;
		?>
		</footer>
	
    <script src='https://code.jquery.com/jquery-1.10.2.min.js'></script>
    <script async src='/assets/js/bootstrap.min.js'></script>
  <?php
  echo $bodytop;
  ?>
  </body>
  <?php
  echo $bodyfoot;
  ?>
</html>