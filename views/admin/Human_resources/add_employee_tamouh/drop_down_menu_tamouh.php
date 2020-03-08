
&nbsp;&nbsp;
<button style="margin-right: 3px;" id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
      <span class=""> الرقم الوظيفى </span></button>
<button class="btn btn-success  btn-sm progress-button ">
     <span class=""><?php  echo  $emp_code ?></span></button>

<div class="btn-group">
    <button type="button" class="btn btn-danger">إستكمال البيانات </button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
     <li><a href="<?php echo base_url(); ?>human_resources/tamouh_emp/Tamouh/edit_emp/<?php echo $emp_code; ?>">البيانات
                الاساسية </a></li>
        <li><a href="<?php echo base_url(); ?>human_resources/tamouh_emp/Tamouh/add_job_data/<?php echo $id; ?>">البيانات
                الوظيفيه </a></li>
                
        <li><a href="<?php echo base_url(); ?>human_resources/human_resources/financeEmployee/<?php echo $id; ?>">البيانات
                المالية </a></li>
        <li><a href="<?php echo base_url(); ?>human_resources/human_resources/contractEmployee/<?php echo $id; ?>">بيانات
                التعاقد </a></li>
        <li><a href="<?php echo base_url(); ?>human_resources/human_resources/printer_machin_Employee/<?php echo $id; ?>">بيانات
                الدوام </a></li>
        <li><a href="<?php echo base_url(); ?>human_resources/human_resources/employee_files/<?php echo $id; ?>">
                المستندات والبطاقات والمهارات </a></li>
        <li><a href="<?php echo base_url(); ?>human_resources/human_resources/custody/<?php echo $id; ?>">
                شاشة العهد </a></li>
    </ul>
</div>