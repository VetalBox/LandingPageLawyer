<?php

defined('admin23') or die('Доступ запрещен!');

function clear_string($cl_str){
$cl_str=strip_tags($cl_str);//защита переменной от взлома

$cl_str=trim($cl_str);//защита переменной от взлома
return $cl_str;    
}

//функция отправки через емаил забытый пароль

function send_mail($from,$to,$subject,$body){

    $charset='utf-8';

    mb_language("ru");

    $headers="MIME-Version:1.0\n";

    $headers="From: <".$form.">\n";

    $headers="Reply-To: <".$form.">\n";

    $headers="Content-Type: text/html; charset=$charset \n";
 
    mail($to,$subject,$body,$headers);
 
}

//группировка цен по разрядам
function group_numerals($int){
    switch (strlen($int)){
        case '4': $price=substr($int,0,1).' '.substr($int,1,4); break;
        case '5': $price=substr($int,0,2).' '.substr($int,2,5); break;
        case '6': $price=substr($int,0,3).' '.substr($int,3,6); break;
        case '7': $price=substr($int,0,1).' '.substr($int,1,3).' '.substr($int,4,7); break;
        default: $price=$int; break;    
    }
    return $price;
}
?>