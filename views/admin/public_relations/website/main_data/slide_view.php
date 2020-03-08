<div class="col-xs-12 no-padding">

    <!--    <div class="col-md-8 ">-->
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>

        <div class="panel-body">
            <?php
            $status_name = array(' نشط', ' غير نشط  ');
            if ((isset($img_data)) && (!empty($img_data))) {
                echo form_open_multipart(base_url() . 'public_relations/website/main_data/Slide/update/' . base64_encode($id));
                $name = $img_data->img_name;
                $text1 = $img_data->text1;
                $text2 = $img_data->text2;
                $text3 = $img_data->text3;

                $img = base_url() . 'uploads/images/' . $img_data->image;
            } else {
                echo form_open_multipart(base_url() . 'public_relations/website/main_data/Slide/insert');
                $name = '';
                $text1 = '';
                $text2 = '';
                $text3 = '';


            } ?>
            <div class="col-md-12">
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>الإسم الصورة </label>
                    <input type="text" name="img_name" class="form-control" value="<?= $name ?>" placeholder="">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>الصورة</label>
                    <input type="file" name="img" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <br>
                    <input type="checkbox" name="" class="" value="" placeholder="" onchange="show_texts(this)">
                    <label>يوجد نص على الصوة</label>
                </div>


            </div>
            <div class="col-md-12" id="texts" style="display: none;">
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label> النص الاول </label>
                    <input type="text" name="text1" class="form-control" value="<?= $text1 ?>" placeholder="">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label> النص الثاني </label>
                    <input type="text" name="text2" class="form-control" value="<?= $text2 ?>" placeholder="">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label> النص الثالث </label>
                    <input type="text" name="text3" class="form-control" value="<?= $text3 ?>" placeholder="">
                </div>

            </div>
            <div class="form-group col-xs-12">
                <button class="btn btn-success mtop-10" name="btn" value="1"> حفظ</button>

            </div>
            <?php form_close() ?>

        </div>

        <?php if ((isset($all_img)) && (!empty($all_img))) { ?>
            <div class="col-md-12">
                <div class="clearfix"></div>
                <br>
                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title">صور الاسليدر</h3>
                    </div>

                    <div class="panel-body" style="min-height: 230px;">
                        <table class="table-bordered table table-responsive">
                            <thead>
                            <tr class="info">
                                <th>م</th>
                                <th>أسم الصورة</th>
                                <th>الصورة</th>
                                <th>هل يوجد نص على صورة</th>
                                <th>تفاصيل</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($all_img as $key => $img) {
                                ?>
                                <tr>
                                    <td  scope="row" > <?= ++$key ?></td>
                                    <td><?= $img->img_name ?></td>
                                    <?php $img_src = base_url() . 'uploads/images/' . $img->image; ?>
                                    <td><img src="<?= $img_src ?>" width="100px" height="100px"></td>
                                    <td><?php if ((!empty($img->text1)) || (!empty($img->text2)) || (!empty($img->text3))) echo 'نعم'; else echo 'لا '; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"

                                                data-target="#exampleModal" onclick="set_data_intopop(<?= $img->id ?>)">
                                            التفاصيل
                                        </button>
                                    </td>
                                    <td>
                                        <a onclick="alert('هل انت متأكد من حذف ؟!!')"
                                           href="<?php echo base_url() . 'public_relations/website/main_data/Slide/delete/' . base64_encode($img->id) ?>">
                                            <i class="fa fa-trash"></i></a>
                                        <a href="<?php echo base_url() . 'public_relations/website/main_data/Slide/update/' . base64_encode($img->id) ?>">
                                            <i class="fa fa-pencil"></i></a>


                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--    </div>-->
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل شريك النجاح </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12">
                    <div class="col-xs-8">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td  scope="row" class="info"> اسم الصورة</td>
                                <td id="name_img"></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td  scope="row" class="info"> النص الاول</td>
                                <td id="text1"></td>
                            </tr>
                            <tr>
                                <td  scope="row" class="info"> النص الثاني</td>
                                <td id="text2"></td>
                            </tr>
                            <tr>
                                <td  scope="row" class="info"> النص الثالث</td>
                                <td id="text3"></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="col-xs-4">
                        <label>اللوجو </label><br>

                        <div class="container-center ">

                            <img id="image_pop" width="50%" height="50%">
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function show_texts(checkbox) {
        if (checkbox.checked) {
            $('#texts').show('slow');
            // document.getElementById('texts').style.display='block';
        } else {
            $('#texts').hide('slow');
            // document.getElementById('texts').style.display='none';

        }
    }

    function set_data_intopop(id) {

        console.log(' id : ' + id);
        var request = $.ajax({
            url: "<?php echo base_url() . 'public_relations/website/main_data/Slide/select_data'?>",
            type: "POST",
            data: {id: id},
        });
        request.done(function (msg) {

            // if (isNaN(msg)) {
            //     console.log(" if json " + msg);
            //
            // } else {
            // console.log(" else json " + msg);
            var obj = JSON.parse(msg);

            console.log('row ' + obj.id);
            document.getElementById('name_img').innerHTML = obj.img_name;
            document.getElementById('text1').innerHTML = obj.text1;
            document.getElementById('text2').innerHTML = obj.text2;
            document.getElementById('text3').innerHTML = obj.text3;
            var img = '<?php echo base_url() . 'uploads/images/'?>' + (obj.image);
            console.log('logo: ' + img);

            document.getElementById('image_pop').setAttribute('src', img);

            // }


        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
</script>