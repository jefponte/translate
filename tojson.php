<?php

$finalContent = array('pt' => array(), 'en' => array(), 'fr' => array(), 'es' => array());

$csvFilePath = 'translate2.csv';

if (($handle = fopen($csvFilePath, 'r')) === false) {
    return;
}
while (($data = fgetcsv($handle)) !== false) {
    $column = 0;
    $idContent = '';
    $keys = array();
    foreach ($data as $value) {
        $column++;
        if ($column == 1) {
            $idContent = $value;
            $keys = explode('.', $idContent);
        }
        if ($column == 2) {
            if(count($keys) == 1) {
                $finalContent['pt'][$keys[0]] = $value;
            }
            else if(count($keys) == 2) {
                $finalContent['pt'][$keys[0]][$keys[1]] = $value;
            }
            if(count($keys) == 3) {
                $finalContent['pt'][$keys[0]][$keys[1]][$keys[2]] = $value;
            }
            if(count($keys) == 4) {
                $finalContent['pt'][$keys[0]][$keys[1]][$keys[2]][$keys[3]] = $value;
            }
        }
        if ($column == 3) {
            if(count($keys) == 1) {
                $finalContent['en'][$keys[0]] = $value;
            }
            else if(count($keys) == 2) {
                $finalContent['en'][$keys[0]][$keys[1]] = $value;
            }
            if(count($keys) == 3) {
                $finalContent['en'][$keys[0]][$keys[1]][$keys[2]] = $value;
            }
            if(count($keys) == 4) {
                $finalContent['en'][$keys[0]][$keys[1]][$keys[2]][$keys[3]] = $value;
            }
        }
        if ($column == 4) {
            if(count($keys) == 1) {
                $finalContent['fr'][$keys[0]] = $value;
            }
            else if(count($keys) == 2) {
                $finalContent['fr'][$keys[0]][$keys[1]] = $value;
            }
            if(count($keys) == 3) {
                $finalContent['fr'][$keys[0]][$keys[1]][$keys[2]] = $value;
            }
            if(count($keys) == 4) {
                $finalContent['fr'][$keys[0]][$keys[1]][$keys[2]][$keys[3]] = $value;
            }
        }
        if ($column == 5) {
            if(count($keys) == 1) {
                $finalContent['es'][$keys[0]] = $value;
            }
            else if(count($keys) == 2) {
                $finalContent['es'][$keys[0]][$keys[1]] = $value;
            }
            if(count($keys) == 3) {
                $finalContent['es'][$keys[0]][$keys[1]][$keys[2]] = $value;
            }
            if(count($keys) == 4) {
                $finalContent['es'][$keys[0]][$keys[1]][$keys[2]][$keys[3]] = $value;
            }
        }
    }
}
fclose($handle);

$csvFilePath = 'lang.json';
if (file_exists($csvFilePath)) {
    unlink($csvFilePath);
}
$outputFilePath = 'lang.json';
file_put_contents($outputFilePath, json_encode($finalContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));