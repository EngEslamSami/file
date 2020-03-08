

<section class="contact-us">
    <div class="container-fluid">
        <div class="xs-heading row xs-mb-60">
        </div>

<?php
if(isset($_SESSION['message']))
echo $_SESSION['message'];
unset($_SESSION['message']);
?>

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
                  echo form_open_multipart('Web/addSponsor');
              ?>
        <div class="col-sm-4 padding-30 white_background">
            <div id="">
               <div  style="margin-bottom: 21px;">
                    <label class="right main-label  " >نوع المتبرع</label>
                   <?php
                   foreach ($type as $key => $value) {
                       $check = '';
                       if(isset($sponsor) && $sponsor['type'] == $key){
                           $check = 'checked';
                       }
                       ?>
                       &nbsp;&nbsp;&nbsp;
                       <input type="radio" name="type" data-validation="required" onclick="getRadioType($(this).val())" value="<?=$key?>"> <?=$value?>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <?php } ?>
              </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >إسم المستخدم</label>
                    <input type="text" name="user_name"  class="form-control col-xs-6 no-padding" placeholder="إسم المستخدم " id="user_name"  class="form-control" data-validation="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" > نوع الهوية  </label>
                    <select class="form-control col-xs-6 no-padding" name="identity_type" id="identity_type" data-validation="required" aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        foreach ($identity_type as $key => $value) {
                            ?>
                            <option value="<?=$key?>" ><?=$value?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >المهنة  </label>
                    <select class="form-control col-xs-6 no-padding" name="job_type" id="job_type" data-validation="<?=$required2?>" aria-required="true" <?=$disabled2?>>
                        <option value="">إختر</option>
                        <?php
                        foreach ($job_type as $key => $value) {
                            ?>
                            <option value="<?=$key?>"  ><?=$value?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >طريقة السداد  </label>
                    <select class="form-control col-xs-6 no-padding" name="pay_method" id="pay_method" data-validation="required" aria-required="true" onchange="getEnable($(this).val())">
                        <option value="">إختر</option>
                        <?php
                        foreach ($pay_method as $key => $value) {
                            ?>
                            <option value="<?=$key?>"  ><?=$value?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >عددالدفعات</label>
                    <input type="number" name="payments_num" placeholder="عددالدفعات" id="payments_num" class="form-control col-xs-6 no-padding" data-validation="required">
                </div>


                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >نوع الكفالة  </label>
                        <select class="form-control col-xs-6 no-padding" name="sponsor_type" id="sponsor_type" data-validation="required" aria-required="true" onchange="getEnable($(this).val())">
                            <option value="">إختر</option>
                            <?php
                            foreach ($sponsor_type as $key => $value) {
                                ?>
                                <option value="<?=$key?>" ><?=$value?></option>
                            <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >ملاحظات  </label>
                    <textarea name="note" class="col-xs-6 no-padding" data-validation="required"  placeholder="ملاحظات" ></textarea>
                </div>

                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >تاريخ تسجيل الكفالة  </label>
                    <input type="text" id="register_date" name="register_date" placeholder="تاريخ تسجيل الكفالة"  class="form-control col-xs-6 no-padding docs-date" data-validation="required" >
                </div>


            </div>
        </div>
        <div class="col-sm-4 padding-30 white_background">
            <div id="">
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >الإسم</label>
                    <input type="text" name="name" placeholder="الإسم" id="name"   class="form-control col-xs-6 no-padding half" data-validation="required">
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >كلمة المرور</label>
                    <input type="password" name="password"  class="form-control col-xs-6 no-padding" placeholder="كلمة المرور " id="password"  class="form-control" data-validation="required" autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >رقم الهوية  </label>
                    <input type="number" name="national_id" placeholder="رقم الهوية " id="national_id"  class="form-control col-xs-6 no-padding"  data-validation="required">
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >جهة العمل  </label>
                    <input type="text" name="job_place" placeholder="جهة العمل" id="job_place"  data-validation="<?=$required2?>" class="form-control col-xs-6 no-padding" <?=$readonly2?>>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >البنك</label>
                    <select class="form-control col-xs-6 no-padding" name="bank_id_fk" id="bank_id_fk" data-validation="<?=$required?>" aria-required="true" <?=$disabled?>>
                        <option value="">إختر</option>
                        <?php
                        if(isset($banks) && $banks != null){
                            foreach ($banks as $bank) {
                                ?>
                                <option value="<?=$bank->id?>"  ><?=$bank->title?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >عدد الايتام المكفولين</label>
                    <input type="number" name="orphans_num" placeholder="عدد الايتام المكفولين" id="orphans_num" class="form-control col-xs-6 no-padding" data-validation="required">
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >رفع ملفات</label>
                    <input type="file" name="file_name[]" multiple>
                    <?php if(isset($donor)) { ?>
                        <span class="help-block form-error alert-danger">لا تريد التغيير .. لا ترفع أي ملف</span>
                    <? } ?>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >تاريخ بداية الكفالة</label>
                    <input type="text" id="date_from" name="date_from" placeholder="تاريخ بداية الكفالة"  class="form-control col-xs-6 no-padding docs-date" data-validation="required" >
                </div>
            </div>
        </div>
        <div class="col-sm-4 padding-30 white_background">
            <div id="">
                <div  style="margin-bottom: 21px;">
                    <label class="right main-label col-xs-3 no-padding" >الجنس</label>
                    <?php
                    foreach ($gender_type as $key => $value) {
                        ?>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" data-validation="required"  > <?=$value?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >الجنسية</label>
                    <select class="form-control col-xs-6 no-padding selectpicker" data-live-search="true" name="nationality_id_fk" id="nationality_id_fk" data-validation="required" aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        if(isset($nationalities) && $nationalities != null){
                            foreach ($nationalities as $nationality) {

                                ?>
                                <option value="<?=$nationality->id?>"  ><?=$nationality->title?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >رقم الجوال  </label>
                    <input type="number" name="mobile" placeholder="رقم الجوال " id="mobile"   class="form-control col-xs-6 no-padding" data-validation="required">
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >نشاط المؤسسة  </label>
                    <input type="text" name="activity" placeholder="نشاط المؤسسة" id="activity"   class="form-control col-xs-6 no-padding" data-validation="required" <?=$readonly3?>>
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >رقم الحساب  </label>
                    <input type="number" name="account_number" placeholder="رقم الحساب " id="account_number"  class="form-control col-xs-6 no-padding" data-validation="required" <?=$readonly?>>
                </div>

                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >مبلغ الكفالة</label>
                    <input type="number" name="value" placeholder="مبلغ الكفالة" id="value" class="form-control col-xs-6 no-padding" data-validation="required">
                </div>

                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >البريد الإلكتروني  </label>
                    <input type="email" name="email" placeholder="البريد الإلكتروني" id="email"  class="form-control col-xs-6 no-padding" autocomplete="false" data-validation="required">
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-3 no-padding" >تاريخ نهاية الكفالة</label>
                    <input type="text" id="date_to" name="date_to" placeholder="تاريخ نهاية الكفالة" class="form-control col-xs-6 no-padding docs-date"  data-validation="required" >
                </div>

            </div>
        </div>
        <div class="form-group ">
            <div class="padding-30" >
                <input  type="submit" name="add" value="حفظ" class="btn btn-purple tbra" onclick="return checkLength();"/>
            </div>
        </div>

        <?php echo form_close()?>
    </div>
</section>



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