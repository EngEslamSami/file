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
    $name= $result->name;
    $gender=$result->gender;
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
    $name = '';


    $gender = '';
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

   // $file_num = (isset($file_num))? ($file_num+1): '0' ;

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
                    <input type="text"  class="form-control half input-style"  name="file_num"  data-validation="required"
                        value="<?php echo $file_num;?>"

                           id="file_num"   <?=$validation?> />

                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> اسم المستفيد  <strong class="astric">*</strong> </label>
                    <input type="text"  class="form-control half input-style"  name="name" data-validation="required" value="<?php echo $name;?>" id="name" />

                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php $arr_gender =array('ذكر','انثي');?>
                    <label class="label label-green  half">النوع</label>
                    <?php  for ($d=0;$d<sizeof($arr_gender);$d++){ $check=''; if($d == $gender){$check='checked';}?>
                        <input tabindex="11" type="radio" value="<?php echo $d;?>"  name="gender" data-validation="required" style="margin-right: 10px" <?= $check ?>>
                        <label for="square-radio-1"><?php echo $arr_gender[$d];?></label>
                    <?php } ?>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="national_card_id" value="<?= $national_card_id ?>" class="form-control half input-style" id="national_card_id" data-validation="required"  maxlength="10" >
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد المستفيدين<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" class="form-control half input-style"  value="<?= $mostafed ?>"name="mostafed"  id="mostafed" data-validation="required" min="0" onkeyup="return countmostafed();" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد الأرامل<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" class="form-control half input-style" value="<?= $armal ?>" name="armal" id="armal" min="0" data-validation="required" onkeyup="return countmostafed();">
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد الأيتام <strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" class="form-control half input-style" value="<?= $yatem ?>" name="yatem" id="yatem" min="0" data-validation="required" onkeyup="return countmostafed();" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد أفراد الاسرة<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" readonly="readonly" class="form-control half input-style" value="<?= $family_member_num ?>"  name="family_member_num" data-validation="required" id="family_member_num" min="0" onkeyup="return countmostafed();" >
                </div>





                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
                    <select name="bank_id_fk" id="bank_id_fk" class="form-control half valid" data-validation="required">

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

                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label label-green  half">رقم الحساب<strong class="astric">*</strong> </label>
                        <input type="text"  maxlength="24" minlength="24"   class="form-control half input-style" data-validation="required"  name="bank_account_num"value="<?= $bank_account_num?>"  id="wakeel_bank_num"   onfocusout="length_hesab_wakeel($(this).val());"  />
                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                    </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">اسم صاحب الحساب<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" value="<?= $bank_account_name ?>" class="form-control half input-style" data-validation="required"  name="bank_account_name">
                </div>
				<div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم هوية صاحب الحساب<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" value="<?= $bank_account_card_id ?>" class="form-control half input-style"  data-validation="required" name="bank_account_card_id">
                </div>
              <div class="col-sm-12 col-xs-12" style="padding-right: 0;">
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المبلغ<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" value="<?= $value ?>" class="form-control half input-style" data-validation="required" name="value" id="value" min="0"  >
                </div>
              </div>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-purple w-md m-b-5" name="register" id="register" value="register">

                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>

                </div>
                <?php  echo form_close()?>

            </div>





            <br/>
            <br/>
            <?php if(isset($exchanges)&&$exchanges!=null):?>
            <div class="col-xs-12">
                <div class="panel-body">

                    <div class="fade in active">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">رقم الملف </th>
                                <th class="text-center">اسم المستفيد</th>
                                
                                <th class="text-center">الاجراء</th>
                                <th class="text-center">الحالة</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $x=1;
                            foreach ($exchanges as $record ):?>
                                <tr>
                                    <td><?php echo $x++ ?></td>
                                    <td><?php echo $record->file_num; ?></td>
                                    <td><?php echo $record->name; ?></td>
                                    <td> <a href="<?php echo base_url('family_controllers/Exchange/updateExchange').'/'.$record->id?>">
                                            <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                        <a href="<?php echo  base_url('family_controllers/Exchange/deleteExchange').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
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
                                <?php endforeach;  ?>
                           
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
             <?php endif; ?>
        </div>
    </div>
</div>



<script>

    function get_banck_code(valu)
    {
        var valu=valu.split("-");

        $('#om_bank_code').val(valu[1]);
    }

    function get_banck_code_wakeel(valu2)
    {
        var valu2=valu2.split("-");

        $('#wakeel_bank_code').val(valu2[1]);
    }
</script>

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

    function length_hesab_om(length) {

        var len=length.length;

        if(len<24){
            alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");

        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");

        }
        if(len==24){


        }

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




    function checkPerson_account() {
        var person_account =$('#person_account').val();


        if(person_account ==0){
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_id1").value="";
        }else{

            document.getElementById("bank_account_id1").removeAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");

        }

    }






</script>


