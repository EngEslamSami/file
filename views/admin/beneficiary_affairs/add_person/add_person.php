<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
            <!---form------>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);

?>

    </span>
<?php $father_status = array('حي','متوفي'); ?>
<?php $card_type = array('وثيقة وطنية ','اقامة ','جواز سفر'); ?>
<?php $group = array('أرملة','مطلقة ','زوج سجين','زوج مريض','متخلى عنها ','عزباء متخلى عنها ','دخل محدود ','أخرى'); ?>
<?php $house_type = array('من سميرا'); ?>         
<?php $healthy_type = array('جيد','متوسط','ضعيف'); ?>
<?php $job = array(' يعمل',' لا يعمل '); ?>
<?php $education_level= array('تعليم جامعي','الثانوية','المتوسطة','الإبتدائية','غير متعلم '); ?>  
        
    <?php if(isset($result)):?>
    <!-- <form class="form-horizontal">-->
    <?php echo form_open_multipart('BeneficiaryAffairs/update_person/'.$result[0]['id'])?>
  
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الملف:   </label>
                     <input type="number" class="choose-date form-control half"  value="<?php echo $result[0]['file_name'] ?>"  name="file_num" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم المستفيد</label>
               <input type="text" class="choose-date form-control half" value="<?php echo $result[0]['name'] ?>"  name="name" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12  ">
                    <label class="label label-green  half"> حالة الأب </label>
                   <select name="father_status" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر حالة الأب</option>
                    <?php for($x=0 ; $x<sizeof($father_status);$x++){
                        $selected='';
                        if($result[0]['father_status'] == $x){
                            $selected='selected="selected"';
                        }
                        
                        ?>
                    <option value="<?php echo $x ?>" <?php echo $selected; ?> ><?php echo $father_status[$x]; ?></option>
          
                    <?php } ?>
                    </select>
                </div>
               
            </div>
            
            
<div class="col-sm-12">
   <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم الهوية  </label>
    <input type="number" class="choose-date form-control half"  value="<?php echo $result[0]['card_id'] ?>" name="card_id" data-validation="required" >
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع الهوية  </label>
        <select name="card_type" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
        <option value="">إختر نوع الهوية</option>
                    <?php for($s=0 ; $s<sizeof($card_type);$s++){
                        $selected1='';
                        if($result[0]['card_type'] == $s){
                            $selected1='selected="selected"';
                        }
                        
                        ?>
        <option value="<?php echo $s; ?>" <?php echo $selected1; ?> ><?php echo $card_type[$s]; ?></option>
          
                    <?php } ?>
     </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
    <label class="label label-green  half">تاريخ الميلاد </label>
    <input  type="text"  id="datetimepicker1" class="form-control half"  name="birth_date" value="<?php echo$result[0]['birth_date'];  ?>"  data-validation="required" >  
    </div>

