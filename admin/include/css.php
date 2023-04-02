<?php
if(!isset($_SESSION["name"])){
    echo "<script>
                window.location.href='Login';
                </script>";
}
?>
<link rel="icon" type="image/png" href="../images/favicon.ico"/>
<link href="public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
<link href="public/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="public/css/style.css" rel="stylesheet" type="text/css"/>
<link href="public/vendor/chartist/css/chartist.min.css" rel="stylesheet" type="text/css"/>
<link href="public/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
<link href="public/vendor/toastr/css/toastr.min.css" rel="stylesheet" type="text/css"/>
<style>
    .toast-success {
        background-color: #664E88;
    }


     .toast-error {
         background-color: #b50000;
     }
</style>