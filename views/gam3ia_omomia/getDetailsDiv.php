

<?php if(isset($result)&& !empty($result)) { ?>
    <style>
        .dawa-parg p{
            font-size: large;
            line-height: 30px;
        }
    </style>

    <div class="col-xs-12 padding-4">
        <h5 class="title-style"><i class="fa fa-users"></i> إجتماعات الجمعية العمومية </h5>
    </div>
<div class="container-fluid">

    <div class="dawa-parg">
        <div class="col-xs-12">


                <div class="col-xs-1"></div>
                <div class="col-xs-7 ahwal_style">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;">
                        <?php echo $result->start_laqb . '/'. $result->mem_name; ?>
                    </h4>
                </div>
                <div class="col-xs-3">
                    <h4 class=""
                        style="font-weight: bold !important;font-size: 20px !important;">
                        <?php echo $result->end_laqb_title; ?>
                    </h4>
                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <br>

                    <h5 style="font-weight: normal !important;"><?php echo $result->salam ; ?></h5>
                </div>


                <div class="col-xs-12 no-padding">

                    <div class="form-group col-sm-12 col-xs-12">
                        <h4><?php echo $result->cont_header; ?></h4>

                    </div>
                    <?php if (isset($mhawer) && (!empty($mhawer))) { ?>
                        <div class="form-group col-sm-12 col-xs-12">
                            <table class="table table-bordered ">
                                <thead>
                                <tr class="greentd">
                                    <th class="text-center">م</th>
                                    <th class="text-center">المحاور</th>
                                    <th class="text-center" style="width: 60px;">المرفق</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $x = 1;
                                foreach ($mhawer as $row) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $x++; ?></td>
                                        <td class="text-center"><?php echo $row->mehwar_title; ?></td>
                                        <td>

                                            <a href="<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/downloads/<?php echo $row->mehwar_morfaq ; ?>" target="_blank">
                                                <i class=" fa fa-download"></i></a>

                                        </td>

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <h4><?php echo $result->cont_footer; ?></h4>

                    </div>


                </div>


            <div class="special col-xs-12 ">


                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center ">

                </div>
                <br><br>

            </div>
        </div>


    </div>
</div>


<?php } else{?>
    <div class="col-md-12 alert alert-danger">عفوا!....... لاتوجد نتائج</div>

<?php } ?>