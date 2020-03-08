




<?php  $validation = 'data-validation="required" '; $button ='حفظ'; ?>



<?php  if($basic_data_family['file_update_date'] != 0 ){ ?> 
<div class="col-md-12">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        تحديث جديد
    </button>
    <div class="collapse" id="collapseExample">
        <div class="well">
            <form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status_data">
                <div class="col-md-12">
                    <input type="hidden" name="mother_national" value="<?php echo $basic_data_family['mother_national_num'];?>">
                    <?php
                    $file_num ?>
                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                        <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                               value=" <?php  if($basic_data_family['file_num']!=0){ echo  $basic_data_family['file_num']; }
                               else {  echo  ($file_num + 1) ;}?>"
                               id="file_num"   <?=$validation?> />
                    </div>
                    <div class="form-group col-sm-6 col-xs-12" >
                        <label class="label label-green  half"> تاريخ فتح  الملف  <strong class="astric">*</strong> </label>
                        <input type="text" class="form-control half input-style " <?php
                        
             if($basic_data_family['file_update_date']!=0){ ?>
                            readonly="readonly"  <?php   } ?>  name="date_suspend" value="
                            <?php 
                            if($basic_data_family['file_open_update_date'] == 0 ){
                           echo  date("Y-m-d");    
                              
                            }else{
                                echo $basic_data_family['file_open_update_date'] ;    
                            }
                           
                            
                     /*       if($basic_data_family['file_open_update_date'] ==0){
                      echo  date("Y-m-d");
                }elseif($basic_data_family['file_open_update_date'] == null){
                        echo  date("Y-m-d");
                }else{
                  echo $basic_data_family['file_open_update_date'] ; 
                }  
                       */     
                           
                            
                            
                            
                            ?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
                    </div>
                    <div class="form-group col-sm-6 col-xs-12" >
                        <label class="label label-green  half">تاريخ اخر تحديث<strong class="astric">*</strong> </label>
                        <input type="date" class="form-control half input-style" <?php if($basic_data_family['file_update_date'] !=0){
                            ?>  readonly="readonly"  <?php   } ?>  onchange="get_peroid_update($(this).val(),<?php echo $basic_data_family['id'];?>);"
                               name="last_update_date" value="<?php if(isset($basic_data_family['file_update_date'])&&$basic_data_family['file_update_date'] !=0){
                            echo $basic_data_family['file_update_date'] ; }else { echo  date("Y-m-d"); } ?>"

                               id="update_date_last<?php echo $basic_data_family['id'];?>"
                            <?=$validation?> />
                    </div>

                    <div class="form-group col-sm-6 col-xs-12">
                        <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                        <select id="peroid_update<?php echo $basic_data_family['id'];?>" name="peroid_update" class="form-control half input-style"
                                onchange="get_peroid($(this).val(),<?php echo $basic_data_family['id'];?>);">
                            <option value="0">اختر</option>
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

                    <div class="form-group col-sm-6 col-xs-12" >
                        <label class="label label-green  half"> تاريخ  التحديث<strong class="astric">*</strong> </label>
                        <input type="date" class="form-control half input-style"
                               name="update_date" value=""

                               id="update_date<?php echo $basic_data_family['id'];?>"
                            <?=$validation?> />
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-purple w-md m-b-5"
                                name="register" id="register" value="register"> <span><i class="fa fa-floppy-o" aria-hidden="true"></i>
               </span> <?=$button?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php  }else{ ?> 


<form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status_data">
    <div class="col-md-12">
        <input type="hidden" name="mother_national" value="<?php echo $basic_data_family['mother_national_num'];?>">
        <?php
        $file_num ?>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
            <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                   value=" <?php  if($basic_data_family['file_num']!=0){ echo  $basic_data_family['file_num']; }
                   else {  echo  ($file_num + 1) ;}?>"
                   id="file_num"   <?=$validation?> />
        </div>
        <div class="form-group col-sm-6 col-xs-12" >
            <label class="label label-green  half"> تاريخ فتح  الملف  <strong class="astric">*</strong> </label>
            <input type="date" class="form-control half input-style " <?php if($basic_data_family['file_update_date']!=0){ ?>
                readonly="readonly"  <?php   } ?>  name="date_suspend" value="<?php 
                  if($basic_data_family['file_open_update_date'] == 0 ){
                           echo  date("Y-m-d");    
                              
                            }else{
                                echo $basic_data_family['file_open_update_date'] ;    
                            }
                
              ?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
        </div>
        <div class="form-group col-sm-6 col-xs-12" >
            <label class="label label-green  half">تاريخ اخر تحديث<strong class="astric">*</strong> </label>
            <input type="date" class="form-control half input-style" <?php if($basic_data_family['file_update_date'] !=0){
                ?>  readonly="readonly"  <?php   } ?>  onchange="get_peroid_update($(this).val(),<?php echo $basic_data_family['id'];?>);"
                   name="last_update_date" value="<?php if(isset($basic_data_family['file_update_date'])&&$basic_data_family['file_update_date'] !=0){
                echo $basic_data_family['file_update_date'] ; }else { echo  date("Y-m-d"); } ?>"

                   id="update_date_last<?php echo $basic_data_family['id'];?>"
                <?=$validation?> />
        </div>

        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
            <select id="peroid_update<?php echo $basic_data_family['id'];?>" name="peroid_update" class="form-control half input-style"
                    onchange="get_peroid($(this).val(),<?php echo $basic_data_family['id'];?>);">
                <option value="0">اختر</option>
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

        <div class="form-group col-sm-6 col-xs-12" >
            <label class="label label-green  half"> تاريخ  التحديث<strong class="astric">*</strong> </label>
            <input type="date" class="form-control half input-style"
                   name="update_date" value=""

                   id="update_date<?php echo $basic_data_family['id'];?>"
                <?=$validation?> />
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-purple w-md m-b-5"
                    name="register" id="register" value="register"> <span><i class="fa fa-floppy-o" aria-hidden="true"></i>
               </span> <?=$button?></button>
        </div>
    </div>
