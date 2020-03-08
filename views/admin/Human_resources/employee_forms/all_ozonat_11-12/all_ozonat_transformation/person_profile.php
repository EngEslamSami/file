




    <table class="table table-bordered s col-md-12" style="">
        <thead>
        <tr>
            <td colspan="2">

                <?php if(isset($row->personal_photo)&& !empty($row->personal_photo)){?>
                    <img id="empImg" src="<?php echo base_url();?>uploads/images/<?php echo $row->personal_photo ;?>" width="100" height="150" alt="">
                <?php } else{  ?>
                    <img  id="empImg" src="<?php echo base_url();?>asisst/fav/apple-icon-120x120.png" width="100" height="150" alt="">
                <?php } ?>
            </td>

        </tr>
        </thead>
        <tbody>
        <tr class="greentd">
            <td class="text-center">الإسم</td>
        </tr>

        <tr>
            <td id="name-emp" class="text-center">
                <?php if(isset($row->employee)&& !empty($row->employee)) echo $row->employee ;?>
            </td>
        </tr>
        <tr class="greentd">
            <td class="text-center">الوظيفة</td>
        </tr>
        <tr>
            <td id="job-title" class="text-center">
                <?php if(isset($row->job_name)&& !empty($row->job_name)) echo $row->job_name ;?>
            </td>
        </tr>
        </tbody>
    </table>

