<!-- start section logos-->
<!-- start section logos-->
<section class="logos text-center">
    <div class="container">
        <h4 class="title">شركاء نجاح مسيرة الجمعية</h4>
        <div id="owl-demo1" class="owl-carousel owl-theme">
            <?php if( isset($this->success) && $this->success !=null && !empty($this->success))
            { foreach ($this->success as $record){?>
                <div class="item">
                    <img src="<?php echo base_url()."uploads/images/".$record->img?>" class="img-responsive " title="" />
                </div>
            <?php  } } ?>
        </div>
    </div>
</section>


<section class="call-out">
    <div class="container">
        <div class="col-sm-9">
            <h4>شارك بتطوعك معنا فى حملة إحياء أسرة فقيرة محتاجة رعاية.</h4>
        </div>
        <div class="col-sm-3">
            <a href="#" class="thm-btn style-3">اشترك الأن</a>
        </div>

    </div>
</section>


<footer class="main-footer">

    <!--Widgets Section-->
    <div class="widgets-section">
        <div class="container">
            <div class="row">

                <!--Footer Column-->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div>
                        <div id="block-footer1">
                            <div>
                                <div class="footer-widget about-column">
                                    <figure class="footer-logo">
                                        <a href="#">
                                            <img src="<?php echo base_url()."asisst/web_asset/"?>img/logo.png" alt="">
                                        </a>
                                    </figure>
                                    <ul class="contact-info">
                                        <li>
                                            <span class="icon-signs"></span>العنوان : القصيم بريده حي الأمن شمال مركز المعلومات الوطني غرب المرور
                                        </li>
                                        <li><span class="icon-phone-call"></span>الرمز البريدي : 51421</li>
                                        <li><span class="icon-phone-call"></span>الهاتف : 0163821040</li>
                                        <li><span class="icon-phone-call"></span>فاكس : 0163818281</li>
                                        <li><span class="icon-note"></span>البريد الالكتروني : kawc.3oon@gmail.com</li>
                                        <li><span class="icon-note"></span>البريد الالكتروني للعلاقات العامة والإعلام : Relations.3oon@hotmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--Footer Column-->
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div>
                        <div id="block-footer2">
                            <div>
                                <div class="footer-widget link-column">
                                    <div class="section-title">
                                        <h4>روابط هامة</h4>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="list"><li><a href="<?=base_url() ?>">الرئيسية</a></li>
                                            <li><a href="<?=base_url()."Web/about" ?>">من نحن</a></li>
                                            <li><a href="#">تبرع الأن</a></li>
                                            <li><a href="<?=base_url()."Web/program"?>">برامج الجمعية</a></li>
                                            <li><a href="#">مشروعات الجمعية</a></li>
                                            <li><a href="<?=base_url()."Web/News" ?>">أخبار الجمعية</a></li>
                                            <li><a href="<?=base_url()."Web/contact" ?>">اتصل بنا</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Footer Column-->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div>
                        <div class="views-element-container" id="block-views-block-events-block-2">
                            <div>
                                <div class="js-view-dom-id-04f7d6d7578a611ee4c53a9901dc94ce80b9e875910c1dea9a25013d04bd2a13">
                                    <div class="footer-widget post-column">
                                        <div class="section-title">
                                            <h4>أهم الأحداث</h4>
                                        </div>
                                        <div class="post-list">

                                            <div class="post">
                                                <div class="post-thumb"><a href="#"><img src="img/news/1.jpg" alt=""></a></div>
                                                <a href="http://demoatheer.xyz/node/8"><h5>تفعيل الشراكة المجتمعيه بين المدرسه الابتدائية 58 وهيئه الهلال الأحمرe</h5></a>
                                                <div class="post-info"><i class="fa fa-calendar"></i>  1 أبريل 2018</div>
                                            </div>


                                            <div class="post">
                                                <div class="post-thumb"><a href="#"><img src="img/news/2.jpg" alt=""></a></div>
                                                <a href="http://demoatheer.xyz/node/6"><h5>تفعيل الشراكة المجتمعيه بين المدرسه الابتدائية 58 وهيئه الهلال الأحمر</h5></a>
                                                <div class="post-info"><i class="fa fa-calendar"></i>  1 أبريل 2018</div>
                                            </div>

                                            <div class="post">
                                                <div class="post-thumb"><a href="#"><img src="img/news/3.jpg" alt=""></a></div>
                                                <a href="http://demoatheer.xyz/node/8"><h5>تفعيل الشراكة المجتمعيه بين المدرسه الابتدائية 58 وهيئه الهلال الأحمرe</h5></a>
                                                <div class="post-info"><i class="fa fa-calendar"></i>  1 أبريل 2018</div>
                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!--Footer Column-->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div>
                        <div id="block-footer4">
                            <div>
                                <div class="footer-widget contact-column">
                                    <div class="section-title">
                                        <h4>تابعنا على التواصل الاجتماعى</h4>
                                    </div>


                                    <ul class="social-icon"><li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-feed"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3574.648034887512!2d43.95140648500256!3d26.37024368958014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x157f582c912efcc9%3A0x6694ef00a2ba67c4!2z2KzZhdi52YrYqSDYp9mE2YXZhNmDINi52KjYr9in2YTYudiy2YrYsiDYp9mE2K7Zitix2YrYqSDYp9mE2YbYs9in2KbZitip!5e0!3m2!1sar!2seg!4v1522157616182" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



</footer>

<div class="copyright">
    <div class="container">
        <p class="">
            © <?=date("Y")?> <a href="wwww.alatheertech.html"><b>تصميم وتطوير شركة الأثير تك لتكنولوجيا المعلومات</b></a>.جميع الحقوق محفوظة.
        </p>
    </div>
</div>
<!-- End Copyright Bar -->


<script type="text/javascript" src="<?php echo base_url()."asisst/web_asset/"?>js/jquery-1.10.1.min.js"></script>


<script>
$( document ).ready(function() {
   $('img').attr("onerror","this.src='<?php echo base_url()."asisst/web_asset/"?>img/logo.png'");
});
</script>


<script src="<?php echo base_url()."asisst/web_asset/"?>js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()."asisst/web_asset/"?>js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url()."asisst/web_asset/"?>js/jquery.datetimepicker.full.js"></script>


<script src="<?php echo base_url()."asisst/web_asset/"?>js/jquery.easing.min.js"></script>
<script src="<?php echo base_url()."asisst/web_asset/"?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()."asisst/web_asset/"?>js/custom.js"></script>
<script src="<?php echo base_url()."asisst/web_asset/"?>js/wow.min.js"></script>
<script>
    new WOW().init();
    $('.some_class').datetimepicker();
   



</script>

<!---------------------------   required validation  -------------------------------->
<script src="<?php echo base_url()."asisst/web_asset/"?>validation/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>
<!---------------------------   required validation  -------------------------------->


</body>

<!-- Mirrored from demoatheer.xyz/design/3own/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Apr 2018 10:02:55 GMT -->
</html>
