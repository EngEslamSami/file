
<table class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
    <tr>
        <th>كود المورد</th>
        <td><?=$get_all->code ?></td>
    </tr>
    <tr>
        <th> كود الصنف الدولي</th>
        <td><?=$get_all->code_br ?></td>
    </tr>
    <tr>
        <th>كود الصنف</th>
        <td><?=$get_all->code_qr ?></td>
    </tr>
    <tr>
        <th> اسم الصنف</th>
        <td><?=$get_all->name ?></td>
    </tr>
    <tr>
        <th>  الفئه</th>
        <td><?=$get_all->fe2a_name ?></td>
    </tr>

    <tr>
        <th>  التصنيف</th>
        <td><?=$get_all->tasnef_name ?></td>
    </tr>
    <tr>
        <th>الوحدة الكلية</th>
        <td><?=$get_all->we7da_name ?></td>
    </tr>
    <tr>
        <th>الكبري</th>
        <td><?=$get_all->sbig ?></td>
    </tr>
    <tr>
        <th>الصغري</th>
        <td><?=$get_all->ssmall ?></td>
    </tr>
    <tr>
        <th>مواصفات الصنف</th>
        <td><?=nl2br($get_all->details) ?></td>
    </tr>

    <tr>
        <th> صورة الصنف</th>
        <td>
            <img src="<?= base_url()."uploads/st/asnaf/".$get_all->img?>" width="30%;" height="30%">
        </td>
    </tr>
    <tr>
        <th>
            تاريخ الصلاحية</th>
        <td>
            <?php
            if ($get_all->slahia==0){
                echo "لا";
            } elseif ($get_all->slahia==1){
                echo "نعم";
            }
            ?>
        </td>
    </tr>
    <tr>
        <th>سعر الصنف</th>
        <td><?=$get_all->price ?></td>
    </tr>
    </thead>

</table>
