<?php
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {

                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"],'place' => $_GET["place"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

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
                    $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"],'place' => $_GET["place"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

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
<header>

    <div class="container-menu-desktop">
        <div class="top-bar bg-main">
            <div class="container">
                <div class="content-topbar">
                    <div class="left-top-bar">
                        <a href="https://www.facebook.com/skdrivingschoolny" target="_blank"><i class="fa fa-facebook m-l-13" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/sk_driving_school_ny/" target="_blank"><i class="fa fa-instagram m-l-13" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/SkDrivingSchoo2"><i class="fa fa-twitter m-l-13" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin m-l-13" aria-hidden="true"></i></a>
                    </div>
                    <div class="right-top-bar">
                        <span>
                        <i class="icon_phone" aria-hidden="true"></i>
                        <span>(646)-400-0666</span>
                        </span>
                        <span>
                        <i class="icon_pin" aria-hidden="true"></i>
                        <span>69-07 Roosevelt Ave 2nd floor, Woodside, New York 11377</span>
                        </span>
                        <span>
                        <i class="icon_clock" aria-hidden="true"></i>
                        <span>Mon - Sun : 8:00am to 9:00pm</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop">
            <div class="limiter-menu-desktop">

                <a href="Home" class="logo">
                    <img src="images/icons/logo.png" alt="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_1_title'");echo $seo_page_data[0]["seo_title"]; ?>">
                </a>

                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="Home">Home</a>
                        </li>
                        <li>
                            <a href="#">Price</a>
                            <ul class="sub-menu">
                                <li><a href="Glendale-Pricing">Glendale</a></li>
                                <li><a href="Hempsted-Pricing">Hempsted</a></li>
                                <li><a href="Hollis-Pricing">Hollis</a></li>
                                <li><a href="Jamaica-Pricing">Jamaica</a></li>
                                <li><a href="Laurelton-Pricing">Laurelton</a></li>
                                <li><a href="Long-Island-Pricing">Long Island</a></li>
                                <li><a href="Manhattan-Pricing">Manhattan</a></li>
                                <li><a href="Middle-Village-Pricing">Middle Village</a></li>
                                <li><a href="Queens-Village-Pricing">Queens Village</a></li>
                                <li><a href="Rego-Park-Pricing">Rego Park</a></li>
                                <li><a href="Ronkonkoma-Pricing">Ronkonkoma</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Our Packages</a>
                            <ul class="sub-menu">
                                <li><a href="Basic-Package">Basic Package</a></li>
                                <li><a href="Standard-Package">Standard Package</a></li>
                                <li><a href="Custom-Package">Custom Package</a></li>
                                <li>
                                    <a href="#">Individual Package</a>
                                    <ul class="sub-menu">
                                        <li><a href="Driving-Lesson">Driving Lessons</a></li>
                                        <li><a href="5-Hour-Class">5 Hour Class</a></li>
                                        <li><a href="Rush-Road-Test">Rush Road Test</a></li>
                                        <li><a href="Car-For-Road-Test">Car For Road Test</a></li>
                                        <li><a href="Highway-Driving-Lesson">Highway Driving
                                                Lessons</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://plateregistration.com/">Plate Registration</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="Gallery">Gallery</a>
                        </li>
                        <li>
                            <a href="FAQ">Faq</a>
                        </li>
                        <li class="respon-sub-menu">
                            <a href="#">About US</a>
                        </li>
                        <li class="respon-sub-menu">
                            <a href="Contact">Contact US</a>
                        </li>
                        <li class="respon-sub-menu">
                            <a href="Cart"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                            <span style="border-radius: 50%;background: #ccc;color:#664E88;padding: 5px;margin-left: -10px;font-size: 10px;"><?php echo $total_quantity; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap-header-mobile">

        <a href="Home" class="logo-mobile">
            <img src="images/icons/logo.png" alt="<?php $seo_page_data = $db_handle->runQuery("SELECT * FROM seo_data where pagename='home_banner_1_title'");echo $seo_page_data[0]["seo_title"]; ?>">
        </a>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
            <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li class="bo1-b p-t-8 p-b-8">
                <div class="left-top-bar p-l-7">
                    <a href="https://www.facebook.com/skdrivingschoolny" target="_blank"><i class="fa fa-facebook m-l-13" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter m-l-13" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/sk_driving_school_ny/" target="_blank"><i class="fa fa-instagram m-l-13" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-whatsapp m-l-13" aria-hidden="true"></i></a>
                </div>
            </li>
            <li class="right-top-bar bo1-b p-t-8 p-b-8">
                <span>
                <i class="icon_phone" aria-hidden="true"></i>
                <span>(646)-400-0666</span>
                </span>
            </li>
            <li class="right-top-bar bo1-b p-t-8 p-b-8">
                <span>
                <i class="icon_pin" aria-hidden="true"></i>
                <span>69-07 Roosevelt Ave 2nd floor, Woodside, New York 11377</span>
                </span>
            </li>
            <li class="right-top-bar bo1-b p-t-8 p-b-8">
                <span>
                <i class="icon_clock" aria-hidden="true"></i>
                <span>Mon - Sun : 8:00am to 9:00pm</span>
                </span>
            </li>
        </ul>
        <ul class="main-menu-m bg-main">
            <li class="bg-main">
                <a href="Home">Home</a>
            </li>
            <li class="bg-main">
                <a href="#">Price</a>
                <ul class="sub-menu-m">
                    <li><a href="Glendale-Pricing">Glendale</a></li>
                    <li><a href="Hempsted-Pricing">Hempsted</a></li>
                    <li><a href="Hollis-Pricing">Hollis</a></li>
                    <li><a href="Jamaica-Pricing">Jamaica</a></li>
                    <li><a href="Laurelton-Pricing">Laurelton</a></li>
                    <li><a href="Long-Island-Pricing">Long Island</a></li>
                    <li><a href="Manhattan-Pricing">Manhattan</a></li>
                    <li><a href="Middle-Village-Pricing">Middle Village</a></li>
                    <li><a href="Queens-Village-Pricing">Queens Village</a></li>
                    <li><a href="Rego-Park-Pricing">Rego Park</a></li>
                    <li><a href="Ronkonkoma-Pricing">Ronkonkoma</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            <li class="bg-main">
                <a href="#">Our Packages</a>
                <ul class="sub-menu-m">
                    <li><a href="Basic-Package">Basic Package</a></li>
                    <li><a href="Standard-Package">Standard Package</a></li>
                    <li>
                        <a href="#">Individual Package</a>
                        <ul class="sub-menu-m">
                            <li><a href="Driving-Lesson">Driving Lessons</a></li>
                            <li><a href="5-Hour-Class">5 Hour Class</a></li>
                            <li><a href="Rush-Road-Test">Rush Road Test</a></li>
                            <li><a href="Car-For-Road-Test">Car For Road Test</a></li>
                            <li><a href="Highway-Driving-Lesson">Highway Driving
                                    Lessons</a></li>
                        </ul>
                    </li>
                </ul>
                <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            <li class="bg-main">
                <a href="Gallery">Gallery</a>
            </li>
            <li class="bg-main">
                <a href="FAQ">Faq</a>
            </li>
            <li class="bg-main">
                <a href="About">About US</a>
            </li>
            <li class="bg-main">
                <a href="Contact">Contact US</a>
            </li>
            <li class="bg-main text-center">
                <a href="Cart"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                <span style="border-radius: 50%;background: #ffffff;color:#664E88;padding: 5px;margin-left: -10px;font-size: 10px;"><?php echo $total_quantity; ?></span>
            </li>
        </ul>
    </div>
</header>