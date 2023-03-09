<?php
    // Read the JSON file 
    $filename = "../store/conf.json";

    $json = file_get_contents($filename);
    
    // Decode the JSON file
    $json_data = json_decode($json, true);
    
    // Display data
    print_r($json_data);


    // modify data
    $json_data['lastId'] = 2222;
    $newJson = json_encode($json_data);
    file_put_contents($filename, $newJson);

?>