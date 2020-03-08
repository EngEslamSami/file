<style>
    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }
</style>
<?php $arr = array(1 => 'دفع نقدا', 2 => 'تقسم مره واحده علي الراتب',3=>' تقسم شهريا علي الراتب'); ?>
<?php $arr_select_lable = array(1=>'الموظف المختص في الشئون الإدارية:',
2=>'مدير الموارد البشرية',
3=>'المحاسب',
4=>'مدير الشئون الماليةو الإدارية',
5=>'مدير العام'); ?>

<div class="modal-body">
    <div class="col-sm-9 padding-4">



        <form enctype="multipart/form-data" method="post" id="form1" action="<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/save_Transform">

            <input type="hidden" name="solaf_rkm_fk" id="solaf_rkm_fk" value="<?= $solaf_data->t_rkm ?>">
            <input type="hidden" name="solaf_id_fk" id="solaf_id_fk" value="<?= $solaf_data->id ?>">
            <input type="hidden" name="from_user" id="from_user" value="<?= $solaf_data->current_to_user_id ?>">
            <input type="hidden" name="to_user_n" id="to_user_n" value="">



            <div class="col-sm-12 ">
                <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && $solaf_data->level == 1) { ?>
                <input type="hidden" name="level" id="level" value="2">
                <table class="table table-bordered table-responsive">
                    <tbody>
                        <tr>
                            <td>الإسم</td>
                            <td colspan="2"><?= $solaf_data->emp_name ?></td>
                            <td>الرقم الوظيفي</td>
                            <td><?= $solaf_data->emp_code_fk ?></td>
                            <td>الوظيفة</td>
                            <td colspan="2"><?= $solaf_data->job_title ?></td>

                        </tr>
                        <tr>
                            <td>مبلغ السلفة</td>
                            <td colspan="2"><?= $solaf_data->qemt_solaf ?></td>
                            <td>طريقة السداد</td>
                            <td colspan="4"><?php if(key_exists($solaf_data->sadad_solfa, $arr)){
                              echo $arr[$solaf_data->sadad_solfa];
                            }else {
                            echo "غير محدد";
                            }?></td>

                        </tr>
                        <tr>
                            <td>عدد الاقساط</td>
                            <td><?= $solaf_data->qst_num ?></td>
                            <td>قيمة القسط</td>
                            <td><?= $solaf_data->qemt_solaf/$solaf_data->qst_num ?></td>
                            <td>تاريخ اول قسط</td>
                            <td><?= $solaf_data->khsm_form_date_m ?></td>
                            <td>تاريخ اخر قسط</td>
                            <td><?= $solaf_data->khsm_to_date_m ?></td>

                        </tr>
                        <tr>
                            <td>الغرض من السلفة</td>
                            <td colspan="7"><?= $solaf_data->solaf_reason ?></td>
                        </tr>
                        <tr>
                            <td>تقيم الموظف</td>
                            <td colspan="7">
                                <div class="radio-content">
                                    <input type="radio" id="taqeem-1" data-validation="required" name="taqeem" value="1">
                                    <label class="radio-label" for="taqeem-1">ممتاز</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="taqeem-2" data-validation="required" name="taqeem" value="2">
                                    <label class="radio-label" for="taqeem-2">جيد جداً</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="taqeem-3" data-validation="required" name="taqeem" value="3">
                                    <label class="radio-label" for="taqeem-3">جيد</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="taqeem-4" data-validation="required" name="taqeem" value="4">
                                    <label class="radio-label" for="taqeem-4">مقبول</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="taqeem-5" data-validation="required" name="taqeem" value="5">
                                    <label class="radio-label" for="taqeem-5">سيئ</label></div>
                            </td>
                        </tr>
                        <tr>
                            <td> يوصي بالصرف:</td>
                            <td colspan="2">
                                <div class="radio-content">
                                    <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                        $('#reason_action1').val('');" id="tahod-1" data-validation="required" name="action" value="1">
                                    <label class="radio-label" for="tahod-1">يوصي</label>

                                </div>
                            </td>
                            <td colspan="5">
                                <div class="radio-content">
                                    <input type="radio" name="action" onclick="$('#reason_action1').removeAttr('readonly');" id="tahod-2" data-validation="required" value="2">
                                    <label class="radio-label" for="tahod-2">لا اوصي
                                        <input size="60" type="text" readonly name="reason_action" id="reason_action1" placeholder=" ...................">
                                    </label>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <?php } ?>
                <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && ($solaf_data->level == 2 || $solaf_data->level == 3)) { ?>
                <input type="hidden" name="level" id="level" value="<?=$solaf_data->level+1?>">
                <table class="table table-bordered table-responsive">
                    <tbody>

                        <tr>
                            <td>الراتب الأساسي</td>
                            <td></td>
                            <td>+ البدلات الثابتة</td>
                            <td></td>
                            <td>= إجمالي</td>
                            <td></td>
                            <td>صافي المرتب</td>
                            <td></td>

                        </tr>
                        <tr>
                            <td colspan="2">حد السلفة</td>
                            <td></td>
                            <td>تاريخ التعيين</td>
                            <td colspan="2"></td>
                            <td>مستحقات نهاية الخدمة</td>
                            <td></td>


                        </tr>
                        <tr>
                            <td colspan="2">هل توجد على الموظف سلفة قائمة ؟</td>
                            <td colspan="2">
                                <?php if($solaf_data->solaf_qaema !=0){
                                $diabled='disabled';
                                }else {
                                $diabled='';
                                } ?>

                                <div class="radio-content">
                                    <input type="radio" id="solaf_qaema-1" data-validation="required" name="solaf_qaema" value="1" <?=$diabled ?>>
                                    <label class="radio-label" for="solaf_qaema-1">نعم</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="solaf_qaema-2" data-validation="required" name="solaf_qaema" value="2" <?=$diabled ?>>
                                    <label class="radio-label" for="solaf_qaema-2">لا</label></div>
                                <?php if($solaf_data->solaf_qaema !=0){?>
                                <script>
                                    console.log("solaf_qaema-<?=$solaf_data->solaf_qaema?>");
                                    $("#solaf_qaema-<?=$solaf_data->solaf_qaema?>").attr("checked", "checked");
                                </script>
                                <?php }?>
                            </td>
                            <td colspan="2"> هل توجد على الموظف أية مطالبات ؟</td>
                            <td colspan="2">
                                <?php if($solaf_data->emp_motalbat !=0){
                              $diabled_emp_motalbat='disabled';

                              }else {
                              $diabled_emp_motalbat='';
                              } ?>
                                <div class="radio-content">
                                    <input type="radio" id="emp_motalbat-1" data-validation="required" name="emp_motalbat" value="1" <?=$diabled_emp_motalbat ?>>
                                    <label class="radio-label" for="emp_motalbat-1">نعم</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="emp_motalbat-2" data-validation="required" name="emp_motalbat" value="2" <?=$diabled_emp_motalbat ?>>
                                    <label class="radio-label" for="emp_motalbat-2">لا</label></div>

                                <?php if($solaf_data->emp_motalbat !=0){?>
                                <script>
                                    console.log("emp_motalbat-<?=$solaf_data->emp_motalbat?>");
                                    $("#emp_motalbat-<?=$solaf_data->emp_motalbat?>").attr("checked", "checked");
                                </script>
                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">عدد مرات السلف السابقة</td>
                            <td colspan="2"><?= $solaf_data->num_previous_requests ?></td>

                            <td colspan="2">تاريخ أخر سلفة</td>
                            <td colspan="2"><?= $solaf_data->previous_request_date_m ?></td>

                        </tr>
                        <?php if($solaf_data->level == 3) {?>
                        <tr>
                            <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                  $('#reason_action1').val('................');" id="tahod-1" data-validation="required" name="action" value="1">
                                    <label class="radio-label" for="tahod-1">موافق</label>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                                <div class="radio-content">
                                    <input type="radio" name="action" onclick="$('#reason_action1').removeAttr('disabled');" id="tahod-2" data-validation="required" value="2">


                                    <label class="radio-label" for="tahod-2">لا أوافق بسبب

                                        <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">
                                    </label>
                                </div>





                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php } ?>
                <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && ($solaf_data->level == 4 || $solaf_data->level == 5)) { ?>
                <input type="hidden" name="level" id="level" value="<?=$solaf_data->level+1?>">
                <table class="table table-bordered table-responsive">
                    <tbody>



                        <tr>
                            <td>حالة الرصيد</td>
                            <td colspan="2">
                                <?php if($solaf_data->rased_yasmah !=0){
                                $diabled_rased_yasmah='disabled';
                                }else {
                                $diabled_rased_yasmah='';
                                } ?>

                                <div class="radio-content">
                                    <input type="radio" id="rased_yasmah-1" data-validation="required" name="rased_yasmah" value="1" <?=$diabled_rased_yasmah ?>>
                                    <label class="radio-label" for="rased_yasmah-1">يسمح</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="rased_yasmah-2" data-validation="required" name="rased_yasmah" value="2" <?=$diabled_rased_yasmah ?>>
                                    <label class="radio-label" for="rased_yasmah-2">لا يسمح </label></div>
                                <?php if($solaf_data->rased_yasmah !=0){?>
                                <script>
                                    console.log("rased_yasmah-<?=$solaf_data->rased_yasmah?>");
                                    $("#rased_yasmah-<?=$solaf_data->rased_yasmah?>").attr("checked", "checked");
                                </script>
                                <?php }?>
                            </td>
                            <td> تاريخ توفر الرصيد:</td>
                            <?php if(!empty($solaf_data->rased_motah) ){
                               $date= "$solaf_data->rased_motah";
                               $read='readonly';
                             }
                            else {
                              $date= date('Y-m-d');
                              $read='';
                              if($solaf_data->level == 5) {
                                  $read='readonly';
                              }

                            }  ?>
                            <td> <input type="date" class="form-control " name="rased_motah" value="<?php echo "$date";  ?>" <?= $read?>> </td>
                        </tr>

                        <?php if($solaf_data->level == 5) {?>
                        <tr>
                            <td>رأى مدير الشئون المالية</td>
                            <td colspan="4">
                                <div class="radio-content">
                                    <input type="radio" id="moder_mali_option-1" data-validation="required" name="moder_mali_option" value="1">
                                    <label class="radio-label" for="moder_mali_option-1">لا مانع من صرف السلفة</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="moder_mali_option-2" data-validation="required" name="moder_mali_option" value="2">
                                    <label class="radio-label" for="moder_mali_option-2">يعتذر عن صرف السلفة</label></div>
                                <div class="radio-content">
                                    <input type="radio" id="moder_mali_option-3" data-validation="required" name="moder_mali_option" value="3">
                                    <label class="radio-label" for="moder_mali_option-3">يؤجل صرف السلفة</label></div>

                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php } ?>
                <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] &&  $solaf_data->level == 6) { ?>
                <input type="hidden" name="level" id="level" value="<?=$solaf_data->level+1?>">
                <table class="table table-bordered table-responsive">
                    <tbody>




                        <tr>
                            <td>الإسم</td>
                            <td colspan="2"><?= $solaf_data->emp_name ?></td>
                            <td>الرقم الوظيفي</td>
                            <td><?= $solaf_data->emp_code_fk ?></td>
                            <td>الوظيفة</td>
                            <td colspan="2"><?= $solaf_data->job_title ?></td>

                        </tr>
                        <tr>
                            <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                                      $('#reason_action1').val('................');" id="tahod-1" data-validation="required" name="action_moder_final" value="4">
                                    <label class="radio-label" for="tahod-1">موافق</label>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                                <div class="radio-content">
                                    <input type="radio" name="action_moder_final" onclick="$('#reason_action1').removeAttr('disabled');" id="tahod-2" data-validation="required" value="5">


                                    <label class="radio-label" for="tahod-2">لا أوافق بسبب

                                        <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">
                                    </label>
                                </div>





                            </td>
                        </tr>

                    </tbody>
                </table>
                <?php } ?>
                <?php if(key_exists($solaf_data->level, $arr_select_lable)){ ?>
                <div class="form-group col-md-6 col-sm-6 padding-4">
                    <label class="label"><?php  echo $arr_select_lable[$solaf_data->level];?></label>
                    <select data-validation="required" name="current_to_id" id="current_to_id_DirectManger" class="form-control" aria-required="true" onchange="
                            var link =$('#current_to_id_DirectManger :selected').attr('data-img');
                            var name =$('#current_to_id_DirectManger :selected').attr('data-name');
                            var job =$('#current_to_id_DirectManger :selected').attr('data-job');
                            $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                            $('#name-emp').text(name);
                            $('#to_user_n').val(name);
                            $('#job-title').text(job);
                            ">
                        <option value="">إختر</option>
                        <?php if (isset($employees_data)&&!empty($employees_data)) {
                            foreach ($employees_data as $row) { ?>
                        <option value="<?= $row->person_id ?>" data-img="<?= $row->person_img ?>" data-name="<?= $row->person_name ?>" data-job="<?= $row->job_title_n ?>"><?= $row->person_name ?></option>
                        <?php }
                        } ?>
                    </select>

                </div>
                <?php } ?>
            </div>
    </div>
    </form>

