<style>
    #myListnews li{
        display: none;
    }
</style>


<section class="main_content pbottom-30 ptop-30">

    <div class="container">

        <div class="all_news">
            <h4>أخر أخبار الجمعية </h4>
            <ul id="myListnews" class="list-unstyled">
            <?php
            if (isset($result) && !empty($result)){
                foreach ($result as $row){
                    if($row->news_type==1){
                        $news_type = "اخبار الجمعية";
                    } else if($row->news_type==2){
                        if(isset($row->newspaper_name) && $row->newspaper_name != null){
                            $news_type = $row->newspaper_name  ;
                        }
                    }
                    ?>
                <li class="col-md-4 col-sm-6 col-xs-12 padding-7">


                <articel class="news_article">
                    <?php
                    if (isset($row->img) && $row->img){
                        foreach ($row->img as $image){
                          if($image->img_status==1){
                                ?>
                                <img src="<?= base_url()."uploads/images/public_relations/news/".$image->img ?>"  onerror="imgError(this);">
                    <?php

                           }
                        }
                    }else{
                        ?>
                        <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>">
                        
                        <?php
                    }
                    ?>


                    <div class="news_article_title">
                        <h5><a target="_blank" href="<?= base_url()."Web/news_details/".$row->id?>"><?php echo word_limiter( $row->title,16)?></a></h5>
                        <p class="date"><i class="fa fa-calendar-o"></i> <?= $row->date?></p>
                        <p class="date">التصنيف : <?= $news_type?></p>
                    </div>
                </articel>

                </li>

        <?php
            }
        }
        ?>
            </ul>

            <div class="col-xs-12 text-center">
                <button class="btn btn-load read-more" id="loadMorenews">مشاهدة أكثر</button>

            </div>



        </div>

    </div>
</section>







