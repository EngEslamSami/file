<?php  $num_mother=0; $num_yatem=0; $num_bale3=0;$num_total=0;
            if(isset($all_armal) && !empty($all_armal)){
                $num_mother=sizeof($all_armal);
            }
            if(isset($all_yatem) && !empty($all_yatem)){
                $num_yatem=sizeof($all_yatem);
            }
            if(isset($all_bale3) && !empty($all_bale3)){
                $num_bale3=sizeof($all_bale3);
            }
?>


<?php   if($member_type == 1 && $sarf_type == 1){    //     sarf_type = 1       member_type == 1    ?>
         <?php   if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
       <div class="col-xs-12">
    <div class="form-group col-sm-6 col-xs-12">
        <div class="form-group col-sm-12">
            <label class="label ">إسم الجهة/المستفيد   </label>
            <select name="person_id_fk" class="form-control "  onchange="get_other_person(this.value);pass_person_name($('option:selected',this).text());" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                <option value="">إختر</option>
                <?php if(isset($all_mother_family) && !empty($all_mother_family)){
                              foreach ($all_mother_family as $row_m){  ?>
                <option value="<?=$row_m->mother_national_num_fk?>"><?=$row_m->full_name?></option>
                             <?php }?>
                <?php }?>
                <?php if(isset($all_member_family) && !empty($all_member_family)){
                    foreach ($all_member_family as $row_b){  ?>
                        <option value="<?=$row_b->id?>"><?=$row_b->member_full_name?></option>
                    <?php }?>
                <?php }?>
                <option value="0">أخر</option>
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label class="label ">إسم أخر  </label>
            <input type="text" id="other_person"   name="other_person"  onkeyup="pass_person_name(this.value);" class="form-control  " readonly="" >
        </div>
    </div>
    <div class="form-group col-sm-6 col-xs-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <tr>
                <th class="text-center">مبلغ وقدره </th>
                <td class="text-center"> <?=$due_to_family?>
                 <input type="hidden" name="total_value" value="<?=$due_to_family?>">
                </td>
            </tr>
            <tr>
                <th class="text-center">إسم الجهة/المستفيد </th>
                <td class="text-center" id="td_person_name">
                    <?php if(!empty($data_table[0]->full_name)){
                            echo $data_table[0]->full_name;
                          }else{
                            echo  "إسم الأم غير مضاف";
                          }?>
                </td>
            </tr>
            <tr>  <!---   $num_mother=0; $num_yatem=0; $num_bale3=0;$num_total=0; -->
                <th class="text-center">عبارة عن </th>
                <td class="text-center"><?=$about?>
                    <input type="hidden" name="value[<?=$data_table[0]->mother_national_num?>]"  value="<?=$due_to_family?>" />
                    <input type="hidden" name="about" value="<?=$about?>">
                 <!--     <input type="hidden" name="all_num[]"  value="<?=$num_total?>" />
                    <input type="hidden" name="mother_national_num_fk[]"  value="<?=$data_table[0]->mother_national_num?>" />
                    <input type="hidden" name="file_num[]"  value="<?=$data_table[0]->file_num?>" />  
                    <input type="hidden" name="mother_num[]"  value="<?=$num_mother?>" />
                    <input type="hidden" name="young_num[]"  value="<?=$num_yatem?>" />
                    <input type="hidden" name="adult_num[]"  value="<?=$num_bale3?>" />
                    -->
                </td>
            </tr>
         </table>
     <!--   <div class="form-group col-sm-12">
            <label class="label ">إضافة مرفق  </label>
            <input type="file"   name="bank_attachment" class="form-control  "  >
        </div>-->
    </div>

</div>
    <?php }else{
        echo '<div class="alert alert-danger">
               <strong> لايوجد نتائج مطابقة للبحث!</strong> .
             </div>';
    }?>
