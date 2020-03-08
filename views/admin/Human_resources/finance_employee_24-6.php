
<style>
.top-label {

    font-size: 13px;
}
.form-control{
   padding: 6px 0px;
}
.inner-heading-green{
    background-color: #5eab5e;
    padding: 10px;
    color: #fff;
}
.inner-heading-red{
    background-color: #c73e45;
    padding: 10px;
    color: #fff;
}
.no-padding {
    padding-left: 0px;
    padding-right: 0px;
}

table tr.green_background th,
table tr.green_background td{
    background-color: #5eab5e;
    color: #fff;
    text-shadow: none;
    font-weight: 500;
}
table tr.red_background th,
table tr.red_background td{
    background-color: #c73e45;
    padding: 10px;
    color: #fff;
    text-shadow: none;
    font-weight: 500;
}
table tr th,
table tr td,
table thead td,
table thead th,
table tfoot th,
table tfoot td
{
    padding: 3px 5px !important;
}


.orangetd td, .orangetd th {
    color: #000;
    }
</style>

<?php
$salary_types = array(1=>'راتب أساسي',2=>'راتب مقطوع');
$disabled = '';




echo form_open_multipart('human_resources/Human_resources/financeEmployee/'.$this->uri->segment(4));

?>

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
         <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
            <div class="form-group col-md-2 col-sm-4">
                <label class="label ">كود الموظف</label>
                <input type="text" class="form-control" name="emp_code" value="<?=$employee['emp_code']?>" readonly/>
            </div>

            <div class="form-group col-md-5 col-sm-4">
                <label class="label">إسم الموظف</label>
                <input type="text" class="form-control  " name="emp_name" value="<?=$employee['employee']?>" readonly />
            </div>




            <div class="form-group col-md-3 col-sm-4">
                <label class="label">مركز التكلفة   </label>
                <select name="markz" id="markz"
                data-validation="required"   class="form-control "
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




            
    <table class="display table table-bordered responsive nowrap tb_table text-center" id="POITable" cellspacing="0" width="100%" style="table-layout: auto;">
        <thead>
            <tr class="greentd">
             <th colspan="9" class="text-center">بيانات الاستحقاقات </th>
            </tr>
            <tr class="greentd">
                <th style="width: 13%;">إسم البند</th>
                <th style="width: 10%;">  طريقه الحساب</th>
                <th style="width: 7%;">القيمه</th>
                <th style="width: 7%;">محدد المده</th>
                <th style="width:13%">من تاريخ</th>
                <th style="width:13%">الي تاريخ </th>
                <th style="width: 7%;">يخضع للتأمينات </th>
                <th style="">الدليل</th>
                <th style="    width: 7%;">الاجراء</th>

            </tr>

            <tbody id="result">
                <?php
                if(isset($allData->badlat)&&!empty($allData->badlat)) {


                    foreach ($allData->badlat as $record) {





                            if (in_array($record->badalat->badl_discount_id_fk, $bdalat_id)) {
                                ?>


                                <tr>

                                    <td>
                                        <select  disabled="disabled" class="badl_setting1 form-control"
                                                data-validation="required"
                                                id="db_band_name<?php echo $record->badalat->badl_discount_id_fk; ?>">

                                            <option value="0">اختر</option>

                                            <?php
                                            if (isset($badalat) && !empty($badalat)) {
                                                foreach ($badalat as $row) {

                                                    ?>
                                                    <option
                                                        value="<?php echo $row->id; ?>"<?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                        echo 'selected';
                                                    } ?>><?php echo $row->title; ?></option>


                                                <?php }
                                            } ?>

                                        </select>
                                    </td>
                                    <td>
                                        <select disabled="disabled" class="form-control" data-validation="required">

                                            <option>اختر</option>
                                            <option value="1"<?php if ($record->badalat->method_to_count == 1) {
                                                echo 'selected';
                                            } ?>>قيمه
                                            </option>
                                            <option value="2"<?php if ($record->badalat->method_to_count == 2) {
                                                echo 'selected';
                                            } ?>>نسبه
                                            </option>


                                        </select>
                                    </td>
                                    <td>
                                        <input disabled="disabled" class="form-control" type="text"
                                               data-validation="required" value="<?php echo $record->badalat->value; ?>"
                                               class="form-control valu">
                                    </td>

                                    <?php
                                    $yes_no = array(1 => 'نعم', 2 => 'لا');
                                    ?>
                                    <td>
                                        <select class="form-control" disabled="disabled" onchange="" id="peroid"
                                                value="" class="form-control" name="" data-validation="required">

                                            <option value="0">اختر</option>
                                            <?php
                                            foreach ($yes_no as $key => $value) {
                                                ?>
                                                <option value="<?= $key ?>"<?php if ($key == $record->badalat->specific_period) {
                                                    echo 'selected';
                                                } ?> ><?= $value ?></option>

                                            <?php } ?>

                                        </select>
                                    </td>


                                    <td>
                                        <input class="form-control" type="date" disabled="disabled"
                                               value="<?php if ($record->badalat->specific_period == 1) {
                                                   echo $record->badalat->date_from;
                                               } ?>" class="form-control" data-validation="required"
                                               >
                                    </td>
                                    <td>
                                        <input class="form-control" disabled="disabled" type="date"
                                               value="<?php if ($record->badalat->specific_period == 1) {
                                                   echo $record->badalat->date_to;
                                               } ?>" class="form-control" data-validation="required"
                                               >
                                    </td>
                                    <td>
                                        <div class="skin-square">
                                             <div class="i-check">
                                            <input class="" disabled="disabled" type="checkbox" money="0"
                                                   class="check_value" value="1"<?php if ($record->badalat->insurance_affect == 1) {
                                                echo 'checked';
                                            } ?>>
                                            </div> 
                                            
                                        </div>


                                    </td>


                                    <td>
                                        <select disabled="disabled" class="form-control" data-validation="required"
                                                class="form-control">

                                            <option>اختر</option>
                                            <option value="1"<?php if ($record->badalat->dalel_code == 1) {
                                                echo 'selected';
                                            } ?>>1
                                            </option>
                                            <option value="2"<?php if ($record->badalat->dalel_code == 2) {
                                                echo 'selected';
                                            } ?>>2
                                            </option>


                                        </select>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>human_resources/human_resources/delete_emp_finance_data/<?php echo $record->badalat->id; ?>/<?php echo $record->badalat->emp_code; ?>/<?php echo$record->badalat->value; ?>/1"
                                           onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>
                                        <a data-toggle="modal" type="button" style="cursor: pointer"
                                           data-target="#modal_having<?php echo $record->badalat->id; ?>"
                                           onclick="fill_modal_select(1,<?php echo $record->badalat->badl_discount_id_fk; ?>);">

                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                </tr>

                                <!------------------------- start_modal - الاستحقاقات------------------------------------------------------------------>


                                <!------------------------- end_modal - الاستحقاقات------------------------------------------------------------------>


                                <?php
                            }

                    }
                }

                ?>



            </tbody>
            <tr class="greentd">
                <input type="hidden" value="<?php if(isset($allData->get_having_value)&&!empty($allData->get_having_value)){echo $allData->get_having_value; } else { echo 0 ; }?> " name="db_value_have" id="db_value">
                <input type="hidden" value="<?php if(isset($allData->tamin_value)&&!empty($allData->tamin_value)){echo $allData->tamin_value; } else { echo 0; }?> " name="db_value_have2" id="db_value_tamin">

                <td colspan="2">إجمالي بنود الإستحقاقات</td>
                <td><input type="text"  readonly="readonly" name="having_all_value" class="form-control" value="<?php if(isset($allData->get_having_value)&&!empty($allData->get_having_value)){echo $allData->get_having_value; } else{ echo 0 ;}?> " id="all_value1"></td>
                <td colspan="3"  >اجمالي البنود الخاضعه للتأمينات</td>
                <td><input type="text" readonly="readonly" name="having_tamin_value"  class="form-control" value="<?php if(isset($allData->tamin_value)&&!empty($allData->tamin_value)){echo $allData->tamin_value; } else {echo 0;} ?>" id="checked_value1"></td>
                <td></td>
                <td></td>
            </tr>

        </table>

        <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
           <button class="btn btn-warning btn-labeled"  type="button" onclick="add_row(1,<?php echo count($badalat);?>)"><span class="btn-label"><i class="fa fa-plus"></i></span>اضافه استحقاق</button>
        
                <button type="submit" id=""  name="add" class="btn btn-success btn-labeled" value=" حفظ بيانات الإستحقاق"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ بيانات الإستحقاق</button>
            
        </div>

     <?php  echo form_close() ;
      ?>





