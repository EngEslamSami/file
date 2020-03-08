<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">
         <div class="col-sm-12">
        
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">النوع </label>
                     <select name="gender_id_fk" id="gender_id_fk" class=" form-control half"   data-validation="required" >
                            <option value="">--قم بإختيار النوع --</option>
                            <option value="all">الكل</option>
                            <option value="1">ذكر</option>
                            <option value="2">أنثي</option>
                            
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> سنة الميلاد الهجري </label>
                    <input type="number" name="year_hegri" id="year_hegri" class=" form-control half"  min="0" />
                </div>

        
         <div class="col-sm-12 col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
         <input type="button" value="ابحث" onclick="getSearch()" class="btn btn-primary search col-sm-2 " />
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
    
   function getSearch() {

       var gender = $('#gender_id_fk').val();
       var year_hegri = $('#year_hegri').val();
       if (gender != '' && year_hegri != '') {

           var dataString = 'gender=' + gender + '&year_hegri=' + year_hegri;
           $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>family_controllers/reports/Family_reports/f_memberYearAgesReport",
               data: dataString,
               dataType: 'html',
               cache: false,
               success: function (html) {

                   $('#area').html(html);
               }
           });

       } else {
           $('#area').html('');
           alert('تأكد من الاختيارات المتاحة ');
       }
   }

        </script>
  