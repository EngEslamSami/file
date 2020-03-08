
<tr>

  <td> <select class="form-control badl_setting" onchange="get_option($(this).val(),<?php echo $len;?>);get_role($(this).val(),<?php echo $len;?>) " id="badl<?php echo $len;?>"  name="user_id_fk[]" class="form-control" data-validation="required">

    <option value="">اختر</option>

    <?php
    if(isset($users)&&!empty($users)){
        $name = 'غير محدد';
      foreach ($users as $row){
          if($row->role_id_fk ==1){
              $name = $row->user_username;
         }elseif($row->role_id_fk ==2){
              $name = $row->member_name;
         }else if($row->role_id_fk ==3){
             $name = $row->emp_name;
        }elseif($row->role_id_fk ==4){
             $name = $row->member_public_name;
          }elseif($row->role_id_fk ==5){
              $name = $row->user_user;
          }
        ?>
        <option value="<?php echo $row->user_id;?>"><?php echo $name;?></option>


        <?php } } ?>

      </select>

      <input type="hidden" id="role_id_fk<?php echo $len;?>" name="role_id_fk[]" value="">

    </td>
    



   


    <td><input type="file"    id=""  class="form-control" name="img[]"   > </td>


    <?php
    $active=array(1=>'مفعل',2=>'غير مفعل');
    ?>
    <td>
        <select class="form-control "   name="active[]" class="form-control" data-validation="required">

            <option value="">اختر</option>

            <?php
                foreach ($active as $key=>$value){
                 ?>
                    <option value="<?php echo $key;?>"><?php echo $value;?></option>


                <?php } ?>

        </select>
    </td>

   <td><a readonly href="#" id="delPOIbutton"  onclick="deleteRow(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>







  </tr>


  <script>

   function get_peroid(len)
   {
       //alert(type+len+valu);
       var valu=$("#peroid"+len).val();
       if(valu==1)
       {
         document.getElementById("date_to"+len).removeAttribute("disabled", "disabled");
         document.getElementById("date_from"+len).removeAttribute("disabled", "disabled");
       }else{

         document.getElementById("date_to"+len).setAttribute("disabled", "disabled");
         document.getElementById("date_from"+len).setAttribute("disabled", "disabled");
       }

     }



   </script>
