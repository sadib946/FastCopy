<?php
    require "functions.php";

    $success = false;
    $msg = "";

    if(empty($_POST["date"]) OR empty($_POST["id"]) OR empty($_POST["text"])){
        $msg = "Something is missing !";
    }
    
    $date = $_POST["date"];
    $id = $_POST["id"];
    $text = $_POST["text"];

    $new_data = createNewData($date, $text);
    $data = appendData($id, $new_data);
    $save = saveData($id, $data);

    if($save == true){
        $success = true;
        $msg = "Data added !";
    }else{
        $msg = "Couldn't add data !";
    }

    $result = ["success" => $success, "msg" => $msg];
    echo json_encode($result);
?>