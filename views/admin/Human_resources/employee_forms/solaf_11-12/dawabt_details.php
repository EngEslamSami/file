<div class="col-xs-10 padding-4">
 
<?php
                    $checked = array('', 'checked');
                    $type="checkbox";
                    if (isset($solaf_main_setting) && !empty($solaf_main_setting)) {
                        $form = $solaf_main_setting->id;
                        $da3m_value = $solaf_main_setting->da3m_value;
                        $aqsa_moda_sadad = $solaf_main_setting->aqsa_moda_sadad;
                        $had_adna = $solaf_main_setting->had_adna;
                        $bnod = array(9 => $solaf_main_setting->rateb_asasy, 11 => $solaf_main_setting->bdl_sakn
                        , 12 => $solaf_main_setting->bdl_mowaslat, 15 => $solaf_main_setting->bdl_jwal
                        , 10 => $solaf_main_setting->rateb_mokto3, 16 => $solaf_main_setting->bdl_ma3esha
                        , 13 => $solaf_main_setting->bdl_amal, 14 => $solaf_main_setting->bdl_taklef);


                    } else {
                        $type="hidden";
                        $form = 0;
                        $da3m_value = '';
                        $aqsa_moda_sadad = '';
                        $had_adna = '';
                        $bnod = array(9 => 0, 11 => 0, 12 => 0, 15 => 0
                        , 10 => 0, 16 => 0, 13 => 0, 14 => 0);

                    }
                    ?>
                            
 


<table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
 
            
<?php if($_SESSION['role_id_fk']==1) { ?>
       <td style="width: 143px;">
                <strong>المبلغ المرصود للدعم : </strong>
            </td>
            <td style="width: 10px;"><strong></strong></td>
            <td><?= $da3m_value ?></td>
<?php }else{
    
}?>            
            
            

            <td style="width: 143px;">
                <strong>أقصي مدة سداد: </strong>
            </td>
            <td style="width: 10px;"><strong></strong></td>
            <td><?= $aqsa_moda_sadad ?></td>
            <td style="width: 135px;"><strong> الحد الأدنى للإستقطاع</strong></td>
            <td style="width: 10px;"><strong></strong></td>
            <td><?= $had_adna ?></td>
           
        </tr>
        <tr>
            <td  style="width: 10px;"><strong>بنود الإستقطاع</strong></td>
            <td  style="width: 80px;"><strong></strong></td>
            <td  style="width: 80px;">
            
            <?php foreach ($badlat as $key => $value) {
                                            ?>
                                    <div class="check-style" style="display: inline-block;margin-left: 10px">



                                    <?php if (key_exists($value->id, $bnod) ) {
                                        if($bnod[$value->id] == 1){
                                            echo $value->title ;

                                        }
                                            } ?>
                                            
                                            
                                    </div>
                                        <?php } ?>
            
            
            </td>
           
           
        </tr>
        
        
                        




                         
						  
						  
        </tbody>
    </table>
   



</div>



</div>