<?php 
$server_link = urldecode($_SERVER['REQUEST_URI']);
$countryISO = explode("/", $server_link);
?>

<?php
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

<?php 
	$end_link = ".html"	
?>



  
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- TITLE -->
	<title> 
	<?php


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



			if(ltrim($server_link, "/") == "en/population-of-earth"){
				print("Текущая статистика численности населения: мира, стран, городов");
			} elseif (ltrim($server_link, "/") == $href_city_en){
				foreach(${"lib" . $countryISO[2]} as $value){
				if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
					$name_city = $value["name_ru"];
					print("Population of $name_city_en in $year - statistics");
				}
			}	
			unset($value);
			} elseif (ltrim($server_link, "/") == $href_country_en) {
				foreach($libcountry as $value){
				if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
					$name_country =  $value["name_country_ru"];
					print "Population of $name_country_en in $year";
				}
			}
			} elseif (ltrim($server_link, "/") == $href_rate_city_en) {
				foreach($libcountry as $value){
				if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
					$name_country =  $value["name_country_ru"];
					$name_country_en = $value["name_country_en"];
					$href_rate_city =  $value["rate_city_country"];
					print "List of cities in $name_country_en by population";
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
			print("Текущая статистика численности населения: мира, стран, городов");
		} elseif (ltrim($server_link, "/") == "$href_city"){
			foreach(${"lib" . $countryISO[1]} as $value){
			if (ltrim($server_link, "/") == $value["name_href"] . $end_link){
				$name_city = $value["name_ru"];
				print("Население города $name_city. Узнайте сколько людей живет в $name_city");
			}
		}	
		unset($value);
		} elseif (ltrim($server_link, "/") == "$href_country") {
			foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				print "Население $name_country. Узнайте сколько людей живет в $name_country";
			}
		}
		} elseif (ltrim($server_link, "/") == "$href_rate_city") {
			foreach($libcountry as $value){
			if(ltrim($server_link, "/") == $value["rate_city_country"] . $end_link){
				$name_country =  $value["name_country_ru"];
				$href_rate_city =  $value["rate_city_country"];
				print "Самые крупные города $name_country по численности населения";
			}
		}
		}
		}
	?>
	</title>
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
		}else {
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
	<meta name='keywords' content='
	
	<?php

		// if ($countryISO[1] == "en"){
		// 	$start_link = "en/";
		// 	if ($countryISO[2] != "gb") {
		// 		foreach(${"lib" . $countryISO[2]} as $value){
		// 			if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
		// 				$href_city_en = $start_link . $value["name_href"] . $end_link;
		// 				$name_city_en = $value["name_en"];
		// 			}
		// 		}
		// 	}

		// 	foreach($libcountry as $value){
		// 		if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
		// 			$name_country_en = $value["name_country_en"];
		// 			$href_country_en = $start_link . $value["name_country_href"] . $end_link;
		// 		}
		// 	}

		// 	foreach($libcountry as $value){
		// 		if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
		// 			$href_rate_city_en = $start_link . $value["rate_city_country"] . $end_link;
		// 		}
		// 	}



		// 	if(ltrim($server_link, "/") == "en/population-of-earth"){
		// 		print("Текущая статистика численности населения: мира, стран, городов");
		// 	} elseif (ltrim($server_link, "/") == $href_city_en){
		// 		foreach(${"lib" . $countryISO[2]} as $value){
		// 		if (ltrim($server_link, "/") == $start_link . $value["name_href"] . $end_link){
		// 			$name_city = $value["name_ru"];
		// 			print("Population of $name_city_en, population of $name_city_en in $year");
		// 		}
		// 	}	
		// 	unset($value);
		// 	} elseif (ltrim($server_link, "/") == $href_country_en) {
		// 		foreach($libcountry as $value){
		// 		if(ltrim($server_link, "/") == $start_link . $value["name_country_href"] . $end_link){
		// 			$name_country =  $value["name_country_ru"];
		// 			print "Population of $name_country_en, population of $name_country_en in $year";
		// 		}
		// 	}
		// 	} elseif (ltrim($server_link, "/") == $href_rate_city_en) {
		// 		foreach($libcountry as $value){
		// 		if(ltrim($server_link, "/") == $start_link . $value["rate_city_country"] . $end_link){
		// 			$name_country =  $value["name_country_ru"];
		// 			$name_country_en = $value["name_country_en"];
		// 			$href_rate_city =  $value["rate_city_country"];
		// 			print "List of cities in $name_country_en by population";
		// 		}
		// 	}
		// 	}
		// }else {
		// if(urldecode($_SERVER['REQUEST_URI']) == "/"){
		// 	print("Здесь вы узнаете сколько людей живет на планете, численность населения каждой страны и каждого города. Рейтинги стран и городов по численности населения.");
		// } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_city"){
		// 	foreach(${"lib" . $countryISO[1]} as $value){
		// 	if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
		// 		$name_city = $value["name_ru"];
		// 		print("Численность населения $name_city, население $name_city на $year год");
		// 	}
		// }	
		// unset($value);
		// } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_country") {
		// 	foreach($libcountry as $value){
		// 	if(ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_country_href"] . $end_link){
		// 		$name_country =  $value["name_country_ru"];
		// 		print "Численность населения $name_country, население $name_country на $year год";
		// 	}
		// }
		// } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_rate_city" . $end_link) {
		// 	foreach($libcountry as $value){
		// 	if(ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["rate_city_country"] . $end_link){
		// 		$name_country =  $value["name_country_ru"];
		// 		print "список городов $name_country по населению";
		// 	}
		// }
		// }
		// }
	?>
	
	'>
	
	<link rel='shortcut icon' href='/favicon.ico' type='image/x-icon'>

    <link href='/assets/css/bootstrap.css' rel='stylesheet'>
    <link href='/assets/css/font-awesome.min.css' rel='stylesheet'>
	<link href='/assets/css/main.css' rel='stylesheet'>
	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
      <script src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
    <![endif]-->
	
	<meta property='og:title' content='
	<?php 
	foreach(${"lib" . $countryISO[1]} as $value){
		if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"]){
			$name_city = $value["name_ru"];
			$href_city = $value["name_href"];
			print("Население города $name_city. Узнайте сколько людей живет в $name_city");
		}
	}
	unset($value);

	foreach($libcountry as $value){
		if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_country_href"]){
			$name_country = $value["name_country_ru"];
			$href_country = $value["name_country_href"];
			print "Население $name_country. Узнайте сколько людей живет в $name_country";
		}
	}

	foreach($libcountry as $value){
			if(ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["rate_city_country"]){
				$href_rate_city =  $value["rate_city_country"];
			}
		}
	?>
	' />
	<meta property='og:description' content='
	<?php 
	foreach(${"lib" . $countryISO[1]} as $value){
		if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"]){
			print("Актуальные данные о численности населения города $name_city на $year год. Узнайте сколько человек проживает в городе.");
		}
	}
	unset($value);

	foreach($libcountry as $value){
		if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_country_href"]){
			$name_country =  $value["name_country_ru"];
			print "Актуальные данные о численности населения $name_city на $year год. Узнайте сколько человек проживает в стране.";
		}
	}
	?>
	' />
	<meta property='og:type' content='website' />
 
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

