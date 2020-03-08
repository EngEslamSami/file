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
    
    
    
        
     .top_radio{
        margin-bottom: 15px;
    }
.top_radio input[type=radio] {
    height: 30px;
    width: 30px;
    line-height: 0px;
    vertical-align: middle;
    margin-right: -36px;
    top: -5px;

}
.top_radio .radio,.top_radio .radio {
    vertical-align: middle;
    font-size: 20px;
    
        padding: 10px;
    border-bottom: 2px solid #eee;
    border-radius: 8px;
    text-align: right;
    
}
/*
.radio label::before{
    left: auto;
    right: 0;
}*/
.radio input[type="radio"] {
    opacity: 1;
}
</style>


<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">

<?php
/*
echo '<pre>';
print_r($records);
echo '<pre>';*/
?>
            <?php if(isset($records)&& $records!=null):?>
            <div class="col-xs-12">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                      <th class="text-center">رقم الملف</th>
                                      <th class="text-center">إسم رب الأسرة</th> 
                                        <th class="text-center">رقم الهوية</th> 
                                  
                                   
                                    <th class="text-center">إسم الأم</th>
                                     <th class="text-center">هوية الأم</th>
                              
                                
                                    <th class="text-center">تعديل البيانات</th>
                                <th class="text-center">إجراءات علي الملف</th> 
                                  <!--  <th class="text-center">رأي الباحث</th> -->
                                    <th class="text-center"> حالة الملف </th>
                                  <!--      <th class="text-center"> حالة الملف</th> -->
                                    <th class="text-center">تحديث الملف </th>
                                    <th class="text-center">طباعه</th>
                                    <th class="text-center">تتبع الملف </th>
                                 <!--   <th class="text-center">ربط الاسرة بالباحثين</th> -->
                                 <!-- <th class="text-center">احالة </th>  -->
                                </tr>
                                </thead>
                          <tbody class="text-center">
                                <?php  $x=1; foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $x++ ?></td>
                                          <td><?php echo $record->file_num; ?></td>
                                            <td><?php echo $record->father_name; ?></td>
                                            <td><?php echo $record->father_national; ?></td> 
                                      
             <td><?php if($record->mother_name != ''){ echo $record->mother_name; }else{
                                                echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات</button>'; }   ?> </td>
                                                  <td><?php echo $record->mother_new_card; ?></td>
                                      <!-- <td><?php echo $record->mother_mob; ?></td> -->
                                   
<td>

</td>
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">إجراءات</a>
</td>
<!--
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/SocialResearcher/<?php echo $record->mother_national_num;?>">إضافة رأي الباحث</a>
</td>
-->
<!--
<td style="color: black; background-color: <?php echo $record->files_status_color ?>;">
<?php echo $record->process_title;?></td>
-->
    <?php if($record->file_status ==0){
             $status_f_title =  ' حالة الملف';
             $status_Btn_class = 'info';
             $status_Btn_class_i = 'info';
              }else{ 
               $status_f_title =  $record->process_title;
                 $status_Btn_class = $record->files_status_color ;
                     $status_Btn_class_i = '';  
                    } ?> 

<td>




 <button style="color:black ; background-color:<?php echo $status_Btn_class; ?>  " data-toggle="modal"
         data-target="#modal-info<?php echo $record->id;?>"
         class="btn btn-sm btn-<?php echo $status_Btn_class_i;  ?>"><i
        class="fa fa-list btn-<?php echo $status_Btn_class_i;  ?>"></i> <?php echo $status_f_title; ?>
</button>

</td>





<td style="color: black;">
    <?php if($record->file_update_date ==0){
             $f_title =  ' تحديث الملف';
             $Btn_class = 'info';
              }else{ 
               $f_title =  $record->file_update_date;
                 $Btn_class = 'add';  
                    } ?> 


<button data-toggle="modal" <?php if($record->suspend!=4){?> disabled="disabled"  <?php } ?>
        data-target="#modal-update<?php echo $record->id;?>"
        class="btn btn-sm btn-<?php echo $Btn_class; ?>"><i
        class="fa fa-list btn-<?php echo $Btn_class; ?>"></i>
        
        <?php echo $f_title; ?>
        
        
 <br /> 
</button>

</td>
  <td><a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" >
                                                <i class="fa fa-print" aria-hidden = "true" ></i > </a>
                                                
                                                <a  href = "<?php echo base_url('family_controllers/Family_details/print_card').'/'.$record->mother_national_num ?>" target = "_blank" >
<i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>
                                                
                                                
                                                </td>

                                           
<td style="color: black;">
    <!--
    <button data-toggle="modal" data-target="#modal-lagna-family-<?php echo $record->id;?>" class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i> تتبع الملف
    </button>
    -->
</td>
                                            
                                    </tr>
                                  <?php endforeach;  ?>
                          </tbody>
                </table>
            </div>
                 <?php 
                 
                 /*
                  $x=1; foreach ($records as $record ):
                 
                $validation = 'data-validation="required" ';
                  $button ='حفظ';
                 ?>
                    <!-- start  -->
                    
                    
 <!------------------------------------ الملف تحديث----------------------------------------------->
  <!--
	                    <div class="modal fade" id="modal-update<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> تحديث حاله ملف  الأسره </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status">
                                        <div class="col-md-12">
                                            <input type="hidden" name="mother_national" value="<?php echo $record->mother_national_num;?>">
                                            <?php
                                            $file_num
                                            ?>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                                                <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                                                       value=" <?php  if($record->file_num!=0){ echo  $record->file_num; }
                                                       else {  echo  ($file_num + 1) ;}?>"
                                                       id="file_num"   <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ فتح  الملف  <strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style " <?php if($record->file_update_date!=0){ ?>  readonly="readonly"  <?php   } ?>  name="date_suspend" value="<?php echo  date("Y-m-d");?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half">تاريخ اخر تحديث<strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style" <?php if($record->file_update_date!=0){ ?>  readonly="readonly"  <?php   } ?>  onchange="get_peroid_update($(this).val(),<?php echo $record->id;?>);"
                                                       name="last_update_date" value="<?php if(isset($record->file_update_date)&&$record->file_update_date!=0){ echo $record->file_update_date; }else { echo  date("Y-m-d"); } ?>"

                                                       id="update_date_last<?php echo $record->id;?>"
                                                    <?=$validation?> />
                                            </div>



                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                                                <select id="peroid_update<?php echo $record->id;?>" name="peroid_update" class="form-control half input-style"
                                                        onchange="get_peroid($(this).val(),<?php echo $record->id;?>);">
                                                    <option value="0">اختر</option>
                                                    <?php
                                                    if(isset($all_options)&&!empty($all_options)) {
                                                        foreach ($all_options as $row) {
                                                            ?>
                                                            <option value="<?php echo $row->num_of_day;?>" <?php if(isset($record->peroid_update )&&!empty($record->peroid_update)&&$record->peroid_update==$row->num_of_day ){?>    <?php } ?>> <?php echo $row->title;?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ  التحديث<strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style"
                                                       name="update_date" value=""

                                                       id="update_date<?php echo $record->id;?>"
                                                    <?=$validation?> />
                                            </div>


                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-purple w-md m-b-5" 
                                                name="register" id="register" value="register">
                                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                    </span> <?=$button?></button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>      
-->
 <!---------------------------------------------------------------------->                   

                    



                <?php endforeach; */ ?>

            <?php endif; ?>
            <!---------------------------->
        </div>
    </div>
</div>
<script>
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#om_bank_code').val(valu[1]);
    }
    function get_banck_code_wakeel(valu2)
    {
        var valu2=valu2.split("-");
        $('#wakeel_bank_code').val(valu2[1]);
    }
