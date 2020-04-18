<?php

    $conn = new mysqli('localhost','root','','db_usmkp_store');

    $st = $conn->prepare("SELECT * FROM temp_order WHERE mobile_phone=?");
    $st->bind_param("s",$_GET["mobile_phone"]);
    $st->execute();
    $rs = $st->get_result();

    $st2 = $conn->prepare("INSERT INTO bill (mobile_phone) values (?)");
    $st2->bind_param("s",$_GET["mobile_phone"]);
    $st2->execute();

    $st4 = $conn->prepare("SELECT MAX(id) as bno FROM bill WHERE mobile_phone=?");
    $st4->bind_param("s",$_GET["mobile_phone"]);
    $st4->execute();
    $rs2 = $st4->get_result();
    $row_max = $rs2->fetch_assoc();

    while($row = $rs->fetch_assoc()){

        $st3 = $conn->prepare("INSERT INTO bill_detail VALUES (?,?,?)");
        $st3->bind_param("iii", $row_max["bno"] ,$row["itemid"],$row["qty"]);
        $st3->execute();
    }


    
    $st5 = $conn->prepare("DELETE FROM temp_order WHERE mobile_phone=?");
    $st5->bind_param("s",$_GET["mobile_phone"]);
    $st5->execute();

    echo $row_max["bno"];
    

    
