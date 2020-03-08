

<section class="programs padding-40 ">
    <div class="container">
        <div class="xs-heading row xs-mb-60">
            <div class="col-md-9 col-xl-12">
                <h2 class="xs-title">برامج الجمعية</h2>
                <span class="xs-separetor dashed"></span>
               
            </div><!-- .xs-heading-title END -->

        </div>
        <div class="row">
        



           
            
 
<?php 
if (isset($programs)&&!empty($programs)){
    
    foreach ($programs as $row){
    
?>
            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="<?php echo base_url();?>uploads/images/<?php echo $row->logo;?>" alt="">

                        <div class="progress skill-bar ">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill"><?php echo $row->program_name;?> <i class="val">80%</i></span>
                            </div>
                        </div>
                    </div><!-- .xs-item-header END -->
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-10">
                            <li><a href="<?php echo base_url();?>Web/program_about/<?php echo $row->id;?>"><?php echo $row->program_name;?></a></li>
                        </ul>

                        <a href="<?php echo base_url();?>Web/program_about/<?php echo $row->id;?>" class="xs-post-title xs-mb-15"><?php echo $row->program_name;?></a>
<!--
                        <ul class="xs-list-with-content">
                            <li>ريال  40,000<span><i class="fa fa-leaf"></i> تبرعات</span></li>
                            <li><span class="number-percentage-count number-percentage" data-value="74" data-animation-duration="3500">50</span>% <span><i class="fa fa-battery-half"></i> مكتمل</span></li>
                            <li>70<span><i class="fa fa-user"></i> متطوع</span></li>
                        </ul>
-->
                        <span class="xs-separetor"></span>

                      <!--  <div class="row xs-margin-0">
                            <div class="xs-round-avatar">
                                <img src="<?php echo base_url()."asisst/web_asset/"?>img/avatar/avatar_5.jpg" alt="">
                            </div>
                            <div class="xs-avatar-title">
                                <a href="#"><span>بواسطة</span>أحمد على</a>
                            </div>
                        </div>-->
                    </div><!-- .xs-item-content END -->
                </div><!-- .xs-popular-item END -->
            </div>
            <?php
}
}else {?>
            
        <div class="alert alert-info">
  <strong>تنبيه!</strong>لا يوجد اي برامج الي الان.
</div>
    
<?php }?>

        </div>
        
    </div>
</section>

<!-- start section logos-->
