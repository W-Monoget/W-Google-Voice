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

    <title>Checkout | Google Voice Accounts</title>

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

        .form-control{
            color: black;
            border: 1px solid black;
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
                                    <div class="form-group col-md-6">
                                        <label>First name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="f_name" value=""
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="l_name" value=""
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Company name (optional)</label>
                                        <input type="text" class="form-control" name="company_name" value=""
                                               placeholder="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Country / Region <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country">
                                            <option>Please Select</option>
                                            <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                            <option value="United States (US)">United States (US)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Street address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" value=""
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Town / City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" value="" placeholder=""
                                               required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>County (optional)</label>
                                        <input type="text" class="form-control" name="city" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Postcode <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="zip_code" value=""
                                               placeholder="" maxlength="5"
                                               minlength="5" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone_number" value=""
                                               placeholder="" maxlength="10"
                                               minlength="10" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Email address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="email" value=""
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
                                                       aria-label="Radio button for following text input" value="card"
                                                       checked onclick="checkoutFunction(this.value);">
                                            </div>
                                        </div>
                                        <img src="images/checkout/card.png" height="30px"/>
                                        <label class="font-weight-bold">Card</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend mr-1">
                                            <div class="input-group-text">
                                                <input type="radio" name="checkout"
                                                       aria-label="Radio button for following text input" value="paypal"
                                                       onclick="checkoutFunction(this.value);">
                                            </div>
                                        </div>
                                        <img src="images/checkout/paypal.png" height="30px"/>
                                        <label class="font-weight-bold">Paypal</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend mr-1">
                                            <div class="input-group-text">
                                                <input type="radio" name="checkout"
                                                       aria-label="Radio button for following text input" value="zelle"
                                                       onclick="checkoutFunction(this.value);">
                                            </div>
                                        </div>
                                        <img src="images/checkout/zelle.png" height="30px"/>
                                        <label class="font-weight-bold ml-1">Zelle</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend mr-1">
                                            <div class="input-group-text">
                                                <input type="radio" name="checkout"
                                                       aria-label="Radio button for following text input"
                                                       value="cash-app" onclick="checkoutFunction(this.value);">
                                            </div>
                                        </div>
                                        <img src="images/checkout/cash_app.png" height="30px"/>
                                        <label class="font-weight-bold ml-1">Cash-App</label>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form" id="card">
                                <h3>Credit Card (Authorize.net)</h3>
                                <p>Pay with your credit card via Authorize.net</p>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Credit Card Number <i class="text-danger">*</i></label>
                                        <input class="form-control card-class" type="text" name="credit_card_num"
                                               placeholder="1234 1234 1234 1234" maxlength="16"
                                               minlength="16" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Expiration Month <i class="text-danger">*</i></label>
                                        <select name="exp_month" class="form-control card-class" required>
                                            <option>Please Select</option>
                                            <option value="01">01 Jan</option>
                                            <option value="02">02 Feb</option>
                                            <option value="03">03 Mar</option>
                                            <option value="04">04 Apr</option>
                                            <option value="05">05 May</option>
                                            <option value="06">06 Jun</option>
                                            <option value="07">07 Jul</option>
                                            <option value="08">08 Aug</option>
                                            <option value="09">09 Sep</option>
                                            <option value="10">10 Oct</option>
                                            <option value="11">11 Nov</option>
                                            <option value="12">12 Dec</option>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Expiration Year <i class="text-danger">*</i></label>
                                        <select class="form-control card-class" name="exp_year" required>
                                            <option>Please Select</option>
                                            <?php
                                            echo $firstYear = (int)date('Y');
                                            $lastYear = $firstYear + 10;
                                            for ($i = $firstYear; $i <= $lastYear; $i++) {
                                                echo '<option value=' . $i . '>' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>CVV <i class="text-danger">*</i></label>
                                        <input class="form-control card-class" type="text" name="cvv" placeholder="123"
                                               maxlength="3"
                                               minlength="3" required>

                                        <div class="form-check mt-3">
                                            <input class="form-check-input card-class" type="checkbox" value=""
                                                   id="flexCheckChecked" required>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                By Placing Order You accepting our <a href="Terms-and-Condition"
                                                                                      class="text-primary"
                                                                                      target="_blank">terms &
                                                    condition</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                                data-loading-text="Please wait..." name="card_submit">
                                            <span>Place Order</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form" id="paypal" style="display: none;">
                                <h3>Paypal</h3>
                                <p>Please pay in this email <span class="text-primary" id="paypal_mail"
                                                                  onclick="viewInfo(1);">click here</span> for email
                                    from your
                                    wallet and share transaction screenshot for approve your order.</p>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Transaction Number <i class="text-danger">*</i></label>
                                        <input class="form-control paypal-class" type="text"
                                               name="transaction_num_paypal"
                                               placeholder="">
                                    </div>
                                    <div class="file-upload form-group col-md-12">
                                        <label>Payment Proof <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input paypal-class"
                                                       id="inputGroupFile04" name="payment_proof_paypal"
                                                       aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>
                                        </div>

                                        <div class="form-check mt-3">
                                            <input class="form-check-input paypal-class" type="checkbox" value=""
                                                   id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                By Placing Order You accepting our <a href="Terms-and-Condition"
                                                                                      class="text-primary"
                                                                                      target="_blank">terms &
                                                    condition</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                                data-loading-text="Please wait..." name="paypal_submit"><span>Place Order</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form" id="zelle" style="display: none;">
                                <h3>Zelle</h3>
                                <p>Please pay in this phone number <span class="text-primary" id="zelle_number"
                                                                         onclick="viewInfo(2);">click here</span> for
                                    number from your
                                    wallet and share transaction screenshot for approve your order.</p>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Transaction Number <i class="text-danger">*</i></label>
                                        <input class="form-control zelle-class" type="text" name="transaction_num_zelle"
                                               placeholder="">
                                    </div>
                                    <div class="file-upload form-group col-md-12">
                                        <label>Payment Proof <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input zelle-class"
                                                       id="inputGroupFile04" name="payment_proof_zelle"
                                                       aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>
                                        </div>

                                        <div class="form-check mt-3">
                                            <input class="form-check-input zelle-class" type="checkbox" value=""
                                                   id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                By Placing Order You accepting our <a href="Terms-and-Condition"
                                                                                      class="text-primary"
                                                                                      target="_blank">terms &
                                                    condition</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                                data-loading-text="Please wait..." name="zelle_submit">
                                            <span>Place Order</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form" id="cash-app" style="display: none;">
                                <h3>Cash-App</h3>
                                <p>Please pay in this email <span class="text-primary" id="cash_app_mail"
                                                                  onclick="viewInfo(3);">click here</span> for email
                                    from your
                                    wallet and share transaction screenshot for approve your order.</p>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Transaction Number <i class="text-danger">*</i></label>
                                        <input class="form-control cash-app-class" type="text"
                                               name="transaction_num_cash_app"
                                               placeholder="">
                                    </div>
                                    <div class="file-upload form-group col-md-12">
                                        <label>Payment Proof <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input cash-app-class"
                                                       id="inputGroupFile04" name="payment_proof_cash_app"
                                                       aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>
                                        </div>

                                        <div class="form-check mt-3">
                                            <input class="form-check-input cash-app-class" type="checkbox" value=""
                                                   id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                By Placing Order You accepting our <a href="Terms-and-Condition"
                                                                                      class="text-primary"
                                                                                      target="_blank">terms &
                                                    condition</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                                data-loading-text="Please wait..." name="cash_app_submit"><span>Place Order</span>
                                        </button>
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
    $(function () {
        $(document).on('click', '.btn-add', function (e) {
            e.preventDefault();

            var dynaForm = $('.dynamic-wrap:first'),
                currentEntry = $(this).parents('.entry:last'),
                newEntry = $(currentEntry.clone()).appendTo(dynaForm);

            newEntry.find('input').val('');
            dynaForm.find('.entry:not(:first) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('-');
        }).on('click', '.btn-remove', function (e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });

    let fileInput = document.getElementById("file-upload-input");
    let fileSelect = document.getElementsByClassName("file-upload-select")[0];
    fileSelect.onclick = function () {
        fileInput.click();
    }
    fileInput.onchange = function () {
        let filename = fileInput.files.length + ' files';
        let selectName = document.getElementsByClassName("file-select-name")[0];
        selectName.innerText = filename;
    }

    let fileInput_2 = document.getElementById("file-upload-input-2");
    let fileSelect_2 = document.getElementsByClassName("file-upload-select-2")[0];
    fileSelect_2.onclick = function () {
        fileInput_2.click();
    }
    fileInput_2.onchange = function () {
        let filename = fileInput_2.files.length + ' files';
        let selectName = document.getElementsByClassName("file-select-name-2")[0];
        selectName.innerText = filename;
    }


    function checkoutFunction(value) {
        if (value == "card") {
            document.getElementById("card").style.display = "block";
            document.getElementById("paypal").style.display = "none";
            document.getElementById("zelle").style.display = "none";
            document.getElementById("cash-app").style.display = "none";
            $(".card-class").attr('required', '');
            $(".paypal-class").removeAttr('required');
            $(".zelle-class").removeAttr('required');
            $(".cash-app-class").removeAttr('required');
        } else if (value == "paypal") {
            document.getElementById("card").style.display = "none";
            document.getElementById("paypal").style.display = "block";
            document.getElementById("zelle").style.display = "none";
            document.getElementById("cash-app").style.display = "none";
            $(".card-class").removeAttr('required');
            $(".paypal-class").attr('required', '');
            $(".zelle-class").removeAttr('required');
            $(".cash-app-class").removeAttr('required');
        } else if (value == "zelle") {
            document.getElementById("card").style.display = "none";
            document.getElementById("paypal").style.display = "none";
            document.getElementById("zelle").style.display = "block";
            document.getElementById("cash-app").style.display = "none";
            $(".card-class").removeAttr('required');
            $(".paypal-class").removeAttr('required');
            $(".zelle-class").attr('required', '');
            $(".cash-app-class").removeAttr('required');
        } else if (value == "cash-app") {
            document.getElementById("card").style.display = "none";
            document.getElementById("paypal").style.display = "none";
            document.getElementById("zelle").style.display = "none";
            document.getElementById("cash-app").style.display = "block";
            $(".card-class").removeAttr('required');
            $(".paypal-class").removeAttr('required');
            $(".zelle-class").removeAttr('required');
            $(".cash-app-class").attr('required', '');

        }
    }

    function viewInfo(value) {
        if (value == 1) {
            document.getElementById("paypal_mail").innerHTML = "skdrivingschool.nyc@gmail.com";
        } else if (value == 2) {
            document.getElementById("zelle_number").innerHTML = "ZELLE, Name: SK Shaheb, Number: +1 (347) 925-2721";
        } else if (value == 3) {
            document.getElementById("cash_app_mail").innerHTML = "Cash app Email: skdrivingschoolny@gmail.com Name: SK Driving School";
        }
    }

    let is_weekend = function (date1) {
        let dt = new Date(date1);
        if (dt.getDay() == 0) {
            return "sunday";
        }
        return "other";
    }


    function detectWeekend(val) {
        console.log(is_weekend(val));
        let time = document.getElementById('time');
        let weekend = is_weekend(val);

        removeOptions(time);

        time.add(new Option('Choose..'));
        time.selectedIndex = 1;

        if (weekend === 'other') {
            time.add(new Option('09:30 AM'));
            time.add(new Option('03:00 PM'));
        } else {
            time.add(new Option('11:00 AM'));
        }
    }

    function removeOptions(selectElement) {
        let i, L = selectElement.options.length - 1;
        for (i = L; i >= 0; i--) {
            selectElement.remove(i);
        }
    }

    document.getElementById("date").min = new Date().getFullYear() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getDate();

    let today = new Date().toISOString().slice(0, 16);
    document.getElementsByName("preferred_schedule")[0].min = today;
</script>
</body>
</html>