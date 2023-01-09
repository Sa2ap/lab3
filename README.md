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

- Запрос на пост новой записи (на оставление комментария аналогичный):
<p align = "center"><img src="https://github.com/Sa2ap/lab3/blob/main/lab3.5.PNG"/width = 100%></p>
