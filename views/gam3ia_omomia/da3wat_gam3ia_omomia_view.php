<div class="col-xs-12 padding-4">
    <h5 class="title-style"><i class="fa fa-users"></i> إجتماعات الجمعية العمومية </h5>
</div>
<?php if (isset($all_da3wat) && (!empty($all_da3wat))) { ?>
    <div class="cicleat-sec col-xs-12 no-padding ">
        <table class="example table table-bordered table-striped" role="table">
            <thead>
            <tr class="greentd">
                <th width="2%">م</th>
                <th class="text-center">رقم الدعوة</th>
                <th class="text-center">التاريخ</th>
                <th class="text-center">اسم العضو</th>
                <th class="text-center"> نوع الاجتماع</th>
                <th class="text-center">الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            //        foreach ($all_da3wat as $value) {
            $type_metting = array(1 => 'جمعية العمومية عادية', 2 => 'جمعية عمومية غير عادية');
            if ($all_da3wat->no3_egtma3 == 1) {
                $no3_egtma3 = 'جمعية العمومية عادية';
            } elseif ($all_da3wat->no3_egtma3 == 2) {
                $no3_egtma3 = 'جمعية عمومية غير عادية';
            } else {
                $no3_egtma3 = '  غير محدد';
            }

            $reply_arr = array(1 => 'تم الموافقة', 2 => "تم الاعتذار", 3 => "تم الاعتذار و وفوض نائب ")
            ?>
            <tr>
                <td><?= $x++ ?></td>
                <td><?= $all_da3wat->da3wa_rkm ?></td>
                <td><?= $all_da3wat->da3wa_date_ar ?></td>
                <td><?= $all_da3wat->mem_name ?></td>

                <td><?= $no3_egtma3 ?></td>

                <td class="text-center">

                    <a type="button"
                       class="btn btn-sm btn-info" data-toggle="modal"
                       data-target="#dawa_reply" onclick=""
                       style="padding: 3px 5px;line-height: 1;">
                        <?php if (array_key_exists($all_da3wat->action_dawa, $reply_arr)) {
                            echo $reply_arr[$all_da3wat->action_dawa];
                        } else {
                            echo 'الرد على الدعوة';
                        } ?>
                    </a>


                </td>
            </tr>
            <?php
            //        }

            ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="dawa_reply" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width: 85%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <?php echo form_open_multipart(base_url() . 'gam3ia_omomia/Gam3ia_omomia/dawa_reply') ?>

                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="print_forma  no-border    col-xs-12 allpad-12">
                            <div class="col-xs-12">
                                <div class="personality">

                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-7 ahwal_style">
                                        <h4 class="" style="font-weight: bold !important;font-size: 20px !important;">
                                            سعادة رئيس مجلس الإدارة
                                        </h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class=""
                                            style="font-weight: bold !important;font-size: 20px !important;">
                                            حفظه الله
                                        </h4>
                                    </div>


                                    <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                                        <br>

                                        <h5 style="font-weight: normal !important;">
                                            السلام عليكم ورحمة الله وبركاته وبعد
                                        </h5>
                                    </div>


                                    <div class="col-xs-12 no-padding">

                                        <div class="form-group col-sm-12 col-xs-12">
                                            <h4>
                                                نشكر لكم دعوتكم لحضور اجتماع الجمعية العمومية العادية، ونفيد سعادتكم
                                                بالتالي:
                                            </h4>

                                        </div>
                                        <div class="form-group col-sm-12 col-xs-12">
                                            <div class="radio-content">
                                                <input type="radio" name="action_dawa" id="radio_accept" value="1"
                                                    <?php if ($all_da3wat->action_dawa == 1) {
                                                        echo 'checked';
                                                    } ?>
                                                       onclick="show_mofawad(this,1)"
                                                       data-validation="required">
                                                <label for="radio_accept" class="radio-label">تم وصول الدعوة والموافقة
                                                    على حضور الاجتماع.</label>
                                            </div>
                                            <br>
                                            <div class="radio-content">
                                                <input type="radio" name="action_dawa" id="radio_reject" value="2"
                                                    <?php if ($all_da3wat->action_dawa == 2) {
                                                        echo 'checked';
                                                    } ?>
                                                       onclick="show_mofawad(this,2)"
                                                       data-validation="required">
                                                <label for="radio_reject" class="radio-label">أعتذر عن الحضور .</label>
                                            </div>
                                            <br>
                                            <div class="radio-content">
                                                <input type="radio" name="action_dawa" id="radio_reject2" value="3"
                                                    <?php if ($all_da3wat->action_dawa == 3) {
                                                        echo 'checked';
                                                        $display = 'block';

                                                    } else {
                                                        $display = 'none';

                                                    } ?>
                                                       onclick="show_mofawad(this,3)"
                                                       data-validation="required">
                                                <label for="radio_reject2" class="radio-label">
                                                    أعتذر عن الحضور، وأفوض نيابة عني سعادة عضو الجمعية العمومية:
                                                </label>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="form-group col-sm-12 col-xs-12" id="mofawad_div"

                                             style="display:<?= $display ?>;">
                                            <div class="form-group col-md-5 col-sm-6 padding-4">
                                                <label class="label">إسم العضو</label>
                                                <input type="text" name="mofawad_name" id="mofawad_name"
                                                       value="<?php echo $all_da3wat->mofawad_name; ?>"
                                                       class="form-control "
                                                >

                                            </div>
                                            <div class="form-group col-md-3 col-sm-6 padding-4">
                                                <label class="label"> رقم الهوية</label>
                                                <input type="text" name="mofawad_card_num" id="mofawad_card_num"
                                                       value="<?php echo $all_da3wat->mofawad_card_num; ?>"
                                                       class="form-control ">

                                            </div>
                                            <div class="form-group col-md-3 col-sm-6 padding-4">
                                                <label class="label">المرفق </label>
                                                <input type="file" name="mofawad_moefaq" id="mofawad_moefaq"
                                                       value="<?php echo ''; ?>"
                                                       class="form-control ">

                                            </div>


                                        </div>
                                        <!--       <div class="form-group col-sm-12 col-xs-12">
                                                   <h4>
                                                       ونرجو أن نوجه عناية السادة الأعضاء إلى ما يلى:
                                                       (‌أ) لكل عضو مؤسس أو عضو عامل مضى على عضويته (*) أشهر على الأقل وأوفى
                                                       بالإلتزامات المفروضة عليه الحق في حضور الاجتماع بالأصالة أو بإنابة عضو آخر
                                                       للحضور والتصويت نيابة عنه.
                                                       (‌ب) يشترط لصحة الإنابة أن تكون ثابتة في توكيل رسمي خاص أو بموجب توكيل موقع
                                                       من الموكل والوكيل وموقع من المسئول عن دعوة الجمعية العمومية ومختوم بختم
                                                       الجمعية وذلك قبل الموعد المحدد للإجتماع بيومين. ولا يجوز أن ينوب العضو عن
                                                       أكثر من عضو واحد.
                                                       (‌ج) يجوز للعضو العامل الذى لم يوف بإلتزاماته المفروضة عليه وفقاً للنظام
                                                       الأساسى للجمعية أن يقوم بالوفاء بها قبل ميعاد بدء إنعقاد الجمعية العمومية
                                                       بنصف ساعة، وذلك فى مقر الاجتماع.
                                                       (‌د) يعتبر إجتماع الجمعية العمومية صحيحاً بحضور الأغلبية المطلقة للأعضاء
                                                       العاملين الذين لهم حق التصويت. فإذا لم يتكامل العدد فى موعد الإنعقاد المحدد
                                                       فى الدعوة يؤجل الإجتماع إلى جلسة أخرى تعقد خلال _______ من وقت الإجتماع
                                                       الأصلى. ويكون الإجتماع الثانى صحيحاً إذا حضره بأنفسهم عدد لايقل عن عشرة فى
                                                       المائة من مجموع الأعضاء العاملين الذين لهم حق التصويت أو عشرين عضواً عامل له
                                                       حق التصويت أيهما أقل. ولا يجوز فى الحالة الأولى أن يقل عدد الأعضاء الحاضرين
                                                       بأنفسهم عن خمسة أعضاء عاملين.

                                                   </h4>

                                               </div>
           -->

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-success" name="svae_dawa" value="1">حفظ</button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
<?php } else {
    ?>
    <div class="col-md-12 alert-danger">
        <h3>لا توجد دعوات </h3>
    </div>
    <?php
}
?>