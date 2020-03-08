<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart(base_url() . 'family_controllers/Setting/desc_service_setting') ?>
            <div class="col-md-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label>نوع الخدمة </label>
                    <select type="text" class="form-control " name="service" onchange="getf2at(this);"
                            data-validation="required">
                        <option>- إختر -</option>
                        <?php foreach ($service as $cat) { ?>
                            <option value="<?= $cat->id ?>"><?= $cat->name_ser ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label> الفئات </label>
                    <select type="text" class="form-control " name="cat_ser" id="cat_ser" data-validation="required">
                        <option>- إختر -</option>

                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label>وصف الخدمة </label>
                    <input type="text" class="form-control " name="description_ser"
                           value="" data-validation="required">

                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-success" value="1" name="save">حفظ</button>
            </div>
            <?php echo form_close() ?>



        </div>
    </div>
</div>
<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <table>
                <thead>
                <tr>
                    <th>نوع الخدمة</th>
                    <th>فئة الخدمة</th>
                    <th>وصف الفئة</th>
                    <th>الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
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