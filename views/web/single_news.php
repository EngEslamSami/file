

<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="news-details-page ">
            <div class="col-md-9 col-sm-8 col-xs-12 ">
                <div class="news-details-content">
                    <?php
                    if (isset($details) && $details != null){
                    if($details->news_type==1){
                        $news_type = "اخبار الجمعية";
                    } else if($details->news_type==2){
                        if(isset($details->newspaper_name) && $details->newspaper_name != null){
                            $news_type = $details->newspaper_name  ;
                        }
                    }
                    ?>
                    <h5 class="title">
                        <a href="#"><?=$details->title?></a>
                    </h5>
                    <p class="date"><i class="fa fa-calendar"></i><?= $details->date?> &nbsp&nbsp&nbsp <i class="fa fa-user fa-1x"></i> الناشر :<?= $details->publisher_name?> <span class="category">
                            <i class="fa fa-list">

                            </i> التصنيف : <?php
                            echo $news_type;
                            ?> </span></p>

                    <hr>
                    <div class="text-center">
                        <?php
                        if (isset($details->img) &&$details->img != null ){

                                ?>
                            <img src="<?= base_url()."uploads/images/public_relations/news/".$details->img[0]->img ?>" class="main-img">


                            <?php

                        } else{
                            ?>
                            <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>" >
                        <?php
                        }
                        ?>

                    </div>

                    <br>
                    <hr class="white">

                    <div class="share text-center">
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_google_plus"></a>
                        </div>
                        <script>
                            var a2a_config = a2a_config || {};
                            a2a_config.linkname = "masryeen";
                            a2a_config.linkurl = "http://masryeen966.com/web/market";
                            a2a_config.num_services = 22;
                        </script>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->




                    </div>
                    <p class="paragraph"><?= $details->details?></p>

                    <p class="publisher">صور من الموضوع</p>
                    <ul class="clearfix list-unstyled related-imgs " id="thumbnails">
                        <?php
                        if (isset($details->img) && !empty($details->img)){
                            foreach ($details->img as $image){
                                ?>
                                <li class="">
                                    <div class="box-img">
                                        <a href="<?= base_url()."uploads/images/public_relations/news/".$image->img?>" title="Turntable by Jens Kappelmann">
                                            <img src="<?= base_url()."uploads/images/public_relations/news/".$image->img?>" alt="turntable" width="100%" height="250">
                                        </a>
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>

                    </ul>

                </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 no-padding">
                <div class="sidebar">
                    <h5 class="heading">مساحة إعلانية</h5>

                    <img src="<?= base_url()."asisst/web_asset/img/news/news-7.jpg"?>" width="100%" >
                </div>
                <div class="sidebar">
                    <h5 class="heading">أخبار مختارة</h5>
                    <div class="related-news">
                        <ul class="list-unstyled">
                            <?php
                            if(isset($result)&& $result != null ){
                            $i = 0;
                            foreach($result as $other){
                            $i++;
                            if ($i <6){


                            ?>
                            <li class="single">
                                <a href="<?= base_url().'Web/news_details/'.$other->id ?>">
                                    <?php
                                    if (isset($other->img)&& !empty($other->img)){
                                        ?>
                                        <img src="<?= base_url()."uploads/images/public_relations/news/".$other->img[0]->img?>" width="80" height="80">

                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>" width="80" height="80" >
                                        <?php
                                    }
                                    ?>
                                    <h6><?= word_limiter($other->title,8)?></h6>
                                </a>
                            </li>

                                <?php
                            }
                            }
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>



    </div>
</section>



