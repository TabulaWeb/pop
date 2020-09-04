<?php
include 'ru/inc/linkadd.php';
include 'ru/inc/config.php';
include 'core/function.php';
?><!DOCTYPE html>
<?php
echo $doctypedown;
echo $htmlup;
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<?php
echo $htmldown;
echo $headup;
?>
  <head>
   <?php
echo $headdown;
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Текущая статистика численности населения: мира, стран, городов</title>
	<meta name="title" content="Текущая статистика численности населения: мира, стран, городов">
	<meta name="description" content="Здесь вы узнаете сколько людей живет на планете, численность населения каждой страны и каждого города. Рейтинги стран и городов по численности населения.">
	<meta name="keywords" content="Статистика населения">
	
	<link rel="shortcut icon" href="favicon.ico">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<?php
echo $headtop;
?>
  </head>
  <?php
echo $headfoot;
echo $bodyup;
?>
  <body itemscope="itemscope" itemtype="http://schema.org/WebPageElement">
<?php
echo $bodydown;
?>
	<nav class="navbar navbar-inverse navbar-fixed-top" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		<a class="navbar-brand" href="/"><span style="color: #f3e99a;">all-</span>populations<span style="color: #eee;">.com</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li itemprop="name"><a itemprop="url" href="ru/list-of-countries-by-population.php">Страны</a></li>
            <li itemprop="name"><a itemprop="url" href="ru/list-of-kingdoms-by-population.php">Королевства</a></li>
            <li itemprop="name"><a itemprop="url" href="ru/list-of-republics-by-population.php">Республики</a></li>
            <li itemprop="name"><a itemprop="url" href="ru/list-of-cities-by-population.php">Города</a></li>
          </ul>
        </div>
      </div>
    </nav>

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
							<a href="ru/population-of-earth.php">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">Население земли / RU</span>
							</a>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="en/population-of-earth.html">
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
						<a itemprop="url" href="https://all-populations.com/ru/list-of-countries-by-population.html" title="List of countries by population">
							<span itemprop="name">Список стран по численности населения</span>
						</a>
						<ul class="child-menu-list">
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/cn/population-of-china.html" title="Population of China">
									<span itemprop="name">Население Китая</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/in/population-of-india.html" title="Population of India">
									<span itemprop="name">Население Индии</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/us/population-of-usa.html" title="Population of USA">
									<span itemprop="name">Население США</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/id/population-of-indonesia.html" title="Population of Indonesia">
									<span itemprop="name">Население Индонезии</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/pk/population-of-pakistan.html" title="Population of Pakistan">
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
	<footer itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<?php
		echo $footerup;
		?>
		<div class="container">
			<div class="row centered" itemprop="text">
				<p>© All-populations.com - <?php echo $year;?></p>
				<p>Узнайте численность населения в вашем регионе! 					<!--LiveInternet counter--><script type="text/javascript">
document.write("<a rel='nofollow' href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t45.5;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,150))+";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='0' height='0'><\/a>")
</script><!--/LiveInternet--></p>

			</div>
		</div>
	<?php
		echo $footerdown;
		?>
	</footer>
    <script src='https://code.jquery.com/jquery-1.10.2.min.js'></script>
    <script async src='assets/js/bootstrap.min.js'></script>
	<?php echo $bodytop?>
  </body>
</html>