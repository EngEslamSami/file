<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: !block !important;
        font-weight: 500 !important;
    }
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .print_forma {
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-!block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-!block;
        float: right;
        width: 100%;
    }
    .piece-body {
        width: 100%;
        float: right;
    }
    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer {
        display: inline-!block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table {
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th {
        text-align: right;
    }
    .print_forma table tr th {
        vertical-align: middle;
    }
    .no-padding {
        padding: 0;
    }
    .header p {
        margin: 0;
    }
    .header img {
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }
    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border {
        border: 0 !important;
    }
    .gray_background {
        background-color: #eee;
    }
    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img {
        width: 100%;
        height: 120px;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green {
        background-color: #e6eed5;
    }
    .closed_green {
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/
    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }
    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }
    /**********************************************************/
    @media (min-width: 992px){
        .col_md_10{
            width: 10%;
            float:right;
        }
        .col_md_15{
            width: 15%;
            float:right;
        }
        .col_md_20{
            width: 20%;
            float:right;
        }
        .col_md_25{
            width: 25%;
            float:right;
        }
        .col_md_30{
            width: 30%;
            float:right;
        }
        .col_md_35{
            width: 35%;
            float:right;
        }
        .col_md_40{
            width: 40%;
            float:right;
        }
        .col_md_45{
            width: 45%;
            float:right;
        }
        .col_md_50{
            width: 50%;
            float:right;
        }
        .col_md_55{
            width: 55%;
            float:right;
        }
        .col_md_60{
            width: 60%;
            float:right;
        }
        .col_md_70{
            width: 70%;
            float:right;
        }
        .col_md_75{
            width: 75%;
            float:right;
        }
        .col_md_80{
            width: 80%;
            float:right;
        }
        .col_md_85{
            width: 85%;
            float:right;
        }
        .col_md_90{
            width: 90%;
            float:right;
        }
        .col_md_95{
            width: 95%;
            float:right;
        }
        .col_md_100{
            width: 100%;
            float:right;
        }
    }
    . {
        border-radius: 0px;
        border-right: transparent;
        width: 100%;
    }
</style>
<?php
if(isset($result)&&!empty($result))
{
    $name = $result->name;
    $visit_date =  date("Y/m/d",$result->visit_date);
    $visit_time_start = $result->visit_time_start;
    $mob = $result->mob;
    $fe2a =$result->fe2a ;
    $purpose = $result->purpose;
    $purpose_id_fk = $result->purpose_id_fk;
    $twasol = $result->twasol;
    $elentb =$result->elentb ;
    $degree_name =$result->degree_name ;
   $nategaa = $result->natega_visit;
    $nategaa_id_fk = $result->nategaa_id_fk;
    $kafel_status_fk = $result->kafel_status_fk;
    $financial_value = $result->financial_value;
    $out['form'] = 'Public_relation/addGam3iaVisitors/'.$result->id;
}else{
    $name = "فاعل خير";
    $visit_date = date("Y/m/d");
    $visit_time_start = date("h:i:sa");
    $mob = '';
    $fe2a = '';
    $purpose = '';
    $purpose_id_fk = '';
    $twasol = '';
    $elentb = '';
    $degree_name = '';
    $nategaa = '';
    $nategaa_id_fk = '';
    $kafel_status_fk = '';
    $financial_value = '';
    $out['form'] = 'Public_relation/addGam3iaVisitors';
}
    $f2at = array(
        1=>'الاسر',
        2=>'الكفلاء والمتبرعين',
        3=>'مؤسسات مانحة',
        4=>'المتطوعين',
        5=>'التوظيف',
        6=>'اخري'
    );
    $f2at_arr = array(
        1=>'الاسر',
        2=>'الكفلاء والمتبرعين',
        3=>'مؤسسات مانحة',
        4=>'المتطوعين',
        5=>'التوظيف',
        6=>'اخري'
    );
$elentb3 = array(
    1=>'ممتاز',
    2=>'جيد',
    3=>'مقبول',
    4=>'سيئة'
);
$yes_no = array(
        1=>'نعم',
        2=>'لا'
    );
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                    <div class="col-md-1 col-sm-6  padding-4 ">
                        <label class=" label">التاريخ</label>
                        <input type="text" name="visit_date" id="visit_date" readonly="readonly"
                               value="<?php echo $visit_date;?>"
                               class="form-control ">
                    </div>
                    <div class="col-md-1 col-sm-6  padding-4">
                        <label class=" label">وقت وصول الزائر</label>
                        <input type="text" name="visit_time_start" id="visit_time_start" readonly="readonly"
                               value="<?= $visit_time_start?>" data-validation="required"
                               class="form-control ">
                    </div>
                    <div class="col-md-3 col-sm-6  padding-4 ">
                        <label class=" label kafel">إسم الزائر </label>
                        <input type="text" name="name" id="name" value="<?php echo $name;?>"
                               class="form-control ">
                    </div>
                    <div class="col-md-3 col-sm-6  padding-4 ">
                        <label class=" label">رقم الجوال</label>
                        <span id="span_phone" style="color: red;    float: left;
    margin-top: -28px;"></span>
                        <input type="text" maxlength="10"
                         onkeyup="check_length_num(this,10,'span_phone');"
                         name="mob" id="mob" onkeypress="validate_number(event);"  value="<?php echo $mob;?>" class="form-control " data-validation="required">
                    </div>
                    <div class="col-md-2 col-sm-6  padding-4 ">
                        <label class=" label">الفئة</label>
                        <select id="fe2a" class="form-control " onchange="show_kafel(this.value);"
                                name="fe2a" >
                            <option value="">أختر</option>
                            <?php
                            foreach($f2at as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"
                                    <?php
                                    if(!empty($fe2a)){
                                        if($key ==$fe2a){
                                            echo 'selected'; }}  ?>> <?php echo $value;?></option >
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                      if ($fe2a == 2){
                          $display = "block";
                      } else{
                          $display = 'none'  ;
                      }
                    ?>
                    <div class="col-md-2 col-sm-6  padding-4 show_kafel " style="display: <?= $display ?>;">
                        <label class=" label">حالة الكافل / المتبرع</label>
                        <?php
                         $kafel_arr = array('1'=>'جديد','2'=>'قديم') ;
                        ?>
                        <select  class="form-control "
                                name="kafel_status_fk" id="kafel_status_fk" >
                            <option value="">اختر</option>
                            <?php
                            foreach($kafel_arr as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>-<?php echo $value;?>"
                                    <?php
                                    if(!empty($kafel_status_fk)){
                                        if($key ==$kafel_status_fk){
                                            echo 'selected'; }}  ?>> <?php echo $value;?></option >
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-6  padding-4 show_kafel " style="display: <?= $display ?>;">
                        <label class=" label"> العائد المادي</label>
                        <input type="text" name="financial_value" id="financial_value" onkeypress="validate_number(event);"
                               value="<?php echo $financial_value;?>" class="form-control " >
                    </div>
<div class="col-md-3 col-sm-6 padding-4 ">
	<label class=" label kafel">الغرض من الزيارة </label>
	<input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk="" data-title_n="" data-fe2a_type="">
		<input type="text" class="form-control  testButton inputclass"
                           name="purpose" id="purpose"
                           readonly="readonly"
                           onclick="change_type_setting(1,'الغرض من الزيارة','purpose_id_fk','purpose');load_settigs();"
                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                           data-validation="required"
                           value="
			<?= $purpose ?>">
			<input type="hidden" name="purpose_id_fk" id="purpose_id_fk" value="
				<?= $purpose_id_fk ?>">
				<button type="button"
                            onclick="change_type_setting(1,'الغرض من الزيارة','purpose_id_fk','purpose');load_settigs();"
                            class="btn btn-success btn-next">
					<i class="fa fa-plus"></i>
				</button>
			</div>
                    <!--<div class="col-md-3 col-sm-6 padding-4 ">
                        <label class=" label kafel">الغرض من الزيارة </label>
                        <input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk="" data-title_n="" >
                        <input type="text" class="form-control  testButton inputclass"
                               name="purpose" id="purpose"
                               readonly="readonly"
                               onclick="$('#settingModal').modal('show');change_type_setting(1,'الغرض من الزيارة','purpose_id_fk','purpose');load_settigs();"
                               style="cursor:pointer;border: white;color: black;width:87%;float: right;"
                               data-validation="required"
                               value="<?= $purpose?>">
                        <input type="hidden" name="purpose_id_fk" id="purpose_id_fk" value="<?= $purpose_id_fk?>">
                        <button type="button"
                                onclick="$('#settingModal').modal('show');change_type_setting(1,'الغرض من الزيارة','purpose_id_fk','purpose');load_settigs();"
                                class="btn btn-success btn-next" >
                            <i class="fa fa-plus"></i></button>
                    </div>-->
                  <!--  <div class="col-md-9 col-sm-6  no-padding">
                        <input type="text" name="purpose" id="purpose" value="<?php echo $purpose;?>"
                               class="form-control " >
                    </div> -->
	<div class="col-md-3 col-sm-6 padding-4 ">
				<label class=" label kafel">نتيجة الزيارة </label>
				<input type="text" class="form-control  testButton inputclass"
                           name="natega_visit" id="nategaa"
                           readonly="readonly"
                           onclick="change_type_setting(2,'نتيجة الزيارة ','nategaa_id_fk','nategaa');load_settigs();"
                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                           data-validation="required"
                           value="
					<?= $nategaa ?>">
					<input type="hidden" name="nategaa_id_fk" id="nategaa_id_fk" value="
						<?= $nategaa_id_fk ?>">
						<button type="button"
                            onclick="change_type_setting(2,'نتيجة الزيارة ','nategaa_id_fk','nategaa');load_settigs();"
                            class="btn btn-success btn-next">
							<i class="fa fa-plus"></i>
						</button>
					</div>
          <!--<div class="col-md-3 col-sm-6 padding-4 ">
        <label class=" label kafel">نتيجة الزيارة </label>
        <input type="text" class="form-control  testButton inputclass"
               name="natega_visit" id="nategaa"
               readonly="readonly"
               onclick="$('#settingModal').modal('show');change_type_setting(2,'نتيجة الزيارة ','nategaa_id_fk','nategaa');load_settigs();"
               style="cursor:pointer;border: white;color: black;width:87%;float: right;"
               data-validation="required"
               value="<?= $nategaa?>">
        <input type="hidden" name="nategaa_id_fk" id="nategaa_id_fk" value="<?= $nategaa_id_fk?>">
        <button type="button"
                onclick="$('#settingModal').modal('show');change_type_setting(2,'نتيجة الزيارة ','nategaa_id_fk','nategaa');load_settigs();"
                class="btn btn-success btn-next" >
            <i class="fa fa-plus"></i></button>
    </div>-->
   <!-- <div class="col-md-9 col-sm-6  no-padding">
        <input type="text" name="natega_visit" id="" value="<?= $nategaa ?> "
               class="form-control ">
    </div> -->
                    <div class="col-md-2 col-sm-6  padding-4" ">
                        <label class=" label">هل يرغب بالتواصل</label>
                <select id="twasol"  class="form-control " data-validation="required" name="twasol"
                >
                    <option value="">أختر</option>
                    <?php
                    foreach($yes_no as $key=>$value){
                        $select='';
                        if(!empty($twasol)){
                            if($key ==$twasol){
                                $select = 'selected';
                            }}
                        ?>
                        <option value="<?php echo $key;?>" <?=$select?>> <?php echo $value;?></option >
                    <?php } ?>
                </select>
                    </div>
                    <div class="col-md-2 col-sm-6  padding-4 ">
                        <label class=" label">إنطباع الزائر عن الجمعية</label>
                        <select id="elentb" class="form-control " data-validation="required"
                                name="elentb" >
                            <option value="">أختر</option>
                            <?php
                            foreach($elentb3 as $key=>$value){
                                $select='';
                                if(!empty($elentb)){
                                    if($key ==$elentb){
                                        $select = 'selected';
                                    }}
                                ?>
                                <option value="<?php echo $key;?>" <?=$select?> > <?php echo $value;?></option >
                            <?php } ?>
                        </select>
                    </div>
                <?php if($_SESSION['role_id_fk']==3){?>
                    <div class="col-md-12" style="display: none;">
                            <div class="col-md-6 col-sm-6  padding-4 ">
                                <label class=" label">اسم الموظف</label>
                                <input  type="text" name="degree_id" id="degree_id" value="<?=$record[0]->id?>">
                                <input  type="text" name="degree_name" id="degree_name"
                                        value="<?php if(isset($record[0]->employee)){ echo $record[0]->employee ; } ?>"
                                        class="form-control "
                                        data-validation-has-keyup-event="true">
                            </div>
                            <div class="col-md-6 col-sm-6  padding-4 ">
                                <label class=" label">الادارة</label>
                                <input   type="text" name="edara_id" id="edara_id"
                                         value="<?php if(isset($record[0]->admin_name)){ echo $record[0]->admin_name ; } ?>" data-validation="required"
                                         class="form-control "
                                         data-validation-has-keyup-event="true">
                            </div>
                            <div class="col-md-6 col-sm-6  padding-4 ">
                                <label class=" label kafel">القسم </label>
                                <input  disabled type="text" name="qsm" id="qsm" value="<?php if(isset($record[0]->depart_name)){ echo $record[0]->depart_name ; } ?>"
                                        class="form-control "
                                        data-validation="!!required"
                                        data-validation-has-keyup-event="true">
                            </div>
                    </div>
                <?php } ?>
                <?php if($_SESSION['role_id_fk']==1){?>
                <div class="col-md-12" style="display: none;">
                        <div class="col-md-3 col-sm-6  padding-4" >
                            <label class=" label">اسم الموظف</label>
                            <input  type="text" name="degree_id" id="degree_id" value="0">
                            <input  type="text" name="degree_name" id="degree_name"
                                    value="<?php echo $_SESSION['user_name'];?>"
                                    class="form-control "
                                    data-validation-has-keyup-event="true">
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4 ">
                            <label class=" label">الوظيفه </label>
                            <input  type="text" name="" id=""
                                    value="مدير علي النظام"
                                    class="form-control "
                                    data-validation-has-keyup-event="true">
                        </div>
                </div>
                <?php } ?>
<!--                <div class="form-group col-md-4 col-sm-6 padding-4">-->
<!--                    <br /><br />-->
<!--                    <button type="submit" id="save" name="add" value="add"-->
<!--                            class="btn btn-success">-->
<!--                        <span><i class="fa fa-floppy-o"></i></span> حفظ-->
<!--                    </button>-->
<!--                </div>-->
            <div class="clearfix"></div><br>
            <div class="col-md-12 text-center">
                <button type="submit"  class="btn btn-labeled btn-success " id="save" name="add" value="add"   >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
            <div class="clearfix"></div><br>
                <?php echo form_close();?>
                <?php
                if(isset($records)&&!empty($records)){
                    ?>
                    <table id="example" class=" display table table-bordered    responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg info">
                            <th>م</th>
                            <th>التاريخ</th>
                            <th>وقت وصول الزائر</th>
                            <th>اسم الزائر </th>
                            <th>رقم الجوال </th>
                            <th>الفئه </th>
                            <th>الغرض من الزيارة </th>
                            <th>يرغب بالتواصل </th>
                            <th>وقت انتهاء الزيارة</th>
                            <th>الوقت المستغرق</th>
                            <th>الاجراء</th>
                             <th>مستقبل الزيارة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){
                            if($row->twasol==1)
                            {
                                $color="green";
                            }else{
                                $color="red";
                            }
                            $timeIn = strtotime($row->visit_time_start);
                            $timeOUT = strtotime($row->visit_time_end);
                            $defrent =  $timeOUT - $timeIn;
                            $hours = floor($defrent / 3600);
                            $minutes = floor(($defrent / 60) % 60);
                            $time_def ='اقل من دقيقة';
                            if($minutes > 0){
                                $time_def =$minutes.' دقيقة  ';
                                if($hours > 0){
                                    $time_def .= $hours.' و ساعة ' ;
                                }
                            }
                            if(isset($f2at_arr[$row->fe2a]) and $f2at_arr[$row->fe2a] != null ){
                                    $f2at =  $f2at_arr[$row->fe2a];
                                }else{ $f2at =  'غير محدد ';}
                              if(isset($row->name) and $row->name != null ){
                                    $visitor_name =  $row->name;
                                }else{ $visitor_name =  'غير محدد ';}
                               if(isset( $yes_no[$row->twasol]) and  $yes_no[$row->twasol] != null ){
                                    $twasol =   $yes_no[$row->twasol];
                                }else{ $twasol =  'غير محدد ';}
                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo date("Y-m-d",$row->visit_date);?></td>
                                <td><?php echo $row->visit_time_start ;?></td>
                                <td style="padding: 0;"><?php echo $visitor_name;
?></td>
                                <td><?php echo $row->mob ;?></td>
                                <td><?php echo  $f2at ;?></td>
                                <td><?php echo word_limiter($row->purpose, 4) ;?>
                                   <!-- <button type="button" class="btn btn-sm btn-primary"
                                        data-text="<?=$row->purpose?>" onclick="get_details($(this).attr('data-text'))" data-toggle="modal" data-target="#purpose_detail">
                                        المزيد
                                    </button>-->
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
            onclick="get_text('<?= $row->purpose ?>','<?= $row->natega_visit ?>')"
            data-target="#purpose_detail">
        تفاصيل
    </button>
                                </td>
                                <td style="background-color: <?php echo $color;?>"> 
                                        <?php echo $twasol ;?> </td>
                                <td><?php echo $row->visit_time_end ;?></td>
                                <td><?php echo $time_def ;?></td>
<td>
    <!--***********/////////////////////////////********* 11 *****************//////////////-->
    <?php 
      if($_SESSION['role_id_fk'] ==3) {
    if ((isset($roles)) && (!empty($roles))) {
        if ($roles->edit == 1) {
            ?>
            <a href="<?php echo base_url(); ?>Public_relation/addGam3iaVisitors/<?php echo $row->id; ?>"><i
                        class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
        <?php }if ($roles->delet == 1) {
            ?>
            <a href="<?php echo base_url(); ?>Public_relation/deleteGam3iaVisitors/<?php echo $row->id; ?>"
               onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                        class="fa fa-trash" aria-hidden="true"></i> </a>
        <?php }
        ?>
    <?php } }else {
        ?>
        <a href="<?php echo base_url(); ?>Public_relation/addGam3iaVisitors/<?php echo $row->id; ?>"><i
                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
        <a href="<?php echo base_url(); ?>Public_relation/deleteGam3iaVisitors/<?php echo $row->id; ?>"
           onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                    class="fa fa-trash" aria-hidden="true"></i> </a>
        <?php
    } 
     ?>
    <!--///////////////////////***************************//////////////////////////////////****************-->
</td>
<td><?php if(!empty($row->degree_name)){
        echo $row->degree_name;}else{
            echo 'غير محدد';
            }?></td>
                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--
<div class="modal fade" id="purpose_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-success" style="h">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل الزيارة</h5>
            </div>
            <div class="modal-body">
               <div id="purpose_details"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
-->
<div class="modal fade" id="purpose_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-success" style="h">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل الزيارة</h5>
            </div>
            <div class="modal-body">
                <div class="panel panel-warning" style="box-shadow: 2px 2px 8px #000;">
                    <div class="panel-heading">
                        <h5 class="text-center">الغرض من الزيارة</h5>
                    </div>
                    <div class="panel-body">
                        <p id="ghared">
                            </p>
                    </div>
                </div>
                <div class="panel panel-info" style="box-shadow: 2px 2px 8px #000;">
                    <div class="panel-heading">
                        <h5 class="text-center">نتيجة الزيارة</h5>
                    </div>
                    <div class="panel-body">
                        <p id="natega"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title_setting ">  </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid"  id="">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success " onclick="$('#add_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="add_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label title_setting  "> </label>
                                    <input type="text" onfocus="$('.add_title').hide();" name="name" id="add_title"
                                           value=""
                                           class="form-control">
                                    <input type="hidden" name="row_setting_id" id="row_setting_id" value="">
                                    <span class="add_title" style="color: red; display: none;">هذا الحقل مطلوب</span>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" >
                                    <button type="button" onclick="add_setting($('#add_title').val(),'add_title','output'); " style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="setting_output">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<script>
    function get_details(content) {
        $('#purpose_details').text(content);
    }
</script>
<script>
    function get_text(ghared, natega) {
        $('#ghared').text(ghared);
        $('#natega').text(natega);
    }
</script>
<!--Nagwa 8-1 -->
<script>
    function change_type_setting(id, title, title_fk, title_n) {
        var fe2a_type = $('#fe2a').val();
        $('.title_setting').text(title);
        $('#type_setting').data('id', id);
        $('#type_setting').data('title', title);
        $('#type_setting').data('title_fk', title_fk);
        $('#type_setting').data('title_n', title_n);
        $('#type_setting').data('fe2a_type', fe2a_type);
    }
   /* function change_type_setting(id,title,title_fk,title_n) {
        $('.title_setting').text(title);
        $('#type_setting').data('id', id);
        $('#type_setting').data('title', title);
        $('#type_setting').data('title_fk', title_fk);
        $('#type_setting').data('title_n', title_n);
    }*/
</script>
<script>
    function add_setting(value, title, div) {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var row_id = $('#row_setting_id').val();
        var fe2a_type = $('#fe2a').val();
        if (value != 0 && value != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>Public_relation/add_setting',
                data: {value: value, type: type, type_name: type_name, row_id: row_id,fe2a_type:fe2a_type},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                }
            });
        }
        else {
            swal({
                title: 'من فضلك تأكد من الحقول الناقصه !',
                type: 'warning',
                confirmButtonText: 'تم'
            });
        }
    }
    /*function add_setting(value, title, div) {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var row_id = $('#row_setting_id').val();
        alert(row_id);
        // alert(value);
        if (value != 0 && value != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>Public_relation/add_setting',
                data: {value: value,type:type,type_name:type_name,row_id:row_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                 //   $("#"+ div).html(html);
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                }
            });
        }
        else {
            swal({
                title: 'من فضلك تأكد من الحقول الناقصه !',
                type: 'warning',
                confirmButtonText: 'تم'
            });
        }
    }*/
</script>
<script>
    function load_settigs() {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var fe2a_type = $('#fe2a').val();
         if (fe2a_type !=''){
             $('#settingModal').modal('show');
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>Public_relation/load_settigs',
                 data: {type: type, type_name: type_name,fe2a_type:fe2a_type},
                 dataType: 'html',
                 cache: false,
                 beforeSend: function () {
                     $('#setting_output').html(
                         '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                     );
                 },
                 success: function (html) {
                     $('#setting_output').html(html);
                 }
             });
         }  else{
             swal({
                 title: 'من فضلك حدد الفئه اولا !',
                 type: 'warning',
                 confirmButtonText: 'تم'
             });
         }
    }
    /*function load_settigs() {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>Public_relation/load_settigs',
            data: {type:type,type_name:type_name},
            dataType: 'html',
            cache: false,
            beforeSend: function() {
                $('#setting_output').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (html) {
              $('#setting_output').html(html);
            }
        });
    }*/
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#type_setting').data("title_fk");
        var title_n = $('#type_setting').data("title_n");
        /// id title function
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#settingModal').modal('hide');
    }
</script>
<script>
    function show_kafel(value) {
        $('#nategaa').val('');
        $('#purpose').val('');
        $('#purpose_id_fk').val('');
        $('#nategaa_id_fk').val('');
        if (value == 2) {
            $('.show_kafel').show();
        } else {
            $('.show_kafel').hide();
            $('#financial_value').val('');
            $('#kafel_status_fk').val('');
        }
    }
   /* function show_kafel(value) {
        if (value==2) {
            $('.show_kafel').show();
        } else{
            $('.show_kafel').hide();
            $('#financial_value').val('');
            $('#kafel_status_fk').val('');
        }
    }*/
</script>
<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled","disabled");
        }
       else if ($(this_input).val() == '0000000000') {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html(" الرقم مكون من اصفار");
        $('button[type="submit"]').attr("disabled","disabled");
        }
         else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>