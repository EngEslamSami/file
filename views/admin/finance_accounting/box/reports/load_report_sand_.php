<?php

if(isset($records) && !empty($records))
{?>
    <table id="example" class="table table-bordered" role="table" style="table-layout: fixed;">
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
        $method = array(
            1=>'نقدي',
            2=>'شيك'
        );
        if (isset($records) && $records != null) {
            $x = 1;
            foreach ($records as $value) {
                ?>
                <tr>
                    <td><?=$x++?></td>
                    <td><?=$value->rqm_sanad?></td>
                    <td><?=$value->date_sanad_ar?></td>
                    <td><?php if(isset($method[$value->pay_method]) && !empty($method[$value->pay_method])){
                            echo $method[$value->pay_method];
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


    <?php
}

?>