<!------------------------------------------------------------------------------------->




<?php echo form_open_multipart('human_resources/Human_resources/financeEmployee/'.$this->uri->segment(4));
  ?> 

        
        
        <!--<button class="btn btn-add" type="button" onclick="add_row(2,<?php echo count($discounts);?>)">اضافه استقطاع</button>-->
            <input type="hidden" value="<?php echo $this->uri->segment(4);?>" id="emp_id">
       <table class="display table table-bordered responsive nowrap tb_table text-center" id="POITable2" cellspacing="0" width="100%" style="table-layout: auto;">
        <thead>
            <tr class="orangetd">
                 <th colspan="8" class="text-center"> بيانات الاستقطاعات </th>
            </tr>
            <tr class="orangetd">
                <th style="width: 13%;">إسم البند</th>
                <th style="width: 10%;">  طريقه الحساب</th>
                <th style="width: 7%;">القيمه</th>
                <th style="width: 7%;">محدد المده</th>
                <th style="width:13%">من تاريخ</th>
                <th style="width:13%">الي تاريخ </th>
              <!--  <th style="width: 7%;">يخضع للتأمينات </th> -->
                <th style="">الدليل</th>
                <th style="width: 7%;">الاجراء</th>

            </tr>

                <tbody id="result2">

<?php
//           echo "<pre>";
//           print_r($allData->badlat->badalat);
//           echo "</pre>";
//           ?>


                    <?php
                    if(isset($allData->badlat)&&!empty($allData->badlat)) {

                        foreach ($allData->badlat as $record) {


                                if (isset($record->badalat) &&!empty($record->badalat)&&in_array($record->badalat->badl_discount_id_fk, $cuts_id)) {
                                    ?>

                                    <tr>

                                        <td>
                                            <select  disabled="disabled" class="form-control badl_setting2" name=""
                                                    id="db_band_name<?php echo $record->badalat->badl_discount_id_fk; ?>"
                                                    class="form-control"
                                                    data-validation="required">

                                                <option value="0">اختر</option>

                                                <?php
                                                if (isset($discounts) && !empty($discounts)) {
                                                    foreach ($discounts as $row) {

                                                        ?>
                                                        <option
                                                            value="<?php echo $row->id; ?>"<?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                            echo 'selected';
                                                        } ?>><?php echo $row->title; ?></option>


                                                    <?php }
                                                } ?>

                                            </select>
                                        </td>
                                        <td>
                                            <select disabled="disabled" name="" class="form-control"
                                                    data-validation="required">

                                                <option>اختر</option>
                                                <option value="1"<?php if ($record->badalat->method_to_count == 1) {
                                                    echo 'selected';
                                                } ?>>قيمه
                                                </option>
                                                <option value="2"<?php if ($record->badalat->method_to_count == 2) {
                                                    echo 'selected';
                                                } ?>>نسبه
                                                </option>


                                            </select>
                                        </td>
                                        <td>
                                            <input disabled="disabled" type="text" data-validation="required"
                                                   value="<?php echo $record->badalat->value; ?>" class="form-control valu"
                                                   name="">
                                        </td>

                                        <?php
                                        $yes_no = array(1 => 'نعم', 2 => 'لا');
                                        ?>
                                        <td>

                                            <select class="form-control" disabled="disabled" onchange="" id="" value=""
                                                    name="" data-validation="required">

                                                <option value="0">اختر</option>
                                                <?php
                                                foreach ($yes_no as $key => $value) {
                                                    ?>
                                                    <option
                                                        value="<?= $key ?>"<?php if ($key == $record->badalat->specific_period) {
                                                        echo 'selected';
                                                    } ?> ><?= $value ?></option>

                                                <?php } ?>

                                            </select>

                                        </td>
                                        <td>
                                            <input type="date" disabled="disabled"
                                                   value="<?php if ($record->badalat->specific_period == 1) {
                                                       echo $record->badalat->date_from;
                                                   } ?>" class="form-control" data-validation="required"
                                                   >
                                        </td>
                                        <td>
                                            <input disabled="disabled" type="date"
                                                   value="<?php if ($record->badalat->specific_period == 1) {
                                                       echo $record->badalat->date_to;
                                                   } ?>"
                                                   class="form-control" data-validation="required"
                                                   >
                                        </td>

                                        <!--  <td>
                                        <input disabled="disabled" type="checkbox" money="0" class="check_value" value="1"<?php if ($record->badalat->insurance_affect == 1) {
                                            echo 'checked';
                                        } ?>
                                        name="">
                                    </td>
