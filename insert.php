<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'Includes/config.php';
function addData($userNumber, $end)
{
    $classInsert = new \Classes\InsertData();
    return $classInsert->add([ 'userNumber' => $userNumber, 'end' => $end]);

}
$end = false;
if (isset($_POST['end']))
    $end = true;
$userNumber = $_POST['userNumber'];
echo addData($userNumber, $end);


