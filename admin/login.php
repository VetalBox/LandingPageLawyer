<?php
define('admin23', true);
session_start();
include("include/functions.php");

if($_POST["submit_enter"]){
    
    $login= ($_POST["input_login"]);
    $pass= ($_POST["input_pass"]);
 
    
    if ($login && $pass){
        
          $pass=md5(($_POST["info_pass"]));
          $pass=strrev($pass);
          $pass=strtolower("9nm2rv8q".$pass."2yo6z");
		  
														//подключение к бд без include так как далее не работает Location:
	
														mb_internal_encoding("UTF-8");
														$db_host        = 'kadast00.mysql.tools';
														$db_user        = 'kadast00_db';
														$db_pass        = 'v&4a+3ETc4';
														$db_database    = 'kadast00_db';

														$link=mysqli_connect($db_host,$db_user,$db_pass, $db_database);

														// Ругаемся, если соединение установить не удалось
														if (!$link) {
														echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
														exit;
														} else {
														mysqli_set_charset($link, "utf8");
														}
														//конец подключения к БД
    
        $result=mysqli_query($link, "SELECT * FROM `reg_admin` WHERE `login`='$login' AND `pass`='$pass'");
        If (mysqli_num_rows($result) > 0){
        $row=mysqli_fetch_array($result);
        $_SESSION['auth_admin']='yes_auth';
            
        $_SESSION['admin_role']=$row["role"];
        
        //Привелегии
        //Заказы
        $_SESSION['accept_orders']=$row["accept_orders"];
        $_SESSION['delete_orders']=$row["delete_orders"];
        $_SESSION['view_orders']=$row["view_orders"];
        
        //Товары
        
        $_SESSION['delete_tovar']=$row["delete_tovar"];
        $_SESSION['add_tovar']=$row["add_tovar"];
        $_SESSION['edit_tovar']=$row["edit_tovar"];
        
        //Отзывы
        
        $_SESSION['accept_reviews']=$row["accept_reviews"];
        $_SESSION['delete_reviews']=$row["delete_reviews"];
        
        //Клиенты
        
        $_SESSION['view_clients']=$row["view_clients"];
        $_SESSION['delete_clients']=$row["delete_clients"];
        
        //Новости
        
        $_SESSION['add_news']=$row["add_news"];
        $_SESSION['delete_news']=$row["delete_news"];
        
        //Категории
        
        $_SESSION['add_category']=$row["add_category"];
        $_SESSION['delete_category']=$row["delete_category"];
        
        //Администраторы
        
       $_SESSION['view_admin']=$row["view_admin"];
            header("Location: tovar.php");
            }
            else{
                $msgerror="Неверный Логин и(или) Пароль.";
            }
            }
            else{
                $msgerror="Заполните все поля!";
            }
        }

		
?>


<!DOCTYPE HTML>
<html>
<head>

	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
	
    
    
    
    <title>Панель управления - Вход</title>
</head>
<body>

<div id="block-pass-login">
<?php
	if ($msgerror){
	   echo '<p id="msgerror">'.$msgerror.'</p>';
	}
?>
<form method="post">

<ul id="pass-login">

<li><label>Логин</label><input type="text" name="input_login" /></li>
<li><label>Пароль</label><input type="password" name="input_pass" /></li>
</ul>
<p align="right"><input type="submit" name="submit_enter" id="submit_enter" value="Вход" /></p>
</form>

</div>



</body>
</html>