</div>
<div class="col-sm-3">
    <table class="table table-bordered" style="">
        <thead>
            <tr>
                <td colspan="2">
                    <img id="empImg" src="<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/".$solaf_data->personal_photo ?>" onerror='this.src="<?php echo base_url(); ?>/asisst/fav/apple-icon-120x120.png" class="center-block img-responsive"' style="width: 180px; height: 150px">
                </td>
            </tr>
        </thead>
        <tbody>
            <tr class="greentd">
                <td class="text-center">الإسم</td>
            </tr>
            <tr>
                <td id="name-emp" class="text-center"> <?php $solaf_data->emp_name?></td>
            </tr>
            <tr class="greentd">
                <td class="text-center">الوظيفة</td>
            </tr>
            <tr>
                <td id="job-title" class="text-center"><?php $solaf_data->job_title?></td>
            </tr>
        </tbody>
    </table>
</div>

</div>
<div class="modal-footer" style="display: inline-block;width: 100%;">
<?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && (in_array($solaf_data->level, array(1,2,3,4,5,6))   )) { ?>
    <button type="submit" style="float: right;" onclick="$('#form1').submit();" class="btn btn-success btn-labeled">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>
<?php } ?>
    <button type="button" class="btn btn-danger btn-labeled" onclick="$('#transform').modal('hide')"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق</button>
</div>
