<style>



    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 70px;
        height: 70px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    
    
    
        .btn-abnaa{
        
    background-color: #95c11f;
    border-color: #95c11f;
    }
    .abnaa_class{
        font-size: 15px !important;
        
    padding: 1px 5px;
    
    line-height: 1.5;

  
    border-radius: 2px;
        
    }
    
    
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 5px 0px !important;
    vertical-align: middle !important;
    text-align: center !important;
    font-size: 12px !important;
    font-weight: bold !important;
}

.modal table td input[type=radio] {
    height: 22px;
    width: 22px;
}

.twqeat-table td{
    padding: 0 !important;
    background-color: #fff;
    text-align: center;
}
</style>
<div class="col-xs-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <!------------------------------------------------------------------------------------>
            <?php if (isset($all_data) && !empty($all_data)) { ?>
                <?php $type_family = array("1" => "أسرة", "2" => "بعض الأسر", "3" => "كل الأسر"); ?>
                <?php $type_sarf = array("1" => "مقطوع لأسرة", "2" => "مقطوع لفرد ", "3" => "مخصص لكل فرد"); ?>
                <?php $months = array("1" => "يناير", "2" => "فبراير", "3" => "مارس", "4" => "أبريل", "5" => "مايو",
                    "6" => "يونيو", "7" => "يوليو", "8" => "أغسطس", "9" => "سبتمبر", "10" => "أكتوبر",
                    "11" => "نوفمبر", "12" => "ديسمبر"); ?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                      >
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الصرف</th>
                        <th class="text-center"> بند المساعدة</th>
                        <th class="text-center">الـتاريـخ</th>
                        <th class="text-center">طريقة الصرف</th>
                        <th class="text-center">عبارة عن</th>
                        <th class="text-center"> شهر</th>
                        <th class="text-center"> المبلغ</th>
                       <th class="text-center">التفاصيل</th>
                        <th class="text-center">إعدادات بيانات ملف ونموذج البنك</th>
                      <!--  <th class="text-center">التحميل</th> -->
                        
                         <th class="text-center">الإجراء</th>
                        <th class="text-center">الحــالة</th>
                      <!--  <th class="text-center">الاجراء</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x = 1;
                    /*
                     echo '<pre>';
                    print_r($all_data);
                    echo '<pre>';*/
                    foreach ($all_data as $record) { ?>
                        <tr class="">
                            <td><?php echo $x++ ?></td>
                            <td><?php echo $record->sarf_num; ?></td>
                            <td><?php echo $record->band_name; ?></td>
                            <td><?php echo $record->sarf_date_ar; ?></td>
                            <?php /*if($record->method_type == 2){
                                      echo "<td class='danger'> شيك </td>";
                                      }elseif($record->method_type == 4){
                                      echo "<td class='success'>تحويل </td>";
                                      } */
                            if ($record->method_type == 2) {
                                $sarf_type = 'شيك';
                                $bgcolor = '#e8a50d';
                            } elseif ($record->method_type == 4) {
                                $sarf_type = 'تحويل';
                                $bgcolor = '#3c990b';
                            }
                            ?>
                            <td style="background-color: <?php echo $bgcolor; ?>; color: white;"><?php echo $sarf_type; ?></td>
                            <td><?php echo $record->about; ?></td>
                            <td><?php if (isset($months[$record->mon_melady])) {
                                    echo $months[$record->mon_melady];
                                } ?></td>
                            <td><?php echo $record->total_value; ?></td>
                            <td>   
                            <!--
                              <a data-toggle="modal" data-target="#modal-sm-data" title="التفاصيل"
                                        onclick="get_details('<?= $record->sarf_num ?>');" class="btn btn-xs btn-warning">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </a>-->
                                
                                <a data-toggle="modal" data-target="#modal-sm-data" title="التفاصيل"
                                   onclick="get_details('<?= $record->sarf_num ?>',<?= $record->presence_number ?>);"
                                   class="btn btn-xs btn-warning">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </a>
                                
                                </td>
                            
                              <td>

                                <a type="button" class="btn btn-abnaa btn-xs" data-toggle="modal"
                                   data-target="#myModal<?= $record->id ?>">
                                    <?php
                                    if (isset($record->due_date) and $record->due_date != null) {
                                        ?>
                                        <span style="color: red; font-weight: bold ">الإرسال <?php echo date('Y-m-d', $record->due_date) ?></span> |
                                        <span style="color: #222221;font-weight: bold ">الصرف  <?php echo date('Y-m-d', $record->cashing_date) ?></span>
                                    <?php } else {
                                        ?>
                                        إعداد تاريخ الإرسال وتاريخ الصرف
                                    <?php }

                                    ?>

                                </a>
                            </td>
                            
                            
                          <!--  <td>
                                <?php 
                                if($record->approved == 4){
                                   $Modal =  '#';
                                }else{
                                    $Modal = 'myModalll'; 
                                }
                                
                                
                                if ($record->method_type == 2) { ?>
                                    <a type="button" class="btn btn-danger btn-xs">
                                        لايوجد تاريخ إرسال وصرف</a>
                                <?php } else { ?>
                                    <a type="button" class="btn btn-abnaa btn-xs" data-toggle="modal"
                                       data-target="#<?php echo $Modal;  ?><?= $record->id ?>">
                                       
                                      
                                     
                                      
                                      <?php 
                                      
                                      if( isset( $record->due_date ) and $record->due_date != null){?>
                                        <span style="color: red; font-weight: bold ">الإرسال <?php  echo date('Y-m-d',$record->due_date) ?></span> |   
                                        <span style="color: #222221;font-weight: bold ">الصرف  <?php  echo date('Y-m-d',$record->cashing_date)  ?></span>
                                    <?php   }else{?>
                                        إعداد تاريخ الإرسال وتاريخ الصرف 
                                      <?php }
                                      
                                      ?> 
                                        
                                        </a>
                                <?php } ?>
                                
                                
                      
                                 <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                                        data-target="#exampleModal<?php echo $record->id; ?>">
                                    +
                                </button>
                             
                                           
                                        
                                
                            </td>
                            -->
                            
                            <!--<td>
                             <?php if($record->method_type != 2){?>
                                <a href="<?php echo base_url() . 'family_controllers/Exchange/exportBankCheat/' . $record->sarf_num ?>"
                                   title="تحميل ملف البنك ">
                                    <i class="fa fa-download abnaa_class" aria-hidden="true"></i> </a>

                                 <?php } else { ?>
                             
                                 <a href="<?php echo base_url() ;?>family_controllers/Exchange/to_word/<?php echo $record->sarf_num;?> "
                                    onclick="download_check2(<?php echo $record->id;?>);" title="تحميل الشيك  ">
                                     <i class="fa fa-download abnaa_class" aria-hidden="true"></i> </a>
                                <?php } ?>    
      
                            </td>-->
                            
                            
   <td>
   

 <a target="_blank" title="طباعه النموذج" href="<?php echo base_url() ;?>family_controllers/Exchange/SarfPrint/<?php echo $record->sarf_num;?>">
<i style="font-size: 18px;"  class="fa fa-print abnaa_class" aria-hidden="true"></i></a>  
   
<!-- button toggle-->
 <!-- <button style="width: 28px !important; height: 26px !important;" type="button" data-toggle="modal"
            data-target="#modal_file" class="btn btn-xs btn-add" title="تحميل ملف">
       <i class="fa fa-paperclip abnaa_class" aria-hidden="true"></i>
    </button>
 -->
 <!--
     <button style="width: 28px !important; height: 26px !important;" type="button" data-toggle="modal"
            data-target="#modal_file<?=$record->sarf_num?>" class="btn btn-xs btn-add" title="تحميل ملف">
       <i class="fa fa-paperclip abnaa_class" aria-hidden="true"></i>
    </button>-->
    
    <a  type="button" data-toggle="modal"
            data-target="#modal_file<?=$record->sarf_num?>" class="" title="تحميل النموذج">
       <i class="fa fa-paperclip " aria-hidden="true"></i>
    </a>
    
    
    <?php 
    if(isset($record->file_downloded)  and $record->file_downloded != null){ ?>
        
        
          <?php

        
		
		$image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
        $ext = pathinfo($record->file_downloded, PATHINFO_EXTENSION);
        if (in_array($ext,$image) ){
        

        ?>
            <a data-toggle="modal" data-target="#myModal-view-<?= $record->id ?>">
                <i class="fa fa-eye" title=" قراءة"></i> </a>

            <?php
        }
        else if (in_array($ext,$file)) {
            ?>
       <a target="_blank" href="<?php echo base_url() ;?>family_controllers/Exchange/read_file/<?php echo $record->file_downloded;?> "
       >
           <i style="font-size: 18px;"  class="fa fa-eye abnaa_class"></i>
       </a>
            <?php

        }
        ?>
        <!-- moda view -->
        <div class="modal fade" id="myModal-view-<?= $record->id ?>" tabindex="-1"
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
                        <img src="<?= base_url()."uploads/files/".$record->file_downloded ?>"
                             width="100%">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            إغلاق
                        </button>
                    </div>
                </div>
            </div>
        </div>
 
        
        
        

          <!--  <a href="<?php echo base_url() ;?>family_controllers/Exchange/download/<?php echo $record->file_downloded;?> "
       onclick="download_file(<?php echo $record->sarf_num;?>);  ">
        <i class="fa fa-download " aria-hidden="true"></i> </a>
         -->
<!--
    <a target="_blank" href="<?php echo base_url() ;?>family_controllers/Exchange/read_file/<?php echo $record->file_downloded;?> "

      >

        <i style="font-size: 18px;"  class="fa fa-eye abnaa_class"></i>
    </a>
    -->    
<!--  <a target="_blank" title="طباعه النموذج" href="<?php echo base_url() ;?>family_controllers/Exchange/SarfPrint/<?php echo $record->sarf_num;?>">


<i style="font-size: 18px;"  class="fa fa-print" aria-hidden="true"></i></a>      
    -->    
        
   <?php }  ?>
   
 
   
  
    

    <!-- button toggle-->  

  <?php if($record->method_type != 2){?>
                                <a href="<?php echo base_url() . 'family_controllers/Exchange/exportBankCheat/' . $record->sarf_num ?>"
                                   title="تحميل ملف البنك ">
                                    <i class="fa fa-download abnaa_class" aria-hidden="true"></i> </a>

                                 <?php } else { ?>
                             
                                 <a href="<?php echo base_url() ;?>family_controllers/Exchange/to_word/<?php echo $record->sarf_num;?> "
                                    onclick="download_check2(<?php echo $record->id;?>);" title="تحميل الشيك  ">
                                     <i class="fa fa-download abnaa_class" aria-hidden="true"></i> </a>
                                <?php } ?>  
   
   
   <a href="#" title="رفع رد البنك"
       onclick="#">
        <i style="font-size: 18px;" class="fa fa-upload abnaa_class " aria-hidden="true"></i> </a>  
   </td>                         
                            
                            
                            
                            
                            
              <td>
                <?php
                $suspend = "جارى التنفيذ";
                $btn = 'btn btn-xs btn-sm btn-danger';
                if($record->approved == 4){
                    $suspend = "تم التنفيذ";
                    $btn = 'btn btn-xs btn-sm btn-success';
                }
                ?>
                <a id="excuteSarfButton<?=$record->id?>" href="<?php echo base_url() . 'family_controllers/Exchange/updateSarfStatus/'.$record->sarf_num.'/'.$record->approved ?>"
                   title=" <?=$suspend?>" class="<?=$btn?>">
                    <?=$suspend?>

            </td>
                            
                            <?php /* ?>
                            <td>
                                <?php if($record->method_type != 2){?>
                                <button type="button" data-toggle="modal"
                                        data-target="#modal-sm-data-<?= $record->sarf_num ?>"
                                        class="btn btn-xs btn-sm btn-success">إضافة رقم المحضر
                                </button>
                                <?php }?>
                                <!--<a href="<?= base_url() . "FamilyCashing/UpdateFamilyCashing/" . $record->sarf_num ?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                <a href="<?= base_url() . "FamilyCashing/DeleteFamilyCashing/" . $record->sarf_num ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true"></i></a> -->
                                <a target="_blank"
                                   href="<?= base_url() . "FamilyCashing/PrintSarfType/" . $record->sarf_num . "/" . $record->method_type ?>">
                                    <i class="fa fa-print" aria-hidden="true"></i></a>
                            </td>
                            <?php */ ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <!------------------------------------------------------------------------------------>
        </div>
    </div>
</div>
<?php if (isset($all_data) && !empty($all_data)) { ?>
    <div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-success modal-lg " role="document" style="width: 90%">
            <div class="modal-content ">
                <div class="modal-header ">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>-->
                    <h1 class="modal-title">تفاصيل الصرف </h1>
                </div>
                <div class="modal-body row">
                    <div id="option_details">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div >
        <!-- /.modal-dialog -->
    </div>
    <?php foreach ($all_data as $record): ?>
    <!------------------------------------------------------------------------------------>
            <div class="modal fade" id="myModal<?= $record->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
                <div class="modal-content">
                    <form
                            action="<?php echo base_url('family_controllers/Exchange/updateSarfToAproved') . '/' . $record->id ?>"
                            method="post" class="has-validation-callback">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">إعدادات بيانات ملف ونموذج البنك</h4>
                        </div>
                        <div class="modal-body">

                            <div>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home<?= $record->id ?>" aria-controls="home<?= $record->id ?>"
                                           role="tab" data-toggle="tab">اعتماد
                                            الصرف</a></li>
                                    <li role="presentation">
                                        <a href="#profile<?= $record->id ?>" aria-controls="profile<?= $record->id ?>" role="tab"
                                           data-toggle="tab">التوقيعات</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home<?= $record->id ?>">
                                        <form action="<?php echo base_url('family_controllers/Exchange/updateSarfToAproved') . '/' . $record->id ?>"
                                              method="post" class="has-validation-callback">
                                            <div class="row" style="padding: 20px">
                                                <div class=" col-sm-12 col-xs-12">
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label ">تاريخ الإستحقاق (تاريح
                                                            الإرسال) </label>
                                                        <input type="date" name="due_date"
                                                               value="<?php if ($record->due_date != 0) {
                                                                   echo date("Y-m-d", $record->due_date);
                                                                   // echo $record->due_date;
                                                               } ?>" class="form-control "
                                                               placeholder="/ ---/--- /--"
                                                               data-validation="required">
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label ">تاريخ الصرف </label>
                                                        <input type="date" name="cashing_date"
                                                               value="<?php if ($record->cashing_date != 0) {
                                                                   echo date("Y-m-d", $record->cashing_date);
                                                                   //   echo  $record->cashing_date;
                                                               } ?>" class="form-control "
                                                               placeholder="/ ---/--- /--"
                                                               data-validation="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" name="make_approve" value="add"
                                                            class="btn btn-success">حفظ
                                                    </button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile<?= $record->id ?>">
                                        <?php echo form_open_multipart(base_url() . "family_controllers/Exchange/update_amin_manager/" . $record->id) ?>

                                        <div class="col-md-12">

                                            <table class="table table-bordered twqeat-table">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 60px;"></td>
                                                    <td style="background-color: #3c990b; color: white;">أمين صندوق</td>
                                                    <td><input type="text" name="amin_name"
                                                               id="d_name<?php echo $record->id; ?>"
                                                               style="color: #000;font-size: 18px;"
                                                               value="<?php echo $amin_name; ?>"
                                                               class="form-control bottom-input"
                                                               data-validation="required"
                                                               data-validation-has-keyup-event="true"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="radio" name="toggle"
                                                               id="toggleElement<?php echo $record->id; ?>"
                                                               onchange="toggleStatus(<?php echo $record->id; ?>)"
                                                               style=""></td>
                                                    <td style="background-color: #3c990b; color: white;">رئيس مجلس
                                                        الإدارة
                                                    </td>
                                                    <td><input type="text" name="manager_name"
                                                               id="manager_name<?php echo $record->id; ?>"
                                                               value="<?php echo $manager_name ?>"
                                                               style="color: #000;font-size: 18px;"
                                                               class="form-control bottom-input"
                                                        ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="radio" name="toggle"
                                                               id="toggleElement1<?php echo $record->id; ?>"
                                                               onchange="toggleStatus(<?php echo $record->id; ?>)"
                                                               style=""></td>
                                                    <td style="background-color: #3c990b; color: white;">نائب رئيس مجلس
                                                        الإدارة
                                                    </td>
                                                    <td><input type="text" name="naeb_name"
                                                               id="naeb_name<?php echo $record->id; ?>"
                                                               value="<?php echo $naeb_name ?>"
                                                               style="color: #000;font-size: 18px;"
                                                               class="form-control bottom-input"
                                                            <?php if (empty($naeb_name)) ?>></td>
                                                </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary  " name="update"
                                                    style="float: right;">حفظ
                                            </button>
                                        </div>
                                        <?php echo form_close() ?>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    
    
    
    
    
    <!-------------------------------------------------------------------------------------->
        <div class="modal fade" id="myModalll<?= $record->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
                <div class="modal-content">
                    <form
                        action="<?php echo base_url('family_controllers/Exchange/updateSarfToAproved') . '/' . $record->id ?>"
                        method="post" class="has-validation-callback">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">إعداد تاريخ الإرسال والصرف</h4>
                        </div>
