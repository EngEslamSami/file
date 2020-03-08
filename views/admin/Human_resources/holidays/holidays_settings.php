<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;

    }

    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {

        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }


    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>


<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
  
    <div class="top-line"></div>
  
      

                <?php
                if (isset($record) && !empty($record) && $record != null) {
                    echo form_open_multipart('human_resources/Holiday_setting/update_holidays/' . $record->id);
                } else {
                    echo form_open_multipart('human_resources/Holiday_setting/holidays_setting');
                }
                ?>
                <div class="form-group  col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label ">الإسم </label>
                    <input type="text" name="data[name]" placeholder="الإسم" value="<?php if (isset($record->name)) {
                        echo $record->name;
                    } ?>" class="form-control " autofocus data-validation="required">

                </div>

                <div class="form-group  col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label ">فئة الأجازة </label>
                    <select name="data[agaza_ttype]" class="form-control " data-validation="required"
                            aria-required="true">
                        <?php $vacation_type_arr = array(2 => 'أجازات خاصة بالموظف', 1 => 'أجازات رسمية') ?>
                        <option value="">إختر</option>
                        <?php foreach ($vacation_type_arr as $key => $value) { ?>
                            <option value="<?= $key ?>"
                                <?php if (!empty($record->agaza_ttype)) {

                                    if ($record->agaza_ttype == $key) {
                                        echo 'selected';
                                    }
                                } ?>
                            ><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group  col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label ">عدد أيام الأجازة</label>
                    <input type="number" name="data[num_days]"
                           oninput="if(this.value<1) this.value=1;if(this.value>366) this.value=366;"
                           placeholder="عدد أيام الأجازة"
                           value="<?php if (isset($record->num_days)) {
                               echo $record->num_days;
                           } ?>" class="form-control " autofocus data-validation="required">

                </div>
                <div class="form-group  col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label ">الحد الادني للأجازة</label>
                    <input type="number" name="data[min_days]" min="1" max="366"
                           oninput="if(this.value<1) this.value=1;if(this.value>366) this.value=366;"
                           placeholder="الحد الادني للأجازة" value="<?php if (isset($record->max_days)) {
                        echo $record->max_days;
                    } ?>" class="form-control " autofocus data-validation="required">

                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label ">الحد الأقصي للأجازة</label>
                    <input type="number" name="data[max_days]" max="366" min="1"
                           oninput="if(this.value<1) this.value=1;if(this.value>366) this.value=366;"
                           placeholder="الحد الأقصي للأجازة" value="<?php if (isset($record->min_days)) {
                        echo $record->min_days;
                    } ?>" class="form-control " autofocus data-validation="required">

                </div>
                <div class="form-group  col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label "> هل يوجد موظف بديل </label>
                    <select name="data[mowazf_badel]" class="form-control " data-validation="required"
                            aria-required="true">
                        <?php $mowazf_badel_arr = array(1 => 'نعم', 2 => 'لا') ?>
                        <option value="">إختر</option>
                        <?php foreach ($mowazf_badel_arr as $key => $value) { ?>
                            <option value="<?= $key ?>"
                                <?php if (!empty($record->mowazf_badel)) {

                                    if ($record->mowazf_badel == $key) {
                                        echo 'selected';
                                    }
                                } ?>
                            ><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-xs-12 text-center">

                    <button type="submit" class="btn btn-labeled btn-success " name="add" value="حفظ"
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                    <!-- <button type="button" class="btn btn-labeled btn-danger ">
                         <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                     </button>

                     <button type="button" class="btn btn-labeled btn-purple ">
                         <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                     </button>


                     <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#myModal_search"  data-toggle="modal" >
                         <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                     </button>-->


                </div>


                </form>
                <?php if (isset($records) && $records != null) { ?>
                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="visible-md visible-lg info">
                            <th>م</th>
                            <th>الإسم</th>
                            <th>عدد الايام</th>
                            <th>الحد الادني للأجازة</th>
                            <th>الحد الأفصي للأجازة</th>
                            <th>الاجراء</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $row) {
                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->num_days; ?></td>
                                <td><?php echo $row->min_days; ?></td>
                                <td><?php echo $row->max_days; ?></td>
                                <td>

                                    <a href="<?php echo base_url(); ?>human_resources/Holiday_setting/update_holidays/<?php echo $row->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <?php if (($row->id >= 1) && ($row->id <= 5)) {
                                    } else { ?>
                                        <a href="<?php echo base_url(); ?>human_resources/Holiday_setting/delete_holidays/<?php echo $row->id; ?>"
                                           onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                                                    class="fa fa-trash"
                                                    aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                    
                    
                    <?php if ($row->agaza_ttype == 1) {?>
                    <button type="button" class="btn btn-warning btn-labeled"
                    id="attach_button" onclick="$('#set').val(<?php echo $row->id;?>)" data-toggle="modal" data-target="#myModal_attach"
                    style="   font-family: 'hl';">
                    <span class="btn-label"><i class="fa fa-share"></i></span>اعدادت الاجازات الرسميه
                    </button>
                    <?php  } else { ?>
                    
                    <?php } ?>
                                    
                                    
                                    
                                </td>


                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>

                <?php } ?>
        
        
  
</div>






<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
           
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اعدادت الاجازات الرسميه</h4>
            </div>
            

            <div class="modal-body">
            
            <?php echo form_open_multipart(base_url() . 'human_resources/Holiday_setting/add_date') ?>
            
        <input type="hidden" name="set"  id="set"  value=''/>

                <div >
                <label class="label "> المده من </label>
                <input type="date" name="data[date_from]" id="date_from"  class="form-control" data-validation="reuqired" value="<?php echo date('Y-m-d'); ?>" >
                <label class="label "> المده الي </label>
                <input type="date" name="data[date_to]" id="date_to"  class="form-control" data-validation="reuqired" value="<?php echo date('Y-m-d'); ?>">

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--<input type="hidden" name="id" id="id" >-->
                <button type="submit" class="btn btn-labeled btn-success " name="add" value="حفظ" 
                
                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </form>
                
                
            </div>
            
        </div>
    </div>
</div>