-->

                                        <td>
                                            <select disabled="disabled" name="" class="form-control"
                                                    data-validation="required">

                                                <option>اختر</option>
                                                <option value="1"<?php if ($record->badalat->dalel_code == 1) {
                                                    echo 'selected';
                                                } ?>>1
                                                </option>
                                                <option value="2"<?php if ($record->badalat->dalel_code == 2) {
                                                    echo 'selected';
                                                } ?>>2
                                                </option>


                                            </select>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>human_resources/human_resources/delete_emp_finance_data/<?php echo $record->badalat->id; ?>/<?php echo $record->badalat->emp_code; ?>/<?php echo $record->badalat->value; ?>/2"
                                               onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                                                    class="fa fa-trash" aria-hidden="true"></i> </a>
                                            <a data-toggle="modal" type="button" style="cursor: pointer"
                                               data-target="#modal_discut<?php echo $record->badalat->id; ?>"
                                               onclick="fill_modal_select(2,<?php echo $record->badalat->badl_discount_id_fk; ?>);">

                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>


                                    </tr>


                                    <!------------------------- start_modal - الاستقطاعات------------------------------------------------------------------>


                                    <!------------------------- end_modal - الاستقطاعات------------------------------------------------------------------>


                                    <?php
                                }
                            }

                    }

                    ?>

                </tbody>
                <tfoot>
                <tr class="orangetd"  style="margin-bottom: 10px;">
                    <input type="hidden" name="db_value_cut" value="<?php if(isset($allData->get_discut_value)&&!empty($allData->get_discut_value)){echo $allData->get_discut_value; } else{ echo 0 ;}?> "id="db_value_cut">
                    <input type="hidden" value="<?php if(isset($allData->discut_tamin_value)&&!empty($allData->discut_tamin_value)){echo $allData->discut_tamin_value; } else { echo 0; }?> " name="db_value_have2" id="db_value_tamin_discut">



                    <td colspan="2">إجمالي بنود الإستقطاعات</td>
                    <td><input type="text" readonly="readonly" class="form-control" name="discut_all_value" value="<?php if(isset($allData->get_discut_value)&&!empty($allData->get_discut_value)){echo $allData->get_discut_value; }else{ echo 0 ;} ?> " id="all_value2"></td>
                 <td colspan="5" style="text-align: center;" ></td>
                 </tfoot>



                </tr>

            </table>



            <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
                <button class="btn btn-warning btn-labeled"  type="button" onclick="add_row(2,<?php echo count($discounts);?>)"><span class="btn-label"><i class="fa fa-plus"></i></span>اضافه استقطاع</button>
                <button type="submit" id=""  name="add" class="btn btn-success btn-labeled" value=" حفظ بيانات الإستقطاع"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ بيانات الإستقطاع</button>
                        
            </div>




     <?php  echo form_close() ; ?>






            
