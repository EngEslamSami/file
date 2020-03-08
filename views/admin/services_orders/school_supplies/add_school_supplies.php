<div class="form-group col-sm-12 col-xs-12">

     <div class="form-group col-sm-12">
         <div class="form-group col-sm-6">
             <label class="label label-green  half">الاسم</label>
             <select  name="person_id_fk" class="selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                 <option value="">أختر </option>
                 <?php if(isset( $members) && !empty($members) && $members !=null){
                     foreach($members as $key){
                         $select="";  if (isset($result)){
                             if($result["person_id"] == $key->id){ $select="selected";}  }    ?>
                         <option value="<?=$key->id?>" <?=$select?>><?=$key->member_full_name?> </option>
                     <?php }?>
                 <?php }?>
             </select>
         </div>
         <div class="form-group col-sm-6">
            <label class="label label-green  half">اسم المستلزمات المدرسية</label>
            <select name="school_supplies_id_fk" class="selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                <option value="">أختر </option>
                <?php if(isset( $all_setting) && !empty($all_setting) && $all_setting !=null){
                foreach($all_setting as $row){
                    $select="";  if (isset($result)){
                        if($result["school_supplies_id_fk"] == $row->id_setting){ $select="selected";}  }    ?>
                <option value="<?=$row->id_setting?>" <?=$select?>><?=$row->title_setting?> </option>
                <?php }?>
                <?php }?>
            </select>
            <input type="hidden" name="mother_national_id_fk" value="<?=$mother_national_id_fk?>">
            <?php if (isset($result)){
                echo '<input type="hidden" name="order_num" value="'.$result['order_num'].'">';
            }?>
        </div>

    </div>
   

    <div class="form-group col-sm-12 col-xs-12">
        <button type="submit" name="add_school_supplies" value="حفظ" class="btn btn-purple w-md m-b-5">
            <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
    </div>

</div>

<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
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