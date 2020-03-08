
<?php 
$active = $this->uri->segment(2);;

?>

<section class="mother_forms_web">
    <div class="container-fluid">
        <ul class="nav nav-tabs col-md-2 no-padding" role="tablist">
            <li role="presentation"  <?php if ($active == 'register'){ ?>class="active" <?php } ?> ><a href="<?=base_url()?>WebProfile/register" >مقدم الطلب عن طريق الام</a></li>
            <li role="presentation"  <?php if ($active == 'register_wakeel'){ ?>class="active" <?php } ?> ><a href="<?=base_url()?>WebProfile/register_wakeel" >طلب وكيل الاسره</a></li>

        </ul>




        <!---------------------scripts-------------------->


        <script>
            function valid_segel_num(type,valu) {

                $.ajax({
                    type:'post',
                    url:"<?php echo base_url();?>WebProfile/check_num",
                    data:{valu:valu,type:type},
                    success:function(d){
                        if(d>0)
                        {

                            alert("تم ادخال هذا االرقم من قبل") ;

                            $('#mother_national_num2').val('');
                            $('#mother_national_num').val('');
                            $('#user_name').val('');
                            $('#agent_mob').val('');
                            $('#mother_mob1').val('');
                        }else{

                        }






                    }

                });


            }
        </script>

        <script>

             function chek_length(inp_id)
             {
                 alert(inp_id);
                 return;
             var inchek_id=inp_id;
             
             if(inp_id.length != 10){
             document.getElementById('lenth_mobphone').style.color = '#F00';
             document.getElementById('lenth_mobphone').innerHTML = 'رقم الجوال مكون من عشر ارقام';

             var inchek_out= inchek.substring(0,10);
             $(inchek_id).val(inchek_out);
             }
             }


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


                if(person_account ==1){
                    document.getElementById("om_hesab_num").removeAttribute("disabled", "disabled");
                    document.getElementById("bank_account_id1").removeAttribute("disabled", "disabled");
                    document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");





                    //  document.getElementById("om_bank_num").value="";
                }else{
                    document.getElementById("mother_hesab_span1").innerHTML="";
                    document.getElementById("register").removeAttribute("disabled", "disabled");
                    document.getElementById("om_hesab_num").setAttribute("disabled", "disabled");

                    document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
                    document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
                    document.getElementById("om_bank_num").value="";





                }

            }
            function  checkPerson_account_wakeel()
            {
                var person_account= $('#person_account_wakeel').val();
                if(person_account ==1){
                    
                    document.getElementById("hesab_wakeel").removeAttribute("disabled", "disabled");

                    document.getElementById("bank_account_id1_wkeel").removeAttribute("disabled", "disabled");
                    // document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");





                    //  document.getElementById("om_bank_num").value="";
                }else{
                    document.getElementById("hesab_wakeel").setAttribute("disabled", "disabled");

                    document.getElementById("bank_account_id1_wkeel").setAttribute("disabled", "disabled");
                    document.getElementById("hesab_wakeel").value="";
                    document.getElementById("mother_hesab_span").innerHTML="";
                    document.getElementById("register").removeAttribute("disabled", "disabled");


                    // document.getElementById("om_bank_num").setAttribute("disabled", "disabled");



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


        <script>
            function valid_wakeel2()
            {
                if($("#user_pass_wakeel").val().length < 4){
                    document.getElementById('validate1_wakeel').style.color = '#F00';
                    document.getElementById('validate1_wakeel').innerHTML = 'كلمة المرور اكثر من اربع حروف';
                    document.getElementById('register').setAttribute("disabled", "disabled");
                    document.getElementById('register_wakeel').setAttribute("disabled", "disabled");
                }else if($("#user_pass_wakeel").val().length > 4 &&  $("#user_pass_wakeel").val().length < 10){
                    document.getElementById('validate1_wakeel').style.color = '#F00';

                    document.getElementById('register').setAttribute("disabled", "disabled");
                    document.getElementById('register_wakeel').setAttribute("disabled", "disabled");
                    document.getElementById('validate1_wakeel').innerHTML = 'كلمة المرور ضعيفة';
                }else if($("#user_pass_wakeel").val().length > 10){
                    document.getElementById('validate1_wakeel').style.color = '#00FF00';
                    document.getElementById('register').removeAttribute("disabled", "disabled");
                    document.getElementById('register_wakeel').removeAttribute("disabled", "disabled");
                    document.getElementById('validate1_wakeel').innerHTML = 'كلمة المرور قوية';
                }


            }

            function valid()
            {
                if($("#user_pass").val().length < 4){
                    document.getElementById('validate1').style.color = '#F00';
                    document.getElementById('validate1').innerHTML = 'كلمة المرور اكثر من اربع حروف';
                }else if($("#user_pass").val().length > 4 &&  $("#user_pass").val().length < 10){
                    document.getElementById('validate1').style.color = '#F00';
                    document.getElementById('register_wakeel').setAttribute("disabled", "disabled");
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
                    //document.getElementById('register').removeAttribute('disabled');
                    document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
                }else{
                    document.getElementById('validate').style.color = '#F00';
                    //document.getElementById('register').setAttribute("disabled", "disabled");
                    document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
                }
            }
            function valid_wakeel()
            {

                if($("#user_pass_wakeel").val() == $("#user_pass_validate_wakeel").val()){
                    document.getElementById('validate_wakeel').style.color = '#00FF00';
                    //document.getElementById('register_wakeel').removeAttribute('disabled');
                    document.getElementById('validate_wakeel').innerHTML = 'كلمة المرور متطابقة';
                }else{
                    document.getElementById('validate_wakeel').style.color = '#F00';
                    document.getElementById('register_wakeel').setAttribute("disabled", "disabled");
                    document.getElementById('validate_wakeel').innerHTML = 'كلمة المرور غير متطابقة';
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

            function get_banck_code()
            {

                var post_array =$('#bank_account_id1').val();
                var total_array=post_array.split("-");
                $('#om_bank_code').val(total_array[1]);
                $('#bank_account_id_post').val(total_array[0]);


            }
            function get_banck_code2()
            {

                var post_array =$('#bank_account_id1_wkeel').val();
                var total_array=post_array.split("-");
                $('#om_bank_code2').val(total_array[1]);
                $('#bank_account_id_post2').val(total_array[0]);


            }




        </script>

        
        
        