<!-- // print $libby[ltrim($_SERVER['REQUEST_URI'], '/')]['name_ru'].' <br/>';
// print $libby[ltrim($_SERVER['REQUEST_URI'], '/')]['name_en'].' <br/>';
// print $libby[ltrim($_SERVER['REQUEST_URI'], '/')]['name_href'].' <br/>';
// print $libby[ltrim($_SERVER['REQUEST_URI'], '/')]['count'].' <br/>';
// print $libby[ltrim($_SERVER['REQUEST_URI'], '/')]['real_id'].' <br/>'; --> 



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
	// PAGE HOME__START
	if(urldecode($_SERVER['REQUEST_URI']) == "/"){
		?>
		
		<div class="container">
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">Статистика населения</h1>
				</div>
				
				<div itemprop="text">
					<p>Текущая статистика населения в мире.</p>
				</div>
				
				<div class="showinfo">
					<div class="row">
					
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="/ru/population-of-earth.html">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">Население земли / RU</span>
							</a>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="/en/population-of-earth.html">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">World population / EN</span>
							</a>
							</div>
						</div>
						
					</div>
				</div>
				<p>Доступная информация по населению любого региона, быстрая работа сайта и постоянное обновление информации являются основой нашего ресурса.</p>

				<div itemprop="text">
					<h2>Численность населения</h2>

					<p>На сайте вы найдете текущую статистику населения в мире. Вам доступна информация по населению любого региона, страны, города. Информация актуальна: базовые цифры обновляются в реальном времени. Мы используем данные, публикуемые Фондом ООН в области народонаселения. </p>
				</div>
				<div itemprop="text">
					<h2>Перенаселение земли?</h2>

					<p>В доиндустриальную эпоху проблемы увеличения численности землян решалась просто: войны. Наравне с болезнями и эпидемиями войны прекрасно приводили рост населения примерно к нулю. В 17 веке европейская и английская демография преподнесла сюрприз: среднее число детей на одну женщину незначительно выросло, что быстро увеличило население Европы.  Для Англии и Уэльса цифры такие:</p>
					<ul>
						<li>
							<p>1650 – 4,8 млн.</p>
						</li>
						<li>
							<p>1700 – 5,8 млн.</p>
						</li>
						<li>
							<p>1750 – 6,3 млн.</p>
						</li>
					</ul>
					<p>Выходит 1,5 млн человек за сто лет! Что стало с этим “излишком”? Эти люди отправились в заморские колонии (Америку) и через 100 лет построили там великую страну.
В 19 веке английский ученый Мальтус напугал всех истощением ресурсов земли и ужасными катастрофами в связи с наблюдаемым им продолжающимся быстрым ростом населения в Англии в 19 в.  (1800 г. - уже 9 млн чел.). Но даже английские ученые бывают не всегда правы. Ближайшее будущее показало, что Мальтус не учел стремительный прогресс производительных сил, который позволил накормить миллиарды людей на планете. Поэтому сегодня говорить о перенаселении стоит осторожно, с поправкой на отдельные  регионы (города) и сообразуясь с экономической ситуацией в этом месте. Реальное беспокойство вызывает демографическая ситуация в Африке, в которой по прогнозам в 2030 г. будет проживать 1,7 млрд чел., в 2050 г - 2,5 млрд. и 4,7 млрд. в в 2100 г.
</p>
				</div>
				<div itemprop="text">
					<h2>Депопуляция?</h2>

					<p>На нашей планете проживает семь с лишним миллиардов человек. И вдруг раздаются голоса о том, что нам грозит депопуляция. Что это значит? Рост населения земли шел неравномерно: до 17 в – очень медленно, в 17 - 19 вв – немного быстрее, в 20 веке - очень быстро, в 21 веке - намного медленнее, а к концу текущего  века станет, возможно, отрицательным. Но одновременно вторая половина 20 века продемонстрировала невиданный ранее рост продолжительности жизни. Это привело к тому, что одновременно на планете стало жить много разных поколений людей (когорты населения), которые вносят разный вклад в общую динамику роста (сокращения) населения. Сейчас рост населения происходит за счет вклада пожилых людей в среднюю продолжительность жизни, а не высокой рождаемости. Поэтому если на планете случится что-то похуже чем Ковид-19 (который сильно ударил по пожилым людям), то и развитые страны сразу почувствуют реальную депопуляцию. Кроме того, обсуждаемый термин употребляется и в экономическом смысле: хватит ли (молодых, работоспособных) людей, которые будут кормить людей старшего возраста, которые уже не могут работать? Поэтому термин депопуляции скорее нужно относить к определенным возрастным группам  (чаще молодых). Такая вот многоликая депопуляция: вроде ее нет, а она есть.
</p>
					<p>Уже сегодня пора начинать думать о том, как человечество будет жить при депопуляционных процессах. Для многих стран, в которых второй демографический переход уже завершен,  это реальность сегодняшнего дня. Глобальный коэффициент рождаемости уже сегодня сократился сократился вдвое от максимального уровня. Для развитых стран показатель прироста минимальный, на уровне естественного воспроизводства.  Средний возраст жителя земли растет, особенно быстро в развитых странах. Чемпион здесь – Япония. Усредненный возраст Японца 48 лет. Ожидается, что победителем в этом необычном возрастном марафоне в 2100 году станет Албания. Албания со средним возрастом 61 год. Таким образом встают закономерные вопросы: кто будет обеспечивать стареющее население, как обеспечить пенсионное обеспечение людям? Хватит ли работоспособных людей, чтобы оказывать людям старшего возраста медицинские, социальные, бытовые услуги (даже если представить, что пенсионные фонды стран не перегреются от повышенной нагрузки).</p>
				</div>
				<?php
				echo $section;
				?>
			</section>

			<aside itemscope="" itemtype="http://schema.org/WPSideBar" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">		
			<?php 
			echo $asideup;
			?>
				<ul class="parent-menu-list">
					<li>
						<a itemprop="url" href="ru/list-of-countries-by-population.html" title="List of countries by population">
							<span itemprop="name">Список стран по численности населения</span>
						</a>
						<ul class="child-menu-list">
							<li>
								<a itemprop="url" href="cn/population-of-china.html" title="Population of China">
									<span itemprop="name">Население Китая</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="in/population-of-india.html" title="Population of India">
									<span itemprop="name">Население Индии</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="us/population-of-usa.html" title="Population of USA">
									<span itemprop="name">Население США</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="id/population-of-indonesia.html" title="Population of Indonesia">
									<span itemprop="name">Население Индонезии</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="pk/population-of-pakistan.html" title="Population of Pakistan">
									<span itemprop="name">Население Пакистана</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<?php
				echo $ads3;
				?>
				<?php
				echo $asidedown;
				?>
			</aside>
			
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-body">
					<div class="row">
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class="last-view col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
	</div>
	</div>
	<?php
	// PAGE HOME__END
	} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_city"){
	// PAGE CITY__START
		?>
	<div class='container'>
		
		<div class='row'>

				<?php echo $ads1; ?>

		</div>
		
		<div class='row b'>
			<div id='breadcrumbs'>
				<div id='breadcrumbs-inner'>
					<ul itemscope='' itemtype='http://schema.org/BreadcrumbList'>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/ru/population-of-earth.html' itemprop='item'>
								<span itemprop='name'>Население Земли</span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_href"]);
									}
								}
								unset($value);
								?>' itemprop='item'>
								<span itemprop='name'>Население <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?></span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<span itemprop='item'>
								<span itemprop='name'>Население <?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
										break;
									}
								}
								unset($value);
								?></span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>

		<div class='row'>
		
			<section class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-heading' >
					<h1 itemprop='headline'>Численность населения 
					<?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
										break;
									}
								}
								unset($value);
								?>
					</h1>
				</div>
				
			
					<div  itemprop='text'>	
						<p>
						<?php
						if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "jp/population-of-tokyo.html"){
							print("На 2020 год численность населения города");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-shanghai.html"){
							print("На 2020 год численность населения города");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-istanbul.html"){
							print("На 2020 год численность населения города");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-hong-kong.html"){
							print("На 2020 год численность населения города");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/population-of-moscow.html"){
							print("На 2020 год численность населения города");
						} else {
							print("На $year год численность населения города");
						}
						?>	
						<strong>
						<?php 
							foreach(${"lib" . $countryISO[1]} as $value){
								if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
									print($value["name_ru"]);
									break;
								}
							}
							unset($value);
						?>
						</strong>, 
						<?php
							foreach($libcountry as $value){
								if ($countryISO[1] == $value["country_iso"]){
									print($value["name_country_ru_zz"]);
								}
							}
							unset($value);
						?> - составляет <span class='pop-info'>
						<?php 
							foreach(${"lib" . $countryISO[1]} as $value){
								if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
									print($value["count"]);
									break;
								}
							}
							unset($value);
						?>
						</span> человек. <?php
						if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "jp/population-of-tokyo.html" ){
							print("Наш сайт использовал данные количества населения из официальных источников.");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-shanghai.html") {
							print("Наш сайт использовал данные количества населения из официальных источников.");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-istanbul.html") {
							print("Наш сайт использовал данные количества населения из официальных источников.");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "eng/population-of-london.html") {
							print("");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-beijing.html") {
							print("");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-hong-kong.html"){
							print("Наш сайт использовал данные количества населения из официальных источников.");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/population-of-moscow.html"){
							print("Наш сайт использовал данные количества населения из официальных источников.");
						} else {
							print("All-populations.com использовал данные количества населения из официальных источников. Узнать, какая статистика населения страны, города, района на All-populations.com.");
						}
						 
						?></p>
						
					</div>	
					
		
				<div class='showinfo'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						
							<?php echo $ads2;?>
							
						</div>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
							<div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
								<h3 class='naselenie'>
								<?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
										break;
									}
								}
								unset($value);
								?> - Население</h3>
								<span class='skolko'>
								<?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["count"]);
										break;
									}
								}
								unset($value);
								?> человек</span>
								<img src='https://all-populations.com/ru/images/
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["country_flag"]);
									}
								}
								unset($value);
								?>' itemprop='contentUrl' width='160' height='107' alt='Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?>' title='Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?></span>
								<span class='date'>На <?php echo $month; echo $year;?> год</span>
							</div>
						</div>
					</div>
				</div>
				<p>Доступная информация по населению любого региона, быстрая работа сайта и постоянное обновление информации являются основой нашего ресурса. Скоро на сайте появится возможность посмотреть <?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
										break;
									}
								}
								unset($value);
								?> на карте.</p>


				<?php
				
				if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "jp/population-of-tokyo.html"){
					print("<h2>Население города Токио</h2>");
					print("<p>Токио делится на непосредственно столицу Японии (Токийский столичный округ) с населением около 9 млн человек  и агломерацию “Большой Токио” (Столичный регион), в котором проживает около 40 млн человек (префектуры  Тиба, Канагава и Сайтама).</p>");
					print("<h2>Население Токио: динамика за 100 лет и прогноз</h2>");
					print("<p>Первая национальная перепись в 1920 г. показала уже 3,7 миллиона человек, проживающих в Токио. А в к 1962 году население Токио уже достигло 10 млн. Далее прирост населения уже не был столь значительным. В 2000 г зафиксировано 12 млн человек, в 2010 г - 13 млн. Прогнозные оценки говорят о том, городское население Токио станет постепенно сокращаться начиная с 2020 года и японская столица таким образом уступит лидерство Дели к 2028 году. Резкий демографический рост Токио, связанный с постоянным наплывом переселенцев из других префектур, привёл к резкому ухудшению экологических условий проживания, гиперинфляции цен на жилье. Сейчас уже невозможно представить увеличение численности населения Токио: демографический “раствор” слишком насыщен для современной агломерации.</p>");
					print("<h2>Плотность населения Токио</h2>");
					print("<p>Вышеприведенные цифры показывают, что плотность людей в Токио самая высокая в Японии – порядка  6000 чел/кв.км. Самая населенная  часть Токио включает историко-административный центр с районами Тиёда, Тюо и Минато. Из-за земельного коллапса Япония начала активно строить искусственные острова в Токийском заливе. Из таких проектов выделяются международный аэропорт Кансай и “Остров Мечты” – искусственный остров, построенный полностью из отходов.
					</p>");
					print("<p>Собственно для Токио интересно явление непостоянной плотности: в дневное время население увеличивается более чем на 2,5 млн работников и студентов, приезжающих из соседних префектур. Особенно ярко этот эффект выражен для трех вышеназванных районов, чьё общее население составляет примерно 0,5 млн ночью  2,5 млн днём.</p>");
					print("<h2>Проблемы демографии города Токио</h2>");
					print("<p>Токио уже пережил максимальный прирост населения. За 50 лет с 1925 по 1975  годы население города выросло в 2,6 раза. Это значит, что среднегодовой прирост составлял 3,2% при среднегодовом росте населения страны в 1,5%. В 1960 году трудоспособное население Токио составляло до 70 % от всех проживающих. Однако 60-е годы уж продемонстрировали серьезный спад рождаемости, что привело к тому, с середины 90-х годов прошлого века сформировался процесс неуклонного старения населения Токио. 2005 г. дал следующий показатель: токийцы старше 64 лет составляли уже 20 % населения. Сегодня уже почти 30% токийцев старше 65 лет. Иностранцы также никак не могут повлиять на демографические процесс ибо их слишком мало в стране. По состоянию на 2005 год иностранцев в Токио проживало не более 3%. Население Токио еще не сокращается, а только стареет. У этого явления есть одно несомненное преимущество:  Токио является самым безопасным мегаполисом в мире.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-beijing.html"){
					print("<h2>Сколько людей в Пекине?</h2>");
					print("<p>Пекин является одним из крупнейших мегаполисов мира, который на сегодняшний день стал центром современной жизни перенаселенного Китая  и домом для двадцати с лишним миллионов человек. Территория государства и количество населения страны определили исторически сложившуюся многоступенчатую систему административного деления, что создает трудности в точности статистики. Официально Большой Пекин делится на 14 районов и два уезда, из которых 6 районов  образуют город, еще 6  – ближайшие пригороды, остальные расположены дальше всего от центра.
					В современном Китае проживает 56 национальностей. Среди пекинцев 95 % составляют этнические китайцы - ханьцы. Большинство жителей, а именно около 72,3%,  возрастом от 15 до 59 лет – основная группа трудящихся людей, жителей возрастом младше 15 лет проживает всего 10,5% от общей численности, а людей старше 60 лет насчитывается 17,2%.
					</p>");
					print("<h2>Население Пекина: динамика за 100 лет и прогноз.</h2>");
					print("<p>Официальные переписи населения проводились в 1953, 1964, 1982 и 1990 годах. После переписи 1990 года каждую последующую власти решили проводить через 10 лет после предыдущей. Самыми достоверными принято считать результаты 1982 года, по результатам которой в Китае оказалось чуть более миллиарда граждан. С восьмидесятых годов прошлого века в КНР наблюдается резкий спад рождаемости. Так в 1982 этот показатель рождаемости составлял более 18 человек на одну тысячу граждан, в 1990-м - 21 человек, в 2000-м - 14 человек, в 2010-м –- 11 человек.
					Население Пекина на  31 декабря 2012 года составило 20693 тыс. человек, из которых 12955 тысяч обладали пекинской пропиской, а остальные 7738 тысяч человек проживали по временным разрешениям. Кроме того, в мегаполисе живет и работает свыше 10 млн. трудовых мигрантов - самая незащищенная часть населения, являющаяся дешёвой рабочей силой.
					В последнее время Пекин стал показывать отрицательный рост населения. Возможно, демографическая политика государства и меры по сдерживанию наплыва мигрантов принесли свои плоды, либо начались процессы субурбанизации. Спрогнозировать трудно, но численность постоянных жителей Пекина упала на 6000 человек за прошедший год.
					</p>");
					print("<h2>Плотность населения в Пекине</h2>");
					print("<p>Территория страны, которая географически расположена в нескольких часовых поясах и разных климатических зонах, диктует неравномерное распределение населения, выбирающего селиться в более выгодных и комфортных регионах. Высокий уровень жизни привлекает население из ближних и дальних провинций, поэтому почти все мировые столицы и страдают избытком населения. Пекин входит в число самых густонаселенных городов мира, но в нём, относительно других регионов и городов Китая (например, региона Макао с особым статусом, где на квадратный километр приходится более 20 000 человек), довольно «свободно дышится» с плотностью населения 1311 чел/кв. км.</p>");
					print("<p>Неплохой набор информации:</p>");
					print("<a href='https://news.rambler.ru/sociology/э43775870-v-2019-godu-chislennost-postoyannyh-zhiteley-pekina-snizilas-a-dohody-na-dushu-naseleniya-kitayskoy-stolitsy-vyrosli/' >https://news.rambler.ru/sociology/э43775870-v-2019-godu-chislennost-postoyannyh-zhiteley-pekina-snizilas-a-dohody-na-dushu-naseleniya-kitayskoy-stolitsy-vyrosli/</a>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-istanbul.html"){
					print("<h2>Сколько людей проживает в Стамбуле?</h2>");
					print("<p>Стамбул по праву можно считать одним из древнейших городов, и на протяжении большей части своей истории он входит в число самых крупных городов мира, имея в своем архиве общепризнанное лидерство в этом списке.</p>");
					print("<p>Сегодня Стамбул - одна из крупнейших городских агломераций в Европе, которая занимает 3-е место по количеству жителей (15 067 724 человек) и включает в себя 39 округов с населением от 14 000 до 750 000 человек.</p>");
					print("<p>В Европейской части Стамбула, объединяющей 25 округов, проживает 2/3 населения города. Оставшаяся 1/3 - жители 14 округов,  расположенных в азиатской, или как ее еще называют, Анатолийской, части Стамбула.</p>");
					print("<ul><li>Соотношение числа мужчин к числу женщин практически одинаковое, с минимальным перевесом в пользу мужчин.</li></ul> <ul><li>Доля пожилого поколения сравнительно мала по отношению к молодежи: в  турецких семьях принято иметь много детей, поэтому рождаемость значительно превышает уровень смертности.</li></ul> <ul><li>Годовой рост населения Стамбула на 3,45 % является самым высоким среди семидесяти восьми крупнейших мегаполисов стран-членов ОЭСР (Организация экономического сотрудничества и развития).</li></ul>");
					print("<p>Несмотря на все исторические процессы, которыми богата турецкая земля, подавляющее большинство населения Стамбула (98%) идентифицируют себя с турецким этносом, хотя происхождение жителей города-гиганта, в силу сложных процессов миграции, очень разнообразно и позволяет называть турецкую столицу одним из самых космополитичных городов в мире.</p>");
					print("<h2>Население: динамика и прогноз</h2>");
					print("<p>Территория современного Стамбула была освоена еще за  2000 лет н.э.,  и к  500 году н.э.  с населением  400 000 - 500 000  человек  город стал крупнейшим в мире, обойдя Рим. Со временем Стамбул утратил звание самого населенного города мира: междоусобные войны, раздробленность и голод в период Средневековья сократили численность населения до 100 000. В XV веке была проведена первая официальная перепись населения, установившая численность населения в 175 000 человек. Город активно рос и развивался, в геометрической прогрессии увеличивались количество и плотность населения. И на протяжении 2,5 столетий с 1500 по 1750 год Стамбул оставался крупнейшим городом Европы.</p>");
					print("<p>В наше время Стамбул с уникальным географическим расположением называют городом для жизни. Создавая возможности для трудоустройства лицам без определенного места жительства, Стамбул стремительно увеличивает свою численность. К 1960-м годам население Стамбула насчитывало 1,5 млн человек. Понадобилось всего 30 лет, чтобы число жителей возросло практически в 6 раз и составило 6,5 млн человек. Особенно впечатляющий рост населения наблюдался во второй половине XX века, население города с 1945 по 2000 год увеличилось в десять раз.</p>");
					print("<p><b>Рост населения обусловлен:</b></p>");
					print("<ul><li>расширением городских границ;</li></ul> <ul><li>большим количеством трудовых мигрантов из других регионов Турции, а также из стран с низким экономическим развитием (в 2018 году в Стамбуле было зарегистрировано более 327 тысяч иностранцев);</li></ul> <ul><li>Стамбул занимает первое место в мире по количеству принятых беженцев (почти 559 тыс. человек.);</li></ul> <ul><li>только 28 % жителей города родились в нём.</li></ul>");
					print("<p>Согласно данным Турецкого статистического института, за последние пять лет численность населения Стамбула выросла на 6,4 %, а в 2019 году - более чем на 450 тыс. человек, составив 15,5 млн жителей.</p>");
					print("<h2>Плотность населения Стамбула</h2>");
					print("<p>Сегодня Стамбул - самый густонаселенный город Турции, на улицах которого становится  теснее, чем на московских. На 1 кв. км приходится 2480 чел./км² .</p>");
					print("<p>Мегаполис постоянно расширяется, сливается с близлежащими областями и уплотняется за счет строительства высотных сооружений.</p>");
				} elseif(ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "eng/population-of-london.html") {
					print("<p>Лондон многие столетия сохраняет за собой звание одного из самых крупных городов мира. Третий по величине город Европы административно образует регион Англии <b>Большой Лондон</b>, разделённый на 33 самоуправляемых территории. Население Лондона насчитывает  8 908 081 человек, из которых только 44%  - коренные белые британцы. Более половины жителей столицы – мигранты из стран Ближнего Востока, Польши, Индии, Франции, Италии и других стран.</p>");
					print("<p>Большой Лондон имеет официальное, но скорее географическое и статистическое,  деление на:</p>");
					print("<ul><li>32 округа и 12 районов, которые принадлежат Внутренней части;</li></ul> <ul><li>20 районов Внешнего Лондона;</li></ul> <ul><li>Лондонский Сити, с отдельным органом самоуправления.</li></ul>");
					print("<p>По данным переписи 2011 года в Лондоне проживало 8 173 900 человек . Статистика населения Лондона по возрасту 2011 года:</p>");
					print("<ul><li>64,4% – лондонцы трудоспособного возраста от 20 до 64 лет,</li></ul> <ul><li>17,3% – дети школьного возраста от 5 до 19 лет,</li></ul> <ul><li>10,7% – лица пожилого возраста от 65 лет,</li></ul> <ul><li>7,2% – дети дошкольного возраста  до 4 лет.</li></ul>");
					print("<p>Выявлен рост числа жителей Лондона старше 65 лет. Однако приток мигрантов в столицу не дает расти среднему возрасту горожан. Соотношение числа мужчин к числу женщин практически одинаковое.</p>");
					print("<h2>Население: динамика и прогноз</h2>");
					print("<p>Периоду урбанизации в Лондоне сопутствовал значительный рост числа населения и, примерно с 1825 по 1925 год,  столица Англии считалась самым населённым городом на планете, впоследствии отдав пальму первенства Нью-Йорку. Своего исторического максимума численность населения Лондона достигла к 1939 году, составив 8,6 млн. жителей.</p>");
					print("<p>C 1960-х до первой половины 1980-х годов город потерял около ¼ населения по причине эмиграционного оттока населения в Канаду, Австралию, США, который наложился на ограничительные меры правительства Великобритании относительно иммигрантов из стран Содружества и из Ирландии.</p>");
					print("<p>В последние несколько десятилетий Великобритания переживает масштабные демографические изменения, характеризующиеся массовым притоком мигрантов и значительным снижением численности британцев. Город неумолимо растет в размерах. Несмотря на высокую стоимость жизни и жесткие законы для иммигрантов, количество населения в столице постоянно увеличивается.</p>");
					print("<p>По данным Комитета национальной статистики в 2019 году из 8,8 миллионов, только для 5 500 тысяч  человек Лондон является родиной. Поэтому этот перенаселенный европейский город  является настоящим мультикультурным центром страны. В связи с этим мегаполис имеет несколько специфических национальных районов: Чайна-Таун (заселен китайцами), арабский анклав («Литтл Алджирс», «Литтл Каиро» и «Литтл Бейрут»), русский анклав (“Литтл Раша”) и многие другие “Литтл-мы-тут-не-местные”. Некоторые эксперты заявляют, что к 2031 году количество новых лондонцев-выходцев из других стран,  превысит количество коренного населения. Ведь уже сейчас каждый третий житель столицы Великобритании является приезжим.</p>");
					print("<h2>Плотность населения Лондона</h2>");
					print("<p>Плотность населения Лондона — 5667 чел./кв. км. Но есть в столице Великобритании такой клочок земли размером чуть менее 3 кв.кв, в котором в рабочий день сосредотачивается до 350 тыс. человек, двая удивительную цифру статистики: более 100 тыс человек на квадратный километр. Конечно, вы правильно догадались. Это Лондонский Сити. Сюда каждый рабочий день приезжают эти люди, чтобы делать деньги и двигать мировой капитализм вперед. Но вообще в Сити проживает (то есть квартируется) менее 10 тысяч человек. Поэтому без туристов ходить по Сити в ночное время должно быть комфортно.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-shanghai.html"){
					print("<h2>Сколько людей живёт в Шанхае?</h2>");
					print("<p>Шанхай – это большой город на востоке Китая с крупнейшим мировым торговым портом. По последним данным количество жителей в одном из самых густонаселенных городов мира составляет 24 237 800 чел.</p>");
					print("<p>Город центрального подчинения состоит из 1 уезда и 16 районов (с населением от 320 679 до 1 081 600 человек), которые делятся на более мелкие комитеты, поселения и волости. Минимальные единицы – это микрорайоны,  количество которых приближается к 4000 и более 1500 деревень.</p>");
					print("<p>Только на 60% процентов Шанхай населен китайцами. В состав населения Шанхая также входят:</p>");
					print("<ul><li>118 тысяч человек малых национальностей, из которых 7 тысяч хуэйцев</li></ul> <ul><li>и примерно 160 тысяч иностранцев приехавших из Европы, Америки, России и других государств</li></ul>");
					print("<h2>Население в Шанхае: динамика и прогноз</h2>");
					print("<p>В 1843 году Шанхай был открыт для иностранной торговли, после чего его население стало быстро увеличиваться за счет иммиграции и оккупации города иностранцами, которых влекли экономические выгоды.</p>");
					print("<p>И уже к 2000 году, согласно переписи население города составило 16,738 млн человек, из которых 3,871 млн временно проживающие в Шанхае. Прирост населения за 10 лет составил 25,5 %.</p>");
					print("<p>Мужчины составляют 51,4 %, женщины — 48,6 %.</p>");
					print("<p>Статистика по возрастам:</p>");
					print("<ul><li>пожилые люди старше 65 — 11,5 %,</li></ul> <ul><li>дети до 14 лет составляют 12,2 % населения,</li></ul> <ul><li>возрастная группа 15-64 года — 76,3 %.</li></ul>");
					print("<p>Мегаполис стремительно растет с каждым годом. Всего несколько десятилетий назад это было объединение из небольших поселков, а сегодня Шанхай — это самый развитый финансовый и торговый центр Китая с численностью населения в почти 25 миллионов, на территории которого расположены тысячи промышленных предприятий, производящих товары для всего мира.</p>");
					print("<h2>Проблемы демографии в Шанхае.</h2>");
					print("<p>Шанхай перенаселен, особенно его центральная часть. Это вызывает целый ряд проблем:</p>");
					print("<ul><li>большое число бездомных,</li></ul> <ul><li>нехватка жилых помещений,</li></ul> <ul><li>загруженность дорог,</li></ul> <ul><li>теснота на улицах и в метро.</li></ul>");
					print("<p>На сегодняшний день власти Шанхая приняли все меры, чтобы решить проблемы перенаселения. Управлением города было принято решение об ограничении количества граждан до 25 миллионов к 2035 году, а также установлена граница роста площади города. Законодательство по вопросам иммигрантов ужесточено, что привело к тому, что сегодня получить прописку в городе почти нереально. Введена программа помощи молодым семьям  при переезде в сельские районы в виде выплаты пособий.</p>");
					print("<p>Другая проблема – увеличение числа пожилых людей. Продолжительность жизни шанхайца перевалила за 80 лет. Низкая рождаемость не покрывает даже третьей часть показателей смертности и в ближайшее время, согласно прогнозам, пятая часть населения  достигнет пенсионного возраста.</p>");
					print("<h2>Плотность населения в Шанхае.</h2>");
					print("<p>На территории мегаполиса площадью почти в 6,5 тыс.кв. км. разместилось более 24 млн. человек, что заслуженно делает Шанхай самым густонаселенным городом Китая. Почти половину составляют внутренние мигранты, собравшиеся из множества провинций. Количество людей проживающих на каждом квадратном километре в Шанхае в двадцать раз превышает стандарты по Китаю.</p>");
					print("<p>Средняя плотность населения составляет не впечатлительные 3 500 человек на кв. км. Но если смотреть детальнее по районам, то картина рисуется иная. «Новый район Хуанпу» (самый центр города на берегу реки Хуанпу) имеет население более 600 тыс человек, но площадь всего 12,41 кв.км. О концентрации жизни даже подумать страшно. По этой причине путешественникам, которые впервые приехали в центр Шанхая и видели  столпотворение кажется, что это настоящий китайский муравейник, хотя и высокотехнологичный.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-hong-kong.html"){
					print("<h2>Сколько людей живёт в Гонконге?</h2>");
					print("<p>Гонконг – специальный административный район КНР. За счет своего выгодного географического положения, специального статуса протектората Великобритании (до последнего времени), развитой законодательной базе и уникальной инфраструктуре Гонконг стал одним из мировых финансовых центров и крупнейшим городом мира.</p>");
					print("<p>Гонконг еще сравнительно молодой город по населению. Основной группой являются люди возраста 25 - 54 года (45% населения города). Людей старше 65 лет - 17, 5%.Женское население немного преобладает над мужским.</p>");
					print("<p>95 % жителей Гонконга – этнические китайцы. Некоторые другие этнические группы могут формировать заметные социальные группы, например 150 тыс. филиппинцев, которые, как правило, работают помощниками по дому. В целом национальный состав очень разнообразен. В  коммерческом и финансовом секторе заметно влияние европейцев, американцев, австралийцев и др.</p>");
					print("<h2>Население в Гонконге: динамика и прогноз</h2>");
					print("<p>Население Гонконга растет с середины 19 в. С 1931 по 1941, потом  удвоилось к 1961 году ( до 1,6 миллиона человек), к 1961 г. (3,13 млн) и к 2001 (6,7 млн). Мы видим, что темпы роста населения сильно замедлились. В настоящее время идет снижение рождаемости от 8,6 рождений на 1000 человек в 2014 до 7,2 в 2018 году. После передачи суверенитета КНР над территорией Гонконга в 1997 году значительно увеличился приток иммигрантов из континентального Китая.</p>");
					print("<p>Средний показатель рождаемости детей в Гонконге – 203 человека в день. Показатель смертности почти в два раза ниже и составляет 122 человека в день. А ежегодный прирост населения за счет иммигрантов находится на уровне 30 тысяч человек.</p>");
					print("<p>Прогноз неутешительный: старение населения, падение естественного прироста. По прогнозам, в 2033 году 27 % населения будут составлять стареющие гонконгцы в возрасте 65 лет и старше, по сравнению с 12,1 % в 2005 году.</p>");
					print("<h2>Плотность населения в Гонконге.</h2>");
					print("<p>Гонконг – одна из самых густонаселенных зависимых территорий в мире, плотность населения составляет более 6 800  человек на км² . В границах же Гонконга расположен и самый густонаселенный остров в мире – Аплэйчау: почти 66 тыс чел / кв. км. Это делает Гонконг четвёртым  из наиболее густонаселенных регионов мире после Макао, Монако и Сингапура. За счет того, что большую часть площади Гонконга занимают горы, эти места сложно приспособить под проживание людей. Поэтому приток иммигрантов представляется сомнительным. Стоимость жизни в городе с учетом жилья и так очень высокая. Цены на 1 квадратный метр земли в Гонконге находятся на  одном из самых высоких уровней в мире.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/population-of-saint-petersburg.html"){
					print("<h2>Сколько людей живёт в Санкт-Петербурге?</h2>");
					print("<p>Петербург – второй по численности город в России и третий в Европе, или четвертый, если Стамбул считать европейским городом, но одновременно и первый, если не учитывать столичные европейские города. В общем, численность 5 398 064 человека на 2020 г. по данным Росстата. Еще одно демографическое достижение Питера: это самый северный город с населением более миллиона человек. Есть чем гордиться.</p>");
					print("<h2>Население в Санкт-Петербурге: динамика и прогноз.</h2>");
					print("<p>Самый быстрый рост населения Санкт-Петербурга было зафиксировано  с начала 20 в до Революции 1917 г. За этот непродолжительный период город прибавил более миллиона человек своего населения. Именно в этот период возрастная пирамида города на Неве была наиболее молодежной: средний возраст питерца составлял 17 лет. Эти люди немного позднее и сделали Октябрьский переворот в России. С начала 50-х и до 1990 г. шел очень быстрый рост населения города: с 1 миллиона человек до 5 млн. Конечно, это не был естественный прирост населения. Город рос за счет приезжих. Псковская область в это время быстро теряла своих людей.</p>");
					print("<h2>Проблемы демографии Петербурга</h2>");
					print("<p>Сейчас город находится на высшей точке демографического величия, даже несмотря на сильный спад перестроечных времен. Этот кризис был преодолен в сентябре 2012 года, когда родился пятимиллионный житель города.</p>");
					print("<p>На город оказывается сильное миграционное давление. По неофициальным источникам в городе проживает до миллиона незарегистрированных мигрантов-гастарбайтеров.</p>");
					print("<p>Перепись 2010 года показала, что в городе сильный гендерный дисбаланс: 45,6 % – мужчины и ,4 – женщины. Показатели продолжительности жизни растет второе десятилетие подряд. Так, в 2012 году средняя продолжительность жизни петербуржца составляла 67 лет, то сегодня уже перешла за 75-летний рубеж. Проблема старения населения города тем самым является актуальной.</p>");
					print("<h2>Плотность населения Питера</h2>");
					print("<p>Плотность населения города на Неве  — 3847,52 чел./км2 (2020 г). Но в Центральном районе города ситуация сильно отличается: имея площадь 17 кв. км, населения этой части города 215 тыс человек, что дает плотность населения 12,5 тыс. человек на кв. км. В качестве бонуса этим людям дается самое высокое качество жизни в городе.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/population-of-moscow.html"){
					print("<h2>Сколько живет людей в Москве?</h2>");
					print("<p>Москва – мегаполис и самый населенный город России, центр Московской городской агломерации с численностью постоянного населения не менее 17 млн. Самым населенным является Южный административный округ  с численностью постоянного населения  почти 1,8 млн человек. Меньше всего людей зарегистрировано в Центральном округе: 783 886 человек.</p>");
					print("<p>Москва поддерживает мировые тренды столичных городов на увеличение продолжительности жизни горожан: теперь москвичи живут дольше 74 лет, а москвички – 81 год. Как везде в России, женщин в Москве проживает больше, чем мужчин.</p>");
					print("<h2>Население Москвы: динамика и прогноз</h2>");
					print("<p>Исторические хроники говорят, что в 14 в. в Москве проживало до 50 тыс чел. В 1800 г. жителей в Москве было 250 000 человек. Согласно результатам первой городской переписи в 1871 году, численность населения Москвы составила чуть более 600 тыс. человек при площади Москвы 79 кв. км (граница шла по Камер-Коллежскому валу). К 2010 г площадь столицы увеличилась до 900 кв. км (в пределах МКАД). В 2012 к столице была присоединена территория Новой Москвы размеров в 1,5 тыс кв. км. Но на этой территории проживал всего  250 тыс. человек.</p>");
					print("<p>Первое удвоение населения Москвы случилось уже к 1905 г., к 1930 – следующее удвоение (2,4 млн чел), еще раз к 1956 г. и к 1998 последнее удвоение в истории города (9,8 млн). Демографическая наука полагает, что следующего удвоения не не случится, если не присоединить к Москве и Московскую область.</p>");
					print("<p>Но если рассматривать понятие Московской агломерации, которая связывает почти всю московскцю область и даже ближайшие </p>");
					print("<p>Естественным следствием этих низких показателей рождаемости идет массовый процесс старения населения города, прогнозируя возникновение новых трудностей.</p>");
					print("<h2>Плотность населения Москвы</h2>");
					print("<p>Плотность населения — в среднем 4950,44 чел/км². Но она очень разнится от округа к округу. Самым плотно заселенным является Северо-Восточный круг: более 14 тыс. чел / кв.км. Центральный округ, имея самую маленькую территорию округа внутри города, стоит только на пятом месте по плотности населения: 11800 чел/кв. км. Территории Новой Москвы имеют среднюю плотность порядка 400 чел/кв. км (Троицкий и Новомосковский округа).</p>");
					print("<p>Разумеется, Москва будет расти по населению. Уже сейчас число людей проживающих на 1 кв км Старой Москвы (в пределах МКАД) составляет не менее 10 тыс человек. Но мы знаем по другим мегаполисам и мировым столицам, что потенциал для роста еще есть.</p>");
				}
				?>
				
				<?php
				echo $section;
				?>
			</section>

			<aside itemscope='' itemtype='http://schema.org/WPSideBar' class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
			<?php 
			echo $asideup;
			?>
				<ul class='parent-menu-list'>
					<li>
						<a itemprop='url' href='/<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["rate_city_country"] . $end_link);
									}
								}
								unset($value);
								?>' title='Список городов <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?> по населению'>
							<span itemprop='name'>Список городов <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?> по населению</span>
						</a>
						<ul class='child-menu-list'>
							<?php rightMenuRu(${"lib" . $countryISO[1]},15);?>
						</ul>
					</li>
				</ul>

					<?php echo $ads3;?>

				<?php
				echo $asidedown;
				?>
			</aside>
			<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-body'>
					<div class='row'>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
				<ul class='parent-menu-list'>
					<li>
						<p class='lang'>На других языках</p>
						<ul class='language-menu-list'>
							<li><a href='/en/<?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["name_href"]);
										break;
									}
								}
								unset($value);
								?>.html' title='Population of <?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["name_en"]);
										break;
									}
								}
								unset($value);
								?>'>Population of <?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $value["name_href"] . $end_link){
										print($value["name_en"]);
										break;
									}
								}
								unset($value);
								?></a></li>
						</ul>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
	<?php
	// PAGE CITY__END
	} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_country") {
	//  PAGE COUNTRY__START
		?>
	<div class='container'>
		
		<div class='row'>

				<?php echo $ads1; ?>

		</div>
		
		<div class='row b'>
			<div id='breadcrumbs'>
				<div id='breadcrumbs-inner'>
					<ul itemscope='' itemtype='http://schema.org/BreadcrumbList'>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/ru/population-of-earth.html' itemprop='item'>
								<span itemprop='name'>Население Земли</span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<span itemprop='item'>
								<span itemprop='name'>Население <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?></span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>

		<div class='row'>
		
			<section class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-heading' >
					<h1 itemprop='headline'>
					Численность населения 
					<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?>
					</h1>
				</div>
				
				<div  itemprop='text'>
				<p>
				<?php
					if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/population-of-russia.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-china.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "jp/population-of-japan.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "de/population-of-germany.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "in/population-of-india.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-turkey.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "fr/population-of-france.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "us/population-of-usa.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "it/population-of-italy.html"){
						print("На 2020 год численность населения");
					} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "br/population-of-brazil.html"){
						print("На 2020 год численность населения");
					} else {
						print("На $year год численность населения");
					}
				?>
				<strong>
				<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?>
				</strong>
				 - составляет <span class='pop-info'>
				<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?></span> человек.
								
								<?php 
								if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/population-of-russia.html"){
									print("146 млн  – это много или мало? Не мало, чтобы производить материальные блага, включая добычу полезных ископаемых и передачу этого природного сырья в другие страны. В нашей стране достаточно природных ресурсов, чтобы прокормить это количество людей. Но одновременно населения не хватает, если выделять группы людей, которые находятся в возрасте активной работы, с образованием и другими качествами нужными для активного экономического, социального, культурного развития страны.");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-china.html"){
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "jp/population-of-japan.html") {
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "de/population-of-germany.html"){
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "in/population-of-india.html") {
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-turkey.html"){
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "fr/population-of-france.html"){
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "us/population-of-usa.html"){
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "it/population-of-italy.html"){
									print("");
								} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "br/population-of-brazil.html"){
									print("");
								} else {
									print("All-populations.com использовал данные количества населения из официальных источников. Узнать, какая статистика населения страны, города, района на All-populations.com.");
								}
								?>
								</p>
				</div>		
		
				<div class='showinfo'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						
							<?php echo $ads2;?>
							
						</div>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
							<div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
								<h3 class='naselenie'>
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?> - Население</h3>
								<span class='skolko'>
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?> человек</span>
								<img src='https://all-populations.com/ru/images/
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["country_flag"]);
									}
								}
								unset($value);
								?>' itemprop='contentUrl' width='160' height='107' alt='Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?>' title='Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?></span>
								<span class='date'>На <?php echo $month; echo $year;?> год</span>
							</div>
						</div>
					</div>
				</div>
				<p>Доступная информация по населению любого региона, быстрая работа сайта и постоянное обновление информации являются основой нашего ресурса. Скоро на сайте появится возможность посмотреть <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?> на карте.</p>
				

				<?php
				
				if(ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/population-of-russia.html"){
					print("<h2>Численность населения России по годам</h2>");
					print("<p>Если оперировать реальными цифрами, то мы можем опираться только на данные переписей населения, первая из которых прошла в 1897 г. и показало на тот момент 67,5 млн человек (с корректировками на современные границы территорию России), к 1914 выросло до 90 млн человек и 91 млн в 1917. Так что естественный прирост продолжался и в Первую мировую войну.  В Советское время, согласно переписи 1926 г,  на территории РСФСР проживали 101 млн  человек и к началу ВОВ достигла 108 млн (по данным переписи населения 1939 г). После Второй мировой население РСФСР составляло 97, 5  млн, достигнув  100 млн к 1950 году. Далее цифры такие: 117,5 в 1959 г, 130 млн в 1970 г., 137, 5 млн в 1979 г.  Во второй половине 70-х годов уже начался демографический кризис, вызванный сокращением населения репродуктивного возраста, ростом числа разводов, абортов, мужской смертности. Максимальное число граждан России было достигнуто в 1993 г.  - 148 561 694 человек. Дальше шел спад до 2010 г., когда была зафиксирована численность  142 856 536.</p>");
					print("<h2>Количество людей в России: динамика сегодня</h2>");
					print("<p>Примерно с 1990 г по 2012 Россия находилась в зоне отрицательного естественного прироста с нижним пиком в районе 2000 г. , потом был небольшой прирост и последние несколько лет мы находимся в зоне нулевого естественного прироста: не растем и не падаем. В 2014 г к России добавилось два с лишним миллиона человек населения Крыма, что “физически”увеличило число граждан, но именно по естественному приросту (увеличению числа рождений над числом смертей) положительных сдвигов нет. Но фактически в  этом вопросе мы целиком находимся во власти демографических волн, которые подразумевают наличие большего или меньшего числа женщин детородного возраста. И эти волны зародились в сороковые годы 20 в., когда население пострадало от Второй мировой войны.</p>");
					print("<h2>Плотность населения России – 8,6 чел / кв. км</h2>");
					print("<p>Число Россиян на 1 кв. км недостаточно и находится где в самом низу рейтинга стран по плотности населения. До самой последней строки, на которой располагается Монголия, всего 14 стран. С такой низкой плотностью населения проблематично само  развитие устойчивой саморазвивающейся социально-экономической системы: нет нужной порции социального “клея” для связывания огромной российской территории в единый механизм. Государству приходится занимать эти пустоты (а их очень много) своим бюрократическим и силовым аппаратом со всеми вытекающими отрицательными последствиями для гражданского общества.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-china.html"){
					print("<h2>Население Китая: основные данные</h2>");
					print("<p>Китай – первая страна по численности населения. С 14 века графики показывают непрерывный быстрый рост населения страны. В 1900 г. китайцев на территории Китая проживало уже 400 млн человек, в 1950 - 600 млн. Один миллиард был достигнут примерно в 80-е годы 20 в.  В 2000 г - 1,3 млрд. И за дальнейшие 20 лет приросло уже не очень много – около 100 млн. Прогнозные оценки показывают, что население Китая уже достигло своего пика и начался процесс депопуляции. К 2100 г. население Китая по численности будет балансировать в районе 1 млрд человек.</p>");
					print("<h2>Сколько человек проживает в Китае</h2>");
					print("<p>Согласно официальной статистике в городах Китая проживает 813 470 000 человек (60% всего населения). Эти данные могут быть неточными: в статистику населения города попадают люди, проживающее в городской агломерации, которая включает и сельские территории. Официально декларируется, что превышение числа городских жителей над сельским населением  достигнуто только к 2010 г. </p>");
					print("<p>Китай с связи с политикой “Одна семья - один ребенок” дал гендерный дисбаланс: мужчин в стране более чем на 5% больше, чем женщин. В абсолютных цифрах это очень много. Прогнозы говорят, что в ближайшее время каждый пятый китайский мужчина останется без жены.</p>");
					print("<p>Высшее образование имеют примерно 5% населения (или 70 млн человек).  В последние годы среднее число студентов в ВУЗах Китая составляет порядка 27 млн.человек. Это очень много в абсолютных величинах ( больше чем в США), и по этому показателю Китай занимает лидирующее место в мире. Но в целом по относительному числу человек с высшим образованием Китай сильно отстает от развитых стран. Несмотря на то, что у власти находится коммунистическая партия, жизнь в Китае дорогая, и стоимость высшего образования отнюдь не коммунистическая. Это ограничивает возможность обучения молодых людей, не принадлежащих к среднему классу.</p>");
					print("<p>Сам по себе средний класс в Китае включает около 140 миллионов домашних хозяйств (400 млн человек), то есть менее трети населения страны. Но по стране достаток распределяется неравномерно: гораздо богаче люди живут в восточных и прибрежных провинциях, самый бедный Китай – это провинции Сычуань, Ганьсу, Цинхай. Официально средний доход китайца располагается  в диапазоне 300 - 750 долл на человека / мес. В богатом Шанхае средняя заработная плата около 1200 долл.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "jp/population-of-japan.html"){
					print("<h2>Население Японии: основные данные</h2>");
					print("<p>Япония – островное государство с население более 126 млн. человек входит в первую двадцатку стран мира, занимая 11 место (1,61% населения Земли). На сегодняшний день более 90 % японцев проживает в городах, из них 10 городов-миллионников: Токио, Иокогама, Осака, Кобе, Нагоя, Киото, Саппоро, Хиросима, Фукуока и Кавасаки. Благодаря высокому уровню жизни, жители Японии имеют самую высокую продолжительность жизни в мире.</p>");
					print("<h2>Количество людей в Японии: динамика и прогнозы</h2>");
					print("<p>В начале эпохи Токугава (1600 г.г.) количество проживающих в Японии насчитывалось 15-16 млн. человек, а по переписи 1721 года количество людей выросло уже до 26 миллионов. К середине 19 в. население выросло всего на 3%, что было связано с голодом, неурожаями, стихийными  бедствиями. Показатели рождаемости были очень низкие. Ситуация кардинально поменялась в эпоху Мейдзи: начался небывалый демографический подъем, что привело к тому, что в 1920 был достигнут исторический пик рождаемости,которая снижается до настоящего времени. В наши годы годовая убыль населения составляет порядка 250 тыс человек в год (0,19%).</p>");
					print("<p>Декабрь 2004 год ознаменован историческим пиком численности населения Страны восходящего солнца (почти 128 миллионов человек), а в 2005 году население Японии впервые сократилось  в результате продолжительной низкой рождаемости.</p>");
					print("<p>Сегодня японское общество стареет, рождаемость будет сокращается и далее, сокращая общую численность населения; естественный прирост будет отрицательным. Более долгосрочные прогнозы обещают демографический кризис и снижение числа жителей до 95 млн. уже к 2050 году.</p>");
					print("<h2>Плотность населения в Японии</h2>");
					print("<p>Средняя плотность населения Японии равна 333.2 чел./кв.км, но так как большая часть жителей проживает в крупных экономически развитых городах,в которых показатели плотности достигают более 5,5 тысяч человек на кв. км. Примерно 75% японцев  живут вдоль восточного побережья южной части страны, где сосредоточена большая часть японской промышленности. На северных островах (Хокайдо) плотность жителей не превышает 70 чел/кв.км.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "de/population-of-germany.html"){
					print("<h2>Население Германии: основные данные</h2>");
					print("<p>Германия – самая населенная страна в Европейском союзе, и с количеством жителей  более 83 млн. занимает второе место в Европе после России. Особой датой для Германии является 9 мая 2011 года, когда впервые после объединения, была проведена первая перепись населения. Результат показал 80 233 100 человек (при этом  демографы ожидали число жителей на 1,5 млн. больше). Предыдущая перепись населения проходила в Западной Германии в 1987 году, а в ГДР - в 1981 году.</p>");
					print("<h2>Сколько человек проживает в Германии: динамика и прогнозы</h2>");
					print("<p>За 50 лет с 1871 по 1920 года население Германии выросло более, чем на 10 млн. человек (с 41 059 000 до 61 794 000). В последующие 20 лет к 1942 году население увеличилось также на 10 млн. Отрицательный естественный прирост, характерный для первых послевоенных лет, с 1972 года до настоящего времени стал неотступно преследовать демографию Германии, замедлив темпы роста количества жителей в стране (с 1972 по 2018 + чуть больше 5 млн.). Тенденция европейских стран в рождаемости ниже уровня воспроизводства населения не минула и Германию, которая относится сегодня к странам с самыми низкими показателями. Одновременно набирает обороты  процесс  старение населения. Предполагается, что доля людей старше 60 лет вырастет с сегодняшнего показателя 23 % до 30 % в 2030 году, а к 2050 году население Германии сократится на 16 %. Возраст каждого третьего горожанина будет превышать 60 лет.</p>");
					print("<p>Германия наших дней уверенно располагается на втором месте в мире после США по количеству новых иммигрантов, которых по данным на 2015 год насчитывалось  более десяти миллионов.</p>");
					print("<h2>Плотность населения в Германии</h2>");
					print("<p>Средняя плотность населения в Германии составляет  232,3 чел./кв.км, поставив Германию в одном ряду с самыми густонаселенными странами Европы.</p>");
					print("<p>Характерной особенностью  Германии является тот факт, что плотность населения западногерманских регионов почти вдвое выше, чем восточных, ранее входящих в состав ГДР. С одной стороны, в ФРГ крупные города с плотностью населения до 4000  чел./кв. км., как в Берлине, а с другой стороны в стране есть и малонаселенные области (например,  Мекленбург-Передняя Померания с плотностью около  70 чел./кв. км.).</p>");
					print("<p>Население Германии главным образом сосредоточено в довольно крупных городах и прилегающим к ним территориям. В стране пять городов-миллионников: Берлин, Гамбург, Мюнхен, Кельн, Франкфурт-на-Майне* (*немного менее) с общим населением до 10 млн человек. В целом 31% немцев проживают в городах с населением более 100 000 жителей, 62 % – с населением от 2 000 до 100 000 человек, а 7 % живут в населенных пунктах, население которых насчитывает менее 2000 человек.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "in/population-of-india.html"){
					print("<h2>Население Индии: основные данные</h2>");
					print("<p>⅙ часть населения Земли составляет население Индии, а именно свыше 1,3 млрд. человек. Индия совсем немного уступает Китаю по количеству жителей. Являясь крупнейшей страной Южной Азии, она занимает территорию 3 287 263 км² и подразделяется на 28 штатов и 8 союзных территорий.</p>");
					print("<p>В стране 20 городов - миллионников, самыми населенными из которых являются Мумбаи и Дели. Но при этом подавляющее большинство индийцев 70% – сельские жители, хотя за последние десятилетия миграция в большие города привела к резкому увеличению городского населения. Мужское население на сегодняшний день составляет 51,5 %, а женское — 48,5 %.</p>");
					print("<p>Согласно переписи населения 2015 года, дети до 14 лет составляли 28% населения Индии, 15-24 лет – 18,06%, лица в возрасте 25-54 лет – 40,74%, 55-64 лет - 7,16%, а индийцы 65 лет и старше – 5,95 %. Мы видим, что в целом население Индии молодо. Средний возраст жителя Индии составляет 25 лет.
					Средний прирост населения 1,4% (по рождениям 2,3% в год). Средняя продолжительность жизни: 69 лет</p>");
					print("<h2>Сколько человек проживает в Индии: ретроспектива и прогноз</h2>");
					print("<p>Демографы предполагают, что уже 2000 лет до н.э. территория Индии была населена 18 000 000 жителей, число которых к 1 году н.э увеличилось до 60 000 000.</p>");
					print("<p>Первая всеобщая перепись населения была проведена в 1872 году в период правления королевы Виктории, дав показатель количества населения в 253 000 000 человек. С 1901 по 2001 население древнейшей Индии выросло на невероятные 332% – c 284 миллионов до 1,028 миллиарда.</p>");
					print("<p>За 2019 год население Индии увеличилось приблизительно на 17 248 911 человек. Ожидается, что на конец 2020 г. численность населения Индии достигнет 1,4 млрд. человек. Прогноз роста населения Индии следующий:</p>");
					print("<ul><li>2030 год: 1, 512 миллиарда человек</li></ul> <ul><li>2050 год: 1,66 миллиарда</li></ul> <ul><li>2100 год: 1,52 миллиарда</li></ul>");
					print("<p>Из-за крайне низкого уровня жизни подавляющей части населения, все попытки властей принять меры по контролю рождаемости малодействены. Уже сейчас понятно, что в ближайшее время Индия обгонит Китай по численности людей. Ведь только за последние полвека население увеличилось почти в 3 раза.</p>");
					print("<h2>Плотность населения в Индии - 425.3 на кв.км</h2>");
					print("<p>В связи с численностью населения в Индии вполне закономерен вывод о том, что страна является одной из самых густонаселенных стран, имея среднюю плотность населения 425.3 на кв.км. Но тем не менее в пятерку фаворитов Индия не вошла, а вот два города - Дели и Мумбаи - с легкостью входят в десятку самых плотно населенных городов мира. Но, как и во многих других странах, однородности в распределении населения по территории государства достичь сложно в силу разных объективных обстоятельств, Так и в Индии плотность жителей в отдельных районах может достигать 22 тысяч чел./км² , как, например, в Мумбаи.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-turkey.html"){
					print("<h2>Население Турции: основные данные</h2>");
					print("<p>Турция с площадью территории 783 562 кв.км на 93% расположена в Азии и на 3% – в Южной Европе. Занимает 19-е место в мире по численности населения. 76%  – городское население. В республике 7 крупных мегаполисов-миллионников (Стамбул, Анкара, Измир, Бурса, Адана, Гизиантеп, Конья), в которых проживает почти 30 млн. человек – 36% всего населения страны.</p>");
					print("<p>В Турции люди живут дольше, чем во многих других странах:  средняя продолжительность жизни при рождении (для обоих полов) в Турции составляет 78,5 лет (мужчины 75,6 лет; женщины 81,2 года).</p>");
					print("<h2>Сколько человек проживает в Турции: динамика и прогнозы</h2>");
					print("<p>Гибель Византийской империи (1453) была встречена положительной демографической волной: население между 1400 и 1500 годами выросло с трех до шести миллионов. 400 лет потребовалось, чтобы удвоить это число, а потом всего 60 лет, чтобы число подданных еще раз удвоилось до 24 млн и не более 25 лет до следующего скачка до 48 млн. К началу 21 в. в Турции проживает уже 65 млн человек.
					Численность населения Турецкой Республики ежегодно растет со средним коэффициентом рождаемости, имеющим региональные различия от 1,31 % до 3,42%. За 2019 год население увеличилось почти на 1,5 млн. человек.
					</p>");
					print("<p>Турецкое общество молодое: возрастная группа 0 - 14 лет занимает около 25%. старше 65 лет - 7,7%. и численность трудоспособного населения более чем в два раза превышает численность населения нетрудоспособного возраста. Из за такой демографической картины ожидается прирост населения к 2050 году до 108 миллионов. Далее произойдет второй демографический переход и численность населения начнет снижаться.</p>");
					print("<h2>Плотность населения в Турции - 109,5 чел./на кв.км</h2>");
					print("<p>Распределение жителей по территории Турции крайне неравномерно. Возрастает концентрация населения страны в главных городах: в 1990 году Стамбул и Анкара сосредоточивали 18,4 %, а в 2010 году уже 24,5 %. Наиболее густо заселены побережья Мраморного и Чёрного морей, а также районы, прилегающие к Эгейскому морю. Плотность населения на 2020 год составляет 109,5 чел./на кв.км. Самый густонаселенный город – Стамбул (2480 чел./кв.км), самый малонаселенный район - Хаккяри (39,2 чел./кв.км).</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "fr/population-of-france.html"){
					print("<h2>Население Франции: основные данные</h2>");
					print("<p>Франция – трансконтинентальное государство  с населением  более 68 млн. человек (включая заморские владения) занимает 22 место в мире. Около 90% жителей – граждане Франции. </p>");
					print("<p>Административно-территориально  государство  разделено на 18 регионов, включающих 101 департамент, 5 заморских сообществ  и 3 административно-территориальных образования с особым статусом.
					В стране 7 крупных городских агломераций, из которых 4 с населением свыше миллиона жителей (Париж с числом жителей более 10 млн, Лион, Марсель, Лилль с населением от 1 до 1,6 миллиона человек). Кроме больших городов, насчитывается 40 городских поселений с численностью населения свыше 100 тыс. человек. Во Франции не менее 80% людей являются горожанами.
					</p>");
					print("<p>Мужское население уступает женскому в соотношении 49% к 51%. Продолжительность жизни остается стабильной для женщин (до 85 лет), а для мужчин даже увеличилась  до 79,5 лет.
					Как в любой развитой стране во Франции отчетлива тенденция к старению населения: 
					</p>");
					print("<ul><li>граждане до 14 лет составляют 18,6%,</li></ul> <ul><li>15-64 лет - 65%,</li></ul> <ul><li>от 65 лет и выше - 16,4%.</li></ul>");
					print("<p>Не смотря на то, что в последние несколько лет рождаемость снижается, коэффициент естественного прироста населения в стране остается одним из высоких в Европе (2,01 ребёнка на одну женщину).</p>");
					print("<h2>Сколько человек проживает во Франции: ретроспектива и прогнозы</h2>");
					print("<p>В начале 16 в. на территории Франции проживало 18 миллионов человек.  Начало 19 в было встречено с 30 миллионами граждан. Удвоение этого числа произошло только в 2000 году. Популяционные графики показывают устойчивый непрерывный рост населения без больших скачков. За период 1801-2000 г.г снижение численности населения наблюдалось лишь дважды: в 1920 году и в годы Второй мировой войны. В последние десятилетия (2000 - 2020 гг)  мы можем наблюдать плавно замедляющийся рост численности населения Франции.</p>");
					print("<p>Если сохранятся существующие демографические тенденции, то население Франции к 2050 году увеличится лишь на 5 млн. человек. Около 1/3 жителей страны будет в возрасте старше 60 лет, а на людей моложе 20 лет придется не более пятой части населения. Концентрация людей происходит главным образом в южных и западных районах континентальной Франции, а население северо-восточных регионов в целом снижается.</p>");
					print("<h2>Плотность населения во Франции – 103 чел./кв.км</h2>");
					print("<p>Франция стоит на 14 месте в составе государств Евросоюза с показателем средней плотности населения  103 чел./кв.км.</p>");
					print("<p>Около двух третей территории страны заняты лесами, горами, лугами, где плотность населения может составлять менее 40 чел/кв.км. На оставшейся площади величина плотности доходит до 289 человек на квадратный километр, а в крупных городах, как, например, в Париже - до впечатляющих 21000 человек на кв.км.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "us/population-of-usa.html"){
					print("<h2>Население США: основные данные</h2>");
					print("<p>США – крупнейшая страна на Земле по числу жителей и занимает 3 место в мире. В состав США входят 50 штатов, федеральный округ Колумбия и ряд островных территорий (Пуэрто-Рико, Виргинские острова, Гуам и другие). Больше всего людей проживает в штате Калифорния (около 40 млн.), следующим по рейтингу идёт штат Техас с населением 27,5 млн. человек, замыкает список штат Вайоминг (с числом жителей менее 600 тыс. человек). По данным Бюро переписи населения около 82 % американцев живут в городах или пригородах, половина из них проживают в городах с населением свыше 50 тысяч человек.  В стране 10 городов-миллионников, среди которых Лос-Анджелес (около 4 млн.), Чикаго (2,6 млн.), Хьюстон (2,3 млн.), а самым населенным является мегаполис Нью-Йорк  (более  8 млн. жителей).</p>");
					print("<p>Самая многочисленная группа населения, а именно 66,8% - это трудоспособное население 15-64 лет, людей младше 15 лет – 20,1%, старше 64 лет - 13,1%. И численность трудоспособного населения более чем в 2 раза превышает численность населения нетрудоспособного возраста.</p>");
					print("<p>Ожидаемая продолжительность жизни для США 78.4 лет (75.9 - для мужчин, 80.9 - для женщин), что выше среднего показателей  в мире, который равняется 71 году.</p>");
					print("<h2>Сколько человек проживает в США: динамика и прогнозы</h2>");
					print("<p>1 августа 1790 прошла первая общефедеральная перепись населения США, по итогам которой была определена численность населения в 3,9 млн человек. Через  100 лет, к 1890 году, население увеличилось более чем в 12 раз и составило 49,4 млн. человек. Этому способствовали активные миграционные процессы. С 1790 по 1994 год из Европы, Латинской Америки, Азии и Африки прибыло почти 65 млн. иммигрантов.  К 2000 году в США проживало уже 281,5 млн. человек (почти в 6 раз больше по сравнению с 1890 г.). Даже за два десятилетия 21 века население США выросло на 17%.</p>");
					print("<p>Статистика показывает, что за всю свою историю население Соединенных  штатов неуклонно растет. На начало 2020 года естественный прирост населения США составил 0,75%. Согласно данным Департамента по экономическим и социальным вопросам ООН  в ближайшие 10 лет коэффициент рождаемости увеличится, а количество населения будет продолжать расти, достигнув к 2055 отметки в почти 400 млн. человек.</p>");
					print("<h2>Плотность населения в США</h2>");
					print("<p>Средняя плотность населения США на 2020 год - 34 чел./кв. км.  Эта цифра далека от показателей самых густонаселенных стран мира, поэтому Соединенные Штаты занимают одно из последних мест по данному показателю среди развитых государств мира.</p>");
					print("<p>Население расселено по территории неравномерно. Наиболее плотно заселены северо-восточные районы страны, что, в-первую очередь, обусловлено историей освоения земель США и благоприятными условиями для проживания. В некоторых штатах плотность населения достигает 250-350 чел./кв.км., а вот на Аляске меньше всего людей - примерно 0,49 чел. на кв.км. Самым густонаселенным городом, является Нью-Йорк (10 654 чел./кв. км.). Самый большой по численности штат США  Калифорния имеет невысокую плотность – 91 чел/кв. км, что связано с большой площадью штата (3-е место по стране).</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "it/population-of-italy.html"){
					print("<h2>Население Италии: основные данные</h2>");
					print("<p>В настоящее время в Италии проживает 59,6 млн. человек. Страна  занимает четвертое место по населению среди стран Европейского союза и 23-е среди стран всего мира. Население крупных агломераций (Милан, Рим, Неаполь и Турин) составляет 1/5 часть всего населения Италии, а самыми крупными мегаполисами являются миллионники Рим (около 2,9 млн. человек) и Милан (1,4 млн. человек). 70% итальянцев – городские жители.</p>");
					print("<p>Италия – экономически развитая страна с высоким уровнем жизни, поэтому для нее характерны низкие показатели смертности, снижение рождаемости и высокая продолжительность жизни (81,8 лет). Все это неизбежно приводит к постепенному старению населения. Сегодня пожилых итальянцев старше 64 лет  около 21%, младшее поколение до 15 лет составляет 13,8%</p>");
					print("<h2>Сколько человек проживает в Италии: ретроспектива и прогнозы</h2>");
					print("<p>По плотности населения Италия с показателем 201,1 чел./кв. км  занимает пятое место в Евросоюзе. Почти половина всего населения страны проживает в Северной Италии, поэтому эти территории характеризует наиболее высокая плотность населения. Самые густонаселенные области Италии – равнины Кампании, Ломбардии и Лигурии, где на один километр приходится свыше 300 жителей. Особенно привлекательной для проживания является долина реки По.  Люди стремятся на земли, где складываются благоприятные экономические условия. Малопригодные для жилья горные районы населены гораздо реже. Здесь плотность населения падает менее 35 человек на 1 кв. км.</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "br/population-of-brazil.html"){
					print("<h2>Население Бразилии: основные данные</h2>");
					print("<p>Бразилия - самая большая страна Южной Америки, как по территории, так и по численности населения (почти 210 миллионов человек), что дает право занять Бразилии почетное 6 место в мире. Бразильцы – одна из самых многочисленных и самых смешанных в мире наций, которая условно поделена на 5 групп: “белые”- около 100 млн. человек, “коричневые” - более 80 млн., “черные” - 15 млн., “желтые” - 4 млн. человек и индейцы – 200-300 тысяч.</p>");
					print("<p>В Бразилии 26 штатов и 1 федеральный (столичный) округ. Страна характеризуется высоким уровнем урбанизации: до 85% населения составляют городские жители, хотя не все из них имеют удовлетворительный уровень жизни. Официально признано 25 крупных агломераций, в которых проживает около 45% жителей страны. 13 городов-миллионников: самый населенный Сан-Паулу с населением свыше 12 млн. человек.</p>");
					print("<p>Возрастная структура населения Бразилии мало отличается от европейских стран. Самая большая часть (68%) - это трудоспособные граждане в возрасте 15-64 лет, доля детей до 15 лет составляет 27%, пожилых людей старше 65 лет - 7%. Основная категория граждан – молодые люди 20-25 лет. 
					Продолжительность жизни бразильцев составляет: для мужчин 69 лет, для женщин 76. Такие показатели обусловлены высоким коэффициентом смертности и рождаемости, характерными для развивающихся стран.
					</p>");
					print("<h2>Сколько человек проживает в Бразилии: ретроспектива и прогноз</h2>");
					print("<p>Населения Бразилии формировалось в результате сложных исторических и миграционных процессов. Коренные жители этой страны – индейцы, которые проживали на данных территориях до появления первых белых людей уже около 13 тысяч лет. Своего демографического пика индейская цивилизация достигла к 1500 году и насчитывали примерно 7 млн. человек. Колониальная политика Португалии существенно повлияла на популяцию индейцев, значительно сократив ее. И уже в 2000 году коренных жителей осталось всего 734 тысячи чел. (0,43 % населения страны).</p>");
					print("<p>Первая перепись населения в 1872 году зарегистрировала 9 930 478 жителей. К началу ХХ века население удвоилось. А следующее столетие (1900-2001 г.г.) ознаменовано активным ростом численности бразильцев (более чем на 155 млн.) до 172 385 827 человек. Коэффициент прироста населения в Бразилии был всегда положительным и довольно высоким, но с тенденцией к плавному снижению (например, от 3,04% в 1952 году до 0,91 на конец 2019 года). В настоящее время население продолжает плавно расти (2001-2019 г.г дало прирост + 37 млн.). Предполагаемый пик ожидается в 2045-2050 г.г., после чего количество бразильцев начнет уменьшаться, а коэффициент прироста станет на долгое время отрицательным.</p>");
					print("<h2>Плотность населения в Бразилии – 25.4 чел./кв.км</h2>");
					print("<p>Населения Бразилии не отличается высокими показателями плотности населения - 25.4 человека на квадратный километр. Распределение жителей очень неоднородно. Большинство жителей сосредоточены в северо-восточных, южных и юго-восточных частях страны в крупных городах: Сан-Паулу (7216 чел./кв.км), Рио-Де-Жанейро (5287 чел./кв.км), Ресифи (7457 чел./кв.км). 
					А в центральном и западном регионе относительно невелика, так в дельте Амазонки, на 60% территории, проживает менее 10% населения.</p>");
				}
				
				?>

				<?php
				echo $section;
				?>
			</section>

			<aside itemscope='' itemtype='http://schema.org/WPSideBar' class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
			<?php 
			echo $asideup;
			?>
				<ul class='parent-menu-list'>
					<li>
						<a itemprop='url' href='/<?php
								if ( $countryISO[1] == "gb" ){
									print("eng/list-of-cities-in-england-by-population.html");
								} else {
									foreach($libcountry as $value){
										if ($countryISO[1] == $value["country_iso"]){
											print($value["rate_city_country"] . $end_link);
										}
									}
									unset($value);
								}
								?>' title='Список городов <?php
								if ( $countryISO[1] == "gb" ){
									print("Англии");
								} else {
									foreach($libcountry as $value){
										if ($countryISO[1] == $value["country_iso"]){
											print($value["name_country_ru_zz"]);
										}
									}
									unset($value);
								}
								?> по населению'>
							<span itemprop='name'>Список городов <?php
								if ( $countryISO[1] == "gb" ){
									print("Англии");
								} else {
									foreach($libcountry as $value){
										if ($countryISO[1] == $value["country_iso"]){
											print($value["name_country_ru_zz"]);
										}
									}
									unset($value);
								}
								?> по населению</span>
						</a>
						<ul class='child-menu-list'>
							<?php
							if ( $countryISO[1] == "gb" ){
								rightMenuRu($libeng,15);
							} else {
								rightMenuRu(${"lib" . $countryISO[1]},15);
							}
							?>
						</ul>
					</li>
				</ul>

					<?php echo $ads3;?>

				<?php
				echo $asidedown;
				?>
			</aside>
			<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-body'>
					<div class='row'>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
				<ul class='parent-menu-list'>
					<li>
						<p class='lang'>На других языках</p>
						<ul class='language-menu-list'>
							<li><a href='/en/<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_href"]);
									}
								}
								unset($value);
								?>.html' title='Population of <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>'>Population of <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></a></li>
						</ul>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
	<?php
	//  PAGE COUNTRY__END

	// PAGE RATE CITY START
	} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_rate_city" . $end_link) {
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
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-countries-by-population.html'>Страны</a></li>
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-kingdoms-by-population.html'>Королевства</a></li>
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-republics-by-population.html'>Республики</a></li>
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-cities-by-population.html'>Города</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div class='container'>
		
		<div class='row'>

				<?php echo $ads1; ?>

		</div>
		
		<div class='row b'>
			<div id='breadcrumbs'>
				<div id='breadcrumbs-inner'>
					<ul itemscope='' itemtype='http://schema.org/BreadcrumbList'>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/ru/population-of-earth.html' itemprop='item'>
								<span itemprop='name'>Население Земли</span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_href"]);
									}
								}
								unset($value);
								?>' itemprop='item'>
								<span itemprop='name'>Население <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?></span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<span itemprop='item'>
								<span itemprop='name'>Список городов <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?> по населению</span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>

		<div class='row'>
		
			<section class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-heading' >
					<h1 itemprop='headline'>Список городов <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?> по численности населения</h1>
				</div>
				
				<div  itemprop='text'>
					<p>Список городов <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?> по численности населения на <?php echo $year; ?> год.<p>	
					<p>Общее количество городов: <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["count_city_country"]);
									}
								}
								unset($value);
								?>.</p>
					<p>Общее количество населения: <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?>.</p>

					<p>Поиск производится исключительно среди 200 самых крупных городов страны</p>
				</div>		
				
				<input class='form-control' id='myInput' type='text' placeholder='Поиск города..'>
				<br>
				<h2 style="margin-bottom: 25px;">Самые крупные города <?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?> по численности населения</h2>
				<div class='table-responsive'>
				<table class='table table-bordered'>
					<thead>
					  <tr>
						<th>#</th>
						<th>Название, город</th>
						<th>Население, человек</th>
					  </tr>
					</thead>
					<tbody id='myTable'>
					  <?php 

						foreach($libcountry as $value){
							if ($countryISO[1] == $value["country_iso"]){
								$count_city = ($value["count_city_country"]);
							}
						}
						unset($value);
						if ($count_city >= "200"){
							getTable200(${"lib" . $countryISO[1]});
						} else {
							getTable(${"lib" . $countryISO[1]});
						}
					  ?>
					</tbody>
				</table>
				</div>
				<?php echo $scripttable;?>
				  
				<div class='showinfo'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						
							<?php echo $ads2;?>
							
						</div>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						<div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
								<h3 class='naselenie'>
								<?php 
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?> - Население</h3>
								<span class='skolko'>
								<?php 
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?> человек</span>
								<img src='https://all-populations.com/ru/images/
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["country_flag"]);
									}
								}
								unset($value);
								?>' itemprop='contentUrl' width='160' height='107' alt='Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?>' title='Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru"]);
									}
								}
								unset($value);
								?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Флаг 
								<?php
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?></span>
								<span class='date'>На <?php echo $month; echo $year;?> год</span>
							</div>
						</div>
					</div>
				</div>
				

				<?php
				
				if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "ru/list-of-cities-in-russia-by-population.html"){
					print("<h2>Города России по численности населения</h2>");
					print("<p>В России много территории и много городов. Список начинает наша столица с количеством проживающих 11,5 млн чел. На последнем месте расположился город Чекалин с населением менее 1000 жителей. Середину списка занимают города с числом жителей около 27 тыс. Начиная с  г. Воткинск (164 место)  население переливает за 100 тыс. человек. Город Тула открывает список городов с населением более 500 тыс. А миллионник стоит только на 13-й позиции. И это город Пермь. Общее число россиян проживающих в городах миллионниках приближается к 30 млн человек. То есть это ⅕ всего населения России.</p>");
					print("<h2>Крупные города России</h2>");
					print("<p>Речь идет о топ-10 в рейтинге городов россии по численности населения 2020. Мегаполисов в этом списке всего два - Питер и Москва. Причем их население сильно разнится не в пользу северной столицы (меньше в 2,3 раза). На третьем месте Новосибирск, но там людей уже в три с лишним раза меньше, чем в СПб. А потом имеем плавное снижение населения в рейтинге крупнейших городов России от Екатеринбурга до Ростова на Дону.  Территориально все 10 городов (кроме Ростова-на Дону) относятся к центральной и восточным частям страны. Во всех крупнейших городах России фиксируется рост населения, кроме Самары и Омска (-1% за десятилетие). Первые пять городов списка увеличили свое население за десять лет в среднем на 10%.</p>");
					print("<h2>Рейтинги городов России</h2>");
					print("<p>Всероссийский рейтинг городов по числу жителей на квадратный километр площади населенного пункта заполнен преимущественно городами Подмосковья с рекордсменом - городом Одинцово (7031 чел/км2). В Москве эта цифра 4950 чел/кв. км. В Санкт-Петербурге 3848 чел. Еще в списке густонаселенных городов присутствует Краснодар  и Саранск  - более 4000 чел/кв. Предоставим для сравнения и город с самой высокой плотностью в мире: это Гонконг (свыше 25 тыс/ кв.км).</p>");
					print("<p>В рейтинге крупнейших городов России по качеству жизни лидируют (Domofond.ru)  следующие локации:</p>");
					print("<ul><li>Анапа,</li></ul> <ul><li>Дубна,</li></ul> <ul><li>Геленджик,</li></ul> <ul><li>Ноябрьск,</li></ul> <ul><li>Северск,</li></ul> <ul><li>Долгопрудный,</li></ul> <ul><li>Долгопрудный,</li></ul> <ul><li>Ханты-Мансийск,</li></ul> <ul><li>Реутов,</li></ul> <ul><li>Майкоп,</li></ul> <ul><li>Губкин.</li></ul>");
					print("<p>Заметим, что в этот перечень вошли небольшие города по численности населения. В антирейтинг записаны такие города: Волгоград, Дербент, Шахты, Кызыл.  В этом рейтинге оценивались только бытовые условия жизни, безопасность, экология, транспорт. </p>");
					print("<p>По рейтингу заработных плат на 2019 год имеем следующий топ - 5 городов: </p>");
					print("<ul><li>Салехард (71 тыс рублей / мес.),</li></ul> <ul><li>Ханты-Мансийск (62 тыс),</li></ul> <ul><li>Москва (67 тыс),</li></ul> <ul><li>Магадан (56 тыс.),</li></ul> <ul><li>Тюмень (50 тыс).</li></ul>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/list-of-cities-in-china-by-population.html"){
					print("<h2>Города Китая по численности населения</h2>");
					print("<p>В нашем списке 137 городов Китая по численности населения на 2020 г. Но это список далеко не полный. В Китайской республике 912 городов с населением свыше 53 тыс человек, 462 города с числом людей свыше 100 тыс и 228 городов имеют свыше 200 тыс человек населения.</p>");
					print("<p>Вообще в КНР городами официально именуются разноуровневые административные единицы, которые состоят из городского центра и большой территории (агломерации), включающей собственно и сельские районы. Внутри этой административной единицы “живут” уезды, волости и другие города более низкого уровня. В итоге, официальные «города» не являются городами в прямом смысле этого слова. И соответственно статистика численности населения такого “города” не вполне корректна и нуждается в дополнительной проверке.</p>");
					print("<h2>Крупные города Китая</h2>");
					print("<p>Десятка самых крупных городов включает города Чунцин, Шанхай, Пекин, Тяньцзинь, Наньян, Баодин, Харбин, Шэньчжень, Ухань, Гуанчжоу. Суммарное население этой большой десятки около 150 млн человек, что соответствует, как мы знаем, населению РФ.</p>");
					print("<p>В силу причин описанных выше, список городов по численности населения будет немного другим, если нам вычленить только городскую часть населения. Тогда список крупнейших городов (мегаполисов)  возглавит Шанхай, расположенный на восточном побережье в Устье реки Янцзы. Численность людей в в этом мегаполисе составит 16 млн человек. Далее по списку:</p>");
					print("<ul><li>Пекин – 11 млн,</li></ul> <ul><li>Гуанчжоу  – 9,5 млн,</li></ul> <ul><li>Шеньчжень  – 8 млн,</li></ul> <ul><li>Тяньцзинь – 7,5 млн,</li></ul> <ul><li>Ухань (знаменитый теперь на весь мир!) – 7,5 млн.</li></ul>");
					print("<h2>Список городов Китая по плотности населения</h2>");
					print("<p>Интересно рассмотреть вопрос как смотрятся китайские города в рейтинге плотности проживающих там людей. Лидирует, конечно, Шанхай – 3826 чел / кв.км. Сильно отстает Пекин с населением 1311 чел/кв. км. Недалеко находится Тяньцзинь 1293 чел/ кв.км, Гуанчжоу имеет плотность 1759 чел. В общем, цифры не запредельные, если сравнивать с чемпионами. В Мумбаи обсуждаемая цифра достигает 20 тыс человек. Но опять таки здесь следует обратить внимание на декларируемую площадь населения “города”. Мумбаи – 603 кв. км, Пекин – 16 тыс кв. км. Разница в 26 раз!</p>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "fr/list-of-cities-in-france-by-population.html") {
					print("<h2>Города Франции по численности населения</h2>");
					print("<p>Наш список городов включил в себя 200 населенных пунктов. Открывает список столица Франции – Париж –  с вполне себе столичной численностью в 2,2 млн человек. Шербур-Октевиль – портовый город на северо-западе Франции замыкает этот список  с численностью населения 37121 человек. Городов с населением свыше 100 тысяч человек, не считая Париж, во Франции только 40, а свыше 50 тысяч – 83. Всемирно известный международным кинофестивалем французский город Канн на 66 месте с население более 73 тысячи жителей.</p>");
					print("<h2>Крупные города Франции</h2>");
					print("<p>Крупных городов во Франции немного. Население в основном распределено по пригородам и небольшим городкам. Единственный мегаполис в стране – Париж – сосредоточил на своей территории самое большое количество жителей. Его население насчитывает 2, 25 миллиона человек. Однако в пределах агломерации «Большой Париж» проживает более 10 млн. человек. В пятерку крупнейших по числу жителей вошли еще 4 города:</p>");
					print("<ul><li>Марсель: свыше 852 тысяч жителей</li></ul> <ul><li>Лион: полмиллиона человек</li></ul> <ul><li>Тулуза: 0,45 миллиона</li></ul> <ul><li>Ницца: около 350 тысяч жителей</li></ul>");
					print("<p>Марсель и Ницца – портовые города на Средиземной море, Тулуза и Лион расположены внутри страны.
					Другие города в  ТОП-10 самых населенных городов Франции имеют численность населения в диапазоне 200 - 300 тысяч человек. И в этой группе портовые города составляют половину списка.
					</p>");
					print("<h2>Города Франции по плотности населения/Рейтинги городов Франции</h2>");
					print("<p>Как ни странно, но в списке самых густонаселенных городов Франции лидирует не Париж с плотностью населения 21000 человек на кв.км. Обгоняют столицу по этому показателю целых пять маленьких городов (с площадью не превышающей 2,5 кв.км):</p>");
					print("<ul><li>Леваллуа-перре (26,3 тыс.чел./кв.км),</li></ul> <ul><li>Венсен (26,1 тыс. чел./кв.км),</li></ul> <ul><li>Ле-Пре-Сен-Жерве (25,6 тыс.чел./кв.км),</li></ul> <ul><li>Сен-Манде (24,6 тыс.чел./кв.км),</li></ul> <ul><li>Монруж (22,5 тыс.чел./кв.км).</li></ul>");
					print("<p>Но скорее всего это статистический феномен, связанный с административной площадью города (допустим, внутри старых городских стен), а не с реальностью, в которой венсенцы ходят по головам друг друга.</p>");
					print("<p>Топ лучших для жизни городов Франции:</p>");
					print("<ul><li>Ренн считается идеальным городом для комфортной жизни.</li></ul> <ul><li>Нант- город, который любят студенты.</li></ul> <ul><li>Тулуза - город для молодежи.</li></ul> <ul><li>Рамбуйе - город королей.</li></ul> <ul><li>Бордо - урбанистический центр.</li></ul> <ul><li>Страсбург - город интеллектуалов.</li></ul> <ul><li>Лорьян - город с богатым культурным наследием.</li></ul>");
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "de/list-of-cities-in-germany-by-population.html"){
					?>
						<h2>Города Германии по численности населения</h2>
						<p>В наш список вошли 100 городов Германии. Во главе списка находится крупнейший город Германии и ее столица – Берлин – с численностью населения более 3,3 млн. человек. В самом низу списка города Филлинген-Швеннинген и Минден, разница в численности населения которых минимальна (80 268 и 79 940 человек соответственно). 77 городов в нашем списке имеют население свыше 100 тыс. человек и еще 11 городов вплотную приблизились к этой отметке.</p>
						<p>В хорошо известном немецком городе Лейпциге, среди жителей которого немало известных личностей, например композиторы Бах, Мендельсон и Шуман, 510 тысяч человек. А город Любек с населением 210 679 в средние века был центром Ганзейского союза и считался чуть не самым богатым городом немецких земель.</p>
						<h2>Крупные города Германии</h2>
						<p>Самыми крупными городами Германии, занимающие первые четыре места в нашем списке, являются города-миллионники:</p>
						<ul><li>Берлин с населением свыше 3, 3 миллиона человек,</li></ul>
						<ul><li>Гамбург – один из крупнейших европейских портов (более 1, 7 миллиона человек),</li></ul>
						<ul><li>Мюнхен – средоточие культурных ценностей и крупный промышленный и исследовательский центр (1,365 миллиона человек)</li></ul>
						<ul><li>и крупнейший центр 10-миллионной надагломерации Рейнско-Рурского региона – Кельн, в котором проживают чуть более миллиона граждан.</li></ul>
						<p>Пятым по списку значится Франкфурт-на-Майне – самый крупный аэропорт Германии и финансовая метрополия с населением свыше 676 тыс.человек. Кроме Франкфурта еще в восьми городах Германии число жителей перевалило через полмиллиона. Это Штутгарт (591 тыс.чел.), Дюссельдорф (около 590 тыс.чел.), Дортмунд (571 тыс.чел.), Эссен (около 566 тыс.чел.), Бремен (544 тыс.чел.), Дрезден ( свыше 517 тыс.чел.), Лейпциг (510 тыс.чел.) и Ганновер (509,5 тыс.чел.). Большая часть из этих городов находится в западной части страны.</p>
						<h2>Рейтинги городов Германии</h2>
						<p>Мюнхен, который по численности населения занимает лишь третье место, в списке городов Германии по плотности населения лидирует с показателем 4736 чел./кв.км. А Берлин с показателем 4088 чел./кв.км. на втором месте. Далее идет обогнавший оставшиеся города-миллионники Штутгарт - 3062 чел./ кв.км. Штутгарт стабильно входит в список крупнейших мегаполисов Европы и лучших городов по качеству жизни.</p>
						<p>Западная часть территории страны является сосредоточение городских поселений и густо населена. Наименьшая плотность населения наблюдается в северо-восточной части Германии (например,  Мекленбург-Передняя Померания с плотностью около  70 чел./кв. км.).</p>
						<p>Топ лучших городов Германии для жизни:</p>
						<ul><li>Франкфурт-на-Майне – финансовая столица Германии.</li></ul> 
						<ul><li>Мюнхен  – город с лучшей инфраструктурой в Германии и один из самых дорогих городов в Европе.</li></ul>
						<ul><li>Дюссельдорф (642 тыс. человек) – экономический, транспортный (международный авиахаб), культурный (Университет и Художественная академия) и политический центр Германии; город-космополит.</li></ul> 
						<ul><li>Берлин – зелёный и живописный город с многочисленными парками и озерами.</li></ul> 
						<ul><li>Гамбург – идеально благоустроенный город с великолепной архитектурой.</li></ul> 
						<ul><li>Штутгарт  (ок. 635 тыс. чел.) –  один из ведущих промышленных центров страны (заводы Мерседес-Бенц и др.), культурный центр.</li></ul>
					<?php
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "jp/list-of-cities-in-japan-by-population.html"){
					?>
						<h2>Города Японии по численности населения</h2>
						<p>В Японии находится 780 городов. Но если вести подсчет вместе с 23 специальными районами Токио, имеющими административный статус, аналогичный статусу города, в Японии 803 города. Список из 100 городов на нашем сайте открывает столица Японии: в Токио проживает чуть менее 9 млн.человек. Двухсотым в списке значится расположенный на острове Хонсю город Дайто с населением 125 847 человек. Почти половину списка (88 городов) занимают населенные пункты с численностью населения от 100 до 200 тысяч человек. Выше по списку тоже весьма значительная группа: 84 города с населением 200-500 тысяч человек. В эту группу входит небольшой, по японским меркам, но известный своей историей город Нара с населением 367 393 человек, который в период 710-784 г.г. взял на себя задачу столицы Японии. Оставшиеся 28 позиций занимают города с населением свыше полумиллиона жителей.</p>
						<h2>Крупные города Японии</h2>
						<p>Япония очень рачительно относится к использованию своей территории, наверное поэтому в сравнительно небольшой по площади стране целых 12 мегаполисов-миллионников. Самым населенным городом Японии является Токио – гигантский ультрасовременный мегаполис, в которой проживает 8 967 665 человек. Дальше рейтинг миллионников страны выглядит следующим образом:</p>
						<ul>
							<li>Йокогама (крупнейший порт) – 3 681 279</li>
							<li>Осака (один из старейших портовых городов, сохранивший японский колорит) – 2 668 113</li>
							<li>Нагоя (важный торгово-промышленный центр) – 2 259 762</li>
							<li>Саппоро (город государственного значения Японии, культурный центр) – 1 896 207</li>
							<li>Кобе (порт и один из крупнейших центров международной торговли) – 1 538 840</li>
							<li>Киото (с 794 по 1869 г.г.  Киото был столицей, главной резиденцией Императоров) – 1 463 444</li>
							<li>Фукуока (значимый индустриальный центр) – 1 461 631</li>
							<li>Кавасаки (важный транспортным узел) – 1 420 329</li>
							<li>Сайтама (очень молодой, но быстроразвивающийся город) – 1 220 710</li>
							<li>Хиросима (первый город в мире, который был подвергнут ядерной бомбардировке) – 1 181 057</li>
							<li>Сендай (один из самых зеленых городов Японии) – 1 060 263</li>
						</ul>
						<p>Города Китокюсю (остров Кюсю) и Тиба (побережье Токийского залива) уверенно подбираются к отметке в миллион жителей.</p>
						<h2>Рейтинги городов Японии</h2>
						<p>Япония относится к густонаселенным странам, но население по территории страны размещается неравномерно. Прибрежные районы страны имеют большую плотность, более 300 чел. на кв км, а на севере острова Хоккайдо плотность всего 70 чел. на кв км. </p>
						<p>Токио, являясь самым населенным городом Японии, по плотности населения уступает другим городам по этому показателю. Так, например в Йокогама плотность населения составляет в Хиросиме - 1 308 чел./кв.км, в Йокогаме - 8 481 чел./кв.км, а в Осаке - 12 042 чел./кв.км.</p>
						<p>Уровень жизни в Японии достаточно высок и даже выше, чем во многих государствах Западной Европы.
						ТОП-5 городов Японии для жизни:
						</p>
						<ul>
							<li>Токио – сочетание древних традиции и современных технологий, самый богатый город мира</li>
							<li>Осака – кулинарная столица Японии</li>
							<li>Иокогама – крупный, но очень чистый портовый город</li>
							<li>Киото - один из самых красивых городов мира</li>
							<li>Фукуока - один из самых быстрорастущих городов</li>
						</ul>
					<?php
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/list-of-cities-in-turkey-by-population.html"){
					?>
						<h2>Города Турции по численности населения</h2>
						<p>Открывает список из 200 городов Турции Стамбул, который занимает первое место не только в нашем списке, но и среди городов Европы по численности населения. В нем проживает почти 11 млн. человек. В самом низу списка группа из пяти городов, идущих вровень:</p>
						<ul>
							<li>город Бор 35 913 человек,</li>
							<li>Буланджак 35 989 человек</li>
							<li>Девели 36 023 человек,</li>
							<li>Синоп 36 031 человек,</li>
							<li>Буджак 36 065 человек.</li>
						</ul>
						<p>Более половины списка, а именно 120 городов имеют население менее 100 тыс. жителей. 68 городов являются домом для населения численностью от 100 тыс.человек до полумиллиона. В древнем городе Эдирне, который с 1380 до 1453 года был главной точкой Османской империи, население чуть более 140 тыс.человек. Шесть городов перешли отметку в 500 тысяч, из них Анталья и Конья вплотную приблизились к миллиону. Именно в Конье жил поэт-суфий Руми – прародитель знаменитого танца дервишей.</p>
						<h2>Крупные города Турции</h2>
						<p>Города-миллионники Турции занимаю топ-шестерку в нашем списке. Вне сомнения, на первом месте с большим отрывом от остальных городов стоит самый населённый город Европы – Стамбул –  с численностью населения 10 895 257 человек. Далее – столица Турции – Анкара, которой так и не удается обогнать Стамбул по многим показателем, с населением, приближающимся к отметке 4 миллиона человек. Третье место у города Измир – второго по величине порта Турции (около 2,7 млн. человек). Еще три мегаполиса с населением до 2 млн. расположились следующим образом:</p>
						<ul>
							<li>Бурса – крупный промышленный центр на северо-западе Анатолии (1 642 020 чел.);</li>
							<li>Адана – центр крупного сельскохозяйственного региона на южном побережьи Средиземного моря (1 529 302 чел.);</li>
							<li>Газиантеп – древний город на юго-востоке, возраст которого насчитывается более 5650 лет (1 279 607 чел.).</li>
						</ul>
						<h2>Рейтинги городов Турции</h2>
						<p>Как и в большинстве стран мира, распределение жителей по территории Турции неравномерно. Побережья Мраморного, Черного и Эгейского морей населены наиболее густо. Самыми малонаселенными районами являются город Хаккяри, расположенный на юго-востоке страны, с показателями плотности 30,61 чел./кв.км. и город Тунджели в Восточной Анатолии с плотностью населения всего 12,64 чел./кв.км.
						Стамбул как мегаполис имеет сравнительно небольшую плотность населения (2480 чел./кв.км.), но это связано с очень большой территорией этого города. В центральных районах, разумеется, плотность в  5 - 8 раз выше. Стамбул очень привлекательное место для жизни так как имеет очень высокий уровень  жизни и дает простор для профессиональной деятельности. Далее в рейтингах городов Турции можно увидеть:
						</p>
						<ul>	
							<li>Анталия – крупный красивый курортный город с благоприятным климатом.</li>
							<li>Анкара – столичный уровень жизни.</li>
							<li>Измир – самый либеральный город Турции, центр предпринимательства и престижного обучения.</li>
							<li>Бурса – один из самых доступных городов для проживания.</li>
							<li>Коджаели – город промышленников и фабрикантов с очень высоким уровнем дохода на душу населения.</li>
						</ul>
					<?php
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "it/list-of-cities-in-italy-by-population.html") {
					?>
						<h2>Города Италии по численности населения</h2>
						<p>В списке на нашем сайте 46 городов Италии с численностью населения свыше 100 тысяч человек (конечно, в Италии городов значительно больше), из которых:</p>
						<ul>
							<li>30 городов численностью населения до 200 тыс. человек,</li>
							<li>10 городов численностью от 200 до 500 тыс. человек,</li>
							<li>4 города с населением от 500 тыс. до 1 млн. человек.</li>
							<li>2 города-миллионника.</li>
						</ul>
						<p>Первенство у столицы и крупнейшего города Италии Рима. В нём проживает чуть менее 3 млн. жителей. 
						Нижние две строчки занимают: Анкона – город-порт на побережье Адриатического моря с населением 101 484 человек и Андриа – город в итальянской провинции Бари с населением 100 416 человек.
						В городе Сиракузы, который в III веке до н. э. был самым крупным по площади городом античности и одним из самых богатых городов Сицилии, в наши дни проживает всего чуть более 122 тысяч человек. А Венеция с населением численностью около 260 тыс.человек, несмотря на то, что постепенно уходит под воду, все еще является крупным туристическим и научно-образовательным центром.
						</p>

						<h2>Крупные города Италии</h2>
						<p>Крупнейшими городами Италии являются два города-миллионника. Государственная столица – Рим, один из древнейших городов мира (население 2 870 493 человек) и финансово-экономическая столица Италии - Милан, который является главным городом северной Италии (население 1 331 586 человек). Неаполь, который удостоен чести быть включенным в список Всемирного наследия ЮНЕСКО, на третьем месте  и стоит на пороге отметки в миллион жителей.</p>
						<p>Еще три города, численность населения которых перевалило за полмиллиона, входят в топовую шестерку самых крупных городов Италии. Это:</p>
						<ul>
							<li>Турин (899,3 тысяч  человек) – важный деловой и культурный центр Северной Италии;</li>
							<li>Палермо (676,5 тыс. чел.) – колоритная столица Сицилии;</li>
							<li>Генуя (594,3 чел.) – крупнейший морской порт.</li>
						</ul>
						<h2>Рейтинги городов Италии</h2>
						<p>Основная часть населения сконцентрирована рядом с самыми крупными городами страны, которые предлагают более высокий уровень жизни. Самыми густонаселенными регионами Италии являются Кампания (429 жителей на кв.км), Ломбардия (412 жителей на кв. км), Лацио (330 жителей на кв. км), Лигурия (298 жителей на кв. км).</p>
						<p>В Риме плотность довольно высока 2234 чел./кв.км., но самым густонаселенным итальянским город является город Портичи (провинция Неаполя), плотность населения в котором составляет 14 726 жителей на один кв.км. Брига-Альта на северо-западе страны (регион Пьемонт) с населением в 52 человек, наоборот, имеет самую низкую плотность населения - 1 житель на кв.км. Но скорее всего это парадоксы официальных размеров городов, что не особо коррелирует с реальным расселением.</p>
						<h2>ТОП-5 итальянских городов для высокого уровня жизни выглядит так:</h2>
						<p>Милан – мировая столица моды.</p>
						<p>Больцано – столица Южного Тироля с потрясающей природой Итальянских Альп.</p>
						<p>Аоста – небольшой, тихий альпийский город.</p>
						<p>Беллуно – северный город в горной долине с дворцами и величественным спокойствием.</p>
						<p>Болонья – студенческая столица</p>
						<p>А вот столица Италии – “город на семи холмах” – привлекает миллионы туристов, но именно поэтому уже не является идеальным местом для жизни.</p>
					<?php
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "br/list-of-cities-in-brazil-by-population.html"){
					?>
						<h2>Города Бразилии по численности населения</h2>
						<p>Все 110 городов Бразилии в нашем списке  – это города с численностью населения, превышающей 250 тыс. человек. Больше половины списка (71 город) занимают города с население от 251 до 500 тыс. населения, а численность населения в 22 городах еще не доросла до отметки в 1 млн.жителей, но перешла рубеж в полмиллиона. Довольно большую часть списка (17 позиций) занимают города-миллионники.</p>
						<p>В нашем списке столица Бразилии – Бразилиа – только на 4-ом месте с население чуть меньше 3 млн. человек. А возглавляет список крупнейший город страны – Сан-Паулу. Это самый населенный город страны, континента и всего Южного полушария (численностью населения почти 12 млн). Город Виаман расположился на нижней строчке (251 033 человек), а предпоследнюю строчку списка занимает город Императрис на северо-востоке страны, который входит в число самых перспективных поселений Бразилии (252 320 человек). Бразильский город с немецкой культурой Блуменау населен 334 тыс.человек, а в Кампу-Гранди, который относится к одному из самых развитых городов страны, 843 120 жителя.</p>
						<h2>Крупные города Бразилии</h2>
						<p>Бразилия – одна из стран мира с наибольшим количеством городов-гигантов с населением свыше миллиона. Целых 17 городов-миллионников, среди которых тройка лидеров:</p>
						<ul>
							<li>Сан-Паулу - шумный город с древней архитектурой, ночная столица Бразилии: 11 895 893 человек;</li>
							<li>Рио-Де-Жанейро - бывшая столица страны, а ныне форпост развлечений и радостей: 6 453 682 человек;</li>
							<li>Салвадор –бывшая столица Бразилии (c сер. XVI по сер. XVIII вв.): 2 902 927 человек.</li>
						</ul>
						<p>Следующая по списку, всего на 50 тыс. уступающая Салвадору, нынешняя столица - Бразилиа, с численностью населения 2 852 372 человек.</p>
						<p>Далее список самых крупных городов Бразилии выглядит следующим образом:</p>
						<ul>
							<li>Форталеза (2,6 млн.чел.)</li>
							<li>Белу-Оризонти (2,5 млн.чел.)</li>
							<li>Манаус (2 млн.чел)</li>
							<li>Куритиба (1,9 млн.чел.)</li>
							<li>Ресифи (1,6 млн.чел.)</li>
							<li>Порту-Алегри (1,5 млн.чел.)</li>
							<li>Белен (1,4 млн.чел.)</li>
							<li>Гояния (1,4 млн.чел.)</li>
							<li>Гуарульюс (1,3 млн.чел.)</li>
							<li>Кампинас (1,2 млн.чел.)</li>
							<li>Сан-Луис, Сан-Гонсалу и Масейо (по 1 млн.чел.).</li>
						</ul>
						<h2>Рейтинги городов Бразилии</h2>
						<p>Большая часть бразильцев населяет северо-восточные, южные и юго-восточные регионы страны в крупных городах: Сан-Паулу (7216 чел./кв.км), Рио-Де-Жанейро (5287 чел./кв.км), Ресифи (7457 чел./кв.км). А в центральном и западном регионе плотность населения относительно невелика, так в дельте Амазонки, на 60% территории, проживает не более 10% населения. Город Ору-Прету - город музеев и церквей, имеет небольшую плотность населения, но выше средних показателей по стране - 55,5 чел./км. Однако в стране есть регионы с показателями значительно ниже средней плотности населения (25.4 чел./кв.км): например, в Формоза 15,9 чел./км, что обусловлено тем, что территория города и его окрестностей лежит в зоне действия полупустынного климата, а в Корумба – небольшом городе на границе с Боливией – плотность всего 1,48 чел./кв.км.</p>
						<h2>ТОП-5 бразильских городов по уровню (качеству) жизни выглядит так:</h2>
						<ul>
							<li>Сан-Паулу – город с одними из самых высоких показателей уровня жизни, туристический мегаполис.</li>
							<li>Рио-Де-Жанейро – город мечты с высоким уровнем доходов на душу населения.</li>
							<li>Бразилиа – город с неординарной и уникальной архитектурой, который вошел в список «достояний человечества» ЮНЕСКО.</li>
							<li>Ресифи – “Бразильская Венеция”, называемый так благодаря множеству архитектурно интересных зданий, красивым каналам и мостам.</li>
							<li>Куритиба – “Сосновое место” (с языка местных индейцев), один из самых экологичных городов планеты. Город расположен на плато (на высоте 932 над у.м.). В окрестностях города распространен один из видов сосны (араукария бразильская).</li>
						</ul>
					<?php
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "in/list-of-cities-in-india-by-population.html") {
					?>
						<h2>Города Индии по численности населения</h2>
						<p>Из 46 городов списка на нашем сайте только один город  Индии - Дханбад,  известный своими большими угольными шахтами и промышленными учреждениями, имеет численность населения около 100 тысяч человек. Остальные 45 городов – это города с населением более полумиллиона человек, из которых 17 городов – с населением от 600 тыс. до 1 млн. человек, и 28 городов-миллионников. Кроме них, на пороге отметки в один миллион жителей стоят 8 городов:</p>
						<ul>
							<li>Мадурай (929 тыс.чел.) – старейший существующий поныне город на полуострове Индостан.</li>
							<li>Коимбатур (931 тыс.чел.) – быстро развивающийся центр текстильного производства на юге Индии.</li>
							<li>Джабалпур (932 тыс.чел.) – город, известный живописными мраморными горными формированиями.</li>
							<li>Амритсар (967 тыс.чел.) – священный город сикхов.</li>
							<li>Раджкот (967 тыс.чел.) – один наиболее быстро растущих городов мира.</li>
							<li>Газиабад (968 тыс.чел.) – крупный индустриальный город Северной Индии.</li>
							<li>Аллахабад (975 тыс.чел.) – место проведения самого большого религиозного праздника мира (фестиваль Кумбха Мела).</li>
							<li>Вишакхапатнам (983 тыс.чел.) - военно-морская база и крупнейший порт на юго-восточном побережье.</li>
						</ul>
						<h2>Крупные города Индии</h2>
						<p>Индия входит в тройку стран, лидирующих по количеству городов-гигантов с населением свыше миллиона. Мумбаи и Дели - безусловные лидеры этого рейтинга. Мумбаи (население 12 миллионов человек) – крупный узел международных путей сообщения, вместе с городами-спутниками образует крупную городскую агломерацию с населением почти 30 миллионов жителей. Дели (население около 10 миллионов) – имеет статус союзной территории, одним из районов которой является официальная столица Индии – Нью-Дели.</p>
						<p>Следующая группа из 11 городов-миллионников – это города, в которых численность населения колеблется от 2 млн. (Нагпур) до 5,5 млн. (Бангалор). В этой группе еще состоят города:
						Лакхнау (2,2 млн.чел.)
						</p>
						<ul>
							<li>Джайпур (2,3 млн.чел.)</li>
							<li>Сурат (2,4 млн.чел.)</li>
							<li>Пуна (2,5 млн.чел.)</li>
							<li>Канпур (2,6 млн.чел.)</li>
							<li>Ахмедабад (3,5 млн.чел.)</li>
							<li>Хайдарабад (3,6 млн.чел.)</li>
							<li>Ченнаи (4,3 млн.чел.)</li>
							<li>Калькутта (4,6 млн.чел.)</li>
						</ul>
						<p>И самая большая группа крупных городов-миллионников Индии с населением до 2 миллионов насчитывает еще 15 мегаполисов: Индаур, Бхопал, Лудхияна, Патна, Вадодара, Агра, Тхане, Васаи-Вирар, Кальян-Домбивли, Варанаси, Насик, Мератх, Фаридабад, Пимпри-Чинчвад, Хаура.</p>	
						<h2>Рейтинги городов</h2>
						<p>Дели и Мумбаи не только самые большие, но и самые густонаселенные города Индии, входящие в ТОП-10 самых плотнонаселенных городов мира: Мумбаи по плотности населения занимает второе место в мире после Манилы с показателем 21 665 чел./кв.км, а в Дели плотность населения 11 297 чел./кв.км. Особенно высокая плотность жителей наблюдается на полуострове Индостан и в дельте реки Ганг, во внутренних областях Индостана и на северо-западе плотность составляет всего 10 чел. на кв. км. и даже меньше (например, в небольшом городе Лех, расположенном в горах на высоте около 3524 метра над уровнем моря, плотность населения всего 0,7 чел./кв.км).</p>
						<h2>ТОП-5 индийских городов по уровню (качеству) жизни выглядит так:</h2>
						<p>Мумбаи – город больших контрастов с высоким уровнем жизни и высокой деловой активностью, база Болливуда</p>
						<p>Кочин – центр торговли специями и крупный порт на побережье Аравийского моря</p>
						<p>Бангалор – центр электронной и аэрокосмической промышленности</p>
						<p>Калькутта – культурный центр современной Индии</p>
					<?php
				} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "us/list-of-cities-in-usa-by-population.html"){
					?>
						<h2>Города США по численности населения</h2>
						<p>Возглавляет наш список Нью-Йорк – крупнейший город США и один из крупнейших городов мира, с населением 8,3 млн человек в черте города и более 20 млн человек в, так называемой, New York Metropolitan Area. На нижней строчке списка город Атенс с населением 119 тыс.человек – город-округ, который является родиной университета Джорджии. Ровно половину нашего списка занимают города, численность которых не превышает 200 тыс.чел. Далее большая группа (67) городов, численность которых варьируется от 200 до 500 тыс.чел. Отметку в полмиллиона жителей перешли 23 города, и хоть им еще нужно “дорасти” до миллиона, среди уже есть много очень знаменитых городов. В эту группу входят:</p>
						<ul>
							<li>Вашингтон (601 723 человек) – столица США;</li>
							<li>Сиэтл (652 тыс.чел.) – город на холмах, где зародилась культура потребления кофе;</li>
							<li>Мемфис (647 тыс.чел.) – крупнейший экономический центр юга страны, который воспитал огромное количество выдающихся музыкантов;</li>
							<li>Остин (885 тыс.чел.) – город основан 1839 году и назван в честь основателя независимого Техаса Стивена Остина. В Остине располагается один из крупнейших университетов в США (Техасский университет) и др.</li>
						</ul>
						<h2>Крупные города США</h2>
						<p>В США 9 крупнейших мегаполисов с населением свыше миллиона человек. В рейтинге самых крупных городов-гигантов уверенно и с большим отрывом лидирует город контрастов – Нью-Йорк с населением 8 с лишним миллионов человек. Остальные восемь позиций распределились следующим образом:</p>
						<ul>
							<li>Лос-Анджелес (3,9 млн.чел.)</li>
							<li>Чикаго (2,7 млн.чел.)</li>
							<li>Хьюстон (2,2 млн.чел.)</li>
							<li>Филадельфия (1,5 млн.чел.)</li>
							<li>Феникс (1,4 млн.чел.)</li>
							<li>Сан-Антонио (1,4 млн.чел.)</li>
							<li>Сан-Диего (1,35 млн.чел.)</li>
							<li>Даллас (1,3 млн.чел.)</li>
						</ul>
						<p>Город Сан-Хосе с населением в 998 537 человек вплотную подошел к отметке в миллион жителей. Сан-Хосе располагается в самом центре технологически-развитого кластера, который в России принято называть Силиконовая долина.</p>
						<h2>Рейтинги городов</h2>
						<p>Среди развитых стран мира по плотности населения США занимают одно из последних мест. Средняя плотность населения США на 2020 год - 34 чел./кв. км. Самый большой город государства Нью-Йорк и здесь на лидирующей позиции с плотностью населения 10 654 чел./кв. км. Значительно отстает второй по численности город США – Лос Анджелес (2 913 чел./кв. км.). Но последний значительно больше по размеру.</p>
						<p>Северо-восточные районы страны заселены наиболее плотно, так как там очень благоприятные условия проживания, чем не может похвастаться территория Аляски, где соответственно самые низкие показатели – около 0,5 чел. на кв.км.</p>
						<h2>ТОП-10 городов США по уровню (качеству) жизни выглядит так:</h2>
						<ul>
							<li>Нью-Йорк – один из главных финансовых и культурных центров мира.</li>
							<li>Вашингтон – столица США – самостоятельная территория, не входящая ни в один из штатов.</li>
							<li>Майами – один из самых дорогих и престижных мировых курортов.</li>
							<li>Лас-Вегас – главный центр индустрии развлечений и игорного бизнеса планеты.</li>
							<li>Чикаго – один из крупнейших деловых и политических центров Америки.</li>
							<li>Хьюстон – город, входящий в десятку наиболее удобных и комфортных для проживания городов мира.</li>
							<li>Гонолуну (население около 400 тыс. чел.) – столица Гавайев: тропического рай, место для отдыха и одновременно место, где находится основная база военно-морских сил США в центральной части Тихого океана (пригород Гонолулу).</li>
							<li>Сан-Франциско (население приближается к 900 тыс. чел) – туристический центр США и один из самых дорогих городов страны, культурный центр Калифорнии.</li>
							<li>Филадельфия – несмотря на свое 5 место в США по численности население, очень спокойный и размеренный город, из-за чего его называют «городом малых городов». Старейший город США.</li>
							<li>Новый Орлеан (385 тыс жителей) – город знаменитый своей кухней, музыкой (родина джаза!), многочисленными фестивалями и карнавалами.</li>
						</ul>
					<?php
				}
				
				?>

				<?php
				echo $section;
				?>
			</section>

			<aside itemscope='' itemtype='http://schema.org/WPSideBar' class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
			<?php 
			echo $asideup;
			?>
				<ul class='parent-menu-list'>
					<li>
						<h3 style="font-size: 18px;
    							   padding: 5px 0 5px 15px;
								   font-weight: 600;">Списки городов в других странах</h3>
						<ul class='child-menu-list'>
						<?php getRightTableRu($libcountry,1);?>
						</ul>
					</li>
				</ul>

					<?php echo $ads3;?>
				<ul class='parent-menu-list'>
					<li>
						<p class='lang'>На других языках</p>
						<ul class='language-menu-list'>
							<li><a href='/en/<?php 
							foreach($libcountry as $value){
								if ($countryISO[1] == $value["country_iso"]){
									print($value["rate_city_country"]);
								}
							}
							unset($value);
							?>.html' title='List of cities in <?php 
							foreach($libcountry as $value){
								if ($countryISO[1] == $value["country_iso"]){
									print($value["name_country_en"]);
								}
							}
							unset($value);
							?>'>List of cities in <?php 
							foreach($libcountry as $value){
								if ($countryISO[1] == $value["country_iso"]){
									print($value["name_country_en"]);
								}
							}
							unset($value);
							?></a></li>
						</ul>
					</li>
				</ul>
				<?php
				echo $asidedown;
				?>
			</aside>
			<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-body'>
					<div class='row'>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
		<?php
	} elseif ($countryISO[1] == "en"){

		// ENG_VERSION

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

		// ENG_VERSION CITY_START

		if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_city_en"){
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
            <li itemprop='name'><a itemprop='url' href='/en/list-of-countries-by-population.html'>Countries</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-kingdoms-by-population.html'>Kingdomcs</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-republics-by-population.html'>Republics</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-cities-by-population.html'>Cities</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div class='container'>
		
		<div class='row'>

				<?php echo $ads1; ?>

		</div>
		
		<div class='row b'>
			<div id='breadcrumbs'>
				<div id='breadcrumbs-inner'>
					<ul itemscope='' itemtype='http://schema.org/BreadcrumbList'>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/en/population-of-earth.html' itemprop='item'>
								<span itemprop='name'>Population of Earth</span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/en/<?php foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_href"]);
									}
								}
								unset($value);?>.html' itemprop='item'>
								<span itemprop='name'>Population of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<span itemprop='item'>
								<span itemprop='name'>Population of <?php print $name_city_en;?></span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>

		<div class='row'>
		
			<section class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-heading' >
					<h1 itemprop='headline'>Population of <?php print $name_city_en;?></h1>
				</div>
				
				<div  itemprop='text'>
					<p>In <?php echo $year;?>, the population of the city of <strong><?php print $name_city_en;?></strong>, <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> is - <span class='pop-info'><?php 
								foreach(${"lib" . $countryISO[2]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
										print($value["count"]);
										break;
									}
								}
								unset($value);
								?></span> people. All-populations.com used data from the number of the population from official sources. Find out what statistics the population of the country, city, district on All-populations.com.</p>
				</div>		
		
				<div class='showinfo'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						
							<?php echo $ads2;?>
							
						</div>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
							<div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
								<h3 class='naselenie'><?php print $name_city_en;?> - Population</h3>
								<span class='skolko'><?php 
								foreach(${"lib" . $countryISO[2]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
										print($value["count"]);
										break;
									}
								}
								unset($value);
								?> people</span>
								<img src='/en/images/<?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["country_flag"]);
									}
								}
								unset($value);
								?>' itemprop='contentUrl' width='160' height='107' alt='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' title='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
								<span class='date'>In <?php echo $month;?> <?php echo $year;?></span>
							</div>
						</div>
					</div>
				</div>
				<p>Accessible information on the population of any region, fast work of the site and constant updating of information are the basis of our resource. Soon it will be possible to see the city of <?php print $name_city_en;?> on the map.</p>
				
				<?php
				echo $section;
				?>
			</section>

			<aside itemscope='' itemtype='http://schema.org/WPSideBar' class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
			<?php 
			echo $asideup;
			?>
				<ul class='parent-menu-list'>
					<li>
						<a itemprop='url' href='/en/<?php getListHref($libcountry,185);?>.html' title='List of cities in <?php getNameCountryEn($libcountry,185);?> by population'>
							<span itemprop='name'>List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> by population</span>
						</a>
						<ul class='child-menu-list'>
							<?php rightMenuEn(${"lib" . $countryISO[2]},15);?>
						</ul>
					</li>
				</ul>

					<?php echo $ads3;?>

				<?php
				echo $asidedown;
				?>
			</aside>
			<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-body'>
					<div class='row'>
						<div class='panel-heading h2'>
							<h2>Recent requests of the population:</h2>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
				<ul class='parent-menu-list'>
					<li>
						<p class='lang'>Other languages</p>
						<ul class='language-menu-list'>
							<li><a href='/../<?php 
								foreach(${"lib" . $countryISO[2]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
										print($value["name_href"]);
										break;
									}
								}
								unset($value);
								?>.html' title='Численность населения <?php 
								foreach(${"lib" . $countryISO[2]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
										print($value["name_ru"]);
										break;
									}
								}
								unset($value);
								?>'>Численность населения <?php 
								foreach(${"lib" . $countryISO[2]} as $value){
									if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
										print($value["name_ru"]);
										break;
									}
								}
								unset($value);
								?></a></li>
						</ul>
					</li>
				</ul>
			</div>
			
		</div>
	 </div>
			<?php
			// ENG_VERSION CITY_END

			// ENG_VERSION COUNTRY_START
		} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_country_en") {
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
            <li itemprop='name'><a itemprop='url' href='/en/list-of-countries-by-population.html'>Countries</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-kingdoms-by-population.html'>Kingdoms</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-republics-by-population.html'>Republics</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-cities-by-population.html'>Cities</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div class='container'>
		
		<div class='row'>

				<?php echo $ads1; ?>

		</div>
		
		<div class='row b'>
			<div id='breadcrumbs'>
				<div id='breadcrumbs-inner'>
					<ul itemscope='' itemtype='http://schema.org/BreadcrumbList'>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/en/population-of-earth.html' itemprop='item'>
								<span itemprop='name'>Population of Earth</span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<span itemprop='item'>
								<span itemprop='name'>Population of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>

		<div class='row'>
		
			<section class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-heading' >
					<h1 itemprop='headline'>Population of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></h1>
				</div>
				
				<div  itemprop='text'>
				<p>In <?php echo $year;?> the population of <strong><?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></strong> is <span class='pop-info'><?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?></span> people. All-populations.com used data from the number of the population from official sources. Find out what statistics the population of the country, city, district on All-populations.com.</p>	
				</div>
				<div class='showinfo'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						
							<?php echo $ads2;?>
							
						</div>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
							<div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
								<h3 class='naselenie'><?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> - Population</h3>
								<span class='skolko'><?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?> people</span>
								<img src='/en/images/<?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["country_flag"]);
									}
								}
								unset($value);
								?>' itemprop='contentUrl' width='160' height='107' alt='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' title='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
								<span class='date'>In <?php echo $month;?> <?php echo $year;?></span>
							</div>
						</div>
					</div>
				</div>
				<p>Accessible information on the population of any region, fast work of the site and constant updating of information are the basis of our resource. Soon it will be possible to see where <?php getNameCountryEn($libcountry,1);?> is on the map.</p>
				
				<?php
				echo $section;
				?>
			</section>

			<aside itemscope='' itemtype='http://schema.org/WPSideBar' class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
			<?php 
			echo $asideup;
			?>
				<ul class='parent-menu-list'>
					<li>
						<a itemprop='url' href='/en/<?php
								if ($countryISO[2] == "gb") {
									print("eng/list-of-cities-in-england-by-population");
								} else {
									foreach($libcountry as $value){
										if ($countryISO[2] == $value["country_iso"]){
											print($value["rate_city_country"]);
										}
									}
									unset($value);
								}
								?>.html' title='List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> by population'>
							<span itemprop='name'>List of cities in <?php
								if ($countryISO[2] == "gb"){
									print ("England");
								} else {
									foreach($libcountry as $value){
										if ($countryISO[2] == $value["country_iso"]){
											print($value["name_country_en"]);
										}
									}
									unset($value);
								}
								?> by population</span>
						</a>
						<ul class='child-menu-list'>
						<?php
						if ($countryISO[2] == "gb"){
							rightMenuEnF($libeng, 15);
						} else {
							rightMenuEnF(${"lib" . $countryISO[2]},15);
						}
						?>
						</ul>
					</li>
				</ul>

					<?php echo $ads3;?>

				<?php
				echo $asidedown;
				?>
			</aside>
			<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-body'>
					<div class='row'>
						<div class='panel-heading h2'>
							<h2>Recent requests of the population:</h2>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
				<ul class='parent-menu-list'>
					<li>
						<p class='lang'>Other languages</p>
						<ul class='language-menu-list'>
							<li><a href='/../<?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_href"]);
									}
								}
								unset($value);
								?>.html' title='Численность населения <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?>'>Численность населения <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_ru_zz"]);
									}
								}
								unset($value);
								?></a></li>
						</ul>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
			<?php
			// ENG_VERSION COUNTRY_END

			// ENG_VERSION RATE_CITY_START
		} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "$href_rate_city_en"){
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
            <li itemprop='name'><a itemprop='url' href='/en/list-of-countries-by-population.html'>Countries</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-kingdoms-by-population.html'>Kingdomcs</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-republics-by-population.html'>Republics</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-cities-by-population.html'>Cities</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div class='container'>
		
		<div class='row'>

				<?php echo $ads1; ?>

		</div>
		
		<div class='row b'>
			<div id='breadcrumbs'>
				<div id='breadcrumbs-inner'>
					<ul itemscope='' itemtype='http://schema.org/BreadcrumbList'>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/en/population-of-earth.html' itemprop='item'>
								<span itemprop='name'>Population of Earth</span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/en/<?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_href"]);
									}
								}
								unset($value);
								?>.html' itemprop='item'>
								<span itemprop='name'>Population of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<span itemprop='item'>
								<span itemprop='name'>List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>

		<div class='row'>
		
			<section class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-heading' >
					<h1 itemprop='headline'>List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> by population</h1>
				</div>
				
				<div  itemprop='text'>
					<p>List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> by population <?php echo $year; ?>.<p>	
					<p>Total number of cities: <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count_city_country"]);
									}
								}
								unset($value);
								?>.</p>
					<p>Total population: <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?>.</p>
				</div>		
				
				<input class='form-control' id='myInput' type='text' placeholder='Search city..'>
				<br>
				<div class='table-responsive'>
				<table class='table table-bordered'>
					<thead>
					  <tr>
						<th>#</th>
						<th>Name, city</th>
						<th>Population, people</th>
					  </tr>
					</thead>
					<tbody id='myTable'>
						<?php 
						foreach($libcountry as $value){
							if ($countryISO[2] == $value["country_iso"]){
								$count_city = ($value["count_city_country"]);
							}
						}
						unset($value);
						if ($count_city >= "200"){
							getTable200En(${"lib" . $countryISO[2]});
						} else {
							getTableEn(${"lib" . $countryISO[2]});
						}
						?>
					</tbody>
				</table>
				</div>
				<?php echo $scripttable;?>
				  
				<div class='showinfo'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						
							<?php echo $ads2;?>
							
						</div>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						<div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
								<h3 class='naselenie'><?php 
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								?> - Population</h3>
								<span class='skolko'><?php 
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?> people</span>
								<img src='/en/images/<?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["country_flag"]);
									}
								}
								unset($value);
								?>' itemprop='contentUrl' width='160' height='107' alt='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' title='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
								<span class='date'>In <?php echo $month;?> <?php echo $year;?></span>
							</div>
						</div>
					</div>
				</div>
				
				<?php
				echo $section;
				?>
			</section>

			<aside itemscope='' itemtype='http://schema.org/WPSideBar' class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
			<?php 
			echo $asideup;
			?>
				<ul class='parent-menu-list'>
					<li>
						<h3>Lists of cities in other countries</h3>
						<ul class='child-menu-list'>
						<?php getRightTableEn($libcountry,1);?>
						</ul>
					</li>
				</ul>

					<?php echo $ads3;?>
				<ul class='parent-menu-list'>
					<li>
						<p class='lang'>Other languages</p>
						<ul class='language-menu-list'>
							<li><a href='/<?php 
							foreach($libcountry as $value){
								if ($countryISO[2] == $value["country_iso"]){
									print($value["rate_city_country"]);
								}
							}
							unset($value);
							?>.html' title='Список городов <?php 
							foreach($libcountry as $value){
								if ($countryISO[2] == $value["country_iso"]){
									print($value["name_country_ru_zz"]);
								}
							}
							unset($value);
							?> по населению'>Список городов <?php 
							foreach($libcountry as $value){
								if ($countryISO[2] == $value["country_iso"]){
									print($value["name_country_ru_zz"]);
								}
							}
							unset($value);
							?> по населению</a></li>
						</ul>
					</li>
				</ul>
				<?php
				echo $asidedown;
				?>
			</aside>
			<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-body'>
					<div class='row'>
						<div class='panel-heading h2'>
							<h2>Recent requests of the population:</h2>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

			<?php
		}
			// ENG_VERSION RATE_CITY_END
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