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
	
	
	<title>List of cities by population <?php echo $year?></title>
	<meta name="description" content="List of most populated cities in <?php echo $year?>.">
	<meta name="keywords" content="List of cities by population">
	
	<link rel="shortcut icon" href="https://all-populations.com/favicon.ico" type="image/x-icon">

	<link rel="canonical" href="https://all-populations.com/en/list-of-cities-by-population.html">

	<link rel="alternate" href="https://all-populations.com/en/list-of-cities-by-population.html" hreflang="en">
	<link rel="alternate" href="https://all-populations.com/ru/list-of-cities-by-population.html" hreflang="ru">

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
            <li itemprop="name"><a itemprop="url" href="list-of-countries-by-population.php">Countries</a></li>
            <li itemprop="name"><a itemprop="url" href="list-of-kingdoms-by-population.php">Kingdoms</a></li>
            <li itemprop="name"><a itemprop="url" href="list-of-republics-by-population.php">Republics</a></li>
            <li class="active" itemprop="name"><a itemprop="url" href="list-of-cities-by-population.php">Cities</a></li>
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
							<a href="population-of-earth.php" itemprop="item">
								<span itemprop="name">Population of Earth</span>
							</a>
						</li>    
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<span itemprop="item">
								<span itemprop="name">List of cities by population</span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">List of cities by population - rating</h1>
				</div>
				
				<div itemprop="text">
					<p>List of the 50 largest cities by population in the world in <?php echo $year;?>.</p> The largest city in terms of population is Chongqing (China), with a population of 30 million people.
				</div>
				<br>
				<h2>The largest cities by population</h2>
				<br>
				  <input class="form-control" id="myInput" type="text" placeholder="Search city..">
				  <br>
				  <div class="table-responsive">
				  <table class="table table-bordered">
					<thead>
					  <tr>
						<th>#</th>
						<th>City</th>
						<th>Population</th>
					  </tr>
					</thead>
					<tbody id="myTable">
					<tr><th>1</th><td><a href="/en/cn/population-of-chongqing.html">Chongqing</td><td>29 914 000</td></tr>
