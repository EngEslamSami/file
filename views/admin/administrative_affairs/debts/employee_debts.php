
	<div class="col-md-12 ">
		<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
			<div class="panel-heading">
				<div class="panel-title">
					<h4><?=$title?></h4>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-xs-12 r-inner-details">
					<?php
                    if(isset($result) && $result!=null && !empty($result)){
                        $out['debt_id']=$result[0]->debt_id;
					$out['debt_date']=date('/dm/Y',$result[0]->debt_date);
					$out['emp_id']=$result[0]->emp_id;
					$out['value']=$result[0]->value;
					$out['notes']=$result[0]->notes;
					$out['premiums_number']=$result[0]->premiums_number;
					$out['month_paid']=$result[0]->month_paid;
					$out['department']=$result[0]->department;
					$out['adminstaration']=$result[0]->adminstaration;


					$out['administration']=$result[0]->emp_data->administration;
					$out['department']=$result[0]->emp_data->department;
					$out['input']='
					<div class="form-group col-sm-12 col-xs-12">
						<button type="submit" name="UPDATE" value="تعديل" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
					</div>
					';
					$out['form']='Administrative_affairs/UpdateEmployeesDebts/'.$result[0]->debt_id;
					$out["desable"]='';
					$out['hidden']='';
					}else{
					$out['debt_date']="";
					$out['value']="";
					$out['notes']="";
					$out['month_paid']="0";
					$out['emp_id']="";
					$out['administration']="";
					$out['department']="";
					$out['department']="";
					$out['adminstaration']="";
					$out['premiums_number']="";
					$out["desable"]='';
					$out['hidden']='';
					if(isset($emp_data) && $emp_data!=null && !empty($emp_data) ){
					$out['emp_id']=$emp_data['id'];
					$out['administration']=$emp_data['administration'];
					$out['department']=$emp_data['department'];
					$out["desable"]='disabled="disabled"';
					$out['hidden']='<input type="hidden" name="emp_id" value="'.$emp_data['id'].'" />';
					}
					$out['input']='<div class="form-group col-sm-12 col-xs-12">
					<button type="submit" name="ADD" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
				</div>';
					$out['form']='Administrative_affairs/EmployeesDebts';
					}
					?>
					<?php  echo form_open_multipart($out['form']);?>
					<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4 "> تاريخ اليوم </h4>
							</div>
							<div class="col-xs-6 r-input ">
								<div class="docs-datepicker">
									<div class="input-group">
										<input type="text" name="day_date" value="<?php echo date("Y-m-d");?>" class="form-control date_melady" data-validation="required" readonly="readonly">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4"> الإدارة </h4>
							</div>
							<div class="col-xs-6 r-input">
								<select name="administration" id="administration" <? echo $out['desable'];?>  onchange="return lood_dep($('#administration').val());" data-validation="required">
								<option value="">إختر</option>
								<?php if(!empty($admin)):
                                        foreach ($admin as $record):
                                            $selected=''; if($record->id == 0){$selected='selected="selected"';}  ?>
								?>
								<option value="<? echo $record->id;?>" <? echo $selected;?>   ><? echo $record->name;?></option>
								<?php  endforeach; endif;?>
								</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4">إسم الموظف  </h4>
							</div>
							<div class="col-xs-6 r-input">
								<select name="emp_id" id="optionearea2" class="form-control" <? echo $out['desable'];?>  data-validation="required"  >
									<option value="">إختر الادارة و القسم أولا</option>
									<?php
									if(isset($emp_data) && $emp_data!=null && !empty($emp_data) || isset($result) ){
										foreach ($employees as $row):
											$select="";  if($row->id == $out['emp_id']){$select='selected="selected"';}?>
											<option value="<?php echo $row->id ?>" <?php echo $select?>> <?php echo $row->employee?></option>
										<?php  endforeach ;}?>
								</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4">عدد الاقساط </h4>
							</div>
							<div class="col-xs-6 r-input">
								<input type="number"  onfocusout="get_debt($('#debt_id').val());"   class="r-inner-h4"  min="1" max="18" id="premiums_number" name="premiums_number" value="<?php echo $out["premiums_number"] ?>" data-validation="required" />
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4">ملاحظات </h4>
							</div>
							<div class="col-xs-6 r-input">
								<textarea class="r-textarea" data-validation="required" name="notes"><? echo $out['notes'];?></textarea>
							</div>
						</div>

						<?php echo  $out['hidden']?>
						<?php echo  $out['input']?>
					</div>
					<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4 "> تاريخ السلفه </h4>
							</div>
							<div class="col-xs-6 r-input ">
								<div class="docs-datepicker">
									<div class="input-group">
										<input type="text" name="debt_date" value="<?php echo $out['debt_date']?>" class="form-control date_melady" data-validation="required"   placeholder="شهر / يوم / سنة ">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4"> القسم </h4>
							</div>
							<div class="col-xs-6 r-input">
								<select name="department" id="optionearea1" <? echo $out['desable'];?>  onchange="return lood_emp($('#optionearea1').val());" data-validation="required">
								<option value="">إختر الإدارة أولا</option>
								<?php   if(isset($emp_data) && $emp_data!=null && !empty($emp_data) || isset($result) ){
                                            foreach ($departs as $one_row){
                                                $selected=''; if($one_row->id == $out['department']){$selected='selected="selected"';}  ?>
								<option value="<?php echo $one_row->id;?>" <?php echo $selected;?>   ><?php echo $one_row->name;?></option>
								<?php  }
                                        }?>
								</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4">قيمة السلفة </h4>
							</div>
							<div class="col-xs-6 r-input">
								<input type="number" onfocusout="max_premiums($('#debt_id').val());"  class="r-inner-h4" id="debt_id" name="value" value="<?php echo $out["value"] ?>" data-validation="required" />
							</div>
						</div>

						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4">قيمة القسط </h4>
							</div>
							<div class="col-xs-6 r-input">
								<input type="number" class="r-inner-h4" id="month_paid" name="month_paid"
									   value="<?php echo $out["month_paid"] ?>" data-validation="required"
									   onfocusout="get_max_month($(this).val());"   readonly=""/>
							</div>
						</div>
					</div>

					<?php echo form_close()?>
				</div>
			</div>
		</div>
	</div>




