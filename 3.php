<?php
	$star = 5;
	for($a = 1; $a <= $star; $a++){
	for($b = $star; $b >= $a; $b -= 1){
		echo "&nbsp";
	}
	for($c = 1; $c <= $a; $c++){
		echo $c;
	}
	echo "<br>";
	}	
?>