<?php echo form_open_multipart('human_resources/Human_resources/financeEmployee/'.$this->uri->segment(4));

  ?>
            
            
            <table class="display table table-bordered responsive nowrap text-center"  id="banktable" cellspacing="0" width="100%">
                
                <thead>
                   <tr class="greentd">
                      
                      <th colspan="6" class="text-center">بيانات الحسابات البنكية</th>
                   </tr>
                    <tr class="greentd">
                        <th>إسم البنك</th>
                        <th>كود البنك</th>
                        <th>رقم الحساب</th>
                        <th>صوره الحساب </th>
                        <th>البنك النشط</th>
                        <?php if(isset($allData->Banks)) { ?>
                        <th>حذف</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody id="result_bank"></tbody>
                <tbody>
                <?php 
                if(isset($allData->Banks)) {  
                    foreach ($allData->Banks as $key => $value) { 
                ?>
                <tr>
                    <td>

                            <select name="" disabled="disabled" class="form-control bottom-input" data-validation="required" onchange="$('#bank_code<?=$key?>').val($(this).find('option:selected').attr('bank_code'))" >
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

                    </td>
                    <td>

                            <input type="text" disabled="disabled" class="form-control bottom-input" name="" id="bank_code<?=$key?>" value="<?=$value->bank_code?>" readonly/>

                    </td>
                    <td>

                            <input type="text" disabled="disabled"   maxlength="24" minlength="24" class="form-control bottom-input" name="" id="bank_account_num<?=$key?>" data-validation="required" onfocusout="checkLength($(this).val());" value="<?=$value->bank_account_num?>" />

                    </td>
                    <td>

                            <a data-toggle="modal" type="button" style="cursor: pointer"
                                    data-target="#modal-img<?php echo $value->id;?>">

                                <i class="fa fa-eye"></i>
                            </a>

                    </td>

                    <td>
                        <div class="col-sm-12">
                            <?php
                            if($value->approved_for_sarf==0) {
                                $approved_for_sarf = 1;
                                $class='btn-danger';
                                $word='غير نشط';
                            }elseif($value->approved_for_sarf==1){
                                $approved_for_sarf = 0;
                                $class='btn-success';
                                $word=' نشط';
                            }
                            ?>

                            <button class="<?php echo $class;?>" row_id="<?php echo $bank->id;?>"><?php echo $word;?></button> <button  type="button" class="btn-danger" row_id="<?php echo $bank->id;?>" onclick="change_status2(<?php echo $value->id;?>,<?php echo $this->uri->segment(4);?>,<?php echo $approved_for_sarf;?>);"><i class=" fa fas fa-undo"></i></button>
                        </div>
                    </td>
                    <td><a href="<?php echo base_url();?>human_resources/Human_resources/deleteFinanceEmp/<?php echo $value->id;?>/<?php echo $this->uri->segment(4)?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                        <a data-toggle="modal" type="button" style="cursor: pointer"
                                data-target="#modal-info<?php echo $value->id;?>">

                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <?php 
                    } 
                }
                ?>
                </tbody>
            </table>
			
			
			
            
            
<!--
            <table class="display table table-bordered responsive nowrap"  id="banktable" cellspacing="0" width="100%" style="table-layout: auto;">
                <thead>
                    <tr class="info">
                        <th>إسم البنك</th>
                        <th width="15%">كود البنك</th>
                        <th>رقم الحساب</th>
                        <th>البنك حالة</th>
                        <?php if(isset($allData->Banks)) { ?>
                        <th>حذف</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody id="result_bank"></tbody>
                <tbody>
                    <?php 
                    if(isset($allData->Banks)) {  
                        foreach ($allData->Banks as $key => $value) { 
                            ?>
                            <tr>
                                <td>
                                  
<select name="" disabled="disabled" class="form-control" 
     data-validation="required" onchange="$('#bank_code<?=$key?>').val($(this).find('option:selected').attr('bank_code'))" >
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
                                  
                                </td>
                                <td>
                                    
                                        <input type="text" disabled="disabled" class="form-control" name="" id="bank_code<?=$key?>" value="<?=$value->bank_code?>" readonly/>
                                 
                                </td>
                                <td>
                                  
                                        <input type="text" disabled="disabled"   maxlength="24" minlength="24" class="form-control" name="" id="bank_account_num<?=$key?>" data-validation="required" onfocusout="checkLength($(this).val());" value="<?=$value->bank_account_num?>" />
                               
                                </td>
                                <td>
                                   
                                        <?php
                                        if($value->approved_for_sarf==0) {
                                            $approved_for_sarf = 1;
                                            $class='btn-danger';
                                            $word='غير نشط';
                                        }elseif($value->approved_for_sarf==1){
                                            $approved_for_sarf = 0;
                                            $class='btn-success';
                                            $word=' نشط';
                                        }
                                        ?>

                                        <button class="<?php echo $class;?>" row_id="<?php echo $bank->id;?>"><?php echo $word;?></button> <button  type="button" class="btn-danger" row_id="<?php echo $bank->id;?>" onclick="change_status2(<?php echo $value->id;?>,<?php echo $this->uri->segment(4);?>,<?php echo $approved_for_sarf;?>);"><i class=" fa fas fa-undo"></i></button>
                                  
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
-->

            <div class="col-xs-12 text-center">
              <button onclick="get_bank();" type="button" class=" btn btn-warning btn-labeled"><span class="btn-label"><i class="fa fa-plus"></i></span> اضافه بنك</button>
               
                    <input type="hidden" name="count" value="<?php if(isset($allData->Banks)) echo count($allData->Banks); else echo 0; ?>">
                    
                <button  type="button" id="buttons" name="add" class=" btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ حسابات البنك</button> 
                     
            </div>
        </div>
        
        
        <!--
<?php // $data_load["personal_data"]=$personal_data; $this->load->view('admin/Human_resources/sidebar_person_data',$data_load);?>
-->

        
        
    </div>
</div>
<?php echo form_close(); ?>


<?php

			if(isset($allData->Banks)) {
    foreach ($allData->Banks as $key => $value) {
        ?>
        <?php echo form_open_multipart('human_resources/Human_resources/edit_account/' . $this->uri->segment(4) . ''); ?>


        <div class="modal" id="modal-info<?php echo $value->id;?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel<?php echo $value->id;?>"
             data-wow-duration="0.5s">


            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabe<?php echo $value->id;?>"> تعديل رقم الحساب</h4>
                    </div>



                    <div class="modal-body row">
                        <div class="col-sm-8 no-padding">
                            <input type="hidden" value="<?php echo $value->id;?>" name="row_id">
                            <div class="form-group col-xs-12">
                                <label class="label label-green  half">اسم البنك<strong class="astric">*</strong><strong></strong> </label>
                                <select name="edit_bank_id_fk" id="bank_id_fk<?php echo $value->id;?>" data-validation="required" aria-required="true" onchange="get_code_bank(<?php echo $value->id; ?>)"  class="form-control half">

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
                            <div class="form-group col-xs-12">
                                <label class="label label-green  half">كود البنك<strong class="astric">*</strong><strong></strong> </label>
                                <input type="text"  class="form-control half input-style" name="" id="bank_code2<?=$value->id?>" value="<?=$value->bank_code?>" readonly />


                            </div>
                            <div class="form-group  col-xs-12">
                                <label class="label label-green  half">رقم الحساب <strong class="astric">*</strong><strong></strong> </label>
                                <input type="text" class="form-control half input-style"   maxlength="24" minlength="24" class="form-control bottom-input" name="edit_bank_account_num" id="bank_account_num<?=$key?>" data-validation="required" onfocusout="checkLength($(this).val());" value="<?=$value->bank_account_num?>" />


                            </div>
                            </div>
                        <?php if($value->bank_id_fk_image!=0) {


                            $img_url ="uploads/images/".$value->bank_id_fk_image;
                        }

                  else{
                        $img_url= "asisst/web_asset/img/logo.png" ;


                         }?>

                        <div class="col-sm-4 no-padding">


                            <div class="form-group col-xs-12">
                                <div class="form-group col-xs-12" style="padding-right: 0">
                                    <div class="form-group">
                                        <div id="post_img" class="imgContent" style="min-height: 120px; ">
                                            <img id="blah<?php echo $value->id;?>" style="width: 150px;" src="<?php echo base_url().$img_url;?>">

                                        </div>
                                    </div>
                                </div>
                                <input type="file" id="bank_image" name="bank_image" class="form-control" onchange="readURL(this,<?php echo $value->id;?>);" >

                            </div>




                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12">
                                <input type="submit" id="" name="edit"
                                       class="btn btn-blue btn-close" value="تعديل"/>
                            </div>

                        </div>


                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">إغلاق</button>
                    </div>

                </div>
            </div>
        </div>


        <?php  echo form_close() ; ?>
        <!------------------------------------------------------------------------------------------modal_image--------------------->

        <div class="modal fade" id="modal-img<?php echo $value->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>

                    <div class="modal-body">
                        <?php if($value->bank_id_fk_image!=0){?>


                            <img src="<?php echo base_url();?>uploads/images/<?php echo $value->bank_id_fk_image;?>" width="100%" height="">
            <?php }else{ ?>
                            <img src="<?php echo base_url();?>asisst/web_asset/img/logo.png" width="100%" height="">


                        <?php } ?>



                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>


                    </div>

                </div>
            </div>
        </div>





    <?php }
}?>










<!---------------------------- modal    ------------------------------->







<!------------------------- start_modal - الاستحقاقات------------------------------------------------------------------>
<?php
if(isset($allData->badlat)&&!empty($allData->badlat)) {

    foreach ($allData->badlat as $record) {
        if (isset($record->badalat) &&!empty($record->badalat)&&in_array($record->badalat->badl_discount_id_fk, $bdalat_id)) {
            ?>

            <?php echo form_open_multipart('human_resources/Human_resources/edit_having_employee/' . $this->uri->segment(4) . '/1'); ?>
            <div class="modal" id="modal_having<?php echo $record->badalat->id; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="modal_having<?php echo $record->badalat->id; ?>"
                 data-wow-duration="0.5s">


                <div class="modal-dialog" role="document" style="width: 80%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title" id="myModalLabemodal_having<?php echo $record->badalat->id; ?>">تعديل
                                استحقاقات
                                الموظف</h5>
                        </div>


                        <div class="modal-body row">
                            <input type="hidden" name="having_row_id" value="<?php echo $record->badalat->id; ?>">
                            <div class="col-md-12">
                                <div class="col-md-3 padding-4">
                                    <label class="label ">اسم البند</label>
                                    <select class="form-control "  data-validation="required" aria-required="true"
                                            tabindex="-1" aria-hidden="true" id="band_name<?php echo $record->badalat->badl_discount_id_fk;?>" name="have_badl_discount_id_fk">


                                        <option value="0">اختر</option>

                                        <?php
                                        if (isset($badalat) && !empty($badalat)) {
                                            foreach ($badalat as $row) {

                                                ?>
                                                <option
                                                    value="<?php echo $row->id; ?>"<?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                    echo 'selected';
                                                } ?>><?php echo $row->title; ?></option>


                                            <?php }
                                        } ?>


                                        <select>
                                </div>
                                <div class="col-md-3 padding-4">
                                    <label class="label ">طريقه الحساب </label>
                                    <select class="form-control " data-validation="required" aria-required="true"
                                            tabindex="-1" aria-hidden="true" name="have_method_to_count">


                                        <option>اختر</option>
                                        <option value="1"<?php if ($record->badalat->method_to_count == 1) {
                                            echo 'selected';
                                        } ?>>قيمه
                                        </option>
                                        <option value="2"<?php if ($record->badalat->method_to_count == 2) {
                                            echo 'selected';
                                        } ?>>نسبه
                                        </option>


                                        <select>
                                </div>
                                <div class="col-md-3 padding-4">
                                    <label class="label ">القيمه </label>
                                    <input class="form-control " name="have_value" type="text"
                                           data-validation="required"
                                           value="<?php echo $record->badalat->value; ?>" class="form-control">

                                </div>
                         
                                <div class="col-md-3 padding-4">
                                    <label class="label ">محدد </label>
                                    <select class="form-control " onchange="limit_peroid($(this).val(),<?php echo $record->badalat->id;?>);" data-validation="required" aria-required="true"
                                            tabindex="-1" aria-hidden="true" name="have_specific_period">


                                        <option value="0">اختر</option>
                                        <?php
                                        foreach ($yes_no as $key => $value) {
                                            ?>
                                            <option value="<?= $key ?>"<?php if ($key == $record->badalat->specific_period) {
                                                echo 'selected';
                                            } ?> ><?= $value ?></option>

                                        <?php } ?>


                                        <select>
                                </div>

                                <div class="col-md-3 padding-4">
                                    <label class="label ">من تاريخ </label>
                                    <input class="form-control " name="have_date_from" type="date"
                                           value="<?php if ($record->badalat->specific_period == 1) {
                                               echo $record->badalat->date_from;
                                           } ?>"  id="have_date_from<?php echo $record->badalat->id;?>" data-validation="required"  <?php  if($record->badalat->specific_period!=1) {  echo 'disabled';  } ?>>

                                </div>

                                <div class="col-md-3 padding-4">
                                    <label class="label ">الي تاريخ </label>
                                    <input class="form-control " type="date" name="have_date_to" id="have_date_to<?php echo $record->badalat->id;?>"
                                           value="<?php if ($record->badalat->specific_period == 1) {
                                               echo $record->badalat->date_to;
                                           } ?>"  data-validation="required"  <?php  if($record->badalat->specific_period!=1) {  echo 'disabled';  } ?>>

                                </div>



                                <div class="col-md-3 padding-4">
                                
                                    <label class="label ">يخضع للتأمين </label>
                                    
                                    <div class="radio-content">
                                    <input class="" name="have_insurance_affect" type="radio" money="0"
                                           class="check_value" id="yes-eadio"
                                           value="1"<?php if ($record->badalat->insurance_affect == 1) {
                                        echo 'checked';
                                    } ?>>
                                    <label class="radio-label" for="yes-eadio">نعم</label>
                                    
                                    </div>
                                    <div class="radio-content">
                                    <input class="" name="have_insurance_affect" type="radio" money="0"
                                           class="check_value" id="no-eadio"
                                           value="0"<?php if ($record->badalat->insurance_affect == 0) {
                                        echo 'checked';
                                    } ?>>
                                    <label class="radio-label" for="no-eadio">لا</label>
                                    </div>


                                </div>
                                <div class="col-md-3">
                                    <label class="label">الدليل</label>
                                    <select class="form-control " data-validation="required" name="have_dalel_code" >

                                        <option>اختر</option>
                                        <option value="1"<?php if ($record->badalat->dalel_code == 1) {
                                            echo 'selected';
                                        } ?>>1
                                        </option>
                                        <option value="2"<?php if ($record->badalat->dalel_code == 2) {
                                            echo 'selected';
                                        } ?>>2
                                        </option>


                                    </select>
                                </div>


                            </div>
                            </br> 

                            
                                    
                       


                        </div>


                        <div class="modal-footer">
                        <button type="submit" id="" name="edit" class="btn btn-sucess btn-labeled pull-left" value="حفظ"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        </div>

                    </div>
                </div>
            </div>


            <?php echo form_close(); ?>
            <?php
        }
    }
}
?>

<!------------------------------------------------- ----------------------------------------------------------------------------------------->











<!------------------------- end_modal - الاستحقاقات------------------------------------------------------------------>

<!------------------------- start_modal - الاستقطاعات------------------------------------------------------------------>

<?php
if(isset($allData->badlat)&&!empty($allData->badlat)) {

    foreach ($allData->badlat as $record) {
        if (in_array(isset($record->badalat) &&!empty($record->badalat)&&$record->badalat->badl_discount_id_fk, $cuts_id)) {
            ?>


            <?php echo form_open_multipart('human_resources/Human_resources/edit_having_employee/' . $this->uri->segment(4) . '/2'); ?>
            <div class="modal" id="modal_discut<?php echo $record->badalat->id;?>" tabindex="-1" role="dialog"
                 aria-labelledby="modal_having<?php echo $record->badalat->id;?>"
                 data-wow-duration="0.5s">


                <div class="modal-dialog" role="document" style="width: 80%;" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabemodal_having<?php echo $record->badalat->id;?>">تعديل استقطاعات الموظف</h4>
                        </div>



                        <div class="modal-body row">
                            <input type="hidden" name="having_row_id" value="<?php echo $record->badalat->id;?>">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <label class="label label-green  half">اسم البند</label>
                                    <select class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" id="band_name<?php echo $record->badalat->badl_discount_id_fk;?>" name="have_badl_discount_id_fk">


                                        <option value="0">اختر</option>

                                        <?php
                                        if (isset($discounts) && !empty($discounts)) {
                                            foreach ($discounts as $row) {

                                                ?>
                                                <option
                                                    value="<?php echo $row->id; ?>"<?php if($row->id==$record->badalat->badl_discount_id_fk){ echo 'selected' ;}?>><?php echo $row->title; ?></option>


                                            <?php }
                                        } ?>


                                        <select>
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-green  half">طريقه الحساب </label>
                                    <select class="form-control half" id="" onchange="get_value_modal($(this).val(),<?php echo $record->badalat->badl_discount_id_fk?>);" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" name="have_method_to_count">


                                        <option>اختر</option>
                                        <option value="1"<?php if($record->badalat->method_to_count==1){ echo 'selected' ;}?>>قيمه</option>
                                        <option value="2"<?php if($record->badalat->method_to_count==2){ echo 'selected' ;}?>>نسبه</option>


                                        <select>
                                </div>
                                <div class="col-md-4">
                                    <label class="label label-green  half">القيمه </label>
                                    <input class="form-control half value<?php echo $record->badalat->badl_discount_id_fk?>" id="edit_val<?php echo $record->badalat->badl_discount_id_fk?>" name="have_value" type="text" data-validation="required" value="<?php echo $record->badalat->value;?>" >

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <label class="label label-green  half">محدد </label>
                                    <select class="form-control half" data-validation="required" aria-required="true"onchange="limit_peroid($(this).val(),<?php echo $record->badalat->id;?>);" tabindex="-1" aria-hidden="true" name="have_specific_period">



                                        <option value="0">اختر </option>
                                        <?php
                                        foreach ($yes_no as $key=>$value){?>
                                            <option value="<?=$key?>"<?php if ($key==$record->badalat->specific_period){ echo 'selected'  ; }  ?> ><?=$value?></option>

                                        <?php } ?>




                                        <select>
                                </div>

                                <div class="col-md-4">
                                    <label class="label label-green  half">من تاريخ </label>
                                    <input  class="form-control half" id="have_date_from<?php echo $record->badalat->id;?>" name="have_date_from" type="date" <?php  if($record->badalat->specific_period!=1) {  echo 'disabled';  } ?>  value="<?php  if($record->badalat->specific_period==1) {  echo $record->badalat->date_from;  } ?>" class="form-control" data-validation="required"  style="width: 130px;"  >

                                </div>

                                <div class="col-md-4">
                                    <label class="label label-green  half">الي تاريخ </label>
                                    <input  class="form-control half" id="have_date_to<?php echo $record->badalat->id;?>"    type="date" name="have_date_to"  <?php  if($record->badalat->specific_period!=1) {  echo 'disabled';  } ?> value="<?php  if($record->badalat->specific_period==1) {  echo $record->badalat->date_to;  } ?>" class="form-control" data-validation="required" style="width: 130px;">

                                </div>



                            </div>
                            <div class="col-md-12">

                                <div class="col-md-4">
                                    <label class="label label-green  half">الدليل</label>
                                    <select class="form-control half" data-validation="required" name="have_dalel_code"  class="form-control half">

                                        <option>اختر</option>
                                        <option value="1"<?php if($record->badalat->dalel_code==1){ echo 'selected' ;}?>>1</option>
                                        <option value="2"<?php if($record->badalat->dalel_code==2){ echo 'selected' ;}?>>2</option>


                                    </select>
                                </div>


                            </div></br></br>

                            <div class="col-md-12">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <input type="submit" id="" name="edit"
                                           class="btn btn-blue btn-close" value="تعديل"/>
                                </div>

                            </div>


                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">إغلاق</button>
                        </div>

                    </div>
                </div>
            </div>





            <?php  echo form_close() ; ?>


        <?php }
    }
}
?>
<!---------------------------------------------------------------------------نهايه الاستقطاعات------------------------------------------------------------------------









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
            var x = document.getElementById('banktable');

            var len_tab1 = x.rows.length;
            argument=len_tab1;
            var dataString = 'numbers=' + argument + '&count=' + allCount;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getBanks',
                data:dataString,
                cache:false,
                success: function(html){
                    $('#result_bank').append(html);
                }
            });
        }
        else {
            $('#result_bank').html('');
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

<!-- ----------------------------------------------------------- -->

<script>

    function deleteRow(row,type) {
        var i = row.parentNode.parentNode.rowIndex;
        if(type==1){
            document.getElementById('POITable').deleteRow(i);
        }else{
            document.getElementById('POITable2').deleteRow(i);
        }
    }

</script>


<script>
    function add_row(type2,count2)
    {
        var x = document.getElementById('POITable');

        var len_tab1 = x.rows.length;
        var x2 = document.getElementById('POITable2');

        var len_tab2 = x2.rows.length;
        if(type2==1)
        {
            len=len_tab1;
        }else{
            len=len_tab2
        }

       if(type2==1)
       {
         if(len_tab1>count2+1)
         {
          alert("عفوا تمت اضافه جميع الاستحقاقات");
             return;
         }
       }else{
           if(len_tab2>count2+1)
           {
               alert("عفوا تمت اضافه جميع الاستقطاعات");
               return;
           }
       }



        var valu=[];
        $(".badl_setting"+type2).each(function () {
            valu.push($(this).val());
        })
        var type=type2;


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/human_resources/add_record",
            data:{valu:valu,type:type,len:len},
            success:function(d){

                if(type2==1) {
                    $('#result').append(d);
                }else{
                    $('#result2').append(d);
                }




            }

        });
    }

