
<style type="text/css">

    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {

        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59 !important;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 2px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 70px;
        width: 80px;
        margin: auto;
    }
    .main-title {
        /* display: table; */
        text-align: center;
        /* position: relative; */
        height: 120px;
        /* width: 40%; */
    }
    .main-title h4 {
        /* display: table-cell; */
        /* vertical-align: bottom; */
        text-align: center;
        width: 100%;
        margin: 0
    }

    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border{
        border:0 !important;
    }

    .gray_background{
        background-color: #eee;

    }
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
    }
    @page {
        size: landscape;
        margin: 80px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #000000 !important;
        text-align: center;
        vertical-align: middle;
        font-size: 11px !important;
        padding: 2px;
    }

    .flip-mode{
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
</style>





<div class="col-sm-12 no-padding">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;  ?></h3>
        </div>

        <div class="panel-body">
            <?php
            if (isset($all_emp) && !empty($all_emp)){
                $x=1;
                $total_main_salry = 0;
                $badl_value = 0;

                ?>


            <table class="table table-bordered table-striped" style="table-layout: fixed">

                <thead>
                <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 120px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th colspan="11" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="7" >الحسومات	</th>
                    <th rowspan="3" ><span class="flip-mode">الحسومات إجمالي </span></th>
                    <th rowspan="3" ><span class="flip-mode">المرتب صافى </span></th>
                    <th rowspan="3" >ملاحظات</th>


                </tr>
                <tr>
                    <th rowspan="2" ><span class="flip-mode">الراتب الأساسي  </span></th>
                    <th colspan="8" >البدلات والمكافآت	</th>
                    <th colspan="2">الإضافي	</th>
                    <th rowspan="2">أخرى </th>
                    <th colspan="2">الغياب-إجازة بدون راتب 	</th>
                    <th colspan="2">التأخير	</th>
                    <th colspan="2">التأمينات	</th>
                 <!--   <th rowspan="2">أخرى </th> -->

                </tr>
                <tr>
                    <?php
                    if (isset($all_bdlat) && !empty($all_bdlat)){

                      //  $total_main_salry = 0;
                        foreach ($all_bdlat as $bdlat){
                            ?>
                            <th> <span class=""><?= $bdlat->title?></span></th>
                    <?php
                        }
                    }

                    ?>
                  <!--  <th>بدل سكن </th>
                    <th>بدل  نقل</th>
                    <th>بدل طبيعة عمل</th>
                    <th>بدل تكليف</th>
                    <th>بدل انتداب</th>
                    <th>بدل معيشة</th>
                    -->
                    <th>مكافآت</th>
                    <th>عدد ساعات</th>
                    <th>إجمالي</th>
                    <th>عدد الأيام</th>
                    <th>إجمالي</th>
                    <th>عدد الدقائق</th>
                    <th>إجمالي</th>
                    <th>حصة الموظف</th>
                    <th>القيمة</th>
                </thead>
                <tbody>
                <?php
                foreach ($all_emp as $row){
                    if (isset( $row->main_salary->value) && !empty( $row->main_salary->value)){
                        $main_salry=  $row->main_salary->value;
                    } else{$main_salry =  0;}
                    $total_main_salry += $main_salry;

                    ?>
                    <tr>
                        <td><?= $x++;?> </td>
                        <td><?= $row->employee?></td>
                        <td><?= $row->degree_name?></td>
                        <td ><?php
                           echo $main_salry;
                           ?></td>
                        <?php
                       foreach ($row->badlat as $bdl){
                           $badl_value += $bdl->value;

                           ?>
                           <td><?= $bdl->value ?></td>

                        <?php
                       }
                        ?>

                        <td>1 </td>

                        <td><?= $row->overtime_hours ?> </td>
                        <td><?= $row->overtime_total?> </td>
                       <!-- <td>1 </td> -->

                        <!--  إجمالي الأستحقاقات -->
                        <td><?php
                            if (isset($row->badlat) && !empty($row->badlat)){
                                $total_salary = $row->badlat[0]->total + $main_salry + $row->overtime_total;

                              echo  $total_salary ;
                            }

                              ?> </td>

                        <td>1 </td>
                        <td>1 </td>
                        <td>1 </td>
                        <td>1 </td>
                        <td>1 </td>

                        <td>1 </td>

                        <td><?php if (!empty($row->ta2men)) {
                            $ta2men = $row->ta2men;
                            } else{
                            $ta2men = 0;
                            } echo  $ta2men;?> </td>
                        <td>1 </td>
                        <td><?php echo $total_salary - $ta2men ;?> </td>
                        <td>1 </td>
                    </tr>
                <?php
                }
                ?>
               <!-- <tr>
                    <td>16 </td>
                    <td></td>
                    <td>عامل عادي</td>
                    <td>1000</td>
                    <td>1200 </td>

                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>

                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>

                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>

                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                    <td>1 </td>
                </tr> -->


                </tbody>
                <tfoot class="open_green">
                <tr>
                    <th colspan="3">الإجمالى</th>
                    <th><?= $total_main_salry?></th>
                    <?php

                  foreach ($row->badlat as $bdl){
                       $badl_value += $bdl->value;
                        ?>
                        <th><?php echo $badl_value;?></th>
                        <?php
                   }
                    ?>
                  <!--  <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>  -->


                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                    <th>40</th>
                </tr>
                </tfoot>
            </table>

                <?php
            }
            ?>


        </div>
    </div>

</div>