<style>
    /*********** upload malti img ****/
    .block {
        background-color: rgba(255, 255, 255, 0.5);
        margin: 0 auto;
        margin-bottom: 30px;
        text-align: center;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    label.button {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background-color: #c72530;
        border: 1px solid #eee;
        color: #fff;
        padding: 7px 15px;
        margin: 5px 0;
        display: inline-block;
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;
    }

    label.button:hover {
        color: #c72530;
        background-color: #fff;
        border: 1px solid #ccc;
        cursor: pointer;
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;
    }

    input#images {
        display: none;
    }

    #multiple-file-preview {
        border: 1px solid #eee;
        margin-top: 10px;
        padding: 10px;
    }

    #files1 {
        border: 1px solid #eee;
        margin-top: 10px;
        padding: 10px;
    }

    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        min-height: 110px;
    }

    #sortable li {
        margin: 3px 3px 3px 0;
        float: left;
        width: 100px;
        height: 104px;
        text-align: center;
        position: relative;
        background-color: #FFFFFF;
    }

    #sortable li,
    #sortable li img {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    #sortable img {
        height: 104px;
    }

    .closebtn {
        color: #c72530;
        font-weight: bold;
        position: absolute;
        right: -1px;
        border-radius: 4px;
        padding: 0px 5px 0px 5px;
        background-color: #fff;
    }

    .closebtn h6 {
        font-size: 20px;
        margin: 0;
    }

    .r-img-message h2 {
        padding-top: 4px;
    }

    .r-img-message img {
        width: 100%;
        height: 75px;
        border-radius: 5px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    
    
    .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle), .input-group-btn:last-child>.btn-group:not(:last-child)>.btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    display: none;
  }
</style>

