<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'Includes/config.php';
function addData($userNumber, $end)
{
    $classInsert = new \Classes\InsertData();
//    var_dump($classInsert);
    return $classInsert->add([ 'userNumber' => $userNumber, 'end' => $end]);
//    if (!isset($_COOKIE['user'])) {
//        $cookie_name = 'user';
//        $cookie_value = rand(10000, 9999999999999999);
//        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
//    } else {
////        echo "Cookie '" . $cookie_name . "' is set!<br>";
//        echo "Value is: " . $_COOKIE['user'];
//    }
}
$end = false;
if (isset($_POST['end']))
    $end = true;
$userNumber = $_POST['userNumber'];
echo addData($userNumber, $end);


