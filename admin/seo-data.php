<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Seo Data Admin | SK Driving School</title>
    <meta name="description" content="Some description for the page"/>
    <?php require_once('include/css.php'); ?>
</head>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">
    <div class="nav-header">
        <a href="dashboard.php" class="brand-logo">
            <img class="logo-abbr" src="public/images/logo_icon.png" alt="">
            <img class="logo-compact" src="public/images/logo_text.png" alt="">
            <img class="brand-title" src="public/images/logo_text.png" alt="">
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Seo Data
                        </div>
                    </div>

                    <!--Top Header Common Part Start-->
                    <?php require_once('include/header.php'); ?>
                    <!--Top Header Common Part End-->
                </div>
            </nav>
        </div>
    </div>

    <!--Side nav Start-->
    <?php require_once('include/navbar.php'); ?>
    <!--Side nav end-->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Seo Data</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Home Page Meta Description</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="Update">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Page Title</label>
                                            <input type="text" class="form-control" name="page_title"
                                                   placeholder="Title..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home'");
                                                   echo $seo_page_data[0]["seo_title"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" rows="7" name="page_description"
                                                      placeholder="Description..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control" name="page_keyword"
                                                   placeholder="Keyword..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_1_title'");
                                                   echo $seo_page_data[0]["seo_title"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 1 Title</label>
                                            <input type="text" class="form-control" name="home_banner_1_title"
                                                   placeholder="Title..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_1_title'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 1 Caption</label>
                                            <textarea class="form-control" rows="7" name="home_banner_1_caption"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_1_caption'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 1 Image alt</label>
                                            <input type="text" class="form-control" name="home_banner_1_image_alt"
                                                   placeholder="Image alt..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_1_image_alt'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 2 Title</label>
                                            <input type="text" class="form-control" name="home_banner_2_title"
                                                   placeholder="Title..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_2_title'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 2 Caption</label>
                                            <textarea class="form-control" rows="7" name="home_banner_2_caption"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_2_caption'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 2 Image alt</label>
                                            <input type="text" class="form-control" name="home_banner_2_image_alt"
                                                   placeholder="Image alt..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_2_image_alt'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 3 Title</label>
                                            <input type="text" class="form-control" name="home_banner_3_title"
                                                   placeholder="Title..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_3_title'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 3 Caption</label>
                                            <textarea class="form-control" rows="7" name="home_banner_3_caption"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_3_caption'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Banner 3 Image alt</label>
                                            <input type="text" class="form-control" name="home_banner_3_image_alt"
                                                   placeholder="Image alt..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_3_image_alt'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Home Image Section Caption 1</label>
                                            <textarea class="form-control" rows="7" name="home_image_section_1"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_image_section_1'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Home Image Section Image alt 1</label>
                                            <input type="text" class="form-control" name="home_image_section_1_image_alt"
                                                   placeholder="Image alt..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_image_section_1_image_alt'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Home Image Section Caption 2</label>
                                            <textarea class="form-control" rows="7" name="home_image_section_2"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_image_section_2'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Home Image Section Image alt 2</label>
                                            <input type="text" class="form-control" name="home_image_section_2_image_alt"
                                                   placeholder="Image alt..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_image_section_2_image_alt'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Home Image Section Caption 3</label>
                                            <textarea class="form-control" rows="7" name="home_image_section_3"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_image_section_3'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Home Image Section Image alt 3</label>
                                            <input type="text" class="form-control" name="home_image_section_3_image_alt"
                                                   placeholder="Image alt..."
                                                   value="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_image_section_3_image_alt'");
                                                   echo $seo_page_data[0]["seo_description"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Feature Caption 1</label>
                                            <textarea class="form-control" rows="7" name="home_feature_caption_1"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_feature_caption_1'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Feature Caption 2</label>
                                            <textarea class="form-control" rows="7" name="home_feature_caption_2"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_feature_caption_2'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Feature Caption 3</label>
                                            <textarea class="form-control" rows="7" name="home_feature_caption_3"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_feature_caption_3'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Feature Caption 4</label>
                                            <textarea class="form-control" rows="7" name="home_feature_caption_4"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_feature_caption_4'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Footer Section Caption</label>
                                            <textarea class="form-control" rows="7" name="footer_caption"
                                                      placeholder="Caption..."
                                                      spellcheck="false"><?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='footer_caption'");
                                                echo $seo_page_data[0]["seo_description"]; ?></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="home_data_update" class="btn btn-primary">Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--footer Start-->
    <?php require_once('include/footer.php'); ?>
    <!--footer End-->
</div>
<?php require_once('include/js.php'); ?>
</body>
</html>