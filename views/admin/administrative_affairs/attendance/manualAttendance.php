<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php echo form_open_multipart('Administrative_affairs/manualAttendance'); ?>
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
                    		<div class="col-md-5 padd">
	                            <div class="col-xs-6">
	                            	<h4 class="r-h4"> إسم الموظف </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control selectpicker" data-live-search="true" name="emp_code" onchange="return loadData($(this).val())" data-validation="required">
										<option value="">إختر الموظف</option>
										<?php
										foreach ($employees as $employee) {
										?>
										<option value="<?=$employee->emp_code?>"><?=$employee->employee?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-5 padd">
	                            <div class="col-xs-6">
	                            	<h4 class="r-h4"> الإدارة / القسم </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="branch_name" name="branch_name" placeholder="الإدارة / القسم" class="form-control text-left" value="<?php if(isset($employeeData)) echo $employeeData['main'].' -- '.$employeeData['sub'] ?>" readonly>
									<input type="hidden" name="administration_id_fk" id='administration_id_fk' value="<?php if(isset($employeeData)) echo $employeeData['mainID'] ?>">
									<input type="hidden" name="dep_job_id_fk" id='dep_job_id_fk' value="<?php if(isset($employeeData)) echo $employeeData['subID'] ?>">
								</div>
							</div>

							<div class="col-md-2 padd">
								<div class="col-xs-6 r-input">
									<button type="submit" name="add" value="إثبات الحضور" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" ></i></span> إثبات الحضور</button>
								</div>
							</div>
						</div>
					</div>
				</div>
    		</div>
    	</div>
	</div>
</div>
<?php 
echo form_close(); 
if(isset($attendance) && $attendance != null) { 
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
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>إسم الموظف</th>
							<th>الفرع</th>
							<th>التاريخ</th>
							<th>الحضور الفعلي</th>
							<th>الإنصراف الفعلي</th>
							<th>عدد ساعات الحضور</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$x = 1;
					foreach ($attendance as $value) { 
					?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$value->employee?></td>
							<td><?=$value->main.' -- '.$value->sub?></td>
							<td><?=date("Y-m-d",$value->attendance_date)?></td>
							<td><?=$value->presence?></td>
							<?php if($value->dissuasion != null) { ?>
							<td><?=$value->dissuasion?></td>
							<?php }else { ?>
							<td>
								<a href="<?php echo base_url('Administrative_affairs/dissuasion').'/'.$value->id.'/'.$value->presence ?>"> <button class="btn btn-xs btn-warning"><i class="fa fa-exchange"></i> إثبات إنصراف</button> </a>
							</td>
							<?php } ?>
							<td><?=$value->diff?></td>
							<td>
								<a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/deleteManualAttendance/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i>  </a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
<?php } ?>
			</div>
		</div>
	</div>
</div>

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
					console.log(JSONObject);      
					$('#branch_name').val(JSONObject["main"]+' -- '+JSONObject["sub"]);
					$('#administration_id_fk').val(JSONObject["mainID"]);
					$('#dep_job_id_fk').val(JSONObject["subID"]);
                }
            });
            return false;
        }
    }
</script>