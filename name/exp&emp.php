<?php


//explode
$names = "ahmed_ali_mostafa"; 
$arrayNames = explode("_",$names); 


// var_dump($arrayNames);



// implode

$names = ["ahmed","ali","mostafa"]; 
$arrayNames = implode(",",$names); 


var_dump($arrayNames);
