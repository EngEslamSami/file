


<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="pull-right">
            <button class="btn btn-success" onclick="return printDivFun('printdiv');"
            ><span class="fa fa-print"></span> طباعة</button>
        </div>

        <br><br><br>

        <div class="panel-body" id="printdiv">
            <?php if (!empty($records) && isset($records)) { ?>


                <table id="" class="example table table-striped table-bordered dt-responsive nowrap dataTable"
                       cellspacing="0"
                       width="100%">

                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الملف</th>
                        <th class="text-center">اسم العائلة</th>
                        <th class="text-center">إسم الام</th>
                        <th class="text-center">رقم الهوية</th>
                        <th class="text-center">رقم الجوال</th>
                        <th class="text-center"> الفئة</th>
                        <!--                    <th class="text-center">إسم البنك</th>-->
                        <!--                    <th class="text-center">رقم الحساب </th>-->
                        <th class="text-center">عدد الافراد</th>
                        <th class="text-center">أرملة</th>
                        <th class="text-center">يتيم</th>
                        <th class="text-center">مستفيد</th>
                        <th class="text-center">حالة الملف</th>


                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $x = 1;
                    $total_armal = 0;
                    $total_yatem = 0;
                    $total_mostafed = 0;
                    $total_all = 0;
                    $total_value = 0;
                    foreach ($records as $record) {

                        $total_all = ($record->ff_yatem + $record->ff_armal + $record->up_child);

                        $total_yatem += $record->ff_yatem;
                        $total_mostafed += $record->up_child;

                        $total_armal += $record->ff_armal;
                        ?>
                        <tr>
                            <td><?php echo $x++ ?></td>
                            <td><?php echo $record->file_num; ?></td>
                            <td><?php if (!empty($record->father_name)) {
                                    echo $record->father_name;
                                } else {
                                    echo "غير مضاف";
                                } ?></td>
                            <td><?php if (!empty($record->mother)) {
                                    echo $record->mother['mother_name'];
                                } else {
                                    echo "غير مضاف";
                                } ?></td>
                            <td><?php if (!empty($record->mother_national_num)) {
                                    echo $record->mother_national_num;
                                } else {
                                    echo "غير مضاف";
                                } ?></td>
                            <td><?php if (!empty($record->mother)) {
                                    echo $record->mother['mother_phone'];
                                } else {
                                    echo "غير مضاف";
                                } ?></td>
                            <td><?php if (!empty($record->mother)) {
                                    echo $record->mother['categoriey'];
                                } else {
                                    echo "غير مضاف";
                                } ?></td>

                            <!--                            <td>-->
                            <?php //echo (!empty($record->bank_details)) ? $record->bank_details->person_card : "لا يوجد حساب لهذه الأسرة"; ?><!--</td>-->
                            <!--                            <td>-->
                            <?php //echo (!empty($record->bank_details)) ? $record->bank_details->bank_name : "لا يوجد حساب لهذه الأسرة"; ?><!--</td>-->
                            <!--                            <td>-->
                            <?php //echo (!empty($record->bank_details)) ? $record->bank_details->bank_account_num : "لا يوجد حساب لهذه الأسرة"; ?><!--</td>-->
                            <td><?php echo $total_all; ?></td>
                            <td><?php echo $record->ff_armal; ?></td>
                            <td><?php echo $record->ff_yatem; ?></td>
                            <td><?php echo $record->up_child; ?></td>
                            <td><?= $record->process_title ?></td>
                        </tr>
                    <?php } ?>
                    <?php
                    
                                         'total_armal = ' . $total_armal . '<br/>';
                                         'total_yatem = ' . $total_yatem . '<br/>';
                                         'total_mostafed = ' . $total_mostafed . '<br/>';
                    
                    ?>

                    </tbody>
                    <tfoot>
                    <tr class="info text-center">
                        <td colspan="7"> الاجمالي </td>
                        <td> <?php echo $total_armal+$total_yatem+$total_mostafed?></td>
                        <td> <?=$total_armal?></td>
                        <td> <?=$total_yatem?></td>
                        <td> <?=$total_mostafed?></td>

                    </tr>

                    </tfoot>
                </table>
            <?php } else { ?>
                <div class="alert alert-danger">عفوا!......لاتوجد بيانات</div>
            <?php } ?>

        </div>


    </div>
</div>


<script language="javascript" type="text/javascript">
    function printDivFun() {
        //Get the HTML of div
        var divElements = document.getElementById('printdiv').innerHTML;
        //Get the HTML of whole page

         var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>
<script>/*
    $(document).ready(function () {
        var table = $('#example').DataTable({
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
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true
        });

        var table = $('.example').DataTable({
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
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true
        });
*/
</script>





