<pre>
0 1 2 3 4 5 6 7 8 9 10 11 12
u W d o b d D s y m i  t  a
            |
            v
6 0 9 4 1 12 8 7 5 3 11 10 2
D u m b W a  y s d o t  i  d

----------------------------

0 1 2 3 4 5 6 7 8 9 10 11 12
D u m b W a y s d o t  i  d
            |
            v
1 4 8 9 3 12 0 7 6 2 11 10 5
u W d o b d  D s y m i  t  a
</pre>

    <?php    
    $A  = array(1,4,8,9,3,12,0,7,6,2,11,10,5);
    $v1 = array("D","u","m","b","W","a","y","s","d","o","t","i","d");
    $n  = count($A);

    echo "<h1>Sebelum di-bubble sort</h1>\n";
    foreach ($A as $aa) {
    	echo $aa." ";    	
    }
    ?>
    <br>
    <?php
    foreach ($A as $aa) {
    	echo $v1[$aa]." ";
    }    
    echo "\n";
    $K = 0;
    while($K < $n - 1){
    	$I = 0;
    	while($I < $n - 1 - $K){
    		if ($A[$I] > $A[$I + 1]){
    			$X         = $A[$I];
    			$A[$I]     = $A[$I + 1];
    			$A[$I + 1] = $X;
    		}
    		$I++;
    	}
    	$K++;
    }
    echo "<h1>Sesudah di-bubble sort</h1>\n";
    for ($I = 0; $I < $n; $I++)
    	echo "$A[$I] ";
    ?>
    <br>
    <?php
    for ($I = 0; $I < $n; $I++)
    	echo "$v1[$I] ";
    ?>