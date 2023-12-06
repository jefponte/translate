<?php

function generateCSV($objects, $key = "", $csvFilePath = 'translate.csv')
{

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
            generateCSV($value, $keyParam, $csvFilePath);
        }
    }
}

$json_file_path = '.\website\lang.json';
$jsonData = file_get_contents($json_file_path);
$arrayData = json_decode($jsonData, true);

generateCSV($arrayData['pt'], '', '.\website\translate.csv');

echo "CSV website ok";



$json_file_path = '.\sms\lang.json';
$jsonData = file_get_contents($json_file_path);
$arrayData = json_decode($jsonData, true);

generateCSV($arrayData['pt'], '', '.\sms\translate.csv');


echo "CSV SMS ok";



$json_file_path = '.\backoffice\content.json';
$jsonData = file_get_contents($json_file_path);
$arrayData = json_decode($jsonData, true);

generateCSV($arrayData['pt'], '', '.\backoffice\translate.csv');

echo "CSV website ok";