</script>
<script>
    /*
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
     */
    function length_hesab_om(length) {
        var len=length.length;
        if(len<24){
            alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
        }
        if(len==24){
        }
    }
    function length_hesab_wakeel(length) {
        var len=length.length;
        if(len<24){
            alert(" رقم الحساب  لابد الايقل عن 24 حرف او رقم");
        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
            //  document.getElementById('register').setAttribute("disabled", "disabled");
        }
        if(len==24){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }
    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }
    function chek_len_mother_mob(valu)
    {
        if(valu.length < 10){
            document.getElementById("lenth_mob").style.color = '#F00';
            document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $('#mother_mob').val(inchek_out);
        }
        if(valu.length > 10){
            document.getElementById("lenth_mob").style.color = '#F00';
            document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';
            var inchek_out= inchek.substring(0,10);
            $('#mother_mob').val(inchek_out);
        }
        if(valu.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");
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
    function valid3()
    {
        if($("#user_pass_2").val().length < 4){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass_2").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass_2").val().length > 10){
            document.getElementById('validate2').style.color = '#00FF00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور قوية';
        }
    }
    function valid4()
    {
        if($("#user_pass_2").val() == $("#user_pass_validate_2").val()){
            document.getElementById('validate3').style.color = '#00FF00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate3').style.color = '#F00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور غير متطابقة';
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
<script>
    function pass_name_2(){
        //-----------------------------------------------------
        var num_2 =$("#mother_national_num_2").val();
        $("#user_name_2").val(num_2);
        if($("#mother_national_num_2").val().length < 10){
            document.getElementById('lenth_2').style.color = '#F00';
            document.getElementById('lenth_2').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num_2").val().length > 10){
            var mother_new_2 =num_2.substring(0,10);
            $("#mother_national_num_2").val(mother_new_2);
            $("#user_name_2").val(mother_new_2);
            document.getElementById('lenth_2').innerHTML = '';
        }
        //-------------------------------------------------------
        var user_username_2 =$('#mother_national_num_2').val();
        if(user_username_2 != "" &&  user_username_2 !=0 &&  user_username_2.length >= 10){
            var dataString_2 ='mother_national_num_chik ='+ user_username_2 ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
                data:dataString_2,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#lenth_2").html(html);
                    // $("#lenth_mob").css('display' , 'none');
                }
            });
        }
    }// end function
