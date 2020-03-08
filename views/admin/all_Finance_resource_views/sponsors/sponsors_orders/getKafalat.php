

<tr id="<?=$_POST['length']?>">
<!-- <td style="text-align: center!important;">--><?//=$_POST['length']?><!--</td>-->

 <td style=" width:12%;text-align: center!important;">
     

     <select name="kafala_type[]" id="kafala_type<?=$_POST['length']?>" data-validation="required" class=" form-control" >
        <option value="">إختر</option>
    <?php
    if(!empty($kfalat_types) && isset($kfalat_types)) {
        foreach ($kfalat_types as $kfala){ ?>
        <option value="<?php echo $kfala->id;?>"
           ><?php echo $kfala->title;?></option>
    <?php   } } ?>
     </select></td>
    <td style="width:7%;text-align: center!important;">
        <input type="text" class="form-control" name="member_num[]" onkeyup="make_total(<?=$_POST['length']?>)" id="member_num<?=$_POST['length']?>" data-validation="required" >
    </td>
 <td style="width:7%;text-align: center!important;">
     <?php  $kafala_period = array(
                             '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
                             '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => 'سنة',

     );
     ?>
     <select name="kafala_period[]" id="kafala_period<?=$_POST['length']?>" data-validation="required" class=" form-control" >
         <option value="">إختر</option>
         <?php
         foreach ($kafala_period as $key=>$value){
         ?>
             <option value="<?= $key?>"><?= $value?></option>
         <?php }?>


     </select>
 </td>

    <td style="width:10%;text-align: center!important;">
        <input type="text" class="form-control" name="kafala_value[]" onkeyup="make_total(<?=$_POST['length']?>)" id="kafala_value<?=$_POST['length']?>" data-validation="required" >
    </td>

    <td style="width:21%;text-align: center!important;">
        <input type="text" readonly="readonly" class="form-control" name="all_kafala_value[]" id="all_kafala_value<?=$_POST['length']?>" data-validation="required" >

    </td>
    <td style=" width:15%;text-align: center!important;">

        <select name="pay_method[]" id="pay_method<?=$_POST['length']?>" data-validation="required" class=" form-control" onchange="gender_select(<?=$_POST['length']?>)" >
            <option value="">إختر</option>
           <?php $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
            if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
            for($a=1;$a<sizeof($pay_method_arr);$a++){
            ?>
            <option value="<?php echo$a;?>"
                <?php if(!empty($pay_method)){
                    if($a == $pay_method){ echo 'selected'; }
                } ?>> <?php echo $pay_method_arr[$a];?></option >
            <?php
            }
            }
            ?>
        </select>
    </td>
    <td style="text-align: center!important;"><a href="#"  onclick="deleteRow(<?=$_POST['length']?>)"><i class="fa fa-trash" ></i></a></td>

</tr>

<script type="text/javascript">
    function make_total(id)
    {
        // Capture the entered values of two input boxes
        var member_num = document.getElementById('member_num'+id).value;
        var kafala_value = document.getElementById('kafala_value'+id).value;

        // Add them together and display
        var sum = parseInt(member_num) * parseInt(kafala_value);
        if(member_num != '' && kafala_value != ''){
            $('#all_kafala_value'+id).val(sum);
        }else {
            $('#all_kafala_value'+id).val('هناك حقل فارغ');
        }

    }
</script>





<script>

    function deleteRow(id){
        $("#" + id).remove();
    }

    
</script>

