<?php
	$kata = array("D","U","M","B","W","A","Y","S","I","D","U","J","I","A","N");
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