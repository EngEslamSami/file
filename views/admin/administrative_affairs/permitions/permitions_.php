<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$status = array('لم يتم إتخاذ إجراء','تم الموافقة على الإذن','تم رفض الإذن');
$id = $this->uri->segment(3);
if($id == '') {
	echo form_open_multipart('Administrative_affairs/addPermits');
}
else {
	echo form_open_multipart('Administrative_affairs/editPermits/'.$id.'');
}
?>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
            	<div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                    	<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                    		<div class="col-md-6 padd">
	                            <div class="col-xs-6">
	                            	<h4 class="r-h4"> رقم الطلب </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="id" name="id" placeholder="رقم الطلب" class="r-inner-h4" value="<?php 
									if(isset($permit)) {echo ($permit['id']);
									}else{
										if(isset($permits) && $permits != null) {echo ($permits[0]->id+1);}else{echo 1;}
									} ?>" readonly>
								</div>
							</div>


							<div class="col-md-6 padd">
								<div class="col-xs-6">
									<h4 class="r-h4"> تاريخ اليوم </h4>
								</div>
								<div class="col-xs-6 r-input">
									<div class="docs-datepicker">
										<div class="input-group">
											<input type="text" id="day_date" name="day_date" placeholder="تاريخ اليوم"
                                             value="<?php echo date('Y-m-d');?>" class="form-control date_melady" readonly>
										</div>
									</div>
								</div>
							</div>


							<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ الإذن </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="permit_date" name="permit_date" placeholder="تاريخ الإذن" value="<?php if(isset($permit)) {echo date("d-m-Y",$permit['permit_date']);} ?>" class="form-control date_melady" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> إسم الموظف </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control selectpicker" data-live-search="true" name="emp_code" onchange="loadData($(this).val()),checkEmp(this.value)" data-validation="required" aria-required="true">
										<option value="">إختر الموظف</option>
										<?php
										foreach ($employees as $employee) {
											$select = '';
											if((isset($permit) && $permit['emp_code'] == $employee->emp_code) || ($_SESSION['role_id_fk'] == 3)) {
												$select = 'selected';
											}
										?>
										<option value="<?=$employee->emp_code?>" <?=$select?> ><?=$employee->employee?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> الإدارة / القسم </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="branch_name" name="branch_name" placeholder="الإدارة / القسم" class="r-inner-h4" value="<?php if(isset($employeeData)) echo $employeeData['main'].' -- '.$employeeData['sub'] ?>" data-validation="required" readonly>
									<input type="hidden" name="administrative_affairs_settings_id" id='administrative_affairs_settings_id' value="<?php if(isset($employeeData)) echo $employeeData['group_affairs_id_fk'] ?>">
									<input type="hidden" name="administration_id_fk" id='administration_id_fk' value="<?php if(isset($employeeData)) echo $employeeData['mainID'] ?>">
									<input type="hidden" name="dep_job_id_fk" id='dep_job_id_fk' value="<?php if(isset($employeeData)) echo $employeeData['subID'] ?>">
									<input type="hidden" name="total" id='total' value="<?php if(isset($employeeData)) echo $employeeData['total'] ?>">
								</div>
							</div>



							<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> وقت الخروج </h4>
	                            </div>
                                <div class="col-xs-6 r-input">
                                    <input type="time" id="time_out" name="time_out" placeholder="وقت الخروج" value="<?php if(isset($permit)) echo $permit['time_out'] ?>" class="form-control " data-validation="required" onchange="loadData2();"  >
                                </div>
							</div>
                            <div class="col-md-6 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> مدة الإستئذان</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" id="ozon_time"  name="ozon_time"  value="<?php
									if(isset($permit)) {echo ($permit['ozon_time']);
									}else{
										echo$ozon->ozon_num_day;
									} ?>" class="r-inner-h4"  onkeyup="getOzon_num_day(),loadData2()">
                                </div>

                            </div>

							<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> وقت الرجوع </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
                                        <input type="text" id="time_return" name="time_return" placeholder="وقت الرجوع"  value="<?php if(isset($permit)) echo $permit['time_return'] ?>"class="form-control time" readonly >
								</div>
							</div>

							<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> سبب الإذن </h4>
	                            </div>
                                <div class="col-xs-6 r-input">
                                    <select name="permit_reason" id="permit_reason"    data-validation="required" aria-required="true">

                                        <option value="">إختر</option>
                                        <?php            if(!empty($ozon_reasons)):
                                            foreach ($ozon_reasons as $record):
                                                $sect='';
                                                if(isset($permit)) {
                                                if ($permit['permit_reason'] == $record->id) {
                                                    $sect = 'selected';
                                                }
                                                }
                                                ?>
                                                <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->title;?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </div>
							</div>
						</div>
						<div class="col-md-12" id="buttons">
							<button type="submit" id="button"  name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" ></i></span> حفظ</button>
					
                    	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
echo form_close();
if ($id == '') { ?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول البيانات</h4>
                </div>
            </div>
            
            <div class="panel-body">
<?php if(isset($permits) && $permits != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>التاريخ</th>
							<?php if($_SESSION['head_dep_id_fk'] == 1){ ?>
							<th>إسم الموظف</th>
							<th>الفرع</th>
							<?php }?>
							<th>الحالة</th>
							<th>التفاصيل</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($permits as $permit) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$permit->permit_date)?></td>
							<?php if($_SESSION['head_dep_id_fk'] == 1){ ?>
							<td><?=$permit->employee?></td>
							<td><?=$permit->main.' -- '.$permit->sub?></td>
							<?php } ?>
							<td><?=$status[$permit->status]?></td>
							<td>
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$permit->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
							</td>
							<td>
								<?php if($permit->status == 0){ ?>
								<a href="<?php echo base_url('Administrative_affairs/editPermits').'/'.$permit->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/deletePermits/".$permit->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
				                <? }else{ ?>
				                	<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تنفيذ أي إجراء حيث تم إعتماد الإذن</button>
				                <?php } ?>
							</td>
						</tr>

						<div class="modal" id="myModal<?=$permit->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title">تفاصيل الإذن رقم: <?=$permit->id?></h4>
					             	</div>
				       
				           			<div class="modal-body">
				       					<div class="row">
				       						<?php if($_SESSION['head_dep_id_fk'] == 1){ ?>
				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>إسم الموظف :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$permit->employee?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>الإدارة :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$permit->main?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>القسم :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$permit->sub?></h6>
					               				</div>
				               				</div>
				               				<?php } ?>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>تاريخ الإذن :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=date("Y-m-d",$permit->permit_date)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>وقت الخروج :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$permit->time_out?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>وقت العودة :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$permit->time_return?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>سبب الإذن :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$permit->permit_reason?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>حالة الإذن :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$status[$permit->status]?></h6>
					               				</div>
				               				</div>
				               				<?php if($permit->status != 0) { ?>
				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>السبب :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$permit->accept_refuse_reason?></h6>
					               				</div>
				               				</div>
				               				<?php } ?>
					               		</div>
					               	</div>
				 					<div class="modal-footer">
								      	<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
								    </div>
								</div>
							</div>
						</div>
						<?php } ?>
					</tbody>
				</table>

				<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
			                </div>
			                <div class="modal-body">
			                    <p id="text">هل أنت متأكد من الحذف؟</p>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
			                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
			                </div>
			            </div>
			        </div>
			    </div>
<?php 
	} 
	else {
		echo '<div class="alert alert-danger">لا توجد بيانات</div>';
	}
