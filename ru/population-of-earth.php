<?php
include 'inc/linkadd.php';
include 'inc/config.php';
include '../core/function.php';
include '../core/libcountry.php';
echo $doctypeup;
?>
<!DOCTYPE html>
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
	
	<title>Численность населения мира на <?php echo $year;?> год</title>
	<meta name="title" content="Численность населения мира на <?php echo $year;?> год">
	<meta name="description" content="Узнайте сколько человек живет в мире. Статистика численности людей на Земле на <?php echo $year;?> год.">
	<meta name="keywords" content="Численность населения Земли, статистика населения Земли на <?php echo $year;?> год">
	
	<link rel="shortcut icon" href="../favicon.ico">

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
 
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
		<a class="navbar-brand" href="../home.php"><span style="color: #f3e99a;">all-</span>populations<span style="color: #eee;">.com</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li itemprop="name"><a itemprop="url" href="list-of-countries-by-population.php">Страны</a></li>
            <li itemprop="name"><a itemprop="url" href="list-of-kingdoms-by-population.php">Королевства</a></li>
            <li itemprop="name"><a itemprop="url" href="list-of-republics-by-population.php">Республики</a></li>
            <li itemprop="name"><a itemprop="url" href="list-of-cities-by-population.php">Города</a></li>
          </ul>
        </div>
      </div>
    </nav>

	<div class="container">
	
		<div class="row">
			<?php echo $ads1; ?>
		</div>
		
		<div class="row b">
			<div id="breadcrumbs">
				<div id="breadcrumbs-inner">
					<ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<a href="../home.php" itemprop="item">
								<span itemprop="name">All-populations.com</span>
							</a>
						</li>    
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<span itemprop="item">
								<span itemprop="name">Население Земли</span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">Численность населения Земли</h1>
				</div>
				
				<div itemprop="text">
					<p>На <?php echo $year;?> год численность населения Земли составляет — <span class="pop-info">7 632 819 325</span> человек. </p>
					<p>All-populations.com использовал данные количества населения из официальных источников. Узнать, какая статистика населения страны, города, района на All-populations.com.</p>
				</div>
				
				<div class="showinfo">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<?php echo $ads2;?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" itemscope="" itemtype="http://schema.org/ImageObject">
								<h3 class="naselenie">Земля - Население</h3>
								<span class="skolko">7 632 819 325 человек</span>
								<img src="https://all-populations.com/ru/map-earth.jpg" itemprop="contentUrl" width="180" height="100" alt="Карта Земли" title="Карта Земли" />
								<span itemprop="name" style="display:block; font-size: 12px;">Карта Земли</span>
								<span class="date">На <?php echo $year;?> год</span>
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
						<a itemprop="url" href="list-of-countries-by-population.php" title="">
							<span itemprop="name">Список стран по численности населения</span>
						</a>
						<ul class="child-menu-list">
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/cn/population-of-china.html" title="Население Китая">
									<span itemprop="name">Население Китая</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/in/population-of-india.html" title="Население Индии">
									<span itemprop="name">Население Индии</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/us/population-of-usa.html" title="Население США">
									<span itemprop="name">Население США</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/id/population-of-indonesia.html" title="Население Индонезии">
									<span itemprop="name">Население Индонезии</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="https://all-populations.com/ru/pk/population-of-pakistan.html" title="Население Пакистана">
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
			
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<ul class="parent-menu-list">
					<li>
						<p class="lang">На других языках</p>
						<ul class="language-menu-list">
							<li><a href="https://all-populations.com/en/population-of-earth.html" title="Population of Earth">Population of Earth</a></li>
						</ul>
					</li>
				</ul>
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
				<p>Узнайте численность населения в вашем регионе!</p>
			</div>
		</div>
		<?php
		echo $footerdown;
		?>
	</footer>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script async src="https://all-populations.com/assets/js/bootstrap.min.js"></script>
	<?php echo $bodytop?>
  </body>
</html>