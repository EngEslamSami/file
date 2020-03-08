
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >

<style type="text/css">
    .cover-page {
        min-height: 480px;
    }
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
        width: 30%;
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

    @media all {
        .page-break	{ display: none; }
    }

    @media print {
        .page-break	{ display: block; page-break-before: always; margin-bottom: 50px; }
    }

    table th {

        font-weight: 500;
    }

</style>
<body onload="printDiv('printDiv')" id="printDiv">


    <!-- <section class="main-body" >
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                    <div class="col-xs-12">
                        <img src="<?php echo base_url();?>asisst/admin_asset/img/11.png" alt="" style="position: absolute; width: 96%; height: 940px; margin-top: 15px;">
                    </div>
                    <div class="col-xs-12" style="margin-top: 70px">
                        <div class="col-xs-5">
                            <h4 class="text-center">المملكة العربية السعودية </h4>
                            <h4 class="text-center">الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء </h4>
                        </div>
                    </div>
                    <div class="col-xs-12 cover-page" style="margin-top: 70px;">
                        <img style="height: 500px;" src="<?php echo base_url();?>asisst/admin_asset/img/logo.png" alt="" class="center-block">
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-7"></div>
                        <div class="col-xs-5">
                            <h4 class="text-center"> توقيع </h4>
                            <p class="text-center">....................</p>
                        </div>
                    </div>
                </div>
    </section> -->

    <div class="page-break"></div>
    <?php if ($tables['employees'] != '' && $tables['employees'] != null && !empty($tables['employees'])) {  ?>
        <?php
        if ($tables['employees'] != '' && $tables['employees'] != null && !empty($tables['employees'])) {  ?>
            <div class="header col-xs-12 no-padding">
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                </div>
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
            </div>
            <div class="col-xs-12 Title">
                <h5 class="text-center"><br><br> <strong>البيانات الأساسية</strong></h5><br>
            </div>
            
            <section class="main-body">
                <div class="container">
                    <div class="print_forma no-border col-xs-12 no-padding">
                        <div class="personality">
                            <div class="col-xs-12 no-padding">
                                <table class="table table-bordered table-devices">
                                    <tbody>
                                    <tr>
                                        <th class="gray_background"  >الرقم الوظيفي</th>
                                        <td><?php  if(!empty($tables['employees']->emp_code)){ echo $tables['employees']->emp_code; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background"  >إسم الموظف</th>
                                        <td><?php  if(!empty($tables['employees']->employee)){ echo $tables['employees']->employee; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background"  >النوع</th>
                                        <td><?php if(!empty($gender_data[$tables['employees']->gender])){
                                                echo $gender_data[$tables['employees']->gender]; }else{ echo'غيرمحدد'; } ?></td>
                                        <th class="gray_background"  >الجنسيه</th>
                                        <td><?php   if(!empty($nationality[$tables['employees']->nationality])){
                                                echo $nationality[$tables['employees']->nationality]; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >الديانه</th>
                                        <td><?php  if(!empty($deyana[$tables['employees']->deyana])){
                                                echo$deyana[$tables['employees']->deyana]; }else{ echo'غيرمحدد'; } ?></td>
                                        <th class="gray_background"  >الحاله الاجتماعيه</th>
                                        <td><?php  if(!empty($social_status[$tables['employees']->status])){
                                                echo $social_status[$tables['employees']->status];
                                            }else{ echo'غيرمحدد'; }?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background">تاريخ الميلاد</th>
                                        <td><?php  if(!empty($tables['employees']->birth_date_m)){ echo $tables['employees']->birth_date_m; }else{ echo'غيرمحدد';}?></td>

                                        <?php $age =$tables['employees']->birth_date_h;
                                        $age =explode('/',$age);
                                        ?>
                                        <th class="gray_background">العمر</th>
                                        <td><?php if(!empty($age[2])){ echo $current_hijry_year-$age[2]; }else{  echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background">رقم الجوال</th>
                                        <td><?php  if(!empty($tables['employees']->phone)){ echo $tables['employees']->phone; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background">رقم جوال أخر</th>
                                        <td><?php  if(!empty($tables['employees']->another_phone)){ echo $tables['employees']->another_phone; }else{ echo'غيرمحدد';}?></td>
                                    </tr>

                                    <tr>
                                        <th class="gray_background"  >نوع الهوية</th>
                                        <td><?php if(!empty($type_card[$tables['employees']->type_card])){
                               echo $type_card[$tables['employees']->type_card]; }else{ echo'غيرمحدد'; }?> </td>
                                        <th class="gray_background"  >رقم الهويه </th>
                                        <td><?php  if(!empty($tables['employees']->card_num)){ echo $tables['employees']->card_num; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >جهه الاصدار</th>
                                        <td><?php if(!empty($dest_card[$tables['employees']->dest_card])){
                                   echo $dest_card[$tables['employees']->dest_card]; }else{ echo 'غير محدد';} ?></td>
                                        <th class="gray_background"  >تاريخ الاصدار</th>
                                        <td><?php  if(!empty($tables['employees']->esdar_date_m)){ echo $tables['employees']->esdar_date_m; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >تاريخ الانتهاء</th>
                                        <td><?php  if(!empty($tables['employees']->end_date_m)){ echo $tables['employees']->end_date_m; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >المدينة</th>
                                        <td><?php if(!empty($cities[$tables['employees']->city_id_fk])){
                                            echo $cities[$tables['employees']->city_id_fk]; }else{ echo'غيرمحدد';} ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >الحي</th>
                                        <td><?php if(!empty($hai[$tables['employees']->hai_id_fk])){
                                                echo $hai[$tables['employees']->hai_id_fk]; }else{ echo'غيرمحدد'; } ?></td>
                                        <th class="gray_background" >اسم الشارع</th>
                                        <td><?php  if(!empty($tables['employees']->street_name)){ echo $tables['employees']->street_name; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >العنوان الوطني</th>
                                        <td><?php  if(!empty($tables['employees']->adress)){ echo $tables['employees']->adress; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >العنوان في بلد المقيم</th>
                                        <td><?php  if(!empty($tables['employees']->adress_other)){ echo $tables['employees']->adress_other; }else{ echo'غيرمحدد';}?></td>

                                    </tr>
                                    <tr>
                                        <th class="gray_background" >البريد الإلكتروني</th>
                                        <td><?php  if(!empty($tables['employees']->email)){ echo $tables['employees']->email; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >سناب شات </th>
                                        <td><?php  if(!empty($tables['employees']->snap_chat)){ echo $tables['employees']->snap_chat; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >تويتر</th>
                                        <td><?php  if(!empty($tables['employees']->twiter)){ echo $tables['employees']->twiter; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="special col-xs-12 ">
                            <br><br>
                            <div class="col-xs-4 text-center">
                                <label> الختم </label><br><br>
                            </div>
                            <div class="col-xs-4 text-center">

                            </div>
                            <div class="col-xs-4 text-center">
                                <label>المدير المالى </label><br><br>
                                <p>....................</p><br>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </section>
            <div class="page-break"></div>
        <?php } ?>
        <!-------------- بيانات الوظيفية ---------------->



        <?php if ($tables['finance_employes'] != '' && $tables['finance_employes']!= null && !empty($tables['finance_employes'])) {  ?>
            <div class="header col-xs-12 no-padding">
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                </div>
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
            </div>
            <div class="col-xs-12 Title">
                <h5 class="text-center"><br><br> <strong>البيانات المالية</strong></h5><br>
            </div>

            <section class="main-body">
                <div class="container">
                    <div class="print_forma no-border col-xs-12 no-padding">
                        <div class="personality">

                            <div class="col-xs-12 no-padding">

                                <table class="table table-bordered table-devices">
                                    <tbody>
                                    <tr>
                                        <th class="gray_background"  >كود الموظف</th>
                                        <td><?php echo $tables['finance_employes']->emp_code;?> </td>
                                        <th class="gray_background"  >إسم الموظف</th>
                                        <td><?php echo $tables['employees']->employee;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >مركز التكلفة</th>
                                        <td>

                                            <?php

                                            if(isset($markz)&&!empty($markz)) {
                                                $title='غيرمحدد';
                                                if(isset($allData->markz )&&!empty($allData->markz) ){
                                                    $markz_id =    $allData->markz;
                                                }else{
                                                    $markz_id = "" ;
                                                }
                                                foreach($markz as $row){
                                                    if($row->id_setting==  $markz_id){

                                                         $title=$row->title_setting;

                                                    }

                                                }
                                                echo $title;
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <?php
                                if(isset($allData->badlat)&&!empty($allData->badlat)) { ?>
                                <h5 class="text-center"><br><br> <strong>بيانات الاستحقاقات</strong></h5><br>

                                <table class="table table-bordered table-devices">
                                    <thead>
                                    <tr class="info">
                                        <th>إسم البند	</th>
                                        <th>طريقه الحساب</th>
                                        <th>القيمه</th>
                                        <th>محدد المده	</th>
                                        <th>من تاريخ</th>
                                        <th>الي تاريخ</th>
                                        <th>يخضع للتأمينات	</th>
                                        <th>الدليل	</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <?php

                                        foreach ($allData->badlat as $record) {
                                            if (in_array($record->badl_discount_id_fk, $bdalat_id)) {?>
                                                <tr>
                                                    <td ><?php
                                                            if (isset($badalat) && !empty($badalat)) {
                                                                $title='غيرمحدد';
                                                                foreach ($badalat as $row) { ?>

                                                                    <?php if($row->id==$record->badl_discount_id_fk){     $title =$row->title; }?>
                                                                <?php } echo$title;
                                                            } ?>
                                                    </td>
                                                    <td >
                                                        <?php if($record->method_to_count==1){ echo 'قيمه';}elseif($record->method_to_count==2){ echo'نسبه'; } ?>
                                                    </td>
                                                    <td>
                                                      <?php echo $record->value;?>
                                                    </td>
                                                    <?php
                                                    $yes_no=array(1=>'نعم',2=>'لا'); ?>
                                                    <td>
                                                            <?php
                                                            $title='غيرمحدد';
                                                            foreach ($yes_no as $key=>$value){
                                                       if ($key==$record->specific_period){    $title=$value ; }
                                                                }  echo $title;?>
                                                    </td>
                                                    <td>
                                                       <?php  if($record->specific_period==1) {  echo $record->date_from;  }else{ echo'غيرمحدد';} ?>
                                                    </td>
                                                    <td>
                                                       <?php  if($record->specific_period==1) {  echo $record->date_to;  }else{ echo'غيرمحدد';} ?>
                                                    </td>
                                                    <td>
                                                        <?php if($record->insurance_affect==1){ echo 'نعم' ;}?>
                                                    </td>
                                                    <td>
                                                        <?php if($record->dalel_code==1){ echo 1;}elseif($record->dalel_code==2){echo 2; }?>
                                                    </td>
                                                </tr>

                                                <?php  }  }       ?>

                                    <tr class="green_background">
                                        <td colspan="7"  >اجمالي البنود الخاضعه للتأمينات</td>
                                        <td><?php if(isset($allData->badlat)&&!empty($allData->badlat)){echo $allData->tamin_value; } else { echo 0 ; } ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                <?php  } ?>

                                <?php
                                if(isset($allData->badlat)&&!empty($allData->badlat)) { ?>
                                <h5 class="text-center"><br><br> <strong>بيانات الاستقطاعات</strong></h5><br>

                                <table class="table table-bordered table-devices">
                                    <thead>
                                    <tr class="info">
                                        <th>إسم البند	</th>
                                        <th>طريقه الحساب</th>
                                        <th>القيمه</th>
                                        <th>محدد المده	</th>
                                        <th>من تاريخ</th>
                                        <th>الي تاريخ</th>
                                        <th>يخضع للتأمينات	</th>
                                        <th>الدليل	</th>
                                    </tr>

                                    </thead>
                                    <tbody>

                                           <?php
                                        foreach ($allData->badlat as $record) {
                                            if (in_array($record->badl_discount_id_fk, $cuts_id)) {
                                                ?>

                                                <tr>
                                                    <td>
                                                            <?php
                                                            if (isset($discounts) && !empty($discounts)) {
                                                                $title='غيرمحدد';
                                                                foreach ($discounts as $row) {
                                                                    if($row->id==$record->badl_discount_id_fk){ echo $title=$row->title; }
                                                           }
                                                                echo $title;
                                                            } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($record->method_to_count==1){ echo 'قيمه';}elseif($record->method_to_count==2){ echo'نسبه'; } ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $record->value;?>
                                                    </td>

                                                    <?php
                                                    $yes_no=array(1=>'نعم',2=>'لا'); ?>
                                                    <td>
                                                       <?php     foreach ($yes_no as $key=>$value){
                                                          if ($key==$record->specific_period){ echo $value; }  } ?>
                                                    </td>
                                                    <td>
                                                        <?php  if($record->specific_period==1) {  echo $record->date_from;  }else{ echo'غيرمحدد'; } ?>
                                                    </td>
                                                    <td>
                                                        <?php  if($record->specific_period==1) {  echo $record->date_to;  }else{ echo'غيرمحدد'; } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($record->insurance_affect==1){ echo 'نعم' ;}?>
                                                    </td>
                                                    <td>
                                                        <?php if($record->dalel_code==1){ echo 1;}elseif($record->dalel_code==2){echo 2; }?>
                                                    </td>

                                                </tr>
                                                <?php }  }    ?>
                                    <tr class="">

                                        <td colspan="7">إجمالي بنود الإستقطاعات</td>
                                        <td><?php if(isset($allData->badlat)&&!empty($allData->badlat)){echo $allData->get_discut_value; } else{ echo 0 ;}?> </td>
                                      </tr>
                                    </tbody>
                              </table>
                                    <?php } ?>


                                <?php      if(!empty($allData->Banks)) { ?>
                                <h5 class="text-center"><br><br> <strong>  بيانات الحسابات البنكية</strong></h5><br>


                                <table class="table table-bordered table-devices">
                                    <thead>
                                    <tr class="info">
                                        <th>إسم البنك</th>
                                        <th>كود البنك</th>
                                        <th>رقم الحساب</th>
                                        <th>حالة البنك</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        foreach ($allData->Banks as $key => $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                        <?php
                                                        if (isset($banks) && $banks != null) {
                                                            $title='غيرمحدد';
                                                            foreach ($banks as $bank) {
                                                                if($bank->id == $value->bank_id_fk) {
                                                                     $title=$bank->ar_name;
                                                                }
                                                                ?>
                                                                <?php } echo $title; } ?>
                                                </td>
                                                <td>
                                                    <?php if(!empty($value->bank_code)){ echo $value->bank_code; }else{  echo 'غيرمحدد'; } ?>
                                                </td>
                                                <td>

                                                    <?php if(isset($value->bank_account_num)){ echo $value->bank_account_num;}else{ echo 'غيرمحدد'; } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($value->approved_for_sarf==0) {
                                                        echo 'غير نشط';
                                                    }elseif($value->approved_for_sarf==1){
                                                        echo ' نشط';
                                                    }else{
                                                        echo ' غير محدد';
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                            <?php }  ?>

                                    </tbody>
                                </table>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="special col-xs-12 ">
                            <br><br>
                            <div class="col-xs-4 text-center">
                                <label> الختم </label><br><br>
                            </div>
                            <div class="col-xs-4 text-center">
                            </div>
                            <div class="col-xs-4 text-center">
                                <label>المدير المالى </label><br><br>
                                <p>....................</p><br>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <div class="page-break"></div>






        <!-------------- بيانات التعاقد---------------->
        <?php
        if ($tables['contract_employe']  != '' && $tables['contract_employe'] != null && !empty($tables['contract_employe'])) {

            $work_types=array("1"=>"فترة","2"=>"فترتين");
            $yes_no=array("1"=>"نعم","2"=>"لا");
            $paid_type=array("1"=>"نقدي","2"=>"شيك","3"=>"تحويل بنكي");
            ?>
            <div class="header col-xs-12 no-padding">
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                </div>
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
            </div>
            <div class="col-xs-12 Title">
                <h5 class="text-center"><br><br> <strong>بيانات التعاقد</strong></h5><br>
            </div>
            <section class="main-body">
                <div class="container">
                    <div class="print_forma no-border col-xs-12 no-padding">
                        <div class="personality">

                            <div class="col-xs-12 no-padding">

                                <table class="table table-bordered table-devices">
                                    <tbody>
                                    <tr>
                                        <th class="gray_background"  > كود الموظف </th>
                                        <td>   <?php  if(!empty($tables['contract_employe']->emp_code)){
                                                echo $tables['contract_employe']->emp_code; }else{ echo'غيرمحدد'; } ?></td>
                                        <th class="gray_background" >إسم الموظف</th>
                                        <td><?php  if(!empty($tables['employees']->employee)){
                                                echo $tables['employees']->employee; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    <tr>
                                    <th class="gray_background" >طبيعة العقد </th>
                                  <td><?php  if(!empty($tables['employees']->employee)){
                                          echo $tables['employees']->employee; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background"  > إيام العمل خلال الشهر </th>
                                        <td>   <?php  if(!empty($tables['contract_employe']->num_days_in_month)){
                                                echo $tables['contract_employe']->num_days_in_month; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >ساعات العمل</th>
                                      <td><?php  if(!empty($tables['employees']->hours_work)){
                                              echo $tables['employees']->hours_work; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background"  > أجر الساعة </th>
                                        <td>   <?php  if(!empty($tables['contract_employe']->hour_value)){
                                                echo $tables['contract_employe']->hour_value; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >فترات العمل</th>
                                        <td>
                                            <?php      if(!empty($work_types)){
                                                $title='غيرمحدد';
                                            foreach($work_types as $key=>$value){

                                                if ($key == $tables['contract_employe']->work_period_id_fk) {
                                                    $title=$value;
                                                } ?>
                                            <?php } echo $title; } ?></td>
                                        <th class="gray_background"  > الأجازة السنوية </th>
                                        <td>   <?php  if(!empty($tables['contract_employe']->year_vacation_num)){
                                                echo $tables['contract_employe']->year_vacation_num; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >المدة المستحقة عنها</th>
                                        <td>
                                            <?php
                                            $arr_time= array(360=>'سنة',720=>'سنتين');

                                                if ($tables['contract_employe']->year_vacation_period == 360) {
                                                    echo'سنة';
                                                }elseif($tables['contract_employe']->year_vacation_period == 720){
                                                    echo'سنتين';

                                                }else{ echo'غيرمحدد'; } ?>
                                            <?php  ?></td>

                                        <th class="gray_background"  >رصيد الاجازة السنوية السابقة </th>
                                        <td>   <?php  if(!empty($tables['contract_employe']->vacation_previous_balance)){
                                                echo $tables['contract_employe']->vacation_previous_balance; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >بداية حساب الاجازة</th>
                                        <td>   <?php  if(!empty($tables['contract_employe']->vacation_start)){
                                                echo $tables['contract_employe']->vacation_start; }else{ echo'غيرمحدد'; } ?></td>

                                        <th class="gray_background"  >الأجازة الاضطرارية </th>
                                        <td>   <?php  if(!empty($tables['contract_employe']->casual_vacation_num)){
                                                echo $tables['contract_employe']->casual_vacation_num; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >تذاكر سفر</th>
                                        <td>
                                            <?php
                                            $title='غيرمحدد';
                                            foreach($yes_no as $key=>$value){
                                                if ($key == $tables['contract_employe']->travel_ticket) {
                                                    $title=$value;

                                                } ?>
                                            <?php }    echo $title;?></td>
                                        <th class="gray_background" >نوع التذكرة</th>
                                        <td>
                                            <?php
                                            if(!empty($tickets)){
                                                $title='غيرمحدد';
                                            foreach($tickets as $row2){

                                                if ($row2->id_setting == $tables['contract_employe']->travel_type_fk) {
                                                    $title =$value;
                                                } ?>
                                            <?php } echo $title; } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background"  >تحديد المدة </th>
                                        <td>
                                            <?php
                                            if ($tables['contract_employe']->year_vacation_period == 360) {
                                            echo 360;
                                            }elseif($tables['contract_employe']->year_vacation_period == 720){
                                            echo 720;

                                            }else{ echo'غيرمحدد';}
                                           ?></td>

                                        <th class="gray_background" >طريقة دفع الراتب</th>
                                        <td>
                                            <?php
                                            if(!empty($paid_type)){
                                                $title='غيرمحدد';
                                            foreach($paid_type as $key=>$value){
                                                if ($key == $tables['contract_employe']->pay_method_id_fk) {
                                                    $title =$value;
                                                } ?>
                                            <?php }  echo$title; } ?>
                                        </td>
                                    </tr>

                                    <tr>


                                        <th class="gray_background"  >مكافأة نهاية الخدمة </th>
                                        <td>
                                            <?php
                                            foreach($yes_no as $key=>$value){
                                                $title='غيرمحدد';
                                                if ($key == $tables['contract_employe']->reward_end_work) {
                                                    $title =$value;
                                                }?>
                                            <?php }  echo$title;  ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="special col-xs-12 ">
                            <br><br>

                            <div class="col-xs-4 text-center">
                                <label> الختم </label><br><br>
                            </div>
                            <div class="col-xs-4 text-center">

                            </div>
                            <div class="col-xs-4 text-center">

                                <label>المدير المالى </label><br><br>
                                <p>....................</p><br>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </section>
            <div class="page-break"></div>
        <?php } ?>


        <!-------------- بيانات الدوام ---------------->
        <?php


        if ($tables['emp_always_times'] != '' && $tables['emp_always_times'] != null && !empty($tables['emp_always_times'])) {  ?>
            <div class="header col-xs-12 no-padding">
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                </div>
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
            </div>
            <div class="col-xs-12 Title">
                <h5 class="text-center"><br><br> <strong>بيانات العهد</strong></h5><br>
            </div>

            <section class="main-body">
                <div class="container">
                    <div class="print_forma no-border col-xs-12 no-padding">
                        <div class="personality">

                            <div class="col-xs-12 no-padding">
                                <table class="table table-bordered table-devices">
                                    <tbody>
                                    <tr>
                                        <th class="gray_background"  > كود الموظف </th>
                                        <td>   <?php  if(!empty($tables['employees']->emp_code)){
                                                echo $tables['employees']->emp_code; }else{ echo'غيرمحدد'; } ?></td>
                                        <th class="gray_background" >إسم الموظف</th>
                                        <td><?php  if(!empty($tables['employees']->employee)){
                                                echo $tables['employees']->employee; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >إسم جهاز البصمة </th>
                                        <td>
                                            <?php
                                            $title='غيرمحدد';
                                            foreach($printer_machine as $machine){
                                                if ($machine->id_setting == $tables['period_emp_details']->device_id_fk) {
                                                    $title=$machine->title_setting;
                                                }
                                                ?>

                                            <?php }   echo $title; ?>
                                        </td>
                                        <th class="gray_background"  > رقم الموظف بجهاز البصمة </th>
                                        <td>   <?php  if(!empty($tables['period_emp_details']->num_in_device)){
                                                echo $tables['period_emp_details']->num_in_device; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <?php if(!empty($tables['emp_always_times'])){ foreach ($tables['emp_always_times'] as $sub){ ?>

                                <table class="table table-bordered table-devices">
                                    <tbody>
                                    <tr>
                                        <th class="gray_background"  > إسم الدوام </th>
                                        <td>   <?php  if(!empty($sub->name)){
                                                echo $sub->name; }else{ echo'غيرمحدد'; } ?></td>
                                        <th class="gray_background" >عدد الفترات</th>
                                        <td><?php  if(!empty($sub->period_num)){
                                                echo sizeof($sub->period_num); }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>

                                    </tbody>
                                </table>

                                <?php
                                $work_days=array("1"=>"السبت","2"=>"الأحد","3"=>"الأثنين","4"=>"الثلاثاء","5"=>"الأربعاء","6"=>"الخميس","7"=>"الجمعة");
                                $arr_time =array(1=>'الفترة الأولي',2=>'الفترة الثانية',3=>'الفترة الثالثة',4=>'الفترة الرابعة',5=>'الفترة الخامسة');
                                $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
                                $days_ar =array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");

                             if(!empty($sub->period_num)){ foreach ($sub->period_num as $row){
                                 $arr_days=array();
                                 for ($a=0;$a<sizeof($days_ar);$a++){   $myday =$days_en[$a];?>
                                         <?php if( $row->$myday ==1){ $arr_days[] =$days_ar[$a]; } ?>

                                 <?php    }
                                 $days =implode(' / ', $arr_days);
                                 //echo$days;
                                 ?>

                                 <table class="table table-striped table-bordered" width="100%" id="">
                                     <thead >

                                     <tr  class="info">
                                         <th colspan="6" >بيانات الدوام </th>
                                     </tr>
                                     <tr class="gray_background">
                                         <th colspan="6" style="text-align: center"><?php  echo$days; ?> </th>
                                     </tr>
                                     </thead>

                                     <tbody  >
                                     <tr class="">
                                         <th class="gray_background">الفترة</th>
                                         <td><?=$arr_time[$row->id]?></td>
                                         <th class="gray_background">وقت الحضور </th>
                                         <td><?=$row->attend_time?></td>
                                         <th class="gray_background">وقت الإنصراف</th>
                                         <td><?=$row->leave_time?></td>
                                     </tr>
                                     <tr >
                                         <th class="gray_background">بدايه تسجيل الدخول</th>
                                         <td><?=$row->start_enter?></td>
                                         <th class="gray_background">نهايه تسجيل الدخول</th>
                                         <td><?=$row->end_enter?></td>
                                         <th class="gray_background"> بدايه تسجيل الخروج</th>
                                         <td><?=$row->start_out?></td>
                                     </tr>
                                     <tr >
                                         <th class="gray_background">نهايه تسجيل الخروج</th>
                                         <td><?=$row->end_out?></td>
                                         <th class="gray_background"> من تاريخ</th>
                                         <td><?=date("Y-m-d",$row->from_date)?></td>
                                         <th class="gray_background"> الى تاريخ</th>
                                         <td><?=date("Y-m-d",$row->to_date)?></td>
                                     </tr>
                                     </tbody>
                                 </table>


                                <?php    }    }  ?>

                                <?php } } ?>

                            </div>
                        </div>
                        <div class="special col-xs-12 ">
                            <br><br>
                            <div class="col-xs-4 text-center">
                                <label> الختم </label><br><br>
                            </div>
                            <div class="col-xs-4 text-center">
                            </div>
                            <div class="col-xs-4 text-center">
                                <label>المدير المالى </label><br><br>
                                <p>....................</p><br>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </section>
            <div class="page-break"></div>
 <?php } ?>

        <!-------------- – بيانات الوثائق       ---------------->
        <?php
        $array = array(1=>'نعم',2=>'لا');
        if ($tables['emp_files'] != '' && $tables['emp_files'] != null && !empty($tables['emp_files'])) {  ?>
            <div class="header col-xs-12 no-padding">
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                </div>
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
            </div>
            <div class="col-xs-12 Title">
                <h5 class="text-center"><br><br> <strong> بيانات الوثائق </strong></h5><br>
            </div>

            <section class="main-body">
                <div class="container">
                    <div class="print_forma no-border col-xs-12 no-padding">
                        <div class="personality">
                            <div class="col-xs-12 no-padding">

                                <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">إسم المرفق</th>
                                        <th class="text-center">هل يوجد تاريخ</th>
                                        <th class="text-center">من تاريخ </th>
                                        <th class="text-center">إلي تاريخ</th>
                                    </tr>
                                    </thead>

                                    <tbody id="result"></tbody>
                                    <tbody>
                                    <?php
                                    if(isset($tables['emp_files']) &&$tables['emp_files'] !=null) {
                                        foreach ($tables['emp_files'] as  $value) { ?>

                                            <tr>
                                                <td>
                                                    <div class="col-sm-12">

                                                            <?php if(isset($files_names) && !empty($files_names)){
                                                                $title ='غير محدد';
                                                                foreach($files_names as $row){
                                                                  if($row->id_setting == $value->title){  $title=$row->title_setting; }
                                                                }
                                                                echo $title;
                                                            }?>
                                                        </select>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div class="col-sm-12">
                                                            <?php
                                                            $title ='غير محدد';
                                                            foreach ($array as $k => $va) {
                                                                if($k ==$value->have_date) {
                                                                     $title=$va;
                                                                } } echo $title;?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-12">
                                                        <?php if(!empty($value->from_date)){ echo$value->from_date; }else{
                                                      echo'غير محدد';
                                                        } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-12">
                                                        <?php if(!empty($value->to_date)){ echo$value->to_date;  }else{
                                                            echo'غير محدد';
                                                        } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="special col-xs-12 ">
                            <br><br>
                            <div class="col-xs-4 text-center">
                                <label> الختم </label><br><br>
                            </div>
                            <div class="col-xs-4 text-center">
                            </div>
                            <div class="col-xs-4 text-center">
                                <label>المدير المالى </label><br><br>
                                <p>....................</p><br>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </section>

        <?php } ?>
    <?php } ?>
</div>
</div>
</div>
</body>

                
                
                <script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script> 