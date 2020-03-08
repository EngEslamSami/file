<style>
    #myListnews li{
        display: none;
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


<section class="main_content pbottom-30 ptop-30">

    <div class="container">

        <div class="all_news">
            <h4>أخر أخبار الجمعية </h4>
            <ul id="myListnews" class="list-unstyled">
            <?php
            if (isset($result) && !empty($result)){
                foreach ($result as $row){
                    if($row->news_type==1){
                        $news_type = "اخبار الجمعية";
                    } else if($row->news_type==2){
                        if(isset($row->newspaper_name) && $row->newspaper_name != null){
                            $news_type = $row->newspaper_name  ;
                        }
                    }
                    ?>
                <li class="col-md-4 col-sm-6 col-xs-12 padding-7">


                <articel class="news_article">
                    <?php
                    if (isset($row->img) && $row->img){
                        foreach ($row->img as $image){
                          if($image->img_status==1){
                                ?>
                                <img src="<?= base_url()."uploads/images/public_relations/news/".$image->img ?>">
                    <?php

                           }
                        }
                    }else{
                        ?>
                        <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>">
                        <?php
                    }
                    ?>


                    <div class="news_article_title">
                        <h5><a target="_blank" href="<?= base_url()."Web/news_details/".$row->id?>"><?= $row->title?></a></h5>
                        <p class="date"><i class="fa fa-calendar-o"></i> <?= $row->date?></p>
                        <p class="date">التصنيف : <?= $news_type?></p>
                    </div>
                </articel>

                </li>

        <?php
            }
        }
        ?>
            </ul>

            <div class="col-xs-12 text-center">
                <button class="btn btn-load read-more" id="loadMorenews">مشاهدة أكثر</button>

            </div>



        </div>

    </div>
</section>







