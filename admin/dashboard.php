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
    <title>Dashboard Admin | SK Driving School</title>
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
        <a href="Dashboard" class="brand-logo">
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
                            Dashboard
                        </div>
                    </div>
                    <?php require_once('include/header.php'); ?>
                </div>
            </nav>
        </div>
    </div>

    <?php require_once('include/navbar.php'); ?>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xxl-4">
                    <div class="widget-stat card bg-danger">
                        <div class="card-body  p-4">
                            <div class="media">
                                <span class="mr-3">
                                <i class="flaticon-381-calendar-1"></i>
                                </span>
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">Total Number of Packages Sell</p>
                                    <h3 class="text-white">
                                        <?php
                                        $total_quantity = $db_handle->runQuery("SELECT sum(product_quantity) as total_quantity FROM invoice_details as i, billing_details as b where i.billing_id=b.id and b.approve=2");
                                        echo $total_quantity[0]["total_quantity"];
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xxl-4">
                    <div class="widget-stat card bg-success">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="mr-3">
                                <i class="flaticon-381-diamond"></i>
                                </span>
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">Total Sell</p>
                                    <h3 class="text-white">
                                        <?php
                                        $total_amount = $db_handle->runQuery("SELECT sum(product_total_price) as total_price FROM invoice_details as i, billing_details as b where i.billing_id=b.id and b.approve=2");
                                        echo '$' . $total_amount[0]["total_price"];
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xxl-4">
                    <div class="widget-stat card bg-info">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="mr-3">
                                <i class="flaticon-381-heart"></i>
                                </span>
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">Total Contact Data</p>
                                    <h3 class="text-white">
                                        <?php
                                        $row_count = $db_handle->numRows("SELECT * FROM contact order by id desc");
                                        echo $row_count;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xxl-4">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="mr-3">
                                <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">Total Newsletter Subscription</p>
                                    <h3 class="text-white"><?php
                                        $row_count = $db_handle->numRows("SELECT * FROM newsletter order by id desc");
                                        echo $row_count;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Monthly Sell Chart</h4>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="barChart_1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <?php echo date("F"); ?> Daily Chart (Total Sell this Month
                                <?php
                                $month = (int)date("m");
                                $day_name = $db_handle->runQuery("SELECT sum(product_total_price) as price FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month");
                                echo '$'.(int)$day_name[0]['price'];
                                ?>
                                )
                            </h4>
                        </div>
                        <div class="card-body">
                            <canvas id="barChart_3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('include/footer.php'); ?>

</div>

