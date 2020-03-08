<div class="container">
    <div class="print_forma  no-border    col-xs-12 allpad-12">


        <div class="col-xs-12">
            <div class="personality">
                <div class="col-xs-1"></div>
                <div class="col-xs-11">
                    <h5 style="font-weight: normal !important;">سعادة عضو الجمعية العمومية </h5>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-1"></div>

                <div class="col-xs-7 ahwal_style">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;">
                        <?php
                        /*  if ($_POST['no3_egtma3'] == 'undefined') {

                          } else {
                              echo $_POST['no3_egtma3'] . '/';
                          }*/
                        ?><?php echo $_POST['mem_name']; ?>  </h4>
                </div>
                <div class="col-xs-3">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;">
                        <?php

                        if ($_POST['end_laqb'] == 'undefined') {
                            echo 'حفظه الله ';

                        } else {
                            echo $_POST['end_laqb'];
                        }

                        ?> </h4>


                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <br/>

                    <h5 style="font-weight: normal !important;">
                        <input type="text" class="form-control input-write" name="salam" id="salam"
                               value="السلام عليكم ورحمة الله وبركاتة ، وبعد :"/></h5>
                </div>


                <div class="col-xs-12 no-padding">

                    <div class="form-group col-sm-12 col-xs-12">

                        <textarea class="editor1" id="editor1" name="cont_header"
                                  rows="2">نشكر لسعادتكم اهتمامكم وحرصكم ومتابعتكم الدائمة لجمعيتكم الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)،
                            وننقل لكم عن كافة أعضاء مجلس الإدارة التحية والتقدير على حرصكم للرقي بالعمل الاجتماعي والخيري في المنطقة ،
                            وإشارة إلى قرار مجلس الإدارة رقم 37/40،
                            وتاريخ 6/11/1440 هـ بشأن انعقاد الجمعية العمومية العادية يتشرف الأستاذ / عبدالرحمن بن محمد البليهي ،
                            رئيس مجلس الإدارة بدعوة السادة الأعضاء المؤسسين والعاملين بالجمعية لحضور اجتماع الجمعية العمومية العادية الذي تقرر عقده بمشيئة الله في يوم الأربعاء 28/11/1440 هـ حسب تقويم أم القرى الموافق 31/7/2019 م ،
                            وذلك في تمام الساعة السابعة مساءً بقاعة الاجتماعات في مقر الجمعية (خلف متحف مدينة بريدة).للنظر في جدول الأعمال التالي :-</textarea>
                        <!--<textarea class="editor1" id="editor1" name="cont_header"-->
                        <!--                                  rows="2">-->
                        <?php //echo $details['cont_header']; ?><!--</textarea>-->

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

                    <?php if (isset($mhawer) && (!empty($mhawer))) { ?>
                        <div class="form-group col-sm-12 col-xs-12">
                            <table class="table table-bordered ">
                                <thead>
                                <tr class="greentd">
                                    <th class="text-center">م</th>
                                    <th class="text-center">المحاور</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $x = 1;
                                foreach ($mhawer as $row) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $x++; ?></td>
                                        <td class="text-center"><?php echo $row->mehwar_title; ?></td>

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <div class="form-group col-sm-12 col-xs-12">

                        <textarea class="editor12" id="editor2"
                                  name="cont_footer">وعلية نأمل من سعادتكم الكريم بالموافقة لحضور الاجتماع والرد من خلال تعبئة النموذج المرفق وإرساله عن طريق فاكس الجمعية (0163837737)
                            او ايميل الجمعية adnaa.bu@gmail.com،
                        او على واتس اب جوال (0553851919).</textarea>
                        <!--<textarea class="editor12" id="editor2"-->
                        <!--                                  name="cont_footer">-->
                        <?php //echo $details['cont_footer']; ?><!--</textarea>-->

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

<!--            --><?php //if (isset($_POST['mem_id_fk']) && (!empty($_POST['mem_id_fk']))) {
//                ?>
<!--                <input type="hidden" name="memb_name" value="--><?php //echo $_POST['memb_name'] ?><!--"/>-->
<!--                <input type="hidden" name="mem_id_fk" value="--><?//= $_POST['mem_id_fk'] ?><!--"/>-->
<!--                <input type="hidden" name="mem_rkm_fk" value="--><?//= $_POST['mem_rkm_fk'] ?><!--"/>-->
<!--                --><?php
//            } ?>
            <input type="hidden" name="save" id="save" value="save">
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


<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>-->
<script>
    function add() {

        var title = "هل تريد الحفظ على النموذج الحالي؟";
        var confirm = "نعم, قم بالحفظ";
        var text2 = "";
        swal({
                title: title,
                text: text2,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'لا',
                confirmButtonText: confirm
            },
            function () {
                $('#save').val('save');
                $('#myform').submit();
            });

        /* Swal.fire({
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
             }
         });*/
    }


</script>

