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

<?php

if (!isset($_POST['league'])){
	$temp=$_SESSION['league'];

}
else{
$temp = $_POST['league'];
$_SESSION['league']= $temp;
}
echo $temp;

if ($temp=="АПЛ"){
$nameofarticle ='apl_stat';	
}
if($temp=="Бундеслига"){
	$nameofarticle ='bundes_stat';
}
if($temp=="Лига 1"){
	$nameofarticle ='ligue1_stat';
}
if($temp=="Серия А"){
	$nameofarticle ='seriaa_stat';
}





 include('includes/connectionToDB.php'); //подключение БД
 ?>
 
 <h3>Добавление команды:</h3>
<FORM name="filter" method="post" action="" enctype="multipart/form-data">
<LABEL>Введите данные для добавления информации в таблицу:</LABEL><br><br>
<INPUT type="file" name="img_upload" placeholder="Логотип" class='b1' />
<INPUT type="text" name="name" placeholder="название команды" class='b1' />
<INPUT type="text" name="games" placeholder="количество игр" class='b1' />
<INPUT type="text" name="wins" placeholder="количество побед" class='b1' />
<INPUT type="text" name="points" placeholder="количество очков" class='b1' />
<INPUT type="submit" value="Загрузить " name="submit" class='b1'/>
</FORM>

<h3>Удаление команды по названию:</h3>
<FORM name="filter" method="post" action="">
<LABEL>Введите название команды:</LABEL>
<INPUT type="text" name="deleting" placeholder="login"class="b1" />
<INPUT type="submit" value="Удалить" name="submit" class="b1" />
</FORM>

<h2>Таблица:</h2>
<table border="1" cellpadding="4"  width="30%" rules="rows">
<tr> 
  <th> # </th> <th> </th> <th> Название </th> <th> Игр </th> <th> Побед </th> <th> Очки </th> 
</tr>

<?php

 $query =$connection->query("SELECT * FROM `$nameofarticle` ORDER BY `points` DESC");
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



<?php
if (isset($_POST["deleting"])){
    $choice = $_POST["deleting"];

    $query ="DELETE FROM `$nameofarticle` WHERE `name` = '$choice'";
    $result = mysqli_query($connection, $query);
    
 ?>   
<form action="changeLeagues.php" method="post" align="center">
<br><button class="b1">  Обновить </button>
</form>

<?php
}
?>

<?php
if(isset($_POST['name'])){
    if (!empty($_FILES['img_upload']['tmp_name']) ){
	    
	    $name=$_POST['name'];
	    $games=$_POST['games'];
	    $wins=$_POST['wins'];
	    $points=$_POST['points'];

	    $img =addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
	    $connection->query("INSERT INTO `$nameofarticle` (logo,name,games,wins,points) VALUES ('$img','$name','$games','$wins','$points')");

	}
?>
	<form action="changeLeagues.php" method="post" align="center">
<br><button class="b1">  Обновить </button>
</form>
<?php
}

?>

<div class="sidenav">
<form action="Adminka.php" method="post" >
<br><button class="menu"  >Назад  </button>
</form>