<div class="modal fade" id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="esnad3" name="esnad_to" class="sarf_types" value="3"
                               onclick="load_tahwel()">
                        <label for="esnad3" class="radio-label"> اداره</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad2" name="esnad_to" class="sarf_types" value="2"
                               onclick="load_tahwel()">
                        <label for="esnad2" class="radio-label"> قسم</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad1" name="esnad_to" class="sarf_types" value="1"
                               onclick="load_tahwel()">
                        <label for="esnad1" class="radio-label"> موظف</label>
                    </div>
                </div>
                <div class="col-xs-12" id="tawel_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="motb3aModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="esnad_motbaa3" name="esnad_motbaa_to" class="sarf_types" value="3"
                               onclick="load_motbaa()">
                        <label for="esnad_motbaa3" class="radio-label"> اداره</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad_motbaa2" name="esnad_motbaa_to" class="sarf_types" value="2"
                               onclick="load_motbaa()">
                        <label for="esnad_motbaa2" class="radio-label"> قسم</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad_motbaa1" name="esnad_motbaa_to" class="sarf_types" value="1"
                               onclick="load_motbaa()">
                        <label for="esnad_motbaa1" class="radio-label"> موظف</label>
                    </div>
                </div>
                <div class="col-xs-12" id="motb3a_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="etlaaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="esnad_etlaa3" name="esnad_etlaa_to" class="sarf_types" value="3"
                               onclick="load_etlaa()">
                        <label for="esnad_etlaa3" class="radio-label"> اداره</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad_etlaa2" name="esnad_etlaa_to" class="sarf_types" value="2"
                               onclick="load_etlaa()">
                        <label for="esnad_etlaa2" class="radio-label"> قسم</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad_etlaa1" name="esnad_etlaa_to" class="sarf_types" value="1"
                               onclick="load_etlaa()">
                        <label for="esnad_etlaa1" class="radio-label"> موظف</label>
                    </div>
                </div>
                <div class="col-xs-12" id="etlaa_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 padding-4">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-plus-square"></i> إنشاء رسالة جديدة </h3>
        </div>
        <div class="panel-body " style="background-color: #fff;">
            <?php
                $need_replay = '';
                $important_degree = '';
                echo form_open_multipart('all_secretary/email/Emails/add_email',array('id'=>'email_form'));
            ?>
            <div class="col-sm-8 padding-4">
              <input type="hidden" name="input_from_rokect" id="input_from_rokect" value="0">
                <div class="form-group col-xs-4 no-padding">
                    <label class="label "> الي</label>
                    <input type="text" class="form-control"
                           placeholder=" حدد المستخدم أو القسم" type="text" style="width: 82%;float: right;"
                           name="to_user_n" id="to_user_n"
                           readonly="readonly"
                           data-toggle="modal"
                           data-target="#tahwelModal"
                           value="">
                    <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                    <input type="hidden" name="tawel_id" id="tawel_id" value="">
                    <button type="button"
                            data-toggle="modal"
                            data-target="#tahwelModal"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>

                <div class="form-group col-sm-4 padding-4">
                    <label class="label">نسخة للمتابعة</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="" id=""
                           readonly="readonly"
                           data-toggle="modal"
                           data-target="#motb3aModal"
                           style="width: 82%;float: right;"
                           value="">
                    <input type="hidden" name="" id="" value="">
                    <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                    <input type="hidden" name="tawel_id" id="tawel_id" value="">
                    <button type="button"
                            data-toggle="modal"
                            data-target="#motb3aModal"
                            class="btn btn-success ">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-sm-4 padding-4">
                    <label class="label">نسخة للإطلاع</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="" id=""
                           readonly="readonly"
                           data-toggle="modal"
                           data-target="#etlaaModal"
                           style="width: 82%;float: right;"
                           value="">
                    <input type="hidden" name="" id="" value="">
                    <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                    <input type="hidden" name="tawel_id" id="tawel_id" value="">
                    <button type="button"
                            data-toggle="modal"
                            data-target="#etlaaModal"
                            class="btn btn-success">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-sm-2 padding-4">
                    <label class="label">تحتاج الرد</label>
                    <select name="need_replay" id="need_replay"
                            class="form-control  " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                            $arr = array('1' => 'نعم', '2' => 'لا');
                            foreach ($arr as $key => $value) {
                                ?>
                                <option value="<?= $key ?>"
                                    <?php
                                        if ($need_replay == $key) {
                                            echo 'selected';
                                        }
                                    ?>
                                ><?= $value ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-2 padding-4">
                    <label class="label">درجة الأهمية</label>
                    <select name="important_degree" data-validation="required" id="important_degree"
                            class="form-control">
                        <option value="">إختر</option>
                        <?php
                            $arr = array(2 => 'عادي', 1 => 'هام', 0 => ' هام جدا');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($important_degree != '') {
                                    if ($key == $important_degree) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-xs-8 no-padding">
                    <label class="label">عنوان الرسالة</label>
                    <input class="form-control" placeholder="" type="text" name="title" id="title"
                           data-validation="required"/>
                </div>
            </div>
            <div class="col-sm-4 padding-4" style="height: 150px; overflow-y: scroll;">
                <h5>قائمة المستلمين</h5>
                <div class="alert alert-danger" id="text111" style="display:none; color: #BD000A; display:block;"
                >
                    قم بإضافة قسم أو إدارة أو شخص لإستلام رسالتك <br/> يمكنك إضافة أكثر من شخص أو قسم
                </div>
                <div class="recived-names">
                    <ol>
                    </ol>
                </div>
            </div>
            <div class="col-xs-8 padding-4">
                <div class="form-group">
                    <label class="label">نص الرسالة</label>
                    <textarea class="form-control" placeholder="" id="editor_" name="content"
                              data-validation="required"
                    ></textarea>
                </div>
            </div>
            <div class="col-xs-12 padding-4">
                <!-- <input type="file" id="images" name="files1" multiple="multiple" /> -->
                <div class="form-group">
                    <label class="label"> رفع الوسائط</label>
                    <div>
                        <!-- <input  name="img[]" type="file" multiple> -->
<!--                        <input type="file" name="file[]" id="file" multiple class="form-control">-->
                        <div class="file-loading">
                            <input name="file[]" id="file" type="file" multiple>
                        </div>
                    </div>
                    <!-- input -->
                    <!-- <input  onchange="readURL(this);" name="img" style="padding: 0;" class="form-control"
           type="file" multiple="multiple"> -->
                </div>
            </div>
            <div class="col-xs-2">
                <button type="button" onclick="upload_img()" style="height: 35px;width: 78px;" id="add" name="add"
                        class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> إرسال
                </button>
            </div>
            <?php echo form_close() ?>

        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/fileinput/js/fileinput.js"></script>
<script>
    reset_file_input('file');

</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
  //  initSample();
  //  CKEDITOR.replaceClass = 'ckeditor';
</script>
<script>
    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
        //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/load_tahwel',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id, name, type) {
        var checkBox = document.getElementById("myCheck" + id + type);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
        if (checkBox.checked == true) {
            $('#text111').hide();
            $("ol").append("<li name=f id='" + id + "'>" + name + "</li>");
            $('#to_user_n').append("<input type='hidden'  id='to_user_fk" + id + "' name='to_user_fk[]' value='" + id + "'/>" +
                "<input type='hidden'  data-validation='required' id='to_user_fk_name" + id + "'  name='to_user_fk_name[]' value='" + name + "'/><input type='hidden'  data-validation='required' id='type" + id + "' name='type[]' value='" + type + "'/>");
            //$('#to_user_fk').val(id);
            //  $('#to_user_n').append(name);
        } else {
            $("#" + id).remove();
            $("#id" + id).remove();
            $("#n" + id).remove();
            $("#type" + id).remove();
            if (checkBox == '') {
                $('#text111').show();
            }
        }
        //  $('#to_user_id').val(id);
        //$('#to_user_n').val(name);
        // $('#tahwelModal').modal('hide');
    }
</script>
<script>
    function load_motbaa() {
        $('#motb3a_result').show();
        var type = $('input[name=esnad_motbaa_to]:checked').val();
        //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/load_motbaa',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#motb3a_result").html(html);
            }
        });
    }
