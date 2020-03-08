<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
</style>
<?php if(isset($result) && $result!=null){
    $form= form_open_multipart("family_controllers/Exchange/updateExchange/".$result->id);
    $family_name= $result->name;
    $approved =$result->approved;
    $national_card_id =$result->national_card_id;

    $mostafed =$result->mostafed;
    $yatem =$result->yatem;
    $armal =$result->armal;
    $bank_id_fk =$result->bank_id_fk;
    $bank_account_num =$result->bank_account_num;
    $bank_account_name =$result->bank_account_name;
    $bank_account_card_id =$result->bank_account_card_id;
    $value =$result->value;
    $family_member_num =$result->family_member_num;
    $file_num = $result->file_num;
    $validation ='';
    $button ='تعديل ';
    $disabl = 'disabled';
    $opption_select = ' <option value="0">اختر</option>';

    /***************ahmed*/

}else {
    $form = form_open_multipart("family_controllers/Exchange/Exchange");
    $mother_national_num = "";
    $family_name='';
    $approved ='';
    $national_card_id = '';
    $mostafed = '';
    $yatem = '';
    $armal = '';;
    $bank_id_fk = '';
    $bank_account_num = '';
    $bank_account_name = '';
    $bank_account_card_id = '';
    $value = '';
    $family_member_num = '';
    $file_num = '';
    $validation = '';//data-validation="required"
    $button = 'حفظ';
    $disabl = '';
}

