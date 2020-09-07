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
	
	
	<title>Узнайте численность населения городов мира</title>
	<meta name="title" content="Узнайте численность населения городов мира">
	<meta name="description" content="писок самых больших городов мира по численности населения на <?php echo $year?> год. 50 самых больших городов мира.">
	<meta name="keywords" content="Список городов по населению">
	
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

	<link rel="canonical" href="https://all-populations.com/ru/list-of-cities-by-population.html">

	<link rel="alternate" href="https://all-populations.com/en/list-of-cities-by-population.html" hreflang="en">
	<link rel="alternate" href="https://all-populations.com/ru/list-of-cities-by-population.html" hreflang="ru">

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
	
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
		<a class="navbar-brand" href="../home.php"><span style="color: #f3e99a;">all-</span>populations<span style="color: #eee;">.com</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li itemprop="name"><a itemprop="url" class="active" href="list-of-countries-by-population.php">Страны</a></li>
            <li itemprop="name"><a itemprop="url" href="list-of-kingdoms-by-population.php">Королевства</a></li>
            <li itemprop="name"><a itemprop="url" href="list-of-republics-by-population.php">Республики</a></li>
            <li class="active" itemprop="name"><a itemprop="url" href="list-of-cities-by-population.php">Города</a></li>
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
							<a href="https://all-populations.com/ru/population-of-earth.html" itemprop="item">
								<span itemprop="name">Население Земли</span>
							</a>
						</li>    
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<span itemprop="item">
								<span itemprop="name">Список городов по населению</span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">Список городов по численности населения</h1>
				</div>
				
				<div itemprop="text">
					<p>Список из 50 самых больших городов по численности населения в мире на 2020 год.</p> Самый большой город по численности населения является Чунцин (Китай) с населением 30 млн человек.
					<p>Поиск производится среди 50 самых крупных городов мира</p>
				</div>
				<br>
				<h2>Рейтинг самых больших городов по численности населения</h2>
				<br>
				  <input class="form-control" id="myInput" type="text" placeholder="Поиск города..">
				  <br>
				  <div class="table-responsive">
				  <table class="table table-bordered">
					<thead>
					  <tr>
						<th>#</th>
						<th>Город</th>
						<th>Население</th>
					  </tr>
					</thead>
					<tbody id="myTable">
					<tr><th>1</th><td><a href="../cn/population-of-chongqing">Чунцин</td><td>29 914 000</td></tr>
					<tr><th>2</th><td><a href="../cn/population-of-shanghai">Шанхай</td><td>24 150 000</td></tr>
					<tr><th>3</th><td><a href="../cn/population-of-beijing">Пекин</td><td>21 705 000</td></tr>
					<tr><th>4</th><td><a href="../cn/population-of-tianjin">Тяньцзинь</td><td>14 425 000</td></tr>
					<tr><th>5</th><td><a href="../ng/population-of-lagos">Лагос</td><td>13 123 000</td></tr>
					<tr><th>6</th><td><a href="../cn/population-of-nanyang">Наньян</td><td>12 010 000</td></tr>
					<tr><th>7</th><td><a href="../in/population-of-mumbai">Мумбаи</td><td>11 978 450</td></tr>
					<tr><th>8</th><td><a href="../br/population-of-sao-paulo">Сан-Паулу</td><td>11 895 893</td></tr>
					<tr><th>9</th><td><a href="../ru/population-of-moscow">Москва</td><td>11 514 330</td></tr>
					<tr><th>10</th><td><a href="../pk/population-of-karachi">Карачи</td><td>11 234 942</td></tr>
					<tr><th>11</th><td><a href="../tr/population-of-istanbul">Стамбул</td><td>10 895 257</td></tr>
					<tr><th>12</th><td><a href="../cn/population-of-baoding">Баодин</td><td>10 700 000</td></tr>
					<tr><th>13</th><td><a href="../cn/population-of-harbin">Харбин</td><td>10 635 971</td></tr>
					<tr><th>14</th><td><a href="../cn/population-of-shenzhen">Шэньчжэнь</td><td>10 357 938</td></tr>
					<tr><th>15</th><td><a href="../cn/population-of-wuhan">Ухань</td><td>10 220 000</td></tr>
					<tr><th>16</th><td><a href="../id/population-of-jakarta">Джакарта</td><td>10 135 030</td></tr>
					<tr><th>17</th><td><a href="../cd/population-of-kinshasa">Киншаса</td><td>10 076 099</td></tr>
					<tr><th>18</th><td><a href="../kr/population-of-seoul">Сеул</td><td>10 063 197</td></tr>
					<tr><th>19</th><td><a href="../cn/population-of-guangzhou">Гуанчжоу</td><td>10 000 000</td></tr>
					<tr><th>20</th><td><a href="../in/population-of-delhi">Дели</td><td>9 879 172</td></tr>
					<tr><th>21</th><td><a href="../cn/population-of-shijiazhuang">Шицзячжуан</td><td>9 600 000</td></tr>
					<tr><th>22</th><td><a href="../cn/population-of-xuzhou">Сюйчжоу</td><td>9 468 000</td></tr>
					<tr><th>23</th><td><a href="../jp/population-of-tokyo">Токио</td><td>8 967 665</td></tr>
					<tr><th>24</th><td><a href="../bd/population-of-dhaka">Дакка</td><td>8 906 039</td></tr>
					<tr><th>25</th><td><a href="../mx/population-of-mexico">Мехико</td><td>8 800 000</td></tr>
					<tr><th>26</th><td><a href="../cn/population-of-hangzhou">Ханчжоу</td><td>8 700 000</td></tr>
					<tr><th>27</th><td><a href="../cn/population-of-zhengzhou">Чжэнчжоу</td><td>8 626 505</td></tr>
					<tr><th>28</th><td><a href="../cn/population-of-weifang">Вэйфан</td><td>8 500 000</td></tr>
					<tr><th>29</th><td><a href="../pe/population-of-lima">Лима</td><td>8 486 866</td></tr>
					<tr><th>30</th><td><a href="../cn/population-of-fuyang">Фуян</td><td>8 360 000</td></tr>
					<tr><th>31</th><td><a href="../cn/population-of-ganzhou">Ганьчжоу</td><td>8 300 000</td></tr>
					<tr><th>32</th><td><a href="../th/population-of-bangkok">Бангкок</td><td>8 280 925</td></tr>
					<tr><th>33</th><td><a href="../us/population-of-new-york">Нью-Йорк</td><td>8 244 910</td></tr>
					<tr><th>34</th><td><a href="../ng/population-of-london">Лондон</td><td>8 173 900</td></tr>
					<tr><th>35</th><td><a href="../eg/population-of-cairo">Каир</td><td>8 105 071</td></tr>
					<tr><th>36</th><td><a href="../cn/population-of-jining">Цзинин</td><td>8 023 000</td></tr>
					<tr><th>37</th><td><a href="../co/population-of-bogota">Богота</td><td>7 980 001</td></tr>
					<tr><th>38</th><td><a href="../vn/population-of-ho-chi-minh-city">Хошимин</td><td>7 955 000</td></tr>
					<tr><th>39</th><td><a href="../ir/population-of-tehran">Тегеран</td><td>7 797 520</td></tr>
					<tr><th>40</th><td><a href="../cn/population-of-shenyang">Шэньян </td><td>7 760 000</td></tr>
					<tr><th>41</th><td><a href="../cn/population-of-zhumadian">Чжумадянь</td><td>7 640 000</td></tr>
					<tr><th>42</th><td><a href="../mm/population-of-rangoon">Рангун</td><td>7 360 703</td></tr>
					<tr><th>43</th><td><a href="../cn/population-of-xian">Сиань</td><td>7 270 000</td></tr>
					<tr><th>44</th><td><a href="../cn/population-of-hong-kong">Гонконг</td><td>7 182 724</td></tr>
					<tr><th>45</th><td><a href="../cn/population-of-chengdu">Чэнду</td><td>7 123 000</td></tr>
					<tr><th>46</th><td><a href="../cn/population-of-tangshan">Таншань</td><td>7 100 000</td></tr>
					<tr><th>47</th><td><a href="../iq/population-of-baghdad">Багдад</td><td>7 055 200</td></tr>
					<tr><th>48</th><td><a href="../cn/population-of-shangqiu">Шанцю</td><td>7 000 000</td></tr>
					<tr><th>49</th><td><a href="../cn/population-of-zhanjiang">Чжаньцзян</td><td>6 900 000</td></tr>
					<tr><th>50</th><td><a href="../cn/population-of-zunyi">Цзуньи</td><td>6 838 000</td></tr>
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
						<p class="lang">На других языках</p>
						<ul class="language-menu-list">
							<li>
								<a href="https://all-populations.com/en/list-of-cities-by-population.html" title="List of cities by population">
									List of cities by population
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
				<p>Узнайте численность населения в вашем регионе!</p>
			</div>
		</div>
	<?php
		echo $footerdown;
		?>
	</footer>
    <script async src="../assets/js/bootstrap.min.js"></script>
	<?php echo $bodytop?>
  </body>
</html>