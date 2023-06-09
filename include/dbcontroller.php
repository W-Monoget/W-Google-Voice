<?php
class DBController {
    private $host = "server107";
    private $user = "bestgrcc_bestgvu";
    private $password = "lO~WDvcfU{KA";
    private $database = "bestgrcc_bestgvd";
    private $from_email='noreply@bestgv.com';
    private $notification_email='admin@bestgv.com, seller@bestgv.com';
    private $conn;

    function __construct() {
        if($_SERVER['SERVER_NAME']=="bestgv.com"||$_SERVER['SERVER_NAME']=="www.bestgv.com"){
            $this->host = "server107";
            $this->user = "bestgrcc_bestgvu";
            $this->password = "lO~WDvcfU{KA";
            $this->database = "bestgrcc_bestgvd";
        }

        $this->conn = $this->connectDB();
    }

    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }

    function checkValue($value) {
        $value=mysqli_real_escape_string($this->conn, $value);
        return $value;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function insertQuery($query) {
        $result = mysqli_query($this->conn,$query);
        return $result;
    }

    function from_email(){
        return $this->from_email;
    }

    function numRows($query) {
        $result  = mysqli_query($this->conn,$query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    function notify_email(){
        return $this->notification_email;
    }
}
?>