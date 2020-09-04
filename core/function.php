<?php 
/*ФУНКЦИЯ ИЗМЕНЕНИЯ РЕГИОНА КОНТЕНТА ru, eng etc

"name_ru"=>"Зекирхен-ам-Валлерзе",
"name_en"=>"Seekirchen am Wallersee",
"name_href" => "seekirchen-am-wallersee",
"count" => "2888470",
"real_id" =>1,
*/
##############################################################################
// CITIES - ГОРОДА \\
// Название города на русском
function getNameRu($menu, $id=""){
	$real = $menu["$id"]["name_ru"];
	echo $real;
}
//Название города на английском
function getNameEn($menu, $id=""){
	$real = $menu["$id"]["name_en"];
	echo $real;
}
//Название города для ссылки 
function getNameHref($menu, $id=""){
	$real = $menu["$id"]["name_href"];
	echo $real;
}
//Количество населения - цифра
function getPopulation($menu, $id=""){
	$real = $menu["$id"]["count"];
	echo $real;
}
//Реальный id номер города
function getRealId($menu, $id=""){
	$real = $menu["$id"]["real_id"];
    echo $real; 
}
//Генерирование правого блока меню (5 ссылок) При каждой генерации страны надо менять url путь
function rightMenuRuF($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	$real = 1;
	$id = $real + 4;
	for ($i = $real; $i <= $id; $i++) 
  { 
    echo "<li>
			<a itemprop=".$op."url".$op." href=".$op."../{$menu[$i]['name_href']}.php".$op.">
				<span itemprop=".$op."name".$op.">Население {$menu[$i]['name_ru']}</span>
			</a>
		 </li>"; 
  } 
 }
 function rightMenuEnF($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	$real = 1;
	$id = $real + 4;
	for ($i = $real; $i <= $id; $i++) 
  { 
	echo "<li>
			<a itemprop=".$op."url".$op." href=".$op."https://all-populations.com/en/{$menu[$i]['name_href']}.html".$op.">
				<span itemprop=".$op."name".$op.">Population of {$menu[$i]['name_en']}</span>
			</a>
		 </li>"; 
  } 
 }
//Генерирование правого блока меню (5 ссылок) При каждой генерации СТРАНЫ
function rightMenuRu($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	$real = $real + 1;
	$id = $real + 4;
	for ($i = $real; $i <= $id; $i++) 
  { 
    echo "<li>
			<a itemprop=".$op."url".$op." href=".$op."https://all-populations.com/ru/{$menu[$i]['name_href']}.html".$op.">
				<span itemprop=".$op."name".$op.">Население {$menu[$i]['name_ru']}</span>
			</a>
		 </li>"; 
  } 
 }
 function rightMenuEn($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	$real = $real + 1;
	$id = $real + 4;
	for ($i = $real; $i <= $id; $i++) 
  { 
	echo "<li>
			<a itemprop=".$op."url".$op." href=".$op."https://all-populations.com/en/{$menu[$i]['name_href']}.html".$op.">
				<span itemprop=".$op."name".$op.">Population of {$menu[$i]['name_en']}</span>
			</a>
		 </li>"; 
  } 
 }
###########################################################################################################
// COUNTRY - СТРАНЫ \\
// Название страны на русском в падеже России
function getNameCountryRu($menu, $id=""){
	$real = $menu["$id"]["name_country_ru_zz"];
	echo $real;
}
//Название города на русском нормально Россия
function getNameCountryRuZ($menu, $id=""){
	$real = $menu["$id"]["name_country_ru"];
	echo $real;
}
//Функция url и название "Список городов в стране"
function getNameRateCountry($menu, $id=""){
	$real = $menu["$id"]["rate_city_country"];
	echo $real;
}
//Название страны на английском
function getNameCountryEn($menu, $id=""){
	$real = $menu["$id"]["name_country_en"];
	echo $real;
}
//Название страны для ссылки 
function getNameCountryHref($menu, $id=""){
	$real = $menu["$id"]["name_country_href"];
	echo $real;
}
//Количество населения - цифра
function getCountryPopulation($menu, $id=""){
	$real = $menu["$id"]["count"];
	echo $real;
}
//Путь к изображению флага
function getCountryFlag($menu, $id=""){
	$real = $menu["$id"]["country_flag"];
    echo $real; 
}
//Реальный id номер страны
function getCountryRealId($menu, $id=""){
	$real = $menu["$id"]["real_id"];
    echo $real; 
}

