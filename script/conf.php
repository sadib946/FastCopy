<?php
    // Read the JSON file 
    $filename = "store/conf.json";

    $conf_json = file_get_contents($filename);
    
    // Decode the JSON file
    $conf = json_decode($conf_json, true);

    function get_id(){
        global $filename, $conf;
        $id = $conf['lastId'];
        $id += 1;
        $conf['lastId'] = $id;
        $newJson = json_encode($conf);
        file_put_contents($filename, $newJson);

        return $id;
    }
?>