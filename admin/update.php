<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
if(isset($_POST['pass_update'])){
    $new_pass = $db_handle->checkValue($_POST['new_pass']);
    $cnfrm_pass= $db_handle->checkValue($_POST['cnfrm_pass']);
    $old_pass = $db_handle->checkValue($_POST['old_pass']);

    if($new_pass==$cnfrm_pass){
        $update= $db_handle->insertQuery("update admin_login set password='$new_pass' where id='{$_SESSION['user_id']}' and password='$old_pass'");

        $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} change his password')");


        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Change-Password';
                </script>";
    }
}

if(isset($_POST['edit_product_data'])){
    $product_id=$db_handle->checkValue($_POST['product_id']);

    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} update package data id={$product_id}')");

    $package_name = $db_handle->checkValue($_POST['package_name']);
    $package_price = $db_handle->checkValue($_POST['package_price']);
    $package_label_1 = $db_handle->checkValue($_POST['package_label_1']);
    $package_label_2 = $db_handle->checkValue($_POST['package_label_2']);
    $package_label_3 = $db_handle->checkValue($_POST['package_label_3']);
    $package_label_4 = $db_handle->checkValue($_POST['package_label_4']);

    $update= $db_handle->insertQuery("update tblproduct set name='$package_name',
                      price='$package_price',
                      label_1='$package_label_1',
                      label_2='$package_label_2',
                      label_3='$package_label_3',
                      label_4='$package_label_4' where id='$product_id'");

    echo "<script>
            document.cookie = 'alert = 1;';
            window.location.href='Product-Data';
            </script>";

}