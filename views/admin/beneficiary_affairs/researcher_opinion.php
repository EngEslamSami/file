          
    <div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">                 
<!-------------------------------------------------------------------------------------------------------------------------->
<?php echo form_open_multipart('BeneficiaryAffairs/researcher_opinion/'.$mother_national_num)?>

<?php 

$arr_in=array("",'نعم','نعم ولم تستطع مقابلتنا','نعم ولكن رفضضت مقابلتنا','لا');
$arr_op=array("",'متعاونة','متعاونة و تتهرب من بعض الاجابات','متعاونة و غير متقبلة الزيارة','متوفى');
$arr_home=array("",'نعم','لا','الى حد ما');
$arr_child=array("",'نعم','لا','الى حد ما');
$arr_type=array("",'أ','ب','ج','د','ه');
?>


<div class="col-md-6  col-sm-12 col-xs-12  inner-side r-data">
       <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">هل الام متواجدة</h4>
                </div>
                <div class="col-xs-6 r-input">
            <select name="is_mother_present" class="form-control">
            <option> اختر</option>
            <?php for($x=1;$x<sizeof($arr_in);$x++): 
            $selected='';
               if(isset($result)){
                if($x==$result['is_mother_present']){$selected='selected';}
               }
            
            ?>
            <option value="<?php echo $x?>" <?php echo $selected;?>  ><?php echo $arr_in[$x];?> </option>
            <?php endfor; ?>
            </select>
            
                </div>
            </div>
     <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الاهتمام بنظافة المنزل </h4> 
                </div>
                <div class="col-xs-6 r-input">
               <select name="home_cleaning" class="form-control">
                <option> اختر</option>
            <?php for($x=1;$x<sizeof($arr_home);$x++):
            $selected='';
               if(isset($result)){
                if($x==$result['home_cleaning']){$selected='selected';}
               }
             ?>
            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_home[$x];?> </option>
            <?php endfor; ?>
            </select>  </div>
            </div>
            
            
            <div class="col-xs-12">  
            <div class="col-xs-6">
                    <h4 class="r-h4"> فئة الاسرة </h4> 
                </div>
                <div class="col-xs-6 r-input">
               <select name="family_type" class="form-control">
                <option> اختر</option>
                <?php for($x=1;$x<sizeof($arr_type);$x++):
                 if(isset($result)){
                if($x==$result['family_type']){$selected='selected';}
               }
                ?>
                  <option value="<?php echo $x?>"  <?php echo $selected;?> ><?php echo $arr_type[$x]?></option>
                <?php endfor?>
                </select>  </div>
            </div> 
            
              
             <div class="col-xs-12">  
            <div class="col-xs-6">
                    <h4 class="r-h4">مرئيات  رئيس  قسم شؤون الاسر </h4> 
                </div>
                <div class="col-xs-6 r-input">
              <textarea name="video_family_leader"  class="r-textarea">
              <?php if(isset($result['video_family_leader'])&& $result['video_family_leader']!=null){
                     echo $result['video_family_leader'];}?></textarea>
               </div>
            </div> 
            
            
</div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

    <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> إنطباع الام عن الزيارة </h4>
                </div>
                <div class="col-xs-6 r-input">
                 <select name="mother_impression_visit" class="form-control">
                  <option> اختر</option>
                  <?php for($x=1;$x<sizeof($arr_op);$x++): 
                   $selected='';
               if(isset($result)){
                if($x==$result['mother_impression_visit']){$selected='selected';}
               }?>
            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_op[$x];?> </option>
            <?php endfor; ?>
           
            </select>   </div>
            </div>
     <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الاهتمام بنظافة الابناء </h4>
                </div>
                <div class="col-xs-6 r-input">
                   <select name="child_cleanliness" class="form-control">
                    <option> اختر</option>
            <?php for($x=1;$x<sizeof($arr_child);$x++): 
            $selected='';
               if(isset($result)){
                if($x==$result['child_cleanliness']){$selected='selected';}
               }?>
            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_child[$x];?> </option>
            <?php endfor; ?>
            </select>  
              </div>
            </div>
         
            <div class="col-xs-12">  
            <div class="col-xs-6">
                    <h4 class="r-h4">مرئيات الباحث</h4> 
                </div>
                <div class="col-xs-6 r-input">
              <textarea name="videos_researcher" class="r-textarea">
              <?php if(isset($result['videos_researcher'])&& $result['videos_researcher']!=null){echo $result['videos_researcher'];}?>
              
              </textarea>
               </div>
            </div> 
          
</div>         
<!--------------------------------------------------------------------------------------------------------------------------> 
                      
                   
                    <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn">
                     
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                         <a  href="<?php  echo base_url().'BeneficiaryAffairs/AllFilesDetails'?>">
                            <button type="button" class="btn btn-info">عودة</button> </a> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <?php if(isset($result)):?>
                      <input type="submit" role="button" name="update" class="btn btn-blue btn-next"  value="تعديل" />
                       <?php else: ?>
                         <input type="submit" role="button" name="add" class="btn btn-blue btn-next"  value="حفظ" />
                      
                       <?php endif; ?>
                        </div>
                      
                        <div class="col-md-3"></div>
                    </div>
                    <!--3 -->
           
    <?php echo form_close()?>
    
    
    </div>
    </div>
    </div>