</script>

<script>



    function  put_value(len,type)
    {
        var valu=$('#value'+type+len).val();
        $('#check'+type+len).attr('money',valu);
        var count_value=0;
        $(".valu"+type).each(function () {
            count_value=count_value+parseInt($(this).val());
        })
        if(type==1) {

            var old_value = parseInt($('#db_value').val());


            $('#all_value' + type).val(count_value + old_value);
        }else{


            var old_value = parseInt($('#db_value_cut').val());


            $('#all_value' + type).val(count_value + old_value);
        }





    }






</script>

<script>

    function get_checked_value(type)
    {
        var count_value=0;

        $(".check_value"+type+':checkbox:checked').each(function () {
            count_value=count_value+parseInt($(this).attr('money'));
        })
        var old_value=parseInt($('#checked_value'+type).val());

        if(type==1) {

            var old_value = parseInt($('#db_value_tamin').val());


            $('#checked_value' + type).val(count_value + old_value);
        }else{


            var old_value = parseInt($('#db_value_tamin_discut').val());


            $('#checked_value' + type).val(count_value + old_value);
        }

    }


</script>


<script>

    function get_bank()
    {
        var x = document.getElementById('banktable');

        var count = x.rows.length;
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/human_resources/getBanks",
            data:{count:count},
            success:function(d){

                $('#result_bank').append(d);


            }

        });

    }



