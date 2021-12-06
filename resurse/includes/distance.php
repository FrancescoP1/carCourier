<?php
   
    function getDistance($p1, $p2){
        $apiKey = 'AIzaSyB2J4rtrYTg6lU62L1bAtHPGISaC7udBog';
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$p1.",romania&destinations=".$p2.",romania&mode=driving&language=en-EN&sensor=false&key=".$apiKey;
        $contents = @file_get_contents($url);
        $output = json_decode($contents);
        echo $url;
        if(!empty($output -> error_message)){
            return $output -> error_message;
        }
        
        $result = array("km" => $output["rows"][0]["elements"][0]["distance"]["value"] / 1000);
        print_r ($result);
        return 0;
    }

?>