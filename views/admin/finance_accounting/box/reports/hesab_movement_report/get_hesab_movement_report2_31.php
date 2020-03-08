<style>
    .specific_style{

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2{
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }
</style>



    <?php
    function recorrer_niveles(&$array, $nivel, &$parent, &$original)
    {
        $nivel++;
        if (isset($array) and $array != null) {
            foreach ($array as $key => $item) {
                //  $cantidad = $array[$key]["num"];
                $cantidad = 0;
                $array[$key]["Total_maden"] = $cantidad;
                $array[$key]["Total_dayen"] = $cantidad;
               $cuenta =0;
                if(isset($parent) and $parent != null){
                   $cuenta = count($parent); 
                }
               
                
                for ($i = $nivel; $i < $cuenta; $i++) {
                    unset($parent[$i]);
                } // for
                sum_original($original, $parent, $array[$key]["all_maden"], $array[$key]["all_dayen"]);
                $parent[$nivel] = $array[$key]["code"];
                recorrer_niveles($array[$key]["children"], $nivel, $parent, $original);
            } // foreach
        }
    } // function

    function sum_original(&$original, $parent, $cantidad, $cantidad2)
    {
        if (!is_array($parent)) return 0;

        if (isset($original) and $original != null) {
            foreach ($original as $key => $value) {
                if (isset($original[$key]["code"]) && in_array($original[$key]["code"], $parent)) {
                    $original[$key]["Total_maden"] += $cantidad;
                    $original[$key]["Total_dayen"] += $cantidad2;


                } // if
                sum_original($original[$key]["children"], $parent, $cantidad, $cantidad2);
            } // foreach
        }

    } // function


    /*****************************************************************/
    $parent = null;
    recorrer_niveles($records, -1, $parent, $records);

     /*echo "<pre>";
      print_r($records);
      echo "</pre>";
    die;*/
    ?>


    <table class="table table-bordered example" role="table">
        <thead>
        <tr class="info">
            <th width="2%">#</th>
            <th class="text-left">رقم الحساب</th>
            <th class="text-left">إسم الحساب</th>
            <th class="text-left">المدين</th>
            <th class="text-left">الدائن</th>
            <th class="text-left">الرصيد</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($records) && $records!=null) {
            buildTreeTable($records);
        }
        function buildTreeTable($tree, $count=1)
        {
            $s =0;
            $value =0;
            foreach ($tree as $record) {


                if (empty($record['children'])) {
                    $dayen =$record['all_dayen'];
                    $maden =$record['all_maden'];

                }else{

                    $dayen =$record['Total_dayen'];
                    $maden =$record['Total_maden'];

                }



                if ($s == 0) {
                    if($record['type'] ==2){
                        $value =($dayen - $maden);

                    }elseif ($record['type'] ==1){
                        $value =($maden - $dayen);
                    }

                }elseif($s >0) {

                    if($record['type'] ==2){
                        $value =  ($dayen - $maden);
                    }elseif ($record['type'] ==1){
                        $value = ($maden - $dayen);
                    }
                }

                ?>
                <tr>
                    <td><?=$count++?></td>
                    <td><?=$record['code']?></td>
                    <td><?=$record['name']?></td>
                    <td><?=$maden?></td>
                    <td><?=$dayen?></td>
                    <td><?=$value?></td>
                </tr>
                <?php
                if (isset($record['children'])) {
                    $count = buildTreeTable($record['children'], $count++);
                }
                $s++;}
            return $count;
        }
        ?>

        </tbody>
    </table>






<script>



    $('.example').DataTable({
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
        colReorder: true,
        retrieve: true
    } );




</script>












