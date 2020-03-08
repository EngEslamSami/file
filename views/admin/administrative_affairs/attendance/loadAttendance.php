<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php echo form_open_multipart('Administrative_affairs/loadAttendance'); ?>
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
	                            	<h4 class="r-h4"> مسار الملف </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="file" name="upload" class="form-control" accept=".csv, .xls" />
								</div>
							</div>

							<div class="col-md-6 padd">
								<div class="col-xs-6">
									<button type="membermit" name="load" value="رفع الملف" class="btn btn-success" style="margin-top: 3px;"><i class="fa fa-cloud-upload"></i> رفع الملف</button>
								</div>
								<div class="col-xs-6">
									<button type="membermit" name="download" value="تحميل الملف" class="btn btn-info" style="margin-top: 3px;"><i class="fa fa-cloud-download"></i> تحميل الملف</button>
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
if(isset($table) && $table != null) { 
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
						</tr>
					</thead>
					<tbody>
					<?php 
					$x = 1;
					foreach ($table as $value) { 
						$style = '';
						if($value->presence == '' || $value->dissuasion == '') {
				            $style = 'color:red;';
						}
					?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$value->employee?></td>
							<td><?=$value->main.' -- '.$value->sub?></td>
							<td><?=date("Y-m-d",$value->attendance_date)?></td>
							<td><?=$value->presence?></td>
							<td><?=$value->dissuasion?></td>
							<td style="<?=$style?>"><?=$value->diff?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>