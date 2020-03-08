<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }
    .right-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }
    .left-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }

</style>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-9">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <?php
            if(isset($item)&&!empty($item)){
               $emp_id_fk=$item->emp_id_fk;
                $vacation_type_id_fk=$item->vacation_type_id_fk;
                $vacation_from_date=$item->vacation_from_date;
                $vacation_to_date=$item->vacation_to_date;
                $num_days=$item->num_days;
                $adress_since_vacation=$item->adress_since_vacation;
                $mob_since_vacation=$item->mob_since_vacation;
                $promise=$item->promise;
                $emp_badel_promise=$item->emp_badel_promise;
                $emp_badel_id_fk=$item->emp_badel_id_fk;
                $date_back=$item->date_back;
                $allDayes= $item->allDayes;
                $vacation_from_date_hijri = $item->vacation_from_date_hijri;
                $vacation_to_date_hijri = $item->vacation_to_date_hijri;
                $max_days = $item->max_days;
                $min_days = $item->min_days;
                $date_back_hijri = $item->date_back_hijri;

                
            }else{

                $emp_id_fk='';
                $vacation_type_id_fk='';
                $vacation_from_date='';
                $vacation_to_date='';
                $num_days=1;
                $adress_since_vacation='';
                $mob_since_vacation='';
                $promise='';
                $emp_badel_id_fk='';
                $date_back=date("m/d/Y",strtotime(date("m/d/Y"). ' + 1 days'));
                //$date_back_hijri=date("m/d/Y",strtotime(date("m/d/Y"). ' + 1 days'));
                $emp_badel_promise='';
                $allDayes = '';
                $vacation_from_date_hijri = '';
                $vacation_to_date_hijri = '';
                $max_days = '';
                $min_days = '';
                $date_back_hijri = '';
            }
            ?>


            <div class="panel-body">
                <?php
                if(isset($item)&&!empty($item)){?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Vacation/edit_vacation/<?php echo $this->uri->segment(5);?>" method="post">

                <?php } else{?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Vacation/add_vacation" method="post">

                    <?php }?>

                    <input type="hidden" id="emp_id" name="emp_id_fk" value="<?php if(!empty($emp_data->id)){ echo $emp_data->id; }else{ echo 0 ; }?> ">
                    <input type="hidden" id="administration" name="edara_id_fk" value="<?php if(!empty($emp_data->administration)){ echo $emp_data->administration; }else{ echo 0 ; }?>  ">

                    <input type="hidden" id="department" name="qsm_id_fk" value="<?php if(!empty($emp_data->department)){ echo $emp_data->department; }else{ echo 0 ; }?>  ">

                    <input type="hidden" id="manger" name="direct_manager_id_fk" value="<?php if(!empty($emp_data->manger)){ echo $emp_data->manger; }else{ echo 0 ; }?>  ">


                    <?php $role=$_SESSION['role_id_fk'];?>

                <div class="col-md-12">
                    <div class="col-md-4">
                        <label class="label top-label">نوع الاجازه</label>

                        <select name="vacation_type_id_fk" id="type_vacation" onchange="checkValidateVacationDayes(); $('#max_days').val($('option:selected', this).attr('data-max')); $('#min_days').val($('option:selected', this).attr('data-min')); get_option($(this).val()); "
                                data-validation="required" class="form-control bottom-input">


                            <option data-min="" data-max="" value=" " selected="">اختر</option>
                            <?php

                            foreach ($vacations as $row){
                                ?>
                                <option data-min="<?=$row->min_days?>" data-max="<?=$row->max_days?>" value="<?php echo $row->id;?>" <?php if($row->id==$vacation_type_id_fk){echo 'selected'; }?>><?php echo $row->name;?></option>
                            <?php } ?>
                            <option value="0" <?php if($vacation_type_id_fk==0){echo 'selected'; }?>>اضطراريه</option>
                        </select>

                    </div>

                    <div class="col-md-4">
                        <label class="label top-label">اسم الموظف</label>
                        <select name=""  id="employee_name"
                                data-validation="required" class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true" onchange="get_emp_data($(this).val()); $('#mob').val($('option:selected', this).attr('data-mobile')); checkValidateVacationDayes();
                                
                                ">
                            <option data-mobile='' allDayes='' value="">إختر</option>
                            <?php
                            if(isset($all_emps)&&!empty($all_emps)) {
                                foreach($all_emps as $row){
                                    $select='';
                                    if(!empty($emp_data->id) &&  $emp_data->id == $row->id){
                                        $select='selected';
                                    }
                                    ?>
                                    <option allDayes="<?=$row->allDayes?>" casual="<?=$row->casual?>" casual_vacation="<?=$row->casual_vacation_num?>" vDayes="<?=$row->vDayes?>" data-mobile="<?=$row->phone?>" value="<?php echo $row->id;?>" <?php if($role!=1){ echo $select; }  if($row->id==$emp_id_fk){echo 'selected'; }?> > <?php echo $row->employee;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <?php
                    //if (isset($item) && $item != null) { ?>
                    <!--script type="text/javascript">
                       
                        //document.getElementById('employee_name').value=<?=$emp_id_fk?>;
                        var select = document.getElementById('employee_name');
                        //alert(select.value);
                        get_emp_data(5); 
                        //$('#mob').val($('select option:selected').attr('data-mobile'));
                        //checkValidateVacationDayes();

                        alert(document.getElementById('employee_name').value);
                    </script-->
                    <?php  
                    //}
                    ?>

                    <div class="col-md-4">
                        <label class="label top-label">الرصيد المتاح</label>
                        <input type="text"  readonly="readonly" name="allDayes"  id="allDayes" value="<?=$allDayes?>"
                               class="form-control bottom-input"
                               data-validation="required" onkeypress="validate_number(event);"
                               data-validation-has-keyup-event="true">
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-4  col-sm-6 padding-3">
                        <label class="label top-label">
                            <img style="width: 23px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ بداية الإجازة
                            <img style="width: 23px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>

                        <div id="cal-end-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-start" name="vacation_from_date_hijri" class="form-control bottom-input " type="text" 
                                   onfocus="showCalEnd2();" value="<?=$vacation_from_date_hijri?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-end-1" style="width: 50%;float: left;">
                            <input id="start_date" name="vacation_from_date" class="form-control bottom-input " 
                                    type="text" onfocus="showCalEnd1();" value="<?php echo $vacation_from_date;?>"
                                   style=" width: 100%;float: right" onchange="//get_date();" />
                        </div>
                    </div>
           

                    <div class="form-group col-md-4  col-sm-6 padding-3">
                        <label class="label top-label">
                            <img style="width: 23px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ نهاية الإجازة
                            <img style="width: 23px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>

                        <div id="cal-end-4" style="width: 50%;float: right;">
                            <input id="vacation_to_date_hijri" name="vacation_to_date_hijri" class="form-control bottom-input " type="text"  
                                   onfocus="showCalEnd4();" value="<?=$vacation_to_date_hijri?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-end-3" style="width: 50%;float: left;">
                            <input id="end_date"   name="vacation_to_date" class="form-control bottom-input " 
                                    type="text" onfocus="showCalEnd3();" value="<?php echo $vacation_to_date;?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        
                        <div id="cal-end-4" style="width: 33%;float: right;">
                            <label class="label top-label">عدد الأيام</label>
                            <input type="text"  readonly="readonly" name="num_days"  id="num_days" value="<?php echo $num_days;?>"
                               class="form-control bottom-input"
                               data-validation="required" onkeypress="validate_number(event);"
                               data-validation-has-keyup-event="true">
                        </div>

                        <div id="cal-end-4" style="width: 33%;float: right;     padding-right: 3px;">
                            <label class="label top-label">أقصى عدد </label>
                            <input type="text"  readonly="readonly" name="max_days"  id="max_days" value="<?=$max_days?>"
                               class="form-control bottom-input"
                               data-validation="required" onkeypress="validate_number(event);"
                               data-validation-has-keyup-event="true">
                        </div>

                        <div id="cal-end-4" style="width: 33%;float: right;     padding-right: 3px;">
                            <label class="label top-label">أقل عدد </label>
                            <input type="text"  readonly="readonly" name="min_days"  id="min_days" value="<?=$min_days?>"
                               class="form-control bottom-input"
                               data-validation="required" onkeypress="validate_number(event);"
                               data-validation-has-keyup-event="true">
                        </div>
                    </div>
       
                    </div>


                <div class="col-md-12">

                    <div class="form-group col-md-4  col-sm-6 padding-3">
                        <label class="label top-label">
                            <img style="width: 23px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ مباشره  العمل
                            <img style="width: 23px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>

                        <div id="cal-end-4" style="width: 50%;float: right;">
                            <input 
                              name="date_back_hijri" id="date_back_hijri" value="" readonly="" 
                             class="form-control bottom-input " type="text"  
                                   onfocus="showCalEnd6();" value=""
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-end-3" style="width: 50%;float: left;">
                            <input  class="form-control bottom-input " 
                              name="date_back" id="back_work" readonly=""
                                    type="text" onfocus="showCalEnd5();" value="<?php echo $date_back;?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label class="label top-label">العنوان اثناء الاجازه</label>
                       <textarea id="adress"  <?php if($vacation_type_id_fk==0){?>  <?php } ?>  data-validation="" name="adress_since_vacation" class="form-control bottom-input" style="margin: 0"><?php echo $adress_since_vacation;?></textarea>
                    </div>



                    <div class="col-md-4">
                        <label class="label top-label">الجوال</label>
                        <input type="text" maxlength="10" onkeyup="get_length($(this).val());" <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?>  name="mob_since_vacation" id="mob" value="<?php if(!empty($emp_data->id)) echo $emp_data->phone; else echo $mob_since_vacation;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <span style="color: red;">رقم الجوال 10 ارقام فقط</span>
                    </div>


                </div>
                <!--div id="emp" <?php if($vacation_type_id_fk==0){?>  style="display: none;"<?php } ?>>
                <div class="col-md-12">
                    <div class="col-sm-12 no-padding">
                        <h6 class="text-center inner-heading">اقرار الموظف</h6>
                    </div>
                    </div>
                    <div class="col-md-12">
                     <input type="checkbox"  <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?> id="promise" <?php if($promise==1){ echo 'checked';}?>   value="1" data-validation="required" name="promise">
                        أتعهد بتسليم كل مهامي للموظف البديل والعودة من إجازتي في الموعد المحدد
                </div>
                    </div-->

                <!--div id="other_emp" <?php if($vacation_type_id_fk==0){?>  style="display: none;"<?php } ?>>
                    <div class="col-md-12">
                        <div class="col-sm-12 no-padding">
                            <h6 class="text-center inner-heading">اختيار الموظف البديل</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="label top-label">اختيار الموظف  </label>
                            <select   name="emp_badel_id_fk" id="administrat"
                                    class="form-control bottom-input "

                                    onchange=""
                                     aria-required="true">
                                <option value="">إختر</option>
                                <?php
                                if (!empty($employies)):
                                    foreach ($employies as $record):

                                        ?>

                                        <option
                                            value="<? echo $record->id; ?>" <?php if($record->id==$emp_badel_id_fk){echo 'selected'; }?>><? echo $record->employee; ?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12" style="padding:15px ;">

                            <input type="checkbox" <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?> id="emp_badel_promise" value="1" <?php if($emp_badel_promise==1){ echo 'checked';}?>
                                   data-validation="required" name="emp_badel_promise">
                            أتعهد بأن أقوم باستلام جميع الأعمال الموكلة للموظف المذكورة أعلاه قبل موعد إجازته وتنفيذها في مواعيدها


                        </div>
                        </div>

                </div-->
                <div class="col-md-12">
                    <input type="submit" onclick="return checkValidateMaxMin();" id="reg"  value="حفظ" class="btn btn-add"  name="add" >

                </div>
                </form>
                </div>




                </div>
        </div>

<div id="load3">

    <?php $data_load["personal_data"]=$personal_data;
    $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);?>

</div>



</div>
<?php
if(isset($items)&&!empty($items)){
?>
<div class="col-sm-12 no-padding " >
    
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
<table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="visible-md visible-lg">
        <th>مسلسل</th>
        <th>نوع الاجازه</th>
        <th>بدايه الاجازه</th>
        <th>نهايه الاجازه</th>
        <th>عدد الايام المطلوبه</th>
        <th>التفاصيل</th>
        <th> الاجراء</th>
        <th>حاله الطلب </th>



    </tr>

    </thead>
    <tbody>

    <?php
    if (isset($items) && !empty($items)) {
        $x = 1;

    foreach ($items as $row) {



        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $row->name ;?></td>
            <td><?php echo $row->vacation_from_date ;?></td>
            <td><?php echo $row->vacation_to_date ;?></td>
            <td><?php echo $row->num_days ;?></td>
            <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>">التفاصيل</button></td>

            <td>


<a href="<?php echo base_url(); ?>human_resources/employee_forms/Vacation/edit_vacation/<?php echo $row->id;?>"><i
class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

<a href="<?php echo base_url(); ?>human_resources/employee_forms/Vacation/delete_vacation/<?php echo $row->id;?>"
onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                 aria-hidden="true"></i> </


</td>
<td></td>


        </tr>
        <?php
        $x++;
    }
    }
    ?>

    </tbody>
</table>
</div></div>

<?php } ?>
<!--------------------------------------------------------modal------------------------------------>


<?php
if (isset($items) && !empty($items)) {
    $x = 1;

    foreach ($items as $row) { ?>


        <div class="modal fade" id="myModal<?php echo$row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " style="width: 80%" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->employee;?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr class="info">
                                <th colspan="4" class="bordered-bottom">تفاصيل الاجازه</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th class="gray-background">نوع الاجازه:</th>
                                <td width="15%"><?php echo $row->name;?></td>
                                <th class="gray-background">تاريخ بدايه الاجازه:</th>
                                <th width="20%"><?php echo $row->vacation_from_date;?></th>

                            </tr>
                            <tr>
                                <th class="gray-background">تاريخ نهايه الاجازه:</th>
                                <td><?php echo $row->vacation_to_date;?></td>
                                <th class="gray-background">عددايام الاجازه:</th>
                                <td><?php echo $row->num_days;?></td>

                            </tr>

                            <tr>
                                <th class="gray-background">تاريخ مباشره  العمل:</th>
                                <td><?php echo $row->date_back;?></td>
                                <th class="gray-background">الموظف البديل:</th>
                                <td><?=($row->badl_emp != null)? $row->badl_emp->employee:'لم يحدد';?></td>

                            </tr>
                            <tr>
                                <th class="gray-background">العنوان اثناء الاجازه:</th>
                                <td><?php echo $row->adress_since_vacation;?></td>
                                <th class="gray-background">االجوال اثناء الاجازه:</th>
                                <td><?php echo $row->mob_since_vacation;?></td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>



    <?php }
} ?>


<!--------------------------------------------------------------->
<script type="text/javascript">
    function gmod(n,m){
return ((n%m)+m)%m;
}

function kuwaiticalendar(adjust){
var today = new Date(document.getElementById("back_work").value);

if(adjust) {
    adjustmili = 1000*60*60*24*adjust; 
    todaymili = today.getTime()+adjustmili;
    today = new Date(todaymili);
}
day = today.getDate();
month = today.getMonth();
year = today.getFullYear();
m = month+1;
y = year;
if(m<3) {
    y -= 1;
    m += 12;
}

a = Math.floor(y/100.);
b = 2-a+Math.floor(a/4.);
if(y<1583) b = 0;
if(y==1582) {
    if(m>10)  b = -10;
    if(m==10) {
        b = 0;
        if(day>4) b = -10;
    }
}

jd = Math.floor(365.25*(y+4716))+Math.floor(30.6001*(m+1))+day+b-1524;

b = 0;
if(jd>2299160){
    a = Math.floor((jd-1867216.25)/36524.25);
    b = 1+a-Math.floor(a/4.);
}
bb = jd+b+1524;
cc = Math.floor((bb-122.1)/365.25);
dd = Math.floor(365.25*cc);
ee = Math.floor((bb-dd)/30.6001);
day =(bb-dd)-Math.floor(30.6001*ee);
month = ee-1;
if(ee>13) {
    cc += 1;
    month = ee-13;
}
year = cc-4716;


wd = gmod(jd+1,7)+1;

iyear = 10631./30.;
epochastro = 1948084;
epochcivil = 1948085;

shift1 = 8.01/60.;

z = jd-epochastro;
cyc = Math.floor(z/10631.);
z = z-10631*cyc;
j = Math.floor((z-shift1)/iyear);
iy = 30*cyc+j;
z = z-Math.floor(j*iyear+shift1);
im = Math.floor((z+28.5001)/29.5);
if(im==13) im = 12;
id = z-Math.floor(29.5001*im-29);

var myRes = new Array(8);

myRes[0] = day; //calculated day (CE)
myRes[1] = month; //calculated month (CE)
myRes[2] = year; //calculated year (CE)
myRes[3] = jd-1; //julian day number
myRes[4] = wd-1; //weekday number
myRes[5] = id; //islamic date
myRes[6] = im; //islamic month
myRes[7] = iy; //islamic year

return myRes;
}
function writeIslamicDate(adjustment) {
var wdNames = new Array("Ahad","Ithnin","Thulatha","Arbaa","Khams","Jumuah","Sabt");
var iMonthNames = new Array("Muharram","Safar","Rabi'ul Awwal","Rabi'ul Akhir",
"Jumadal Ula","Jumadal Akhira","Rajab","Sha'ban",
"Ramadan","Shawwal","Dhul Qa'ada","Dhul Hijja");
var iDate = kuwaiticalendar(adjustment);
var outputIslamicDate = (iDate[5])+'/'+ (iDate[6])+'/'+ iDate[7];
return outputIslamicDate;
}
</script>

<script type="text/javascript">
    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());

        time1 = Math.abs(date.getTime());

        time2 = 1000 * 3600 * 24 * days;

        total = time1 + time2;

        date = new Date(total);
        
        return date;
    }
