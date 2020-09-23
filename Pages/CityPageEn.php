<?php
function CityPageEn(){
    $server_link = urldecode($_SERVER['REQUEST_URI']);
       $countryISO = explode("/", $server_link);
       $end_link = ".html";
       $start_link = "en/";
   
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
                                unset($value);?>.html' itemprop='item'>
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
                                <span itemprop='name'>Population of <?php 
                                 foreach(${"lib" . $countryISO[2]} as $value){
                                    if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                                        print($value["name_en"]);
                                        break;
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
            <h1 itemprop='headline'>Population of <?php 
            foreach(${"lib" . $countryISO[2]} as $value){
                if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                    print($value["name_en"]);
                    break;
                }
            }
            unset($value);
            ?>
            </h1>
        </div>
        
        <div  itemprop='text'>
            <p>In <?php echo $year;?>, the population of the city of <strong><?php 
             foreach(${"lib" . $countryISO[2]} as $value){
                if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                    print($value["name_en"]);
                    break;
                }
            }
            unset($value);
            ?></strong>, <?php
                        foreach($libcountry as $value){
                            if ($countryISO[2] == $value["country_iso"]){
                                print($value["name_country_en"]);
                            }
                        }
                        unset($value);
                        ?> is - <span class='pop-info'><?php 
                        foreach(${"lib" . $countryISO[2]} as $value){
                            if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                                print($value["count"]);
                                break;
                            }
                        }
                        unset($value);
                        ?></span> people. All-populations.com used data from the number of the population from official sources. Find out what statistics the population of the country, city, district on All-populations.com.</p>
        </div>		

        <div class='showinfo'>
            <div class='row'>
                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                
                    <?php echo $ads2;?>
                    
                </div>
                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                    <div class='count' itemscope='' itemtype='http://schema.org/ImageObject'>
                        <h3 class='naselenie'><?php 
                         foreach(${"lib" . $countryISO[2]} as $value){
                            if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                                print($value["name_en"]);
                                break;
                            }
                        }
                        unset($value);
                        ?> - Population</h3>
                        <span class='skolko'><?php 
                        foreach(${"lib" . $countryISO[2]} as $value){
                            if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                                print($value["count"]);
                                break;
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
        <p>Accessible information on the population of any region, fast work of the site and constant updating of information are the basis of our resource. Soon it will be possible to see the city of <?php 
         foreach(${"lib" . $countryISO[2]} as $value){
            if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                print($value["name_en"]);
                break;
            }
        }
        unset($value);
        ?> on the map.</p>
        
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
                <a itemprop='url' href='/en/<?php getListHref($libcountry,185);?>.html' title='List of cities in <?php getNameCountryEn($libcountry,185);?> by population'>
                    <span itemprop='name'>List of cities in <?php
                        foreach($libcountry as $value){
                            if ($countryISO[2] == $value["country_iso"]){
                                print($value["name_country_en"]);
                            }
                        }
                        unset($value);
                        ?> by population</span>
                </a>
                <ul class='child-menu-list'>
                    <?php rightMenuEn(${"lib" . $countryISO[2]},15);?>
                </ul>
            </li>
        </ul>

            <?php echo $ads3;?>

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
        <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
        <ul class='parent-menu-list'>
            <li>
                <p class='lang'>Other languages</p>
                <ul class='language-menu-list'>
                    <li><a href='/../<?php 
                        foreach(${"lib" . $countryISO[2]} as $value){
                            if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                                print($value["name_href"]);
                                break;
                            }
                        }
                        unset($value);
                        ?>.html' title='Численность населения <?php 
                        foreach(${"lib" . $countryISO[2]} as $value){
                            if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                                print($value["name_ru"]);
                                break;
                            }
                        }
                        unset($value);
                        ?>'>Численность населения <?php 
                        foreach(${"lib" . $countryISO[2]} as $value){
                            if (ltrim(urldecode($_SERVER['REQUEST_URI']), "/") == $start_link . $value["name_href"] . $end_link){
                                print($value["name_ru"]);
                                break;
                            }
                        }
                        unset($value);
                        ?></a></li>
                </ul>
            </li>
        </ul>
        </div>

        </div>
        </div>
<?php
}
?>