</script>


<script>

    function get_option(valu,type)
    {
        var valu=[];
        $(".badl_setting"+type).each(function () {
            valu.push($(this).val());
        })
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/human_resources/add_option_select",
            data:{valu:valu,type:type},
            success:function(d){

                $(".badl_setting"+type).each(function () {
                    if($(this).val()==0) {
                        $(this).html(d);
                    }
                })



            }

        });
    }


</script>


<script>

    function change_status2(row,emp_code,approved)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/human_resources/change_status",
            data:{row:row,emp_code:emp_code,approved:approved},
            success:function(d){

              alert(d);
              location.reload();

          }

      });
    }


</script>

<script>

    function get_code_bank(id)
    {

        var valu=$("#bank_id_fk"+id).find('option:selected').attr('bank_code');



      $('#bank_code2'+id).val(valu);

    }


</script>
<script type="text/javascript">
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah'+id).attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-------------------------------------------------------------------------------------->
<script>
    function limit_peroid(valu,id)
    {

        if(valu==1)
        {
           document.getElementById("have_date_to"+id).removeAttribute("disabled", "disabled");
          document.getElementById("have_date_from"+id).removeAttribute("disabled", "disabled");
        }else{

          document.getElementById("have_date_to"+id).setAttribute("disabled", "disabled");
          document.getElementById("have_date_from"+id).setAttribute("disabled", "disabled");
            $("#have_date_to"+id).val('');
            $("#have_date_from"+id).val('');
        }

    }





