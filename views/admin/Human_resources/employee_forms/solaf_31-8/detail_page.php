<div class="col-xs-10 padding-4">
 <?php
    if (isset($rows) && !empty($rows)) {
        $x = 1;

        foreach ($rows as $row) { ?>

                            
      



<table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>رقم الطلب: </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->t_rkm; ?></td>
            <td style="width: 135px;"><strong> تاريخ الطلب</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->t_rkm_date_m; ?></td>
            <td style="width: 150px;"><strong>اسم الموظف</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php  if(isset($row->emp_name)){echo $row->emp_name; } ?></td>
        </tr>
        <tr>
            <td><strong>الرقم الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->emp_code_fk; ?></td>
            <td><strong>المسمى الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->job_title; ?></td>
            <td><strong>الأدارة </strong></td>
            <td><strong>:</strong></td>
            <td><?= $row->edara_n;?></td>

        </tr>
        <tr>
            <td><strong>  القسم </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->qsm_n; ?></td>
            <td><strong>قيمه السلفه </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->qemt_solaf; ?></td>
            <td><strong> تاريخ بدايه الخصم</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->khsm_form_date_m; ?></td>
        </tr>
        <tr>
            <td><strong> طريقه سداد السلفه </strong></td>
            <td><strong>:</strong></td>
            <td><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تقسم مره واحده علي الراتب';}
                    elseif($row->sadad_solfa==3){echo 'تقسم شهريا علي الراتب';}
                    ?>
            
            
            </td>
            <td><strong> تاريخ اخر سلفه</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->previous_request_date_m; ?></td>
            <td><strong>سبب السلفه</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->solaf_reason; ?></td>

        </tr>
        </tbody>
    </table>
    <?php }
    } ?>



</div>

<div class="col-xs-2 padding-4">

    <?php
    if (isset($get_all->img) && !empty($get_all->img)) {
        ?>
        <img src="<?= base_url() . "uploads/st/asnaf/thumbs/" . $get_all->img ?>" width="100%" height="" alt="">
        <?php
    }
    ?>

</div>