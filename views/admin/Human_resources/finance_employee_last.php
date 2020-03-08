<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>


<style>
     .top-label {
    
    font-size: 13px;
 }
</style>

<?php
$salary_types = array(1=>'راتب أساسي',2=>'راتب مقطوع');
$disabled = '';


if(isset($allData) && $allData != null) {
    echo form_open_multipart('human_resources/Human_resources/deleteAllFinanceEmployee/'.$this->uri->segment(4));
   
}
else {
    echo form_open_multipart('human_resources/Human_resources/financeEmployee/'.$this->uri->segment(4));
}
?>
<div class="col-sm-9 col-md-9 col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
            <div class="pull-left">
                <?php $data_load["id"]=$this->uri->segment(4) ;
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

            <div class="form-group col-sm-2 col-xs-12 padd">
                <label class="label top-label"> نوع الراتب </label>
                <select name="salary_type" class="form-control bottom-input" data-validation="required" onchange="selectenabled($(this).val())">
                    <option value="">إختر</option>
                    <?php 
                    foreach ($salary_types as $key => $value) { 
                        $select = '';
                        if(isset($allData) && $key == $allData->salary_type) {
                            $select = 'selected';
                        }
                    ?>
                    <option value="<?=$key?>" <?=$select?>><?=$value?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-sm-2 col-xs-12">
                <label class="label top-label">الراتب / المكافأة </label>
                <input type="text" class="form-control bottom-input" name="salary" data-validation="required" onkeypress="validate_number(event)" value="<?php if(isset($allData)) echo $allData->salary ?>" />
            </div>
            
        <div class="form-group col-md-3 col-sm-3">
    <label class="label top-label">مركز التكلفة   </label>
    <select name="markz" id="markz"
            data-validation="required"   class="form-control bottom-input"
           aria-required="true">
        <?php
        if(isset($markz)&&!empty($markz)) {
            
            if(isset($allData->markz )&&!empty($allData->markz) ){
             $markz_id =    $allData->markz;
            }else{
               $markz_id = "" ;
            }
            foreach($markz as $row){
                ?>


                <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==  $markz_id )
                  { echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >


                <?php
            }
        }
        

        ?>
    </select>
</div> 

            
            
            
           
            
            
            
            <?php
            $array = array(1=>'نعم',2=>'لا');
            for ($i=0; $i < 2; $i++) { 
                $records = array();
                $title = 'الإستحقاقات';
                $th = 'البدل';
                if($i == 1) {
                    $title = 'الإستقطاعات';
                    $th = 'الخصم';
                }
                
                if(isset($badalat) && $badalat != null && $i == 0) { 
                    $records = $badalat;
                }
                if(isset($discounts) && $discounts != null && $i == 1) { 
                    $records = $discounts;
                }
            ?>

            <div class="col-sm-12">
                <h6 class="text-center inner-heading">بيانات <?=$title?></h6>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
                <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr class="info">
                            <th>إسم <?=$th?></th>
                            <th>القيمة</th>
                            <th>ملزم بتاريخ</th>
                            <th>من تاريخ</th>
                            <th>إلى تاريخ</th>
                            <th>تأمينات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($records as $record) { 
                            $class = '';
                            $disabled = '';
                            if($record->id == 1 || $record->id == 2) {
                                $class = 'class';
                                if(isset( $allData->salary_type)  && $allData->salary_type == 2) {
                                    $disabled = 'disabled';
                                }
                            }
                        ?>
                        <tr>
                            <td><?=$record->title?></td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control bottom-input <?=$class?>" name="value[<?=$record->id?>]" data-validation="required" onkeypress="validate_number(event)" value="<?php if(isset($allData) && isset($allData->badlat[$record->id])) echo $allData->badlat[$record->id]->value; else echo 0; ?>" <?=$disabled?> />
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <select name="commited[<?=$record->id?>]" class="form-control bottom-input <?=$class?>" onchange="dateEnabled($(this).val(),<?=$record->id?>)" data-validation="required" <?=$disabled?>>
                                        <option value="">إختر</option>
                                        <?php 
                                        foreach ($array as $key => $value) { 
                                            $select = '';
                                            if(isset($allData) && $allData->badlat[$record->id]->date_from > 0 && $key == 1) {
                                                $select = 'selected';
                                            }
                                            if(isset($allData) && $allData->badlat[$record->id]->date_from == 0 && $key == 2) {
                                                $select = 'selected';
                                            }
                                        ?>
                                        <option value="<?=$key?>" <?=$select?>><?=$value?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control date_as_mask bottom-input date<?=$record->id?> <?=$class?>" name="date_from[<?=$record->id?>]" <?php if(isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_from > 0) echo 'data-validation="required" value="'.date("Y-m-d",$allData->badlat[$record->id]->date_from).'"'; else echo 'disabled' ?> <?=$disabled?> />
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control date_as_mask bottom-input date<?=$record->id?> <?=$class?>" name="date_to[<?=$record->id?>]" <?php if(isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_to > 0) echo 'data-validation="required" value="'.date("Y-m-d",$allData->badlat[$record->id]->date_to).'"'; else echo 'disabled' ?> <?=$disabled?> />
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" class="bottom-input  <?=$class?>" name="insurance_affect[<?=$record->id?>]" <?php if(isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->insurance_affect == 1) echo 'checked' ?> <?=$disabled?> />
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>

            <div class="col-sm-12">
                <h6 class="text-center inner-heading">بيانات الحسابات البنكية</h6>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
                <label class="label top-label">عدد الحسابات البنكية</label>
                <input type="number" min="1" class="form-control bottom-input" name="number" id="number" 
                <?php if(isset($allData) && $allData->Banks == null) echo 'data-validation="required"' ?> 
                onkeyup="getBanks($(this).val(),<?php 
                  if(isset($allData->Banks)) 
                     echo count($allData->Banks); 
                else echo 0; ?>);" />
            </div>

            <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr class="info">
                        <th>إسم البنك</th>
                        <th>كود البنك</th>
                        <th>رقم الحساب</th>
                        <th>البنك النشط</th>
                        <?php if(isset($allData->Banks)) { ?>
                        <th>حذف</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody id="result"></tbody>
                <tbody>
                <?php 
                if(isset($allData->Banks)) {  
                    foreach ($allData->Banks as $key => $value) { 
                ?>
                <tr>
                    <td>
                        <div class="col-sm-12">
                            <select name="bank_id_fk[<?=$key?>]" class="form-control bottom-input" data-validation="required" onchange="$('#bank_code<?=$key?>').val($(this).find('option:selected').attr('bank_code'))" >
                                <option value="">إختر</option>
                                <?php 
                                if (isset($banks) && $banks != null) {
                                    foreach ($banks as $bank) {
                                        $select = '';
                                        if($bank->id == $value->bank_id_fk) {
                                            $select = 'selected';
                                        }
                                ?>
                                <option bank_code='<?=$bank->bank_code?>' value="<?=$bank->id?>" <?=$select?>><?=$bank->ar_name?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12">
                            <input type="text" class="form-control bottom-input" name="bank_code[<?=$key?>]" id="bank_code<?=$key?>" value="<?=$value->bank_code?>" readonly/>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12">
                            <input type="text" maxlength="24" minlength="24" class="form-control bottom-input" name="bank_account_num[<?=$key?>]" id="bank_account_num<?=$key?>" data-validation="required" onfocusout="checkLength($(this).val());" value="<?=$value->bank_account_num?>" />
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12">
                            <input type="radio" name="approved_for_sarf" data-validation="required" value="<?=$key?>" <?php if($value->approved_for_sarf == 1) echo 'checked' ?> />
                        </div>
                    </td>
                    <td>
                        <a onclick="$('#adele').attr('href', '<?=base_url()."human_resources/Human_resources/deleteFinanceEmp/".$value->id.'/'.$this->uri->segment(4)?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php 
                    } 
                }
                ?>
                </tbody>
            </table>

            <div class="col-xs-12">
                <input type="hidden" name="count" value="<?php if(isset($allData->Banks)) echo count($allData->Banks); else echo 0; ?>">
                <input type="submit" id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ">
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>


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

    function getBanks(argument,allCount) {
        if(argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getBanks',
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

    function checkLength(argument) {
        if(argument.length < 24) {
            alert(' رقم الحساب لابد الايقل عن 24 حرف او رقم');
        }
    }

    function selectenabled(argument) {
            $('.class').val(0);
            $('.class').removeAttr('disabled');
            $('.class').attr('data-validation','required');
        if(argument == 2) {
            $('.class').val('');
            $('.class').removeAttr('checked');
            $('.class').removeAttr('data-validation');
            $('.class').attr('disabled',true);
        }
    }
</script>