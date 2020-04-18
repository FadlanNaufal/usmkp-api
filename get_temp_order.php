<?php

    $conn = new mysqli('localhost','root','','db_usmkp_store');
    $st_check = $conn->prepare("SELECT * FROM temp_order INNER JOIN items ON items.id = temp_order.itemid WHERE mobile_phone=?");
    $st_check->bind_param("s",$_GET['mobile_phone']);
    $st_check->execute();
    $rs = $st_check->get_result();
    $arr = array();
    
    while($row = $rs->fetch_assoc())
    {
        array_push($arr,$row);
    }
    
    echo json_encode($arr);
