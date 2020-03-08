
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

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تفاصيل الوار &nbsp;</h3>
            <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
                <span class="">رقم الوارد</span>
            </button>
             <button class="btn btn-success  btn-sm progress-button ">
                <span class=""><?= $get_all->rkm ?> </span>
             </button>
             
             <!-- <button id="cornerExpand" class="btn btn-danger   btn-sm progress-button ">
                <span class="">تم الإنتهاء</span>
            </button> -->
         </div>
        <div class="panel-body" style="min-height: 485px;">
           <div class="vertical-tabs">
			<ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
				<li class="nav-item active">
					<a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i class="fa fa-2x fa-keyboard-o "></i> تفاصيل المعاملة</a>
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


			<div class="tab-content tab-content-vertical">
				<div class="tab-pane active" id="pag1" role="tabpanel">
				  
                   <div class="col-xs-12 no-padding">
                       <div class="col-sm-9 col-xs-12">
                            <table class="table  table-striped table-bordered dt-responsive nowrap">
                                <tbody>
                                <tr>
                                    <th style="width: 110px">رقم الوارد</th>
                                    <td><?= $get_all->rkm ?></td>
                    
                                </tr>
                                <tr>
                   
                    
                                </tr>
                                <tr>
                                    <th> تاريخ الوارد</th>
                                    <td><?= $get_all->wared_date ?></td>
                    
                                </tr>
                                <tr>
                                    <th>تاريخ الاستلام</th>
                                    <td><?= $get_all->estlam_date ?></td>
                    
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
                                    <td> <?= $get_all->tarekt_estlam_name ?></td>
                    
                                </tr>
                                 <tr>
                                    <th>سري للغايه</th>
                                    <td><?php if ($get_all->is_secret==1) {
                    echo  'نعم';
                } else if ($get_all->is_secret==2){
                    echo 'لا' ;
                }
                ?> </td>
                    
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
                                    <td><?= $get_all->folder_path ?> </td>
                    
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
                                            <td>09</td>
                                            <td>08</td>
                                            <td>07</td>
                                            <td>06</td>
                                            <td>05</td>
                                        </tr>
                                        <tr>
                                            <td>ثانية</td>
                                            <td>دقيقة</td>
                                            <td>ساعة</td>
                                            <td>يوم</td>
                                            <td>شهر</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">الكود المختصر</h5>
                                </div>
                                <div class="panel-body">
                                    <p> ACS-ITD-INT-6392-9803-9 </p>
                                    
                                </div>
                            </div>
                    
                    
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">تمت الإضافة بواسطة</h5>
                                </div>
                                <div class="panel-body">
                                    <h5>  alatheer</h5>
                    
                                    <p>2019-07-16 1:56 pm
                                    </p>
                                    <p>IP : 192.168.1.12</p>
                                </div>
                            </div>
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><i class="fa fa-folder-o"></i> قصاصات <a href="#" class="btn btn-default btn-labeled" style="float: left;"><span class="btn-label"><i class="fa fa-plus"></i></span>إضافة</a></h5>
                                </div>
                                <div class="panel-body">
                                    <p> لايوجد أى مستندات حتى الأن </p>
                                    
                                </div>
                            </div>
                    
                    
                        </div>
                    
                    
                    </div>
                   </div>                  

				</div>
				<div class="tab-pane" id="pag2" role="tabpanel">
				<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="float:right;">
  <i class="hvr-buzz-out fa fa-plus" aria-hidden="true">
             </i>
    ادراج مرفق جديد</a>
 
