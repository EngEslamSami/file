<?php 

if($load_data == false){
   ?> 
   <span style="padding: 0px 213px 10px 0;">هذا الرقم غير مسجل من قبل</span>
      <script>
    var value= $("#p_national_num").val()
    $("#p_national_num_load").val(value);
  
   
    </script>
<?php }else{ ?>
   <span style="color: rgb(185, 74, 72);padding: 0px 214px 0;">عفوا هذا الرقم مسجل من قبل .. </span>
    <script>
    $("#p_national_num").attr("data-validation-has-keyup-event","true");
    $("#p_national_num").css({"border-color": "rgb(185, 74, 72)"});
    $("#p_national_num_load").val('');
   
    </script>
<?php     
}
?>