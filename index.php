<?php 
$server_link = $_SERVER['REQUEST_URI'];
$countryISO = explode("/", $server_link); 
?>

<?php
include 'ru/inc/linkadd.php';
include 'ru/inc/config.php';
include 'core/function.php'; 
if ($_SERVER['REQUEST_URI'] == "/"){
	include 'core/libby.php';
} else{
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
		if ($_SERVER['REQUEST_URI'] != "/"){
			foreach(${"lib" . $countryISO[1]} as $value){
				if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
					$href_city = $value["name_href"] . $end_link;
				}
			}
		}

		foreach($libcountry as $value){
			if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_country_href"] . $end_link){
				$name_country = $value["name_country_ru"];
				$href_country = $value["name_country_href"] . $end_link;
			}
		}
	
		foreach($libcountry as $value){
			if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["rate_city_country"]){
				$href_rate_city =  $value["rate_city_country"];
			}
		}



		if($_SERVER['REQUEST_URI'] == "/"){
			print("Текущая статистика численности населения: мира, стран, городов");
		} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_city"){
			foreach(${"lib" . $countryISO[1]} as $value){
			if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
				$name_city = $value["name_ru"];
				print("Население города $name_city. Узнайте сколько людей живет в $name_city");
			}
		}	
		unset($value);
		} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_country") {
			foreach($libcountry as $value){
			if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				print "Население $name_country. Узнайте сколько людей живет в $name_country";
			}
		}
		} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_rate_city") {
			foreach($libcountry as $value){
			if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["rate_city_country"]){
				$name_country =  $value["name_country_ru"];
				$href_rate_city =  $value["rate_city_country"];
				print "Самые крупные города $name_country по численности населения";
			}
		}
		}
	?>
	</title>
	<!-- DESCRIPTION -->
	<meta name='description' content='
	<?php
		if($_SERVER['REQUEST_URI'] == "/"){
			print("Здесь вы узнаете сколько людей живет на планете, численность населения каждой страны и каждого города. Рейтинги стран и городов по численности населения.");
		} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_city"){
			foreach(${"lib" . $countryISO[1]} as $value){
			if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
				$name_city = $value["name_ru"];
				print("Актуальные данные о численности населения города $name_city на $year год. Узнайте сколько человек проживает в городе.");
			}
		}	
		unset($value);
		} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_country") {
			foreach($libcountry as $value){
			if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_country_href"] . $end_link){
				$name_country =  $value["name_country_ru"];
				print "Актуальные данные о численности населения $name_country на $year год. Узнайте сколько человек проживает в стране.";
			}
		}
		} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_rate_city") {
			foreach($libcountry as $value){
			if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["rate_city_country"]){
				$name_country =  $value["name_country_ru"];
				$href_rate_city =  $value["rate_city_country"];
				print "Рейтинг городов $name_country по численности населения на 2020 год. Узнайте список самых крупных городов $name_country";
			}
		}
		}
	?>
	'>
	<meta name='keywords' content='Численность населения <?php getNameRu($libad,15);?>, население <?php getNameRu($libad,15);?> на <?php echo $year;?> год'>
	
	<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>

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
			if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["rate_city_country"]){
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

<?php 

// print ltrim($_SERVER['REQUEST_URI'], "/");

// if (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_country"){
// 	foreach($libcountry as $value){
// 		if(ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_country_href"] . $end_link){
// 			$href_country = $value["name_country_href"] . $end_link;
// 			print $href_country;
// 		}
// 	}
// }

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
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-countries-by-population.php'>Страны</a></li>
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-kingdoms-by-population.php'>Королевства</a></li>
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-republics-by-population.php'>Республики</a></li>
            <li itemprop='name'><a itemprop='url' href='../ru/list-of-cities-by-population.php'>Города</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	
	<?php  
	// PAGE HOME__START
	if($_SERVER['REQUEST_URI'] == "/"){
		?>
		
		<div class="container">
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">Статистика населения</h1>
				</div>
				
				<div itemprop="text">
					<p>Текущая статистика населения в мире.</p>
					<h2>Выбрать язык:</h2>
				</div>
				
				<div class="showinfo">
					<div class="row">
					
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="/ru/population-of-earth.php">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">Население земли / RU</span>
							</a>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="/en/population-of-earth.php">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">World population / EN</span>
							</a>
							</div>
						</div>
						
					</div>
				</div>
				<p>Доступная информация по населению любого региона, быстрая работа сайта и постоянное обновление информации являются основой нашего ресурса.</p>
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
						<a itemprop="url" href="ru/list-of-countries-by-population.php" title="List of countries by population">
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
						<div class="panel-heading h2">
							<h2>Недавно интересовались населением:</h2>
						</div>
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
	} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_city"){
	// PAGE SITY__START
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
							<a href='/ru/population-of-earth.php' itemprop='item'>
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
									if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
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
									if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
									}
								}
								unset($value);
								?>
					</h1>
				</div>
				
				<div  itemprop='text'>
				<p>На <?php echo $year;?> год численность населения города 
				<strong>
				<?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
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
									if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
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
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
									}
								}
								unset($value);
								?> - Население</h3>
								<span class='skolko'>
								<?php 
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
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
								foreach(${"lib" . $countryISO[1]} as $value){
									if (ltrim($_SERVER['REQUEST_URI'], "/") == $value["name_href"] . $end_link){
										print($value["name_ru"]);
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
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["rate_city_country"]);
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
						<div class='panel-heading h2'>
							<h2>Недавно интересовались населением:</h2>
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
						<p class='lang'>На других языках</p>
						<ul class='language-menu-list'>
							<li><a href='https://all-populations.com/en/<?php getNameHref($libad,15);?>.html' title='Population of <?php getNameEn($libad,15);?>'>Population of <?php getNameEn($libad,15);?></a></li>
						</ul>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
	<?php
	// PAGE CITY__END
	} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_country") {
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
							<a href='/ru/population-of-earth.php' itemprop='item'>
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
										print($value["name_country_ru_zz"]);
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
								foreach($libcountry as $value){
									if ($countryISO[1] == $value["country_iso"]){
										print($value["rate_city_country"]);
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
						<div class='panel-heading h2'>
							<h2>Недавно интересовались населением:</h2>
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
						<p class='lang'>На других языках</p>
						<ul class='language-menu-list'>
							<li><a href='https://all-populations.com/en/<?php getNameHref($libad,15);?>.html' title='Population of <?php getNameEn($libad,15);?>'>Population of <?php getNameEn($libad,15);?></a></li>
						</ul>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
	<?php
	//  PAGE COUNTRY__END

	// PAGE RATE CITY START
	} elseif (ltrim($_SERVER['REQUEST_URI'], "/") == "$href_rate_city") {
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
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-countries-by-population.php'>Страны</a></li>
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-kingdoms-by-population.php'>Королевства</a></li>
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-republics-by-population.php'>Республики</a></li>
            <li itemprop='name'><a itemprop='url' href='/ru/list-of-cities-by-population.php'>Города</a></li>
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
							<li><a href='https://all-populations.com/en/<?php getListHref($libcountry,1);?>.html' title='List of cities in <?php getNameCountryEn($libcountry,1);?>'>List of cities in <?php getNameCountryEn($libcountry,1);?></a></li>
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
							<h2>Недавно интересовались населением:</h2>
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
	// PAGE RATE_CITY END
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