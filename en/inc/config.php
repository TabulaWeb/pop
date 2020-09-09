<?php 
// Конфиг подключаемых к странице переменных с возможными данными.
// ТАБЛИЦА ПЕРЕМЕННЫХ //
##################################################################
$y2=date("Y");
$y1=$y2-1;
$year=$y1." ".$y2;
$m1=1*date("n");
if ($m1==1) {$month = "January ";}
if ($m1==2) {$month = "February ";}
if ($m1==3) {$month = "March ";}
if ($m1==4) {$month = "April ";}
if ($m1==5) {$month = "May ";}
if ($m1==6) {$month = "June ";}
if ($m1==7) {$month = "July ";}
if ($m1==8) {$month = "August ";}
if ($m1==9) {$month = "September ";}
if ($m1==10) {$month = "October ";}
if ($m1==11) {$month = "November ";}
if ($m1==12) {$month = "December ";}
//$year = "2020 2019";
//$month = "January";
$scripttable ='				<script>
				$(document).ready(function(){
				  $("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
					  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				  });
				});
				</script>';
##################################################################
// ПОДКЛЮЧАЮ Скрипт недавно интересовались населением - рандомные 12 страниц
// include 'linkadd.php';
##################################################################
// Перед <!DOCTYPE html>
// 
// echo $doctypeup; <=== ТУТ
// <!DOCTYPE html>
// <html>
$doctypeup="";

// После <!DOCTYPE html>
// 
// <!DOCTYPE html>
// echo $doctypedown; <=== ТУТ
// <html>
$doctypedown="";

// Перед <html>
// 
// <!DOCTYPE html>
// echo $htmlup; <=== ТУТ
// <html>
$htmlup="";

// После <html>
// 
// <!DOCTYPE html>
// <html>
// echo $htmldown; <=== ТУТ
$htmldown="";

// Перед <head>
// <!DOCTYPE html>
// <html>
// echo $headup; <=== ТУТ
// <head>
$headup='';

// После <head>
// <!DOCTYPE html>
// <html>
// <head>
// echo $headdown; <=== ТУТ
$headdown="
";

// Перед закрывающим тег </head>
// <html>
// <head>
//  ...
// echo $headtop; <=== ТУТ
// </head>
/*
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6424906089929080",
    enable_page_level_ads: true
  });
</script>
*/
$headtop='
<script data-ad-client="ca-pub-8948843864233496" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
';
//DATS PUSH
//<script src="https://adsblockkpush.com/v1/js/45246.js"></script>


// После закрывающего тега </head>
// <html>
// <head>
//  ...
// </head>
// echo $headfoot; <=== ТУТ
$headfoot="";

// Перед <body>
// <html>
// <head>
// </head
// echo $bodyup; <=== ТУТ
// <body>
$bodyup='';

// После <body>
// <html>
// <head>
// </head
// <body>
// echo $bodydown; <=== ТУТ

$bodydown="";
// Перед </body>
// <html>
// <head>
// </head
// <body>
//  ...
// echo $bodytop; <=== ТУТ
// </body>
$bodytop='
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter50543266 = new Ya.Metrika2({
                    id:50543266,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50543266" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
'.'
<div style="position: fixed; left: 0; bottom: 0;z-index:998;display:none;margin:0;padding:0;" id="flat_ads_block">
<span class="close" onClick="close_flat_ads_block();"></span>
<div style="z-index:999">

<!-- Yandex.RTB R-A-562678-2 -->
<div id="yandex_rtb_R-A-562678-2"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-562678-2",
                renderTo: "yandex_rtb_R-A-562678-2",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
'."
</div>
	<script type=\"text/javascript\">
		setTimeout(function(){
			elem = document.getElementById('flat_ads_block'); elem.style.display = 'block';
		}, 5000);
		function close_flat_ads_block() {
		elem = document.getElementById('flat_ads_block'); elem.style.display = 'none';
	   }
	</script>
<style>
.close {
position: absolute;
right: 0;
top: 0;
width: 32px;
height: 32px;
z-index:1000;
margin:0!important;
background-color: #000;
}
.close:hover {
opacity: 1;
}
.close:before, .close:after {
position: absolute;
left: 15px;
content: ' ';
height: 33px;
width: 2px;
background-color: #fff;
}
.close:before {
transform: rotate(45deg);
}
.close:after {
transform: rotate(-45deg);
}
</style>	
</div>
";

// После </body>
// <html>
// <head>
// </head
// <body>
// </body>
// echo $bodydown; <=== ТУТ
$bodyfoot="";

// Перед закрывающим тегом </section>
// <body>
// <section>
//  ...
// echo $section; <=== ТУТ
// </section>
// <body>
$section='';

// После тега <aside>
// <body>
// <section>
// </section>
// <aside>
// echo $asideup; <=== ТУТ
//  ...
// </aside>
$asideup="";

// Перед тегом </aside>
// <body>
// <section>
// </section>
// <aside>
//  ...
// echo $asidedown; <=== ТУТ
// </aside>
$asidedown="";

// После тега <footer>
// <section>
// </section>
// <aside>
// </aside>
// <footer>
// echo $footerup; <=== ТУТ
//  ...
// </footer>
$footerup='
<div class="container">
<div class="row">
<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
<div class="panel-body">
<!-- Yandex.RTB R-A-562678-1 -->
<div id="yandex_rtb_R-A-562678-1"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-562678-1",
                renderTo: "yandex_rtb_R-A-562678-1",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
</div>
</section>
</div>
</div>
<script async src="https://first.dvanadva.ru/2745/e38e364c62479fa358ac4483310eb296ffb227cb.js"></script>
';

// Перед тегом </footer>
// <section>
// </section>
// <aside>
// </aside>
// <footer>
//  ...
// echo $footerdown; <=== ТУТ
// </footer>
//$footerdown="";
// LEO CASH
$footerdown="
";

#############################################################################################
// Подключение ADS БЛОКОВ + СТАТИЧЕСКИЕ БЛОКИ


//<div style="width: 100%; height: 280px; background-color: #eee;"></div>
// ADS 1 - верхний баннер на всю ширину
$ads1='<div class="ads1">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Горизонтальный -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8948843864233496"
     data-ad-slot="8737143212"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
';
/*$ads1 = '<!--<div class="ads" style="background-color: #eee;">
				<img src="" width="720" height="90" align="center">
			</div>-->
			<div class="ads">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Ads 1 EN -->
<ins class="adsbygoogle"
     style="display:inline-block;width:980px;height:120px"
     data-ad-client="ca-pub-6424906089929080"
     data-ad-slot="3843246864"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
			';
*/
// ADS 2 - баннер в контенте section
$ads2='
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- квадрат -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8948843864233496"
     data-ad-slot="9756912548"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
';

//$ads2 = '<div id="bn_0cd51c8a48">загрузка...</div><script async type="text/javascript" src="//recreativ.ru/rcode.0cd51c8a48.js"></script>';
/*$ads2 = '
<!--<div style="width: 100%; height: 280px; background-color: #eee;">
							</div>-->
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6424906089929080"
     data-ad-slot="3176074591"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
';
*/
// ADS 3 - правый баннер в aside
$ads3='
<div class="ads">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- вертикальный -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8948843864233496"
     data-ad-slot="9541042707"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
';

//$ads3 = '<div id="bn_ca19d48c72">загрузка...</div><script async type="text/javascript" src="//recreativ.ru/rcode.ca19d48c72.js"></script>';
/*$ads3 = '
<!--<div class="ads3" >
									</div>-->
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Ads 3 EN -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6424906089929080"
     data-ad-slot="6839987431"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
';
*/

?>