</script>

<script>

    function get_date(end_date, start_date)
    {
        if(end_date=='' || start_date=='')
        {
            return 1;
        }
        var a = new Date(end_date);
        var x = new Date(start_date);
       
        diffDays = '';
        if (a >= x) {
            var timeDiff = Math.abs(a.getTime() - x.getTime());
            diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            
            var date = new Date(document.getElementById("end_date").value);
            day = date.addDays(1).getDate();
            month = date.addDays(1).getMonth()+1;
            year = date.addDays(1).getFullYear();
        document.getElementById("back_work").value = month+'/'+day+'/'+year;

        document.getElementById("date_back_hijri").value = writeIslamicDate();

        document.getElementById("num_days").value=diffDays+1;
        return diffDays+1;
    }
    else {
        alert('لا يجب أن يسبق تاريخ نهاية الإجازة تاريخ بدايته!');
        document.getElementById("end_date").value = '';
        document.getElementById("vacation_to_date_hijri").value = '';
        document.getElementById("num_days").value = '';
        document.getElementById("date_back_hijri").value = '';
        document.getElementById("back_work").value = '';
        return diffDays;
        /*$('#end_date').val('');
        $('#vacation_to_date_hijri').val('');
        $('#num_days').val('');
        $('#date_back_hijri').val('');
        $('#back_work').val('');*/
    }
    }
