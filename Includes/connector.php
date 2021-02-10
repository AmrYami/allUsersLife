<?php

namespace Includes;

class connector {

    private $connection;

    private function open() {
        $con = new \mysqli(HOSTNAME,USERNAME,PASSWORD,DBNAME);
        if ($con->connect_error)
            die($con->connect_error . '>>' . $con->connect_errno);
        $this->connection = $con;
        mysqli_query($con, "set character_set_server='utf8'");
        mysqli_query($con, "set names 'utf8'");
    }

    private function close() {
        $this->connection->close();
    }

    function iud($sql) {
        $this->open();
        $result = $this->connection->query($sql) or die(mysqli_error($this->connection));
        $this->close();
        return $result;
    }

    function select($sql) {
        $this->open();
        $result = $this->connection->query($sql) or die(mysqli_error($this->connection));
        global $data;
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $data[] = $rows;
            }
        }
        $this->close();
        return $data;
    }

}
