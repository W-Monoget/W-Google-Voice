<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
$update= $db_handle->insertQuery("update billing_details set credit_card_num='' where approve!='3'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Package Sell Data Admin | SK Driving School</title>
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
                            Package Sell Data
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Package Sell Data</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Fees Collection</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Inv No</th>
                                        <th>Student Name</th>
                                        <th>Number</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Preferred Schedule</th>
                                        <th>Images</th>
                                        <th>Amount</th>
                                        <th>Voucher</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $package_sell_data = $db_handle->runQuery("SELECT * FROM billing_details order by id desc");
                                    $row_count = $db_handle->numRows("SELECT * FROM billing_details order by id desc");

                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td>
                                                Inv#<?php echo $package_sell_data[$i]["id"]; ?><br/>
                                                <?php

                                                $datetime = new DateTime($package_sell_data[$i]["updated_at"]);
                                                $la_time = new DateTimeZone('America/New_York');
                                                $datetime->setTimezone($la_time);

                                                echo $datetime->format('d/m/Y h:i A'); ?>
                                            </td>
                                            <td><?php echo $package_sell_data[$i]["f_name"]; ?> <?php echo $package_sell_data[$i]["l_name"]; ?></td>
                                            <td><?php echo '('.substr($package_sell_data[$i]["phone_number"], 0, 3).')'.substr($package_sell_data[$i]["phone_number"], 3, 3).'-'.substr($package_sell_data[$i]["phone_number"], 6, 4); ?></td>
                                            <td>
                                                <?php
                                                if ($package_sell_data[$i]["approve"] == 3) {
                                                    ?>
                                                    <span class="badge light badge-info">Pending</span>
                                                    <?php
                                                } else if ($package_sell_data[$i]["approve"] == 2) {
                                                    ?>
                                                    <span class="badge light badge-success">Approve</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="badge light badge-danger">Decline</span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $package_sell_data[$i]["address"]; ?></td>
                                            <td><?php
                                                if($package_sell_data[$i]["preferred_schedule"]!=''){
                                                    $sb = explode(',', $package_sell_data[$i]["preferred_schedule"]);
                                                    foreach ($sb as $bb) {
                                                        $timestamp = strtotime($bb);
                                                        $day = date('m/d/Y', $timestamp);
                                                        $time = date('h:i A', $timestamp);
                                                        echo $day.' '.$time.' <br>';
                                                    }
                                                }
                                            ?>
                                            </td>
                                            <td class="text-center">
                                                <?php $sb = explode(',', $package_sell_data[$i]["attach_files"]);
                                                    $k=1;
                                                    foreach ($sb as $bb) {
                                                        if ($bb == '') {
                                                        } 
                                                        else {
                                                 ?>
                                                            <a href="../<?php echo $bb; ?>" target="_blank">image_<?php echo $k; ?></a>
                                                <?php
                                                        }
                                                        $k++;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $total_amount = $db_handle->runQuery("SELECT sum(product_total_price) as total_price FROM invoice_details where billing_id='{$package_sell_data[$i]["id"]}'");
                                                echo '$' . $total_amount[0]["total_price"];
                                                ?>
                                            </td>
                                            <td>
                                                <a href='https://skdrivingschoolny.com/Voucher?voucher=<?php
                                                    echo $package_sell_data[$i]["code"];
                                                ?>' target="_blank"> View Voucher </a>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-secondary shadow btn-xs sharp mr-1"
                                                       data-toggle="modal" data-target=".bd-example-modal-xl"><i
                                                                class="fa fa-eye" onclick="showInvoice(<?php echo $package_sell_data[$i]["id"]; ?>);"></i></button>
                                                    <?php
                                                    if ($package_sell_data[$i]["approve"] == 3) {
                                                        ?>
                                                        <a href="Payment?id=<?php echo $package_sell_data[$i]["id"]; ?>&type=<?php echo $package_sell_data[$i]["payment_type"]; ?>" class="btn btn-success shadow btn-xs sharp mr-1"><i
                                                                    class="fa fa-check"></i></a>
                                                        <a href="Decline?sell_id=<?php echo $package_sell_data[$i]["id"]; ?>" class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        <?php
                                                    }
                                                    ?>
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

<script>
async function showInvoice(id) {
    $.ajax({
            type: "POST",
            url: "Invoice-View",
            data: {id: id},
            success:async function(msg){
                $("#showInvoice").html(msg)
            },
            error: function(){
                alert("failure");
        }
    });
}
</script>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice Details</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" id="showInvoice">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>