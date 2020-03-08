 <?php if(isset($get_school)){?>
    <label class="label label-green  half"> المدرسة <strong class="astric">*</strong></label>  <!-- selectpicker  data-show-subtext="true" data-live-search="true" -->
    <select name="school_id_fk" id="school_id_fk" onchange="out_school(this);" class="form-control half  selectpicker "  data-show-subtext="true" data-live-search="true" data-validation="required"  >
        <option value="">إختر</option>
        <?php  foreach ($schools as $row){ ?>
            <option value="<?php echo $row->id_setting; ?>"><?php echo $row->title_setting; ?></option>
        <?php }?>
    </select> 
 <?php }?>

 <?php if(isset($out_school)){?>
     <label class="label label-green  half"> المدرسة <strong class="astric">*</strong></label>
     <input type="text"   class="form-control half input-style" value="<?=$school_id_fk_value?>" id="school_id_fk" onclick="get_school();">
     <input type="hidden" name="school_id_fk" value="<?=$school_id_fk?>"> 
     <!--
     <select name="school_id_fk" id="school_id_fk" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true" <?php if($member_study_case == 0){echo 'disabled=""'; }?> >
       <option value="">إختر</option>
       <option value="<?=$school_id_fk?>"><?=$school_id_fk_value?></option>
      </select>    -->               
 <?php }?>
 
 <script>
  $('.selectpicker').selectpicker('refresh');
 </script>