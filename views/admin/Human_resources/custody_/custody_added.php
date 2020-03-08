<style type="text/css">
/*
.top-label {
    color: white;
    background-color: #428bcb;
    border: 2px solid #428bcb;
    border-radius: 0;
    margin-bottom: 0;
    width: 100%;
    display: block;
    padding: 2px 4px;
}
.bottom-input{
  width: 100%;
  border-radius: 0;
}
*/
</style>
<?php
$house_device_status=array(1=>'جيد',2=>'متوسط',3=>'غير جيد',4=>'يحتاج');
$disabled = '';
if(isset($allData) && $allData != null) {
echo form_open_multipart('human_resources/Human_resources/update_custody/'.$this->uri->segment(4));
}
else {
 echo form_open_multipart('human_resources/Human_resources/custody/'.$this->uri->segment(4));   
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
            <div class="form-group col-sm-2 col-xs-12">
                <label class="label top-label">كود الموظف</label>
                <input type="text" class="form-control bottom-input" name="emp_code" value="<?=$employee['emp_code']?>" readonly/>
            </div>
            <div class="form-group col-sm-3 col-xs-12">
                <label class="label top-label">اإسم الموظف</label>
                <input type="text" class="form-control bottom-input" name="emp_name" value="<?=$employee['employee']?>" readonly />
            </div>
            <div class="col-sm-12">
                <h6 class="text-center inner-heading">بيانات العهد</h6>
            </div>
            <div class="form-group col-sm-4 col-xs-12">
               <button type="button" class="btn btn-purple w-md m-b-5" value="1" onclick="getBanks($(this).val(),<?php if(isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);"><i class="fa fa-plus"></i> إضافة عهد جديد</button>
              </div>
            <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                <th>تصنيف الأصل</th>
                <th>إسم الأصل</th>
                <th>العدد</th>
                <th>الحالة</th>
                <th>تاريخ الإستلام</th>
                <?php if(isset($allData)){ ?>
                <th>حذف /نقل إلي</th>
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
                <select name="status[<?=$key?>]" class="form-control bottom-input <?=$class?>"  <?=$disabled?>>
                <option value="">إختر</option>
                <?php 
                foreach ($custody as $row) { 
                $select = '';
                if($row->id == $value->custody_id_fk){
                $select ='selected="selected"'; 
                }
                ?>
                <option value="<?=$row->id?>"  <?=$select?>><?=$row->name?></option>
                <?php } ?>
                </select>
                </div>
                </td>   
                <td>
                <div class="col-sm-12">
                <input type="text" class="form-control bottom-input" value="<?=$value->custody_title?>"  <?=$disabled?>/>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <input type="text" class="form-control bottom-input" value="<?=$value->num?>"  <?=$disabled?>/>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <select name="status[<?=$key?>]" class="form-control bottom-input <?=$class?>"  <?=$disabled?>>
                <option value="">إختر</option>
                <?php 
                foreach ($house_device_status as $k=>$v){ 
                $selects ='';
                if($k == $value->status){
                $selects ='selected="selected"'; 
                }
                ?>
                <option value="<?=$k?>" <?=$selects?>><?=$v?></option>
                <?php } ?>
                </select>
                </div>
                </td>
                 <td>
                 <div class="col-sm-12">
                 <input type="date" class="form-control bottom-input  <?=$class?>" name="date_recived[<?=$key?>]" <?php if(isset($allData) && $value->date_recived > 0 ) echo 'data-validation="required" value="'.$value->date_recived.'"'; else echo 'disabled' ?> <?=$disabled?> />
                 </div>
                 </td> 
                <td>
                 <a onclick="$('#adele').attr('href', '<?=base_url()."human_resources/Human_resources/delete_custody/".$value->id.'/'.$this->uri->segment(4)?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
                 <a data-toggle="modal" data-target="#myModalonlyaccept-<?=$value->id."-".$this->uri->segment(4)?>" class="btn btn-xs btn-success" title="تحويل" >
                <span class="fa fa-check-square-o"></span> </a>
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
                <?php 
                if(isset($allData) && $allData !=null) {  
                foreach ($allData as $key => $value) {            
                ?>
          <div class="modal fade" id="myModalonlyaccept-<?=$value->id."-".$this->uri->segment(4)?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">تحويل العهدة</h4>
            </div>
            <?php  echo form_open_multipart("human_resources/Human_resources/transfer_operation/".$value->id."/".$this->uri->segment(4)."")?>
            <div class="modal-body">
              <div class="row" style="padding: 20px">
                <div class="form-group col-sm-12 col-xs-12">
                <label class="label half top-label" style=" padding: 7px; font-size: 14px;">إختر الموظف المراد التحويل اليه</label>
                <select name="to_emp_code" class="selectpicker no-padding form-control half" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                <option value="">إختر</option>
                <?php 
                if(isset($all_employee) && $all_employee !=null){ 
                  foreach ($all_employee as $row2) { 
                  $select = '';
                ?>
                <option value="<?=$row2->id?>"  <?=$select?>><?=$row2->employee?></option>
                <?php } ?>  
               <?php  } ?>
                
                </select>
                <input type="hidden" name="from_emp_code" value="<?=$this->uri->segment(4)?>" />
                <input type="hidden" name="custody_id_fk" value="<?=$value->id?>" />
                </div>
               
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
              <button type="submit" name="action" value="action" class="btn btn-success">حفظ</button>

            </div>
            <?php echo form_close()?>
          </div>
        </div>
      </div>
<?php 
}
}
?>

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
                url: '<?php echo base_url() ?>human_resources/Human_resources/get_custody',
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