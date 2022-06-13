<?php
$serveur="localhost";
$user="root";
$pass="";
$base="site_dj";
try {
	$dbh = new PDO('mysql:host=localhost;dbname=site_dj',$user, $pass);
} catch (PDOExeption $e) {
	print "Erreur !:".$e->getMessage()."<br/>";
	die();
}
?>