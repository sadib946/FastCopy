<?php
    require "functions.php";

    $success = false;
    $msg = "";
    $data = json_decode(file_get_contents("php://input"));

    $id = $data->id;
    if(empty($id)){
        $msg = "ID is missing !";
    }

    $retrieveData = getData($id);

    $result = ["success" => $success, "msg" => $msg, "data" => $retrieveData];
    echo json_encode($result);

?>