<?php
include 'en/inc/linkadd.php';
include 'en/inc/config.php';
include 'core/function.php';
?><!DOCTYPE html>
<?php
echo $doctypedown;
echo $htmlup;
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
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
	
	<title>Population statistics: Countries, Cities, Kingdoms, Republics</title>
	<meta name="description" content="Population statistics">
	<meta name="keywords" content="Population statistics">
	
	<link rel="shortcut icon" href="https://all-populations.com/favicon.ico">

    <link href="https://all-populations.com/assets/css/bootstrap.css" rel="stylesheet">
    <link href="https://all-populations.com/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://all-populations.com/assets/css/main.css" rel="stylesheet">
 
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
            <li itemprop="name"><a itemprop="url" href="en/list-of-countries-by-population.html">Countries</a></li>
            <li itemprop="name"><a itemprop="url" href="en/list-of-kingdoms-by-population.html">Kingdoms</a></li>
            <li itemprop="name"><a itemprop="url" href="en/list-of-republics-by-population.html">Republics</a></li>
            <li itemprop="name"><a itemprop="url" href="en/list-of-cities-by-population.html">Cities</a></li>
          </ul>
        </div>
      </div>
    </nav>

	<div class="container">
	
		<div class="row">
			<?php echo $ads1; ?>
		</div>
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">Population statistics</h1>
				</div>
				
				<div itemprop="text">
					<p>Current population statistics in the world.</p>
					<h2>Change language:</h2>
				</div>
				
				<div class="showinfo">
					<div class="row">
					
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="en/population-of-earth.html">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">World population / EN</span>
							</a>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="ru/population-of-earth.html">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">Население земли / RU</span>
							</a>
							</div>
						</div>
						
					</div>
				</div>
				<p>Accessible information on the population of any region, fast work of the site and constant updating of information are the basis of our resource.</p>
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
						<a itemprop="url" href="en/list-of-countries-by-population.html" title="List of countries by population">
							<span itemprop="name">List of countries by population</span>
						</a>
						<ul class="child-menu-list">
							<li>
								<a itemprop="url" href="en/cn/population-of-china.html" title="Population of China">
									<span itemprop="name">Population of China</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="en/in/population-of-india.html" title="Population of India">
									<span itemprop="name">Population of India</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="en/us/population-of-usa.html" title="Population of USA">
									<span itemprop="name">Population of USA</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="en/id/population-of-indonesia.html" title="Population of Indonesia">
									<span itemprop="name">Population of Indonesia</span>
								</a>
							</li>
							<li>
								<a itemprop="url" href="en/pk/population-of-pakistan.html" title="Population of Pakistan">
									<span itemprop="name">Population of Pakistan</span>
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
							<h2>Recent requests of the population:</h2>
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
				<p>Find out the population in your region! 					<!--LiveInternet counter--><script type="text/javascript">
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