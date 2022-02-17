<?php
define('admin23', true);
include("include/db_connect.php");
include("functions/functions.php");

/*include("include/auth_cookie.php");*/

$cat= clear_string($_GET["cat"]);
$type= clear_string($_GET["type"]);

	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
 	<link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" media="all" href="css/animate.css">
	
	<link href="slick/slick.css" rel="stylesheet" type="text/css" />
	<link href="slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/js/jquery-3.1.1.min"></script>
    <script type="text/javascript" src="/js/ji.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/js/textchange.js"></script>
	<script type="text/javascript" src="/js/wow.min.js"></script>
	<script>new WOW().init();</script>
	
	<script type="text/javascript" src="/slick/slick.js"></script>
	
	<meta charset="utf-8">
	
	<title>Оформление недвижимости</title>

	<meta name="viewport" content="width=640, initial-scale=0.4">

</head>

<body>
<div id="block-body">
<?php
include("include/block-header-post.php");	
?>



<div class="block-blog-content">

<ul class="block-blog-post">
<?php

mb_internal_encoding("UTF-8");

    /*$num=4;
    $page=(int)$_GET['page'];
    
    $count=mysqli_query($link, "SELECT COUNT(*) FROM `table_blog` WHERE visible='1' $querycat");
    $temp=mysqli_fetch_array($count);
    
    if ($temp[0]>0){
        $tempcount=$temp[0];
        //Находим общее число страниц
        $total=(($tempcount-1)/$num)+1;
        $total=intval($total);
        
        $page=intval($page);
        
        if(empty($page) or $page<0) $page=1;
        if($page>$total) $page=$total;
        
        $start=$page*$num-$num;
        
        $qury_start_num="LIMIT $start, $num";
        
    }
	
	echo $qury_start_num; */
//-----------------------------------------------------  

	$result=mysqli_query($link, "SELECT * FROM `table_blog` WHERE visible='1' ");
    if (mysqli_num_rows( $result) > 0)

        {
        $row=mysqli_fetch_array($result);      
        
        do{
            // функция по подгонке изображения на главной странице
            if ($row["image"] !=""&& file_exists("./upload_images/".$row["image"])){
            $img_path='./upload_images/'.$row["image"];
            $max_width=150;
            $max_height=150;
            list($width, $height)=getimagesize($img_path);
            $ratioh=$max_height/$height;
            $ratiow=$max_width/$width;
            $ratio=min($ratioh, $ratiow);
            $width=intval($ratio*$width);
            $height=intval($ratio*$height);
            }
            else{
                $img_path="/images/no-images.jpg";
                $width=150;
                $height=150;
            }        
        //-------------------------------------    
                                 
            echo '
			
			<div class="blog-content">
         
				
					<div class="blog-content-block">
						<li><a><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/></a></li>
					</div>
					<div class="blog-content-block">
						<li><p><a href="view_content.php?id='.$row["id"].'">'.$row["title"].'</a></p></li>         
						<li><a>'.$row["mini_description"].'</a></li>
					</div>
				
			
			</div>
            ';
            
        }
        while($row=mysqli_fetch_array($result));
    }
    echo '</ul>';
  /*  
//нижняя навигация по страницам
    if($page!=1){$pervpage='<li><a class="pstr-prev" href="view-blog.php?'.$url.'page='.($page-1).'">&lt;</a></li>';}
    if($page!=$total) $nextpage='<li><a class="pstr-next" href="view-blog.php?'.$url.'page='.($page+1).'">&gt;</a></li>';
    
    if($page-5>0) $page5left='<li><a href="view-blog.php?'.$url.'page='.($page-5).'">'.($page-5).'</a></li>';
    if($page-4>0) $page4left='<li><a href="view-blog.php?'.$url.'page='.($page-4).'">'.($page-4).'</a></li>';
    if($page-3>0) $page3left='<li><a href="view-blog.php?'.$url.'page='.($page-3).'">'.($page-3).'</a></li>';
    if($page-2>0) $page2left='<li><a href="view-blog.php?'.$url.'page='.($page-2).'">'.($page-2).'</a></li>';
    if($page-1>0) $page1left='<li><a href="view-blog.php?'.$url.'page='.($page-1).'">'.($page-1).'</a></li>';
    
    if($page+5<=$total) $page5right='<li><a href="view-blog.php?'.$url.'page='.($page+5).'">'.($page+5).'</a></li>';
    if($page+4<=$total) $page4right='<li><a href="view-blog.php?'.$url.'page='.($page+4).'">'.($page+4).'</a></li>';
    if($page+3<=$total) $page3right='<li><a href="view-blog.php?'.$url.'page='.($page+3).'">'.($page+3).'</a></li>';
    if($page+2<=$total) $page2right='<li><a href="view-blog.php?'.$url.'page='.($page+2).'">'.($page+2).'</a></li>';
    if($page+1<=$total) $page1right='<li><a href="view-blog.php?'.$url.'page='.($page+1).'">'.($page+1).'</a></li>';
    
    
    if($page+5<$total){
        $strtotal='<li><p class="nav-point">...</p></li><li><a href="view-blog.php?'.$url.'page='.$total.'">'.$total.'</a></li>';
    }
    else{
        $strtotal="";
    }
 
    if($total>1){
        echo '
        <center>
        <div class="pstrnav">
        <ul>
        ';
        
        echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='view-blog.php?".$url."page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$nextpage;
       echo '
        </center>
        </ul>
        </div>
        ';
    }*/
?>


</div>


<?php
include("include/block-footer.php");	
?>
</div>

</body>
</html>