<?php require_once('include/js.php'); ?>
<script>
    (function ($) {
        let dzSparkLine = function () {
            let draw = Chart.controllers.line.__super__.draw;
            let screenWidth = $(window).width();
            let barChart1 = function () {
                if (jQuery('#barChart_1').length > 0) {
                    const barChart_1 = document.getElementById("barChart_1").getContext('2d');
                    const barChart_1gradientStroke = barChart_1.createLinearGradient(50, 100, 50, 50);
                    barChart_1gradientStroke.addColorStop(0, "rgba(19, 180, 151, 1)");
                    barChart_1gradientStroke.addColorStop(1, "rgba(19, 180, 151, 0.5)");
                    const barChart_1gradientStroke2 = barChart_1.createLinearGradient(50, 100, 50, 50);
                    barChart_1gradientStroke2.addColorStop(0, "rgba(43, 193, 85, 1)");
                    barChart_1gradientStroke2.addColorStop(1, "rgba(43, 193, 85, 1)");
                    const barChart_1gradientStroke3 = barChart_1.createLinearGradient(50, 100, 50, 50);
                    barChart_1gradientStroke3.addColorStop(0, "rgba(58,43,193,1)");
                    barChart_1gradientStroke3.addColorStop(1, "rgba(58,43,193,1)");
                    barChart_1.height = 100;
                    let barChartData1 = {
                        defaultFontFamily: 'Poppins',
                        labels: [<?php
                            $month_name = $db_handle->runQuery("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");
                            $row_count = $db_handle->numRows("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");

                            $date = '';
                            for ($i = 0; $i < $row_count; $i++) {
                                $monthNum = $month_name[$i]["month_name"];
                                $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));
                                $date .= '"' . $monthName . '", ';
                            }
                            echo substr($date, 0, -2);
                            ?>],
                        datasets: [{
                            label: 'Total Sell',
                            backgroundColor: barChart_1gradientStroke,
                            hoverBackgroundColor: barChart_1gradientStroke,
                            data: [<?php
                                $month_name = $db_handle->runQuery("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");
                                $row_count = $db_handle->numRows("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");

                                $all_price = '';
                                for ($i = 0; $i < $row_count; $i++) {
                                    $price = (int)$month_name[$i]["price"];
                                    $all_price .= '' . $price . ', ';
                                }
                                echo substr($all_price, 0, -2);
                                ?>]
                        }, {
                            label: 'Package Quantity',
                            backgroundColor: barChart_1gradientStroke2,
                            hoverBackgroundColor: barChart_1gradientStroke2,
                            data: [<?php
                                $month_name = $db_handle->runQuery("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");
                                $row_count = $db_handle->numRows("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");

                                $all_price = '';
                                for ($i = 0; $i < $row_count; $i++) {
                                    $price = (int)$month_name[$i]["qty"];
                                    $all_price .= '' . $price . ', ';
                                }
                                echo substr($all_price, 0, -2);
                                ?>]
                        }, {
                            label: 'Person Quantity',
                            backgroundColor: barChart_1gradientStroke3,
                            hoverBackgroundColor: barChart_1gradientStroke3,
                            data: [<?php
                                $month_name = $db_handle->runQuery("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");
                                $row_count = $db_handle->numRows("SELECT MONTH(b.updated_at) as month_name, sum(product_total_price) as price FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 group by MONTH(b.updated_at);");

                                $all_price = '';
                                for ($i = 0; $i < $row_count; $i++) {
                                    $price = (int)$month_name[$i]["person"];
                                    $all_price .= '' . $price . ', ';
                                }
                                echo substr($all_price, 0, -2);
                                ?>]
                        }]
                    };
                    new Chart(barChart_1, {
                        type: 'bar',
                        data: barChartData1,
                        options: {
                            legend: {display: false},
                            title: {display: false},
                            tooltips: {mode: 'index', intersect: false},
                            responsive: true,
                            scales: {xAxes: [{stacked: true,}], yAxes: [{stacked: true}]}
                        }
                    });
                }
            }
            let barChart3 = function () {
                if (jQuery('#barChart_3').length > 0) {
                    const barChart_3 = document.getElementById("barChart_3").getContext('2d');
                    const barChart_3gradientStroke = barChart_3.createLinearGradient(50, 100, 50, 50);
                    barChart_3gradientStroke.addColorStop(0, "rgba(19, 180, 151, 1)");
                    barChart_3gradientStroke.addColorStop(1, "rgba(19, 180, 151, 0.5)");
                    const barChart_3gradientStroke2 = barChart_3.createLinearGradient(50, 100, 50, 50);
                    barChart_3gradientStroke2.addColorStop(0, "rgba(43, 193, 85, 1)");
                    barChart_3gradientStroke2.addColorStop(1, "rgba(43, 193, 85, 1)");
                    const barChart_3gradientStroke3 = barChart_3.createLinearGradient(50, 100, 50, 50);
                    barChart_3gradientStroke3.addColorStop(0, "rgba(58,43,193,1)");
                    barChart_3gradientStroke3.addColorStop(1, "rgba(58,43,193,1)");
                    barChart_3.height = 100;
                    let barChartData = {
                        defaultFontFamily: 'Poppins',
                        labels: [<?php
                            $month = (int)date("m");
                            $day_name = $db_handle->runQuery("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                            $row_count = $db_handle->numRows("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                            $date = '';
                            for ($i = 0; $i < $row_count; $i++) {
                                $dayNum = $day_name[$i]["day_name"];
                                $date .= '"' . $dayNum . '", ';
                            }
                            echo substr($date, 0, -2);
                            ?>],
                        datasets: [{
                            label: 'Sell',
                            backgroundColor: barChart_3gradientStroke,
                            hoverBackgroundColor: barChart_3gradientStroke,
                            data: [<?php
                                $day_name = $db_handle->runQuery("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                                $row_count = $db_handle->numRows("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                                $date = '';
                                for ($i = 0; $i < $row_count; $i++) {
                                    $dayNum = $day_name[$i]["price"];
                                    $date .= '"' . $dayNum . '", ';
                                }
                                echo substr($date, 0, -2);
                                ?>]
                        }, {
                            label: 'Package Quantity',
                            backgroundColor: barChart_3gradientStroke2,
                            hoverBackgroundColor: barChart_3gradientStroke2,
                            data: [<?php
                                $day_name = $db_handle->runQuery("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                                $row_count = $db_handle->numRows("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                                $date = '';
                                for ($i = 0; $i < $row_count; $i++) {
                                    $dayNum = $day_name[$i]["qty"];
                                    $date .= '"' . $dayNum . '", ';
                                }
                                echo substr($date, 0, -2);
                                ?>]
                        }, {
                            label: 'Person Quantity',
                            backgroundColor: barChart_3gradientStroke3,
                            hoverBackgroundColor: barChart_3gradientStroke3,
                            data: [<?php
                                $day_name = $db_handle->runQuery("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                                $row_count = $db_handle->numRows("SELECT DAY(b.updated_at) as day_name, sum(product_total_price) as price, sum(product_quantity) as qty,count(b.id) as person FROM `billing_details` as b,`invoice_details` as i WHERE i.billing_id=b.id and b.approve=2 and MONTH(b.updated_at)=$month group by DAY(b.updated_at);");
                                $date = '';
                                for ($i = 0; $i < $row_count; $i++) {
                                    $dayNum = $day_name[$i]["person"];
                                    $date .= '"' . $dayNum . '", ';
                                }
                                echo substr($date, 0, -2);
                                ?>]
                        }]
                    };
                    new Chart(barChart_3, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            legend: {display: false},
                            title: {display: false},
                            tooltips: {mode: 'index', intersect: false},
                            responsive: true,
                            scales: {xAxes: [{stacked: true,}], yAxes: [{stacked: true}]}
                        }
                    });
                }
            }
            return {
                init: function () {
                }, load: function () {
                    barChart1();
                    barChart3();
                }, resize: function () {
                    barChart1();
                    barChart3();
                }
            }
        }();
        jQuery(document).ready(function () {
        });
        jQuery(window).on('load', function () {
            dzSparkLine.load();
        });
        jQuery(window).on('resize', function () {
            dzSparkLine.resize();
        });
    })(jQuery);
</script>
</body>
</html>