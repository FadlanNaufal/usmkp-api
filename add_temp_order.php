<?php

    $conn = new mysqli('localhost','root','','db_usmkp_store');

    $st_check = $conn->prepare("INSERT INTO temp_order VALUES (?,?,?,?)");
    $st_check->bind_param("ssii",$_GET["id"],$_GET["mobile_phone"],$_GET["itemid"],$_GET["qty"]);
    $st_check->execute();