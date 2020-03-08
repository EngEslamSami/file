<?php
if($row->no3_ezn==1)
{
    $ezn="استئذان شخصي";
}else if($row->no3_ezn==2){
    $ezn="استئذان للعمل";
}else{
    $ezn="غير محدد";
} ?>
<div class="col-md-9">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="3" class="info">نوع الاستئذان:<?=$ezn ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>الموظف:-<?php echo $row->emp  ;?></td>
            <td>الاداره :<?php echo $row->adminstration  ;?></td>
            <td>القسم:<?php echo $row->departs  ;?></td>

        </tr>
        <tr>
            <td>تاريخ الاذن:- <?php echo date("d-m-Y",$row->ezn_date)   ;?></td>
            <td>الفتره:- <?php  echo  $row->fatra_n  ;?> </td>
            <td>  وقت البدايه:- <?php echo $row->from_hour  ;?></td>


        </tr>
        <td> وقت النهايه:- <?php echo $row->from_hour  ;?> </td>
        <td>    المده:-<?php echo $row->total_hours  ;?></td>
        </tr>
        <tr>
            <td colspan="3">السبب:-<?php echo $row->reason;?></td>
        </tr>

        </tbody>

    </table>
</div>


    <div class="col-md-3">

        <?php if(isset($row->personal_emp_img)&& !empty($row->personal_emp_img)){?>
            <img id="empImg" src="<?php echo base_url();?>uploads/human_resource/emp_photo/thumbs/<?php echo $row->personal_emp_img ;?>" width="100" height="150" alt="">
        <?php } else{  ?>
            <img  id="empImg" src="<?php echo base_url();?>asisst/fav/apple-icon-120x120.png" width="100" height="150" alt="">
        <?php } ?>

    </div>

<?php
if(isset($records)&& !empty($records)){
    foreach ($records as $row){?>
        <div class="col-md-9">
        <label><?php echo $row->talab_in_title;?> </label>
        <table class="table table-bordered " border="1"  cellpadding="3" cellspacing="0"  style="width:100%">
            <tbody>

            <tr>
                <td >إسم الموظف/<?php echo $row->from_user_name;?></td>
                <td>التوقيع/</td>
                <td>التاريخ/<?php echo $row->date_ar;?></td>
            </tr>
            <tr>
                <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                    <div class="radio-content">
                        <input type="radio"  id="tahod-1" data-validation="required"
                               name="" value="1" checked>
                        <label class="radio-label"  for="tahod-1">
                            <?php echo $row->talab_msg;?>

                        </label>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        <div class="col-md-3">

            <?php if(isset($row->personal_emp_img)&& !empty($row->personal_emp_img)){?>
                <img id="empImg" src="<?php echo base_url();?>uploads/human_resource/emp_photo/thumbs/<?php echo $row->personal_emp_img ;?>" width="100" height="150" alt="">
            <?php } else{  ?>
                <img  id="empImg" src="<?php echo base_url();?>asisst/fav/apple-icon-120x120.png" width="100" height="150" alt="">
            <?php } ?>

        </div>

<?php } } ?>