</script>
<script>
    function getPerson_response(valu) {
        var response =valu;
        if(response ==0){
            document.getElementById("agent_name").value="";
            document.getElementById("agent_card").value="";
            document.getElementById("agent_relationship").value="";
            document.getElementById("agent_mob").value="";
            document.getElementById("agent_card_source").value="";
            document.getElementById("agent_bank_account").value="";
            document.getElementById("bank_account_id2").value="";
            document.getElementById("agent_name").setAttribute("disabled", "disabled");
            document.getElementById("agent_card").setAttribute("disabled", "disabled");
            document.getElementById("agent_relationship").setAttribute("disabled", "disabled");
            document.getElementById("agent_mob").setAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").setAttribute("disabled", "disabled");
        }
        if(response ==1){
            document.getElementById("agent_name").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card").removeAttribute("disabled", "disabled");
            document.getElementById("agent_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("agent_mob").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").removeAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").removeAttribute("disabled", "disabled");
            document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            //=====
            document.getElementById("person_account").value="";
            document.getElementById("person_account").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_code").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            //========
        }
    }
</script>
<script>
    function checkPerson_account() {
        var person_account =$('#person_account').val();
        if(person_account ==0){
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            //  document.getElementById("om_bank_num").value="";
        }else{
            document.getElementById("bank_account_id1").removeAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");
        }
    }
    function checkAgent_bank_account() {
        var agent_bank_account =$('#agent_bank_account').val();
        var person_account =$('#person_account').val();
        if(person_account == 1){
            document.getElementById("agent_bank_account").value="";
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
        }else{
            if (agent_bank_account == 0) {
                document.getElementById("bank_account_id2").setAttribute("disabled", "disabled");
                // document.getElementById("bank_account_id2").value="";
                document.getElementById("wakeel_bank_num").setAttribute("disabled", "disabled");
            } else {
                document.getElementById("bank_account_id2").removeAttribute("disabled", "disabled");
                document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            }
        }
    }
