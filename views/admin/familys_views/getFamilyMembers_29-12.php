

<tr id="<?=$_POST['length']?>">
 <td style="text-align: center!important;"><?=$_POST['length']?></td>
 <td style="width:15%;text-align: center!important;">
     <input type="text" class="form-control" name="member_full_name[]" id="member_full_name<?=$_POST['length']?>" data-validation="required" ></td>
 <td style=" width:15%;text-align: center!important;">
     <?php
     $members = array(
                   '41' =>'أم' ,
                   '42' => 'ابن',
                   '43' => 'ابنه'
     );
         ?>
     <select name="member_relationship[]" id="member_relationship<?=$_POST['length']?>" data-validation="required" class=" form-control" onchange="gender_select(<?=$_POST['length']?>)" >
        <option value="">إختر</option>
    <?php
        foreach ($members as $key=>$value){ ?>
        <option value="<?php echo $key;?>"
           ><?php echo $value;?></option>
    <?php   } ?>
     </select></td>
 <td style="width:15%;text-align: center!important;">
     <?php  $member_gender = array(
                             '1' => 'ذكر',
                             '2' => 'انثي'

     );
     ?>

     <select name="member_gender[]" id="member_gender<?=$_POST['length']?>" data-validation="required" class=" form-control" >
         <option value="">إختر</option>
         <?php
         foreach ($member_gender as $key=>$value){
         ?>
             <option value="<?= $key?>"><?= $value?></option>
         <?php }?>


     </select>
 </td>
   
 <td style="width:15%;text-align: center!important;">
     <input type="text" name="member_card_num[]" id="member_card_num<?=$_POST['length']?>" data-validation="required"
               onkeyup="check_length_num(this,'10','member_card_num_span')" maxlength="10"
           onkeypress="validate_number(event)"
      class="form-control "/>
 <small id="member_card_num_span" class="span-validation"></small>
 </td>
    <td>
        <select  name="m_card_source[]" id="m_card_source"  data-validation="required" class=" form-control "  >
            <option value="">إختر</option>
            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                $select='';
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </td>
 <td style="width:15%;text-align: center!important;">
     <input type="text"  onkeyup="GetAge(this.value,<?echo$_POST['length'];?>)" class="form-control date_as_mask" id="member_birth_date_hijri<?=$_POST['length']?>" name="member_birth_date_hijri[]" data-validation="required" ></td>
 <td style="width:15%;text-align: center!important;">
     <input class=" form-control  " type="text" name="age[]" id="myage<?echo$_POST['length'];?>"  size="60"readonly/></td>
 <td style="width:15%;text-align: center!important;" >
     <div id="categoriey_member_div<?=$_POST['length']?>"></div>

     <input  type="hidden" name="categoriey_member[]" id="categoriey_member<?echo$_POST['length'];?>"  />
 </td>
 <td style="text-align: center!important;"><a href="#"  onclick="deleteRow(<?=$_POST['length']?>)"><i class="fa fa-trash" ></i></a></td>
</tr>





<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-2.1.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>
<!-- display mother data -->

<script>
    $(document).ready(function () {
        var x = document.getElementById('resultTable');
        var len = x.rows.length ;
     // return  alert(len);

     if(len=="1"){
         var x= document.getElementById("person_relationship").value;

         //  var option_name=$("#person_relationship option:selected").text();
         if(x =="41"){
             $("#member_full_name"+len).val($("#full_name_order").val());
             //  $("#member_relationship"+len).val(option_name);
             $("#member_card_num"+len).val($("#mother_national_num").val());
             $("#member_relationship"+len).val($("#person_relationship").val());
             var x = document.getElementById("member_gender"+len).children[2];
             x.setAttribute("selected", "selected");
             //}

             // $("#member_gender"+len).val($("#person_relationship").val());



         }
     }

    })
</script>

<script>
    function gender_select(len) {



        var member = document.getElementById("member_relationship"+len).value;
        if (member =="41" || member =="43"){
           $("#member_gender"+len).html('<option value="2">أنثي</option>');
        } else if(member =="42"){
            $("#member_gender"+len).html('<option value="1">ذكر</option>');
        }

    }
</script>
<!-- display mother data -->


<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled", "disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>

<script>

    function deleteRow(id){
        $("#" + id).remove();
    }


    function GetAge(valu,id) {
       var id = id;
        var mydate =valu.split("/");
        var myYear =mydate[2];
        var nowyear=<?php echo$current_year; ?>;
        var myAge = parseInt(nowyear)-parseInt(myYear);
       $('#myage' + id).val(myAge);
        GetClassification(myAge,$('#member_gender'+ id).val(),id);

    }




    function GetClassification(myage,mygender,id) {


        if(myage != '' && mygender != ''){

        var dataString   ='age=' + myage +'&gender=' +  mygender;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetClassification',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
              console.log(JSONObject);
                var member = document.getElementById("member_relationship"+id).value;
                if (member =="41"){
                    $('#categoriey_member' + id).val(1);
                    $('#categoriey_member_div' + id).html('أرملة');
                } else {
                    $('#categoriey_member' + id).val(JSONObject['tasnef']);
                    $('#categoriey_member_div' + id).html(JSONObject['title']);
                }


            }
        });
        } else {
            alert('من فضلك إختر الجنس !!');
            $('#myage' + id).val("");
            $('#categoriey_member' + id).val("");
            $('#categoriey_member_div' + id).html("");
            $('#member_birth_date_hijri' + id).val("");
        }


    }
</script>

