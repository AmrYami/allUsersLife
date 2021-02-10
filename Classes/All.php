<?php

namespace Classes;

use Includes\connector;

class All
{
    public function AllData()
    {
        $con = new connector();
        $sql = "SELECT `id`,`start_session` , `end_session` FROM `users` WHERE end_session > NOW() - INTERVAL 10 MINUTE";
        $data = $con->select($sql);

        $totalTime = 0;
        if ($data && count($data)) {
            foreach ($data as $val) {
                $resultTimeInMinutes = $minutes = (strtotime($val['end_session']) - strtotime($val['start_session'])) / 60;
                $totalTime += $resultTimeInMinutes ;
            }
        }
//        if ($totalTime)
            return 'total in Minutes: ' .$totalTime ?? 0;
//        return 'something went error';
    }
}