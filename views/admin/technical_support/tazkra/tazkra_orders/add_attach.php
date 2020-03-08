
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
         <!--   <h3 class="panel-title"><?php echo $title ?> </h3> -->
        </div>
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details"  data-toggle="tab"><i class="fa fa-list  fa-2x" style="display: block;text-align: center"></i> تفاصيل التذكرة</a></li>
                <li><a href="#morfqat" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i> اضافة المرفقات </a></li>



            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="details">

                    <?php  $this->load->view('admin/technical_support/tazkra/tazkra_orders/tazkra_details');?>


                </div>
                <div class="tab-pane fade " id="morfqat">
                    <?php
                    echo form_open_multipart('technical_support/tazkra/tazkra_orders/Tazkra_orders/add_attach/'.$get_tazkra->id)
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
                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <button type="submit" class="btn btn-labeled btn-success " name="add" value="add"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px;margin-top: 27px; ">
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
                            <th> نوع المرفق</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>بواسطة</th>
                            <th>حجم المرفق</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($all_attach as  $attach){
                            $full_date_arr = $attach->date_ar;
                            $full_date = explode(' ',$full_date_arr);
                            $date = $full_date[0];
                            $time = $full_date[1];
                            $a = $full_date[2];

                            $ext = pathinfo($attach->morfaq, PATHINFO_EXTENSION);
                            $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                            $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');

                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $attach->title?></td>
                                <td><?php
                                    if (in_array($ext,$image)){
                                        echo "صورة" ;
                                    } elseif (in_array($ext,$file)){
                                        echo "ملف";
                                    } else{
                                        echo 'غير محدد' ;
                                    }
                                    ?></td>
                                <td><?= $date ?></td>
                                <td><?= $time .' ' .$a ?></td>
                                <td><?= $attach->publisher_name ?></td>
                                <td><?php
                                $size = $attach->size;
                                    if ($size < 1024 ){
                                        echo $size .' '. 'bytes';
                                    } elseif ($size < 1048576){
                                        $size =  round($size/1024);
                                        echo $size .' ' .'KB';
                                    } else{
                                        $size=   round($size/1048576, 1);
                                        echo $size .' '.'MB' ;
                                    }



                                ?></td>

                                <td>

                                    <?php
                                    if (in_array($ext,$image)){
                                        ?>
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $attach->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                                        <?php
                                    } elseif (in_array($ext,$file)){
                                        ?>
                                        <a target="_blank" href="<?=base_url()."technical_support/tazkra/tazkra_orders/Tazkra_orders/read_file/".$attach->morfaq?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                                        <?php
                                    }
                                    ?>


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

                                    <a href="<?=base_url()."technical_support/tazkra/tazkra_orders/Tazkra_orders/download_file/".$attach->morfaq?>" download>
                                        <i class="fa fa-download " aria-hidden="true"></i> </a>
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
                                        window.location="<?= base_url()."technical_support/tazkra/tazkra_orders/Tazkra_orders/delete_attach/".$attach->id.'/'.$attach->tazkra_id_fk ?>";
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




