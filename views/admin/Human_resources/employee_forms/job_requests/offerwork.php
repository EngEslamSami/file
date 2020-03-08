<style>
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>

<div class="col-sm-12 no-padding">


    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>

        <div class="panel-body">
            <div class="col-sm-10 no-padding">
                <?php

                if (isset($record) && !empty($record)) {
                    $salary = $record->salaray;
                    $bdl_sakn = $record->bdl_sakn;
                    $bdl_moslat = $record->bdl_moslat;
                    $medical_insurance = $record->medical_insurance;
                    $contract_peroid = $record->contract_peroid;
                    $contract_type_fk = $record->contract_type_fk;
                    $demo_days = $record->demo_days;
                    $yearly_vacation = $record->yearly_vacation;
                    $other = $record->other;
                    $notes = $record->notes;

                } else {

                    $salary = '';
                    $bdl_sakn = '';
                    $bdl_moslat = '';
                    $medical_insurance = '';
                    $contract_peroid = '';
                    $contract_type_fk = '';
                    $demo_days = '';
                    $yearly_vacation = '';
                    $other = '';
                    $notes = '';
                }
                ?>
                <?php $items = array('salaray' => 'الراتب الاساسي', 'bdl_sakn' => 'بدل سكن', 'bdl_moslat' => 'بدل المواصلات', 'medical_insurance' => 'التأمين الطبي',
                    'contract_peroid' => 'مدة العقد ونوعه', 'contract_type_fk' => 'نوع العقد', 'demo_days' => 'مدة فترة التجربة', 'yearly_vacation' => 'مدة الإجازة السنوية', 'other' => 'المزايا الاخري', 'notes' => 'ملاحظات'); ?>
                <form action="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/offer_work/<?php echo $this->uri->segment(6); ?>"
                      method="post">

                    <div class="col-md-12 no-padding">

                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">الراتب الاساسي</label>
                            <input type="text" name="salaray" value="<?php echo $salary; ?>" class="form-control  "
                                   data-validation="required" data-validation-has-keyup-event="true">

                        </div>
                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">بدل سكن</label>
                            <input type="text" name="bdl_sakn" value="<?php echo $bdl_sakn; ?>" class="form-control  "
                                   data-validation="required" data-validation-has-keyup-event="true">

                        </div>
                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">بدل المواصلات</label>
                            <input type="text" name="bdl_moslat" value="<?php echo $bdl_moslat; ?>"
                                   class="form-control  "
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">التأمين الطبي</label>
                            <input type="text" value="<?php echo $medical_insurance; ?>" name="medical_insurance"
                                   class="form-control  "
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>


                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">مده العقد</label>
                            <input type="text" value="<?php echo $contract_peroid; ?>" name="contract_peroid"
                                   class="form-control  "
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4">

                            <label class="label  ">نوع العقد </label>
                            <select name="contract_type_fk" id="" data-validation="required" class="form-control  "
                                    onchange="changeAqdStatus($(this).val());" aria-required="true">
                                <option value="">إختر</option>

                                <option value="1" <?php if ($contract_type_fk == 1) {
                                    echo 'selected';
                                } ?>>عقد محدد المدة
                                </option>
                                <option value="0"<?php if ($contract_type_fk == 0) {
                                    echo 'selected';
                                } ?> >عقد غير محدد المدة
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">مدة فترة التجربة</label>
                            <input type="text" value="<?php echo $demo_days; ?>" name="demo_days" class="form-control  "
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">الاجازات السنويه</label>
                            <input type="text" value="<?php echo $yearly_vacation; ?>" name="yearly_vacation"
                                   class="form-control  "
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>



                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">المزايا</label>
                            <textarea name="others" class="form-control  "
                                      data-validation="required"> <?php echo $other; ?></textarea>
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4">
                            <label class="label  ">ملاحظات</label>
                            <textarea name="notes" class="form-control  "
                                      data-validation="required"> <?php echo $notes; ?></textarea>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-labeled btn-success " name="add" value="save_main_data"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                        <!--  <input type="submit" class="btn-add" name="add" value="حفظ"> -->

                    </div>
                </form>
            </div>
        
                <?php $this->load->view('admin/Human_resources/employee_forms/job_requests/sidebar_person_data'); ?>

            
        </div>
    </div>


</div>
