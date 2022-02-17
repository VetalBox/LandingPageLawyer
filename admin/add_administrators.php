<?php
session_start();
if($_SESSION['auth_admin'] == "yes_auth"){

define('admin23', true);

if(isset($_GET["logout"])){
    unset($_SESSION['auth_admin']);
    header("Location: login.php");
}

$_SESSION['urlpage']="<a href='tovar.php'>Главная</a> \ <a href='add_administrators.php'>Добавление администратора</a>";

include("include/db_connect.php");
include("include/functions.php");

if ($_POST["submit_add"]){
    $error=array();
    
    
   if ($_POST["admin_login"]){
        
        $login=clear_string($_POST["admin_login"]);
        $query=mysqli_query($link, "SELECT login FROM `reg_admin` WHERE login='$login'");
        
        If (mysqli_num_rows($query) > 0){
            $error[]="Логин занят!";
        }
    }
    else{
        $error[]="Укажите логин!";
    }
    
    if(!$_POST["admin_pass"]) $error[]="Укажите пароль!";
    if(!$_POST["admin_fio"]) $error[]="Укажите ФИО!";
    if(!$_POST["admin_role"]) $error[]="Укажите должность!";
    if(!$_POST["admin_email"]) $error[]="Укажите E-mail!";
    
    if(count($error)){
        $_SESSION['message']="<p id='form-error'>".implode('<br />',$error)."</p>";
    }
    else{
        $pass=md5(clear_string($_POST["info_pass"]));
        $pass=strrev($pass);
        $pass=strtolower("9nm2rv8q".$pass."2yo6z");
        
        mysqli_query($link, "INSERT INTO `reg_admin`(`login`,`pass`,`fio`,`role`,`email`,`phone`,`view_orders`,`accept_orders`,`delete_orders`,`add_tovar`,`edit_tovar`,`delete_tovar`,`accept_reviews`,`delete_reviews`,`view_clients`,`delete_clients`,`add_news`,`delete_news`,`add_category`,`delete_category`,`view_admin`)
            VALUES(
                '".clear_string($_POST["admin_login"])."',
                '".$pass."',
                '".clear_string($_POST["admin_fio"])."',
                '".clear_string($_POST["admin_role"])."',
                '".clear_string($_POST["admin_email"])."',
                '".clear_string($_POST["admin_phone"])."',
                '".$_POST["view_orders"]."',
                '".$_POST["accept_orders"]."',
                '".$_POST["delete_orders"]."',
                '".$_POST["add_tovar"]."',
                '".$_POST["edit_tovar"]."',
                '".$_POST["delete_tovar"]."',
                '".$_POST["accept_reviews"]."',
                '".$_POST["delete_reviews"]."',
                '".$_POST["view_clients"]."',
                '".$_POST["delete_clients"]."',
                '".$_POST["add_news"]."',
                '".$_POST["delete_news"]."',
                '".$_POST["add_category"]."',
                '".$_POST["delete_category"]."',
                '".$_POST["view_admin"]."'
                )");
                
        $_SESSION['message']="<p id='form-success'>Пользователь успешно добавлен!</p>";                
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery-confirm/jquery-confirm.css" rel="stylesheet" type="text/css" />
    <link href="jquery-confirm/jquery-confirm.less" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="./ckeditor/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="jquery-confirm/js/jquery-confirm.js"></script>
	
    <title>Панель управления - Клиенты</title>
</head>

<body>
<div id="block-body">
<?php
	include("include/block-header.php");
    
    $all_client=mysqli_query($link, "SELECT * FROM `reg_user`");
  
?>
<div id="block-content">
<div id="block-parameters">

<p id="title-page">Добавление администратора</p>
</div>
<?php
	if(isset($_SESSION['message'])){
	   echo $_SESSION['message'];
       unset($_SESSION['message']);
	}
?>

<form method="post" id="form-info">
<ul id="info-admin">
<li><label>Логин</label><input type="text" name="admin_login" /></li>
<li><label>Пароль</label><input type="password" name="admin_pass" /></li>
<li><label>ФИО</label><input type="text" name="admin_fio" /></li>
<li><label>Должность</label><input type="text" name="admin_role" /></li>
<li><label>E-mail</label><input type="text" name="admin_email" /></li>
<li><label>Телефон</label><input type="text" name="admin_phone" /></li>
</ul>

<h3 id="title-privilege">Привилегии</h3>

<p id="link-privilege"><a id="select-all">Выбрать все</a> | <a id="remove-all">Снять все</a></p>

<div class="block-privilege">

<ul class="privilege">
<li><h3>Заказы</h3></li>

<li>
<input type="checkbox" name="view_orders" id="view_orders" value="1" />
<label for="view_orders">Просмотр заказов</label>
</li>

<li>
<input type="checkbox" name="accept_orders" id="accept_orders" value="1" />
<label for="accept_orders">Обработка заказов</label>
</li>

<li>
<input type="checkbox" name="delete_orders" id="delete_orders" value="1" />
<label for="delete_orders">Удаление заказов</label>
</li>
</ul>

<ul class="privilege">
<li><h3>Товары</h3></li>

<li>
<input type="checkbox" name="add_tovar" id="add_tovar" value="1" />
<label for="add_tovar">Добавление товаров.</label>
</li>

<li>
<input type="checkbox" name="edit_tovar" id="edit_tovar" value="1" />
<label for="edit_tovar">Изменение товаров.</label>
</li>

<li>
<input type="checkbox" name="delete_tovar" id="delete_tovar" value="1" />
<label for="delete_tovar">Удаление товаров.</label>
</li>
</ul>

<ul class="privilege">
<li><h3>Отзывы</h3></li>

<li>
<input type="checkbox" name="accept_reviews" id="accept_reviews" value="1" />
<label for="accept_reviews">Модерация отзывов.</label>
</li>

<li>
<input type="checkbox" name="delete_reviews" id="delete_reviews" value="1" />
<label for="delete_reviews">Удаление отзывов.</label>
</li>
</ul>
</div>

<div class="block-privilege">
<ul class="privilege">
<li><h3>Клиенты</h3></li>

<li>
<input type="checkbox" name="view_clients" id="view_clients" value="1" />
<label for="view_clients">Просмотр клиентов</label>
</li>

<li>
<input type="checkbox" name="delete_clients" id="delete_clients" value="1" />
<label for="delete_clients">Удаление клиентов</label>
</li>
</ul>

<ul class="privilege">
<li><h3>Новости</h3></li>

<li>
<input type="checkbox" name="add_news" id="add_news" value="1" />
<label for="add_news">Добавление новостей</label>
</li>

<li>
<input type="checkbox" name="delete_news" id="delete_news" value="1" />
<label for="delete_news">Удаление новостей</label>
</li>
</ul>

<ul class="privilege">
<li><h3>Категории</h3></li>

<li>
<input type="checkbox" name="add_category" id="add_category" value="1" />
<label for="add_category">Добавление категории</label>
</li>

<li>
<input type="checkbox" name="delete_category" id="delete_category" value="1" />
<label for="delete_category">Удаление категории</label>
</li>
</ul>
</div>

<div class="block-privilege">
<ul class="privilege">
<li><h3>Администраторы</h3></li>

<li>
<input type="checkbox" name="view_admin" id="view_admin" value="1" />
<label for="view_admin">Просмотр администраторов</label>
</li>
</ul>
</div>

<p align="right"><input type="submit" name="submit_add" id="submit_form" value="Добавить" /></p>

</form>
</div>
</div>

</body>
</html>
<?php
	}
    else{
        header("Location: login.php");
    }
?>