
&nbsp;&nbsp;
<button style="margin-right: 3px;" id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
    <span class=""> رقم العضوية </span></button>
<button class="btn btn-success  btn-sm progress-button ">
    <span class=""><?php  if (isset($result->odwiat) && !empty($result->odwiat)){echo $result->odwiat->rkm_odwia_full;} else {echo '';}?></span></button>

<div class="btn-group">
    <button type="button" class="btn btn-danger">إستكمال البيانات </button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="<?php echo base_url(); ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/update_gam3ia_member/<?php echo $result->id; ?>">البيانات الاساسية</a></li>
     <li><a href="<?php echo base_url(); ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/<?php echo $result->id; ?>">بيانات العضوية</a></li>
   

    </ul>
</div>