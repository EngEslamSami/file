<?php

                                    if(isset($records)&&!empty($records)){
                                        ?>
                                        <button type="button" style="margin-right: 90%;" onclick="printDiv('print')" class="btn btn-labeled btn-purple ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                                        </button>

                                        <div id="print">

                                <table id="scrollingtable" class="table table-bordered  scrollingtable">
                                    <thead>
                                    <tr class="greentd">
                                        <th style="text-align: center !important;">م</th>
                                        <th style="text-align: center !important;">رقم الإيصال</th>
                                        <th style="text-align: center !important;">التاريخ</th>
                                        <th style="text-align: center !important;">نوع الإيصال</th>
                                        <th style="text-align: center !important;">طريقة التوريد</th>
                                        <th style="text-align: center !important;">المبلغ </th>
                                        <?php if(empty($publisher)){?>
                                        <th style="text-align: center !important;">الإسم </th>
                                        <?php } ?>
                                        <th style="text-align: center !important;">البند </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(isset($records)&&!empty($records)){
                                        $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
                                        ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

                                        $x=0;
                                        foreach ($records as $row){
                                            $x++;
                                            ?>
                                            <tr>
                                             <td><?php echo $x;?></td>
                                             <td><?php echo $row->pill_num;?></td>
                                                <td><?php echo $row->pill_date;?></td>
                                                <td><?php echo $row->pill_type_name;?></td>
                                             <td><?php echo $pay_method_arr[$row->pay_method];?></td>
                                             <td><?php echo $row->value;?></td>
                                            <?php if(empty($publisher)){?>
                                             <td><?php echo $row->publisher_name;?></td>
                                                <?php } ?>
                                             <td><?php echo $row->bnd_type1_name;?></td>



                                            </tr>
                                            <?php } } ?>


                                    </tbody>
                                </table>
                                            <div class="col-md-12">
                                                <?php
                                                if(isset($records_bandtype1)&&!empty($records_bandtype1)){
                                                    foreach ($records_bandtype1 as $row){
                                                        if(!empty($row->value_band)){
                                                    ?>
                                                    <div class="col-md-4">
                                                        <h6 class="box-h"><span><?php echo number_format($row->value_band,2);?>:</span><?php echo $row->bnd_type1_name;?></h6>
                                                    </div>
                                                <?php }  } }  ?>
                                                <?php
                                                if(isset($records_bandtype2)&&!empty($records_bandtype2)){
                                                    foreach ($records_bandtype2 as $row2){
                                                        if(!empty($row2->value_band)){
                                                        ?>
                                                        <div class="col-md-4">
                                                            <h6 class="box-h"><span><?php echo number_format($row->value_band,2);?>:</span><?php echo $row2->bnd_type2_name;?></h6>
                                                        </div>
                                                    <?php }  }  } ?>
                                            </div>
                                        </div>
                            <?php  }  else { ?>
                                        <div class="alert alert-danger">عفوا !...لاتوجد نتائج</div>
                                    <?php } ?>
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
<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<script>



    $('.scrollingtable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                orientation: 'landscape',
                customize: function ( win ) {
                    $(win.document.body).append("<style> body{  background-color: #fff;} @page{size:landscape}</style>")
                    $(win.document.body)
                        .css( 'font-size', '14pt' )
                        .prepend(
                            '<img src="<?php echo base_url();  ?>/asisst/admin_asset/img/pills/back2.png" style="position:absolute; top:0; left:0;    width: 500px;" />'
                        );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'table-layout', 'fixed' );
                    $(win.document.body).find('thead th:nth-child(1)').css("width","50px");
                    $(win.document.body).find('thead th:nth-child(6)').css("width","200px");
                },
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                },
                autoPrint: false,

            },
            'colvis'
        ],
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false,
        info: false,
        colReorder: true
    } );







</script>