<div class="modal-body">
    <div class="row" style="padding: 20px">
    
        <div class=" col-sm-12 col-xs-12">
        
  <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label  ">تاريخ الإستحقاق (تاريح الإرسال) </label>
                    <input type="date"    name="due_date" id="due_date"
                        value="<?php if ($record->due_date != 0) {
                    echo date("Y-m-d", $record->due_date);
                // echo $record->due_date;
                }else{
                     echo date("Y-m-d");
                } ?>"class="form-control  input-style" placeholder="أدخل البيانات" data-validation="required">
                  
    </div>
    
      <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label  ">تاريخ الصرف </label>
                    <input type="date"   name="cashing_date" id="cashing_date"
                     value="<?php if ($record->cashing_date != 0) {
                           echo date("Y-m-d", $record->cashing_date);
                      //   echo  $record->cashing_date;
                       }else{
                         echo date("Y-m-d");
                       } ?>"
                     
                     class="form-control  input-style" placeholder="أدخل البيانات" data-validation="required">
                  
    </div>   
        
        
        

        </div>
    </div>
</div>
                        <div class="modal-footer">
                            <button type="submit" name="make_approve" value="add" class="btn btn-success">حفظ</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade " id="modal-sm-data-<?= $record->sarf_num ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success modal-lg " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title">رقم المحضر </h1>
                    </div>
                    <div class="modal-body row">
                        <?php echo form_open_multipart("FamilyCashing/UpdatePresence/" . $record->sarf_num); ?>
                        <div class="form-group col-sm-6 ">
                            <div class="form-group col-sm-12 pdd">
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">رقم المحضر </label>
                                    <input type="text" value="<?= $record->presence_number ?>" name="presence_number"
                                           class="form-control half input-style" placeholder="رقم الجلسة"
                                           data-validation="required"/>
                                </div>
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">عام</label>
                                    <input type="text" name="presence_year" value="<?= $record->presence_year ?>"
                                           class="form-control half input-style" placeholder="عام"
                                           data-validation="required"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" name="ADD" value="ADD" class="btn btn-success">حفظ</button>
                        <?php echo form_close() ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        <!-------------- توقيعات ----------------------------------------->
        
        
        <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $record->id; ?>" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <?php echo form_open_multipart(base_url() . "family_controllers/Exchange/update_amin_manager/" . $record->id) ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content col-xs-12 no-padding">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">التوقيعات</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-xs-12 no-padding">

                <div class="col-md-12">
                
                <table class="table table-bordered twqeat-table">
                  <tbody>
                       <tr>
                            <td style="width: 60px;"></td>
                            <td style="background-color: #3c990b; color: white;">أمين صندوق</td>
                            <td> <input type="text" name="amin_name" id="d_name"  style="color: #000;font-size: 18px;"
                               value="<?php //echo $record->amin_name;
                            
                                echo $record->amin_name;
                              
                               
                                ?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true"></td>
                       </tr>
                       <tr>
                            <td><input type="radio" name="toggle" id="toggleElement"
                                   onchange="toggleStatus()" style=""></td>
                            <td style="background-color: #3c990b; color: white;">رئيس مجلس الإدارة</td>
                            <td> <input type="text" name="manager_name" id="manager_name"
                               value="<?php echo $record->manager_name ?>" style="color: #000;font-size: 18px;"
                               class="form-control bottom-input"
                            <?php if (empty($record->manager_name))  /*echo "disabled";*/ ?>></td>
                       </tr>
                       <tr>
                            <td> <input type="radio" name="toggle" id="toggleElement1"
                                   onchange="toggleStatus()" style=""></td>
                            <td style="background-color: #3c990b; color: white;">نائب رئيس مجلس الإدارة</td>
                            <td><input type="text" name="naeb_name" id="naeb_name"
                               value="<?php echo $record->naeb_name ?>" style="color: #000;font-size: 18px;"
                               class="form-control bottom-input"
                            <?php if (empty($record->naeb_name ))  /*echo "disabled";*/ ?>></td>
                       </tr>
                  </tbody>
                </table>
                   <!-- <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">أمين صندوق </label>
                        <input type="text" name="amin_name" id="d_name"
                               value="<?php echo $record->amin_name; ?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">

                        <label class="label top-label">

                            <input type="radio" name="toggle" id="toggleElement"
                                   onchange="toggleStatus()" style="  position: absolute; right: 32px;  top: 4px;">
                            رئيس مجلس الإدارة

                        </label>

                        <input type="text" name="manager_name" id="manager_name"
                               value="<?php echo $record->manager_name ?>"
                               class="form-control bottom-input"
                            <?php if (empty($record->manager_name))  echo "disabled"; ?>>


                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">
                            <input type="radio" name="toggle" id="toggleElement1"
                                   onchange="toggleStatus()" style="  position: absolute; right: 32px;  top: 4px;">
                            نائب رئيس مجلس الإدارة </label>
                        <input type="text" name="naeb_name" id="naeb_name"
                               value="<?php echo $record->naeb_name ?>"
                               class="form-control bottom-input"
                            <?php if (empty($record->naeb_name ))  echo "disabled"; ?>>
                    </div>
                    -->


                </div>
            </div>
            <div class="modal-footer col-xs-12">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    اغلاق
                </button>
                <button type="submit" class="btn btn-primary  " name="update" style="float: right;">حفظ
                </button>
            </div>
            <?php echo form_close() ?>

        </div>
    </div>
