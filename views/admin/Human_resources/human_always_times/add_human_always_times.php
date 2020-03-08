

<style type="text/css">
    .top-label {

        font-size: 13px;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;

    }
    .check_group input[type="checkbox"]{
        width: 24px;
        height: 24px;
    }
    
    
    .check_group label {
    
    position: relative;
    top: -7px;
}
</style>



<div class="col-sm-12 " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;  ?></h3>
        </div>
        <div class="panel-body">


            <div class="col-md-12">

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الدوام </label>
                    <select id="always_id_fk" name="always_id_fk" class=" no-padding form-control choose-date form-control half"   data-validation="required"  aria-required="true" onchange="CheckTimes(this.value)" >
                        <option value="">إختر</option>
                        <?php if(!empty($settings)){  foreach ($settings as $record){ ?>

                            <option value="<?php echo $record->id?>"><?php echo $record->name?></option>
                        <?php } } ?>
                    </select>
                </div>

               <!-- <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد الفترات </label>
                    <select id="period_id_fk" name="period_id_fk" class=" no-padding form-control choose-date form-control half"    data-validation="required"  aria-required="true"  onchange="getTimeNum(this.value)">
                        <option value="">إختر</option>
                        <?php
                        for ($a=1;$a<=4;$a++){

                            echo'<option value="'.$a.'">'.$a.'</option>';

                        }
                        ?>
                    </select>
                </div>-->
                <div class="form-group col-sm-4 col-xs-12">
                    <div class="form-group col-sm-4">
                        <input type="button" id="buttons"   onclick="add_row()" name="add" class="btn btn-success btn-next"  value="إضافة " />
                    </div>
                </div>





            </div>
            <div class="col-md-12 text-center check_group" >
                <?php $arr_time =array(1=>'الفترة الأولي',2=>'الفترة الثانية',3=>'الفترة الثالثة',4=>'الفترة الرابعة',5=>'الفترة الخامسة')?>
                <?php
                $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
                $days_ar =array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
                for ($a=0;$a<sizeof($days_ar);$a++){ ?>
               
                   <input type="checkbox" class="day" name="<?php echo $days_en[$a];?>" id="<?php echo $days_en[$a];?>" value="<?=$days_en[$a]?>" style="margin-right: 20px">
                   <label for="">  <?php echo $days_ar[$a];?></label>
                   
                <?php }  ?>

                

            </div>
            <div class="col-md-12" >
            
            <table class="table table-striped table-bordered" id="">
                    <thead>
                    <tr class="info">
                        <th>الفترة</th>
                        <th>من</th>
                        <th>إلي</th>
                        <th> الحضور من</th>
                        <th>الحضور إلي</th>
                        <th> الإنصراف من</th>
                        <th>الإنصراف إلي</th>
                        <th>الإجراء</th>
                    </thead>
                    <tbody id="resultTable" >
                    <tr>
                        <td colspan="8" style="text-align: center;color: red"> لاتوجد بيانات</td>
                    </tr>
                    </tbody>
                </table>
                </div>

            <div class="col-md-12" >
                   <?php if(!empty($records)){ ?>
                <table   class="table table-striped table-bordered "   >
                        <thead>
                               <tr class="info">
                                 <th class="text-center" > إسم الدوام</th>
                                 <th class="text-center" > عدد الفترات</th>
                                 <th class="text-center" > الإجراء</th>
                                </tr>
                             </thead>
                            <tbody>
                            <?php foreach($records as $record){ ?>
                            <tr>
                                <td style="text-align: center" rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo$record->name; ?></td>
                                <?php if(!empty($record->period_num)){ $a=1; foreach ($record->period_num as $row){ ?>
                                <td style="text-align: center" ><?php echo$arr_time[$a]; ?></td>
                                <td style="text-align: center">
                                    <a href="#"  data-toggle="modal" data-target="#modal-update<?php echo $row->id;?>" onclick="getUpdateForm(<?php echo $row->id;?>)">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/human_resources/DeleteTimes/" . $row->id ?>');"
                                       data-toggle="modal" data-target="#modal-delete"
                                       title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
                                </td>
                                    </tr>
                                <?php  $a++;} } ?>


                                <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p id="text">هل أنت متأكد من الحذف؟</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                                <a  id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                  </table>



                       <!------------------------------------------------------------------------------------->

                <?php foreach($records as $record){ ?>

                <?php if(!empty($record->period_num)){ $a=1; foreach ($record->period_num as $row){ ?>
                       <div class="modal" id="modal-update<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                           <div class="modal-dialog" role="document" style="width: 100%">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                   </div>
                                   <div class="modal-body" id="myUpdateForm<?php echo $row->id;?>"></div>
                                   <div class="modal-footer" style="display: inline-block;width: 100%">
                                       <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق الشاشة</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                               <?php  $a++;} } ?>
                       <?php } ?>
                       <!------------------------------------------------------------------------------------->

              <?php } ?>
            </div>




        </div>
    </div>
</div>



<script>


    function CheckTimes(valu) {
        if (valu !=0 &&  valu >0 ) {
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/check_times',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                   // console.log(JSONObject);
                    if(JSONObject >6){
                        $("#buttons").attr('disabled',true);
                        alert('أقصي عدد 6 فترات !!');
                   }
                }
            });
        }
    }

