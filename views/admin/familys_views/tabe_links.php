<style>
.tabs-a{
    color: #000;
    margin-left: 0px;
    line-height: 0;
    border: 1px solid #5a8a12;
    border-radius: 4px 4px 0 0;
    padding: 0px 7px;
    margin-bottom: 5px;
    background-color: #fff;
    /* margin-bottom: 9px; */
}
.tabs-a.active {
    color: #fff;
    background-color: #428bca;

}
.main-details-tabs {
    margin-bottom: 6px;
}
</style>
<h4 class="main-tilte"><?php if(isset($header_title)&& $header_title!=null){echo $header_title;}?></h4> <!-- active -->
<div class="tabs main-details-tabs">
<a href="<?php echo  base_url()."family_controllers/Family/basic" ?>" class="tabs-a basic-info <?php if(isset($basic_active)&& $basic_active!=null){echo "active";}?>">البيانات الأساسية</a>
<a href="<?php if($all_links['father'] != false ){echo  base_url()."family_controllers/Family/father";}else {echo "#";} ?>" class="tabs-a father-info <?php if(isset($father_active)&& $father_active!=null){echo "active" ;}?>">بيانات الأب</a>
<a href="<?php if($all_links['mother'] != false ){echo  base_url()."family_controllers/Family/mother";}else {echo "#";} ?>" class="tabs-a wommen-info <?php if(isset($mother_active)&& $mother_active!=null){echo "active";}?>">البيانات الزوجة</a>
<a href="<?php if($all_links['f_members'] != false ){echo  base_url()."family_controllers/Family/family_members";}else {echo "#";} ?>" class="tabs-a family-info <?php if(isset($members_active)&& $members_active!=null){echo "active";}?>">أفراد الأسرة</a>
<a href="<?php if($all_links['houses'] != false ){echo  base_url()."family_controllers/Family/house";}else {echo "#";} ?>" class="tabs-a building-info <?php if(isset($house_active)&& $house_active!=null){echo "active";}?>">بيانات السكن</a>
<a href="<?php if($all_links['financial'] != false ){echo  base_url()."family_controllers/Family/money";}else {echo "#";} ?>" class="tabs-a money-info <?php if(isset($money_active)&& $money_active!=null){echo "active";}?>">البيانات المالية</a>
<a href="<?php if($all_links['devices'] != false ){echo  base_url()."family_controllers/Family/devices";}else {echo "#";} ?>" class="tabs-a devices-info <?php if(isset($device_active)&& $device_active!=null){echo "active";}?>">الأجهزة المنزلية</a>
<a href="<?php if(is_array($all_links['family_attach_files'])){echo  base_url()."family_controllers/Family/attach_files";}else {echo "#";} ?>" class="tabs-a file-info <?php if(isset($pdf_active)&& $pdf_active!=null){echo "active";}?>">رفع الوثائق</a>



</div>