</script>
<!-- <script>
    function GetmotbaaName(id, name) {
        $('#motb3a_user_id').val(id);
        $('#motb3a_user_n').val(name);
        $('#motb3aModal').modal('hide');
    }
</script> -->
<script>
    function load_etlaa() {
        $('#etlaa_result').show();
        var type = $('input[name=esnad_etlaa_to]:checked').val();
        //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/load_etlaa',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#etlaa_result").html(html);
            }
        });
    }
</script>
<script>
    function GetetlaaName(id, name) {
        $('#etlaa_user_id').val(id);
        $('#etlaa_user_n').val(name);
        $('#etlaaModal').modal('hide');
    }
</script>



<script>
    function upload_img() {
        // var editor = CKEDITOR.editor.replace('editor');
        var files = $('#file')[0].files;
        var title = $('#title').val();
        var need_replay = $('#need_replay').val();
        //  var content = CKEDITOR.instances['editor'].getData();
        var content = $("textarea[name='content']").val();
        var important_degree = $('#important_degree').val();
        //var row = $('#row').val();
        console.log(title);
        var to_user_fk_name = [];
        $("input[name='to_user_fk_name[]']").each(function () {
            to_user_fk_name.push(this.value);
        });
        var to_user_fk = [];
        $("input[name='to_user_fk[]']").each(function () {
            to_user_fk.push(this.value);
        });
        var type = [];
        $("input[name='type[]']").each(function () {
            type.push(this.value);
        });
        console.warn('title::' + title);
        console.warn('need_replay::' + need_replay);
        console.warn('content::' + content);
        console.warn('important_degree::' + important_degree);
        console.warn('to_user_fk_name::' + to_user_fk_name);
        console.warn('to_user_fk::' + to_user_fk);
        if ((title != '') && (to_user_fk != '') && (to_user_fk_name != '') && (content != '') && (important_degree != '') && (need_replay != '') ) {
            var error = '';
            var form_data = new FormData();
            form_data.append("title", title);
            form_data.append("need_replay", need_replay);
            form_data.append("content", content);
            form_data.append("important_degree", important_degree);
            form_data.append("to_user_fk", to_user_fk);
            form_data.append("to_user_fk_name", to_user_fk_name);
            form_data.append("type", type);
            for (var count = 0; count < files.length; count++) {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'png', 'pdf', 'PNG', 'PDF', 'xls', 'doc', 'docx', 'txt', 'rar']) == -1) {
                    error += "Invalid " + count + " Image File"
                } else {
                    form_data.append("files[]", files[count]);

                }
            }
            // if (error == '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>all_secretary/email/Emails/add_email_ajax", //base_url() return http://localhost/tutorial/codeigniter/
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        //  $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                        $('#add').attr("disabled", 'disabled');
                        swal({
                            title: "جاري الإرسال ... ",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false

                        });

                    },
                    success: function (data) {
                        // alert(data);
                        //$('#images').show();
                        swal("تم الإرسال بنجاح !");
                        $('#title').val('');
                        $('#file').val('');

                        // $('#file').fileinput('clear');
                        $('#need_replay').val('');
                        $('#content').val('');
                        $('#important_degree').val('');
                        $('#tahwel_type').val('');
                        $("#" + to_user_fk).remove();
                        $('li[name=f]').remove();
                        $("#to_user_fk" + to_user_fk).remove();
                        $("#type" + to_user_fk).remove();
                        $("#to_user_fk_name" + to_user_fk).remove();
                        //  reset_file_input('file');
                        var page_load = $('#input_from_rokect').val();
                        if (page_load == 0) {
                            get_my_emails('page_content', 'my_sent_emails');
                            reset_file_input('file');
                        } else {
                            window.location = "<?php echo base_url() ?>all_secretary/email/Emails/inbox/2";
                        }
                    }
                });
            // }
        } else {
            swal({
                title: " برجاء ادخال    البيانات ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
        }
    }
</script>