</div>

  
  
  	
	<!-- تحميل الملف -->



    <!-- Modal -->
  <!--  <div id="modal_file" class="modal fade" role="dialog"> -->
   <div id="modal_file<?=$record->sarf_num?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> تحميل ملف</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('family_controllers/Exchange/add_sarf_file/'.$record->sarf_num); ?>


<!-- accept="application/pdf" -->
                        <div class="col-sm-8">
                            <label class="label label-green  half" style="width: 25%!important;">المرفق </label>
                            <input type="file" name="file_downloded" data-validation="required"   class="form-control half input-style"  style="width: 75%!important;">
                        </div>
                        <div class="col-sm-4">
                            <input type="submit" id="buttons" name="ADD"
                                   class="btn btn-blue btn-close" value="حفظ"/>
                        </div>
                    <?php echo form_close(); ?>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                </div>
            </div>

        </div>
    </div>

    <!-- تحميل الملف -->     
        
<!----------------------------------------------------------------------->        
        
        
        
    <?php endforeach; ?>
<?php } ?>
<script>
   /* function get_details(sarf_num_fk) {
        var dataString = "sarf_num_fk_tabadol=" + sarf_num_fk;
        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>FamilyCashing/LoadPage',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#option_details").html(html);
            }
        });
    }*/
    
       function get_details(sarf_num_fk, presence_number) {
        var dataString = "sarf_num_fk_tabadol=" + sarf_num_fk + '&presence_number=' + presence_number;
        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>FamilyCashing/LoadPage',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#option_details").html(html);
            }
        });
    }
