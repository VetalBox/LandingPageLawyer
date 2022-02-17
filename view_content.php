<?php
define('admin23', true);
include("include/db_connect.php");
include("functions/functions.php");

$cat= clear_string($_GET["cat"]);
$type= clear_string($_GET["type"]);
$id=clear_string($_GET["id"]);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
 	<meta charset="utf-8">
    
    <!--<meta name="Description" content="<? echo $resquery["seo_description"];?>" />
    <meta name="keywords" content="<? echo $resquery["seo_words"];?>" />-->
       
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/jquery-3.1.1.min"></script>
    <script type="text/javascript" src="/js/ji.js"></script>

    <script type="text/javascript" src="/trackbar/trackbar.js"></script>
    <script type="text/javascript" src="/js/textchange.js"></script>
 
	<title>Оформление недвижимости-статьи блога</title>
    
</head>

<body>
<div id="block-body">

<?php
include("include/block-header-page.php");	
?>


<div class="block-content-blog-post">
<?php
mb_internal_encoding("UTF-8");
	$result1=mysqli_query($link, "SELECT * FROM `table_blog` WHERE id='$id' AND visible='1'");
    if (mysqli_num_rows($result1) > 0)
        {
        $row1=mysqli_fetch_array($result1);
               
        do{
            
            if(strlen($row1["image"])>0 && file_exists("./upload_images/".$row1["image"])){
            $img_path='./upload_images/'.$row1["image"];
            $max_width=400;
            $max_height=300;
            list($width, $height)=getimagesize($img_path);
            $ratioh=$max_height/$height;
            $ratiow=$max_width/$width;
            $ratio=min($ratioh, $ratiow);
            $width=intval($ratio*$width);
            $height=intval($ratio*$height);
            }
            else{
                $img_path="/images/no-images.jpg";
                $width=400;
                $height=300;
            }
                       
            echo '
 
            
            <div class="block-content-info">
            
                    <p id="content-title">'.$row1["title"].'</p>             
         
                    <p id="content-title"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" class="view-img"/>'.$row1["description"].'</p>
                                  
            </div>
            ';
            }
             while($row1=mysqli_fetch_array($result1));                     
 
 }
?>
</div>

<?php
include("include/block-footer-page.php");	
?>
</div>

</body>
</html>