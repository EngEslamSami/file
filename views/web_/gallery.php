

<section class="padding-30">
    <div class="container-fluid">
        <div class="gallery">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="text-uppercase line-bottom-center mt-0">صور  <span class="text-theme-colored font-weight-600">من</span>ألبومات الصور</h2>
                        <div class="title-icon">
                            <i class="flaticon-charity-hand-holding-a-heart"></i>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="clearfix list-unstyled gallery_imgs " id="thumbnails">
                 <?php if($all_images !='' && $all_images !=null && !empty($all_images)){
                     foreach ($all_images as $album){
                         $main_photo=unserialize($album->img);
                     ?>
                    <li class="col-lg-3 col-md-4 col-sm-6 padding-4">
                    <div class="box-img">
                        <a href="#" title="<?php echo $album->title;?>">
                            <img src="<?php echo base_url()."uploads/images/".$main_photo[0]?>" alt="turntable" width="100%" height="250">
                        </a>
                    </div>
                    </li>
                      <?php }  }else{ ?>
                      <li class="col-lg-3 col-md-4 col-sm-6 padding-4">
                    <div class="box-img">
                        <a href="<?php echo base_url()."uploads/images"?>" title="عنوان الصورة الأولى">
                            <img src="<?php echo base_url()."uploads/images"?>" alt="turntable" width="100%" height="250">
                        </a>
                    </div>
                </li>
                    <li class="col-lg-3 col-md-4 col-sm-6 padding-4">
                        <div class="box-img">
                            <a href="<?php echo base_url()."asisst/web_asset/"?>img/news/1.jpg" title="عنوان الصورة الأولى">
                                <img src="<?php echo base_url()."asisst/web_asset/"?>img/news/1.jpg" alt="turntable" width="100%" height="250">
                            </a>
                        </div>
                    </li>
                      
                      <?php }?>
            </ul>
        </div>
    </div>
</section>






