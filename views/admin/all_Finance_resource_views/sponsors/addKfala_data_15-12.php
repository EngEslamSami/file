
<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
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

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
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

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
    .striped-ul li:nth-child(2n+1){
        background-color: #e1edf7;
    }
    .striped-ul li{
        padding: 10px 0;
    }
    .striped-ul{
        margin-bottom: 20px;
    }
</style>

<?php
if(isset($result)&&!empty($result))
{

    $k_yatem_full=$result->k_yatem_full;
    $k_yatem_half=$result->k_yatem_half;
    $k_armal=$result->k_armal;
    $k_mostafed=$result->k_mostafed;
  //  $k_status=$result->k_status;
        $k_status=$result->kafel_status;
    $start_kfala_date=$result->start_kfala_date;
    $num_days =$result->num_days ;
    $alert_type   =$result->alert_type ;
    $pay_method  =$result->pay_method ;
    $bank_id_fk   =$result->bank_id_fk ;
    $bank_account_num   =$result->bank_account_num ;
    $bank_branch  =$result->bank_branch ;
    $num  =$result->num  ;



}else{

    $k_yatem_full    ="";
    $k_yatem_half    ="";
    $k_armal    ="";
    $k_mostafed    ="";
    $start_kfala_date="";
    $k_status="";
    $alert_type   ="";
    $num_days   ="";
    $pay_method   ="";
    $bank_id_fk   ="";
    $bank_account_num   ="";
    $bank_branch  ="";
    $num ="";
}
?>





