<?php
session_start();
if($_SESSION['auth_admin'] == "yes_auth"){

define('admin23', true);

if(isset($_GET["logout"])){
    unset($_SESSION['auth_admin']);
    header("Location: login.php");
}
$_SESSION['urlpage']="<a href='index.php'>Главная</a> \ <a href='tovar.php'>Статьи</a> \ <a>Добавление статьи</a>";

include("include/db_connect.php");
include("include/functions.php");

$id=clear_string($_GET["id"]);


$action=clear_string($_GET["action"]);
    if (isset($action)){
        switch($action){
            case 'delete':
            
            if($_SESSION['edit_tovar']=='1'){
                
            
                if(file_exists("../upload_images/".$_GET["img"])){
                    unlink("../upload_images/".$_GET["img"]);
                }
                }
                else{
                    $msgerror='У Вас нет права на изменение товара!';
                }
                break;
        }
    }

if ($_POST["submit_save"]){
    
    if($_SESSION['edit_tovar']=='1'){
    
    $error=array();
    //проверка полей
    if(!$_POST["form_title"]){
        $error[]="Укажите название товара";
    }

 

    //if(empty($_POST["upload_image"])){
       // include("actions/upload-image.php");
      //  unset($_POST["upload_image"]);
     // } 
         
    //Проверка чекбоксов
    if($_POST["chk_visible"]){
        $chk_visible="1";
    }
    else{
        $chk_visible="0";
    }
    

    
    if(count($error)){
        $_SESSION['message']="<p id='form-error'>".implode('<br />', $error)."</p>";
    }
    else{
        
        //$querynew="title='{$_POST["form_title"]}', mini_description='{$_POST["txt1"]}', description='{$_POST["txt2"]}', visible='$chk_visible'";

        //$update=mysqli_query($link, "UPDATE `table_blog` SET `title`='{$_POST["form_title"]}', `mini_description`='{$_POST["txt1"]}', `description`='{$_POST["txt2"]}', `visible`='$chk_visible' WHERE `id`='$id'");
												
								// изменение фотографии				
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
									
									  $update = "UPDATE table_blog SET `image`='$uploadfile' WHERE `id`='$id'";
									  mysqli_query($link, $update);

								}
												
    
	  
	  $update = "UPDATE table_blog SET `title`='{$_POST["form_title"]}', `mini_description`='{$_POST["txt1"]}', `description`='{$_POST["txt2"]}', `visible`='$chk_visible' WHERE `id`='$id'";

				if (mysqli_query($link, $update)) {
					echo "Record updated successfully";
					} else {
						echo "Error updating record: " . mysqli_error($link);

						}
							
	  
	  $_SESSION['message']="<p id='form-success'>Статья успешно изменена!</p>";   
  
    
	}
    }
                else{
                    $msgerror='У Вас нет прав на изменение статьи!';
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
<p id="title-page">Добавление товара</p>
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

<?php
	$result=mysqli_query($link, "SELECT * FROM `table_blog` WHERE `id`='$id'");

        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
                do{
                    echo '
                    <form enctype="multipart/form-data" method="post">
					';
					
									if(strlen($row["image"]) > 0 && file_exists("../upload_images/".$row["image"])){
										$img_path='../upload_images/'.$row["image"];
										$max_width=110;
										$max_height=110;
										list($width, $height)=getimagesize($img_path);
										$ratioh=$max_height/$height;
										$ratiow=$max_width/$width;
										$ratio=min($ratioh, $ratiow);
										$width=intval($ratio*$width);
										$height=intval($ratio*$height);
            
										echo '
										
											<div id="baseimg">
											<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
											<a href="edit_product.php?id='.$row["id"].'&img='.$row["image"].'&action=delete"></a>
											</div>
											';
											}
											else{
													echo '


															<div id="baseimg-upload">
															<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
															<input type="file" name="upload_image" />
															</div>
															';
                
												}
					
					
					
					echo '
                    <ul id="edit-tovar">

                    <li>
                    <label>Название статьи</label>
                    <input type="text" name="form_title" value="'.$row["title"].'" />
                    </li>

                    					
			        </ul>

			
			              <h3 class="h3click">Краткое описание товара</h3>
                <div class="div-editor1">
                <textarea id="editor1" name="txt1" cols="100" rows="20">'.$row["mini_description"].'</textarea>
                <script type="text/javascript">
                var ckeditor1=CKEDITOR.replace("editor1");
                AjexFileManager.init({
                returnTo:"ckeditor",
                editor: ckeditor1
                });
                </script>
                </div>
              
               

                              <h3 class="h3click">Oписание товара</h3>
                <div class="div-editor2">
                <textarea id="editor2" name="txt2" cols="100" rows="20">'.$row["description"].'</textarea>
                <script type="text/javascript">
                var ckeditor1=CKEDITOR.replace("editor2");
                AjexFileManager.init({
                returnTo:"ckeditor",
                editor: ckeditor1
                });
                </script>
                </div>
              
                ';

        if($row["visible"]=='1') $checked1="checked";


        
        
        echo '
                <h3 class="h3title">Настройки статей</h3>
                <ul id="chkbox">
                <li><input type="checkbox" name="chk_visible" id="chk_visible" '.$checked1.' /><label for="chk_visible">Показывать статьи</label></li>

                </ul>

                <p align="right"><input type="submit" id="submit_form" name="submit_save" value="Сохранить" /></p>

                </form>
                ';
                       }
                while ($row=mysqli_fetch_array($result));
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