</script>

<script>



    function fill_modal_select(type,id)
    {
        var vv=$('#db_band_name'+id).val();

        var valu=[];
        $(".badl_setting"+type).each(function () {
            if(vv!=$(this).val()) {
                valu.push($(this).val());
            }
        })


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/human_resources/fill_select_modal",
            data:{type:type,id:id,valu:valu},
            success:function(d){


                $('#band_name'+id).html(d);


            }

        });
    }
</script>

<script>

    function get_tamin_value(valu,len)
    {
        var emp_id=$('#emp_id').val();
        var value_tamin=$('#checked_value1').val();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/get_tamin_value",
            data: {emp_id: emp_id},
            success: function (d) {

                if (valu == 2) {


                    var perc = (value_tamin / 100) * d;

                    $('#value2' + len).val(Math.round(perc));


                } else {
                    $('#value2' + len).val('');
                }

            var type = 2;

        var count_value = 0;
        $(".valu2").each(function () {
            count_value = count_value + parseInt($(this).val());
        })



            var old_value = parseInt($('#db_value_cut').val());


            $('#all_value' + type).val(count_value + old_value);

    }
    });
    }


</script>
<!--------------------------------------------------------------->
<script>

    function get_value_modal(valu,id)
    {
        var value_tamin=$('#checked_value1').val();
        var emp_id=$('#emp_id').val();

        $.ajax({
            type:'post',
            url: "<?php echo base_url();?>human_resources/human_resources/get_tamin_value",
            data: {emp_id:emp_id},
            success:function(d){





                if (valu == 2) {


                    var perc = (value_tamin / 100) * d;

                    $('#edit_val'+id).val(Math.round(perc));


                }else{
                    $('#edit_val'+id).val('');
                }
            }

        });
    }