</script>
<script>
    function get_peroid_update(from_date,id)
    {
        var peroid= $('#peroid_update'+id).val();
        if(peroid==0)
        {
            $('#update_date'+id).val('');
            return;
        }
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/get_date_update",
            data:{from_date:from_date,peroid:peroid},
            success:function(d){
               $('#update_date'+id).val(d);

            }
        });
    }



</script>
<script>
    function get_peroid(value,id)  //old 
    {
        var date_last= $('#update_date_last'+id).val();
        if(value==0)
        {
            $('#update_date'+id).val('');
            return;
        }

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/get_date",
            data:{value:value,date_last:date_last},
            success:function(d){
                $('#update_date'+id).val(d);
            }
        });
    }
/*
    function get_peroid(value,id)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/get_date",
            data:{value:value},
            success:function(d){
                $('#update_date'+id).val(d);
            }
        });
    }
    */
</script>
<!--
<script>
   function get_peroid(value)
   {
       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>/family_controllers/Family/get_date",
           data:{value:value},
           success:function(d){
               $('#update_date').val(d);
           }
       });
   }
</script>
-->
<script>
    function change_status(process_id,title,mom)
    {
        var reason=$('.reason'+mom).val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>













<!---------------------------------------------------------------------------->
<!--
<script>
   function get_peroid(value)
   {
       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>/family_controllers/Family/get_date",
           data:{value:value},
           success:function(d){
               $('#update_date').val(d);
           }
       });
   }
</script>
-->
<script>
    function change_status(process_id,title,mom)
    {
        var reason=$('.reason'+mom).val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>

<!--
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
<?php if(isset($result) && $result!=null){
           $form= form_open_multipart("person_controllers/Person/update_basic/".$result->id);
          $person_national_num=$result->person_national_num;
          $user_name=$result->user_name;
          $person_mob=$result->person_mob;
          $validation ='';
          $button ='تعديل ';
           $register_place=$result->register_place;
     }else{
          $form= form_open_multipart("person_controllers/Person/Add_Register");
          $person_national_num="";
          $user_name='';
          $person_mob='';
          $validation ='data-validation="required"';
          $button ='حفظ';
          $register_place='';
     }
?>
<div class="col-xs-12  " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(isset($records)&&$records!=null){?>

                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                              <th class="text-center">إسم الأم </th>
                                            <th class="text-center">رقم السجل المدني للام</th>
                                          
                                            <th class="text-center">رقم الجوال</th>
                                            <th class="text-center">الاجراء</th>
                                      
                                              <th class="text-center">تفاصيل</th>
                                           
                                                <th class="text-center">طباعه الملف</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php
if($record->mother_name != ''){ echo $record->mother_name; }else{ 
    echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل بيانات الأم</button>'; } 
?></td>
<td><?php echo $record->mother_national_num; ?></td>

<td><?php echo $record->mother_mob; ?></td>
<td> <a href="<?php echo base_url('family_controllers/Family/update_basic').'/'.$record->id?>"> 
<i class="fa fa-pencil " aria-hidden="true"></i> </a> 
<a href="<?php echo  base_url('family_controllers/Family/delete_basic').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
<i class="fa fa-trash" aria-hidden="true"></i></a>
</td>

     
     <td>
   <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">تفاصيل</a>
      
     </td>
     
     

     
     
     
   <td>
   
   <a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" > <i class="fa fa-print" aria - hidden = "true" ></i > </a>
<a  href = "<?php echo base_url('family_controllers/Family_details/print_card').'/'.$record->mother_national_num ?>" target = "_blank" >
<i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>
</td>


     
    </tr>






    <?php
  
endforeach;

  ?>
<?php }else{
        echo '
	<div class="alert alert-danger" role="alert">
لا يوجد ملفات
</div>';
	
    
} ?>
</tbody>
</table>    
   
</div>
</div>
</div>      
</div>
</div>
</div>

-->


<script>
    function change_file_status(process_id,title,mom)
    {
        var reason_ids=[];
        $(".check"+mom+':radio:checked').each(function(){reason_ids.push($(this).val()); })


        if(reason_ids.length==0){

            alert("من فضلك اختر السبب اولا");
            return;
        }


       var reason=$(".check"+mom+':radio:checked').val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });

    }
</script>


