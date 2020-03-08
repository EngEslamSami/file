<div class="col-xs-10 padding-4">

    <input type="hidden" id="mostager_id" value="<?= $get_all->id ?>">
    <table class="table " >
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم المستأجر </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->rkm ?></td>
            <td style="width: 135px;"><strong>  اسم المستأجر </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->aname ?></td>
            <td style="width: 150px;"><strong>  الجنسية  </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->gensia_n )){ echo $get_all->gensia_n ;}else{ echo 'غير محدد';}?></td>
        </tr>
        <tr>
            <td style="width: 105px;"><strong> رقم الهوية </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->national_card )){ echo $get_all->national_card ;}else{ echo 'غير محدد';}?></td>
            <td style="width: 200px;"><strong>تاريخ الهوية </strong></td>
            <td><strong>:</strong></td>
            <td><?php 
                if (!empty($get_all->national_card_date_m ) && !empty($get_all->national_card_date_h)){
                    $national_card_date_m = explode('/', $get_all->national_card_date_m)[2] . '/' . explode('/', $get_all->national_card_date_m)[0] . '/' . explode('/', $get_all->national_card_date_m)[1];
                    $national_card_date_h = explode('/', $get_all->national_card_date_h)[2] . '/' . explode('/', $get_all->national_card_date_h)[1] . '/' . explode('/', $get_all->national_card_date_h)[0];
                echo $national_card_date_m .' '.'م'.' '.'↔'.' '.$national_card_date_h .' '.'هـ' ;
                  }
                else{ echo 'غير محدد';}
                ?></td>
            <td><strong>مصدر الهوية </strong></td>
            <td><strong>:</strong></td>
            <td><?php if ( isset($masdar_national_card_n)&& !empty($masdar_national_card_n)){ echo $masdar_national_card_n ;}else{ echo 'غير محدد';}?></td>

        </tr>
        <tr>

            <td><strong> رقم الجوال </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (!empty($get_all->jwal )){ echo $get_all->jwal ;}else{ echo 'لا يوجد';}?></td>
            <td><strong>رقم جوال اخر </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (!empty($get_all->another_jwal )){ echo $get_all->another_jwal ;}else{ echo 'لا يوجد';}?></td>

            <td><strong> الوظيفة</strong></td>
            <td><strong>:</strong></td>
            <td><?php if (!empty($get_all->wazefa )){ echo $get_all->wazefa ;}else{ echo 'لا يوجد';}?></td>
        </tr>
        <tr>

            <td><strong>مقر العمل</strong></td>
            <td><strong>:</strong></td>
            <td><?php if (!empty($get_all->maqr_amal )){ echo $get_all->maqr_amal ;}else{ echo 'لا يوجد';}?></td>


        </tr>
        </tbody>
    </table>


</div>

<div class="col-xs-2 padding-4">

    <?php
    if (isset($get_all->img) && !empty($get_all->img)) {
        ?>
        <img src="<?= base_url()."uploads/aqr/thumbs/" . $get_all->img ?>" width="100%" height="" alt="">
        <?php
    }
    ?>

</div>

