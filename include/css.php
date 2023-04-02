<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- REVOLUTION STYLE SHEETS -->
<link rel="stylesheet" href="revslider/css/rs6.css">
<!-- Typography CSS -->
<link rel="stylesheet" href="css/typography.css">
<!-- Style CSS -->
<link rel='stylesheet' href='css/qloud-style.css'/>
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">

<style>
    button {
        width: 150px;
        height: 50px;
        cursor: pointer;
        background: #1d8a3b !important;
        margin: 10px;
        border: none;
        border-radius: 10px;
        box-shadow: -5px -5px 15px #46905b, 5px 5px 15px #1d8a3b, inset 5px 5px 10px #46905b, inset -5px -5px 10px #1d8a3b;
        color: #ffffff;
        font-size: 16px;
    }

    button:hover {
        font-size: 15px;
        transition: 500ms;
    }

    button:focus {
        outline: none;
    }

    .white:hover {
        color: #d7d7d7;
        text-shadow: 0px 0px 10px #d7d7d7;
    }

    .rotate {
        animation: rotation 25s infinite linear;
    }

    @keyframes rotation {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(359deg);
        }
    }

    button.toast-close-button {
        width: 30px;
        height: 30px;
        position: relative;
        right: -.3em;
        top: -.3em;
        float: right;
        font-size: 20px;
        font-weight: 700;
        color: #FFF;
        -webkit-text-shadow: 0 1px 0 #fff;
        text-shadow: 0 1px 0 #fff;
        opacity: .8;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
        filter: alpha(opacity=80);
        line-height: 1
    }
</style>


<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="admin/public/vendor/toastr/css/toastr.min.css" rel="stylesheet" type="text/css"/>

<style>
    .toast-custom {
        background-color: #664E88;
    }
</style>
<?php
$ip = $_SERVER['REMOTE_ADDR']; // your ip address here
$query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

$country_code = '';
if ($query && $query['status'] == 'success') {
    $country_code = $query['countryCode'];
}

$country_check = 0;

if ($country_code == 'CN' || $country_code == 'CA' || $country_code == 'US' || $country_code == 'RU' || $country_code == 'NG' || $country_code == 'VN') {
    $country_check = 1;
}

if ($country_check == 0) {
    header('Location:404');
}
?>