<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart(base_url() . 'family_controllers/Setting/service_setting') ?>
            <div class="col-md-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label>نوع الخدمة </label>
                    <input type="text" class="form-control " name="name_ser"
                           value="" data-validation="required">
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label>وصف الخدمة </label>
                    <input type="text" class="form-control " name="description_ser"
                           value="" data-validation="required">

                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label> الفئات المستهدفة </label>
                    <select type="text" class="form-control " name="cat_ser" data-validation="required">
                        <option>- إختر -</option>
                        <?php foreach ($categores as $cat) { ?>
                            <option value="<?= $cat->id ?>"><?= $cat->title ?></option>
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
                            <th><a onclick="apen('cond_asked','cond_asked','text','','')"><i class="fa fa-plus-square-o"
                                                                                             aria-hidden="true"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="cond_asked">
                        <?php
                        if (isset($emails) && !empty($emails)) {
                            foreach ($emails as $item3) { ?>
                                <tr>
                                    <td><input class="form-control" type="email" name="email[]"
                                               value="<?= $item3->email ?>"></td>
                                    <td><a href="#" onclick="remove(this)"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></a></td>
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
                        if (isset($emails) && !empty($emails)) {
                            foreach ($emails as $item3) { ?>
                                <tr>
                                    <td><input class="form-control" type="email" name="email[]"
                                               value="<?= $item3->email ?>"></td>
                                    <td><a href="#" onclick="remove(this)"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></a></td>
                                </tr>
                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            <!--    <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th><label>الفئات الخاصة بهذه الخدمة </label></th>
                            <th>
                                <a onclick="apen('cat_serv','cat_serv','text','','')"><i class="fa fa-plus-square-o"
                                                                                         aria-hidden="true"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="cat_serv">
                        <?php
                        if (isset($emails) && !empty($emails)) {
                            foreach ($emails as $item3) { ?>
                                <tr>
                                    <td><input class="form-control" type="email" name="email[]"
                                               value="<?= $item3->email ?>"></td>
                                    <td><a href="#" onclick="remove(this)"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></a></td>
                                </tr>
                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>-->

            </div>

            <div class="col-md-12">
                <label>المدخلات المرتبطة بنوع هذه الخدمة </label>
                <br>
                <div class="form-group col-sm-1 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="1">
                    <label>العدد </label>
                </div>
                <div class="form-group col-sm-1 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="2">
                    <label>المبلغ </label>
                </div>
                <div class="form-group col-sm-2 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="3">
                    <label>رقم الفاتورة </label>
                </div>
                <div class="form-group col-sm-2 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="4">
                    <label>رقم جهاز </label>
                </div>
                <div class="form-group col-sm-2 " style="display: -webkit-inline-box;">
                    <input name="input_show[]" type="checkbox" value="5">
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
<script>

    function apen(id, name_input, type, valid, max) {

        var html = '<tr>' + '<td> <input class="form-control" type="' + type + '" name="' + name_input + '[]" maxlength="' + max + '" onkeypress="' + valid + '" ></td> <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';

        $('#' + id).append(html);
    }

    function remove(name) {
        $(name).parents('tr').remove();
    }
</script>