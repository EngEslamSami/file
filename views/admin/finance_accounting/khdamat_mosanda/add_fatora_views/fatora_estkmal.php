<style>
    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }
</style>
<?php
if (!empty($result)){


$geha_name = $result->geha_name;
$moshtrk_name = $result->moshtrk_name;
$moshtrk_num = $result->moshtrk_num;
$mrakz_tklfa_id_fk = $result->mrakz_tklfa_id_fk;
$rkm_hesab = $result->rkm_hesab;
$hesab_name = $result->hesab_name;
$alert_time = $result->alert_time;
$halet_eshtrak = $result->halet_eshtrak;
$form_action = 'finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/fatora_estkmal_update';
?>

<?php
echo form_open_multipart($form_action, array('id' => 'myform'));

?>

<div class="col-sm-12 form-group">
    <input type="hidden" name="id" id="id" value="<?php echo $result->id; ?>">
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">الجهة </label>
        <input type="text" name="geha_name" id="geha_name" value="<?php echo $geha_name; ?>"
               class="form-control nonactive"  >

    </div>
    <div class="col-sm-3  col-md-3 no-padding">
        <label class="label ">إسم المشترك </label>
        <input type="text" name="moshtrk_name" id="moshtrk_name" value="<?php echo $moshtrk_name; ?>"
               class="form-control nonactive"  >

    </div>
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">رقم المشترك/رقم الحساب </label>
        <input type="text" name="moshtrk_num" id="moshtrk_num" onkeypress="validate_number(event)"
               value="<?php echo $moshtrk_num; ?>"
               class="form-control nonactive">
    </div>
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">مركز التكلفة </label>

        <select class="form-control nonactive" name="mrakz_tklfa" id="mrakz_tklfa">
            <option value="">إختر</option>
            <?php if (!empty($mrakz_tklfa_arr)) {
                foreach ($mrakz_tklfa_arr as $row) { ?>
                    <option value="<?php echo $row->id_setting; ?>"
                        <?php if (!empty($mrakz_tklfa_id_fk)) {
                            if ($mrakz_tklfa_id_fk == $row->id_setting) {
                                echo 'selected';
                            }
                        } ?>
                    ><?php echo $row->title_setting; ?></option>
                <?php }
            } ?>
        </select>
    </div>
</div>

<div class="col-sm-12 form-group">
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">مركز التكلفة </label>

        <select class="form-control nonactive" name="mrakz_tklfa" id="mrakz_tklfa">
            <option value="">إختر</option>
            <?php if (!empty($mrakz_tklfa_arr)) {
                foreach ($mrakz_tklfa_arr as $row) { ?>
                    <option value="<?php echo $row->id_setting; ?>"
                        <?php if (!empty($mrakz_tklfa_id_fk)) {
                            if ($mrakz_tklfa_id_fk == $row->id_setting) {
                                echo 'selected';
                            }
                        } ?>
                    ><?php echo $row->title_setting; ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">رقم الحساب </label>
        <input type="text" class="form-control  nonactive" name="rkm_hesab"
               id="account_num" data-validation="required" aria-required="true"
               onclick="$(this).removeAttr('readonly');"
               ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
               style="cursor:pointer;" autocomplete="off"
               onkeypress="return isNumberKey(event);"
               onblur="$(this).attr('readonly','readonly')"
               onkeyup="getAccountName($(this).val());" value="<?php echo $rkm_hesab; ?>">
    </div>
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">إسم الحساب </label>
        <input type="text" class="form-control nonactive" name="hesab_name"
               id="account" data-validation="required"
               aria-required="true" readonly="" value="<?php echo $hesab_name; ?>"
               style="width: 100% !important;">
    </div>
    <div class="col-sm-3  col-md-3 no-padding  ">
        <label class="label ">حالة الإشتراك</label>
        <?php $sub_arr = array(1 => 'مفعل', 2 => 'غير مفعل'); ?>
        <select class="form-control nonactive" name="halet_eshtrak" id="halet_eshtrak">
            <option value="">إختر</option>
            <?php foreach ($sub_arr as $key => $value) { ?>
                <option value="<?php echo $key; ?>"
                    <?php if (!empty($halet_eshtrak)) {
                        if ($halet_eshtrak == $key) {
                            echo 'selected';
                        }
                    } ?>
                ><?php echo $value; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<!----------------------------------------باقي البيانات---------------------------------------->


<div class="col-sm-12 form-group">


    <div class="col-sm-3  col-md-3 no-padding  ">
        <label class="label ">بداية الفترة </label>
        <input type="date" name="from_date" id="from_date"
               class="form-control insertClass"  >
    </div>

    <div class="col-sm-3  col-md-3 no-padding  ">
        <label class="label ">نهاية الفترة </label>
        <input type="date" name="to_date" id="to_date"
               class="form-control insertClass"  >

    </div>
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">تاريخ الإصدار </label>
        <input type="date" name="esdar_date" id="esdar_date"
               class="form-control insertClass">

    </div>
    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">اخر موعد للسداد </label>
        <input type="date" name="sadad_date" id="sadad_date"
               class="form-control insertClass">

    </div>

</div>
<div class="col-sm-12 form-group">


    <div class="col-sm-3  col-md-3 no-padding ">
        <label class="label ">المبلغ المطلوب </label>
        <input type="number" name="value" id="value"
               class="form-control insertClass">

    </div>


    <div class="col-sm-12 form-group"><br>

        <table class="table table-striped table-bordered fixed-table mytable " id="resultTable">
            <thead>
            <tr class="info">

                <th class="text-center"> إسم المرفق</th>
                <th class="text-center">نوع المرفق</th>
                <th class="text-center">القائم بالإضافة</th>
                <th class="text-center">تاريخ الإضافة</th>
                <th class="text-center"> الإجراء</th>
            </tr>
            </thead>
            <tbody class=" tbody" id="attachTable">
            <?php if (!empty($result->attach)) {


                $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                $x = 1;
                foreach ($result->attach as $row_img) {
                    $ext = pathinfo($row_img->file, PATHINFO_EXTENSION) ?>

                    <?php if (!empty($row_img->file)) {


                        $img_url = "uploads/images/finance_accounting/khdamat_mosanda/" . $row_img->file;
                    } else {
                        $img_url = "asisst/web_asset/img/logo.png";


                    } ?>
                    <tr class="<?= $x ?>" style="text-align: center">

                        <td><?php echo $row_img->title; ?></td>
                        <td><?php echo $row_img->img_type; ?></td>
                        <td><?php echo $row_img->publisher_name; ?></td>
                        <td><?php echo $row_img->date_ar; ?></td>
                        <td>
                            <a href="#" onclick="DeleteFileRow(<?= $x ?>,<?= $row_img->id ?>)"><i
                                        class="fa fa-trash"></i></a>
                            <?php
                            if (in_array($ext, $image)) {
                                ?>

                                <a data-toggle="modal" data-target="#myModal-view"
                                   onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');"><i
                                            class="fa fa-eye"
                                            title=" قراءة"></i></a>

                                <?php
                            } else if (in_array($ext, $file)) {
                                ?>

                                <a target="_blank"
                                   href="<?php echo base_url() . 'finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/read_file/' . $row_img->file; ?>"><i
                                            class="fa fa-eye" title=" قراءة"></i></a>
                                <?php
                            }
                            ?>
                        </td>

                    </tr>
                    <?php $x++;
                } ?>

                <tr style="text-align: center" id="1">
                    <td>
                        <input type="text" name="title" id="title1" class="form-control"
                               data-validation="required">
                    </td>
                    <td>
                        <input type="file" name="file" id="myfile1" class="form-control"
                               data-validation="required">
                    </td>
                    <td>غير محدد</td>
                    <td> غير محدد</td>
                    <td>
                        <a href="#" onclick="saveFile(1)" title="حفظ"><i class="fa fa-upload"
                                                                         aria-hidden="true"></i></a>
                        <a href="#" onclick="AppendAttach(); $(this).remove(); $('#deleteRow').show();"><i
                                    class="fa fa-plus sspan"></i></a>
                        <a id="deleteRow" style="display: none" href="#" onclick="$('#1').remove();"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>


            <?php } else { ?>
                <tr style="text-align: center" id="1">
                    <td>
                        <input type="text" name="title" id="title1" class="form-control"
                               data-validation="required">
                    </td>
                    <td>
                        <input type="file" name="file" id="myfile1" class="form-control"
                               data-validation="required">
                    </td>
                    <td>غير محدد</td>
                    <td> غير محدد</td>
                    <td>
                        <div id="loader1" style="float: right"> </div>
                        <a href="#" onclick="saveFile(1)" title="حفظ"><i class="fa fa-upload"
                                                                         aria-hidden="true"></i></a>
                        <a href="#" onclick="AppendAttach(); $(this).remove(); $('#deleteRow').show();"><i
                                    class="fa fa-plus sspan"></i></a>
                        <a id="deleteRow" style="display: none" href="#" onclick="$('#1').remove();"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <?php echo form_close() ?>


    <?php } ?>

    <script>


        function AppendAttach() {
            var x = $('#attachTable tr').length;
            var id = $('#attachTable tr').length + 1;
            //alert(id);
            $('#attachTable').append('<tr style="text-align: center" id="' + id + '"><td><input  type="text"  class="form-control"name="title" id="title' + x + '" /></td>' +
                '<td><input  type="file" class="form-control" name="file" id="myfile' + x + '" /></td><td>غير محدد</td><td>غيرمحدد</td>' +
                '<td> <div id="loader' + id + '" style="float: right"> </div><a href="#" onclick="saveFile(+x+)"  title="حفظ"><i class="fa fa-upload" aria-hidden="true"></i></a>' +
                ' <a href="#" onclick="AppendAttach(); $(this).remove(); $(\'#deleteRow' + id + '\').show();  "><i class="fa fa-plus sspan"></i></a><a id="deleteRow' + id + '" style="display: none" href="#" onclick="$(\'#' + id + '\').remove();"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
        }

    </script>
    <script>


        function saveFile(value) {
            var file_data = $('#myfile' + value).prop('files')[0];
            var title = $('#title' + value).val();
            if (title != '' && file_data != '') {


                var id = $('#id').val();
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('title', title);
                form_data.append('id', id);
//alert(form_data);

                $.ajax({
                    url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/saveFile',
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    beforeSend: function() {
                        $('#loader'+value).html('<div class="text-center"><img  style="height: 32px;" src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                    },
                    success: function (json_data) {
                        var JSONObject = JSON.parse(json_data);
                        console.log(JSONObject);


                        var dataString3 = 'id=' + id;

                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/loadFiles2',
                            data: dataString3,
                            dataType: 'html',
                            cache: false,
                            success: function (html) {
                                $('#loader'+value).html(' ');
                                $("#attachTable").html(html);
                            }
                        });


                    }
                });

            } else {
                alert('من فضلك تأكد من إدخال إسم المرفق والمرفق!!');
            }


        }

    </script>
    <script>

        function DeleteFileRow(num,fileID){
            $("." + num).remove();
            var dataString = 'id=' + fileID ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/Delete_attach',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);

                }
            });

        }
    </script>

