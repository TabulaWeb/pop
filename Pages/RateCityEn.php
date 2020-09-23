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
            <li itemprop='name'><a itemprop='url' href='/en/list-of-countries-by-population.html'>Countries</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-kingdoms-by-population.html'>Kingdomcs</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-republics-by-population.html'>Republics</a></li>
            <li itemprop='name'><a itemprop='url' href='/en/list-of-cities-by-population.html'>Cities</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div class='container'>
		
		<div class='row'>

				<?php echo $ads1; ?>

		</div>
		
		<div class='row b'>
			<div id='breadcrumbs'>
				<div id='breadcrumbs-inner'>
					<ul itemscope='' itemtype='http://schema.org/BreadcrumbList'>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/en/population-of-earth.html' itemprop='item'>
								<span itemprop='name'>Population of Earth</span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<a href='/en/<?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_href"]);
									}
								}
								unset($value);
								?>.html' itemprop='item'>
								<span itemprop='name'>Population of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
							</a>
						</li>
						<li itemscope='' itemprop='itemListElement' itemtype='http://schema.org/ListItem'>
							<span itemprop='item'>
								<span itemprop='name'>List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
							</span>
						</li>      
					</ul>
				</div>
			</div>
		</div>

		<div class='row'>
		
			<section class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-heading' >
					<h1 itemprop='headline'>List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> by population</h1>
				</div>
				
				<div  itemprop='text'>
					<p>List of cities in <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?> by population <?php echo $year; ?>.<p>	
					<p>Total number of cities: <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count_city_country"]);
									}
								}
								unset($value);
								?>.</p>
					<p>Total population: <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?>.</p>
				</div>		
				
				<input class='form-control' id='myInput' type='text' placeholder='Search city..'>
				<br>
				<div class='table-responsive'>
				<table class='table table-bordered'>
					<thead>
					  <tr>
						<th>#</th>
						<th>Name, city</th>
						<th>Population, people</th>
					  </tr>
					</thead>
					<tbody id='myTable'>
						<?php 
						foreach($libcountry as $value){
							if ($countryISO[2] == $value["country_iso"]){
								$count_city = ($value["count_city_country"]);
							}
						}
						unset($value);
						if ($count_city >= "200"){
							getTable200En(${"lib" . $countryISO[2]});
						} else {
							getTableEn(${"lib" . $countryISO[2]});
						}
						?>
					</tbody>
				</table>
				</div>
				<?php echo $scripttable;?>
				  
				<div class='showinfo'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						
							<?php echo $ads2;?>
							
						</div>
						<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
						<div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
								<h3 class='naselenie'><?php 
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								?> - Population</h3>
								<span class='skolko'><?php 
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["count"]);
									}
								}
								unset($value);
								?> people</span>
								<img src='/en/images/<?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["country_flag"]);
									}
								}
								unset($value);
								?>' itemprop='contentUrl' width='160' height='107' alt='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' title='Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?>' />
								<span itemprop='name' style='display:block; font-size: 12px;'>Flag of <?php
								foreach($libcountry as $value){
									if ($countryISO[2] == $value["country_iso"]){
										print($value["name_country_en"]);
									}
								}
								unset($value);
								?></span>
								<span class='date'>In <?php echo $month;?> <?php echo $year;?></span>
							</div>
						</div>
					</div>
				</div>
				
				<?php
				echo $section;
				?>
			</section>

			<aside itemscope='' itemtype='http://schema.org/WPSideBar' class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
			<?php 
			echo $asideup;
			?>
				<ul class='parent-menu-list'>
					<li>
						<h3>Lists of cities in other countries</h3>
						<ul class='child-menu-list'>
						<?php getRightTableEn($libcountry,1);?>
						</ul>
					</li>
				</ul>

					<?php echo $ads3;?>
				<ul class='parent-menu-list'>
					<li>
						<p class='lang'>Other languages</p>
						<ul class='language-menu-list'>
							<li><a href='/<?php 
							foreach($libcountry as $value){
								if ($countryISO[2] == $value["country_iso"]){
									print($value["rate_city_country"]);
								}
							}
							unset($value);
							?>.html' title='Список городов <?php 
							foreach($libcountry as $value){
								if ($countryISO[2] == $value["country_iso"]){
									print($value["name_country_ru_zz"]);
								}
							}
							unset($value);
							?> по населению'>Список городов <?php 
							foreach($libcountry as $value){
								if ($countryISO[2] == $value["country_iso"]){
									print($value["name_country_ru_zz"]);
								}
							}
							unset($value);
							?> по населению</a></li>
						</ul>
					</li>
				</ul>
				<?php
				echo $asidedown;
				?>
			</aside>
			<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
				<div class='panel-body'>
					<div class='row'>
						<div class='panel-heading h2'>
							<h2>Recent requests of the population:</h2>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link1;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link2;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link3;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link4;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link5;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link6;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link7;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link8;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link9;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link10;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link11;?>
							</p>
						</div>
						<div class='last-view col-xs-12 col-sm-6 col-md-6 col-lg-4'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<p>
								<?php echo $link12;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
