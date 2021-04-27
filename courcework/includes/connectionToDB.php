<?php
$connection = mysqli_connect('127.0.0.1','mysql','mysql','courcework'); //подключение к БД

if ($connection == false){
	echo "Не удалось подключится к БД!<br>"; 
	exit; 
}

?>