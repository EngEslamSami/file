<div class="col-sm-9 col-xs-12">

    <?php
    if (isset($get_tazkra) && !empty($get_tazkra)){
        $full_date_arr = $get_tazkra->date_ar;
        $full_date = explode(' ',$full_date_arr);
        $date = $full_date[0];
        $time = $full_date[1];
        $a = $full_date[2];

        ?>

        <table class="table  table-striped table-bordered dt-responsive nowrap">
            <tbody>
            <tr>
                <th style="width: 110px">رقم التذكرة</th>
                <td><?= $get_tazkra->tazkra_num?></td>

            </tr>
            <tr>
                <th>التاريخ </th>
                <td><?= $date?></td>

            </tr>
            <tr>
                <th> الوقت</th>
                <td><?= $time .' ' .$a?></td>

            </tr>
            <tr>
                <th> القسم</th>
                <td><?= $get_tazkra->qsm_n?></td>

            </tr>
            <tr>
                <th>الموضوع</th>
                <td><?= $get_tazkra->tazkra_mawdo3?></td>

            </tr>
            <tr>
                <th>نوع التذكرة</th>
                <td > <span style="background-color: <?= $get_tazkra->tazkra_no3_color?>"><?= $get_tazkra->tazkra_no3_n?></span></td>

            </tr>
            <tr>
                <th>الأولويه</th>
                <td > <span style="background-color: <?= $get_tazkra->importance_color?>"><?= $get_tazkra->importance_n?></span></td>


            </tr>
            <tr>
                <th>الحالة</th>
                <td ><span style="background-color: #fcb632"> <?php
                        echo 'جاري' ;
                        ?></span>


                </td>

            </tr>

            </tbody>
        </table>


        <?php
    }
    ?>

</div>


<div class="col-md-3">
    <div class="left-archive-aside">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">الوقت المستغرق</h5>
            </div>
            <div class="panel-body">
                <table class="table minutes-table">
                    <tbody>
                    <tr>
                        <td>09</td>
                        <td>08</td>
                        <td>07</td>
                        <td>06</td>
                        <td>05</td>
                    </tr>
                    <tr>
                        <td>ثانية</td>
                        <td>دقيقة</td>
                        <td>ساعة</td>
                        <td>يوم</td>
                        <td>شهر</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">تمت الإضافة بواسطة</h5>
            </div>
            <div class="panel-body">
                <h5>  <?= $get_tazkra->publisher_name?></h5>

                <p><?php
                    $full_date_arr = $get_tazkra->date_ar;
                    $full_date = explode(' ',$full_date_arr);
                    $date = $full_date[0];
                    $time = $full_date[1];
                    $a = $full_date[2];

                 echo  $date . ' ' .$time .' ' .$a ;
                    ?>

                </p>
                <p>IP : 192.168.1.12</p>
            </div>
        </div>


    </div>


</div>