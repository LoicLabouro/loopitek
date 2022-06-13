<?php
	session_start();
	include 'Modele/connexion_bd.php';
	include 'Vue/includes/header.php';
	include 'Vue/includes/menu.php';

	if(isset($_REQUEST['page']))
	{
		$page=$_REQUEST['page'];
		include(dirname(__FILE__).'/Controleur/'.$page.'.php');
	}
	else
	{
		include(dirname(__FILE__) . '/Vue/includes/connexion.php');
	}
	include 'Vue/includes/pied.php';
?>