<?php if(isset($table)&& $table!=null && !empty($table)):?>
<div class="col-sm-12 col-md-12 col-xs-12">
	<br>
	<div class="col-md-12 fadeInUp wow">
		<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>بيانات الإدارة </h4>
				</div>
			</div>
			<div class="panel-body">

				<div class="col-xs-12 r-inner-details">
					<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>م</th>
							<th class="text-center">اسم الموظف</th>
							<th class="text-center">تاريخ السلفة </th>
							<th class="text-center">قيمة السلفة</th>
							<th class="text-center">الإجراء</th>
							<th class="text-center">الحالة</th>
							<th class="text-center">التفاصيل</th>
						</tr>
						</thead>
						<tbody class="text-center">
						<?php
                                    $a=1;
                                    foreach ($table as $record ):
                                        if($record->approved == 0){
						$state="لم يتم الاجراء";
						$button='

						<a href="'.base_url().'Administrative_affairs/UpdateEmployeesDebts/'.$record->debt_id.'">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

						';
						}
						elseif($record->approved == 1){
						$state="مقبولة";
						$button='غير متاح';
						}
						elseif($record->approved ==2){
						$state="مرفوضة";
						$button='غير متاح';
						}
						?>
						<tr>
							<td><?php echo $a ?></td>
							<td><?php echo $record->emp_name ?></td>

							<td><?php echo date("Y-m-d",$record->debt_date)  ?></td>
							<td><?php echo $record->value?></td>
							<td><?php echo $button?> </td>
							<td><?php echo $state?> </td>
							<td> <button aria-hidden="true" data-toggle="modal" data-target="#Modal<?php echo $record->debt_id ?>" class="btn btn-sm btn-info"><i class="fa fa-info" ></i> التفاصيل</button></td>

							<!-- Modal -->
							<div id="Modal<?php echo $record->debt_id ?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">تفاصيل الطلب</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-4">
													<h4><b>اسم الموظف: </b></h4>
												</div>
												<div class="col-sm-8">
													<h4><?php echo $record->emp_name ?></h4>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<h4><b>تاريخ السلفة: </b></h4>
												</div>
												<div class="col-sm-8">
													<h4><?php echo date("Y-m-d",$record->debt_date)  ?></h4>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<h4><b>قيمة السلفة: </b></h4>
												</div>
												<div class="col-sm-8">
													<h4><?php echo $record->value?></h4>
												</div>
											</div>

											<div class="row">
												<div class="col-md-4">
													<h4><b>عدد الاقساط: </b></h4>
												</div>
												<div class="col-sm-8">
													<h4><?php echo $record->premiums_number?></h4>
												</div>
											</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn manage-close-pop" data-dismiss="modal">إغلاق</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal -->





						</tr>
						<?php
                                        $a++;
                                        endforeach;  ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>


