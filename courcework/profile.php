<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>Профиль</title>
<?php
include('includes/style.php');
?>
</head>
<body>
<p>Ваш профиль:</p>

<p>&nbsp; &nbsp; &nbsp; &nbsp;<img src="images/profile-icon1.jpg" 
  width="189" height="189" alt="lorem"></a>

<?php
include('includes/connectionToDB.php'); //подключение БД
$login = $_SESSION['login'];

$count = mysqli_query($connection, "SELECT * FROM `reg_users` WHERE `login`='$login'");
$record = mysqli_fetch_assoc($count);
?>


   <ul>
  <li> <?php echo "Личный ID:  ".$record['id'] ?> </li> <li><?php echo "Логин:  ".  $record['login'] ?></li> <li><?php echo "Пароль:  ".  $record['password'] ?></li> <li> <?php echo "Дата регистрации (год/мес/число/время):  ".  $record['date']; ?> </v>
  </ul>

<p>Сменить пароль:</p>

<FORM name="filter" method="post" action="">
<INPUT type="text" name="New_password" placeholder="Введите новый пароль"class="b1" />
<INPUT type="submit" value="Обновить" name="submit" class="b1" />
</FORM>

<?php
if (isset($_POST['New_password'])){
	$password = $_POST['New_password'];
	$count = mysqli_query($connection, "UPDATE  `reg_users` SET `password` = '$password' WHERE `login`= '$login' ");
	echo "Пароль успешно сменен!";
	?>
   <form action="profile.php" method="post" >
   <br><button class="b1">  Обновить </button>
   </form>
  <?php
}
?>

<form action="UserPage.php" >
<br><button class="b1">Назад</button>
</form> 

</body>	
