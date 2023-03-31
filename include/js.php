<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.js"></script>
<!-- jQuery  for scroll me js -->
<script src='js/jquery-min.js'></script>
<!-- popper  -->
<script src="js/popper.min.js"></script>
<!--  bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Appear JavaScript -->
<script src="js/appear.js"></script>

<!-- Jquery-migrate JavaScript -->
<script src='js/jquery-migrate.min.js'></script>
<!-- Scripts JavaScript -->
<script src='js/scripts.js'></script>
<!-- countdownTimer JavaScript -->
<script src='js/jQuery.countdownTimer.min.js'></script>
<!-- Tox-progress JavaScript -->
<script src='js/tox-progress.min.js'></script>
<!-- Timeline JavaScript -->
<script src='js/timeline.js'></script>
<!-- Timeline min JavaScript -->
<script src='js/timeline.min.js'></script>
<!-- Slick JavaScript -->
<script src='js/slick.min.js'></script>
<!-- Popper JavaScript -->
<script src='js/popper.min.js'></script>
<!-- Owl.carousel JavaScript -->
<script src='js/owl.carousel.min.js'></script>
<!-- Countdown JavaScript -->
<script src='js/countdown.js'></script>
<!-- Jquery.countTo JavaScript -->
<script src='js/jquery.countTo.js'></script>
<!-- Magnific-popup JavaScript -->
<script src='js/jquery.magnific-popup.min.js'></script>
<!-- Isotope.pkgd.min JavaScript -->
<script src='js/isotope.pkgd.min.js'></script>
<!-- Wow, JavaScript! -->
<script src='js/wow.min.js'></script>
<!--  Custom JavaScript -->
<script src="js/custom.js"></script>
<!-- REVOLUTION JS FILES -->
<script src="revslider/js/revolution.tools.min.js"></script>
<script src="revslider/js/rs6.min.js"></script>

<script>

    var revapi5,
        tpj;
    jQuery(function () {
        tpj = jQuery;
        if (tpj("#rev_slider_5_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_5_1");
        } else {
            revapi5 = tpj("#rev_slider_5_1").show().revolution({
                jsFileLocation: "js/",
                sliderLayout: "fullwidth",
                visibilityLevels: "1240,1024,778,480",
                gridwidth: "1440,1024,778,480",
                gridheight: "870,768,650,600",
                spinner: "spinner0",
                editorheight: "870,768,650,600",
                responsiveLevels: "1240,1024,778,480",
                disableProgressBar: "on",
                navigation: {
                    onHoverStop: false
                },
                parallax: {
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 30],
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 0
                },
                fallbacks: {
                    allowHTML5AutoPlayOnAndroid: true
                },
            });
        }

    });
</script>

<script src="admin/public/vendor/toastr/js/toastr.min.js" type="text/javascript"></script>

<script src="js/toaster-init.js"></script>

