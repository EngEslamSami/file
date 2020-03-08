<style type="text/css">
    .line-text{
        display: inline-block;
        padding-left: 30px;
    }
</style>

<?php
 if(isset($all_orders)&&!empty($all_orders)){


?>

<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">

        </div>
        <div class="panel-body">
            

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="visible-md visible-lg">
                        <th>مسلسل</th>
                        <th>رقم الاسره</th>

                        <th>نوع العمليه</th>
                        <th>نتيجه الجلسه</th>
                        <th> تفاصيل</th>
                    </tr>

                    </thead>
                    <tbody>
                        

           



                    <?php
                    $x=1;
                    $arr=array(1=>"تم قبول الطلب",2=>" رفض الطلب",0=>"لم يتم النظر ففي الطلب");

if(isset($all_orders)&&!empty($all_orders)){

                    foreach($all_orders as $row2)




                        {?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $row2->mother_national_num;?></td>
                            <td><?php echo $row2->title;?></td>
                            <td style="color: red;"><?php echo $arr[$row2->approved_lagna];?></td>

                            <td>
                                <button data-toggle="modal"
                                        data-target="#modal-info<?php echo $row2->id;?>"
                                        class="btn btn-sm btn-info"><i
                                        class="fa fa-list btn-info"></i> تفاصيل الاسره
                                </button>




                            </td>



                        </tr>
                        <?php
                        $x++;
                    }
                    }
                    
                    ?>
                    </tbody>
                </table>
                
          
            <?php 
           if(isset($all_orders)&&!empty($all_orders)){
$m=0;
            foreach($all_orders as $row) {

           // print_r($row->mother_last_account);




                $id=$row->id;
            $result=$all_orders[$m]->mother;
            $father=$all_orders[$m]->father;
            $member_data=$all_orders[$m]->abnaa;
            $devices=$all_orders[$m]->devices;
            $home_needs=$all_orders[$m]->home_needs;
            $financial_data_income=$all_orders[$m]->financial_data_income;
            $financial_data_duties=$all_orders[$m]->financial_data_duties;
            $sakn=$all_orders[$m]->sakn;
                $searcher=$all_orders[$m]->searcher_opinion;
                $m++;
                $mother_last_account = $row->mother_last_account;
                $person_account = $row->person_account;
                $agent_bank_account = $row->agent_bank_account;
                $aproved=$row->approved_lagna;



                ?>


                <div class="modal" id="modal-info<?php echo $row->id;?>" tabindex="-1" role="dialog"
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
                                    <li role="presentation" class="active"><a href="#tab_forma1<?=$id?>"
                                                                              aria-controls="tab_forma1"
                                                                              role="tab" data-toggle="tab">بيانات الام
                                        </a></li>
                                    <li role="presentation"><a href="#tab_forma2<?=$id?>" aria-controls="tab_forma2"
                                                               role="tab" data-toggle="tab"> بيانات الاب </a>
                                    </li>
                                    <li role="presentation"><a href="#tab_forma3<?=$id?>" aria-controls="tab_forma3"
                                                               role="tab" data-toggle="tab">بيانات ابناء الاسره
                                             </a></li>
                                    <li role="presentation"><a href="#tab_forma4<?=$id?>" aria-controls="tab_forma4"
                                                               role="tab" data-toggle="tab">بيانات السكن</a></li>
                                    <li role="presentation"><a href="#tab_forma5<?=$id?>" aria-controls="tab_forma5"
                                                               role="tab" data-toggle="tab"> بيانات الاجهزه</a></li>
                                    <li role="presentation"><a href="#tab_forma6<?=$id?>" aria-controls="tab_forma6"
                                                               role="tab" data-toggle="tab"> احتياجات المنزل</a></li>
                                    <li role="presentation"><a href="#tab_forma7<?=$id?>" aria-controls="tab_forma7"
                                                               role="tab" data-toggle="tab"> بيانات الماليه</a></li>
                                   
                                </ul>
                            </div>
                            <div class="modal-body">
                                <div class="tab-content">


                                    <div role="tabpanel" class="tab-pane fade in active" id="tab_forma1<?=$id?>">
                                        <?php
                                        if($result->m_want_work==1  ){
                                            $val="نعم";
                                        }else{
                                            $val="لا";
                                        }
                                        if($result->m_hijri==1  ){
                                            $val="نعم";
                                        }else{
                                            $val="لا";
                                        }
                                        if($result->m_ommra==1  ){
                                            $val="نعم";
                                        }else{
                                            $val="لا";
                                        }
                                        $arr_yes_no=array('','نعم','لا');
                                        ?>


                <?php if($result =='' && $result ==null ){
                    ?>
                    <div class="col-lg-12 alert alert-danger" >لا توجد بيانات للام</div>

                <?php  }else { ?>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">رقم السجل المدني للأم<strong class="astric">*</strong>
                        </label>
                        <input type="text" name="" readonly="" value="<?php echo $row->mother_national_num; ?>"
                               class="form-control half input-style"/>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> الاسم الرباعي <strong class="astric">*</strong> </label>
                        <input type="text" name="fullname" value="<?php echo $result->full_name ?>"
                               class="form-control half input-style" data-validation="required" disabled/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">طبيعة الفرد<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="person_type"
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" disabled data-validation="required"
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php
                            foreach ($person_type as $row2):
                                $selected = '';
                                if ($row2->id_setting == $result->person_type) {
                                    $selected = 'selected';
                                } ?>
                                <option
                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">نوع الهوية<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_national_id_type"
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" disabled data-validation="required"
                                aria-required="true">
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
                        <label class="label label-green  half">رقم الهوية<strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" name="m_national_id" id="m_national_id" data-validation="required"
                               onkeyup="chek_length('m_national_id')" disabled
                               value="<?php echo $result->m_national_id ?>" onkeypress="validate_number(event)"
                               class="form-control half input-style"/>
                        <span id="m_national_id_span" class="span-validation"> </span>
                    </div>


                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">مصدر الهوية<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_card_source" id="m_card_source" disabled data-validation="required"
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" aria-required="true">

                            <option value="">إختر</option>
                            <?php if (!empty($id_source)) {
                                foreach ($id_source as $record) {
                                    $select = '';
                                    if ($result->m_card_source == $record->id_setting) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option
                                        value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <!--end here-->


                    <div class="form-group col-sm-4 col-xs-12">
                        <?php
                        $gregorian_date = explode('/', $result->m_birth_date); ?>

                        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                        <input class="textbox form-control" data-validation="required" type="text" disabled name="CDay"
                               pattern="\d*" onkeypress="return isNumberKey(event)"
                               onkeyup="moveOnMax(this,document.getElementById('CMonth'))" placeholder="day" id="CDay"
                               size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"
                               value="<?php if (!empty($gregorian_date[0])) {
                                   echo $gregorian_date[0];
                               } ?>"/>
                        <input class="textbox form-control" data-validation="required" type="text" disabled
                               name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)"
                               onkeyup="moveOnMax(this,document.getElementById('CYear'))" placeholder="month"
                               id="CMonth" size="20" maxlength="2" style="width: 16.6%;float: right;"
                               value="<?php if (!empty($gregorian_date[1])) {
                                   echo $gregorian_date[1];
                               } ?>"/>
                        <input class="textbox4 form-control" data-validation="required" type="text" disabled
                               name="CYear" id="CYear" pattern="\d*" onkeypress="return isNumberKey(event)"
                               onkeyup="chrToIsl(this.form);getAge();" placeholder="year" id="CYear" size="20"
                               maxlength="4" style="width: 16.6%;float: right;"
                               value="<?php if (!empty($gregorian_date[2])) {
                                   echo $gregorian_date[2];
                               } ?>"/>

                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <?php $hijri_date = explode('/', $result->m_birth_date_hijri); ?>
                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong>
                        </label>
                        <input class="textbox form-control" type="text" name="HDay" disabled pattern="\d*"
                               onkeypress="return isNumberKey(event)"
                               onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                               value="<?php if (!empty($hijri_date[0])) {
                                   echo $hijri_date[0];
                               } ?>" placeholder="day" id="HDay" size="20" maxlength="2"
                               style="width: 16.6%;float: right;"/>
                        <input class="textbox form-control" type="text" name="HMonth" disabled pattern="\d*"
                               onkeypress="return isNumberKey(event)"
                               onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                               value="<?php if (!empty($hijri_date[1])) {
                                   echo $hijri_date[1];
                               } ?>" placeholder="month" id="Hmonth" size="20" maxlength="2"
                               style="width: 16.6%;float: right;"/>
                        <input class="textbox4 form-control" type="text" name="HYear" disabled pattern="\d*"
                               onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)"
                               value="<?php if (!empty($hijri_date[2])) {
                                   echo $hijri_date[2];
                               } ?>" placeholder="year" id="HYear" size="20" maxlength="4"
                               style="width: 16.6%;float: right;"/>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong>
                        </label>
                        <input class="textbox2 form-control half " type="text" name="age" id="myage" readonly
                               value="<?php if (!empty($gregorian_date[2])) {
                                   echo(date('Y-m-d') - $gregorian_date[2]);
                               } ?>"/>
                        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd"
                               readonly/>
                        <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD" readonly/>
                    </div>


                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong>
                        </label>

                        <select name="m_nationality" id="m_nationality" data-validation="required" disabled
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" aria-required="true">
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
                                <option value="0"<?php if ($result->m_nationality == 0) echo "selected"; ?> >اخري
                                </option>
                            <?php } else {
                                ?>
                                <option value="" selected>اختر</option>
                                <option value="0"<?php if ($result->m_nationality == 0) echo "selected"; ?> >اخري
                                </option>
                                <?php
                            }
                            ?>
                        </select>


                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">اضافه جنسيه اخري<strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" name="nationality_other" id="nationality_other" disabled
                               value="<?php echo $result->nationality_other ?>"
                               class="form-control half input-style" <?php if ($result->nationality_other == "") { ?> disabled=""<?php } ?>/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحالة الإجتماعية<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_marital_status_id_fk" data-validation="required" disabled
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" aria-required="true">
                            <option value="">اختر</option>
                            <?php foreach ($marital_status_array as $row6):
                                $selected = '';
                                if ($row6->id_setting == $result->m_marital_status_id_fk) {
                                    $selected = 'selected';
                                } ?>
                                <option
                                    value="<?php echo $row6->id_setting; ?>" <?php echo $selected ?> ><?php echo $row6->title_setting; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <!--end here-->


                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">السكن<strong class="astric">*</strong><strong></strong>
                        </label>
                        <select name="m_living_place_id_fk" id="living_place_id" data-validation="required" disabled
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="" data-live-search="" aria-required="true">
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
                                <option value="0"<?php if ($result->m_living_place_id_fk == 0) echo "selected"; ?> >
                                    اخري
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="" selected>اختر</option>
                                <option value="0"<?php if ($result->m_living_place_id_fk == 0) echo "selected"; ?> >
                                    اخري
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">اضافه محل سكن<strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" name="m_living_place" id="m_living_place" disabled
                               value="<?php echo $result->m_living_place; ?>"
                               class="form-control half input-style" <?php if ($result->m_living_place == "") { ?> disabled=""<?php } ?> />
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">صلة القرابة<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_relationship" id="m_relationship" disabled data-validation="required"
                                aria-required="true" class="form-control half"
                                <?php if ($person_response == 0){ ?>disabled="disabled" <?php } ?>>
                            <option value="">إختر</option>
                            <?php if (!empty($relationships)) {
                                foreach ($relationships as $record) {
                                    $select = '';
                                    if ($result->m_relationship == $record->id_setting) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option
                                        value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>


                    <!--end here--         last>
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-sm-4 col-xs-12" >
                            <label class="label label-green  half">الحالة الدراسية <strong class="astric">*</strong><strong></strong> </label>
                            <select name="m_education_status_id_fk"  disabled  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" aria-required="true"  data-live-search="true" >
                                <option value="">اختر</option>
                                <?php
                    foreach ($arr_ed_state as $row5) {
                        $selected = '';
                        if ($row5->id_setting == $result->m_education_status_id_fk) {
                            $selected = 'selected';
                        } ?>
                                    <option value="<?php echo $row5->id_setting; ?>"  <?php echo $selected ?> ><?php echo $row5->title_setting; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12" >
                            <label class="label label-green  half">المستوى التعليمى <strong class="astric">*</strong><strong></strong> </label>
                            <select name="m_education_level_id_fk" disabled  id="educate"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true"  data-live-search="true" >
                                <option value="">اختر</option>
                                <?php
                    foreach ($education_level_array as $row4):
                        $selected = '';
                        if ($row4->id_setting == $result->m_education_level_id_fk) {
                            $selected = 'selected';
                        } ?>
                                    <option value="<?php echo $row4->id_setting; ?>"  <?php echo $selected ?> ><?php echo $row4->title_setting; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">التخصص <strong class="astric">*</strong><strong></strong> </label>
                            <input type="text" name="m_specialization"  disabled  data-validation="required" value="<?php echo $result->m_specialization ?>"  id="special" class="form-control half input-style"  />
                        </div>



                        <div class="form-group col-sm-4 col-xs-12"  >
                            <label class="label label-green  half">ملتحقة بدار نسائية<strong class="astric">*</strong><strong></strong> </label>
                            <select  name="m_female_house_check" id="eldar"  disabled class=" no-padding form-control choose-date form-control half " data-validation="required" aria-required="true"  >
                                <option value="">اختر</option>
                                <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                        $selected = '';
                        if ($r == $result->m_female_house_check) {
                            $selected = 'selected';
                        }
                        ?>
                                    <option value="<?php echo $r; ?>"  <?php echo $selected ?>  ><?php echo $arr_yes_no[$r]; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">اسم الدار <strong class="astric">*</strong><strong></strong> </label>
                            <select class=" no-padding form-control choose-date form-control half" disabled  name="m_female_house_id_fk"  id="m_female_house_id_fk" <?php if ($result->m_female_house_id_fk == "") { ?> disabled=""<?php } ?>>
                                <option value="">اختر</option>
                                <?php
                    foreach ($women_houses as $row4):
                        $selected = '';
                        if ($row4->id_setting == $result->m_female_house_id_fk) {
                            $selected = 'selected';
                        } ?>
                                    <option value="<?php echo $row4->id_setting; ?>"  <?php echo $selected ?> ><?php echo $row4->title_setting; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!--ahmed-->
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحالة الصحية<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_health_status_id_fk" disabled id="m_health_status_id_fk" onchange="check()"
                                data-validation="required"
                                class="selectpicker no-padding form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" aria-required="true">
                            <option value="">اختر</option>
                            <option value="disease"
                                    <?php if ($result->m_health_status_id_fk === 'disease'){ ?>selected <?php } ?>>مريض
                            </option>
                            <option value="disability"
                                    <?php if ($result->m_health_status_id_fk === 'disability'){ ?>selected <?php } ?>>
                                معاق
                            </option>
                            <?php
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
                        <label class="label label-green  half">نوع المرض<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="disease_id_fk" id="disease_id_fk" disabled
                                class=" no-padding form-control choose-date form-control half" aria-required="true"
                                disabled="disabled">
                            <option value="">اختر</option>
                            <?php
                            foreach ($diseases as $row3):
                                $selected = '';
                                if ($row3->id_setting == $result->disease_id_fk) {
                                    $selected = 'selected';
                                } ?>
                                <option value="<?php echo $row3->id_setting; ?>"
                                        disabled <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">نوع الإعاقة<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="disability_id_fk" id="disability_id_fk" disabled
                                class=" no-padding form-control choose-date form-control half" aria-required="true"
                                disabled="disabled">
                            <option value="">اختر</option>
                            <?php
                            foreach ($diseases as $row3):
                                $selected = '';
                                if ($row3->id_setting == $result->disability_id_fk) {
                                    $selected = 'selected';
                                } ?>
                                <option value="<?php echo $row3->id_setting; ?>"
                                        disabled <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">تاريخ المرض/الإعاقة <strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" name="dis_date_ar" id="dis_date_ar" disabled
                               value="<?php echo $result->dis_date_ar ?>"
                               class="form-control half input-style docs-date" data-validation="required"/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">سبب المرض/الإعاقة <strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" name="dis_reason" id="dis_reason" disabled
                               value="<?php echo $result->dis_reason ?>" class="form-control half input-style "
                               data-validation="required"/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="dis_response_status" id="dis_response_status" disabled
                                class=" no-padding form-control choose-date form-control half"
                                data-validation="required" aria-required="true">
                            <option value="">اختر</option>
                            <?php
                            foreach ($responses as $row3):
                                $selected = '';
                                if ($row3->id_setting == $result->dis_response_status) {
                                    $selected = 'selected';
                                } ?>
                                <option
                                    value="<?php echo $row3->id_setting; ?>" <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="dis_status" id="dis_status" disabled
                                class=" no-padding form-control choose-date form-control half"
                                data-validation="required" aria-required="true">
                            <option value="">اختر</option>
                            <?php
                            foreach ($diseases_status as $row3):
                                $selected = '';
                                if ($row3->id_setting == $result->dis_status) {
                                    $selected = 'selected';
                                } ?>
                                <option
                                    value="<?php echo $row3->id_setting; ?>" <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <!--ahmed-->


                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">أداء فريضة الحج<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_hijri"
                                class="selectpicker no-padding  disabled form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" data-validation="required"
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                $selected = '';
                                if ($r == $result->m_hijri) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option
                                    value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">أداء فريضة العمرة<strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_ommra"
                                class="selectpicker no-padding  disabled form-control choose-date form-control half"
                                data-show-subtext="true" data-live-search="true" data-validation="required"
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                $selected = '';
                                if ($r == $result->m_ommra) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option
                                    value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">رقم الجوال <strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" onkeypress="validate_number(event)" disabled name="m_mob"
                               value="<?php echo $result->m_mob ?>" id="m_mob" onkeyup="chek_length('m_mob')"
                               class="form-control half input-style" data-validation="required"/>
                        <span id="m_mob_span" class="span-validation"> </span>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">رقم جوال أخر <strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" onkeypress="validate_number(event)" disabled name="m_another_mob"
                               id="m_another_mob" onkeyup="chek_length('m_another_mob')"
                               value="<?php echo $result->m_another_mob ?>" class="form-control half input-style"
                               data-validation="required"/>
                        <span id="m_another_mob_span" class="span-validation"> </span>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">البريد الإلكترونى <strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="email" name="m_email" disabled value="<?php echo $result->m_email ?>"
                               class="form-control half input-style" data-validation="required"/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">المهارة<strong class="astric">*</strong><strong></strong>
                        </label>
                        <input type="text" name="m_skill_name" disabled value="<?php echo $result->m_skill_name ?>"
                               class="form-control half input-style" data-validation="required"/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحياة العملية <strong
                                class="astric">*</strong><strong></strong> </label>
                        <select name="m_want_work" id="m_want_work" disabled onchange="getWork();"
                                class=" no-padding form-control choose-date form-control half"
                                data-validation="required" aria-required="true">
                            <option value="">اختر</option>
                            <?php
                            $arr_work = array('', 'لا يعمل', 'يعمل');
                            for ($r = 1; $r < sizeof($arr_work); $r++) {
                                $selected = '';
                                if ($r == $result->m_want_work) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option
                                    value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_work[$r]; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong>
                        </label>
                        <select name="m_job_id_fk" id="m_job_id_fk"
                                class=" disabled  no-padding form-control choose-date form-control half "
                                aria-required="true" <?php if ($result->m_want_work == 1) { ?> disabled="disabled" <?php } ?> >
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
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الدخل الشهرى<strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" step="any" name="m_monthly_income" disabled
                               onkeypress="validate_number(event)" data-validation=""
                               value="<?php echo $result->m_monthly_income; ?>" id="mo-income"
                               class="form-control half input-style" <?php if ($result->m_want_work == 1) { ?>  disabled="disabled" <?php } ?>/>
                    </div>


                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">مكان العمل<strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" name="m_place_work" id="m_place_work" disabled data-validation=""
                               value="<?php echo $result->m_place_work; ?>"
                               class="form-control half input-style" <?php if ($result->m_want_work == 1) { ?>  disabled="disabled"  <?php } ?>/>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">هاتف العمل<strong
                                class="astric">*</strong><strong></strong> </label>
                        <input type="text" step="any" name="m_place_mob" disabled id="m_place_mob"
                               onkeyup="chek_length('m_place_mob')" onkeypress="validate_number(event)"
                               data-validation="" value="<?php echo $result->m_place_mob; ?>"
                               class="form-control half input-style" <?php if ($result->m_want_work == 1) { ?>  disabled="disabled"  <?php } ?>/>
                        <span id="m_place_mob_span" class="span-validation"> </span>
                    </div>


                    <?php


                    if ($mother_last_account == 0&& $agent_bank_account==0&& $person_account==0) { ?>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">مسئول الحساب<strong
                                    class="astric">*</strong><strong></strong> </label>
                            <select name="m_account" id="m_account" disabled onchange="checkMember_account();"
                                    class="form-control half">
                                <?php $yes_no = array('لا', 'نعم'); ?>
                                <option value="">إختر</option>
                                <?php for ($s = 0; $s < sizeof($yes_no); $s++) {
                                    $select = '';
                                    if ($result->m_account == $s) {
                                        $select = 'selected';
                                    } ?>
                                    <option
                                        value="<?php echo $s; ?>" <?php echo $select; ?>><?php echo $yes_no[$s]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">إسم الحساب<strong
                                    class="astric">*</strong><strong></strong> </label>
                            <select name="m_account_id" id="m_account_id" disabled class="form-control half   "
                                    disabled="disabled">
                                <?php $yes_no = array('لا', 'نعم'); ?>
                                <option value="">إختر</option>
                                <?php if (!empty($banks)) {
                                    foreach ($banks as $bank) {
                                        $select = '';
                                        if ($result->m_account_id > 0 && $result->m_account_id == $bank->id) {
                                            $select = 'selected';
                                        } ?>
                                        <option
                                            value="<?php echo $bank->id; ?>" <?php echo $select; ?>><?php echo $bank->bank_name; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    <?php } elseif ($result->m_account == 1) { ?>

                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">مسئول الحساب<strong
                                    class="astric">*</strong><strong></strong> </label>
                            <select name="m_account" id="m_account" disabled onchange="checkMember_account();"
                                    class="form-control half">
                                <?php $yes_no = array('لا', 'نعم'); ?>
                                <option value="">إختر</option>
                                <?php for ($s = 0; $s < sizeof($yes_no); $s++) {
                                    $select = '';
                                    if ($result->m_account == $s) {
                                        $select = 'selected';
                                    } ?>
                                    <option
                                        value="<?php echo $s; ?>" <?php echo $select; ?>><?php echo $yes_no[$s]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">إسم الحساب<strong
                                    class="astric">*</strong><strong></strong> </label>
                            <select name="m_account_id" id="m_account_id" class="form-control half   "
                                    disabled="disabled">
                                <?php $yes_no = array('لا', 'نعم'); ?>
                                <option value="">إختر</option>
                                <?php if (!empty($banks)) {
                                    foreach ($banks as $bank) {
                                        $select = '';
                                        if ($result->m_account_id == $bank->id) {
                                            $select = 'selected';
                                        } ?>
                                        <option
                                            value="<?php echo $bank->id; ?>" <?php echo $select; ?>><?php echo $bank->bank_name; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>


                    <?php }
                }?>

                                    </div>







                                    <div role="tabpanel" class="tab-pane fade in " id="tab_forma2<?=$id?>">
                                        <div class="panel-body"><br>

                                            <?php
                                            if(!empty($father) && $father!=null){
                                                $full_name =$father->full_name;

                                                $f_national_id=$father->f_national_id;
                                                $f_national_id_type=$father->f_national_id_type;//


                                                $f_birth_date=$father->f_birth_date;
                                                $f_job=$father->f_job;//
                                                $f_death_id_fk=$father->f_death_id_fk;//
                                                $f_child_num=$father->f_child_num;

                                                $f_nationality_id_fk=$father->f_nationality_id_fk;//
                                                $nationality_other =$father->nationality_other;

                                                $f_death_date=$father->f_death_date;
                                                $f_job_place=$father->f_job_place;
                                                $f_death_reason_fk=$father->f_death_reason_fk;
                                                $f_wive_count=$father->f_wive_count;//

                                                $f_birth_date = $father->f_birth_date;
                                                $f_birth_date_hijri = $father->f_birth_date_hijri;
                                                $f_birth_date_year =$father->f_birth_date_year;
                                                $f_birth_date_hijri_year =$father->f_birth_date_hijri_year;
                                                $family_members_number =$father->family_members_number;
                                                $f_card_source =$father->f_card_source;
                                            }else{
                                                $fullname ="";
                                                $disable="";

                                                $f_national_id_type='';//
                                                $f_national_id='';
                                                $f_birth_date='';
                                                $f_job="";//
                                                $f_death_id_fk='';//
                                                $f_child_num='';


                                                $f_nationality_id_fk='';//
                                                $nationality_other='';
                                                $f_death_date='';
                                                $f_job_place='';
                                                $f_death_reason_fk='';
                                                $f_wive_count='';//
                                                /*ahmed*/
                                                $f_birth_date ='';
                                                $f_birth_date_hijri ='';
                                                $f_birth_date_year ='';
                                                $f_birth_date_hijri_year ='';
                                                $family_members_number='';
                                                $f_card_source='';
                                                /*ahmed*/
                                            }
                                            ?>


                                            <?php if($father =='' && $father ==null){
                                                ?>
                                                <div class="col-lg-12 alert alert-danger" >لا توجد بيانات للاب</div>
                                            <?php }else{?>
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
                                                        <input type="text" name="mother_national"  data-validation="required"  disabled class="form-control half input-style" value="<?php echo $this->uri->segment(4);?>" />
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half"> الاسم رباعي <strong class="astric">*</strong> </label>
                                                        <input type="text" name="full_name"  data-validation="required" class="form-control half input-style" value="<?php echo$full_name;?>" disabled   />
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
                                                        <select  name="f_national_id_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" disabled  data-validation="required"  aria-required="true">
                                                            <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                                                <option value="">اختر</option>
                                                                <?php

                                                                foreach ($national_id_array as $row2):
                                                                    $selected='';if($row2->id_setting==$f_national_id_type){$selected='selected';}	?>
                                                                    <option value="<?php  echo $row2->id_setting;?>" <?php echo $selected?>  ><?php  echo $row2->title_setting;?></option>
                                                                <?php  endforeach;?>
                                                            <?php }else { ?>
                                                                <option value="" selected>اختر</option>
                                                                <option value="<?php  echo $row2->id_setting;?>" <?php echo $selected?>  ><?php  echo $row2->title_setting;?></option>
                                                                <?php
                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--ahmed-->
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                                                        <select  name="f_card_source" id="f_card_source" class="selectpicker no-padding form-control choose-date form-control half" disabled  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                                                            <option value="">إختر</option>
                                                            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                                                                $select=''; if($f_card_source==$record->id_setting){$select='selected'; }
                                                                ?>
                                                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                                                            <?php  } } ?>
                                                        </select>               </div>
                                                    <!--ahmed-->
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text" name="f_national_id"  data-validation="number" onkeypress="validate_number(event)" value="<?= $f_national_id;?>" id="f_national_id" disabled onkeyup="return valid();" class="form-control half input-style" />
                                                        <span  id="validate1"  style="font-size: 11px;" class="help-block col-xs-6"> </span>
                                                    </div>


                                                    <!--ahmed-->
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <?php
                                                        if(!empty($f_birth_date)){
                                                            $gregorian_date=explode('/',$f_birth_date); }  ?>
                                                        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                                                        <input class="textbox form-control" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))" disabled  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; } ?>"/>
                                                        <input class="textbox form-control" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))" disabled   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1]; }?>"/>
                                                        <input class="textbox4 form-control" type="text" name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();" disabled    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2]; }?>"/>
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <?php      if(!empty($f_birth_date_hijri)){
                                                            $hijri_date=explode('/',$f_birth_date_hijri); }?>
                                                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                                                        <input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" disabled value="<?php if(!empty($hijri_date[0])){ echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                                        <input class="textbox form-control" type="text" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" disabled value="<?php  if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                                        <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)" disabled value="<?php if(!empty($hijri_date[2])){ echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                                                    </div>

                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                                                        <input class="textbox2 form-control half " type="text" name="age" id="myage" id="wd"  value="<?php  if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }?>" readonly />
                                                        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
                                                        <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
                                                    </div>

                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">عدد الذكور<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text" name="male_number" id="male_number"  onkeypress="validate_number(event)" data-validation="required" disabled  onkeyup="getFamilyNumber();"   value="<?php echo $family_members_number;?>"  class="form-control half input-style" />
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">عدد الإناث<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text" name="female_number" id="female_number"  onkeypress="validate_number(event)" data-validation="required" disabled  onkeyup="getFamilyNumber();"   value="<?php echo $family_members_number;?>"  class="form-control half input-style" />
                                                    </div>

                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">عدد أفراد الاسرة<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text" name="family_members_number" id="family_members_number"  onkeypress="validate_number(event)" data-validation="required" disabled   readonly value="<?php echo $family_members_number;?>"  class="form-control half input-style" />
                                                    </div>

                                                    <!--ahmed-->



                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>

                                                        <select  name="f_nationality_id_fk" id="f_nationality_id_fk" disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                                                            <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                                                <option value=" " style="display: none;" selected="selected">اختر</option>

                                                                <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)):
                                                                    foreach($nationality as $one_nationality):
                                                                        $selected=''; if($one_nationality->id_setting == $f_nationality_id_fk){ $selected="selected";} ?>
                                                                        <option value="<?php echo $one_nationality->id_setting?>" <?php echo $selected?> ><?php echo $one_nationality->title_setting;?></option>

                                                                    <?php endforeach;endif;?>
                                                                <option value="0"<?php if($f_nationality_id_fk==0) echo "selected";?> >اخري</option>
                                                            <?php } else { ?>
                                                                <option value=" "  selected="selected">اختر</option>
                                                                <option value="0"<?php if($f_nationality_id_fk==0) echo "selected";?> >اخري</option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>


                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">اضافه جنسيه اخري<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text" name="nationality_other" id="nationality_other" disabled  data-validation="required"   value="<?php echo $nationality_other ?>" class="form-control half input-style" data-validation=""<?php if($nationality_other==""){?> disabled=""<?php }?> />
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong> </label>
                                                        <select id="f_job" name="f_job" class="selectpicker no-padding form-control choose-date form-control half" disabled  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >

                                                            <?php //$arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
                                                            <?php foreach($job_titles as $row){
                                                                $selected="";if($row->id_setting== $f_job){$selected="selected";} ?>
                                                                <option value="">اختر</option>
                                                                <option value="<?php echo $row->id_setting ; ?>" <?php echo $selected?> ><?php echo $row->title_setting;?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>



                                                </div>

                                                <div class="col-sm-12 col-xs-12">

                                                    <div class="form-group col-sm-4 col-xs-12 red box" style="display: none">
                                                        <label class="label label-green  half ">مكان العمل<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text" class="form-control half input-style" value="<?php echo $f_job_place ?>" disabled name="f_job_place" />

                                                    </div>



                                                    <div class="form-group col-sm-4 col-xs-12" >
                                                        <label class="label label-green  half">سبب الوفاة<strong class="astric">*</strong><strong></strong> </label>
                                                        <select  onchange="admSelectCheck(this);" name="f_death_id_fk" disabled class="selectpicker no-padding form-control choose-date form-control half"
                                                                 data-show-subtext="" data-live-search="true"  data-validation=""  aria-required="true"   >
                                                            <?php if(isset($arr_deth) &&!empty($arr_deth)) { ?>

                                                                <?php foreach ($arr_deth as $row) {
                                                                    $selected = "";
                                                                    if ($row->id_setting == $f_death_id_fk) {
                                                                        $selected = "selected";
                                                                    } ?>
                                                                    <option
                                                                        value="<?php echo $row->id_setting ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
                                                                <?php }
                                                            ; ?>
                                                                <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >اخري</option>
                                                                <?php
                                                            }else{?>
                                                                <option value="" selected> اختر</option>
                                                                <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >اخري</option>
                                                                <?php
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12"  id="admDivCheck" style="display:block;">

                                                        <label class="label label-green  half">السبب<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text"  class="form-control half input-style" disabled
                                                               value="<?php echo $f_death_reason_fk?>" name="f_death_reason_fk"
                                                               id="f_death_reason_fk" <?php if($f_death_reason_fk==""){?> disabled=""<?php }?>
                                                               data-validation="required" />

                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">تاريخ الوفاة<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="text" name="f_death_date" disabled   class="form-control half input-style docs-date" value="<?php echo $f_death_date ?>" data-validation="required"   />
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">عدد الأبناء<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="number"  name="f_child_num" disabled   data-validation="number" value="<?php echo $f_child_num ?>" class="form-control half input-style" />
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label label-green  half">عدد الزوجات<strong class="astric">*</strong><strong></strong> </label>
                                                        <input type="number" data-validation="required" disabled   id="wife" class="form-control half input-style" value="<?php echo $f_wive_count ?>" name="f_wive_count" />
                                                    </div>


                                                </div>

                                            <?php } ?>

                                        </div>

                                    </div>


                                    <div role="tabpanel" class="tab-pane fade in " id="tab_forma3<?=$id?>">
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



                                    <div role="tabpanel" class="tab-pane fade in " id="tab_forma4<?=$id?>">
                                        <?php
                                        if(isset($sakn) && $sakn!=null){
                                            $mother_name=$sakn->full_name;


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
                                                <input type="text"  value="<?= $mother_name ?>"  readonly="" class="form-control half input-style"   >
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
                                                <label class="label label-green  half">إسم المؤجر <strong class="astric">*</strong> </label>
                                                <input placeholder="إدخل البيانات " disabled type="text" class=" some_class form-control half input-style"  name="h_renter_name" id="h_renter_name" value="<?php echo $sakn->h_renter_name?>"   <?php if($sakn->h_house_owner_id_fk !='rent'){?>  disabled<?php } ?>  >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong><strong></strong> </label>
                                                <input type="text" name="h_renter_mob" disabled  id="h_renter_mob" onkeyup="chek_length('h_renter_mob');" placeholder="إدخل البيانات "   onkeyup="chek_length('h_renter_mob')" onkeypress="validate_number(event)"  class="form-control half input-style "  value="<?php echo $sakn->h_renter_mob;?>"  <?php if($sakn->h_house_owner_id_fk !=='rent'){?>  disabled<?php } ?>/>
                                                <span  id="h_renter_mob_span" class="span-validation"> </span>
                                            </div>


                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">تاريخ بداية العقد<strong class="astric">*</strong><strong></strong> </label>
                                                <input type="text" name="contract_start_date" disabled  id="contract_start_date"   placeholder="إدخل البيانات " class="form-control half input-style docs-date"  value="<?php echo $sakn->contract_start_date;?>"  <?php if($sakn->h_house_owner_id_fk!=='rent'){?>  disabled<?php } ?>/>
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">تاريخ نهاية العقد<strong class="astric">*</strong><strong></strong> </label>
                                                <input type="text" name="contract_end_date" disabled  id="contract_end_date"   placeholder="إدخل البيانات "  class="form-control half input-style docs-date"  value="<?php echo $sakn->contract_end_date;?>"  <?php if($sakn->h_house_owner_id_fk !='rent'){?>  disabled<?php } ?>/>
                                            </div>


                                            <div class="form-group col-sm-4">
                                                <label class="label label-green  half">مقدار الإيجار السنوى <strong class="astric">*</strong> </label>
                                                <input placeholder="إدخل البيانات " type="number" class=" some_class form-control half input-style" disabled name="h_rent_amount" value="<?= $h_rent_amount ?>"   >
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
                                            <div class="form-group col-sm-4">
                                                <label class="label label-green  half"> عدد دورات المياه  <strong class="astric">*</strong> </label>
                                                <input placeholder="إدخل البيانات " type="number" class=" some_class form-control half input-style" disabled name="h_bath_rooms_account"  value="<?= $h_bath_rooms_account ?>" >
                                            </div>
                                        </div>
                                        <?php }else{?>
                                              <div class="col-lg-12 alert alert-danger" >  لاتوجد بيانات سكن</div>
                                      <?php  } ?>




                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in " id="tab_forma5<?=$id?>">
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
                                    <div role="tabpanel" class="tab-pane fade in " id="tab_forma6<?=$id?>">
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
                                    <div role="tabpanel" class="tab-pane fade in " id="tab_forma7<?=$id?>">
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
                                <div class="detail" <?php if($aproved==1||$aproved==2) {?> style="display: none;" <?php }?>>
                                    <div class="form-group col-sm-4 col-xs-12 " style="display: ">
                                    <label class="pull-left">من فضلك اذكر السبب  </label>

                                    <textarea class="form-control txt2"> </textarea>

                                </div>
                                    <div class="form-group col-sm-4 col-xs-12" style="margin-top: 25px;">
                                <button type="button" class="btn btn-success accept pull-left" value="1"  row="<?=$id?>"onclick="change_aproved($(this).val(),$(this).attr('row'));">الموافقه </button>
                               

                                <button type="button" class="btn btn-danger notaccept pull-left" value="2"  row="<?=$id?>"  onclick="change_aproved($(this).val(),$(this).attr('row'));">الرفض</button>
                            </div>
                                
                            </div>
                            <?php if(($aproved==1)){?>
                            <div class="accept1">
                            <div class="col-xs-9 text-center  alert-success" style="padding: 9px;"> تمت الموافقه علي الطلب</div>
                             <div class="col-xs-3 text-center  " style="padding: 4px; padding-left: 10px;">
                            <button type="button" class="btn btn-danger notaccept pull-left back2" style="padding-right: 10px;" onclick="change_accept();"> 
                              تراجع عن الموافقه
                            </button>
                        </div>
                        </div>

                            <?php } ?>
                             <?php if(($aproved==2)){?>
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

        </div>
                <?php

            }
           }
            }else{?>
                </br>
                <div class="alert alert-danger">لايوجد اي طلبات مقدمه الي اللجنه</div>

                <?php
            }

            ?>

    </div>
</div>


<script>
    function getAllFamilyDetails(mother_num) {
        var dataString = 'mother_num=' + mother_num ;
        alert(dataString);
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Administrative_affairs/getFamilyDetails',
            data:dataString,
            cache:false,
            success: function(json_data){
                JSONObject =JSON.parse(json_data);
                  console.log(JSONObject);

            }
        });
        return false;


    }

</script>
    <script>
        function change_aproved(value,row)
        {
            var reason=$('.txt2').val();




 
            


            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>family_controllers/Lagna/change_aproved",
                data:{value:value,row:row,reason:reason},
                success:function(d){

                    alert(d);
                    location.reload();


                }

            });
        }



    </script>
    <script type="text/javascript">
        function change_not_accept()
        {
           $('.accept2').hide();
            $('.detail').show();
        }
        

    </script>
<script type="text/javascript">
        function change_accept()
        {
           $('.accept1').hide();
            $('.detail').show();
        }
        

    </script>