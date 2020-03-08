<?php

//var_dump($all);
//var_dump($_SESSION);
?>
<style>


</style>
<!-- Flash Message -->
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>


<div class="col-sm-12 col-md-12 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?>  </h4>
            </div>
        </div>

        <div class="panel-body">
        <form method="post" id="form" action="<?= base_url() ?><?php echo (isset($family))? 'family_controllers/Family_categories/update_family_category/'.$family->id : 'family_controllers/Family_categories/add_family_category'; ?>">
			    <div class="form-group col-sm-12 col-xs-12 no-padding">   

                     <div class=" col-sm-6 col-xs-6 padd">
                        <label class="label label-green  half">اسم الفئه </label>
                        <input type="text" name="family_category" class="form-control half input-style" value="<?php if(isset($family->title)){ echo $family->title;}else{ echo '';} ?>" placeholder="فئة الاسرة" data-validation="required">
                        
                        
                    </div>
                
                                      <div class="col-sm-2 col-xs-2 padd">
                                        <label class="label label-green  half">لون الفئه </label>
        <input type="color" id="head" name="color"
               value="<?php if(isset($family)){ echo $family->color;}else{ echo '#e66465';} ?>" />
                  </div>
                
                </div>
                
                <div class="form-group col-sm-12 col-xs-12 no-padding">  
                <div class="col-sm-6 col-xs-6 padd">
                  	<label class="label label-green half">الحد الأدني للمبلغ</label>
                     <input type="text" onkeypress="validate_number(event);" name="from" class="form-control half input-style" 
                     value="<?php if(isset($family)){ echo $family->from;}else{ echo '';} ?>" placeholder="الحد الأدني للمبلغ" data-validation="required">
                 </div>
                 
                 <div class="col-sm-6 col-xs-6 padd">
                  	<label class="label label-green half">الحد الأقصي للمبلغ</label>
                    <input type="text" onkeypress="validate_number(event);" name="to" class="form-control half input-style"
                     value="<?php if(isset($family)){ echo $family->to;}else{ echo '';} ?>" placeholder="الحد الأقصي للمبلغ" data-validation="required">
                 </div>
                  
                </div>
                
                        <!------------------ osama  ------------------>
            <?php $category = array(
                '1' => 'مستفيد من جميع الخدمات',
                '2' => 'مستفيد من بعض الخدمات',
                '3' => 'لا يستفيد من الخدمات'
            ); ?>

            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <div class="col-sm-6 col-xs-6 padd">
                    <label  class="label label-green half">اختار نوع الاستفاده</label>
                   <div class="half" style="margin: 0px;">

                            <?php foreach ($category as $key=>$value){
                            $check = '';
                            if(isset($family->service_type)){
                                if($family->service_type == $key){
                                    $check = 'checked';
                                }
                            }

                            ?>
                          <div class="radio-content">
                                <input type="radio"  class="  error" <?= $check ?> value="<?= $key ?>" name="service_type" id="category<?= $key ?>" data-validation="required" style="border-color: rgb(185, 74, 72);" data-validation-has-keyup-event="true">  

                             <label class="radio-label" for="category<?= $key ?>"><?= $value ?> </label>
                           </div>
                            <?php } ?>
                        </div>


                </div>
                </div>


            <!------------------ osama  ------------------>

                
            

                
                
                
                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <div class="form-group col-sm-3 col-xs-12 padd">
                        <input type="submit" name="add_family" class="" value="حفظ">
                     </div>
                    </div>
                
            </form>   
            
            <?php if (isset($all) && !empty($all) && $all!=null){?>
             <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                 <tr class="greentd">
                     <th >#</th>
                     <th >الاسم </th>
                     <th >المدي </th>
                     <th >الإجراء </th>
                 </tr>
                 </thead>
                 <?php $x=1; foreach ($all as $record=>$value){?>
                 <tr>
                     <td ><?=$x++?></td>
                     <td ><?=$all[$record]->title ?></td>
                     <td ><?=$all[$record]->from .' - '. $all[$record]->to ?></td>
                     
                     <td >
                         <a href="<?php echo base_url().'family_controllers/Family_categories/edit_family_category/'.$all[$record]->id ?>" title="تعديل">
                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                         <span> </span>
                         <a href="<?=base_url()."family_controllers/Family_categories/delete_family_category/".$all[$record]->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                             <i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                 </tr>
                 <?php }?>
             </table>
             
        
         <?php  }?> 
        </div>
       
        
   </div>
</div>
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>