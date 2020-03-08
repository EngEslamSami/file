<style type="text/css">
.reply-comment{
    display: inline-block;
    width: 100%;
    margin-bottom: 20px
}
.reply-img{
    width: 15%;	
    float: right;
}
.reply-img img{
    width: 100%;
    max-width: 70px;
    height: 70px;
    border:1px solid #eee;
}
.reply-comment{
    float: right;
    width: 85%;
}
.label-inverse{
    background-color: #888;
    color: #fff;
}
.reply-comment  span.label{
    text-align: center;
    padding-right: 10px;
    display: inline-block;
    width: auto;
    font-size:14px;
}
.reply-comment .name{
    color: #888;
    font-size:15px;
}
.comments-sec .well{
    height: 100%;
}
.bubble-div img{
    width: 150px;
    max-width: 100%;
}
.btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
    margin: 0 0 0 0;
}
</style>
<div class="col-sm-12 no-padding " >
    
    <div class="panel-body" style="min-height: 485px;">
       <div class="vertical-tabs">
       <div class="col-xs-12 no-padding">
       <div class="col-xs-4 no-padding">
       <span class="label" style="color: #044dd4;"> رقـم الـوادر</span>
<span class="label"style="color: #940000;"> <?=$get_all->year.'/'. $get_all->emp_depart_code .'/'.$get_all->rkm?></span>
       <span class="label" style="color: #044dd4;"> تاريخ الوارد</span>
<span class="label"style="color: #940000;"><?= $get_all->estlam_date ?></span>
<br />
<span class="label" style="color: #044dd4;">الموضوع</span>
<span class="label" style="color: #940000;"><?= $get_all->subject ?></span>
<span class="label" style="float: left;">
<img style="width: 50px; height: 50px; margin-top: -20px;" src="<?php echo base_url() ?>uploads/archive/barcode/br.png" />
</span>
       </div>
       <div class="col-xs-8 no-padding">
       </div>
                   <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
            <li class="nav-item active">
                <a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i class="fa fa-2x fa-keyboard-o "></i> تفاصيل المعاملة</a>
            </li>
            	
			<li class="nav-item">

<a class="nav-link" data-toggle="tab" href="#pag6" role="tab" aria-controls="pag6"><i class="fa fa-2x fa-paperclip"></i> تعديل المعامله</a>

</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2"><i class="fa fa-2x fa-paperclip"></i> المرفقات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="pag3"><i class="fa fa-2x fa-folder-open-o"></i> العلاقات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag4" role="tab" aria-controls="pag4"><i class="fa fa-2x fa-reply-all"></i> التحويلات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag5" role="tab" aria-controls="pag5"><i class="fa fa-2x fa-comment-o"></i> التوجيهات / التأشيرات</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag6" role="tab" aria-controls="pag6"><i class="fa fa-2x fa-bell-o"></i> التنبيهات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag7" role="tab" aria-controls="pag7"><i class="fa fa-2x fa-clock-o"></i> الأنشطة</a>
            </li> -->
        </ul>
       </div>
        <div class="tab-content tab-content-vertical">
            <div class="tab-pane active" id="pag1" role="tabpanel">
               <div class="col-xs-12 no-padding">
                   <div class="col-sm-9 col-xs-12">
                        <table class="table  table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                            <tr>
                                <th style="width: 110px">رقم الوارد</th>
                                <td>
                                  <span class="label" style="background-color: #32e26b"> 
                             <?=$get_all->year.'/'. $get_all->emp_depart_code .'/'.$get_all->rkm?>
                             </span>
                               </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th> تاريخ الوارد</th>
                                <td><?= $get_all->tsgeel_date ?></td>
                            </tr>
                            <tr>
                                <th>تاريخ الاستلام</th>
                                <td><?= $get_all->estlam_date ?></td>
                            </tr>
                            <tr>
                                <th> القيد الخارجي</th>
                                <td><?= $get_all->qued_kargy ?></td>
                            </tr>
                            <tr>
                                <th>جهه الاختصاص</th>
                                <td><?= $get_all->geha_ekhtsas_name ?> </td>
                            </tr>
                            <tr>
                                <th> اسم الموضوع</th>
                                <td> <span class="label" style="background-color: #32e26b"><?= $get_all->title ?></span></td>
                            </tr>
                            <tr>
                                <th>الموضوع</th>
                                <td> <span class="label" style="background-color: #ff8080"><?= $get_all->subject ?></span></td>
                            </tr>
                            <tr>
                                <th> 
طريقه الاستلام</th>
<td><?php if (!empty($tareket_estlam)) {
                foreach($tareket_estlam as $tareqa){
                    echo  $tareqa->estlam_fk_name;
                    echo ' , ';
                }} else{
                    echo 'غير محدد' ;
                }
                ?></td>
                            </tr>
                             <tr>
                                <th>درجه السريه</th>
                                <td><?php
                       // $arr = (1 => 'نعم', 0 => 'لا');
                       if (!empty($get_all->is_secret)) {
                        foreach ($arr as $key) {
                            $select = '';
                            if ($get_all->is_secret != '') {
                                if ($key->id == $get_all->is_secret) {
                                     echo $key->title; 
                                }
                            } }
                        } else{
                            echo 'غير محدد' ;
                        } ?></td>
                            </tr>
                             <tr>
                                <th> جهه الارسال</th>
                                <td> <?= $get_all->geha_morsla_name ?></td>
                            </tr>
                             <tr>
                                <th>اسم المرسل</th>
                                <td><?= $get_all->morsel_name ?> </td>
                            </tr> 
                            <tr>
                                <th>الاولويه</th>
                                <td><?php 
                   if($get_all->awlawya==1){echo 'هام';}elseif($get_all->awlawya==2){echo ' عادي  ';}elseif($get_all->awlawya==0){echo 'هام جدا  ';}  ?> </td>
                            </tr>
                             <tr>
                                <th>تاريخ الاستحقاق</th>
                                <td> <?= $get_all->esthkak_date ?></td>
                            </tr>
                            <tr>
                                <th>ملاحظات</th>
                                <td><?= $get_all->notes ?> </td>
                            </tr>
                            <tr>
                                <th>يحتاج متابعة</th>
                                <td> 
                                <?php if ($get_all->need_follow==1) {
                echo  'نعم';
            } else if ($get_all->need_follow==2){
                echo 'لا' ;
            }
            ?>
                                </td>
                            </tr>
                            <tr>
                                <th> 
نوع الخطاب</th>
                                <td> <?= $get_all->no3_khtab_n ?></td>
                            </tr>
                            <tr>
                                <th>المجلد</th>
                                <td><?= $get_all->folder_name ?> </td>
                            </tr>
                            </tbody>
                        </table>
                </div>
                <div class="col-md-3">
                    <div class="left-archive-aside">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">الوقت المستغرق</h5>
                            </div>
                            <div class="panel-body">
                                <table class="table minutes-table">
                                    <tbody>
                                    <tr>
                                    <?php  
                                    // $date1 = $get_all->date_ar;
                                    // $date2 = $get_all->suspend_date_ar;
                                    // $diff = abs(strtotime($date2) - strtotime($date1));
                                    // $years = floor($diff / (365*60*60*24));
                                    // $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                    // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                    // printf("%d years, %d months, %d days\n", $years, $months, $days); 
                                    $then =  $get_all->date_ar;
                                    $now=$get_all->suspend_date_ar;
