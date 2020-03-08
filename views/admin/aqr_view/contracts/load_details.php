<div class="col-xs-12 padding-4">

    <input type="hidden" id="contract_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم العقد </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->contract_rkm)&& !empty($get_all->contract_rkm)){echo  $get_all->contract_rkm;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 135px;"><strong> العقار</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->aqr_n)&& !empty($get_all->aqr_n)){echo  $get_all->aqr_n;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong> نوع الوحدة </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->whda_type_n)&& !empty($get_all->whda_type_n)){echo  $get_all->whda_type_n;}else{echo 'غير محدد';}  ?></td>

        </tr>
        <tr>
            <td><strong>  قيمة الايجار </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->egar_value)&& !empty($get_all->egar_value)){echo  $get_all->egar_value . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong> بداية الايجار</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->egar_start_date_m ) && !empty($get_all->egar_start_date_h)){
                    $egar_start_date_m = explode('/', $get_all->egar_start_date_m)[2] . '/' . explode('/', $get_all->egar_start_date_m)[0] . '/' . explode('/', $get_all->egar_start_date_m)[1];
                    $egar_start_date_h= explode('/', $get_all->egar_start_date_h)[2] . '/' . explode('/', $get_all->egar_start_date_h)[1] . '/' . explode('/', $get_all->egar_start_date_h)[0];
                echo $egar_start_date_m .' '.'م'.' '.'↔'.' '.$egar_start_date_h .' '.'هـ' ;
                  }
                else{ echo 'غير محدد';}
                ?>
            </td>
            <td style="width: 150px;"><strong>  نهاية الايجار</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->egar_end_date_m ) && !empty($get_all->egar_end_date_h)){
                    $egar_end_date_m = explode('/', $get_all->egar_end_date_m)[2] . '/' . explode('/', $get_all->egar_end_date_m)[0] . '/' . explode('/', $get_all->egar_end_date_m)[1];
                    $egar_end_date_h= explode('/', $get_all->egar_end_date_h)[2] . '/' . explode('/', $get_all->egar_end_date_h)[1] . '/' . explode('/', $get_all->egar_end_date_h)[0];
                    echo $egar_end_date_m .' '.'م'.' '.'↔'.' '.$egar_end_date_h .' '.'هـ' ;
                }
                else{ echo 'غير محدد';}
                ?>
            </td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>   المدة </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->period)&& !empty($get_all->period)){echo  $get_all->period . ' ' .'شهر';;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 135px;"><strong>  عدد الأقساط</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->aqsat_num)&& !empty($get_all->aqsat_num)){echo  $get_all->aqsat_num;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong>
                    قيمة القسط </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->qst_value)&& !empty($get_all->qst_value)){echo  $get_all->qst_value . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>   اسم المستأجر </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->mostager_name)&& !empty($get_all->mostager_name)){echo  $get_all->mostager_name;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 135px;"><strong>  رقم المستأجر</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->mostager_rkm)&& !empty($get_all->mostager_rkm)){echo  $get_all->mostager_rkm;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong>
                    التأمين </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->tamen)&& !empty($get_all->tamen)){echo  $get_all->tamen . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>
                    التذكير قبل </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->tzker)&& !empty($get_all->tzker)){echo  $get_all->tzker . ' ' .'شهر';}else{echo 'غير محدد';}  ?></td>

        </tr>


        </tbody>
    </table>


</div>