</form>


<?php } ?>

<!--
<form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status_data">
    <div class="col-md-12">
        <input type="hidden" name="mother_national" value="<?php echo $basic_data_family['mother_national_num'];?>">
        <?php
        $file_num ?>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
            <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                   value=" <?php  if($basic_data_family['file_num']!=0){ echo  $basic_data_family['file_num']; }
                   else {  echo  ($file_num + 1) ;}?>"
                   id="file_num"   <?=$validation?> />
        </div>
        <div class="form-group col-sm-6 col-xs-12" >
            <label class="label label-green  half"> تاريخ فتح  الملف  <strong class="astric">*</strong> </label>
            <input type="date" class="form-control half input-style " <?php if($basic_data_family['file_update_date']!=0){ ?>
                readonly="readonly"  <?php   } ?>  name="date_suspend" value="<?php
                
                   if($basic_data_family['file_open_update_date'] ==0){
                      echo  date("Y-m-d");
                }else{
                  echo $basic_data_family['file_open_update_date'] ; 
                }
                
                ?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
        </div>
        <div class="form-group col-sm-6 col-xs-12" >
            <label class="label label-green  half">تاريخ اخر تحديث<strong class="astric">*</strong> </label>
            <input type="date" class="form-control half input-style" <?php if($basic_data_family['file_update_date'] !=0){
                ?>  readonly="readonly"  <?php   } ?>  onchange="get_peroid_update($(this).val(),<?php echo $basic_data_family['id'];?>);"
                   name="last_update_date" value="<?php if(isset($basic_data_family['file_update_date'])&&$basic_data_family['file_update_date'] !=0){
                echo $basic_data_family['file_update_date'] ; }else { echo  date("Y-m-d"); } ?>"

                   id="update_date_last<?php echo $basic_data_family['id'];?>"
                <?=$validation?> />
        </div>

        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
            <select id="peroid_update<?php echo $basic_data_family['id'];?>" name="peroid_update" class="form-control half input-style"
                    onchange="get_peroid($(this).val(),<?php echo $basic_data_family['id'];?>);">
                <option value="0">اختر</option>
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

        <div class="form-group col-sm-6 col-xs-12" >
            <label class="label label-green  half"> تاريخ  التحديث<strong class="astric">*</strong> </label>
            <input type="date" class="form-control half input-style"
                   name="update_date" value=""

                   id="update_date<?php echo $basic_data_family['id'];?>"
                <?=$validation?> />
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-purple w-md m-b-5"
                    name="register" id="register" value="register"> <span><i class="fa fa-floppy-o" aria-hidden="true"></i>
               </span> <?=$button?></button>
        </div>
    </div>
</form>
-->


<?php
/*
echo '<pre>';
print_r($all_file_updates_tracks);*/
?>




  <?php if(isset($all_file_updates_tracks)&&$all_file_updates_tracks!=null){ ?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">م</th>
     <!-- <th scope="col">تاريخ فتح الملف </th> -->
      <th scope="col">تاريخ أخر تحديث</th>
      <th scope="col">فترة التحديث</th>
      <th scope="col">تاريخ التحديث</th>
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
     <!-- <td><?php echo $basic_data_family['file_open_update_date']; ?></td> -->
      <td><?php echo date("Y/m/d",$row_tracks->from_date); ?></td>
      <td><?php echo $peroid_name; ?></td>
      <td><?php echo date("Y/m/d",$row_tracks->to_date); ?></td>
    </tr>
   
 
 
   <?php  $a++;
       }  ?>  
  

  </tbody>
</table>
<?php } ?>




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