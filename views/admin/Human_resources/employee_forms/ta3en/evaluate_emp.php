
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
         <!--   <h3 class="panel-title"><?php echo $title ?> </h3> -->
        </div>
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details"  data-toggle="tab"><i class="fa fa-list  fa-2x" style="display: block;text-align: center"></i> بيانات الموظف</a></li>
                <li><a href="#tab1" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i>   التقييم  </a></li>
                <li><a href="#tab2" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i> نقاط القوه والضعف  </a></li>
                <li><a href="#tab3" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i> نتيجه التقييم  </a></li>
                <li><a href="#tab4" data-toggle="tab"><i class="fa fa-list  fa-2x" style="display:block;text-align: center"></i>  نتائج التقيمات  </a></li>



            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="details">
               
                <div class="col-xs-12 no-padding  ">
                <?php
                    if(isset($evaluation) && !empty($evaluation) && $evaluation!=null){
                        $emp_name = $evaluation->emp_data->emp_name;
                        $edara_name = $evaluation->emp_data->edara_n;
                        $qsm_name = $evaluation->emp_data->qsm_n;
                        $job_title = $evaluation->emp_data->job_title_n;
                        $date_from_m= $evaluation->emp_data->date_from_m;
                        $date_to_m= $evaluation->emp_data->date_to_m;
                        $edara_id_fk = $evaluation->edara_id_fk;
                        $qsm_id_fk = $evaluation->qsm_id_fk;
                        $emp_id_fk = $evaluation->emp_id_fk;
                      //  $date_to_m = $evaluation->date_to_m;
                        echo form_open_multipart('human_resources/employee_forms/ta3en/Evaluation_employee/updateEvaluation/'.$evaluation->id.'/'.$evaluation->emp_id_fk);
                    }
                    else{
                        $emp_name = '';
                        $edara_name = '';
                        $qsm_name = '';
                        $job_title = '';
                        $date_from_m= '';
                        $date_to_m = '';
                        $edara_id_fk = '';
                        $qsm_id_fk = '';
                        $emp_id_fk = '';
                        echo form_open_multipart('human_resources/employee_forms/ta3en/Evaluation_employee');
                    }
                    ?>
<div class="col-xs-4 form-group">
    <label>اسم الموظف</label>
    <input data-validation="required" type="text" name="emp_name" id="emp_name" value="<?= $emp_name?>"
           class="form-control testButton inputclass"
           style="cursor:pointer; width:89%;float: right;" autocomplete="off"
           ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
           onblur="$(this).attr('readonly','readonly')"
           readonly>
    <input type="hidden" name="emp_id_fk" id="emp_id_fk" value="<?= $emp_id_fk?>">
    <span class="btn btn-success "  onclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="float: left;"><i class="fa fa-plus"></i></span>



</div>


<div class="col-xs-4 form-group">
    <label>المسمي الوظيفي</label>
    <input type="text" name="job_title_id_fk" value="<?=$job_title ?>" readonly id="job_title_id_fk" class="form-control " data-validation="required">


</div>
<div class="col-xs-4 form-group">
    <label>الاداره</label>
    <input type="text" name="edara_name" value="<?= $edara_name?>" readonly id="edara_id_fk" class="form-control " data-validation="required">
    <input type="hidden" name="edara_id_fk" id="edara_id" value="<?= $edara_id_fk?>">


</div>
</div>
<div class="col-xs-12 no-padding ">


<div class="col-xs-4 form-group">
    <label>القسم</label>

    <input type="text" name="qsm_name"  value="<?= $qsm_name?>" readonly id="qsm_id_fk" class="form-control " >
    <input type="hidden" name="qsm_id_fk" id="qsm_id" value="<?= $qsm_id_fk?>">
</div>
<div class="col-xs-4">
    <label>تاريخ بدايه التعيين:<span class=""></span></label>
    <input type="text" readonly="readonly"  value="<?= $date_from_m?>" id="date_from" class="form-control">
