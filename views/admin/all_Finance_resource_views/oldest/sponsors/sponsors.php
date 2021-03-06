<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
    h4 {margin-top: 0;}
</style>
<?php 
$type = array(1=>'فرد',2=>'مؤسسة');
$sponsor_type = array(1=>'كفالة مادية',2=>'كفالة مادية مع برنامج',3=>'كفالة أخرى');
$pay_method = array(1=>'نقدي',2=>'شبكة',3=>'حوالة بنكية',4=>'استقطاع',5=>'بنك',6=>'شيك');
$gender_type = array(1=>'ذكر',2=>'أنثى');
$job_type = array(1=>'موظف حكومي',2=>'موظف قطاع خاص',3=>'أعمال حرة',4=>'لا يعمل');
$identity_type =array(1=>'الهوية الوطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر');
$id = $this->uri->segment(3);
$disabled = 'disabled';
$readonly = 'readonly';
$disabled2 = 'disabled';
$readonly2 = 'readonly';
$required2 = '';
$readonly3 = 'readonly';
$required3 = '';
$required = '';
if($id == '') {
	echo form_open_multipart('Finance_resource/addSponsor');
}
else {
	echo form_open_multipart('Finance_resource/editSponsor/'.$id.'');
    if($sponsor['bank_id_fk'] != null) {
        $disabled = '';
        $readonly = '';
        $required = 'required';
    }
    if($sponsor['type'] == 1){
        $disabled2 = '';
        $readonly2 = '';
        $required2 = 'required';
    }
    if($sponsor['type'] == 2){
        $readonly3 = '';
        $required3 = 'required';
    }
}
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
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> فرد / مؤسسة</h4>
                                </div>
                                <div class="col-xs-6 r-input" style="margin-top: 10px">
                                    <?php 
                                    foreach ($type as $key => $value) { 
                                        $check = '';
                                        if(isset($sponsor) && $sponsor['type'] == $key){
                                            $check = 'checked';
                                        }
                                    ?>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="type" data-validation="required" onclick="getRadioType($(this).val())" value="<?=$key?>" <?=$check?>> <?=$value?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإسم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" name="name" placeholder="الإسم" id="name" value="<?php if(isset($sponsor)) echo $sponsor['name'] ?>" class="form-control" data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الجنس </h4>
                                </div>
                                <div class="col-xs-6 r-input" style="margin-top: 10px">
                                    <?php 
                                    foreach ($gender_type as $key => $value) { 
                                        $check = '';
                                        if(isset($sponsor) && $sponsor['gender'] == $key){
                                            $check = 'checked';
                                        }
                                    ?>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender" data-validation="required" value="<?=$key?>" <?=$check?>> <?=$value?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إسم المستخدم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" name="user_name" placeholder="إسم المستخدم " id="user_name" value="<?php if(isset($sponsor)) echo $sponsor['user_name'] ?>" class="form-control" data-validation="required" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">كلمة المرور</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="password" name="password" placeholder="كلمة المرور " id="password" value="<?php if(isset($sponsor)) echo $sponsor['password'] ?>" class="form-control" data-validation="required" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الجنسية</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class="form-control selectpicker" data-live-search="true" name="nationality_id_fk" id="nationality_id_fk" data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php
                                        if(isset($nationalities) && $nationalities != null){
                                            foreach ($nationalities as $nationality) {
                                                $select = '';
                                                if((isset($sponsor) && $sponsor['nationality_id_fk'] == $nationality->id)) {
                                                    $select = 'selected';
                                                }
                                        ?>
                                        <option value="<?=$nationality->id?>" <?=$select?> ><?=$nationality->title?></option>
                                        <?php 
                                            } 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الهوية</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class="form-control" name="identity_type" id="identity_type" data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($identity_type as $key => $value) {
                                            $select = '';
                                            if((isset($sponsor) && $sponsor['identity_type'] == $key)) {
                                                $select = 'selected';
                                            }
                                        ?>
                                        <option value="<?=$key?>" <?=$select?> ><?=$value?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الهوية</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" name="national_id" placeholder="رقم الهوية " id="national_id" value="<?php if(isset($sponsor)) echo $sponsor['national_id'] ?>" class="form-control" data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الجوال</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" name="mobile" placeholder="رقم الجوال " id="mobile" value="<?php if(isset($sponsor)) echo $sponsor['mobile'] ?>" class="form-control" data-validation="required">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">المهنة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class="form-control" name="job_type" id="job_type" data-validation="<?=$required2?>" aria-required="true" <?=$disabled2?>>
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($job_type as $key => $value) {
                                            $select = '';
                                            if((isset($sponsor) && $sponsor['job_type'] == $key)) {
                                                $select = 'selected';
                                            }
                                        ?>
                                        <option value="<?=$key?>" <?=$select?> ><?=$value?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> جهة العمل</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" name="job_place" placeholder="جهة العمل" id="job_place" value="<?php if(isset($sponsor)) echo $sponsor['job_place'] ?>" data-validation="<?=$required2?>" class="form-control" <?=$readonly2?>>
                                </div>
                            </div>
                            
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نشاط المؤسسة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" name="activity" placeholder="نشاط المؤسسة" id="activity" value="<?php if(isset($sponsor)) echo $sponsor['activity'] ?>" class="form-control" data-validation="<?=$required3?>" <?=$readonly3?>>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">طريقة السداد </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class="form-control" name="pay_method" id="pay_method" data-validation="required" aria-required="true" onchange="getEnable($(this).val())">
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($pay_method as $key => $value) {
                                            $select = '';
                                            if((isset($sponsor) && $sponsor['pay_method'] == $key)) {
                                                $select = 'selected';
                                            }
                                        ?>
                                        <option value="<?=$key?>" <?=$select?> ><?=$value?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> البنك</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class="form-control" name="bank_id_fk" id="bank_id_fk" data-validation="<?=$required?>" aria-required="true" <?=$disabled?>>
                                        <option value="">إختر</option>
                                        <?php
                                        if(isset($banks) && $banks != null){
                                            foreach ($banks as $bank) {
                                                $select = '';
                                                if((isset($sponsor) && $sponsor['bank_id_fk'] == $bank->id)) {
                                                    $select = 'selected';
                                                }
                                        ?>
                                        <option value="<?=$bank->id?>" <?=$select?> ><?=$bank->title?></option>
                                        <?php 
                                            } 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الحساب</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" name="account_number" placeholder="رقم الحساب " id="account_number" value="<?php if(isset($sponsor)) echo $sponsor['account_number'] ?>" class="form-control" data-validation="<?=$required?>" <?=$readonly?>>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">تاريخ تسجيل الكفالة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="date" id="register_date" name="register_date" placeholder="تاريخ تسجيل الكفالة" value="<?php if(isset($sponsor)) {echo date("Y-m-d",$sponsor['register_date']);} ?>" class="form-control " data-validation="required" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">تاريخ بداية الكفالة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="date" id="date_from" name="date_from" placeholder="تاريخ بداية الكفالة" value="<?php if(isset($sponsor)) {echo date("Y-m-d",$sponsor['date_from']);} ?>" class="form-control " data-validation="required" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">تاريخ نهاية الكفالة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="date" id="date_to" name="date_to" placeholder="تاريخ نهاية الكفالة" value="<?php if(isset($sponsor)) {echo date("Y-m-d",$sponsor['date_to']);} ?>" class="form-control " data-validation="required" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">عددالدفعات</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" name="payments_num" placeholder="عددالدفعات" id="payments_num" value="<?php if(isset($sponsor)) echo $sponsor['payments_num'] ?>" class="form-control" data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">عدد الايتام المكفولين</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" name="orphans_num" placeholder="عدد الايتام المكفولين" id="orphans_num" value="<?php if(isset($sponsor)) echo $sponsor['orphans_num'] ?>" class="form-control" data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">مبلغ الكفالة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" name="value" placeholder="مبلغ الكفالة" id="value" value="<?php if(isset($sponsor)) echo $sponsor['value'] ?>" class="form-control" data-validation="required">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">نوع الكفالة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class="form-control" name="sponsor_type" id="sponsor_type" data-validation="required" aria-required="true" onchange="getEnable($(this).val())">
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($sponsor_type as $key => $value) {
                                            $select = '';
                                            if((isset($sponsor) && $sponsor['sponsor_type'] == $key)) {
                                                $select = 'selected';
                                            }
                                        ?>
                                        <option value="<?=$key?>" <?=$select?> ><?=$value?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رفع ملفات</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="file" name="file_name[]" multiple>
                                    <?php if(isset($sponsor)) { ?>
                                    <span class="help-block form-error alert-danger">لا تريد التغيير .. لا ترفع أي ملف</span>
                                    <? } ?>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> البريد الإلكتروني</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" name="email" placeholder="البريد الإلكتروني" id="email" value="<?php if(isset($sponsor)) echo $sponsor['email'] ?>" class="form-control" autocomplete="false">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> ملاحظات</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <textarea name="note" class="r-textarea" placeholder="ملاحظات" ><?php if(isset($sponsor)) echo $sponsor['note'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" onclick="return checkLength();"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
echo form_close();
if ($id == '') { 
?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول البيانات</h4>
                </div>
            </div>
            <div class="panel-body">
<?php if(isset($sponsors) && $sponsors != null) { ?>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الكفيل</th>
                            <th>إسم الكفيل</th>
                            <th>فرد / مؤسسة</th>
                            <th>رقم الجوال</th>
                            <th>التفاصيل</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $x = 1;
                        foreach ($sponsors as $sponsor) { 
                        ?>
                        <tr>
                            <td><?=($x++)?></td>
                            <td><?=$sponsor->id?></td>
                            <td><?=$sponsor->name?></td>
                            <td><?=$type[$sponsor->type]?></td>
                            <td><?=$sponsor->mobile?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$sponsor->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
                            </td>
                            <td>
                                <a href="<?php echo base_url('Finance_resource/editSponsor').'/'.$sponsor->id ?>"><i class="fa fa-pencil"></i> </a>

                                <a onclick="$('#adele').attr('href', '<?=base_url()."Finance_resource/deleteSponsor/".$sponsor->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <div class="modal" id="myModal<?=$sponsor->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 90%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تفاصيل كفيل بإسم (<?=$sponsor->name?>)</h4>
                                    </div>
                       
                                    <div class="row modal-body">
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">فرد / مؤسسة</label>
                                            <h4 class="form-control half input-style"><?=$type[$sponsor->type]?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">الجنس</label>
                                            <h4 class="form-control half input-style"><?=$gender_type[$sponsor->gender]?></h4>
                                        </div>
                                        
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">إسم المستخدم</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->user_name?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">الجنسية</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->nationality?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">نوع الهوية</label>
                                            <h4 class="form-control half input-style"><?=$identity_type[$sponsor->identity_type]?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">رقم الهوية</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->national_id?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">رقم الجوال</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->mobile?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">المهنة</label>
                                            <h4 class="form-control half input-style"><?=$job_type[$sponsor->job_type]?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">جهة العمل</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->job_place?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">البريد الإلكتروني</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->email?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">طريقة السداد</label>
                                            <h4 class="form-control half input-style"><?=$pay_method[$sponsor->pay_method]?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">البنك</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->bank?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">رقم الحساب</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->account_number?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">تاريخ تسجيل الكفالة</label>
                                            <h4 class="form-control half input-style"><?=date("Y-m-d",$sponsor->register_date)?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">تاريخ بداية الكفالة</label>
                                            <h4 class="form-control half input-style"><?=date("Y-m-d",$sponsor->date_from)?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">تاريخ نهاية الكفالة</label>
                                            <h4 class="form-control half input-style"><?=date("Y-m-d",$sponsor->date_to)?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">عددالدفعات</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->payments_num?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">عدد الايتام المكفولين</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->orphans_num?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">مبلغ الكفالة</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->value?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">نوع  الكفالة</label>
                                            <h4 class="form-control half input-style"><?=$sponsor_type[$sponsor->sponsor_type]?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">ملاحظات</label>
                                            <h4 class="form-control half input-style"><?=$sponsor->note?></h4>
                                        </div>

                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green half">الملفات المرفقة</label>
                                            <h4 class="form-control half input-style text-center">
                                                <?php if($sponsor->files != null) { ?>
                                                <a href="<?=base_url().'Finance_resource/download_sponsor_files/'.$sponsor->id?>"><i class="fa fa-download"></i></a>
                                                <? } ?>
                                            </h4>
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

                <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                            </div>
                            <div class="modal-body">
                                <p id="text">هل أنت متأكد من الحذف؟</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
    } 
    else {
        echo '<div class="alert alert-danger">لا توجد بيانات</div>';
    }
?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script type="text/javascript">
    function checkLength() {
        if($("#mobile").val() && $("#national_id").val()) {
            if($("#national_id").val().length != 10) {
                alert("رقم الهوية يجب أن يكون  10 أرقام");
                return false;
            }
            if($("#mobile").val().length != 10) {
                 alert("رقم الجوال يجب أن يكون  10 أرقام");
                return false;
            }
            if($("#account_number").val().length != 15 && $("#pay_method").val() > 2) {
                 alert("رقم الحساب يجب أن يكون  15 أرقام");
                return false;
            }
        }
    }

    function getEnable(argument) {
        if(argument > 2){
            $("#bank_id_fk").removeAttr('disabled');
            $("#account_number").attr('readonly',false);
            $("#bank_id_fk").attr('data-validation','required');
            $("#account_number").attr('data-validation','required');
        }
        else {
            $("#bank_id_fk").attr('disabled',true);
            $("#account_number").attr('readonly',true);
            $("#bank_id_fk").attr('data-validation','');
            $("#account_number").attr('data-validation','');
        }
    }
    
    function getRadioType(argument) {
        if(argument == 1){
            $("#job_type").removeAttr('disabled');
            $("#job_place").attr('readonly',false);
            $("#activity").attr('readonly',true);
            $("#activity").attr('data-validation','');
            $("#job_type").attr('data-validation','required');
            $("#job_place").attr('data-validation','required');
        }
        else {
            $("#job_type").attr('disabled',true);
            $("#job_place").attr('readonly',true);
            $("#job_type").attr('data-validation','');
            $("#job_place").attr('data-validation','');
            $("#activity").attr('readonly',false);
            $("#activity").attr('data-validation','required');
        }
    }
</script>