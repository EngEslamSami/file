<div class="col-sm-12 padding-4">
  <div class="col-sm-9 padding-4">
    <label>بيانات الموظف</label>
    <table class="table table-hover table-striped table-bordered" border="1"  cellpadding="3" cellspacing="0"  style="width:100%">
        <tbody>

        <tr>
            <td>إسم الموظف/<?php echo $solaf_data->emp_name; ?></td>
            <td>الإدارة/ <?php echo $solaf_data->edara_n;?></td>
            <td>القسم/ <?php echo $solaf_data->qsm_n;?></td>
        </tr>
        
        <tr>
            <td>طريقه سداد السلفه/<?php if($solaf_data->sadad_solfa==1){echo 'دفع نقدا';}elseif($solaf_data->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                    elseif($solaf_data->sadad_solfa==3){echo 'تخصم شهريا علي الراتب';}
                    ?>
           </td>
           <td>  قيمة السلفة/<?php echo $solaf_data->qemt_solaf; ?>
           </td>
           
        </tr>
        <tr>
            <td>عدد الاقساط/<?php echo $solaf_data->qst_num; ?>
           </td>
           <td>  قيمة القسط/<?php if($solaf_data->qst_num>0){echo round( ($solaf_data->qemt_solaf/$solaf_data->qst_num)*100)/100; }?>
           </td>
           
        </tr>
        <tr>
            <td> بداية الخصم/<?php echo $solaf_data->khsm_form_date_m; ?>
           </td>
           <td>   نهايه الخصم/<?php echo $solaf_data->khsm_to_date_m; ?>
           </td>
           
        </tr>

        </tbody>
    </table>

  </div>
  <div class="col-sm-3">
    <table class="table table-bordered" style="">
      <thead>
        <tr>
          <td colspan="2">
            <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $solaf_data->personal_photo?>"
          onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';"
             class="center-block img-responsive" style="width: 180px; height: 150px">
          </td>
        </tr>
      </thead>
    </table>
  </div>
</div>




















<div class="col-sm-12 padding-4">
  <?php if ($solaf_level >2) {
          ?>
  <div class="col-sm-9 padding-4">

        <label>    المدير المباشر</label>
        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
            <tr>
                <td colspan="4"></td>
            </tr>



            <?php if ($solaf_data->action_direct_manager ==1) {
                ?>
              <tr>
                  <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                    <div class="radio-content">
                      <input type="radio" id="accept-1"  checked ata-validation="required" name="action2"   value="1">


                        <label class="radio-label" for="accept-1">    أوافق على سلفه الموظف المذكور أعلاه 
                     </label>

                      </div>
                     </td>
              </tr>


<?php
            } elseif ($solaf_data->action_direct_manager ==2) {
                ?>
 <tr>
     <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

      <div class="radio-content">
         <input type="radio" name="action2" data-validation="required" checked id="accept-2" value="2">

          <label class="radio-label" for="accept-2">      لا أوافق بسبب  </label>
       </div>


        <?php echo$solaf_data->reason_action; ?>



        </td>
 </tr>
<?php
            } ?>


            <tr>
                <td colspan="2">الإسم/<?= $modeer_mobasher->employee; ?></td>
                <td>التوقيع/</td>
                <td>التاريخ/<?= date('d-m-Y') ?></td>
            </tr>
            </tbody>
        </table>
        <br> <br>

  </div>
  <div class="col-sm-3">
    <table class="table table-bordered" style="">
      <thead>
        <tr>
          <td colspan="2">
            <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_3data->from_user_photo?>"
    onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';"
            class="center-block img-responsive" style="width: 180px; height: 150px">
          </td>
        </tr>
      </thead>
    </table>
  </div>
  <?php
      } ?>
</div>











<div class="col-sm-12 padding-4">
  <?php if ($solaf_level >3) {
          ?>
  <div class="col-sm-9 padding-4">

        <label> الشؤون الاداريه</label>
        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">

            <thead>
            <tr class="info">
            <th>سبق له التمتع ب </th>
        <th>حد السلفه</th>
        <th></th>
        <th></th>
            </tr>
            </thead>
            <tbody>


            <tr>
                 <td> (<?php echo $solaf_data->num_previous_requests;?>)سلفه</td>
        <td>(<?php echo   $solaf_data->hd_solfa;?>)</td>
        <td></td>
        <td></td>
            </tr>
            <tr>
                <td colspan="2">الموظف المختص/<?= $level_3data->to_user_n ?></td>
                <td>التوقيع/</td>
                <td>التاريخ/<?= date('d-m-Y', $level_2data->date) ?></td>
            </tr>


                            <?php if ($solaf_data->action_mowazf_moktas ==1) {
                ?>

                              <tr>
                                  <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                    <div class="radio-content">
                                      <input type="radio" id="accept-1" checked data-validation="required" name="action3"

                                            value="1">


                                        <label class="radio-label" for="accept-1">أوافق</label>

                                      </div>
                                     </td>
                              </tr>


               <?php
            } elseif ($solaf_data->action_mowazf_moktas ==2) {
                ?>
                 <tr>
                     <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                      <div class="radio-content">
                         <input type="radio" name="action3" data-validation="required" id="accept-2" checked  value="2">

                          <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange2r(1);
                          $('#reason_action3').removeAttr('disabled');">      لا أوافق بسبب  </label>
                       </div>

                       <?php echo$solaf_data->reason_action; ?>

                        </td>
                 </tr>
               <?php
            } ?>


            </tbody>
        </table>
        <br> <br>



  </div>
  <div class="col-sm-3">
    <table class="table table-bordered" style="">
      <thead>
        <tr>
          <td colspan="2">
            <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_4data->from_user_photo?>"
    onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';"
             class="center-block img-responsive" style="width: 180px; height: 150px">

          </td>
        </tr>
      </thead>
    </table>
  </div>
  <?php
      } ?>
</div>












<div class="col-sm-12 padding-4">
  <?php if ($solaf_level >4) {
          ?>
  <div class="col-sm-9 padding-4">

        <label> الشؤون المالية</label>
        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
            <tr>
                <td colspan="4"></td>
            </tr>








            <?php if ($solaf_data->action_moder_hr ==1) {
                ?>

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


<?php
            } elseif ($solaf_data->action_moder_hr ==2) {
                ?>
 <tr>
     <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

      <div class="radio-content">
         <input type="radio" name="action" data-validation="required" id="accept-2" checked
                onclick="change_photo_DirectMange3r(2)$('#reason_action4').removeAttr('disabled'); "

                value="2">

          <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange3r(1);
          $('#reason_action4').removeAttr('disabled');">      لا أوافق بسبب  </label>
       </div>

      <?php echo$solaf_data->reason_action; ?>

        </td>
 </tr>
<?php
            } ?>


            <tr>
                <td colspan="2">الإسم/<?= $level_4data->to_user_n ?></td>
                <td>التوقيع/</td>
                <td>التاريخ/<?= date('d-m-Y', $level_3data->date) ?></td>
            </tr>
            </tbody>
        </table>
        <br> <br>


  </div>
  <div class="col-sm-3">
    <table class="table table-bordered" style="">
      <thead>
        <tr>
          <td colspan="2">
            <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_5data->from_user_photo?>"
    onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';"
             class="center-block img-responsive" style="width: 180px; height: 150px">
          </td>
        </tr>
      </thead>
    </table>
  </div>
  <?php
      } ?>

</div>

















<div class="col-sm-12 padding-4">
    <?php if ($solaf_level >5) {
            ?>
  <div class="col-sm-9 padding-4">



                <label>مدير عام الجمعية</label>
                <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                    <tbody>
                    <tr>
                        <td colspan="4"></td>
                    </tr>





                <?php if ($solaf_data->action_moder_final ==1) {
                ?>

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


                       <?php
            } elseif ($solaf_data->action_moder_final ==2) {
                ?>

                                                     <tr>
                                                         <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                                                          <div class="radio-content">
                                                             <input type="radio" name="action" data-validation="required" id="accept-2" checked
                                                                    onclick="$('#reason_action5').removeAttr('disabled');  $('#approved').val(2);"

                                                                    value="2">

                                                              <label class="radio-label" for="accept-2" onclick="$('#reason_action5').removeAttr('disabled');">      لا أوافق بسبب  </label>
                                                           </div>

                                                              <?php echo$solaf_data->reason_action; ?>

                                                            </td>
                                                     </tr>
                       <?php
            } ?>


                    <tr>
                        <td colspan="2">الإسم/<?= $level_4data->to_user_n ?></td>
                        <td>التوقيع/</td>
                        <td>التاريخ/<?= date('d-m-Y', $level_4data->date) ?></td>
                    </tr>
                    </tbody>
                </table>



  </div>
  <div class="col-sm-3">
    <table class="table table-bordered" style="">
      <thead>
        <tr>
          <td colspan="2">
            <img id="empImg_1" src="http://demo.abnaa-sa.org/asisst/fav/apple-icon-120x120.png"
    onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';"
            class="center-block img-responsive" style="width: 180px; height: 150px">
          </td>
        </tr>
      </thead>
    </table>
  </div>
      <?php
        } ?>
</div>
