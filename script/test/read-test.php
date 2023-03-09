<?php
    $path = "../../store/data/";
    $filename = "FCCODE2.json";

    function getCurrentData($file){
        $get_json_data = file_get_contents($file);
        $all_data_array = json_decode($get_json_data, true);
        return $all_data_array;
    }

    $file = $path.$filename;
    $data = getCurrentData($file);

    print_r($data);
?>