<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                        $data_load['k_status'] = $k_status;
                        $this->load->view('admin/all_Finance_resource_views/sponsors/drop_down_menu', $data_load);
                    }?>
                </div>
            </div>
            <div class="panel-body">



            
                <?php  
                if(!empty($result_Kfala_data)){
                    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/updateKfala_data/'.$result_Kfala_data['id']);
                    
                }else{
                    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$this->uri->segment(5));
                } ?>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع الكفالة </label>
                    </div>
                    <?php
                    if(isset($kfalat_types)&&!empty($kfalat_types)) {
                        foreach($kfalat_types as $value){
                            ?>
                            <input  type="radio" name="kafala_type_fk" style="margin-right: 15px" onclick="GetKafalaTypeArr(<?=$value->id?>,2)" value="<?=$value->id ?>"
                                     <?php if(!empty($result_Kfala_data)){ if($result_Kfala_data['kafala_type_fk'] == $value->id){echo 'checked'; } } ?>  data-validation="required">

                            <label for="square-radio-1"><?=$value->title?></label>
                            <?php
                        }
                    }
                    ?>
                </div>


                <!-------------------------------------start---------------------------------------->

                <div class="col-md-12">

                            <table id="js_table_members" style="display: none"

                                   class="table table-striped table-bordered dt-responsive nowrap ">
                                <thead>
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th style="width: 50px;">ملف الأسرة </th>
                                    <th style="width: 170px;" >إسم العائلة</th>
                                    <th style="width: 170px;" >إسم المستفيد</th>
                                    <th style="width: 90px;">فئة المستفيد</th>
                                    <th style="width: 90px;">الجنس</th>
                                    <th style="width: 90px;">تاريخ الميلاد</th>
                                    <th style="width: 60px;">العمر</th>
                                    <th style="width: 60px;">الفئة</th>
                                    <th style="width: 60px;">الحالة</th>
                                </tr>
                                </thead>
                            </table>

 
                    <div id="dataMember">
                    <?php $date_from='';  $date_to=''; $value=''; $status=''; if(!empty($result_Kfala_data)){ 
                        
                      if( $result_Kfala_data['person_type'] ==2){
                          if( empty( $result_Kfala_data['second_date_from_ar']) &&
                          empty( $result_Kfala_data['second_date_to_ar'])
                          ){
                            $date_from =$result_Kfala_data['first_date_from_ar'];
                            $date_to =$result_Kfala_data['first_date_to_ar'];
                            $value =$result_Kfala_data['first_value'];
                            $status =$result_Kfala_data['first_status'];
                          }else{
                            $date_from =$result_Kfala_data['second_date_from_ar'];
                            $date_to =$result_Kfala_data['second_date_to_ar'];
                            $value =$result_Kfala_data['second_value'];
                            $status =$result_Kfala_data['second_status'];
                          }

                        }else{

                       $date_from =$result_Kfala_data['first_date_from_ar'];
                       $date_to =$result_Kfala_data['first_date_to_ar'];
                       $value =$result_Kfala_data['first_value'];
                       $status =$result_Kfala_data['first_status'];

                        }
               
                        
                        ?>
                      <!--------------------------------------------------------------------->
                      <div class="piece-box"><br>
                          <?php

                          if( $result_Kfala_data['kafala_type_fk'] ==4) {


                              $gender = 'ذكر';
                              if ( $armal[0]['m_gender'] == 2) {
                                  $gender = 'أنثى';
                              }

                              $category = 'أرمل';
                              if( $armal[0]['m_birth_date_hijri'] !=''){

                                  $armal[0]['m_birth_date_hijri'] =$armal[0]['m_birth_date_hijri'];

                              }else{

                                  $armal[0]['m_birth_date_hijri'] ='غير محدد';
                              }

                              if( $armal[0]['m_birth_date_hijri_year'] !=''){

                                  $age = $current_hijry_year - $armal[0]['m_birth_date_hijri_year'];

                              }else{

                                  $age =0;
                              }
                              $arr2 =
                                  '<td>'.$armal[0]['file_num'].'</td>
                                  <td>'.$armal[0]['father_name'].'</td>
                                  <td>'.$armal[0]['full_name'].'</td>
                                  <td>'.$category.'</td>
                                  <td>'.$gender.'</td>
                                  <td>'.$armal[0]['m_birth_date_hijri'].'</td>
                                  <td>'.$age.'</td>
                                  <td></td>
                                  <td></td>';




                          }else{

                              $type = 'ذكر';
                              if ($members[0]['member_gender'] == 2) {
                                  $type = 'أنثى';
                              }
                              $category = 'يتيم';
                              if ($members[0]['categoriey_member'] == 3) {
                                  $category = 'مستفيد بالغ';
                              }

                              if( $members[0]['member_birth_date_hijri'] !=''){

                                  $members[0]['member_birth_date_hijri'] =$members[0]['member_birth_date_hijri'];

                              }else{

                                  $members[0]['member_birth_date_hijri'] ='غير محدد';
                              }

                              if( $members[0]['member_birth_date_hijri_year'] !=''){

                                  $age = $current_hijry_year - $members[0]['member_birth_date_hijri_year'];

                              }else{

                                  $age =0;
                              }

                              $arr2 =
                                  '<td>'.$members[0]['file_num'].'</td>
                                  <td>'.$members[0]['father_name'].'</td>
                                  <td>'.$members[0]['member_full_name'].'</td>
                                  <td>'.$category.'</td>
                                  <td>'.$type.'</td>
                                  <td>'.$members[0]['member_birth_date_hijri'].'</td>
                                  <td>'.$age.'</td>
                                  <td></td>
                                  <td></td>';




                          }
                          //echo'<pre>';  var_dump($arr2); echo'</pre>';
                          ?>

                          <table  class="table table-striped table-bordered dt-responsive nowrap ">
                              <thead>
                              <tr>
                                  <th style="width: 50px;">ملف الأسرة </th>
                                  <th style="width: 170px;" >إسم العائلة</th>
                                  <th style="width: 170px;" >إسم المستفيد</th>
                                  <th style="width: 90px;">فئة المستفيد</th>
                                  <th style="width: 90px;">الجنس</th>
                                  <th style="width: 90px;">تاريخ الميلاد</th>
                                  <th style="width: 60px;">العمر</th>
                                  <th style="width: 60px;">الفئة</th>
                                  <th style="width: 60px;">الحالة</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                   <?php echo $arr2;?>
                              </tr>
                              </tbody>
                          </table>


                          <br>

		<div class="piece-body">

			<div class="col-md-12 no-padding">
         	  <div class="form-group col-md-2  col-sm-6 padding-4">
						
                              <label class="label top-label">		تاريخ بداية الكفالة</label>
							<input type="date" name="from_date" data-validation="required"
								   id="from_date" value="<?php echo $date_from;?>"
								   class="form-control bottom-input  "
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
			 </div>
			 <div class="form-group col-md-2  col-sm-6 padding-4">
                             <label class="label top-label">تاريخ نهاية الكفالة</label>
							
							<input type="date" name="to_date" data-validation="required"
								   id="to_date" value="<?php echo $date_to;?>"
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
											<?php if(!empty($result_Kfala_data['alert_type'])){
												if($a == $result_Kfala_data['alert_type']){ echo 'selected'; }
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
								   onkeypress="validate_number(event);" value="<?=$value?>" class="form-control bottom-input">
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
						<option value="<?php echo$row->id;?>" 
                        <?php if(!empty($status)){
							if($row->id == $status){ echo 'selected'; }
											} ?>>
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
											<?php if(!empty($result_Kfala_data['pay_method'])){
												if($a == $result_Kfala_data['pay_method']){ echo 'selected'; }
											} ?>> <?php echo $pay_method_arr[$a];?></option >
										<?php
									}
								}
								?>
							</select>
			</div>
	        </div>


	    <div class="col-md-12 no-padding">
                            <?php if(!empty($result_Kfala_data['pay_method'])){ ?> <?php } ?>
         <div class="form-group col-md-2  col-sm-6 padding-4">
            <label class="label top-label">   إسم البنك </label>
            <select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input"
                     disabled="disabled"     aria-required="true" >
                    <option value="">إختر</option>
                    <?php if (!empty($banks)) {
                        foreach ($banks as $bank) { ?>
                            <option value="<?php echo $bank->id; ?>"
                                <?php if(!empty($result_Kfala_data['bank_id_fk'])){
                                    if($bank->id == $result_Kfala_data['bank_id_fk']){ echo 'selected'; }
                                } ?>><?php echo $bank->ar_name; ?></option>
                        <?php }
                    } ?>
                </select>
            </div>


            <div class="form-group col-md-4  col-sm-6 padding-4">
            
            <label class="label top-label">   رقم حساب الكافل </label>
            <input type="text" name="bank_account_num" id="bank_account_num"
                                  disabled="disabled"    onkeyup="length_hesab_om($(this).val());"
                                     value="<?php if(!empty($result_Kfala_data['bank_account_num'])){
                                          echo $result_Kfala_data['bank_account_num'];}?>"
                                    class="form-control bottom-input " data-validation-has-keyup-event="true">
                <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
            </div>



            <div class="form-group col-md-2  col-sm-6 padding-4">
            <label class="label top-label">  تاريخ بداية الأمر المستديم </label>
            <input type="date" name="mostdem_from_date"  
                        id="mostdem_from_date" disabled="disabled"
                        value="<?php if(!empty($result_Kfala_data['mostdem_from_date'])){
                                          echo $result_Kfala_data['mostdem_from_date'];}?>"
                        class="form-control bottom-input  "
                        data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                        onchange="checkYear($(this).val());">
            </div>
            <div class="form-group col-md-2  col-sm-6 padding-4">
            <label class="label top-label">   تاريخ نهاية الأمر المستديم </label>
            <input type="date" name="mostdem_to_date" 
                        id="mostdem_to_date" disabled="disabled"
                        value="<?php if(!empty($result_Kfala_data['mostdem_to_date'])){
                                          echo $result_Kfala_data['mostdem_to_date'];}?>"
                        class="form-control bottom-input "
                        data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                        onchange="checkYear($(this).val());">
            </div>
            <div class="form-group col-md-2  col-sm-6 padding-4">
            <label class="label top-label">   صورة الأمر المستديم </label>
            <input type="file" name="mostdem_img" id="mostdem_img" class="form-control bottom-input" disabled="disabled"  >
            </div>
           </div>


            <div class="col-md-12 no-padding">
                
                
                
                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">   حساب الجمعية </label>

                    <select name="gamia_account" id="gamia_account" 
                    class="form-control   bottom-input  "   onchange="GetAccounts(this.value)"
                    aria-required="true" disabled="disabled" >
                    <option value="">إختر</option>
                    <?php
                    if(!empty($banks_accounts)) {
                        foreach($banks_accounts as $row){?>
                                <option value="<?=$row->id?>"
                                    <?php if(!empty($result_Kfala_data['gamia_account'])){
                                   if($result_Kfala_data['gamia_account'] == $row->id){  echo'selected'; } }?>><?=$row->title?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                </div>



                <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">   إسم البنك </label>
                    <select name="gamia_bank_id_fk" id="gamia_bank_id_fk" class="form-control bottom-input" 
                    onchange="GetBankAccount(this.value,$('#gamia_account').val())"	 aria-required="true" disabled="disabled" >
                    <option value="">إختر</option>
                    <?php if (!empty($gamia_banks)) {
                        foreach ($gamia_banks as $bank) { ?>
                            <option value="<?php echo $bank->id; ?>"
                                <?php if(!empty($result_Kfala_data['gamia_bank_id_fk'])){
                                    if($bank->id == $result_Kfala_data['gamia_bank_id_fk']){ echo 'selected'; }
                                } ?>><?php echo $bank->title; ?></option>
                        <?php }
                    } ?>
                </select>
                </div>
                <div class="form-group col-md-4  col-sm-6 padding-4">
                    <label class="label top-label">   رقم الحساب الجمعية </label>
                <select name="gamia_account_num" id="gamia_account_num" class="form-control  bottom-input"
                    aria-required="true" disabled="disabled"  >
                    <option value="">إختر</option>
                    <?php if (!empty($gamia_account_numbers)) {
                        foreach ($gamia_account_numbers as $row) { ?>
                            <option value="<?php echo $row->id; ?>"
                                <?php if(!empty($result_Kfala_data['gamia_account_num'])){
                                    if($row->id == $result_Kfala_data['gamia_account_num']){ echo 'selected'; }
                                } ?>><?php echo $row->account_num; ?></option>
                        <?php }
                    } ?>
                </select>
                </div>

                </div>	





		

        	</div>
		</div>
        <input type="hidden" name="mother_national_num_fk" value="<?=$result_Kfala_data['mother_national_num_fk']?>">
        <input type="hidden" name="person_id_fk" value="<?=$result_Kfala_data['person_id_fk']?>">
			
                      <!--------------------------------------------------------------------->
                    <?php } ?>
                    </div>

                </div>
                <!-------------------------------------start---------------------------------------->



                <div class="col-md-12" id="button_div" <?php if(empty($result_Kfala_data)){ ?> style="display: none" <?php } ?>>


                    <input type="hidden" name="kafel_id_fk" id="kafel_id_fk" value="<?=$this->uri->segment(5)?>">
                    <div class="form-group col-md-5 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="add" value="add"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
        
        

        
                <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">كفالات الكافل</h3>
                <div class="pull-left">
           
                    
                    
                    
                    
                    
                </div>
            </div>
            <div class="panel-body">
            
                  <?php $total=0; $table_total=0; if(isset($all_kafalat) && $all_kafalat!=null){
   $total =$all_kafalat[0]->mostafed_num['total'] + $all_kafalat[0]->aytam_num['total'] + $all_kafalat[0]->armal_num['total'];
                      $table_total +=$total;
                      ?>

                        <table class="table table-striped table-bordered dt-responsive nowrap ">
                                <thead>
                                <tr>
                                    <th style="">م</th>
                                    <th style="">رقم الملف</th>
                                    <th style=""> إسم المستفيد </th>
                                    <th style=""> التفاصيل </th>
                                    <th style="" >نوع  الكفالة </th>
                                    <th style="" >حالة  الكفالة </th>
                                    <th style="" >بداية  الكفالة </th>
                                    <th style="" >نهاية  الكفالة </th>
                                    <th style="" >قيمة  الكفالة </th>
                                    <th style="" >طريقة التوريد</th>
                                    <th style="" >متبقي علي انتهاء الكفالة</th>
                                    <th style="" >فترة السماح</th>
                                    <th style="" >الإجراء </th>
                                </tr>
                                </thead>
                                
                              <tbody>
                        <?php
                        $x=1;
                        foreach($all_kafalat as $row_kafala){

                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row_kafala->file_num;?></td>
                                <td><?php echo $row_kafala->person_name;?></td>
                                <td><a type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal<?php echo $row_kafala->id;?>">التفاصيل</a></td>
                                <td  style="background-color: <?php echo $row_kafala->kafala_color;   ?>;">
                                    <?php echo $row_kafala->kafala_name;?></td>
                                <td style="background-color: <?php echo $row_kafala->halet_kafel_color;   ?>;">
                                    <?php echo $row_kafala->halet_kafel_title;?></td>
                                <td><?php echo $row_kafala->first_date_from_ar;?></td>
                                <td><?php echo $row_kafala->first_date_to_ar;?></td>
                                <td><?php echo $row_kafala->first_value;?></td>
                                <td><?php
                                    $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                                if(!empty($pay_method_arr[$row_kafala->pay_method])){
                                    echo $pay_method_arr[$row_kafala->pay_method]; }?></td>
                                <td>
                                    <?php
                                    $startDate = strtotime("now");
                                    $endDate = $row_kafala->first_date_to;
                                    $seconds_left = ($endDate - $startDate);
                                    $days_left = floor($seconds_left / 3600 / 24);
                                    //echo $days_left; ?>

                                    <button type="button" class="btn btn-sm btn-danger btn-rounded">
                                        <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                        <?php echo $days_left; ?> أيام</button>
                                </td>
                                <!---------------------------------->
              <td>
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                  data-target="#myModals<?php echo $row_kafala->id;?>">  فترة السماح</button>

            </td>
                                
                                <td>
                                    <?php if($row_kafala->kafala_type_fk ==2){
                                        $kafel_id =$row_kafala->first_kafel_id;

                                    }else{
                                        $kafel_id =$row_kafala->first_kafel_id;

                                    } ?>
                                    <a href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/addKfala_data/<?php echo $kafel_id;?>/<?php echo $row_kafala->id; ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/sponsors/Sponsor/deleteKfala_data/".$row_kafala->id."/".$kafel_id  ?>');"
                                       data-toggle="modal" data-target="#modal-delete"
                                       title="حذف"> <i class="fa fa-trash"
                                                       aria-hidden="true"></i> </a>
                                </td>
                              
                                <!------------------------------------>
                            </tr>


                            <!----------------popup-------------------->

                            <?php

/*
echo '<pre>';
print_r($row_kafala->person_type);
*/

                            if( $row_kafala->kafala_type_fk ==4) {


                                $gender = 'ذكر';
                                if ( $row_kafala->person_data['m_gender'] == 2) {
                                    $gender = 'أنثى';
                                }


                                if( $row_kafala->person_data['m_birth_date_hijri'] !=''){

                                    $row_kafala->person_data['m_birth_date_hijri'] =$row_kafala->person_data['m_birth_date_hijri'];

                                }else{

                                    $row_kafala->person_data['m_birth_date_hijri'] ='غير محدد';
                                }

                                if( $row_kafala->person_data['m_birth_date_hijri_year'] !=''){

                                    $age = $current_hijry_year - $row_kafala->person_data['m_birth_date_hijri_year'];

                                }else{

                                    $age =0;
                                }

                            }else{

                                $gender = 'ذكر';
                                if ($row_kafala->person_data['member_gender'] == 2) {
                                    $gender = 'أنثى';
                                }


                                if( $row_kafala->person_data['member_birth_date_hijri'] !=''){

                                    $row_kafala->person_data['member_birth_date_hijri'] =$row_kafala->person_data['member_birth_date_hijri'];

                                }else{

                                    $row_kafala->person_data['member_birth_date_hijri'] ='غير محدد';
                                }

                                if( $row_kafala->person_data['member_birth_date_hijri_year'] !=''){

                                    $age = $current_hijry_year - $row_kafala->person_data['member_birth_date_hijri_year'];

                                }else{

                                    $age =0;
                                }

                            }
                            ?>



                            <div class="modal fade" id="myModal<?php echo $row_kafala->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-unstyled striped-ul" >
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  إسم رب الأسرة :</h6>

                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->father_name;?></h6>
                                                    </div>

                                                </li>

                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  اسم المستفيد :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->person_name;?> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  الجنس :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $gender;?> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  تاريخ الميلاد :</h6>

                                                    </div>


                        <div class="col-xs-8">
                        <?php 
                        /*
                        echo '<pre>';
                        print_r($row_kafala->person_data);*/
                        ?>
                        
                            <h6><?php 
                             if( $row_kafala->person_type == 1) {
                                
                                 echo $row_kafala->person_data['m_birth_date_hijri'];
                             }else{
                                echo $row_kafala->person_data['member_birth_date_hijri'];
                             }
                            
                            ?> </h6>
                        </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6> العمر :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $age;?> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6> الفئة :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  حالة المستفيد :</h6>

                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->person_data['halt_elmostafid_title'];?> </h6>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer" style="display: inline-block;width: 100%">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="myModals<?php echo $row_kafala->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <?php echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/add_days_num/'.$row_kafala->id.'/'.$row_kafala->first_kafel_id); ?>

                                        <div class="modal-body">
                                            <div class="col-md-12 ">
                                                <div class="form-group col-md-8 col-sm-6 padding-4">
                                                    <label class="label label-green half">	الايام</label>
                                                    <input type="number" name="days_num" data-validation="required"
                                                           class="form-control half  "
                                                           data-validation-has-keyup-event="true">
                                                </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer" style="display: inline-block;width: 100%">
                                            <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                            <button type="submit" name="save" value="save" class="btn btn-success">حفظ</button>
                                        </div>
                                        <?php echo form_close()?>
                                    </div>
                                </div>
                            </div>
                            <!----------------popup-------------------->
                            <?php
                            $x++;




                        }
                        ?>
                        <!----------------total-------------------->

                        <!-----------------total------------------->
                        </tbody>

                            <tr>
                                <td colspan="8" style="text-align: center;color: red">الإجمالي</td>
                                <td><?php echo$table_total; ?></td>

                            </tr>
                            </table>
              <!-------------------------buttons------------------------->
                      <div class="text-center">

                          <button type="button" class="btn btn-sm btn-success">
                              أرامل <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->armal_num['num']; ?></span>
                              <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->armal_num['total']; ?></span>
                          </button>
                          <button type="button" class="btn btn-sm btn-primary">
                              أيتام <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->aytam_num['num']; ?></span>
                             <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->aytam_num['total']; ?></span>
                          </button>

                          <button type="button" class="btn btn-sm btn-add">
                              مستفيدين <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->mostafed_num['num']; ?></span>
                              <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->mostafed_num['total']; ?></span>
                          </button>
                          <button type="button" class="btn btn-sm btn-add">
                              الإجمالي <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo$total; ?></span>
                          </button>

                          <br />
                      </div>
                      <!-------------------------buttons------------------------->

                  <?php } ?>
                            
            
            <?php

            ?>
            
            </div>

  </div>
 
        

    </div>
    
    
        
      






    <!------------------------------------------------------------------>

    <!------ table -------->

   </div>












    <!----- end table ------>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php if(!empty($result_Kfala_data['kafala_type_fk'])){ ?>
<script>

$(function() {
    var valu =<?php echo $result_Kfala_data['kafala_type_fk'];?>;
    var id =<?php echo $result_Kfala_data['id'];?>;
    var person_id =<?php echo $result_Kfala_data['person_id_fk'];?>;
    var pay_type =<?php echo $result_Kfala_data['pay_method'];?>;
    var dataString = 'id=' + person_id +'&& kafalaType=' + valu;
    var yearHijri =<?php echo $current_hijry_year;?>;
    GetKafalaTypeArr(valu,id);
    GetPayType(pay_type);
    $.ajax({
        type:'post',
        url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/GetSidebarData',
        data:dataString,
        cache:false,
        success: function(json_data){
            var JSONObject = JSON.parse(json_data);
            // console.log(JSONObject);
            if( JSONObject['kafalaType'] == 4){
                $('#member_name').html( JSONObject['result'].full_name);
                $('#file_nmber').html( JSONObject['result'].file_num);
                $('#father_name').html( JSONObject['result'].father_name);
                $('#birth_date').html( JSONObject['result'].m_birth_date_hijri);
                var member_year = JSONObject['result'].m_birth_date_hijri.split("/");
                $('#age').html( yearHijri -  member_year[2]);


            } else {
                $('#member_name').html( JSONObject['result'].member_full_name);
                $('#file_nmber').html( JSONObject['result'].file_num);
                $('#father_name').html( JSONObject['result'].father_name);
                $('#birth_date').html( JSONObject['result'].member_birth_date_hijri);
                var member_year = JSONObject['result'].member_birth_date_hijri.split("/");
                $('#age').html( yearHijri -  member_year[2]);

            }



        }
    });
});
</script>
<?php } ?>


<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

    <script>
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
    </script>

    <script>
        function length_hesab_om(length) {
            var len=length.length;
            if(len<24){
                alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
            }
            if(len>24){
                alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
            }
            if(len==24){
            }
        }
    </script>
    <script>
        function get_length(len,span_id)
        {
            if(len.length < 10){
                document.getElementById("save").setAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
            }
            if(len.length >10){
                document.getElementById("save").setAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
            }
            if(len.length ==10){
                document.getElementById("save").removeAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = '';
            }
        }
    </script>

    <script>
        function chek_length(inp_id,len)
        {
            var inchek_id="#"+inp_id;
            var inchek =$(''+inchek_id).val();
            if(inchek.length < len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length > len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length == len){
                document.getElementById(""+ inp_id +"_span").innerHTML ='';
                document.getElementById("save").removeAttribute("disabled", "disabled");
            }
        }
    </script>


<script>

    function checkYear(valu) {
        nowyear = <?php echo$current_hijry_year;?>;
        var myDate =valu.split("/");
        if(parseInt(myDate[2]) > parseInt(nowyear) ){
           alert( " السنة الهجرية الحالية "  + nowyear);
        $('#start_kfala_date').val('');
        }
    }

</script>






<script>
    function length_hesab_om(length) {

        var len = length.length;

        if (len < 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>




<!------------------------------------start---------------------------->


<script>

    function GetKafalaTypeArr(valu,valu2) {
        var result_id =valu2;
   $('#js_table_members').show();
         var KafalaType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/getConnection/' + KafalaType + '/' + result_id  ,

            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });

    }

</script>

<script type="text/javascript">
    function getMemberData(argument,kafalaType) {


        $('#button_div').show();
        var kafel_id_fk = $('#kafel_id_fk').val();

        
        var dataString = 'id=' + argument +'&& kafel_id_fk=' + kafel_id_fk +'&& kafalaType=' + kafalaType;
        //alert(dataString);
       if( kafalaType == 4) { 
        
        
            $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/getMotherData',
            data:dataString,
            cache:false,
            success: function(result){
             //   alert(result);
                $('#dataMember').html(result);
            }
        });
       }else { 
           $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/getMemberData',
            data:dataString,
            cache:false,
            success: function(result){
              //  alert(result);
                $('#dataMember').html(result);
            }
        });
        
        
       }
       
     

       var yearHijri =<?php echo $current_hijry_year;?>;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/GetSidebarData',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
               // console.log(JSONObject);
                if( JSONObject['kafalaType'] == 4){
                    $('#member_name').html( JSONObject['result'].full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].m_birth_date_hijri);
                    var member_year = JSONObject['result'].m_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);


                } else {
                    $('#member_name').html( JSONObject['result'].member_full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].member_birth_date_hijri);
                    var member_year = JSONObject['result'].member_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);

                }



            }
        });


    }
