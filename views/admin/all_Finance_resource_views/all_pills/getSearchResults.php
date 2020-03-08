<div class="panel-body">
    <?php if(!empty($records) && isset($records)){?>
        <table class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr>
                <th style="text-align: center !important;">م</th>
                <th style="text-align: center !important;">رقم الإيصال</th>
                <th style="text-align: center !important;">التاريخ</th>
                <th style="text-align: center !important;">نوع الإيصال</th>
                <th style="text-align: center !important;">طريقة التوريد</th>
                <th style="text-align: center !important;">المبلغ </th>
                <th style="text-align: center !important;">الإسم </th>
                <th style="text-align: center !important;">البند </th>

                <th style="text-align: center !important;">المحصل </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

            $x=0;
            foreach($records as $row){
                $x++;

                if($row->person_type ==1){
                    $name = $row->MemberDetails['k_name'];
                }elseif ($row->person_type ==2){
                    $name = $row->MemberDetails['d_name'];
                }elseif ($row->person_type ==3){
                    $name =$row->MemberDetails['name'];
                }elseif($row->person_type == 0){
                    $name =$row->person_name;
                }
                ?>
                <tr style="text-align: center !important;">
                    <td><?=$x?></td>
                    <td><?=$row->pill_num?></td>
                    <td><?=$row->pill_date?></td>
                    <td><?=$row->pill_type_title?></td>
                    <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                    <td><?=$row->value?></td>
                    <td><?=$name?></td>
                    <td><?=$row->band_title?></td>

                    <td>
                        <span style="font-size: 12px; color: white !important; font-weight: normal;"
                      class="badge badge-add"><?php echo $row->publisher_name;  ?></span>
                    </td>




                </tr>
            <?php   } ?>
            </tbody>
        </table>
    <?php  }  else { ?>
        <div  style="color: red; font-size: large;" class="col-sm-12 alert alert-danger">لا يوجد نتائج بحث !!</div>

    <?php } ?>

</div>