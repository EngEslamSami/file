<?php
$num = $_POST['bank_num'];
if($num>10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
    </div>';

}
elseif($num<=10)
{
   ?>
    <form id="financialform" type="post">
<table class="table table-bordered" width="100%">
    <thead>
    <th>م</th>
    <th style="text-align: center">إسم البنك</th>
    <th style="text-align: center">كود البنك</th>
    <th style="text-align: center">رقم الحساب</th>
    </thead>
    <tbody>
        <?php    for($i=0;$i<$num;$i++){?>
    <tr>
        <td><input type="radio" class="form-control main" name="main"  id="main<?php echo$i;?>" value="1"  /></td>
        <td><select name="bank_account_id[]" id="bank_account_id<?php echo$i;?>" class="form-control "
                 onchange="get_banck_code('#bank_account_id<?php echo$i;?>')">
                <option value="">إختر</option>
                <?php if(!empty($banks)){
                    foreach ($banks as $row){  $select='';  ?>
                        <option value="<?php echo $row->id;?>-<?php echo $row->bank_code;?>"
                            <?php echo $select;?>><?php echo $row->ar_name;?></option>
                    <?php }
                }?>
            </select></td>
        <td> <input type="text" class="form-control "
                                        name="bank_ramz[]" readonly="readonly"   id="bank_account_id<?php echo$i;?>_bank_code"    /></td>
        <td> <input type="text" class="form-control"maxlength="24" minlength="24" 
                    name="bank_account_num[]"  id="bank_account_num<?php echo$i;?>" onfocusout="length_hesab_om($(this).val());"/>
        </td>
    </tr>

    <?php   }?>

    </tbody>
</table>
    </form>
  <?}?>





<script>

    function get_banck_code(myId)
    {
        var MyValue =$(myId).val();
        var valu=MyValue.split("-");
        $(myId +'_bank_code').val(valu[1]);
    }

    function get_banck_code_wakeel(valu2)
    {
        var valu2=valu2.split("-");

        $('#wakeel_bank_code').val(valu2[1]);
    }



    function length_hesab_om(length) {

        /* var len=length.length;

         if(len<24){
         alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");

         }
         if(len>24){
         alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");

         }
         if(len==24){


         }*/

    }
</script>