$then = new DateTime($then);
$now = new DateTime($now);
$sinceThen = $then->diff($now);
//Combined
// echo $sinceThen->y.' years have passed.<br>';
// echo $sinceThen->m.' months have passed.<br>';
// echo $sinceThen->d.' days have passed.<br>';
// echo $sinceThen->h.' hours have passed.<br>';
// echo $sinceThen->i.' minutes have passed.<br>';
?>
                                        <td><?= $sinceThen->i ?></td>
                                        <td><?= $sinceThen->h ?></td>
                                        <td><?= $sinceThen->d ?></td>
                                        <td><?= $sinceThen->m ?></td>
                                        <td><?=  $sinceThen->y ?></td>
                                    </tr>
                                    <tr>
                                        <td>دقيقة</td>
                                        <td>ساعة</td>
                                        <td>يوم</td>
                                        <td>شهر</td>
                                        <td>سنه</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">الكود المختصر</h5>
                            </div>
                            <div class="panel-body">
                                <p> <?= $get_all->code;?> </p>
                            </div>
                        </div> -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">تمت الإضافة بواسطة</h5>
                            </div>
                            <div class="panel-body">
                                <h5>  <?= $get_all->current_form_user_name;?></h5>
                                <p><?= $get_all->date_ar;?>
                                </p>
                                <p></p>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><i class="fa fa-folder-o"></i> قصاصات </h5>
                            </div>
                            <div class="panel-body">
                            <?php
                            if (isset($morfqat) && !empty($morfqat)){
                            } else{?>
                                <p> لايوجد أى مستندات حتى الأن </p><?php }?>
                            </div>
                        </div>
                    </div>
                </div>
               </div>                  
            </div>
            

            <div class="tab-pane" id="pag2" role="tabpanel">
            <!--<p>
              <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="float:right;">
              <i class="hvr-buzz-out fa fa-plus" aria-hidden="true">
                         </i>
                ادراج مرفق جديد</a>
            </p>-->
<div class="row" style="    height: 40px;">
<!--    <div class="collapse multi-collapse" id="multiCollapseExample1">-->
        <div class="col-xs-12 ">
<div class="col-xs-1 ">
        </div>
<div class="col-xs-10 ">
<div class="panel panel-default">
<div class="panel-body">
          <input type="hidden" id="row" name="row" value="<?= $get_all->id; ?>">
         <div class="col-md-4 ">
                        <label class="label  ">اسم المرفق </label>
                        <input type="text"   name="title[]" id="title"
                               class="form-control testButton inputclass"
                               style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                               onclick="$(this).attr('readonly','readonly'); $('#Modal_morfq').modal('show'); get_details_morfq();"
                               onblur="$(this).attr('readonly','readonly')"
                               onkeypress="return isNumberKey(event);"
                               readonly>
                               <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                        <button type="button" data-toggle="modal" data-target="#Modal_morfq"
                        onclick="get_details_morfq()"
                                class="btn btn-success btn-next">
                            <i class="fa fa-plus"></i></button>
                    </div>
        <div class="col-md-4 col-sm-4 padding-4">
                          <label class="label"> المرفق</label>
         <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
         </div>
                     <div class="col-xs-2 text-center" style="margin-top: 29px;">
          <?php if( $get_all->suspend!=4){ ?>
          <button type="button"
                        class="btn btn-labeled btn-sm btn-success "  onclick="upload_img(<?= $get_all->id; ?>)"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ المرفق
                </button>
          <?php }else{?>
            <button type="button"
                        class="btn btn-labeled btn-success "  disabled
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <span  class="label-danger"> عذرا...  لا يمكنك إضافة مرفقات نظرا لانتهاء المعامله         </span>
          <?php }?>
                </div>
</div>
        <div class="col-xs-1 ">
        </div>
</div>
</div>
        </div>
