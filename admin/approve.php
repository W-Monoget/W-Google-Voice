<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
if(isset($_GET['contact_id'])){
    $approve = $db_handle->insertQuery("update contact set approve=2 where id='{$_GET['contact_id']}'");
    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} approve this contact data id:{$_GET['contact_id']}')");
    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Contact-Data';
                </script>";
}