</div>
<div class="col-xs-4">
    <label>تاريخ انتهاء فتره التجربه:<span class=""></span></label>
    <input type="text"  readonly="readonly" value="<?= $date_to_m?>"  id="date_to" class="form-control">
</div>
</div>
</div>
<div class="tab-pane fade " id="tab1">
<div class="col-xs-12 no-padding  ">
<table  class="table-bordered table table-responsive " cellspacing="0" width="100%">
<thead>
<tr class="info">
    <th>م</th>
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
        <td> <input data-validation="required" type="radio" <?=$check?> name="taqdeer" class="half" id="radio<?php echo $key;?>" value="<?php echo $key;?>"><?php echo $value;?>  </td>
      <?php
    }

?>


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

 </div>                


                
                <div class="tab-pane fade " id="tab2">
                <div class="col-xs-12 no-padding under-line ">

<div class="col-md-6 no-padding under-line ">
    <div class="piece-box">
        <table class="table table-bordered " id="table1">
            <thead>

            <tr class="info" >
                <th >م</th>
                <th >نقاط القوة (الإيجابيات)</th>

                <th>الإجراء</th>
            </tr>
            </thead>

            <tbody id="positive">
            <?php
            if (isset($evaluation->positives) && !empty($evaluation->positives)){
                $x = 1;
                foreach ($evaluation->positives as $positive){
                //    if ($point->type==1){

                    ?>
                    <tr>
                        <td><?= $x++?></td>
                        <td><input type="text" data-validation="required" class="form-control" name="positive[]"  value="<?= $positive->title?>"></td>
                        <td><a id="<?= $x?>" onclick=" $(this).closest('tr').remove();"><i
                                        class="fa fa-trash"></i></a></td>
                    </tr>

                    <?php

              //  }
            }
                ?>
            <?php
            } else{
                ?>
                <tr id="row_1">
                    <td>1</td>
                    <td><input type="text" data-validation="required" class="form-control" name="positive[]"  value=""></td>
                    <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                                    class="fa fa-trash"></i></a></td>
                </tr>
            <?php
            }
            ?>


            </tbody>
            <tfoot>
            <tr>
                <th colspan="2"></th>
                <th colspan="1">
                    <button type="button" onclick="add_point(1)" class="btn-success btn" style="font-size: 16px;">

                        <i class="fa fa-plus" ></i> </button></th>
            </tr>
            </tfoot>
        </table>

    </div>
</div>
<div class="col-md-6 no-padding under-line ">
    <div class="piece-box">
        <table class="table table-bordered " id="table2">
            <thead>

            <tr class="info" >
                <th>م</th>
                <th >نقاط  الضعف(السلبيات)</th>
                <th>الإجراء</th>
            </tr>
            </thead>
            <tbody id="negative">


            <?php
            if (isset($evaluation->negatives) && !empty($evaluation->negatives)){
                $x = 1;
                foreach ($evaluation->negatives as $negative){
                   // if ($point->type==2){

                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><input type="text" data-validation="required" value="<?= $negative->title?>" class="form-control" name="negative[]"></td>
                            <td><a id="<?= $x?>" onclick=" $(this).closest('tr').remove();"><i
                                            class="fa fa-trash"></i></a></td>
                        </tr>

                        <?php
                 //   }
            }
                ?>
                <?php
            } else{
                ?>
                <tr>
                    <td>1</td>
                    <td><input type="text" data-validation="required" class="form-control" name="negative[]"></td>
                    <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                                    class="fa fa-trash"></i></a></td>
                </tr>
                <?php
            }
            ?>



            </tbody>
            <tfoot>
            <tr>
                <th colspan="2"></th>
                <th colspan="1">
                    <button type="button" onclick="add_point(2)" class="btn-success btn" style="font-size: 16px;">

                        <i class="fa fa-plus" ></i> </button></th>
            </tr>
            </tfoot>

        </table>


    </div>
