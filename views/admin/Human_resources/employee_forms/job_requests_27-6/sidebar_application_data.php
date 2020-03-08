<style>
    .lobipanel-noaction {
        margin-bottom: 25px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }
    .list-group-item{
            padding: 10px 8px;
    }
   .table-pro th{
    width: 117px;
}
</style>









<div class="user-profile">
			<span class="profile-picture">
			<!--	<img id="profile-img-tag" class="editable img-responsive" alt="Alex's Avatar" src="<?php // echo base_url()?>asisst/admin_asset/img/avatars/profile-pic.jpg" />-->

 <?php

 $user_img="";
 if(isset($personal_data)){
     $user_img=  $personal_data['personal_photo'] ;
 }?>
        <img style="width: 100px;" id="profile-img-tag" class="editable img-responsive" src="<?=base_url()?>/uploads/images/<?php echo $user_img ?>"
             onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">


			</span>

    <div class="space-4"></div>

    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
        <div class="inline position-relative">
            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                <i class="ace-icon fa fa-circle light-green"></i>
                &nbsp;
                <span class="white"><?php if(isset($personal_data)){ echo  $personal_data['name'];}?></span>
            </a>

            <ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
                <li class="dropdown-header"> تغيير الحالة </li>

                <li>
                    <a href="#">
                        <i class="ace-icon fa fa-circle green"></i>

                        <span class="green">Available</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="ace-icon fa fa-circle red"></i>

                        <span class="red">Busy</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="ace-icon fa fa-circle grey"></i>

                        <span class="grey">Invisible</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>





    <div class="space-6"></div>
    <div class="profile-contact-info">
        <div class="profile-contact-links align-right">
            <a href="#" class="btn btn-link">
                <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
               رقم الطلب : <?php if(isset($personal_data)){  echo $personal_data['id'];}?>
            </a>

            <a href="#" class="btn btn-link">
                <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                رقم الهوية : <?php if(isset($personal_data)){ echo $personal_data['national_num'];}?>
            </a>


        </div>

    </div>


</div>

