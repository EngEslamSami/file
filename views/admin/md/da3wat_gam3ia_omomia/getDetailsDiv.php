<div class="container-fluid">
    <div class="print_forma  no-border    col-xs-12 allpad-12">
        <div class="col-xs-12">
            <div class="personality">

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

                                </tr>
                                </thead>
                                <tbody>
                                <?php $x = 1;
                                foreach ($mhawer as $row) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $x++; ?></td>
                                        <td class="text-center"><?php echo $row->mehwar_title; ?></td>

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