
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?> </h3>
        </div>
        <div class="panel-body">

<div class="col-sm-12 col-xs-12">
    <?php $arr_sendto=array('1'=>"باليد",'2'=>"البريد الاكتروني",'3'=>"فاكس",'4'=>"البريد السعودى",'5'=>"اخري");?>
     <?php if(isset($results)):?>
   <?php echo form_open_multipart('admin/Secretary/update_secretary_export/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

        <div class="col-xs-12 r-inner-details">

            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ اليوم  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="text" id="" class=" docs-date" value="<?php echo $results['date_ar'] ?>" name="date" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-3 r-half">
                            <h4 class="r-h4">   رقم الصادر   </h4>
                        </div>
                        <div class="col-xs-3 r-half1 r-input">
                            <input type="text" name="export_num" value="<?php echo $results['export_num'] ?>" class="r-inner-h4 "  />
                        </div>
                        <div class="col-xs-3 r-half">
                            <h4 class="r-h4">  باركود  </h4>
                        </div>
                        <div class="col-xs-3 r-half1 r-input">
                            <img src="<?php echo base_url()?>asisst/admin_asset/img/img.png" alt="" class="r-barcode">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  نوع الخدمة </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <form class="r-block">
                                <?php if($results['export_type_id_fk']==0){

                                    echo' <input type="radio" class="r-radio" value="0" name="export_type_id_fk" onclick="get_service_type(\'0\');" checked id="r-in"/> داخلي
                                <input type="radio" class="r-radio" value="1" name="export_type_id_fk" id="r-out" onclick="get_service_type(\'1\');"/> خارجي
                                                         ';
                                }else{

                                echo' <input type="radio" class="r-radio" value="0" name="export_type_id_fk" onclick="get_service_type(\'0\');" id="r-in"/> داخلي
                                <input type="radio" class="r-radio" value="1" name="export_type_id_fk" onclick="get_service_type(\'1\');" checked id="r-out"/> خارجي
';                                            } ?>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data r-live">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الجهات الصادر اليها   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="organization_to_id_fk" >
                                <option> بـحــث . . . . </option>
                               
                                <?php foreach ($organizations as $record):
                                    if($results['organization_to_id_fk']== $record->id){
                                        $selected='selected';
                                    }else{
                                        $selected='';
                                    }
                                    ?>

                                    <option value="<?php echo $record->id ?>" <?php echo $selected; ?> ><?php echo $record->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($results['export_type_id_fk']==0){


                echo '                        <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 r-in">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الاقسام   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" value=" '.$results['organization_dep'] .'" class="r-inner-h4 " name="organization_dep">
                            </div> </div><div class="col-xs-12 r-out">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الأقسام    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " value=" '.$results['organization_other'] .'" name="organization_other">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 r-in">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الموظفين  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " value=" '.$results['organization_employee'] .'" name="organization_employee" />
                        </div>
                    </div>
                </div>
            </div>
';


            }else{
                echo '                      
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 r-in">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الاقسام   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" value="'.$results['organization_dep'] .'" class="r-inner-h4 " name="organization_dep">
                            </div> </div>
                            <div class="col-xs-12 r-out">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الأقسام    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " value=" '.$results['organization_other'] .'" name="organization_other">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 r-in">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الموظفين  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " value=" '.$results['organization_employee'] .'" name="organization_employee" />
                        </div>
                    </div>
                </div>
            </div>
';


            }
            ?>
        </div>
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  نوع المعاملة  </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <select name="transaction_id_fk" class="selectpicker form-control " aria-required="true" data-show-subtext="true" data-live-search="true">
                                <option> - اختر - </option>

                                <?php foreach ($transactions as $record):

                                    if($results['transaction_id_fk']== $record->id){
                                        $selected='selected';
                                    }else{
                                        $selected='';
                                    }
                                    ?>
                                    <option value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <?php if($results['organization_sub_to_id_fk'] !=0){ ?>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> المعامة الفرعية   </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <select name="organization_sub_to_id_fk" id="" class="selectpicker form-control" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" >
                                <option value=""> - اختر - </option>
                        <?php if(isset($transactions_sub) && !empty($transactions_sub) && $transactions_sub!=null){?>
                                <?php foreach ($transactions_sub as $record): ?>
                                    <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                                <?php endforeach; ?>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <?php }?>

                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> درجة الاهمية </h4>
                        </div>
                        <div class="col-xs-6 r-input r-import">
                            <div class="col-xs-6" >
                                <select name="importance_degree_id_fk">
                                <?php
                                if($results['importance_degree_id_fk']== 'سري') {
                                    echo '  <option> - اختر - </option>
                                    <option selected > سري </option>
                                    <option> سري للغاية </option>
                                    <option> عاجل </option>
                                    <option> اخري </option>';
                                }elseif($results['importance_degree_id_fk']== 'سري للغاية'){

                                    echo '  <option> - اختر - </option>
                                    <option  > سري </option>
                                    <option selected> سري للغاية </optionselected>
                                    <option> عاجل </option>
                                    <option> اخري </option>';

                                }elseif($results['importance_degree_id_fk']== 'عاجل'){

                                    echo '  <option> - اختر - </option>
                                    <option  > سري </option>
                                    <option > سري للغاية </optionselected>
                                    <option selected> عاجل </option>
                                    <option> اخري </option>';

                                }elseif($results['importance_degree_id_fk']== 'اخري'){

                                    echo '  <option> - اختر - </option>
                                    <option  > سري </option>
                                    <option > سري للغاية </optionselected>
                                    <option > عاجل </option>
                                    <option selected> اخري </option>';

                                }else{
                                    echo '  <option> - اختر - </option>
                                    <option  > سري </option>
                                    <option > سري للغاية </optionselected>
                                    <option > عاجل </option>
                                    <option > اخري </option>';
                                }   ?> </select>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="r-inner-h4 " value="<?php echo $results['importance_degree_other'] ?>" name="importance_degree_other">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  رقم القيد </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" class="r-inner-h4 " value="<?php echo $results['registration_number'] ?>" name="registration_number">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> طريقه التسليم  </h4>
                        </div>
                        <div class="col-xs-6 r-input r-import" >
                            <div class="col-xs-6">
                                <select name="method_recived_id_fk">
                                  
                                    <?php
                                    foreach($arr_sendto as $key=>$value){
                                       $selected="";   if($results['method_recived_id_fk']== $key) {$selected="selected";}
                                         echo ' <option value="'.$key.'"  '.$selected.'> '.$value.' </option>';
                                    }
                                       ?>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="r-inner-h4 " value="<?php echo $results['method_recived_other'] ?>" name="method_recived_other">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3">
                            <h4 class="r-h4"> عنوان الخطاب </h4>
                        </div>
                        <div class="col-sm-9 r-input">
                            <input type="text" class="r-inner-h4 " value="<?php echo $results['title'] ?>" name="title">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3">
                            <h4 class="r-h4"> بشأن  </h4>
                        </div>
                        <div class="col-sm-9 r-input">
                            <textarea class="r-textarea"  name="about"><?php echo $results['about'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3">
                            <h4 class="r-h4"> موضوع الخطاب  </h4>
                        </div>
                        <div class="col-sm-9 r-input">
                            <div class="adjoined-bottom">
                                <div class="grid-container">
                                    <div class="grid-width-100">

                                        <textarea class="r-textarea" id="" name="content" > <?php echo $results['content'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------->
         <?php if( $results["export_type_id_fk"]==0){
               $service_type_in="";    
                $service_type_out='style="display: none;"';      
               }elseif( $results["export_type_id_fk"]==1){
               $service_type_in='style="display: none;"'; 
               $service_type_out=""; 
               }?>
            <div class="col-xs-12 r-morfq"  >
                <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <h4 class="r-h4">  التوقيعات </h4>
                        </div>
                        <div class="col-xs-8 r-input">
                            <?php if(count($get_sign)==5) {
echo'<input type="number" id="signatures"  name="signatures" min="1" max="5" readonly class="r-inner-h4 " placeholder="   تم الوصول للحد الاقصي" 
       onkeyup="return lood($(\'#signatures\').val(),\'#optionearea3\',\'signatures\');"  >';

                            }else{
echo'<input type="number" id="signatures"  name="signatures" min="1" max="5"  class="r-inner-h4 " placeholder="   أقصى عدد 5" 
       onkeyup="return lood($(\'#signatures\').val(),\'#optionearea3\',\'signatures\');">';
                            }?>

                            <div class="col-xs-12 r-input" id="optionearea3"></div>
                            <?php $sign=$get_sign;$s=6;$s++;?>
                                     <?php  if($sign) {?>
                                        <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                                <th>الأجراء</th>
                                                            </tr>

                                              <?php             
                                                  $s=1;
                                                  for ($x = 0; $x < count($sign); $x++) {
                                                      if (count($sign) > 0) {
                                                          echo ' <tr>
                                                                <td>'.$s.'</td>
                                                                <td>' . $sign[$x]->name . '</td>
                                                                <td>' . $sign[$x]->job . '</td>
<td> <a  href="'.base_url().'admin/Secretary/delete_sign/'.$sign[$x]->id.'/'.$results['id'].'"  class="btn btn-danger btn-xs">
                    حذف <i class="fa fa-trash"></i></a></td>

                                                            </tr>';
                                                          $s++;
                                                      } else {
                                                          $td = '';
                                                      }

                                                  }
                                             ?>

                                                        </table>
                                                    </div>
                                                  <?php  }?>


                        </div>
                    </div>
                </div>
            <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data" id="service_type_in" <?php echo $service_type_in?>>
                <div class="col-xs-12">
                    <div class="col-xs-4">
                        <h4 class="r-h4"> المرفقات  </h4>
                    </div>
                    <div class="col-xs-8 r-input">
                        <?php
                        $x=20-count($get_img);

                        if(count($get_img)>=20){

                            echo'<input type="number" id="attachment"  name="attachment" min="1" readonly max="'.$x.'" onkeyup="return lood($(\'#attachment\').val(),\'#optionearea4\',\'attachment\');" class="r-inner-h4 " placeholder="   تم الوصول للحد الاقصي" >';

                        }else {
                            echo'<input type="number" id="attachment"  name="attachment" min="1"  max="'.$x.'" onkeyup="return lood($(\'#attachment\').val(),\'#optionearea4\',\'attachment\');" class="r-inner-h4 " placeholder="   اقصي عدد 5" >';

                        }?>
                        <div class="col-xs-12 r-input" id="optionearea4"></div>




                        <?php
                        $photo=$get_img;
                        ?>

<?php       if($photo){?>
                        <div class="col-xs-12">
                            <table style="width:100%">
                                <h4 class="r-table-text text-left"> المرفقات : </h4>
                                <tr>
                                    <th>م</th>
                                    <th>الاسم</th>
                                    <th>المرفق</th>
                                    <th>الأجراء</th>
                                </tr>

                                <?php       

                                    $s=6;
                                    $s++;
                                    for($x = 0 ; $x < count($photo) ; $x++){
                                        $img = base_url('uploads/images').'/'.$photo[$x]->img;
                                        if(count($photo) > 0)
                                        {
                                            echo ' <tr>
                                                                <td>'.$s.'</td>
                                                                <td>'.$photo[$x]->title .'</td>
                                                                <td><img src="'.$img.'" height="50px" width="50px"></td>
                                                                <td> <a  href="'.base_url().'admin/Secretary/delete_photo/'.$photo[$x]->id.'/'.$results['id'].'"  class="btn btn-danger btn-xs col-lg-12">
                    حذف <i class="fa fa-trash"></i></a></td>
                                                            </tr>';
                                            $s++;
                                        } else {
                                            $td = '';
                                        }

                                    }
                               ?>

                            </table>
                        </div>
                        <?php  }?>
                    </div>
                </div>
            </div>

            </div>
         
             <div class="col-xs-12 r-morfq" id="service_type_out" <?php echo $service_type_out?>>   <!-- chairman_committee  -->
                <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
               
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                         
                            <h4 class="r-h4">  المسمى الوظيفى  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                           <select name="chairman_committee_type" class="form-control">
                              <option value="">إختر  </option>
                              <option value="1" <?php if($results["chairman_committee_type"] ==1){echo 'selected';}?> > رئيس لجنة رعاية السجناء بحائل  </option>
                              <option value="2" <?php if($results["chairman_committee_type"] ==2){echo 'selected';}?> > المدير التنفيذي للجنة رعاية السجناء بحائل  </option>    
                           </select>
                        </div>
                    </div>
                </div>
               <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                   <div class="col-xs-12">
                     <div class="col-xs-6">
                        <h4 class="r-h4"> الاسم   </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="text"  name="chairman_committee_name" value="<?php echo $results["chairman_committee_name"]?>"  class="r-inner-h4 " placeholder=" " >
                  </div>
                </div>
            </div>
              
               </div>
          
            <!----------------------------------------------------------------------------------------------------->
            
            
<br />
            <div class="col-xs-4 " style="margin-right: 400px">
                <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
            </div>

        </div>

         <?php echo form_close()?>
    <?php else: ?>
    
    <?php echo form_open_multipart('admin/Secretary/secretary_export',array('class'=>"",'role'=>"form" ))?>


        <div class="col-xs-12 r-inner-details">

            <div class="col-xs-12">
          
            
    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ اليوم  </h4>
                        </div>
                        <div class="col-xs-6 r-input">

                                    <input type="text"  id="" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة " data-validation="required">

                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                    
                        <div class="col-xs-6 r-half">
                            <h4 class="r-h4">   رقم الصادر   </h4>
                        </div>
                        <div class="col-xs-6 r-half1 r-input">
                            <input type="number" name="export_num" class="r-inner-h4 " value="<?php echo $last_id+1?>" data-validation="required" >
                            <span style="color: red"> أخر صادر تم اضافته هو : <?php echo "5/302/".$last_id?> </span>
                        </div>
                        
                        
                        <div class="col-xs-3 r-half">
                            <h4 class="r-h4">  باركود  </h4>
                        </div>
                        <div class="col-xs-3 r-half1 r-input">
                            <img src="<?php echo base_url()?>asisst/admin_asset/img/img.png" alt="" class="r-barcode">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  نوع الخدمة </h4>
                        </div>
                        <div class="col-xs-6 ">

                                <input type="radio" class="r-radio" value="0" style="width: 15px" onclick="get_service_type('0');" name="export_type_id_fk" checked id="r-in" data-validation="required"/> داخلي
                                <input type="radio" class="r-radio" value="1" name="export_type_id_fk" onclick="get_service_type('1');" id="r-out" data-validation="required" /> خارجي

                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data r-live">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الجهات الصادر اليها   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select class="selectpicker" data-show-subtext="true" name="organization_to_id_fk" data-live-search="true" data-validation="required" aria-required="true">
                                <option value=""> بـحــث . . . . </option>
                                <?php foreach ($organizations as $record): ?>
                                    <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                                <?php endforeach; ?>

                         
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 r-in">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الاقسام   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="organization_dep">
                        </div>
                    </div>
                    <div class="col-xs-12 r-out">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الأقسام    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="organization_other">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 r-in">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الموظفين  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="organization_employee" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  نوع المعاملة  </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <select name="transaction_id_fk" id="transaction_id_fk" class="selectpicker form-control" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" onchange="get_sub_trans();" >
                                <option value=""> - اختر - </option>

                                <?php foreach ($transactions as $record): ?>
                                <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12" id="sub_trans">
                       
                    </div>

                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> درجة الاهمية </h4>
                        </div>
                        <div class="col-xs-6 r-input r-import">
                            <div class="col-xs-6" >
                                <select name="importance_degree_id_fk" class="form-control" data-validation="required" aria-required="true">
                                    <option value=""> - اختر - </option>
                                    <option value="1"> سري </option>
                                    <option value="2"> سري للغاية </option>
                                    <option value="3"> عاجل </option>
                                    <option value="4"> اخري </option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="r-inner-h4 " name="importance_degree_other" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  رقم القيد </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" class="r-inner-h4 " name="registration_number" data-validation="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> طريقه التسليم  </h4>
                        </div>
                        <div class="col-xs-6 r-input r-import" >
                            <div class="col-xs-6">
                                <select name="method_recived_id_fk" class="form-control" data-validation="required" aria-required="true" >
                                <option value="">اختر </option>
                                 <?php
                                    foreach($arr_sendto as $key=>$value){
                                  
                                         echo ' <option value="'.$key.'"> '.$value.' </option>';
                                    }
                                       ?>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="r-inner-h4 " name="method_recived_other">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3">
                            <h4 class="r-h4"> عنوان الخطاب  </h4>
                        </div>
                        <div class="col-sm-9 r-input">
                            <input type="text" class="r-inner-h4 " name="title" data-validation="required">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3">
                            <h4 class="r-h4"> بشأن  </h4>
                        </div>
                        <div class="col-sm-9 r-input">
                            <textarea class="r-textarea" name="about" data-validation="required"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3">
                            <h4 class="r-h4"> موضوع الخطاب   </h4>
                        </div>
                        <div class="col-sm-9 r-input">
                            <div class="adjoined-bottom">
                                <div class="grid-container">
                                    <div class="grid-width-100">

                                        <textarea class="r-textarea" id="" name="content"  data-validation="required"></textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------------------->          
            <div class="col-xs-12 r-morfq" >
                <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data" id="service_type_in">
               
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                         
                            <h4 class="r-h4">  التوقيعات </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" id="signatures"  name="signatures" min="1" max="5" onkeyup="return lood($('#signatures').val(),'#optionearea3','signatures');" class="r-inner-h4 " placeholder="   أقصى عدد 5" >
                        </div>
                    </div>
                    <div class="col-xs-12 r-input" id="optionearea3"></div>
                </div>
               <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                   <div class="col-xs-12">
                     <div class="col-xs-6">
                        <h4 class="r-h4"> المرفقات  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="number" id="attachment"  name="attachment" min="1" max="5" onkeyup="return lood($('#attachment').val(),'#optionearea4','attachment');" class="r-inner-h4 " placeholder="   أقصى عدد 20" >
                  </div>
                </div>
                   <div class="col-xs-12 r-input" id="optionearea4"></div>
            </div>
            </div>

              <div class="col-xs-12 r-morfq" id="service_type_out" style="display: none;">   <!-- chairman_committee  -->
                <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
               
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                         
                            <h4 class="r-h4">  المسمى الوظيفى  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                           <select name="chairman_committee_type" id="chairman_committee_type" class="form-control" onchange="get_name();">
                              <option value="">إختر  </option>
                              <option value="1"> رئيس لجنة رعاية السجناء بحائل  </option>
                              <option value="2">  المدير التنفيذي للجنة رعاية السجناء بحائل</option>    
                           </select>
                        </div>
                    </div>
                </div>
               <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                   <div class="col-xs-12">
                     <div class="col-xs-6">
                        <h4 class="r-h4"> الاسم   </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="text"  name="chairman_committee_name"  id="chairman_committee_name"  class="r-inner-h4 " placeholder=" " >
                  </div>
                </div>
            </div>
              
               </div>
              
        <!--------------------------------------------------------------------------------------------------------->


            <div class="col-xs-4 " style="margin-right: 400px">
                <input type="submit" class="btn btn-blue btn-next"  name="add" value="حفظ" />
            </div>

        </div>

    <?php echo form_close()?>
    <!--end-form------>
    <?php endif; ?>

    <!---table------>
    <?php if(isset($records)&&$records!=null):?>

        <div class="col-xs-12 r-secret-table">
            <div class="panel-body">
                <div class="fade in active">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center"> م </th>
                            <th class="text-center"> رقم الصادر </th>
                            <th class="text-center"> تاريخ الصادر </th>
                            <th class="text-center"> نوع المعاملة </th>
                            <th class="text-center"> درجة الاهمية </th>
                            <th class="text-center"> الاجراء </th>
                            <th class="text-center"> الطباعة </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php $a=1;foreach ($records as $record ): ?>
                            <tr>
                                <td><?php echo $a ?> </td>
                                <td> <?php echo  $record->export_num?> </td>
                                <td> <?php  echo $record->date_ar; ?> </td>
                                <td>  <?php echo $record->name; ?> </td>
                                <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                                <td><a href="<?php echo base_url('admin/Secretary/delete_export').'/'.$record->id ?>"   onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i> </a> <span>/
    </span> <a href="<?php echo base_url('admin/Secretary/update_secretary_export').'/'.$record->id ?>">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> </td>
                                <td >
                                    <button onclick="get_print('<?php echo  $record->id?>','<?php echo  $record->date_ar?>','<?php echo  $record->export_num?>');" class="btn btn-success">طباعه الباركود</button>
                                    <!--  <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>" > عرض</button> -->

                                </td>
                            </tr>
                            <?php
                            $a++;
                        endforeach;  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--end-table------>

    <div id="div_print" class="col-xs-4"></div>
</div>

        </div>
    </div>
</div>




<script>
function get_service_type(type){
 
   if(type == 0){
    $("#service_type_in").show();
    $("#service_type_out").hide();
   }else {
    $("#service_type_out").show();
    $("#service_type_in").hide();
   }
    
}
  ///=============================================
function get_name(){ 
      //  chairman_committee_type  chairman_committee_name
        var  type = $("#chairman_committee_type").val();
     if(type == 1){  
    $("#chairman_committee_name").val("منصور بن عقيل العمار");
   }else if(type == 2){ 
    $("#chairman_committee_name").val("عثمان بن سليمان السيف ");
   }else {
    $("#chairman_committee_name").val("");
   }
    
}


</script>




<script>
   function get_print(id ,date ,num){
      var print_id=id;
      var date_export=date;
      var num_post =num ;
        var dataString = 'id=' + print_id + '&type=' + 1 +  "&num="+num_post+"&date="+date_export ;
      
         $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Secretary/PrintCode',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#div_print").html(html);
                }
            });
            return false;
   }
</script>



<script>
    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0)
        {
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/Secretary/secretary_export',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });

            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }

</script>

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>

<style>
    .modal-style{
        transform: translate(0%, 0%) !important;
        top: 0% !important;
        max-width: 100%;
        width: 100% !important;
    }
</style>

<script>
    function get_sub_trans() {
        var ProductCode=$('#transaction_id_fk').val();
     //  alert(ProductCode);
        if(ProductCode >0 && ProductCode  != '') {
            var dataString = 'main_trans=' + ProductCode ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Secretary/secretary_export',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                   // alert(html);
             $("#sub_trans").html(html);
                }
            });
            return false;
        }
    }
    //-------------------------------------------------------------

</script>