</script>
<script>

  function get_option(valu)
   {

      if(valu==0)
      {
          $('#other_emp').hide();
          $('#emp').hide();



          document.getElementById("emp_badel_promise").setAttribute("disabled", "disabled");
          document.getElementById("promise").setAttribute("disabled", "disabled");

          //document.getElementById("adress").setAttribute("disabled", "disabled");
          document.getElementById("mob").setAttribute("disabled", "disabled");


          document.getElementById("num_days").setAttribute("disabled", "disabled");
          //document.getElementById("end_date").setAttribute("disabled", "disabled");
          //document.getElementById("vacation_to_date_hijri").setAttribute("disabled", "disabled");
          document.getElementById("back_work").setAttribute("disabled", "disabled");
          document.getElementById("end_day").setAttribute("disabled", "disabled");
          document.getElementById("start_day").setAttribute("disabled", "disabled");
         // document.getElementById("other_emp").style.display = "none";


      }else{
          $('#other_emp').show();
          $('#emp').show();
          //document.getElementById("adress").removeAttribute("disabled", "disabled");
          document.getElementById("mob").removeAttribute("disabled", "disabled");

          document.getElementById("emp_badel_promise").removeAttribute("disabled", "disabled");
          document.getElementById("promise").removeAttribute("disabled", "disabled")
          document.getElementById("num_days").removeAttribute("disabled", "disabled");
          //document.getElementById("end_date").removeAttribute("disabled", "disabled");
          //document.getElementById("vacation_to_date_hijri").removeAttribute("disabled", "disabled");
          document.getElementById("back_work").removeAttribute("disabled", "disabled")
          document.getElementById("end_day").removeAttribute("disabled", "disabled");
          document.getElementById("start_day").removeAttribute("disabled", "disabled");


        //  document.getElementById("other_emp").style.display = "none";

      }
   }

