

<div class="col-xs-12 padding-4">

    <input type="hidden" id="supplier_id" value="<?=$get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;"><input type="hidden" id="sanf_id" value="<?=$get_all->id ?>">
                <strong> كود المورد </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_all->code ?></td>
            <td style="width: 135px;"><strong> اسم المورد</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_all->name ?></td>
            <td style="width: 150px;"><strong>النشاط</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_all->nashat_name ?></td>
        </tr>
        <tr>
            <td> <strong> رقم التليفون </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->tele ?></td>
            <td>  <strong>فاكس رقم </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->fax ?></td>
            <td><strong>اسم المسئول </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->resp_name ?></td>

        </tr>
        <tr>
            <td><strong>  رقم جوال المسئول </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->resp_jwal ?></td>
            <td><strong>طريقة الشراء     </strong></td>
            <td><strong>:</strong></td>
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
            <td><strong>  ارقام تواصل أخري</strong></td>
            <td><strong>:</strong></td>
            <td>
                <?php
                if (isset($tele_other) && !empty($tele_other)){
                    foreach ($tele_other as $tele){
                        echo $tele;
                        echo "<br>";

                    }
                } else{
                    echo "لا يوجد";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><strong> رقم الحساب </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->rkm_hesab ?></td>
            <td><strong> اسم الحساب</strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->hesab_name ?></td>


        </tr>
        </tbody>
    </table>


</div>
