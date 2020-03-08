
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>




<style type="text/css">


     .top-label {
    
    font-size: 13px;
 }

</style>
<?php
$array = array(1=>'نعم',2=>'لا');
$disabled = '';
if(isset($allData) && $allData != null) {
echo form_open_multipart('human_resources/Human_resources/delete_employee_files/'.$this->uri->segment(4));
}
else {
 echo form_open_multipart('human_resources/Human_resources/employee_files/'.$this->uri->segment(4));   
}
?>

<div class="col-sm-9 col-md-9 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
            <div class="pull-left">
              <?php   $data_load["emp_code"]= $personal_data[0]->emp_code;
                      $data_load["id"]=$this->uri->segment(4) ;
                       $this->load->view('admin/Human_resources/drop_down_menu', $data_load);?>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-2 col-xs-12">
                <label class="label top-label">كود الموظف</label>
                <input type="text" class="form-control bottom-input" name="emp_code" value="<?=$employee['emp_code']?>" readonly/>
            </div>

            <div class="form-group col-sm-3 col-xs-12">
                <label class="label top-label">إسم الموظف</label>
                <input type="text" class="form-control bottom-input" name="emp_name" value="<?=$employee['employee']?>" readonly />
            </div>
<!--
            <div class="col-sm-12">
                <h6 class="text-center inner-heading">بيانات المستندات والبطاقات والمهارات</h6>
            </div>
-->
            <div class="form-group col-sm-4 col-xs-12">
               <button type="button" class="btn btn-purple w-md m-b-5" value="1" onclick="getBanks($(this).val(),<?php if(isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);"><i class="fa fa-plus"></i> إضافة مرفق جديد</button>
              </div>

            <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr class="info">
                        <th class="text-center">إسم المرفق</th>
                        <th class="text-center">إرفاق - تحميل  قراءة المستند</th>
                        <th class="text-center">هل يوجد تاريخ</th>
                        <th class="text-center">من تاريخ </th>
                        <th class="text-center">إلي تاريخ</th>
                        <?php if(isset($allData)){ ?>
                        <th class="text-center">حذف</th>
                        <?php } ?>
                    </tr>
                </thead>
                
                <tbody id="result"></tbody>
                <tbody>
                <?php 
                if(isset($allData) && $allData !=null) {  
                    foreach ($allData as $key => $value) { 
                    
                    $class = 'class';
                    
                    $disabled = 'disabled';
                           
                ?>
                
                <tr>
                    <td>
                        <div class="col-sm-12">
                           
                        <select  class="form-control bottom-input" <?=$disabled?> >
                            <?php if(isset($files_names) && !empty($files_names)){
                                foreach($files_names as $row){
                                    $selected='';if($row->id_setting == $value->title){$selected='selected';}
                                  echo '<option value="'.$row->id_setting.'" '.$selected.'>'.$row->title_setting.'</option>';
                                }
                            }else {
                                echo '<option value=""> لا يوجد أسماء مرفقات مضافة </option>';
                            }?>
                            </select>
                        </div>
                    </td>
                    
                    
                    <td>
                        
                        <?php 
                        
                         if(isset($allData)){
                            ?>
                             <div class="col-sm-12">
							<a href="<?php echo base_url() . 'uploads/images/'.$value->emp_file ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>
                                 <a  data-toggle="modal" data-target="#myModal-view-<?=$value->id?>" >
                                     <i class="fa fa-eye" title=" قراءة"></i> </a>
                            </div>
                        <?php
                         }else{ ?>
                            <div class="col-sm-12">
                            <input type="file" class="form-control bottom-input" name="emp_file<?=$key?>" id="emp_file<?=$key?>" value="<?=$value->emp_file?>"  <?=$disabled?>/>
                            </div>
                      <?php   }
                        ?>
                    </td>
                    
                  <td>
                        <div class="col-sm-12">
                            <select name="commited[<?=$key?>]" class="form-control bottom-input <?=$class?>"  <?=$disabled?>>
                                        <option value="">إختر</option>
                                        <?php 
                                        foreach ($array as $k => $va) { 
                                            $select = '';
                                           if(isset($allData) && $k == $value->have_date) {
                                                $select = 'selected';
                                            }
                                            
                                        ?>
                                        <option value="<?=$k?>" <?=$select?>><?=$va?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </td>
                     <td>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control bottom-input  <?=$class?>" name="date_from[<?=$key?>]" <?php if(isset($allData) && $value->from_date > 0 ) echo 'data-validation="required" value="'.$value->from_date.'"'; else echo 'disabled' ?> <?=$disabled?> />
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control bottom-input <?=$class?>" name="date_to[<?=$key?>]" <?php if(isset($allData) && $value->to_date > 0) echo 'data-validation="required" value="'.$value->to_date.'"'; else echo 'disabled' ?> <?=$disabled?> />
                                </div>
                     </td>
                    <td>
                        <a onclick="$('#adele').attr('href', '<?=base_url()."human_resources/Human_resources/deletefilesEmp/".$value->id.'/'.$this->uri->segment(4)?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php 
                    } 
                }
                ?>
                </tbody>
            </table>

            <div class="col-xs-12">
                <input type="hidden" name="count" value="<?php if(isset($allData) && $allData != null) echo count($allData); else echo 0; ?>">
                <input type="submit" id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ">
            </div>
        </div>
    </div>
</div>


<?php echo form_close(); ?>

<?php if(isset($allData) && $allData !=null) {
foreach ($allData as $key => $value) { ?>
<div class="modal fade" id="myModal-view-<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url() . 'uploads/images/'.$value->emp_file ?>"" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<?php } }
?>


<!----------------------------------------------------------------------------------------------------------------->
<?php $data_load["personal_data"]=$personal_data; $this->load->view('admin/Human_resources/sidebar_person_data',$data_load);?>
<!----------------------------------------------------------------------------------------------------------------->


<script type="text/javascript">
jQuery(function($){
 //	$(".date_as_mask").mask("99/99/9999");
  $(".date_as_mask").mask("99/99/9999");
});
</script>



<script type="text/javascript">
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    function dateEnabled(val,id) {
        $('.date'+id).val('');
        $('.date'+id).removeAttr('data-validation');
        $('.date'+id).attr('disabled',true);
        if(val == 1) {
            $('.date'+id).removeAttr('disabled');
            $('.date'+id).attr('data-validation','required');
        }
    }
          var inc=0;
    function getBanks(argument,allCount){
         inc = inc;
        if(argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount +'&inc='+inc;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getfiles',
                data:dataString,
                cache:false,
                success: function(html){
                    $('#result').append(html);
                }
            });
            inc = ++inc;
        }
        else {
            $('#result').html('');
        }
    }


</script>

