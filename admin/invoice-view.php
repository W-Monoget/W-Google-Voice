<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
if (isset($_POST["id"])) {
    $package_sell_data = $db_handle->runQuery("SELECT * FROM billing_details where id='{$_POST["id"]}'");
    ?>
    <div class="card mt-3">
        <div class="card-header"> Invoice - #<?php echo $package_sell_data[0]["id"]; ?><strong>(<?php echo $package_sell_data[0]["payment_type"]; ?>)</strong>
            <strong>
                <?php

                $datetime = new DateTime($package_sell_data[0]["updated_at"]);
                $la_time = new DateTimeZone('America/New_York');
                $datetime->setTimezone($la_time);

                echo $datetime->format('d/m/Y h:i A'); ?>
            </strong>
            <span class="float-right">
                                <strong>Status:</strong>
            <?php
            if ($package_sell_data[0]["approve"] == 3) {
                ?>
                <span class="badge light badge-info">Pending</span>
                <?php
            } else if ($package_sell_data[0]["approve"] == 2) {
                ?>
                <span class="badge light badge-success">Approve</span>
                <?php
            } else {
                ?>
                <span class="badge light badge-danger">Decline</span>
                <?php
            }
            ?>
        </span>

        </div>
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-lg-6 mt-4">
                    <h6>From:</h6>
                    <div>
                        <strong><?php echo $package_sell_data[0]["f_name"]; ?> <?php echo $package_sell_data[0]["l_name"]; ?></strong>
                    </div>
                    <?php if ($package_sell_data[0]["id_name"] != "Please Select") {
                        ?>
                        <div><?php echo $package_sell_data[0]["id_name"]; ?>
                            - <?php echo $package_sell_data[0]["id_value"]; ?></div>
                        <?php
                    }
                    ?>
                    <div><?php echo $package_sell_data[0]["address"]; ?>, <?php echo $package_sell_data[0]["city"]; ?>,
                        NY <?php echo $package_sell_data[0]["zip_code"]; ?></div>
                    <div>Email: <?php echo $package_sell_data[0]["email"]; ?></div>
                    <div>Phone:
                        (<?php echo substr($package_sell_data[0]["phone_number"], 0, 3) . ')' . substr($package_sell_data[0]["phone_number"], 3, 3) . '-' . substr($package_sell_data[0]["phone_number"], 6, 4); ?></div>
                    <div><?php
                        if ($package_sell_data[0]["preferred_schedule"] != '') {
                            echo 'Schedule: <br/>';
                            $sb = explode(',', $package_sell_data[0]["preferred_schedule"]);
                            foreach ($sb as $bb) {
                                $timestamp = strtotime($bb);
                                $day = date('m/d/Y', $timestamp);
                                $time = date('h:i A', $timestamp);
                                echo $day . ' ' . $time . ' (PLC)<br>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="mt-4 col-lg-6 text-right">
                    <div class="row">
                        <div class="col-lg-12"><img
                                    src="../images/icons/logo-02.png"
                                    class="img-fluid mb-3 height30" alt=""><br>
                            <span>Total amount: <strong>
                                <?php
                                $total_amount = $db_handle->runQuery("SELECT sum(product_total_price) as total_price FROM invoice_details where billing_id='{$package_sell_data[0]["id"]}'");
                                echo '$' . $total_amount[0]["total_price"];
                                ?>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="mt-4 col-lg-6 text-left">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if ($package_sell_data[0]["attach_files"] != '') { ?>
                                <img
                                        src="../<?php echo $package_sell_data[0]["transaction_image"]; ?>"
                                        class="img-fluid mb-3" alt="">
                            <?php } ?>
                        </div>
                        <div class="col-lg-12">
                            <?php
                            if ($package_sell_data[0]["transaction_number"] != '') { ?>
                                <?php echo '<strong>Transaction-Number:</strong>'.$package_sell_data[0]["transaction_number"]; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Product</th>
                        <th>Place</th>
                        <th class="text-right">Unit Cost</th>
                        <th class="text-center">Qty</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_product = $db_handle->runQuery("SELECT * FROM invoice_details where billing_id='{$package_sell_data[0]["id"]}'");
                    $row_count = $db_handle->numRows("SELECT * FROM invoice_details where billing_id='{$package_sell_data[0]["id"]}'");

                    for ($i = 0; $i < $row_count; $i++) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i + 1; ?></td>
                            <td class="strong"><?php echo $all_product[$i]["product_name"]; ?></td>
                            <td><?php echo $all_product[$i]["place"]; ?></td>
                            <td class="text-right"><?php echo '$' . $all_product[$i]["product_unit_price"]; ?></td>
                            <td class="text-center"><?php echo $all_product[$i]["product_quantity"]; ?></td>
                            <td class="text-right"><?php echo '$' . $all_product[$i]["product_total_price"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5"></div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left"><strong>Subtotal</strong></td>
                            <td class="text-right">
                                <?php
                                $total_amount = $db_handle->runQuery("SELECT sum(product_total_price) as total_price FROM invoice_details where billing_id='{$package_sell_data[0]["id"]}'");
                                echo '$' . $total_amount[0]["total_price"];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="left"><strong>Total</strong></td>
                            <td class="text-right"><strong><?php
                                    $total_amount = $db_handle->runQuery("SELECT sum(product_total_price) as total_price FROM invoice_details where billing_id='{$package_sell_data[0]["id"]}'");
                                    echo '$' . $total_amount[0]["total_price"];
                                    ?></strong>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>