<script>
	function lood_dep(num){
		if(num>0 && num != '')
		{
			var id = num;
			var dataString = 'admin_num=' + id ;
			$.ajax({
				type:'post',
				url: '<?php echo base_url() ?>Administrative_affairs/LoadPages',
				data:dataString,
				dataType: 'html',
				cache:false,
				success: function(html){
					$("#optionearea1").html(html);
				}
			});
			return false;
		}
	}
</script>
<script>
	function lood_emp(num){
		if(num>0 && num != '')
		{
			var id = num;
			var dataString = 'dep_num=' + id ;
			$.ajax({
				type:'post',
				url: '<?php echo base_url() ?>Administrative_affairs/LoadPages',
				data:dataString,
				dataType: 'html',
				cache:false,
				success: function(html){
					$("#optionearea2").html(html);
				}
			});
			return false;
		}
	}
</script>

<script>

   function max_premiums(debt){
   	if($('#optionearea2').val()=='')
		{
			alert("من فضلك ادخل الموظف اولا ");

			return;
		}
    }    
   //--------------------------------------------
	function get_debt(debt)
	{
	  
	
		var value=$('#optionearea2').val();
		var salery = value.split("-");
        var premiums_number =$('#premiums_number').val();
		var max_debt= salery[1]*4;
		var month_paid=$('#month_paid').val();
		if(debt>max_debt){
			alert( max_debt+"اقصي قيمه للسلفه ");
			$('#debt_id').val('');
			$('#month_paid').val('0');
            
		}else{
			$('#month_paid').val(debt/premiums_number);
              var paid_month = debt/premiums_number ;
              get_max_month(paid_month);
		}
	} 

</script>
<script>

	function get_max_month(month_paid)
	{

		if($('#optionearea2').val()=='')
		{
			alert("من فضلك ادخل الموظف اولا ");

			return;
		}
		var value=$('#optionearea2').val();

		var salery = value.split("-");
        var  total_salary = salery[1];
		var max= total_salary /4;
		var min= total_salary /5 ;
        if(month_paid != "0" && month_paid > 0 && month_paid != 0 ){
        		if(month_paid > max)
        		{
        			alert("  قيمه القسط لا تتعدي 25% من الراتب ما يعادل  " + max);
        			$('#month_paid').val('0');
        		//	return;
        		}
        	   else	if(month_paid < min)
        		{
        			alert("  قيمه القسط لا تقل عن  20% من الراتب ما يعادل   " +min);
        			$('#month_paid').val('0');
        		//	return;
        		} else {
        		  	$('#month_paid').val(month_paid);
        		//	return;
        		}
        }        
	}
</script>