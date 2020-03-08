



<?php if ($records != '' && $records != null && !empty($records)) {?>
<div class="col-sm-12  wow" >
    <?php echo form_open("Administrative_affairs/addDay_delay")?>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">إسم الموظف</label>
                    <input type="text" class="form-control half input-style" readonly  value="<?php if(isset($records['employee'])) echo $records['employee'];?>">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">الدور الوظيفي</label>
                    <input type="number"  class="form-control half input-style" readonly value="<?php if(isset($records['department'])) echo $records['department'];?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">رقم الهوية</label>
                    <input type="text" class=" some_class_2 form-control half input-style"  readonly value="<?php if(isset($records['id_num'])) echo $records['id_num'];?>">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half"> رقم الجوال </label>
                    <input type="number" class=" some_class form-control half input-style" readonly   value="<?php if(isset($records['phone_num'])) echo $records['phone_num'];?>">
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">عدد أيام التأخير</label>
                    <input type="number" class="form-control half input-style"  name="day_delay" id="day_delay" value="0"   >
                </div>
            </div>-->
        </div>



        <table class="table table-bordered" id="tab_logic" <?php if(empty($table)){?>style="display: none" <?php } ?>>
            <thead>
            <th>م</th>
            <th>التاريخ</th>
            <th>وقت الحضور</th>
            </thead>
            <tbody>
            <?php if(!empty($table)){
                $r=0;
                foreach($table as $record): ?>
                    <tr class="">
                        <td><?php echo ++$r; ?></td>
                        <td> <?php echo $record->day ?></td>
                        <td> <?php echo $record->time?></td>
                    </tr>
                <?php endforeach; } ?>
            </tbody>
        </table>
        <input type="hidden" name="max" id="max">
        <input type="hidden" name="emp_id" value="<?php echo $_POST['employee_id']?>">
        <button type="button" id="add_row_delay" onclick="rows_get();"  class="add btn btn-info"><i class="fa fa-plus"></i> إضافة تأخير  </button>
        <button type="button" name="add" value="update"  onclick="checkAll();" id="button"  disabled=""  class="save btn btn-success" ><i class="fa fa-floppy-o "></i> حفظ  </button>
    <?php  echo form_close()?>

</div>
<?php } ?>


<?php if(isset($delayies)&&!empty($delayies)) {
    foreach ($delayies as $row) {

        ?>


        <table id="data<?php echo $row->num;?>" class="table table-bordered" cellspacing="0">

            <thead>
            <tr>

                <th class="text-center">اسم الموظف</th>
                <th class="text-center"> رقم المسائله</th>
                <th class="text-center"> عدد ايام الغياب</th>
                <th class="text-center">الاجراء</th>

            </tr>
            </thead>
            <tbody class="text-center">



            <tr>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->num; ?></td>
                <td><?php echo $row->day_delay; ?></td>
                <td >

                    <a class=" "  data-toggle="modal" data-target="#modal_<?php echo $row->num;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>


               <a href="<?php echo base_url('Administrative_affairs/printDay_delay').'/'.$row->emp_id .'/'.$row->num?>" target="_blank" > <i class="fa fa-print" aria-hidden="true"></i> </a>



                </td>
            </tr>

            </tbody>
        </table>
        </br></br>
        <div class="modal fade" id="modal_<?php echo $row->num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->name;?></h4>
                    </div>
                  <?php echo form_open("Administrative_affairs/update_delay/".$row->day_delay.'/'.$row->num.'/'.$row->emp_id)?>

                    <div class="modal-body">


                        <table id=""  class="table table-bordered" cellspacing="0">

                            <thead>
                            <tr>

                                <th class="text-center">#</th>

                                <th class="text-center">التاريخ</th>
                                <th class="text-center">وقت الحضور</th>


                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <input type="hidden" name="emp_id" value="<?php echo $row->emp_id;?>">
                            <input type="hidden" name="num" value="<?php echo $row->num;?> >
                                                       
                         
  <input type="hidden" name="day_nums" value="<?php echo $row->emp_id;?>">
                                <?php if(isset($row->days)&&!empty($row->days)) {
                                    $z=1;
                                    foreach ($row->days as $row2) {

                                        ?>


                                        <tr>
                                            <td><?php echo $z;?></td>

                                            <td><input type="date"  class="day<?php echo $row2->id;?>" value="<?php echo $row2->day;?>" name="date2[]"> </td>
                                            <td><input type="time"  class="time<?php echo $row2->id;?>" value="<?php echo $row2->time;?>" name="time2[]"></td>

                                        </tr>
                                        <?php
                                        $z++;
                                    }
                                }
                                ?>


                            </tbody>
                        </table>


                    </div>
                    <div class="modal-footer">
                        <input type="submit"  name="submit" class="btn btn-primary" value="حفظ التغيرات">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">اغلاق</button>
                    </div>
                    <?php  echo form_close()?>
                </div>
            </div>
        </div>



        <?php

    }
}
?>

<!--




-->
<script>
   function rows_get(){
      var day="day";
        var time="time";
        var i=1;
        var v=0;
            $("#main_tr").remove();
            $("#tab_logic").show();
            $('#tab_logic').append("<tr class='addr'><td>#</td><td> <input class='form-control chech_if '  id='day" + i + "' type='date'   name='day" + i + "'  placeholder='التاريخ' data-validation='required'></td> <td> <input type='time' id='time" + i + "' name='time" + i + "' placeholder='وقت الحضور'  class='form-control chech_if' data-validation='required' ></td></tr>");
            $('#day'+i).attr("day",day+i);
            $('#time'+i).attr("time",time+i);
            i++;
            v++;
            $('#max').val(v);
              document.getElementById("button").removeAttribute("disabled");
    
   }
   
       $('table').on('click','tr button.remove',function(e){
            check2();
            e.preventDefault();
            $(this).parents('tr').remove();
        });


/*
  $(document).ready(function() {
        var day="day";
        var time="time";
        var i=1;
        var v=0;
        $("#add_row_delay").click(function() {
            $("#main_tr").remove();
            $("#tab_logic").show();
            $('#tab_logic').append("<tr class='addr'><td>#</td><td> <input class='form-control '  id='day" + i + "' type='date'   name='day" + i + "'  placeholder='التاريخ' class='form-control' data-validation='required'></td> <td> <input type='time' id='time" + i + "' name='time" + i + "' placeholder='وقت الحضور'  class='form-control' data-validation='required' ></td></tr>");
            $('#day'+i).attr("day",day+i);
            $('#time'+i).attr("time",time+i);
            i++;
            v++;
            $('#max').val(v);
        });
        $('table').on('click','tr button.remove',function(e){
            check2();
            e.preventDefault();
            $(this).parents('tr').remove();
        });
    });*/

</script>

<script>

    function check() {
    $("#day_delay").attr('readonly',true);
    var rows = $('.addr').length;
    var num  = $('#day_delay').val();
    var x    = document.getElementById('tab_logic');
    var len  = x.rows.length;
     if(num == len){
         //  document.getElementById("button").setAttribute("type", "submit");
     }else{

        // document.getElementById("button").setAttribute("type", "button");
        }
  }


    function checkAll() {
        var cbs = document.getElementsByClassName("chech_if");
        var num=0;
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].value == '') {
                alert("الرجاء إدخال جميع البيانات ");
                num =1;
                break;
            }
            
        }
        //-------------------------
        if( num == 0){
            document.getElementById("button").setAttribute("type", "submit");
        }else {
            document.getElementById("button").setAttribute("type", "button");
        }
    
    
    }
    


</script>






