<?php

$conn = new mysqli('localhost','root','','db_usmkp_store');

$st = $conn->prepare("SELECT price,qty FROM items INNER JOIN bill_detail ON items.id = bill_detail.itemid WHERE bill_detail.id=?");
$st->bind_param("s",$_GET["id"]);
$st->execute();
$rs = $st->get_result();
$total = 0;
while($row = $rs->fetch_assoc()){
    $total = $total + ($row['price'] * $row['qty']);
}

echo $total;