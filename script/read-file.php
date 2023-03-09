<?php

    function read_file($filename){
        $file = fopen( $filename, "r" );

        if( $file == false ) {
            echo ( "Error in opening file" );
            // exit();
        }else{
            // echo "File opened successfully";

            $filesize = filesize( $filename );
            if($filesize == false){
                return [];
            }
            
            $filetext = fread( $file, $filesize );
            fclose( $file );
            
            // if(filetext == false){
            //     return [];
            // }
            
            

            $data = explode("</>", $filetext);
            array_pop($data);
            

            $data_array = [];
            foreach($data as $key => $value){
                $tmp = explode("<date>", $value);
                $data_array[$tmp[0]] = $tmp[1];
            }

            return $data_array;
        }

        return [];
    }
?>