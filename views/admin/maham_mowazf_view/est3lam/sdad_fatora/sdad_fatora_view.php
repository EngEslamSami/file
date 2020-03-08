<div class="col-md-12">

    <?php if (isset($sadad_fatora) && !empty($sadad_fatora)) { ?>

        <table class="table-bordered table table-responsive example">
            <thead>
            <tr class="info">
                <th>م</th>
                <th>رقم الطلب</th>
                <th>اجمالي المبلغ</th>
                <th> عدد الفواتير</th>
                <th>الجهه الموجه اليها</th>
                <th> القائم بالاضافه</th>


                <th>التفاصيل</th>
                <th>الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $key = 1;
            foreach ($sadad_fatora as $row) {
                ?>
                <tr>
                    <td scope="row"> <?= $key ?></td>
                    <td><?= $row->t_rkm ?></td>
                    <td><?= $row->total_value ?></td>
                    <td><?= $row->num_fators ?></td>
                    <td><?= $row->to_geha_name ?></td>

                    <td><?= $row->publisher_name ?></td>

                    <td>

                        <a href="#modal_details" data-toggle="modal"
                           onclick="get_fatora_details(<?php echo $row->t_rkm; ?>)"> <i class="fa fa-eye"> </i></a>
                    </td>
                    <td>

                        <button type="button" class="btn btn-labeled  "
                                style="background-color:#f7d944; color: #fff;" data-toggle="modal"
                                data-target="#modal-sm" onclick="load_Transformation(<?php echo $row->t_rkm; ?>)">
                            <span class="btn-label"><i class="fa fa-male" aria-hidden="true"></i></span>تحويل
                            الرد
                        </button>
                    </td>
                </tr>
                <?php $key++;
            } ?>
            </tbody>
        </table>
    <?php } else {
        ?>
        <div class="col-md-12 alert-danger">
            <h3> لا توجد بيانات </h3>
        </div>
        <?php
    } ?>


</div>
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#modal_details').modal('hide')" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل الفاتوره</h4>
            </div>
            <div class="modal-body" id="details"></div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--<button
                        type="button" onclick="print_order(document.getElementById('print_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>-->

                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#modal_details').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-sm" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-success " role="document" style="width: 90%">
        <div class="modal-content ">
            <!--------------------------------------->
            <div class="modal-header ">
                <h1 class="modal-title">تحويل الطلب </h1>
            </div>
            <?php echo form_open_multipart(base_url().'maham_mowazf/person_profile/Personal_profile/load_Transformation'); ?>

            <div class="modal-body " id="Transformation">

            </div>
            <br>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                <button type="submit" name="operation" id="operation" value="operation"
                        class="btn btn-success ">إرسال
                </button>
            </div>
            <div class="col-sm-6">
                <?php

                /*
                 if(!empty($notes)){ $a=0; foreach ($notes as $note){ ?>
                    <input tabindex="11" value="<?php echo $note->reason;?>" type="radio" id="square-radio-1" name="radio"
                           onclick="$('#reason').val($(this).val());">
                    <label for="square-radio-1"><?php echo $note->reason;?></label><br>
                    <?php  $a++;} }
                    */
                ?>
            </div>
            <?php echo form_close() ?>
            <!--------------------------------------->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    function get_fatora_details(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_fatora_details",
            data: {rkm: valu},
            success: function (d) {


                $('#details').html(d);


            }

        });
    }
</script>


<script>

    function load_Transformation(rkm) {

        // Transformation
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>maham_mowazf/person_profile/Personal_profile/load_Transformation',
            data: {rkm: rkm},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#Transformation').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#Transformation").html(html);
            }
        });

    }
</script>