<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if ((isset($service_details)) && (!empty($service_details))) {
                echo form_open_multipart(base_url() . 'public_relations/website/setting_service/Setting_service/service_setting_update/' . base64_encode($service_details->id));
                $name_ser = $service_details->name_ser;
                $description_ser = $service_details->description_ser;
                $cat_ser = $service_details->cat_ser;
                $input_show = $service_details->input_show;
                $doc = $service_details->doc;
                $con = $service_details->con;

            } else {
                $name_ser=$description_ser=$cat_ser=$input_show=$doc=$con='';
                echo form_open_multipart(base_url() . 'public_relations/website/setting_service/Setting_service/service_setting');
            } ?>
<!--            --><?php //echo form_open_multipart(base_url() . 'family_controllers/Setting/service_setting') ?>
            <div class="col-md-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label>نوع الخدمة </label>
                    <input type="text" class="form-control " name="name_ser"
                           value="<?=$name_ser?>" data-validation="required">
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label>وصف الخدمة </label>
                    <input type="text" class="form-control " name="description_ser"
                           value="<?=$description_ser?>" data-validation="required">

                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label> الفئات المستهدفة </label>
                    <select type="text" class="form-control " name="cat_ser" data-validation="required">
                        <option>- إختر -</option>
                        <?php foreach ($categores as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                            <?php if((!empty($cat_ser))&&($cat_ser->id == $cat->id)) {
                                echo 'selected';
                            }?>
                            ><?= $cat->title ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>


            <div class="col-md-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th><label> الضوابط والشروط </label></th>
                            <th><a onclick="apen('cond_asked','cond_asked','text','','')"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="cond_asked">
                        <?php
                        if (isset($con) && !empty($con)) {
                            foreach ($con as $item3) { ?>
                                <tr>
                                    <td><input class="form-control" type="text" name="cond_asked[]"
                                               value="<?= $item3->cond_asked ?>"></td>
                                    <td><a href="" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th><label>المستندات المطلوبة </label></th>
                            <th><a onclick="apen('docm_asked','docm_asked','text','','')"><i class="fa fa-plus-square-o"
                                                                                             aria-hidden="true"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="docm_asked">
                        <?php
                        if (isset($doc) && !empty($doc)) {
                            foreach ($doc as $item3) { ?>
                                <tr>
                                    <td><input class="form-control" type="text" name="docm_asked[]"
                                               value="<?= $item3->doc_asked ?>"></td>
                                    <td><a href="#" onclick="remove(this)"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></a></td>
                                </tr>
                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="col-md-12">
                <label>المدخلات المرتبطة بنوع هذه الخدمة </label>
                <br>
                <div class="form-group col-sm-1 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="1"  <?php if(!empty($input_show)){ if (in_array(1,$input_show))echo 'checked'; } ?>>
                    <label>العدد </label>
                </div>
                <div class="form-group col-sm-1 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="2" <?php if(!empty($input_show)){ if (in_array(2,$input_show))echo 'checked'; } ?>>
                    <label>المبلغ </label>
                </div>
                <div class="form-group col-sm-2 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="3" <?php if(!empty($input_show)){ if (in_array(3,$input_show))echo 'checked'; } ?>>
                    <label>رقم الفاتورة </label>
                </div>
                <div class="form-group col-sm-2 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="4" <?php if(!empty($input_show)){ if (in_array(4,$input_show))echo 'checked'; }  ?>>
                    <label>رقم جهاز </label>
                </div>
                <div class="form-group col-sm-2 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="5" <?php if(!empty($input_show)){ if (in_array(6,$input_show))echo 'checked'; } ?>>
                    <label> السن </label>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success" value="1" name="save">حفظ</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php if ((isset($services)) && (!empty($services))) { ?>
    <div class="col-xs-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>نوع الخدمة</th>
                        <th>وصف الخدمة</th>
                        <th>تفاصيل الخدمة</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($services as $key => $item) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $item->name_ser ?></td>
                            <td><?= $item->description_ser ?></td>
                            <td>
                                <a onclick="details_service_by('<?=base64_encode($item->id)?>')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                            </td>
                            <td>
                                <a href="<?= base_url() . 'public_relations/website/setting_service/Setting_service/service_setting_update/' . base64_encode($item->id) ?>"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="#" onclick="confirm_delete('<?= base64_encode($item->id) ?>');"><i
                                            class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تفاصيل الخدمة   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="pop_body_details">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> أغلاق </button>
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<script>
    function confirm_delete(id) {

        if (confirm('هل متأكد من حذف هذه الخدمة وبما فيها من فئات و شروط ؟!!')) {
            window.location = '<?= base_url() . 'public_relations/website/setting_service/Setting_service/service_setting_delete/'?>' + id;
        }
    }

    function remove(name) {
        $(name).parents('tr').remove();
    }
    function apen(id, name_input, type, valid, max) {

        var html = '<tr>' + '<td> <input class="form-control" type="' + type + '" name="' + name_input + '[]" maxlength="' + max + '" onkeypress="' + valid + '" ></td> <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';

        $('#' + id).append(html);
    }

    function remove(name) {
        $(name).parents('tr').remove();
    }
    function details_service_by(id) {

        var request = $.ajax({
            url: "<?php echo base_url() . 'public_relations/website/setting_service/Setting_service/details_service_by'?>",
            type: "POST",
            data: {service_id: id},
        });
        request.done(function (msg) {
           document.getElementById('pop_body_details').innerHTML=msg;
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
</script>