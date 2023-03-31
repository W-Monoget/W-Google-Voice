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

if(isset($_POST['home_data_update'])){
    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} update seo data')");

    $page_title = $db_handle->checkValue($_POST['page_title']);
    $update= $db_handle->insertQuery("update seo_data set seo_title='$page_title' where pagename='home'");


    $page_description= $db_handle->checkValue($_POST['page_description']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$page_description' where pagename='home'");


    $page_keyword = $db_handle->checkValue($_POST['page_keyword']);
    $update= $db_handle->insertQuery("update seo_data set seo_title='$page_keyword' where pagename='home_banner_1_title'");


    $home_banner_1_title= $db_handle->checkValue($_POST['home_banner_1_title']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_1_title' where pagename='home_banner_1_title'");


    $home_banner_1_caption = $db_handle->checkValue($_POST['home_banner_1_caption']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_1_caption' where pagename='home_banner_1_caption'");


    $home_banner_1_image_alt = $db_handle->checkValue($_POST['home_banner_1_image_alt']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_1_image_alt' where pagename='home_banner_1_image_alt'");


    $home_banner_2_title = $db_handle->checkValue($_POST['home_banner_2_title']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_2_title' where pagename='home_banner_2_title'");


    $home_banner_2_caption = $db_handle->checkValue($_POST['home_banner_2_caption']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_2_caption' where pagename='home_banner_2_caption'");


    $home_banner_2_image_alt = $db_handle->checkValue($_POST['home_banner_2_image_alt']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_2_image_alt' where pagename='home_banner_2_image_alt'");


    $home_banner_3_title = $db_handle->checkValue($_POST['home_banner_3_title']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_3_title' where pagename='home_banner_3_title'");


    $home_banner_3_caption = $db_handle->checkValue($_POST['home_banner_3_caption']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_3_caption' where pagename='home_banner_3_caption'");


    $home_banner_3_image_alt = $db_handle->checkValue($_POST['home_banner_3_image_alt']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_banner_3_image_alt' where pagename='home_banner_3_image_alt'");


    $home_image_section_1 = $db_handle->checkValue($_POST['home_image_section_1']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_image_section_1' where pagename='home_image_section_1'");


    $home_image_section_1_image_alt = $db_handle->checkValue($_POST['home_image_section_1_image_alt']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_image_section_1_image_alt' where pagename='home_image_section_1_image_alt'");


    $home_image_section_2 = $db_handle->checkValue($_POST['home_image_section_2']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_image_section_2' where pagename='home_image_section_2'");


    $home_image_section_2_image_alt = $db_handle->checkValue($_POST['home_image_section_2_image_alt']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_image_section_2_image_alt' where pagename='home_image_section_2_image_alt'");


    $home_image_section_3 = $db_handle->checkValue($_POST['home_image_section_3']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_image_section_3' where pagename='home_image_section_3'");


    $home_image_section_3_image_alt = $db_handle->checkValue($_POST['home_image_section_3_image_alt']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_image_section_3_image_alt' where pagename='home_image_section_3_image_alt'");


    $home_feature_caption_1 = $db_handle->checkValue($_POST['home_feature_caption_1']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_feature_caption_1' where pagename='home_feature_caption_1'");


    $home_feature_caption_2 = $db_handle->checkValue($_POST['home_feature_caption_2']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_feature_caption_2' where pagename='home_feature_caption_2'");


    $home_feature_caption_3 = $db_handle->checkValue($_POST['home_feature_caption_3']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_feature_caption_3' where pagename='home_feature_caption_3'");


    $home_feature_caption_4 = $db_handle->checkValue($_POST['home_feature_caption_4']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$home_feature_caption_4' where pagename='home_feature_caption_4'");


    $footer_caption = $db_handle->checkValue($_POST['footer_caption']);
    $update= $db_handle->insertQuery("update seo_data set seo_description='$footer_caption' where pagename='footer_caption'");


    echo "<script>
            document.cookie = 'alert = 1;';
            window.location.href='Seo-Data';
            </script>";
    
}

if(isset($_POST['custom_package_data'])){
    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} update custom package data')");

    $custom_package_name = $db_handle->checkValue($_POST['custom_package_name']);
    $custom_package_price = $db_handle->checkValue($_POST['custom_package_price']);
    $custom_package_label_1 = $db_handle->checkValue($_POST['custom_package_label_1']);
    $custom_package_label_2 = $db_handle->checkValue($_POST['custom_package_label_2']);
    $custom_package_label_3 = $db_handle->checkValue($_POST['custom_package_label_3']);
    $custom_package_label_4 = $db_handle->checkValue($_POST['custom_package_label_4']);

    $update= $db_handle->insertQuery("update tblproduct set name='$custom_package_name',
                      price='$custom_package_price',
                      label_1='$custom_package_label_1',
                      label_2='$custom_package_label_2',
                      label_3='$custom_package_label_3',
                      label_4='$custom_package_label_4' where code='L5K5GH'");

    echo "<script>
            document.cookie = 'alert = 1;';
            window.location.href='Custom-Package';
            </script>";

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