


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

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-4 col-xs-12">
                <label class="label top-label">كود الموظف</label>
                <input type="text" class="form-control bottom-input" name="emp_code" value="<?=$employee['emp_code']?>" readonly/>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
                <label class="label top-label">اإسم الموظف</label>
                <input type="text" class="form-control bottom-input" name="emp_name" value="<?=$employee['employee']?>" readonly />
            </div>

            <div class="col-sm-12">
                <h6 class="text-center inner-heading">بيانات المستندات والبطاقات والمهارات</h6>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
                <label class="label top-label">عدد المرفقات</label>
                <input type="number" min="1" class="form-control bottom-input" name="number" id="number" <?php if(isset($allData) && $allData != null) echo 'data-validation="required"' ?> onkeyup="getBanks($(this).val(),<?php if(isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);" />
            </div>

            <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr class="info">
                        <th>إسم المرفق</th>
                        <th>إرفاق المستند</th>
                        <th>ملزم بتاريخ</th>
                        <th>من تاريخ </th>
                        <th>إلي تاريخ</th>
                        <?php if(isset($allData)){ ?>
                        <th>حذف</th>
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
                            <input type="text" class="form-control bottom-input" name="title[<?=$key?>]"  value="<?=$value->title?>" <?=$disabled?> />
                        </div>
                    </td>
                    
                    
                    <td>
                        <div class="col-sm-12">
                            <input type="file" class="form-control bottom-input" name="emp_file<?=$key?>" id="emp_file<?=$key?>" value="<?=$value->emp_file?>"  <?=$disabled?>/>
                        </div>
                        <?php 
                        
                         if(isset($allData)){
                            ?>
                             <div class="col-sm-12">
                            <a style="position: absolute;left: -4px;top: -24px;" class="fa fa-cloud-download" href="<?php echo base_url()."human_resources/Human_resources/downloads/".$value->emp_file?>"></a>
                      </div>
                        <?php
                         }
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

    function getBanks(argument,allCount) {
        if(argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getfiles',
                data:dataString,
                cache:false,
                success: function(html){
                    $('#result').html(html);
                }
            });
        }
        else {
            $('#result').html('');
        }
    }


</script>