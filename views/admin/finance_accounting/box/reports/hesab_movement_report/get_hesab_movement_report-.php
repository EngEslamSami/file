<style>
    @page{
        /* size: landscape;*/
        margin: 10px;
    }
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


    /*
        .table-scroll {
            position: relative;
            max-width: 100%;
            width:100%;
            margin: auto;
            display:table;
        }
        .table-wrap {
            width: 100%;
            display:block;
            height: 500px;
            overflow: auto;
            position:relative;
            z-index:1;
        }
        .table-scroll table {
            width: 100%;
            margin: auto;
            border-collapse: separate;
            border-spacing: 0;
        }
        .table-scroll th, .table-scroll td {
            padding: 5px 10px;
            border: 1px solid #000;
            background: #fff;
            vertical-align: top;
        }
        .faux-table table {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            pointer-events: none;
        }
        .faux-table table + table {
            top: auto;
            bottom: 0;
        }
        .faux-table table tbody, .faux-table  tfoot {
            visibility: hidden;
            border-color: transparent;
        }
        .faux-table table + table thead {
            visibility: hidden;
            border-color: transparent;
        }
        .faux-table table + table  tfoot{
            visibility:visible;
            border-color:#000;
        }
        .faux-table thead th,
        .faux-table tfoot th,
        .faux-table tfoot td {
            background: #ccc;
        }
        .faux-table {
            position:absolute;
            top:0;
            right:0;
            left:0;
            bottom:0;
            overflow-y:scroll;
        }
        .faux-table thead,
        .faux-table tfoot,
        .faux-table thead th,
        .faux-table tfoot th,
        .faux-table tfoot td {
            position:relative;
            z-index:2;
        }
        */

    .compact{
        table-layout: fixed;
    }

    .compact td{
        background-color: #fff !important;

    }
    @media print{
        .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td{
            border: 1px solid #000 !important;
        }
        table.dataTable thead th, table.dataTable thead td{
            font-size: 16px;
            border: 1px solid #000 !important;
            background-color: #eee;
        }
    }
</style>

