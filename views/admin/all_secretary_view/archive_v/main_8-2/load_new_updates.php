
<?php if(isset($new_sader) &&!empty($new_sader) || isset($new_wared)&& !empty($new_wared)){

    ?>



<table id="" class="example table table-bordered table-striped ">
        <thead>
        <tr class="greentd">
            <th>رقم المعاملة</th>
            <th>الموضوع</th>
            <th>النوع</th>
            <th>التاريخ</th>
            <th>من</th>
            <th>إلى</th>
            <th>حالة المعاملة</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($new_sader)){
            $x=1;
            foreach ($new_sader as $sader){
                $x++;
                ?>
                <tr>
                    <td><?php
                        if (!empty($sader->sader_rkm)){
                            echo $sader->sader_rkm;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>

                    <td><?php
                        if (!empty($sader->mawdo3_name)){
                            echo $sader->mawdo3_name;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>
                    <td><span class="label label-success text-center">صادر</span></td>

                    <td><?php
                        if (!empty($sader->date_ar)){
                            echo $sader->date_ar;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>
                    <td>
                        <?php
                        if (!empty($sader->current_from_user_name)){
                            echo $sader->current_from_user_name;
                        }else{
                            echo 'غير محدد';
                        }
                        ?>
                    </td>
                    <td>

                        <?php
                        if (!empty($sader->current_to_user_name)){
                            echo $sader->current_to_user_name;
                        }else{
                            echo 'غير محدد';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($sader->esthkak_date  < date('Y-m-d')){
                            ?>
                    <span class="label label-success text-center">تم الإنتهاء</span>

                    <?php
                        } elseif ($sader->esthkak_date >= date('Y-m-d')){
                            ?>
                    <span class="label label-warning text-center">قيد التنفيذ</span>
                            <?php
                        }else{
                            echo 'غير محدد';
                        }
                        ?>

                    </td>


                </tr>
                <?php
            }
        }
        ?>
        <?php
        if (!empty($new_wared)){
            $z=1;
            foreach ($new_wared as $wared){
                $z++;
                ?>
                <tr>
                    <td><?php
                        if (!empty($wared->rkm)){
                            echo $wared->rkm;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>

                    <td><?php
                        if (!empty($wared->title)){
                            echo $wared->title;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>
                    <td><span class="label label-success text-center">وارد</span></td>

                    <td><?php
                        if (!empty($wared->date_ar)){
                            echo $wared->date_ar;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>
                    <td>
                        <?php
                        if (!empty($wared->current_form_user_name)){
                            echo $wared->current_form_user_name;
                        }else{
                            echo 'غير محدد';
                        }
                        ?>
                    </td>
                    <td>

                        <?php
                        if (!empty($wared->current_to_user_name)){
                            echo $wared->current_to_user_name;
                        }else{
                            echo 'غير محدد';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($wared->esthkak_date  < date('Y-m-d')){
                        ?>
                   <span class="label label-success text-center">تم الإنتهاء</span>

                    <?php
                    } elseif ($wared->esthkak_date >= date('Y-m-d')){
                        ?>
                        <span class="label label-warning text-center">قيد التنفيذ</span>
                        <?php
                    }else{
                        echo 'غير محدد';
                    }
                    ?>

                    </td>


                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>


<?php } else{
    ?>
    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>

    <?php
}
?>


<script>

    $('.example').DataTable( {
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
