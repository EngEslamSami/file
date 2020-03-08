<?php
$type = array(1=>'عادي',2=>'حادثة');
$status = array(1=>'لم يتم التصليح',2=>'جاري التصليح',3=>'تم التصليح');
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
		    	<div class="panel with-nav-tabs panel-default">
		    		<div class="panel-heading">
		                <ul class="nav nav-tabs">
		                    <li class="active"><a href="#tab0default" data-toggle="tab">أعطال لم يتم تصليحها</a></li>
		                    <li><a href="#tab1default" data-toggle="tab">أعطال جاري تصليحها</a></li>
		                    <li><a href="#tab2default" data-toggle="tab">أعطال تم تصليحها</a></li>
		                </ul>
		            </div>

		            <div class="panel-body">
		            	<div class="tab-content">
		            		<div class="tab-pane fade in active" id="tab0default">
		            			<?php if(isset($not) && $not != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>تاريخ العطل</th>
											<th>رقم السيارة</th>
											<th>إسم العطل</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($not as $crash) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$crash->date)?></td>
											<td><?=$crash->car_code?></td>
											<td><?=$crash->crash_name?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$crash->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
											</td>
											<td>
												<a href="<?php echo base_url('Cars/Crashes/statusUpdate').'/'.$crash->id.'/3' ?>" title="تم التصليح"><button class="btn btn-sm btn-success"><i class="fa fa-check"></i> </button></a>
												<a href="<?php echo base_url('Cars/Crashes/statusUpdate').'/'.$crash->id.'/2' ?>" title="جاري التصليح"><button class="btn btn-sm btn-warning"><i class="fa fa-gear"></i> </button></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد أعطال</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab1default">
		            			<?php if(isset($still) && $still != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>تاريخ العطل</th>
											<th>رقم السيارة</th>
											<th>إسم العطل</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($still as $crash) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$crash->date)?></td>
											<td><?=$crash->car_code?></td>
											<td><?=$crash->crash_name?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$crash->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
											</td>
											<td>
												<a href="<?php echo base_url('Cars/Crashes/statusUpdate').'/'.$crash->id.'/3' ?>" title="تم التصليح"><button class="btn btn-sm btn-success"><i class="fa fa-check"></i> </button></a>
												<a href="<?php echo base_url('Cars/Crashes/statusUpdate').'/'.$crash->id.'/1' ?>" title="لم يتم التصليح"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد أعطال</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab2default">
		            			<?php if(isset($done) && $done != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>تاريخ العطل</th>
											<th>رقم السيارة</th>
											<th>إسم العطل</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($done as $crash) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$crash->date)?></td>
											<td><?=$crash->car_code?></td>
											<td><?=$crash->crash_name?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$crash->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
											</td>
											<td>
												<a href="<?php echo base_url('Cars/Crashes/statusUpdate').'/'.$crash->id.'/1' ?>" title="لم يتم التصليح"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>
												<a href="<?php echo base_url('Cars/Crashes/statusUpdate').'/'.$crash->id.'/2' ?>" title="جاري التصليح"><button class="btn btn-sm btn-warning"><i class="fa fa-gear"></i> </button></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد أعطال</div>
								<?php } ?>
		            		</div>
		            	</div>
		            </div>
		    	</div>
    		</div>
    	</div>
    </div>
</div>

<?php 
if(isset($all) && $all != null) {
	foreach ($all as $crash) { 
?>
<div class="modal" id="myModal<?=$crash->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
        	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
            	<h4 class="modal-title">تفاصيل عطل سيارة برقم لوحة (<?=$crash->car_code?>)</h4>
         	</div>

   			<div class="modal-body">
					<div class="row">
						<div class="col-md-12 space">
       					<div class="col-md-3">
               				<h5><b>تاريخ العطل :</b></h5>
               			</div>
           				<div class="col-md-3">
           					<h6><?=date("Y-m-d",$crash->date)?></h6>
           				</div>

       					<div class="col-md-3">
               				<h5><b>إسم العطل :</b></h5>
               			</div>
           				<div class="col-md-3">
           					<h6><?=$crash->crash_name?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 space">
       					<div class="col-md-3">
               				<h5><b>نوع العطل:</b></h5>
               			</div>
           				<div class="col-md-3">
           					<h6><?=$type[$crash->crash_type]?></h6>
           				</div>

       					<div class="col-md-3">
               				<h5><b>حالة العطل :</b></h5>
               			</div>
           				<div class="col-md-3">
           					<h6><?=$status[$crash->crash_status]?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 space">
       					<div class="col-md-3">
               				<h5><b>ملاحظات :</b></h5>
               			</div>
           				<div class="col-md-3">
           					<h6><?=$crash->notes?></h6>
           				</div>

       					<div class="col-md-3">
               				<h5><b>مسئول الإصلاح :</b></h5>
               			</div>
           				<div class="col-md-3">
           					<h6><?=$crash->driver_name?></h6>
           				</div>
       				</div>
           		</div>
           	</div>
				<div class="modal-footer">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
		    </div>
		</div>
	</div>
</div>
<?php
	}
}
?>