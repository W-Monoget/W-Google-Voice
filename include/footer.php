<!-- Footer Start -->
<footer id="contact" class=" iq-over-dark-90">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 ">
                    <div class="widget">
                        <div class="textwidget ">
                            <p><img class="mb-4 img-fluid" src="images/logo.png" alt="Best Google Voice">
                                <br>
                                Best Google Voice provides PVA, Accounts & Much More Services For Different Popular Social
                                Networks Such As Facebook, Instagram, Twitter & Etc.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 mt-lg-0 mt-4">
                    <div class="widget">
                        <h4 class="footer-title ">Contact Us</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="iq-contact">
                                    <li>
                                        <a><i class="fa fa-skype"></i><span><?php $custom_package = $db_handle->runQuery("SELECT * FROM contact where id=1");
                                                echo $custom_package[0]["skype"]; ?></span></a>
                                    </li>
                                    <li>
                                        <a href="mailto:<?php echo $custom_package[0]["email"]; ?>"><i class="fa fa-envelope"></i><span><?php echo $custom_package[0]["email"]; ?></span></a>
                                    </li>
                                    <li>
                                        <a href="tel:<?php echo $custom_package[0]["number"]; ?>"><i
                                                    class="fa fa-whatsapp"></i><span><?php echo $custom_package[0]["number"]; ?></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 mt-lg-0 mt-4 text-center">
                    <img src="images/google-voice/satisfaction.webp" class="img-fluid" alt=""/>
                </div>
            </div>
        </div>
    </div>
    <!-- Address END -->
    <div class="copyright-footer">
        <div class="container">
            <div class="pt-3 pb-3">
                <div class="row justify-content-between">
                    <div class="col-lg-12 col-md-12 text-md-center text-center">
                        <span class="copyright">Copyright 2023 Best Google Voice All Rights Reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- back-to-top -->
<div id="back-to-top">
    <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
</div>
<!-- back-to-top End -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6429c2cc4247f20fefe9668f/1gt1i1sb3';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->