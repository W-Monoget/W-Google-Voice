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
    <title>Custom Package Admin | SK Driving School</title>
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
                            Custom Package
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Custom Package</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Custom Package Price and Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="Update">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="custom_package_name"
                                                   placeholder="Name.."
                                                   value="<?php $custom_package = $db_handle->runQuery("SELECT * FROM tblproduct where code='L5K5GH'");
                                                   echo $custom_package[0]["name"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Price</label>
                                            <input type="text" class="form-control" name="custom_package_price"
                                                   placeholder="Price.."
                                                   value="<?php echo $custom_package[0]["price"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Label 1</label>
                                            <input type="text" class="form-control" name="custom_package_label_1"
                                                   placeholder="Label 1..."
                                                   value="<?php echo $custom_package[0]["label_1"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Label 2</label>
                                            <input type="text" class="form-control" name="custom_package_label_2"
                                                   placeholder="Label 2..."
                                                   value="<?php echo $custom_package[0]["label_2"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Label 3</label>
                                            <input type="text" class="form-control" name="custom_package_label_3"
                                                   placeholder="Label 3..."
                                                   value="<?php echo $custom_package[0]["label_3"]; ?>"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Label 4</label>
                                            <input type="text" class="form-control" name="custom_package_label_4"
                                                   placeholder="Label 4..."
                                                   value="<?php echo $custom_package[0]["label_4"]; ?>"/>
                                        </div>
                                    </div>
                                    <button type="submit" name="custom_package_data" class="btn btn-primary">Submit
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