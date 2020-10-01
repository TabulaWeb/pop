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
} elseif ( $countryISO[2] == "gb") {
	include "core/libeng.php";
} else {
	include "core/lib$countryISO[2].php";
}
include 'core/libcountry.php';
include 'Pages/MetaData.php';
include 'Pages/BasePage.php';

$include_path = '';

if(urldecode($_SERVER['REQUEST_URI']) == "/"){
	// PAGE HOME__START
	$include_path = 'Pages/HomePageRu.php';
	// PAGE HOME__END
  } elseif ($base_link == $href_city){
	// PAGE CITY__START

	$include_path = 'Pages/CityPageRu.php';
	  
	// PAGE CITY__END
  } elseif ($base_link == $href_country){
	// PAGE COUNTRY__START
	$include_path = 'Pages/CountryPageRu.php';
	// PAGE COUNTRY__END
  } elseif ($base_link == $href_rate_city . $end_link){
	// PAGE RATE CITY START
	$include_path = 'Pages/RateCityRu.php';
  } elseif ($countryISO[1] == "en"){
	  // ENG_VERSION
	  if ($base_link == $href_city_en){
		// ENG_VERSION CITY_START
		$include_path = 'Pages/CityPageEn.php';
		// ENG_VERSION CITY_END
	  } elseif ($base_link == $href_country_en) {
		// ENG_VERSION COUNTRY_START
		$include_path = 'Pages/CountryPageEn.php';
		// ENG_VERSION COUNTRY_END
	  } elseif ($base_link == $href_rate_city_en){
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
// print $base_link;
print $countryISO[2];
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

	<?php BaseHeader();?>

	<?php
	include $include_path;
	?>

	<?php BaseFooter();?>
	
    <script src='https://code.jquery.com/jquery-1.10.2.min.js'></script>
    <script async src='/assets/js/bootstrap.min.js'></script>
  <?php echo $bodytop;?>
</body>
  <?php echo $bodyfoot;?>
</html>