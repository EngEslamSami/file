<style type="text/css">
.padd {padding: 0 15px !important;}
.no-padding {padding: 0;}
h4 {margin-top: 0;}
</style>

<div class="col-sm-12 col-md-12 col-xs-12">
  <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <br>
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <div class="panel-heading">
        <h3 class="panel-title">طلبات التوظيف</h3>
      </div>
      <div class="panel-body">
        <?php 
        if(isset($jobs) && $jobs != null) { 
          $qualification = array('ثانوية','متوسطة','إبتدائي','دبلوم','بكالوريوس','ماجستير','دكتوراة','دون سن التعليم','منقطع');
          $gender = array('ذكر','أنثى');
          $social_status = array('أعزب','متزوج');
        ?>
          <table id="example" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="info">
                <th>م</th>
                <th>الإسم</th>
                <th>المسمى الوظيفي</th>
                <th>رقم الجوال</th>
                <th>الملف</th>
                <th>التفاصيل</th>
                <th>الإجراء</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $x = 1;
              foreach ($jobs as $value) { 
                ?>
                <tr>
                  <td><?=($x++)?></td>
                  <td><?=$value->name?></td>
                  <td><?=$value->title?></td>
                  <td><?=$value->mobile?></td>
                  <td>
                    <a href="<?=base_url().'Jobs/Jobs/downloads/'.$value->cv?>" hint="تحميل"><i class="fa fa-download"></i></a>
                    <span></span>
                    <a href="<?=base_url().'Jobs/Jobs/read_file/'.$value->cv?>"  target="_blank" hint="قراءة الملف"><i class="fa fa-eye"></i></a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
                  </td>
                  <td>
                    <a onclick="$('#adele').attr('href', '<?=base_url()."Jobs/Jobs/delete/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
                  </td>
                </tr>
                <div class="modal" id="myModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                  <div class="modal-dialog" role="document" style="width: 90%">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تفاصيل طلب وظيفة بإسم(<?=$value->title?>)</h4>
                      </div>

                      <div class="modal-body">
                        <div class="form-group col-sm-12 col-xs-12">
                          <h4 class="r-h4">البيانات الشخصية</h4>
                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">الإسم </label>
                            <h4 class="form-control half input-style"><?=$value->name?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">رقم الهوية </label>
                            <h4 class="form-control half input-style"><?=$value->id_card?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">تاريخ انتهاء </label>
                            <h4 class="form-control half input-style"><?=$value->expire_date?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">تاريخ الميلاد</label>
                            <h4 class="form-control half input-style"><?=$value->birth_date?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">النوع </label>
                            <h4 class="form-control half input-style"><?=$gender[$value->gender]?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">الهاتف </label>
                            <h4 class="form-control half input-style"><?=$value->phone?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">الجوال </label>
                            <h4 class="form-control half input-style"><?=$value->mobile?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">الجنسية </label>
                            <h4 class="form-control half input-style"><?=$value->nationality?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">الحالة الاجتماعية </label>
                            <h4 class="form-control half input-style"><?=$social_status[$value->social_status]?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">المنطقة </label>
                            <h4 class="form-control half input-style"><?=$value->zoon?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">الحي السكني </label>
                            <h4 class="form-control half input-style"><?=$value->neighborhood?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">البريد الإلكتروني </label>
                            <h4 class="form-control half input-style"><?=$value->email?></h4>
                          </div>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                          <h4 class="r-h4">الدرجة العلمية والتخصصات</h4>
                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">المؤهل العلمي </label>
                            <h4 class="form-control half input-style"><?=$qualification[$value->qualification]?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">التخصص </label>
                            <h4 class="form-control half input-style"><?=$value->specialization?></h4>
                          </div>

                          <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green half">الخبرات </label>
                            <h4 class="form-control half input-style"><?=$value->experience?></h4>
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