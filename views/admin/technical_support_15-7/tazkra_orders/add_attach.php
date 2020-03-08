
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
         <!--   <h3 class="panel-title"><?php echo $title ?> </h3> -->
        </div>
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab"> تفاصيل التذكرة</a></li>
                <li><a href="#morfqat" data-toggle="tab"> اضافة المرفقات </a></li>

            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="details">
                    <?php
                    if (isset($get_tazkra) && !empty($get_tazkra)){
                        $full_date_arr = $get_tazkra->date_ar;
                        $full_date = explode(' ',$full_date_arr);
                        $date = $full_date[0];
                        $time = $full_date[1];
                        ?>

                    <table class="table example table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>رقم التذكرة</th>
                            <th>التاريخ </th>
                            <th> الوقت</th>
                            <th> القسم</th>
                            <th>الموضوع</th>
                            <th>نوع التذكرة</th>
                            <th>الأولويه</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= 1?></td>
                            <td><?= $get_tazkra->tazkra_num?></td>
                            <td><?= $date?></td>
                            <td><?= $time?></td>
                            <td><?= $get_tazkra->qsm_n?></td>
                            <td><?= $get_tazkra->tazkra_mawdo3?></td>
                            <td><?= $get_tazkra->tazkra_no3_n?></td>
                            <td><?= $get_tazkra->importance_n?></td>
                            <td><?php
                                echo 'جاري' ;
                                ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger">اضافة</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">الردود التي تمت عليها</a></li>
                                        <li><a href="#">اضافة رد </a></li>
                                        <li><a href="#">انهاء التذكره</a></li>
                                        <li><a href="#"> التقييم</a></li>
                                        <li><a href="#" onclick="print_order(<?= $get_tazkra->id?>)"> طباعه</a></li>

                                    </ul>
                                </div>
                                <a type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                   data-target="#detailsModal" style="padding: 1px 5px;"
                                   onclick="load_page(<?= $get_tazkra->id ?>)" ;><i class="fa fa-list"></i></a>
                                <a
                                        href="<?= base_url().'technical_support/tazkra_orders/Tazkra_orders/add_attach/'.$get_tazkra->id?>"

                                        style="padding: 1px 5px;"
                                ><i class="fa fa-paperclip"></i></a>


                                <a href="#" onclick='swal({
                                        title: "هل انت متأكد من التعديل ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-warning",
                                        confirmButtonText: "تعديل",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false
                                        },
                                        function(){

                                        window.location="<?php echo base_url(); ?>technical_support/tazkra_orders/Tazkra_orders/update_order/<?php echo $get_tazkra->id; ?>";
                                        });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                <a href="#" onclick='swal({
                                        title: "هل انت متأكد من الحذف ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "حذف",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false
                                        },
                                        function(){
                                        swal("تم الحذف!", "", "success");
                                        window.location="<?= base_url() . "technical_support/tazkra_orders/Tazkra_orders/delete_order/" . $get_tazkra->id ?>";
                                        });'>
                                    <i class="fa fa-trash"> </i></a>


                            </td>
                        </tr>
                        </tbody>
                    </table>
                        <?php
                    }
                    ?>
                </div>
                <div class="tab-pane fade " id="morfqat">
                    <?php
                    echo form_open_multipart('technical_support/tazkra_orders/Tazkra_orders/add_attach/'.$get_tazkra->id)
                    ?>
                    <div class="form-group col-md-5 col-sm-6 padding-4">
                        <label class="label"> اسم المرفق</label>
                        <input type="text" name="title"
                               class="form-control "
                               data-validation="required"
                        >

                    </div>
                    <div class="form-group col-md-5 col-sm-6 padding-4">
                        <label class="label">  المرفق</label>
                        <input type="file" name="morfaq"
                               class="form-control "
                               data-validation="required"
                        >

                    </div>
                    <div class="col-xs-12 text-center">

                        <button type="submit" class="btn btn-labeled btn-success " name="add" value="add"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                        </button>
                    </div>
                    <?php
                    echo  form_close();
                    ?>
                    <div class="clearfix"></div><br>

                    <?php
                    if (isset($all_attach) && !empty($all_attach)){
                        $x = 1;
                        ?>
                    <table class="table example table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th> اسم المرفق</th>
                            <th>المرفق</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($all_attach as  $attach){
                            $ext = pathinfo($attach->morfaq, PATHINFO_EXTENSION);
                            $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                            $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');

                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $attach->title?></td>
                                <td><?php
                                    if (in_array($ext,$image)){
                                        ?>
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $attach->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                                    <?php
                                    } elseif (in_array($ext,$file)){
                                        ?>
                                        <a target="_blank" href="<?=base_url()."technical_support/tazkra_orders/Tazkra_orders/read_file/".$attach->morfaq?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                                    <?php
                                    }
                                    ?>
                                    <!-- modal view -->


                                    <!-- modal view -->
                                    <div class="modal fade" id="myModal-view-<?= $attach->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?= base_url()."uploads/technical_support/tazkra_orders/".$attach->morfaq ?>"
                                                         width="100%">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal view -->
                                </td>
                                <td>
                                <a href="#" onclick='swal({
                                        title: "هل انت متأكد من الحذف ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "حذف",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false
                                        },
                                        function(){
                                        swal("تم الحذف!", "", "success");
                                        window.location="<?= base_url()."technical_support/tazkra_orders/Tazkra_orders/delete_attach/".$attach->id.'/'.$attach->tazkra_id_fk ?>";
                                        });'>
                                    <i class="fa fa-trash"> </i></a>
                            </td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                    }
                    ?>


                </div>
            </div>

        </div>
    </div>
</div>
<!-- detailsModal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="details_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                    type="button" onclick="print_order(document.getElementById('order_id').value)"
                    class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->



<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>technical_support/tazkra_orders/Tazkra_orders/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>
<script>
    function print_order(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'technical_support/tazkra_orders/Tazkra_orders/Print_order'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
