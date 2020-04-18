<?php

$conn = new mysqli('localhost','root','','db_usmkp_store');
$login = $conn->prepare('SELECT *  FROM users WHERE mobile_phone=? AND password=?');
$login->bind_param("ss",$_GET['mobile_phone'],$_GET['password']);
$login->execute();
$login_check = $login->get_result();

if($login_check->num_rows == 0){
    echo "0";
}else{
    echo "1";
}