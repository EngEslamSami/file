<?php
$num = $_POST['num'];
if($num>10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
    </div>';

}
elseif($num<=10)
{
   ?>
<table class="table table-bordered" id="tab_logic">
    <thead>
    <th>م</th>
    <th style="text-align: center">نوع الجهاز</th>
    <th style="text-align: center">العدد</th>
    <th style="text-align: center">حالة الجهاز</th>
    <th style="text-align: center" >ملاحظات</th>
    <th style="text-align: center">الإجراء</th>
    </thead>
    <?    for($i=1;$i<=$num;$i++){?>
    <tbody>
    <tr >
        <td></td>

        <?

       $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;

        ?>
        <td> <select class="no-padding " style="width: 100%;" name="d_house_device_id_fk<? echo $i;?>" id="try<? echo $i;?>" data-validation="required" aria-required="true">
                <option value="">اختر</option>
                <?php foreach ($devices as $d):
                    ?>
                    <option value="<? echo  $d->id_setting;?>" ><? echo $d->title_setting;?> </option>
                <? endforeach;?>
            </select></td>
        <td> <select class="no-padding " style="width: 100%;" name="d_count<? echo $i;?>" id="try<? echo $i;?>" data-validation="required" aria-required="true">
                <option value="">اختر</option>
                <? for ($d=1;$d<10;$d++):?>
                <option value="<? echo $d; ?>"><? echo $d;?></option>
                <? endfor;?>
            </select></td>
        <td> <select class="no-padding " style="width: 100%;" name="d_house_device_status_id_fk<? echo $i;?>" id="try<? echo $i;?>" data-validation="required" aria-required="true">
                <option value="">اختر</option>
                <?  for ($d=1;$d<sizeof($house_device_status);$d++): ?>
                    <option value="<? echo$d;?>"><? echo  $house_device_status[$d];?></option>
                <? endfor;?>
            </select></td>
        <td> <input type="text" name='d_note<? echo $i;?>' placeholder='' style="width: 100%;" id="try<? echo $i;?>" class="form-control" data-validation="required" /></td>
        <td>
            <i   style="margin-right: 20px" class="fa fa-trash-o fa-2x" onclick="myFunction(this)" aria-hidden="true"></i>
          </td>
    </tr>
    <script>

        $('#max').val(<? echo $_POST['num'] ; ?>);
        function myFunction(o) {
            var p=o.parentNode.parentNode;
            p.parentNode.removeChild(p);
            var max =   $('#device_num').val();
            $('#device_num').val(max-1);
            $('#max').val(max-1);
        }
    </script>
    <?   }?>
    </tbody>

</table>
  <?}?>