

<section class="mother_forms_web" style="">
    <?php

    $fun=$this->uri->segment(2);



?>
    <div class="container-fluid" >

        <ul class="nav nav-tabs col-md-2 no-padding" role="tablist">
            <li role="presentation" <?php if($fun=="mother") {?>class="active" <?php } ?>><a href="<?php echo base_url();?>Mother_data/mother/<?php echo  $this->uri->segment(3);?>">بيانات الأم</a></li>
            <li role="presentation"  <?php if($fun=="father") {?>class="active" <?php } ?>><a href="<?php echo base_url();?>Mother_data/father/<?php echo  $this->uri->segment(3);?>" >بيانات الأب</a></li>
            <li role="presentation" <?php if($fun=="family_members") {?>class="active" <?php } ?> ><a href="<?php echo base_url();?>Mother_data/family_members/<?php echo  $this->uri->segment(3);?>" >بيانات الابناء</a></li>
            <li role="presentation"<?php if($fun=="house") {?>class="active" <?php } ?> ><a href="<?php echo base_url();?>Mother_data/house/<?php echo  $this->uri->segment(3);?>" >بيانات السكن</a></li>
            <li role="presentation" <?php if($fun=="money") {?>class="active" <?php } ?> ><a href="<?php echo base_url();?>Mother_data/money/<?php echo  $this->uri->segment(3);?>" >بيانات الماليه</a></li>
 <li role="presentation"<?php if($fun=="house_needs") {?>class="active" <?php } ?>  ><a href="<?php echo base_url();?>Mother_data/house_needs/<?php echo  $this->uri->segment(3);?>" >احتياجات المنزل</a></li>
 <li role="presentation"<?php if($fun=="devices") {?>class="active" <?php } ?> ><a href="<?php echo base_url();?>Mother_data/devices/<?php echo  $this->uri->segment(3);?>"> الأجهزه المنزليه </a></li>

            <li role="presentation" <?php if($fun=="attach_files") {?>class="active" <?php } ?>><a href="<?php echo base_url();?>Mother_data/attach_files/<?php echo  $this->uri->segment(3);?>" >رفع الوثائق</a></li>

        </ul>






        <!-------------------------------------------------------start script ---------------------------------------------->


<script>
    document.getElementById("m_nationality").onchange = function () {
        if (this.value == 20)
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            $("#nationality_other").val("");
        }
    };
</script>

<script>

    document.getElementById("educate").onchange = function () {

        if (this.value >= 5 )
            document.getElementById("special").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("special").setAttribute("disabled", "disabled");
            $("#special").val("");

        }
    };
</script>

<script>

    document.getElementById("eldar").onchange = function () {

        if (this.value == 1 )
            document.getElementById("m_female_house_id_fk").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("m_female_house_id_fk").setAttribute("disabled", "disabled");
            $("#dar-name").val("");
        }
    };
</script>

<script>

    document.getElementById("living_place_id").onchange = function () {

        if (this.value == 0)
            document.getElementById("living-place").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("living-place").setAttribute("disabled", "disabled");
            $("#living-place").val("");
        }
    };
</script>



<script>
    document.getElementById("job").onchange = function () {

        if (this.value == 0 )
            document.getElementById("jobb-input").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("jobb-input").setAttribute("disabled", "disabled");
            $("#jobb-input").val("");
        }

        if (this.value == 3)
            document.getElementById("mo-income").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("mo-income").setAttribute("disabled", "disabled");
            $("#mo-income").val("");
        }
    };

</script>


<script>


    function check() {
        var type = $('#m_health_status_id_fk').val();



        if (type=='salem') {
            document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");

            document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
           // document.getElementById("dis_date_ar").setAttribute("disabled", "disabled");
            document.getElementById("dis_reason").setAttribute("disabled", "disabled");
            document.getElementById("dis_response_status").setAttribute("disabled", "disabled");
            document.getElementById("dis_status").setAttribute("disabled", "disabled");

        }else{
            document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");

            document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
          //  document.getElementById("dis_date_ar").removeAttribute("disabled", "disabled");
            document.getElementById("dis_reason").removeAttribute("disabled", "disabled");
            document.getElementById("dis_response_status").removeAttribute("disabled", "disabled");
            document.getElementById("dis_status").removeAttribute("disabled", "disabled");

        }
        if(type=='disease') {
            document.getElementById("disease_id_fk").removeAttribute("disabled","disabled");

        } else{

            document.getElementById("disease_id_fk").setAttribute("disabled","disabled");
        }
        if (type=='disability') {

            document.getElementById("disability_id_fk").removeAttribute("disabled", "disabled");
        }else{
            document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
        }

    }



</script>



<script>

    document.getElementById('m_nationality').onchange=function() {
        var x = $(this).val();

        if (x == 0) {

            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
            document.getElementById("nationality_other").setAttribute("data-validation", "required");


        }else{
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            document.getElementById("nationality_other").removeAttribute("data-validation", "required");

        }
    }
</script>
<script>

    document.getElementById('living_place_id').onchange=function() {
        var x = $(this).val();

        if (x == 0) {

            document.getElementById("m_living_place").removeAttribute("disabled", "disabled");
            document.getElementById("m_living_place").setAttribute("data-validation", "required");



        }else{
            document.getElementById("m_living_place").setAttribute("disabled", "disabled");
            document.getElementById("m_living_place").removeAttribute("data-validation", "required");

        }
    }
</script>

