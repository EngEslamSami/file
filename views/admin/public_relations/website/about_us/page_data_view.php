<style>
label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .form-group {
        margin-bottom: 0px;
    }
    .bootstrap-select>.btn {
        width: 100%;
        padding-right: 5px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important; 
        left: 4px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }
    .form-control{
        font-size: 15px;
        color: #000;
        border-radius: 4px;
        border: 2px solid #b6d089 !important;
    }
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
    .has-success  .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    </style>


<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>

        <div class="panel-body">

            <?php
            $page_status_name = array('غير نشط', 'نشط');
            $have_sub_name = array('لا', 'نعم');
            if ((isset($page_data)) && (!empty($page_data))) {
                echo form_open_multipart(base_url() . 'public_relations/website/about_us/About_us/update_page_data/' . base64_encode($id));
                $tilte = $page_data->title;
                $content = $page_data->content;
                $img = $page_data->img;
                $option = '<option value="' . $page_data->main_page . '"> ' . $page_data->page_title . '</option>';

            } else {
                $tilte = '';
                $content = '';
                $img = '';
                $option = '<option> -أختر-</option>';
                echo form_open_multipart(base_url() . 'public_relations/website/about_us/About_us/insert_page_data');
            } ?>

            <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half"> اسم الصفحة </label>
                <select type="text" name="page_id_fk" class="form-control half" data-validation="required">
                    <?= $option ?>

                    <?php foreach ($pages as $value) {
                        ?>
                        <option value="<?= $value->id ?>"><?= $value->page_title ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="col-xs-12 no-padding">
                <div class="form-group col-sm-8 col-xs-12">
                    <label class="label label-green  half"> عنوان </label>
                    <input type="text" name="title" class="form-control half" value="<?= $tilte ?>" data-validation="required">
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> صورة </label>
                    <input type="file" name="img" class="form-control half" value="">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <img src="<?php echo base_url() . 'uploads/images/' . $img ?>" alt="" width="50%" height="50%">
                </div>
            </div>
            <div class="col-xs-12 no-padding ">
                <div class="form-group col-xs-12">
                    <label class="label label-green  "> تفاصيل </label>
                    <textarea id="editor" type="text" name="content" class="form-control " data-validation="required"><?= $content ?></textarea>
                </div>

            </div>
            

            <div class="col-xs-12 text-center">
            <br />
                <button type="submit" name="btn" value="1" class="btn btn-success"> حفظ</button>
            </div>

            <?php if ((isset($pages_data)) && (!empty($pages_data))) { ?>
                <div class="col-xs-12">
                    <br>
                    <table class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>اسم الصفحة</th>
                            <th>عنوان</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pages_data as $key => $page_data) { ?>
                            <tr>
                                <td><?php echo ++$key ?></td>
                                <td><?php echo $page_data->page_title ?></td>
                                <td><?php echo $page_data->title ?></td>
                                <td>
                                    <a onclick="alert('هل انت متأكد من حذف ؟!!')"
                                       href="<?php echo base_url() . 'public_relations/website/about_us/About_us/delete_pages_data/' . base64_encode($page_data->id) ?>">
                                        <i class="fa fa-trash"></i></a>
                                    <a href="<?php echo base_url() . 'public_relations/website/about_us/About_us/update_page_data/' . base64_encode($page_data->id) ?>">
                                        <i class="fa fa-pencil"></i></a>
                                    <a data-toggle="modal" data-target="#exampleModal<?= $page_data->id ?>">
                                        <i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            <?php } ?>
            <?php if ((isset($pages_data)) && (!empty($pages_data))) { ?>
                <?php foreach ($pages_data as $key => $page_data) { ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $page_data->id ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog" role="document" style="width: 80%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">عرض تفاصيل المقطع</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="well well-sm" style="height: auto;"><?= $page_data->title ?></div>
                                    <div class="text-center pbottom-10">
                                        <img src="<?= base_url() . 'uploads/images/' . $page_data->img ?>"
                                             alt="<?= $page_data->title ?>" width="50%" height="50%">
                                    </div>

                                    <div class="paragraph">
                                        <p><?= $page_data->content ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق
                                    </button>
                                    <!--                                    <button type="button" class="btn btn-primary">Save changes</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>