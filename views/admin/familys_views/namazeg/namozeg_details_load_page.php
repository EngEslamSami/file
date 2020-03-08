<style>


    .cke_toolbar_break {
        display: none;
        clear: left;
    }


</style>
<div class="container">
    <div class="print_forma  no-border    col-xs-12 allpad-12">


        <div class="col-xs-12">
            <div class="personality">
                <div class="col-xs-1"></div>
                <div class="col-xs-7 ahwal_style">

                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;">
                        <?php

                        if ($_POST['start_laqb'] == 'undefined') {

                        } else {
                            echo $_POST['start_laqb'] . '/';
                        }

                        ?><?php echo $_POST['geha_name']; ?>  </h4>


                </div>
                <div class="col-xs-3">

                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;">
                        <?php

                        if ($_POST['end_laqb'] == 'undefined') {

                        } else {
                            echo $_POST['end_laqb'];
                        }

                        ?> </h4>


                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <br/>

                    <h5 style="font-weight: normal !important;">
                        <input type="text" class="form-control input-write" name="header_name" id="header_name"
                               value="السلام عليكم ورحمة الله وبركاتة ، وبعد :"/></h5>
                </div>


                <div class="col-xs-12 no-padding">

                    <div class="form-group col-sm-12 col-xs-12">
                        <!--                    31-1-om start-->

                        <textarea class="editor1" id="editor1" name="namozg_head"
                                  rows="2"><?php if ($_POST['namozeg_type_fk'] == 6) {
                                $text1 = "تشهد الجمية بأن أسرة ";
                                $text2 = " المسجلة لدينا برقم ملف   ";
                                $text3 = "  ";
                                echo $text1 . $file_num_data['father_full_name'] . $text2 . $_POST['file_num'] . $text3;
                            } else {
                                echo $details['namozg_head'];
                            } ?></textarea>
                        <!--                    31-1-om end-->

                        <script type="text/javascript">
                            CKEDITOR.replace('editor1');
                            CKEDITOR.add;
                            CKEDITOR.config.toolbar = [
                                ['Styles', 'Format', 'Font', 'FontSize'],
                                '/',

                                ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                                ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
                            ];

                        </script>
                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">إسم رب الأسرة</th>
                                <th class="text-center">السجل المدني</th>
                                <th class="text-center">رقم الملف</th>
                                <th class="text-center">عدد أفراد الأسرة</th>
                                <?php if (isset($_POST['responsable_name']) && (!empty($_POST['responsable_name']))) { ?>
                                    <th class="text-center"> إسم المسئول</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><?php echo $file_num_data['father_full_name'] ?></td>
                                <td class="text-center"><?php echo $file_num_data['father_national_num'] ?></td>
                                <td class="text-center"><?php echo $_POST['file_num'] ?></td>
                                <td class="text-center"><?php echo $family_members_num; ?></td>
                                <?php if (isset($_POST['responsable_name']) && (!empty($_POST['responsable_name']))) { ?>
                                    <td class="text-center">
                                        <?= $_POST['responsable_name'] ?>
                                    </td>
                                <?php } ?>
                            </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="no_afrad" value="<?php echo $family_members_num; ?>">
                    </div>
                    <!--                    31-1-om start-->
                    <?php if ($_POST['namozeg_type_fk'] == 6) {
                        if (!empty($family_members->sons)) {
                            $member_gender_arr = array(1 => 'انثى', 2 => 'ذكر');
                            ?>
                            <div class="form-group col-sm-12 col-xs-12">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr class="greentd">

                                        <th class="text-center"> تحديد</th>
                                        <th class="text-center">إسم المستفيد</th>
                                        <th class="text-center">السجل المدني</th>
                                        <th class="text-center"> الجنس</th>
                                        <th class="text-center">الصلة</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($family_members->sons as $row) { ?>
                                        <tr>
                                            <td><input type="checkbox" name="member_id[]" id="" value="<?= $row->id ?>">
                                            </td>
                                            <td class="text-center"><?php echo $row->member_full_name ?></td>
                                            <td class="text-center"><?php echo $row->member_card_num ?></td>
                                            <td class="text-center"><?php
                                                if (key_exists($row->member_gender, $member_gender_arr)) {
                                                    echo $member_gender_arr[$row->member_gender];
                                                } ?></td>
                                            <td class="text-center"><?php echo $row->member_relationship_title ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }
                    } ?>
                    <!--                    31-1-om end-->


                    <div class="form-group col-sm-12 col-xs-12">

                        <textarea class="editor12" id="editor2"
                                  name="namozg_footer"><?php echo $details['namozg_footer']; ?></textarea>

                        <script type="text/javascript">
                            CKEDITOR.replace('editor2');
                            CKEDITOR.add;
                            CKEDITOR.config.toolbar = [
                                ['Styles', 'Format', 'Font', 'FontSize'],
                                '/',

                                ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                                ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
                            ];

                        </script>

                    </div>


                </div>
            </div>


        </div>


        <div class="col-sm-12 form-group 4 text-center">
            <input type="hidden" name="save" id="save" value="save">
            <input type="hidden" name="letter_name" id="letter_name">

            <?php if (!empty($result)) {
                $onclick = '';
                $type = 'submit';
            } else {
                $type = 'button';
                $onclick = 'add()';
            } ?>
            <button type="<?php echo $type; ?>" onclick="<?php echo $onclick; ?>"
                    class="btn btn-labeled btn-success " name="save" value="save">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
        </div>


    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
    /*  function add() {
          var title = "هل تريد الحفظ على النموذج الحالي؟";
          var confirm = "نعم, قم بالحفظ";
          var text2 = "";
          Swal.fire({
              title: title,
              text: text2,
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: 'لا',
              confirmButtonText: confirm
          }).then((result) => {
              if (result.value) {
                  $('#save').val('save');
                  $('#myform').submit();
              } else {
                  $('#save').val('save_setting');
                  $('#myform').submit();
              }
          });
      }*/

    function add() {
        var title = "هل تريد الحفظ على النموذج الحالي؟";
        var confirm = "نعم, قم بالحفظ";
        var text2 = "";
        Swal.fire({
            title: title,
            text: text2,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'لا',
            confirmButtonText: confirm
        }).then((result) => {
            if (result.value) {
                $('#save').val('save');
                $('#myform').submit();
            } else {
                Swal.fire({
                    title: 'من فضلك أدخل عنوان النموذج؟',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'حفظ',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#50ab20',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'لا',
                    inputPlaceholder: "عنوان النموذج",
                }).then((inputValue) => {
                    $('#save').val('save_setting');
                    $('#letter_name').val(inputValue['value']);
                    $('#myform').submit();

                });
            }
        });
    }


</script>

