<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
$update = $db_handle->insertQuery("update billing_details set credit_card_num='' where approve!='3'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Product Data Admin | SK Driving School</title>
    <meta name="description" content="Some description for the page"/>
    <?php require_once('include/css.php'); ?>
</head>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">
    <div class="nav-header">
        <a href="dashboard.php" class="brand-logo">
            <img class="logo-abbr" src="public/images/logo_icon.png" alt="">
            <img class="logo-compact" src="public/images/logo_text.png" alt="">
            <img class="brand-title" src="public/images/logo_text.png" alt="">
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Product Data
                        </div>
                    </div>

                    <!--Top Header Common Part Start-->
                    <?php require_once('include/header.php'); ?>
                    <!--Top Header Common Part End-->
                </div>
            </nav>
        </div>
    </div>

    <!--Side nav Start-->
    <?php require_once('include/navbar.php'); ?>
    <!--Side nav end-->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Data</a></li>
                </ol>
            </div>
            <div class="row">
                <?php if (isset($_GET['product_id'])) {
                    ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Product Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="package_name"
                                                       placeholder="Name.."
                                                       value="<?php $custom_package = $db_handle->runQuery("SELECT * FROM tblproduct where id={$_GET['product_id']}");
                                                       echo $custom_package[0]["name"]; ?>" required/>
                                            </div>

                                            <input type="hidden" name="product_id" value="<?php echo $custom_package[0]["id"]; ?>" required/>

                                            <div class="form-group col-md-12">
                                                <label>Price</label>
                                                <input type="text" class="form-control" name="package_price"
                                                       placeholder="Price.."
                                                       value="<?php echo $custom_package[0]["price"]; ?>" required/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Label 1</label>
                                                <input type="text" class="form-control" name="package_label_1"
                                                       placeholder="Label 1..."
                                                       value="<?php echo $custom_package[0]["label_1"]; ?>"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Label 2</label>
                                                <input type="text" class="form-control" name="package_label_2"
                                                       placeholder="Label 2..."
                                                       value="<?php echo $custom_package[0]["label_2"]; ?>"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Label 3</label>
                                                <input type="text" class="form-control" name="package_label_3"
                                                       placeholder="Label 3..."
                                                       value="<?php echo $custom_package[0]["label_3"]; ?>"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Label 4</label>
                                                <input type="text" class="form-control" name="package_label_4"
                                                       placeholder="Label 4..."
                                                       value="<?php echo $custom_package[0]["label_4"]; ?>"/>
                                            </div>
                                        </div>
                                        <button type="submit" name="edit_product_data" class="btn btn-primary">Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>School</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Label 1</th>
                                            <th>Label 2</th>
                                            <th>Label 3</th>
                                            <th>Label 4</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $product_data = $db_handle->runQuery("SELECT * FROM tblproduct order by id asc");
                                        $row_count = $db_handle->numRows("SELECT * FROM tblproduct order by id asc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $i + 1;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($product_data[$i]["id"] <= 13)
                                                        echo 'SK';
                                                    else
                                                        echo 'OTHER';

                                                    ?>
                                                </td>
                                                <td><?php echo $product_data[$i]["name"]; ?></td>
                                                <td><?php echo $product_data[$i]["price"]; ?></td>
                                                <td><?php echo $product_data[$i]["label_1"]; ?></td>
                                                <td><?php echo $product_data[$i]["label_2"]; ?></td>
                                                <td><?php echo $product_data[$i]["label_3"]; ?></td>
                                                <td><?php echo $product_data[$i]["label_4"]; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Product-Data?product_id=<?php echo $product_data[$i]["id"]; ?>"
                                                           class="btn btn-info shadow btn-xs sharp mr-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--footer Start-->
    <?php require_once('include/footer.php'); ?>
    <!--footer End-->
</div>
<?php require_once('include/js.php'); ?>
</body>
</html>

<script>
    async function showInvoice(id) {
        $.ajax({
            type: "POST",
            url: "Invoice-View",
            data: {id: id},
            success: async function (msg) {
                $("#showInvoice").html(msg)
            },
            error: function () {
                alert("failure");
            }
        });
    }
</script>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice Details</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" id="showInvoice">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>