</div>

  <div class="col-sm-12">
   <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الفئة  </label>
     <select name="group" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
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
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">هاتف المنزل  </label>
        <input type="number" class="choose-date form-control half" value="<?php echo $result[0]['tele'] ?>" name="tele" data-validation="required" >
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم الجوال  </label>
      <input type="number" class="choose-date form-control half" value="<?php echo $result[0]['mob'] ?>" name="mob"  data-validation="required" >
    </div>  
  </div>
  
     <div class="col-sm-12">
     <div class="form-group col-sm-4 col-xs-12">
     <label class="label label-green  half">الجنسية </label>
      <select name="nationality_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
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
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع السكن  </label>
  
        <select name="house_type" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر نوع السكن</option>
                    <?php foreach($records_living as $living){ 
                        
                        $selected5='';
                        if($result[0]['house_type'] == $living->id){
                            $selected5='selected="selected"';
                        }
                        ?>
                    <option value="<?php echo $living->id; ?>" <?php echo $selected5; ?> ><?php echo $living->title; ?></option>
          
                    <?php } ?>
                    </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مكان السكن </label>
        <select name="house_palce" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
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
  <div class="col-sm-12">
  <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> الحالة الصحية </label>
     <select name="healthy_type" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
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
  <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">العمل </label>
        <select name="job" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
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
     <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> المستوي التعليمي </label>
      <select name="education_level" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
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
  <div class="col-sm-12">
        <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> نوع الصرف </label>
 <input type="text" class=" form-control choose-date form-control half"  value="<?php echo $result[0]['sarf_type'] ?>" name="sarf_type"  data-validation="required" >
    </div>  
     <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> الملاحظات </label>
 <textarea class=" form-control choose-date form-control half"  name="notes"  data-validation="required" >
 <?php echo $result[0]['notes'] ?>
 </textarea>
 </div>   
 </div>  
 
 <div class="col-xs-12">
 <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">الافراد:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="total"  name="total" value="<?php echo sizeof($result2); ?>"  class="form-control" readonly="readonly" placeholder="" >
              <input type="hidden" name="old_mal_num" id="old_family_num" value="<?php echo  sizeof($result2); ?>" />
        
             
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
        
        
         <?php if(isset($result2) && $result2 !=null){ 
             $type = array('زوجة','إبن','إبنة');
             $education = array('دون سن الدراسة','رياض أطفال','إبتدائي','متوسط','ثانوي','جامعي','خريج');
            
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
        


for($x = 0 ; $x < count($result2) ; $x++){
    
    echo '<tr>
           <td><input type="text" id="f_name'.$x.'" name="f_name'.$x.'" value="'.$result2[$x]->name.'" class="form-control  " required="required" /></td>
          <td>
               <select id="type'.$x.'" name="f_type'.$x.'" class="form-control" onchange="return education('.$x.');" required="required" >
               ';
              
               echo'<option value="">--قم بالإختيار--</option> ';
               for($s = 0 ; $s < count($type) ; $s++)
                               {
                                    if(($s+1) == $result2[$x]->type)
                                        $selec = 'selected';
                                    else
                                        $selec = '';
                                    echo '<option value="'.($s+1).'" '.$selec.'>'.$type[$s].'</option>';
                               }
               echo'</select>
           </td>
           <td>
               <select id="education'.$x.'" name="f_education'.$x.'" class="form-control" required="required">
               ';
                
             
               echo'<option value="">--قم بالإختيار--</option>';
                for($s = 0 ; $s < count($education) ; $s++)
                                   {
                                        if(($s+1) == $result2[$x]->education_level)
                                            $selec = 'selected';
                                        else
                                            $selec = '';
                                        echo '<option value="'.($s+1).'" '.$selec.'>'.$education[$s].'</option>';
                                   }
            echo ' </select>
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
<div id="optionearea1">
 </div>
 <div class="col-xs-12 r-inner-btn">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <input type="submit"  name="update" value="تعديل" class="btn btn-primary" >
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>
        </div>
    <?php echo form_close()?>
    <?php else: ?>
    <?php echo form_open_multipart('BeneficiaryAffairs/add_person')?>
  
    
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الملف:   </label>
                     <input type="number" class="choose-date form-control half"  name="file_num" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم المستفيد</label>
               <input type="text" class="choose-date form-control half"  name="name" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12  ">
                    <label class="label label-green  half"> حالة الأب </label>
                   <select name="father_status" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر حالة الأب</option>
                    <?php for($x=0 ; $x<sizeof($father_status);$x++){ ?>
                    <option value="<?php echo $x ?>"><?php echo $father_status[$x]; ?></option>
          
                    <?php } ?>
                    </select>
                </div>
            </div>
 <div class="col-sm-12">
   <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم الهوية  </label>
    <input type="number" class="choose-date form-control half"  name="card_id" data-validation="required" >
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع الهوية  </label>
        <select name="card_type" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
        <option value="">إختر نوع الهوية</option>
                    <?php for($x=0 ; $x<sizeof($card_type);$x++){ ?>
        <option value="<?php echo $x ?>"><?php echo $card_type[$x]; ?></option>
          
                    <?php } ?>
     </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
    <label class="label label-green  half">تاريخ الميلاد </label>
    <input  type="text"  id="datetimepicker1" class="form-control half"  name="birth_date" data-validation="required" >  
    </div>

</div>
<div class="col-sm-12">
   <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الفئة  </label>
     <select name="group" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر الفئة</option>
                    <?php for($xe=0 ; $xe<sizeof($group);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $group[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">هاتف المنزل  </label>
   <input type="number" class="choose-date form-control half"  name="tele" data-validation="required" >
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم الجوال  </label>
      <input type="number" class="choose-date form-control half"  name="mob"  data-validation="required" >
    </div>  
  </div>
  <div class="col-sm-12">
  
  
         <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الجنسية </label>
      <select name="nationality_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                    <option value="">إختر الجنسية</option>
                    <?php foreach($nationality as $nationality_data){ ?>
                    <option value="<?php echo $nationality_data->id; ?>"><?php echo $nationality_data->title; ?></option>
          
                    <?php } ?>
                    </select>
    </div>
    
    
    
           <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع السكن  </label>
  
        <select name="house_type" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر نوع السكن</option>
                    <?php foreach($records_living as $living){ ?>
                    <option value="<?php echo $living->id; ?>"><?php echo $living->title; ?></option>
          
                    <?php } ?>
                    </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مكان السكن </label>
  
    <select name="house_palce" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر مكان السكن</option>
                    <?php foreach($area as $area_data){ ?>
                    <option value="<?php echo $area_data->id; ?>"><?php echo $area_data->title; ?></option>
          
                    <?php } ?>
                    </select>
    </div>
  
  
    
    </div>
  
  
  
  
  
     <div class="col-sm-12">
  
         <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> الحالة الصحية </label>
     <select name="healthy_type" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر الحالة الصحية</option>
                    <?php for($xe=0 ; $xe<sizeof($healthy_type);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $healthy_type[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
    </div>  
  
  
  
    
         <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">العمل </label>
     <select name="job" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                    <option value="">إختر العمل</option>
                    <?php for($xe=0 ; $xe<sizeof($job);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $job[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
    </div>  
    
    
    
    
      
         <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> المستوي التعليمي </label>
      <select name="education_level" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                    <option value="">إختر المستوي التعليمي</option>
                    <?php for($xe=0 ; $xe<sizeof($education_level);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $education_level[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
    </div>  
    
    
  </div>
  
  
     
     
     <div class="col-sm-12">
        <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> نوع الصرف </label>
 <input type="text" class=" form-control choose-date form-control half"  name="sarf_type"  data-validation="required" >
    </div>  
     
     
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> الملاحظات </label>
 <textarea class=" form-control choose-date form-control half"  name="notes"  data-validation="required" ></textarea>
    </div>   
     
     
     
     </div>      
            
            
            
        <div class="col-xs-12">
       
            
        
            
           <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">الافراد:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="total" value="1" name="total" class="form-control" readonly="readonly" placeholder="" >
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
                        <?php $x=1; foreach($records as $record):?>
                            <tr>
                                <td data-title="#" class="text-center"><span class="badge"><?php echo  $x++ ;?></span></td>
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
    if($('#old_family_num').val() &&  $('#old_family_num').val() !=0){
      old_family_num = $('#old_family_num').val();  
      total = parseInt(male) + parseInt(female) + parseInt(old_family_num);
    }else{
        total = parseInt(male) + parseInt(female) + parseInt(0);
    }
    
    
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


<script>
function _calculateAge(x) { 
    if($('#f_birth_date'+x).val()){
     var now = new Date();
  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();
  var dateString = $('#f_birth_date'+x).val(); 
  var dob = new Date(dateString.substring(0,4),
                     dateString.substring(5,7)-1,
                     dateString.substring(8,10)          
                     );
  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";
  yearAge = yearNow - yearDob;
  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }
  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;
    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }
  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };
  if ( age.years > 1 ) yearString = " سنة";
  else yearString = " سنة";
  if ( age.months> 1 ) monthString = " شهر";
  else monthString = " شهر";
  if ( age.days > 1 ) dayString = " يوم";
  else dayString = " يوم";
  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years;
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = "فقط " + age.days + dayString ;
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years ;
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years ;
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years ;
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years;
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years  ;
  else alert("تنبيه، لا يمكن حساب تاريخ الميلاد .. برجاء كتابته صحيحاً.");
  $('#age'+x).val(ageString);
 }
 }
</script>
