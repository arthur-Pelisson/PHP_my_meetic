<?php
include('user.php');
session_start();

if ($_SESSION['email'] !== "" ) 
{
	$ban = new user;
	$ban->ban_user($_POST['id_membre']);
	session_start();
	session_destroy();
	session_unset();
	header('location: index.php');
}
else
{
	header('location: index.php');
}