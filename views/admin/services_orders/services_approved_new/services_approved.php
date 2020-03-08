<style type="text/css">
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
        width: 50%;
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
</style>

<style type="text/css">
    .padd {padding: 0 3px !important;}
    .no-padding {padding: 0;}
    .no-margin {margin: 0;}
    h4 {margin-top: 0;}
</style>

<?php
$tables_new = array(2=>'marriage_help_new', 3=>'medical_center_new', 4=>'electronic_card_new', 5=>'', 6=>'electrical_device_order_new', 7=>'maintenance_electrical_device_order_new', 8=>'furniture_order_new', 9=>'electrical_fatora_order_new', 10=>'water_fatora_order_new', 11=>'haj_omra_order_newHaj', 12=>'haj_omra_order_newOmra', 13=>'home_repairs_order_new', 14=>'restore_repairs_order_new', 15=>'cars_repairs_order_new', 16=>'health_care_orders_new', 17=>'insurance_medical_device_orders_new', 18=>'school_supplies_order_new');

$tables_accept = array(2=>'marriage_help_accept', 3=>'medical_center_accept', 4=>'electronic_card_accept', 5=>'', 6=>'electrical_device_order_accept', 7=>'maintenance_electrical_device_order_accept', 8=>'furniture_order_accept', 9=>'electrical_fatora_order_accept', 10=>'water_fatora_order_accept', 11=>'haj_omra_order_acceptHaj', 12=>'haj_omra_order_acceptOmra', 13=>'home_repairs_order_accept', 14=>'restore_repairs_order_accept', 15=>'cars_repairs_order_accept', 16=>'health_care_orders_accept', 17=>'insurance_medical_device_orders_accept', 18=>'school_supplies_order_accept');

$tables_refused = array(2=>'marriage_help_refused', 3=>'medical_center_refused', 4=>'electronic_card_refused', 5=>'', 6=>'electrical_device_order_refused', 7=>'maintenance_electrical_device_order_refused', 8=>'furniture_order_refused', 9=>'electrical_fatora_order_refused', 10=>'water_fatora_order_refused', 11=>'haj_omra_order_refusedHaj', 12=>'haj_omra_order_refusedOmra', 13=>'home_repairs_order_refused', 14=>'restore_repairs_order_refused', 15=>'cars_repairs_order_refused', 16=>'health_care_orders_refused', 17=>'insurance_medical_device_orders_refused', 18=>'school_supplies_order_refused');

$tables = array(2=>'marriage_help', 3=>'medical_center', 4=>'electronic_card', 5=>'',
                6=>'electrical_device_order', 7=>'maintenance_electrical_device_order',
                8=>'furniture_order', 9=>'electrical_fatora_order', 10=>'water_fatora_order',
                11=>'haj_omra_order', 13=>'home_repairs_order', 14=>'restore_repairs_order',
                15=>'cars_repairs_order', 16=>'health_care_orders', 17=>'insurance_medical_device_orders',
                18=>'school_supplies_order');
