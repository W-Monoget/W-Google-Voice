<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
if (isset($_GET['id']) && isset($_GET['type'])) {

    $package_sell_data_update = $db_handle->insertQuery("update billing_details set approve=2 where id='{$_GET["id"]}'");

    $package_sell_data = $db_handle->runQuery("SELECT * FROM billing_details where id='{$_GET["id"]}'");

    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} approve this package data id:{$_GET['id']}')");

    $email_to = $package_sell_data[0]["email"];
    $subject = 'Email From Best Google Voice';
    $userName = $package_sell_data[0]["f_name"];
    $l = strtolower($userName);
    $u = ucfirst($l);

    $headers = "From: Google Voice <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <head>
                        <style>
                        .btn {
                            text-decoration:none;
                            padding: 15px 20px;
                            background-color: #664E88;
                            border-radius: 10px;
                            color: white;
                        }

                        .btn:hover {
                            text-decoration:none;
                            padding: 15px 20px;
                            background-color: #501c99;
                            border-radius: 10px;
                            color: white;
                        }
                        </style>
                    </head>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi $u!</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>Your payment successful</p>   
                        
                            <p style='color:black'>Our team is excited to join you on your journey with us!<br>
                                We look forward to speaking with you.<br>
                                If there are any changes to your contact information or availability, please let us know
                                
                            </p>
                            <p style='color:black;font-weight:bold'>We look forward to speaking with you!<br>
                                Best Google Voice Team
                             </p> 
                             <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/contact.png' width='100%' height='auto' alt=''>
                        </div>
                    </body>
                </html>
                ";

    if (mail($email_to, $subject, $messege, $headers)) {
        echo "<script>
                document.cookie = 'alert = 10;';
                window.location.href='Package-Sell-Data';
                </script>";
    }
}
