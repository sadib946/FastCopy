<?php
    $config_file = "../store/conf.json";

    // Getter

    function getConfig(){
        global $config_file;
        $config = file_get_contents($config_file);
        $config = json_decode($config, true);
        return $config;
    }

    function getDataPath(){
        $configs = getConfig();
        return $configs["dataPath"];
    }

    function getLastID(){
        $configs = getConfig();
        return $configs["lastID"];
    }

    function getFilenameFromID($id){
        $filename = "FC" . $id . ".json";
        return $filename;
    }

    function getData($id){
        $path = getDataPath();
        $filename = getFilenameFromID($id);
        $file = $path . $filename;
        $get_old_data = file_get_contents($file);
        $all_data_array = json_decode($get_old_data, true);
        return $all_data_array;
    }

    function createNewData($date, $text){
        $new_data = array(
            "date" => $date,
            "text" => $text
        );
        return $new_data;
    }
    
    
    
    // Setter

    function modifyConfig($new_config){
        global $config_file;
        $new_config = json_encode($new_config);
        file_put_contents($config_file, $new_config);
    }

    function appendData($id, $new_data){
        $currentData = getData($id);
        $currentData[] = $new_data;
        return $currentData;
    }

    function saveData($id, $data){
        $path = getDataPath();
        $filename = getFilenameFromID($id);
        $file = $path . $filename;
        $save = file_put_contents($file, json_encode($data));

        if($save != false){
            return true;
        }else{ 
            return false;
        }
    }

    function addData($id, $date, $text){
        if(empty($id) || empty($date) || empty($text)){
            echo "Something is missing !";
            return false;
        }

        $new_data = createNewData($date, $text);
        $appendedData = appendData($id, $new_data);
        $save = saveData($id, $appendedData);
        if($save == false){
            echo "Couldn't save data !";
            return false;
        }

        return true;
    }

    // Creater
    function generateSessionId(){
        global $config_file;
        $configs = getConfig();
        $configs["lastID"] += 1;
        modifyConfig($configs);
        return $configs["lastID"];
    }

    function createDataFile($sessionID){
        $path = getDataPath();
        $filename = getFilenameFromID($sessionID);
        $file = $path . $filename;
        touch($file);

        //Initialization
        $data = array();
        $data = json_encode($data);
        file_put_contents($file, $data);
    }

?>