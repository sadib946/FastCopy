<?php
    require "functions.php";

    $new_id = generateSessionId();
    // Create new data file
    createDataFile($new_id);

    $result = ["id" => $new_id];
    echo json_encode($result);
?>