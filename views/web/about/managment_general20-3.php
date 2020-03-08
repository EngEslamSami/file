<style>
h2.subtitle {
font-size: 20px;
    color: #96c73e;
    font-weight: bold;
    border-right: 9px solid #ffb61e;
    padding-right: 8px;
    line-height: 40px;
}
</style>


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/king_word'?>">من نحن</a></li>
            <li class="active">الإدارة التنفيذية</li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="col-md-3 col-sm-4 col-xs-12"  id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 " id="secondDiv">
          <!-- <div class="background-white content_page">

                <div class="well well-sm">   أعضاء الجمعية العمومية</div>
              <?php
                if (isset($members) && !empty($members)){
                    foreach ($members as $member){
                        ?>

                <div class="managment_member">
                    <div class="col-sm-3 text-center col-xs-12">
                        <img src="<?=base_url()."uploads/images/".$member->member_img?>">

                    </div>
                    <div class="col-sm-9 col-xs-12">
                     
                        <br>
                        <p>سعادة <?= $member->surname_name?> <?= $member->name?></p>

                        <p> الهاتف : <?= $member->mob?></p>
                        <p> البريد الإلكترونى : <?= $member->email?></p>
                    </div>
                </div>
                        <?php
                    }
                }
                ?>
                
              
               

            </div>-->







                <?php
                if (isset($members) && !empty($members)){
                
                ?>
            <div class="background-white content_page">

                <h2 class="subtitle"> الإدارة التنفيذية</h2>


                <?php
                if (isset($members) && !empty($members)){
                foreach ($members as $member){
                ?>
                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'uploads/images/'.$member->personal_photo?>"
                             onerror="this.src=<?=base_url().'asisst/web_asset/img/fysel_bn_mashal.jpg'?>"
                             class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4><?php echo $member->degree_name; ?> </h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ <?php echo $member->employee; ?></h4>
                        <p> الهاتف : <?php echo $member->phone; ?></p>
                        <p> البريد الإلكترونى : <?php echo $member->email; ?></p>
                    </div>
                </div>

                    <?php
                }
                }
                ?>


               <!-- <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مساعد المدير العام لشؤون الرعاية والبرامج </h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ سليمان بن عبد العزيز الراضي</h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مدير إدارة الشؤون المالية</h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ سامي بن نايف الحربي </h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مدير إدارة الشؤون الإدارية </h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ تركي بن شايع الشايع </h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مدير إدارة تنمية الموارد المالية</h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ أحمد بن عبدالله المهوس </h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مدير إدارة الرعاية الاجتماعية</h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ صالح بن إبراهيم القريعان</h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مدير إدارة العلاقات العامة والإعلام </h4>
                        <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ عبد الرحمن بن محمد العجلان</h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4> مدير مركز طموح  </h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ حمد بن محمد الفعيم </h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مديرة القسم النسائي</h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذة منيرة بنت عبدالله البطي</h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>

                -->
                 </div>
				      <?php
               
                }
                ?>
        </div>
    </div>
</section>

