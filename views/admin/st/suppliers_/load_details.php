<!--<h5>تفاصيل الصنف</h5> -->
<table class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
    <tr>
        <th>كود الصنف</th>
        <td><?=$get_all->code ?></td>
    </tr>
    <tr>
        <th>   اسم المورد</th>
        <td><?=$get_all->name ?></td>
    </tr>
    <tr>
        <th> النشاط</th>
        <td><?=$get_all->nashat_name ?></td>
    </tr>
    <tr>
        <th>
            رقم التيليفون</th>
        <td><?=$get_all->tele ?></td>
    </tr>
    <tr>
        <th> فاكس رقم</th>
        <td><?=$get_all->fax ?></td>
    </tr>

    <tr>
        <th>  اسم المسؤل</th>
        <td><?=$get_all->resp_name ?></td>
    </tr>
    <tr>
        <th>
            رقم جوال المسؤل</th>
        <td><?=$get_all->resp_jwal ?></td>
    </tr>
    <tr>
        <th>طريقة الشراء</th>
        <td>
            <?php
            if($get_all->method_shera==0){
           echo "نقدي";
            } elseif ($get_all->method_shera==1){
           echo "آجل";
            } elseif ($get_all->method_shera==2){
           echo "الكل";
            } else{
           echo'لا يوجد';
            }
            ?>
        </td>
    </tr>
    <tr>
        <th >
            ارقام تواصل أخري</th>
        <td>
        <?php
            if (isset($tele_other) && !empty($tele_other)){
                foreach ($tele_other as $tele){
                   echo $tele;
                   echo "<br>";

                }
            }
            ?>
        </td>
    </tr>

    <tr>
        <th>   رقم الحساب</th>
        <td><?=$get_all->rkm_hesab ?></td>
    </tr>
    <tr>
        <th>  اسم الحساب</th>
        <td><?=$get_all->hesab_name ?></td>
    </tr>

    </thead>

</table>
