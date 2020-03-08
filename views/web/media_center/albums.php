

<style type="text/css">
    .gallery .content .panel-default>.panel-heading {
        color: #fff;
        background-color: #249c33;
        border-color: #ddd;
        background-image: none;
    }
    .gallery .content .panel-body {
        padding: 0px;
        overflow: hidden;
    }
    .gallery .content .panel-body img {
        width: 100%;
        height: 300px;
    }
    .gallery .content .panel-body img:hover {
        transform: scale(1.05,1.05);
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -ms-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }


</style>




<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/gallery'?>">مكتبة الصور</a></li>
          
        </ol>
    </div>
</section>


<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="gallery">
            <?php
            if (isset($library) && !empty($library)) {
                foreach ($library as $row){


                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="    height: 52px;">
                            <h3 class="panel-title"> <?= $row->title?></h3>
                        </div>
                        <div class="panel-body" style="padding: 0;">
                            <a target="_blank" href="<?= base_url()."Web/album/".$row->id?>">
                    <?php
                    if (isset($row->img) && !empty($row->img)) {
                        ?>
                        <img src="<?= base_url() . "uploads/images/" . $row->img ?>">
                        <?php
                    } else{
                        ?>
                        <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>"
                        <?php
                    }
                        ?>
                        </a>
                        </div>
                        <div class="panel-footer">عدد الصور (<?= $row->count?>)</div>

                    </div>
                </div>

                <?php
            }    }
            ?>


        </div>
    </div>
</section>
