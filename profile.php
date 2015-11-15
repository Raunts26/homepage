<?php
	//Lehe nimi
	$page_title = "Profiil";
	//Faili nimi
	$page_file = "profile.php";
	require_once("header.php");
	require_once("functions.php");
?>

<?php 
	if(!isset($_SESSION['logged_in_user_id'])) {
	header("Location: noaccess.php");
	exit();
	}
?>

<?php if($_SESSION['logged_in_user_group'] == 1):?>
Otsija profiil

<?php elseif($_SESSION['logged_in_user_group'] == 2): ?>
Pakkuja profiil

<?php elseif($_SESSION['logged_in_user_group'] == 3): ?>
Admin profiil

<?php endif; ?>

<?php
	require_once("footer.php");
?>