<!--    </div>-->
</div>
<!-- yara -->
<div class="clearfix"></div><br>
<div class="col-xs-12" id="morfaq_result">
                <?php
                if (isset($morfqat) && !empty($morfqat)){
                    $x=1;
                    $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                    if (isset($folder_path) && !empty($folder_path)){
                        $folder= $folder_path;
                    } else{
                        $folder ='';
                    }
                    ?>
                <table class="table example table-bordered table-striped table-hover">
                    <thead>
                      <tr class="greentd">
                          <th>م</th>
                          <th>نوع الملف</th>
                          <th>اسم الملف</th>
                          <th> الملف</th>
                          <th>الحجم</th>
                          <th>التاريخ</th>
                          <th>بواسطة</th>
                          <th>الاجراء</th>
                      </tr>
                    </thead>
                    <tbody >
                    <?php
                    foreach ($morfqat as $morfaq){
                        $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                       //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';
                        $Destination = $folder .'/'.$morfaq->file;
                        if (file_exists($Destination)){
                            $bytes=  filesize($Destination) ;
                        } else{
                            $bytes ='';
                        }
                         $size = '';
                        if ($bytes >= 1073741824)
                        {
                            $size = number_format($bytes / 1073741824, 2) . ' GB';
                        }
                        elseif ($bytes >= 1048576)
                        {
                            $size = number_format($bytes / 1048576, 2) . ' MB';
                        }
                        elseif ($bytes >= 1024)
                        {
                            $size = number_format($bytes / 1024, 2) . ' KB';
                        }
                        elseif ($bytes > 1)
                        {
                            $size = $bytes . ' bytes';
                        }
                        elseif ($bytes == 1)
                        {
                            $size = $bytes . ' byte';
                        }
                        else
                        {
                            $size = '0 bytes';
                        }
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td>
                                <?php
                                if (in_array($ext,$image)){?>
                                <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                               <?php } elseif (in_array($ext,$file)){?>
                                <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>
                              <?php  }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($morfaq->title)){
                                    echo $morfaq->title;
                                } else{
                                    echo 'لا يوجد ' ;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (in_array($ext,$image)){
                                    ?>
                                    <a data-toggle="modal" data-target="#myModal-view-<?= $morfaq->id ?>">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    <!-- modal view -->
                                    <div class="modal fade" id="myModal-view-<?= $morfaq->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?= base_url().$folder .'/'.$morfaq->file?>"
                                                         width="100%" alt="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal view -->
                                <?php
                                } elseif (in_array($ext,$file)){
                                    ?>
                                    <a target="_blank" href="<?=base_url()."all_secretary/archive/wared/Add_wared/read_file/".$morfaq->file?>">
                                        <i class="fa fa-upload" title=" قراءة"></i> </a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?= $size?>
                            </td>
                            <td>
                                <?php
                                if (!empty($morfaq->date_ar)){
                                    echo $morfaq->date_ar;
                                } else{
                                    echo 'غير محدد  ' ;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($morfaq->publisher_name)){
                                    echo $morfaq->publisher_name;
                                } else{
                                    echo 'غير محدد  ' ;
                                }
                                ?>
                            </td>
                            <td>
                            <!-- <a href="<?= base_url().$folder.'/'.$morfaq->file?>" download>  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a> -->
                                <i class="fa fa-trash" style="cursor: pointer"
                                   onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->wared_id_fk ?>)"></i>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
                </div>
<!-- yara -->
            </div>
            <div class="tab-pane" id="pag3" role="tabpanel">
            <div class="col-xs-12 no-padding">
             <div class="col-xs-1 no-padding">
             </div>
             <div class="col-xs-10 no-padding">
            <div class="panel panel-default">
<div class="panel-body">
          <div class="col-md-4 col-sm-3 col-xs-6">
           <label class="label">ربط المعاملة بصادر أو وارد رقم </label>
           <input type="text" class="form-control" style="width:85%; float: right; " name="mo3mla_id_fk" id="mo3mla_id_fk" />
           <input type="hidden" name="type" id="type" 
                       value=""
                       class="form-control "
                       data-validation-has-keyup-event="true" readonly/>
           <button type="button" data-toggle="modal" data-target="#myModalrelation" class="btn btn-success btn-next" 
               style=""
           >
                <i class="fa fa-plus"></i>  </button>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-6" style="    margin-top: 26px;">
         <div  id="div_add_relation" style="display: block;">
<?php if(($get_all->suspend!=4)){?>
        <button type="button" 
        <?php if ($get_all->reply_moamla==2){ echo 'disabled';}?>
               onclick="add_relation(<?= $get_all->rkm ?>)"
         class="btn btn-labeled btn-sm btn-success " name="save" value="save">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ العلاقة 
        </button>
        <?php }else{?>
    <button type="button"
                class="btn btn-labeled btn-success "  disabled
                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
        <span  class="label-danger"> عذرا...  لا يمكنك إضافة علاقات نظرا لانتهاء المعامله         </span>
  <?php }?>
</div>
<div  id="div_update_relation" style="display: none;">
<?php if(($get_all->suspend!=4) ){?>
        <button type="button" class="btn btn-labeled btn-yellow " name="save" value="save" id="update_relation">
            <span class="btn-label"><i class="fa fa-search-plus"></i></span> تعديل 
        </button>
        <?php }else{?>
            <button type="button" class="btn btn-labeled btn-yellow " name="save" value="save" id="update_relation" disabled>
            <span class="btn-label"><i class="fa fa-search-plus"></i></span> تعديل 
        </button>
        <span  class="label-danger"> عذرا...  لا يمكنك إضافة علاقات نظرا لانتهاء المعامله         </span>
  <?php }?>
</div>    
</div>
</div>
</div>
</div>
<div class="col-xs-1 no-padding">
</div>                
</div>
<div class="col-xs-12 text-center" style="margin-top: 15px;">
</div>
<div id="my_relation">
<br>
<br>
<?php
          //  echo '<pre>'; print_r($reasons_settings);
            if (!empty($relations)) { ?>
                <table id="example8" class=" example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                    <th class="text-center"> م</th>
                        <th class="text-center">رقم المعامله</th>
                        <th class="text-center">نوع المعامله</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($relations as $value) {
                        ?>
                        <tr>
                            <td><?= $x ?></td>
                            <td><?= $value->mo3mla_rkm ?></td>
                            <td><?php if($value->type==1){echo 'وارد';} else{echo 'صادر';} ?></td>
                            <td>
                              <a href="#" onclick="delete_relation(<?= $value->id ?>,<?= $value->wared_id_fk ?>);"> <i class="fa fa-trash"> </i></a>
                            <a href="#" onclick="update_relation(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php
                   $x++; }
                    ?>
                    </tbody>
                </table>
            <?php } ?>
</div>
            </div>
<div class="tab-pane" id="pag4" role="tabpanel">
    <div class="col-xs-9 no-padding">
    <div class="panel panel-default">
<div class="panel-heading"></div>
<div class="panel-body">
    <?php
if (isset($item) && !empty($item)) {
$mohma_name=$item->mohma_name;
$subject=$item->subject;
$awlawya=$item->awlawya;
$esthkak_date=$item->esthkak_date;
$from_user_id=$item->from_user_id;
$from_user_name=$item->from_user_name;
$to_user_id=$item->to_user_id;
$to_user_name=$item->to_user_name;
} else {
$mohma_name='';
$subject='';
$awlawya='';
$esthkak_date=date('Y-m-d');
$from_user_id='';
$from_user_name='';
$to_user_id='';
$to_user_name='';
}
?>
<div class="col-xs-12 no-padding">
    <input type="hidden" class="form-control" name="wared_id_fk" id="wared_id_fk" style="width: 101.33%;float: right;" value="<?= $get_all->rkm ?>"  />
    <input type="hidden" class="form-control" name="rkm" id="rkm" style="width: 101.33%;float: right;"  value="<?=$last_rkm?>"  disabled />
        <!--start 6-2-2020 rehab.dev---------------------------------------->
        <div class="form-group  col-md-4 padding-4">
            <label class="label ">    اسم المهمه</label>
            <input type="text" id="mohma_name" name="mohma_name"
                    value="<?= $mohma_name ?>"
                   class="form-control" data-validation="required"
                   style="cursor:pointer; width:85%;float: right;" autocomplete="off"
                   onclick="$(this).attr('readonly','readonly'); $('#Modal_mohema_n').modal('show');get_details_mohema_n();"
                   onblur="$(this).attr('readonly','readonly')"
                   onkeypress="return isNumberKey(event);"
                   readonly>
            <input type="hidden" name="mohema_fk" id="mohema_fk" value="" >
            <button type="button" data-toggle="modal" data-target="#Modal_mohema_n"
                    onclick="get_details_mohema_n()"
                    class="btn btn-success btn-next">
                <i class="fa fa-plus"></i></button>
        </div>
        <!--start Modal_mohema_n ----------------------------------------------->
        <div class="modal fade" id="Modal_mohema_n" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 85%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title ">  اسم المهمه </h4>
                    </div>
                    <div class="modal-body">
                        <div id="mohema_n_show">
                            <div class="col-sm-12 form-group">
                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-3  col-md-3 padding-4 ">
                                        <button type="button" class="btn btn-labeled btn-success "
                                                onclick="$('#mohema_n_input').show(); show_add()"
                                                style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                            <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                            اضافه  أسم المهمه
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-12 no-padding form-group">
                                    <div id="mohema_n_input" style="display: none">
                                        <div class="col-sm-3  col-md-5 padding-2 ">
                                            <label class="label   ">   اسم المهمه </label>
                                            <input type="text" name="mohema" id="mohema" data-validation="required"
                                                   value=""
                                                   class="form-control ">
                                            <input type="hidden" class="form-control" id="s_id" value="">
                                        </div>
                                        <div class="col-sm-3  col-md-2 padding-4" id="div_add_mohema" style="display: block;">
                                            <button type="button" onclick="add_mohema($('#mohema').val())"
                                                    style="    margin-top: 27px;"
                                                    class="btn btn-labeled btn-success" name="save" value="save">
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>
                                        <div class="col-sm-3  col-md-3 padding-4" id="div_update_mohema" style="display: none;">
                                            <button type="button"
                                                    class="btn btn-labeled btn-success " name="save" value="save" id="update_mohema">
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div id="myDiv_mohemat"><br><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end Modal_mohema_n-------------------------------------------------->
        <!--end 6-2-2020----------------------------------------------->
        <!-- <div class="col-md-3 col-sm-3 col-xs-6">
           <label class="label">اسناد الي</label>
           <input type="text" class="form-control" style="width:85%; float: right;"   name="to_user_name" id="to_user_name" value="<?= $to_user_name ?>"/>
           <input type="hidden" name="to_user_id" id="to_user_id" value="<?= $to_user_id ?>"
               value="" class="form-control "
               data-validation-has-keyup-event="true" readonly>
           <button type="button" data-toggle="modal" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                <i class="fa fa-plus"></i>  </button>
         </div> -->
                 <!--  -->
                 <div class="col-md-4 col-sm-3 ">
                     <label class="label">اسناد الي</label>
                     <input type="text" class="form-control"
                     placeholder=" حدد المستخدم أو القسم" type="text" style="width: 85%;float: right;"
                               name="to_user_n" id="to_user_n"  
                               readonly="readonly"
                               onclick="$('#tahwelModal').modal('show'); "
                               value="">
                        <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                        <input type="hidden" name="tawel_id" id="tawel_id" value="">
                        <button type="button"
                                onclick="$('#tahwelModal').modal('show');"
                                class="btn btn-success btn-next" >
                            <i class="fa fa-plus"></i></button>
                 </div>
                 <!--  -->
                 <div class="form-group col-sm-3">
                    <label class="label ">الاولويه</label>
                    <select  name="awlawya"  data-validation="required" id="awlawya"
                            class="form-control">
                        <option value="">إختر</option>
                        <?php
                        $arr = array(2=>'عادي',1 => 'هام', 0 => ' هام جدا');
                        foreach ($arr as $key => $value) {
                            $select = '';
                            if ($awlawya != '') {
                                if ($key == $awlawya) {
                                    $select = 'selected';
                                }
                            } ?>
                            <option
                                    value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
              </div>
               </div>
                  <div class="col-xs-12 no-padding">
                <div class="col-md-3 col-sm-4 padding-4">
                  <label class="label"> تاريخ الاستحقاق</label>
                  <input type="date" class="form-control" placeholder="" id="esthkak_date" name="esthkak_date"  data-validation="required" value="<?= $esthkak_date ?>"/>
                </div>
                <div class="col-md-8 col-sm-4 padding-4">
                  <label class="label">الموضوع</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="" value="<?= $subject ?>"/>
                </div>
     </div>
     </div>
</div>
     </div>
     <div class="col-xs-3 no-padding" >
                   <div class="panel panel-default" style="height: 150px; overflow-y: scroll;">
<div class="panel-heading"> <i class="fa fa-users" aria-hidden="true"></i> قائمة المستلمين</div>
<div class="panel-body recived-names">
<ol  id="thwel_emp">
                     </ol>
</div>
</div>
                </div>  
     <br/>
     <br/>
     <br/>
     <div class="col-xs-12 text-center" style="margin-top: 0px;">
     <div  id="div_add_travel_type" style="display: block;">
     <?php if(($get_all->suspend!=4)){?>
                <button type="button" 
                       onclick="add_mohma(<?= $get_all->rkm ?>)"
                       <?php if ($get_all->need_follow==2){ echo 'disabled';}?>
                 class="btn btn-labeled btn-success " name="save" value="save">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اسناد المهمه
                </button>
                <?php }else{?>
                    <button type="button" disabled
              class="btn btn-labeled btn-success " name="save" value="save">
                 <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اسناد المهمه
             </button>
        <span  class="label-danger"> عذرا...  لا يمكنك إضافة تحويل نظرا لانتهاء المعامله         </span>
  <?php }?>
     </div>
     <div  id="div_update_travel_type" style="display: none;">
     <?php if(($get_all->suspend!=4)){?>
                <button type="button" class="btn btn-labeled btn-yellow " name="save" value="save" id="update_travel_type">
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span> تعديل المهمه
                </button>
                <?php }else{?>
                    <button type="button" class="btn btn-labeled btn-yellow " name="save" value="save" id="update_travel_type" disabled>
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span> تعديل المهمه
                </button>
        <span  class="label-danger"> عذرا...  لا يمكنك تعديل  المهمه نظرا لانتهاء المعامله         </span>
  <?php }?>
      </div>  
     </div>
<div id="my">
<br>
<br>
<?php
                  //  echo '<pre>'; print_r($reasons_settings);
                    if (!empty($record)) { ?>
                        <table id="example8" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">رقم المعامله</th>
                                <th class="text-center">الموضوع</th>
                                <th class="text-center"> نوع الاجراء</th>
                                <th class="text-center">محول من</th>
                                <th class="text-center">محول الي</th>
                                <th class="text-center">تاريخ التحويل</th>
                                <th class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($record as $value) {
                                ?>
                                <tr>
                                    <td><?= $value->rkm ?></td>
                                    <td><?= $value->subject ?></td>
                                    <td><?= $value->mohma_name ?></td>
                                    <td><?= $value->from_user_name ?></td>
                                    <td><?= $value->to_user_name ?></td>
                                    <td><?= $value->esthkak_date ?></td>
                                    <td>
                                      <a href="#" onclick="delete_travel_type(<?= $value->id ?>,<?=$value->wared_id_fk;?>);"> <i class="fa fa-trash"> </i></a>
                                    <a href="#" onclick="update_travel_type(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } ?>
</div>
</div>
            <div class="tab-pane" id="pag5" role="tabpanel">
            <div class="col-xs-12 no-padding">
    <?php   echo form_open_multipart('technical_support/tazkra/tazkra_comments/Tazaker_comments/add_comment/'.$get_all->id );?> 
        <div class="col-xs-9 ">
         <div class="col-md-4 ">
                     <label class="label">اسناد الي</label>
                     <input type="text" class="form-control"
                     placeholder=" حدد المستخدم أو القسم" type="text" style="width: 78%;float: right;"
                               name="to_twgeh_n" id="to_twgeh_n"  
                               readonly="readonly"
                               onclick="$('#twgehModal').modal('show');load_twgeh(); "
                               value="">
                        <button type="button"
                                onclick="$(twgehModal).modal('show');load_twgeh();"
                                class="btn btn-success btn-next" >
                            <i class="fa fa-plus"></i></button>
           </div> 
              <div class="col-md-6 ">
                     <label class="label">توجيه - رد</label>
                    <textarea class="form-control" rows="1" name="tazkra_comment"
                           id="tazkra_comment"  data-validation="required" ></textarea>
              </div>
     <div class="col-md-2 ">
     <label></label>
        <?php if($get_all->suspend!=4){?>
            <button style="margin-top: 25px;" class="btn btn-success btn-labeled" type="button" name="add" value="add" onclick="add_comment(<?php echo $get_all->id?>)"
            ><span class="btn-label"><i class="fa fa-reply"></i></span>توجيه </button>
            <?php }else{?>
        <button class="btn btn-success btn-labeled" type="button" name="add" value="add" 
        disabled><span class="btn-label" ><i class="fa fa-reply" ></i></span>توجيه</button>
        <span  class="label-danger"> عذرا...  لا يمكنك إضافة تحويلات نظرا لانتهاء المعامله         </span>
  <?php }?>
        </div>
        </div>
            <div class="col-xs-3 ">
        <div class="panel panel-default" style="height: 150px; overflow-y: scroll;">
<div class="panel-heading"><i class="fa fa-users" aria-hidden="true"></i>
قائمة المستلمين</div>
<div class="panel-body recived-names">
<ol  id="twgeh">
                     </ol>
</div>
</div>  
        </div>
    </div>
    <?php
        echo form_close();
        ?>  
<div id="myDiv">
            <div class="comments-sec">
    <div class="col-xs-12 no-padding">
        <h5>التوجيهات/التاشيرات</h5>
        <div class="well col-xs-12 no-padding">
            <div class="col-md-9 padding-4">
            <?php
  //  echo '<pre>'; print_r($result);
    if(isset($results)&&!empty($results)){
        foreach ($results as $row){
            ?>
                <article class="reply-comment">
                    <div class="reply-img">
                    <img src="<?php if( isset($_SESSION['user_login_image']) && $_SESSION['user_login_image']!= null ){
                            if ($_SESSION['role_id_fk'] == 3) {
                echo base_url().'uploads/human_resources/emp_photo/thumbs/'.$_SESSION['user_login_image'];
              }else {
                echo base_url().'uploads/images/'.$_SESSION['user_login_image'];
              }
                            }else {
                                echo base_url().'asisst/admin_asset/img/avatar5.png';
                             }
                            ?>"
               class="img-circle" width="45" height="45" alt="user">
                    </div>
                    <div class="reply-comment ">
                        <h5 class="name"><span class="label label-inverse"><?= $row->publisher_name;?> </span> <?= $row->date_ar;?> 
                        <!-- <a type="button" class="btn btn-danger btn-xs"  href="<?= base_url() . "technical_support/tazkra/tazkra_comments/Tazaker_comments/delete_comment/" . $row->id ."/".$row->tazkra_id_fk  ?>" style="float:left;"><i class="fa fa-trash"> </i></a>  -->
                        <div class="btn-group" role="group" aria-label="..." style="float:left;">
                        <?php if($row->publisher==$_SESSION['user_id']){?>
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                            <button type="button" class="btn btn-default"  onclick='delete_comment(<?php echo  $row->id ?>,<?= $row->wared_id_fk ?>)'> <i class="fa fa-trash"> </i></button>
                            <button type="button" class="btn btn-default"  data-toggle="modal"
                                   data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                   </div>
                       <?php } ?>
                        <?php if($row->publisher==$_SESSION['emp_code']){?>
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                            <button type="button" class="btn btn-default"  onclick='delete_comment(<?php echo  $row->id ?>,<?= $row->wared_id_fk ?>)'> <i class="fa fa-trash"> </i></button>
                            <button type="button" class="btn btn-default"  data-toggle="modal"
                                   data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                   </div>
                       <?php } ?>
                         </h5>
                        <p><?= $row->comment;?></p>
                    </div>
                </article>
                <?php } } ?>
            </div>
            <div class="col-md-3 padding-4">
                <div class="bubble-div text-center">
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/comment-bubble.png">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<div>
<!-- model -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 70%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> التعليقات  </h4>
        </div>
        <div class="modal-body" id="details_result">
        </div>
        <div class="modal-footer" style="display: inline-block;width: 100%;">
            <?php
            ?>
            <?php
            //   }
            ?>
            <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
            </button>
        </div>
    </div>
</div>
</div>
            </div>
         
            
            <div class="tab-pane" id="pag7" role="tabpanel">
            </div>
        </div>
        <div class="tab-pane" id="pag6" role="tabpanel">

            <!-- yara -->
            <?php if (isset($edite) && !empty($edite) ) {
           $data_load["item"]= $edite;
          
          //  $data_load["secret"]= $secret;
           $data_load['emp_dep']=$emp_dep;

        
     $this->load->view('admin/all_secretary_view/archive_v/wared/add_wared', $data_load);
         }?>
            <!-- yara -->
            </div>
    </div>
    </div>
</div>
</div>
<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">عرض الملف </h4>
        </div>
        <div class="modal-body" > 
        <div class="attachimage">
               </div>
        </div>
    </div>
</div>
</div>
<!-- myModal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title title ">  </h4>
        </div>
        <div class="modal-body">
            <div id="output">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        </div>
    </div>
</div>
</div>
<!-- myModal Modal -->
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title title ">  اسناد مهمه</h4>
        </div>
        <div class="modal-body">
         <div class="panel">
          <div class="panel-heading">
     <!--   <h3 class="panel-title"><?php echo $title ?> </h3> -->
              </div>
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details"  data-toggle="tab"><i class="fa fa-list  fa-2x" style="display: block;text-align: center"></i> الاقسام</a></li>
            <li><a href="#morfqat" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i>الموظفين</a></li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="details">
            <?php
                  //  echo '<pre>'; print_r($reasons_settings);
                    if (!empty($department)) { ?>
                        <table id="example8" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="2%">#</th>
                                <th class="text-center"> القسم</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($department as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                               id="radio"
                                               ondblclick="getTitle_travel_type('<?php echo $value->name; ?>','<?php echo $value->id; ?>')">
                                    </td>
                                    <td><?= $value->name ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="alert alert-danger">لاتوجد بيانات !!</div>
                    <?php } ?>
            </div>
            <div class="tab-pane fade " id="morfqat">
            <?php
                  //  echo '<pre>'; print_r($reasons_settings);
                    if (!empty($employees)) { ?>
                        <table id="example8" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="2%">#</th>
                                <th class="text-center"> الموظفين</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($employees as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                               id="radio"
                                               ondblclick="getTitle_travel_type('<?php echo $value->employee; ?>','<?php echo $value->id; ?>')">
                                    </td>
                                    <td><?= $value->employee ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="alert alert-danger">لاتوجد بيانات !!</div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="myModalrelation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title title ">   ارفاق رقم المعامله</h4>
        </div>
        <div class="modal-body">
         <div class="panel">
          <div class="panel-heading">
              </div>
    <div class="panel-body">
    <!-- new -->
    <?php
                        $k_type_arr =array('1'=>'وارد','2'=>'صادر');
                        if(isset($k_type_arr)&&!empty($k_type_arr)) {
                            foreach($k_type_arr as $key=>$value){ ?>
                            <div class="radio-content">
                                <input  type="radio" name="fe2a"  id="square-radio<?=$key?>"
                                        onclick="GetDiv(<?=$key?>)" value="<?=$key?>"
                                    <?php if(!empty($$key)){
                                        if($$key ==1){?> checked <?php }} ?>>
                                <label for="square-radio<?=$key?>" class="radio-label"><?=$value?></label>
                             </div>
                                <?php
                            }
                        }
                        ?>
                        <div  id="myDiv_x"></div>
    <!-- new -->
        <!-- Nav tabs -->
    </div>
</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        </div>
    </div>
</div>
</div>
<!--  -->
<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title title ">  اسناد الي</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <div class="radio-content">
                <input type="radio" id="esnad3" name="esnad_to"  class="sarf_types" value="3" onclick="load_tahwel()">
                <label for="esnad3" class="radio-label"> اداره</label>
            </div>
            <div class="radio-content">
                <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="2" onclick="load_tahwel()">
                <label for="esnad2" class="radio-label"> قسم</label>
            </div>
            <div class="radio-content">
                <input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel()">
                <label for="esnad1" class="radio-label"> موظف</label>
            </div>
            </div>
            <div class="col-xs-12" id="tawel_result" style="display: none;">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        </div>
    </div>
</div>
</div>
<!--  -->
<!-- yara -->
<div class="modal fade" id="Modal_morfq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title "> اسماء المرفقات </h4>
        </div>
        <div class="modal-body">
            <div id="morfq_show">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-3  col-md-3 padding-4 ">
                            <button type="button" class="btn btn-labeled btn-success "
                                    onclick="$('#geha_input11113').show(); show_add()"
                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span> 
                                اضافه اسم المرفق
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 no-padding form-group">
                        <div id="geha_input11113" style="display: none">
                            <div class="col-sm-3  col-md-5 padding-2 ">
                                <label class="label   ">اسم المرفق  </label>
                                <input type="text" name="morfq" id="morfq" data-validation="required"
                                       value=""
                                       class="form-control ">
                                <input type="hidden" class="form-control" id="s_id" value="">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4" id="div_add_morfq" style="display: block;">
                                <button type="button" onclick="add_morfq($('#morfq').val())"
                                        style="    margin-top: 27px;"
                                        class="btn btn-labeled btn-success" name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                            <div class="col-sm-3  col-md-3 padding-4" id="div_update_morfq" style="display: none;">
                                <button type="button"
                                        class="btn btn-labeled btn-success " name="save" value="save" id="update_morfq">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div id="myDiv_morfq"><br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</div>
</div>
<!-- yara -->
<!--  -->
<script>
function  upload_img(row)
{
    var files = $('#file')[0].files;
    var title = $('#title').val();
    //var row = $('#row').val();
    console.log(title);
    if(files.length==0)
    {
        swal({
title: " برجاء ادخال  المرفق ! ",
type: "warning",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
    }
    else if(title==''){
        swal({
title: " برجاء ادخال   اسم المرفق ! ",
type: "warning",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
    }
    else{
    var error = '';
    var form_data = new FormData();
    for(var count = 0; count<files.length; count++)
    {
        var name = files[count].name;
        var extension = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','png','pdf','PNG','PDF','xls','doc','docx','txt','rar']) == -1)
        {
            error += "Invalid " + count + " Image File"
        }
        else
        {
            form_data.append("files[]", files[count]);
            form_data.append("title",title );
            form_data.append("row",row );
        }
    }
    if(error == '') {
        $.ajax({
            url:"<?php echo base_url(); ?>all_secretary/archive/wared/Add_wared/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
            method:"POST",
            data:form_data,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
                swal({
    title: "جاري الإرسال ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
            $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success:function(data)
            {
               // alert(data);
                 //$('#images').show();
                 swal("تم الحفظ بنجاح !");
                 $('#title').val('');
                 $('#file').val('');
                    get_details(row);
             }
         });
    }
}
}
</script>
<script>
function delete_morfq(id,row) {
//  confirm('?? ??? ????? ?? ????? ????? ?');
   var r = confirm('هل تريد حذف المرفق?');
if (r == true) {
  $.ajax({
      type: 'post',
      url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_morfq',
      data: {id: id,row:row},
      dataType: 'html',
      cache: false,
      success: function (html) {
          //   alert(html);
         // $('#Modal_esdar').modal('hide');
          swal({
              title: "تم الحذف بنجاح!",
}
);
console.log(row);
get_details(row);
      }
  });
}
}
</script>
<script>
function get_details(id) {
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        data: {id: id},
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load",
        beforeSend: function () {
            $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#morfaq_result').html(d);
        }
    });
}
</script>
<script>
function val_id(val_id)
{
    $('#row_id').val(val_id);
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/get_fatora_attach",
        data: {
            val_id: val_id,
        },
        success: function (d) {
            $(".attachimage").html(d);
        }
    });
}
</script>
<!-- twgehat -->
<script>
function get_details_travel_typee(id) {
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_comments",
        data: {id:id},
        // beforeSend: function () {
        //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        // },
        success: function (d) {
            $('#myDiv').html(d);
        }
    });
}
</script>
<script>
function load_page(row_id) {
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_details_comment",
        data: {row_id: row_id},
        success: function (d) {
            $('#details_result').html(d);
        }
    });
}
</script>
<script>
function add_comment(id)
{
var comment=$('#tazkra_comment').val();
var to_user_name = [];
$("input[name='to_twgeh_user_fk_name']").each(function(){
    to_user_name.push(this.value);
    });
    var to_user_id = [];
$("input[name='to_twgeh_user_fk']").each(function(){
    to_user_id.push(this.value);
    });
console.log(to_user_name);
console.log(to_user_id);
console.log(id);
if(comment !='' &&to_user_name !='' )
{
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/add_comment",
          type: "POST",
        data:{id:id,comment:comment,to_user_id:to_user_id,to_user_name:to_user_name},
        beforeSend:function()
            {
                swal({
    title: "جاري الإرسال ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
            
            },
        success:function(d){
          $('#tazkra_comment').val(' ');
          $('li[name="twgeh"]').remove();
          $('input[name="to_twgeh_user_fk"]').remove();
          $('input[name="to_twgeh_user_fk_name"]').remove();
        //  $("#to_twgeh_user_fk").remove();
        // $("#to_twgeh_user_fk_name").remove();
            swal({
title: " تمت الاضافه بنجاح ",
type: "success",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
get_details_travel_typee(id);
        }
    });
   } else{
 //   $('#result').html('برجاء اختيار الموظف');
    swal({
title: " برجاء ادخال كافه البيانات! ",
type: "warning",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
    }
}
</script>
<script>
function delete_comment(id,ticket)
{
    swal({
title: "هل تريد حذف التعليق?",
type: "warning",
showCancelButton: true,
confirmButtonClass: "btn-danger",
confirmButtonText: "نعم",
cancelButtonText: "لا",
closeOnConfirm: false,
closeOnCancel: false
},
function(isConfirm) {
if (isConfirm) {
if(id !=' ')
{
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/delete_comment",
          type: "POST",
        data:{id:id},
        success:function(d){
            swal({
title: " تمت الحذف بنجاح ",
type: "success",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
get_details_travel_typee(ticket);
        }
    });
   }
} else {
swal({
title: "حدث خطا! ",
type: "warning",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
}
});
}
</script>
<script>
function changePage(text,id,title) {
    $('.title').text(text);
    $('#page').data('id', id);
    $('#page').data('title', title);
}
</script>
<script>
function GetName(id, name) {
    var title_fk = $('#page').data("id");
    var title_n = $('#page').data("title");
    $('#' + title_fk).val(name);
    $('#' + title_n).val(name);
    $('#myModal').modal('hide');
}
</script>
<script>
function load_page_morf(type) {
    $.ajax({
        type: 'post',
        url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal' ,
        data: {type:type},
        dataType: 'html',
        cache: false,
        success: function (html) {
            $("#output").html(html);
        }
    });
}
</script>
<script>
function getTitle_travel_type(value,id) {
    $('#to_user_id').val(id);
    $('#to_user_name').val(value);
    $('#myModalInfo').modal('hide');
}
</script>
<script>
function add_mohma(id)
{
var wared_id_fk=id;
var rkm=$('#rkm').val();
var mohma_name=$('#mohma_name').val();
var mohema_fk=$('#mohema_fk').val();
var from_user_id=$('#from_user_id').val();
var from_user_name=$('#from_user_name').val();
var tahwel_type=$('#tahwel_type').val();
//  var to_user_id=$('#to_user_fk').val();
//  var to_user_name=$('#to_user_fk_name').val();
var awlawya=$('#awlawya').val();
var esthkak_date=$('#esthkak_date').val();
var subject=$('#subject').val();
var to_user_name = [];
$("input[name='to_user_fk_name']").each(function(){
    to_user_name.push(this.value);
    });
    var to_user_id = [];
$("input[name='to_user_fk']").each(function(){
    to_user_id.push(this.value);
    });
console.log(to_user_name);
console.log(to_user_id);
if((mohma_name !='') && (to_user_name !='') && (awlawya!='') && (subject!='') )
{
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/add_mohma",
          type: "POST",
        data:{wared_id_fk:wared_id_fk,tahwel_type:tahwel_type,rkm:rkm,mohma_name:mohma_name,mohema_fk:mohema_fk,from_user_id:from_user_id,from_user_name:from_user_name,to_user_id:to_user_id,to_user_name:to_user_name,awlawya:awlawya,esthkak_date:esthkak_date,subject:subject},
        beforeSend:function()
            {
                swal({
    title: "جاري الإرسال ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
            
            },
        success:function(d){
            $('#mohma_name').val('');
            $('#mohema_fk').val('');
$('#from_user_id').val('');
$('#from_user_name').val('');
$('#to_user_fk').val('');
$('#to_user_fk_name').val('');
$('#awlawya').val('');
$('#esthkak_date').val('');
$('#subject').val('');
$('#tahwel_type').val('');
$("#"+to_user_id).remove();
$('li[name=f]').remove();
$("#to_user_fk"+to_user_id).remove();
$("#to_user_fk_name"+to_user_id).remove();
            swal({
title: " تمت الاضافه بنجاح ",
type: "success",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
get_details_thwal_type(wared_id_fk);
        }
    });
   } else{
 //   $('#result').html('برجاء اختيار الموظف');
    swal({
title: " برجاء ادخال البيانات! ",
type: "warning",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
    }
}
</script>
<script>
function get_details_thwal_type(id) {
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        data:{id:id},
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_travel_type",
        beforeSend: function () {
            $('#my').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#my').html(d);
        }
    });
}
</script>
<script>
function update_travel_type(id) {
    var id = id;
    $('#my').show();
    $('#div_add_travel_type').hide();
    $('#div_update_travel_type').show();
    $.ajax({
        url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_travel_type",
        type: "Post",
        dataType: "html",
        data: {id: id},
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
           console.log(obj.mohma_name);
            //$('#travel_type').val(obj.title_setting);
            $('#rkm').val(obj.rkm);
            $('#mohma_name').val(obj.mohma_name);
            $('#mohema_fk').val(obj.mohema_fk);
            $('#tahwel_type').val(obj.tahwel_type);
$('#from_user_id').val(obj.from_user_id);
$('#from_user_name').val(obj.from_user_name);
//  $('#to_user_fk').val(obj.to_user_id);
$('#to_user_n').append("<input type='hidden' id='to_user_fk"+obj.to_user_id+"'  name='to_user_fk' value='"+obj.to_user_id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+obj.to_user_id+"' name='to_user_fk_name' value='"+obj.to_user_name+"'/>");
//  $('#to_user_n').val(obj.to_user_name);
$('#awlawya').val(obj.awlawya);
$('#esthkak_date').val(obj.esthkak_date);
$('#subject').val(obj.subject);
$('li[name=f]').remove();
$("ol").append("<li name=f  id='"+obj.to_user_id+"'>"+obj.to_user_name+"</li>");
        }
    });
    $('#update_travel_type').on('click', function () {
        var rkm=$('#rkm').val();         
var wared_id_fk=$('#wared_id_fk').val();
var tahwel_type=$('#tahwel_type').val();
var mohma_name=$('#mohma_name').val();
var mohema_fk=$('#mohema_fk').val();
var from_user_id=$('#from_user_id').val();
var from_user_name=$('#from_user_name').val();
//var to_user_id=$('#to_user_fk').val();
//  var to_user_name=$('#to_user_n').val();
var awlawya=$('#awlawya').val();
var esthkak_date=$('#esthkak_date').val();
var subject=$('#subject').val();
var to_user_name = [];
$("input[name='to_user_fk_name']").each(function(){
    to_user_name.push(this.value);
    });
    var to_user_id = [];
$("input[name='to_user_fk']").each(function(){
    to_user_id.push(this.value);
    });
    console.log(to_user_name);
console.log(to_user_id);
$.ajax({
        type:'post',
        url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/update_mohma",
          type: "POST",
        data:{id:id,rkm:rkm,tahwel_type:tahwel_type,wared_id_fk:wared_id_fk,mohma_name:mohma_name,mohema_fk:mohema_fk,from_user_id:from_user_id,from_user_name:from_user_name,to_user_id:to_user_id,to_user_name:to_user_name,awlawya:awlawya,esthkak_date:esthkak_date,subject:subject},
        beforeSend:function()
            {
                swal({
    title: "جاري الإرسال ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
            
            },
        success:function(d){
        $('#mohma_name').val(' ');
        $('#mohema_fk').val(' ');
$('#from_user_id').val(' ');
$('#from_user_name').val(' ');
$('#to_user_fk').val(' ');
$('#to_user_n').val(' ');
$('#tahwel_type').val('');
$('#awlawya').val(' ');
$('#esthkak_date').val(' ');
$('#subject').val(' ');
$("#"+to_user_id).remove();
$("#to_user_fk"+to_user_id).remove();
$("#to_user_fk_name"+to_user_id).remove();
            swal({
title: " تمت التعديل بنجاح ",
type: "success",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
get_details_thwal_type(wared_id_fk);
$('#div_add_travel_type').show();
    $('#div_update_travel_type').hide();
        }
    });
    });
}
</script>
<script>
function delete_travel_type(id,fk) {
//  confirm('?? ??? ????? ?? ????? ????? ?');
   var r = confirm('هل تريد حذف المعامله؟');
if (r == true) {
  $.ajax({
      type: 'post',
      url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_travel_type',
      data: {id: id},
      dataType: 'html',
      cache: false,
      success: function (html) {
          swal({
              title: "تم الحذف بنجاح!",
}
);
get_details_thwal_type(fk);
      }
  });
}
}
</script>
<script>
function getTitle_relation(id,rkm) {
    $('#mo3mla_id_fk').val(id);
    $('#type').val(rkm);
    $('#myModalrelation').modal('hide');
}
</script>
<script>
function GetDiv(valu) {
if(valu ==1){
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/get_details_wared",
        data:{valu:valu},
        beforeSend: function () {
            $('#myDiv_x').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#myDiv_x').html(d);
        }
    });
} else if(valu ==2){
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        data:{valu:valu},
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/get_details_sader",
        beforeSend: function () {
            $('#myDiv_x').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#myDiv_x').html(d);
        }
    });
}
}
</script>
<script>
function add_relation(id)
{
var wared_id_fk=id;
var mo3mla_id_fk=$('#mo3mla_id_fk').val();
var type=$('#type').val();
console.log(id);
if(mo3mla_id_fk !='')
{
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/add_relation",
          type: "POST",
        data:{wared_id_fk:wared_id_fk,mo3mla_id_fk:mo3mla_id_fk,type:type},
        beforeSend:function()
            {
                swal({
    title: "جاري الإرسال ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
            
            },
        success:function(d){
            $('#mo3mla_id_fk').val(' ');
            swal({
title: " تمت الاضافه بنجاح ",
type: "success",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
get_details_relation(wared_id_fk);
        }
    });
   } else{
 //   $('#result').html('برجاء اختيار الموظف');
    swal({
title: " برجاء ادخال رقم المعامله! ",
type: "warning",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
    }
}
</script>
<script>
function get_details_relation(id) {
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        data:{id:id},
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_relation",
        beforeSend: function () {
            $('#my_relation').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#my_relation').html(d);
        }
    });
}
</script>
<script>
function update_relation(id) {
    var id = id;
    $('#my_relation').show();
    $('#div_add_relation').hide();
    $('#div_update_relation').show();
    $.ajax({
        url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_relation",
        type: "Post",
        dataType: "html",
        data: {id: id},
        success: function (data) {
            var obj = JSON.parse(data);
            console.log(obj);
            //$('#travel_type').val(obj.title_setting);
            $('#mo3mla_id_fk').val(obj.mo3mla_rkm);
$('#type').val(obj.type);
        }
    });
    $('#update_relation').on('click', function () {
        var mo3mla_id_fk=$('#mo3mla_id_fk').val();
var type=$('#type').val();
var wared_id_fk=$('#wared_id_fk').val();
$.ajax({
        type:'post',
        url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/update_relation",
          type: "POST",
          data:{id:id,mo3mla_id_fk:mo3mla_id_fk,type:type},
          beforeSend:function()
            {
                swal({
    title: "جاري الإرسال ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
            
            },
         success:function(d){
        $('#mo3mla_id_fk').val(' ');
            swal({
title: " تمت التعديل بنجاح ",
type: "success",
confirmButtonClass: "btn-warning",
closeOnConfirm: false
});
get_details_relation(wared_id_fk);
$('#div_add_relation').show();
    $('#div_update_relation').hide();
        }
    });
    });
}
</script>
<script>
function delete_relation(id,fk) {
//  confirm('?? ??? ????? ?? ????? ????? ?');
   var r = confirm('هل تريد حذف المعامله؟');
if (r == true) {
  $.ajax({
      type: 'post',
      url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_relation',
      data: {id: id},
      dataType: 'html',
      cache: false,
      success: function (html) {
          swal({
              title: "تم الحذف بنجاح!",
}
);
get_details_relation(fk);
      }
  });
}
}
</script>
<!--  -->
<script>
function load_tahwel() {
    $('#tawel_result').show();
    var type = $('input[name=esnad_to]:checked').val();
  //  alert(type);
    $('#tahwel_type').val(type);
    $.ajax({
        type: 'post',
        url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel' ,
        data: {type:type},
        dataType: 'html',
        cache: false,
        success: function (html) {
            $("#tawel_result").html(html);
        }
    });
}
</script>
<script>
function GettahwelName(id,name) {
    var checkBox = document.getElementById("myCheck"+id);
    var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
if (checkBox.checked == true){
// $('#text111').hide();
$("#thwel_emp").append("<li  name=f id='"+id+"'>"+name+"</li>");
$('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");
//$('#to_user_fk').val(id);
//  $('#to_user_n').append(name);
} else {
$("#"+id).remove();
$("#to_user_fk"+id).remove();
$("#to_user_fk_name"+id).remove();
  //  $('#to_user_id').val(id);
    //$('#to_user_n').val(name);
   // $('#tahwelModal').modal('hide');
}
}
</script>
<script>
function get_details_morfq() {
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_morfq",
        beforeSend: function () {
            $('#myDiv_morfq').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#myDiv_morfq').html(d);
        }
    });
}
</script>
<script>
function getTitle_morfq(value,id) {
    //$('#travel_type_fk').val(id);
    $('#title').val(value);
    $('#Modal_morfq').modal('hide');
}
</script>
<script>
function add_morfq(value) {
  $('#div_update_morfq').hide();
  $('#div_add_morfq').show();
  //  alert(value);
  if (value != 0 && value != '' ) {
      var dataString = 'morfq=' + value ;
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_morfq',
          data: dataString,
          dataType: 'html',
          cache: false,
          success: function (html) {
            //  $('#reason').val(' ');
            $('#morfq').val('');
          //  $('#Modal_esdar').modal('hide');
              swal({
                  title: "تمت الاضافه!",
  }
  );
  get_details_morfq();
          }
      });
  }
}
</script>
<script>
function update_morfq(id) {
    var id = id;
    $('#geha_input11113').show();
    $('#div_add_morfq').hide();
    $('#div_update_morfq').show();
    $.ajax({
        url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_morfq",
        type: "Post",
        dataType: "html",
        data: {id: id},
        success: function (data) {
            var obj = JSON.parse(data);
            //console.log(obj);
           console.log(obj.title);
            $('#morfq').val(obj.title);
        }
    });
    $('#update_morfq').on('click', function () {
        var morfq = $('#morfq').val();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_morfq",
            type: "Post",
            dataType: "html",
            data: {morfq: morfq,id: id},
            success: function (html) {
                //  alert('hh');
                $('#morfq').val('');
                $('#div_update_morfq').hide();
                $('#div_add_morfq').show();
               // $('#Modal_esdar').modal('hide');
                swal({
                    title: "تم التعديل!",
    }
    );
    get_details_morfq();    
            }
        });
    });
}
</script>
<script>
    function delete_morfqqq(id) {
    //  confirm('?? ??? ????? ?? ????? ????? ?');
         var r = confirm('هل انت متاكد من الحذف ?');
    if (r == true) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                //   alert(html);
                $('#morfq').val('');
               // $('#Modal_esdar').modal('hide');
                swal({
                    title: "تم الحذف!",
    }
    );
    get_details_morfq();
            }
        });
    }
}
</script>
<!---6-2-2020 rehab.dev mohema_n scripts ---------------------------------------------------->
<script>
    function get_details_mohema_n() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/load_mohemat",
            beforeSend: function () {
                $('#myDiv_mohemat').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_mohemat').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_mohema(value,id) {
        $('#mohema_fk').val(id);
        $('#mohma_name').val(value);
        $('#Modal_mohema_n').modal('hide');
    }
</script>
<script>
    function add_mohema(value) {
        $('#div_update_mohema').hide();
        $('#div_add_mohema').show();
        //  alert(value);
        if (value != 0 && value != '' ) {
            var dataString = 'mohema_n=' + value ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_mohema_n',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#mohema').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحفظ!",
                        }
                    );
                    get_details_mohema_n();
                }
            });
        }
    }
</script>
<script>
    function update_mohema(id) {
        var id = id;
        $('#mohema_n_input').show();
        $('#div_add_mohema').hide();
        $('#div_update_mohema').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/getById_mohema_n",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#mohema').val(obj.title);
            }
        });
        $('#update_mohema').on('click', function () {
            var mohema_n = $('#mohema').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/update_mohema",
                type: "Post",
                dataType: "html",
                data: {mohema_n:mohema_n,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#mohema').val('');
                    $('#div_update_mohema').hide();
                    $('#div_add_mohema').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_details_mohema_n();
                }
            });
        });
    }
