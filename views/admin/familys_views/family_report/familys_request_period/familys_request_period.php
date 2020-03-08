<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">
         <div class="col-sm-12">
        
               <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">من تاريخ </label>
            	  <input type="text" class="form-control date_melady half input-style " id="from_date" name="from_date"  />
               
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إلي تاريخ </label>
            	  <input type="text" class="form-control date_melady half input-style " id="to_date" name="to_date"  />
               
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">حالات الطلبات </label>
                       <select name="status_id_fk" id="status_id_fk" class="selectpicker form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" >
                            <option value="">--قم بإختيار الحالات --</option>
                            <option value="all"> الكل   </option>
                            <option value="gary"> جاري </option>
                            <option value="accept"> مقبول </option>
                            <option value="refuse">مرفوض</option>
                            <option value="forward">تحويل </option>
                            <option value="accredited"> معتمدة </option>
                            
                        </select>
                </div>
                
         
        <div class="col-sm-4 col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-2">
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
       
         var status_id_fk =$('#status_id_fk').val();
         var to_date =$('#to_date').val();
         var from_date =$('#from_date').val();
         
         if( status_id_fk != '' && to_date != '' && from_date != ''){
           
         var dataString = 'status_id_fk=' + status_id_fk+'&to_date='+to_date+'&from_date='+from_date;
         $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>family_controllers/reports/Family_reports/familys_request_period",
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
  