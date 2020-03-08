<style type="text/css">
.padd {padding: 0 15px !important;}
.no-padding {padding: 0;}
h4 {margin-top: 0;}
</style>

<div class="col-sm-12 col-md-12 col-xs-12">
  <div class="col-sm-2 col-md-2 col-xs-2">
    <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Volunteers/Volunteers/new_volunteer';"><i class="fa fa-plus"></i> إضافة متطوع/ـه</button>
  </div>

  <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <br>
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <div class="panel-heading">
        <h3 class="panel-title">المتطوعين</h3>
      </div>
      <div class="panel-body">
        <?php 
        if(isset($volunteers) && $volunteers != null) { 
          $dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
          $period = array('الصباح','المساء');
          $answer = array(1=>'نعم',2=>'لا');
        ?>
          <table id="example" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="info">
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
              foreach ($volunteers as $value) { 
                ?>
                <tr>
                  <td><?=($x++)?></td>
                  <td><?=$value->name?></td>
                  <td><?=$value->mobile?></td>
                  <td><?=$value->address?></td>
                  <td><?=$value->email?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
                  </td>
                  <td>
                    <a href="<?php echo base_url('Volunteers/Volunteers/print_volunteer').'/'.$value->id ?>" title="طباعة"> <i class="fa fa-print" aria-hidden="true"></i> </a>

                    <a href="<?php echo base_url('Volunteers/Volunteers/edit_volunteer').'/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    
                    <a onclick="$('#adele').attr('href', '<?=base_url()."Volunteers/Volunteers/delete/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
                  </td>
                </tr>
                <div class="modal" id="myModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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