<!--
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>
-->

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



<?php if(!empty($last_data_inserted)) {


$from_date_h=$last_data_inserted->from_date_h;
$from_date=$last_data_inserted->first_date_from_ar;
$to_date_h=$last_data_inserted->to_date_h;
$to_date=$last_data_inserted->first_date_to_ar;
$alert_type=$last_data_inserted->alert_type;
$k_value=$last_data_inserted->first_value;
$kafala_status=$last_data_inserted->first_status;
$pay_method=$last_data_inserted->pay_method;
$bank_id_fk=$last_data_inserted->bank_id_fk;
$bank_account_num=$last_data_inserted->bank_account_num;
$mostdem_from_date_h=$last_data_inserted->mostdem_from_date_h;
$mostdem_from_date_m=$last_data_inserted->mostdem_from_date_m;
$mostdem_to_date_h=$last_data_inserted->mostdem_to_date_h;
$mostdem_to_date_m=$last_data_inserted->mostdem_to_date_m;
$mostdem_img=$last_data_inserted->mostdem_img;
$gamia_account=$last_data_inserted->gamia_account;
$gamia_bank_id_fk=$last_data_inserted->gamia_bank_id_fk;
$gamia_account_num=$last_data_inserted->gamia_account_num;


}else{
    $from_date_h='';
    $from_date='';
    $to_date_h='';
    $to_date='';
    $alert_type='';
    $k_value='';
    $kafala_status='';
    $pay_method='';
    $bank_id_fk='';
    $bank_account_num='';
    $mostdem_from_date_h='';
    $mostdem_from_date_m='';
    $mostdem_to_date_h='';
    $mostdem_to_date_m='';
    $mostdem_img='';
    $gamia_account='';
    $gamia_bank_id_fk='';
    $gamia_account_num='';


}
    ?>

