<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">

<?php $father_status = array('حي','متوفي'); ?>
<?php $card_type = array('وثيقة وطنية ','اقامة ','جواز سفر'); ?>
<?php $group = array('أرملة','مطلقة ','زوج سجين','زوج مريض','متخلى عنها ','عزباء متخلى عنها ','دخل محدود ','أخرى'); ?>
<?php $house_type = array('من سميرا'); ?>         
<?php $healthy_type = array('جيد','متوسط','ضعيف'); ?>
<?php $job = array(' يعمل',' لا يعمل '); ?>
<?php $education_level= array('تعليم جامعي','الثانوية','المتوسطة','الإبتدائية','غير متعلم '); ?>  
        
    <?php if(isset($result)):?>
    <!-- <form class="form-horizontal">-->
    <?php echo form_open_multipart('BeneficiaryAffairs/update_area_settings/'.$result[0]['id'])?>
  
              <div class="col-xs-12">
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الملف:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="number" class="r-inner-h4" value="<?php echo $result[0]['file_name'] ?>"  name="file_num" data-validation="required" >
                    </div>
                </div>
                
            </div>
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> إسم الحالة (الام):  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4" value="<?php echo $result[0]['name'] ?>"   name="name" data-validation="required" >
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> حالة الأب:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="father_status" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر حالة الأب</option>
                    <?php for($x=0 ; $x<sizeof($father_status);$x++){ 
                        $selected='';
                        if($result[0]['father_status'] == $x){
                            $selected='selected="selected"';
                        }
                        ?>
                    <option  value="<?php echo $x ?>" <?php echo $selected;?> ><?php echo $father_status[$x]; ?></option>
          
                    <?php } ?>
                    </select>
                  
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الهوية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4" value="<?php echo $result[0]['card_id'] ?>"  name="card_id" data-validation="required" >
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع الهوية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="card_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر نوع الهوية</option>
                    <?php for($xx=0 ; $xx<sizeof($card_type);$xx++){ 
                        
                        $selected1='';
                        if($result[0]['card_type'] == $xx){
                            $selected1='selected="selected"';
                        }
                        ?>
                    
                    
                    <option value="<?php echo $xx ?>" <?php echo $selected1 ;?> ><?php echo $card_type[$xx]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تاريخ الميلاد:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input  type="text"  id="datetimepicker1" class="form-control docs-date" value="<?php echo date('Y-m-d',$result[0]['birth_date']);  ?>"  name="birth_date" data-validation="required" >
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الفئة:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="group" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر الفئة</option>
                    <?php for($xe=0 ; $xe<sizeof($group);$xe++){
                        
                        $selected3='';
                        if($result[0]['group'] == $xe){
                            $selected3='selected="selected"';
                        }
                        ?>
                        
                    <option value="<?php echo $xe; ?>" <?php echo $selected3; ?> ><?php echo $group[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> هاتف المنزل:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4" value="<?php echo $result[0]['tele'] ?>"  name="tele" data-validation="required" >
                    </div>
                </div>
            </div>
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الجوال:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4" value="<?php echo $result[0]['mob'] ?>"   name="mob"  data-validation="required" >
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الجنسية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="nationality_id_fk" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر الجنسية</option>
                    <?php foreach($nationality as $nationality_data){
                        
                        $selected4='';
                        if($result[0]['nationality_id_fk'] == $nationality_data->id){
                            $selected4='selected="selected"';
                        }
                        ?>
                    <option value="<?php echo $nationality_data->id; ?>" <?php echo $selected4; ?> ><?php echo $nationality_data->title; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
         
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع السكن:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="house_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر نوع السكن</option>
                    <?php for($xee=0 ; $xee<sizeof($house_type);$xee++){
                        $selected5='';
                        if($result[0]['house_type'] == $xee){
                            $selected5='selected="selected"';
                        }
                        
                        ?>
                    <option value="<?php echo $xee; ?>" <?php echo  $selected5;?> ><?php echo $house_type[$xee]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
         
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> مكان السكن:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="house_palce" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر مكان السكن</option>
                    <?php foreach($area as $area_data){
                         $selected6='';
                        if($result[0]['house_place'] == $area_data->id){
                            $selected6='selected="selected"';
                        }
                        
                        ?>
                    <option value="<?php echo $area_data->id; ?>" <?php echo $selected6; ?> ><?php echo $area_data->title; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الحالة الصحية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="healthy_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر الحالة الصحية</option>
                    <?php for($xed=0 ; $xed<sizeof($healthy_type);$xed++){
                         $selected7='';
                        if($result[0]['health_type'] == $xed){
                            $selected7='selected="selected"';
                        }
                        
                        ?>
                    <option value="<?php echo $xed; ?>" <?php echo $selected7; ?> ><?php echo $healthy_type[$xed]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> العمل:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="job" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر العمل</option>
                    <?php for($xev=0 ; $xev<sizeof($job);$xev++){
                        
                         $selected8='';
                        if($result[0]['job'] == $xev){
                            $selected8='selected="selected"';
                        }
                        ?>
                    <option value="<?php echo $xev; ?>" <?php echo $selected8; ?> ><?php echo $job[$xev]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
  
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> المستوي التعليمي:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="education_level" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر المستوي التعليمي</option>
                    <?php for($xec=0 ; $xec<sizeof($education_level);$xec++){
                         $selected9='';
                        if($result[0]['education_level'] == $xec){
                            $selected9='selected="selected"';
                        }
                        
                        ?>
                    <option value="<?php echo $xec; ?>" <?php echo $selected9; ?> ><?php echo $education_level[$xec]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع الصرف:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4"  value="<?php echo $result[0]['sarf_type'] ?>" name="sarf_type"  data-validation="required" >
                    </div>
                </div>
            </div>
            
            <div class="col-md-8  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الملاحظات:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <textarea class="r-inner-h4"  name="notes"  data-validation="required" >
                     <?php echo $result[0]['notes'] ?>
                    </textarea>
                    
                    </div>
                </div>
            </div>
            
            
           <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">الافراد:</h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="total"  name="total" value="<?php echo sizeof($result2); ?>" class="form-control" readonly="readonly" placeholder="" >
                </div>
            </div>
         </div>
           <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">ذكور:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="male_num"  name="male_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="ذكور" >
                </div>
            </div>
        </div>
       <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">إناث:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="femal_num"  name="femal_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="إناث" >
                </div>
            </div>
        </div>
        <div id="optionearea1">
        <?php if(isset($result2) && $result2 !=null){ 
            
            
            echo '<div class="col-xs-12 table-responsive">
      <table id="" class=" display table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th class=" ">الإسم اليتيم</th>
            <th class=" ">النوع</th>
            <th class=" ">المرحلة الدراسية</th>
            <th class=" ">تاريخ الميلاد</th>
            <th class="">العمر</th>
         
        </tr>
        </thead>
        <tbody>';
        
$x = 0;
$y = sizeof($result2);
if(isset($_POST['before'])){
    $x = sizeof($result2);
    $y = $_POST['before'];
}
       // var_dump($x);echo'<br>'; var_dump($_POST['before']);
for( ; $x < $y ; $x++){
    
    echo '<tr>
           <td><input type="text" id="f_name'.$x.'" name="f_name'.$x.'" value="'.$result2[$x]->name.'" class="form-control  " required="required" /></td>
          <td>
               <select id="type'.$x.'" name="f_type'.$x.'" class="form-control" onchange="return education('.$x.');" required="required" >
               ';
               $se1='';
               $se2='';
               $se3='';
               if($result2[$x]->type == 1){
                $se1='selected="selected"';
               }elseif($result2[$x]->type == 2){
                $se2='selected="selected"';
               }elseif($result2[$x]->type == 3){
                $se3='selected="selected"';
               }
               echo'<option value="">--قم بالإختيار--</option>
               <option value="1" '.$se1.'>زوجة</option>
               <option value="2" '.$se2.'>إبن</option>
               <option value="3" '.$se3.' >إبنة</option>
               </select>
           </td>
           <td>
               <select id="education'.$x.'" name="f_education'.$x.'" class="form-control" required="required">
               ';
                $sel1='';
               $sel2='';
               $sel3='';
               $sel4='';
               $sel5='';
               $sel6='';
               $sel7='';
               if($result2[$x]->education_level == 1){
                $sel1='selected="selected"';
               }elseif($result2[$x]->education_level == 2){
                $sel2='selected="selected"';
               }elseif($result2[$x]->education_level == 3){
                $sel3='selected="selected"';
               }elseif($result2[$x]->education_level == 4){
                $sel4='selected="selected"';
               }elseif($result2[$x]->education_level == 5){
                $sel5='selected="selected"';
               }elseif($result2[$x]->education_level == 6){
                $sel6='selected="selected"';
               }elseif($result2[$x]->education_level == 7){
                $sel7='selected="selected"';
               }
               echo'<option value="">--قم بالإختيار--</option>
               <option value="1" '.$sel1.'>دون سن الدراسة</option>
               <option value="2" '.$sel2.' >رياض أطفال</option>
               <option value="3" '.$sel3.'>إبتدائي</option>
               <option value="4" '.$sel4.'>متوسط</option>
               <option value="5" '.$sel5.'>ثانوي</option>
               <option value="6" '.$sel6.'>جامعي</option>
               <option value="7" '.$sel7.'>خريج</option>
               </select>
           </td>
            <td><input type="date" id="f_birth_date'.$x.'" name="f_birth_date'.$x.'" value="'.date("Y-m-d",$result2[$x]->birth_date).'" class="form-control  " required="required" onblur="_calculateAge('.$x.')" /></td>
           <td><input type="text" readonly id="age'.$x.'" name="age'.$x.'"  value="'.$result2[$x]->age.'" /></td>
           
          </tr>';
    
}

echo ' </tbody>
      </table>
      </div>';
      }
?>

            
        
        
        
        </div>
            
            <div class="col-xs-12 r-inner-btn">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <input type="submit" name="update" value="تعديل" class="btn btn-primary" >
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>
        </div>
 
    <?php echo form_close()?>
    <?php else: ?>
    <?php echo form_open_multipart('BeneficiaryAffairs/add_person')?>
  
    
        <div class="col-xs-12">
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الملف:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="number" class="r-inner-h4"  name="file_num" data-validation="required" >
                    </div>
                </div>
                
            </div>
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> إسم الحالة (الام):  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4"  name="name" data-validation="required" >
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> حالة الأب:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="father_status" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر حالة الأب</option>
                    <?php for($x=0 ; $x<sizeof($father_status);$x++){ ?>
                    <option value="<?php echo $x ?>"><?php echo $father_status[$x]; ?></option>
          
                    <?php } ?>
                    </select>
                  
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الهوية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4"  name="card_id" data-validation="required" >
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع الهوية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="card_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر نوع الهوية</option>
                    <?php for($x=0 ; $x<sizeof($card_type);$x++){ ?>
                    <option value="<?php echo $x ?>"><?php echo $card_type[$x]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تاريخ الميلاد:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input  type="text"  id="datetimepicker1" class="form-control docs-date"  name="birth_date" data-validation="required" >
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الفئة:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="group" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر الفئة</option>
                    <?php for($xe=0 ; $xe<sizeof($group);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $group[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> هاتف المنزل:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4"  name="tele" data-validation="required" >
                    </div>
                </div>
            </div>
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الجوال:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4"  name="mob"  data-validation="required" >
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الجنسية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="nationality_id_fk" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                    <option value="">إختر الجنسية</option>
                    <?php foreach($nationality as $nationality_data){ ?>
                    <option value="<?php echo $nationality_data->id; ?>"><?php echo $nationality_data->title; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
         
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع السكن:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="house_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر نوع السكن</option>
                    <?php for($xe=0 ; $xe<sizeof($house_type);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $house_type[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
         
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> مكان السكن:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="house_palce" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر مكان السكن</option>
                    <?php foreach($area as $area_data){ ?>
                    <option value="<?php echo $area_data->id; ?>"><?php echo $area_data->title; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الحالة الصحية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="healthy_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر الحالة الصحية</option>
                    <?php for($xe=0 ; $xe<sizeof($healthy_type);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $healthy_type[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> العمل:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="job" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر العمل</option>
                    <?php for($xe=0 ; $xe<sizeof($job);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $job[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
  
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> المستوي التعليمي:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="education_level" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                    <option value="">إختر المستوي التعليمي</option>
                    <?php for($xe=0 ; $xe<sizeof($education_level);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $education_level[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع الصرف:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4"  name="sarf_type"  data-validation="required" >
                    </div>
                </div>
            </div>
            
            <div class="col-md-8  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الملاحظات:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <textarea class="r-inner-h4"  name="notes"  data-validation="required" ></textarea>
                    
                    </div>
                </div>
            </div>
            
            
           <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">الافراد:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="total" value="0" name="total" class="form-control" readonly="readonly" placeholder="" >
                </div>
            </div>
         </div>
           <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">ذكور:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="male_num"  name="male_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="ذكور" >
                </div>
            </div>
        </div>
       <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">إناث:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="femal_num"  name="femal_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="إناث" >
                </div>
            </div>
        </div>
        <div id="optionearea1"></div>
            
            
            <div class="col-xs-12 r-inner-btn">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>
        </div>
 
        <!-- </form>-->
        <?php echo form_close()?>
    <?php endif?>

            <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th  class="text-center">إسم الحالة</th>
                            <th width="35%" class="text-center">التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($records as $record):?>
                            <tr>
                                <td data-title="#" class="text-center"><span class="badge"><?php echo  $record->id?></span></td>
                                <td data-title="" class="text-center"><?php echo $record->name?> </td>
                                <td data-title="التحكم" class="text-center">
                                    <a href="<?php echo base_url().'BeneficiaryAffairs/update_person/'.$record->id?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url().'BeneficiaryAffairs/delete_person/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                </td>
                            </tr>
                        <?php endforeach ;?>
                        </tbody>
                    </table>
                </div>
            <?php endif;?>

</div>

</div>






<script>

function calc(male,female)
{
    var old_family_num = 0;
    if(male == '')
        male = 0;
    if(female == '')
        female = 0;
    if($('#old_family_num').val())
        old_family_num = $('#old_family_num').val();
        
    total = parseInt(male) + parseInt(female) + parseInt(0);
    $('#total').val(total);

    if($('#total').val() > parseInt(0) && $('#total').val()>old_family_num)
    {
        if(old_family_num > 0){
        var dataString = 'num=' + (old_family_num) + '&before=' + ($('#total').val() - parseInt(0));
    }else{
        var dataString = 'num=' + ($('#total').val() - parseInt(0)); 
    }
        $.ajax({

            type:'post',
            url: '<?php echo base_url() ?>BeneficiaryAffairs/add_person',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
            $('#optionearea1').html(html);
            } 
        });
        return false;
    } 
    else
    {
        $('#total').val(0);
        $('#optionearea1').html('');
        return false;
    }  
    
}
</script>
<script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

</script>