
<style type="text/css">
    .single_project .box-item {
        padding: 20px;
        background-color: #eee;
        box-shadow: 2px 2px 8px;
    }
    .single_project .box-item .onsr{
        color: #002542;
    }
    .single_project .box-item .rqm {
        color: #fff;
        background: #96c73e;
        padding: 10px;
    }
    .single_project  .circle-box {
        border-radius: 50%;
        background-color: #fff;
        border: 4px solid #96c73e;
        text-align: center;
        max-width: 100%;
        width: 150px;
        height: 150px;
    }
    .single_project  .circle-box i{
        font-size: 50px;
        color: #96c73e;
        margin-top: 12px;
    }
    .single_project  .circle-box h5{
        color:#002542;
    }
    .single_project  .circle-box:hover {
        border: 4px dotted #96c73e;
    }
    .single_project  .circle-box:hover i {
        -webkit-animation: toBottomFromTop 0.3s forwards;
        -moz-animation: toBottomFromTop 0.3s forwards;
        animation: toBottomFromTop 0.3s forwards;
    }
    img{
        max-width: 100%;
    }

    @-webkit-keyframes toBottomFromTop {
        49% {
            -webkit-transform: translateY(100%);
        }
        50% {
            opacity: 0;
            -webkit-transform: translateY(-100%);
        }
        51% {
            opacity: 1;
        }
    }
    @-moz-keyframes toBottomFromTop {
        49% {
            -moz-transform: translateY(100%);
        }
        50% {
            opacity: 0;
            -moz-transform: translateY(-100%);
        }
        51% {
            opacity: 1;
        }
    }
    @keyframes toBottomFromTop {
        49% {
            transform: translateY(100%);
        }
        50% {
            opacity: 0;
            transform: translateY(-100%);
        }
        51% {
            opacity: 1;
        }
    }

</style>



<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">كل المشروعات</a></li>
            <li class="active"><?php if(!empty($records[0]->project_name)){  echo $records[0]->project_name; }else{  echo'غير محدد'; } ?> </li>
        </ol>
    </div>

