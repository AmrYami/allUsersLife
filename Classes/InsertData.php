<?php

namespace Classes;

use Includes\connector;

class InsertData
{
    public function add(array $array)
    {
        $con = new connector();
        $sql = "SELECT `id`,`start_session` , `end_session` FROM `users` WHERE `userNumbser` = '{$array['userNumber']}'";
        $data = $con->select($sql);
        if (count($data)) {
            $now = date('Y/m/d H:i:s');
            $data = $data[0];
            if ($data['start_session'] && $data['end_session']) {
                if ((time() - strtotime($data['end_session'])) / 60 > 10) {
                    $sql = "UPDATE users SET `start_session`='{$now}', `end_session`=NULL WHERE `userNumbser` = '{$array['userNumber']}'";
                } else {
                    $sql = "UPDATE users SET `end_session`='{$now}' WHERE `userNumbser` = '{$array['userNumber']}'";
                }
            } elseif ($data['start_session'] && ($data['end_session'] == null || $data['end_session'] == '')) {
                if ((time() - strtotime($data['start_session'])) / 60 > 10){
                    $sql = "UPDATE users SET `start_session`='{$now}' WHERE `userNumbser` = '{$array['userNumber']}'";
                }else{
                    $sql = "UPDATE users SET `end_session`='{$now}' WHERE `userNumbser` = '{$array['userNumber']}'";
                }
            }
        } else {
            $now = date('Y/m/d H:i:s');
            $sql = "INSERT INTO users (`userNumbser`, `start_session`)
        VALUES ('{$array['userNumber']}',  '{$now}')";
        }
        $res = $con->iud($sql);
    }

}