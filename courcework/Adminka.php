<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>Админка</title>

<?php
include('includes/style.php');
?>

</head>
<body>
<center>
<h2>Привет,Админ!</h2>
<p>Зарегестрированные пользователи:</p>

<?php
include('includes/connectionToDB.php');
$result=mysqli_query($connection,"SELECT * FROM `reg_users`"); //берем данные 
?>
<table border="2" cellpadding="4"  width="25%">
<tr> 
  <th> ID </th> <th> Login </th> <th> Password </th> <th> Дата регистрации </th> 
</tr> 
<?php  
while(($record = mysqli_fetch_assoc($result))){ //берем по одной строке
?> 
<tr> 
<th> <?php echo $record['id'] ?> </th> <th><?php echo $record['login'] ?></th> <th><?php echo $record['password'] ?></th> <th> <?php echo $record['date']; ?> </th>
</tr>
<?php
}

?>
</table>


<P>Удаление аккаунта пользователя по ID:</P>
<form name="filter" method="post" action="">
<label>Введите ID пользователя:</label>
<input type="text" name="filter_ID" placeholder="ID"class="b1" />
<input type="submit" value="Удалить" name="submit" class="b1" />
</FORM>


<?php
if (isset($_POST["filter_ID"])){
    $choice = $_POST["filter_ID"];

    if($choice == 1){
      echo 'Этот аккаунт нельзя удалить!';
      $choice ='';
    }
    include('includes/connectionToDB.php'); //подключение БД
    $query ="DELETE FROM `reg_users` WHERE `id` = '$choice'"; //удаляем данные 
    $result = mysqli_query($connection, $query);
    
 ?>   
<form action="Adminka.php" method="post" align="center">
<br><button class="b1">  Обновить </button>
</form>

<?php
}
?>

<P>Поиск аккаунта по логину:</P>

<form name="search" method="post" action="">
<label>Введите логин пользователя:</LABEL>
<input type="text" name="search" placeholder="login"class="b1" />
<input type="submit" value="Найти" name="Submit" class="b1" />
</form>

<?php
if (isset($_POST["search"])){
include('includes/connectionToDB.php'); //подключение БД
$login = $_POST['search'];

$count = mysqli_query($connection, "SELECT * FROM `reg_users` WHERE `login`='$login'"); 
$record = mysqli_fetch_assoc($count);

if(mysqli_num_rows($count)==0){ //Если такая строка не найдена
  echo "Ничего не найдено!";
        
}
  else{
  ?> 
  <table border="1" cellpadding="4"  width="25%">
  <tr> 
  <th> ID </th> <th> Login </th> <th> Password </th> <th> Дата регистрации </th> 
  </tr> 

  <tr> 
  <th> <?php echo $record['id'] ?> </th> <th><?php echo $record['login'] ?></th> <th><?php echo $record['password'] ?></th> <th> <?php echo $record['date']; ?> </th>
  </tr>

  </table>
  <form action="Adminka.php" method="post" align="center">
  <br><button class="b1">  Обновить </button>
  </form>
<?php
  }
}

?>

  <p>Страница для работы с лигами:</p>
  <form action="changeLeagues.php" name ="name" method="post" >
    <select class="b1" required name="league" >
    <option disabled class="b1"> Выберите лигу</option>
    <option value="АПЛ" class="b1">АПЛ</option>
    <option value="Лига 1" class="b1">Лига 1</option>
    <option selected value="Бундеслига" class="b1">Бундеслига</option>
    <option value="Серия А" class="b1">Серия А</option>
   </select>
   <p><input type="submit" value="Перейти" class="b1"></p>
  </form>


<form action="index.php" method="post" align="center">
<br><button class="b1">Вернуться на главную страницу</button>
</form> 
</center>
<body>  