<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> فيديوهات البث المباشر</h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($get_video) && $get_video != null) {
                $form = form_open_multipart("public_relations/website/library/Live_videos_library/Update/" . $get_video->id);
            } else {
                $form = form_open_multipart("public_relations/website/library/Live_videos_library/videos");
            }
            ?>
            <?php echo $form;
            ?>

            <div class="col-md-12">


                <input type="hidden" id="count_row" value="0"/>
                <button type="button" class="btn btn-success btn-next add_attchments btn-labeled"
                        onclick="add_row_video()"><span class="btn-label"><i class="fa fa-plus"></i></span> اضافة فيديو </button>
                <br><br>

            </div>

            <div class="col-md-12">


                <table class="table table-bordered" id="videotable" style="display: none">
                    <thead>
                    <tr class="success">
                        <th>م</th>
                        <th>عنوان الرابط</th>
                        <th>تاريخ بداية الوقف</th>
                        <th>تاريخ نهاية الوقف</th>
                        <th style="text-align: center">رابط البث</th>

                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="result_video">


                    </tbody>
                </table>


            </div>
            <div class="col-xs-12 text-center">
                <button type="submit" id="button" name="ADD" value="حفظ " class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ</button>

            </div>

        </div>
        <?php
        echo form_close();
        ?>
    </div>
</div>

<?php
if (isset($get_videos) && !empty($get_videos)) {
    $x = 1;


    ?>
    <div class="col-xs-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> مكتبة الفيديوهات</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd">
                      
                        <th>م</th>
                        <th>عنوان الرابط</th>

                        <th>رابط البث</th>

                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($get_videos as $video) {
                        ?>
                        <tr>
                        
                            <td><?= $x++ ?></td>
                            <td><?= $video->title ?></td>
                            <td>
                                <iframe width="40%" height="100"
                                        src="https://www.youtube.com/embed/<?= $video->video_link ?>" frameborder="0"
                                        allow="autoplay; encrypted-media" allowfullscreen></iframe>

                            </td>
                            <td>
                                <a href="<?= base_url() . "public_relations/website/library/Live_videos_library/Delete/" . $video->id ?>"
                                   onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
<a   data-toggle="modal"data-target="#detailsModal"
 onclick="load_page(<?= $video->id ?>);"><i class="fa fa-pencil"> </i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>

                </table>


            </div>

        </div>
    </div>
    <?php
}
?>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> رابط الفيديو  </h4>
            </div>
            <div class="modal-body" id="details_result">
          
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php

                ?>
               
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>

<script>
    function add_row_video() {
        $("#videotable").show();
        $("#empty").remove();

        var x = document.getElementById('result_video');
        var len = x.rows.length + 1;
        var dataString = 'length=' + len;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>public_relations/website/library/Live_videos_library/get_videos',
            data: dataString,
            dataType: 'html',

            cache: false,
            success: function (html) {

                $("#result_video").append(html);

            }
        });
    }


</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>

    function save_me() {
        Swal.fire({
            title: "هل تريد   إضافة الموظفين الي الإدارة التنفيذية!",
            text: "",
            type: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3c990b',
            cancelButtonColor: '#d33',
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالحفظ !",
        }).then((result) => {
            if (result.value) {
                $('#myform').submit();

            }
        });
    }

</script>


<script>


    function get_Main_video(value) {


        Swal.fire({
            title: "هل تريد إضافة الفيديو إلي الصفحة الرئيسية !!",
            text: "",
            type: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3c990b',
            cancelButtonColor: '#d33',
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالإضافة !",
        }).then((result) => {
            if (result.value) {
                var dataString = 'id=' + value;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>public_relations/website/library/Live_videos_library/get_Main_video',
                    data: dataString,
                    cache: false,
                    success: function (json_data) {
                        var JSONObject = JSON.parse(json_data);
                        //console.log(JSONObject);
                        window.location.reload()
                    }
                });

            }
        });


    }

</script>
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>public_relations/website/library/Live_videos_library/load_details",
            data: {row_id: row_id},
            success: function (d) {
               $('#details_result').html(d);

            }

        });

    }
</script>