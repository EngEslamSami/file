        <span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php if(isset($title)){ echo $title ;}?></h3>
        </div>
        <?php if(isset($result_id) && !empty($result_id) && $result_id!=null ):
            $out = $result_id;

            $out['form']='all_secretary/Imports/update_secretary_import/'.$result_id['id'];
            $out['input']='update';
            $out['input_title']='تعديل ';
            $out['span']='لعدم تغير الصورة لاتختار شيء ';
            $out['required']='';
            $out['import_num']=$out['import_num'];
            $out['disabled']='disabled';
        else:
            $out =$flelds;
            foreach ($flelds as $key=>$value){
                $out[$value] ="";
            }

            $out['form']='all_secretary/Imports';
            $out['input']='add';
            $out['input_title']='حفظ ';
            $out['span']=' ';
            $out['required']='data-validation="required"';
            $out['import_num']=$last_id+1;
             $out['disabled']='';
        endif;


        ?>




        <div class="panel-body">
            <!---------------------------------------------------------------------------------------->
            <?php $arr_sendto=array('1'=>"باليد",'2'=>"البريد الاكتروني",'3'=>"فاكس",'4'=>"البريد السعودى",'5'=>"اخري");
            $arr_secrit=array("1"=>" سري","2"=>"سري للغاية","3"=>"عاجل","4"=>"اخري"); ?>
            <?php    echo form_open_multipart($out['form'])?>
            <div class="col-sm-12  form-group" >
                <div class="col-sm-3">
                    <label class="label label-green  half">تاريخ الخطاب</label>
                    <input type="date"  name="date" 
                     class="form-control half input-style " 
                      placeholder="شهر / يوم / سنة "<?php echo $out['required'];?> value="<?php if(!empty($out['date'])){ echo date('Y-m-d',$out['date']);}?>">
                </div>
               <div class="col-sm-3">
                    <label class="label label-green  half">تاريخ إستلام الخطاب</label>
                    <input type="date"  name="date_receipt_letter"  
                    class="form-control half input-style " placeholder="شهر / يوم / سنة "<?php echo $out['required'];?> value="<?php echo $out['date_receipt_letter_ar']?>">
                </div>
                <div class="col-sm-3">
                    <label class="label label-green  half">رقم الوارد</label>
                    <input type="number" name="import_num" class="form-control half input-style" value="<?php echo $out['import_num'];?>"<?php echo $out['required'];?>>
                </div>

                <div class="col-sm-3">
                    <label class="label label-green  half">باركود</label>
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/img.png" alt="" class="half r-barcode">
                </div>
            </div>

            <div class="col-sm-12  form-group" >
                <div class="col-sm-6">
                    <label class="label label-green  half">نوع الخدمة</label><?php $arr =array('داخلي','خارجي');
                    foreach ($arr  as $k=>$value){
                        $checked="";
                        if($out['import_type_id_fk'] == $k ){
                            $checked="checked";
                        }

                        $import_type_id_fk =$out['import_type_id_fk'];?>
                        <input type="radio" <?php echo $checked;?> value="<?php echo $k;?>" name="import_type_id_fk" onclick="get_service_type(<?php echo $k;?>);" id="r-in"<?php echo $out['required'];?>  <?=$out['disabled']?> /> <?php echo $value;?>
                    <?php } ?>
                     <?php if($out['disabled'] != ""){
                        echo ' <input type="hidden" name="import_type_id_fk" value="'.$out["import_type_id_fk"].'"/>';
                    }?>

                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">الجهات الوارد اليها</label>
                    <select  name="organization_from_id_fk"   class="choose-date selectpicker form-control half" <?php echo $out['required'];?> aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value=""> بـحــث . . . . </option>
                        <?php if(isset($organizations) && !empty($organizations) && $organizations !=null) {
                            foreach ($organizations as $record):
                                $select="";
                                if($out['organization_from_id_fk'] == $record->id ){
                                    $select="selected";
                                }
                                ?>
                                <option value="<?php echo $record->id ?>" <?php echo $select;?>><?php echo $record->name ?></option>
                            <?php endforeach;
                        }?>
                    </select>
                </div>

            </div>

            <div class="col-sm-12  form-group"  id="imp_div">
                <div class="col-sm-6" <?php if($import_type_id_fk ==1){?> style="display: none" <?php }?>>
                    <label class="label label-green  half">الاقسام</label>
                    <select   name="organization_other[]"  class="choose-date selectpicker form-control half dep" multiple title="يمكنك إختيار أكثر من قسم"<?php echo $out['required'];?> aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value=""> بـحــث . . . . </option>
                        <?php if(isset($departments) && !empty($departments) && $departments !=null) {
                            foreach ($departments as $dep):

                                $unserializ=unserialize($out['organization_other']);
                                $select="";
                                if(in_array($dep->id,$unserializ )){
                                    $select="selected";
                                }

                                ?>
                                <option value="<?php echo $dep->id ?>" <?php echo $select;?>><?php echo $dep->name ?></option>
                            <?php endforeach;
                        }?>
                    </select>
                </div>

                <div class="col-sm-6"  <?php if($import_type_id_fk ==1){?> style="display: none" <?php }?>>
                    <label class="label label-green  half">الموظفين</label>
                    <select name="organization_employee[]"   <?php echo $out['required'];?> class="choose-date selectpicker form-control half dep" multiple title="يمكنك إختيار أكثر من موظف"  aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value=""> بـحــث . . . . </option>
                        <?php if(isset($employees) && !empty($employees) && $employees !=null) {
                            foreach ($employees as $emp):


                                $unserializz =unserialize($out['organization_employee']);
							
                                $select="";
                                if(in_array($emp->id,$unserializz )){
                                    $select="selected";
                                }

                                ?>
                                <option value="<?php echo $emp->id ?>" <?php echo $select;?>><?php echo $emp->employee ?></option>
                            <?php endforeach;
                        }?>
                    </select>
                </div>

            </div>

            <div class="col-sm-12  form-group" >
                <div class="col-sm-6">
                    <label class="label label-green  half">نوع المعاملة</label>
                    <select   name="transaction_id_fk"  id="transaction_id_fk"   class="choose-date selectpicker form-control half"  onchange="get_sub_trans();"<?php echo $out['required'];?> aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value=""> بـحــث . . . . </option>
                        <?php if(isset($transactions) && !empty($transactions) && $transactions !=null) {
                            foreach ($transactions as $record):

                                $select="";
                                if($out['transaction_id_fk'] == $record->id ){
                                    $select="selected";
                                }
                                ?>
                                <option value="<?php echo $record->id ?>" <?php echo $select;?>><?php echo $record->name ?></option>
                            <?php endforeach;
                        }?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label class="label label-green  half">درجة الاهمية</label>
                    <select name="importance_degree_id_fk" class="form-control half"<?php echo $out['required'];?> aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value=""> اختر . . . . </option>
                        <?php if(isset($arr_secrit) && !empty($arr_secrit) && $arr_secrit !=null) {
                            foreach ($arr_secrit as $key=>$value):

                                $select="";
                                if($out['importance_degree_id_fk'] ==$key ){
                                    $select="selected";
                                }
                                ?>
                                <option value="<?php echo $key ?>" <?php echo $select;?>><?php echo $value ?></option>
                            <?php endforeach;
                        }?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="importance_degree_other"  value="<?php echo $out['importance_degree_other'];?>">
                </div>
            </div>

                      <div class="col-xs-12" id="sub_trans">
                <?php  
                 if($out['organization_sub_to_id_fk'] !=0){
                  ?>
                    <?php if(isset($transactions_sub) && $transactions_sub!=null && !empty($transactions_sub)){?>
                        <div class="form-group col-sm-6">
                            <label class="label label-green  half">المعاملة الفرعية </label>
                            <select name="organization_sub_to_id_fk" class=" selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" >
                                <option value=""> - اختر - </option>

                                <?php foreach ($transactions_sub as $sub):
                                  $select=""; if($out["organization_sub_to_id_fk"] == $sub->id){$select="selected";} ?>
                                    <option value="<?php echo $sub->id ?>" <?=$select?> ><?php echo $sub->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    <?php } ?>
                <?php }?>
            </div>

            <div class="col-sm-12  form-group" >
                <div class="col-sm-6">
                    <label class="label label-green  half">رقم القيد</label>
                    <input name="registration_number" type="number" class="form-control half input-style" placeholder="أدخل البيانات" <?php echo $out['required'];?> value="<?php echo $out['registration_number'];?>">
                </div>

                <div class="col-sm-4">
                    <label class="label label-green  half">طريقه التسليم</label>
                    <select name="method_recived_id_fk" class="form-control half"<?php echo $out['required'];?> aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value=""> اختر . . . . </option>
                        <?php if(isset($arr_sendto) && !empty($arr_sendto) && $arr_sendto !=null) {
                            foreach ($arr_sendto as $key=>$value):
                                $select="";
                                if($out['method_recived_id_fk'] ==$key ){
                                    $select="selected";
                                }

                                ?>
                                <option value="<?php echo $key ?>" <?php echo $select;?>><?php echo $value ?></option>
                            <?php endforeach;
                        }?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="method_recived_other"  value="<?php echo $out['method_recived_other'];?>">
                </div>
            </div>

            <div class="col-sm-12  form-group" >
                <div class="col-sm-12">
                    <label class="label label-green  half" style="width: 25% !important">عنوان الخطاب</label>
                    <input name="title" type="text" class="form-control  input-style half" style="width: 75% !important" placeholder="أدخل البيانات" <?php echo $out['required'];?> value="<?php echo $out['title'];?>">
                </div>


            </div>

            <div class="col-sm-12  form-group" >
                <div class="col-sm-12">
                    <label class="label label-green  half" style="width: 25% !important">بشأن</label>
                    <textarea name="about" class="form-control  input-style half" style="width: 75% !important" <?php echo $out['required'];?>> <?php echo $out['about'];?></textarea>

                </div>


            </div>

            <div class="col-sm-12  form-group" >
                <div class="col-sm-12">
                    <label class="label label-green  half" style="width: 25% !important">موضوع الخطاب</label>
                    <textarea name="content" class="form-control  input-style half" style="width: 75% !important" <?php echo $out['required'];?>><?php echo $out['content'];?></textarea>
                </div>


            </div>

             <div class="col-sm-12  form-group "  >
               
                <div class="col-sm-6">
                    <label class="label label-green  half">المرفقات</label>
                    <input type="number" id="attachment"  name="attachment" min="0" max="5" onkeyup="return lood($('#attachment').val(),'#optionearea4','attachment');"   class="form-control half input-style" placeholder="أدخل العدد" >
                </div>

            </div>

          <div class="col-sm-12  form-group" >
             
              <div class="col-xs-6"  id="optionearea4"></div>
               <div class="col-sm-6 " id="optionearea3"></div>
            </div>
            
             <?php  
           /* if($out["import_type_id_fk"] == ""){
                ?>
      
            <div class="col-sm-12  form-group " id="service_type_out" style="display: none;">
                <div class=" col-sm-6">
                    <label class="label label-green  half">المسمى الوظيفى</label>
                    <input type="text" name="chairman_committee_type" class="form-control half input-style " placeholder="أدخل البيانات" >
                </div>
                <div class=" col-sm-6">
                    <label class="label label-green  half"> الاسم</label>
                    <input type="text"  name="chairman_committee_name" class="form-control half input-style " placeholder="أدخل البيانات" >
                </div>
            </div> 
            <?php } */ ?>
            
            
                       <div class="col-sm-12  form-group" >
               
                <div class="col-sm-6 " >
                    <?php  if(isset($get_img) && !empty($get_img) && $get_img !=null) {?>

                        <table style="width:100%" class="table table-striped table-bordered dt-responsive nowrap" >
                            <h4 class="r-table-text text-left"> المرفقات : </h4>
                            <tr>
                                <th>م</th>
                                <th>الاسم</th>
                                <th>المرفق</th>
                                <th>الأجراء</th>
                            </tr>

                            <?php

                            $s=1;
//<embed src="'.base_url().'uploads/files/'.$photo->img.'" width="500" height="375">
//<a href="'.base_url().'uploads/files/'.$photo->img.'" target="_blank"><i class="fa fa-eye" aria-hidden="true"> </i></a>

                          foreach($get_img as $photo) {
                            
                              $img = base_url('uploads/images') . '/' . $photo->img;

                              echo ' <tr>
                                        <td>' . $s . '</td>
                                        <td>' . $photo->title . '</td>
                                        <td>
                                        <a href="'.base_url().'all_secretary/Imports/download/'.$photo->img.'"> <i class="fa fa-cloud-download" aria-hidden="true"></i> </a>
                                       
                                       
                                       
                                       <a href="'.base_url().'all_secretary/Imports/read_file/'.$photo->img.'"  target="_blank" > <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                       
                         
                                        </td>
                                         
                                        <td> <a  href="'.base_url().'all_secretary/Imports/delete_photo_import/'.$photo->id.'/'.$result_id['id'].'"  class="btn btn-xs ">
                                         <i class="fa fa-trash"></i></a></td>                                        
                                         </tr>';
                              $s++;
                          }
                            ?>

                        </table>
                    <?php  }?>
                </div>
                 <div class="col-sm-6 " ></div>
            </div>
                <?php /* if($out["import_type_id_fk"] == 1){?>
            <div class="col-sm-12  form-group " id="" >
                <div class=" col-sm-6">
                    <label class="label label-green  half">المسمى الوظيفى</label>
                    <input type="text" name="chairman_committee_type" value="<?=$out["chairman_committee_type"]?>" class="form-control half input-style type_out" placeholder="أدخل البيانات" >
                </div>
                <div class=" col-sm-6">
                    <label class="label label-green  half"> الاسم</label>
                    <input type="text"  name="chairman_committee_name" value="<?=$out["chairman_committee_name"]?>" class="form-control half input-style type_out" placeholder="أدخل البيانات" >
                </div>
            </div>
            <?php } */ ?>

            <div class="col-sm-12 col-lg-pull-5">
                <button type="submit" name="<?php echo $out['input'];?>"  value="<?php echo $out['input'];?>" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
            </div>
            <?php echo form_close()?>
            <!---------------------------------------------------------------------------------------->
            <?php if (!empty($records)): ?>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center"> م </th>
                        <th class="text-center"> رقم الوارد </th>
                        <th class="text-center"> تاريخ الوارد </th>
                        <th class="text-center"> نوع المعاملة </th>
                        <th class="text-center"> درجة الاهمية </th>
                        <th class="text-center"> الاجراء </th>
                        <th class="text-center"> طباعة  </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $a=1;
                    foreach ($records as $record ): ?>
                        <tr>
                            <td><?php echo $a ?> </td>
                            <td> <?php echo $record->import_num?> </td>
                            <td> <?php echo $record->date_ar; ?> </td>
                            <td>  <?php echo $record->name; ?> </td>
                            <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                            <td><a href="<?php echo base_url('all_secretary/Imports/delete_import').'/'.$record->id ?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true"></i>  </a> <span>/