</script>

<script>
    function download_check(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Exchange/to_word",
            data:{valu:valu},
            success:function(d){


              alert(d);


            }

        });
    }

</script>


<script>

    function toggleStatus(id) {

        if ($('#toggleElement' + id).is(':checked')) {
            $('#manager_name' + id).removeAttr('disabled');
            $('#manager_name' + id).attr("data-validation", "required");
            $('#naeb_name' + id).attr('disabled', 'disabled');
        } else if ($('#toggleElement1' + id).is(':checked')) {

            $('#naeb_name' + id).removeAttr('disabled');
            $('#naeb_name' + id).attr("data-validation", "required");
            $('#manager_name' + id).attr('disabled', 'disabled');
        } else {
        }
    }
/*
    function toggleStatus() {
        //alert("radio 2");

        if ($('#toggleElement').is(':checked')) {

            $('#manager_name').removeAttr('disabled');
            $('#manager_name').attr("data-validation", "required");
            $('#naeb_name').attr('disabled', 'disabled');
            $('#naeb_name').val(" ");
            //alert("radio411142");


        } else if ($('#toggleElement1').is(':checked')) {

            $('#naeb_name').removeAttr('disabled');
            $('#naeb_name').attr("data-validation", "required");
            $('#manager_name').attr('disabled', 'disabled');
            $('#manager_name').val(" ");


        } else {

            //alert("wdujy");

        }
    }

*/
</script>

<script>
/*
    function toggleStatus() {
   

        if ($('#toggleElement').is(':checked')) {

            $('#manager_name').removeAttr('disabled');
            $('#naeb_name').attr('disabled', 'disabled');



        } else if ($('#toggleElement1').is(':checked')) {

            $('#naeb_name').removeAttr('disabled');
            $('#manager_name').attr('disabled', 'disabled');


        } else {

    

        }
    }
*/

</script>

<?php 


if (isset($alert) && $alert != null) { ?>
   <script>
        swal({
            title: "يوجد إذن صرف بإسم <?=$alert['band_name']?>\nبمبلغ  <?=$alert['total_value']?> ريال سعودي",
            text: "هل تريد الصرف؟",
            type: "warning",
            showCancelButton: true, 
            confirmButtonColor: "#DD6B55",
            cancelButtonClass: "btn-danger",
            confirmButtonText: "نعم!",
            cancelButtonText: "لا ! ", 
        }, function(isConfirm){
            if (isConfirm) {
                document.getElementById("excuteSarfButton<?=$alert['id']?>").click();
            }
        });
    </script>
<?php } ?>