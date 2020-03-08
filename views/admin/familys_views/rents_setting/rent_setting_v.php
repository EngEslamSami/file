<style>
    .top-label {

        font-size: 13px;
    }

    .form-control {
        padding: 6px 0px;
    }

    .inner-heading-green {
        background-color: #5eab5e;
        padding: 10px;
        color: #fff;
    }

    .inner-heading-red {
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
    }

    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }

    table tr.green_background th,
    table tr.green_background td {
        background-color: #5eab5e;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }

    table tr.red_background th,
    table tr.red_background td {
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }

    table tr th,
    table tr td,
    table thead td,
    table thead th,
    table tfoot th,
    table tfoot td {
        padding: 3px 5px !important;
    }
</style>

<div class=" col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
            <div class="pull-left">

            </div>
        </div>

        <div class="panel-body">

            <?php echo form_open_multipart('family_controllers/rents_setting/Rent_setting/rent_setting'); ?>
            <div class="col-sm-12 no-padding">
                <h6 class="text-center inner-heading-green"> فئات الاسر </h6>
            </div>

            <button class="btn btn-add" type="button" onclick="add_row(<?= $countt ?>)">اضافه</button>


            <table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0" width="100%"
                   style="table-layout: auto;">
                <thead>
                <tr class="green_background">
                    <th>الفئة</th>
                    <th> المبلغ الاساسي</th>
                    <th> مقدار زيادة لكل فرد</th>
                    <th style="">الاجراء</th>
                </tr>
                </thead>
                <tbody id="result">
                <?php
                if (isset($all_rent) && !empty($all_rent)) {

                    foreach ($all_rent as $row) {

                        ?>
                        <tr>
                            <td> <?= $row->title ?>  </td>
                            <td> <?= $row->main_value ?>  </td>
                            <td> <?= $row->increase_value ?>  </td>

                            <td>
                                <a type="button" class="" data-toggle="modal" data-target="#myModal<?= $row->id ?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                <a href="<?php echo base_url(); ?>family_controllers/rents_setting/Rent_setting/delete/<?php echo $row->id; ?>"
                                   onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                                 aria-hidden="true"></i>
                                </a>

                            </td>


                        </tr>


                    <?php }
                } ?>
                </tbody>


            </table>

            <div class="col-xs-12">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                </div>
                <div class="col-md-2">

                    <input type="submit" id="" style="padding: 5px 14px;" name="add" class="btn btn-blue btn-close"
                           value=" حفظ ">
                </div>
            </div>

            <?php echo form_close();
            ?>


            <?php
            if (isset($all_rent) && !empty($all_rent)) {

                foreach ($all_rent as $row) {

                    ?>
                    <div class="modal fade" id="myModal<?= $row->id ?>" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="width: 90%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                            style="position: absolute;left: 10px; top: 14px;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php echo form_open_multipart(base_url() . 'family_controllers/rents_setting/Rent_setting/uptade/' . $row->id); ?>
                                <div class="modal-body">

                                    <?= " " . $row->id . " -" . $row->title ?>
                                    <table class="display table table-bordered responsive nowrap" id="POITable"
                                           cellspacing="0" width="100%"
                                           style="table-layout: auto;">
                                        <thead>
                                        <tr class="green_background">
                                            <th>الفئة</th>
                                            <th> المبلغ الاساسي</th>
                                            <th> مقدار زيادة لكل فرد</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <tr>

                        <td>
                            <?php
                            ?>

                            <select id="benef" name="rent" class="form-control half benfit"
                                    data-validation="required">
                                <option value="<?php $row->fe2a_id_fk ?>"><?php $row->title ?></option>
                                <?php
                                foreach ($all_catg as $roww) {
                                    if (!in_array($roww->id, $rent)) {
                                        ?>
                                        <option value="<?php $roww->id ?>"><?php $roww->title ?></option>
                                    <?php }
                                } ?>
                            </select>

                        </td>
                                            <td><input type="text" name="main" value="<?= $row->main_value ?>"></td>
                                            <td><input type="text" name="increase" value="<?= $row->increase_value ?>">
                                            </td>


                                        </tbody>
                                    </table>


                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="update" class="btn btn-blue btn-close"
                                           value="حفظ">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>


            <table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0" width="100%"
                   style="table-layout: auto;margin-top: 80px;">
                <thead>
                <tr class="green_background text-center ">
                    <th class=" text-center  ">م</th>
                    <th class="text-center">عدد الافراد المستفدين</th>
                    <?php if (isset($all_rent) && !empty($all_rent)) {

                        foreach ($all_rent as $row) {

                            ?>

                            <th class="text-center "><h6><?= $row->title ?>  </h6>
                                <p> زيادة <?= $row->increase_value ?> لكل فرد </p></th>
                        <?php }
                    } ?>

                </tr>
                </thead>
                <tbody>
                <?php for ($i = 1;$i <= 8;$i++){
                    $s="";


                if ($i == 8)
                    $s="  فاكثر  ";
                ?>

                <tr>


                    <td> <?= $i ?> </td>


                    <td> <?= $i.$s ?> </td>
                    <?php

                    if (isset($all_rent) && !empty($all_rent)) {

                        foreach ($all_rent as $row) {

                            ?>


                            <td> <?= ((( $i-1) * $row->increase_value) + $row->main_value) ?> </td>


                        <?php }
                    } ?>
                </tbody>
                </tr>

                <?php
                } ?>

            </table>

        </div>
    </div>
</div>

<script>
    function add_row(val) {

        var x = document.getElementById('POITable');

        var len_tab1 = x.rows.length;

        len = len_tab1;
        //  alert("len ="+len_tab1);


        /*  if (len_tab1 > count2) {
              alert("عفوا تمت اضافه جميع التصنيفات");
              return;
          }*/


        if ((len_tab1 - 1) == val) {

            //alert("add one row");


            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/rents_setting/Rent_setting/add",
                data: {},
                success: function (d) {
                    $('#result').append(d);

                }

            });
        }
    }


    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;

        document.getElementById('POITable').deleteRow(i);

    }

</script>