<?php

if(isset($records) && !empty($records))
{?>
    <button type="button" style="margin-right: 90%;" onclick="printDiv('print')" class="btn btn-labeled btn-purple ">
        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
    </button>
    <div id="print">
    <table id="" class="table table-bordered " role="table" style="table-layout: fixed;">
        <thead>
        <tr class="info">
            <th width="10%">م</th>
            <th class="text-left">رقم السند</th>
            <th class="text-left">تاريخ السند</th>
            <th class="text-left">طريقة الدفع</th>
            <th class="text-left">اجمالي السند</th>

        </tr>
        </thead>
        <tbody>
        <?php

        $method2 = array(
            1=>'نقدي',
            2=>'شيك من الصندوق',
            3=>'شيك من البنك'
        );
        if (isset($records) && $records != null) {
            $x = 1;
            foreach ($records as $value) {
                ?>
                <tr>
                    <td><?=$x++?></td>
                    <td><?=$value->rqm_sanad?></td>
                    <td><?=$value->date_sanad_ar?></td>
                    <td><?php if( !empty($value->pay_method_name)){

                            echo $value->pay_method_name;
                        }else{
                            echo 'غير معرفة';
                        }?>
                    </td>
                    <td><?=$value->total_value?></td>

                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    </div>
    <script>
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>


    <?php
}else {

?>
    <div class="alert alert-danger ">لا يوجد سندات متاحة</div>
    <?php
}

?>
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

