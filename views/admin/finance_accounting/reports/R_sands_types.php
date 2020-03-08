
<div class="well bs-component col-lg-12" >
     <div class="col-lg-12">
           <div class="col-lg-3">
            <div class="form-group">
                        <label class="control-label">من تاريخ:</label>
                        <input type="date" id="date_from"  name="" class="form-control text-right" />
             </div>
           </div>
           <div class="col-lg-3">
               <div class="form-group">
                            <label class="control-label">الى تاريخ:</label>
                            <input type="date" id="date_to"  name=""  class="form-control text-right" >
                 </div>
           </div>
           <div class="col-lg-4">
               <div class="form-group">
                            <label class="control-label"> نوع السند :</label>
                            <select id="sanad_id"   class="form-control">
                       <option value="all">الكل</option>
                   <option value="1">صرف</option>
                   <option value="2">قبض</option>
                            </select> 
                 </div>
           </div>
           <div class="col-lg-2">
               <div class="form-group"> <br> 
                        <input type="button" onclick="get_data_table();"  value="بحث" class="btn btn-primary" >
                 </div>
           </div>
     
     </div>
      <div class="col-lg-12" id="option"></div>
     
</div>


<script>
    function get_data_table() {
        var from_date=$('#date_from').val();
        var to_date=$('#date_to').val();
        var id_sanad=$('#sanad_id').val();
      
        if(from_date !=0 && to_date  != '' && id_sanad!="") {
            var dataString = 'date_from=' + from_date + '&date_to=' + to_date + '&sanad_id=' + id_sanad;
            
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/finance_accounting/Vouchers_Peroid',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                 //    alert(dataString); 
                 //   alert(html); 
                    $("#option").html(html);
                }
            });
            return false;
        }else{
            alert("تأكد من إدخال جميع بيانات البحث"); 
        }
    }// end fuction
</script>













<!--

<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
        
        <div class="form-group col-sm-4">
                <label class="label label-green  half">من</label>
                <input type="date"  id="date_from" class="form-control half input-style" placeholder="">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">الي</label>
                <input type="date" class="form-control half input-style" id="date_to" placeholder="" >
            </div>
             <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع السند</label>
                <select  id="sand_id"  class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" id="send">
                    <option value=""  style="display: none;">اختر </option>
                 
                   <option value="0">الكل</option>
                   <option value="1">صرف</option>
                   <option value="2">قبض</option>
                </select>
            </div>
           
         <div class="form-group col-sm-4">
                <button class="btn btn-info" onclick="get_data_table($('#date_from').val(),$('#date_to').val(),$('#sand_id').val());">بحث</button>
            </div>
        
       
        
        </div>
        </div>
        </div>
         <div id="load_page"></div>

        
        
        <script>
    function get_data_table() {
        var from_date=$('#date_from').val();
        var to_date=$('#date_to').val();
        var sand_id=$('#sand_id').val();
      
        if(from_date !=0 && to_date  != '' && sand_id!="") {
            var dataString = 'date_from=' + from_date + '&date_to=' + to_date + '&sand_id=' + sand_id;
            
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/finance_accounting/Vouchers_Peroid',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){

                    $("#option").html(html);
                }
            });
            return false;
        }else{
            alert("تأكد من إدخال جميع بيانات البحث"); 
        }
    }
</script>
-->
