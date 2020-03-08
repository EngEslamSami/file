<style type="text/css">
.padd {padding: 0 15px !important;}
.no-padding {padding: 0;}
h4 {margin-top: 0;}
</style>

<?php
$status = array('لم يتم إتخاذ إجراء','تم الموافقة على طلب تطوع','تم رفض طلب تطوع');
$dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
$period = array('الصباح','المساء');
$answer = array(1=>'نعم',2=>'لا');
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
		                    <li class="active"><a href="#tab0default" data-toggle="tab">طلبات الواردة</a></li>
		                    <li><a href="#tab1default" data-toggle="tab">طلبات الموافق عليها</a></li>
		                    <li><a href="#tab2default" data-toggle="tab">طلبات المرفوضة</a></li>
		                </ul>
		            </div>

		            <div class="panel-body">
		            	<div class="tab-content">
		            		<div class="tab-pane fade in active" id="tab0default">
		            			<?php if(isset($newVolunteers) && $newVolunteers != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
							                <th>الإسم</th>
							                <th>الهاتف</th>
							                <th>العنوان</th>
							                <th>البريد الإلكتروني</th>
							                <th>التفاصيل</th>
							                <th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($newVolunteers as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
							                <td><?=$value->name?></td>
							                <td><?=$value->mobile?></td>
							                <td><?=$value->address?></td>
							                <td><?=$value->email?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$value->id?>"><i class="fa fa-bell"></i> إعتماد الطلب</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات واردة</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab1default">
		            			<?php if(isset($acceptedVolunteers) && $acceptedVolunteers != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
							                <th>الإسم</th>
							                <th>الهاتف</th>
							                <th>العنوان</th>
							                <th>البريد الإلكتروني</th>
							                <th>التفاصيل</th>
							                <th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($acceptedVolunteers as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
							                <td><?=$value->name?></td>
							                <td><?=$value->mobile?></td>
							                <td><?=$value->address?></td>
							                <td><?=$value->email?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
											</td>
											<td>
												<?php if($value->suspend_publisher == $_SESSION['user_id']) { ?>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$value->id?>"><i class="fa fa-bell"></i> تعديل إعتماد</button>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات موافق عليها</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab2default">
		            			<?php if(isset($refusedVolunteers) && $refusedVolunteers != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
							                <th>الإسم</th>
							                <th>الهاتف</th>
							                <th>العنوان</th>
							                <th>البريد الإلكتروني</th>
							                <th>التفاصيل</th>
							                <th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($refusedVolunteers as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
							                <td><?=$value->name?></td>
							                <td><?=$value->mobile?></td>
							                <td><?=$value->address?></td>
							                <td><?=$value->email?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
											</td>
											<td>
												<?php if($value->suspend_publisher == $_SESSION['user_id']){ ?>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$value->id?>"><i class="fa fa-bell"></i> تعديل إعتماد</button>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات مرفوضة</div>
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
if(isset($allVolunteers) && $allVolunteers != null) {
	foreach ($allVolunteers as $value) { 
?>
<div class="modal" id="myModalemp<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
  <div class="modal-dialog" role="document" style="width: 90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">تفاصيل المتطوع/ـه(<?=$value->name?>)</h4>
      </div>

      <div class="modal-body">
        <div class="form-group col-sm-12 col-xs-12">
          <h4 class="r-h4">البيانات الشخصية</h4>
          <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green half">رقم الهوية </label>
            <h4 class="form-control half input-style"><?=$value->id_card?></h4>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green half">تاريخ الميلاد</label>
            <h4 class="form-control half input-style"><?=$value->birth_date?></h4>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green half">العنوان </label>
            <h4 class="form-control half input-style"><?=$value->address?></h4>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green half">الهاتف أو الجوال</label>
            <h4 class="form-control half input-style"><?=$value->mobile?></h4>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green half">المهنة </label>
            <h4 class="form-control half input-style"><?=$value->job?></h4>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green half">البريد الإلكتروني </label>
            <h4 class="form-control half input-style"><?=$value->email?></h4>
          </div>
        </div>

        <div class="form-group col-sm-12 col-xs-12">
          <h4 class="r-h4">المجالات والبرامج  المتطوع بها</h4>
          <?php
          $allFields = unserialize($value->fields);
          if(isset($fields) && $fields != null) {
            foreach ($fields as $field) {
              $checked = '';
              if(in_array($field->id,$allFields)) {
                $checked = 'checked';
              }
              ?>
              <div class="col-xs-3">
                <input type="checkbox" disabled <?=$checked?>> <label><h6><?=$field->title?></h6></label>
              </div>
              <?php
            }
          }
          ?>
        </div>

        <div class="form-group col-sm-12 col-xs-12">
          <h4 class="r-h4">أسباب الرغبة بالتطوع لدى الجمعية</h4>
          <?php
          $allReasons = unserialize($value->reasons);
          if(isset($reasons) && $reasons != null) {
            foreach ($reasons as $reason) {
              $checked = '';
              if(in_array($reason->id,$allReasons)) {
                $checked = 'checked';
              }
              ?>
              <div class="col-xs-3">
                <input type="checkbox" disabled <?=$checked?>> <label><h6><?=$reason->title?></h6></label>
              </div>
              <?php
            }
          }
          ?>
        </div>

        <div class="form-group col-sm-12 col-xs-12">
          <h4 class="r-h4">الأيام والفترات المتطوع بها </h4>

          <div class="col-xs-2">
            <label class="label label-green half"> الأيام</label>
          </div>
          <?php
          $allDayes = unserialize($value->dayes);
          foreach ($dayes as $key => $day) {
            $checked = '';
            if(in_array($key,$allDayes)) {
              $checked = 'checked';
            }
            ?>
            <input type="checkbox" disabled <?=$checked?>> <label><h6><?=$day?></h6></label>
            &emsp;&emsp;&emsp;
            <?php } ?>

            <div class="col-xs-2">
              <label class="label label-green half"> الفترات</label>
            </div>
            <?php
            $allPeriods = unserialize($value->period);
            foreach ($period as $key => $per) {
              $checked = '';
              if(in_array($key,$allPeriods)) {
                $checked = 'checked';
              }
              ?>
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
              <input type="checkbox" disabled <?=$checked?>> <label><h6><?=$per?></h6></label>
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
              <?php } ?>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <h4 class="r-h4"> </h4>
              <div class="form-group col-sm-6 col-xs-12">
                <label class="label label-green half">هل سبق  التطوع لدى جهة خيرية ؟ </label>
                <h4 class="form-control half input-style"><?=$answer[$value->another_charity]?></h4>
              </div>

              <div class="form-group col-sm-6 col-xs-12">
                <label class="label label-green half">الجهة</label>
                <h4 class="form-control half input-style"><?=$value->charity?></h4>
              </div>

              <div class="form-group col-sm-6 col-xs-12">
                <label class="label label-green half">هل لديه إعاقة ؟</label>
                <h4 class="form-control half input-style"><?=$answer[$value->having_disability]?></h4>
              </div>

              <div class="form-group col-sm-6 col-xs-12">
                <label class="label label-green half">الإعاقة</label>
                <h4 class="form-control half input-style"><?=$value->disability?></h4>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModals<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
            	<div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal">&times;</button>
                	<h4 class="modal-title">إجراء طلب المتطوع: <?=$value->name?></h4>
             	</div>
   				<form action="volunteerConfirm" method="post">
           			<div class="modal-body">
       					<div class="row" style="padding: 20px">
       						<div class="form-group">
								<label class="control-label">أذكر السبب</label>
								<textarea class="form-control" style="height: 100px" name="suspend_reason" data-validation="required"><?=$value->suspend_reason?></textarea>
							</div>
       					</div>
	               	</div>

	               	<input type="hidden" name="id" id="id" value="<?=$value->id?>">

 					<div class="modal-footer">
				      	<button type="submit" name="accept" value="2" class="btn btn-success">موافقة</button>

				      	<button type="submit" name="refuse" value="3" class="btn btn-danger">مرفوض</button>
				    </div>
				</form>
			</div>
		</div>
	</div>
<?php
	}
}
?>