<?php
if($this->input->post('status') ==1) {
    if (isset($records) && !empty($records)) {
        ?>



        <!--<div id="table-scroll" class="table-scroll">
            <div id="faux-table" class="faux-table" aria="hidden"></div>-->
        <div class="table-wrap" id="printMe">


            <div class=" col-xs-12 visible-print">

                <h5 class="text-center">حركة حساب
                    <?php echo $hesab_name;?>
                </h5>
                <h6 class="text-center">
                    خلال فترة  من
                    <?php echo $this->input->post('from') ;?>    م

                    إلي
                    <?php echo $this->input->post('to');?>    م


                </h6>
            </div>


            <table id="scrollingtable" class="table table-bordered  scrollingtable" border="1" cellpadding="3" role="table" style="table-layout: fixed;">
                <thead>
                <tr class="greentd">
                    <th style="width: 40px;">م</th>
                    <th  style="width: 80px" class="text-left">التاريخ</th>
                    <th style="width: 80px"  class="text-left">نوع القيد</th>
                    <th style="width: 70px" class="text-left">رقم القيد</th>
                    <th style="width: 70px" class="text-left">رقم المرجع</th>
                    <th  style="width: 25%"   class="text-left">البيان</th>
                    <th class="text-left">الرصيد السابق</th>
                    <th class="text-left">المدين</th>
                    <th class="text-left">الدائن</th>
                    <th class="text-left">الرصيد</th>

                </tr>
                </thead>
                <tbody>


                <?php

                $no3_qued_arr =array(1=>'قيد إفتتاحي',2=>'قيد يومية',3=>'قيد ألي'
                ,4=>'قيد تسوية',5=>'قيد سند قبض',6=>'قيد سند صرف');
                $a=1;
                $total_maden = 0;
                $total_dayen = 0;
                $total_raseed = 0;
                $total_Rased_sabeq = 0;
                for ($s=0;$s<sizeof($records);$s++) {

                    if ($s == 0) {
                        $total_raseed = 0;

                        if($type == 2){
                            $Rased_sabeq =  $totla_sabeq[1] -  $totla_sabeq[0];

                            $value =($Rased_sabeq + $records[0]->dayen - $records[0]->maden);

                        }elseif ($type == 1){
                            $Rased_sabeq =  $totla_sabeq[0] -  $totla_sabeq[1];
                            $value =($Rased_sabeq + $records[0]->maden - $records[0]->dayen);

                        }

                    }elseif($s >0) {

                        if($type ==2){

                            $value = $value + ($records[$s]->dayen - $records[$s]->maden);
                            $total_raseed = $total_dayen -$total_maden;
                        }elseif ($type ==1){
                            $value = $value + ($records[$s]->maden - $records[$s]->dayen);
                            $total_raseed = $total_maden-$total_dayen;
                        }

                    }
                    if($a == 1){   $total_Rased_sabeq +=$Rased_sabeq; }



                    $total_maden += $records[$s]->maden;
                    $total_dayen += $records[$s]->dayen;


                    ?>
                    <tr>
                        <td><?php echo $a ?></td>
                        <td><? echo date('Y-m-d', $records[$s]->date); ?></td>
                        <td><?php echo $records[$s]->no3_qued_name;?></td>
                        <td><?php echo $records[$s]->qued_rkm_fk;?></td>
                        <td><?php echo $records[$s]->marg3;?></td>
                        <td><?php echo $records[$s]->byan;?></td>
                        <td><?php if($a == 1){ echo number_format($Rased_sabeq,2);}else{ echo number_format(0,2);} ?></td>
                        <td><? echo number_format($records[$s]->maden, 2); ?></td>
                        <td><? echo number_format($records[$s]->dayen, 2); ?></td>
                        <td><?php echo number_format($value,2);?></td>
                    </tr>
                    <?php
                    $a++;
                }  ?>



                </tbody>
                <tfoot>
                <tr>
                    <td  style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;">الإجمالي</td>
                    <td style="border-left: 0;border-right: 0;background-color:#09704e;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo number_format($total_Rased_sabeq,2);?></td>
                    <td><?php echo number_format($total_maden, 2); ?></td>
                    <td><?php echo number_format($total_dayen, 2); ?></td>
                    <td><?php //echo number_format($total_raseed, 2); ?></td>
                </tr>
                <tr >
                    <td  style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;">رصيد الحساب</td>
                    <td style="border-left: 0;border-right: 0;background-color:#09704e;"></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><? echo number_format($value, 2); ?></td>
                    <td></td>
                    <td></td>

                </tr>
                </tfoot>

            </table>
            <div class=" col-xs-12 visible-print">
                <br><br>

                <div class="col-xs-4 text-center">
                    <label> المحاسب </label><br><br>
                </div>
                <div class="col-xs-4 text-center">
                    <label> مدير الشئون المالية </label><br><br>
                </div>
                <div class="col-xs-4 text-center">

                    <label>مدير عام الجمعية </label><br><br>
                    <p></p><br>
                </div>
                <br><br>

            </div>
        </div>
        <!--</div>-->

        <button onclick="printData('scrollingtable')" class="btn btn-success" style="float: left">طباعة</button>



        <?php
    } else {

        ?>
        <div class="alert alert-danger ">لا يوجد نتيجة للبحث</div>
        <?php
    }
}
?>







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



    /*
              var fauxTable = document.getElementById("faux-table");
              var mainTable = document.getElementById("main-table");
              var clonedElement = mainTable.cloneNode(true);
              var clonedElement2 = mainTable.cloneNode(true);
              clonedElement.id = "";
              clonedElement2.id = "";
              fauxTable.appendChild(clonedElement);
              fauxTable.appendChild(clonedElement2);

    */




</script>

<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }


    function printData(divName)
    {
        var divToPrint=document.getElementById(divName);
        // newWin= window.open("");
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'table th, table td {' +
            'border:1px solid #000;' +
            'padding;0.5em;' +
            '}' +

            'table {' +
            'direction:rtl;' +
            '}' +


            '</style>';

        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
    }



</script>