?>
<?php
foreach ($tables as $key => $value) {
    $variable = $tables[$key];
    if(isset($$variable) && $$variable != null) {
        ?>
        <div class="col-md-12 col-sm-6 ">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <h3 class="panel-title"><?=$categories[$key]->title?> </h3>
                </div>
                <div class="panel-body">
                    <table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>الإسم</th>
                            <th>رقم السجل المدنى </th>
                            <th>تاريخ اخدمة  </th>
                            <th>تفاصيل الخدمة </th>
                            <th>تفاصيل اجراءات الطلب  </th>
                            <th>الإجراء</th>
                            <th>أخر إجراء </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($$variable as $record) {
                            $unique = $record->id;
                            $field = 'id';
                            if($key == 11 || $key == 12 || $key == 16 || $key == 17) {
                                $unique = $record->order_num;
                                $field = 'order_num';
                            }
                            ?>
                            <tr>
                                <td><?=($x++)?></td>
                                <td><?=$record->full_name?></td>
                                <td><?=$record->mother_national_id_fk?></td>
                                <td><?=date("Y-m-d",$record->date)?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$tables[$key].$unique?>"><span class="fa fa-list"></span> تفاصيل الخدمة </button>
                                </td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal_operation<?=$tables[$key].$unique?>"><span class="fa fa-list"></span> تفاصيل الاجراء </button>
                                </td>
                                <td>
                                    <button onclick="$('.modal-title-approved').html('إعتماد خدمة (<?=$categories[$key]->title?>)');$('#id_mother_national').val(<?=$record->mother_national_id_fk?>); $('#idApproved').val(<?=$unique?>); $('#service_id_fk').val('<?=$key?>'); $('#tableApproved').val('<?=$tables[$key]?>'); $('#fieldApproved').val('<?=$field?>');  $('#approved_reason').val('<?=trim(preg_replace('/\s\s+/', ' ', $record->approved_reason))?>');" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalApproved"><i class="fa fa-bell"></i> إعتماد الطلب</button>
                                </td>
                                <td><?php
                                    if(isset($record->operation_order) && !empty($record->operation_order)){

                                                   if($record->operation_order[0]->process ==1){
                                                        echo 'قبول';
                                                    }elseif($record->operation_order[0]->process ==2){
                                                        echo 'رفض';
                                                    }elseif($record->operation_order[0]->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($record->operation_order[0]->process ==4) {
                                                       echo 'اعتماد';
                                                   }
                                    }else{
                                        echo "لم يتم اتخاذ اى اجراء";
                                    }
                                    ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?
    }
}
?>
<div class="modal fade" id="myModalApproved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title-approved"></h4>
            </div>
            <form action="Services_approved" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-xs-12">
                            <label class="control-label">أذكر السبب</label>
                            <textarea class="form-control" style="height: 100px" name="approved_reason" id="approved_reason" data-validation="required"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="idApproved" value="">
                <input type="hidden" name="table" id="tableApproved" value="">
                <input type="hidden" name="field" id="fieldApproved" value="">
                <input type="hidden" name="id_mother_national" id="id_mother_national" value="">
                <input type="hidden" name="service_id_fk" id="service_id_fk" value="">
                <div class="modal-footer">
                    <?php if(isset($buttun_roles) && !empty($buttun_roles) && $buttun_roles !=null){?>
                        <?php $arr_prosess=array("1"=>" قبول ","2"=>" رفض ","3"=>" تحويل ")?>
                    <?php $arr_but_post=array("1"=>"accept","2"=>"refuse","3"=>"transrorm")?>
                    <?php $arr_but_color=array("1"=>"success","2"=>"danger","3"=>"warning")?>
                    <?php foreach ($buttun_roles as $row=>$value){?>
                    <button type="submit" name="<?=$arr_but_post[$value]?>" value="<?=$value?>" class="btn btn-<?=$arr_but_color[$value]?>"><?=$arr_prosess[$value]?></button>
                   <!-- <button type="submit" name="accept" value="1" class="btn btn-success">موافقة</button>
                    <button type="submit" name="transrorm" value="3" class="btn btn-success">تحويل </button>
                    <button type="submit" name="refuse" value="2" class="btn btn-danger">مرفوض</button> -->
                    <?php }?>
                    <?php }?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$files = array('بطاقة العائلة'=>'family_card','عقد النكاح'=>'identity_img','صورة الهوية'=>'marriage_contract','الصورة الشخصية'=>'personal_picture','عقد القاعة'=>'hall_contract','تعريف بالراتب'=>'salary_definition','تزكية الامام'=>'imam_recommendation');
$type2 = array(1 => 'تالف', 2 => 'مفقود', 3 => 'تجديد', 4 => 'تغيير رقم سري', 5 => 'إصدار');
$answer = array(1=>'نعم',2=>'لا');
$type = array(1=>'هوية وطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر');
foreach ($tables as $key => $value1) {
    $variable = $tables[$key];
    if(isset($$variable) && $$variable != null) {
        foreach ($$variable as $value) {
            if($tables[$key] == 'marriage_help') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td><?=$value->mother_national_id_fk?></td>
                                            <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                                            <td>مساعدة زواج</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >الإسم</th>
                                            <td><?=$value->member_full_name?></td>
                                            <th class="gray_background" style="width: 25%;" >المدينة</th>
                                            <td><?=$value->area?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">مكان الزواج</th>
                                            <td><?=$value->place?></td>
                                            <th class="gray_background" style="width: 25%;">تاريخ الزواج</th>
                                            <td><?=$value->marriage_date?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">رقم العقد</th>
                                            <td><?=$value->contract_number?></td>
                                            <th class="gray_background" style="width: 25%;">تاريخ العقد</th>
                                            <td><?=$value->contract_date?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">جهة اصدار العقد</th>
                                            <td><?=$value->contract_source?></td>
                                            <th class="gray_background" style="width: 25%;">قيمة المهر</th>
                                            <td><?=$value->dowry_cost?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">جنسية الزوجة</th>
                                            <td><?=$value->nationality?></td>
                                            <th class="gray_background" style="width: 25%;">رقم هوية الزوجة</th>
                                            <td><?=$value->national_id?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">نوع هوية الزوجة</th>
                                            <td><?=$type[$value->national_type]?></td>
                                            <th class="gray_background" style="width: 25%;">الزواج لاول مرة</th>
                                            <td><?=$answer[$value->first_marriage]?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">رقم الجوال</th>
                                            <td><?=$value->mobile?></td>
                                            <th class="gray_background" style="width: 25%;"></th>
                                            <td></td>
                                        </tr>
                                        <?php
                                        $x = 1;
                                        foreach ($files as $key2 => $value2) {
                                            if($x % 2 != 0) {
                                                echo '</tr>';
                                            }
                                            ?>
                                            <th class="gray_background" style="width: 25%;"><?=$key2?></th>
                                            <td>
                                                <?php if($value->$value2) { ?>
                                                    <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->$value2?>"><span><i class="fa fa-download"></i></span></a>
                                                <? } ?>
                                            </td>
                                            <?php
                                            if($x % 2 == 0) {
                                                echo '</tr>';
                                            }
                                            $x++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";} ;
                                                     ?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'medical_center') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td><?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                                            <td><?=$categories[$key]->title?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >الإسم</th>
                                            <td><?=$value->member_full_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >نوع المرض</th>
                                            <td><?=$value->disease_type?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}
                                                     ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'home_repairs_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td> <?='إصلاح منزل'?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">مكان الصيانة</th>
                                            <td> <?=$value->place?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">نوع الإصلاح</th>
                                            <td><?=$value->device_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة مكان الصيانة</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'restore_repairs_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td> <?='ترميم منزل'?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">مكان الترميم</th>
                                            <td> <?=$value->place?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">نوع الترميم</th>
                                            <td><?=$value->device_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة مكان الترميم</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'insurance_medical_device_orders') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->order_num?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">

                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td><?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                                            <td>خدمات عامة / تأمين الأدوية والأجهزة الطبية</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >الإسم</th>
                                            <td>
                                                <?php
                                                $x = 1;
                                                foreach ($value->allchildrenWithPerson as $child) {
                                                    $checked = '';
                                                    foreach ($value->selectedChildren as $selectChild) {
                                                        if($child->type == 2 && $selectChild->child_id_fk == 0){
                                                            $checked = 'checked';
                                                            echo ($x++).'- '.$child->memberName.'<br>';
                                                        }
                                                        if($child->type == 1 && $selectChild->child_id_fk == $child->memberID) {
                                                            $checked = 'checked';
                                                            echo ($x++).'- '.$child->memberName.'<br>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >دواء / أجهزة طبية</th>
                                            <td><?=$type[$value->type]?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">إسم الدواء أو الجهاز</th>
                                            <td><?=$value->title_setting?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">الملف المرفق</th>
                                            <td>
                                                <?php if($value->file) { ?>
                                                    <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->file?>"><span><i class="fa fa-download"></i></span></a>
                                                <? } ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'maintenance_electrical_device_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td> <?='صيانة الأجهزة الكهربائية'?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">نوع الجهاز</th>
                                            <td> <?=$value->device_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">العدد</th>
                                            <td><?=$value->number?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">ملاحظات</th>
                                            <td><?=$value->notes?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة الجهاز</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'water_fatora_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td> <?='فواتير المياة'?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">رقم الفاتورة</th>
                                            <td> <?=$value->fatora_num?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">مبلغ الفاتورة</th>
                                            <td><?=$value->value?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">تاريخ الفاتورة</th>
                                            <td><?=$value->fatora_date?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">تاريخ سند الدفع</th>
                                            <td><?=$value->sanad_date?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة الفاتورة</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'cars_repairs_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td>صيانة السيارات</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">اسم القريب</th>
                                            <td> <?=$value->p_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">اسم صاحب السيارة</th>
                                            <td><?=$value->owner_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">وصف المشكلة</th>
                                            <td><?=$value->problem?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">رقم استمارة السيارة</th>
                                            <td> <?=$value->car_form_num?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">قانون الإصلاح</th>
                                            <td>
                                                <a href="<?php echo base_url('services_orders/Services_orders/download_file/'.$value->repair_law_file) ?>"><i class="fa fa-download" aria-hidden="true"></i></a> /
                                                <a href="<?php echo base_url('services_orders/Services_orders/read_file/'.$value->repair_law_file); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة استمارة السيارة</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img_form?>">
                                                    <img id="blah" src="<?=base_url('uploads/files/'.$value->img_form)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'electrical_device_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td> <?='الأجهزة الكهربائية'?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">نوع الجهاز</th>
                                            <td> <?=$value->device_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">العدد</th>
                                            <td><?=$value->number?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">ملاحظات</th>
                                            <td><?=$value->notes?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة الجهاز</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'electrical_fatora_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td> <?='فواتير الكهرباء'?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">رقم الفاتورة</th>
                                            <td> <?=$value->fatora_num?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">مبلغ الفاتورة</th>
                                            <td><?=$value->value?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">تاريخ الفاتورة</th>
                                            <td><?=$value->fatora_date?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">تاريخ سند الدفع</th>
                                            <td><?=$value->sanad_date?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة الفاتورة</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'electronic_card') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td><?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                                            <td>معالجة البطاقة الاكترونية</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >الإسم</th>
                                            <td><?=$value->member_full_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم الهوية</th>
                                            <td><?=$value->national_id?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >نوع خدمة البطاقة</th>
                                            <td><?=$type2[$value->card_service_type]?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'school_supplies_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content row">
                            <div class="modal-header col-xs-12">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <br/>
                                <div class="col-xs-9">
                                    <div class="col-xs-12">
                                        <table class="table table-bordered table-devices">
                                            <tbody>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;" >إسم النزيل </th>
                                                <td><?=$value->full_name?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;">فئة الخدمة </th>
                                                <td> خدمات عامة </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;">نوع الخدمة </th>
                                                <td> الحقيبة والمستلزمات المدرسية</td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;" >الاسم </th>
                                                <td><?=$value->member_full_name?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;">اسم المستلزمات المدرسية</th>
                                                <td><?=$value->supplies?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="col-md-12 padd" style="height: 116px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12 padd">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <input type="text" class="form-control  input-style" value="<?=$value->full_name?>" readonly />
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12 padd">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <input type="text" value="<?=$value->m_birth_date_hijri?>" class="form-control  input-style"   readonly />
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12 padd">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال </label>
                                        <input type="text"  class="form-control  input-style" value="<?=$value->m_mob?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'furniture_order') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td> <?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                            <td>خدمات عامة</td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                            <td> <?='الإثاث'?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">نوع الأثاث</th>
                                            <td> <?=$value->device_name?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">العدد</th>
                                            <td><?=$value->number?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">ملاحظات</th>
                                            <td><?=$value->notes?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">صورة الأثاث</th>
                                            <td>
                                                <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'haj_omra_order') {
                $serviceName = 'خدمات العمرة';
                if($value->type == 1){
                    $serviceName = 'خدمات الحج';
                }
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->order_num?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content row">
                            <div class="modal-header col-xs-12">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <br/>
                                <div class="col-xs-9">
                                    <div class="col-xs-12">
                                        <table class="table table-bordered table-devices">
                                            <tbody>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;" >إسم النزيل </th>
                                                <td><?=$value->full_name?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;">فئة الخدمة </th>
                                                <td> خدمات عامة </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;">نوع الخدمة </th>
                                                <td> <?=$serviceName?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;" >إسم المستفيدين </th>
                                                <td>
                                                    <?php
                                                    $x = 1;
                                                    foreach ($value->allchildrenWithPerson as $child) {
                                                        foreach ($value->selectedChildren as $selectChild) {
                                                            if($child->type == 2 && $selectChild->person_id == 0){
                                                                echo ($x++).'- '.$child->memberName.'<br>';
                                                            }
                                                            if($child->type == 1 && $selectChild->person_id == $child->memberID) {
                                                                echo ($x++).'- '.$child->memberName.'<br>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;">العلاقة</th>
                                                <td> <?=$value->relation?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;"> اسم المحرم</th>
                                                <td><?=$value->name?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;">تاريخ الميلاد</th>
                                                <td><?=$value->birth_date?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" style="width: 25%;"><?=$serviceName?> لاول مرة</th>
                                                <td><?php if($value->frist_haj_omra == 1){
                                                        echo "نعم ";
                                                    }elseif($value->frist_haj_omra == 2){
                                                        echo "لا";
                                                    }?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="col-md-12 padd" style="height: 116px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12 padd">
                                        <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                                        <input type="text" class="form-control  input-style" value="<?=$value->full_name?>" readonly />
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12 padd">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <input type="text" value="<?=$value->m_birth_date_hijri?>" class="form-control input-style" readonly />
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12 padd">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال </label>
                                        <input type="text"  class="form-control  input-style" value="<?=$value->m_mob?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->order_num?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if($tables[$key] == 'health_care_orders') {
                ?>
                <div class="modal" id="myModal<?=$tables[$key].$value->order_num?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الخدمة</h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-9 col-xs-12">
                                    <table class="table table-bordered table-devices">
                                        <tbody>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >رقم النزيل</th>
                                            <td><?=$value->mother_national_id_fk?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                                            <td>خدمات عامة / <?=$categories[$key]->title?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >الإسم</th>
                                            <td>
                                                <?php
                                                $x = 1;
                                                foreach ($value->allchildrenWithPerson as $child) {
                                                    foreach ($value->selectedChildren as $selectChild) {
                                                        if($child->type == 2 && $selectChild->child_id_fk == 0){
                                                            echo ($x++).'- '.$child->memberName.'<br>';
                                                        }
                                                        if($child->type == 1 && $selectChild->child_id_fk == $child->memberID) {
                                                            echo ($x++).'- '.$child->memberName.'<br>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;" >تاريخ السفر</th>
                                            <td><?=$value->travel_date?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">عدد الايام</th>
                                            <td><?=$value->days_num?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">جهة العلاج</th>
                                            <td><?=$value->place?></td>
                                        </tr>
                                        <tr>
                                            <th class="gray_background" style="width: 25%;">الملف المرفق</th>
                                            <td>
                                                <?php if($value->img) { ?>
                                                    <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>"><span><i class="fa fa-download"></i></span></a>
                                                <? } ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                        <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">الإسم</label>
                                        <h4 class="form-control"><?=$value->full_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                                        <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                                        <h4 class="form-control"><?=$value->m_mob?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal_operation<?=$tables[$key].$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 90%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل إجراءات الطلب </h4>
                            </div>
                            <br>
                            <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                <?php if(isset($value->operation_order) && !empty($value->operation_order)){
                                    $all_operation =$value->operation_order;
                                    ?>
                                    <!--------------------------------------------------------------------------------------------------------->
                                    <table class=" display table table-bordered table-striped table-hover">
                                        <tr class="info">
                                            <th>م </th>
                                            <th>من</th>
                                            <th> الي</th>
                                            <th>الحالة </th>
                                            <th>التاريخ </th>
                                            <th>الوقت</th>
                                            <th>الاجراءات </th>
                                            <th> ملاحظات </th>
                                        </tr>  <!-- Y-m-d H:i:s -->
                                        <?php $count=1; foreach($all_operation as $row):?>
                                            <tr>
                                                <td><?php echo $count++?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_from]->name)){echo  $jobs_name[$row->service_file_from]->name ;}else { echo " إدارة الجمعية";}?></td>
                                                <td><?php if(isset($jobs_name[$row->service_file_to]->name)){ echo $jobs_name[$row->service_file_to]->name;}else {  echo  " إدارة الجمعية";}?></td>
                                                <td><?php if($row->process ==1){
                                                        echo ' قبول الملف';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض الملف';
                                                    }elseif($row->process ==3){
                                                        echo 'للإطلاع عند'.$jobs_name[$row->service_file_to]->name;
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد الملف';
                                                    }?>
                                                </td>
                                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                <td><?php if($row->process ==1){
                                                        echo 'قبول';
                                                    }elseif($row->process ==2){
                                                        echo 'رفض';
                                                    }elseif($row->process ==3){
                                                        echo 'تحويل';
                                                    }elseif($row->process ==4){
                                                        echo 'اعتماد';
                                                    }?>
                                                </td>
                                                <td><?php echo $row->reason ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <!--------------------------------------------------------------------------------------------------------->
                                <?php }else{
                                    echo  '<div class="alert alert-danger">
                                           <strong>لا يوجد إجراءات متخذة !</strong> .
                                            </div>';
                                }?>
                            </div>
                            <div class="modal-footer" style="border-top: 0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?
            }
        }
    }
}
?>


