
<section class="about_us padding-30">
    <div class="container-fluid">

        <?php if(isset($records)) {  $x=0;foreach ($records as $record){ ?>

            <?php if ($x % 2 == 0) { ?>
                <article class="col-xs-12 part">
                    <div class="col-md-8 col-sm-8">
                        <h4><?php if(isset($record->title)) { echo $record->title; }?></h4>
                        <p><?php if(isset($record->content)) { echo strip_tags($record->content); }?></p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image_of_def">
                            <img src="<?php echo base_url()."uploads/images/".$record->img?>" width="100%">
                        </div>
                    </div>
                </article>

            <?php }else{ ?>

                <article class="col-xs-12 part">
                    <div class="col-md-4 col-sm-4">
                        <div class="image_of_def">
                            <img src="<?php echo base_url()."uploads/images/".$record->img?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h4><?php if(isset($record->title)) { echo $record->title; }?></h4>
                        <ul class="charity_aim">
                            <li> <span> <i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                                <?php if(isset($record->content)) { echo strip_tags($record->content); }?>
                            </li>

                        </ul>
                    </div>

                </article>

            <?php } ?>

        <?php $x++;}  }?>

    </div>
</section>




