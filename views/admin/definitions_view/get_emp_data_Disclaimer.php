<?php 
if(isset($employees) && $employees != null){
?> 


        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
                     <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">السجل المدني </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="number" name="national_num" value="<?php echo $employees['id_num']  ?>" class="form-control" data-validation="required" />    


            </div>
            </div>
             </div>
             
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">المسمي الوظيفي </h4>
            </div>
            <div class="col-xs-6 r-input" >
            
            <input type="text" name="job_name" value="<?php echo $department_jobs[$employees['department']]; ?>" class="form-control" data-validation="required" />    


           
            </div>
            </div>
            </div>

<?php     
}
?>