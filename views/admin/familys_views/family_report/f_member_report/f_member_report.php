<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">
         <div class="col-sm-12">
        
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">النوع </label>
                     <select name="gender_id_fk" id="gender_id_fk" class="selectpicker form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" >
                            <option value="">--قم بإختيار النوع --</option>
                            <option value="all">الكل</option>
                            <option value="1">ذكر</option>
                            <option value="2">أنثي</option>
                            
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العملية </label>
                       <select name="operation_id_fk" id="operation_id_fk" class="selectpicker form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" >
                            <option value="">--قم بإختيار العملية --</option>
                            <option value="1"> أكبر من  </option>
                            <option value="2">  أكبر من أو يساوي </option>
                            <option value="3"> أصغر من  </option>
                            <option value="4"> أصغر من أو يساوي </option>
                            <option value="5"> يساوي </option>
                            
                        </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العمر </label>
                    <input type="number" name="age" id="age" class="selectpicker form-control half"  min="0" max="100" 
                     onKeyUp="if(this.value>100){this.value='';}else if(this.value<0){this.value='0';}"/>
          
                </div>
        
         <div class="col-sm-12 col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
         <input type="button" value="ابحث" class="btn btn-primary search col-sm-2 " />
         </div>
        
      
       
       </div>
       <br/>
        <br/>
        <div id="area">
        </div>
        </div>
        
        </div>
        
        </div>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    
    $('.search').click(function(){
       
         var gender =$('#gender_id_fk').val();
         var operation_id_fk =$('#operation_id_fk').val();
         var age =$('#age').val(); 
         if( gender != '' && operation_id_fk != '' && age != '' ){
              
         var dataString = 'gender=' + gender+'&operation_id_fk='+operation_id_fk+'&age_data='+age;
         $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>family_controllers/reports/Family_reports/f_member_report",
                data: dataString,
                dataType: 'html',
                cache:false,
                success: function (html) {
                   
            $('#area').html(html);
                }
            });
            
            }else{
              $('#area').html('');
              alert('تأكد من الاختيارات المتاحة ');   
            }
        });
        </script>
  