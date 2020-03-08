
    <div class="col-sm-9 padding-4">
        <!--eslam-->
        <?php if($agaza_level > 1){ ?>
            <label>الموظف البديل</label>
            <table class="table table-bordered" border="1"  cellpadding="3" cellspacing="0"  style="width:100%">
                <tbody>
                
                <tr>
                    <td >إسم الموظف/<?= $personal_data->employee ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y') ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="background-color:#e6eed5; border-color:#73b300" >
                    
                  
                        <input type="radio"name="action1" id="tahod-1"  disabled <?php if($agaza_data->action_emp_badel ==1){  echo 'checked '; }?> value="1">
                        
                     <label class="radio-label" for="tahod-1">   أتعهد
                        بأن أقوم بإستلام جميع الأعمال الموكلة للموظف المذكور أعلاه قبل موعد أجازته وتنفيذها في
                        مواعيدها</label>
                       
                        <br>
                        
                         
                        <input type="radio" name="action1" id="tahod-2"  disabled <?php if($agaza_data->action_emp_badel ==2){  echo 'checked '; }?>
                               value="2">
                       <label class="radio-label" for="tahod-2"> 
                            <input size="60" type="text" name="reason_action" disabled
                                                value="<?php if($agaza_data->action_emp_badel ==2){
                                                    echo$agaza_data->reason_action; }?>"
                                                style="border: none; background-color: rgba(0, 0, 0, 0);">
                                              
                        </label>  
                                             
                     </td>
                </tr>

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

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                  
                        <input type="radio" id="tahod-mobasher-1" name="action2"  disabled
                            <?php if($agaza_data->action_direct_manager ==1){  echo 'checked '; }?>

                               value="1">
                        <label class="radio-label" for="tahod-mobasher-1"> أوافق على أجازة الموظف المذكور أعلاه وسيتم تسليم أعماله
                        للموظف البديل
                        
                        </label>  
                      
                        <br>
                         
                        <input type="radio" name="action2" id="tahod-mobasher-2" disabled 

                            <?php if($agaza_data->action_direct_manager ==2){  echo 'checked '; }?>
                               value="2">
                               <label class="radio-label" for="tahod-mobasher-2"> لا أوافق بسبب
                        
                        
                      </label>  
                 
                      
                      <input size="60" type="text" name="reason_action" disabled value="

                             <?php if($agaza_data->action_direct_manager ==2){
                            echo$agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?>">
                      
                      </td>
                </tr>
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
                    <td> ()أيام/يوما</td>
                    <td>()أيام/يوما</td>
                    <td>()أيام/يوما</td>
                    <td>()أيام/يوما</td>
                </tr>
                <tr>
                    <td colspan="2">الموظف المختص/<?= $level_2data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y',$level_2data->date) ?></td>
                </tr>
                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <input type="radio" name="action3"  disabled
                            <?php if($agaza_data->action_mowazf_moktas ==1){  echo 'checked '; }?>
                               value="1">أوافق<br>
                        <input type="radio" name="action3" disabled
                            <?php if($agaza_data->action_mowazf_moktas ==2){  echo 'checked '; }?>
                               value="2"> لا أوافق بسبب
                        <input size="60" type="text" name="reason_action" disabled value="
                       <?php if($agaza_data->action_mowazf_moktas ==2){  echo $agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?> "></td>
                </tr>
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

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <input type="radio" name="action4" disabled

                            <?php if($agaza_data->action_moder_hr ==1){  echo 'checked '; }?>
                               value="1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
                        مانع من تمتع الموظف بالأجازة<br>
                        <input type="radio" name="action4" disabled

                            <?php if($agaza_data->action_moder_hr ==2){  echo 'checked '; }?>
                               value="2"> لا أوافق بسبب
                        <input size="60" type="text" name="reason_action" disabled value="
                        <?php if($agaza_data->action_moder_hr ==2){  echo $agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?>"></td>
                </tr>
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

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <input type="radio" name="action5" disabled
                            <?php  if( $agaza_data->action_moder_final ==1 ){ echo 'checked'; } ?>
                               value="1">أوافق<br>
                        <input type="radio" name="action5" disabled
                            <?php if($agaza_data->action_moder_final ==2){
                                echo 'checked '; }?> value="2"> لا أوافق بسبب
                        <input size="60" type="text" name="reason_action" disabled value="
   <?php if($agaza_data->action_moder_final ==2){
                            echo $agaza_data->reason_action; }else{ ?>
   ................... <?php } ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">الإسم/<?= $level_4data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y',$level_4data->date) ?></td>
                </tr>
                </tbody>
            </table>

        <?php } ?>
    </div>
    
    <div class="col-sm-3">
    
    </div>


