# lab3
Чат 
Изучение технологии AJAX
------

## Задача
Разработать и реализовать анонимный чат с возможностью создания каналов . В интерфейсе отображается список каналов , пользователь может либо подключится к существующему каналу , либо создать навый . Сообщения доставляються пользователю без обновления страницы .
#### Реализовать возможности системы:
 -  Автоматическое удаление старых сообщений 
 -  Автоматическое удаление каналов 
 
## Ход работы

### 1. Разработка пользовательского интерфейса

Создание и подключение к чатам :

<p align = "center"><img src="https://github.com/Sa2ap/lab3/blob/main/lab3.4.PNG"/width = 100%></p>

Ввод никнейма :

<p align = "center"><img src="https://github.com/Sa2ap/lab3/blob/main/lab3.3.PNG"/width = 100%></p>

Дизайн чата  :

<p align = "center"><img src="https://github.com/Sa2ap/lab3/blob/main/lab3.1.PNG"/width = 100%></p>

Пользователь при отправке сообщений видит свое сообщение, где его ник выделен синим цветом и подписан "You".
У других пользователей ник будет видно тот который вводился при регитсрации .

<p align = "center"><img src="https://github.com/Sa2ap/lab3/blob/main/lab3.2.PNG"/width = 100%></p>

### 2. Описание пользовательских сценариев работы
На сайте доступны следующие возможности:
- Создание каналов
- Подключение к каналам
- Общение с помощью чата 


1) После нажатия пользователем кнопки "Создать чат " появляеться кнопка "Зайти в чат" и порядковый номер созданного чата .

2) Пользователь после нажатия на кнопку "Зайти в чат ", страница форума обновится и и пользователь перейдет в комнату с чатом 

3) Далее появиться диалоговое окно где у пользователя попросит ввести никнейм  

4) Пользователь может Общаться в чате с помощи она с вводом текста и кнопки "Send" , а так же читать чужие сообщения без обновления страницы 

### 3. Описание API сервера и хореографии
#### HTTP запросы:

- Алгоритм работы сайта :
<p align = "center"><img src="https://github.com/Sa2ap/lab3/blob/main/lab3.5.PNG"/width = 100%></p>

# Значимые Фрагменты кода 
 _______________________
  Код CSS
 ```sh 
  <style>
	.container{
		width: 50%;
		padding: 10px;
		background-color: #f4511e;
		border: 2px solid;
		box-shadow: 0px 0px 10px;
	}
	#display{
		padding: 10px;
		background-color: #f1f1f1;
		border: 1px solid;
		border-radius: 5px;
		box-shadow: inset 0px 0px 10px;
		overflow-x: scroll;
	}
	p{
		font-family: Calibri;
		font-style: italic;
		padding: 10px;
		display: table;
		max-width: 100%;
		background-color: #ffffff;
		border: 1px solid;
		border-radius: 5px;
		box-shadow: 1px 1px 3px;
	}
	body{
		margin: 10px;
		font-family: sans-serif;
	}
	b{
		font-family: sans-serif;
		font-style: normal;
	}
</style>
```
Код chatlog
```sh
<?php 
	include("configurations/connection.php");

		if(isset($_POST['send'])==1){
			
			$name = $_POST['name'];
			$message = mysqli_real_escape_string($dbc, $_POST['message']);

			$q = "INSERT INTO chatroom (name, message) VALUES ('$name', '$message')";
			$r = mysqli_query($dbc,$q);

			$q = "SELECT COUNT(id) AS num FROM chatroom ORDER BY id ASC";
			$r = mysqli_fetch_assoc(mysqli_query($dbc,$q));

			if($r['num']>6){
				$q = "DELETE FROM chatroom LIMIT 1;";
				mysqli_query($dbc,$q);
			}					
			
			header("Location: index.php?name=".$name);

		}

	$q="SELECT * FROM chatroom";
	$r=mysqli_query($dbc,$q);

	while($row=mysqli_fetch_assoc($r)){
		if($row['name']==$_GET['name']){
 ?>

<p><b><u style="color: blue;">You</u> : </b><?php echo $row['message']; ?></p>

<?php }else{ ?>

<p><b><u><?php echo $row['name']; ?></u> : </b><?php echo $row['message']; ?></p>

<?php }} ?>
```

Код index.php
```sh
<?php 
	include("configurations/connection.php");

		if(isset($_POST['send'])==1){
			
			$name = $_POST['name'];
			$message = mysqli_real_escape_string($dbc, $_POST['message']);

			$q = "INSERT INTO chatroom (name, message) VALUES ('$name', '$message')";
			$r = mysqli_query($dbc,$q);

			$q = "SELECT COUNT(id) AS num FROM chatroom ORDER BY id ASC";
			$r = mysqli_fetch_assoc(mysqli_query($dbc,$q));

			if($r['num']>6){
				$q = "DELETE FROM chatroom LIMIT 1;";
				mysqli_query($dbc,$q);
			}					
			
			header("Location: index.php?name=".$name);

		}

	$q="SELECT * FROM chatroom";
	$r=mysqli_query($dbc,$q);

	while($row=mysqli_fetch_assoc($r)){
		if($row['name']==$_GET['name']){
 ?>

<p><b><u style="color: blue;">You</u> : </b><?php echo $row['message']; ?></p>

<?php }else{ ?>

<p><b><u><?php echo $row['name']; ?></u> : </b><?php echo $row['message']; ?></p>

<?php }} ?>
```