</div>
</div>



                </div>


                <div class="tab-pane fade " id="tab3">
                    
                <div class="col-xs-12 no-padding">
                <label>نتيجه التقييم</label>
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

            <div class="clearfix"></div><br>
            <div class="col-md-12 text-center">

                <button type="submit" id="buttons"  value="حفظ" class="btn btn-success btn-labeled"  name="add"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>

            </div>

            <div class="clearfix"></div><br>


                </div>

                <div class="tab-pane fade " id="tab4">
                <?php if(isset($evaluations)&&!empty($evaluations)) {  ?>

<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="info">
        <th class="text-center">م</th>
        <th class="text-center">رقم التقييم</th>
        <th class="text-center">إسم الموظف</th>
        <th class="text-center">المسمي الوظيفي </th>
        <th class="text-center">الإدارة</th>
        <th class="text-center">القسم </th>
        <th class="text-center">التقييم </th>
        <th class="text-center">  نتيجة التقييم </th>
        <th class="text-center">الاجراء</th>
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
                <td><?php echo $record->id; ?></td>
                <td><?php echo $record->emp_data->emp_name; ?></td>
                <td><?php echo $record->emp_data->job_title_n; ?></td>
                <td><?php echo $record->emp_data->edara_n; ?></td>
                <td><?php echo $record->emp_data->qsm_n; ?></td>
                <td><?php
                    $types=array(1=>"ممتاز",2=>"جيد جدا",3=>"جيد",4=>'مقبول',5=>'غير مرضي');
                    foreach ($types as $key=>$value){
                        if ($key == $record->taqdeer){
                            echo $value;
                        }

                    }
                    ?></td>
                <td>
                    <?php
                    if ($record->result_tagraba==1){
                        echo " تثبيت الموظف";
                    } elseif ($record->result_tagraba==2){
                        echo "  ترقيه لوظيفه اعلي";
                    }elseif ($record->result_tagraba==3){
                        echo "    الاستغناء عن الموظف";
                    }
                    ?>
                </td>
               <td>
                   <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;"
                      onclick="load_page(<?= $record->id?>,<?= $record->emp_id_fk ?>);">
                       <i class="fa fa-list "></i> </a>
                   <a href="#" onclick='swal({
                           title: "هل انت متأكد من التعديل ؟",
                           text: "",
                           type: "warning",
                           showCancelButton: true,
                           confirmButtonClass: "btn-warning",
                           confirmButtonText: "تعديل",
                           cancelButtonText: "إلغاء",
                           closeOnConfirm: false
                           },
                           function(){

                           window.location="<?php echo base_url(); ?>human_resources/employee_forms/ta3en/Evaluation_employee/updateEvaluation/<?php echo $record->id.'/'.$record->emp_id_fk; ?>";
                           });'>
                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                   <a href="#" onclick='swal({
                           title: "هل انت متأكد من الحذف ؟",
                           text: "",
                           type: "warning",
                           showCancelButton: true,
                           confirmButtonClass: "btn-danger",
                           confirmButtonText: "حذف",
                           cancelButtonText: "إلغاء",
                           closeOnConfirm: false
                           },
                           function(){
                           swal("تم الحذف!", "", "success");
                           window.location="<?php echo base_url('human_resources/employee_forms/ta3en/Evaluation_employee/deleteEvaluation/').$record->id.'/'.$record->emp_id_fk?>";
                           });'>
                       <i class="fa fa-trash"> </i></a>

                       <!-- <button type="button" class="btn btn-warning" aria-hidden="true"  onclick="trans_emp(<?= $record->id?>)" >تحويل الي الموظفين </button> -->
                       <a   href="<?php echo base_url(); ?>human_resources/employee_forms/ta3en/Evaluation_employee/add_emp_from_t3een/<?= $record->id?>" target="_blank"><button class="btn btn-add"> تحويل الي الموظفين  </button></a>


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
    </div>
</div>