</span> <a href="<?php echo base_url('all_secretary/Imports/update_secretary_import').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> </td>
                            <td >
                                <button onclick="get_print('<?php echo  $record->id?>','<?php echo  $record->date_ar?>' ,'<?php echo  $record->import_num?>');" 
                                data-toggle="modal" data-target="#myModal"   class="btn btn-success">طباعه الباركود</button>


                            </td>
                        </tr>
                        <?php
                        $a++;
                    endforeach;  ?>


                    </tbody>
                </table>


            <?php endif; ?>
        </div>
    </div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="location.reload();">&times;</button>
        <h4 class="modal-title">نموذج الطباعة </h4>
      </div>
      <div class="modal-body col-sm-12">
       <div class="col-sm-12">
                <div id="div_print" ></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload();">إغلاق</button>
        <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
      </div>
    </div>

  </div>
</div>





<script>



    function get_service_type(type){
        if(type == 0){
            $("#imp_div").show();
			$("#optionearea3").hide();
			$("#optionearea4").hide();
            $("#service_type_in").show();
            $("#service_type_out").hide();
            $(".type_out").removeAttr("data-validation");
            $(".dep").attr("data-validation");
        }else {
			
			$("#tablez").hide();
            $("#imp_div").hide();
			$("#optionearea3").show();
			$("#optionearea4").show();
            $("#service_type_out").show();
            $("#service_type_in").hide();
            $(".type_out").attr("data-validation","required");
            $(".dep").removeAttr("data-validation");

        }
    }
    ///=============================================


</script>




<script>
    function get_print(id ,date ,num){
       var print_id=id;
      var date_export=date;
      var num_post =num ;
        var dataString = 'id=' + print_id + '&type=' + 2 +  "&num="+num_post+"&date="+date_export ;
       $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/Exports/PrintCode',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>



<script>
    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0){
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_secretary/Imports',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                   //alert("ass");
                    $(div).html(html);
                }
            });
            return false;
        }else{
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }
</script>

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
    }
</script>

<script>
    function get_sub_trans() {
        var ProductCode=$('#transaction_id_fk').val();

        if(ProductCode >0 && ProductCode  != '') {
            var dataString = 'main_trans=' + ProductCode ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_secretary/Imports',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    // alert(html);
                    $("#sub_trans").html(html);
                }
            });
            return false;
        }
    }
    //-------------------------------------------------------------

</script>