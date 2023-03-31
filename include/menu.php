<?php
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {

                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }

                if(isset($_GET['rush_code'])){
                    $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["rush_code"] . "'");
                    $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

                    if (!empty($_SESSION["cart_item"])) {
                        if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                            foreach ($_SESSION["cart_item"] as $k => $v) {
                                if ($productByCode[0]["code"] == $k) {
                                    if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                echo "<script>
                document.cookie = 'alert = 10;';
                </script>";

            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

$total_quantity = 0;
$total_price = 0;
if (isset($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"] * $item["quantity"]);
    }
}


if (isset($_GET["code"])) {
    $product = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");

    $product_name=$product[0]["name"];
    $product_price=$product[0]["price"];
    $product_label_1=$product[0]["label_1"];
    $product_label_2=$product[0]["label_2"];
    $product_label_3=$product[0]["label_3"];
    $product_label_4=$product[0]["label_4"];
}
?>
<!-- Header -->
<header id="main-header" class="header-main header2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="Home">
                        <img class="img-fluid" src="images/logo-black.png" alt="img">
                    </a>
                    <button class="navbar-toggler white text-white" type="button">
                        <i class="fa fa-shopping-cart pb-1 text-white"></i> &nbsp; Cart
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <h4 class="navbar-nav mr-auto w-100 justify-content-center">
                            PROVIDING HIGH QUALITY PVA & SOCIAL MEDIA SERVICES
                        </h4>
                    </div>
                    <div class="sub-main">
                        <ul>
                            <li class="d-inline">
                                <a href="Cart">
                                    <button class="white">
                                        <i class="fa fa-shopping-cart pb-1 text-white"></i> &nbsp; Cart (<?php echo $total_quantity; ?>)
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->