</script>

<script>
function add_row()
{
var x = document.getElementById('resultTable');
var len = x.rows.length;
$('#disp').hide();
$('#resultTable').
html('<tr class="child"><td>#</td><td><input type="time" name="period_from[]" id="period_from'+len+'">' +
        '</td> <td><input type="time" name="period_to[]" id="period_to'+len+'"></td>  <td><input type="time" name="attend_from[]" id="attend_from'+len+'"></td> ' +
    '<td><input type="time" name="attend_to[]" id="attend_to'+len+'"></td> <td><input type="time" name="leave_from[]" id="leave_from'+len+'"></td>' +
    '<td><input type="time" name="leave_to[]" id="leave_to'+len+'"></td>' +
    '<td><input type="button"  id="button'+len+'" name="add" value="إضافة" onclick="SendForm('+len+')" class="btn btn-success"></td></tr> ');
}




</script>



<script>


    function SendForm(id) {

        var days=[];
        $(".day:checkbox:checked").each(function () {
            days.push($(this).val());
        })
        var always_id_fk =$('#always_id_fk').val();
        //var period_id_fk =$('#period_id_fk').val();
        var period_id_fk =1;
        var period_from =$('#period_from'+id).val();
        var period_to =$('#period_to'+id).val();
        var attend_from =$('#attend_from'+id).val();
        var attend_to =$('#attend_to'+id).val();
        var leave_from =$('#leave_from'+id).val();
        var leave_to =$('#leave_to'+id).val()
        if( id !='' && always_id_fk !='' && period_id_fk !='' &&  period_from !='' && period_to !=''
            && attend_from !='' && attend_to !='' && leave_from !='' && leave_to !='' && days !=''){

            var dataString = 'period_from=' +
                period_from +'&period_to=' + period_to +'&attend_from='  + attend_from + '&attend_to=' +
                attend_to +'&leave_from=' + leave_from +'&leave_to=' + leave_to +'&add=' + 'add' + '&days=' +
                days +'&always_id_fk=' + always_id_fk +'&period_id_fk=' +  period_id_fk;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/add',
                data:dataString,
                cache:false,
                success: function(json_data){
                   // alert(json_data);
                    alert('تمت الإضافة بنجاح');
                    $(".day").prop("checked", false);
                   document.getElementById("button" + id).setAttribute("disabled","disabled");
                    $("#always_id_fk").val("");
                    $("#period_id_fk").val("");
                    location.reload();

      

                }
            });




        }else {
            alert('تأكد من إدخال البيانات !!');
        }
    }


</script>




<script>

    function getUpdateForm(update_id) {
        if( update_id !='' ){
            var dataString = 'update_id=' + update_id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/add_human_always_times',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#myUpdateForm" + update_id).html(html);
                }
            });

        }

    }

</script>




