<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if ((isset($f2at)) && (!empty($f2at))) {
                echo form_open_multipart(base_url() . 'family_controllers/Setting/cat_service_setting_uptate/'.base64_encode($f2at->id));
$cat_serv=$f2at->cat_name;
$ser=$f2at->ser_id_fk;
            } else {
                $cat_serv='';
                $ser=0;
                echo form_open_multipart(base_url() . 'family_controllers/Setting/cat_service_setting');
            } ?>
            <div class="col-md-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label>نوع الخدمة </label>
                    <select type="text" class="form-control " name="service"
                            data-validation="required">
                        <option>- إختر -</option>
                        <?php foreach ($service as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                            <?php if($ser == $cat->id)echo 'selected'?>
                            ><?= $cat->name_ser ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label>فئة الخدمة </label>
                    <input type="text" class="form-control " name="cat_serv"
                           value="<?=$cat_serv?>" data-validation="required">

                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-success" value="1" name="save">حفظ</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php if ((isset($cat_service)) && (!empty($cat_service))) { ?>
    <div class="col-xs-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title2; ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>نوع الخدمة</th>
                        <th>فئة الخدمة</th>
                        <th>وصف الفئة</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cat_service as $key => $value) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $value->name_ser ?></td>
                            <td><?= $value->cat_name ?></td>
                            <td>
                                <a href="<?= base_url() . 'family_controllers/Setting/cat_service_setting_delete/' .base64_encode( $value->id )?>"
                                   onclick="alert('هل انت متأكد من الخذف ؟!!');"><i class="fa fa-trash"></i></a>
                                <a href="<?= base_url() . 'family_controllers/Setting/cat_service_setting_uptate/' . base64_encode($value->id) ?>"><i
                                            class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    function getf2at(obj) {
        console.log('value select ' + obj.value);
        var select_to_append = document.getElementById('cat_ser');
        var request = $.ajax({
            url: "<?php echo base_url() . 'family_controllers/Setting/getf2at_service'?>",
            type: "POST",
            data: {service_id: obj.value},
        });
        request.done(function (msg) {
            remove_options(select_to_append);
            if (msg === 'false') {
                console.log(" if json " + msg);
                select_to_append.options[select_to_append.options.length] = new Option('لا يوجد فئات لهذه الخدمة', '');

            } else {
                // console.log(" else json " + msg);
                var obj = JSON.parse(msg);
                for (var i = 0; i < obj.length; i++) {
                    var row = obj[i];
                    console.log('row[' + i + ']' + row.id);
                    select_to_append.options[select_to_append.options.length] = new Option(row.cat_name, row.id);
                }
            }
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }

    function remove_options(select_obj) {
        select_obj.options.length = 0;

    }
</script>