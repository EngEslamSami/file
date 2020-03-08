



<input type="hidden" id="order_id" value="<?=$result->id ?>">



<table class="table table-bordered" style="table-layout: fixed">
    <tbody>
    <tr>
        <td style="width: 120px " class="green-bg">رقم الطلب</td>
        <td style="width: 120px "><?php echo $result->id ;?></span></td>
        <td style="width: 120px " class="green-bg">نوع الانتداب</td>
        <td><?php if ($result->mandate_type_fk == 1){
                echo "انتداب عمل1";
            } elseif ($result->mandate_type_fk ==2){
                echo "انتداب عمل 2";
            }?></td>
        <td style="width: 80px " class="green-bg">التاريخ</td>
        <td><?php echo $result->date ;?></td>
    </tr>
    </tbody>
</table>






<div class="piece-box">

    <div class="piece-heading">
        <h6>&nbsp بيانات الموظف</h6>
    </div>
    <div class="piece-body" style="padding-bottom: 0">


        <table class="table table-bordered" style="table-layout: fixed">
            <tbody>
            <tr>
                <td style="width: 120px " class="green-bg">اسم الموظف</td>
                <td><?php echo $result->emp_name ;?></td>
                <td style="width: 120px " class="green-bg">الرقم الوظيفي</td>
                <td style="width: 120px "><?php echo $result->emp_code ;?></td>
                <td style="width: 120px " class="green-bg">المسمى الوظيفي</td>
                <td><?php echo $result->job_title ;?></td>
            </tr>
            </tbody>
        </table>


        <table class="table table-bordered" style="table-layout: fixed;">
            <tbody>
            <tr>
                <td style="width: 90px " class="green-bg">الإدارة</td>
                <td><?php echo $result->edara_name ;?></td>
                <td style="width: 90px " class="green-bg">القسم</td>
                <td><?php echo $result->qsm_name ;?></td>

            </tr>
            </tbody>
        </table>

    </div>
</div>



<div class="piece-box">
    <div class="piece-heading">
        <h6>&nbsp بيانات الإنتداب</h6>
    </div>
    <div class="piece-body" style="padding-bottom: 0">

        <table class="table table-bordered" style="table-layout: fixed">
            <tbody>
            <tr>
                <td style="width: 120px " class="green-bg">جهه الانتداب</td>
                <td><?php echo $result->mandate_direction ;?></td>
                <td style="width: 120px " class="green-bg">المسافه</td>
                <td style="width: 120px "><?php echo $result->mandate_distance ;?></td>

            </tr>
            </tbody>
        </table>

        <table class="table table-bordered" style="table-layout: fixed">
            <tbody>
            <tr>
                <td style="width: 150px " class="green-bg">الغرض من الإنتداب</td>
                <td><?php echo $result->mandate_purpose ;?></td>

            </tr>
            </tbody>
        </table>


        <table class="table table-bordered" style="table-layout: fixed">
            <tbody>
            <tr>
                <td style="width: 180px " class="green-bg">فترة الإنتداب من تاريخ</td>
                <td><?php echo $result->from_date ;?></td>
                <td style="width: 180px " class="green-bg">فترة الإنتداب الي تاريخ </td>
                <td style=""><?php echo $result->to_date ;?></td>
                <td style="width: 180px " class="green-bg">مدة الإنتداب بالأيام</td>
                <td><?php echo $result->num_days ;?></td>
            </tr>
            </tbody>
        </table>






    <?php
    $arr_badl=array(1=>'بدل1',2=>'بدل2');

    ?>


        <table class="table table-bordered" style="table-layout: fixed">
            <tbody>
            <tr>
                <td style="width: 120px " class="green-bg">بدل الإنتداب</td>
                <td>  <?php

                    foreach($arr_badl as $key=>$value){
                        if(!empty($result->bdal_count_method == $key.'-'.$key*100)){
                            echo $value;
                        }
                        ?>

                        <?php
                    }
                    ?></td>
                <td style="width: 120px " class="green-bg">قيمه البدل </td>
                <td style=""><?php echo $result->bdal_value ;?></td>
                <td style="width: 80px " class="green-bg">إجمالي</td>
                <td><?php echo $result->bdal_total ;?></td>
            </tr>
            </tbody>
        </table>




    </div>
</div>