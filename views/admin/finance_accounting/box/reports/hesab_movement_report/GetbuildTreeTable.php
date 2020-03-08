<table id="" class="table table-bordered example" role="table">
    <thead>
    <tr class="info">
        <th style="font-size: 15px; width:88px !important; ">م</th>
        <th style="font-size: 15px;" class="text-left">رقم الحساب</th>
        <th style="font-size: 15px;" class="text-left">إسم الحساب</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($tree) && $tree!=null) {
        buildTreeTable($tree);
    }
    function buildTreeTable($tree, $count=1)
    {
        $types = array(1=>'رئيسي',2=>'فرعي');
        $nature = array('','مدين','دائن');
        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
        //   $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
        $colorArray = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#09b6bb', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');


        foreach ($tree as $record) {
            $color='';
            if($_POST['status'] == 2){
                $onclick = "$('#account_num'+$('#modalID').val()).val(".$record->code.");
                                 $('#account'+$('#modalID').val()).val('".$record->name."'); 
                                 $('#myModal').modal('hide');";
                $color='style="background-color:#56ad5d"';
            }else{

                $onclick = "alert('ليس حساب فرعي');";
            }

            if ($record->hesab_no3 == 2) {
                $onclick = "$('#account_num'+$('#modalID').val()).val(".$record->code.");
                                 $('#account'+$('#modalID').val()).val('".$record->name."'); 
                                 $('#myModal').modal('hide');";
                $color='style="background-color:#56ad5d"';
            }
            ?>
            <tr style="background-color: <?=$colorArray[$record->level]?>; cursor: pointer;" onclick="<?=$onclick?>">
                <td <?php echo $color; ?> class="forTd"><?=$count++?></td>
                <td  <?php echo $color; ?>  class="forTd"><?=$record->code?></td>
                <td <?php echo $color; ?>  class="forTd"><?=$record->name?></td>
            </tr>
            <?php
            if (isset($record->subs)) {
                $count = buildTreeTable($record->subs, $count++);
            }
        }
        return $count;
    }
    ?>
    </tbody>
</table>


<script>
    table= $('.example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );

</script>
