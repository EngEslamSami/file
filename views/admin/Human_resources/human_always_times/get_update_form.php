<?php
if(!empty($result)){ ?>

    <div class="col-md-12">

        <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green  half">الدوام </label>
            <select id="" name="always_id_fk"   disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                <option value="">إختر</option>
                <?php if(!empty($settings)){  foreach ($settings as $record){
                    $select='';
                    if( $record->id == $result[0]->always_id_fk){
                        $select='selected';
                    } ?>
                    <option value="<?php echo $record->id?>" <?php  echo $select;?> ><?php echo $record->name?></option>
                <?php } } ?>
            </select>
        </div>

    </div>
    <div class="col-md-12" id="">
        <br>
        <?php
        $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
        $days_ar =array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
         for ($a=0;$a<sizeof($days_ar);$a++){   $myday =$days_en[$a];?>
            <input type="checkbox" class="day" name="<?php echo $days_en[$a];?>" id="<?php echo $days_en[$a];?>"
                   <?php if( $result[0]->$myday ==1){ echo 'checked'; } ?>
                   value="<?=$days_en[$a]?>" style="margin-right: 20px">
            <label for=""><?php echo $days_ar[$a];?></label>
        <?php    }  ?>

            <table class="table table-striped table-bordered">
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
                </tr>
                </thead>

                <tbody>
                <?php  $x=1;for ($a=0;$a<1;$a++){     ?>

                    <tr>
                        <td><?php echo $a+1;?></td>
                        <td><input type="time" name="period_from[]" id="period_from<?php echo $x;?>" value="<?php echo $result[$a]->period_from;?>"></td>
                        <td><input type="time" name="period_to[]" id="period_to<?php echo $x;?>" value="<?php echo $result[$a]->period_to;?>"></td>
                        <td><input type="time" name="attend_from[]" id="attend_from<?php echo $x;?>" value="<?php echo $result[$a]->attend_from;?>"></td>
                        <td><input type="time" name="attend_to[]" id="attend_to<?php echo $x;?>" value="<?php echo $result[$a]->attend_to;?>"></td>
                        <td><input type="time" name="leave_from[]" id="leave_from<?php echo $x;?>" value="<?php echo $result[$a]->leave_from;?>"></td>
                        <td><input type="time" name="leave_to[]" id="leave_to<?php echo $x;?>" value="<?php echo $result[$a]->leave_to;?>"></td>
                        <td><input type="button"  id="button<?php echo $x;?>" name="add" value="تعديل" onclick="UpdateForm(<?php  echo$x;?>,<?php echo$result[$a]->id;?>)" class="btn btn-success"></td>
                        <input type="hidden" name="always_id_fk" class="always_id_fk" value="<?php echo $result[0]->always_id_fk;?>">
                        <input type="hidden" name="period_id_fk"  class="period_id_fk" value="<?php echo $result[0]->period_id_fk; ?>">
                    </tr>

                    <?php $x++; } ?>
                </tbody>

            </table>



    </div>




<?php   } ?>
<script>


    function UpdateForm(num,id) {

        var days=[];
        $(".day:checkbox:checked").each(function () {
            days.push($(this).val());
        })
        var always_id_fk =$('.always_id_fk').val();
        //var period_id_fk =$('.period_id_fk').val();
        var period_id_fk =1;
        var period_from =$('#period_from'+num).val();
        var period_to =$('#period_to'+num).val();
        var attend_from =$('#attend_from'+num).val();
        var attend_to =$('#attend_to'+num).val();
        var leave_from =$('#leave_from'+num).val();
        var leave_to =$('#leave_to'+num).val()

        if( id !='' && always_id_fk !='' && period_id_fk !='' &&  period_from !='' && period_to !=''
            && attend_from !='' && attend_to !='' && leave_from !='' && leave_to !='' && days !=''){

            var dataString = 'period_from=' +
                period_from +'&period_to=' + period_to +'&attend_from='  + attend_from + '&attend_to=' +
                attend_to +'&leave_from=' + leave_from +'&leave_to=' + leave_to +'&add=' + 'add' + '&days=' +
                days +'&always_id_fk=' + always_id_fk +'&period_id_fk=' +  period_id_fk +'&id=' + id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/update',
                data:dataString,
                cache:false,
                success: function(json_data){
                    alert('تمت التعديل بنجاح');
                    $(".day").prop("checked", false);
                   // document.getElementById("button" + id).setAttribute("disabled","disabled");
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
