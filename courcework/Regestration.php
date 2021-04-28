<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Регестрация пользователя</title>
<?php
include('includes/style.php');
?>
</head>
<body>
<h3 align="center">Регистрация:</h3>
<form  method="post" align="center" action=" ">
Логин:<input  type="text" name="user_name" placeholder="login"><br>
Пароль: <input type="password" name="user_pass" placeholder="password"><br><br>

<input  type="submit" name="Submit" value="Зарегестрироваться" class="b1">
</form>
<center>

<?php
$login=$_POST['user_name'];
$password=$_POST['user_pass'];
include('includes/connectionToDB.php'); //подключение БД

if(isset($_POST["user_name"])){ // проверка введены ли данные
    $count = mysqli_query($connection, "SELECT * FROM `reg_users` WHERE `login`='$login'");

    if(mysqli_num_rows($count)==1){ //Если такая строка не найдена
        echo "Пользователь с таким логином уже зарегистрирован!";
        
    }
    
    else{
        $new = "INSERT INTO `reg_users` (login, password) VALUES ('$login', '$password')"; //запись инфы в БД

        if (mysqli_query($connection, $new)) {
            echo "Вы успешно зарегестрированы!";
            $str ="Login: ".$login." Password: ".$password."\n<br/>";
            echo 'Ваши данные:'."\n<br/>";
            echo $str;
    }
  }
}
?>

<form action="index.php" method="post" align="center">
<br><button class="b1">Вернуться на главную страницу</button>
</form> 

</center>
</body>