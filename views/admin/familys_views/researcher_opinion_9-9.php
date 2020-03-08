


 
<div class="col-sm-12" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">رأى الباحث 
             <?php if($basic_data_family["suspend"] == 4){
                   echo  "/"."رقم الملف :".$basic_data_family["file_num"] ;
                   } ?>
            </h3>
        </div>
        <div class="panel-body">
        
        
          <?php
  /*        
       echo '<pre>';
        print_r($family_new_cat);
         echo '<pre>';
*/
        ?>
        <?php
        
      /*  echo $family_cat[0]->category->id;
        
         echo '<pre>';
        print_r($family_cat);
        echo '<pre>';*/
        ?>
        
            <?php $arr_yes_no=array("",'نعم','لا','الى حد ما');?>
         <!-------------------------------------------------------------------------->
            <?php echo form_open_multipart('family_controllers/Family/SocialResearcher/'.$mother_national_num)?>
            
                   <div class="col-md-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">إسم الاب  <strong class="astric">*</strong> </label>
                    <input type="text"  value="<?php echo $basic_data_family['father_name']?>"  readonly="" class="form-control half input-style"   >
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">رقم السجل المدنى للأب<strong class="astric">*</strong> </label>
                    <input  type="text" value="<?php echo $basic_data_family['father_national_num'] ?>"  readonly="" class="form-control half input-style"  data-validation="required" >
                </div>
            </div>

            
            
          <div class="form-group col-sm-12" >
              <div class="col-sm-6">
                <label class="label label-green  half">هل الام متواجدة</label>
                <select  name="is_mother_present" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                    <option value="">إختر </option>
                    <?php  if(isset($arr_in) && !empty($arr_in) && $arr_in!= null) {
                        foreach ($arr_in as $x):
                            $selected = '';
                            if (isset($result)) {
                                if ($x->id_setting == $result['is_mother_present']) {
                                    $selected = 'selected';
                                }
                            } ?>
                            <option value="<?php echo $x->id_setting ?>" <?php echo $selected; ?> >
                                <?php echo $x->title_setting; ?> </option>
                        <?php endforeach;
                    }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}
                    ?>
                </select>
            </div>
              <div class="col-sm-6">
                  <label class="label label-green  half">إنطباع الام عن الزيارة</label>
                  <select name="mother_impression_visit" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                      <option value="">إختر </option>
                      <?php  if(isset($arr_op) && !empty($arr_op) && $arr_op!= null) {
                          foreach ($arr_op as $y):
                              $selected = '';
                              if (isset($result)) {
                                  if ($y->id_setting == $result['mother_impression_visit']) {
                                      $selected = 'selected';
                                  }
                              } ?>
                              <option value="<?php echo $y->id_setting ?>" <?php echo $selected; ?> >
                                  <?php echo $y->title_setting; ?> </option>
                          <?php endforeach;
                      }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}
                      ?>

                  </select>
              </div>
          </div>
            <div class="form-group col-sm-12" >
                <div class="col-sm-6">
                    <label class="label label-green  half">الاهتمام بنظافة المنزل</label>
                    <select name="home_cleaning" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر </option>
                        <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                            $selected='';
                            if(isset($result)){
                                if($x==$result['home_cleaning']){$selected='selected';}
                            }?>
                            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_yes_no[$x];?> </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">الاهتمام بنظافة الابناء</label>
                    <select name="child_cleanliness" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر </option>
                        <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                            $selected='';
                            if(isset($result)){
                                if($x==$result['child_cleanliness']){$selected='selected';}
                            }?>
                            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_yes_no[$x];?> </option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            
            

            
            
            
        <div class="form-group col-sm-12" >
     
        
                <div class="col-sm-6">
                    <label class="label label-green  half">فئة الاسرة</label>
                    
                    <select name="family_type" class="form-control half"   data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true"
      
                    >
                         <option value="">إختر </option>
                        <?php  if(isset($all_cat) && !empty($all_cat) && $all_cat!= null) {
                            foreach ($all_cat as $z):
                                $selected = '';
                                $disabled = 'disabled';
                                if (isset($all_cat)) {
                                    if ($z->id ==   $family_new_cat[0]->category->id) {
                                        $selected = 'selected';
                                        $disabled ="";
                                    }
                                } ?>
                                <option   value="<?php echo $z->id ?>" <?php echo $selected; ?><?php echo $disabled; ?> >
                                    <?php echo $z->title; ?> </option>
                            <?php endforeach;
                        }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}  ?>
                    </select> 


                </div>
                
                <?php
           $one_have =  (($family_new_cat[0]->all_mother_income -  $family_new_cat[0]->all_mother_masrof ) / ($family_new_cat[0]->member_num + 1) );
                ?>
                
                
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">نصيب الفرد   </label>
                    <input type="text"  value="<?php echo $one_have?>"  
                    readonly="" class="form-control half input-style"   >
                </div>
                
                
                
            </div> 

            <!--<div class="form-group col-sm-12" >
                <div class="col-sm-6">
                    <label class="label label-green  half">مرئيات الباحث</label>
                    <textarea name="videos_researcher" class="form-control half" rows="5" data-validation="required" >
                  <?php if(isset($result['videos_researcher'])&& $result['videos_researcher']!=null)
                  {echo $result['videos_researcher'];}?>
                    </textarea>
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">مرئيات رئيس قسم شؤون الاسر</label>
                    <textarea name="video_family_leader" class="form-control half" rows="5" data-validation="required" >
                          <?php if(isset($result['video_family_leader'])&& $result['video_family_leader']!=null){
                              echo $result['video_family_leader'];}?>

                    </textarea>
                </div>
            </div>
            -->
                  <?php $type=$this->uri->segment(5);?>
            <div class="form-group col-sm-12" >
                <div class="col-sm-6">
                    <label class="label label-green  half">مرئيات الباحث</label>
                    <textarea name="videos_researcher" class="form-control half" rows="5"
                              <?php if($type ==2){?> disabled data-validation="required"  <?php }else{ ?> data-validation="required" <?php } ?>>
                  <?php if(isset($result['videos_researcher'])&& $result['videos_researcher']!=null)
                  {echo $result['videos_researcher'];}?>
                    </textarea>
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">مرئيات رئيس قسم شؤون الاسر</label>
                    <textarea name="video_family_leader" class="form-control half" rows="5"
                        <?php if($type ==1){?> disabled data-validation="required"  <?php }else{ ?> data-validation="required" <?php } ?>>
                          <?php if(isset($result['video_family_leader'])&& $result['video_family_leader']!=null){
                              echo $result['video_family_leader'];}?>

                    </textarea>
                </div>
            </div>
            <div class="form-group col-sm-12" >
                <?php if(isset($result)):?>
                <button type="submit" class="btn btn-purple w-md m-b-5" name="update" value="update">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> تعديل</button>
                <?php else: ?>
                <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                <?php endif; ?>
            </div>

            <?php echo form_close()?>
         <!-------------------------------------------------------------------------->
        </div>
    </div>
</div>