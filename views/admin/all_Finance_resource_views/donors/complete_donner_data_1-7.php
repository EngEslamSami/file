
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>



<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;

    }
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {

        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border{
        border:0 !important;
    }

    .gray_background{
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }
    .under-line{
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3 ,
    .under-line .col-xs-4,
    .under-line .col-xs-6 ,
    .under-line .col-xs-8
    {
        border-left: 1px solid #abc572;
    }

</style>

<?php
if(isset($row)&&!empty($row))
{
    $out['form']='all_Finance_resource/donors/Donor/update_donner_data/'.$this->uri->segment(5);
    $tabro3_type=$row->tabro3_type;
    $value=$row->value;
    $pay_method=$row->pay_method;
    $bank_id_fk=$row->d_bank_id_fk;
    $d_bank_account=$row->d_bank_account;
    $mostdem_from_date=$row->mostdem_from_date;
    $mostdem_to_date=$row->mostdem_to_date;
    $alert_type=$row->alert_type;
    $mostdem_img=$row->mostdem_img;
    $gamia_account=$row->gamia_account;
    $gamia_bank_id_fk=$row->gamia_bank_id_fk;
    $gamia_bank_account_num=$row->gamia_bank_account_num;
    $tabro3_status=$row->tabro3_status;
    $disp='block';
}else{
$out['form']='all_Finance_resource/donors/Donor/complete_donner_data/'.$this->uri->segment(5);
    $tabro3_type='';
    $value='';
    $pay_method='';
    $d_bank_id_fk='';
    $d_bank_account='';
    $mostdem_from_date='';
    $mostdem_to_date='';
    $alert_type='';
    $mostdem_img='';
    $gamia_account='';
    $gamia_bank_id_fk='';
    $gamia_bank_account_num='';
    $tabro3_status='';
    $disp='block';
}
?>

<div class="col-sm-9 no-padding " >

        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">

                </div>
            </div>
            <div class="panel-body">

                <?php    echo form_open_multipart($out['form'])?>

        <div class="piece-body">
            <div class="col-md-12 no-padding">
                <div class="form-group col-md-2  col-sm-6 padding-4">

                    <label class="label top-label">نوع التبرع</label>
                    <select name="tabro3_type" id="tabro3_type" class="form-control bottom-input"
                            aria-required="true" >
                        <option value="">إختر</option>
                        <?php if (!empty($halat)) {
                            foreach ($halat as $row) { ?>
                                <option value="<?php echo $row->id_setting; ?>" <?php if($row->id_setting==$tabro3_type)echo 'selected';?>

                                    ><?php echo $row->title_setting; ?></option>
                            <?php }
                        } ?>
                    </select>

                </div>

                <div class="form-group col-md-2  col-sm-6 padding-4">

                    <label class="label top-label">    مبلغ التبرع </label>
                    <input type="text" name="value" id="k_value" data-validation="required"
                           onkeypress="validate_number(event);" value="<?php echo $value;?>" class="form-control bottom-input">
                </div>

                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">   تنبيه الإنتهاء </label>

                    <select id="alert_type"  class="form-control bottom-input "data-validation="required"
                            name="alert_type"  onchange="GetDays($(this).val())">
                        <option value="">إختر</option>
                        <?php
                        $alert_type_arr =array('إختر','يوم','أسبوع','أسبوعين','شهر');
                        if(isset($alert_type_arr)&&!empty($alert_type_arr)) {
                            for($a=1;$a<sizeof($alert_type_arr);$a++){
                                ?>
                                <option value="<?php echo $a;?>"


                                        <?php if($a==$alert_type)echo 'selected';?>> <?php echo $alert_type_arr[$a];?></option >
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group col-md-2  col-sm-6 padding-4">

                    <label class="label top-label">    حالة التبرع </label>
                    <select name="tabro3_status" id="kafala_status" data-validation="required"
                            class="form-control bottom-input " aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        $fe2a_type_arr =array('إختر','مستمر','متقطع','منتظم','موقوف');
                        if(isset($fe2a_type_arr)&&!empty($fe2a_type_arr)) {
                            for($a=1;$a<sizeof($fe2a_type_arr);$a++){
                                ?>
                                <option value="<?php echo $a;?>"
                                    <?php if(!empty($tabro3_status)){
                                        if($a==$tabro3_status){ echo 'selected'; }
                                    } ?>> <?php echo $fe2a_type_arr[$a];?></option >
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">  طريقة التوريد </label>
                    <select id="pay_method" name="pay_method" class="form-control bottom-input "
                            onchange="GetPayType($(this).val())"	 data-validation="required" aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                        if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                            for($a=1;$a<sizeof($pay_method_arr);$a++){
                                ?>
                                <option value="<?php echo$a;?>"
                                    <?php if(!empty($pay_method)){
                                        if($a == $pay_method){ echo 'selected'; }
                                    } ?>> <?php echo $pay_method_arr[$a];?></option >
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">   إسم بنك المتبرع </label>
                    <select name="d_bank_id_fk" id="pay_bank_id_fk" class="form-control bottom-input" <?php if($pay_method!=7)echo 'disabled';?>
                            aria-required="true" >
                        <option value="">إختر</option>
                        <?php if (!empty($banks)) {
                            foreach ($banks as $bank) { ?>
                                <option value="<?php echo $bank->id; ?>"
                                    <?php if(!empty($bank_id_fk)){
                                        if($bank->id == $bank_id_fk){ echo 'selected'; }
                                    } ?>><?php echo $bank->ar_name; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12 no-padding">





                <div class="form-group col-md-4  col-sm-6 padding-4">

                    <label class="label top-label">   رقم حساب المتبرع </label>
                    <input type="text" value="<?php echo $d_bank_account;?> " name="d_bank_account" id="pay_bank_account_num" maxlength="24"
                           onkeyup="get_length($(this).val(),'hint');"
                           class="form-control bottom-input " <?php if($pay_method!=7)echo 'disabled';?> data-validation-has-keyup-event="true">
                    <span id="hint" style="color: red; display: ;"> رقم الحساب 24 رقم فقط</span>
                </div>



                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">  تاريخ بداية الأمر المستديم </label>
                    <input type="date" name="mostdem_from_date"  value="<?php echo $mostdem_from_date;?>" <?php if($pay_method!=7 || $pay_method==5)echo 'disabled';?>
                           id="mostdem_from_date"
                           class="form-control bottom-input  "
                           data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                           onchange="checkYear($(this).val());">
                </div>
                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">   تاريخ نهاية الأمر المستديم </label>
                    <input type="date" value="<?php echo $mostdem_to_date;?>" name="mostdem_to_date" <?php if($pay_method!=7||$pay_method==5)echo 'disabled';?>
                           id="mostdem_to_date"
                           class="form-control bottom-input "
                           data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                           onchange="checkYear($(this).val());">
                </div>
                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">   صورة الأمر المستديم </label>
                    <input type="file" name="mostdem_img" id="mostdem_img" class="form-control bottom-input" <?php if($pay_method!=7 || $pay_method==5)echo 'disabled';?>>
                </div>


                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">   حساب الجمعية </label>
                    <!--	<select name="gamia_account" id="gamia_account" data-validation="required"
								class="form-control bottom-input "   onchange="GetAccounts(this.value)"
								aria-required="true">
								<option value="">إختر</option>
								<?php
                    if(!empty($banks_accounts)) {
                        foreach($banks_accounts as $row){?>
					                         <option value="<?=$row->id?>"><?=$row->title?></option>
										<?php
                        }
                    }
                    ?>
							</select>-->
                    <select name="gamia_account" id="gamia_account" <?php if($pay_method!=7)echo 'disabled';?>
                            class="form-control   bottom-input  "   onchange="GetAccounts(this.value)"
                            aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        if(!empty($banks_accounts)) {
                            foreach($banks_accounts as $row){?>
                                <option value="<?=$row->id?>" <?php if($row->id==$gamia_account)echo 'selected';?>><?=$row->title?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>



            </div>
            <div class="col-md-12 no-padding">







                <div class="form-group col-md-2  col-sm-6 padding-4" style="display: <?php echo $disp;?>">
                    <label class="label top-label">   إسم البنك </label>
                    <!-- <select name="gamia_bank_id_fk" id="gamia_bank_id_fk" class="form-control bottom-input"
									 aria-required="true" data-validation="required">
								<option value="">إختر</option>
								<?php if (!empty($banks)) {
                        foreach ($banks as $bank) { ?>
										<option value="<?php echo $bank->id; ?>"
											<?php if(!empty($bank_id_fk)){
                            if($bank->id == $bank_id_fk){ echo 'selected'; }
                        } ?>><?php echo $bank->ar_name; ?></option>
									<?php }
                    } ?>
							</select>-->
                    <select name="gamia_bank_id_fk" id="gamia_bank_id_fk" class="form-control bottom-input" <?php if($pay_method!=7)echo 'disabled';?>
                            onchange="GetBankAccount(this.value,$('#gamia_account').val())"	 aria-required="true" style="display: <?php echo $disp;?>">
                        <option value="">إختر</option>
                        <?php if (!empty($banks)) {
                            foreach ($banks as $bank) { ?>
                                <option value="<?php echo $bank->id; ?>"
                                    <?php if(!empty($gamia_bank_id_fk)){
                                        if($bank->id == $gamia_bank_id_fk){ echo 'selected'; }
                                    } ?>><?php echo $bank->ar_name; ?></option>
                            <?php }
                        } ?>
                    </select>

                </div>
                <div class="form-group col-md-4  col-sm-6 padding-4" style="display: <?php echo $disp;?>">
                    <label class="label top-label">   رقم الحساب الجمعية </label>
                    <select name="gamia_bank_account_num" id="bank_account_num"   onkeyup="get_length($(this).val(),'hint');" class="form-control  bottom-input" <?php if($pay_method!=7)echo 'disabled';?>
                            aria-required="true" >
                        <option value="">إختر</option>
                        <?php if(isset($accounts)&&!empty($accounts)){
                            foreach ($accounts as $row){?>
                                <option value="<?php echo $row->id;?>" <?php if($gamia_bank_account_num==$row->id) echo 'selected';?>><?php echo $row->account_num;?></option>


                       <?php }  }?>
                    </select>




                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>


                </div>

            </div>



        </div>

    </div>
            <input type="submit" name="save" value="حفظ" id="save" class="btn btn-add">
            <?php echo form_close();?>

</div>
</div>


    <!------------------------------------------------------------------>
<?php $data_load['result']=$result[0];
?>
<?php  $this->load->view('admin/all_Finance_resource_views/donors/sidebar_donor_data',$data_load);?>
    <!------ table --------></div>
<?php  if(isset($records) &&!empty($records)) { ?>


                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th>نوع التبرع</th>
                        <th class="text-center">مبلغ التبرع </th>

                        <th class="text-center">تنبيه الانتهاء</th>
                        <th class="text-center"> حاله التبرع</th>
                        <th class="text-center">  طريقه التوريد</th>

                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $a = 1;
                    if (isset($records) && !empty($records)) {
                        foreach ($records as $row) {

                            ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $row->halt;?></td>

                                <td><?php echo $row->value;?></td>
                                <td><?php echo$alert_type_arr[$row->alert_type] ; ?></td>
                                <td><?php echo $fe2a_type_arr[$row->tabro3_status] ; ?></td>
                                <td><?php echo $pay_method_arr[$row->pay_method];?></td>
                               
                                <td><a href=""  data-toggle="modal" data-target="#myModal<?php echo $row->id;?>" title="التفاصيل"><i class="fa fa-eye"></i> </a></td>


                               <td><a href="<?php echo base_url(); ?>all_Finance_resource/donors/Donor/update_donner_data/<?php echo $row->id; ?>"><i
                                           class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                   <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/donors/Donor/delete_rec/" . $row->id .'/'.$this->uri->segment(5); ?>');"
                                      data-toggle="modal" data-target="#modal-delete"
                                      title="حذف"> <i class="fa fa-trash"
                                                      aria-hidden="true"></i> </a></td>

                            </tr>
                            <?php
                            $a++;
                        }
                    } else { ?>
                        <td colspan="6">
                            <div style="color: red; font-size: large;">لم يتم اضافة بيانات  تبرع !!</div>
                        </td>
                    <?php }
                    ?>
                    </tbody>
                </table>
<?php
$a = 1;
if (isset($records) && !empty($records)) {
foreach ($records as $row) {?>

                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog " role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">بيانات التبرع</h4>
                            </div>
                            <div class="modal-body">

                                <div class="print_forma col-xs-12 no-padding">
                                    <div class="col-sm-9">
                                        <div class="piece-box" style="margin-bottom: 0;">

                                            <table class="table table-bordered" style="margin-top:35px">
                                                <tbody>
                                                <tr class="closed_green">
                                                    <td class="text-center" style="width: 15%">نوع التبرع</td>
                                                    <td class="text-center" style="width: 20%"> مبلغ التبرع</td>
                                                    <td class="text-center" style="width: 25%"> تنبيه الانتهاء</td>
                                                    <td class="text-center" style="width: 15%"> حاله التبرع</td>
                                                    <td class="text-center" style="width: 20%"> طريقه التوريد  </td>
                                                </tr>
                                                <tr class="open_green">
                                                    <td class="text-center"><?php echo $row->halt;?></td>
                                                    <td class="text-center"><?php echo $row->value;?></td>
                                                    <td class="text-center"><?php echo $row->alert_type;?> </td>
                                                    <td class="text-center"><?php echo $fe2a_type_arr[$row->tabro3_status] ; ?></td>
                                                    <td class="text-center"><?php echo $pay_method_arr[$row->pay_method];?></td>
                                                </tr>
                                                </tbody></table>

                                            <table class="table table-bordered" style="margin-top:35px">
                                                <tbody>
                                                <tr class="closed_green">
                                                    <td class="text-center" style="width: 15%">اسم بنك المتبرع</td>
                                                    <td class="text-center" style="width: 20%"> رقم حساب المتبرع</td>
                                                    <td class="text-center" style="width: 25%">تاريخ بدايه الامر المستديم</td>
                                                    <td class="text-center" style="width: 15%"> تاريخ نهايه الامر المستديم</td>
                                                    <td class="text-center" style="width: 20%"> حساب الجمعيه  </td>
                                                </tr>
                                                <tr class="open_green">
                                                    <td class="text-center"><?php echo $row->bank_motabr3;?></td>
                                                    <td class="text-center"><?php echo $row->d_bank_account;?></td>
                                                    <td class="text-center"><?php echo $row->mostdem_from_date;?> </td>
                                                    <td class="text-center"><?php echo $row->mostdem_to_date ; ?></td>
                                                    <td class="text-center"><?php echo $row->hesab_gamia_account;?></td>
                                                </tr>
                                                </tbody></table>
                                            <table class="table table-bordered" style="margin-top:35px">
                                                <tbody>
                                                <tr class="closed_green">
                                                    <td class="text-center" style="width: 15%">اسم البنك</td>
                                                    <td class="text-center" style="width: 20%"> رقم حساب الجمعيه</td>
                                                    <td class="text-center" style="width: 25%">تاريخ بدايه الامر المستديم</td>

                                                </tr>
                                                <tr class="open_green">
                                                    <td class="text-center"><?php echo $row->bank_gamia;?></td>
                                                    <td class="text-center"><?php echo $row->hesab_gamia_account;?></td>
                                                    <td class="text-center"><img src="<?php echo base_url();?>uploads/images/<?php echo $row->mostdem_img;?>" onclick="image(this)" style="width: 200px; height: 80px;" alt=""> </td>

                                                </tr>
                                                </tbody></table>






                                        </div>


                                    </div>
                                    <div class="col-sm-3">
                                        <div class="piece-box">
                                            <img src="img/logo-atheer.png" class="center-block" alt="" style="width: 116px; padding: 10px">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 20%">إسم المتبرع</td>
                                                    <td style="width: 20%">
                                                          <?php echo $result[0]->d_name;?></td> 
                                                </tr>
                                                <tr>
                                                    <td>رقم المتبرع</td>
                                                    <td><?php echo $result[0]->id;?></td>
                                                </tr>
                                                </tbody></table>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                            </div>
                        </div>
                    </div>
                </div>

<?php }  } }?>






<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>

    function GetDays(alert_type) {
        var d = new Date();
        var MonthDays = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();

        if(alert_type == 1 ){
            $('#num_days').val(1);
        } else if(alert_type == 2){
            $('#num_days').val(7);
        } else if (alert_type == 3){
            $('#num_days').val( 14);
        } else if(alert_type == 4){
            $('#num_days').val( MonthDays);
        }

    }

</script>
<!--
<script>
	function GetPayType(valu) {
		if(valu == 5 || valu ==7){

			document.getElementById("pay_bank_id_fk").removeAttribute("disabled", "disabled");

			document.getElementById("pay_bank_id_fk").setAttribute("data-validation", "required");

			document.getElementById("pay_bank_account_num").removeAttribute("disabled", "disabled");

			document.getElementById("pay_bank_account_num").setAttribute("data-validation", "required");


			if(valu ==7){
				document.getElementById("mostdem_from_date").removeAttribute("disabled", "disabled");

				document.getElementById("mostdem_from_date").setAttribute("data-validation", "required");

				document.getElementById("mostdem_to_date").removeAttribute("disabled", "disabled");

				document.getElementById("mostdem_to_date").setAttribute("data-validation", "required");

				document.getElementById("mostdem_img").removeAttribute("disabled", "disabled");

				document.getElementById("mostdem_img").setAttribute("data-validation", "required");
			}else{


					document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


					document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


					document.getElementById("mostdem_img").setAttribute("disabled", "disabled");

			}
		}else{
			document.getElementById("pay_bank_id_fk").setAttribute("disabled", "disabled");

			document.getElementById("pay_bank_id_fk").removeAttribute("data-validation", "required");

			document.getElementById("pay_bank_account_num").setAttribute("disabled", "disabled");

			document.getElementById("pay_bank_account_num").removeAttribute("data-validation", "required");


			document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


			document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


			document.getElementById("mostdem_img").setAttribute("disabled", "disabled");
		}

	}
</script>
-->


<script>
    function GetPayType(valu) {
        if(valu == 5 || valu ==7){

            document.getElementById("pay_bank_id_fk").removeAttribute("disabled", "disabled");

            document.getElementById("pay_bank_id_fk").setAttribute("data-validation", "required");

            document.getElementById("pay_bank_account_num").removeAttribute("disabled", "disabled");

            document.getElementById("pay_bank_account_num").setAttribute("data-validation", "required");

            document.getElementById("gamia_account").removeAttribute("disabled", "disabled");
            document.getElementById("gamia_account").setAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("gamia_bank_id_fk").setAttribute("data-validation", "required");
            document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");
            document.getElementById("bank_account_num").setAttribute("data-validation", "required");


            if(valu ==7){
                document.getElementById("mostdem_from_date").removeAttribute("disabled", "disabled");

                document.getElementById("mostdem_from_date").setAttribute("data-validation", "required");

                document.getElementById("mostdem_to_date").removeAttribute("disabled", "disabled");

                document.getElementById("mostdem_to_date").setAttribute("data-validation", "required");

                document.getElementById("mostdem_img").removeAttribute("disabled", "disabled");

                document.getElementById("mostdem_img").setAttribute("data-validation", "required");
            }else{


                document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


                document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


                document.getElementById("mostdem_img").setAttribute("disabled", "disabled");

            }
        }else{
            document.getElementById("pay_bank_id_fk").setAttribute("disabled", "disabled");

            document.getElementById("pay_bank_id_fk").removeAttribute("data-validation", "required");

            document.getElementById("pay_bank_account_num").setAttribute("disabled", "disabled");

            document.getElementById("pay_bank_account_num").removeAttribute("data-validation", "required");


            document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


            document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


            document.getElementById("mostdem_img").setAttribute("disabled", "disabled");



            document.getElementById("gamia_account").setAttribute("disabled", "disabled");
            document.getElementById("gamia_account").removeAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("gamia_bank_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("bank_account_num").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_num").removeAttribute("data-validation", "required");
        }

    }
</script>

<script>

    function GetAccounts(valu) {
        var dataString = 'account_id=' + valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/GetAccounts',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
                var  html='<option>إختر </option>';

                for(i=0; i<JSONObject.length ; i++){

                    html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].title + '</option>';

                }
                $("#gamia_bank_id_fk").html(html);
            }
        });


    }

</script>





<script>

    function GetBankAccount(bank_id,gamia_id) {

        var dataString = 'bank_id=' + bank_id +'&account_id_fk=' + gamia_id;
        //	alert(dataString);
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/GetBankAccount',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
                var  html='<option>إختر </option>';
                for(i=0; i<JSONObject.length ; i++){
                    html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].account_num + '</option>';

                }
                $("#bank_account_num").html(html);
            }
        });


    }

</script>


<script>
    function get_length(len,span_id)
    {

        if(len.length < 24){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 24 ارقام';
        }
        if(len.length >24){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 24 ارقام';
        }
        if(len.length ==24){
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = '';
        }
    }
</script>

<script type="text/javascript">
    function image(img) {
        var src = img.src;
        window.open(src);
    }
</script>