</script>

<script>

   function get_length(valu)
   {

       if(valu.length>10){
           document.getElementById("reg").setAttribute("disabled", "disabled");

       }
       if(valu.length<10){
       document.getElementById("reg").setAttribute("disabled", "disabled");

   }
       if(valu.length==10){
           document.getElementById("reg").removeAttribute("disabled", "disabled");

       }
   }

</script>


<script>
   function get_emp_data(valu)
   {
       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_emp_data",
           data:{valu:valu},
           success:function(d) {


              var obj=JSON.parse(d);



               $('#job_title_id_fk').val(obj.degree_id);
               $('#administration3').val(obj.administration);
               $('#department3').val(obj.department);
               $('#emp_id').val(obj.id);
               $('#administration').val(obj.administration);
               $('#department').val(obj.department);
               $('#manger').val(obj.manger);

           }






       });


       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_load_page",
           data:{valu:valu},
           success:function(d) {

           $('#load3').html(d);


           }






       });
   }


</script>



<script src='<?php echo base_url();?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/calendar.js'></script>
<script>


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('start_date'),
        dateEnd2 = document.getElementById('date-Hijri-start'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();


    dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



    calEnd1.show();
    calEnd2.show();
    setDateFieldsEnd1();





    calEnd1.callback = function () {
        if (calEnd1Mode !== calEnd1.isHijriMode()) {
            calEnd2.disableCallback(true);
            calEnd2.changeDateMode();
            calEnd2.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd2.setTime(calEnd1.getTime());
        setDateFieldsEnd1();
    };

    calEnd2.callback = function () {
        if (calEnd2Mode !== calEnd2.isHijriMode()) {
            calEnd1.disableCallback(true);
            calEnd1.changeDateMode();
            calEnd1.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd1.setTime(calEnd2.getTime());
        setDateFieldsEnd1();
    };





    calEnd1.onHide = function() {
        calEnd1.show(); // prevent the widget from being closed
      
    };

    calEnd2.onHide = function() {
        calEnd2.show(); // prevent the widget from being closed
       
    };





    function setDateFieldsEnd1() {
        <?php if (isset($item) && $item != null) { ?>
            dateEnd1.value = '<?=$vacation_from_date?>';
            dateEnd2.value = '<?=$vacation_from_date_hijri?>';
        <?php } else { ?>
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
        <?php } ?>

        var diffDays = get_date(document.getElementById("end_date").value,dateEnd1.value);
        document.getElementById("num_days").value=diffDays;

        dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
    }




    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
    }

    function showCalEnd2() {
        if (calEnd2.isHidden())
            calEnd2.show();
        else
            calEnd2.hide();
    }


    //# sourceURL=pen.js
    
 /////////////////////////////////////


    var calEnd3 = new Calendar(),
        calEnd4 = new Calendar(true, 0, true, true),
        dateEnd3 = document.getElementById('end_date'),
        dateEnd4 = document.getElementById('vacation_to_date_hijri'),
        calEnd3Mode = calEnd3.isHijriMode(),
        calEnd4Mode = calEnd4.isHijriMode();


    dateEnd3.setAttribute("value",calEnd3.getDate().getDateString());
    dateEnd4.setAttribute("value",calEnd4.getDate().getDateString());

    document.getElementById('cal-end-3').appendChild(calEnd3.getElement());
    document.getElementById('cal-end-4').appendChild(calEnd4.getElement());



    calEnd3.show();
    calEnd4.show();
    setDateFieldsEnd2();



    calEnd3.callback = function () {
        if (calEnd3Mode !== calEnd3.isHijriMode()) {
            calEnd4.disableCallback(true);
            calEnd4.changeDateMode();
            calEnd4.disableCallback(false);
            calEnd3Mode = calEnd3.isHijriMode();
            calEnd4Mode = calEnd4.isHijriMode();
        } else

            calEnd4.setTime(calEnd3.getTime());
        setDateFieldsEnd2();
    };

    calEnd4.callback = function () {
        if (calEnd4Mode !== calEnd4.isHijriMode()) {
            calEnd3.disableCallback(true);
            calEnd3.changeDateMode();
            calEnd3.disableCallback(false);
            calEnd3Mode = calEnd3.isHijriMode();
            calEnd4Mode = calEnd4.isHijriMode();
        } else

            calEnd3.setTime(calEnd4.getTime());
        setDateFieldsEnd2();
    };





    calEnd3.onHide = function() {
        calEnd3.show(); // prevent the widget from being closed
      
    };

    calEnd4.onHide = function() {
        calEnd4.show(); // prevent the widget from being closed
       
    };





    function setDateFieldsEnd2() {
        <?php if (isset($item) && $item != null) { ?>
            dateEnd3.value = '<?=$vacation_to_date?>';
            dateEnd4.value = '<?=$vacation_to_date_hijri?>';
        <?php } else { ?>
            dateEnd3.value = calEnd3.getDate().getDateString();
            dateEnd4.value = calEnd4.getDate().getDateString();
        <?php } ?>

        var diffDays = get_date(dateEnd3.value,dateEnd1.value);

        dateEnd3.setAttribute("value",calEnd3.getDate().getDateString());
        dateEnd4.setAttribute("value",calEnd4.getDate().getDateString());
    }


    function showCalEnd3() {
        if (calEnd3.isHidden())
            calEnd3.show();
        else
            calEnd3.hide();
        
    }

    function showCalEnd4() {
        if (calEnd4.isHidden())
            calEnd4.show();
        else
            calEnd4.hide();
    }

    /////////////////////////////////////////////

    

    

 
    /////////////////////////////////////


    var calEnd5 = new Calendar(),
        calEnd6 = new Calendar(true, 0, true, true),
        dateEnd5 = document.getElementById('back_work'),
        dateEnd6 = document.getElementById('date_back_hijri'),
        calEnd5Mode = calEnd5.isHijriMode(),
        calEnd6Mode = calEnd6.isHijriMode();

        var date = new Date(document.getElementById("end_date").value);
        dateEnd5 = date.addDays(1);

    dateEnd5.setAttribute("value",calEnd5.getDate().getDateString());
    dateEnd6.setAttribute("value",calEnd6.getDate().getDateString());



    document.getElementById('cal-end-5').appendChild(calEnd5.getElement());
    document.getElementById('cal-end-6').appendChild(calEnd6.getElement());



    calEnd5.show();
    calEnd6.show();
    setDateFieldsEnd3();



    calEnd5.callback = function () {
        if (calEnd5Mode !== calEnd5.isHijriMode()) {
            calEnd6.disableCallback(true);
            calEnd6.changeDateMode();
            calEnd6.disableCallback(false);
            calEnd5Mode = calEnd5.isHijriMode();
            calEnd6Mode = calEnd6.isHijriMode();
        } else

            calEnd6.setTime(calEnd5.getTime());
        setDateFieldsEnd3();
    };

    calEnd6.callback = function () {
        if (calEnd6Mode !== calEnd6.isHijriMode()) {
            calEnd5.disableCallback(true);
            calEnd5.changeDateMode();
            calEnd5.disableCallback(false);
            calEnd5Mode = calEnd5.isHijriMode();
            calEnd6Mode = calEnd6.isHijriMode();
        } else

            calEnd5.setTime(calEnd6.getTime());
        setDateFieldsEnd3();
    };





    calEnd5.onHide = function() {
        calEnd5.show(); // prevent the widget from being closed
      
    };

    calEnd6.onHide = function() {
        calEnd6.show(); // prevent the widget from being closed
       
    };





    function setDateFieldsEnd3() {
        dateEnd5.value = calEnd5.getDate().getDateString();
        dateEnd6.value = calEnd6.getDate().getDateString();

        console.log(document.getElementById("end_date").value);

        dateEnd5.setAttribute("value",calEnd5.getDate().getDateString());
        dateEnd6.setAttribute("value",calEnd6.getDate().getDateString());

    }




    function showCalEnd5() {
        if (calEnd5.isHidden())
            calEnd5.show();
        else
            calEnd5.hide();
        
    }

    function showCalEnd6() {
        if (calEnd6.isHidden())
            calEnd6.show();
        else
            calEnd6.hide();
    }

    /////////////////////////////////////////////
</script>


<script type="text/javascript">
    function checkValidateVacationDayes() {
        if ($('#type_vacation').val() != ' ' && $('#employee_name').val()) {
            var actualDayes = parseFloat($('#employee_name option:selected').attr('allDayes')) - parseFloat($('#employee_name option:selected').attr('vdayes'));

            var casulaDayes = parseFloat($('#employee_name option:selected').attr('casual_vacation')) - parseFloat($('#employee_name option:selected').attr('casual'));

            
            if ($('#type_vacation').val() != 0) {
                $('#allDayes').val(actualDayes);
            }
            else {
                $('#allDayes').val(casulaDayes);
                $('#max_days').val(casulaDayes);
                $('#min_days').val(1);
            }
        }
        else {
            $('#allDayes').val('');
        }
    }

    function checkValidateMaxMin() {
        if (parseFloat($('#num_days').val()) <= parseFloat($('#max_days').val()) && parseFloat($('#num_days').val()) >= parseFloat($('#min_days').val())) {
            return true;
        }
        else {
            alert('المدة المحددة لا يجب أن تخطت أقصى عدد من الأيام أو أقل عدد مسموح بها');
            return false;
        }
    }
</script>

<script type="text/javascript">
   function setFuleTime() {
   document.getElementById('employee_name').value=<?=$emp_id_fk?>;
   get_emp_data(document.getElementById('employee_name').value);
   $('#mob').val($('#employee_name option:selected').attr('data-mobile'));
  }

  <?php if (isset($item) && $item != null) { ?>
    setTimeout(setFuleTime, 50);
<?php } ?>
</script>