                
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
                
                </style>
                
                <div id = "printdiv" >
                
                <section class="main-body" >
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
                </section>
                
                <div class="page-break"></div>
                <?php if ($tables != '' && $tables != null && !empty($tables)) {  ?>
                <?php  
                
                $type_tamin =array('0'=>'0','1'=>'مؤمن','2'=>'غير مؤمن');
                $emp_type =array('0'=>'0','1'=>'نشط','2'=>'موقوف');
                $gender=array('0'=>'0',1=>'ذكر',2=>'أنثي');
                $social_status=array(0=>'0',1=>'اعزب',2=>'ارمل',3=>'متزوج','4'=>'مطلق');
                
                if ($tables != '' && $tables != null && !empty($tables)) {  ?>
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
                <h5 class="text-center"><br><br> <strong>بيانات الأساسية</strong></h5><br>
                </div>
                <section class="main-body">
                <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                <div class="col-xs-12 no-padding">
                <table class="table table-bordered table-devices">
                <tbody>
                <tr>
                <th class="gray_background"  >إسم الموظف</th>
                <td><?php echo $tables[0]->employee;?></td>
                <th class="gray_background"  >كود الموظف</th>
                <td><?php echo $tables[0]->emp_code;?></td>
                </tr>
                <tr>
                <th class="gray_background" >رقم التليفون</th>
                <td><?php echo $tables[0]->phone;?></td>
                <th class="gray_background"  >النوع</th>
                <td><?php echo $tables[0]->gender;?></td>
                </tr>
                <tr>
                <th class="gray_background">تاريخ الميلاد</th>
                <td><?php echo $tables[0]->birth_date;?></td>
                <th class="gray_background"  >الجنسيه</th>
                <td><?php echo $tables[0]->nationality_name;?></td>
                </tr>
                <tr>
                <th class="gray_background" >الديانه</th>
                <td><?php echo $tables[0]->deyana_name;?></td>
                <th class="gray_background"  >الحاله الاجتماعيه</th>
                <td><?php echo $tables[0]->social_status;?></td>
                </tr>
                <tr>
                <th class="gray_background" >اسم البنك التابع</th>
                <td><?php echo $tables[0]->banks_settings_name;?></td>
                <th class="gray_background"  >رقم الحساب</th>
                <td> <?php echo $tables[0]->bank_num;?></td>
                </tr>
                <tr>
                <th class="gray_background" >  الايميل</th>
                <td><?php echo $tables[0]->email;?> </td>
                <th class="gray_background"  >نوع البطاقه</th>
                <td><?php echo $tables[0]->type_card_name;?> </td>
                </tr>
                <tr>
                <th class="gray_background" >جهه الاصدار</th>
                <td><?php echo $tables[0]->dest_card_name;?></td>
                <th class="gray_background"  >تاريخ الاصدار</th>
                <td><?php echo $tables[0]->esdar_date;?></td>
                </tr>
                <tr>
                <th class="gray_background" >تاريخ الانتهاء</th>
                <td><?php echo $tables[0]->end_date;?></td>
                <th class="gray_background"  >رقم الهويه </th>
                <td><?php echo $tables[0]->card_num;?></td>
                </tr>
                <tr>
                <th class="gray_background">العنوان في بلد المقيم</th>
                <td><?php echo $tables[0]->adress_other;?></td>
                <th class="gray_background">العمر</th>
                <td><?php //echo $tables[0]->age; ?></td>
              </tr>
                
                 <tr>
                <th class="gray_background">العنوان الوطني</th>
                <td><?php echo $tables[0]->adress;?></td>
                <th class="gray_background">الصورة الشخصية</th>
                <td>
                <img id="blah" src="<?php if(isset($tables[0]->personal_photo)){ echo base_url().'uploads/files/'.$tables[0]->personal_photo;}else{
                                    echo 'https://via.placeholder.com/350x150';
                                } ?>" alt="الصورة الشخصية"  style="width: 150px;height: 150px;" class="img-rounded">
                                </td>
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
                
                
                
                <?php if ($tables[0]->has_job != '' && $tables[0]->has_job != null && !empty($tables[0]->has_job)) {  ?>
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
                <h5 class="text-center"><br><br> <strong>البيانات الوظيفية</strong></h5><br>
                </div>
                
                <section class="main-body">
                <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                
                <div class="col-xs-12 no-padding">
                
                <table class="table table-bordered table-devices">
                <tbody>
                <tr>
                <th class="gray_background"  >حاله الموظف</th>
                <td><?php echo $emp_type[$tables[0]->employee_type];?> </td>
                <th class="gray_background"  >السبب</th>
                <td><?php echo $tables[0]->reason;?></td>
                </tr>
                <tr>
                <th class="gray_background" >الدرجه العلميه</th>
                <td><?php echo $tables[0]->degree_qual_name;?> </td>
                <th class="gray_background"  >المؤهل العلمي</th>
                <td><?php echo $tables[0]->qualification_name;?> </td>
                </tr>
                <tr>
                <th class="gray_background" >الإدارة</th>
                <td>                       
                <?php
                if(!empty($admin)):
                foreach ($admin as $record):
                ?>
                <?php if($record->id== $tables[0]->administration ){ echo $record->name ; } ?>
                <?php
                endforeach;
                endif;
                ?>
                </td>
                <th class="gray_background"  >القسم
                </th>
                <td> <?php
                foreach($department_branch as $row){
                ?>
                <?php if($row->id==$tables[0]->department){ echo $row->name; } ?>
                <?php
                }
                ?>
                </td>
                </tr>
                <tr>
                <th class="gray_background"> المسمي الوظيفي</th>
                <td>
                <?php foreach($job_role as $one_job_role){?>
                <?php if($one_job_role->defined_id==$tables[0]->degree_id){ echo $one_job_role->defined_title ; } ?>
                <?php } ?>
                </td>
                <th class="gray_background"  >المدير المباشر</th>
                <td>
               <?php if(isset($direct_all_emps) && $direct_all_emps != null) {
                foreach ($direct_all_emps as $value) {?>
                  <?php if($value->id== $tables[0]->manger){ echo $value->employee ; } ?>
                <?  }
                    } ?>
                 </td>
                </tr>
                <tr>
                <th class="gray_background" > نوع العقد</th>
                <td>
                <?php if(isset($contracts) && $contracts != null) {
                foreach ($contracts as $value) {?>
                <?php if($value->id==$tables[0]->contract){ echo $value->title;} ?>
                <?  }
                } ?>
                </td>
                <th class="gray_background"  >تاريخ التعيين </th>
                <td><?php echo $tables[0]->start_work_date;?> </td>
                </tr>
                <tr>
                <th class="gray_background" >تاريخ انتهاء العقد </th>
                <td><?php echo $tables[0]->end_contract_date;?> </td>
                <th class="gray_background"  >تاريخ انتهاء الخدمه </th>
                <td><?php echo $tables[0]->end_service_date;?></td>
                </tr>
                <tr>
                <th class="gray_background" >التأمين الإجتماعي </th>
                <td><?php  if($tables[0]->type_tamin != null){ echo $type_tamin[$tables[0]->type_tamin]; }else{ echo '--';} ?> </td>
                <th class="gray_background"> مكتب العمل</th>
                <td>
              
            <?php if(isset($all_maktb) && $all_maktb != null) {
                 if(isset($tables[0]->work_maktb) && $tables[0]->work_maktb != null) {
                   $maktb =  $tables[0]->work_maktb;
                 }else{
                   $maktb =''; 
                 }
foreach ($all_maktb as $value) {?>
<?php if($value->id_setting== $maktb){ echo $value->title_setting ; } ?>
                <?  }
            } ?>
        
                </td>
                </tr>
                <tr>
                <th class="gray_background" >رقم التأمين</th>
                <td><?php echo $tables[0]->insurance_number; ?> </td>
                <th class="gray_background"  >تاريخ بدايه التامين</th>
                <td><?php  echo $tables[0]->start_tamin_date; ?> </td>
                </tr>
                <tr>
                <th class="gray_background" >التامينات الطبية</th>
                <td><?php  if($tables[0]->type_tamin != null){ echo $type_tamin[$tables[0]->type_tamin__medicine]; }else{ echo '--';}?> </td>
                <th class="gray_background"  >شركه التامين</th>
                <td><?php echo $tables[0]->company_name;?> </td>
                </tr>
                <tr>
                <th class="gray_background"  >رقم التأمين</th>
                <td><?php echo $tables[0]->tamin_medicine_num;?> </td>
                <th class="gray_background" >رقم البوليصه</th>
                <td><?php echo $tables[0]->polica_num;?> </td>
                </tr>
                <tr>
                <th class="gray_background" >فئه التامين</th>
                <td><?php   echo $tables[0]->cat_tamin_name;?></td>
                </td>
                <th class="gray_background"  >تاريخ التامين</th>
                <td><?php echo $tables[0]->tamin_date;?> </td>
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
                <?php } ?>
                <div class="page-break"></div>
                
                <!-------------- بيانات المالية للموظف ---------------->
                <?php
                if ($tables[0]->finance_employes  != '' && $tables[0]->finance_employes  != null && !empty($tables[0]->finance_employes )) {  ?>
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
                <h5 class="text-center"><br><br> <strong>بيانات المالية للموظف</strong></h5><br>
                </div>
                <section class="main-body">
                <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                
                <div class="col-xs-12 no-padding">
                
                <table class="table table-bordered table-devices">
                <tbody>
                <tr>
                <?php 
                $salary_types = array(1=>'راتب أساسي',2=>'راتب مقطوع');
                ?>
                <th class="gray_background"  > نوع الراتب </th>
                <td>   <?php 
                foreach ($salary_types as $key => $value) { 
                if($key == $tables[0]->finance_employes[0]->salary_type) {
                echo  $value;
                }
                ?>
                
                <?php } ?></td>
                <th class="gray_background" >الراتب / المكافأة</th>
                <td><?php echo $tables[0]->finance_employes[0]->salary;?></td>
                </tr>
                <th class="gray_background" >مركز التكلفة </th>
                <td>
        <?php
        if(isset($markz)&&!empty($markz)) { 
            if(isset( $tables[0]->finance_employes[0]->markz)&&!empty( $tables[0]->finance_employes[0]->markz) ){
             $markz_id = $tables[0]->finance_employes[0]->markz;
            }else{
               $markz_id = "" ;
            }
            foreach($markz as $row){?>
               <?php if($row->id_setting==  $markz_id){ echo $row->title_setting ; } ?>
                 <?php
                 } 
                } 
                ?>
               </td>
                </tbody>
                </table>
                <?php
                $array = array(1=>'نعم',2=>'لا');
                for ($i=0; $i < 2; $i++) { 
                $records = array();
                $title = 'البدلات';
                $th = 'البدل';
                if($i == 1) {
                $title = 'خصومات';
                $th = 'الخصم';
                }
                if(isset($badalat) && $badalat != null && $i == 0) { 
                $records = $badalat;
                }
                if(isset($discounts) && $discounts != null && $i == 1) { 
                $records = $discounts;
                }
                ?>
                
                
                
                <div class="col-xs-12 no-padding">
                <h5>بيانات <?=$title?></h5>
                <table class="table table-bordered ">
                <thead>
                <tr class="info">
                <th>إسم <?=$th?></th>
                <th>القيمة</th>
                <th>ملزم بتاريخ</th>
                <th>من تاريخ</th>
                <th>إلى تاريخ</th>
                <th>تأمينات</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($records as $record) { 
                $class = '';
                $disabled = '';
                if($record->id == 1 || $record->id == 2) {
                $class = 'class';
                if(isset( $tables[0]->finance_employes[0]->salary_type)  && $tables[0]->finance_employes[0]->salary_type == 2) {
                $disabled = 'disabled';
                }
                }
                ?>
                <tr>
                <td><?=$record->title?></td>
                <td>
                <div class="col-sm-12">
                <?php if(isset($tables[0]->finance_employes) && isset($tables[0]->badlat[$record->id])) echo $tables[0]->badlat[$record->id]->value; else echo 0; ?>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                
                <?php 
                foreach ($array as $key => $value) { 
                $select = '';
                if(isset($tables[0]->finance_employes) && isset($tables[0]->badlat[$record->id]) && $tables[0]->badlat[$record->id]->date_from > 0 && $key == 1) {
                echo $value ;
                }
                if(isset($tables[0]->finance_employes)&& isset($tables[0]->badlat[$record->id]) && $tables[0]->badlat[$record->id]->date_from == 0 && $key == 2) {
                echo $value;
                }
                ?>
                
                <?php } ?>
                
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <?php if(isset($tables[0]->finance_employes) && isset($tables[0]->badlat[$record->id]) && $tables[0]->badlat[$record->id]->date_from > 0) echo date("Y-m-d",$tables[0]->badlat[$record->id]->date_from); else echo '--' ?> 
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <?php if(isset($tables[0]->finance_employes) && isset($tables[0]->badlat[$record->id]) && $tables[0]->badlat[$record->id]->date_to > 0) echo date("Y-m-d",$tables[0]->badlat[$record->id]->date_to); else echo '--' ?>
                </div>
                </td>
                <td>
                <?php if(isset($tables[0]->finance_employes) && isset($tables[0]->badlat[$record->id]) && $tables[0]->badlat[$record->id]->insurance_affect == 1) echo 'نعم'; else echo 'لا'; ?> 
                </td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
                </div>
                <?php } ?>   
                
                
                <table class="table table-bordered ">
                <h5>بيانات البنوك</h5>
                <thead>
                <tr class="info">
                <th>إسم البنك</th>
                <th>كود البنك</th>
                <th>رقم الحساب</th>
                <th>البنك النشط</th>
                </tr>
                </thead>
                <tbody id="result"></tbody>
                <tbody>
                <?php 
                if(isset($tables[0]->Banks)) {  
                foreach ($tables[0]->Banks as $key => $value) { 
                ?>
                <tr>
                <td>
                <div class="col-sm-12">
                <?php 
                if (isset($banks) && $banks != null) {
                foreach ($banks as $bank) {
                $select = '';
                if($bank->id == $value->bank_id_fk) {
                echo $bank->ar_name;
                }
                ?>
                <?php
                }
                }
                ?>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <?=$value->bank_code?>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <?=$value->bank_account_num?>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <?php if($value->approved_for_sarf == 1) echo 'نعم'; else echo "لاء"; ?> 
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
                <div class="page-break"></div>
                <?php } ?>
                <!-------------- البيانات التعاقد ---------------->
                <?php if($tables[0]->contract_employe != '' && $tables[0]->contract_employe != null && !empty($tables[0]->contract_employe)) {  ?>
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
                <h5 class="text-center"><br><br> <strong>البيانات التعاقد</strong></h5><br>
                </div>
                
                <section class="main-body">
                <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                
                <div class="col-xs-12 no-padding">
                <?php
                $work_types=array("1"=>"فترة","2"=>"فترتين");
                $yes_no=array("1"=>"نعم","2"=>"لا");
                $paid_type=array("1"=>"نقدي","2"=>"شيك","3"=>"تحويل بنكي");
                ?>
                <table class="table table-bordered table-devices">
                <tbody>
                <tr>
                <th class="gray_background"  >إيام العمل خلال الشهر</th>
                <td><?php echo $tables[0]->contract_employe[0]->num_days_in_month;?> </td>
                <th class="gray_background"  >ساعات العمل</th>
                <td><?php echo $tables[0]->contract_employe[0]->hours_work;?> </td>
                </tr>
                <tr>
                <th class="gray_background" >إجرة الساعة</th>
                <td><?php echo $tables[0]->contract_employe[0]->hour_value;?></td>
                <th class="gray_background"  >فترات العمل</th>
                <td>
                <?php
                foreach($work_types as $key=>$value){
                if ($key ==  $tables[0]->contract_employe[0]->work_period_id_fk) {
                echo $value;
                } ?>
                <?php }
                ?>
                </td>
                </tr>
                <tr>
                <th class="gray_background" >طريقة دفع الراتب</th>
                <td>                       
                
                <?php
                foreach($paid_type as $k=>$v){
                if ($k ==  $tables[0]->contract_employe[0]->pay_method_id_fk ) {
                echo $v;
                } ?>
                
                <?php } ?>
                </td>
                <th class="gray_background"  >إسم البنك </th>
                <td> 
                <?php
                foreach($banks_data as $row){
                if ($row->id == $tables[0]->contract_employe[0]->bank_id_fk){
                echo $row->ar_name;
                }?>
                <?php } 
                
                ?>
                
                </td>
                </tr>
                <tr>
                <th class="gray_background">رمز البنك</th>
                <td><?php  if($tables[0]->contract_employe[0]->bank_id_fk != 0){ echo $banks_data[$tables[0]->contract_employe[0]->bank_id_fk]->bank_code;}else{ echo '--';}?>
                </td>
                <th class="gray_background"  >رقم الحساب</th>
                <td><?php echo $tables[0]->contract_employe[0]->bank_account_num;?></td>
                </tr>
                <tr>
                <th class="gray_background" >الأجازات السنوية</th>
                <td> <?php echo $tables[0]->contract_employe[0]->year_vacation_num;?>
                </td>
                <th class="gray_background"  >المدة المستحقة عنها</th>
                <td> <?php echo $tables[0]->contract_employe[0]->year_vacation_period;?></td>
                </tr>
                <tr>
                <th class="gray_background" >الأجازة الاضطرارية</th>
                <td><?php echo $tables[0]->contract_employe[0]->casual_vacation_num;?></td>
                <th class="gray_background"  >تذكرة سفر</th>
                <td>
                <?php
                foreach($yes_no as $l=>$a){
                if ($l == $tables[0]->contract_employe[0]->travel_ticket) {
                echo $a;
                } ?>
                
                <?php } ?>
                </td>
                </tr>
                <tr>
                <th class="gray_background" >نوع التذكرة</th>
                <td>
                <?php
                foreach($tickets as $row2){
                $selected5 = '';
                if ($row2->id_setting ==  $tables[0]->contract_employe[0]->travel_type_fk) {
                echo $row2->title_setting;
                } ?>
                
                <?php } ?>
                </td>
                <th class="gray_background">المدة</th>
                <td><?php echo $tables[0]->contract_employe[0]->travel_period; ?> </td>
                </tr>
                <tr>
                <th class="gray_background" >مكافأة نهاية الخدمة</th>
                <td>  <?php
                foreach($yes_no as $y=>$e){
                $selected6 = '';
                if ($y == $tables[0]->contract_employe[0]->reward_end_work) {
                echo $e;
                      } ?>
                <?php } ?> 
                </td>
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
                <?php } ?>
                <div class="page-break"></div>
                
                <?php $work_days=array("1"=>"السبت","2"=>"الأحد","3"=>"الأثنين","4"=>"الثلاثاء","5"=>"الأربعاء","6"=>"الخميس","7"=>"الجمعة");  ?>
                
                
                <!-------------- بيانات جهاز البصمة ---------------->
                
                
                <?php if ($tables[0]->machine_data != '' && $tables[0]->machine_data != null && !empty($tables[0]->machine_data)) {  ?>
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
                <h5 class="text-center"><br><br> <strong>البيانات البصمة لديه</strong></h5><br>
                </div>
                
                <section class="main-body">
                <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                
                <div class="col-xs-12 no-padding">
                
                <table class="table table-bordered table-devices">
                <tbody>
                <tr>
                <th class="gray_background"  >إسم جهاز البصمة</th>
                <td><?php echo $tables[0]->machine_data[0]->printer_machine;?> </td>
                <th class="gray_background"  >رقم الموظف بجهاز البصمة</th>
                <td><?php echo $tables[0]->machine_data[0]->num_in_device;?></td>
                </tr>
                <tr>
                <th class="gray_background" >فترات الدوام</th>
                <td>
             
                    <?php
                    foreach($always_setting_data as $always){
				    if ($always->id == $tables[0]->machine_data[0]->period_id_fk) {
				         echo  $always->name;
							} ?>
                    
                    <?php } ?>
                   
                </td>
                <th class="gray_background"  >أيام العمل من </th>
                <td>
                    <?php
                    foreach($work_days as $y=>$e){
                    $selected4 = '';
				    if ($y == $tables[0]->machine_data[0]->from_day) {
				         echo $e;
							} ?>
                   
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                <th class="gray_background" >أيام العمل الي</th>
                <td>                       
                <?php
                    foreach($work_days as $p=>$u){
                    $selected5 = '';
				    if ($p == $tables[0]->machine_data[0]->to_day ) {
				         echo $u;
							} ?>
                    <?php } ?>
                </td>
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
               <!-------------- بيانات العهد ---------------->
                <?php 
                
                $house_device_status=array(1=>'جيد',2=>'متوسط',3=>'غير جيد',4=>'يحتاج');
                if ($tables[0]->custody_data != '' && $tables[0]->custody_data != null && !empty($tables[0]->custody_data)) {  ?>
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
                <h5 class="text-center"><br><br> <strong>البيانات العهد</strong></h5><br>
                </div>
                
                <section class="main-body">
                <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                
                <div class="col-xs-12 no-padding">
                <table class="table table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                <th>تصنيف الأصل</th>
                <th>إسم الأصل</th>
                <th>العدد</th>
                <th>الحالة</th>
                <th>تاريخ الإستلام</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                if(isset($tables[0]->custody_data) && $tables[0]->custody_data !=null) {  
                foreach ($tables[0]->custody_data as $key => $value){
                ?>
                <tr>
                <td>
                <div class="col-sm-12">      
                <?php 
                foreach ($custody as $row) { 
                if($row->id == $value->custody_id_fk){
                echo $row->name; 
                }
                } ?>
                </div>
                </td>   
                <td>
                <div class="col-sm-12">
                <?=$value->custody_title?>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                 <?=$value->num?>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <?php 
                foreach ($house_device_status as $k=>$v){ 
                if($k == $value->status){
                 echo  $v; 
                }
                } ?>
                </div>
                </td>
                 <td>
                 <div class="col-sm-12">
                 <?php echo $value->date_recived ; ?>
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
                  <div class="page-break"></div>
                <?php } ?>
               
                <!-------------- – بيانات الوثائق       ---------------->
                <?php 
                 $array = array(1=>'نعم',2=>'لا');
                if ($tables[0]->files_data != '' && $tables[0]->files_data != null && !empty($tables[0]->files_data)) {  ?>
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
                        <th>إسم المرفق</th>
                        <th>هل لديه المستند</th>
                        <th>ملزم بتاريخ</th>
                        <th>من تاريخ </th>
                        <th>إلي تاريخ</th>
                    </tr>
                </thead>
                
                <tbody id="result"></tbody>
                <tbody>
                <?php 
                if(isset($tables[0]->files_data) && $tables[0]->files_data !=null) {  
                foreach ($tables[0]->files_data as $r => $a) { 
                ?>
                <tr>
                    <td>
                        <div class="col-sm-12">
                            <?=$a->title?>
                        </div>
                    </td>
                    <td>
                       <?php 
                         if(isset($tables[0]->files_data)){
                            ?>
                         <div class="col-sm-12">
                         <?php echo 'نعم'; ?>
						 </div>
                        <?php
                         }else{ ?>
                          <?php echo 'لا'; ?>  
                      <?php   }
                        ?>
                    </td>
                  <td>
                  <div class="col-sm-12">
                          <?php 
                        foreach ($array as $ke => $va) {
                        if(isset($tables[0]->files_data) && $ke == $a->have_date) {
                        echo $va;
                        }
                        ?>
                        <?php } ?>
                  </div>
                  </td>
                  <td>
                     <div class="col-sm-12">
                     <?php if(isset($tables[0]->files_data) && $a->from_date > 0 ) echo $a->from_date; else echo '--' ?> 
                     </div>
                  </td>
                  <td>
                     <div class="col-sm-12">
                     <?php if(isset($tables[0]->files_data) && $a->to_date > 0) echo $a->to_date; else echo '--' ?> 
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
                
                <script >
               
                var divElements = document . getElementById("printdiv") . innerHTML;
                var oldPage = document . body . innerHTML;
                document . body . innerHTML =
                "<html><head><title></title></head><body><div id='printdiv'>" +
                divElements + "</div></body>";
                window .print();
                setTimeout(function () {
                window.location.href ="<?php echo base_url('human_resources/Human_resources') ?>";
                },100);
                
                </script >
                
                
