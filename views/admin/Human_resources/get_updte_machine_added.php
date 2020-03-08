  
 <div class="col-md-12" id="">
 
  <?php
        $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
        $days_ar =array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
         for ($a=0;$a<sizeof($days_ar);$a++){   $myday =$days_en[$a];?>
            <input type="checkbox" class="day-update" name="<?php echo $days_en[$a];?>" id="<?php echo $days_en[$a];?>"
                   <?php if( $data_period[$myday] ==1){ echo 'checked'; } ?>
                   value="<?=$days_en[$a]?>" style="margin-right: 20px">
            <label for=""><?php echo $days_ar[$a];?></label>
        <?php    }  ?>
  <table class="table table-striped table-bordered" width="100%" id="">
                    <thead>
                    <tr class="info">
                        <th>الفترة</th>
                        <th>وقت الحضور </th>
                        <th>وقت الإنصراف</th>
                        <th>بدايه تسجيل الدخول</th>
                        <th>نهايه تسجيل الدخول</th>
                        <th> بدايه تسجيل الخروج</th>
                        <th>نهايه تسجيل الخروج</th>
                        <th> من تاريخ</th>
                        <th>الى تاريخ</th>
                        <th>الإجراء</th>
                    </thead>
                    <tbody  >
 <tr class="">
    <td># 
       <input type="hidden" id="update_id" value="<?=$data_period["id"]?>"/> 
    </td>
    <td>
       <input type="time" name="attend_time" value="<?=$data_period["attend_time"]?>"  readonly="" class="form-control class-row"/>
       </td>
    <td>
       <input type="time" name="leave_time"  value="<?=$data_period["leave_time"]?>"  readonly=""  class="form-control class-row" />
    </td>
    <td>
       <input type="time" name="start_enter" value="<?=$data_period["start_enter"]?>"  readonly="" class="form-control class-row" />
    </td>
    <td>
       <input type="time" name="end_enter"   value="<?=$data_period["end_enter"]?>" readonly=""  class="form-control class-row" />
    </td>
    <td>
       <input type="time" name="start_out"   value="<?=$data_period["start_out"]?>" readonly=""  class="form-control class-row" />
    </td>
    <td>
       <input type="time" name="end_out"     value="<?=$data_period["end_out"]?>"  readonly=""  class="form-control class-row" />
    </td>
    <td>
       <input type="date" name="from_date"   value="<?=date("Y-m-d",$data_period["from_date"])?>" class="form-control class-row" />
    </td>
    <td>
       <input type="date" name="to_date"    value="<?=date("Y-m-d",$data_period["to_date"])?>" class="form-control class-row" />
    </td>
    <td>
      <input type="button"  id="button" name="add" value="تعديل " onclick="UpdateForm('class-row');" class="btn btn-success"></td>
    </td>
</tr>    
                    </tbody>
                </table>
     </div>           
                
                