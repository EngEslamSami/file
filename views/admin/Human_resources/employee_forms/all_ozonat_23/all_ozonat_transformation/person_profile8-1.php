




    <table class="table table-bordered s col-md-12" style="">
        <thead>
        <tr>
            <td colspan="2">

                <?php if(isset($row->person_img)&& !empty($row->person_img)){?>
                    <img id="empImg" src="<?php echo base_url();?>uploads/human_resource/emp_photo/thumbs/<?php echo $row->person_img ;?>"  alt="">
                <?php } else{  ?>
                    <img  id="empImg" src="<?php echo base_url();?>asisst/fav/apple-icon-120x120.png"  alt="">
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
                <?php if(isset($row->person_name)&& !empty($row->person_name)) echo $row->person_name ;?>
            </td>
        </tr>
        <tr class="greentd">
            <td class="text-center">الوظيفة</td>
        </tr>
        <tr>
            <td id="job-title" class="text-center">
                <?php if(isset($row->job_title_n)&& !empty($row->job_title_n)) echo $row->job_title_n ;?>
            </td>
        </tr>
        </tbody>
    </table>
