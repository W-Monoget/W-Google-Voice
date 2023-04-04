<?php
session_start();
require_once("include/dbcontroller.php");

if(isset($_SESSION['user_id'])){
    echo "<script>
                document.cookie = 'alert = 4;';
                window.location.href='/';
                </script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login | Best Google Voice Accounts</title>

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
            <form method="post" action="" id="contact-form">
                <div class="row">
                    <div class="col-lg-6 bg-light mx-auto">
                        <div class="sec-title mb-3">
                            <h2>Login</h2>
                        </div>
                        <!--Contact Form-->
                        <div class="contact-form">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" value=""
                                           placeholder="" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" value=""
                                           placeholder="" required>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03" type="submit"
                                            data-loading-text="Please wait..." name="sub_log">
                                        <span>Login</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php
if (isset($_POST['sub_log'])) {
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $login = $db_handle->numRows("SELECT * FROM user WHERE email='$email' and password='$password'");

    $login_data = $db_handle->runQuery("SELECT * FROM user WHERE email='$email' and password='$password'");

    if ($login == 1) {
        $_SESSION['user_id'] = $login_data[0]["id"];
        $_SESSION['name'] = $login_data[0]["f_name"].' '.$login_data[0]["l_name"];

        ?>
        <script>
            document.cookie = 'alert = 2;';
            window.location.href = "Checkout";
        </script>
    <?php
    }else{
    ?>
        <script>
            document.cookie = 'alert = 3;';
            window.location.href = "Login";
        </script>
        <?php
    }
}
?>


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