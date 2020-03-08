

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>lessons</title>
    <link rel="stylesheet" href="css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>
    <style>
        .popup-news-sidebar {
            padding: 8px;
            background-color: #fff;
            box-shadow: 2px 2px 8px;
            min-height: 524px;
        }
        .popup-news-sidebar img{
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
        #popup-news-img .carousel-control span{
            margin-top: -13px;
            font-size: 23px;
        }

        .popup-news-title {
            text-align: center;
            background-color: #005f7b;
            padding: 8px 0;
            box-shadow: 2px 2px 8px #999;
        }
        .popup-news-title a{
            color: #fff;
            text-decoration: none;
        }

        .gradient{

            background: rgb(242,246,248); /* Old browsers */
            background: -moz-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(242,246,248,1) 0%,rgba(216,225,231,1) 50%,rgba(181,198,208,1) 51%,rgba(224,239,249,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(242,246,248,1) 0%,rgba(216,225,231,1) 50%,rgba(181,198,208,1) 51%,rgba(224,239,249,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9',GradientType=0 ); /* IE6-9 */
        }
        .inline-block{
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

        /****************************/
        .news{
            height: 52px;
        }

        .form-group .help-block.form-error {
            color: #a94442 !important;
            font-size: 13px !important;
            position: absolute !important;
            bottom: auto !important;
            right: auto !important;
            left: 18px;
            top: 0;
        }
    </style>

</head>
<body>


<div class="col-xs-12 " >

    <?php
    if(isset($get_publisher) && $get_publisher!=null){
        $form = form_open_multipart("mobadra/Mobdra/UpdateNews/".$get_publisher["id"]);
    } else{
        $form =form_open_multipart("mobadra/Mobdra/news");
    }
    ?>
    <?php echo  $form;

    if(isset($get_publisher)&& $get_publisher['news_type']==2 ){
        $disp='block';
    }else{
        $disp='none';
    }

    ?>


    <div class="col-md-8">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> إدارة المبادرات</h3>
            </div>

            <div class="panel-body">
                <!--
                <div class="form-group col-md-4">
                    <label class="">  نوع الخبر</label>
                    <select class="form-control" name="news_type" id="news_type" onchange="showNewspaper()">
                        <option value="1" selected="selected">خبر بالجمعية</option>
                        <option value="2"
                            <?php
                            if(isset($get_publisher) &&  $get_publisher["news_type"]== 2){ echo 'selected';}
                            ?>
                        >الجمعية في الصحافة</option>
                    </select>

                </div>


                <div id="news_show" style="display: <?= $disp?>;">
                    <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class=""> اسم الجريدة</label>
                        <input type="text" name="newspaper_name" id="newspaper_name"
                               class="form-control "

                               value="<?php if(isset($get_publisher)){ echo $get_publisher["newspaper_name"];} ?>">

                    </div>

                    <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class=""> لينك الموقع</label>
                        <input type="text" name="newspaper_link" id="newspaper_link"
                               class="form-control "

                               value="<?php if(isset($get_publisher)){ echo $get_publisher["newspaper_link"];} ?>">

                    </div>
                </div>
-->
                <div class="form-group col-md-5  col-sm-6 padding-4">
                    <label class=""> عنوان المبادرة</label>
                    <input type="text" name="title" id="title"
                           class="form-control "
                           data-validation="required"
                           value="<?php if(isset($get_publisher)){ echo $get_publisher["title"];} ?>">

                </div>
                <div class="form-group col-md-5  col-sm-6 padding-4">
                    <label class=""> تاريخ النشر</label>
                    <input type="date" name="date" id="date"
                           class="form-control "
                           data-validation="required"
                           value="<?php if(isset($get_publisher)){ echo $get_publisher["date"];} ?>" >

                </div>


                <div class="form-group col-md-12">
                    <label class="">  تفاصيل المبادرة</label>
                    <textarea  name="details" id="editor"
                               class="form-control"
                               value="" ><?php if(isset($get_publisher)){ echo $get_publisher["details"];} ?></textarea>

                </div>

                <!-----------------------------------attachs------------------------------------->

                <div class="col-md-12">

                    <input type="hidden" id="count_row" value="0" />
                    <button type="button" class="btn btn-success btn-next add_attchments"
                            onclick="add_row_member()"

                    >    ألبوم صور   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>
                    <button type="button" class="btn btn-success btn-next add_attchments"
                            onclick="add_row_video()"

                    >     ارفاق فيديو   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>
                    <?php if(isset($result) && $result != null){ ?>
                        <table class="table table-bordered"   id="mytable">
                            <thead >
                            <tr class="success">
                                <th>م</th>
                                <th style="text-align: center">اسم الصورة </th>
                                <th style="text-align: center">الصورة </th>
                                <th style="text-align: center">عرض في الرئيسية </th>
                                <th style="text-align: center">الإجراء</th>
                            </tr>
                            </thead>
                            <?php if(isset($result) && !empty($result)){ ?>
                            <tbody  id="result_Table">
                            <?php
                            $x=0;
                            $y=1;

                            foreach ($result as $row){
                                $x++;
                                ?>
                                <tr>
                                    <td><?= $y++?></td>
                                    <td><?=$row->img_name ?></td>
                                    <td>

                                        <input type="hidden" class="attached_files" value="<?=$row->id?>" >

                                        <a href="<?php echo base_url() . 'mobadra/Mobdra/downloads_new/'.$row->img ?>" download>
                                            <i class="fa fa-download" title="تحميل"></i> </a>
                                        <a  data-toggle="modal" data-target="#myModal-view-<?=$row->id?>" >
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    </td>
                                    <td>
                                        <input type="radio" name="img_status" onchange="change_img(<?=$row->id?>,<?=$row->mobdra_id_fk?>);" value="<?php echo $x-1;?>" <?php if($row->img_status==1){ echo 'checked';}?>>
                                    </td>
                                    <td>
                                        <a id="delete_img" href="<?php echo base_url().'mobadra/Mobdra/DeletePhoto/'.$row->id."/".$row->mobdra_id_fk?>" onclick="deleteImg('<?= $row->img_status?>')">
                                            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                    </td>


                                </tr>
                                <!-- photo modal-->
                                <div class="modal fade" id="myModal-view-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"><?=$row->img_name;?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?=base_url()."uploads/images/public_relations/news/".$row->img?>" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- photo modal-->


                            <?php }
                            }  ?>
                            </tbody>

                        </table> <?php } else if (isset($result) && empty($result)) {
                        ?>
                        <table class="table table-bordered" id="mytable">
                            <thead>
                            <tr class="success">
                                <th>م</th>
                                <th style="text-align: center">اسم الصورة </th>
                                <th style="text-align: center">الصورة </th>
                                <th style="text-align: center">عرض في الرئيسية </th>
                                <th style="text-align: center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="result_Table">
                            <tr id="first_one">
                                <td colspan="5" style="text-align: center;color: red"> لا يوجد صور  </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>

                    <table class="table table-bordered"   id="mytable"  style="display: none">
                        <thead >
                        <tr class="success">
                            <th>م</th>
                            <th style="text-align: center">اسم الصورة </th>
                            <th style="text-align: center">الصورة </th>
                            <th style="text-align: center">عرض في الرئيسية </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="result_Table">



                        </tbody>
                    </table>
                </div>


                <!-- Video -->
                <div class="col-md-12">

                    <?php if(isset($video) && $video != null){ ?>
                        <table class="table table-bordered"   id="videotable">
                            <thead >
                            <tr class="success">
                                <th>م</th>
                                <th style="text-align: center">  لينك الفيديو</th>


                                <th style="text-align: center">الإجراء</th>
                            </tr>
                            </thead>
                            <?php if(isset($video) && !empty($video)){ ?>
                            <tbody  id="result_video">
                            <?php
                            $i=1;
                            foreach ($video as $video){ ?>
                                <tr>
                                    <td><?= $i++?></td>

                                    <td>

                                        <input type="hidden" class="attached_files" value="<?=$video->id?>" >

                                        <iframe src="<?= "https://www.youtube.com/embed/".$video->video_link?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                    </td>

                                    <td>
                                        <a href="<?php echo base_url().'mobadra/Mobdra/DeleteVideo/'.$video->id."/".$video->mobdra_id_fk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                    </td>


                                </tr>



                            <?php }
                            }  ?>
                            </tbody>

                        </table> <?php } else if (isset($video) && empty($video)) {
                        ?>
                        <table class="table table-bordered" id="videotable">
                            <thead>
                            <tr class="success">
                                <th>م</th>

                                <th style="text-align: center">لينك الفيديو </th>

                                <th style="text-align: center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="result_video">
                            <tr id="empty">
                                <td colspan="5" style="text-align: center;color: red"> لا يوجد فيديوهات  </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>

                    <table class="table table-bordered"   id="videotable"  style="display: none">
                        <thead >
                        <tr class="success">
                            <th>م</th>
                            <th style="text-align: center">لينك الفيديو </th>

                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="result_video">



                        </tbody>
                    </table>


                </div>


                <!-----------------------------------attachs------------------------------------->

                <div class="col-xs-12">
                    <input  type="submit" id="button" name="ADD"  value="حفظ ">

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> إدارة المبادرات</h3>
            </div>

            <div class="panel-body" style="min-height: 580px;">


                <div class="form-group padding-4">
                    <label class="">  الناشر</label>
                    <input type="text" name="publisher_name" id="publisher_name" value="<?= $publisher?>"
                           class="form-control " readonly

                           value="<?php if(isset($get_publisher)){ echo $get_publisher["publisher_name"];} ?>">

                </div>
                <div class="form-group padding-4">
                    <label class="">  حالة المبادرة</label>
                    <select class="form-control" name="n_status">
                        <option value="1" selected="selected">نشط </option>
                        <option value="2" <?php
                        if(isset($get_publisher) &&  $get_publisher["n_status"]== 2){ echo 'selected';}

                        ?>> غير نشط  </option>
                    </select>

                </div>
                <div class="form-group  padding-4">
                    <label class="">الكاتب (  Auther)</label>
                    <input class="form-control "  name="auther" id="auther"
                           value="<?php if(isset($get_publisher)){ echo $get_publisher["auther"];} ?>">

                </div>

                <div class="form-group  padding-4">
                    <label class="">الوسوم ( KeyWords)</label>
                    <textarea class="form-control" name="keywords" id="keywords" style="margin-bottom: 15px;">
                            <?php if(isset($get_publisher)){ echo $get_publisher["keywords"];} ?>
                        </textarea>
                </div>

                <div class="form-group  padding-4">
                    <label class=""> الوصف</label>
                    <input class="form-control "  name="description" id="description"
                           value="<?php if(isset($get_publisher)){ echo $get_publisher["description"];} ?>">

                </div>
                <?php  echo form_close()?>


            </div>
        </div>
    </div>











</div>













<script>
    function deleteRow(id){
        $("#" + id).remove();
    }
</script>


<script>
    function add_row_member(){
        $("#mytable").show();
        $("#first_one").remove();
        //  alert('show');

        var x = document.getElementById('result_Table');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>mobadra/Mobdra/get_publisher_photo',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result_Table").append(html);

            }
        });
    }


</script>

<script>
    function add_row_video(){
        $("#videotable").show();
        $("#empty").remove();

        var x = document.getElementById('result_video');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>mobadra/Mobdra/get_publisher_video',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result_video").append(html);

            }
        });
    }


</script>

<script>
    function showNewspaper() {
        var news_type = $('#news_type').val();
        if (news_type == 2) {
            $('#news_show').show();
        }
        else {
            $('#news_show').hide();
        }
    }
</script>
<script>
    function deleteImg(status) {
        if (status == 1){
            alert("من فضلك اختر صورة اخري للعرض في الرئيسية اولا ");
            $('#delete_img').attr("href", "#");
        }
        else{
            return confirm("هل أنت متأكد من عملية الحذف");
        }

    }
</script>

<script>

    function change_img(row_id,news_id_fk) {
        var id = row_id;
        var news_id_fk=news_id_fk;

        var dataString   ='id=' + id+'&news_id_fk=' + news_id_fk;
        var option = $("input[name='img_status']:checked").val();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>mobadra/Mobdra/Updateimage',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){
                alert("تم بنجاح !...  العرض في الرئسيه ");





            }
        });

    }

</script>
