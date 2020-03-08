
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

<div class=" col-xs-12 no-padding">
	<div class="piece-box">
	<!--	<div class="piece-heading">
			<div class="col-xs-12">
				<h5> </h5>
			</div>
		</div>
        -->
        
        <!-- for mask  add class date_as_mask -->
        
  
        
		<div class="piece-body">
			<div class="col-md-12 no-padding">
         	  <div class="form-group col-md-2  col-sm-6 padding-4">
						
                              <label class="label top-label">		تاريخ بداية الكفالة</label>
							<input type="date" name="from_date" data-validation="required"
								   id="from_date" value=""
								   class="form-control bottom-input  "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
			 </div>
			 <div class="form-group col-md-2  col-sm-6 padding-4">
                             <label class="label top-label">تاريخ نهاية الكفالة</label>
							
							<input type="date" name="to_date" data-validation="required"
								   id="to_date" value=""
								   class="form-control bottom-input  "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
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
								   onkeypress="validate_number(event);" value=" " class="form-control bottom-input">
						</div>
				
						  <div class="form-group col-md-2  col-sm-6 padding-4">
                        
                       <label class="label top-label">    حالة الكفالة </label>
						<select name="kafala_status" id="kafala_status" data-validation="required"
									class="form-control bottom-input " aria-required="true">
								<option value="">إختر</option>
							<?php
if(isset($kafala_status) && !empty($kafala_status)) {
   foreach ($kafala_status as $row){
      ?>
      <option value="<?php echo$row->id;?>">
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
						<select name="bank_id_fk" id="pay_bank_id_fk" class="form-control bottom-input" disabled="disabled"
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
						<input type="text" name="bank_account_num" id="pay_bank_account_num" disabled="disabled"
											   onkeyup="length_hesab_om($(this).val());"
											   class="form-control bottom-input " data-validation-has-keyup-event="true">
							<small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
						</div>

				

						  <div class="form-group col-md-2  col-sm-6 padding-4">
                         <label class="label top-label">  تاريخ بداية الأمر المستديم </label>
						<input type="date" name="mostdem_from_date"  disabled="disabled"
								   id="mostdem_from_date"
								   class="form-control bottom-input  "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
						</div>
						  <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">   تاريخ نهاية الأمر المستديم </label>
						<input type="date" name="mostdem_to_date" disabled="disabled"
								   id="mostdem_to_date"
								   class="form-control bottom-input "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
						</div>
						  <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">   صورة الأمر المستديم </label>
						<input type="file" name="mostdem_img" id="mostdem_img" class="form-control bottom-input" disabled="disabled">
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
					                         <option value="<?=$row->id?>"><?=$row->title?></option>
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
											<?php if(!empty($bank_id_fk)){
												if($bank->id == $bank_id_fk){ echo 'selected'; }
											} ?>><?php echo $bank->ar_name; ?></option>
									<?php }
								} ?>
							</select>
                            
						</div>
						  <div class="form-group col-md-4  col-sm-6 padding-4">
                        <label class="label top-label">   رقم الحساب الجمعية </label>
							<select name="bank_account_num" id="bank_account_num" class="form-control  bottom-input" disabled
								aria-required="true" >
								<option value="">إختر</option>
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
				var  html='<option>إختر </option>';
				for(i=0; i<JSONObject.length ; i++){
					html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].account_num + '</option>';

				}
				$("#bank_account_num").html(html);
			}
		});


	}

</script>