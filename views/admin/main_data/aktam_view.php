<div class="col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">

            <div class="col-md-9">
                <?php
                if (isset($one_data) && (!empty($one_data))) {
                    echo form_open_multipart(base_url() . 'main_data/Aktam/update_ktm/' . base64_encode($one_data->id));
                    $ktm = $one_data->ktm;
                    $ktm_path = $one_data->ktm_path;
                    $edara_code = $one_data->edara_code;
                } else {
                    echo form_open_multipart(base_url() . 'main_data/Aktam/add_ktm');
                    $ktm = '';
                    $ktm_path = '';
                    $edara_code = '';
                } ?>
                <div class="col-md-12">


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">الإدارة </label>
                        <select name="edara_code" onchange="get_edara_code()" id="magles_edara_code_fk"
                                class="form-control" data-validation="required"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php $edara_code_arr = array(101 => 'الجمعية الاساسية',
                                102 => 'الرعاية الاجتماعية ',
                                103 => ' الشئون المالية ',
                                104 => ' الكفالات والتبرعات  ',
                                105 => ' القسم النسائي  ',
                                106 => ' العلاقات العامة والإعلام '

                            );
                            foreach ($edara_code_arr as $key => $value) {
                                if (in_array($key, $all_edara)) {
                                    continue;
                                }
                                ?>
                                <option value="<?php echo $key; ?>"
                                    <?php if (!empty($edara_code)) {
                                        if ($key == $edara_code) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo $value; ?></option>
                                <?php
                            } ?>
                        </select>


                    </div>
                    <div class="form-group col-sm-3 padding-4">
                        <label class="label">صورة الختم </label>
                        <input type="file" class="form-control " data-validation="required" name="ktm" accept="image/*"
                               onchange="set_img_magles(this);" value="<?= $ktm ?>">
                    </div>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn-success btn-labeled btn" name="save" value="1">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="col-sm-3 ">
                <label class="label">صورة الختم </label>

                <?php
                if (!empty($ktm)) {
                    $type = pathinfo($ktm)['extension'];
                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                    if (in_array($type, $arry_images)) {
                        ?>
                        <img data-toggle="modal"
                             data-target="#myModal2"
                             onclick="$('#my_image').attr('src',$(this).attr('src'));"
                             id="magles_image" class="media-object center-block"
                             src="<?php if (!empty($ktm) && ($ktm != 0)) {
                                 echo base_url() . 'uploads/' . $ktm_path . '/' . $ktm;
                             } else {
                                 echo base_url('asisst/fav/apple-icon-120x120.png');
                             } ?>"
                             style="width: 100px;height: auto;"/>
                        <?php
                    }

                } else {
                    ?>
                    <img data-toggle="modal"
                         data-target="#myModal2"
                         onclick="$('#my_image').attr('src',$(this).attr('src'));"
                         id="magles_image" class="media-object center-block"
                         src=""
                         style="width: 100px;height: auto;"/>
                <?php }
                ?>
            </div>

        </div>
    </div>
</div>

<?php if (!isset($one_data)) { ?>
    <div class="col-xs-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?> </h3>
            </div>
            <div class="panel-body">
                <?php if (isset($all_aktam) && (!empty($all_aktam))) { ?>
                    <table class="example table table-responsive table-bordered">

                        <thead>
                        <tr>
                            <th>م</th>
                            <th> الادارة</th>
                            <th> الختم</th>
                            <th> الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($all_aktam as $key => $ktm) {
                            ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $ktm->edara_n ?></td>
                                <td><a href="<?= base_url() . 'main_data/Aktam/download_file/' . $ktm->ktm ?>"
                                       download="">
                                        <i class="fa fa-download" title="تحميل"></i> </a>

                                    <a data-toggle="modal"
                                       onclick="$('#my_image').attr('src','<?= base_url() . 'uploads/' . $ktm->ktm_path . '/' . $ktm->ktm ?>');"
                                       data-target="#myModal2">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                </td>
                                <td>
                                    <a onclick='swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: true
                                            },
                                            function(){
                                            window.location="<?= base_url() . 'main_data/Aktam/update_ktm/' . base64_encode($ktm->id) ?>";
                                            });'>
                                        <i class="fa fa-pencil"> </i> </a>

                                    <a onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: true
                                            },
                                            function(){
                                            window.location="<?= base_url() . 'main_data/Aktam/delete_ktm/' . base64_encode($ktm->id) ?>";
                                            });'>
                                        <i class="fa fa-trash"> </i> </a>

                                </td>

                            </tr>
                            <?php
                        } ?>

                        </tbody>
                    </table>
                <?php } else {
                    ?>
                    <div class="alert-danger col-md-12 text-center ">

                        <h4> لا توجد بيانات ......</h4>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <img id="my_image" src="" width="100%" height="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="float: left"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    function set_img_magles(input) {
        if (!input.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#magles_image').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }


    }
</script>