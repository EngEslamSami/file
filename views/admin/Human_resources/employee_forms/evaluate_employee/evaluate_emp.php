<style type="text/css" xmlns="http://www.w3.org/1999/html">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {

        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
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

    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border{
        border:0 !important;
    }

    .gray_background{
        background-color: #eee;

    }
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    .under-line{
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3 ,
    .under-line .col-xs-4,
    .under-line .col-xs-6 ,
    .under-line .col-xs-8
    {
        border-left: 1px solid #abc572;
    }

</style>



<div class="col-sm-12 no-padding " >
    <div class="col-sm-12">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable col-xs-12 no-padding ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title   ?></h3>
            </div>
            <div class="col-xs-12 no-padding">

                    <?php
                    if(isset($evaluation) && !empty($evaluation) && $evaluation!=null){
                        echo form_open_multipart('human_resources/employee_forms/Evaluation_employee/updateEvaluation/'.$evaluation->id.'/'.$evaluation->emp_id_fk);
                    }
                    else{
                        echo form_open_multipart('human_resources/employee_forms/Evaluation_employee');
                    }
                    ?>
                <div class="col-xs-12  under-line bordered-bottom ">
<!--                    <input type="hidden" id="emp_id" name="" value="--><?php //if(!empty($evaluation->emp_id_fk)){ echo $evaluation->emp_id_fk; }else{ echo 0 ; }?><!-- ">-->
<!--                    <input type="hidden" id="administration" name="edara_id_fk" -->
<!--                           value="--><?php //if(!empty($emp_data->administration)){ echo $emp_data->administration; }else{ echo 0 ; }?><!--  ">-->
<!---->
<!--                    <input type="hidden" id="department" name="qsm_id_fk" -->
<!--                           value="--><?php //if(!empty($emp_data->department)){ echo $emp_data->department; }else{ echo 0 ; }?><!--  ">-->
<!---->
<!--                    <input type="hidden"  id="manger" name="direct_manager_id_fk" -->
<!--                           value="--><?php //if(!empty($emp_data->manger)){ echo $emp_data->manger; }else{ echo 0 ; }?><!--  ">-->
<!--                    <input type="hidden" id="job_title_id_fk" name="job_title_id_fk" value="--><?php //if(!empty($emp_data->manger)){ echo $emp_data->manger; }else{ echo 0 ; }?><!--  ">-->


                    <h6>&nbsp بيانات الموظف</h6>
                </div>
                <div class="col-xs-12 no-padding under-line ">

                    <div class="col-xs-4 form-group">
                        <h6>اسم الموظف</h6>



                        <select name="emp_id_fk"  id="employee_name"
                                data-validation="required" class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true" onchange="get_emp_data($(this).val());">
                            <option value="">إختر الموظف</option>
                            <?php
                            if(isset($all_emps)&&!empty($all_emps)) {
                                foreach($all_emps as $row){
                                    $select='';
                                    if(isset($evaluation->emp_id_fk) && !empty($evaluation->emp_id_fk)) {
                                        if ($evaluation->emp_id_fk == $row->id) {
                                            $select = 'selected';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $row->id;?>"  <?php echo $select;?> > <?php echo $row->emp_name;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>


                    <div class="col-xs-4 form-group">
                        <h6>المسمي الوظيفي</h6>



                        <select name="job_title_id_fk" disabled   id="degree_id3" class="form-control bottom-input" data-validation="required"  aria-required="true" >
                            <option value="">إختر</option>
                            <?php foreach($job_role as $one_job_role){
                                $select='';
                                if(isset($evaluation->employee->job_title_id_fk) ){
                                    if($evaluation->employee->job_title_id_fk == $one_job_role->defined_id){
                                        $select='selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $one_job_role->defined_id ;?>"<?php echo $select;?>><?php echo $one_job_role->defined_title ; ?></option>';
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-xs-4 form-group">
                        <h6>الاداره</h6>

                        <select name=""  disabled id="administration3"
                                class="form-control bottom-input"
                                onchange="return lood(this.value);"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if (!empty($admin)):
                                foreach ($admin as $record):
                                    $select='';
                                    if(isset($evaluation->employee->edara_id_fk)) {
                                        if (!empty($evaluation->employee->edara_id_fk == $record->id)) {
                                            $select = 'selected';
                                        }
                                    }
                                   ?>
                                    <option
                                        value="<? echo $record->id; ?>" <?php echo $select;?>><? echo $record->name; ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>

                    </div>
                </div>
                <div class="col-xs-12 no-padding under-line open_green">


                    <div class="col-xs-4 form-group">
                        <h6>القسم</h6>

                        <select name="" id="depart" disabled
                                class="form-control bottom-input"
                                onchange="return lood(this.value);">

                            <option value="">إختر</option>
                            <?php
                            if (!empty($departs)):
                                foreach ($departs as $record):
                                    $select='';
                                    if(isset($evaluation->employee->qsm_id_fk) ) {
                                        if (!empty($evaluation->employee->qsm_id_fk == $record->id)) {
                                            $select = 'selected';
                                        }
                                    }
                                    ?>
                                    <option
                                        value="<? echo $record->id; ?>" <?php echo $select;?>><? echo $record->name; ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>

                    </div>
                    <div class="col-xs-4">
                        <h6>تاريخ بدايه التعيين:<span class=""></span></h6>
                        <input type="date" readonly="readonly"  value="<?php if(isset($evaluation->employee->date_from) ) {echo $evaluation->employee->date_from;} ?>" data-validation="required" id="date_from" class="form-control">
                    </div>
                    <div class="col-xs-4">
                        <h6>تاريخ انتهاء فتره التجربه:<span class=""></span></h6>
                        <input type="date"  readonly="readonly" value="<?php if(isset($evaluation->employee->date_to) ) {echo $evaluation->employee->date_to;} ?>" data-validation="required" id="date_to" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 no-padding under-line ">
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="visible-md visible-lg">
                        <th>مسلسل</th>
                        <th>التقييم</th>
                        <th>عناصر التقييم </th>

                        <th>الدرجه القسوي</th>
                        <th>الدرجه المستحقه</th>
                    </tr>

                    </thead>
                    <tbody>

                    <?php
                    $x = 0;
                    $degree=0;
                    foreach($records as $record){$x++;

                        ?>


                        <tr>
                        <td rowspan="<?php echo sizeof($record->branch);?>"><?php echo $x;?></td>
                        <td rowspan="<?php echo sizeof($record->branch);?>"><?php echo$record->title;?> </td>
                        <?php  if(!empty($record->branch)){ foreach ($record->branch as $row){
                            $degree=$degree+$row->degree;
                            ?>
                            <td><?php echo $row->title; ?></td>
                            <input type="hidden" name="evaluate_id_fk[]" value="<?php echo $row->id;?>">
                            <td><input type="text" onkeypress="validate_number(event)" data-validation="required" name="max_degree[]" style="width: 20%;" id="degree<?php echo $row->id;?>" readonly value="<?php echo $row->degree; ?>"></td>
                            <td><input type="text" onkeypress="validate_number(event)" data-validation="required" class="degree2" name="emp_degree[]" style="width: 20%;" id="take_degree<?php echo $row->id;?>" onkeyup="get_degree(<?php echo $row->id;?>);"
                                       value="<?php if(isset($evaluation->details[$row->id]) ) { echo $evaluation->details[$row->id]->emp_degree; }else{ echo 0;} ?>" ></td>

                            </tr>
                        <?php }  } }?>
                       <tr>
                           <td>المجموع</td>
                           <td colspan="2"> </td>
                           <td><input type="text" onkeypress="validate_number(event)" width="10%" readonly value="<?php echo $degree;?>" id=""></td>
                           <td><input type="text" onkeypress="validate_number(event)" name="total_degree" width="10%"readonly
                                 value="<?php if(isset($evaluation->total_degree) ) {echo $evaluation->total_degree; }else{echo 0;} ?>" id="total"></td>
                       </tr>

                    </tbody>
                </table>




            </div>
            <div class="col-xs-12 no-padding under-line ">
                <?php
                $types=array(1=>"ممتاز",2=>"جيد جدا",3=>"جيد",4=>'مقبول',5=>'غير مرضي');
                ?>
                <table width="100%" class="table table-bordered">

                    <tr>
                        <?php
                        foreach ($types as $key=>$value)
                        {
                            $check = '';
                            if(isset($evaluation->taqdeer) && !empty($evaluation->taqdeer) ) {
                                if ($evaluation->taqdeer ==  $key){
                                    $check = 'checked';
                                }
                            }
                            ?>
                            <td> <input type="radio" <?=$check?> name="taqdeer" class="half" id="radio<?php echo $key;?>" value="<?php echo $key;?>"><?php echo $value;?>  </td>
                          <?php
                        }

?>


<!--                        <td><button class="btn-warning">جيد جدا</button></td>-->
<!--                        <td><button class="btn-warning">جيد</button></td>-->
<!--                        <td><button class="btn-warning">مقبول</button></td>-->
<!--                        <td><button class="btn-warning">غير مرضي</button></td>-->
                    </tr>
                    <tr>
                        <td>90 فأكثر</td>
                        <td>80:90</td>
                        <td>70:79</td>
                        <td>60:69</td>
                        <td>اقل من 60</td>
                    </tr>
                </table>
                </div>

            <div class="col-xs-12 no-padding under-line ">

                <div class="col-md-6 no-padding under-line ">
                    <div class="piece-box">
                        <table class="table table-bordered " id="table1">
                            <thead>
                            <tr class="closed_green">
                                <th colspan="3" >نقاط القوة  لدى المرشح</th>
                                <button class="btn btn-add" type="button" onclick="add_point(1)">اضافه نقطه قوه</button>

                            </tr>
                            <tr >
                                <th >م</th>
                                <th >نقاط القوة (الإيجابيات)</th>

                                <th>الإجراء</th>
                            </tr>
                            </thead>

                            <tbody id="positive">



                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-md-6 no-padding under-line ">
                    <div class="piece-box">
                        <table class="table table-bordered " id="table2">
                            <thead>
                            <tr class="closed_green">

                                <th colspan="3" >نقاط  الضعف لدى المرشح</th>
                                <button type="button" class="btn btn-add" onclick="add_point(2)">اضافه نقطه ضعف</button>

                            </tr>
                            <tr >
                                <th>م</th>
                                <th >نقاط  الضعف(السلبيات)</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="negative">


                            </tbody>

                        </table>


                    </div>
                </div>
            </div>

            <div class="col-xs-12 no-padding" style="    background-color: #cdddac;
    padding: 15px;">
                <h6>نتيجه التقييم</h6>
                <div class="col-xs-12">
                    <input type="radio"
                        <?php
                           if(isset($evaluation->result_tagraba) && !empty($evaluation->result_tagraba) ) {
                                if ($evaluation->result_tagraba ==  1){
                              echo  'checked';
                            }}
                         ?>
                           data-validation="required"  name="result_tagraba" value="1"> تثبيت الموظف
                    </div>
                <div class="col-xs-12">
                    <input type="radio"
                   <?php
                    if(isset($evaluation->result_tagraba) && !empty($evaluation->result_tagraba) ) {
                    if ($evaluation->result_tagraba ==  2){
                        echo  'checked';
                    }}
                    ?>
                           data-validation="required" name="result_tagraba" value="2"> ترقيه لوظيفه اعلي
                </div>
                <div class="col-xs-12">
                    <input type="radio"
                        <?php
                        if(isset($evaluation->result_tagraba) && !empty($evaluation->result_tagraba) ) {
                        if ($evaluation->result_tagraba ==  3){
                            echo  'checked';
                        }}
                        ?>
                           height="" data-validation="required" name="result_tagraba" value="3"> الاستغناء عن الموظف
                </div>

                </div>
            <div class="col-md-12 text-center" style="margin: 15px;">

                <input type="submit" name="add" value="حفظ"class="btn btn-add">
            </div>
            </form>

<?php if(isset($evaluations)&&!empty($evaluations)) {  ?>

            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th class="text-center">م</th>
                    <th class="text-center">رقم التقييم</th>
                    <th class="text-center">إسم الموظف</th>
                    <th class="text-center">الاجراءات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $a=1;

                if(isset($evaluations)&&!empty($evaluations)) {
                    foreach ($evaluations as $record) {
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><? echo $record->id; ?></td>
                            <td><? echo $record->employee->emp_name; ?></td>
                           <td>

                               <a href="<?php echo base_url(); ?>human_resources/employee_forms/Evaluation_employee/updateEvaluation/<?php echo $record->id.'/'.$record->emp_id_fk; ?>"><i
                                       class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                               <a  href="<?php echo base_url('human_resources/employee_forms/Evaluation_employee/deleteEvaluation/').$record->id.'/'.$record->emp_id_fk?>"
                                   onclick="return confirm('هل انت متأكد من عملية الرفض ؟');" class="btn btn- btn-xs   col-lg-5"><i class="fa fa-trash"></i> </a>

                           </td>
                        </tr>
                        <?php
                        $a++;
                    }
                } else {?>
                    <tr> <td colspan="6"><div style="color: red; font-size: large;">لم يتم اضافه تقييمات الي الان</div></td> </tr>
                <?php  }
                ?>
                </tbody>
            </table>
<?php  }
?>
            </div>
        </div>
    </div>
<script>

    get_emp_data(1);
<!--    --><?php //if(isset($evaluation->emp_id_fk) && !empty($evaluation->emp_id_fk)){ ?>
//    alert(<?//=$evaluation->emp_id_fk?>//);
//    <?php //}?>


    function get_emp_data(valu)
    {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Evaluation_employee/get_emp_data",
            data:{valu:valu},
            success:function(d) {



                var obj=JSON.parse(d);



                $('#degree_id3').val(obj.job_title_id_fk);

                $('#administration3').val(obj.edara_id_fk);
                $('#depart').val(obj.qsm_id_fk);
                $('#date_from').val(obj.date_from);
                $('#date_to').val(obj.date_to);

                $('#emp_id').val(obj.id);
                $('#administration').val(obj.edara_id_fk);
                $('#department').val(obj.qsm_id_fk);
                $('#manger').val(obj.direct_manager_id_fk);
                $('#job_title_id_fk').val(obj.job_title_id_fk);







            }






        });



    }


</script>
<script>


    function get_degree(valu)
    {
       var max=parseFloat($('#degree'+valu).val());
        var valu4=parseFloat($('#take_degree'+valu).val());
//        if(take_degree>degree)
//        {
//            alert(" انتبه !! .....الدرجه المستحقه اكبر من الدرجه القصوي");
//            $('#take_degree'+valu).val(0);
//            return;
//        }
        if (valu4 > max) {
            alert("لاتتعدي القيمه عن القيمه العليا");
            $('#take_degree'+valu).val(0);
            var count_value = 0;
            $(".degree2").each(function () {
                if ($(this).val() > 0) {
                    count_value = count_value + parseFloat($(this).val());
                }
                count_value = count_value + 0;

            })
            $('#total').val(count_value);
            var x=parseFloat(count_value);
            switch (true) {
                case (x < 60):
                    $('#radio1').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio5').prop('checked','true');
                    break;
                case (x == 60 ||x<=69):
                    $('#radio1').prop('checked',false);
                    $('#radio5').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio4').prop('checked','true');
                    break;
                case (x == 70 ||x<=79):
                    $('#radio1').prop('checked',false);
                    $('#radio5').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio3').prop('checked','true');
                    break;
                case (x == 80||x<=89):
                    $('#radio1').prop('checked',false);
                    $('#radio5').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio2').prop('checked','true');
                    break;
                case (x >=90):
                    $('#radio5').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio1').prop('checked','true');
                    break;
                default:
                    alert("none");
                    break;
            }

        } else {
            var count_value = 0;
            $(".degree2").each(function () {
                if ($(this).val() > 0) {
                    count_value = count_value + parseFloat($(this).val());
                }
                count_value = count_value + 0;

            })
            $('#total').val(count_value);
            var x=parseFloat(count_value);
            switch (true) {
                case (x < 60):
                    $('#radio1').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio5').prop('checked','true');
                    break;
                case (x == 60 ||x<=69):
                    $('#radio1').prop('checked',false);
                    $('#radio5').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio4').prop('checked','true');
                    break;
                case (x == 70 ||x<=79):
                    $('#radio1').prop('checked',false);
                    $('#radio5').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio3').prop('checked','true');
                break;
                case (x == 80||x<=89):
                    $('#radio1').prop('checked',false);
                    $('#radio5').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio2').prop('checked','true');
                    break;
                case (x >=90):
                    $('#radio5').prop('checked',false);
                    $('#radio2').prop('checked',false);
                    $('#radio3').prop('checked',false);
                    $('#radio4').prop('checked',false);
                    $('#radio1').prop('checked','true');
                    break;
                default:
                    alert("none");
                    break;
            }

        }
    }

</script>

<script>
    function add_point(parameter)
    {

        if(parameter==1)
        {
            var x = document.getElementById('table1');

            var len = x.rows.length;
            var len=len-1;
            $('#positive').append('<tr>' +
                '<td>'+len+'</td>' +
                '<td><input type="text" data-validation="required" class="form-control" name="positive[]"> </td>'+


                '</tr>');
        }else{
            var x = document.getElementById('table2');

            var len = x.rows.length;
            var len=len-1;
            $('#negative').append('<tr>' +
                '<td>'+len+'</td>' +
                '<td><input type="text" data-validation="required" class="form-control" name="negative[]"></td>'+


                '</tr>');
        }


    }


</script>


<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>





