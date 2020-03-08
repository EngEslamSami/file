<style type="text/css">
  .print_forma{
    border:1px solid ;
    padding: 15px;
  }
  .print_forma table th{
    text-align: right;
  }
  .print_forma table tr th{
    vertical-align: middle;
  }
  .body_forma{
    margin-top: 40px;
  }
  .no-padding{
    padding: 0;
  }
  .heading{
    font-weight: bold;
    text-decoration: underline;
  }
  .print_forma hr{
    border-top: 1px solid #000;
    margin-top: 7px;
    margin-bottom: 7px;
  }
  .myinput.large{
    height:22px;
    width: 22px;
  }
  .myinput.large[type="checkbox"]:before{
    width: 20px;
    height: 20px;
  }
  .myinput.large[type="checkbox"]:after{
    top: -20px;
    width: 16px;
    height: 16px;
  }
  .checkbox-statement span{
    margin-right: 3px;
    position: absolute;
    margin-top: 5px;
  }
  .header p{
    margin: 0;
  }
  .header img{
    height: 90px;
  }
  .no-border{
    border:0 !important;
  }
  .table-devices tr td{
    width: 50%;
    min-height: 20px
  }
  .gray_background{
    background-color: #eee;
  }
  table.th-no-border th,
  table.th-no-border td
  {
    border-top: 0 !important;
  }
</style>

<style type="text/css">
  .padd {padding: 0 3px !important;}
  .no-padding {padding: 0;}
  .no-margin {margin: 0;}
  h4 {margin-top: 0;}
</style>

<?php
$tables_new = array(2=>'marriage_help_new', 3=>'medical_center_new', 4=>'electronic_card_new', 5=>'', 6=>'electrical_device_order_new', 7=>'maintenance_electrical_device_order_new', 8=>'furniture_order_new', 9=>'electrical_fatora_order_new', 10=>'water_fatora_order_new', 11=>'haj_new', 12=>'omra_new', 13=>'home_repairs_order_new', 14=>'restore_repairs_order_new', 15=>'cars_repairs_order_new', 16=>'health_care_orders_new', 17=>'insurance_medical_device_orders_new', 18=>'school_supplies_order_new');

$tables_accept = array(2=>'marriage_help_accept', 3=>'medical_center_accept', 4=>'electronic_card_accept', 5=>'', 6=>'electrical_device_order_accept', 7=>'maintenance_electrical_device_order_accept', 8=>'furniture_order_accept', 9=>'electrical_fatora_order_accept', 10=>'water_fatora_order_accept', 11=>'haj_accept', 12=>'omra_accept', 13=>'home_repairs_order_accept', 14=>'restore_repairs_order_accept', 15=>'cars_repairs_order_accept', 16=>'health_care_orders_accept', 17=>'insurance_medical_device_orders_accept', 18=>'school_supplies_order_accept');

$tables_refused = array(2=>'marriage_help_refused', 3=>'medical_center_refused', 4=>'electronic_card_refused', 5=>'', 6=>'electrical_device_order_refused', 7=>'maintenance_electrical_device_order_refused', 8=>'furniture_order_refused', 9=>'electrical_fatora_order_refused', 10=>'water_fatora_order_refused', 11=>'haj_refused', 12=>'omra_refused', 13=>'home_repairs_order_refused', 14=>'restore_repairs_order_refused', 15=>'cars_repairs_order_refused', 16=>'health_care_orders_refused', 17=>'insurance_medical_device_orders_refused', 18=>'school_supplies_order_refused');

