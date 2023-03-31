<link rel="icon" type="image/png" href="images/icons/favicon.png"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
      rel="stylesheet">

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">

<link rel="stylesheet" type="text/css" href="vendor/revolution/css/layers.css">
<link rel="stylesheet" type="text/css" href="vendor/revolution/css/navigation.css">
<link rel="stylesheet" type="text/css" href="vendor/revolution/css/settings.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animsition/dist/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/color.css">


<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="admin/public/vendor/toastr/css/toastr.min.css" rel="stylesheet" type="text/css"/>

<style>

    .single-price {
        text-align: center;
        background: #262626;
        transition: .7s;
        margin-top: 20px;
    }

    .single-price h3 {
        font-size: 25px;
        color: #000;
        font-weight: 600;
        text-align: center;
        margin: 0;
        margin-top: -80px;
        font-family: poppins;
        color: #fff;
    }

    .single-price h4 {
        font-size: 48px;
        font-weight: 500;
        color: #fff;
    }

    .single-price h4 span.sup {
        vertical-align: text-top;
        font-size: 25px;
    }

    .deal-top {
        position: relative;
        background: #664E88;
        font-size: 16px;
        text-transform: uppercase;
        padding: 136px 24px 0;
    }

    .deal-bottom {
        padding: 56px 16px 0;
    }

    .deal-bottom ul {
        margin: 0;
        padding: 0;
    }

    .deal-bottom ul li {
        font-size: 16px;
        color: #fff;
        font-weight: 300;
        margin-top: 16px;
        border-top: 1px solid #E4E4E4;
        padding-top: 16px;
        list-style: none;
    }

    .btn-area a {
        display: inline-block;
        font-size: 18px;
        color: #fff;
        background: #664E88;
        padding: 8px 64px;
        margin-top: 32px;
        border-radius: 4px;
        margin-bottom: 40px;
        text-transform: uppercase;
        font-weight: bold;
        text-decoration: none;
    }


    .single-price:hover {
        background: #664E88;
    }

    .single-price:hover .deal-top {
        background: #262626;
    }

    .single-price:hover .deal-top:after {
        border-top: 50px solid #262626;
    }

    .single-price:hover .btn-area a {
        background: #262626;
    }

    /* ignore the code below */


    .link-area {
        position: fixed;
        bottom: 20px;
        left: 20px;
        padding: 15px;
        border-radius: 40px;
        background: tomato;
    }

    .link-area a {
        text-decoration: none;
        color: #fff;
        font-size: 25px;
    }


    .deal-top::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -50px;
        width: 0;
        height: 0;
        border-top: 50px solid #664E88;
        border-left: 160px solid transparent;
        border-right: 130px solid transparent;
    }


    @media (min-width: 991.98px) {
        .deal-top::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -50px;
            width: 0;
            height: 0;
            border-top: 50px solid #664E88;
            border-left: 160px solid transparent;
            border-right: 130px solid transparent;
        }
    }

    @media (min-width: 1200px) {
        .deal-top::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -50px;
            width: 0;
            height: 0;
            border-top: 50px solid #664E88;
            border-left: 175px solid transparent;
            border-right: 183px solid transparent;
        }
    }

    .btn-drive.size1.m-txt1.bg-main.bo-rad-4.trans-03.package.active {
        background: #262626;
    }
</style>

<style>
    .toast-custom {
        background-color: #664E88;
    }
</style>