<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            <div class="panel-body">
				<?php if(isset($table) && $table != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم السيارة</th>
                            <th>عدد المخالفات خلال الشهر</th>
                            <th>عدد الأعطال خلال الشهر</th>
                            <th>عدد أوامر الشغل خلال الشهر</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($table as $value) {
                        echo '<tr>
                              <td>'.($x++).'</td>
                              <td>'.$value->car_code.'</td>
                              <td>'.$value->count_vio.'</td>
                              <td>'.$value->count_crash.'</td>
                              <td>'.$value->count_orders.'</td>
                              </tr>';
                    }
                    ?>
                    </tbody>
                </table>
                <?php 
				} 
				else {
					echo '<div class="alert alert-danger">لا توجد سيارات مسجلة</div>';
				}
				?>
            </div>
        </div>
    </div>
</div>