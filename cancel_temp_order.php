<?php

    $conn = new mysqli('localhost','root','','db_usmkp_store');

    $st_check = $conn->prepare("DELETE FROM temp_order WHERE mobile_phone=?");
    $st_check->bind_param("s",$_GET["mobile_phone"]);
    $st_check->execute();