<?php   }elseif($member_type == 1 && $sarf_type == 2){    //     sarf_type = 2       member_type == 1    ?>
<?php   if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
    <div class="col-xs-12">
        <div class="form-group col-sm-6 col-xs-12">
            <div class="form-group col-sm-12">
                <label class="label ">إسم الجهة/المستفيد   </label>
                <select  name="person_id_fk" class="form-control " onchange="get_other_person(this.value);pass_person_name($('option:selected',this).text());" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                    <option value="">إختر</option>
                    <?php if(isset($all_mother_family) && !empty($all_mother_family)){
                        foreach ($all_mother_family as $row_m){  ?>
                            <option value="<?=$row_m->mother_national_num_fk?>"><?=$row_m->full_name?></option>
                        <?php }?>
                    <?php }?>
                    <?php if(isset($all_member_family) && !empty($all_member_family)){
                        foreach ($all_member_family as $row_b){  ?>
                            <option value="<?=$row_b->id?>"><?=$row_b->member_full_name?></option>
                        <?php }?>
                    <?php }?>
                    <option value="0">أخر</option>
                </select>
            </div>
            <div class="form-group col-sm-12">
                <label class="label ">إسم أخر  </label>
                <input type="text" id="other_person"   name="other_person"  class="form-control  " readonly="" >
            </div>
        </div>
        <div class="form-group col-sm-6 col-xs-12">

            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <tr>
                    <th class="text-center">        مبلغ وقدره    </th>
                    <td class="text-center"><?=$due_to_member * ($num_mother+$num_yatem+$num_bale3)?>
                        <input type="hidden" name="total_value" value="<?=$due_to_member * ($num_mother+$num_yatem+$num_bale3)?>">
                    </td>
                </tr>
                <tr>
                    <th class="text-center">إسم الجهة/المستفيد </th>
                    <td class="text-center" id="td_person_name">
                        <?php if(!empty($data_table[0]->full_name)){
                            echo $data_table[0]->full_name;
                        }else{
                            echo  "إسم الأم غير مضاف";
                        }?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">عبارة عن </th>
                    <td class="text-center"><?=$about?>
                        <input type="hidden" name="value[<?=$data_table[0]->mother_national_num?>]"  value="<?=$due_to_member * ($num_mother+$num_yatem+$num_bale3)?>" />
                        <input type="hidden" name="about" value="<?=$about?>">
                       
                       <!-- <input type="hidden" name="all_num[]"  value="<?=$num_total?>" />
                        <input type="hidden" name="mother_national_num_fk[]"  value="<?=$data_table[0]->mother_national_num?>" />
                        <input type="hidden" name="file_num[]"  value="<?=$data_table[0]->file_num?>" />
                        <input type="hidden" name="mother_num[]"  value="<?=$num_mother?>" />
                        <input type="hidden" name="young_num[]"  value="<?=$num_yatem?>" />
                        <input type="hidden" name="adult_num[]"  value="<?=$num_bale3?>" /> 
                        -->
                    </td>
                </tr>
            </table>
          <!--  <div class="form-group col-sm-12">
                <label class="label ">إضافة مرفق  </label>
                <input type="file"  name="bank_attachment" class="form-control  "  >
            </div>-->
        </div>

    </div>
    <?php }else{
        echo '<div class="alert alert-danger">
               <strong> لايوجد نتائج مطابقة للبحث!</strong> .
             </div>';
    }?>
