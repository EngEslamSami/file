

<style type="text/css">
    .gallery .content .panel-default>.panel-heading {
        color: #fff;
        background-color: #249c33;
        border-color: #ddd;
        background-image: none;
    }
    .gallery .content .panel-body {
        padding: 0px;
        overflow: hidden;
    }
    .gallery .content .panel-body img {
        width: 100%;
        height: 300px;
    }
    .gallery .content .panel-body img:hover {
        transform: scale(1.05,1.05);
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -ms-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }


</style>
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
            <li><a href="<?=base_url().'Web/king_word'?>">من نحن</a></li>
            <li class="active">كلمة الرئيس الفخري للجمعية</li>
        </ol>
    </div>
</section>



<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="gallery">
            <?php
            if (isset($library) && !empty($library)) {
                foreach ($library as $row){


                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?= $row->title?></h3>
                        </div>
                        <div class="panel-body">
                            <a target="_blank" href="<?= base_url()."Web/album/".$row->id?>">
                    <?php
                    if (isset($row->img) && !empty($row->img)) {
                        ?>
                        <img src="<?= base_url() . "uploads/images/" . $row->img ?>">
                        <?php
                    } else{
                        ?>
                        <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>"
                        <?php
                    }
                        ?>
                        </a>
                        </div>
                        <div class="panel-footer">عدد الصور (<?= $row->count?>)</div>

                    </div>
                </div>

                <?php
            }    }
            ?>


        </div>
    </div>
</section>
