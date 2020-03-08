

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
                    <select id="always_id_fk" name="always_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                        <option value="">إختر</option>
                        <?php if(!empty($settings)){  foreach ($settings as $record){ ?>

                            <option value="<?php echo $record->id?>"><?php echo $record->name?></option>
                        <?php } } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد الفترات </label>
                    <select id="period_id_fk" name="period_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"  onchange="getTimeNum(this.value)">
                        <option value="">إختر</option>
                        <?php
                        for ($a=1;$a<=4;$a++){

                            echo'<option value="'.$a.'">'.$a.'</option>';

                        }
                        ?>
                    </select>
                </div>





            </div>
            <div class="col-md-12" id="my_div"></div>

            <div class="col-md-12">
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
                                <td style="text-align: center"><?php echo$record->name; ?></td>
                                <td style="text-align: center"><?php echo$record->period_num; ?></td>
                                <td style="text-align: center">
                                    <a href="#"  data-toggle="modal" data-target="#modal-update<?php echo $record->id;?>" onclick="getUpdateForm(<?php echo $record->always_id_fk;?>)">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/human_resources/DeleteTimes/" . $record->always_id_fk ?>');"
                                       data-toggle="modal" data-target="#modal-delete"
                                       title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
                                </td>


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

                           </tr>
                            <?php } ?>
                        </tbody>
                  </table>



                       <!------------------------------------------------------------------------------------->

                <?php foreach($records as $record){ ?>
                       <div class="modal" id="modal-update<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                           <div class="modal-dialog" role="document" style="width: 100%">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                   </div>
                                   <div class="modal-body" id="myUpdateForm"></div>
                                   <div class="modal-footer" style="display: inline-block;width: 100%">
                                       <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق الشاشة</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <?php } ?>
                       <!------------------------------------------------------------------------------------->

              <?php } ?>
            </div>




        </div>
    </div>
</div>


<script>
    
    function getTimeNum(num) {

         var always_id_fk =$('#always_id_fk').val();
        if( num !=''  &&  always_id_fk !='' ){
            var dataString = 'num=' + num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/add_human_always_times',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#my_div").html(html);
                }
            });

        }

    }
    
</script>


<script>


    function SendForm(id) {

        var days=[];
        $(".day:checkbox:checked").each(function () {
            days.push($(this).val());
        })
        var always_id_fk =$('#always_id_fk').val();
        var period_id_fk =$('#period_id_fk').val();
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
                    $("#myUpdateForm").html(html);
                }
            });

        }

    }

</script>




