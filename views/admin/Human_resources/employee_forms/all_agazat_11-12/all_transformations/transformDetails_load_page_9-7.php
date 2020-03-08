
    <div class="col-sm-12 padding-4">
        <!--eslam-->
        <label>بيانات الموظف</label>
        <table class="table table-hover table-striped table-bordered" border="1"  cellpadding="3" cellspacing="0"  style="width:100%">
            <tbody>

            <tr>
                <td>إسم الموظف/<?php echo $agaza_data->employee; ?></td>
                <td>الإدارة/ <?php echo $agaza_data->edara_n;?></td>
                <td>القسم/ <?php echo $agaza_data->qsm_n;?></td>
            </tr>
            <?php $from =explode('/',$agaza_data->agaza_from_date_m);
          $from =$from[2].'/'.$from[0].'/'.$from[1];
          $to =explode('/',$agaza_data->agaza_to_date_m);
          $to =$to[2].'/'.$to[0].'/'.$to[1];

            ?>
            <tr>
                <td>نوع الأجازة/ <?php echo $agaza_data->no3_title; ?></td>
                <td> تاريخ بداية الأجازة/<?php echo $from; ?></td>
                <td>تاريخ نهاية الأجازة/ <?php echo $to; ?></td>
            </tr>

            </tbody>
        </table>
        <?php if($agaza_level > 1 && $agaza_data->holiday_mowazf_badel ==1){ ?>
            <label>الموظف البديل</label>
            <table class="table table-bordered" border="1"  cellpadding="3" cellspacing="0"  style="width:100%">
                <tbody>

                <tr>
                    <td >إسم الموظف/<?= $personal_data->employee ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y') ?></td>
                </tr>



                <?php if($agaza_data->action_emp_badel ==1){?>
  <tr>
         <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
           <div class="radio-content">
             <input type="radio"  id="tahod-1" data-validation="required"
                    name="action1" value="1" checked>
             <label class="radio-label"  for="tahod-1">أتعهد
                 بأن أقوم بإستلام جميع الأعمال الموكلة للموظف المذكور أعلاه قبل موعد أجازته وتنفيذها في
                 مواعيدها</label>

             </div>
            </td>
     </tr>

   <?php }elseif ($agaza_data->action_emp_badel ==2){ ?>
     <tr>
         <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

          <div class="radio-content">
            <input type="radio" name="action1" checked onclick="change_photo(2);$('#reason_action1').removeAttr('disabled');" id="tahod-2" data-validation="required"
                   value="2" >


                   <label class="radio-label"  for="tahod-2">لا أوافق بسبب

        <?php echo$agaza_data->reason_action; ?>
                   </label>
           </div>





            </td>
     </tr>
   <?php   } ?>





                </tbody>
            </table>

        <?php } ?>
        <br>
        <?php if($agaza_level >2){?>
            <label>المدير المباشر</label>
            <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>



                <?php if($agaza_data->action_direct_manager ==1){?>
                  <tr>
                      <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <div class="radio-content">
                          <input type="radio" id="accept-1"  checked ata-validation="required" name="action2"   value="1">


                            <label class="radio-label" for="accept-1">    أوافق على أجازة الموظف المذكور أعلاه وسيتم تسليم أعماله
                          للموظف البديل </label>

                          </div>
                         </td>
                  </tr>


   <?php }elseif ($agaza_data->action_direct_manager ==2){ ?>
     <tr>
         <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

          <div class="radio-content">
             <input type="radio" name="action2" data-validation="required" checked id="accept-2" value="2">

              <label class="radio-label" for="accept-2">      لا أوافق بسبب  </label>
           </div>


            <?php echo$agaza_data->reason_action; ?>



            </td>
     </tr>
   <?php   } ?>


                <tr>
                    <td colspan="2">الإسم/<?= $agaza_data->direct_manager_n; ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y') ?></td>
                </tr>
                </tbody>
            </table>
            <br> <br>
        <?php } ?>


        <?php if($agaza_level >3){?>
            <label>إفادة شئون الموظفين</label>
            <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">

                <thead>
                <tr class="info">
                    <th>سبق له التمتع ب</th>
                    <th>عدد أيام الأجازة المستحقة</th>
                    <th>عدد أيام الأجازة المطلوبة</th>
                    <th>الرصيد المتبقي من الأجازة</th>
                </tr>
                </thead>
                <tbody>


                <tr>
                    <td> (<?php echo $agaza_data->past_vacations;?>)أيام/يوما</td>
                    <td>(<?php echo   $agaza_data->rseed_vacations;?>)أيام/يوما</td>
                    <td>(<?php echo   $agaza_data->num_days;?>)أيام/يوما</td>
                    <td>(<?php echo ($agaza_data->rseed_vacations - $agaza_data->num_days);?>)أيام/يوما</td>
                </tr>
                <tr>
                    <td colspan="2">الموظف المختص/<?= $level_2data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y',$level_2data->date) ?></td>
                </tr>


                                <?php if($agaza_data->action_mowazf_moktas ==1){?>

                                  <tr>
                                      <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                        <div class="radio-content">
                                          <input type="radio" id="accept-1" checked data-validation="required" name="action3"

                                                value="1">


                                            <label class="radio-label" for="accept-1">أوافق</label>

                                          </div>
                                         </td>
                                  </tr>


                   <?php }elseif ($agaza_data->action_mowazf_moktas ==2){ ?>
                     <tr>
                         <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                          <div class="radio-content">
                             <input type="radio" name="action3" data-validation="required" id="accept-2" checked  value="2">

                              <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange2r(1);
                              $('#reason_action3').removeAttr('disabled');">      لا أوافق بسبب  </label>
                           </div>

                           <?php echo$agaza_data->reason_action; ?>

                            </td>
                     </tr>
                   <?php   } ?>


                </tbody>
            </table>
            <br> <br>
        <?php } ?>

        <?php if($agaza_level >4){?>
            <label>مدير الموارد البشرية والشئون الإدارية</label>
            <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>








                <?php if($agaza_data->action_moder_hr ==1){?>

                  <tr>
                      <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <div class="radio-content">
                          <input type="radio" id="accept-1" data-validation="required" name="action" checked  onclick="change_photo_DirectMange3r(1)
                          $('#reason_action4').val('...........');
                           $('#reason_action4').attr('disabled',true);"

                                value="1">


                            <label class="radio-label" for="accept-1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
                     مانع من تمتع الموظف بالأجازة</label>

                          </div>
                         </td>
                  </tr>


   <?php }elseif ($agaza_data->action_moder_hr ==2){ ?>
     <tr>
         <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

          <div class="radio-content">
             <input type="radio" name="action" data-validation="required" id="accept-2" checked
                    onclick="change_photo_DirectMange3r(2)$('#reason_action4').removeAttr('disabled'); "

                    value="2">

              <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange3r(1);
              $('#reason_action4').removeAttr('disabled');">      لا أوافق بسبب  </label>
           </div>

          <?php echo$agaza_data->reason_action; ?>

            </td>
     </tr>
   <?php   } ?>


                <tr>
                    <td colspan="2">الإسم/<?= $level_3data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y',$level_3data->date) ?></td>
                </tr>
                </tbody>
            </table>
            <br> <br>

        <?php } ?>

        <?php if($agaza_level >5){?>

            <label>مدير عام الجمعية</label>
            <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>





            <?php if($agaza_data->action_moder_final ==1){?>

              <tr>
                  <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                    <div class="radio-content">
                      <input type="radio" id="accept-1" data-validation="required" name="action" checked
                     onclick="$('#reason_action5').val('...........'); $('#approved').val(1);
                       $('#reason_action5').attr('disabled',true);"

                            value="1">
                        <label class="radio-label" for="accept-1">أوافق</label>

                      </div>
                     </td>
              </tr>


                   <?php }elseif ($agaza_data->action_moder_final ==2){ ?>

                                                 <tr>
                                                     <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                                                      <div class="radio-content">
                                                         <input type="radio" name="action" data-validation="required" id="accept-2" checked
                                                                onclick="$('#reason_action5').removeAttr('disabled');  $('#approved').val(2);"

                                                                value="2">

                                                          <label class="radio-label" for="accept-2" onclick="$('#reason_action5').removeAttr('disabled');">      لا أوافق بسبب  </label>
                                                       </div>

                                                          <?php echo$agaza_data->reason_action; ?>

                                                        </td>
                                                 </tr>
                   <?php   } ?>


                <tr>
                    <td colspan="2">الإسم/<?= $level_4data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y',$level_4data->date) ?></td>
                </tr>
                </tbody>
            </table>

        <?php } ?>
    </div>
