<style>
   html {

        height: 100%;
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .bond-header{
        /*   height: 55px;*/
        margin-bottom: 15px;

    }
    .bond-header .right-img img{
        width: 100%;
        height: 90px;
    }
    .bond-header .left-img img{
        width: 100%;
        height: 90px;
    }
    .alperiod{
        margin-top: 13px;
        display: inline-block;
        width: 100%;
        background-color: #eee;
        padding: 10px 0px;
        box-shadow: 4px 3px;

    }



    /*
    .mpage-header{
        position: fixed;
        top: 0;
        width: 100%;
    }
    */
    table { page-break-after:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    td    { page-break-inside:avoid; page-break-after:auto }


    table.report-content {
        page-break-after:always;
    }
    thead.report-header {
        display:table-header-group;
    }
    tfoot.report-footer {
        display:table-footer-group;
    }


    .mpage-header, .header-space{
      /*  height: 222px;*/
      height: 185px;
    }
    .footer-info, .footer-space {
      /*  height: 10px;*/
    }

    .mpage-header {
        position: fixed;
        top: 0;
        width: 100%;
    }
    .footer-info {
        position: fixed;
        bottom: 0;
        width: 100%;
    }





    @page {
        /* size: landscape;*/
        margin:10px;
      /*  size: 297mm 210mm;*/


    }

    



    .compact {
        table-layout: fixed;
    }
    
    .my_table{
        width: 100% !important;
    }
    .my_table.table-bordered > thead > tr > th,
    .my_table.table-bordered > thead > tr > td,
    .my_table.table-bordered > tbody > tr > th,
    .my_table.table-bordered > tbody > tr > td,
    .my_table.table-bordered > tfoot > tr > th,
    .my_table.table-bordered > tfoot > tr > td {
        
        font-size: 14px !important;
    }
    .dataTables_scrollHead table.dataTable thead th,.dataTables_scrollHead  table.dataTable thead td {
        padding: 8px 1px 8px 1px !important;
    }
    
    .dataTables_scrollFoot table.dataTable tfoot th,.dataTables_scrollFoot table.dataTable tfoot td {
        padding: 10px 2px 6px 2px; 
       
    }
    .dataTables_scrollFoot{
        margin-top: 5px;
    }
    

    @media print {
        .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
            border: 1px solid #000 !important;
            font-size: 12px !important;
            padding: 3px 2px;
            
        }

        .table-bordered > thead > tr > th, .table-bordered > thead > tr > td {
            text-align: center;
            font-size: 12px !important;
            border: 1px solid #000 !important;
            background-color: #eee;
        }
        .my_table tbody td {
            background-color: #fff !important;
    
        }
        .my_table tbody tr:last-child td{
             background-color:#e8e8e8 !important;
        }
    }
  
    .dataTables_scrollBody table tfoot{
          /*  display: none;*/
    }
    .report-container{
        width: 100%;
    }
     .print-heading .print-h{
        margin: 0;
        margin-top: -20px;
    }
    .header-fatra{
            margin-top: 15px;
    }
    
    
    .dataTables_scrollFoot tfoot tr:first-child td:nth-child(2){
        width:195px !important
    }
    .dataTables_scrollFoot tfoot tr:first-child td:nth-child(3){
         width:195px !important
    }
    .dataTables_scrollFoot tfoot tr:last-child td:nth-child(2){
         width:405px !important
    }
    .dataTables_scrollFootInner{
        padding-left: 0 !important; 
    } 

 .dataTables_scrollBody{
    
        position: relative !important;
    overflow: auto !important;
    max-height: 34vh !important;
    width: 100% !important;
 }   
    
/* table.dataTable, table.dataTable th, table.dataTable td {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}  */


</style>

<?php

if($this->input->post('status') ==1) {
    if (isset($records) && !empty($records)) {
        ?>




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


            <table id="" class=" table table-bordered scrollingtable my_table" role="table" style="table-layout:fixed;width: 100%;border-collapse:separate" border="1" >
        <thead >
            <tr class="greentd text-center">
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


                    if( $records[$s]->maden  == 0 && $records[$s]->dayen ==0){
                    continue;
                    }

                    ?>
                    <tr>
                        <td style="width: 40px;"><?php echo $a ?></td>
                        <td style="width: 80px"><? echo date('Y-m-d', $records[$s]->date); ?></td>
                        <td style="width: 80px"><?php echo $records[$s]->no3_qued_name;?></td>
                        <td style="width: 70px"><?php echo $records[$s]->qued_rkm_fk;?></td>
                        <td style="width: 70px"><?php echo $records[$s]->marg3;?></td>
                        <td style="width: 25%;text-align: right !important;"><?php echo $records[$s]->byan;?></td>
                        <td ><?php if($a == 1){ echo number_format($Rased_sabeq,2);}else{ echo number_format(0,2);} ?></td>
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
                    <td colspan="6"  style="color: #fff;text-align: center;background-color:#fcb632; border-left: 0;
                    font-size:17px ; color:black; border-radius:5px;
                    ">الإجمالي</td>
                    <!--  <td style="border-left: 0;border-right: 0;background-color:#fcb632;"></td>
                  <td></td>
                    <td></td> 
                    <td></td>
                    <td></td>-->
                    <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;    padding: 0;"><?php echo number_format($total_Rased_sabeq,2);?></td>
                    <td style="text-align: center;background-color: #fcb632;  border-radius:5px; font-size:17px ; color:black;    padding: 0;"><?php echo number_format($total_maden, 2); ?></td>
                    <td style="text-align: center;background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;    padding: 0;"><?php echo number_format($total_dayen, 2); ?></td>
                    <td><?php //echo number_format($total_raseed, 2); ?></td>
                </tr>
                <tr >
                    <td colspan="6" style="color: #fff;text-align: center;background-color:#fcb632; border-left: 0;
                      font-size:20px ; color:black; border-radius:5px;
                    ">رصيد الحساب</td>
                   <!-- <td style="border-left: 0;border-right: 0;background-color:#fcb632;"></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>-->
                    <td colspan="3" style="text-align: center; background-color: #fcb632; border-radius:5px;  font-size:20px ; color:black; "><? echo number_format($value, 2); ?></td>
                 <td> </td>
                     <!--  <td></td>-->

                </tr>
                </tfoot>

            </table>
          <!--  <div class=" col-xs-12 visible-print">
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

            </div>-->
        </div>




        <?php
    } else {

        ?>
        <div class="alert alert-danger ">لا يوجد نتيجة للبحث</div>
        <?php
    }
}
?>







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





<script>


    $('.scrollingtable').DataTable({
        "ordering": false,
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
                 orientation: 'portrait',
                customize: function (win) {
                    $(win.document.body).append("<style>@media print{  table tr td {  vertical-align: middle !important; } } body{background-color: #fff;} @page{size:  320mm 220mm;margin:10px 15px 35px 15px;}</style>");
                    $(win.document.body).find('.my_table').attr('class','table table-bordered my_table');

                    var bodyht =  '<div class="first-part" data-spy="scroll">'+
                        '<table class="report-container">'+
                        '<thead class="report-header">'+
                        '<tr>'+
                        '<th class="report-header-cell">'+
                        '<div class="header-space">&nbsp;</div>'+
                        '</th>'+
                        '</tr>'+
                        '</thead>'+

                        '<tbody class="report-content">'+
                        '<tr>'+
                        '<td class="report-content-cell">'+

                        '</td>'+
                        '</tr>'+
                        '</tbody>'+


                        '<tfoot class="report-footer">'+
                        '<tr>'+
                        '<td class="report-footer-cell">'+
                        '<div class="footer-space">&nbsp;</div>'+

                        '</td>'+
                        '</tr>'+
                        '</tfoot>'+
                        '</table>'+
                        '</div>';


                    $(win.document.body).append(bodyht);

                    var headerpage = '<div class="header-info">'+
                        '<div class="bond-header">'+
                        '<div class="col-xs-4 pad-2">'+
                        '<div class="right-img">'+
                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol1.png">'+
                        '</div>'+
                        '</div>'+
                        '<div class="col-xs-4 pad-2">'+

                        '</div>'+
                        '<div class="col-xs-4 pad-2">'+
                        '<div class="left-img">'+
                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol2.png">'+
                        '</div>'+
                        '</div>'+
                        '</div>'+

                        '</div>';

                    var headerfatra= '<div class="col-xs-12" style="margin-top: -16px;"> '+
                        '<div class=" gray-background">'+

                        '<div class="col-xs-3 no-padding"></div>'+
                        '<div class="col-xs-6 text-center">'+
                        '<h5 class="alperiod"> خلال الفترة من <?php 
                        $date_from = strtotime($this->input->post('from'));
                        echo date("d-m-Y",$date_from);
                        //echo $this->input->post('from');  ?> إلي <?php  
                        $date_to = strtotime($this->input->post('to'));
                        echo date("d-m-Y",$date_to);
                        
                        
                       // echo $this->input->post('to');  ?></h5>'+
                        '</div>'+

                        '<div class="col-xs-3 text-center"></div>'+

                        '</div>'+

                        '</div>';
                        
                        $(win.document.body).find('.print-h').html('حركة حساب');
                       



                    $(win.document.body).find('.page-print-header').append(headerpage);
                    $(win.document.body).find('.header-fatra').append(headerfatra);





                    $(win.document.body).find('.my_table').wrap('<div class="tablearea">');


                    var  contentcell =$(win.document.body).find('.report-content-cell')
                    $(win.document.body).find('.tablearea').appendTo(contentcell);
                    
                    
                     /***********************/
                   /* $(win.document.body).find('.my_table tbody tr td:nth-child(3)').attr('class','countable1');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(4)').attr('class','countable2');
                    */
                    
                    $(win.document.body).find('.tablearea tbody tr:last-child')
                    .after('<tr>'+
                    '<td class="text-center" colspan="6" style="background-color: #e8e8e8 !important;">الإجمالي</td>'+
                    '<td class=" text-center" style="background-color: #e8e8e8 !important;"><?php echo number_format($total_Rased_sabeq,2);?></td>'+
                    '<td class=" text-center" style="background-color: #e8e8e8 !important;"><?php echo number_format($total_maden, 2); ?></td>'+
                    '<td class=" text-center" style="background-color: #e8e8e8 !important;"><?php echo number_format($total_dayen, 2); ?></td>'+
                    '<td class="" style="background-color: #e8e8e8 !important;"></td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td class="text-center " colspan="6"  style="background-color: #e8e8e8 !important;">رصيد الحساب	</td>'+
                    '<td class=" text-center" colspan="3" style="background-color: #e8e8e8 !important;"><? echo number_format($value, 2); ?></td>'+
                    '<td class="" style="background-color: #e8e8e8 !important;"></td>'+
                    
                    '</tr>' );
                    

                   
                     
                    
                    
                    
                    //   var  headercell =$(win.document.body).find('.report-header-cell')
                    // $(win.document.body).find('.mpage-header').appendTo(headercell);
                    
                 
                    
                    
                    
                    
                     $(win.document.body).find('.my_table').after('<div class=" col-xs-12">'+
                                    
                                        '<div class="col-xs-4 text-center">'+
                                            '<label> المحاسب </label><br><br>'+
                                        '</div>'+
                                        '<div class="col-xs-4 text-center">'+
                                            '<label> مدير الشئون المالية </label><br><br>'+
                                        '</div>'+
                                        '<div class="col-xs-4 text-center">'+
                            
                                            '<label>مدير عام الجمعية </label><br><br>'+
                                            '<p></p><br>'+
                                        '</div>'+
                                        '<br><br>'+
                            
                                    '</div>' ); 



                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');
                        
                     //   $(win.document.body).find('thead tr:first-child th:nth-child(1)').css("width", "350px");
                    $(win.document.body).find('thead tr th:nth-child(1)').css("width", "40px");
                    
                    $(win.document.body).find('thead tr th:nth-child(2)').css("width", "80px");
                    $(win.document.body).find('thead tr th:nth-child(3)').css("width", "100px");
                    
                    $(win.document.body).find('thead tr th:nth-child(4)').css("width", "80px");
                    
                    $(win.document.body).find('thead tr th:nth-child(5)').css("width", "80px");
                    $(win.document.body).find('thead tr th:nth-child(6)').css("width", "380px");
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
        scrollY: '50vh',
        scrollCollapse: true,
        paging: false,
       
        info: false,
        colReorder: true
    });


</script>




