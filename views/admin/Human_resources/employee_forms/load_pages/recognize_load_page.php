<tr>
    <td><input type="text"data-validation="required"  name="job[]" class="form-control"></td>
    <td><input type="text" data-validation="required"   name="job_name[]"  class="form-control"> </td>
    <td><input type="text" data-validation="required"  name="job_place[]"  class="form-control"> </td>
    <td><div class="col-md-12"><input type="text" data-validation="required"  name="mob[]"  id="mob<?php echo $len;?>"  onkeyup="chek_lenth_mobile($(this).val(),<?php echo $len;?>);"
               maxlength="10"                       onkeypress="validate_number(event)" class="form-control">
            <span  id="mob_span<?php echo $len;?>"   class="span-validation "></span></div>
    </td>
   

</tr>



<script>

    function chek_lenth_mobile(valu,id)
    {

        if(valu.length < 10){

            document.getElementById("mob_span"+id).style.color = '#F00';
            document.getElementById("mob_span"+id).innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('mybutton').setAttribute("disabled", "disabled");

        } else if(valu.length > 10){

            document.getElementById("mob_span"+id).style.color = '#F00';
            document.getElementById("mob_span"+id).innerHTML = 'أقصي عدد 10 ارقام';


        } else if(valu.length == 10){
            document.getElementById('mybutton').removeAttribute("disabled", "disabled");

        }
        
    }

</script>