</script>
<script>
    function delete_mohema(id) {
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/delete_mohema',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#mohema').val('');
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحذف!",
                        }
                    );
                    get_details_mohema_n();
                }
            });
        }
    }
</script>
<!--end 6-2-2020---------------------------------------------------------------------->
<script>
function load_twgeh() {
    $('#twgeh_result').show();
  //  alert(type);
    $.ajax({
        type: 'post',
        url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_twgeh' ,
        dataType: 'html',
        cache: false,
        success: function (html) {
            $("#twgeh_result").html(html);
        }
    });
}
</script>
<script>
function GettwgehName(id,name) {
    var checkBox = document.getElementById("myCheck"+id);
if (checkBox.checked == true){
// $('#text111').hide();
$("#twgeh").append("<li  name='twgeh' id='"+id+"'>"+name+"</li>");
$('#to_twgeh_n').append("<input type='hidden' id='to_twgeh_user_fk"+id+"'  name='to_twgeh_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_twgeh_user_fk_name"+id+"' name='to_twgeh_user_fk_name' value='"+name+"'/>");
//$('#to_user_fk').val(id);
//  $('#to_user_n').append(name);
} else {
$("#"+id).remove();
$("#to_twgeh_user_fk"+id).remove();
$("#to_twgeh_user_fk_name"+id).remove();
  //  $('#to_user_id').val(id);
    //$('#to_user_n').val(name);
   // $('#twgehModal').modal('hide');
}
}
</script>
<div class="modal fade"  id="twgehModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title title ">  اسناد الي</h4>
        </div>
        <div class="modal-body">
            <div class="col-xs-12" id="twgeh_result" style="display: none;">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        </div>
    </div>
</div>
</div>