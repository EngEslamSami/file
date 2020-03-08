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
                            <input type="radio" name="action_dawa" id="radio_accept" value="1" disabled
                                <?php if ($result->action_dawa == 1) {
                                    echo 'checked';
                                } ?>

                                   data-validation="required">
                            <label for="radio_accept" class="radio-label">تم وصول الدعوة والموافقة
                                على حضور الاجتماع.</label>
                        </div>
                        <br>
                        <div class="radio-content">
                            <input type="radio" name="action_dawa" id="radio_reject" value="2" disabled
                                <?php if ($result->action_dawa == 2) {
                                    echo 'checked';
                                } ?>

                                   data-validation="required">
                            <label for="radio_reject" class="radio-label">أعتذر عن الحضور .</label>
                        </div>
                        <br>
                        <div class="radio-content">
                            <input type="radio" name="action_dawa" id="radio_reject2" value="3" disabled
                                <?php if ($result->action_dawa == 3) {
                                    echo 'checked';
                                    $display = 'block';

                                } else {
                                    $display = 'none';

                                } ?>

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
                            <p>
                                <?php echo $result->mofawad_name; ?>
                            </p>

                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> رقم الهوية</label>
                            <p>
                                <?php echo $result->mofawad_card_num; ?>
                            </p>

                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label">المرفق </label>

                        </div>


                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                       <!-- <h4>
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
-->
                    </div>


                </div>
            </div>

        </div>


    </div>
</div>