############################################################################################################
//PAGE RAITING
//Функция генерирования таблицы RU
 function getTable($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu)-5; $i++) 
   { 
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><a href=".$op."{$menu[$i]['name_href']}.html".$op.">{$menu[$i]['name_ru']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
 //Функция генерирования таблицы больше 200 городов страны RUский - US UA TR RU RO JP FR
 function getTable200($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= 200; $i++) 
   { 
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><a href=".$op."{$menu[$i]['name_href']}.html".$op.">{$menu[$i]['name_ru']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
  
 //Функция генерирования таблицы EN
 function getTableEn($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu)-5; $i++) 
   { 
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><a href=".$op."{$menu[$i]['name_href']}.html".$op.">{$menu[$i]['name_en']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
 //Функция генерирования таблицы больше 200 городов страны Английский - US UA TR RU RO JP FR
 function getTable200En($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= 200; $i++) 
   { 
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><a href=".$op."{$menu[$i]['name_href']}.html".$op.">{$menu[$i]['name_en']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
 //Функция правого меню (Списки городов в других странах) 5 штук => Ru
  function getRightTableRu($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	$real = $real + 1;
	$id = $real + 4;
	for ($i = $real; $i <= $id; $i++) 
  { 
	echo "<li>
			<a itemprop=".$op."url".$op." href=".$op."../{$menu[$i]['rate_city_country']}.html".$op.">
				<span itemprop=".$op."name".$op.">Список городов {$menu[$i]['name_country_ru_zz']}</span>
			</a>
		 </li>"; 
  } 
 }
 
  //Функция правого меню (Списки городов в других странах) 5 штук => EN
  function getRightTableEN($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	$real = $real + 1;
	$id = $real + 4;
	for ($i = $real; $i <= $id; $i++) 
  { 
	echo "<li>
			<a itemprop=".$op."url".$op." href=".$op."{$menu[$i]['rate_city_country']}.html".$op.">
				<span itemprop=".$op."name".$op.">List of cities in {$menu[$i]['name_country_en']}</span>
			</a>
		 </li>"; 
  } 
 }
 //Функция url страницы списка городов в стране 
 function getListHref($menu, $id=""){
	$real = $menu["$id"]["rate_city_country"];
	echo $real;
}
 //Функция отображения количества стран в стране
 function getCityCount($menu, $id=""){
	$real = $menu["$id"]["count_city_country"];
	echo $real;
}

#################################################################################
// PAGE COUNTRY
//Функция генерирования таблицы со всеми странами RU
 function getTableAllCountryRu($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu)-5; $i++) 
   { 
//<img src="Flag_of_Ukraine.png" width="30px" height="20px" style="vertical-align: top; margin-right: 5px">
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><img src=".$op."https://all-populations.com/ru/images/{$menu[$i]['country_flag']}".$op." width=".$op."30px".$op." height=".$op."20px".$op." style=".$op."vertical-align: top; margin-right: 5px".$op." alt=".$op."Флаг {$menu[$i]['name_country_ru_zz']}".$op." title=".$op."Флаг {$menu[$i]['name_country_ru_zz']}".$op."><a href=".$op."{$menu[$i]['name_country_href']}.php".$op.">{$menu[$i]['name_country_ru']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
//Функция генерирования таблицы со всеми странами EN
 function getTableAllCountryEn($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu)-5; $i++) 
   { 
//<img src="Flag_of_Ukraine.png" width="30px" height="20px" style="vertical-align: top; margin-right: 5px">
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><img src=".$op."https://all-populations.com/en/images/{$menu[$i]['country_flag']}".$op." width=".$op."30px".$op." height=".$op."20px".$op." style=".$op."vertical-align: top; margin-right: 5px".$op." alt=".$op."Flag of  {$menu[$i]['name_country_en']}".$op." title=".$op."Flag of {$menu[$i]['name_country_en']}".$op."><a href=".$op."https://all-populations.com/en/{$menu[$i]['name_country_href']}.html".$op.">{$menu[$i]['name_country_en']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
###################################################################################
// PAGE KINGDOMS
//Функция генерирования таблицы со всеми королевствами RU
 function getTableAllKingdomRu($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu); $i++) 
   { 
//<img src="Flag_of_Ukraine.png" width="30px" height="20px" style="vertical-align: top; margin-right: 5px">
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><img src=".$op."https://all-populations.com/ru/images/{$menu[$i]['country_flag']}".$op." width=".$op."30px".$op." height=".$op."20px".$op." style=".$op."vertical-align: top; margin-right: 5px".$op." alt=".$op."Флаг {$menu[$i]['name_country_ru_zz']}".$op." title=".$op."Флаг {$menu[$i]['name_country_ru_zz']}".$op."><a href=".$op."https://all-populations.com/ru/{$menu[$i]['name_country_href']}.html".$op.">{$menu[$i]['name_country_ru']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
 
//Функция генерирования таблицы со всеми королевствами EN
 function getTableAllKingdomEn($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu); $i++) 
   { 
//<img src="Flag_of_Ukraine.png" width="30px" height="20px" style="vertical-align: top; margin-right: 5px">
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><img src=".$op."https://all-populations.com/en/images/{$menu[$i]['country_flag']}".$op." width=".$op."30px".$op." height=".$op."20px".$op." style=".$op."vertical-align: top; margin-right: 5px".$op." alt=".$op."Flag of  {$menu[$i]['name_country_en']}".$op." title=".$op."Flag of {$menu[$i]['name_country_en']}".$op."><a href=".$op."https://all-populations.com/en/{$menu[$i]['name_country_href']}.html".$op.">{$menu[$i]['name_country_en']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 }  
######################################################################################
// PAGE REPUBLIC
//Функция генерирования таблицы со всеми республиками RU
 function getTableAllRepublicRu($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu); $i++) 
   { 
//<img src="Flag_of_Ukraine.png" width="30px" height="20px" style="vertical-align: top; margin-right: 5px">
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><img src=".$op."https://all-populations.com/ru/images/{$menu[$i]['country_flag']}".$op." width=".$op."30px".$op." height=".$op."20px".$op." style=".$op."vertical-align: top; margin-right: 5px".$op." alt=".$op."Флаг {$menu[$i]['name_country_ru_zz']}".$op." title=".$op."Флаг {$menu[$i]['name_country_ru_zz']}".$op."><a href=".$op."https://all-populations.com/ru/{$menu[$i]['name_country_href']}.html".$op.">{$menu[$i]['name_country_ru']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 } 
 
//Функция генерирования таблицы со всеми республиками EN
 function getTableAllRepublicEn($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu); $i++) 
   { 
//<img src="Flag_of_Ukraine.png" width="30px" height="20px" style="vertical-align: top; margin-right: 5px">
	echo " <tr>
			<th>{$menu[$i]['real_id']}</th>
			<td><img src=".$op."https://all-populations.com/en/images/{$menu[$i]['country_flag']}".$op." width=".$op."30px".$op." height=".$op."20px".$op." style=".$op."vertical-align: top; margin-right: 5px".$op." alt=".$op."Flag of  {$menu[$i]['name_country_en']}".$op." title=".$op."Flag of {$menu[$i]['name_country_en']}".$op."><a href=".$op."https://all-populations.com/en/{$menu[$i]['name_country_href']}.html".$op.">{$menu[$i]['name_country_en']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 }  



################################################
// ГЕНЕРИРУЕМ ВСЕ СТРАНИЦЫ
 function getTableAllCitiesRu($menu, $id="", $op='"') {
	$real = $menu["$id"]["real_id"];
	for ($i=1; $i <= count($menu)-5; $i++) 
   { 
//<img src="Flag_of_Ukraine.png" width="30px" height="20px" style="vertical-align: top; margin-right: 5px">
	echo " <tr>
			<td><a href=".$op."https://all-populations.com/ru/{$menu[$i]['name_href']}.html".$op.">{$menu[$i]['name_ru']}</a></td>
			<td>{$menu[$i]['count']}</td>
		   </tr>";
  } 
 }  


?>