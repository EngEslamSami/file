
&nbsp;&nbsp;
<button style="margin-right: 3px;" id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
    <span class=""> رقم العضوية </span></button>
<button class="btn btn-success  btn-sm progress-button ">
    <span class=""><?php  if (isset($result->odwiat) && !empty($result->odwiat)){echo $result->odwiat->rkm_odwia;} else {echo '';}?></span></button>

<div class="btn-group">
    <button type="button" class="btn btn-danger">إستكمال البيانات </button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="<?php echo base_url(); ?> md/all_gam3ia_omomia_members/General_assembly/add_member_maindata/<?php echo $result->id; ?>">البيانات الاساسية</a></li>
     <li><a href="<?php echo base_url(); ?>Directors/General_assembly/add_membership_data/<?php echo $result->id; ?>">بيانات العضوية</a></li>
   

    </ul>
</div>