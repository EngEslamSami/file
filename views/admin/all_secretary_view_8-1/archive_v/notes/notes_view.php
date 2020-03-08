
<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading" style="margin-bottom: 0;">
            <h3 class="panel-title"><?php echo $title?></h3>
        </div>
        <div class="panel-body calend-bg" style="">


            <div class="col-xs-12 col-md-12">
                <div class="panel panel-bd">
                    <div class="col-xs-12">
                        <?php
                        echo form_open_multipart('all_secretary/archive/notes/Notes/insert_notes');

                        ?>

                            <div class="col-xs-12 col-md-12">
                                <div class="form-group col-md-4 col-sm-2 col-xs-12 padding-4">
                                    <input type="hidden" id="row_id" name="row_id" value="">
                                    <label class="label">   النوع  </label>

                                    <div class="radio-content">
                                        <input type="radio"    id="type_sarf1" name="type"  class="sarf_types" value="1" data-validation="required" >
                                        <label for="type_sarf1"  class="radio-label  " style="color: #ffc751;">ملاحظة </label>
                                    </div>

                                    <div class="radio-content">
                                        <input type="radio"  id="type_sarf2" name="type"   class="sarf_types" value="2" data-validation="required" >
                                        <label for="type_sarf2" class="radio-label" style="color: #50ab20;">موعد </label>
                                    </div>

                                    <div class="radio-content">
                                        <input type="radio"   id="type_sarf3" name="type" class="sarf_types" value="3" data-validation="required" >
                                        <label for="type_sarf3" class="radio-label" style="color: #E5343D;">  حدث</label>
                                    </div>

                                    <div class="radio-content">
                                        <input type="radio" data-validation="required"   id="type_sarf4" name="type"  class="sarf_types" value="4">
                                        <label for="type_sarf4" class="radio-label" style="color: #3a87ad">مهمة</label>

                                    </div>

                                </div>
                                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">   التاريخ  </label>
                                    <input type="date"   id="date" name="date" value="<?= date('Y-m-d')?>" class="form-control" >

                                </div>
                                <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">   القسم  </label>
                                    <input type="text"  id="qsm" name="qsm" value="" class="form-control"  data-validation="required">

                                </div>
                                <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">   التصنيف  </label>
                                    <input type="text"  id="tasnef" name="tasnef" value="" class="form-control">

                                </div>
                                <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">   التفاصيل  </label>
                                    <textarea name="details" class="form-control" id="details"></textarea>


                                </div>
                                <div class="  text-center col-md-3">
                                    <button type="submit"  name="add" value="add" style="margin-top: 25px;"   class="btn btn-labeled btn-success "    >
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>

                                </div>

                            </div>
                        <?php
                        echo form_close();
                        ?>

                    </div>
                    <div class="col-xs-12">
                        <div class="space"></div>
                        <div id="calendar" ></div>
                    </div>


                </div>
            </div>




        </div>
    </div>
</div>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>



