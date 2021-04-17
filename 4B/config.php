<?php
$host="localhost";
$user="root";
$pass="";
$db="dumbways";
session_start();
try {
	$pdo=new PDO("mysql:host={$host};dbname={$db}",$user,$pass);
	?>	
	<?php
} catch (Exception $e) {
	echo $e->getMessage();
}
?>