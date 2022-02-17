<?php
session_start();
if($_SESSION['auth_admin'] == "yes_auth"){

define('admin23', true);

if(isset($_GET["logout"])){
    unset($_SESSION['auth_admin']);
    header("Location: login.php");
}
$_SESSION['urlpage']="<a href='tovar.php'>Главная</a> \ <a href='tovar.php'>Статьи</a> \ <a>Добавление статьи</a>";

include("include/db_connect.php");
include("include/functions.php");

if ($_POST["submit_add"]){
    
    if($_SESSION['add_tovar']=='1'){
        
    $error=array();
    //проверка полей
    if(!$_POST["form_title"]){
        $error[]="Укажите название товара";
    }	
	    //Проверка чекбоксов
    if($_POST["chk_visible"]){
        $chk_visible="1";
    }
    else{
        $chk_visible="0";
    }
		
						if($_FILES['upload_image']['type']=='image/jpeg' || $_FILES['upload_image']['type']=='image/jpg' || $_FILES['upload_image']['type']=='image/png'){
          
								$imgext=strtolower(preg_replace("#.+\.([a-z]+)$#i","$1",$_FILES['upload_image']['name']));
								//папка для загрузки
								$uploaddir='../upload_images/';
								//новое сгенерированное имя файла
								$newfilename=$_POST["form_type"].'-'.$id.rand(10,100).'.'.$imgext;
								//путь к файлу(папка.файл)
								$uploadfile=$uploaddir.$newfilename;}
								//загружаем файл move-uploaded_file 
								if(move_uploaded_file($_FILES['upload_image']['tmp_name'],$uploadfile)){
	
	  
 
    if(count($error)){
        $_SESSION['message']="<p id='form-error'>".implode('<br />', $error)."</p>";
    }
    else{
      $query ="INSERT INTO table_blog (`title`,`image`,`mini_description`,`description`,`visible`) VALUES('".$_POST["form_title"]."','$uploadfile','".$_POST["txt2"]."','".$_POST["txt1"]."','".$chk_visible."')";
     
    // выполняем запрос
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
				if($result)
							{
							$id=mysqli_insert_id($link);

							}
    // закрываем подключение

      $_SESSION['message']="<p id='form-success'>Статья успешно добавлен!</p>";   

	}
     
    }
  }
  else{
    $msgerror='У Вас нет прав на добавление Статьи';
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
    
	<title>Панель управления</title>
</head>

<body>
<div id="block-body">
		<?php
			include("include/block-header.php");

		?>
		
		<div id="block-content">

			<div id="block-parameters">
				<p id="title-page">Добавление статьи</p>
			</div>
		<?php

			if(isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
			if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			}
			if(isset($_SESSION['answer'])){
			echo $_SESSION['answer'];
			unset($_SESSION['answer']);
			}
			?>

		<form enctype="multipart/form-data" method="post">
			<ul id="edit-tovar">

				<li>
				<label>Название товара</label>
				<input type="text" name="form_title"/>
				</li>
		
			
			<label class="stylelabel">Основная картинка</label>

				<div id="baseimg-upload">
					<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
					<input type="file" name="upload_image" />
				</div>
			
					<h3 class="h3click">Краткое описание статьи</h3>
					<div class="div-editor2">
					<textarea id="editor2" name="txt2" cols="100" rows="20"></textarea>
						<script type="text/javascript">
						var ckeditor1=CKEDITOR.replace("editor2");
						AjexFileManager.init({
							returnTo:"ckeditor",
							editor: ckeditor1
							});
						</script>
					</div>
						<h3 class="h3click">Статья</h3>
					<div class="div-editor1">
					<textarea id="editor1" name="txt1" cols="100" rows="20"></textarea>
						<script type="text/javascript">
						var ckeditor1=CKEDITOR.replace("editor1");
						AjexFileManager.init({
							returnTo:"ckeditor",
							editor: ckeditor1
							});
						</script>
					</div>
			
			<h3 align="right" class="h3title">Настройки видимости</h3>
			
			<input type="checkbox" name="chk_visible" id="chk_visible" /><label align="right" for="chk_visible">Показывать статью</label>
	
		<p align="right"><input type="submit" id="submit_form" name="submit_add" value="Добавить статью" /></p>

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