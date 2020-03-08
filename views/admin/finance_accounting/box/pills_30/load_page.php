<div class="panel-body">


    <?php
    $x=0;
    $all_value=0;
    foreach($all_pills_inbox as $row){

    $all_value=$all_value+$row->value;

        $x++;   }
    ?>


<div class="col-xs-12">
    <div class="col-xs-6 text-center">
        <h5 style="padding: 10px; border: 2px solid #437500;"> عدد الإيصالات : <span><?= $x?></span>	</h5>

    </div>
    <div class="col-xs-6 text-center">
        <h5 style="padding: 10px; border: 2px solid #750000;"> المجموع :  <span><?= $all_value?></span></h5>

    </div>


</div>

    <?php
    $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

    if(!empty($all_pills_inbox)){?>
        <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
            <thead>
            <tr class="info">
                <th style="text-align: center !important;">م</th>
                <th style="text-align: center !important;">رقم الإيصال</th>
                <th style="text-align: center !important;">تاريخ الايصال</th>
                <th style="text-align: center !important;">المحصل</th>
                <th style="text-align: center !important;">البند </th>
                <th style="text-align: center !important;">نوع الإيصال</th>
                <th style="text-align: center !important;">طريقة التوريد</th>
                <th style="text-align: center !important;">المبلغ </th>



            </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            $all_value=0;
            foreach($all_pills_inbox as $row){

                $all_value=$all_value+$row->value;

                if($row->person_type == 1){
                    if($row->person_type ==1){
                        $name = $row->MemberDetails['k_name'];
                    }elseif ($row->person_type ==2){
                        $name = $row->MemberDetails['d_name'];
                    }elseif ($row->person_type ==3){
                        $name =$row->MemberDetails['name'];
                    }

                }elseif($row->person_type == 0){
                    $name =$row->person_name;
                }
                ?>
                <tr>
                    <td><?=$x+1?></td>
                    <td><?=$row->pill_num?></td>
                    <td><?=$row->pill_date?></td>
                    <td><?=$row->publisher_name?></td>
                    <td><?=$row->band_title?></td>
                    <td><?=$row->pill_type_title?></td>
                    <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                    <td><?=$row->value?></td>




                </tr>

                <?php  $x++;   } ?>
            </tbody>
        </table>
    <?php  }  else { ?>
        <div style="color: red; font-size: large;" class="col-sm-12">لم يتم  إضافة إيصالات !!</div>

    <?php } ?>





</div>
