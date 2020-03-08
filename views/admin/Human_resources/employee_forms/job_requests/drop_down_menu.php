
&nbsp;&nbsp;



    <button type="button" class="btn btn-info">رقم الطلب : <?php echo$id; ?></button>
    <button type="button" class="btn btn-success"> الإسم : <?php  if(!empty($result['name'])){ echo$result['name']; }else{ echo'غير محدد'; } ?></button>
    <button type="button" class="btn btn-danger">إستكمال البيانات </button>
    <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_previous_work/<?php echo $id;?>">الأعمال السابقة </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_science_qualification/<?php echo $id;?>">المؤهلات العلمية</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_dawrat/<?php echo $id;?>">الدورات التدريبية</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_skills/<?php echo $id;?>">الهوايات ومهارات</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_persons/<?php echo $id;?>">المعرفون</a></li>
    </ul>
</div>