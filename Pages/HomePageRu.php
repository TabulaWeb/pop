<?php
function HomePageRu(){
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


	?>
		<div class="container">
		
		<div class="row">
		
			<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="panel-heading">
					<h1 itemprop="headline">Статистика населения</h1>
				</div>
				
				<div itemprop="text">
					<p>Текущая статистика населения в мире.</p>
				</div>
				
				<div class="showinfo">
					<div class="row">
					
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="/ru/population-of-earth.html">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">Население земли / RU</span>
							</a>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="count" style="float:none!important;">
							<a href="/en/population-of-earth.html">
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 200px"></i>
								<span class="date">World population / EN</span>
							</a>
							</div>
						</div>
						
					</div>
				</div>
				<p>Доступная информация по населению любого региона, быстрая работа сайта и постоянное обновление информации являются основой нашего ресурса.</p>

				<div itemprop="text">
					<h2>Численность населения</h2>

					<p>На сайте вы найдете текущую статистику населения в мире. Вам доступна информация по населению любого региона, страны, города. Информация актуальна: базовые цифры обновляются в реальном времени. Мы используем данные, публикуемые Фондом ООН в области народонаселения. </p>
				</div>
				<div itemprop="text">
					<h2>Перенаселение земли?</h2>

					<p>В доиндустриальную эпоху проблемы увеличения численности землян решалась просто: войны. Наравне с болезнями и эпидемиями войны прекрасно приводили рост населения примерно к нулю. В 17 веке европейская и английская демография преподнесла сюрприз: среднее число детей на одну женщину незначительно выросло, что быстро увеличило население Европы.  Для Англии и Уэльса цифры такие:</p>
					<ul>
						<li>
							<p>1650 – 4,8 млн.</p>
						</li>
						<li>
							<p>1700 – 5,8 млн.</p>
						</li>
						<li>
							<p>1750 – 6,3 млн.</p>
						</li>
					</ul>
					<p>Выходит 1,5 млн человек за сто лет! Что стало с этим “излишком”? Эти люди отправились в заморские колонии (Америку) и через 100 лет построили там великую страну.
В 19 веке английский ученый Мальтус напугал всех истощением ресурсов земли и ужасными катастрофами в связи с наблюдаемым им продолжающимся быстрым ростом населения в Англии в 19 в.  (1800 г. - уже 9 млн чел.). Но даже английские ученые бывают не всегда правы. Ближайшее будущее показало, что Мальтус не учел стремительный прогресс производительных сил, который позволил накормить миллиарды людей на планете. Поэтому сегодня говорить о перенаселении стоит осторожно, с поправкой на отдельные  регионы (города) и сообразуясь с экономической ситуацией в этом месте. Реальное беспокойство вызывает демографическая ситуация в Африке, в которой по прогнозам в 2030 г. будет проживать 1,7 млрд чел., в 2050 г - 2,5 млрд. и 4,7 млрд. в в 2100 г.
</p>
				</div>
				<div itemprop="text">
					<h2>Депопуляция?</h2>

					<p>На нашей планете проживает семь с лишним миллиардов человек. И вдруг раздаются голоса о том, что нам грозит депопуляция. Что это значит? Рост населения земли шел неравномерно: до 17 в – очень медленно, в 17 - 19 вв – немного быстрее, в 20 веке - очень быстро, в 21 веке - намного медленнее, а к концу текущего  века станет, возможно, отрицательным. Но одновременно вторая половина 20 века продемонстрировала невиданный ранее рост продолжительности жизни. Это привело к тому, что одновременно на планете стало жить много разных поколений людей (когорты населения), которые вносят разный вклад в общую динамику роста (сокращения) населения. Сейчас рост населения происходит за счет вклада пожилых людей в среднюю продолжительность жизни, а не высокой рождаемости. Поэтому если на планете случится что-то похуже чем Ковид-19 (который сильно ударил по пожилым людям), то и развитые страны сразу почувствуют реальную депопуляцию. Кроме того, обсуждаемый термин употребляется и в экономическом смысле: хватит ли (молодых, работоспособных) людей, которые будут кормить людей старшего возраста, которые уже не могут работать? Поэтому термин депопуляции скорее нужно относить к определенным возрастным группам  (чаще молодых). Такая вот многоликая депопуляция: вроде ее нет, а она есть.
</p>
					<p>Уже сегодня пора начинать думать о том, как человечество будет жить при депопуляционных процессах. Для многих стран, в которых второй демографический переход уже завершен,  это реальность сегодняшнего дня. Глобальный коэффициент рождаемости уже сегодня сократился сократился вдвое от максимального уровня. Для развитых стран показатель прироста минимальный, на уровне естественного воспроизводства.  Средний возраст жителя земли растет, особенно быстро в развитых странах. Чемпион здесь – Япония. Усредненный возраст Японца 48 лет. Ожидается, что победителем в этом необычном возрастном марафоне в 2100 году станет Албания. Албания со средним возрастом 61 год. Таким образом встают закономерные вопросы: кто будет обеспечивать стареющее население, как обеспечить пенсионное обеспечение людям? Хватит ли работоспособных людей, чтобы оказывать людям старшего возраста медицинские, социальные, бытовые услуги (даже если представить, что пенсионные фонды стран не перегреются от повышенной нагрузки).</p>
				</div>
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
						<a itemprop="url" href="ru/list-of-countries-by-population.html" title="List of countries by population">
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
}
?>