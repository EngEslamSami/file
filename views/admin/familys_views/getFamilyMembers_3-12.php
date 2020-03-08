

<tr id="<?=$_POST['length']?>">
 <td style="text-align: center!important;"><?=$_POST['length']?></td>
 <td style="width:15%;text-align: center!important;">
     <input type="text" class="form-control" name="member_full_name[]" data-validation="required" ></td>
 <td style=" width:15%;text-align: center!important;">
     <select name="member_relationship[]" id="member_relationship" data-validation="required" class=" form-control" >
        <option value="">إختر</option>
    <?php if(!empty($relationships)){
        foreach ($relationships as $record){ ?>
        <option value="<?php echo $record->id_setting;?>"
           ><?php echo $record->title_setting;?></option>
    <?php  } } ?>
     </select></td>
 <td style="width:15%;text-align: center!important;">
     <select name="member_gender[]" id="member_gender<?=$_POST['length']?>" data-validation="required" class=" form-control" >
         <option value="">إختر</option>
         <?php $gender_arr=array('','ذكر','أنثى');?>
         <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select='';
             if($a== $member_gender){$select='selected';}?>
             <option value="<?php echo$a; ?>"
                 <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
         <?php }?>
     </select></td>
 <td style="width:15%;text-align: center!important;">
     <input type="text" name="member_card_num[]" id="member_card_num" data-validation="required"
               onkeyup="check_length_num(this,'10','member_card_num_span')" maxlength="10"
           onkeypress="validate_number(event)"
      class="form-control "/>
 <small id="member_card_num_span" class="span-validation"></small>
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
                $('#categoriey_member' + id).val(JSONObject['tasnef']);
                $('#categoriey_member_div' + id).html(JSONObject['title']);
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

