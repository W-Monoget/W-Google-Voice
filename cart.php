<?php
session_start();
require_once("include/dbcontroller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart | SK Driving School</title>
    <meta charset="UTF-8">
    <meta name="description" content="SK Driving School, New York">
    <meta name="author" content="SK Driving School">
    <meta name="keywords" content="SK Driving School, New York">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once('include/css.php'); ?>

</head>
<body class="animsition restyle-index">
<?php require_once('include/menu.php'); ?>

<section class="bg-img-1 bg-overlay-3 p-t-93 p-b-95" style="background-image: url('images/bg-title-01.jpg');">
    <div class="container">
        <div class="flex-w flex-sb-m">
            <div class="p-t-10 p-b-10 p-r-30">
                <div class="flex-w p-b-9">
                    <span>
                        <a href="Home" class="s-txt19 hov-color-main trans-02">
                            <i class="fa fa-home"></i>
                            Home
                        </a>
                        <span class="s-txt19 p-l-6 p-r-9">/</span>
                    </span>
                    <span>
                        <a href="#" class="s-txt19 hov-color-main trans-02">
                            Cart
                        </a>
                    </span>
                </div>
                <h2 class="m-txt6 respon1">
                    Cart
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="bgwhite p-t-80 p-b-75">
    <div class="container">
        <div class="row">
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
                        <a href="Checkout" class="btn-drive size1 m-txt1 bg-main bo-rad-4 trans-03 mb-3" style="float: right"><span>Proceed to Checkout</span></a>
                    </div>
                </div>
            </div>
    </div>
    </div>
</section>

<!-- Footer Section -->
<?php require_once('include/footer.php'); ?>

<div class="btn-back-to-top hov-bg-main" id="myBtn">
<span class="symbol-btn-back-to-top">
<i class="fa fa-angle-double-up" aria-hidden="true"></i>
</span>
</div>
<?php require_once('include/js.php'); ?>
</body>
</html>