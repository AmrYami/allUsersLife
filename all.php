<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'Includes/config.php';

function allData(){
    $classUpdate = new \Classes\All();
    return $classUpdate->AllData();
}

echo allData();