</p>
<div class="row" style="    height: 40px;">

    <div class="collapse multi-collapse" id="multiCollapseExample1">
      
   
    <div class="col-xs-12 ">
    <div class="row" style="    height: 120px;">
 <input type="hidden" id="row" name="row" value="<?= $get_all->id; ?>">
     <div class="col-md-5 ">
     <!-- <label class="label"> اسم المرفق</label>
     <input type="input" name="title[]" id="title_rrr"  class="form-control" data-validation="required"> -->
     <label class="label ">     اسم المرفق</label>
                                <input type="text" class="form-control  testButton inputclass"
                                       name="title[]" id="title"
                                       readonly="readonly"
                                       onclick="$('#myModal').modal('show'); load_page_morf(501);changePage('      اسم المرفق','title', '');"
                                       style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                                       data-validation="required"
                                       value="">
                                <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                                <button type="button"  onclick="$('#myModal').modal('show');load_page_morf(501);changePage('      اسم المرفق','title', '');"
                                        class="btn btn-success btn-next" >
                                    <i class="fa fa-plus"></i></button>
    
     </div>
    
    <div class="col-md-5 col-sm-4 padding-4">
                      <label class="label"> المرفق</label>
     <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
     </div>
     <!-- <button type="button" class="btn btn-success save"  style="padding: 6px 12px;"
                         onclick="upload_img(<?= $get_all->id; ?>)"
                          >حفظ
                 </button> -->
                 <div class="col-xs-2 text-center" style="margin-top: 15px;">
      
      <button type="button"
                    class="btn btn-labeled btn-success "  onclick="upload_img(<?= $get_all->id; ?>)"
                    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
            </div>
     
                 </div>
    </div>
    </div>
  
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
                                        <a target="_blank" href="<?=base_url()."all_secretary/archive/wared/Add_wared/read_file/".$folder.'/'.$morfaq->file?>">
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



           
            <div class="col-md-3 col-sm-3 col-xs-6">
               <label class="label">ارفاق رقم المعامله</label>
               <input type="text" class="form-control" style="width:85%; float: right;"   name="mo3mla_id_fk" id="mo3mla_id_fk" />
               <input type="hidden" name="type" id="type" 
                           value=""
                           class="form-control "
                           data-validation-has-keyup-event="true" readonly/>
               <button type="button" data-toggle="modal" data-target="#myModalrelation" class="btn btn-success btn-next" style="float: right;"
           
               >
                    <i class="fa fa-plus"></i>  </button>
             </div>
 
      
 </div>
 <div class="col-xs-12 text-center" style="margin-top: 15px;">
 <div  id="div_add_relation" style="display: block;">
            <button type="button" 
                
                   onclick="add_relation(<?= $get_all->rkm ?>)"
           
            
          
             class="btn btn-labeled btn-success " name="save" value="save">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
 </div>
 <div  id="div_update_relation" style="display: none;">
            <button type="button" class="btn btn-labeled btn-yellow " name="save" value="save" id="update_relation">
                <span class="btn-label"><i class="fa fa-search-plus"></i></span> تعديل 
            </button>
  </div>    
          
            
            
           

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

        <div class="col-xs-12 no-padding">

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

                    <div class="col-md-1 padding-4">
                      <label class="label">رقم المعاملة</label>
                      <input type="hidden" class="form-control" name="wared_id_fk" id="wared_id_fk" style="width: 101.33%;float: right;" value="<?= $get_all->rkm ?>"  />
                      <input type="text" class="form-control" name="rkm" id="rkm" style="width: 101.33%;float: right;"  value="<?=$last_rkm?>"  disabled />
                    </div>
                    <div class="col-md-4 col-sm-4 padding-4">
                      <label class="label">اسم المهمه</label>
                      <input type="text" class="form-control" placeholder=""  id="mohma_name" name="mohma_name" data-validation="required" value="<?= $mohma_name ?>"/>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">اسناد الي</label>
                       <input type="text" class="form-control" style="width:85%; float: right;"   name="to_user_name" id="to_user_name" value="<?= $to_user_name ?>"/>
                       <input type="hidden" name="to_user_id" id="to_user_id" value="<?= $to_user_id ?>"
                           value="" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                       <button type="button" data-toggle="modal" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i>  </button>
                     </div>
                     <div class="form-group col-sm-2">
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
                    
                   
                    
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label"> تاريخ الاستحقاق</label>
                      <input type="date" class="form-control" placeholder="" id="esthkak_date" name="esthkak_date"  data-validation="required" value="<?= $esthkak_date ?>"/>
                    </div>
                    <div class="col-md-4 col-sm-4 padding-4">
                      <label class="label">الموضوع</label>
                      <input type="text" class="form-control" id="subject" name="subject" placeholder="" value="<?= $subject ?>"/>
                    </div>
              
         </div>
         <div class="col-xs-12 text-center" style="margin-top: 15px;">
         <div  id="div_add_travel_type" style="display: block;">
                    <button type="button" 
                        
                           onclick="add_mohma(<?= $get_all->rkm ?>)"
                   
                    
                  
                     class="btn btn-labeled btn-success " name="save" value="save">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اسناد المهمه
                    </button>
         </div>
         <div  id="div_update_travel_type" style="display: none;">
                    <button type="button" class="btn btn-labeled btn-yellow " name="save" value="save" id="update_travel_type">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span> تعديل المهمه
                    </button>
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
			<div class="col-xs-12 form-group">
				<label class="label ">إضافة</label>
				<textarea class="form-control" rows="3" name="tazkra_comment" id="tazkra_comment"  data-validation="required" ></textarea>
			</div>
			
			<div class="col-md-6 form-group">

			</div>
			<div class="col-md-3 form-group">
                <button class="btn btn-success btn-labeled" type="button" name="add" value="add" onclick="add_comment(<?php echo $get_all->id?>)"
                ><span class="btn-label"><i class="fa fa-reply"></i></span>إرسال</button>
			
                
            
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
        if(isset($result)&&!empty($result)){

           
            foreach ($result as $row){

                ?>
					<article class="reply-comment">
						<div class="reply-img">
							<img src="<?php echo base_url()?>asisst/admin_asset/img/profile-icon.png" class="img-circle">
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
 
                
                <div class="tab-pane" id="pag6" role="tabpanel">
					
				</div>
                
                <div class="tab-pane" id="pag7" role="tabpanel">
					
				</div>



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
         <!--   <h3 class="panel-title"><?php echo $title ?> </h3> -->
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
          data: {id: id},
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
 
    console.log(id);
    if(comment !='')
{
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/add_comment",
              type: "POST",
            data:{id:id,comment:comment},
            success:function(d){
              $('#tazkra_comment').val(' ');
             
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
    title: " برجاء ادخال التعليق! ",
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


 
    console.log(id);
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
       } else{

     //   $('#result').html('برجاء اختيار الموظف');
        swal({
    title: "حدث خطا! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});



        }
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
    var from_user_id=$('#from_user_id').val();
    var from_user_name=$('#from_user_name').val();
    var to_user_id=$('#to_user_id').val();
    var to_user_name=$('#to_user_name').val();
    var awlawya=$('#awlawya').val();
    var esthkak_date=$('#esthkak_date').val();
    var subject=$('#subject').val();
 
    console.log(id);
    if((mohma_name !='') && (to_user_name !='') && (awlawya!='') && (subject!='') )
{
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/add_mohma",
              type: "POST",
            data:{wared_id_fk:wared_id_fk,rkm:rkm,mohma_name:mohma_name,from_user_id:from_user_id,from_user_name:from_user_name,to_user_id:to_user_id,to_user_name:to_user_name,awlawya:awlawya,esthkak_date:esthkak_date,subject:subject},
            success:function(d){
               
                $('#mohma_name').val(' ');
           
$('#from_user_id').val(' ');
  $('#from_user_name').val(' ');
   $('#to_user_id').val(' ');
    $('#to_user_name').val(' ');
  $('#awlawya').val(' ');
   $('#esthkak_date').val(' ');
   $('#subject').val(' ');
             
                swal({
    title: " تمت الاضافه بنجاح ",
    type: "success",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
get_details_travel_type(wared_id_fk);
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
    function get_details_travel_type(id) {
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
$('#from_user_id').val(obj.from_user_id);
  $('#from_user_name').val(obj.from_user_name);
   $('#to_user_id').val(obj.to_user_id);
    $('#to_user_name').val(obj.to_user_name);
  $('#awlawya').val(obj.awlawya);
   $('#esthkak_date').val(obj.esthkak_date);
   $('#subject').val(obj.subject);









            }

        });

        $('#update_travel_type').on('click', function () {
            var rkm=$('#rkm').val();         
    var wared_id_fk=$('#wared_id_fk').val();
    var mohma_name=$('#mohma_name').val();
    var from_user_id=$('#from_user_id').val();
    var from_user_name=$('#from_user_name').val();
    var to_user_id=$('#to_user_id').val();
    var to_user_name=$('#to_user_name').val();
    var awlawya=$('#awlawya').val();
    var esthkak_date=$('#esthkak_date').val();
    var subject=$('#subject').val();
         

    $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/update_mohma",
              type: "POST",
            data:{id:id,rkm:rkm,wared_id_fk:wared_id_fk,mohma_name:mohma_name,from_user_id:from_user_id,from_user_name:from_user_name,to_user_id:to_user_id,to_user_name:to_user_name,awlawya:awlawya,esthkak_date:esthkak_date,subject:subject},
            success:function(d){
            $('#mohma_name').val(' ');
$('#from_user_id').val(' ');
  $('#from_user_name').val(' ');
   $('#to_user_id').val(' ');
    $('#to_user_name').val(' ');
  $('#awlawya').val(' ');
   $('#esthkak_date').val(' ');
   $('#subject').val(' ');
             
                swal({
    title: " تمت التعديل بنجاح ",
    type: "success",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
get_details_travel_type(wared_id_fk);

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
  get_details_travel_type(fk);

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