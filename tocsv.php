<?php

function generateCSV($objects, $key = "")
{
    $csvFilePath = 'translate.csv';
    if(is_string($objects)){
        $csvFile = fopen($csvFilePath, 'a');
        $line = [$key, $objects];
        fputcsv($csvFile, $line);
    } else if(is_array($objects)) {
        foreach($objects as $key2 => $value){
            $keyParam = $key2;
            if($key != "") {
                $keyParam = $key.'.'.$key2;
            }
            generateCSV($value, $keyParam);
        }
    }
}

$json_file_path = 'lang.json';
$jsonData = file_get_contents($json_file_path);
$arrayData = json_decode($jsonData, true);
$csvFilePath = 'translate.csv';
// if (file_exists($csvFilePath)) {
//     unlink($csvFilePath);
// }

generateCSV($arrayData['pt']);