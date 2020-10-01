<?php
function BaseHeader(){
    if (http_response_code() != "404"){
        ?>

        <?php
        print $_SERVER['REQUEST_URI']
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
                <li itemprop='name'><a itemprop='url' href='/../ru/list-of-countries-by-population.html'>Страны</a></li>
                <li itemprop='name'><a itemprop='url' href='/../ru/list-of-kingdoms-by-population.html'>Королевства</a></li>
                <li itemprop='name'><a itemprop='url' href='/../ru/list-of-republics-by-population.html'>Республики</a></li>
                <li itemprop='name'><a itemprop='url' href='/../ru/list-of-cities-by-population.html'>Города</a></li>
            </ul>
            </div>
        </div>
        </nav>
        <?php
    }
}

function BaseFooter(){
    if (http_response_code() != "404"){
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
        <?php
    }
}

?>