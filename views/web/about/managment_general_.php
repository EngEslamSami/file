


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/king_word'?>">من نحن</a></li>
            <li class="active">موظفي الجمعية التنفيذيين</li>
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
    
            
            
            <div class="background-white content_page">

                <div class="well well-sm">  موظفى الجمعية التنفيذين</div>
               <?php
               
               echo '<pre>';
               print_r($all);
               /*
                if (isset($all) && !empty($all)){
                
                ?>
            <div class="background-white content_page">
                <h2 class="subtitle"> الإدارة التنفيذية</h2>
                <?php
                if (isset($all) && !empty($all)){
                foreach ($all as $member){
                ?>
                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <?php
                          if ( isset($member->path) && !empty($member->path) && !empty($member->emp_data->img)){
                              $src= $member->path.'/'.$member->emp_data->img;
                          } else{
                              $src = 'asisst/web_asset/img/no_image.jpg';
                          }
                        ?>
                        <img src="<?=base_url().$src?>"
                             onerror="this.src=<?=base_url().'asisst/web_asset/img/no_image.jpg'?>"
                             class="img-circle" alt="">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4><?php
                            if (!empty($member->job_title_n)){
                                echo $member->job_title_n;
                            }else{
                                echo 'غير محدد';
                            }
                             ?> </h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;"><?php echo $member->person_name; ?></h4>
                        <p> الهاتف : <?php if (!empty($member->emp_data)){
                                echo $member->emp_data->mob;
                            } else{
                            echo 'غير محدد';
                            } ; ?></p>
                        <p> البريد الإلكترونى : <?php if (!empty($member->emp_data)){
                                echo $member->emp_data->email;
                            } else{
                                echo 'غير محدد';
                            } ; ?></p>
                        <p>  رقم التحويلة :
                               </p>
                    </div>
                </div>

                    <?php
                }
                }
                ?>
                 </div>
				      <?php
                }
                */
                ?>
             
             <!--
             <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4>مساعد المدير العام للشؤون المالية والإدارية </h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ عبدالله بن حمد الصقعوب </h4>

                        <p> الهاتف : 539456823</p>
                        <p> البريد الإلكترونى : mohamed@gmail.com</p>
                    </div>
                </div>
                <div class="managment_member col-sm-6 col-xs-12">
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
        </div>
    </div>
</section>





              