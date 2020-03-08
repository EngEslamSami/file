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
            if ((isset($page)) && (!empty($page))) {
                echo form_open_multipart(base_url() . 'public_relations/website/about_us/About_us/update_page/' . base64_encode($id));
                $page_title = $page->page_title;
                $page_order = $page->page_order;
                $page_status = $page->page_status;
                $have_sub = $page->have_sub;
            } else {
                $page_title = '';
                $page_order = '';
                $page_status = '';
                $have_sub = '';
                echo form_open_multipart(base_url() . 'public_relations/website/about_us/About_us/insert_pages');
            } ?>
            <div class="form-group col-sm-5 col-xs-12">
                <label class="label label-green  half"> اسم الصفحة </label>
                <input type="text" name="page_title" class="form-control half" value="<?= $page_title ?>" data-validation="required">
            </div>
            <div class="form-group col-sm-2 col-xs-12">
                <label class="label label-green  half"> ترتيب الصفحة </label>
                <input type="text" name="page_order" class="form-control half" value="<?= $page_order ?>" data-validation="required">
            </div>
            <div class="form-group col-sm-2 col-xs-12">
                <label class="label label-green  half"> حالة الصفحة </label>
                <select type="text" name="page_status" class="form-control half" data-validation="required">
                    <option> -أختر-</option>
                    <?php foreach ($page_status_name as $key => $value) {
                        ?>
                        <option value="<?= $key ?>" <?php if (($key == $page_status  )&&($page_status !='') ) {
                            echo 'selected';
                        } ?> ><?= $value ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="form-group col-sm-3 col-xs-12">
                <label class="label label-green  half"> هل يوجد مقاطع في الصفحة </label>
                <select type="text" name="have_sub" class="form-control half" data-validation="required">
                    <option> -أختر-</option>
                    <?php foreach ($have_sub_name as $key => $value) {
                        ?>
                        <option value="<?= $key ?>" <?php if (( $key==$have_sub )&&($have_sub !='')) {
                            echo 'selected';
                        } ?> ><?= $value ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="col-xs-12 text-center">
            <br />
                <button type="submit" name="btn" value="1" class="btn btn-success"> حفظ</button>
            </div>
            <?php echo form_close() ?>
            <?php if ((isset($pages)) && (!empty($pages))) { ?>
                <div class="col-xs-12">
                    <br>
                    <table class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>اسم الصفحة</th>
                            <th>الترتيب</th>
                            <th>الحالة</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pages as $key => $page) { ?>
                            <tr>
                                <td><?php echo ++$key ?></td>
                                <td><?php echo $page->page_title ?></td>
                                <td><?php echo $page->page_order ?></td>
                                <td><?php echo $page->page_status_name ?></td>
                                <td>
                                    <a onclick="alert('هل انت متأكد من حذف ؟!!')"
                                       href="<?php echo base_url() . 'public_relations/website/about_us/About_us/delete_pages/' . base64_encode($page->id) ?>">
                                        <i class="fa fa-trash"></i></a>
                                    <a href="<?php echo base_url() . 'public_relations/website/about_us/About_us/update_page/' . base64_encode($page->id) ?>">
                                        <i class="fa fa-pencil"></i></a>

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>