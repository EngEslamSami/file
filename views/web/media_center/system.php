


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/news'?>">المركز الإعلامى</a></li>
            <li class="active">الأنظمة و اللوائح</li>
        </ol>
    </div>
</section> 

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" id="firstDiv">
    <h4 class="sidebar_title"> المركز الإعلامى </h4>
    <div class="menu_sidebar">
        <ul class="list-unstyled" >
            <li ><a href="<?=base_url().'Web/news'?>"> أخبار الجمعية </a></li>
            <li><a href="<?=base_url().'Web/gallery'?>"> مكتبة الصور</a></li>
            <li><a href="<?=base_url().'Web/videos'?>"> مكتبة الفيديوهات</a></li>
            <li><a href="#"> الجمعية فى الصحافة</a></li>
            <li><a href="<?=base_url().'Web/reports'?>"> التقارير</a></li>
            <li class="active"><a href="<?=base_url().'Web/system'?>"> الأنظمة و اللوائح</a></li>
            <li><a href="<?=base_url().'Web/plans'?>"> الخطة التشغيلية</a></li>
        </ul>
    </div>
</div>

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="reports pbottom-20">

                    <div class="well well-sm">الأنظمة و اللوائح</div>

                     <?php
                    if (isset($system) && !empty($system)){
                        foreach ($system as $row){

                            ?>


    <div class="col-md-4 mbottom-20">
        <div class="report_item">
            <div class="top_icon_name">
                <i class="<?= $row->icon?> "></i>
                <p><?= $row->title?></p>
            </div>
            <div class="download-btn-text">
                <!--<a href="<?= base_url()."Web/download/".$row->file?>" class="pull-left" download><i class="fa fa-download"></i> التحميل 
                <span class="badge">2505</span>
                </a>
                -->
 <!--<a onclick="update_views(<?= $row->id ?>,'num_download')" href="<?= base_url()."Web/download/".$row->file?>" class="pull-left" download><i class="fa fa-download"></i> التحميل</a>
 -->
 <!--
   <a onclick="update_views(<?= $row->id ?>,'num_download')" href="<?= base_url()."Web/download/".$row->file .'/'.$row->id?>" class="pull-left" ><i class="fa fa-download"></i> التحميل</a>
-->
 <a onclick="update_views(<?= $row->id ?>,'num_download')" href="<?= base_url()."Web/download/".$row->file .'/'.$row->id.'/1'?>" class="pull-left" ><i class="fa fa-download"></i> التحميل</a>


 
 
 <br />
<span style="background-color: #ffb61e;" class="label  pull-left droid" id="num_download<?= $row->id ?>">
عدد مرات التحميل
<?php
    if (!empty($row->num_download)){
        echo $row->num_download;
    } else{
        echo 0;
    }
    ?></span>
                
                
                
                <!--<a target="_blank" href="<?= base_url()."Web/read_file/".$row->file?>" class="pull-right"><i class="fa fa-eye"></i> معاينة  
                <span class="badge">2505</span></a>
                -->
  
  <!--
   <a onclick="update_views(<?= $row->id ?>,'num_views')" target="_blank" href="<?= base_url()."Web/read_file/".$row->file?>" class="pull-right"><i class="fa fa-eye"></i> معاينة</a>
-->
<a onclick="update_views(<?= $row->id ?>,'num_views')" target="_blank" href="<?= base_url()."Web/read_file/".$row->file.'/'.$row->id.'/1'?>" class="pull-right"><i class="fa fa-eye"></i> معاينة</a>




                                        <span style="background-color: #ffb61e;" class="label  pull-right droid" id="num_views<?= $row->id ?>"><?php
                                            if (!empty($row->num_views)){
                                                echo $row->num_views;
                                            } else{
                                                echo 0;
                                            }
                                            ?></span>
                
                
            </div>
        </div>
    </div>
                            <?php
                        }
                    }
                    ?>




                </div>


            </div>
        </div>
    </div>
</section>



									
<script>
    function update_views(row_id,field) {
     
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>Web/update_system_views",
            data: {row_id:row_id,field:field},
            success: function (d) {
                $('#'+field+row_id).html(d);
            
            }

        });

    }
</script>