<script>
    document.getElementById('eldar').onchange=function() {
        var x = $(this).val();


        if (x == 1) {

            document.getElementById("m_female_house_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("m_female_house_id_fk").setAttribute("data-validation", "required");;

        }else{
            document.getElementById("m_female_house_id_fk").value='';
            document.getElementById("m_female_house_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("m_female_house_id_fk").removeAttribute("data-validation", "required");;
        }
    }
</script>

<script>

    document.getElementById('f_national_id').onkeyup=function() {
        var x = $(this).val();
        if(x.length>10){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم الهويةمكون  من عشر أرقام فقط ';
            $('#f_national_id').val("");

        }if(x.length==10){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم هويه صحيح';
        }
        if(x.length<10) {
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم الهويه لابد ان يكون عشر ارقام';

        }



    }
</script>






<script>


    function getWork() {
        var work =$('#m_want_work').val();

        if(work ==1){
            document.getElementById("m_job_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("mo-income").setAttribute("disabled", "disabled");
            document.getElementById("m_place_work").setAttribute("disabled", "disabled");
            document.getElementById("m_place_mob").setAttribute("disabled", "disabled");
            document.getElementById("m_job_id_fk").value="";
            document.getElementById("income").value="";
            document.getElementById("m_place_work").value="";
            document.getElementById("m_place_mob").value="";
        }

        if(work ==2){
            document.getElementById("m_job_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("mo-income").removeAttribute("disabled", "disabled");
            document.getElementById("m_place_work").removeAttribute("disabled", "disabled");
            document.getElementById("m_place_mob").removeAttribute("disabled", "disabled");
            document.getElementById("m_job_id_fk").setAttribute("data-validation", "required");
            document.getElementById("mo-income").setAttribute("data-validation", "required");
            document.getElementById("m_place_work").setAttribute("data-validation", "required");
            document.getElementById("m_place_mob").setAttribute("data-validation", "required");
        }

    }


</script>

<script>


    function getAge() {
        var nowYear =(new Date()).getFullYear();
        var myAge = ( nowYear- $('#CYear').val() );
        $('#myage').val(myAge)
    }

</script>


<script>
    function checkMember_account() {
        var member_account = $('#m_account').val();
        if (member_account == 0) {
            document.getElementById("m_account_id").setAttribute("disabled", "disabled");
            document.getElementById("m_account_id").value = "";
        } else {

            document.getElementById("m_account_id").removeAttribute("disabled", "disabled");
        }


    }
</script>


<script>
 function hide_mother_form() {

$('.mother_form').hide();
     $('#mother_form').show();



 }




</script>
<!-------------------------------------------------------end script ---------------------------------------------->


<!----------------------------------------------------start script father--------------------------------------->
<script>

    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);

        }

        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }

        if(inchek.length == 10){
            document.getElementById("buttons").removeAttribute("disabled", "disabled");

        }
    }

</script>

<script>

    $(document).ready(function() {
        $("#f_job").change(function() {
            var color = $(this).val();
            if (color == "1") {
                $(".box").not(".1").hide();
                $(".red").show();
            } else if (color == "2") {
                $(".box").not(".2").hide();
                $(".red").show();
            } else {
                $(".box").hide();
            }
        });


    });
</script>

<script>
    function admSelectCheck(nameSelect)
    {
        //alert($(nameSelect).val());

        if($(nameSelect).val()==0){
            document.getElementById("f_death_reason_fk").removeAttribute("disabled", "disabled");
        }
        else{
            document.getElementById("f_death_reason_fk").setAttribute("disabled", "disabled");

        }


    }



    document.getElementById("fww_nationality_id_fk").onchange = function () {



        if (this.value > 0)
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            $("#nationality_other").val("");
        }
    };



</script>
<script>
    function valid()
    {
        if($("#f_national_id").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = '';

        }else{
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم الهوية من عشر أرقام';
        }
    }



</script>


<script>

    document.getElementById('f_nationality_id_fk').onchange=function() {
        var x = $(this).val();
        if (x == 0) {

            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");

        }else{
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
        }
    }
</script>

<script>

    document.getElementById('f_death_id_fk').onchange=function() {
        var x = $(this).val();
        if (x == 0) {

            document.getElementById("f_death_reason_fk").removeAttribute("disabled", "disabled");

        }else{
            document.getElementById("f_death_reason_fk").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>

    document.getElementById('wife').onkeyup=function() {
        var x = $(this).val();

        if (x < 1) {

            alert("الادخال خاطىء");
            $(this).val( " ");


        }
    }
</script>
<script>


    function getAge() {
        var nowYear =(new Date()).getFullYear();
        var myAge = ( nowYear- $('#CYear').val() );
        $('#myage').val(myAge)
    }


    function getFamilyNumber() {
        if($('#male_number').val() >0){
            var males = parseInt($('#male_number').val());
        }else{
            var males =0;
        }

        if($('#female_number').val() >0){
            var females = parseInt($('#female_number').val());
        }else{
            var females =0;
        }

        var all =  males + females;
        $('#family_members_number').val(all);
    }
    /**************ahemd*/
</script>

<!----------------------------------------------------end  script father--------------------------------------->


        <script>
            function validate_number(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode( key );
                var regex = /[0-9]|\./;
                if( !regex.test(key) ) {
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
            }

        </script>
<!-------------------------------------------------------------------------------------------------------------------->


        
        <!---------------------------------------------------------------------------------------------------------------->