<div class=" col-xs-12 no-padding">
	<div class="piece-box">
		<div class="piece-body">
			<div class="col-md-12 no-padding">
         	  <div class="form-group col-md-2  col-sm-6 padding-4">
						
                 <label class="label top-label">
                    <img style="width: 23px;float: right;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                    		تاريخ بداية الكفالة
                   <img style="width: 23px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />         
                            </label>
				<!--<input type="date" name="from_date" data-validation="required"
								   id="from_date" value="<?php echo date('Y-m-d'); ?>"
								   class="form-control bottom-input  "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">-->
        	  <div id="cal-2" style="width: 50%;float: right;">
					  <input id="date-Hijri" name="from_date_h" class="form-control bottom-input "  
                          type="text"  onfocus="showCal2();" value="<?=$from_date_h?>"
                             style=" width: 100%;float: right"/>
					<!--  <button class="icon-button" onclick="showCal2();" 
                      type="button" style="width: 27px;height: 35px"></button>-->
				  </div>
                                   
                                   
				  <div id="cal-1" style="width: 50%;float: left;">
					  <input id="date-Miladi" name="from_date" class="form-control bottom-input  " value="<?=$from_date?>"
                           type="text" onfocus="showCal1();"  style=" width: 100%;float: right"  />
					 <!-- <button class="icon-button" onclick="showCal1();" type="button" 
                            style="width: 27px;height: 35px"></button> -->
				  </div>
                  
			






			  </div>
			 <div class="form-group col-md-2  col-sm-6 padding-4">

                             <label class="label top-label">
                             <img style="width: 23px;float: right;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                             تاريخ نهاية الكفالة
                               <img style="width: 23px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                             
                             </label>
							
			<!--<input type="date" name="to_date" data-validation="required" id="to_date" value="<?php echo date('Y-m-d'); ?>"
								   class="form-control bottom-input  "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">-->

			<div id="cal-end-2"  style="width: 50%;float: right;">
					 <input id="date-Hijri-end"  name="to_date_h" class="form-control bottom-input " type="text"  
                     onfocus="showCalEnd2();" value="<?=$to_date_h?>" style=" width: 100%;float: right"/>
				<!--	 <button class="icon-button" onclick="showCalEnd2();" type="button"
                       style="width: 25px;height: 34px">هـ</button> -->
				 </div>
            	<div id="cal-end-1" style="width: 50%;float: left;">
					 <input id="date-Miladi-end"  name="to_date" class="form-control bottom-input "
                       name="to_date" type="text" onfocus="showCalEnd1();"  value="<?=$to_date?>"
                         style=" width: 100%;float: right" />
					<!-- <button class="icon-button" onclick="showCalEnd1();" type="button"
                      style="width: 25px;height: 34px">م</button> -->
				 </div>
				 

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
											<?php if(!empty($alert_type)){
												if($a == $alert_type){ echo 'selected'; }
											} ?>> <?php echo $alert_type_arr[$a];?></option >
										<?php
									}
								}
								?>
							</select>
			</div>



				




			<div class="form-group col-md-2  col-sm-6 padding-4">
                        
                       <label class="label top-label">    مقدار الكفالة </label>
						<input type="text" name="k_value" id="k_value" data-validation="required"
								   onkeypress="validate_number(event);" value="<?=$k_value?>" class="form-control bottom-input">
						</div>
				
						  <div class="form-group col-md-2  col-sm-6 padding-4">
                        
                       <label class="label top-label">    حالة الكفالة </label>
						<select name="kafala_status" id="kafala_status" data-validation="required"
									class="form-control bottom-input " aria-required="true">
								<option value="">إختر</option>
							<?php
					if(isset($kafala_status_arr) && !empty($kafala_status_arr)) {
					foreach ($kafala_status_arr as $row){
						?>
						<option value="<?php echo$row->id;?>"

                        <?php if(!empty($kafala_status)){

                            if($kafala_status  ==$row->id ){
                               echo 'selected';

                            }

                        } ?>
                        >
							<?php echo$row->title;?></option >
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


	</div>
	<div class="col-md-12 no-padding">
            
             


							  <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">   إسم البنك </label>
						<select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input" disabled="disabled"
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
						  <div class="form-group col-md-4  col-sm-6 padding-4">
                        
                        <label class="label top-label">   رقم حساب الكافل </label>
						<input type="text" name="bank_account_num" id="bank_account_num" disabled="disabled"
											   onkeyup="length_hesab_om($(this).val());" value="<?=$bank_account_num?>"
											   class="form-control bottom-input " data-validation-has-keyup-event="true">
							<small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
						</div>

	
    
 <div class="form-group col-md-2  col-sm-6 padding-4">
						
                 <label class="label top-label">
                    <img style="width: 23px;float: right;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                    	 بداية الأمر المستديم
                   <img style="width: 23px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />         
                            </label>
        	  <div id="cal-22" style="width: 50%;float: right;">
					  <input id="mostadem-date-Hijri" name="mostdem_from_date_h"
                       class="form-control bottom-input"  <?php if(!empty($pay_method)){ if($pay_method !=7){ ?>disabled="disabled"  <?php } }?>
                          type="text"  onfocus="showCal22();" value="<?=$mostdem_from_date_h?>"
                             style=" width: 100%;float: right"/>

				  </div>
                                   
                                  
				  <div id="cal-11" style="width: 50%;float: left;">
					  <input id="mostadem-date-Miladi" name="mostdem_from_date_m" 
                        class="form-control bottom-input" <?php if(!empty($pay_method)){ if($pay_method !=7){ ?>disabled="disabled"  <?php } }?> value="<?=$mostdem_from_date_m?>"
                           type="text" onfocus="showCal11();"  style=" width: 100%;float: right"  />

				  </div>
	  </div>






    
    			 <div class="form-group col-md-2  col-sm-6 padding-4">
           
                             <label class="label top-label">
                             <img style="width: 23px;float: right;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            نهاية الأمر المستديم
                               <img style="width: 23px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                             
                             </label>
							

			<div id="cal-end-22"  style="width: 50%;float: right;">
					 <input id="mostadem-date-Hijri-end"  name="mostdem_to_date_h"
                       class="form-control bottom-input " type="text"
                            <?php if(!empty($pay_method)){ if($pay_method !=7){ ?>disabled="disabled"  <?php } }?>
                     onfocus="showCalEnd22();" value="<?=$mostdem_to_date_h?>" style=" width: 100%;float: right"/>

				 </div>
            	<div id="cal-end-11" style="width: 50%;float: left;">
					 <input id="mostadem-date-Miladi-end"  name="mostdem_to_date_m" 
                        class="form-control bottom-input"
                            <?php if(!empty($pay_method)){ if($pay_method !=7){ ?>disabled="disabled"  <?php } }?> value="<?=$mostdem_to_date_m?>"
                            name="to_date" type="text" onfocus="showCalEnd11();"
                         style=" width: 100%;float: right" />
	
				 </div>
				 

			</div>
    
    			
<!--
						  <div class="form-group col-md-2  col-sm-6 padding-4">
                         <label class="label top-label">  تاريخ بداية الأمر المستديم </label>
						<input type="date" name="mostdem_from_date"  disabled="disabled"
								   id="mostdem_from_date"
                                   value="<?php echo date('Y-m-d'); ?>"
								   class="form-control bottom-input  "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
						</div>
                        
						  <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">   تاريخ نهاية الأمر المستديم </label>
						<input type="date" name="mostdem_to_date" disabled="disabled"
								   id="mostdem_to_date"
                                   value="<?php echo date('Y-m-d'); ?>"
								   class="form-control bottom-input "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
						</div>
                        -->
                        
                        
                        
						  <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">   صورة الأمر المستديم </label>
						<input type="file" name="mostdem_img" id="mostdem_img" class="form-control bottom-input" <?php if(!empty($pay_method)){ if($pay_method !=7){ ?>disabled="disabled"  <?php } }?>>

                              <?php if (!empty($mostdem_img )) {


                                  $img_url = "uploads/images/" . $mostdem_img;
                              } else {
                                  $img_url = "asisst/web_asset/img/logo.png";


                              } ?>

                              <a href="#" onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');" data-toggle="modal" data-target="#myModal-view"> <i class="fa fa-eye"></i> </a>
                              <div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h4 class="modal-title" id="myModalLabel">صورة الأمر المستديم</h4>
                                          </div>
                                          <div class="modal-body">
                                              <img  id="my_image" src="" width="50%">
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>




            
            	</div>

            <div class="col-md-12 no-padding">
    
    
    
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
                            	<select name="gamia_account" id="gamia_account" disabled
								class="form-control   bottom-input  "   onchange="GetAccounts(this.value)"
								aria-required="true">
								<option value="">إختر</option>
								<?php
								if(!empty($banks_accounts)) {
									foreach($banks_accounts as $row){?>
					                         <option value="<?=$row->id?>"

                                        <?php if(!empty($gamia_account)){

                                            if($gamia_account == $row->id){

                                                echo'selected';
                                            }
                                        }?> ><?=$row->title?></option>
										<?php
									}
								}
								?>
							</select>
                            
						</div>
    
    
    
						  <div class="form-group col-md-2  col-sm-6 padding-4">
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
                            	 <select name="gamia_bank_id_fk" id="gamia_bank_id_fk" class="form-control bottom-input" disabled
								 onchange="GetBankAccount(this.value,$('#gamia_account').val())"	 aria-required="true">
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
						  <div class="form-group col-md-4  col-sm-6 padding-4">
                        <label class="label top-label">   رقم الحساب الجمعية </label>
							<select name="gamia_account_num" id="gamia_account_num" class="form-control  bottom-input" disabled
								aria-required="true" >
								<option value="">إختر</option>
                                <?php if(!empty($accounts)){
                                    foreach($accounts as $row){ ?>
                                        <option value="<?=$row->id?>"

                                        <?php if(!empty($gamia_account_num)){

                                            if($gamia_account_num == $row->id){

                                             echo'selected';

                                            }

                                        }?>
                                        ><?=$row->account_num?></option>

                                <?php } } ?>
							</select>
                        
                        <!--<input type="text" name="bank_account_num" id="gamia_bank_account_num"
											   onkeyup="length_hesab_om($(this).val());"  data-validation="required"
											   class="form-control bottom-input " data-validation-has-keyup-event="true">
						
                        
                        	<small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
						
                        -->
                        </div>

				</div>	

			<!--	<input type="hidden" name="person_type" value="<?=$result['halt_elmostafid_member']?>"> -->
				<input type="hidden" name="mother_national_num_fk" value="<?=$result['mother_national_num_fk']?>">
				<input type="hidden" name="person_id_fk" value="<?=$result['id']?>">

			</div>

		</div>

	</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>

    $( document ).ready(function() {
        GetPayType(<?php echo $pay_method;?>);
    });

</script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/calendar.js'></script>



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
        //alert(valu);
        if(valu == 5 || valu ==7){

            document.getElementById("bank_id_fk").removeAttribute("disabled", "disabled");

           // document.getElementById("bank_id_fk").setAttribute("data-validation", "required");

            document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");

           // document.getElementById("bank_account_num").setAttribute("data-validation", "required");

            document.getElementById("gamia_account").removeAttribute("disabled", "disabled");
          //  document.getElementById("gamia_account").setAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").removeAttribute("disabled", "disabled");
           // document.getElementById("gamia_bank_id_fk").setAttribute("data-validation", "required");
            document.getElementById("gamia_account_num").removeAttribute("disabled", "disabled");
          //  document.getElementById("gamia_account_num").setAttribute("data-validation", "required");


            if(valu ==7){

                document.getElementById("mostdem_from_date").removeAttribute("disabled", "disabled");

                //document.getElementById("mostdem_from_date").setAttribute("data-validation", "required");

                document.getElementById("mostdem_to_date").removeAttribute("disabled", "disabled");

               // document.getElementById("mostdem_to_date").setAttribute("data-validation", "required");

                document.getElementById("mostdem_img").removeAttribute("disabled", "disabled");

                //document.getElementById("mostdem_img").setAttribute("data-validation", "required");
            }else{


                document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


                document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


                document.getElementById("mostdem_img").setAttribute("disabled", "disabled");

            }
        }else{
            document.getElementById("bank_id_fk").setAttribute("disabled", "disabled");

            //document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");

            document.getElementById("bank_account_num").setAttribute("disabled", "disabled");

           // document.getElementById("bank_account_num").removeAttribute("data-validation", "required");


            document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


            document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


            document.getElementById("mostdem_img").setAttribute("disabled", "disabled");



            document.getElementById("gamia_account").setAttribute("disabled", "disabled");
           // document.getElementById("gamia_account").removeAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").setAttribute("disabled", "disabled");
          //  document.getElementById("gamia_bank_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("gamia_account_num").setAttribute("disabled", "disabled");
            //document.getElementById("gamia_account_num").removeAttribute("data-validation", "required");

        }

    }
</script>
-->

<script>
    function GetPayType(valu) {
        //alert(valu);
        if(valu == 5 || valu ==7){

            document.getElementById("bank_id_fk").removeAttribute("disabled", "disabled");

           // document.getElementById("bank_id_fk").setAttribute("data-validation", "required");

            document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");

           // document.getElementById("bank_account_num").setAttribute("data-validation", "required");

            document.getElementById("gamia_account").removeAttribute("disabled", "disabled");
          //  document.getElementById("gamia_account").setAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").removeAttribute("disabled", "disabled");
           // document.getElementById("gamia_bank_id_fk").setAttribute("data-validation", "required");
            document.getElementById("gamia_account_num").removeAttribute("disabled", "disabled");
          //  document.getElementById("gamia_account_num").setAttribute("data-validation", "required");


            if(valu ==7){

  ///******  document.getElementById("mostdem_from_date").removeAttribute("disabled", "disabled");

document.getElementById("mostadem-date-Hijri").removeAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi").removeAttribute("disabled", "disabled");






                //document.getElementById("mostdem_from_date").setAttribute("data-validation", "required");

//*******document.getElementById("mostdem_to_date").removeAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Hijri-end").removeAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi-end").removeAttribute("disabled", "disabled");







               // document.getElementById("mostdem_to_date").setAttribute("data-validation", "required");

                document.getElementById("mostdem_img").removeAttribute("disabled", "disabled");

                //document.getElementById("mostdem_img").setAttribute("data-validation", "required");
            }else{


  ///******                document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");

document.getElementById("mostadem-date-Hijri").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi").setAttribute("disabled", "disabled");



//******* document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");

document.getElementById("mostadem-date-Hijri-end").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi-end").setAttribute("disabled", "disabled");





                document.getElementById("mostdem_img").setAttribute("disabled", "disabled");

            }
        }else{
            document.getElementById("bank_id_fk").setAttribute("disabled", "disabled");

            //document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");

            document.getElementById("bank_account_num").setAttribute("disabled", "disabled");

           // document.getElementById("bank_account_num").removeAttribute("data-validation", "required");


  ///******            document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


document.getElementById("mostadem-date-Hijri").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi").setAttribute("disabled", "disabled");




//******document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


document.getElementById("mostadem-date-Hijri-end").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi-end").setAttribute("disabled", "disabled");




            document.getElementById("mostdem_img").setAttribute("disabled", "disabled");



            document.getElementById("gamia_account").setAttribute("disabled", "disabled");
           // document.getElementById("gamia_account").removeAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").setAttribute("disabled", "disabled");
          //  document.getElementById("gamia_bank_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("gamia_account_num").setAttribute("disabled", "disabled");
            //document.getElementById("gamia_account_num").removeAttribute("data-validation", "required");

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
				//console.log(JSONObject);
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
				//console.log(JSONObject);
			//	var  html='<option>إختر </option>';
             if(JSONObject.length >1 ){
                 var  html='<option>إختر </option>';
                 } else if(JSONObject.length ==0){
                   var  html='<option>إختر </option>';
                   }
            
				for(i=0; i<JSONObject.length ; i++){
					html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].account_num + '</option>';

				}
				$("#gamia_account_num").html(html);
			}
		});


	}

