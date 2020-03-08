<?php if ((isset($result)) && (!empty($result))) {
    $i = 1;
    foreach ($result as $value) {
        if ($value->file_status  == 1) {
            $file_status = 'نشط كليا';
            $file_colors = '#15bf00';
        } elseif ($value->file_status  == 2) {
            $file_status = 'نشط جزئيا';
            $file_colors = '#00d9d9';
        } elseif ($value->file_status  == 3) {
            $file_status = 'موقوف مؤقتا';
            $file_colors = '#ffff00';
        } elseif ($value->file_status  == 4) {
            $file_status = 'موقوف نهائيا';
            $file_colors = '#ff0000';
        } elseif ($value->file_status  == 0) {
            $file_status = 'جـــــــــاري';
            $file_colors = '#62d0f1';
        }
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $value->file_num ?></td>
            <td><?= $value->father_name ?></td>
            <td><?= $value->f_national_id ?></td>
            <td><?= $value->mother_name ?></td>
            <td><?= $value->mother_national_num ?></td>
            <td><?=$value->w_name ?></td>
            <td><?= $value->w_national_id?></td>
            <td><?= $value->contact_mob ?></td>
            <td><button style="color:#fff ;width:80px; background-color: <?= $file_colors ?> " class="btn btn-sm" >
                   <?=$file_status ?></button></td>
            <td><?= $value->family_cat_name ?></td>
        </tr>
        <?php
        $i++;
    }

} ?>


<?php if ((isset($record)) && (!empty($record))) {
    $i = 1;
    foreach ($record as $value) {
        if(!empty($value->basic))
        {
    if(isset($value->basic[0]->file_status)) 
    {
        if ($value->basic[0]->file_status  == 1) {
            $file_status = 'نشط كليا';
            $file_colors = '#15bf00';
        } elseif ($value->basic[0]->file_status == 2) {
            $file_status = 'نشط جزئيا';
            $file_colors = '#00d9d9';
        } elseif ($value->basic[0]->file_status == 3) {
            $file_status = 'موقوف مؤقتا';
            $file_colors = '#ffff00';
        } elseif ($value->basic[0]->file_status == 4) {
            $file_status = 'موقوف نهائيا';
            $file_colors = '#ff0000';
        } elseif ($value->basic[0]->file_status== 0) {
            $file_status = 'جـــــــــاري';
            $file_colors = '#62d0f1';
        }
    }
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?php if(isset($value->basic[0]->file_num)) echo$value->basic[0]->file_num; ?></td>
            <td><?php if(isset($value->basic[0]->father_name )) echo $value->basic[0]->father_name; ?></td>
            <td><?php if(isset($value->basic[0]->f_national_id))echo $value->basic[0]->f_national_id; ?></td>
            <td><?php if(isset($value->basic[0]->mother_name))echo $value->basic[0]->mother_name; ?></td>
            <td><?php if(isset($value->basic[0]->mother_national_num))echo $value->basic[0]->mother_national_num; ?></td>
            <td><?php if(isset($value->basic[0]->w_name))echo $value->basic[0]->w_name; ?></td>
            <td><?php if(isset($value->basic[0]->w_national_id))echo $value->basic[0]->w_national_id;?></td>
            <td><?php if(isset($value->basic[0]->contact_mob))echo $value->basic[0]->contact_mob; ?></td>
            <td><button style="color:#fff ;width:80px; background-color: <?= $file_colors ?> " class="btn btn-sm" >
                   <?=  $file_status ?></button></td>
            <td><?php if(isset( $value->basic[0]->family_cat_name))echo  $value->basic[0]->family_cat_name; ?></td>
            <td><?php if(isset( $value->value))echo $value->value; ?></td>
        </tr>
        <?php
        $i++;
    }
}

} ?>
