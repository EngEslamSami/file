<?php

$father=$all_orders_comming[0]->father;
$result=$all_orders_comming[0]->mother;


?>
<style>
    td .btn-danger i,td .btn-success i{
        color: #fff;
    }
</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#coming" data-toggle="tab">بنود إضافة اللجنة الواردة</a></li>
                <li><a href="#accepted" data-toggle="tab">بنود إضافة اللجنة الموافق عليها</a></li>
                <li><a href="#refused" data-toggle="tab">بنود إضافة اللجنة المرفوضة</a></li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="coming">
                    <div class="panel-body">
                        <br>
                  <?php if(!empty($coming)){ ?>
                  <table id = "" class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                       <thead>
                                           <tr>
                                               <th class="text-center"> م</th >
                                               <th class="text-center"> رقم الأسرة</th >
                                               <th class="text-center">نوع العملية</th >
                                               <th class="text-center"> التفاصيل</th >
                                               <th class="text-center"> الإجراء</th >
                                           </tr>
                                       </thead>
                                      <tbody>
                                      <?php $x=1;foreach($all_orders_comming as $record){?>
                                      <tr>
                                          <td class="text-center"><?php echo $x;?></td>
                                          <td class="text-center"><?php echo $record->mother_national_num;?></td>
                                          <td class="text-center"><?php echo $record->title;?></td>
                                          <td class="text-center">
                                              <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                      data-target="#myModal<?= $record->id ?>">التفاصيل
                                              </button>

                                          </td>
                                          <td class="text-center">
                                              <button type="button" class="btn btn-success  btn-xs " onclick="getApproved(1,<?php echo $record->id;?>)"><i class="glyphicon glyphicon-ok"></i></button>
                                              <button type="button" class="btn btn-danger  btn-xs " onclick="getApproved(2,<?php echo $record->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                          </td>
                                      </tr>
                                </tbody>
                     </table>
                          <?php
                          foreach($all_orders_comming as $row) {
                          ?>


                          <div class="modal" id="myModal<?= $row->id ?>" tabindex="-1" role="dialog"
                          aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                          <div class="modal-dialog" role="document" style="width: 100%;height: 50%">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                              aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">اجتماع اللجنه بشأن:-</h4>

                                      <h5 class="line-text" style="color:red"><?php echo $row->title;?></h5>
                                      <h5 class="line-text" style="font-size: 15px">خاصه الاسره  رقم </h5>
                                      <h5 class="line-text" style="color:red">( <?php echo $row->mother_national_num;?> )</h5>

                                      <ul class="nav nav-tabs" role="tablist" style="background-color: #c1e2ff;">
                                          <li role="presentation" class="active"><a href="#tab_forma1"
                                                                                    aria-controls="tab_forma1"
                                                                                    role="tab" data-toggle="tab">بيانات الام
                                              </a></li>
                                          <li role="presentation"><a href="#tab_forma2" aria-controls="tab_forma2"
                                                                     role="tab" data-toggle="tab"> بيانات الاب </a>
                                          </li>
                                          <li role="presentation"><a href="#tab_forma3" aria-controls="tab_forma3"
                                                                     role="tab" data-toggle="tab">بيانات ابناء الاسره
                                                  الماليه </a></li>
                                          <li role="presentation"><a href="#tab_forma4" aria-controls="tab_forma4"
                                                                     role="tab" data-toggle="tab">بيانات السكن</a></li>
                                          <li role="presentation"><a href="#tab_forma5" aria-controls="tab_forma5"
                                                                     role="tab" data-toggle="tab"> بيانات الاجهزه</a></li>
                                          <li role="presentation"><a href="#tab_forma6" aria-controls="tab_forma6"
                                                                     role="tab" data-toggle="tab"> احتياجات المنزل</a></li>
                                          <li role="presentation"><a href="#tab_forma7" aria-controls="tab_forma7"
                                                                     role="tab" data-toggle="tab"> بيانات الماليه</a></li>
                                      </ul>
                                  </div>
                                  <div class="modal-body">
                                      <div class="tab-content">


                                          <div role="tabpanel" class="tab-pane fade in active" id="tab_forma1">
                                              <?php
                                              if(isset($result)&&!empty($result)){
                                                  ?>



                                                  <div class="col-md-12" >
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">رقم السجل المدني للأم<strong
                                                                  class="astric">*</strong> </label>
                                                          <input type="text" name="" readonly="" data-validation="required"
                                                                 value="<?php echo $result->mother_national_num_fk ?>"
                                                                 class="form-control half input-style"/>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong>
                                                          </label>
                                                          <input type="number" name="m_national_id" readonly=""
                                                                 data-validation="number" id="f_national_id"
                                                                 value="<?php echo $result->m_national_id ?>"
                                                                 class="form-control half input-style"/>
                                                <span id="validate1" style="font-size: 11px;"
                                                      class="help-block col-xs-6"> </span>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half"> الاسم الرباعي <strong
                                                                  class="astric">*</strong> </label>
                                                          <input type="text" name="fullname" readonly=""
                                                                 data-validation="required"
                                                                 value="<?php echo $result->full_name ?>"
                                                                 class="form-control half input-style"/>
                                                      </div>
                                                  </div>





                                                  <div class="col-md-12" >
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">تاريخ الميلاد<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly=""
                                                                 class="form-control docs-date half input-style "
                                                                 data-validation="required" name="m_birth_date"
                                                                 value="<?php echo $result->m_birth_date_hijri ?>"/>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">الحالة الإجتماعية<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select name="m_marital_status_id_fk" disabled="disabled"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">

                                                              <option value="">اختر</option>
                                                              <?php //$marital_status_array =array('1'=>'متزوجة','2'=>'مطلقة','3'=>'أرملة','4'=>'متوفي');
                                                              foreach ($marital_status_array as $row6):
                                                                  $selected = '';
                                                                  if ($row6->id_setting == $result->m_marital_status_id_fk) {
                                                                      $selected = 'selected';
                                                                  } ?>
                                                                  <option
                                                                      value="<?php echo $row6->id_setting; ?>" <?php echo $selected ?> ><?php echo $row6->title_setting; ?></option>
                                                              <?php endforeach; ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">الجنسية<strong
                                                                  class="astric">*</strong><strong></strong> </label>

                                                          <select name="m_nationality" disabled="disabled" id="m_nationality"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">
                                                              <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                                                                  <option value="">اختر</option>

                                                                  <?php foreach ($nationality as $record):

                                                                      $selected = '';
                                                                      if ($record->id_setting == $result->m_nationality) {
                                                                          $selected = 'selected';
                                                                      } ?>
                                                                      <option
                                                                          value="<?php echo $record->id_setting; ?>" <?php echo $selected ?> ><?php echo $record->title_setting; ?></option>
                                                                  <?php endforeach; ?>
                                                                  <option
                                                                      value="0"<?php if ($result->m_nationality == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                              <?php } else {
                                                                  ?>
                                                                  <option value="" selected>اختر</option>
                                                                  <option
                                                                      value="0"<?php if ($result->m_nationality == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                                  <?php
                                                              }
                                                              ?>
                                                          </select>

                                                      </div>
                                                  </div>



                                                  <div class="col-md-12" >

                                                      <div class="form-group col-sm-4 col-xs-12" <?php if ($result->nationality_other == "") { ?> style="display: none;" <?php } ?>>
                                                          <label class="label label-green  half"> اسم الجنسيه الاخري<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="nationality_other"
                                                                 id="nationality_other" data-validation="required"
                                                                 value="<?php echo $result->nationality_other ?>"
                                                                 class="form-control half input-style" <?php if ($result->nationality_other == "") { ?> disabled=""<?php } ?>/>

                                                      </div>




                                                      <div class="form-group col-sm-4 col-xs-12" <?php if ($result->m_living_place == "") { ?> style="display: none;" <?php } ?>>
                                                          <label class="label label-green  half"> محل السكن<strong class="astric">*</strong><strong></strong>
                                                          </label>
                                                          <input type="text" name="m_living_place" readonly id="m_living_place"
                                                                 data-validation="required"
                                                                 value="<?php echo $result->m_living_place ?>"
                                                                 class="form-control half input-style" <?php if ($result->m_living_place == "") { ?> disabled=""<?php } ?> />

                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half"> نوع الهويه<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select name="m_national_id_type" disabled="disabled"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">
                                                              <option value="">اختر</option>
                                                              <?php

                                                              foreach ($national_id_array as $row2):
                                                                  $selected = '';
                                                                  if ($row2->id_setting == $result->m_national_id_type) {
                                                                      $selected = 'selected';
                                                                  } ?>
                                                                  <option
                                                                      value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                                              <?php endforeach; ?>
                                                          </select>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">الحالة الصحية<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select name="m_health_status_id_fk" disabled="disabled"
                                                                  id="m_health_status_id_fk"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">
                                                              <option value="">اختر</option>
                                                              <?php
                                                              //$health_status_array =array('1'=>'جيد','2'=>'معاق','3'=>'مريض','4'=>'متوفي');
                                                              foreach ($health_status_array as $row3):
                                                                  $selected = '';
                                                                  if ($row3->id_setting == $result->m_health_status_id_fk) {
                                                                      $selected = 'selected';
                                                                  } ?>
                                                                  <option
                                                                      value="<?php echo $row3->id_setting; ?>" <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                                              <?php endforeach; ?>
                                                          </select>
                                                      </div>


                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">المهارة<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" name="m_skill_name" readonly data-validation="required"
                                                                 value="<?php echo $result->m_skill_name ?>"
                                                                 class="form-control half input-style"/>

                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >

                                                      <div class="form-group col-sm-4 col-xs-12" id="death_reason">
                                                          <label class="label label-green  half">سبب الوفاة<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select disabled="disabled" name="death_reason" id="death_reason_id"
                                                                  class="selectpicker col-xs-4  no-padding " data-show-subtext="true"
                                                                  data-live-search="true" data-validation="required"
                                                                  aria-required="true">
                                                              <option>اختر</option>
                                                              <?php
                                                              $death_reason_array = array('1' => 'طبيعية', '2' => 'حادث', '3' => 'مرض', '4' => 'مقتول', '0' => 'أخري');
                                                              foreach ($death_reason_array as $k => $v):
                                                                  $selected = '';
                                                                  if ($k == $result->death_reason) {
                                                                      $selected = 'selected';
                                                                  } ?>
                                                                  <option
                                                                      value="<?php echo $k; ?>" <?php echo $selected ?> ><?php echo $v; ?></option>
                                                              <?php endforeach; ?>
                                                          </select>
                                                          <input type="text" readonly name="other_death_reason"
                                                                 class="form-control col-xs-5 no-padding" placeholder="أخري"
                                                                 style="width: 16%" id="death_reason_other" disabled="">

                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">إسم الوكيل<strong class="astric">*</strong><strong></strong>
                                                          </label>
                                                          <input type="text" name="representative_name" readonly
                                                                 value="<?php echo $result->representative_name ?>"
                                                                 class="form-control half input-style"/>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">عمر الوكيل<strong class="astric">*</strong><strong></strong>
                                                          </label>
                                                          <input type="number" readonly name="representative_age"
                                                                 value="<?php echo $result->representative_age ?>"
                                                                 class="form-control half input-style"/>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >

                                                      <div class="form-group col-sm-4 col-xs-12">

                                                          <label class="label label-green  half">صلة القرابة<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="representative_relative"
                                                                 value="<?php echo $result->representative_relative ?>"
                                                                 class="form-control half input-style"/>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">رقم الجوال<strong class="astric">*</strong><strong></strong>
                                                          </label>
                                                          <input type="number" readonly name="representative_phone"
                                                                 value="<?php echo $result->representative_phone ?>"
                                                                 class="form-control half input-style"/>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">المهنة<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select disabled="disabled" name="m_job_id_fk" id="job"
                                                                  class="selectpicker no-padding form-control choose-date form-control half "
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">
                                                              <option value="">اختر</option>
                                                              <?php
                                                              foreach ($job_titles as $job):
                                                                  $selected = '';
                                                                  if ($job->id_setting == $result->m_job_id_fk) {
                                                                      $selected = 'selected';
                                                                  } ?>
                                                                  <option
                                                                      value="<?php echo $job->id_setting; ?>" <?php echo $selected ?> ><?php echo $job->title_setting; ?></option>
                                                              <?php endforeach; ?>
                                                              <option value="0">أخري</option>
                                                          </select>

                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">الدخل الشهرى<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="number" readonly step="any" name="m_monthly_income"
                                                                 data-validation="" value="<?php echo $result->m_monthly_income; ?>"
                                                                 id="mo-income" class="form-control half input-style"/>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">

                                                          <label class="label label-green  half">المستوى التعليمى <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select disabled="disabled" name="m_education_level_id_fk" id="educate"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-validation="required"
                                                                  data-live-search="true">
                                                              <option value="">اختر</option>

                                                              <?php
                                                              foreach ($education_level_array as $row4):
                                                                  $selected = '';
                                                                  if ($row4->id_setting == $result->m_education_level_id_fk) {
                                                                      $selected = 'selected';
                                                                  } ?>
                                                                  <option
                                                                      value="<?php echo $row4->id_setting; ?>" <?php echo $selected ?> ><?php echo $row4->title_setting; ?></option>
                                                              <?php endforeach; ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">

                                                          <label class="label label-green  half">التخصص <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="m_specialization"
                                                                 value="<?php echo $result->m_specialization ?>" id="special"
                                                                 class="form-control half input-style"/>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">الحالة الدراسية <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select disabled="disabled" name="m_education_status_id_fk"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-validation="required"
                                                                  aria-required="true" data-live-search="true">
                                                              <option value="">اختر</option>
                                                              <?php
                                                              foreach ($arr_ed_state as $row5) {
                                                                  $selected = '';
                                                                  if ($row5->id_setting == $result->m_education_status_id_fk) {
                                                                      $selected = 'selected';
                                                                  } ?>
                                                                  <option
                                                                      value="<?php echo $row5->id_setting; ?>" <?php echo $selected ?> ><?php echo $row5->title_setting; ?></option>

                                                              <?php } ?>
                                                          </select>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">ملتحقة بدار نسائية<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select disabled="disabled" name="m_female_house_check" id="eldar"
                                                                  class="selectpicker no-padding form-control choose-date form-control half "
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">
                                                              <option value="">اختر</option>
                                                              <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                                                  $selected = '';
                                                                  if ($r == $result->m_female_house_check) {
                                                                      $selected = 'selected';
                                                                  }
                                                                  ?>
                                                                  <option
                                                                      value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                                              <?php } ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">

                                                          <label class="label label-green  half">اسم الدار <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="m_female_house_name"
                                                                 data-validation="required" <?php if ($result->m_female_house_name == "") { ?> disabled=""<?php } ?>
                                                                 value="<?php echo $result->m_female_house_name ?>"
                                                                 id="m_female_house_name" class="form-control half input-style"/>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >


                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">رقم الجوال <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="number" readonly name="m_mob"
                                                                 value="<?php echo $result->m_mob; ?>"
                                                                 class="form-control half input-style" data-validation="required"/>
                                                      </div>
                                                      <?php
                                                      if ($result->m_want_work == 1) {
                                                          $val = "نعم";
                                                      } else {
                                                          $val = "لا";
                                                      }
                                                      if ($result->m_hijri == 1) {
                                                          $val = "نعم";
                                                      } else {
                                                          $val = "لا";
                                                      }
                                                      if ($result->m_ommra == 1) {
                                                          $val = "نعم";
                                                      } else {
                                                          $val = "لا";
                                                      }
                                                      ?>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">رقم جوال أخر <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="number" readonly name="m_another_mob"
                                                                 value="<?php echo $result->m_another_mob ?>"
                                                                 class="form-control half input-style" data-validation="required"/>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">البريد الإلكترونى <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="email" readonly name="m_email"
                                                                 value="<?php echo $result->m_email ?>"
                                                                 class="form-control half input-style" data-validation="required"/>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">الرغيه ف العمل <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="email" readonly name="m_email" value="<?php echo $val; ?>"
                                                                 class="form-control half input-style" data-validation="required"/>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">

                                                          <label class="label label-green  half">اداء فريضه الحج <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="m_female_house_name"
                                                                 data-validation="required" value="<?php echo $val ?>"
                                                                 id="m_female_house_name" class="form-control half input-style"/>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">

                                                          <label class="label label-green  half">اداء فريضه العمره <strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="m_female_house_name"
                                                                 data-validation="required" value="<?php echo $val ?>"
                                                                 id="m_female_house_name" class="form-control half input-style"/>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" >
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">السكن<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select name="m_living_place_id_fk" id="living_place_id"
                                                                  disabled="disabled"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="" data-live-search=""
                                                                  data-validation="required" aria-required="true">
                                                              <?php if (isset($living_place_array) && $living_place_array != null && !empty($living_place_array)) { ?>
                                                                  <option value="">اختر</option>
                                                                  <?php
                                                                  foreach ($living_place_array as $row):
                                                                      $selectedx = '';
                                                                      if ($row->id_setting == $result->m_living_place_id_fk) {
                                                                          $selectedx = 'selected';
                                                                      } ?>
                                                                      <option
                                                                          value="<?php echo $row->id_setting; ?>"<?php echo $selectedx ?> ><?php echo $row->title_setting; ?></option>
                                                                  <?php endforeach; ?>
                                                                  <option
                                                                      value="0"<?php if ($result->m_living_place_id_fk == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                                  <?php
                                                              } else {
                                                                  ?>
                                                                  <option value="" selected>اختر</option>
                                                                  <option
                                                                      value="0"<?php if ($result->m_living_place_id_fk == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                                  <?php
                                                              }

                                                              ?>
                                                          </select>


                                                      </div>
                                                  </div>
                                              <?php }else {
                                                  ?>
                                                  <div class=" col-lg-12 alert alert-danger">لاتوجد بيانات للام</div>
                                              <?php } ?>



                                          </div>

                                          <div role="tabpanel" class="tab-pane fade in " id="tab_forma2">
                                              <?php
                                              if (isset($father) && $father != null) {
                                                  $full_name = $father->full_name;

                                                  $f_national_id = $father->f_national_id;
                                                  $f_national_id_type = $father->f_national_id_type;//


                                                  $f_birth_date = $father->f_birth_date;
                                                  $f_job = $father->f_job;//
                                                  $f_death_id_fk = $father->f_death_id_fk;//
                                                  $f_child_num = $father->f_child_num;

                                                  $f_nationality_id_fk = $father->f_nationality_id_fk;//
                                                  $nationality_other = $father->nationality_other;


                                                  $f_national_id_place = $father->f_national_id_place;
                                                  $f_death_date = $father->f_death_date;
                                                  $f_job_place = $father->f_job_place;
                                                  $f_death_reason_fk = $father->f_death_reason_fk;
                                                  $f_wive_count = $father->f_wive_count;//
                                              } else {
                                                  $fullname = "";
                                                  $disable = "";

                                                  $f_national_id_type = '';//
                                                  $f_national_id = '';
                                                  $f_birth_date = '';
                                                  $f_job = "";//
                                                  $f_death_id_fk = '';//
                                                  $f_child_num = '';


                                                  $f_nationality_id_fk = '';//
                                                  $nationality_other = '';
                                                  $f_national_id_place = '';
                                                  $f_death_date = '';
                                                  $f_job_place = '';
                                                  $f_death_reason_fk = '';
                                                  $f_wive_count = '';//
                                              }
                                              ?>
                                              <?php if ($father == '' && $father == null) {
                                                  ?>
                                                  <div class="col-lg-12 alert alert-danger">لا توجد بيانات للاب</div>
                                              <?php } else { ?>
                                                  <div class="col-sm-12 col-xs-12">
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half"> رقم السجل المدني للأم
                                                              <strong class="astric">*</strong> </label>
                                                          <input type="text" readonly name="mother_national"
                                                                 data-validation="required" disabled
                                                                 class="form-control half input-style"
                                                                 value="<?php echo $father->mother_national_num_fk; ?>"/>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half"> الاسم رباعي <strong
                                                                  class="astric">*</strong> </label>
                                                          <input type="text" readonly name="full_name"
                                                                 data-validation="required"
                                                                 class="form-control half input-style"
                                                                 value="<?php echo $full_name; ?>"/>
                                                      </div>


                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">رقم الهوية<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="number" readonly name="f_national_id"
                                                                 data-validation="number" value="<?= $f_national_id; ?>"
                                                                 id="f_national_id" onkeyup="return valid();"
                                                                 class="form-control half input-style"/>

                                                      </div>


                                                  </div>
                                                  <div class="col-sm-12 col-xs-12">
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">نوع الهوية<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select disabled="disabled" name="f_national_id_type"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">
                                                              <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                                                                  <option value="">اختر</option>
                                                                  <?php

                                                                  foreach ($national_id_array as $row2):
                                                                      $selected = '';
                                                                      if ($row2->id_setting == $f_national_id_type) {
                                                                          $selected = 'selected';
                                                                      } ?>
                                                                      <option
                                                                          value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                                                  <?php endforeach; ?>
                                                              <?php } else { ?>
                                                                  <option value="" selected>اختر</option>
                                                                  <option
                                                                      value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                                                  <?php
                                                              }

                                                              ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">مصدر الهوية<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input readonly type="text" class="form-control half input-style"
                                                                 value="<?php echo $f_national_id_place; ?>"
                                                                 name="f_national_id_place" data-validation="required"/>
                                                      </div>

                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">تاريخ الميلاد<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="f_birth_date"
                                                                 data-validation="required"
                                                                 value="<?php echo $f_birth_date; ?>"
                                                                 class="form-control half input-style docs-date"
                                                                 data-validation="required"/>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">الجنسية<strong
                                                                  class="astric">*</strong><strong></strong> </label>

                                                          <select disabled="disabled" name="f_nationality_id_fk"
                                                                  id="f_nationality_id_fk"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">
                                                              <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                                                                  <option value=" " style="display: none;"
                                                                          selected="selected">اختر
                                                                  </option>

                                                                  <?php if (isset($nationality) && $nationality != null && !empty($nationality)):
                                                                      foreach ($nationality as $one_nationality):
                                                                          $selected = '';
                                                                          if ($one_nationality->id_setting == $f_nationality_id_fk) {
                                                                              $selected = "selected";
                                                                          } ?>
                                                                          <option
                                                                              value="<?php echo $one_nationality->id_setting ?>" <?php echo $selected ?> ><?php echo $one_nationality->title_setting; ?></option>

                                                                      <?php endforeach;endif; ?>
                                                                  <option
                                                                      value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                              <?php } else { ?>
                                                                  <option value=" " selected="selected">اختر</option>
                                                                  <option
                                                                      value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                                  <?php
                                                              }
                                                              ?>
                                                          </select>


                                                      </div>
                                                      <div
                                                          class="form-group col-sm-4 col-xs-12" <?php if ($nationality_other == "") { ?> style="display: none;" <?php } ?>>
                                                          <label class="label label-green  half">الجنسيه الاخري<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly name="nationality_other"
                                                                 id="nationality_other" data-validation="required"
                                                                 value="<?php echo $nationality_other ?>"
                                                                 class="form-control half input-style"
                                                                 data-validation=""<?php if ($nationality_other == "") { ?> disabled=""<?php } ?> />
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong>
                                                          </label>
                                                          <select id="f_job" disabled="disabled" name="f_job"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="true" data-live-search="true"
                                                                  data-validation="required" aria-required="true">

                                                              <?php //$arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
                                                              <?php foreach ($job_titles as $row) {
                                                                  $selected = "";
                                                                  if ($row->id_setting == $f_job) {
                                                                      $selected = "selected";
                                                                  } ?>
                                                                  <option value="">اختر</option>
                                                                  <option
                                                                      value="<?php echo $row->id_setting; ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
                                                              <?php } ?>
                                                          </select>
                                                      </div>


                                                  </div>

                                                  <div class="col-sm-12 col-xs-12">

                                                      <div class="form-group col-sm-4 col-xs-12 red box"
                                                           style="display: none">
                                                          <label class="label label-green  half ">مكان العمل<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly class="form-control half input-style"
                                                                 value="<?php echo $f_job_place ?>" name="f_job_place"/>

                                                      </div>


                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">سبب الوفاة<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <select disabled="disabled" name="f_death_id_fk"
                                                                  class="selectpicker no-padding form-control choose-date form-control half"
                                                                  data-show-subtext="" data-live-search="true"
                                                                  data-validation="" aria-required="true">
                                                              <?php if (isset($arr_deth) && !empty($arr_deth)) { ?>

                                                                  <?php foreach ($arr_deth as $row) {
                                                                      $selected = "";
                                                                      if ($row->id_setting == $f_death_id_fk) {
                                                                          $selected = "selected";
                                                                      } ?>
                                                                      <option
                                                                          value="<?php echo $row->id_setting ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
                                                                  <?php }
                                                              ; ?>
                                                                  <option
                                                                      value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                                  <?php
                                                              } else { ?>
                                                                  <option value="" selected> اختر</option>
                                                                  <option
                                                                      value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >
                                                                      اخري
                                                                  </option>
                                                                  <?php
                                                              }
                                                              ?>

                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12" id="admDivCheck"
                                                           style="display:block;">

                                                          <label class="label label-green  half">السبب<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" readonly class="form-control half input-style"
                                                                 value="<?php echo $f_death_reason_fk ?>"
                                                                 name="f_death_reason_fk"
                                                                 id="f_death_reason_fk" <?php if ($f_death_reason_fk == "") { ?> disabled=""<?php } ?>
                                                                 data-validation="required"/>

                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">تاريخ الوفاة<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="text" name="f_death_date" readonly
                                                                 class="form-control half input-style docs-date"
                                                                 value="<?php echo $f_death_date ?>"
                                                                 data-validation="required"/>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">عدد الأبناء<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="number" readonly name="f_child_num"
                                                                 data-validation="number" value="<?php echo $f_child_num ?>"
                                                                 class="form-control half input-style"/>
                                                      </div>
                                                      <div class="form-group col-sm-4 col-xs-12">
                                                          <label class="label label-green  half">عدد الزوجات<strong
                                                                  class="astric">*</strong><strong></strong> </label>
                                                          <input type="number" readonly data-validation="required" id="wife"
                                                                 class="form-control half input-style"
                                                                 value="<?php echo $f_wive_count ?>" name="f_wive_count"/>
                                                      </div>


                                                  </div>
                                              <?php } ?>

                                          </div>


                                          <div role="tabpanel" class="tab-pane fade in " id="tab_forma3">
                                              <?php if(isset($member_data) && $member_data!=null &&!empty($member_data)): ?>
                                                  <table class="table table-bordered" style="width:100%">
                                                      <header>
                                                          <tr class="info">
                                                              <th>م </th>
                                                              <th>اسم الابن</th>
                                                              <th> إسم الام</th>
                                                              <th>رقم الهوية</th>
                                                              <th>الجنس </th>

                                                              <th>المهنة </th>
                                                              <th>المرحلة </th>
                                                              <th>الصف </th>

                                                          </tr>
                                                      </header>
                                                      <tbody>
                                                      <?php  $x=1; foreach($member_data as $row):?>
                                                          <tr>
                                                              <td><?php echo $x;?></td>
                                                              <td><?php echo $row->member_full_name;  ?></td>
                                                              <td><?php echo $row->member_full_name;?></td>
                                                              <td><?php echo $row->member_card_num; ?></td>
                                                              <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>

                                                              <td>
                                                                  <?php
                                                                  if(!empty($job_titles)){
                                                                      $job_titles_arr =array();
                                                                      foreach ($job_titles as $record){
                                                                          $job_titles_arr[$record->id_setting] = $record->title_setting;
                                                                      }

                                                                      echo $job_titles_arr[$row->member_job];  }?>
                                                              </td>
                                                              <td><?php if(!empty($row->stage)){echo $row->stage;}  ?></td>
                                                              <td><?php if(!empty($row->class)){echo $row->class; } ?></td>
                                                          </tr>
                                                          <?php
                                                          $x++;
                                                      endforeach;?>
                                                      </tbody>
                                                  </table>
                                              <?php else:?>
                                                  <div class="col-lg-12 alert alert-danger" > لا يوجد أبناء للأسرة</div>
                                              <?php endif;?>
                                          </div>



                                          <div role="tabpanel" class="tab-pane fade in " id="tab_forma4">
                                              <?php
                                              if(isset($sakn) && $sakn!=null){
                                                  $result_name=$sakn->full_name;


                                                  $h_national_id=$sakn->mother_national_num_fk;
                                                  $h_electricity_account = $sakn->h_electricity_account;//
                                                  $h_health_number = $sakn->h_health_number;//
                                                  $h_area_id_fk = $sakn->h_area_id_fk;
                                                  $h_city_id_fk = $sakn->h_city_id_fk;
                                                  $h_center_id_fk = $sakn->h_center_id_fk;
                                                  $h_village_id_fk = $sakn->h_village_id_fk;
                                                  $hai_name = $sakn->hai_name;
                                                  $h_street = $sakn->h_street;
                                                  $h_nearest_school = $sakn->h_nearest_school;
                                                  $h_nearest_teacher = $sakn->h_nearest_teacher;
                                                  $h_house_type_id_fk = $sakn->h_house_type_id_fk;
                                                  $h_mosque = $sakn->h_mosque;
                                                  $h_house_type_id_fk = $sakn->h_house_type_id_fk;
                                                  $h_house_color = $sakn->h_house_color;
                                                  $h_house_direction = $sakn->h_house_direction;
                                                  $h_house_status_id_fk = $sakn->h_house_status_id_fk;
                                                  $h_house_size = $sakn->h_house_size;
                                                  $h_rooms_account = $sakn->h_rooms_account;
                                                  $h_house_owner_id_fk = $sakn->h_house_owner_id_fk;
                                                  $h_rent_amount = $sakn->h_rent_amount;
                                                  $h_bath_rooms_account = $sakn->h_bath_rooms_account;
                                                  $h_borrow_from_bank = $sakn->h_borrow_from_bank;
                                                  $h_borrow_remain = $sakn->h_borrow_remain;




                                                  ?>
                                                  <div class="col-md-12" >
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">إسم الام <strong class="astric">*</strong> </label>
                                                          <input type="text"  value="<?= $result_name ?>"  readonly="" class="form-control half input-style"   >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">رقم السجل المدنى  <strong class="astric">*</strong> </label>
                                                          <input  type="text" value="<?= $h_national_id ?>"  readonly="" class="form-control half input-style"  disabled >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">رقم حساب فاتورة الكهرباء <strong class="astric">*</strong> </label>
                                                          <input  placeholder="إدخل البيانات " type="number" class="form-control half input-style"  disabled name="h_electricity_account" value="<?= $h_electricity_account?>" >
                                                      </div>
                                                  </div>




                                                  <div class="col-md-12" >
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">المنطقة <strong class="astric">*</strong> </label>
                                                          <select class="form-control half " onchange="plases('h_area_id_fk','h_city_id_fk');" name="h_area_id_fk" id="h_area_id_fk"  disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php
                                                              foreach($all_areas as $record){
                                                                  $selected='';
                                                                  if($record->id == $h_area_id_fk ){$selected='selected';}
                                                                  echo '<option value="'.$record->id.'" '.$selected.' >'.$record->title.'</option>';
                                                              }
                                                              ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half"> المحافظة   <strong class="astric">*</strong> </label>
                                                          <select class="form-control half " onchange="plases('h_city_id_fk','h_center_id_fk');" name="h_city_id_fk" id="h_city_id_fk"  disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php if(isset($all_areas) && !empty($all_areas) && $all_areas!=null) {
                                                                  foreach ($all_areas as $record) {
                                                                      $selected = '';
                                                                      if ($record->id == $h_city_id_fk) {
                                                                          $selected = 'selected';
                                                                      }
                                                                      echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                                                                  }
                                                              }else{
                                                                  echo '<option value="" >لا يوحد بيانات مضافة </option>';
                                                              }
                                                              ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half"> المركز   <strong class="astric">*</strong> </label>
                                                          <select class="form-control half " onchange="plases('h_center_id_fk','h_village_id_fk');" name="h_center_id_fk" id="h_center_id_fk"  disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php if(isset($h_center_id_fk) && !empty($h_center_id_fk) && $h_center_id_fk!=null) {
                                                                  foreach ($all_areas as $record) {
                                                                      $selected = '';
                                                                      if ($record->id == $h_center_id_fk) {
                                                                          $selected = 'selected';
                                                                      }
                                                                      echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                                                                  }
                                                              }else{
                                                                  echo '<option value="" >لا يوحد بيانات مضافة </option>';
                                                              }
                                                              ?>
                                                          </select>
                                                      </div>
                                                  </div>



                                                  <div class="col-md-12">
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half"> القرية   <strong class="astric">*</strong> </label>
                                                          <select class="form-control half "  name="h_village_id_fk" id="h_village_id_fk"  disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php if(isset($all_areas) && !empty($all_areas) && $all_areas!=null) {
                                                                  foreach ($all_areas as $record) {
                                                                      $selected = '';
                                                                      if ($record->id == $h_village_id_fk) {
                                                                          $selected = 'selected';
                                                                      }
                                                                      echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                                                                  }
                                                              }else{
                                                                  echo '<option value="" >لا يوحد بيانات مضافة </option>';
                                                              }
                                                              ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half"> الحى  <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" disabled name="hai_name" value="<?=$hai_name?>" >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">الشارع <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" disabled name="h_street" value="<?=$h_street?>">
                                                      </div>

                                                  </div>

                                                  <div class="col-md-12">
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">أقرب مدرسة <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" disabled name="h_nearest_school" value="<?= $h_nearest_school ?>" >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half"> أقرب معلم  <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" disabled name="h_nearest_teacher" value="<?= $h_nearest_teacher ?>"  >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">أقرب مسجد <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" disabled name="h_mosque" value="<?= $h_mosque ?>">
                                                      </div>
                                                  </div>


                                                  <div class="col-md-12">
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half"> نوع السكن  <strong class="astric">*</strong> </label>
                                                          <select class="form-control half" name="h_house_type_id_fk"  disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php foreach($arr_type_house as $x):
                                                                  $selected='';if($x->id_setting== $h_house_type_id_fk){$selected='selected';}?>
                                                                  <option value="<?php echo $x->id_setting ?>" <?php echo $selected?> ><?php echo $x->title_setting ?></option>
                                                              <?php endforeach ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">لون المنزل <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" disabled name="h_house_color" value="<?= $h_house_color ?>" >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">اتجاه المنزل  <strong class="astric">*</strong> </label>
                                                          <select class="form-control half"  name="h_house_direction"  disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php foreach($arr_direct as $y):
                                                                  $selected='';if($y->id_setting == $h_house_direction){$selected='selected';}?>
                                                                  $selected='';if($y->id_setting == $h_house_direction){$selected='selected';}?>
                                                                  <option value="<?= $y->id_setting?>" <?php echo $selected?> ><?= $y->title_setting  ?></option>
                                                              <?php endforeach ?>
                                                          </select>
                                                      </div>
                                                  </div>

                                                  <div class="col-md-12">
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">الحالة <strong class="astric">*</strong> </label>
                                                          <select class="form-control half" name="h_house_status_id_fk"  disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php foreach($house_state as $z):
                                                                  $selected='';if($z->id_setting== $h_house_status_id_fk ){$selected='selected';}?>
                                                                  <option value="<?php echo $z->id_setting ?>" <?php echo $selected?> ><?php echo $z->title_setting ?></option>
                                                              <?php endforeach ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">عدد الغرف  <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="number" class=" some_class form-control half input-style"disabled  name="h_rooms_account" value="<?= $h_rooms_account ?>" >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">مساحة البناء <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="number" class=" some_class form-control half input-style"disabled name="h_house_size"  value="<?= $h_house_size ?>" >
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">ملكية السكن  <strong class="astric">*</strong> </label>
                                                          <select class="form-control half"  id="buliding" name="h_house_owner_id_fk"   disabled  aria-required="true">
                                                              <option  value="">اختر</option>
                                                              <?php
                                                              //foreach($house_own as $a):
                                                              //$selected='';if($a->id_setting==h_house_owner_id_fk){$selected='selected';} ?>
                                                              <option value="<?= $h_house_owner_id_fk ?>" <?php echo $selected?> ><?= $h_house_owner_id_fk ?></option>
                                                              <?php// endforeach ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">مقدار الإيجار السنوى <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="number" class=" some_class form-control half input-style" disabled name="h_rent_amount" value="<?= $h_rent_amount ?>"   >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half"> عدد دورات المياه  <strong class="astric">*</strong> </label>
                                                          <input placeholder="إدخل البيانات " type="number" class=" some_class form-control half input-style" disabled name="h_bath_rooms_account"  value="<?= $h_bath_rooms_account ?>" >
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  col-xs-6 no-padding">مقترض من البنك العقارى <strong class="astric">*</strong> </label>
                                                          <select class=" col-xs-6 no-padding "  name="h_borrow_from_bank" id="bank" style="border: 1px solid #ccc;"  disabled  aria-required="true">
                                                              <option value="">اختر</option>
                                                              <?php $arr_yes_no = array( 0 => 'اختار',1 => 'نعم', 2 => 'لا');
                                                              for($r=0;$r<sizeof($arr_yes_no);$r++){
                                                                  $selected='';if($r == $h_borrow_from_bank){$selected='selected';}
                                                                  ?>
                                                                  <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                                                              <?php }?>
                                                          </select>


                                                      </div>
                                                      <?php $dis="disabled";if( $h_borrow_from_bank == 1){
                                                          $dis="";
                                                      }?>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">القيمة المتبقية <strong class="astric">*</strong> </label>
                                                          <input type="number" <?=$dis?> name="h_borrow_remain" value="<?= $h_borrow_remain ?>" class="some_class form-control half input-style" disabled placeholder="القيمة المتبقية" style="width: 25%;" id="bank-cost" >
                                                      </div>
                                                      <div class="form-group col-sm-4">
                                                          <label class="label label-green  half">الرقم الصحى <strong class="astric">*</strong> </label>
                                                          <input type="number" name="h_health_number"  value="<?= $h_health_number?>" class="form-control half input-style"  disabled >
                                                      </div>
                                                  </div>
                                              <?php }else{?>
                                                  <div class="col-lg-12 alert alert-danger" >  لاتوجد بيانات سكن</div>
                                              <?php  } ?>




                                          </div>
                                          <div role="tabpanel" class="tab-pane fade in " id="tab_forma5">
                                              <div class="panel-body"><br>
                                                  <?php if(isset($devices) && $devices!=null):?>
                                                      <table class="table table-bordered" id="tab_logic">
                                                          <thead>
                                                          <tr class="info">
                                                              <th class="text_center">م</th>
                                                              <th class="text_center">نوع الجهاز</th>
                                                              <th class="text_center">العدد</th>
                                                              <th class="text_center">حالة الجهاز</th>
                                                              <th class="text_center" >ملاحظات</th>
                                                          </tr>
                                                          </thead>
                                                          <tbody>
                                                          <?php
                                                          $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                                                          $a=1; foreach($devices as $row) {  ?>

                                                              <td><?php echo $a;?></td>
                                                              <td><?php echo $row->title_setting; ?> </td>
                                                              <td><?php echo $row->d_count?></td>
                                                              <td><?php echo $house_device_status[$row->d_house_device_status_id_fk]?></td>
                                                              <td><?php echo $row->d_note?></td>





                                                              <?php
                                                              $a++;
                                                          }
                                                          ?>




                                                          </tbody>
                                                      </table>
                                                  <?php else:?>
                                                      <div class="col-lg-12 alert alert-danger" > لاتوجد أجهزة</div>
                                                  <?php endif;?>
                                              </div>

                                          </div>
                                          <div role="tabpanel" class="tab-pane fade in " id="tab_forma6">
                                              <div class="panel-body"><br>
                                                  <?php if(isset($home_needs) && $home_needs!=null && !empty($home_needs)):?>
                                                      <table class="table table-bordered" id="tab_logic">
                                                          <thead>
                                                          <tr class="info">
                                                              <th class="text_center">م</th>
                                                              <th class="text_center">اسم المنتج </th>
                                                              <th class="text_center">العدد</th>

                                                              <th class="text_center" >ملاحظات</th>
                                                          </tr>
                                                          </thead>
                                                          <tbody>
                                                          <?php
                                                          $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                                                          $a=1; foreach($home_needs as $row) {  ?>

                                                              <td><?php echo $a;?></td>
                                                              <td><?php echo $row->name; ?> </td>
                                                              <td><?php echo $row->h_count?></td>

                                                              <td><?php echo $row->h_note?></td>





                                                              <?php
                                                              $a++;
                                                          }
                                                          ?>




                                                          </tbody>
                                                      </table>
                                                  <?php else:?>
                                                      <div class="col-lg-12 alert alert-danger" >  لاتوجد اي منتجات</div>
                                                  <?php endif;?>
                                              </div>


                                          </div>
                                          <div role="tabpanel" class="tab-pane fade in " id="tab_forma7">
                                              <div class="col-sm-12 col-xs-12">
                                                  <div class="col-sm-6 col-xs-12">
                                                      <h5 class="title-top"> مصادر الدخل</h5>
                                                      <?php
                                                      $affect_arr=array('لا تؤثر','تؤثر');
                                                      if(!empty($financial_data_income) && isset($financial_data_income)){
                                                          foreach($financial_data_income as $row){?>
                                                              <div class="col-xs-12"  style="margin-bottom: 15px; padding: 0">
                                                                  <label class="label label-green " style="padding: 3px 35px;"><?php echo $row->name;?></label>

                                                                  <input type="text" readonly="readonly"  value="<?php echo $row->value;?>"  class="form-control" style="  width: 28%;display: inline-block;" >
                                                                  <?php if($row->affect==0){?>
                                                                      <input type="radio" name=""   readonly="readonly" checked="checked"   value="" style="margin-right: 20px;">
                                                                      <label for="">لاتؤثر</label>
                                                                  <?php }else{?>
                                                                      <input type="radio" checked="checked"  readonly="readonly"  name=""   value="" style="margin-right: 20px;">
                                                                      <label for="">تؤثر</label>
                                                                      <?php
                                                                  } ?>




                                                              </div>
                                                          <?php } }else{?>
                                                          <div class="col-lg-12 alert alert-danger" > لاتوجد مصادر دخل</div>
                                                      <?php }?>


                                                  </div>

                                                  <div class="col-sm-6 col-xs-12">
                                                      <h5 class="title-top">الالتزامات المستهدفه</h5>
                                                      <?php
                                                      $affect_arr=array('لا تؤثر','تؤثر');
                                                      if(!empty($financial_data_duties)&&!empty($financial_data_duties)){
                                                          foreach($financial_data_duties as $row){?>
                                                              <div class="col-xs-12"  style="margin-bottom: 15px; padding: 0">
                                                                  <label class="label label-green " style="padding: 3px 35px;"><?php echo $row->name;?></label>

                                                                  <input type="text" readonly="readonly" value="<?php echo $row->value;?>"  class="form-control" style="  width: 28%;display: inline-block;" >
                                                                  <?php if($row->affect==0){?>
                                                                      <input type="radio" name=""   readonly="readonly" checked="checked"   value="" style="margin-right: 20px;">
                                                                      <label for="">لاتؤثر</label>
                                                                  <?php }else{?>
                                                                      <input type="radio" checked="checked"  readonly="readonly"  name=""   value="" style="margin-right: 20px;">
                                                                      <label for="">تؤثر</label>
                                                                      <?php
                                                                  } ?>




                                                              </div>
                                                          <?php } }else{?>
                                                          <div class="col-lg-12 alert alert-danger" >لاتوجد الالتزامات المستهدفه</div>
                                                      <?php }?>
                                                  </div>


                                              </div>



                                          </div>



                                      </div>

                                  </div>
                                  <hr width="100%" style="margin: 0; border-color: #000">
                                  <div class="modal-footer" >
                                    
                                          <div class="form-group col-sm-4 col-xs-12" style="margin-top: 25px;">
                                              <button type="button" class="btn btn-success accept pull-left" value="1"  row="<?=$all_orders_comming[0]->id?>"onclick="change_aproved($(this).val(),$(this).attr('row'));">الموافقه </button>


                                              <button type="button" class="btn btn-danger notaccept pull-left" value="0"  row="<?=$all_orders_comming[0]->id?>"  onclick="change_aproved($(this).val(),$(this).attr('row'));">الرفض</button>
                                          </div>

                                      </div>
                                      <?php if(($all_orders_comming[0]->approved_lagna==1)){?>
                                          <div class="accept1">
                                              <div class="col-xs-9 text-center  alert-danger" style="padding: 9px;"> تمت الموافقه علي الطلب</div>
                                              <div class="col-xs-3 text-center  " style="padding: 4px; padding-left: 10px;">
                                                  <button type="button" class="btn btn-danger notaccept pull-left back2" style="padding-right: 10px;" onclick="change_accept();">
                                                      تراجع عن الموافقه
                                                  </button>
                                              </div>
                                          </div>

                                      <?php } ?>
                                      <?php if(($all_orders_comming[0]->approved_lagna==0)){?>
                                          <div class="accept2">
                                              <div class="col-xs-9 text-center  alert-danger" style="padding: 9px;">    تم رفض الطلب</div>
                                              <div class="col-xs-3 text-center  " style="padding: 4px; padding-left: 10px;">
                                                  <button type="button" class="btn btn-danger notaccept pull-left back1" style="padding-right: 10px;" onclick="change_not_accept();">
                                                      تراجع عن الرفض
                                                  </button>
                                              </div>
                                          </div>
                                      <?php } ?>


                                  </div>
                              </div>
                          </div>
                          <?php
                      }
                      ?>
                      </div>



                  <?php } }else{?>
                      <div class="col-lg-12 alert alert-danger" > لا يوجد بيانات لعرضها</div>
                        <?php }?>
                    </div>
                </div>
                <div class="tab-pane fade" id="accepted">
                    <div class="panel-body">
                        <br>
                        <?php if(!empty($accepted)){?>
                            <table id = "" class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                <thead>
                                <tr>
                                    <th class="text-center"> م</th >
                                    <th class="text-center"> رقم الأسرة</th >
                                    <th class="text-center">نوع العملية</th >
                                    <th class="text-center"> التفاصيل</th >
                                    <th class="text-center"> الإجراء</th >
                                </tr>
                                </thead>
                                <tbody>
                                <?php $x=1;foreach($all_orders_accept as $record){?>
                                <tr>
                                    <td class="text-center"><?php echo $x;?></td>
                                    <td class="text-center"><?php echo $record->mother_national_num;?></td>
                                    <td class="text-center"><?php echo $record->title;?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#myModala<?php echo $x;?>">التفاصيل
                                        </button>

                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger  btn-xs " onclick="getApproved(2,<?php echo $record->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                        <button type="button" class="btn btn-warning  btn-xs " onclick="getApproved('0',<?php echo $record->id;?>)"><i class="glyphicon glyphicon-repeat"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                                <?php $x=1;foreach($all_orders as $record){?>
                                    <div class="modal fade" id="myModala<?php echo $x;?>" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" style="float: left" class="btn btn-danger"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                                <?php $x++;} }else{?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بيانات لعرضها</div>
                        <?php }?>
                    </div>
                </div>
                <div class="tab-pane fade" id="refused">
                    <div class="panel-body">
                        <br>
                        <?php if(!empty($refused)){?>
                            <table id = "" class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                <thead>
                                <tr>
                                    <th class="text-center"> م</th >
                                    <th class="text-center"> رقم الأسرة</th >
                                    <th class="text-center">نوع العملية</th >
                                    <th class="text-center"> التفاصيل</th >
                                    <th class="text-center"> الإجراء</th >
                                </tr>
                                </thead>
                                <tbody>
                                <?php $x=1;foreach($all_orders_refused as $record){?>
                                <tr>
                                    <td class="text-center"><?php echo $x;?></td>
                                    <td class="text-center"><?php echo $record->mother_national_num;?></td>
                                    <td class="text-center"><?php echo $record->title;?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#myModalr<?php echo $x;?>">التفاصيل
                                        </button>

                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success  btn-xs " onclick="getApproved(1,<?php echo $record->id;?>)" ><i class="glyphicon glyphicon-ok"></i></button>
                                        <button type="button" class="btn btn-warning  btn-xs " onclick="getApproved('0',<?php echo $record->id;?>)"><i class="glyphicon glyphicon-repeat"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>


                                <?php $x=1;foreach($refused as $record){?>
                                    <div class="modal fade" id="myModalr<?php echo $x;?>" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" style="float: left" class="btn btn-danger"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                                <?php $x++;} }else{?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بيانات لعرضها</div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<script>
    function getApproved(process,id) {
        if (process &&  id ) {
            var dataString = 'process=' + process +'&id=' + id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Transformation_lagna/transformation_lagna_approved',
                data:dataString,
                cache:false,
                success: function(json_data){
                   // var JSONObject = JSON.parse(json_data);
                    //console.log(JSONObject);
                    alert(' تم تعديل البيانات بنجاح !!');
                    location.reload();
                }
            });
            return false;
        }

    }

</script>