</script>

	<script>




	var cal1 = new Calendar(),
		cal2 = new Calendar(true, 0, true, true),
		date1 = document.getElementById('date-Miladi'),
		date2 = document.getElementById('date-Hijri'),
		cal1Mode = cal1.isHijriMode(),
		cal2Mode = cal2.isHijriMode();


	date1.setAttribute("value",cal1.getDate().getDateString());
	date2.setAttribute("value",cal2.getDate().getDateString());

	document.getElementById('cal-1').appendChild(cal1.getElement());
	document.getElementById('cal-2').appendChild(cal2.getElement());


	cal1.show();
	cal2.show();
	setDateFields1();


	cal1.callback = function () {
		if (cal1Mode !== cal1.isHijriMode()) {
			cal2.disableCallback(true);
			cal2.changeDateMode();
			cal2.disableCallback(false);
			cal1Mode = cal1.isHijriMode();
			cal2Mode = cal2.isHijriMode();
		} else

			cal2.setTime(cal1.getTime());
		setDateFields1();
	};

	cal2.callback = function () {
		if (cal2Mode !== cal2.isHijriMode()) {
			cal1.disableCallback(true);
			cal1.changeDateMode();
			cal1.disableCallback(false);
			cal1Mode = cal1.isHijriMode();
			cal2Mode = cal2.isHijriMode();
		} else

			cal1.setTime(cal2.getTime());
		setDateFields1();
	};


	cal1.onHide = function() {
		cal1.show(); // prevent the widget from being closed
	};

	cal2.onHide = function() {
		cal2.show(); // prevent the widget from being closed
	};
	function setDateFields1() {
		date1.value = cal1.getDate().getDateString();
		date2.value = cal2.getDate().getDateString();

		date1.setAttribute("value",cal1.getDate().getDateString());
		date2.setAttribute("value",cal2.getDate().getDateString());
	}

	function showCal1() {
		if (cal1.isHidden())
			cal1.show();
		else
			cal1.hide();
	}

	function showCal2() {
		if (cal2.isHidden())
			cal2.show();
		else
			cal2.hide();
	}



	</script>

