<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>جدول البيانات</h4>
            </div>
        </div>

        <div class="panel-body">
			<div class="form-group col-sm-12 col-xs-12 no-padding">
				<?php 
				if (isset($records) && $records != null) {
          $member_gender = array(0=>'الأم', 1=>'إبن', 2=>'إبنة');
				?>
				<table id="example" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>الإسم </th>
							<th>الإسم الخدمة</th>
							<th>التفاصيل</th>
							<th>الإجراء</th>
                            	<th>الطباعه</th>
						</tr>
					</thead>
					</tr>
					<tbody>
						<?php 
						$x = 1;
            $service_name = 'خدمات عامة / دفع تكاليف السفر والرعاية الصحية';
            $mainServices=$service_id_fk;
						foreach ($records as $value) {
						?>
							<tr>
								<td><?=($x++)?></td>
								<td><?=$value->full_name?></td>
								<td><?=$service_name?></td>
								<td>
									<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
								</td>
								<td>
                  <a href="<?php echo base_url('services_orders/Services_orders/editServicesOrders').'/'.$mainServices.'/'.$value->order_num ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    
                  <a onclick="$('#adele').attr('href', '<?=base_url()."services_orders/Services_orders/delete/".$mainServices.'/'.$value->order_num?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>         
                </td>
                
                
<td><a target="_blank" href="<?php echo base_url();?>services_orders/Print_orders/health/<?php echo $value->mother_national_id_fk;?>"><i class="fa fa-print" aria-hidden="true"></a></td>

							</tr>
						<? } ?>
					</tbody>
				</table>
        <?php foreach ($records as $value) { ?>
        <div class="modal" id="myModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
          <div class="modal-dialog" role="document" style="width: 90%">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">تفاصيل الخدمة</h4>
                </div>
                <br>
                <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                  <div class="form-group col-sm-9 col-xs-12">
                      <table class="table table-bordered table-devices">
                        <tbody>
                          <tr>
                            <th class="gray_background" style="width: 25%;" >رقم الأسرة</th>
                            <td><?=$value->mother_national_id_fk?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                            <td><?=$service_name?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;" >الإسم</th>
                            <td>
                              <?php 
                              $x = 1;
                              foreach ($value->allchildrenWithMother as $child) {
                                $checked = '';
                                foreach ($value->selectedChildren as $selectChild) {
                                  if($child->type == 2 && $selectChild->child_id_fk == 0){
                                    $checked = 'checked';
                                    echo ($x++).'- '.$child->memberName.'<br>';
                                  }
                                  if($child->type == 1 && $selectChild->child_id_fk == $child->memberID) {
                                    $checked = 'checked';
                                    echo ($x++).'- '.$child->memberName.'<br>';
                                  }
                                } 
                              }
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;" >تاريخ السفر</th>
                            <td><?=$value->travel_date?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">عدد الايام</th>
                            <td><?=$value->days_num?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">جهة العلاج</th>
                            <td><?=$value->place?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">الملف المرفق</th>
                            <td>
                              <?php if($value->img) { ?>
                              <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>"><span><i class="fa fa-download"></i></span></a>
                              <? } ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                      <!--div class="form-group col-sm-12 col-xs-12">
                          <div class="btn-info">
                            <div class="btn-info col-sm-4">#</div>
                            <div class="btn-info col-sm-4">الإسم</div>
                            <div class="btn-info col-sm-4">التفاصيل</div>
                          </div>
                            <?php 
                            foreach ($value->allchildrenWithMother as $child) {
                              $checked = '';
                              foreach ($value->selectedChildren as $selectChild) {
                                if($child->type == 2 && $selectChild->child_id_fk == 0){
                                  $checked = 'checked';
                                }
                                if($child->type == 1 && $selectChild->child_id_fk == $child->memberID) {
                                  $checked = 'checked';
                                }
                              }
                            ?>
                            <div class="form-group col-sm-12 col-xs-12 no-padding">
                              <div class="col-sm-4 no-padding">
                                <input type="checkbox" class="Radiotype" <?=$checked?> disabled>
                              </div>
                              <div class="col-sm-4">
                                <?=$child->memberName?>
                              </div>
                              <div class="col-sm-4">
                                <?=$member_gender[$child->gender]?>
                              </div>
                            </div>
                            <? } ?>
                      </div>

                      <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green half">تاريخ السفر</label>
                        <h4 class="form-control half input-style"><?=$value->travel_date?></h4>
                      </div>

                      <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green half">عدد الايام</label>
                        <h4 class="form-control half input-style"><?=$value->days_num?></h4>
                      </div>

                      <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green half">جهة العلاج</label>
                        <h4 class="form-control half input-style"><?=$value->place?></h4>
                      </div-->
                  </div>

                  <div class="form-group col-sm-3 col-xs-12">
                    <div class="col-md-12 padd" style="height: 88px !important">
                      <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                      <label class="label label-green col-xs-12 no-margin">الإسم</label>
                      <h4 class="form-control"><?=$value->full_name?></h4>
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                      <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                      <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                      <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                      <h4 class="form-control"><?=$value->m_mob?></h4>
                    </div>
                  </div>
                </div>
                <div class="modal-footer" style="border-top: 0;">
                  <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
              </div>
            </div>
          </div>
				<?
          }
				}
				else {
					echo '<div class="alert alert-danger">لا توجد بيانات</div>';
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php echo die; ?>