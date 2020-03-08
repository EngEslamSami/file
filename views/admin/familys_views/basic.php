<style>
.inner-heading {
    background-color: #9ed6f3;
    padding: 10px;
}
.pop-text{
    background-color: #009688;
    color: #fff;
    padding: 7px;
    font-size: 14px;
    margin-bottom: 3px;
    margin-top: 3px;
}
.pop-text1{
    background-color:#eee;
     padding: 7px;
      font-size: 14px;
      margin-bottom: 3px;
       margin-top: 3px;
}
.pop-title-text{
    margin-top: 4px;
    margin-bottom: 4px;
    padding: 6px;
    background-color: #9ed6f3;
}
.span-validation{
    color: rgb(255, 0, 0);
    font-size: 12px;
    position: absolute;
    bottom: -10px;
    right: 50%;
}
.astric{
    color: red;
    font-size: 25px;
    position: absolute;
}
</style>

<div class="col-xs-12 fadeInUp wow" >
<?php $this->load->view('admin/familys_views/tabe_links'); ?>
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        
        <div class="panel-body">
  
             <div class="col-sm-12">
                <h6 class="text-center inner-heading"> البيانات الاساسية </h6>
            </div>
            <div class="col-sm-12 col-xs-12">
               <div class="form-group col-sm-4 col-xs-12">
               <label class="label label-green  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
                <input type="number" class="form-control half input-style" value="<?php if(isset($dataa) && $dataa!=null){echo   $dataa->mother_national_num;}else{ } ?>" readonly="readonly" />
               </div>
            
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم المستخدم <strong class="astric">*</strong> </label>
                    
               <input  type="text" value="<?php if(isset($dataa) && $dataa!=null){echo $dataa->mother_national_num;} ?>"  class="form-control half input-style" readonly="readonly"/>
                
                </div>
                
                  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong> </label>
                  <input type="number" value="<?php if(isset($dataa) && $dataa!=null){echo $dataa->mother_mob;} ?>"  class="form-control half input-style" readonly="readonly" />
                  
						            
                </div>
                <div class="form-group col-sm-4 col-xs-12">
          <div class="form-group">
				        	<a href="<?php echo  base_url()."family_controllers/Family/father" ?>">	<button type="submit" class="btn btn-blue btn-next" > إستمرار </button></a>
		</div>       
        </div>    
        </div>

</div>
</div>
  <script>
function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();  
        if(inchek.length > 10){
           document.getElementById('lenth_mob').style.color = '#F00';
           document.getElementById('lenth_mob').innerHTML = 'رقم الجوال مكون من عشر ارقام';
                       
           var inchek_out= inchek.substring(0,10);
          $(inchek_id).val(inchek_out);
        }
    }




    function valid()
    {
        if($("#user_pass").val().length < 4){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        }
        
        
    }
    
    
    
    
    function valid2()
    {
        if($("#user_pass").val() == $("#user_pass_validate").val()){
            document.getElementById('validate').style.color = '#00FF00';
            document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate').style.color = '#F00';
            document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    
    function pass_name(){
     //-----------------------------------------------------   
            var num =$("#mother_national_num").val();
         $("#user_name").val(num); 
        if($("#mother_national_num").val().length < 10){   
         document.getElementById('lenth').style.color = '#F00';
         document.getElementById('lenth').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num").val().length > 10){
                var mother_new=num.substring(0,10);
         $("#mother_national_num").val(mother_new);
         $("#user_name").val(mother_new);  
         document.getElementById('lenth').innerHTML = '';      
        }          
    //-------------------------------------------------------
     var user_username=$('#mother_national_num').val();
     if(user_username != "" &&  user_username !=0 &&  user_username.length >= 10){
     var dataString ='mother_national_num_chik='+ user_username ;
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
           data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           $("#lenth").html(html);
          // $("#lenth_mob").css('display' , 'none');
            } 
        });
      }
    
    }// end function

</script>