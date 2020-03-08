

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">العضوية</a></li>
            <li class="active">بنود العضوية</li>
        </ol>
    </div>
</section>
<?php
if (isset($membring) && !empty($membring)){
$x=1;
?>
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="col-md-3 col-sm-4 col-xs-12">
            <h4 class="sidebar_title"> العضوية </h4>
            <div class="menu_sidebar">
                <ul class="list-unstyled" >
                     <?php
                foreach ($membring as $item) {

                    ?>

                    <li><a href="#<?= $item->id?>" class="sidebar-scroll">  <?=$item->title ?> </a>
                    </li>
                    <?php
                }
 ?>

                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 ">


            <div class="background-white content_page">
                <?php
                foreach ($membring as $row){

                    ?>


                <div id="<?=$row->id?>">
                    <div class="well well-sm"><?= $x++?>. <?=$row->title?></div>
                    <div class="paragraph">
                       <p>
                         <?= nl2br($row->details)?>
                       </p>
                    </div>
                </div>
                    <?php
                }
                ?>



        </div>
    </div>
</section>

    </div>
    <?php
}
?>