</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="single_project">
            <div class="project_details pbottom-30 ptop-30">
                <div class="col-sm-4 col-xs-12">

                        <img src="<?php echo base_url().'uploads/images/'.$records[0]->img;?>"

                             onerror="this.src='<?php echo base_url().'asisst/web_asset/img/projects/project-1.jpg'?>">



                </div>
                <div class="col-sm-8 col-xs-12">
                    <h3><?php if(!empty($records[0]->project_name)){  echo $records[0]->project_name; }else{  echo'غير محدد'; } ?> </h3>
                    <p class="paragraph">"
                        <?php if(!empty($records[0]->project_details)){  echo $records[0]->project_details; }else{  echo'غير محدد'; } ?>
                        "</p>

                    <br>
                    <?php if(!empty($records[0]->items)){
                        foreach ($records[0]->items as $one_item){
                        ?>

                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="circle-box">
                            <i class="fa fa-money"></i>
                            <h5><?php echo $one_item->title;?></h5>
                            <p class="paragraph"> <?php echo $one_item->details;?>  </p>
                        </div>
                    </div>


                    <!--<div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="circle-box">
                            <i class="fa fa-coffee"></i>
                            <h5>الكساء</h5>
                            <p class="paragraph">50 ريال </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="circle-box">
                            <i class="fa fa-money"></i>
                            <h5>الدعم النقدى</h5>
                            <p class="paragraph"> 100 ريال </p>
                        </div>
                    </div>-->
                    <?php } } ?>


                </div>
                <div class="clearfix"></div>
                <hr>




            </div>
            <?php if(!empty($records[0]->mostafed)){ ?>
            <div class="tbra_for_project background-white mtop-40 pbottom-30">
                <div class="forms_head mbottom-10">عناصر البرنامج </div>

                <div class="col-xs-12">
                    <?php if(!empty($records[0]->mostafed)){
                    foreach ($records[0]->mostafed as $row){
                    ?>


                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="box-item text-center">
                            <h5 class="onsr">عدد <?php echo $row->name; ?>:</h5>
                            <h3 class="rqm"><?php echo $row->number; ?></h3>
                        </div>
                    </div>

                    <!--<div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="box-item text-center">
                            <h5 class="onsr">عدد لمكفولين:</h5>
                            <h3 class="rqm">255</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="box-item text-center">
                            <h5 class="onsr">عدد الغير مكفول:</h5>
                            <h3 class="rqm">255</h3>
                        </div>
                    </div>-->
                    <?php } } ?>

                </div>


            </div>
            <?php  } ?>


            <?php if(!empty($records[0]->photos)){ ?>
            <div class="tbra_for_project background-white mtop-40 pbottom-30">
                <div class="forms_head mbottom-10">صور البرنامج </div>
                <div class="gallery">
                    <ul class="clearfix list-unstyled gallery_imgs " id="thumbnails">
                        <?php
                        foreach ($records[0]->photos as $row){
                        ?>

                        <li class="col-md-4 col-sm-6 padding-4">


                            <div class="box-img">
                                <a href="<?php echo base_url().'uploads/images/'.$row->image?>" title="عنوان الصورة الأولى">
                                    <img src="<?php echo base_url().'uploads/images/'.$row->image?>"
                                         onerror="this.src='<?php echo base_url().'uploads/images/'.$row->image?>"
                                         alt="turntable" width="100%" height="250">
                                </a>
                            </div>
                        </li>

                        <?php }  ?>
                        <!--<li class="col-md-4 col-sm-6 padding-4">
                            <div class="box-img">
                                <a href="<?php echo base_url().'asisst/web_asset/img/news/news-2.jpg'?>" title="عنوان الصورة الثانية">
                                    <img src="<?php echo base_url().'asisst/web_asset/img/news/news-2.jpg'?>" alt="turntable" width="100%" height="250">
                                </a>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 padding-4">
                            <div class="box-img">
                                <a href="<?php echo base_url().'asisst/web_asset/img/news/news-3.jpg'?>" title="عنوان الصورة الثالثة">
                                    <img src="<?php echo base_url().'asisst/web_asset/img/news/news-3.jpg'?>" alt="turntable" width="100%" height="250">
                                </a>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 padding-4">
                            <div class="box-img">
                                <a href="<?php echo base_url().'asisst/web_asset/img/news/news-4.jpg'?>" title="Turntable by Jens Kappelmann">
                                    <img src="<?php echo base_url().'asisst/web_asset/img/news/news-4.jpg'?>" alt="turntable" width="100%" height="250">
                                </a>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 padding-4">
                            <div class="box-img">
                                <a href="<?php echo base_url().'asisst/web_asset/img/news/news-5.jpg'?>" title="Turntable by Jens Kappelmann">
                                    <img src="<?php echo base_url().'asisst/web_asset/img/news/news-5.jpg'?>" alt="turntable" width="100%" height="250">
                                </a>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 padding-4">
                            <div class="box-img">
                                <a href="<?php echo base_url().'asisst/web_asset/img/news/news-6.jpg'?>" title="Turntable by Jens Kappelmann">
                                    <img src="<?php echo base_url().'asisst/web_asset/img/news/news-6.jpg'?>" alt="turntable" width="100%" height="250">
                                </a>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 padding-4">
                            <div class="box-img">
                                <a href="<?php echo base_url().'asisst/web_asset/img/news/news-7.jpg'?>" title="Turntable by Jens Kappelmann">
                                    <img src="<?php echo base_url().'asisst/web_asset/img/news/news-7.jpg'?>" alt="turntable" width="100%" height="250">
                                </a>
                            </div>
                        </li>-->



                    </ul>
                </div>

            </div>
            <?php  } ?>



            <?php if(!empty($records[0]->videos)){ ?>
                <div class="tbra_for_project background-white mtop-40 pbottom-30">
                    <div class="forms_head mbottom-10">فيديوهات البرنامج </div>
                    <div class="gallery">
                        <ul class="clearfix list-unstyled gallery_imgs " id="thumbnails">
                            <?php
                            foreach ($records[0]->videos as $video){
                                ?>


                                <li class="col-md-4 col-sm-6 padding-4">
                                    <div class="box-video">
                                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $video->video_link?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </li>



                            <?php }  ?>

                        </ul>
                    </div>

                </div>
            <?php  } ?>


        </div>
    </div>
</section>

