<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'Includes/config.php';
function deleteData($userNumber, $end)
{
    $classInsert = new \Classes\DeleteData();
    return $classInsert->delete([ 'userNumber' => $userNumber, 'end' => $end]);

}
$end = false;
if (isset($_POST['end']))
    $end = true;
$userNumber = $_POST['userNumber'];
echo deleteData($userNumber, $end);


