<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //для нормального вывода ошибок
include('includes/connectionToDB.php'); //подключение БД

$login = $_POST['user_name'];
$password =  $_POST['user_pass'];

$count = mysqli_query($connection, "SELECT * FROM `reg_users` WHERE `login`='$login'");

if($login =='admin' and $password=='admin'){ //Если админ
	header("Location: Adminka.php");
	exit;
}

if(mysqli_num_rows($count)==1){ //Если зарег
	$record = mysqli_fetch_assoc($count);
	if ($record['password'] == $password){
		$_SESSION['login']=$login;
		$_SESSION['logged_user']=1;
		header("Location: UserPage.php");
	    exit;
	}
	else{
		$_SESSION['message'] = "Неверный пароль!";
		header("Location: index.php");
		 exit;
	}

}

else{
	$_SESSION['message'] = "Неверный логин или пароль!";
	header("Location: index.php");
	 exit;
}	


?>