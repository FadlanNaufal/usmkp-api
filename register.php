<?php

    $conn = new mysqli('localhost','root','','db_usmkp_store');

    $st_check = $conn->prepare("SELECT * FROM users WHERE mobile_phone=?");
    $st_check->bind_param("s",$_GET["mobile_phone"]);
    $st_check->execute();
    $rs = $st_check->get_result();

    

    if($rs->num_rows == 0){
        $st = $conn->prepare("INSERT INTO users VALUES(?,?,?,?,?)");
        $st->bind_param(
            "sssss",
            $_GET["id"],
            $_GET["name"],
            $_GET["mobile_phone"],
            $_GET["address"],
            $_GET["password"],
        );
        $st->execute();
        
        echo "1";
    }else{
        echo "0";
    }