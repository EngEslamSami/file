<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?></h3>
        </div>
        <div class="panel-body">




                <style type="text/css">
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
                        border-bottom: 4px solid #9bbb59 !important;
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
                </style>





















            </form>


            <?php
            if(isset($items)&&!empty($items)){
                ?>
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
                        <th>اشعار مباشره عمل </th>



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
                                <td><?php echo $row->vacation_name ;?></td>
                                <td><?php echo $row->vacation_from_date ;?></td>
                                <td><?php echo $row->vacation_to_date ;?></td>
                                <td><?php echo $row->num_days ;?></td>
                                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>">التفاصيل</button></td>

                                <td>


                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Vacation/edit_vacation/<?php echo $row->id;?>"><i
                                            </a>

                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Vacation/delete_vacation/<?php echo $row->id;?>"
                                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                                     aria-hidden="true"></i> </a>
                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Vacation/print_vacation/<?php echo $row->id;?>"
                                    ><!--<i class="fa fa-print" aria-hidden="true"></i> --></a>


                                </td>
                                <td></td>

                                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalstartwork<?php echo$row->id; ?>">اشعار مباشره عمل </button></td>
                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?>

                    </tbody>
                </table>


            <?php } else{?>
                <div class="col-md-12 alert alert-danger">لاتوجد بيانات</div>

           <?php }?>
        </div>
        </div>
    </div>
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
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->vacation_name;?></h4>
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
                                <td width="15%"><?php echo $row->vacation_name;?></td>
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
                                <td><?php echo $row->badl_emp;?></td>

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

        <div class="modal fade" id="modalstartwork<?php echo$row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " style="width: 80%" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->emp;?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="print_forma  col-xs-12 no-padding">

                            <div class="piece-box">
                                <table class="table table-bordered">

                                    <tbody>
                                    <tr class=" bordered-bottom">
                                        <th>اسم الموظف</th>
                                        <td><input type="text" name=""  value="<?php if(!empty($row->emp))echo $row->emp;?>" class="form-control"></td>
                                        <th>الرقم الوظيفي</th>
                                        <td><input type="text"  value="<?php  if(!empty($row->emp_code)) echo $row->emp_code;?> "name="" class="form-control"></td>
                                    </tr>
                                    <tr class="open_green">
                                        <th>الإدارة/القسم</th>
                                        <td><input type="text"value="<?php if(!empty($row->management)) echo $row->management;?><?php if(!empty($row->department)) echo '/';?> <?php if(!empty($row->department)) echo $row->department;?>" name="" class="form-control"></td>
                                        <th>المسمى الوظيفي</th>
                                        <td><input type="text" value="<?php if(!empty($row->job_name))  echo $row->job_name;?>" name="" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>مدة الإجازة المتمتع بها          </th>
                                        <td> <input type="text" name="" value="<?php  if(!empty($row->num_days)) echo $row->num_days;?>"  class="form-control" style="width: 85%;float: right;"><span style="float: left;margin-top: 7px;"> أيام/يوماً</span></td>
                                        <th>توقيع الموظف</th>
                                        <td><input type="text" name="" class="form-control"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-xs-12">
                                    <h5>سعادة /مدير عام الجمعية  ................    حفظه الله</h5>
                                    <p class="text-center">السلام عليكم ورحمة الله وبركاته،</p>
                                    <p>أفيدكم أن الموظف المذكور أعلاه:</p><br>
                                </div>
                                <table class="table table-bordered">

                                    <tbody>
                                    <tr class="open_green">
                                        <td>-	كان انفكاكه من العمل ( نظرا لتمتعه بإجازة  </td>
                                        <td><input type="text" name="" value="<?php  if(!empty($row->vacation_name)) echo $row->vacation_name;?>" class="form-control" > </td>
                                        <td> في يوم </td>
                                        <td> <input type="text" value="<?php if(!empty($row->vacation_from_date)) echo $row->vacation_from_date;?>" name="" class="form-control" > </td>
                                    </tr>
                                    <tr class="open_green">
                                        <td colspan="3">-	قد باشر العمل بعد العودة من إجازته في يوم  </td>
                                        <td><input type="date" id="back_date<?php echo $row->id;?>" onchange="get_num_day($(this).val(),<?php echo $row->id;?>,'<?php echo $row->vacation_to_date;?>');" value="" name="" class="form-control" > </td>
                                    </tr>
                                    <tr class="open_green">
                                        <td><label class="radio-inline">
                                                <input type="radio" checked="" name="inlineRadioOptions" <?php if($row->delay_num_days==0){echo 'checked';}?> id="inlineRadio<?php echo $row->id;?>" value="0"> لم يتأخر عن مباشرته للعمل .  </label>
                                        </td>
                                        <td><label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions"<?php if($row->delay_num_days>0){echo 'checked';}?> id="inlineRadio2<?php echo $row->id;?>" value="1"> تأخر عن مباشرته  للعمل لمدة  </label>
                                        </td>
                                        <td class="num_day<?php echo $row->id;?>"> <input type="text" id="num_day<?php echo $row->id;?>" value="<?php echo $row->delay_num_days;?>" name="" class="form-control" style="width: 80%;float: right;"><span style="float: left;margin-top: 7px;">يوماً</span></td>
                                    </tr>
                                    <tr class="open_green reason<?php echo $row->id;?>">
                                        <td colspan="4">
                                            للأسباب الأتية
                                            <textarea name="" id="reason<?php echo $row->id;?>" class="form-control" ></textarea>
                                        </td>

                                    </tr>


                                    </tbody>
                                </table>
                            </div>











                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button"  onclick="start_work(<?php echo $row->id;?>);" style="float: right;" class="btn btn-add"  style="float: left">حفظ</button>

                        <button type="button"  class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>


    <?php }
} ?>


<!--------------------------------------------------------------->
<script>
function get_num_day(valu,id,back_date)
{


    if(back_date>valu)
    {
        alert("عفوا:لابد من تاريخ العوده اكبر من تاريخ انتهاء الاجازه");
        return;
    }
  
     
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_num_days",
        data:{valu:valu,id:id},
        success:function(d) {
 
           if(d==0) {
               $('#inlineRadio'+id).prop('checked', true);
               $('#num_day'+id).val(0);
               $('.num_day'+id).hide();
               $('.reason'+id).hide();

           }else{
               $('#inlineRadio2'+id).prop('checked', true);
               $('#num_day'+id).val(d);
               $('.num_day'+id).show();
               $('.reason'+id).show();
           }


        }






    });
}


</script>
<script>
    function start_work(valu)
    {
        
        var id=valu;
        var num_day=$('#num_day'+id).val();
        var reason=$('#reason'+id).val();

        if($('#back_date'+id).val()=='')
        {
            alert("من فضلك ادخل تاريخ العوده العوده");
            return;
        }
        if($('#reason'+id).val()==''&&num_day>0)
        {
            alert("من فضلك اذكر الاسباب");
            return;

        }



        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/edit_start_work",
            data:{num_day:num_day,id:id,reason:reason},
            success:function(d) {
                

               alert("تم بنجاح...... مباشره العمل");
                location.reload();


            }






        });
    }


</script>