</div>
</div>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 70%">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">  الموظفين </h4>
</div>
<div class="modal-body">

    <table id="" class="table table-bordered example" role="table">
        <thead>
        <tr class="info">
            <th style="font-size: 15px; width:88px !important; ">#</th>
            <th style="font-size: 15px;" class="text-left">   الاسم</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($all_emps) && !empty($all_emps)) {
            $x = 1;
            foreach ($all_emps as $emp) {


                ?>
                <tr ondblclick="get_emp('<?= $emp->id?>','<?= $emp->emp_name?>','<?= $emp->job_title_n?>','<?= $emp->edara_id_fk?>','<?= $emp->qsm_id_fk?>','<?= $emp->edara_n?>','<?= $emp->qsm_n?>','<?= $emp->date_from_m?>','<?= $emp->date_to_m?>');">
                    <td ondblclick="get_emp('<?= $emp->id?>','<?= $emp->emp_name?>','<?= $emp->job_title_n?>','<?= $emp->edara_id_fk?>','<?= $emp->qsm_id_fk?>','<?= $emp->edara_n?>','<?= $emp->qsm_n?>','<?= $emp->date_from_m?>','<?= $emp->date_to_m?>');">
                        <input type="radio" name="dept">
                    </td>

                    <td><?= $emp->emp_name ?></td>


                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
</div>
</div>
</div>
</div>

<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 85%;">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" style="text-align: center;" >التفاصيل </h4>
</div>
<div  class="modal-body" style="padding: 10px " id="result">

</div>
<div class="modal-footer" style="display: inline-block;width: 100%;">

    <button
            type="button" onclick="print_details(document.getElementById('row_id').value,document.getElementById('emp_id').value)"
            class="btn btn-labeled btn-purple ">
        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
    </button>

    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
    </button>

</div>

</div>
</div>
</div>
<?php
echo form_close();
?>


<!-- detailsModal -->
<script>


function get_degree(valu)
{
var max=parseFloat($('#degree'+valu).val());
var valu4=parseFloat($('#take_degree'+valu).val());
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
var x = document.getElementById('positive');

var len = x.rows.length;

$('#positive').append('<tr id="row_'+(len+1)+'">' +
    '<td>'+(len+1)+'</td>' +
    '<td><input type="text" data-validation="required" class="form-control" name="positive[]" value="" id="positive'+(len)+'"> </td>'+
    '<td><a id="1" onclick=" $(this).closest(\'tr\').remove();"><i\n' +
    '                class="fa fa-trash"></i></a> </td>'+


    '</tr>');
}else{
var y = document.getElementById('negative');

var len2 = y.rows.length;
$('#negative').append('<tr>' +
    '<td>'+(len2+1)+'</td>' +
    '<td><input type="text" data-validation="required" class="form-control" name="negative[]"></td>'+
    '<td><a id="1" onclick=" $(this).closest(\'tr\').remove();"><i\n' +
    '                class="fa fa-trash"></i></a> </td>'+


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

<script>
function get_emp(id,name,job,edara_id,qsm_id,edara,qsm,date_from,date_to) {

$('#emp_id_fk').val(id);
$('#edara_id').val(edara_id);
$('#qsm_id').val(qsm_id);
$('#emp_name').val(name);
$('#job_title_id_fk').val(job);
$('#edara_id_fk').val(edara);
$('#qsm_id_fk').val(qsm);
$('#date_from').val(date_from);
$('#date_to').val(date_to);
$('#myModal').modal('hide');

}
</script>


<script>
function load_page(row_id,emp_id) {

$.ajax({
type: 'post',
url: "<?php echo base_url();?>human_resources/employee_forms/ta3en/Evaluation_employee/load_details",
data: {row_id:row_id,emp_id:emp_id},
success: function (d) {
    $('#result').html(d);

}

});

}
</script>


<script>
function print_details(row_id,emp_id) {
var request = $.ajax({
// print_resrv -- print_contract
url: "<?=base_url().'human_resources/employee_forms/ta3en/Evaluation_employee/print_details'?>",
type: "POST",
data: {row_id: row_id,emp_id:emp_id},
});
request.done(function (msg) {
var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(msg);
WinPrint.document.close();
WinPrint.focus();
/*  WinPrint.print();
  WinPrint.close();*/
});
request.fail(function (jqXHR, textStatus) {
console.log("Request failed: " + textStatus);
});
}
</script>







