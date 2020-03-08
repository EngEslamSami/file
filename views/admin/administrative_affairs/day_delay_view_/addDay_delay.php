

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?></h3>
        </div>
        <div class="panel-body">
            <!--add-->

            <?php if(!empty($employees)):?>
                <h6 class="text-center inner-heading">  </h6>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">اختر الموظف</label>
                    <select name="emp_id"  id="emp_id" class="half selectpicker"  data-live-search="true" >
                        <option> - اختر - </option>
                        <?php foreach ($employees as $record):
                            $select ='';
                            if(isset($emp_data['id']) && $emp_data['id'] !=''){
                              if($emp_data['id'] ==$record->id){
                                  $select ='selected';
                              }
                            }
                            ?>
                            <option value="<? echo $record->id; ?>" <?php echo $select;?>><?php echo $record->employee;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-2 col-xs-12">
                    <button type="button" class="btn btn-warning  button" onclick="return sent($('#emp_id').val());"><i class="fa fa-search"></i>  </button>
                </div>

            <?php  endif;?>
            <div id="optionearea2">

                <?php if (isset($emp_data) && $emp_data != null && !empty($emp_data)) {?>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">إسم الموظف</label>
                                <input type="text" class="form-control half input-style" readonly  value="<?php if(isset($emp_data['employee'])) echo $emp_data['employee'];?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">الدور الوظيفي</label>
                                <input type="number"  class="form-control half input-style" readonly value="<?php if(isset($emp_data['department'])) echo $emp_data['department'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">رقم الهوية</label>
                                <input type="text" class=" some_class_2 form-control half input-style"  readonly value="<?php if(isset($emp_data['id_num'])) echo $emp_data['id_num'];?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half"> رقم الجوال </label>
                                <input type="number" class=" some_class form-control half input-style" readonly   value="<?php if(isset($emp_data['phone_num'])) echo $emp_data['phone_num'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">عدد أيام التأخير</label>
                                <input type="number" class="form-control half input-style"  name="day_delay" id="day_delay" value="<?php echo sizeof($result);?>"   >
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <h6 class="text-center inner-heading"> أيام التأخير </h6>
                    </div>




                    <input type="hidden" name="max" id="max">
                    <input type="hidden" name="emp_id" value="<?php echo  $emp_data['id']?>">
                    <button type="button" id="add_row_delay" onclick="check();"  class="add btn btn-purple  w-md m-b-5"><i class="fa fa-plus"></i> إضافة تأخير  </button>
                    <button type="button" name="add" value="add"  id="button"   class="save btn btn-purple w-md m-b-5 " ><i class="fa fa-floppy-o "></i> حفظ  </button>
                    <?php  echo form_close()?>

                <?php } ?>
            </div>
            <?php if(isset($records)&&!empty($records)) {
            foreach ($records as $row) {?>

            <?php } } ?>

            <?php if(isset($records)&&!empty($records)) {
            foreach ($records as $row) {?>
            <div class="modal fade" id="myModal<?php echo $row->emp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                        </div>
                        <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group col-sm-6">
                                        <label class="label label-green  half">إسم الموظف</label>
                                        <input type="text" class="form-control half input-style" readonly  value="<?php if(isset($row->name['employee'])) echo $row->name['employee'];?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="label label-green  half">الدور الوظيفي</label>
                                        <input type="number"  class="form-control half input-style" readonly value="<?php if(isset($row->name['department'])) echo $row->name['department'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-sm-6">
                                        <label class="label label-green  half">رقم الهوية</label>
                                        <input type="text" class=" some_class_2 form-control half input-style"  readonly value="<?php if(isset($row->name['id_num'])) echo $row->name['id_num'];?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="label label-green  half"> رقم الجوال </label>
                                        <input type="number" class=" some_class form-control half input-style" readonly   value="<?php if(isset($row->name['phone_num'])) echo $row->name['phone_num'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-sm-6">
                                        <label class="label label-green  half">عدد أيام التأخير</label>
                                        <input type="number" class="form-control half input-style"   readonly value="<?php echo $row->days; ?>"   >
                                    </div>
                                </div>

                            <table class="table table-bordered" id="" >
                                <thead>
                                <th>م</th>
                                <th>التاريخ</th>
                                <th>وقت الحضور</th>
                                </thead>
                                <tbody>
                                <?php if(!empty($row->all_days)){
                                    $r=0;
                                    foreach($row->all_days as $record): ?>
                                        <tr class="">
                                            <td><?php echo ++$r; ?></td>
                                            <td> <?php echo $record->day ?></td>
                                            <td> <?php echo $record->time?></td>
                                        </tr>
                                    <?php endforeach; } ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button"  style="float: " class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>



<!--end_panel-->
    </div>
</div>

<script>
    function sent(valu)
    {
        if(valu !='' && valu !=0)
        {
            var dataString = 'employee_id=' + valu;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/addDay_delay',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea2').html('');
            return false;
        }

    }
</script>