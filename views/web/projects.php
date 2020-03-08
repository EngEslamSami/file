

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>

            <li class="active">كل المشروعات</li>
        </ol>
    </div>

</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <h5 class="text-center">مشروعات الجمعية </h5>
        <?php
        if (isset($projects) && !empty($projects)){
            $project_type = "غير محدد";
            foreach ($projects as $row){
                if ($row->project_type == 1){
                    $project_type = "برامج الجمعية" ;
                }else if ($row->project_type == 2){
                    $project_type ="برنامج طموح";
                }else if ($row->project_type == 3){
                    $project_type ="برنامج الروضة";
                }
                ?>
     <!--   <ul id="myListprojects" class="list-unstyled"> -->

                <a href="<?php echo base_url().'Web/single_project/'.$row->id?>"><div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-header" style="background-image: url(<?= base_url()."uploads/images/".$row->img?>);">
                        </div>
                        <div class="card-content">
                            <div class="card-content-member text-center">
                                <h4 class="m-t-0"><a href="<?php echo base_url().'Web/single_project/'.$row->id?>" class="ft-20"><?= $row->project_name?></a></h4>
                            </div>
                            <div class="card-content-languages">
                                <?php
                                if (isset($row->mostafed) && !empty($row->mostafed)){
                                    foreach ($row->mostafed as $m){
                                        ?>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4><?= $m->name?>:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>
                                                        <?= $m->number?>
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div class="card-content-summary">
                                <?php
                                $project_details= word_limiter($row->project_details,20);
                                ?>
                                <p><?= nl2br($project_details)?></p>
                            </div>
                        </div>
                        <?php
                      // if ($row->approved==1){


                        if (isset($row->items) && !empty($row->items)){



                        ?>
                        <div class="card-footer">

                            <div class="card-footer-stats">

                                    <?php
                                    foreach ($row->items as $i){
                                    ?>
                                        <div>
                                            <p><?= $i->title?>:</p>
                                            <i class="fa fa-coffee"></i> <span> <?= $i->details?> </span>
                                        </div>
                                <?php


                        }
                                ?>



                            </div>
                            <div class="card-footer-message">
                                <h4><i class="fa fa-comments"></i> نوع البرنامج : <?= $project_type?></h4>
                            </div>
                        </div>
                        <?php
                   //     }
                        }
                        ?>

                    </div>
                </div></a>

        <?php
            }
        }
        ?>
<!--        </ul>-->
        <div class="col-xs-12 text-center">
            <button class="btn btn-load read-more" id="loadMoreprojects">مشاهدة أكثر</button>


        </div>


    </div>
</section>

