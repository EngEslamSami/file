<div class="sidebar-quick-links-fixed hidden-xs">
    <a href="javascript:void(0);" class="side-btn">تسجيل الدخول</a>
    <ul>
        <li>
            <a href="#">
                <i class="fa fa-home"></i>
                <span>دخول الموظفين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-users"></i>
                <span>دخول مستفيدين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول متعفف </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-money"></i>
                <span>دخول  متبرع</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول  كفيل</span>
            </a>
        </li>

    </ul>
</div>
<!-- Sidebar Quick Links -->


<div class="social-sidebar hidden-xs" dir="ltr">
    <ul>
        <li class="facebook">
            <a href="#" target="_blank">
                <i class="fa fa-facebook"></i>
                <span>تابعنا على فيسبوك</span>
            </a>
        </li>
        <li class="twitter">
            <a href="#" target="_blank">
                <i class="fa fa-twitter"></i>
                <span>تابعنا على تويتر</span>
            </a>
        </li>
        <li class="instagram">
            <a href="#" target="_blank">
                <i class="fa fa-instagram"></i>
                <span>تابعنا على انستجرام</span>
            </a>
        </li>
        <li class="youtube">
            <a href="#" target="_blank">
                <i class="fa fa-youtube-play"></i>
                <span>تابعنا على يوتيوب</span>
            </a>
        </li>
        <li class="snapchat">
            <a href="#" target="_blank">
                <i class="fa fa-snapchat-ghost"></i>
                <span>تابعنا على سناب شات</span>
            </a>
        </li>
    </ul>
</div>



<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="text-center">
            <h3>سلة المشتريات</h3>
        </div>
        <div class="hello_client background-white ptop-30 pbottom-30 text-center mbottom-40">
            <h5>أهلاً بك شريك النجاح</h5>
            <h5 class="green-color">ونشكر لك تسوقك في متجر أبناء بالقصيم - بريدة</h5>
            <h4>أخلف الله عليك خيراً .. وبارك في رزقك</h4>
        </div>

        <div class="col-xs-12 no-padding">
            <div class="col-md-8 background-white">
                <div class="shopping-cart-table">
                    <h5 class="green-color text-center"><span><i class="fa fa-shopping-cart"></i></span>سلة المشتريات</h5>
                    <div class="cart-details ">
                        <div id="shopping-cart-results">
                            <div>
                                <table class="table table-bordered table-hover table-striped background-white "  >
                                    <thead>
                                    <tr class="info">
                                        <th>المنتج</th>
                                        <th>عدد الأسهم</th>
                                        <th>السعر</th>
                                        <th>نوع السهم</th>
                                        <th>الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody id="show-cart">
                                    <tr>
                                        <td>مشروع</td>
                                        <td>3</td>
                                        <td>200</td>
                                        <td>تبرع</td>
                                        <td><a href="#" class="red_trash"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>مشروع</td>
                                        <td>3</td>
                                        <td>200</td>
                                        <td>تبرع</td>
                                        <td><a href="#" class="red_trash"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>مشروع</td>
                                        <td>3</td>
                                        <td>200</td>
                                        <td>تبرع</td>
                                        <td><a href="#" class="red_trash"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="clear"></div>
                            <div class="full-fee div-padding">
                                <p>لديك <span  id="count-cart"> 1 </span> منتج فى السلة</p>
                                <p>إجمالى السعر <span  id="total-cart"> 200 </span> ريال سعودى</p>
                                <!--<button class="btn btn-green transition-5"> أضف إلى الشراء </button>

                                <button id="clear-cart" class=" btn transition-5 btn-green-borderd">تفريغ السلة</button>-->
                            </div>

                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="complete_payment padding-7 pbottom-10 background-white">
                    <div class="forms_head mbottom-10">إتمام الدفع</div>
                    <form>
                        <div class="form-group">
                            <label>الدولة</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">السعودية</option>
                                <option value="">كولومبيا</option>
                                <option value="">الكويت</option>
                                <option value="">قطر</option>
                                <option value="">البحرين</option>
                                <option value="">عمان</option>
                                <option value="">اليمن</option>
                                <option value="">الأردن</option>
                                <option value="">لبنان</option>
                                <option value="">فلسطين</option>
                                <option value="">مصر</option>
                                <option value="">العراق</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>المدينة</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">جدة</option>
                                <option value="">الرياض</option>
                                <option value="">الدمام</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>الإسم </label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>الجوال </label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكترونى </label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>نوع التبرع</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">تبرع عبر البطاقة الإئتمانية</option>
                                <option value="">تبرع عن طريق التحويل البنكى</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>رقم البطاقة</label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>CCV </label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>الإسم على البطاقة  </label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>شهر الإنتهاء</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>سنة الإنتهاء</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">2018</option>
                                <option value="">2019</option>
                                <option value="">2020</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">أرسل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- start section logos-->
<section class="logos text-center ptop-30 pbottom-20">
    <div class="container-fluid">
        <h4 class="">شركاء النجاح</h4>
        <h5>شركاء تشرفنا بالتعامل معهم </h5>
        <div id="owl-demo2" class="owl-carousel owl-theme logos-carousel">
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?><?=base_url().'asisst/web_asset/'?>img/logos/initiative-ahalina.png" class="img-responsive " title="" /></a>
            </div>
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?>img/logos/initiative-aramco.png" class="img-responsive " title="" /></a>
            </div>
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?>img/logos/initiative-bank.png" class="img-responsive " title="" /></a>
            </div>
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?>img/logos/initiative-investment-bank.png" class="img-responsive " title="" /></a>
            </div>
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?>img/logos/initiative-ahalina.png" class="img-responsive " title="" /></a>
            </div>
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?>img/logos/initiative-investment-bank.png" class="img-responsive " title="" /></a>
            </div>
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?>img/logos/initiative-aramco.png" class="img-responsive " title="" /></a>
            </div>
            <div class="item">
                <a href="#"><img src="<?=base_url().'asisst/web_asset/'?>img/logos/initiative-bank.png" class="img-responsive " title="" /></a>
            </div>
        </div>
    </div>
</section>

<section class="logos text-center pbottom-20 ptop-20 ">
    <div class="container-fluid">
        <h4 class="">جوائز أبناء</h4>
        <h5>نحن سعداء لحصولنا على جائزة </h5>
        <div id="owl-demo3" class="owl-carousel owl-theme logos-carousel">
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-1.jpg" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-2.jpg" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-3.jpg" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-4.jpg" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-5.jpg" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-6.png" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-2.jpg" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
            <div class="item">
                <img src="<?=base_url().'asisst/web_asset/'?>img/awards/award-3.jpg" class="img-responsive " title="" />
                <a href="#">جائزة الملك فهد</a>
                <p>المركز الأول</p>
            </div>
        </div>
    </div>
</section>