$tables = array(2=>'marriage_help', 3=>'medical_center', 4=>'electronic_card', 5=>'', 6=>'electrical_device_order', 7=>'maintenance_electrical_device_order', 8=>'furniture_order', 9=>'electrical_fatora_order', 10=>'water_fatora_order', 11=>'haj_omra_order', 12=>'haj_omra_order', 13=>'home_repairs_order', 14=>'restore_repairs_order', 15=>'cars_repairs_order', 16=>'health_care_orders', 17=>'insurance_medical_device_orders', 18=>'school_supplies_order');
?>
<div class="col-md-12 ">
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
            <li class="active"><a href="#tab0default" data-toggle="tab">طلبات الأسر الواردة</a></li>
            <li><a href="#tab1default" data-toggle="tab">طلبات الأسر الموافق عليها</a></li>
            <li><a href="#tab2default" data-toggle="tab">طلبات الأسر المرفوضة</a></li>
          </ul>
        </div>

        <div class="panel-body">
          <div class="tab-content">
            <div class="tab-pane fade in active" id="tab0default">
              <?php
              foreach ($tables_new as $key => $value) {
                if(isset($$tables_new[$key]) && $$tables_new[$key] != null) {
                  ?>
                  <div class="col-md-6 col-sm-6">
                    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                      <div class="panel-heading">
                        <h3 class="panel-title"><?=$categories[$key]->title?></h3>
                      </div>
                      <div class="panel-body">
                        <table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                          <tr class="info">
                            <th>م</th>
                            <th>الإسم</th>
                            <th>التفاصيل</th>
                            <th>الإجراء</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          $x = 1;
                          foreach ($$tables_new[$key] as $record) {
                            ?>
                            <tr>
                              <td><?=($x++)?></td>
                              <td><?=$record->full_name?></td>
                              <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?='marriage_help'.$record->id?>"><span class="fa fa-list"></span> التفاصيل</button>
                              </td>
                              <td>
                                <a data-toggle="modal" data-target="#myModalaccept-<?=$tables_new[$key]."-".$key."-".$record->id?>" class="btn btn-xs btn-success" title="موافق" >
                                  <span class="fa fa-check-square-o"></span> </a>
                                <a  data-toggle="modal" data-target="#myModalrefuse-<?=$tables_new[$key]."-".$key."-".$record->id?>" class="btn btn-xs btn-danger"  title="رفض" >
                                  <span class="fa fa-window-close-o"></span> </a>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?
                }
              }
              ?>
            </div>

            <div class="tab-pane fade" id="tab1default">
              <?php
              foreach ($tables_accept as $key => $value) {
                if(isset($$tables_accept[$key]) && $$tables_accept[$key] != null) {
                  ?>
                  <div class="col-md-6 col-sm-6 fadeInUp wow">
                    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                      <div class="panel-heading">
                        <h3 class="panel-title"><?=$categories[$key]->title?></h3>
                      </div>
                      <div class="panel-body">
                        <table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                          <tr class="info">
                            <th>م</th>
                            <th>الإسم</th>
                            <th>التفاصيل</th>
                            <th>الإجراء</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          $x = 1;
                          foreach ($$tables_accept[$key] as $record) {
                            ?>
                            <tr>
                              <td><?=($x++)?></td>
                              <td><?=$record->full_name?></td>
                              <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?='marriage_help'.$record->id?>"><span class="fa fa-list"></span> التفاصيل</button>
                              </td>
                              <td>
                                <!--  <a data-toggle="modal" data-target="#myModalaccept-<?=$tables_new[$key]."-".$key."-".$record->id?>" class="btn btn-xs btn-success" title="موافق" >
                                <span class="fa fa-check-square-o"></span> </a> -->
                                <a  data-toggle="modal" data-target="#myModalonlyrefuse-<?=$tables_new[$key]."-".$key."-".$record->id?>" class="btn btn-xs btn-danger"  title="رفض" >
                                  <span class="fa fa-window-close-o"></span> </a>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?
                }
              }
              ?>
            </div>

            <div class="tab-pane fade" id="tab2default">
              <?php
              foreach ($tables_refused as $key => $value) {
                if(isset($$tables_refused[$key]) && $$tables_refused[$key] != null) {
                  ?>
                  <div class="col-md-6 col-sm-6 fadeInUp wow">
                    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                      <div class="panel-heading">
                        <h3 class="panel-title"><?=$categories[$key]->title?></h3>
                      </div>
                      <div class="panel-body">
                        <table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                          <tr class="info">
                            <th>م</th>
                            <th>الإسم</th>
                            <th>التفاصيل</th>
                            <th>الإجراء</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          $x = 1;
                          foreach ($$tables_refused[$key] as $record) {
                            ?>
                            <tr>
                              <td><?=($x++)?></td>
                              <td><?=$record->full_name?></td>
                              <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?='marriage_help'.$record->id?>"><span class="fa fa-list"></span> التفاصيل</button>
                              </td>
                              <td>
                                <a data-toggle="modal" data-target="#myModalonlyaccept-<?=$tables_new[$key]."-".$key."-".$record->id?>" class="btn btn-xs btn-success" title="موافق" >
                                  <span class="fa fa-check-square-o"></span> </a>
                                <!--  <a  data-toggle="modal" data-target="#myModalrefuse-<?=$tables_new[$key]."-".$key."-".$record->id?>" class="btn btn-xs btn-danger"  title="رفض" >
                                <span class="fa fa-window-close-o"></span> </a> -->
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<?php
foreach ($tables as $key => $value) {
  if(isset($$tables[$key]) && $$tables[$key] != null) {
    $files = array('بطاقة العائلة '=>'family_card','عقد النكاح  '=>'identity_img','صورة الهوية  '=>'marriage_contract','الصورة الشخصية  '=>'personal_picture','عقد القاعة '=>'hall_contract','تعريف بالراتب '=>'salary_definition','تزكية الامام  '=>'imam_recommendation');
    $answer = array(1=>'نعم',2=>'لا');
    $type = array(1=>'هوية وطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر');
    $service_name = 'مساعدة زواج';
    foreach ($$tables[$key] as $value) {
      ?>
<div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
                    <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                    <td><?=$service_name?></td>
                  </tr>
                  <tr>
                    <th class="gray_background" style="width: 25%;" >الإسم</th>
                    <td><?=$value->member_full_name?></td>
                    <th class="gray_background" style="width: 25%;" >المدينة</th>
                    <td><?=$value->area?></td>
                  </tr>
                  <tr>
                    <th class="gray_background" style="width: 25%;">مكان الزواج</th>
                    <td><?=$value->place?></td>
                    <th class="gray_background" style="width: 25%;">تاريخ الزواج</th>
                    <td><?=$value->marriage_date?></td>
                  </tr>
                  <tr>
                    <th class="gray_background" style="width: 25%;">رقم العقد</th>
                    <td><?=$value->contract_number?></td>
                    <th class="gray_background" style="width: 25%;">تاريخ العقد</th>
                    <td><?=$value->contract_date?></td>
                  </tr>
                  <tr>
                    <th class="gray_background" style="width: 25%;">جهة اصدار العقد</th>
                    <td><?=$value->contract_source?></td>
                    <th class="gray_background" style="width: 25%;">قيمة المهر</th>
                    <td><?=$value->dowry_cost?></td>
                  </tr>
                  <tr>
                    <th class="gray_background" style="width: 25%;">جنسية الزوجة</th>
                    <td><?=$value->nationality?></td>
                    <th class="gray_background" style="width: 25%;">رقم هوية الزوجة</th>
                    <td><?=$value->national_id?></td>
                  </tr>
                  <tr>
                    <th class="gray_background" style="width: 25%;">نوع هوية الزوجة</th>
                    <td><?=$type[$value->national_type]?></td>
                    <th class="gray_background" style="width: 25%;">الزواج لاول مرة</th>
                    <td><?=$answer[$value->first_marriage]?></td>
                  </tr>
                  <tr>
                    <th class="gray_background" style="width: 25%;">رقم الجوال</th>
                    <td><?=$value->mobile?></td>
                    <th class="gray_background" style="width: 25%;"></th>
                    <td></td>
                  </tr>
                  <?php
      $x = 1;
      foreach ($files as $key => $value2) {
        if($x % 2 != 0) {
          echo '</tr>';
        }
        ?>
                    <th class="gray_background" style="width: 25%;"><?=$key?></th>
                    <td>
                      <?php if($value->$value2) { ?>
                      <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->$value2?>"><span><i class="fa fa-download"></i></span></a>
                      <? } ?>
                    </td>
                  <?php
        if($x % 2 == 0) {
          echo '</tr>';
        }
        $x++;
      }
      ?>
                </tbody>
              </table>
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
}
?>

-->


<?php
foreach ($tables_new as $key => $value) {
  if(isset($$tables_new[$key]) && $$tables_new[$key] != null) {
    ?>

    <?php
    $x = 1;
    foreach ($$tables_new[$key] as $record) {
      ?>
      <div class="modal fade" id="myModalaccept-<?=$tables_new[$key]."-".$key."-".$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">   موافقة </h4>
            </div>
            <?php  echo form_open_multipart("services_orders/Services_approved/ApprovedOpration/".$tables_new[$key]."/".$key."/".$record->id."/1")?>
            <div class="modal-body">
              <div class="row" style="padding: 20px">
                <div class="form-group">
                  <label class="control-label">أذكر السبب</label>
                  <textarea class="form-control" style="height: 100px" name="reason" required></textarea>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
              <button type="submit" name="action" value="action" class="btn btn-success">جفظ</button>

            </div>
            <?php echo form_close()?>
          </div>
        </div>
      </div>
      <div class="modal fade" id="myModalrefuse-<?=$tables_new[$key]."-".$key."-".$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">   رفض </h4>
            </div>
            <?php  echo form_open_multipart("services_orders/Services_approved/ApprovedOpration/".$tables_new[$key]."/".$key."/".$record->id."/2")?>
            <div class="modal-body">
              <div class="row" style="padding: 20px">
                <div class="form-group">
                  <label class="control-label">أذكر السبب</label>
                  <textarea class="form-control" style="height: 100px" name="reason" required></textarea>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
              <button type="submit" name="action" value="action" class="btn btn-success">جفظ</button>

            </div>
            <?php echo form_close()?>
          </div>
        </div>
      </div>
    <?php } ?>
    <?
  }
}
?>


<?php
foreach ($tables_accept as $key => $value) {
  if(isset($$tables_accept[$key]) && $$tables_accept[$key] != null) {
    ?>
    <?php
    $x = 1;
    foreach ($$tables_accept[$key] as $record) {
      ?>
      <div class="modal fade" id="myModalonlyrefuse-<?=$tables_new[$key]."-".$key."-".$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">   رفض </h4>
            </div>
            <?php  echo form_open_multipart("services_orders/Services_approved/ApprovedOpration/".$tables_new[$key]."/".$key."/".$record->id."/2")?>
            <div class="modal-body">
              <div class="row" style="padding: 20px">
                <div class="form-group">
                  <label class="control-label">أذكر السبب</label>
                  <textarea class="form-control" style="height: 100px" name="reason" required></textarea>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
              <button type="submit" name="action" value="action" class="btn btn-success">جفظ</button>

            </div>
            <?php echo form_close()?>
          </div>
        </div>
      </div>

    <?php } ?>
    <?
  }
}
?>


<?php
foreach ($tables_refused as $key => $value) {
  if(isset($$tables_refused[$key]) && $$tables_refused[$key] != null) {
    ?>
    <?php
    $x = 1;
    foreach ($$tables_refused[$key] as $record) {
      ?>

      <div class="modal fade" id="myModalonlyaccept-<?=$tables_new[$key]."-".$key."-".$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">   موافقة </h4>
            </div>
            <?php  echo form_open_multipart("services_orders/Services_approved/ApprovedOpration/".$tables_new[$key]."/".$key."/".$record->id."/1")?>
            <div class="modal-body">
              <div class="row" style="padding: 20px">
                <div class="form-group">
                  <label class="control-label">أذكر السبب</label>
                  <textarea class="form-control" style="height: 100px" name="reason" required></textarea>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
              <button type="submit" name="action" value="action" class="btn btn-success">جفظ</button>

            </div>
            <?php echo form_close()?>
          </div>
        </div>
      </div>



    <?php } ?>
    <?
  }
}
?>
