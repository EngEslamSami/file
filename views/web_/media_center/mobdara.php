


<section class="main_content pbottom-30 ptop-30">

    <div class="container">

        <div class="all_news">
            <h4>مبادارات الجمعية </h4>
            <?php
            if (isset($result) && $result!= null ){
                $x= 0;
                foreach ($result as $row){
                    $x++;
                    //   if ($x < 10){
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12 padding-7">
                        <articel class="news_article">
                            <?php
                            if (isset($row->img) && $row->img){
                                foreach ($row->img as $image){

                                    if($image->img_status==1){
                                        ?>
                                        <img src="<?= base_url()."uploads/images/public_relations/news/".$image->img ?>"
                                           >
                                        <?php
                                    }
                                }
                            } else{
                                ?>
                                <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>"
                                <?php
                            }
                            ?>
                            <?php
//                            if($row->news_type==1){
//                                $news_type = "اخبار الجمعية";
//                            } else if($row->news_type==2){
//                                if(isset($row->newspaper_name) && $row->newspaper_name != null){
//                                    $news_type = $row->newspaper_name  ;
//                                }
//                            }
                            ?>
                            <div class="news_article_title">
                                <h5><a target="_blank" href="<?= base_url()."Web/mobdra_details/".$row->id?>"><?= $row->title?></a></h5>
                                <p class="date"><i class="fa fa-calendar-o"></i> <?= $row->date?></p>

                            </div>
                        </articel>

                    </div>
                    <?php
                    // }
                }

                ?>
                <div class="col-xs-12 text-center">
                    <?php   echo $links;
                    ?>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</section>



