<style>
    .style-td td{
        border: 1px solid #999 !important;
        padding: 0px !important;
    }
    
    
        .top_radio{
        margin-bottom: 15px;
    }
.top_radio input[type=radio] {
    height: 20px;
    width: 20px; 
    line-height: 0px;
    vertical-align: middle;

}
.top_radio .radio-inline,.top_radio .checkbox-inline {
    vertical-align: middle;
    font-size: 16px;
    position: relative;
    
        padding: 10px 18px;
    border-bottom: 2px solid #eee;
    border-radius: 8px;
}
    
.help-block.form-error {
    position: absolute;
    top: 42px;
    font-size: 12px;
}
    
    .for_emp {
        background-color:#fcb632 !important;
        color: black;
    }
    
    .for_charity{
         background-color: #8bbf02 !important;
    color: black;
    }
    
     .for_sub_header {
      background-color: #09704e  !important;
    color: #ffffff;
}
.infsso th{
    border:1px solid #666;
}
   /* 
   .tttr th:nth-child(5) {
    border-left: 4px double #fbff00;
}
    .trt td:nth-child(5) {
    border-left: 4px double #eeba21;
}*/
</style>

<div class="col-sm-12 no-padding" >

        <?php 
        // echo form_open_multipart('human_resources/Hr_insurance_settings/add_hr_insurance_settings'); 
        if(!empty($result)){
    echo form_open_multipart('human_resources/Hr_insurance_settings/Update_hr_insurance_settings/'.$this->uri->segment(4));
}else{

    echo form_open_multipart('human_resources/Hr_insurance_settings/add_hr_insurance_settings');
}
        ?>
       
            <?php if( !empty($settings)){ ?>
           
            <div class="col-sm-12 text-center no-padding">
                <div class="radio-content">
                     <label class="label">جنسية المشترك : </label>
                </div>
                <?php $arr =array(0=>'سعودى',1=>'غير سعودى');

                foreach ($arr as $key=>$value){
                ?>
                <div class="radio-content">
                    
                        <input type="radio" name="nationality_type" data-validation="required"  onclick="check_value(<?php echo $key;?>)"   <?php  if(isset($nationality_type)){ if($nationality_type ==$key){ echo'checked';  } } ?>
                        <?php  if(isset($nationality_type)){   echo'disabled';  } ?>

                               value=" <?php echo $key;?>" id="nationality<?php echo $key;?>"/>
                       <label class="radio-label" for="nationality<?php echo $key;?>"> <?php echo $value;?> </label>
                </div>          
                               
                               
                <?php  if(isset($nationality_type)){ if($nationality_type ==$key){ ?>

                    <input type="hidden" name="nationality_type" value="<?php echo $nationality_type;?>">

                <?php } }?>

                        <?php } ?>
                
            </div>

            <div class="col-sm-12 col-xs-12">
                <div class="col-sm-2 col-xs-12"></div>




                <?php if(!empty($settings)){      ?>
                    <div class="col-sm-8 col-xs-12">
                        <br>
                        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="info">
                                <th class="text-center for_sub_header">نوع التغطية</th>
                                <th class="text-center for_emp">حصة الموظف</th>
                                <th class="text-center for_charity">حصة الجمعية</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php foreach ($settings as $record ){

                                ?>
                                <td class="text-center"><?php echo $record->title_setting;?></td>
                                <td class="text-center"><div style="position: relative"><input type="text" name="emp_average[<?php echo $record->id_setting;?>]" class="form-control" style="width: 90%" onkeypress="validate_number(event)" value="<?php if(isset($result[$record->id_setting]->emp_average)){
                                        echo $result[$record->id_setting]->emp_average;}?>"><span style="position: absolute;top: 9px;left: 0px;"> %</span></div></td>

                                <td class="text-center"><div style="position: relative"><input type="text" name="society_average[<?php echo $record->id_setting;?>]" class="form-control" style="width: 90%" onkeypress="validate_number(event)" value="<?php if(isset($result[$record->id_setting]->society_average)){
                                        echo $result[$record->id_setting]->society_average;}?>"><span style="position: absolute;top: 9px;left: 0px;"> %</span></div></td>
                            </tr>
                            <?php  } ?>
                            </tbody>
                        </table>


                    </div>
                <?php     } ?>
                <div class="col-sm-2 col-xs-12"></div>

            </div>



            <div class="col-sm-12  text-center">
                
               <button type="submit" id="mybutton" class="btn btn-success btn-labeled"  name="add"  value="حفظ"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ</button>
                
            </div>
            <?php }else{ ?>

             <div class=" col-sm-12 btn btn-danger"> لا توجد أنواع للتغطية</div>

            <?php } ?>
        <?php echo form_close()?>
          <div class="col-sm-12 "><br>
        <?php if(!empty($records) && isset($records)){      ?>

              <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr class="greentd">
                      <th rowspan="2" class="text-center">م</th>
                      <th rowspan="2" class="text-center">جنسية المشترك</th>
                      <th class="text-center for_emp" style=" background-color:#fcb632 !important;" colspan="<?php if(!empty($settings)){ echo sizeof($settings);} ?>">حصة الموظف</th>
                      <th class="text-center for_charity" style=" background-color:#8bbf02 !important;" colspan="<?php if(!empty($settings)){ echo sizeof($settings);} ?>">حصة الجمعية</th>
                      <th  rowspan="2"  class="text-center">الاجراء</th>
                  </tr>
                  <tr class="greentd tttr">
        
                    <!--  <th class="text-center"></th>-->
                      <?php if(!empty($settings)){       foreach ($settings as $record ){ ?>
                          <th class="text-center for_sub_header ">
                              <?php echo $record->title_setting;?>
                          </th>
                      <?php } } ?>
                      <?php if(!empty($settings)){       foreach ($settings as $record ){ ?>
                          <th  class="text-center for_sub_header">
                              <?php echo $record->title_setting;?>
                          </th>
                      <?php } } ?>
                      <!--  <th class="text-center"></th>-->
                  </tr>
                  </thead>
                  <tbody>
                  <?php $a=1;foreach ($records as $record ){  ?>
                   <tr class="trt">
                       <td class="text-center"><?php echo $a;?></td>
                       <td  class="text-cente "><?php if( $record->nationality_type ==0 ){
                               echo 'سعودى'; }else{
                               echo 'غير سعودى';
                           } ?></td>
                       <?php if(!empty($settings)){     
                             foreach ($settings as $row ){ ?>
                           <td class="text-center ">
                               <?php if(!empty( $record->sub[$row->id_setting]->emp_average)){
                                   echo $record->sub[$row->id_setting]->emp_average; }else{ echo 0;}?>
                          %</td>
                       <?php } } ?>

                       <?php if(!empty($settings)){  
                            foreach ($settings as $row ){ ?>
                           <td class="text-center">
                               <?php if(!empty( $record->sub[$row->id_setting]->society_average)){
                                   echo $record->sub[$row->id_setting]->society_average; }else{ echo 0;}?>
                           %</td>
                       <?php } } ?>
                       <td class="text-center">
                           <a  title="تعديل" href="<?php echo base_url().'human_resources/Hr_insurance_settings/Update_hr_insurance_settings/'.$record->nationality_type?>">
                               <i class="fa fa-pencil " aria-hidden="true"></i>  </a>

                           <a title="حذف"  data-toggle="modal" data-target="#modal-delete<?php echo $record->id;?>" ><i class="fa fa-trash"></i> </a>
                       </td>
                   </tr>


                      <div class="modal" id="modal-delete<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                                  </div>
                                  <div class="modal-body">
                                      <p id="text">هل أنت متأكد من الحذف؟</p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                      <a id="" href="<?php echo base_url().'human_resources/Hr_insurance_settings/Delete_hr_insurance_settings/'.$record->nationality_type?>"> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <?php  $a++;} ?>
                  </tbody>
              </table>
        <?php     } ?>
         </div>
 
</div>


<script>

    function check_value(valu) {
        var dataString = 'id=' + valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>human_resources/Hr_insurance_settings/check_value',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                if( parseInt(JSONObject) == 1){
                    document.getElementById("mybutton").setAttribute("disabled","disabled");
                }else{
                    document.getElementById("mybutton").removeAttribute("disabled","disabled");
                }
            }
        });

    }

</script>