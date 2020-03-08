
<style>
    .nonactive{
        pointer-events: none;
        cursor: not-allowed;
    }
</style>




<!--------------------------------------------------------------->

<?php
/*
print_r($member_data);

return ;*/

 if(!empty($_POST['type'])){ ?>

    <?php echo form_open_multipart('TransformationProcess/Transformation_Delete/' . $transformation_lagna->mother_national_num); ?>

<?php }else{ ?>


<?php echo form_open_multipart('TransformationProcess/Transformation_edit/' . $transformation_lagna->mother_national_num); ?>
<?php } ?>
            <div class="col-sm-3">
                <label class="label label-green  half"> الى اللجنة </label>
                <select class="form-control half " name="add_to_lagna_id_fk">
                    <!--  <option>اختر</option> -->
                    <?php if (isset($all_lagna_to) && $all_lagna_to != null && !empty($all_lagna_to)):
                        foreach ($all_lagna_to as $one_lagna): ?>
                            <option
                                    value="<?php echo $one_lagna->id_lagna; ?>"><?php echo $one_lagna->lagna_name; ?></option>
                        <?php endforeach; endif; ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label class="label label-green  half"> طبيعة التحويل </label>
                <select class="form-control half nonactive" name="transfer_type_id_fk" id="transfer_type_id_fk"
                        aria-required="true" onchange="GetTransferType($(this).val(),<?php echo $transformation_lagna->mother_national_num;?>)">
                    <option value="">اختر</option>
                    <?php $transfer_type_arr =array(1=>'الأسر',2=>'الأفراد');
                    for($a=1;$a<=sizeof($transfer_type_arr);$a++){ ?>
                        <option value="<?=$a?>"


                        <?php
                        if($transformation_lagna->transfer_type_id_fk == $a){

                            echo 'selected';
                        }


                        ?>

                        ><?=$transfer_type_arr[$a]?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="col-sm-6">
                <label class="label label-green  "  style="width: 24%;float: right;"> التوصية </label>
                <select class="form-control half <?php if(!empty($_POST['type'])){ ?> nonactive <?php }?>" name="procedure_id_fk"  id="procedure_id_fk" data-validation="required"
                        aria-required="true">
                    <option value="">اختر</option>

                    <?php if(!empty($procedures_option)){  foreach ($procedures_option as $row){ ?>
                        <option value="<?php echo$row->id.'-'.$row->title; ?> "

                        <?php

                        if($transformation_lagna->procedure_id_fk == $row->id){

                            echo 'selected';
                        }
                        ?>
                        ><?php echo$row->title; ?></option>
                    <?php } }  ?>

                </select>
            </div>
              <?php if($transformation_lagna->transfer_type_id_fk ==2){ ?>

            <div class="col-sm-12" id="option_transfer_type">



<?php
//$person_id_arr='';
foreach ($transformation_lagna_members as $value){

    $person_id_arr[] =  $value->person_id_fk;


}
?>




                <?php if(isset($member_data) && $member_data!=null){ ?>
                    <table class="table table-bordered" style="width:100%">
                        <tbody><tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">الإسم</th>
                                <th style="text-align: center">حالة الملف</th>
                                <th style="text-align: center">سبب الإجراء</th>
                            </tr>
                        <?php

                        if(isset($mothers_data) && $mothers_data!=null){ ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" onclick="empty_values(<?php echo $mothers_data[0]->mother_national_num_fk;?>)"
                                             <?php if(in_array($mothers_data[0]->mother_national_num_fk,$person_id_arr)){ echo'checked';} else{ echo'disabled';}?>
                                           value="<?php echo $mothers_data[0]->mother_national_num_fk; ?>"></td>
                                <td><a href="#"><?php echo $mothers_data[0]->full_name;   ?></a></td>
                                <td style="text-align: center"><select
                                        <?php if(!in_array($mothers_data[0]->mother_national_num_fk,$person_id_arr)){ echo'disabled';}?>
                                            class="form-control halet_file  <?php if(!empty($_POST['type'])){ ?> nonactive <?php }?>" name="halet_file[]" id="halet_file<?php echo $mothers_data[0]->mother_national_num_fk;?>">
                                        <option value="">اختر</option>
                                        <?php if (isset($file_status) && $file_status != null && !empty($file_status)){
                                            foreach ($file_status as $row){ ?>
                                                <option
                                                        value="<?php echo $row->id; ?>-<?=$row->title?>"

                                                    <?php

                                                    if(!empty($transformation_lagna_members[$mothers_data[0]->mother_national_num_fk]->halet_file_id_fk)){

                                                    if($transformation_lagna_members[$mothers_data[0]->mother_national_num_fk]->halet_file_id_fk == $row->id){

                                                        echo 'selected';
                                                    }
                                                    }
                                                    ?>

                                                ><?php echo $row->title; ?></option>
                                            <?php }
                                        } ?>
                                    </select></td>
                                <td style="text-align: center">
                                    <select
                                        <?php if(!in_array($mothers_data[0]->mother_national_num_fk,$person_id_arr)){ echo'disabled';}?>

                                            class="form-control procedure   <?php if(!empty($_POST['type'])){ ?> nonactive <?php }?>" name="procedure[]" id="procedure<?php echo $mothers_data[0]->mother_national_num_fk;?>" >
                                        <option value="">إختر</option>
                                        <?php if(!empty($all_procedures)){  foreach ( $all_procedures  as $row){ ?>
                                            <option value="<?=$row->id?>-<?=$row->title?>"

                                                <?php
                                            if(!empty($transformation_lagna_members[$mothers_data[0]->mother_national_num_fk]->procedure_id_fk)) {


                                                if($transformation_lagna_members[$mothers_data[0]->mother_national_num_fk]->procedure_id_fk == $row->id){

                                                    echo 'selected';
                                                }
                                            }
                                                ?>
                                            ><?=$row->title?></option>
                                        <?php } } ?>
                                    </select></td>

                            </tr>

                        <?php }?>
                        <?php

                        $x=2; foreach($member_data as $member_row){

                            if(!in_array($member_row->id,$members)){
                                continue;
                            }
                            ?>
                            <tr>
                                <td><input  type="checkbox" name="ids[]" onclick="empty_values(<?php echo$member_row->id;?>)"
                                        <?php if(in_array($member_row->id,$person_id_arr)){ echo'checked';}?>
                                           value="<?php echo $member_row->id;  ?>"></td>
                                <td><?php echo $member_row->member_full_name;  ?></td>
                                <td style="text-align: center"><select



                                            class="form-control halet_file <?php if(!empty($_POST['type'])){ ?> nonactive <?php }?>" name="halet_file[]" id="halet_file<?php echo$member_row->id;?>">
                                        <option value="">اختر</option>
                                        <?php if (isset($file_status) && $file_status != null && !empty($file_status)){
                                            foreach ($file_status as $row){ ?>
                                                <option
                                                        value="<?php echo $row->id; ?>-<?=$row->title?>"

                                                    <?php
                                                if(!empty($transformation_lagna_members[$member_row->id]->halet_file_id_fk)) {

                                                     if($transformation_lagna_members[$member_row->id]->halet_file_id_fk == $row->id){

                                                         echo 'selected';
                                                     }
                                                }
                                                    ?>

                                                ><?php echo $row->title; ?></option>
                                            <?php }
                                        } ?>
                                    </select></td>
                                <td style="text-align: center">
                                    <select

                                             class="form-control procedure " name="procedure[]"  id="procedure<?php echo$member_row->id;?>">
                                        <option value="">إختر</option>
                                        <?php if(!empty($all_procedures)){  foreach ( $all_procedures  as $row){ ?>
                                            <option value="<?=$row->id?>-<?=$row->title?>"

                                                <?php
                                            if(!empty($transformation_lagna_members[$member_row->id]->procedure_id_fk)) {
                                                if($transformation_lagna_members[$member_row->id]->procedure_id_fk == $row->id){

                                                    echo 'selected';
                                                }
                                            }
                                                ?>
                                            ><?=$row->title?></option>
                                        <?php } } ?>
                                    </select></td>


                            </tr>

                            <?php $x++; } ?>
                        </tbody>
                    </table>


                <?php } ?>




            </div>

<?php  } ?>
            <input type="hidden" name="file_num" value="<?php echo $transformation_lagna->file_num; ?>">
            <input type="hidden" name="session_num" value="<?php echo $transformation_lagna->session_num_fk; ?>">

<?php //echo form_close(); ?>
<!--------------------------------------------------------------->

        <div class="modal-footer" style="display: inline-block;width: 100%">
            <button type="button" style="float:left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            <?php if(!empty($_POST['type'])){ ?>
                <button type="submit" name="delete" value="delete"
                        class="btn  btn-success">حذف</button>
            <?php }else{ ?>
                <button type="submit" name="update" value="update"
                        class="btn  btn-success">تعديل</button>
            <?php } ?>

        </div>


<!----------------------------------script----------------------------->

<script>

    function GetTransferType(valu,mother_num) {

        //procedure_id_fk
        var data = "type=" + valu;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family_details/GetProcedure',
            data:data,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
                var  html='<option>إختر </option>';
                for(i=0; i<JSONObject.length ; i++){
                    html +='<option value=" ' + JSONObject[i].id + '-' + JSONObject[i].title + '"> ' + JSONObject[i].title + '</option>';
                }
                $("#procedure_id_fk").html(html);

            }
        });

        if (valu == 2) {
            var dataString = "mother_num="+mother_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetTransferType',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#option_transfer_type").html(html);
                }
            });
        }
    }
</script>

 

<script>

    function empty_values(id) {
        $('#halet_file'+id).val('');
        $('#procedure'+id).val('');
    }
</script>