<script>


	var calEnd1 = new Calendar(),
		calEnd2 = new Calendar(true, 0, true, true),
		dateEnd1 = document.getElementById('date-Miladi-end'),
		dateEnd2 = document.getElementById('date-Hijri-end'),
		calEnd1Mode = calEnd1.isHijriMode(),
		calEnd2Mode = calEnd2.isHijriMode();


	dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
	dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());

	document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
	document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



	calEnd1.show();
	calEnd2.show();
	setDateFieldsEnd1();





	calEnd1.callback = function () {
		if (calEnd1Mode !== calEnd1.isHijriMode()) {
			calEnd2.disableCallback(true);
			calEnd2.changeDateMode();
			calEnd2.disableCallback(false);
			calEnd1Mode = calEnd1.isHijriMode();
			calEnd2Mode = calEnd2.isHijriMode();
		} else

			calEnd2.setTime(calEnd1.getTime());
		setDateFieldsEnd1();
	};

	calEnd2.callback = function () {
		if (calEnd2Mode !== calEnd2.isHijriMode()) {
			calEnd1.disableCallback(true);
			calEnd1.changeDateMode();
			calEnd1.disableCallback(false);
			calEnd1Mode = calEnd1.isHijriMode();
			calEnd2Mode = calEnd2.isHijriMode();
		} else

			calEnd1.setTime(calEnd2.getTime());
		setDateFieldsEnd1();
	};





	calEnd1.onHide = function() {
		calEnd1.show(); // prevent the widget from being closed
	};

	calEnd2.onHide = function() {
		calEnd2.show(); // prevent the widget from being closed
	};





	function setDateFieldsEnd1() {
		dateEnd1.value = calEnd1.getDate().getDateString();
		dateEnd2.value = calEnd2.getDate().getDateString();

		dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
		dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
	}




	function showCalEnd1() {
		if (calEnd1.isHidden())
			calEnd1.show();
		else
			calEnd1.hide();
	}

	function showCalEnd2() {
		if (calEnd2.isHidden())
			calEnd2.show();
		else
			calEnd2.hide();
	}


	//# sourceURL=pen.js

