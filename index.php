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
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-istanbul.html"){
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
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "tr/population-of-istanbul.html") {
							print("Наш сайт использовал данные количества населения из официальных источников.");
						} elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == "cn/population-of-beijing.html") {
							print("");
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
					<h1 itemprop='headline'>Численность населения 
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
				<p>На <?php echo $year;?> год численность населения
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
								?></span> человек. All-populations.com использовал данные количества населения из официальных источников. Узнать, какая статистика населения страны, города, района на All-populations.com. </p>
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
				</div>		
				
				<input class='form-control' id='myInput' type='text' placeholder='Поиск города..'>
				<br>
				<h2>Самые крупные города <?php
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
					  <?php getTable(${"lib" . $countryISO[1]});?>
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
								<h3 class='naselenie'>Страна: <?php getNameCountryRuZ($libcountry,1);?></h3>
								<span class='skolko'>Количество городов: <?php getCityCount($libcountry,1);?></span>
								<img src='https://all-populations.com/ru/images/<?php getCountryFlag($libcountry,1);?>' itemprop='contentUrl' width='160' height='107' alt='Флаг <?php getNameCountryRu($libcountry,1);?>' title='Флаг <?php getNameCountryRu($libcountry,1);?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Флаг <?php getNameCountryRu($libcountry,1);?></span>
								<span class='date'>На <?php echo $month;?> <?php echo $year;?> год</span>
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
					  <?php getTableEn(${"lib" . $countryISO[2]});?>
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
								<h3 class='naselenie'>Country: <?php getNameCountryEn($libcountry,1);?></h3>
								<span class='skolko'>Number of cities: <?php getCityCount($libcountry,1);?></span>
								<img src='https://all-populations.com/en/images/<?php getCountryFlag($libcountry,1);?>' itemprop='contentUrl' width='160' height='107' alt='Flag of<?php getNameCountryEn($libcountry,1);?>' title='Flag of <?php getNameCountryEn($libcountry,1);?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Flag of <?php getNameCountryEn($libcountry,1);?></span>
								<span class='date'>In <?php echo $year;?></span>
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
    <script async src='https://all-populations.com/assets/js/bootstrap.min.js'></script>
  <?php
  echo $bodytop;
  ?>
  </body>
  <?php
  echo $bodyfoot;
  ?>
</html>