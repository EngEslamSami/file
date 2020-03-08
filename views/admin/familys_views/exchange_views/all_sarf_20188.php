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
</style>
<div class="col-xs-12 ">
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
                       width="100%">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الصرف</th>
                        <th class="text-center">اسم بند المساعدة</th>
                        <th class="text-center">تاريخ الصرف</th>
                        <th class="text-center">طريقة الصرف</th>
                        <th class="text-center">عبارة عن</th>
                        <th class="text-center">خلال شهر</th>
                        <th class="text-center">اجمالي المبلغ</th>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">إعدادات بيانات ملف ونموذج البنك</th>
                        <th class="text-center">التحميل</th>
                        
                         <th class="text-center">الإجراء</th>
                        <th class="text-center">حالة الصرف</th>
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
                                <button data-toggle="modal" data-target="#modal-sm-data"
                                        onclick="get_details('<?= $record->sarf_num ?>');" class="btn btn-xs btn-info">
                                    التفاصيل
                                </button>
                            </td>
                            <td>
                                <?php 
                                if($record->approved == 4){
                                   $Modal =  '#';
                                }else{
                                    $Modal = 'myModal'; 
                                }
                                
                                
                                if ($record->method_type == 2) { ?>
                                    <a type="button" class="btn btn-danger btn-xs">
                                        لايوجد تاريخ إرسال وصرف</a>
                                <?php } else { ?>
                                    <a type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                       data-target="#<?php echo $Modal;  ?><?= $record->id ?>">
                                       
                                      
                                      
                                      
                                      <?php 
                                      
                                      if( isset( $record->due_date ) and $record->due_date != null){?>
                                        تاريخ الإرسال <?php  echo date('Y-m-d',$record->due_date) ?>
                                        تاريخ الصرف <?php  echo date('Y-m-d',$record->cashing_date)  ?>
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
                            <td>
                             <?php if($record->method_type != 2){?>
                                <a href="<?php echo base_url() . 'family_controllers/Exchange/exportBankCheat/' . $record->sarf_num ?>"
                                   title="تحميل ملف البنك ">
                                    <i class="fa fa-download " aria-hidden="true"></i> </a>

                                 <?php } else { ?>
                             
                                 <a href="<?php echo base_url() ;?>family_controllers/Exchange/to_word/<?php echo $record->sarf_num;?> "
                                    onclick="download_check2(<?php echo $record->id;?>);" title="تحميل الشيك  ">
                                     <i class="fa fa-download " aria-hidden="true"></i> </a>
                                <?php } ?>    
                                

                                
                                
                                  
                            </td>
                            
                            
   <td>
   
   
 <a target="_blank" title="طباعه النموذج" href="<?php echo base_url() ;?>family_controllers/Exchange/SarfPrint/<?php echo $record->sarf_num;?>">
<i style="font-size: 18px;"  class="fa fa-print" aria-hidden="true"></i></a>  
   
<!-- button toggle-->
  <button type="button" data-toggle="modal"
            data-target="#modal_file" class="btn btn-xs btn-info">
        تحميل ملف
    </button>
    
 
    
    <?php 
    if(isset($record->file_downloded)  and $record->file_downloded != null){ ?>
        

          <!--  <a href="<?php echo base_url() ;?>family_controllers/Exchange/download/<?php echo $record->file_downloded;?> "
       onclick="download_file(<?php echo $record->sarf_num;?>);  ">
        <i class="fa fa-download " aria-hidden="true"></i> </a>
         -->

    <a target="_blank" href="<?php echo base_url() ;?>family_controllers/Exchange/read_file/<?php echo $record->file_downloded;?> "

      >
        <i style="font-size: 18px;"  class="fa fa-eye"></i>
    </a>
        
<!--  <a target="_blank" title="طباعه النموذج" href="<?php echo base_url() ;?>family_controllers/Exchange/SarfPrint/<?php echo $record->sarf_num;?>">


<i style="font-size: 18px;"  class="fa fa-print" aria-hidden="true"></i></a>      
    -->    
        
   <?php }  ?>
   
 
   
<a href="#" title="رفع رد البنك"
       onclick="#">
        <i style="font-size: 18px;" class="fa fa-upload  " aria-hidden="true"></i> </a>    
    

    <!-- button toggle-->  


   
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
                <a href="<?php echo base_url() . 'family_controllers/Exchange/updateSarfStatus/'.$record->sarf_num.'/'.$record->approved ?>"
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
        <div class="modal fade" id="myModal<?= $record->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
                <div class="modal-content">
                    <form
                        action="<?php echo base_url('family_controllers/Exchange/updateSarfToAproved') . '/' . $record->id ?>"
                        method="post" class="has-validation-callback">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">اعتماد الصرف</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 20px">
                                <div class=" col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاريخ الإستحقاق (تاريح الإرسال) </label>
                                        <input type="date" name="due_date" value="<?php if ($record->due_date != 0) {
                                            echo date("Y-m-d", $record->due_date);
                                        // echo $record->due_date;
                                        } ?>" class="form-control half input-style" placeholder="/ ---/--- /--"
                                               data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاريخ الصرف </label>
                                        <input type="date" name="cashing_date"
                                               value="<?php if ($record->cashing_date != 0) {
                                                   echo date("Y-m-d", $record->cashing_date);
                                              //   echo  $record->cashing_date;
                                               } ?>" class="form-control half input-style" placeholder="/ ---/--- /--"
                                               data-validation="required">
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
                    <div class="form-group col-md-4 col-sm-6 padding-4">
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


                </div>
            </div>
            <div class="modal-footer col-xs-12">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    اغلاق
                </button>
                <button type="submit" class="btn btn-primary  " name="update">حفظ
                </button>
            </div>
            <?php echo form_close() ?>

        </div>
    </div>
</div>

  
  
  	
	<!-- تحميل الملف -->



    <!-- Modal -->
    <div id="modal_file" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> تحميل ملف</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('family_controllers/Exchange/add_sarf_file/'.$record->sarf_num); ?>



                        <div class="col-sm-8">
                            <label class="label label-green  half" style="width: 25%!important;">المرفق </label>
                            <input type="file" name="file_downloded" data-validation="required" accept="application/pdf"  class="form-control half input-style"  style="width: 75%!important;">
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
    function get_details(sarf_num_fk) {
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