<tr><th>2</th><td><a href="/en/cn/population-of-shanghai.html">Shanghai</td><td>24 150 000</td></tr>
<tr><th>3</th><td><a href="/en/cn/population-of-beijing.html">Beijing</td><td>21 705 000</td></tr>
<tr><th>4</th><td><a href="/en/cn/population-of-tianjin.html">Tianjin</td><td>14 425 000</td></tr>
<tr><th>5</th><td><a href="/en/ng/population-of-lagos.html">Lagos</td><td>13 123 000</td></tr>
<tr><th>6</th><td><a href="/en/cn/population-of-nanyang.html">Nanyang</td><td>12 010 000</td></tr>
<tr><th>7</th><td><a href="/en/in/population-of-mumbai.html">Mumbai</td><td>11 978 450</td></tr>
<tr><th>8</th><td><a href="/en/br/population-of-sao-paulo.html">São Paulo</td><td>11 895 893</td></tr>
<tr><th>9</th><td><a href="/en/ru/population-of-moscow.html">Moscow</td><td>11 514 330</td></tr>
<tr><th>10</th><td><a href="/en/pk/population-of-karachi.html">Karachi</td><td>11 234 942</td></tr>
<tr><th>11</th><td><a href="/en/tr/population-of-istanbul.html">Istanbul</td><td>10 895 257</td></tr>
<tr><th>12</th><td><a href="/en/cn/population-of-baoding.html">Baoding</td><td>10 700 000</td></tr>
<tr><th>13</th><td><a href="/en/cn/population-of-harbin.html">Harbin</td><td>10 635 971</td></tr>
<tr><th>14</th><td><a href="/en/cn/population-of-shenzhen.html">Shenzhen</td><td>10 357 938</td></tr>
<tr><th>15</th><td><a href="/en/cn/population-of-wuhan.html">Wuhan</td><td>10 220 000</td></tr>
<tr><th>16</th><td><a href="/en/id/population-of-jakarta.html">Jakarta</td><td>10 135 030</td></tr>
<tr><th>17</th><td><a href="/en/cd/population-of-kinshasa.html">Kinshasa</td><td>10 076 099</td></tr>
<tr><th>18</th><td><a href="/en/kr/population-of-seoul.html">Seoul</td><td>10 063 197</td></tr>
<tr><th>19</th><td><a href="/en/cn/population-of-guangzhou.html">Guangzhou</td><td>10 000 000</td></tr>
<tr><th>20</th><td><a href="/en/in/population-of-delhi.html">Delhi</td><td>9 879 172</td></tr>
<tr><th>21</th><td><a href="/en/cn/population-of-shijiazhuang.html">Shijiazhuang</td><td>9 600 000</td></tr>
<tr><th>22</th><td><a href="/en/cn/population-of-xuzhou.html">Xuzhou</td><td>9 468 000</td></tr>
<tr><th>23</th><td><a href="/en/jp/population-of-tokyo.html">Tokyo</td><td>8 967 665</td></tr>
<tr><th>24</th><td><a href="/en/bd/population-of-dhaka.html">Dhaka</td><td>8 906 039</td></tr>
<tr><th>25</th><td><a href="/en/mx/population-of-mexico.html">Mexico City</td><td>8 800 000</td></tr>
<tr><th>26</th><td><a href="/en/cn/population-of-hangzhou.html">Hangzhou</td><td>8 700 000</td></tr>
<tr><th>27</th><td><a href="/en/cn/population-of-zhengzhou.html">Zhengzhou</td><td>8 626 505</td></tr>
<tr><th>28</th><td><a href="/en/cn/population-of-weifang.html">Weifang</td><td>8 500 000</td></tr>
<tr><th>29</th><td><a href="/en/pe/population-of-lima.html">Lima</td><td>8 486 866</td></tr>
<tr><th>30</th><td><a href="/en/cn/population-of-fuyang.html">Fuyang</td><td>8 360 000</td></tr>
<tr><th>31</th><td><a href="/en/cn/population-of-ganzhou.html">Ganzhou</td><td>8 300 000</td></tr>
<tr><th>32</th><td><a href="/en/th/population-of-bangkok.html">Bangkok</td><td>8 280 925</td></tr>
<tr><th>33</th><td><a href="/en/us/population-of-new-york.html">New York</td><td>8 244 910</td></tr>
<tr><th>34</th><td><a href="/en/ng/population-of-london.html">London</td><td>8 173 900</td></tr>
<tr><th>35</th><td><a href="/en/eg/population-of-cairo.html">Cairo</td><td>8 105 071</td></tr>
<tr><th>36</th><td><a href="/en/cn/population-of-jining.html">Jining</td><td>8 023 000</td></tr>
<tr><th>37</th><td><a href="/en/co/population-of-bogota.html">Bogota</td><td>7 980 001</td></tr>
<tr><th>38</th><td><a href="/en/vn/population-of-ho-chi-minh-city.html">Ho Chi Minh City</td><td>7 955 000</td></tr>
<tr><th>39</th><td><a href="/en/ir/population-of-tehran.html">Tehran</td><td>7 797 520</td></tr>
<tr><th>40</th><td><a href="/en/cn/population-of-shenyang.html">Shenyang</td><td>7 760 000</td></tr>
<tr><th>41</th><td><a href="/en/cn/population-of-zhumadian.html">Zhumadian</td><td>7 640 000</td></tr>
<tr><th>42</th><td><a href="/en/mm/population-of-rangoon.html">Rangoon</td><td>7 360 703</td></tr>
<tr><th>43</th><td><a href="/en/cn/population-of-xian.html">Xi'an</td><td>7 270 000</td></tr>
<tr><th>44</th><td><a href="/en/cn/population-of-hong-kong.html">Hong Kong</td><td>7 182 724</td></tr>
<tr><th>45</th><td><a href="/en/cn/population-of-chengdu.html">Chengdu</td><td>7 123 000</td></tr>
<tr><th>46</th><td><a href="/en/cn/population-of-tangshan.html">Tangshan</td><td>7 100 000</td></tr>
<tr><th>47</th><td><a href="/en/iq/population-of-baghdad.html">Baghdad</td><td>7 055 200</td></tr>
<tr><th>48</th><td><a href="/en/cn/population-of-shangqiu.html">Shanqiu</td><td>7 000 000</td></tr>
<tr><th>49</th><td><a href="/en/cn/population-of-zhanjiang.html">Zhanjiang</td><td>6 900 000</td></tr>
<tr><th>50</th><td><a href="/en/cn/population-of-zunyi.html">Tsunyi</td><td>6 838 000</td></tr>

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
								<a href="../ru/list-of-cities-by-population.php" title="Список городов по численности населения">
									Список городов по населению
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