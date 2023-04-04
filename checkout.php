<?php
session_start();
require_once("include/dbcontroller.php");

if (!isset($_SESSION["cart_item"])) {
    echo "<script>
            window.location.href='Cart';
        </script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Checkout | Best Google Voice Accounts</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <?php require_once('include/css.php'); ?>
    <style>
        .entry:not(:first-of-type) {
            margin-top: 10px;
        }

        .file-upload .file-upload-select {
            display: block;
            color: #000000;
            cursor: pointer;
            text-align: left;
            background: #ffffff;
            overflow: hidden;
            position: relative;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .file-upload .file-upload-select .file-select-button {
            background: #543879;
            color: #FFFFFF;
            padding: 10px;
            display: inline-block;
        }

        .file-upload .file-upload-select .file-select-name {
            display: inline-block;
            padding: 10px;
        }

        .file-upload .file-upload-select:hover .file-select-button {
            background: #543879;
            color: #ffffff;
            transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
        }

        .file-upload .file-upload-select input[type="file"] {
            display: none;
        }

        .file-upload .file-upload-select-2 {
            display: block;
            color: #000000;
            cursor: pointer;
            text-align: left;
            background: #ffffff;
            overflow: hidden;
            position: relative;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .file-upload .file-upload-select-2 .file-select-button {
            background: #543879;
            color: #FFFFFF;
            padding: 10px;
            display: inline-block;
        }

        .file-upload .file-upload-select-2 .file-select-name-2 {
            display: inline-block;
            padding: 10px;
        }

        .file-upload .file-upload-select-2:hover .file-select-button {
            background: #543879;
            color: #ffffff;
            transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
        }

        .file-upload .file-upload-select-2 input[type="file"] {
            display: none;
        }

        .form-control {
            color: black;
            border: 1px solid black;
        }

        .checkout-logo {
            height: 30px;
        }

    </style>
</head>
<body>
<?php require_once('include/menu.php'); ?>

<div class="main-content">

    <section>
        <img src="images/others/shape1.png" class="img-fluid shape-right" alt="QLOUD">
        <div class="container pt-5">
            <div class="row">
                <form method="post" action="Payment"
                      id="contact-form" enctype="multipart/form-data">
                    <div class="row bg-light">

                        <div class="col-lg-6">
                            <div class="sec-title mb-3">
                                <h2>BILLING DETAILS</h2>
                            </div>
                            <!--Contact Form-->
                            <div class="contact-form">
                                <div class="row">
                                    <?php
                                    $fname = '';
                                    $lname = '';
                                    $email = '';
                                    $address = '';
                                    $country = '';
                                    $city = '';
                                    $zip_code = '';
                                    $phone_number = '';
                                    if (isset($_SESSION['user_id'])) {
                                        $login_data = $db_handle->runQuery("SELECT * FROM user WHERE id={$_SESSION['user_id']}");
                                        $fname = $login_data[0]["f_name"];
                                        $lname = $login_data[0]["l_name"];
                                        $email = $login_data[0]["email"];
                                        $address = $login_data[0]["address"];
                                        $country = $login_data[0]["country"];
                                        $city = $login_data[0]["city"];
                                        $zip_code = $login_data[0]["zip_code"];
                                        $phone_number = $login_data[0]["phone_number"];
                                    }
                                    ?>
                                    <div class="form-group col-md-6">
                                        <label>First name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="f_name"
                                               value="<?php echo $fname; ?>"
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="l_name"
                                               value="<?php echo $lname; ?>"
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Company name (optional)</label>
                                        <input type="text" class="form-control" name="company_name" value=""
                                               placeholder="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Country / Region <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country" required>
                                            <?php
                                            if (isset($_SESSION['user_id'])) {
                                                ?>
                                                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                                <?php
                                            }
                                            ?>
                                            <option>Please Select</option>
                                            <option value="Canada">Canada</option>
                                            <option value="China">China</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                            <option value="United States (US)">United States (US)</option>
                                            <option value="Vietnam">Vietnam</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Street address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address"
                                               value="<?php echo $address; ?>"
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Town / City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" value="<?php echo $city; ?>"
                                               placeholder=""
                                               required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>County (optional)</label>
                                        <input type="text" class="form-control" name="county" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Postcode <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="zip_code"
                                               value="<?php echo $zip_code; ?>"
                                               placeholder="" maxlength="5"
                                               minlength="5" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone_number"
                                               value="<?php echo $phone_number; ?>"
                                               placeholder="" maxlength="10"
                                               minlength="10" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Email address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="email"
                                               value="<?php echo $email; ?>"
                                               placeholder="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-lg-6 bg-light">
                            <div class="sec-title mt-3">
                                <h2>YOUR ORDER</h2>
                                <table class="table mt-4">
                                    <tr>
                                        <td><strong>PRODUCT</strong></td>
                                        <td class="text-right"><strong>SUBTOTAL</strong></td>
                                    </tr>


                                    <?php
                                    if (isset($_SESSION["cart_item"])) {
                                        $total_quantity_new = 0;
                                        $total_price_new = 0;
                                        foreach ($_SESSION["cart_item"] as $item) {
                                            $item_price = $item["quantity"] * $item["price"];
                                            ?>
                                            <tr>
                                                <td><?php echo $item["name"]; ?> × <?php echo $item["quantity"]; ?></td>
                                                <td class="text-right"><?php echo "$ " . number_format($item_price, 2); ?></td>
                                            </tr>

                                            <?php
                                            $total_quantity_new += $item["quantity"];
                                            $total_price_new += ($item["price"] * $item["quantity"]);
                                        }
                                        ?>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td class="text-right"><?php echo "$ " . number_format($total_price_new, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-right"><?php echo "$ " . number_format($total_price_new, 2); ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <!--Contact Form-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend mr-1">
                                            <div class="input-group-text">
                                                <input type="radio" name="checkout"
                                                       aria-label="Radio button for following text input" value="btc"
                                                       checked onclick="checkoutFunction(this.value);"
                                                       style="height: 20px">
                                            </div>
                                        </div>
                                        <img src="images/checkout/1.png" class="img-fluid checkout-logo" alt=""/>
                                        <label class="font-weight-bold pl-2" style="font-size: 20px">BTC</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend mr-1">
                                            <div class="input-group-text">
                                                <input type="radio" name="checkout"
                                                       aria-label="Radio button for following text input" value="usdt"
                                                       onclick="checkoutFunction(this.value);" style="height: 20px">
                                            </div>
                                        </div>
                                        <img src="images/checkout/2.png" class="img-fluid checkout-logo" alt=""/>
                                        <label class="font-weight-bold pl-2" style="font-size: 20px">USDT</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend mr-1">
                                            <div class="input-group-text">
                                                <input type="radio" name="checkout"
                                                       aria-label="Radio button for following text input" value="ltc"
                                                       onclick="checkoutFunction(this.value);" style="height: 20px">
                                            </div>
                                        </div>
                                        <img src="images/checkout/3.png" class="img-fluid checkout-logo" alt=""/>
                                        <label class="font-weight-bold pl-2" style="font-size: 20px">LTC</label>
                                    </div>
                                </div>
                            </div>
                            <?php $custom_package = $db_handle->runQuery("SELECT * FROM contact where id=1"); ?>
                            <div class="contact-form" id="btc">
                                <h3>BTC</h3>
                                <div class="row">
                                    <div class="col-9">
                                        <p>Please pay in this address <span class="text-primary"
                                                                            id="btc_address"><?php echo $custom_package[0]["btc_address"]; ?></span>
                                            from your
                                            wallet and share transaction screenshot for approve your order.</p>
                                    </div>
                                    <div class="col-3">
                                        <img src="<?php echo $custom_package[0]["btc_qr"]; ?>" class="img-fluid"
                                             alt=""/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Transaction Number <i class="text-danger">*</i></label>
                                        <input class="form-control btc-class" type="text"
                                               name="transaction_num_btc"
                                               placeholder="">
                                    </div>
                                    <div class="file-upload form-group col-md-12">
                                        <label>Payment Proof <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input btc-class"
                                                       id="inputGroupFile04" name="payment_proof_btc"
                                                       aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>
                                        </div>


                                        <?php if (!isset($_SESSION['user_id'])) {
                                            ?>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input btc-class" name="btc_login"
                                                       type="checkbox" value=""
                                                       id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Save information for login
                                                </label>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                                data-loading-text="Please wait..." name="btc_submit">
                                            <span>Place Order</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form" id="usdt" style="display: none;">
                                <h3>USDT(trc20)</h3>
                                <div class="row">
                                    <div class="col-9">
                                        <p>Please pay in this address <span class="text-primary"
                                                                            id="usdt_address"><?php echo $custom_package[0]["usdt_address"]; ?></span>
                                            from your
                                            wallet and share transaction screenshot for approve your order.</p>
                                    </div>
                                    <div class="col-3">
                                        <img src="<?php echo $custom_package[0]["usdt_qr"]; ?>" class="img-fluid"
                                             alt=""/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Transaction Number <i class="text-danger">*</i></label>
                                        <input class="form-control usdt-class" type="text"
                                               name="transaction_num_usdt"
                                               placeholder="">
                                    </div>
                                    <div class="file-upload form-group col-md-12">
                                        <label>Payment Proof <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input usdt-class"
                                                       id="inputGroupFile04" name="payment_proof_usdt"
                                                       aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        <?php if (!isset($_SESSION['user_id'])) {
                                            ?>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input usdt-class" name="usdt_login"
                                                       type="checkbox"
                                                       value=""
                                                       id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Save information for login
                                                </label>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                                data-loading-text="Please wait..." name="usdt_submit">
                                            <span>Place Order</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form" id="ltc" style="display: none;">
                                <h3>LTC</h3>
                                <div class="row">
                                    <div class="col-9">
                                        <p>Please pay in address <span class="text-primary"
                                                                       id="ltc_address"><?php echo $custom_package[0]["ltc_address"]; ?></span>
                                            from your wallet and share transaction screenshot for approve your order.
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <img src="<?php echo $custom_package[0]["ltc_qr"]; ?>" class="img-fluid"
                                             alt=""/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Transaction Number <i class="text-danger">*</i></label>
                                        <input class="form-control ltc-class" type="text" name="transaction_num_ltc"
                                               placeholder="">
                                    </div>
                                    <div class="file-upload form-group col-md-12">
                                        <label>Payment Proof <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input ltc-class"
                                                       id="inputGroupFile04" name="payment_proof_ltc"
                                                       aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        <?php if (!isset($_SESSION['user_id'])) {
                                            ?>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input ltc-class" name="ltc_login"
                                                       type="checkbox"
                                                       value=""
                                                       id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Save information for login
                                                </label>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                                data-loading-text="Please wait..." name="ltc_submit">
                                            <span>Place Order</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once('include/footer.php'); ?>

<?php require_once('include/js.php'); ?>
<script>

    function checkoutFunction(value) {
        if (value == "btc") {
            document.getElementById("btc").style.display = "block";
            document.getElementById("usdt").style.display = "none";
            document.getElementById("ltc").style.display = "none";
            $(".btc-class").attr('required', '');
            $(".usdt-class").removeAttr('required');
            $(".ltc-class").removeAttr('required');
        } else if (value == "usdt") {
            document.getElementById("btc").style.display = "none";
            document.getElementById("usdt").style.display = "block";
            document.getElementById("ltc").style.display = "none";
            $(".btc-class").removeAttr('required');
            $(".usdt-class").attr('required', '');
            $(".ltc-class").removeAttr('required');
        } else if (value == "ltc") {
            document.getElementById("btc").style.display = "none";
            document.getElementById("usdt").style.display = "none";
            document.getElementById("ltc").style.display = "block";
            $(".btc-class").removeAttr('required');
            $(".usdt-class").removeAttr('required');
            $(".ltc-class").attr('required', '');
        }
    }
</script>
</body>
</html>