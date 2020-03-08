<div class="col-xs-9 padding-4">

    <input type="hidden" id="sanf_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;"><input type="hidden" id="sanf_id" value="<?= $get_all->id ?>">
                <strong>  المسمي الوظيفي </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->job_title_n ?></td>
            <td style="width: 135px;"><strong>الكود</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->person_code ?></td>
            <td style="width: 150px;"><strong> الاسم </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->person_name ?></td>
        </tr>
        <tr>
            <td><strong> الاسم المختصر </strong></td>
            <td><strong>:</strong></td>
            <td><?= $get_all->person_private_name ?></td>
            <td><strong>  الادارة </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if (!empty($get_all->person_edara)){
                    echo $get_all->person_edara;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td><strong>  القسم </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if (!empty($get_all->person_qsm)){
                    echo $get_all->person_qsm;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>

            <td><strong>  من تاريخ </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if (!empty($get_all->from_date)){
                    echo $get_all->from_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td><strong>  الي تاريخ </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if (!empty($get_all->to_date)){
                    echo $get_all->to_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td><strong>الحالة </strong></td>
            <td><strong>:</strong></td>
            <td>
                <?php

                if ($get_all->person_suspend == 1) {
                    echo "نشط";
                    ?>

                    <?php
                } elseif ($get_all->person_suspend == 2) {
                    echo "غير نشط";
                    ?>

                    <?php
                }
                ?>
            </td>

        </tr>

        <tr>

            <?php
            if ($get_all->person_img !=null){
                ?>
                <td><strong>صورة التوقيع </strong></td>
                <td><strong>:</strong></td>
                <td>
                    <img src="<?= base_url()."uploads/human_resources/egraat_settings/".$get_all->person_img ?>" width="100%"  alt="">


                </td>
            <?php
            }
            ?>


        </tr>


        </tbody>
    </table>


</div>

<div class="col-xs-3 padding-4">

    <?php
    if (isset($get_all->emp_img) && !empty($get_all->emp_img)){
        if ($get_all->person_type==1){
            ?>
            <img src="<?= base_url()."uploads/human_resources/emp_photo/".$get_all->emp_img ?>" width="100%"  alt="">

            <?php
        } elseif ($get_all->person_type==3){
            ?>
            <img src="<?= base_url()."uploads/md/gam3ia_omomia_members/".$get_all->emp_img ?>" width="100%" height="100%" alt="">

            <?php
        }
        ?>

        <?php
    }
    ?>
</div>
