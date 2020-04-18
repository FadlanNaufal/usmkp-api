<?php

$conn = new mysqli('localhost','root','','db_usmkp_store');
$cat_check = $conn->prepare('SELECT * FROM items WHERE category=?');
$cat_check->bind_param("s",$_GET['category']);
$cat_check->execute();
$rs = $cat_check->get_result();

$arr = array();
while($row = $rs->fetch_assoc()){
    array_push($arr,$row);
}
echo json_encode($arr);
