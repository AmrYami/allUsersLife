<?php

namespace Classes;

use Includes\connector;

class DeleteData
{
    public function delete(array $array)
    {
        $con = new connector();
        if ($array['end'] != false) {
            $sql = "DELETE FROM life_users WHERE `userNumbser` = '{$array['userNumber']}'";
            $con->iud($sql);
        }
    }
}