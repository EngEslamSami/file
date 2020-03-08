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



<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/news'?>">المركز الإعلامى</a></li>
            <li class="active">مكتبة الفيديوهات</li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="col-md-3 col-sm-4 col-xs-12" id="firstDiv">
            <h4 class="sidebar_title"> المركز الإعلامى </h4>
            <div class="menu_sidebar">
                <ul class="list-unstyled" >
                    <li class=""><a href="<?=base_url().'Web/news'?>">أخبار الجمعية </a></li>
                    <li><a href="<?=base_url().'Web/gallery'?>">مكتبة الصور</a></li>
                    <li class="active"><a href="<?=base_url().'Web/videos'?>">مكتبة الفيديوهات</a></li>
                    <li><a href="#">الجمعية فى الصحافة</a></li>
                    <li><a href="<?=base_url().'Web/reports'?>">التقارير</a></li>
                    <li><a href="<?=base_url().'Web/system'?>">الأنظمة و اللوائح</a></li>
                    <li><a href="<?=base_url().'Web/plans'?>">الخطة التشغيلية</a></li>   
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="gallery_videos pbottom-20">
                    <div class="well well-sm">مكتبة الفيديوهات</div>
                    <ul id="myList" class="list-unstyled">
                        <?php
                        if (isset($videos) && !empty($videos)){
                            foreach ($videos as  $video){
                                ?>

                                <li class="col-sm-6">
                                    <div class="box-video">
                                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $video->video_link?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </li>
                        <?php

                            }
                        }
                        ?>

                    </ul>

                    <div class="col-xs-12 text-center">
                        <button class="btn btn-load read-more" id="loadMore">مشاهدة أكثر</button>
                        <!--<button class="btn btn-load" id="showLess">مشاهدة أقل</button>-->

                    </div>

                </div>


            </div>
        </div>
    </div>
</section>


