



<input type="hidden" id="order_id" value="<?=$result->id ?>">
<table class="table">
    <tbody>
    <tr>
        <td style="width: 105px;">
            <strong>   رقم الطلب </strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (isset($result->id)){ echo $result->id ;} ?></td>
        <td style="width: 135px;"><strong>   نوع الانتداب</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if ($result->mandate_type_fk == 1){
                echo "انتداب عمل1";
            } elseif ($result->mandate_type_fk ==2){
                echo "انتداب عمل 2";
            }?></td>
        <td style="width: 150px;"><strong> التاريخ </strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (isset($result->date)){ echo $result->date ;}?></td>
    </tr>

    </tbody>
</table>


<div class="">

    <div class="piece-heading">
        <h6>&nbsp بيانات الموظف</h6>
    </div>
    <div class="piece-body" style="padding-bottom: 0">
        <table class="table">
            <tbody>
            <tr>
                <td style="width: 105px;">
                    <strong>  إسم الموظف </strong>
                </td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($result->emp_name)){ echo $result->emp_name ;} ?></td>
                <td style="width: 135px;"><strong>  الرقم الوظيفي</strong></td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($result->emp_code)){ echo $result->emp_code ;} ?></td>
                <td style="width: 150px;"><strong>المسمى الوظيفي </strong></td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($result->job_title)){ echo $result->job_title ;}?></td>
            </tr>
            <tr>
                <td> <strong>  الإدارة </strong></td>
                <td><strong>:</strong></td>
                <td><?php if (isset($result->edara_name)){ echo $result->edara_name ;}?></td>
                <td>  <strong> القسم </strong></td>
                <td><strong>:</strong></td>
                <td><?php if (isset($result->qsm_name)){ echo $result->qsm_name ;}?></td>

            </tr>

            </tbody>
        </table>



    </div>
</div>



<div class="">
    <div class="piece-heading">
        <h6>&nbsp بيانات الإنتداب</h6>
    </div>
    <div class="piece-body" style="padding-bottom: 0">
        <table class="table">
            <tbody>
            <tr>
                <td style="width: 105px;">
                    <strong>   جهه الانتداب </strong>
                </td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($result->mandate_direction)){ echo $result->mandate_direction ;} ?></td>
                <td style="width: 135px;"><strong>   المسافه</strong></td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($result->mandate_distance)){ echo $result->mandate_distance ;} ?></td>
                <td style="width: 150px;"><strong> الغرض من الإنتداب </strong></td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($result->mandate_purpose)){ echo $result->mandate_purpose ;}?></td>
            </tr>
            <tr>
                <td> <strong>  فترة الإنتداب من تاريخ </strong></td>
                <td><strong>:</strong></td>
                <td><?php if (isset($result->from_date)){ echo $result->from_date ;}?></td>
                <td>  <strong> فترة الإنتداب الي تاريخ  </strong></td>
                <td><strong>:</strong></td>
                <td><?php if (isset($result->to_date)){ echo $result->to_date ;}?></td>
                <td> <strong>  مدة الإنتداب بالأيام </strong></td>
                <td><strong>:</strong></td>
                <td><?php if (isset($result->num_days)){ echo $result->num_days ;}?></td>

            </tr>
            <tr>
                <td>  <strong>   بدل الإنتداب   </strong></td>
                <td><strong>:</strong></td>
                <td>
                    <?php
                    $arr_badl=array(1=>'بدل1',2=>'بدل2');
                    foreach($arr_badl as $key=>$value) {
                        if (!empty($result->bdal_count_method == $key . '-' . $key * 100)) {
                            echo $value;
                        }
                    }

                    ?>
                </td>
                <td> <strong>    قيمه البدل  </strong></td>
                <td><strong>:</strong></td>
                <td><?php if (isset($result->bdal_value)){ echo $result->bdal_value ;}?></td>

                <td> <strong>    إجمالي </strong></td>
                <td><strong>:</strong></td>
                <td><?php if (isset($result->bdal_total)){ echo $result->bdal_total ;}?></td>


            </tr>

            </tbody>
        </table>

    </div>
</div>