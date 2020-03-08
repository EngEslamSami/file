



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
            <li class="active"><a href="<?=base_url().'Web/reports'?>">التقارير</a></li>
            <li><a href="<?=base_url().'Web/system'?>"> الأنظمة و اللوائح</a></li>
            <li><a href="<?=base_url().'Web/plans'?>"> الخطة التشغيلية</a></li>
            <li><a href="<?=base_url().'Web/mhader_magles'?>">إجتماعات الجمعية العمومية</a></li>
        </ul>
    </div>
</div>
   

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12  " id="secondDiv">
            <div class="background-white content_page">
                <div class="reports pbottom-20">
                
                
        
        
        
         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                     <?php
                        if (isset($reports) && !empty($reports)){
                            $x=1;
                              $i= 0;
                        foreach ($reports as $row){
                             $in='';
                            if($i==0){
                                $in='in';
                            }
                            $i++;
                
                        ?>
                         <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?=$row->id?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                 <i class="more-less glyphicon glyphicon-plus"></i>
                  تقارير عام  <?php echo $row->year;?> م
                </a>
              </h4>
            </div>
            <div id="collapse<?php echo $x;?>" class="panel-collapse collapse <?php // echo $in; ?>" role="tabpanel" aria-labelledby="heading<?=$row->id?>">
              <div class="panel-body">
               <?php
                    if (isset($row->details) && !empty($row->details)){
                        foreach ($row->details as $record){ ?>

                            <div class="col-md-4 mbottom-20">
                                <div class="report_item">
                                    <div class="top_icon_name">
                                        <i class="<?= $record->icon?> "></i>
                                        <p><?= $record->title?></p>
                                    </div>
                                    <!--<div class="download-btn-text">
                                        <a href="<?= base_url()."Web/download/".$record->file?>" class="pull-left" download><i class="fa fa-download"></i> التحميل</a>
                                        <a target="_blank" href="<?= base_url()."Web/read_file/".$record->file?>"  class="pull-right"><i class="fa fa-eye"></i> معاينة</a>
                                    </div>-->
<div class="download-btn-text">
<a  onclick="update_views(<?= $record->id ?>,'num_download')" href="<?= base_url()."Web/download/".$record->file.'/'.$record->id.'/2'?>" class="pull-left" download><i class="fa fa-download"></i> التحميل</a>
<span style="background-color: #ffb61e;" class="label  pull-left" id="num_download<?= $record->id ?>"><?php
if (!empty($record->num_download)){
    echo $record->num_download;
} else{
    echo 0;
}
?></span>

<a onclick="update_views(<?= $record->id ?>,'num_views')" target="_blank" href="<?= base_url()."Web/read_file/".$record->file.'/'.$record->id.'/2'?>"  class="pull-right"><i class="fa fa-eye"></i> معاينة</a>
<span style="background-color: #ffb61e;" class="label  pull-right" id="num_views<?= $record->id ?>"><?php
if (!empty($record->num_views)){
    echo $record->num_views;
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
                        
                        
                  <!--  <div class="well well-sm">تقارير هامة لعام <?php echo $row->year;?></div>

                    <?php
                    if (isset($row->details) && !empty($row->details)){
                        foreach ($row->details as $record){ ?>

                            <div class="col-md-4 mbottom-20">
                                <div class="report_item">
                                    <div class="top_icon_name">
                                        <i class="<?= $record->icon?> "></i>
                                        <p><?= $record->title?></p>
                                    </div>
                                    <div class="download-btn-text">
                                        <a href="<?= base_url()."Web/download/".$record->file?>" class="pull-left" download><i class="fa fa-download"></i> التحميل</a>
                                        <a target="_blank" href="<?= base_url()."Web/read_file/".$record->file?>"  class="pull-right"><i class="fa fa-eye"></i> معاينة</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    -->
                    
                    
                    
                        <?php
                        $x++;
                            }
                            }
                            ?>
                             </div>



                </div>


            </div>
        </div>

        



    </div>
</section>


<script>
    function update_views(row_id,field) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>Web/update_report_views",
            data: {row_id:row_id,field:field},
            success: function (d) {
                $('#'+field+row_id).html(d);


            }

        });

    }
</script>