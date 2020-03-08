<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>

        <div class="panel-body">

            <?php

            if ((isset($img_data)) && (!empty($img_data))) {
                echo form_open_multipart(base_url() . 'public_relations/website/about_us/Structure/update_img/' . base64_encode($img_data->id));
                $tilte = $img_data->title;
                $img = $img_data->img;

            } else {
                $tilte = '';
                $img = '';
                echo form_open_multipart(base_url() . 'public_relations/website/about_us/Structure/insert_imgs');
            } ?>

            <div class="col-xs-12 no-padding">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half"> عنوان </label>
                    <input type="text" name="title" class="form-control half" value="<?= $tilte ?>"
                           data-validation="required">
                </div>

                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half"> صورة </label>
                    <input type="file" name="img" class="form-control half" value="">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <img src="<?php echo base_url() . 'uploads/images/' . $img ?>" alt="" width="25%" height="25%">
                </div>
                <div class="col-xs-12 text-center">
                    <br/>
                    <button type="submit" name="btn" value="1" class="btn btn-success"> حفظ</button>
                </div>
                <?php echo form_close() ?>

            </div>
            <?php if (isset($imgs) && (!empty($imgs))) { ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم الصورة</th>
                        <th>الصورة</th>
                        <th>إجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($imgs as $key => $img) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $img->title ?></td>
                            <td><img src="<?php echo base_url() . 'uploads/images/' . $img->img ?>" alt="" width="25%"
                                     height="25%"></td>
                            <td>
                                <a onclick=" if(confirm(('هل انت متأكد من حذف ؟!!')))
                                        window.location='<?php echo base_url() . 'public_relations/website/about_us/Structure/delete_imgs/' . base64_encode($img->id) ?>';"
                                   href="#">
                                    <i class="fa fa-trash"> </i></a>
                                <a href="<?php echo base_url() . 'public_relations/website/about_us/Structure/update_img/' . base64_encode($img->id) ?>">
                                    <i class="fa fa-pencil"> </i></a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>