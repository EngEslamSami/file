


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/news'?>">المركز الإعلامى</a></li>
            <li class="active">التقارير</li>
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
        <li><a href="<?=base_url().'Web/gallery'?>"> مكتبة الصور</a></li>
        <li><a href="<?=base_url().'Web/videos'?>"> مكتبة الفيديوهات</a></li>
        <li><a href="#"> الجمعية فى الصحافة</a></li>
        <li><a href="<?=base_url().'Web/reports'?>"> التقارير</a></li>
        <li><a href="<?=base_url().'Web/system'?>"> الأنظمة و اللوائح</a></li>
        <li class="active"><a href="<?=base_url().'Web/plans'?>"> الخطة التشغيلية</a></li>
        <li><a href="<?=base_url().'Web/mhader_magles'?>">إجتماعات الجمعية العمومية</a></li>
    </ul>
</div>
</div>
        

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="reports pbottom-20">
                
                <div class="well well-sm">الخطط التشغيلية</div>
                
                <?php  if (isset($plans) && !empty($plans)){   foreach ($plans as $row){ ?>
                
                
                <!--    <div class="well well-sm">الخطة التشغيلية لعام <?php echo $row->year;?></div>  -->
                    <?php /*
                    if (isset($plans) && !empty($plans)){
                        foreach ($plans as $row){
*/
                            ?>

                    <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
                            <div class="col-md-4 mbottom-20">
                                <div class="report_item">
                                    <div class="top_icon_name">
                                        <i class="<?= $record->icon?> "></i>
                                        <p><?= $record->title?></p>
                                    </div>
                                    <div class="download-btn-text"> 
                                        <a href="<?= base_url()."Web/download/".$record->file?>" class="pull-left" download><i class="fa fa-download"></i> التحميل</a>
                                        <a target="_blank" href="<?= base_url()."Web/read_file/".$record->file?>" class="pull-right"><i class="fa fa-eye"></i> معاينة</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                       }
                   }
                    ?>


                 <?php  } } ?>
                </div>


            </div>
        </div>

      



    </div>
</section>