?>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php echo $form;?>
            <div class="col-sm-12">
                <h6 class="text-center inner-heading"> البيانات الاساسية </h6>
            </div>

            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                    <input type="text"  class="form-control half input-style"  name="file_num"  data-validation="required" value="<?php echo $file_num;?>" id="file_num"   data-validation="required" onkeyup="CheckFileNum($(this).val())" />
                    <small id="file_num_check"></small>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> اسم العائلة  <strong class="astric">*</strong> </label>
                    <input type="text"  class="form-control half input-style"  name="name" data-validation="required" value="<?php echo $family_name;?>" id="name" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="national_card_id" value="<?= $national_card_id ?>" class="form-control half input-style" id="national_card_id" data-validation="required"  maxlength="10" onkeypress="validate_number(event)" onkeyup="chek_length('national_card_id')" >
                    <small id="national_card_id_span"></small>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد الأرامل<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" class="form-control half input-style" value="<?= $armal ?>" name="armal" id="armal" min="0" data-validation="required" onkeyup="return countmostafed();">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد الأيتام <strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" class="form-control half input-style" value="<?= $yatem ?>" name="yatem" id="yatem" min="0" data-validation="required" onkeyup="return countmostafed();" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد المستفيدين<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" class="form-control half input-style"  value="<?= $mostafed ?>"name="mostafed"  id="mostafed" data-validation="required" min="0" onkeyup="return countmostafed();" >
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد أفراد الاسرة<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" readonly="readonly" class="form-control half input-style" value="<?= $family_member_num ?>"  name="family_member_num" data-validation="required" id="family_member_num" min="0" onkeyup="return countmostafed();" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المبلغ<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" value="<?= $value ?>" class="form-control half input-style" data-validation="required" name="value" id="value" min="0"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php $arr_type =array('','نشط','غير نشط');?>
                    <label class="label label-green  half">الحالة</label>
                    <select  class="form-control half" name="approved" id="approved" data-validation="required" aria-required="true">
                        <option value="">إختر</option>
                        <?php for ($a=1;$a<sizeof($arr_type);$a++){  $select='';   if(isset($approved)){ if($approved == $a){ $select='selected'; } } ?>
                            <option value="<?=$a?>" <?php echo$select?>> <?=$arr_type[$a]?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم صاحب الحساب البنكي<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" value="<?= $bank_account_name ?>" class="form-control half input-style" data-validation="required"  name="bank_account_name">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم هوية صاحب الحساب البنكي<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" value="<?= $bank_account_card_id ?>" class="form-control half input-style"  data-validation="required" name="bank_account_card_id" onkeypress="validate_number(event)" onkeyup="chek_length('bank_account_card_id')" id="bank_account_card_id">
                    <small id="bank_account_card_id_span"></small>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
                    <select name="bank_id_fk" id="bank_id_fk" class="form-control half valid selectpicker" data-validation="required"  data-show-subtext="true" data-live-search="true" >
                        <option value="">إختر</option>
                        <?php
                        if(!empty($banks)){
                            foreach ($banks as $bank){  $select=''; if($bank_id_fk == $bank->id){$select='selected'; }?>
                                <option value="<?php echo $bank->id;?>"<?php echo $select;?>><?php echo $bank->ar_name;?></option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12" >
                    <label class="label label-green  half">رقم الحساب<strong class="astric">*</strong> </label>
                    <input type="text"  maxlength="24" minlength="24"   class="form-control half input-style" data-validation="required"  name="bank_account_num"value="<?= $bank_account_num?>"  id="wakeel_bank_num"   onfocusout="length_hesab_wakeel($(this).val());"  />
                    <small style="color: red;">رقم الحساب لابد أن يكون 24 رقم</small>
                </div>

            </div>
            <div class="col-sm-12 ">
               
                    <button type="submit" class="btn btn-purple w-md m-b-5 " name="register" id="register" value="register">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>
             </div>
             
            <?php  echo form_close()?>
       
       
       <?php if(isset($exchanges) && !empty($exchanges)){?>
       <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">رقم الملف </th>
                                 <th class="text-center">اسم العائلة</th>
                                <th class="text-center">اسم مسئوال الحساب البنكي </th>
                                <th class="text-center">رقم الهوية </th>
                                <th class="text-center">المبلغ </th>
                                 <th class="text-center">إسم البنك </th>
                                <th class="text-center">رقم الحساب البنكي </th>
                                <th class="text-center">حالة الملف</th>
                                <th class="text-center">الاجراء</th>
                               <th class="text-center">تفاصيل</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $x=1;
                            foreach ($exchanges as $record ){?>
                                <tr>
                                    <td><?php echo $x++ ?></td>
                                    <td><?php echo $record->file_num; ?></td>
                                    <td><?php echo $record->name; ?></td>
                                    <td><?php echo $record->bank_account_name; ?></td>
                                    <td><?php echo $record->bank_account_card_id; ?></td>
                                    <td><?php echo $record->value; ?></td>
                                    <td><?php echo $record->bank_name; ?></td>
                                    <td><?php echo $record->bank_account_num; ?></td>
                                    <td>
                                        <?php if($record->approved == 1){
                                            $class ="success";
                                            $value =0;
                                            $title ="نشط";
                                        } elseif($record->approved == 0) {
                                            $class ="danger";
                                            $value =1;
                                            $title ="غير نشط";
                                        }?>
                                        <a href="<?=base_url()."family_controllers/Exchange/ApprovedExchange/".$record->id."/".$value?>
                                      <button type="button" class="btn btn-sm btn-<?=$class?>"><?=$title?></button>
                                        </a>

                                    </td>
                                    <td> <a href="<?php echo base_url('family_controllers/Exchange/updateExchange').'/'.$record->id?>">
                                            <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                        <a href="<?php echo  base_url('family_controllers/Exchange/deleteExchange').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                    
                                    <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $record->id;?>">التفاصيل</button></td>


                                <?php }  ?>
                           
                            </tbody>
                        </table>
                        
                        
       <!------------------------------->
            <?php
            $x=1;
            foreach ($exchanges_pop as $record ){?>
           <div class="modal fade " id="myModal<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myModalLabel">تفاصيل المستفيد</h4>
                       </div>
                       <div class="modal-body">
                           <table class="table table-bordered table-devices">
                               <tbody>
                               <tr>
                                   <th class="info">رقم الملف</th>
                                   <td><?php echo $record->file_num;?></td>
                                   <th class="info">اسم العائلة</th>
                                   <td><?php echo $record->name;?></td>
                               </tr>
                               <tr>
                                   <th class="info">رقم الهوية</th>
                                   <td><?php echo $record->national_card_id;?></td>
                                   <th class="info">عدد الأرامل</th>
                                   <td><?php echo $record->armal;?></td>
                               </tr>
                               <tr>
                                   <th class="info">عدد الأيتام</th>
                                   <td><?php echo $record->yatem;?></td>
                                   <th class="info">عدد المستفيدين</th>
                                   <td><?php echo $record->mostafed;?></td>
                               </tr>
                               <tr>
                                   <th class="info">عدد أفراد الاسرة</th>
                                   <td><?php echo $record->mostafed + $record->yatem + $record->armal;?></td>
                                   <th class="info">المبلغ</th>
                                   <td><?php echo $record->value;?></td>
                               </tr>
                               <tr>
                                   <th class="info">الحالة</th>
                                   <td><?php echo $arr_type[$record->approved];?></td>
                                   <th class="info">إسم صاحب الحساب البنكي</th>
                                   <td><?php echo $record->bank_account_name;?></td>
                               </tr>
                               <tr>
                                   <th class="info">رقم هوية صاحب الحساب البنكي</th>
                                   <td><?php   echo $record->bank_account_card_id;?></td>
                                   <th class="info">رقم الحساب</th>
                                   <td><?php  echo $record->bank_account_num;?></td>
                               </tr>
                               <tr>
                                   <th class="info">إسم البنك</th>
                                   <td><?php  if($bank_details[$record->bank_id_fk]){echo $bank_details[$record->bank_id_fk];}  ?></td>
                               </tr>
                               </tbody>
                           </table>


                           <?php if(!empty($record->sarf_details)){  ?>
                               <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                   <thead>
                                   <tr>
                                       <th class="text-center">م</th>
                                       <th class="text-center">رقم الصرف</th>
                                       <th class="text-center">تاريخ الصرف</th>
                                       <th class="text-center">بند المساعدة</th>
                                       <th class="text-center">المبلغ المصروف</th>
                                   </tr>
                                   </thead>
                                   <tbody class="text-center">
                                   <?php
                                   $total=0;
                                   $a=1; foreach ($record->sarf_details as $record ){
                                       $total +=$record->value;
                                       ?>
                                       <tr>
                                           <td><?php echo $a; ?></td>
                                           <td><?php echo $record->sarf_num_fk;?></td>
                                           <td><?php  if(!empty($record->details)){ echo date('Y-m-d',$record->details->cashing_date); } ?></td>
                                           <td><?php if(!empty($record->details)){echo $record->details->band_name; }?></td>
                                           <td> <?php echo $record->value ?></td>
                                       </tr>
                                       <?php  $a++; } ?>
                                   <tr>
                                       <td colspan="4"> الإجمالي</td>
                                       <td><?php echo $total;?></td>
                                   </tr>
                                   </tbody>
                               </table>


                           <?php }else{ ?>


                               <div class="alert alert-danger col-sm-12">لا توجد مصروفات خاص بهذ المستفيد !!</div>

                           <?php } ?>

                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-danger" style="float:left" data-dismiss="modal">إغلاق</button>
                       </div>
                   </div>
               </div>
           </div>
            <?php }  ?>
     <!------------------------------->                      
                        
                        
                        
                        
                        
       <?php }  ?>
     <!-----------------------------  -->
        </div>
    </div>
</div>



<script>
    function countmostafed() {
        var mostafed =  $('#mostafed').val();

        var yatem =  $('#yatem').val();
        var armal =  $('#armal').val();//mostafed
        if( mostafed == ''){
            mostafed =0;
        }
        if( yatem == ''){
            yatem =0;
        }
        if( armal == ''){
            armal =0;
        }

        var  f_num = parseInt(mostafed) + parseInt(yatem) + parseInt(armal);

        $('#family_member_num').val(f_num);
    }


    function length_hesab_wakeel(length) {
        var len=length.length;

        if(len<24){
            alert(" رقم الحساب  لابد الايقل عن 24 حرف او رقم");

        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
            //  document.getElementById('register').setAttribute("disabled", "disabled");
        }

        if(len==24){

            document.getElementById('register').removeAttribute("disabled", "disabled");
        }

    }
</script>









<script>

    function CheckFileNum(Num) {
        if (Num !=0 &&  Num >0 &&  Num!='') {
            var dataString = 'Num=' + Num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Exchange/Exchange',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    if(JSONObject >0){
                        document.getElementById("file_num_check").style.color = '#F00';
                        document.getElementById("file_num_check").innerHTML = 'الرقم غير متاح أدخل رقم صحيح';
                        document.getElementById("register").setAttribute("disabled", "disabled");
                    }else{
                        document.getElementById("file_num_check").style.color = '#11d63b';
                        document.getElementById("file_num_check").innerHTML = 'رقم الملف متاح ';
                        document.getElementById("register").removeAttribute("disabled", "disabled");
                    }
                }
            });

        }

    }


</script>

<script>

    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("register").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);

        }

        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("register").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }

        if(inchek.length == 10){
            document.getElementById("register").removeAttribute("disabled", "disabled");

        }
    }

</script>


