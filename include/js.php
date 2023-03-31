<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/wow/wow.min.js"></script>

<script src="vendor/animsition/dist/js/animsition.min.js"></script>

<script src="vendor/slick/slick.min.js"></script>
<script src="js/slick-custom.js"></script>

<script src="vendor/bootstrap/js/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="vendor/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="js/slide-custom.js"></script>

<script src="vendor/lightbox2/js/lightbox.min.js"></script>

<script src="vendor/parallax100/parallax100.js"></script>

<script src="admin/public/vendor/toastr/js/toastr.min.js" type="text/javascript"></script>

<script>
    $('.parallax100').parallax100();
</script>

<script src="js/main.js"></script>

<script src="js/toaster-init.js"></script>

<script>
    $(function () {
        $('body').on('click', '.btn-drive.size1.m-txt1.bg-main.bo-rad-4.trans-03', function () {
            $('.btn-drive.size1.m-txt1.bg-main.bo-rad-4.trans-03.package').removeClass('active');
            $(this).closest('.btn-drive.size1.m-txt1.bg-main.bo-rad-4.trans-03.package').addClass('active');
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script>
    $('.clients-carousel').owlCarousel({
        autoplay: true,
        loop: true,
        margin: 15,
        dots: false,
        slideTransition: 'linear',
        autoplayHoverPause: true,
        pagination: false,
        navigation: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1200: {
                items: 4
            }

        }
    });
</script>