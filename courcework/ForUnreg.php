<?php // для незарегистрированного пользователя
session_start();
 if(isset($_POST['Submit']) ){
 	$_SESSION['logged_user']=0;
	header("Location: UserPage.php");
	exit;
 }
?>