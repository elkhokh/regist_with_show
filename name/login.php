<?php

// var_dump($_SERVER['HTTP_REFERER']);
foreach($_SERVER as $key => $value){
    echo $key . "=>" . $value . "<br><br>";
}

