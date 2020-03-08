

<div class="col-sm-12  wow" >
<div class="col-sm-9" >

        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>

            <div class="panel-body">
                <?php

                if(isset($record)&&!empty($record)){
                    $salary=$record->salaray;
                    $bdl_sakn=$record->bdl_sakn;
                    $bdl_moslat=$record->bdl_moslat;
                    $medical_insurance=$record->medical_insurance;
                    $contract_peroid=$record->contract_peroid;
                    $contract_type_fk=$record->contract_type_fk;
                    $demo_days=$record->demo_days;
                    $yearly_vacation=$record->yearly_vacation;
                    $other=$record->other;
                    $notes=$record->notes;

                }else{

                    $salary='';
                    $bdl_sakn='';
                    $bdl_moslat='';
                    $medical_insurance='';
                    $contract_peroid='';
                    $contract_type_fk='';
                    $demo_days='';
                    $yearly_vacation='';
                    $other='';
                    $notes='';
                }
                ?>
                <?php $items=array('salaray'=>'الراتب الاساسي','bdl_sakn'=>'بدل سكن','bdl_moslat'=>'بدل المواصلات','medical_insurance'=>'التأمين الطبي',
                    'contract_peroid'=>'مدة العقد ونوعه','contract_type_fk'=>'نوع العقد','demo_days'=>'مدة فترة التجربة','yearly_vacation'=>'مدة الإجازة السنوية','other'=>'المزايا الاخري','notes'=>'ملاحظات');?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Job_requests/offer_work/<?php echo $this->uri->segment(5);?>" method="post">

<div class="col-md-12">

    <div class="col-md-3">
        <label class="label top-label">الراتب الاساسي</label>
        <input type="text" name="salaray" value="<?php echo $salary;?>"  class="form-control bottom-input"
                data-validation="required"  data-validation-has-keyup-event="true">

    </div>
    <div class="col-md-3">
        <label class="label top-label">بدل سكن</label>
        <input type="text" name="bdl_sakn" value="<?php echo $bdl_sakn;?>"   class="form-control bottom-input"
               data-validation="required"  data-validation-has-keyup-event="true">

    </div>
    <div class="col-md-3">
        <label class="label top-label">بدل المواصلات</label>
        <input type="text" name="bdl_moslat" value="<?php echo $bdl_moslat;?>"   class="form-control bottom-input"
               data-validation="required"  data-validation-has-keyup-event="true">
    </div>
    <div class="col-md-3">
        <label class="label top-label">التأمين الطبي</label>
        <input type="text" value="<?php echo $medical_insurance;?>" name="medical_insurance"  class="form-control bottom-input"
               data-validation="required"  data-validation-has-keyup-event="true">
    </div>
</div>
                    <div class="col-md-12">

                        <div class="col-md-3">
                            <label class="label top-label">مده العقد</label>
                            <input type="text"  value="<?php echo $contract_peroid;?>" name="contract_peroid"  class="form-control bottom-input"
                                   data-validation="required"  data-validation-has-keyup-event="true">
                        </div>
                        <div class="col-md-3">

                            <label class="label top-label">نوع العقد </label>
                            <select name="contract_type_fk"  id="" data-validation="required" class="form-control bottom-input" onchange="changeAqdStatus($(this).val());"  aria-required="true">
                                <option value="">إختر</option>

                                <option value="1" <?php if($contract_type_fk==1){echo 'selected';}?>>عقد محدد المدة </option>
                                <option value="0"<?php if($contract_type_fk==0){echo 'selected';}?> >عقد غير محدد المدة </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="label top-label">مدة فترة التجربة</label>
                            <input type="text" value="<?php echo $demo_days;?>" name="demo_days"  class="form-control bottom-input"
                                   data-validation="required"  data-validation-has-keyup-event="true">
                        </div>
                        <div class="col-md-3">
                            <label class="label top-label">الاجازات السنويه</label>
                            <input type="text" value="<?php echo $yearly_vacation;?>" name="yearly_vacation"  class="form-control bottom-input"
                                   data-validation="required"  data-validation-has-keyup-event="true">
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <label class="label top-label">المزايا</label>
                            <textarea    name="others" class="form-control bottom-input"
                                   data-validation="required"> <?php echo $other;?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="label top-label">ملاحظات</label>
                             <textarea name="notes"  class="form-control bottom-input"
                                        data-validation="required"> <?php echo $notes;?></textarea>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn-add" name="add" value="حفظ">

                    </div>
                </form>
        </div>
    </div>
    </div>
        <!---------------------osama--------------------------->
    <?php  $this->load->view('admin/Human_resources/employee_forms/sidebar_application_data');?>
    <!---------------------osama--------------------------->
    </div>
