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
    <title>Contact Data Admin | SK Driving School</title>
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
                            Contact Data
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Contact Data</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Contact Form Data Collection</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>ID No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contact_data = $db_handle->runQuery("SELECT * FROM contact order by approve desc");
                                    $row_count = $db_handle->numRows("SELECT * FROM contact order by id desc");

                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td>#<?php echo $contact_data[$i]["id"]; ?></td>
                                            <td><?php echo $contact_data[$i]["name"]; ?></td>
                                            <td><?php echo $contact_data[$i]["email"]; ?></td>
                                            <td><?php echo $contact_data[$i]["subject"]; ?></td>
                                            <td><?php echo $contact_data[$i]["message"]; ?></td>
                                            <td>
                                                <?php
                                                if ($contact_data[$i]["approve"] == 3) {
                                                    ?>
                                                    <span class="badge light badge-info">Pending</span>
                                                    <?php
                                                } else if ($contact_data[$i]["approve"] == 2) {
                                                    ?>
                                                    <span class="badge light badge-success">Solved</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="badge light badge-danger">Decline</span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php

                                                $datetime = new DateTime($contact_data[$i]["updated_at"]);
                                                $la_time = new DateTimeZone('America/New_York');
                                                $datetime->setTimezone($la_time);

                                                echo $datetime->format('d/m/Y h:i A'); ?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="Approve?contact_id=<?php echo $contact_data[$i]["id"]; ?>" class="btn btn-success shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-check"></i></a>
                                                    <a href="Decline?contact_id=<?php echo $contact_data[$i]["id"]; ?>" class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-times-circle"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
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