</script>




<script>



    setInterval(function(){

var having_all_value=$('#all_value1').val();
    var having_tamin_value=$('#checked_value1').val();
        var discut_all_value=$('#all_value2').val();
            var discut_tamin_value=0
        var emp_id=$('#emp_id').val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/human_resources/refresh_page",
            data:{emp_id:emp_id,
                  having_all_value:having_all_value,
                  having_tamin_value:having_tamin_value,
                  discut_all_value:discut_all_value,
                  discut_tamin_value:discut_tamin_value},
            success:function(d){


              


            }

        });

         }, 3000);
</script>


<script type="text/javascript" src="<?php echo base_url() ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>

<script>
 $('.skin-minimal .i-check input').iCheck({
     checkboxClass: 'icheckbox_minimal',
     radioClass: 'iradio_minimal',
     increaseArea: '20%'
 });
 
 $('.skin-square .i-check input').iCheck({
     checkboxClass: 'icheckbox_square-green',
     radioClass: 'iradio_square-green'
 });
 
 
 $('.skin-flat .i-check input').iCheck({
     checkboxClass: 'icheckbox_flat-red',
     radioClass: 'iradio_flat-red'
 });
 
 $('.skin-line .i-check input').each(function () {
     var self = $(this),
             label = self.next(),
             label_text = label.text();
 
     label.remove();
     self.iCheck({
         checkboxClass: 'icheckbox_line-blue',
         radioClass: 'iradio_line-blue',
         insert: '<div class="icheck_line-icon"></div>' + label_text
     });
 });
 
</script>  