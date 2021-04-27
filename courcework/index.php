<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>Футбольные чемпионаты</title>
<?php
include('includes/style.php');
?>
</head>
<body>
<h2 align="center">Добро пожаловать!</h2>
<h4 align="center"> Курсовая работа на тему "Футбольные чемпионаты "  Пивник Николай Викторович ПО-4 </h4>
<h3 align="center">Вход:</h3>
<form action="opredelenieUsera.php" method="post" align="center">
Логин:  <input type="text" name="user_name" placeholder="login"><br>
Пароль: <input type="password" name="user_pass" placeholder="password"><br>

<input  type="submit" name="Submit" value="Войти" class="b1">

</form>
<center>
<?php
 if(isset($_SESSION['message']) ){
 	echo $_SESSION['message'] ;
 	$_SESSION['message'] = "";
 }
?>
</center>

<form action="Regestration.php" method="post" align="center">
<br><button class="b1">  Регистрация </button>
</form>	

<form action="ForUnreg.php" method="post" align="center">
<br>Войти без регистрации:<input  type="submit" name="Submit" value="Войти" class="b1">
</form>	

</body>	

</html>