</script>

<!------------------------------------------------------------------------>

<script>
	function GetPayType(valu) {
	    //alert(valu);
		if(valu == 5 || valu ==7){

			document.getElementById("bank_id_fk").removeAttribute("disabled", "disabled");

			document.getElementById("bank_id_fk").setAttribute("data-validation", "required");

			document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");

			document.getElementById("bank_account_num").setAttribute("data-validation", "required");

			document.getElementById("gamia_account").removeAttribute("disabled", "disabled");
			document.getElementById("gamia_account").setAttribute("data-validation", "required");
			document.getElementById("gamia_bank_id_fk").removeAttribute("disabled", "disabled");
			document.getElementById("gamia_bank_id_fk").setAttribute("data-validation", "required");
			document.getElementById("gamia_account_num").removeAttribute("disabled", "disabled");
			document.getElementById("gamia_account_num").setAttribute("data-validation", "required");


			if(valu ==7){

				document.getElementById("mostdem_from_date").removeAttribute("disabled", "disabled");

				document.getElementById("mostdem_from_date").setAttribute("data-validation", "required");

				document.getElementById("mostdem_to_date").removeAttribute("disabled", "disabled");

				document.getElementById("mostdem_to_date").setAttribute("data-validation", "required");

				document.getElementById("mostdem_img").removeAttribute("disabled", "disabled");

				//document.getElementById("mostdem_img").setAttribute("data-validation", "required");
			}else{


					document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


					document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


					document.getElementById("mostdem_img").setAttribute("disabled", "disabled");

			}
		}else{
			document.getElementById("bank_id_fk").setAttribute("disabled", "disabled");

			document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");

			document.getElementById("bank_account_num").setAttribute("disabled", "disabled");

			document.getElementById("bank_account_num").removeAttribute("data-validation", "required");


			document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


			document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


			document.getElementById("mostdem_img").setAttribute("disabled", "disabled");



			document.getElementById("gamia_account").setAttribute("disabled", "disabled");
			document.getElementById("gamia_account").removeAttribute("data-validation", "required");
			document.getElementById("gamia_bank_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("gamia_bank_id_fk").removeAttribute("data-validation", "required");
			document.getElementById("gamia_account_num").setAttribute("disabled", "disabled");
			document.getElementById("gamia_account_num").removeAttribute("data-validation", "required");

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


