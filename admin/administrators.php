<?php
session_start();
if($_SESSION['auth_admin'] == "yes_auth"){

define('admin23', true);

if(isset($_GET["logout"])){
    unset($_SESSION['auth_admin']);
    header("Location: login.php");
}

$_SESSION['urlpage']="<a href='tovar.php'>Главная</a> \ <a href='administrators.php'>Администраторы</a>";

include("include/db_connect.php");
include("include/functions.php");

$id=clear_string($_GET["id"]);
$action=$_GET["action"];

if(isset($action)){
    
    switch ($action){
        case 'delete':
        
        $delete=mysqli_query($link, "DELETE FROM `reg_admin` WHERE id = '$id'");
        
        break;
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
	
    <title>Панель управления - Администраторы</title>
</head>

<body>
<div id="block-body">
<?php
	include("include/block-header.php");

?>
<div id="block-content">
<div id="block-parameters">

<p id="title-page">Администраторы</p>

<?php

if($_SESSION['view_admin']=='1'){
    echo '
    <p align="right" id="add-style"><a href="add_administrators.php">Добавить админа</a></p>
    ';
}	
?>

</div>

<?php



$result=mysqli_query($link, "SELECT * FROM `reg_admin` ORDER BY id DESC");
    if (mysqli_num_rows($result) > 0)
        {
        $row=mysqli_fetch_array($result);
        
        if($_SESSION['view_admin']=='1'){
        
        do{
       
               
    echo '
    <ul id="list-admin">
    <li>
    <h3>'.$row["fio"].'</h3>
    <p><strong>Должность</strong> - '.$row["role"].'</p>
    <p><strong>E-mail</strong> - '.$row["email"].'</p>
    <p><strong>Телефон</strong> - '.$row["phone"].'</p>
    <p class="links-actions" align="right"><a class="green" href="edit_administrators.php?id='.$row["id"].'">Изменить</a> | <a class="delete" rel="administrators.php?id='.$row["id"].'&action=delete">Удалить</a></p>
    </li>
    </ul>  
    ';
   
    }
    while ($row=mysqli_fetch_array($result));
      }
    else{
        echo '<p id="admincik">У Вас нет прав на просмотр администраторов</p>';
    }
}

?>


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