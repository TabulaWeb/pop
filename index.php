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
include 'Pages/MetaData.php';

$include_path = '';

if(urldecode($_SERVER['REQUEST_URI']) == "/"){
	// PAGE HOME__START
	$include_path = 'Pages/HomePageRu.php';
	// PAGE HOME__END
  } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $href_city){
	// PAGE CITY__START

	$include_path = 'Pages/CityPageRu.php';
	  
	// PAGE CITY__END
  } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $href_country){
	// PAGE COUNTRY__START
	$include_path = 'Pages/CountryPageRu.php';
	// PAGE COUNTRY__END
  } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $href_rate_city . $end_link){
	// PAGE RATE CITY START
	$include_path = 'Pages/RateCityRu.php';
  } elseif ($countryISO[1] == "en"){
	  // ENG_VERSION
	  if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $href_city_en){
		// ENG_VERSION CITY_START
		$include_path = 'Pages/CityPageEn.php';
		// ENG_VERSION CITY_END
	  } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $href_country_en) {
		// ENG_VERSION COUNTRY_START
		$include_path = 'Pages/CountryPageEn.php';
		// ENG_VERSION COUNTRY_END
	  } elseif (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $href_rate_city_en){
		// ENG_VERSION RATE_CITY_START
		$include_path = 'Pages/RateCityEn.php';
		// ENG_VERSION RATE_CITY_END
	  } 			
  } else {
	header("HTTP/1.0 404 Not Found");
	$include_path = '404.html';
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
	<?php echo $headdown;?>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<!-- TITLE -->
		<title><?php print $meta_title;?></title>
		<!-- DESCRIPTION -->
		<meta name='description' content='<?php print $meta_descr;?>'>
		<link rel='shortcut icon' href='/favicon.ico' type='image/x-icon'>

		<link href='/assets/css/bootstrap.css' rel='stylesheet'>
		<link href='/assets/css/font-awesome.min.css' rel='stylesheet'>
		<link href='/assets/css/main.css' rel='stylesheet'>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
	<?php echo $headtop;?>
</head>
<?php
echo $headfoot;
echo $bodyup;
?>
<body itemscope='itemscope' itemtype='http://schema.org/WebPageElement'> 
<?php echo $bodydown;?>

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
	include $include_path;
	?>
	<footer itemscope='itemscope' itemtype='http://schema.org/WPFooter'>
		<?php echo $footerup;?>
			<div class='container'>
				<div class='row centered' itemprop='text'>
					<p>© All-populations.com - <?php echo $year;?></p>
					<p>Узнайте численность населения в вашем регионе!</p>
				</div>
			</div>
		<?php echo $footerdown;?>
	</footer>
	
    <script src='https://code.jquery.com/jquery-1.10.2.min.js'></script>
    <script async src='/assets/js/bootstrap.min.js'></script>
  <?php echo $bodytop;?>
</body>
  <?php echo $bodyfoot;?>
</html>