<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>

<?php 
$id = $this->uri->segment(3);
if($id == '') {
	echo form_open_multipart('Administrative_affairs/addAbsence_report');
}
else {
	echo form_open_multipart('Administrative_affairs/editAbsence_report/'.$id.'');
}
?>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
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
                    	<div class="col-md-9 col-sm-12 col-xs-12 inner-side r-data no-padding">
							<div class="col-md-10 padd">
								<div class="col-xs-3" style="padding: 0; width: 24%">
			      					<h4 class="r-h4"> إسم الموظف</h4>
			      				</div>
							    <div class="col-xs-9 r-input" style="padding: 0; width: 76%;">
							      	<input type="text" name="emp_name" id="emp_name" value="<?php if(isset($report)) echo $report['employee'] ?>">
							      	<input type="hidden" name="emp_id" id="emp_id" class='dt' value="<?php if(isset($report)) echo $report['emp_id'] ?>">
							    </div>
			    			</div>

			    			<div class="col-md-2 padd">
			    				<button type="button" name="report" style="margin-top: 4px" class="btn btn-warning" onclick="return ajaxSearch($('#emp_name').val());"><i class="fa fa-search"></i> بحث</button>
			    			</div>

			    			<div class="col-md-12 padd"><hr style="margin-bottom: 7px;"></div>

			    			<div class="col-md-12 padd">
			    				<h4 class="r-h4">بيانات طلب الإفادة</h4>
			    			</div>

			    			<div class="col-md-12 padd">
				    			<div class="col-md-6 padd" style="padding-right: 0 !important">
					    			<div class="col-xs-6">
		                            	<h4 class="r-h4"> عدد أيام الغياب</h4>
		                            </div>
		                            <div class="col-xs-6 r-input">
		                            	<input type="number" id="absence_days_num" name="absence_days_num" class="r-inner-h4 dt" data-validation="required" value="<?php if(isset($report)) echo $report['absence_days_num'] ?>" placeholder="عدد أيام الغياب" />
									</div>
								</div>

				    			<div class="col-md-6 padd" style="padding-left: 0 !important">
					    			<div class="col-xs-6">
		                            	<h4 class="r-h4"> تاريخ الإفادة </h4>
		                            </div>
		                            <div class="col-xs-6 r-input">
		                            	<div class="docs-datepicker">
		                                    <div class="input-group">
		                            			<input type="text" id="statement1_date" name="statement1_date" placeholder="تاريخ الإفادة" value="<?php if(isset($report)) echo date("d/m/Y",$report['statement1_date']) ?>" class="form-control date_melady" data-validation="required" >
		                            		</div>
		                            	</div>
									</div>
								</div>
							</div>

							<div class="col-md-12 padd">
			    				<h4 class="r-h4">قد تغيبت عن العمل فى الفترة</h4>
			    			</div>

			    			<div class="col-md-12 padd">
			    				<div class="col-md-6 padd" style="padding-right: 0 !important">
					    			<div class="col-xs-6">
		                            	<h4 class="r-h4"> من يوم	</h4>
		                            </div>
		                            <div class="col-xs-6 r-input">
		                            	<input type="text" id="date_from_day" name="date_from_day" class="r-inner-h4 dt" value="<?php if(isset($report)) echo $report['date_from_day'] ?>" data-validation="required" placeholder="من يوم	" />
									</div>
								</div>

				    			<div class="col-md-6 padd" style="padding-left: 0 !important">
					    			<div class="col-xs-6">
		                            	<h4 class="r-h4"> الموافق </h4>
		                            </div>
		                            <div class="col-xs-6 r-input">
		                            	<div class="docs-datepicker1">
		                                    <div class="input-groupp">
		                            			<input type="date" id="date_from" name="date_from" placeholder="الموافق" class="form-control" value="<?php if(isset($report)) echo date("Y-m-d",$report['date_from']) ?>" data-validation="required" >
		                            		</div>
		                            	</div>
									</div>
								</div>
			    			</div>

							<div class="col-md-12 padd">
			    				<div class="col-md-6 padd" style="padding-right: 0 !important">
					    			<div class="col-xs-6">
		                            	<h4 class="r-h4"> إلى يوم	</h4>
		                            </div>
		                            <div class="col-xs-6 r-input">
		                            	<input type="text" id="date_to_day" name="date_to_day" class="r-inner-h4 dt" data-validation="required" value="<?php if(isset($report)) echo $report['date_to_day'] ?>" placeholder="إلى يوم	" />
									</div>
								</div>

				    			<div class="col-md-6 padd" style="padding-left: 0 !important">
					    			<div class="col-xs-6">
		                            	<h4 class="r-h4"> الموافق </h4>
		                            </div>
		                            <div class="col-xs-6 r-input">
		                            	<div class="docs-datepicker1">
		                                    <div class="input-groupp">
		                            			<input type="date" id="date_to" name="date_to" placeholder="الموافق" value="<?php if(isset($report)) echo date("Y-m-d",$report['date_to']) ?>" class="form-control" data-validation="required" >
		                            		</div>
		                            	</div>
									</div>
								</div>
			    			</div>

			    			<div class="col-md-12 padd">
			    				<div class="col-md-6 padd" style="padding-right: 0 !important">
					    			<div class="col-xs-6">
		                            	<h4 class="r-h4"> إسم الرئيس المباشر</h4>
		                            </div>
		                            <div class="col-xs-6 r-input">
		                            	<input type="text" id="direct_boss" name="direct_boss" class="r-inner-h4 dt" data-validation="required" value="<?php if(isset($report)) echo $report['direct_boss'] ?>" placeholder="إسم الرئيس المباشر" />
									</div>
								</div>
			    			</div>
			    		</div>

			    		<div class="col-md-3 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-12 padd">
			    				<div id="post_img" class="imgContent" style="min-height: 83px;">
				                    <img style=" width: 171px !important;" id="blah" src="<?=base_url('asisst/web_asset/img/logo.png')?>" class="img-rounded">
				                </div>
			    			</div>

			    			<div class="col-md-12 padd">
			                    <div class="col-xs-6">
	                            	<h4 class="r-h4"> الإدارة </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="administration" name="administration" value="<?php if(isset($report)) echo $report['adminName'] ?>" class="r-inner-h4 dt" placeholder="الإدارة" readonly />
								</div>
			                </div>

			                <div class="col-md-12 padd">
			                    <div class="col-xs-6">
	                            	<h4 class="r-h4"> القسم </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="department" name="department" value="<?php if(isset($report)) echo $report['depName'] ?>" class="r-inner-h4 dt" placeholder="القسم" readonly />
								</div>
			                </div>

			    			<div class="col-md-12 padd">
			                    <div class="col-xs-6">
	                            	<h4 class="r-h4"> السجل المدني </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="id_card" name="id_card" class="r-inner-h4 dt" value="<?php if(isset($report)) echo $report['id_num'] ?>" placeholder="السجل المدني" readonly />
								</div>
			                </div>

			                <div class="col-md-12 padd">
			                    <div class="col-xs-6">
	                            	<h4 class="r-h4"> طبيعة العمل </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="job_name" name="job_name" class="r-inner-h4 dt" value="<?php if(isset($report)) echo $report['defined_title'] ?>" placeholder="طبيعة العمل" readonly />
								</div>
			                </div>
			    		</div>

					    <div class="form-group col-sm-12 col-xs-12">
				            <button type="submit" name="add" id="add" value="حفظ" class="btn btn-purple w-md m-b-5" onclick="if($('#emp_id').val() == '') {alert('برجاء قم بإدخال إسم الموظف أولا'); return false;} if($('#date_to').val() < $('#date_from').val()) {alert('لا يمكن لتاريخ البداية أن يكون أكبر من تاريخ النهاية'); return false;}" ><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
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
                    <h4>جدول بيانات مساءلة غياب</h4>
                </div>
            </div>
            
            <div class="panel-body">