?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<script>
    function loadData(id){
    	$('#branch_name').val('');
        if(id)
        {
            var dataString = 'emp_code=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/employeeData',
                data:dataString,
                cache:false,
                success: function(json_data){
                	var JSONObject = JSON.parse(json_data);
					//console.log(JSONObject);
					$('#branch_name').val(JSONObject["main"]+' -- '+JSONObject["sub"]);
					$('#administrative_affairs_settings_id').val(JSONObject["group_affairs_id_fk"]);
					$('#administration_id_fk').val(JSONObject["mainID"]);
					$('#dep_job_id_fk').val(JSONObject["subID"]);
                }
            });
            return false;
        }
    }


    function loadData2() {
        var out_time =$('#time_out').val();
        var ozon_time =$('#ozon_time').val();
        if (out_time) {
            var dataString = 'start_date=' + out_time +'&ozon_time=' + ozon_time;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/getOutDate',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    $('#time_return').val(JSONObject["time_out"]);
                    $('#ozon_time').val(JSONObject["num"]);
                }
            });
            return false;


        }

    }




	function getOzon_num_day() {
		var ozon_time =$('#ozon_time').val();
		if(ozon_time > <?php echo $ozon->ozon_num_day;?> ){
			alert('الحد الاقصي خلال اليوم <?php echo$ozon->ozon_num_day;?> ساعة');
			document.getElementById("button").setAttribute("disabled", "disabled");
		}else{
			document.getElementById("button").removeAttribute("disabled", "disabled");
		}
	}
	
	
	
	
	
	function checkEmp(myCode) {

		if (myCode) {
			var dataString = 'myCode=' + myCode;
			$.ajax({
				type:'post',
				url: '<?php echo base_url() ?>Administrative_affairs/checkEmp',
				data:dataString,
				cache:false,
				success: function(json_data){
					var JSONObject = JSON.parse(json_data);
					console.log(JSONObject);
					if(JSONObject["employee_permit_number"] >= JSONObject["max"]){
						$('#buttons').html('<div class="alert alert-danger">لا يمكنك إضافة إذن حيث أنك وصلت للعدد المسموح به</div>');
					}else{
						$('#buttons').html('<button type="submit" id="button"  name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" ></i></span> حفظ</button>');
					}


				}
			});
			return false;


		}
	}
	

</script>