<?php   }elseif($member_type == 1 && $sarf_type == 3){    //     sarf_type = 3       member_type == 1    ?>
    <?php   if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
    <div class="col-xs-12">
        <div class="form-group col-sm-6 col-xs-12">
            <div class="form-group col-sm-12">
                <label class="label ">إسم الجهة/المستفيد   </label>
                <select  name="person_id_fk" class="form-control " onchange="get_other_person(this.value);pass_person_name($('option:selected',this).text());" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                    <option value="">إختر</option>
                    <?php if(isset($all_mother_family) && !empty($all_mother_family)){
                        foreach ($all_mother_family as $row_m){  ?>
                            <option value="<?=$row_m->mother_national_num_fk?>"><?=$row_m->full_name?></option>
                        <?php }?>
                    <?php }?>
                    <?php if(isset($all_member_family) && !empty($all_member_family)){
                        foreach ($all_member_family as $row_b){  ?>
                            <option value="<?=$row_b->id?>"><?=$row_b->member_full_name?></option>
                        <?php }?>
                    <?php }?>
                    <option value="0">أخر</option>
                </select>
            </div>
            <div class="form-group col-sm-12">
                <label class="label ">إسم أخر  </label>
                <input type="text" id="other_person"   name="other_person"  class="form-control  " readonly="" >
            </div>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


                <tr>
                    <th class="text-center">  مبلغ وقدره    </th>
                    <td class="text-center"><?=$due_to_widow * $num_mother + $due_to_orphan * $num_yatem + $due_to_beneficiary * $num_bale3 ?>
                        <input type="hidden" name="total_value" value="<?=$due_to_widow * $num_mother + $due_to_orphan * $num_yatem + $due_to_beneficiary * $num_bale3 ?>">
                    </td>
                </tr>
                <tr>
                    <th class="text-center">إسم الجهة/المستفيد </th>
                    <td class="text-center" id="td_person_name">
                        <?php if(!empty($data_table[0]->full_name)){
                            echo $data_table[0]->full_name;
                        }else{
                            echo  "إسم الأم غير مضاف";
                        }?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">عبارة عن </th>
                    <td class="text-center"><?=$about?>
                        <input type="hidden" name="about" value="<?=$about?>">
                        <input type="hidden" name="value[<?=$data_table[0]->mother_national_num?>]"  value="<?=$due_to_widow * $num_mother + $due_to_orphan * $num_yatem + $due_to_beneficiary * $num_bale3 ?>" />
                  <!--  <input type="hidden" name="all_num[]"  value="<?=$num_total?>" />
                        <input type="hidden" name="mother_national_num_fk[]"  value="<?=$data_table[0]->mother_national_num?>" />
                        <input type="hidden" name="file_num[]"  value="<?=$data_table[0]->file_num?>" />
                        <input type="hidden" name="mother_num[]"  value="<?=$num_mother?>" />
                        <input type="hidden" name="young_num[]"  value="<?=$num_yatem?>" />
                        <input type="hidden" name="adult_num[]"  value="<?=$num_bale3?>" />
                        <input type="hidden" name="mother_value[]"  value="<?=$due_to_widow * $num_mother ?>" />
                        <input type="hidden" name="young_value[]"  value="<?=$due_to_orphan * $num_yatem?>" />
                        <input type="hidden" name="adult_value[]"  value="<?=$due_to_beneficiary * $num_bale3?>" />
                     -->
                    </td>
                </tr>
            </table>
           <!-- <div class="form-group col-sm-12">
                <label class="label ">إضافة مرفق  </label>
                <input type="file" id=""  name="bank_attachment" class="form-control  "  >
            </div>-->
        </div>

    </div>
<?php }else{
    echo '<div class="alert alert-danger">
               <strong> لايوجد نتائج مطابقة للبحث!</strong> .
             </div>';
}?>
<?php   }elseif($member_type == 1 && $sarf_type == 4){    //     sarf_type = 4       member_type == 1    ?>
    <?php   if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
    <div class="col-xs-12">
        <div class="form-group col-sm-6 col-xs-12">
            <div class="form-group col-sm-12">
                <label class="label ">إسم الجهة/المستفيد   </label>
                <select name="person_id_fk" class="form-control " onchange="get_other_person(this.value);pass_person_name($('option:selected',this).text());" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                    <option value="">إختر</option>
                    <?php if(isset($all_mother_family) && !empty($all_mother_family)){
                        foreach ($all_mother_family as $row_m){  ?>
                            <option value="<?=$row_m->mother_national_num_fk?>"><?=$row_m->full_name?></option>
                        <?php }?>
                    <?php }?>
                    <?php if(isset($all_member_family) && !empty($all_member_family)){
                        foreach ($all_member_family as $row_b){  ?>
                            <option value="<?=$row_b->id?>"><?=$row_b->member_full_name?></option>
                        <?php }?>
                    <?php }?>
                    <option value="0">أخر</option>
                </select>
            </div>
            <div class="form-group col-sm-12">
                <label class="label ">إسم أخر  </label>
                <input type="text" id="other_person"  name="other_person" class="form-control  " readonly="" >
            </div>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


                <tr>
                    <th class="text-center">مبلغ وقدره</th>
                    <td class="text-center"><?=$money_according_to?>
                      <input type="hidden" value="<?=$money_according_to?>"  name="total_value">
                    </td>
                </tr>
                <tr>
                    <th class="text-center">إسم الجهة/المستفيد </th>
                    <td class="text-center" id="td_person_name">
                        <?php if(isset($data_table[0]->full_name)){
                            echo $data_table[0]->full_name;
                        }else{
                            echo  "إسم الأم غير مضاف";
                        }?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">عبارة عن </th>
                    <td class="text-center"><?=$about?>
                        <input type="hidden" value="<?=$about?>"  name="about">
                        <input type="hidden" name="value[<?=$data_table[0]->mother_national_num?>]"  value="<?=$money_according_to?>" />
                        <!--
                        <input type="hidden" name="all_num[]"  value="<?=$num_total?>" />
                        <input type="hidden" name="mother_national_num_fk[]"  value="<?=$data_table[0]->mother_national_num?>" />
                        <input type="hidden" name="file_num[]"  value="<?=$data_table[0]->file_num?>" />
                        <input type="hidden" name="mother_num[]"  value="<?=$num_mother?>" />
                        <input type="hidden" name="young_num[]"  value="<?=$num_yatem?>" />
                        <input type="hidden" name="adult_num[]"  value="<?=$num_bale3?>" />
                         -->
                    </td>
                </tr>
            </table>
          <!--  <div class="form-group col-sm-12">
                <label class="label ">إضافة مرفق  </label>
                <input type="file" id=""  name="bank_attachment" class="form-control  "  >
            </div>-->
        </div>
    </div>
<?php }else{
    echo '<div class="alert alert-danger">
               <strong> لايوجد نتائج مطابقة للبحث!</strong> .
             </div>';
}?>

<?php }?>



