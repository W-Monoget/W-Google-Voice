<?php
session_start();
require_once("include/dbcontroller.php");
$db_handle = new DBController();
/*if (empty($_SERVER['HTTPS'])) {
    header('Location: ');
    exit;
}*/
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cart | Best Google Voice Accounts</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico"/>

    <?php require_once('include/css.php'); ?>
</head>

<body>
<!-- Header -->
<?php require_once('include/menu.php'); ?>
<!-- Header End -->

<!-- Main-Content Start -->
<div class="main-content">

    <section>
        <img src="images/others/shape1.png" class="img-fluid shape-right" alt="QLOUD">
        <div class="container pt-5 pb-5">
            <div class="row pt-5 pb-5">
                <div class="card col-lg-12 bg-light">
                    <div class="sec-title mt-4">
                        <h2 class="text-center">Your Cart</h2>
                        <a class="btn-danger mb-2" style="padding:10px 30px;float: right;"
                           href="cart.php?action=empty"><span>Clear Cart</span></a>
                        <table class="table mt-4">
                            <?php
                            if (isset($_SESSION["cart_item"])) {
                                ?>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td style="text-align:right;"><strong>Quantity</strong></td>
                                    <td style="text-align:right;"><strong>Unit Price</strong></td>
                                    <td style="text-align:right;"><strong>Price</strong></td>
                                    <td style="text-align:center;"><strong>Remove</strong></td>
                                </tr>
                                <?php
                                $total_quantity_new = 0;
                                $total_price_new = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                    $item_price = $item["quantity"] * $item["price"];
                                    ?>
                                    <tr>
                                        <td><?php echo $item["name"]; ?></td>
                                        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                        <td style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
                                        <td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
                                        <td style="text-align:center;"><a
                                                    href="cart.php?action=remove&code=<?php echo $item["code"]; ?>"
                                                    class="btnRemoveAction"><i class="fa fa-trash text-danger"></i></a></td>
                                    </tr>
                                    <?php
                                    $total_quantity_new += $item["quantity"];
                                    $total_price_new += ($item["price"] * $item["quantity"]);
                                }
                                ?>
                                <tr>
                                    <td style="text-align:right;">Total:</td>
                                    <td style="text-align:right;"><?php echo $total_quantity_new; ?></td>
                                    <td style="text-align:right;" colspan="2">
                                        <strong><?php echo "$ " . number_format($total_price_new, 2); ?></strong></td>
                                    <td></td>
                                </tr>
                                <?php
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center"><strong>You have 0 items in the cart</strong></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <div class="link-btn">
                            <a href="Checkout" class="btn btn-primary mb-3" style="float: right"><span>Proceed to Checkout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Main-Content End -->

<?php require_once('include/footer.php'); ?>

<?php require_once('include/js.php'); ?>
</body>
</html>