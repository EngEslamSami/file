
<div class="btn-group">
<button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>
<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $mother_num;?>">بيانات الأب  </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/mother/<?php echo $mother_num;?>">بيانات الأم  </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/family_members/<?php echo $mother_num;?>/<?php  echo $person_account;?>/<?php   echo $agent_bank_account;?>">بيانات أفراد الأسرة</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/house/<?php echo $mother_num;?>">بيانات السكن</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/devices/<?php echo $mother_num;?>">محتويات السكن </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/home_needs/<?php echo $mother_num;?>"> إحتياجات الأسرة </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/money/<?php echo $mother_num;?>">مصادر الدخل والإلتزامات </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/add_responsible_account/<?php echo $mother_num;?>"> بيانات الحساب البنكي</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/attach_files/<?php echo $mother_num;?>">رفع الوثائق  </a></li>



</ul>
</div>

<!--
<div class="btn-group">
<button type="button" class="btn btn-sm  btn-add"> خطابات الأسرة </button>
<button type="button" class="btn btn-sm btn-add dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/mother_letter/<?php echo $mother_num?>">خطاب تأمينات الام  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/father_letter/<?php echo $mother_num?>">خطاب تأمينات ألاب  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/f_member_letter/<?php echo $mother_num?>">خطاب للأم او لأحد ابنائها  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/fatherRetirement/<?php echo $mother_num?>">خطاب التقاعد للأب</a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/civillStatus/<?php echo $mother_num?>">خطاب الاحوال المدنية</a></li>


</ul>
</div>
-->


<div class="btn-group">
    <button type="button" class="btn btn-success">خطابات</button>
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الاحوال المدنيه </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب التأمينات  </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب التقاعد  </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب الضمان</a></li>




    </ul>
</div>