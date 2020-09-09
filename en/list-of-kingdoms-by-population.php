<?php
include 'inc/linkadd.php';
include 'inc/config.php';
include '../core/function.php';
include '../core/libkingdom.php';
echo $doctypeup;
?>

<!DOCTYPE html>
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
	
	
	<title>List of kingdoms by population <?php echo $year?></title>
	<meta name="description" content="List of all kingdoms by population <?php echo $year?>.">
	<meta name="keywords" content="List of kingdoms by population">
	
	<link rel="shortcut icon" href="https://all-populations.com/favicon.ico" type="image/x-icon">

	<link rel="canonical" href="https://all-populations.com/en/list-of-kingdoms-by-population.html">

	<link rel="alternate" href="https://all-populations.com/en/list-of-kingdoms-by-population.html" hreflang="en">
	<link rel="alternate" href="https://all-populations.com/ru/list-of-kingdoms-by-population.html" hreflang="ru">

    <link href="https://all-populations.com/assets/css/bootstrap.css" rel="stylesheet">
    <link href="https://all-populations.com/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://all-populations.com/assets/css/main.css" rel="stylesheet">
	
	<!-- table js css -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
 
	<base href="https://all-populations.com/en/list-of-kingdoms-by-population.html">
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
		<a class="navbar-brand" href="https://all-populations.com"><span style="color: #f3e99a;">all-</span>populations<span style="color: #eee;">.com</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li itemprop="name"><a itemprop="url" href="https://all-populations.com/en/list-of-countries-by-population.html">Countries</a></li>
            <li class="active" itemprop="name"><a itemprop="url" href="https://all-populations.com/en/list-of-kingdoms-by-population.html">Kingdoms</a></li>
            <li itemprop="name"><a itemprop="url" href="https://all-populations.com/en/list-of-republics-by-population.html">Republics</a></li>
            <li itemprop="name"><a itemprop="url" href="https://all-populations.com/en/list-of-cities-by-population.html">Cities</a></li>
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
							<a href="https://all-populations.com/en/population-of-earth.html" itemprop="item">
								<span itemprop="name">Population of Earth</span>
							</a>
						</li>    
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<span itemprop="item">
								<span itemprop="name">List of kingdoms by population</span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">List of all kingdoms by population</h1>
				</div>
				
				<div itemprop="text">
					<p>List of 15 kingdoms by population in <?php echo $year;?></p>
				</div>	
				  <input class="form-control" id="myInput" type="text" placeholder="Search kingdom..">
				  <br>
				  <div class="table-responsive">
				  <table class="table table-bordered">
					<thead>
					  <tr>
						<th>#</th>
						<th>Kingdom</th>
						<th>Population</th>
					  </tr>
					</thead>
					<tbody id="myTable">
					  <?php getTableAllKingdomEn($libkingdom,1);?>
					</tbody>
				  </table>
				  </div>
				<?php echo $scripttable;?>
				
			<div class="showinfo">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<?php echo $ads2;?>
						</div>
					</div>
				</div>
				<?php
				echo $section;
				?>
			</section>

			<aside itemscope="" itemtype="http://schema.org/WPSideBar" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">		
				<?php 
			echo $asideup;
			?>
				<?php echo $ads3;?>
				
				<ul class="parent-menu-list">
					<li>
						<p class="lang">Other Languages</p>
						<ul class="language-menu-list">
							<li>
								<a href="https://all-populations.com/ru/list-of-kingdoms-by-population.html" title="Список королевст по населению">
									Список королевст по населению
								</a>
							</li>
						</ul>
					</li>
				</ul>
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
				<p>Find out the population in your region!</p>
			</div>
		</div>
	<?php
		echo $footerdown;
		?>
	</footer>
    <script async src="https://all-populations.com/assets/js/bootstrap.min.js"></script>
	<?php echo $bodytop?>
  </body>
</html>
