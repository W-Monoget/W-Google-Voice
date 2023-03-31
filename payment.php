<?php
session_start();
require_once("include/dbcontroller.php");
$db_handle = new DBController();

if (isset($_SESSION["cart_item"])&&isset($_POST['btc_submit'])) {

    $f_name = $db_handle->checkValue($_POST['f_name']);
    $l_name = $db_handle->checkValue($_POST['l_name']);
    $company_name = $db_handle->checkValue($_POST['company_name']);

    $country = $db_handle->checkValue($_POST['country']);
    $address = $db_handle->checkValue($_POST['address']);
    $city = $db_handle->checkValue($_POST['city']);
    $county = $db_handle->checkValue($_POST['county']);
    $zip_code = $db_handle->checkValue($_POST['zip_code']);
    $phone_number = $db_handle->checkValue($_POST['phone_number']);
    $email = $db_handle->checkValue($_POST['email']);

    $payment_type = 'BTC';

    $transaction_num_btc = $db_handle->checkValue($_POST['transaction_num_btc']);

    $payment_proof_btc='';
    if (!empty($_FILES['payment_proof_btc']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['payment_proof_btc']['name'];
        $file_size = $_FILES['payment_proof_btc']['size'];
        $file_tmp = $_FILES['payment_proof_btc']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "images/proof/btc/" .$file_name);
            $payment_proof_btc = "images/proof/btc/" . $file_name;
        }
    } else {
        $payment_proof_btc='';
    }


    $billing_insert = $db_handle->insertQuery("INSERT INTO `billing_details`(`f_name`, `l_name`, `email`, `phone_number`,
                              `country`, `address`, `city`, `zip_code`, `payment_type`, `transaction_number`, `transaction_image`) 
                                VALUES('$f_name','$l_name','$email','$phone_number','$country','$address','$city','$zip_code',
                                       '$payment_type','$transaction_num_btc','$payment_proof_btc')");

    $billing_id = $db_handle->runQuery("SELECT * FROM billing_details order by id desc limit 1");

    $id = $billing_id[0]["id"];

    $total_quantity_new = 0;
    $total_price_new = 0;
    foreach ($_SESSION["cart_item"] as $item) {
        $name = $item["name"];
        $item_price = $item["quantity"] * $item["price"];
        $quantity = $item["quantity"];
        $place = $item["place"];
        $unit_price = $item["price"];

        $billing_id = $db_handle->insertQuery("INSERT INTO `invoice_details`(`billing_id`, `product_name`,`place`, `product_quantity`, `product_unit_price`, `product_total_price`) VALUES ('$id','$name','$place','$quantity','$unit_price','$item_price')");
    }
    unset($_SESSION["cart_item"]);


        $email_to = $email;
        $subject = 'Email From Google Voice';
        $userName = $f_name;
        $l = strtolower($userName);
        $u = ucfirst($l);

        $headers = "From: Google Voice <" . $db_handle->from_email() . ">\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi $u!</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>Thank you for purchasing our package</p>   
                        
                            <p style='color:black'>Your payment currently on pending.<br>
                                Our team is excited to join you on your journey with us!<br>
                                We look forward to speaking with you.<br>
                                If there are any changes to your contact information or availability, please let us know by
                            </p>
                            
                            <p style='color:black;font-weight:bold'>We look forward to speaking with you!<br>
                                Google Voice Team
                             </p> 
                             <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/contact.png' width='100%' height='auto' alt=''>
                        </div>
                    </body>
                </html>
                ";

    $notify_messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi Google Voice</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>You have a new order from $u</p>   
                        </div>
                    </body>
                </html>
                ";

        if (mail($email_to, $subject, $messege, $headers)&&mail($db_handle->notify_email(), $subject, $notify_messege, $headers)) {
            echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='/';
                </script>";
        }else{
            echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='/';
                </script>";
        }
}else if (isset($_SESSION["cart_item"])&&isset($_POST['usdt_submit'])) {

    $f_name = $db_handle->checkValue($_POST['f_name']);
    $l_name = $db_handle->checkValue($_POST['l_name']);
    $company_name = $db_handle->checkValue($_POST['company_name']);

    $country = $db_handle->checkValue($_POST['country']);
    $address = $db_handle->checkValue($_POST['address']);
    $city = $db_handle->checkValue($_POST['city']);
    $county = $db_handle->checkValue($_POST['county']);
    $zip_code = $db_handle->checkValue($_POST['zip_code']);
    $phone_number = $db_handle->checkValue($_POST['phone_number']);
    $email = $db_handle->checkValue($_POST['email']);

    $payment_type = 'USDT';

    $transaction_num_usdt = $db_handle->checkValue($_POST['transaction_num_usdt']);

    $payment_proof_usdt='';
    if (!empty($_FILES['payment_proof_usdt']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['payment_proof_usdt']['name'];
        $file_size = $_FILES['payment_proof_usdt']['size'];
        $file_tmp = $_FILES['payment_proof_usdt']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "images/proof/usdt/" .$file_name);
            $payment_proof_usdt = "images/proof/usdt/" . $file_name;
        }
    } else {
        $payment_proof_usdt='';
    }


    $billing_insert = $db_handle->insertQuery("INSERT INTO `billing_details`(`f_name`, `l_name`, `email`, `phone_number`,
                              `country`, `address`, `city`, `zip_code`, `payment_type`, `transaction_number`, `transaction_image`) 
                                VALUES('$f_name','$l_name','$email','$phone_number','$country','$address','$city','$zip_code',
                                       '$payment_type','$transaction_num_usdt','$payment_proof_usdt')");

    $billing_id = $db_handle->runQuery("SELECT * FROM billing_details order by id desc limit 1");

    $id = $billing_id[0]["id"];

    $total_quantity_new = 0;
    $total_price_new = 0;
    foreach ($_SESSION["cart_item"] as $item) {
        $name = $item["name"];
        $item_price = $item["quantity"] * $item["price"];
        $quantity = $item["quantity"];
        $place = $item["place"];
        $unit_price = $item["price"];

        $billing_id = $db_handle->insertQuery("INSERT INTO `invoice_details`(`billing_id`, `product_name`,`place`, `product_quantity`, `product_unit_price`, `product_total_price`) VALUES ('$id','$name','$place','$quantity','$unit_price','$item_price')");
    }
    unset($_SESSION["cart_item"]);


    $email_to = $email;
    $subject = 'Email From Google Voice';
    $userName = $f_name;
    $l = strtolower($userName);
    $u = ucfirst($l);

    $headers = "From: Google Voice <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi $u!</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>Thank you for purchasing our package</p>   
                        
                            <p style='color:black'>Your payment currently on pending.<br>
                                Our team is excited to join you on your journey with us!<br>
                                We look forward to speaking with you.<br>
                                If there are any changes to your contact information or availability, please let us know by
                            </p>
                            
                            <p style='color:black;font-weight:bold'>We look forward to speaking with you!<br>
                                Google Voice Team
                             </p> 
                             <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/contact.png' width='100%' height='auto' alt=''>
                        </div>
                    </body>
                </html>
                ";

    $notify_messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi Google Voice</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>You have a new order from $u</p>   
                        </div>
                    </body>
                </html>
                ";

    if (mail($email_to, $subject, $messege, $headers)&&mail($db_handle->notify_email(), $subject, $notify_messege, $headers)) {
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='/';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='/';
                </script>";
    }
}else if (isset($_SESSION["cart_item"])&&isset($_POST['ltc_submit'])) {
    $f_name = $db_handle->checkValue($_POST['f_name']);
    $l_name = $db_handle->checkValue($_POST['l_name']);
    $company_name = $db_handle->checkValue($_POST['company_name']);

    $country = $db_handle->checkValue($_POST['country']);
    $address = $db_handle->checkValue($_POST['address']);
    $city = $db_handle->checkValue($_POST['city']);
    $county = $db_handle->checkValue($_POST['county']);
    $zip_code = $db_handle->checkValue($_POST['zip_code']);
    $phone_number = $db_handle->checkValue($_POST['phone_number']);
    $email = $db_handle->checkValue($_POST['email']);

    $payment_type = 'LTC';

    $transaction_num_ltc = $db_handle->checkValue($_POST['transaction_num_ltc']);

    $payment_proof_ltc='';
    if (!empty($_FILES['payment_proof_btc']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['payment_proof_ltc']['name'];
        $file_size = $_FILES['payment_proof_ltc']['size'];
        $file_tmp = $_FILES['payment_proof_ltc']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "images/proof/ltc/" .$file_name);
            $payment_proof_ltc = "images/proof/ltc/" . $file_name;
        }
    } else {
        $payment_proof_ltc='';
    }


    $billing_insert = $db_handle->insertQuery("INSERT INTO `billing_details`(`f_name`, `l_name`, `email`, `phone_number`,
                              `country`, `address`, `city`, `zip_code`, `payment_type`, `transaction_number`, `transaction_image`) 
                                VALUES('$f_name','$l_name','$email','$phone_number','$country','$address','$city','$zip_code',
                                       '$payment_type','$transaction_num_ltc','$payment_proof_ltc')");

    $billing_id = $db_handle->runQuery("SELECT * FROM billing_details order by id desc limit 1");

    $id = $billing_id[0]["id"];

    $total_quantity_new = 0;
    $total_price_new = 0;
    foreach ($_SESSION["cart_item"] as $item) {
        $name = $item["name"];
        $item_price = $item["quantity"] * $item["price"];
        $quantity = $item["quantity"];
        $place = $item["place"];
        $unit_price = $item["price"];

        $billing_id = $db_handle->insertQuery("INSERT INTO `invoice_details`(`billing_id`, `product_name`,`place`, `product_quantity`, `product_unit_price`, `product_total_price`) VALUES ('$id','$name','$place','$quantity','$unit_price','$item_price')");
    }
    unset($_SESSION["cart_item"]);


    $email_to = $email;
    $subject = 'Email From Google Voice';
    $userName = $f_name;
    $l = strtolower($userName);
    $u = ucfirst($l);

    $headers = "From: Google Voice <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi $u!</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>Thank you for purchasing our package</p>   
                        
                            <p style='color:black'>Your payment currently on pending.<br>
                                Our team is excited to join you on your journey with us!<br>
                                We look forward to speaking with you.<br>
                                If there are any changes to your contact information or availability, please let us know by
                            </p>
                            
                            <p style='color:black;font-weight:bold'>We look forward to speaking with you!<br>
                                Google Voice Team
                             </p> 
                             <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/contact.png' width='100%' height='auto' alt=''>
                        </div>
                    </body>
                </html>
                ";

    $notify_messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi Google Voice</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>You have a new order from $u</p>   
                        </div>
                    </body>
                </html>
                ";

    if (mail($email_to, $subject, $messege, $headers)&&mail($db_handle->notify_email(), $subject, $notify_messege, $headers)) {
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='/';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='/';
                </script>";
    }
}

