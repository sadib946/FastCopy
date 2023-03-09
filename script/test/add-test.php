<?php
    $path = "../store/data/";
    $filename = "FCCODE2.json";

    $id = "1111";
    $date = "06/03/2023 23:09:10";
    $text = "This is a test text";

    function getCurrentData($file){
        $get_json_data = file_get_contents($file);
        $all_data_array = json_decode($get_json_data, true);
        return $all_data_array;
    }

    function appendData($currentData, $date, $text){
        $new_data = array(
            "date" => $date,
            "text" => $text
        );
        $currentData[] = $new_data;
        return $currentData;
    }

    function saveData($file, $data){
        // $new_json_data = json_encode($data);
        file_put_contents($file, json_encode($data));
    }

    $file = $path.$filename;
    // Check if file exists
    if(!file_exists($file)){
        echo "file does not exist.<br/>";
        echo "Creating file ...<br/>";
        touch($file)."<br/>";
        echo "File created.<br/>";
        echo $file;
    }else{
        echo "file exists.";
    }

    // $current_data = getCurrentData($path, $filename);
    // $new_data = appendData($current_data, $date, $text);
    // saveData($path, $filename, $new_data);

?>