</script>

<!------------------------------------>
<!------------ مستديم ---------------->

	<script>

	var cal11 = new Calendar(),
		cal22 = new Calendar(true, 0, true, true),
		date11 = document.getElementById('mostadem-date-Miladi'),
		date22 = document.getElementById('mostadem-date-Hijri'),
		cal11Mode = cal11.isHijriMode(),
		cal22Mode = cal22.isHijriMode();


	date11.setAttribute("value",cal11.getDate().getDateString());
	date22.setAttribute("value",cal22.getDate().getDateString());

	document.getElementById('cal-11').appendChild(cal11.getElement());
	document.getElementById('cal-22').appendChild(cal22.getElement());


	cal11.show();
	cal22.show();
	setDateFields();


	cal11.callback = function () {
		if (cal11Mode !== cal11.isHijriMode()) {
			cal22.disableCallback(true);
			cal22.changeDateMode();
			cal22.disableCallback(false);
			cal11Mode = cal11.isHijriMode();
			cal22Mode = cal22.isHijriMode();
		} else

			cal22.setTime(cal11.getTime());
		setDateFields();
	};

	cal22.callback = function () {
		if (cal22Mode !== cal22.isHijriMode()) {
			cal11.disableCallback(true);
			cal11.changeDateMode();
			cal11.disableCallback(false);
			cal11Mode = cal11.isHijriMode();
			cal22Mode = cal22.isHijriMode();
		} else

			cal11.setTime(cal22.getTime());
		setDateFields();
	};


	cal11.onHide = function() {
		cal11.show(); // prevent the widget from being closed
	};

	cal22.onHide = function() {
		cal22.show(); // prevent the widget from being closed
	};
	function setDateFields() {
		date11.value = cal11.getDate().getDateString();
		date22.value = cal22.getDate().getDateString();

		date11.setAttribute("value",cal11.getDate().getDateString());
		date22.setAttribute("value",cal22.getDate().getDateString());
	}

	function showCal11() {
		if (cal11.isHidden())
			cal11.show();
		else
			cal11.hide();
	}

	function showCal22() {
		if (cal22.isHidden())
			cal22.show();
		else
			cal22.hide();
	}



	</script>




