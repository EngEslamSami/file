
    <div class="col-md-12">
        <?php if(isset($row->personal_photo)&& !empty($row->personal_photo)){?>
            <img src="<?php echo base_url();?>uploads/images/<?php echo $row->personal_photo ;?>" width="100" height="150" alt="">
        <?php } else{  ?>
            <img src="<?php echo base_url();?>asisst/fav/apple-icon-120x120.png" width="100" height="150" alt="">
        <?php } ?>
    </div>
    <div class="col-md-12">

        <h4>الاسم</h4>
        <h4>
            <?php if(isset($row->employee)&& !empty($row->employee)) echo $row->employee ;?>
        </h4>

    </div>
    <div class="col-md-12">
        <h4>الوظيفه</h4>
        <?php if(isset($row->job_name)&& !empty($row->job_name)) echo $row->job_name ;?>

    </div>

