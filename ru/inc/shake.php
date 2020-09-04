<?php
for($i=0 ; $i<1 ; $i++){
$input = array(
'<a href="http://shakpotoke.com/e4et/sub1/sub2/sub3/sub4/" rel="nofollow" target="_blank"><img class="responsive" src="https://all-populations.com/hunt-expert.png" /></a>',
'<a href="http://shakpotoke.com/e4gj/sub1/sub2/sub3/sub4/" rel="nofollow" target="_blank"><img class="responsive" src="https://all-populations.com/galaxy.png" /></a>',
'<a href="http://shakpotoke.com/e4et/sub1/sub2/sub3/sub4/" rel="nofollow" target="_blank"><img class="responsive" src="https://all-populations.com/hunt-expert.png" /></a>',
'<a href="http://shakpotoke.com/e4gj/sub1/sub2/sub3/sub4/" rel="nofollow" target="_blank"><img class="responsive" src="https://all-populations.com/galaxy.png" /></a>');
$rand_keys = array_rand($input, 2);
$id1=$input[$rand_keys[0]];
/*
$id2=$input[$rand_keys[1]];
$id3=$input[$rand_keys[2]];
$id4=$input[$rand_keys[3]];
$id5=$input[$rand_keys[4]];
$id6=$input[$rand_keys[5]];
$id7=$input[$rand_keys[6]];
$id8=$input[$rand_keys[7]];
$id9=$input[$rand_keys[8]];
$id10=$input[$rand_keys[9]];
$id11=$input[$rand_keys[10]];
$id12=$input[$rand_keys[11]];
*/
$teg="$"; //для того, чтобы отображался знак доллара в новом файле, без этого не отображался.

	file_put_contents("shakes.php", "
	<?php	
	".$teg."pink1='".$id1."';
	?>
");
//sleep(6000);
}

?>