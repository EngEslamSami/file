
<?php  $validation = 'data-validation="required" '; $button ='حفظ'; ?>

<?php  if($basic_data_family['file_update_date'] != 0 ){ ?> 
<div class="col-md-12">
    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        تحديث جديد
    </button>
    <div class="clearfix"></div><br>
    <div class="collapse" id="collapseExample">
        <?php
        echo form_open_multipart('family_controllers/Family/update_file_status_data');
        ?>
        <div class="well">

                <div class="col-md-12">
                    <input type="hidden" name="mother_national" value="<?php echo $basic_data_family['mother_national_num'];?>">
                    <?php
                    $file_num ?>
                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label "> رقم الملف  <strong class="astric">*</strong> </label>
                        <input type="text" readonly="readonly" class="form-control "  name="file_num"
                               value=" <?php  if($basic_data_family['file_num']!=0){ echo  $basic_data_family['file_num']; }
                               else {  echo  ($file_num + 1) ;}?>"
                               id="file_num"    />
                    </div>
                    <div class="form-group  col-md-2 col-xs-12 padding-4" >
                        <label class="label"> تاريخ فتح  الملف  <strong class="astric">*</strong> </label>
                        <input type="date"  class="form-control  " <?php
                        
                       if($basic_data_family['file_update_date']!=0){ ?>
                            <?php   } ?>  name="date_suspend" value="<?php if($basic_data_family['file_open_update_date'] == 0 ){echo  date("Y-m-d");}else{echo $basic_data_family['file_open_update_date'] ;}?>"   id="date_suspend"   name="date_suspend"   />
                    </div>
                    <div class="form-group  col-md-2 col-xs-12 padding-4" >
                        <label class="label ">تاريخ اخر تحديث<strong class="astric">*</strong> </label>
                        <input type="date" class="form-control " <?php if($basic_data_family['file_update_date'] !=0){
                            ?>   <?php   } ?>  onchange="get_peroid_update($(this).val(),<?php echo $basic_data_family['id'];?>);"
                               name="last_update_date" value="<?php if(isset($basic_data_family['file_update_date'])&&$basic_data_family['file_update_date'] !=0){
                            echo $basic_data_family['file_update_date'] ; }else { echo  date("Y-m-d"); } ?>"

                               id="update_date_last<?php echo $basic_data_family['id'];?>"
                             />
                    </div>

                    <div class="form-group  col-md-2 col-xs-12 padding-4">
                        <label class="label "> فتره التحديث <strong class="astric">*</strong> </label>
                        <select id="peroid_update<?php echo $basic_data_family['id'];?>" name="peroid_update" class="form-control "
                                data-validation="required"
                                onchange="get_peroid($(this).val(),<?php echo $basic_data_family['id'];?>);">
                            <option value="">اختر</option>
                            <?php
                            if(isset($all_options)&&!empty($all_options)) {
                                foreach ($all_options as $row) {
                                    ?>
                                    <option value="<?php echo $row->num_of_day;?>" <?php if(isset($basic_data_family['peroid_update'] )&&!empty($basic_data_family['peroid_update']) && $basic_data_family['peroid_update'] ==$row->num_of_day ){?>    <?php } ?>> <?php echo $row->title;?> </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group  col-md-2 col-xs-12 padding-4" >
                        <label class="label"> تاريخ  التحديث<strong class="astric">*</strong> </label>
                        <input type="date" class="form-control "
                               name="update_date" value="<?= date('Y-m-d');?>"
                               id="update_date<?php echo $basic_data_family['id'];?>"
                            />
                    </div>
                    <div class="col-md-2">
                        <button type="submit"  class="btn btn-labeled btn-success " name="register" id="register" value="register"   style="margin-top: 27px ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span><?=$button?>
                        </button>
                     <!--   <button type="submit" class="btn btn-purple w-md m-b-5"
                                name="register" id="register" value="register"> <span><i class="fa fa-floppy-o" aria-hidden="true"></i>
               </span> <?=$button?></button> -->

                    </div>
                </div>


        </div>
        <?php
        echo form_close();
        ?>
    </div>
</div>
<?php  }else{ ?> 
    <?php
    echo form_open_multipart("family_controllers/Family/update_file_status_data");
    ?>


    <div class="col-md-12">
        <input type="hidden" name="mother_national" value="<?php echo $basic_data_family['mother_national_num'];?>">
        <?php
        $file_num ?>
        <div class="form-group col-md-2 col-xs-12 padding-4">
            <label class="label "> رقم الملف  <strong class="astric">*</strong> </label>
            <input type="text" readonly="readonly"  class="form-control"  name="file_num"
                   value=" <?php  if($basic_data_family['file_num']!=0){ echo  $basic_data_family['file_num']; }
                   else {  echo  ($file_num + 1) ;}?>"
                   id="file_num"    />
        </div>
        <div class="form-group col-md-2 col-xs-12 padding-4" >
            <label class="label "> تاريخ فتح  الملف  <strong class="astric">*</strong> </label>
            <input type="date" onchange="change_date($(this).val(),<?php echo $basic_data_family['id'];?>)" class="form-control " <?php if($basic_data_family['file_update_date']!=0){ ?>
                 <?php } ?>  name="date_suspend" value="<?php if($basic_data_family['file_open_update_date']== 0){echo date("Y-m-d");}else{echo $basic_data_family['file_open_update_date'];}?>" id="date_suspend"   name="date_suspend"   />
        </div>
        <div class="form-group col-md-2 col-xs-12 padding-4" >
            <label class="label ">تاريخ اخر تحديث<strong class="astric">*</strong> </label>
            <input type="date" class="form-control " <?php if($basic_data_family['file_update_date'] !=0){
                ?>    <?php   } ?>  onchange="get_peroid_update($(this).val(),<?php echo $basic_data_family['id'];?>);"
                   name="last_update_date" value="<?php if(isset($basic_data_family['file_update_date'])&&$basic_data_family['file_update_date'] !=0){
                echo $basic_data_family['file_update_date'] ; }else { echo  date("Y-m-d"); } ?>"
                   id="update_date_last<?php echo $basic_data_family['id'];?>"
                />
        </div>

        <div class="form-group col-md-2 col-xs-12 padding-4">
            <label class="label "> فتره التحديث <strong class="astric">*</strong> </label>
            <select  id="peroid_update<?php echo $basic_data_family['id'];?>" name="peroid_update" class="form-control "
                    data-validation="required"
                    onchange="get_peroid($(this).val(),<?php echo $basic_data_family['id'];?>);">
                <option value="">اختر</option>
                <?php
                if(isset($all_options)&&!empty($all_options)) {
                    foreach ($all_options as $row) {
                        ?>
                        <option value="<?php echo $row->num_of_day;?>" <?php if(isset($basic_data_family['peroid_update'] )&&!empty($basic_data_family['peroid_update']) && $basic_data_family['peroid_update'] ==$row->num_of_day ){?>    <?php } ?>> <?php echo $row->title;?> </option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group col-md-2 col-xs-12 padding-4" >
            <label class="label "> تاريخ  التحديث<strong class="astric">*</strong> </label>
            <input type="date" class="form-control "
                   name="update_date" value="<?php echo date('Y-m-d')?>"
                   id="update_date<?php echo $basic_data_family['id'];?>"
                 />
        </div>
        <div class="col-md-2">
            <button type="submit"  class="btn btn-labeled btn-success "  name="register" id="register" value="register"   style="margin-top: 27px ">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span><?=$button?>
            </button>

        </div>
    </div>
    <?php
    echo form_close()
    ?>


<?php } ?>



<?php
/*
echo '<pre>';
print_r($all_file_updates_tracks);*/
?>




  <?php if(isset($all_file_updates_tracks)&&$all_file_updates_tracks!=null){ ?>
      <div class="clearfix"></div>
      <?php
      echo form_open_multipart('family_controllers/Family/update_last_record');
      ?>
<table class=" table  table-bordered table-striped table-hover">
  <thead class="greentd">
    <tr>
      <th scope="col">م</th>
      <th scope="col">تاريخ فتح الملف </th>
      <th scope="col">تاريخ أخر تحديث</th>
      <th scope="col">فترة التحديث</th>
      <th scope="col">تاريخ التحديث</th>
      <th width="5%;">تعديل</th>
    </tr>
  </thead>
  <tbody>
<?php  
 $a=1;
 foreach ($all_file_updates_tracks as $row_tracks ){
    if($row_tracks->peroid == 365){
        $peroid_name = ' بعد عام  ';
    }elseif($row_tracks->peroid == 183){
          $peroid_name = '  بعد سته أشهر  ';
    }else{
       $peroid_name = 'غير محدد ' ;
    }
    
    ?> 
 
     <tr>
      <th scope="row"><?php echo $a  ?></th>
     <td><?php echo $basic_data_family['file_open_update_date']; ?><input type="hidden" name="row_id" value="<?php  echo $row_tracks->id;?>">
     </td>
      <td><?php echo date("Y/m/d",$row_tracks->from_date); ?></td>
      <td><?php echo $peroid_name; ?></td>
      <td><?php echo date("Y/m/d",$row_tracks->to_date); ?>


      </td>
         <td><?php if($a==1){ ?>
                 <div class="col-md-12">
                     <a href="#" data-toggle="collapse" data-target="#collapseExample_update" aria-expanded="false" aria-controls="collapseExample">
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     </a>
             <?php } ?></td>

    </tr>
   
 
 
   <?php  $a++;
       }  ?>  
  

  </tbody>
</table>
<?php } ?>

<?php  
/*
echo '<pre>';
print_r($all_file_updates_tracks);
echo '<pre>';
*/

//end($all_file_updates_tracks);

//print_r(end($all_file_updates_tracks));



if($basic_data_family['file_update_date'] != 0 ){ ?>

    <div class="collapse" id="collapseExample_update">
        <div class="well">

                <div class="col-md-12">
                    <input type="hidden" name="mother_national" value="<?php echo $basic_data_family['mother_national_num'];?>">
                    <?php
                    $file_num ?>
                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label  "> رقم الملف  <strong class="astric">*</strong> </label>
                        <input type="text" readonly="readonly"  class="form-control"  name="file_num"
                               value=" <?php  if($basic_data_family['file_num']!=0){ echo  $basic_data_family['file_num']; }
                               else {  echo  ($file_num + 1) ;}?>"
                               id="file_num"    />
                    </div>
                    <div class="form-group col-md-2 col-xs-12 padding-4" >
                        <label class="label "> تاريخ اخر تحديث  <strong class="astric">*</strong> </label>
                        <input type="text" class="form-control  " <?php

             if($basic_data_family['file_update_date']!=0){ ?>
                           <?php   } ?>  name="from_date" value="
                            <?php
                        echo $basic_data_family['file_update_date'];?>"   id="date_suspend<?php echo $basic_data_family['id'];?>"   name="date_suspend"   />
                    </div>
                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label "> فتره التحديث <strong class="astric">*</strong> </label>
                        <select id="peroid_update<?php echo $basic_data_family['id'];?>" name="peroid" class="form-control "
                                onchange="update_last_date($(this).val(),<?php echo $basic_data_family['id'];?>);" data-validation="required">
                            <option value="">اختر</option>
                            <?php
                            if(isset($all_options)&&!empty($all_options)) {
                                foreach ($all_options as $row) {
                                    ?>
                                    <option value="<?php echo $row->num_of_day;?>" <?php if(isset($basic_data_family['peroid_update'] )&&!empty($basic_data_family['peroid_update']) && $basic_data_family['peroid_update'] ==$row->num_of_day ){ echo 'selected'; }?>    > <?php echo $row->title;?> </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-xs-12 padding-4" >
                        <label class="label ">تاريخ  التحديث<strong class="astric">*</strong> </label>
                        <input type="date" class="form-control " <?php if($basic_data_family['file_update_date'] !=0){
                            ?>    <?php   } ?>  onchange="update_last_date($(this).val(),<?php echo $basic_data_family['id'];?>);"
                               name="to_date" value="<?= date('Y-m-d')?>"

                               id="update_last_date<?php echo $basic_data_family['id'];?>"
                            />
                    </div>




                    <div class="col-md-2">
                        <button type="submit"  class="btn btn-labeled btn-success "   name="register" id="register" value="register"   style="margin-top: 27px ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                        </button>



                    </div>
                </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>


<?php  }?>



<!-------------------------------------------->

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>

<script>
    function get_peroid_update(from_date,id){
        var peroid= $('#peroid_update'+id).val();
        if(peroid==0){
            $('#update_date'+id).val('');
            return;
        }
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Family/get_date_update",
            data:{from_date:from_date,peroid:peroid},
            success:function(d){
                $('#update_date'+id).val(d);
            }
        });
    }
    //===========================================
    function get_peroid(value,id)  {
        var date_last= $('#update_date_last'+id).val();

        if(value==0){
            $('#update_date'+id).val('');
            return;
        }
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Family/get_date",
            data:{value:value,date_last:date_last},
            success:function(d){
                $('#update_date'+id).val(d);
            }
        });
    }
</script>
<!-- Nagwa 5-9  -->
<script>
    function change_date(value,id) {
        $('#update_date_last'+id).val(value);
    }
</script>


<!------------>

<script>
    function update_last_date(value,id){
        var date_last= $('#date_suspend'+id).val();


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Family/get_date",
            data:{value:value,date_last:date_last},
            success:function(d){

              $('#update_last_date'+id).val(d);

            }
        });
    }
    //===========================================

</script>