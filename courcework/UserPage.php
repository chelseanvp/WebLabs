<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>Страница пользователя</title>
<?php
include('includes/style.php');
?> 
<style>
   hr {
    border: none; /* Убираем границу */
    background-color: #fc0; /* Цвет линии */
    color: #fc0; /* Цвет линии для IE6-7 */
    height: 2px; /* Толщина линии */
   }
</style>  
</head>
<body>
<center>
<h2>Добро пожаловать на сайт с топовыми лигами мира!</h2>

<?php

if($_SESSION['logged_user']==1){
  $login=$_SESSION['login'];
  
}

else {
  echo "Вы вошли как незарегстрированный пользователь!\n";
}
?>
<h3>Некоторые говорят, что футбол — это вопрос жизни и смерти. Меня удручает такой подход. Уверяю, что футбол гораздо важнее!"</h3>

<h2>Лиги:</h2>

	<p>
    <a href="liagues/page-APL.php"><img src="images/APL1-logo.png"  width="150" height="140"></a>
    <a href="liagues/page-Bundes.php"><img src="images/bundesliga-logo.png"  width="150" height="150"></a>
    <a href="liagues/page-Liague1.php"><img src="images/Ligue1-logo.png"  width="150" height="150"></a>
    <a href="liagues/page-seriaA.php"><img src="images/seriaA-logo.png"  width="150" height="150"></a>
 
  </p>
  <br><p>Смотрите легендарные штрафные удары:</p>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/oFwxCVj34fw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<br><h2>История возникновения и развития футбола (кратко)</h2>

<blockquote><blockquote><blockquote><blockquote><blockquote><p>
  Точной даты возникновения футбола не известно, но можно с уверенностью сказать, что история футбола насчитывает не одно столетие и затронула немало стран. Игры с мячом были популярны на всех континентах, об этом говорят повсеместные находки археологов. В Древнем Китае существовала игра, известная как «Цуцзюй», упоминания о которой были датированы вторым веком до нашей эры. По заявлению ФИФА в 2004 году, именно она считается наиболее древней из предшественников современного футбола. В Японии подобная игра носила название «Кемари» (в некоторых источниках «Кенатт»). Первое упоминание о Кемари встречается в 644 году нашей эры. В Кэмари играют и в наше время в синтоистских святилищах во время фестивалей. В Австралии мячи делали из шкур крыс, мочевых пузырей крупных животных, из скрученных волос. К сожалению, правил игры не сохранилось. В Северной Америке тоже был предок футбола, игра называлась «pasuckuakohowog», что означает «они собрались, чтобы поиграть в мяч ногами». Обычно игры проходили на пляжах, мяч пытались забить в ворота шириной около полумили, само же поле было в два раз длиннее. Число участников игры доходило до 1000 человек.</p></blockquote></blockquote></blockquote></blockquote></blockquote>
  <img src="images/futbol-v-drevnem-kitae.jpg" width="400" height="300"  >

<hr></hr>

<p>© 2020 courcework2.by – All Rights Reserved</p>

</center>

<form action="index.php" method="post" >
<br><button class="menu"  >Выход  </button>
</form>
<?php
if ($_SESSION['logged_user']==1){
?>
<form action="profile.php" method="post" >
<br><button class="menu1" >Профиль</button>
</form>  
<?php
}
?>



</body>