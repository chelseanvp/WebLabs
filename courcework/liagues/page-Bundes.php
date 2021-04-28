<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>Бундеслига</title>
<?php
include('C:\OpenServer\domains\courcework2.by\includes\style.php');
?> 
</head>
<link rel="SHORTCUT ICON" href="bundesliga-logo.png" type="image/x-icon">
<body>
<center>
<h2>Добро пожаловать в Бундеслигу! </h2>
<p><img src="bundesliga-logo.png" width="200" height="200"><p>
<h2>Турнирная таблица: </h2>	

<?php
$connection = mysqli_connect('127.0.0.1','mysql','mysql','courcework'); //подключение к Б
?>
<table border="1" cellpadding="4"  width="30%" rules="rows">
<tr> 
  <th> # </th> <th> </th> <th> Название </th> <th> Игр </th> <th> Побед </th> <th> Очки </th> 
</tr>

<?php

 $query =$connection->query("SELECT * FROM `bundes_stat` ORDER BY `points` DESC");
 $numer =1;
    while($row = $query ->fetch_assoc()){
    	?><tr><?php
    	$show_img = base64_encode($row['logo']); ?>
    	<th><?php  echo $numer ?>  </th> <th> <img width="25" height="25" src ="data:image/jpeg;base64, <?php echo $show_img ?>" alt =""> 
        <th><?php  echo $row['name'] ?></th> <th><?php echo $row['games'] ?></th> <th><?php echo $row['wins'] ?></th> <th><?php echo $row['points'] ?></th>
    	</th>

       <?php   $numer =$numer+1 ?>
    </tr>
    <?php	
    }
?>
</table>

</body>