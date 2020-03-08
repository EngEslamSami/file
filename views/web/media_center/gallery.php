<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/gallery'?>">مكتبة الصور</a></li>
          
        </ol>
    </div>
</section>




<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" id="firstDiv">
<h4 class="sidebar_title"> المركز الإعلامى </h4>
<div class="menu_sidebar">
    <ul class="list-unstyled" >
        <li class=""><a href="<?=base_url().'Web/news'?>"> أخبار الجمعية </a></li>
        <li class="active"><a href="<?=base_url().'Web/gallery'?>"> مكتبة الصور</a></li>
        <li><a href="<?=base_url().'Web/videos'?>"> مكتبة الفيديوهات</a></li>
        <li><a href="#"> الجمعية فى الصحافة</a></li>
        <li><a href="<?=base_url().'Web/reports'?>"> التقارير</a></li>
        <li><a href="<?=base_url().'Web/system'?>"> الأنظمة و اللوائح</a></li>
        <li><a href="<?=base_url().'Web/plans'?>"> الخطة التشغيلية</a></li>
        <li><a href="<?=base_url().'Web/mhader_magles'?>">إجتماعات الجمعية العمومية</a></li>
    </ul>
</div>
</div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">

                <div class="well well-sm">ألبوم الصور</div>
                <div class="gallery">
                    <?php
                    if (isset($album) && !empty($album)) {
                        ?>

                        <ul class="clearfix list-unstyled gallery_imgs " id="thumbnails">
                            <?php

                            foreach ($album as $row) {
                            ?>

                            <li class="col-md-4 col-sm-6 padding-4">
                                <div class="box-img">

                                    <a href="<?=base_url()."uploads/images/".$row->img?>"
                                       title="">
                                        <img src="<?=base_url()."uploads/images/".$row->img?>"
                                             alt="turntable" width="100%" height="250">
                                    </a>
                                </div>
                            </li>

                            <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>



            </div>
        </div>
    </div>
</section>


