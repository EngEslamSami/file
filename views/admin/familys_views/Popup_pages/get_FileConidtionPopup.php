

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" ><?php echo $basic_data_family['process_title'];?> </div></h5>
    <button type="button" style="position: relative;
    top: -22px;" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body row">
    <div class=" col-xs-12 text-center top_radio">
        <?php
        if(isset($reasons_types)&&!empty($reasons_types)){
            foreach($reasons_types as $row){ ?>

                <div class="col-sm-6">
                    <div class="radio">
                        <label>
                            <input type="radio" name="check<?php echo $basic_data_family['mother_national_num'];?>"
                                   class="check<?php echo $basic_data_family['mother_national_num'];?>" value="<?php echo $row->id;?>"
                                <?php if(isset($basic_data_family['reason'])&&$basic_data_family['reason']==$row->id){?> checked="checked"  <?php } ?>>
                            <?php echo $row->title;?></br>
                        </label>
                    </div>
                </div>


            <?php } } ?>
    </div>


    <div class="col-md-12" style="padding-top: 20px !important;">
        <?php if(isset($file_status)&&!empty($file_status)) {
            foreach ($file_status as $row) {
                ?>
                <div class="col-md-3">
                    <button value="<?php echo $row->id;?>"
                            onclick="change_file_status($(this).val(),$(this).attr('title'),$(this).attr('mom'));"
                            style="background-color:<?php echo $row->color;?>; color: black;"
                            title="<?php echo $row->title;?>"
                            mom="<?php echo $basic_data_family['mother_national_num'];?>"
                            class="btn btn-sm btn-info status">
                        </i> <?php echo $row->title;?>
                    </button>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
