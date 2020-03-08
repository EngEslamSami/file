<style>

    .pop-img {
        height: 350px !important;
    }

</style>
<div class=" row  photo" style="min-height: 500px;  padding: 50px; padding-top: 36px;">
    <?php
    if(isset($ablums)&&!empty($ablums)) {
        foreach ($ablums as $row) {
            $unserialize = unserialize($row->img); ?>

            <div class="col-md-3 col-sm-4 col-xs-12">

                <a data-toggle="modal" data-target="#myModal<?php echo $row->id; ?>">
                    <img src="<?php echo base_url(); ?>uploads/images/<?php echo $unserialize[0]; ?>" alt=""
                         width="100%" height="250px" style="max-width: 260px;"
                         class="center-block hover-shadow cursor1">
                </a>

                <div id="myModal<?php echo $row->id; ?>" class="modal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div id="carousel2<?php echo $row->id; ?>" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <?php
                                    $class="item active";
                                    for ($x = 0; $x < count($unserialize); $x++) {
                                        ?>

                                        <div class="<?php echo $class;?>">
                                            <img
                                                src="<?php echo base_url(); ?>uploads/images/<?php echo $unserialize[$x]; ?>"
                                                class="pop-img" width="100%">
                                        </div>
                                        <?php
                                        $class="item";
                                    }
                                    ?>


                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel2<?php echo $row->id; ?>" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel2<?php echo $row->id; ?>" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
    }
    ?>
</div>