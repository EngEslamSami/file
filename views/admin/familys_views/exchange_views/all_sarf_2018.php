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
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
      <!------------------------------------------------------------------------------------>
                  <?php  if(isset($all_data) && !empty($all_data)){ ?>
                <?php $type_family=array("1"=>"أسرة","2"=>"بعض الأسر","3"=>"كل الأسر");?>
                <?php $type_sarf=array("1"=>"مقطوع لأسرة","2"=>"مقطوع لفرد ","3"=>"مخصص لكل فرد");?>
                 <?php $months = array("1" => "يناير","2" => "فبراير","3" => "مارس","4" => "أبريل","5" => "مايو",
                "6" => "يونيو","7" => "يوليو","8" => "أغسطس","9" => "سبتمبر","10" => "أكتوبر",
                "11" => "نوفمبر","12" => "ديسمبر"); ?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الصرف</th>
                        <th class="text-center">اسم بند المساعدة </th> 
                        <th class="text-center">تاريخ الصرف</th>
                        <th class="text-center">طريقة الصرف </th>
                        <th class="text-center">عبارة عن  </th>
                        <th class="text-center">خلال شهر</th>
                        <th class="text-center">اجمالي المبلغ</th>
                        <th class="text-center">التفاصيل </th>
                        <th class="text-center">إعدادات تاريخ الإرسال والصرف </th>
                        
                        
                        <th class="text-center">التحميل </th>
                        <th class="text-center">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1; foreach($all_data as $record){ ?>
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
                                   if($record->method_type == 2){
                                    $sarf_type = 'شيك';
                                    $bgcolor = '#e8a50d';
                                  
                                      }elseif($record->method_type == 4){
                                       $sarf_type = 'تحويل';
                                         $bgcolor = '#3c990b';
                                     
                                      }
                                      
                                      
                                       ?>
                              <td style="background-color: <?php echo $bgcolor; ?>; color: white;"><?php echo $sarf_type; ?></td>
                            <td><?php echo $record->about; ?></td>
                            <td><?php if (isset( $months[$record->mon_melady])){ echo $months[$record->mon_melady];} ?></td>
                            <td><?php echo $record->total_value; ?></td>

                            <td>
                                 <button data-toggle="modal" data-target="#modal-sm-data" onclick="get_details('<?=$record->sarf_num?>');" class="btn btn-xs btn-info">
                                    التفاصيل
                                </button>  
                            </td>
                             <td>
                             <?php if($record->method_type == 2){?>
                              <a type="button" class="btn btn-danger btn-xs" >
                                          لايوجد تاريخ إرسال وصرف</a>
                             <?php }else{?>
                                <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?= $record->id?>">
                                           إعداد تاريخ الإرسال وتاريخ الصرف</a>
                            <?php }?>               
                            </td>
                             <td> <a href="<?php echo base_url().'family_controllers/Exchange/exportBankCheat/'.$record->sarf_num?>" title="تحميل ملف البنك ">
                                   <i class="fa fa-download " aria-hidden="true"></i> </a>
                                   <a href="#" title=" تحميل نموذج البنك ">
                                  <i class="fa fa-download  " aria-hidden="true"></i></a>
                             </td>
                            <td> 
                            <?php if($record->approved == 1){
                                    $class ="success";
                                    $value =0;
                                    $titlee ="تحت التنفيذ";
                                } elseif($record->approved == 2) {
                                    $class ="danger";
                                    $value =1;
                                    $titlee ="تم التنفيذ ";
                                }elseif($record->approved == 0) {
                                    $class ="danger";
                                    $value =1;
                                    $titlee ="مرحلة الاعداد ";
                                }?>

                                 <button type="button" class="btn btn-xs btn-sm btn-<?=$class?>"><?=$titlee?></button>
                               
                                 <button type="button" data-toggle="modal" data-target="#modal-sm-data-<?=$record->sarf_num?>" class="btn btn-xs btn-sm btn-success">إضافة رقم المحضر</button>
                                
                                <!--<a href="<?=base_url()."FamilyCashing/UpdateFamilyCashing/".$record->sarf_num?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                <a href="<?=base_url()."FamilyCashing/DeleteFamilyCashing/".$record->sarf_num?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true"></i></a> -->
                                     <a target="_blank" href="<?=base_url()."FamilyCashing/PrintSarfType/".$record->sarf_num."/".$record->method_type?>" >
                                    <i class="fa fa-print" aria-hidden="true"></i></a>  
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            <?php } ?>
      <!------------------------------------------------------------------------------------>
        </div>
    </div>
</div>        
<?php  if(isset($all_data) && !empty($all_data)){?>
        <div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success modal-lg " role="document">
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
            </div>
            <!-- /.modal-dialog -->
        </div>
      

<?php foreach ($all_data as $record ):?>
        <div class="modal fade" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
        <div class="modal-content">
            <form action="<?php echo base_url('family_controllers/Exchange/updateSarfToAproved').'/'.$record->id ?>" method="post" class="has-validation-callback">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">اعتماد الصرف</h4>
            </div>

            <div class="modal-body">
                <div class="row" style="padding: 20px">

                    <div class=" col-sm-12 col-xs-12">
                    
                      <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">تاريخ الإستحقاق (تاريح الإرسال) </label>
                            <input type="date" name="due_date" value="<?php if($record->due_date !=0){ echo date("Y-m-d",$record->due_date);}?>" class="form-control half input-style" placeholder="/ ---/--- /--" data-validation="required">
                        </div>
                    
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">تاريخ الصرف  </label>
                            <input type="date" name="cashing_date" value="<?php if($record->cashing_date !=0){ echo date("Y-m-d",$record->cashing_date);}?>" class="form-control half input-style" placeholder="/ ---/--- /--" data-validation="required">
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


        <div class="modal fade " id="modal-sm-data-<?=$record->sarf_num?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success modal-lg " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title">رقم المحضر </h1>
                    </div>
                    <div class="modal-body row">
                    <?php echo form_open_multipart("FamilyCashing/UpdatePresence/".$record->sarf_num);?>
                       <div class="form-group col-sm-6 ">
                            <div class="form-group col-sm-12 pdd">
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">رقم المحضر </label>
                                    <input type="text" value="<?=$record->presence_number?>" name="presence_number"  class="form-control half input-style" placeholder="رقم الجلسة" data-validation="required"/>
                                </div>
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">عام</label>
                                    <input type="text" name="presence_year" value="<?=$record->presence_year?>" class="form-control half input-style" placeholder="عام" data-validation="required"/>
                                </div>
                            </div>
                        </div>    
                        
                         
                    </div>
                  
                    <div class="modal-footer ">
                        <button type="submit" name="ADD" value="ADD" class="btn btn-success" >حفظ </button>
                     <?php  echo form_close()?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                   
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
<?php endforeach;  ?>
<?php } ?>  





<script>
    function get_details(sarf_num_fk){
        var dataString =  "sarf_num_fk=" +sarf_num_fk;
         $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>FamilyCashing/LoadPage',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_details").html(html);
            }
        });
    }
</script>