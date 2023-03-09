<?php
    $page = $_GET["page"];

    switch($page){
        case "send":
            include "template/send-page.php";
            break;
        case "receive":
            include "template/receive-page.php";
            break;
        default:
            include "template/home.php";
            break;
    }
?>