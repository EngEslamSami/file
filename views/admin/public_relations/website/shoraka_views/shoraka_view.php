<style>
    .popup-news-sidebar {
        padding: 8px;
        background-color: #fff;
        box-shadow: 2px 2px 8px;
        min-height: 524px;
    }

    .popup-news-sidebar img {
        min-height: 170px;
    }

    p.time {
        padding: 10px 3px;
        background-color: #009e81;
        color: #fff;
        margin-top: 5px;
        padding-right: 8px;
    }

    p.views {
        padding: 10px 3px;
        background-color: #007b0f;
        color: #fff;
        margin-top: 5px;
        padding-right: 8px;
    }

    p.comments {
        padding: 10px 3px;
        background-color: #005f7b;
        color: #fff;
        margin-top: 5px;
        padding-right: 8px;
    }

    #popup-news-img {
        margin-bottom: 20px;
        border: 1px solid #999;
        box-shadow: 2px 2px 8px;
    }

    #popup-news-img .carousel-control {
        position: absolute;
        top: 44%;

        width: 30px;
        height: 30px;
        background-color: #999;
        font-size: 16px;

    }

    #popup-news-img .carousel-control span {
        margin-top: -13px;
        font-size: 23px;
    }

    .popup-news-title {
        text-align: center;
        background-color: #005f7b;
        padding: 8px 0;
        box-shadow: 2px 2px 8px #999;
    }

    .popup-news-title a {
        color: #fff;
        text-decoration: none;
    }

    .gradient {

        background: rgb(242, 246, 248); /* Old browsers */
        background: -moz-linear-gradient(top, rgba(242, 246, 248, 1) 0%, rgba(216, 225, 231, 1) 50%, rgba(181, 198, 208, 1) 51%, rgba(224, 239, 249, 1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(242, 246, 248, 1) 0%, rgba(216, 225, 231, 1) 50%, rgba(181, 198, 208, 1) 51%, rgba(224, 239, 249, 1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(242, 246, 248, 1) 0%, rgba(216, 225, 231, 1) 50%, rgba(181, 198, 208, 1) 51%, rgba(224, 239, 249, 1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f2f6f8', endColorstr='#e0eff9', GradientType=0); /* IE6-9 */
    }

    .inline-block {
        display: inline-block;
        width: 100%
    }

    p.details {
        line-height: 25px;
        font-size: 15px;
    }

    .modal.popup-news .modal-header .close {
        margin-top: -9px;
        background-color: #ff0000;
        opacity: 0.7;
        padding: 0px 5px;
        color: #fff;
        outline: none;
    }

    .modal.popup-news .modal-footer {
        padding: 3px 10px;
    }
</style>


<div class="col-xs-12 no-padding">

    <div class="col-md-8 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?> </h3>
            </div>

            <div class="panel-body">
                <?php
                $status_name = array(' نشط', ' غير نشط  ');
                if ((isset($sherak_data)) && (!empty($sherak_data))) {
                    echo form_open_multipart(base_url() . 'public_relations/website/shoraka/Shoraka/update_Shoraka/' . base64_encode($id));
                    $name = $sherak_data->name;
                    $address = $sherak_data->address;
                    $link = $sherak_data->link;
                    $status = $sherak_data->status;
                    $logo = base_url() . 'uploads/images/' . $sherak_data->logo;
                } else {
                    echo form_open_multipart(base_url() . 'public_relations/website/shoraka/Shoraka/insert_shoraka');
                    $name = '';
                    $address = '';
                    $link = '';
                    $status = '';


                } ?>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>الإسم </label>
                    <input type="text" name="name" class="form-control" value="<?= $name ?>" placeholder="">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>العنوان</label>
                    <input type="text" name="address" class="form-control" value="<?= $address ?>" placeholder="">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>اللوجو</label>
                    <input type="file" name="logo" class="form-control"
                           onchange=" load_image(this)" <?php if ((isset($logo)) && (!empty($logo))) {}else{
                        echo 'data-validation="required"';
                    } ?>>
                </div>

                <div class="form-group col-md-8 col-sm-8 col-xs-12">
                    <label>اللينك </label>
                    <input type="text" name="link" class="form-control" value="<?= $link ?>" placeholder="">
                </div>

                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label>الحالة</label>
                    <select name="status_name" class="form-control" >
                        <?php foreach ($status_name as $key => $value) {
                            ?>
                            <option value="<?= $key ?>" <?php if (($key == $status)) {
                                echo 'selected';
                            } ?> ><?= $value ?></option>
                            <?php
                        } ?>
                    </select>
                </div>


                <div class="form-group col-xs-12">
                    <button class="btn btn-success mtop-10" name="btn" value="1"> حفظ</button>

                </div>

                <?php form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?> </h3>
            </div>

            <div class="panel-body" style="min-height: 230px;">
                <div class="container-center ">

                    <img id="image_shoraka" <?php if ((isset($logo)) && (!empty($logo))) {
                        echo 'src="' . $logo . '"';
                    } ?> width="50%" height="50%">
                </div>


            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="popup-news modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body inline-block gradient" style="">
                    <div class="col-xs-12">
                        <!--                        <h5 class="popup-news-title"><a href="#">ضربة جديدة للمقاتلة الأميركية الأغلى في التاريخ</a>-->
                        <!--                            </h5>-->
                        <!--                            <hr>-->
                        <div class="text-center">
                            <img id="image_shoraka_pop" width="200" height="200">
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr class="info">
                                <th> اسم الشريك</th>
                                <th> العنوان الشريك</th>
                                <th> اللينك الشريك</th>
                                <th> الحالة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><label id="name_shoraka"> </label></td>
                                <td><label id="address_shoraka"> </label></td>
                                <td><label id="link_shoraka"> </label></td>
                                <td><label id="status_shoraka"> </label></td>
                            </tr>
                            </tbody>

                        </table>


                    </div>


                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <?php if ((isset($all_shoraka)) && (!empty($all_shoraka))) { ?>
        <div class="col-md-12">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title">شركاء النجاح</h3>
                </div>

                <div class="panel-body" style="min-height: 230px;">
                    <table class="table-bordered table table-responsive">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>أسم شريك النجاح</th>
                            <th>العنوان</th>
                            <th>الحالة</th>
                            <th>تفاصيل</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($all_shoraka as $key => $sharek) {
                            ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $sharek->name ?></td>
                                <td><?= $sharek->address ?></td>
                                <td><?= $sharek->status_name ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"

                                            data-target="#myModal" onclick="set_data_intopop(<?= $sharek->id ?>)">
                                        التفاصيل
                                    </button>
                                </td>
                                <td>
<!--                                    --><?php //echo base_url() . 'public_relations/website/shoraka/Shoraka/delete_shoraka/' . base64_encode($sharek->id) ?>
                                    <a onclick="if(confirm('هل متأكد من حذف هذة الفئة وما فيها من وصف لها  ؟!!')){
                                            window.location='<?= base_url() . 'public_relations/website/shoraka/Shoraka/delete_shoraka/' . base64_encode($sharek->id) ?>';
                                            }"
                                       href="#">
                                        <i class="fa fa-trash"></i></a>
                                    <a href="<?php echo base_url() . 'public_relations/website/shoraka/Shoraka/update_Shoraka/' . base64_encode($sharek->id) ?>">
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

<!--onchange=" readURL(this)"-->
<script>
    function load_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('image_shoraka').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function set_data_intopop(id) {

        console.log(' id : ' + id);
        var request = $.ajax({
            url: "<?php echo base_url() . 'public_relations/website/shoraka/Shoraka/select_data'?>",
            type: "POST",
            data: {id: id},
        });
        request.done(function (msg) {

            var obj = JSON.parse(msg);

            console.log('row ' + obj.id);
            document.getElementById('name_shoraka').innerHTML = obj.name;
            document.getElementById('address_shoraka').innerHTML = obj.address;
            document.getElementById('link_shoraka').innerHTML = obj.link;
            document.getElementById('status_shoraka').innerHTML = obj.status_name;
            var img = '<?php echo base_url() . 'uploads/images/'?>' + (obj.logo);
            console.log('logo: ' + img);

            document.getElementById('image_shoraka_pop').setAttribute('src', img);

            // }


        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
</script>