<script>


	var calEnd11 = new Calendar(),
		calEnd22 = new Calendar(true, 0, true, true),
		dateEnd11 = document.getElementById('mostadem-date-Miladi-end'),
		dateEnd22 = document.getElementById('mostadem-date-Hijri-end'),
		calEnd11Mode = calEnd11.isHijriMode(),
		calEnd22Mode = calEnd22.isHijriMode();


	dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
	dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());

	document.getElementById('cal-end-11').appendChild(calEnd11.getElement());
	document.getElementById('cal-end-22').appendChild(calEnd22.getElement());



	calEnd11.show();
	calEnd22.show();
	setDateFieldsEnd();





	calEnd11.callback = function () {
		if (calEnd11Mode !== calEnd11.isHijriMode()) {
			calEnd22.disableCallback(true);
			calEnd22.changeDateMode();
			calEnd22.disableCallback(false);
			calEnd11Mode = calEnd11.isHijriMode();
			calEnd22Mode = calEnd22.isHijriMode();
		} else

			calEnd22.setTime(calEnd11.getTime());
		setDateFieldsEnd();
	};

	calEnd22.callback = function () {
		if (calEnd22Mode !== calEnd22.isHijriMode()) {
			calEnd11.disableCallback(true);
			calEnd11.changeDateMode();
			calEnd11.disableCallback(false);
			calEnd11Mode = calEnd11.isHijriMode();
			calEnd22Mode = calEnd22.isHijriMode();
		} else

			calEnd11.setTime(calEnd22.getTime());
		setDateFieldsEnd();
	};





	calEnd11.onHide = function() {
		calEnd11.show(); // prevent the widget from being closed
	};

	calEnd22.onHide = function() {
		calEnd22.show(); // prevent the widget from being closed
	};





	function setDateFieldsEnd() {
		dateEnd11.value = calEnd11.getDate().getDateString();
		dateEnd22.value = calEnd22.getDate().getDateString();

		dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
		dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());
	}




	function showCalEnd11() {
		if (calEnd11.isHidden())
			calEnd11.show();
		else
			calEnd11.hide();
	}

	function showCalEnd22() {
		if (calEnd22.isHidden())
			calEnd22.show();
		else
			calEnd22.hide();
	}


	//# sourceURL=pen.js

</script>