<?php if(isset($records) && $records != null) { ?>
				<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>تاريخ الإفادة</th>
							<th>إسم الموظف</th>
							<th>عدد الأيام</th>
							<th>من يوم</th>
							<th>إلى يوم</th>
							<th>طباعة</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($records as $record) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$record->statement1_date)?></td>
							<td><?=$record->employee?></td>
							<td><?=$record->absence_days_num?></td>
							<td><?=date("Y-m-d",$record->date_from)?></td>
							<td><?=date("Y-m-d",$record->date_to)?></td>
							<td>
								<a href="<?=base_url().'Administrative_affairs/printAbsence_report/'.$record->id.'/'.$this->uri->segment(2)?>"><i class="fa fa-print"></i></a>
							</td>
							<td>
								<?php if($record->status == 0){ ?>
								<a href="<?php echo base_url('Administrative_affairs/editAbsence_report').'/'.$record->id?>"><i class="fa fa-pencil"></i> </a>

								<a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/deleteAbsence_report/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
				                <? }else{ ?>
				                	<button class="btn btn-xs btn-primary"><span class="fa fa-info"></span> لا يمكنك تنفيذ أي إجراء حيث تم الرد</button>
				                <?php } ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
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

<script type="text/javascript">
    function ajaxSearch(emp_name)
    {
        var inputs = $('.dt');
        for (var i = inputs.length - 1; i >= 0; i--) {
            inputs[i].value = '';
        }
        if(emp_name){
            var dataString = 'emp_name=' + emp_name;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Administrative_affairs/GetEmpData",
                data: dataString,
                cache:false,
                success: function (result) {
                    var data = JSON.parse(result);
                    console.log(data);
                    if(data) {
	                    $('#id_card').val(data.id_num);
	                    $('#administration').val(data.adminName);
	                    $('#department').val(data.depName);
	                    $('#job_name').val(data.defined_title);
	                    $('#emp_id').val(data.id);
	                    $('#emp_name').val(data.employee);
	                }
	                else {
	                	alert("لا يوجد ناتج للبحث .. برجاء أعد كتابة الإسم صحيحا");
	                }
                }
            });
        }
    }
</script>