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
        <td> <select class="no-padding " style="width: 100%;" name="h_home_device_id_fk<? echo $i;?>" id="try<? echo $i;?>" data-validation="required" aria-required="true">
                <option value="">اختر</option>
                <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                <?php foreach ($all as $record=>$value):
                    ?>
                    <option  value="<?php echo $all[$record]->id?>" <?php if(!empty($disabls['dis'.$record])){echo  $disabls['dis'.$record];}?>>
                        <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
                <? endforeach;?>
            </select></td>
        <td> <select class="no-padding " style="width: 100%;" name="h_count<? echo $i;?>" id="try<? echo $i;?>" data-validation="required" aria-required="true">
                <option value="">اختر</option>
                <? for ($d=1;$d<10;$d++):?>
                <option value="<? echo $d; ?>"><? echo $d;?></option>
                <? endfor;?>
            </select></td>
        <td> <input type="text" name='h_note<? echo $i;?>' placeholder='' style="width: 100%;" id="try<? echo $i;?>" class="form-control" data-validation="required" /></td>
        <td>
            <a href="#" onclick="myFunction(this)"><i class="fa fa-trash" aria-hidden="true"></i></a>

           
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