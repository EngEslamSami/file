<?php if((isset($sheeks)) &&(!empty($sheeks))) {
    ?>
    <table class="table table-bordered table-striped" >

        <thead>
        <tr class="greentd">
            <th>#</th>
            <th> رقم الشيك </th>
            <th> المبلغ </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sheeks as $sheek) {
            if(empty($sheek->value)){
                $value=0;
            }else{
                $value=$sheek->value;
            }
            ?>
        <tr>
            <td><input type="radio" name="radio_sheeks" ondblclick="set_sheeks(<?=$id?>,'<?=$sheek->sheek_date_ar?>',<?=$sheek->bank_id_fk?>,<?=$value?>,<?=$sheek->sheek_num?>,<?=$sheek->id?>,<?=$sheek->rkm_esal?>)"></td>
            <td> <?php echo $sheek->sheek_num?> </td>
            <td> <?php echo $value ?> </td>


        </tr>
        <?php
        }?>
        </tbody>
    </table>

    <?php
}  ?>