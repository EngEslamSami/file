
<section class="padding-30">
    <div class="container-fluid">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="text-uppercase line-bottom-center mt-0">فيديوهات  <span class="text-theme-colored font-weight-600">من  معرض </span>الجمعية</h2>
                    <div class="title-icon">
                        <i class="flaticon-charity-hand-holding-a-heart"></i>
                    </div>
                
                </div>
            </div>
        </div>

        <div class="videos">
            <h5 class="heading blue_background">مكتبة فيديوهات من معرض الجمعية <i class="fa fa-picture-o pull-right"></i></h5>
            <ul class="clearfix list-unstyled gallery_videos " >
                
              <?php if(isset($records) && $records != null){
                foreach($records as $video){ ?>
                  <li class="col-lg-3 col-md-4 col-sm-6 padding-4">
                    <div class="box-video">
                        <a href="#" title="<?php echo $video->title; ?>"  data-toggle="modal" data-target="#myModal<?php echo $video->id; ?>">
                            <img src="<?php echo base_url()."asisst/web_asset/"?>img/videos/img1.png" alt="turntable" width="100%" height="250">
                        </a>
                    </div>
                    <div class="modal fade" id="myModal<?php echo $video->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo $video->vid; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>  
              <?php   }
              } ?>  
                
                
              

            </ul>
        </div>

    </div>
</section>





