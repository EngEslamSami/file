<div class="form-group col-sm-12 col-xs-12">

    <table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>الاسم </th>
            <th> # </th>
        </tr>
        </thead>
        <tbody>
        <?php  if(isset($mother) && !empty($mother) && $mother!=null) {
                $mother_click="";
                if (isset($check) && !empty($check)){
                    if(in_array(0,$check)){ $mother_click="checked";}


                }?>
        <tr>
            <td> <input type="checkbox" name="mother_id" onclick="valid();" class="persons"  value="<?=$mother['mother_national_num_fk']?>"     <?php echo  $mother_click?> /></td>
            <td><?=$mother["full_name"]?></td>
            <td>الام</td>
        </tr>
        <?php }?>
        <?php  if(isset($members) && !empty($members) && $members!=null) {
            foreach ($members as $key) {
                $member_click="";
                if (isset($check) && !empty($check)){
                    if(in_array($key->id,$check)){ $member_click="checked";}
                }
                ?>
                <tr>
                    <td> <input type="checkbox" name="member_id[]" onclick="valid();" class="persons" value="<?=$key->id?>" <?=$member_click?>  /></td>
                    <td><?=$key->member_full_name ?></td>
                    <td>الابناء</td>
                </tr>
            <? }
        }?>
        </tbody>
    </table>
    <div class="form-group col-sm-12">
        <div class="form-group col-sm-6">
            <label class="label label-green  half">العلاقة</label>
            <input type="text" name="relation" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required"  value="<?php if (isset($result)){ echo $result["relation"];}?>" >
            <input type="hidden" name="type" value="1">
            <input type="hidden" name="mother_national_id_fk" value="<?=$mother_national_id_fk?>">
            <?php if (isset($result)){
                 echo '<input type="hidden" name="order_num" value="'.$result['order_num'].'">';
            }?>


        </div>
        <div class="form-group col-sm-6">
            <label class="label label-green  half">اسم المحرم</label>
            <input type="text" name="name_mehrem" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required"  value="<?php if (isset($result)){ echo $result["name"];}?>">
        </div>
    </div>
    <div class="form-group col-sm-12">
        <div class="form-group col-sm-6">
            <label class="label label-green  half">تاريخ الميلاد</label>
            <input type="text"  name="birth_date"  class="form-control half input-style docs-date" data-validation="required" placeholder="أدخل البيانات" value="<?php if (isset($result)){ echo $result["birth_date"];}?>">

        </div>
        <?php $answer = array(1=>'نعم',2=>'لا');?>
        <div class="form-group col-sm-6">
            <label class="label label-green  half">الحج لاول مرة</label>
            <?php
            foreach ($answer as $key => $value) {
                $m_click="";if (isset($result)) { if($key == $result["frist_haj_omra"]) $m_click="checked";}
                ?>
                <input type="radio" name="frist_haj_omra" value="<?=$key?>" data-validation="required" <?=$m_click?>> <?=$value?>&nbsp;&nbsp;&nbsp;
                <?
            }
            ?>
        </div>
    </div>

    <div class="form-group col-sm-12 col-xs-12">
        <button type="submit" name="add_haj" onclick="valid();" value="حفظ" class="btn btn-purple w-md m-b-5">
            <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
    </div>

</div>

<script>
    function valid() {
        var cbs = document.getElementsByClassName("persons");
        var validation =0;
        for (var i = 0; i < cbs.length; i++) {
            if(cbs[i].checked == true){
                validation =validation +1;
            }
        }
        if(validation ==0){
            alert("يجب اختيار شخص على الاقل ");
            $('button[type="submit"]').attr("disabled","disabled");
        }else {
            $('button[type="submit"]').removeAttr("disabled");
        }
    }

</script>

<script type="text/javascript">
    $('.docs-date').datetimepicker({
        locale: {calender: 'ummalqura', lang: 'ar'},
        format: 'DD/MM/YYYY'
    });

    $(function() {
        $.validate({
            validateHiddenInputs: true
        });
    });
</script>