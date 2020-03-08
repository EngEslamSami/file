<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">


    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }





    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }

</style>
<?php
if(isset($driver)&&!empty($driver)){
    $emp_id_fk=$driver->emp_id_fk;
    $markz_taklfa_fk=$driver->markz_taklfa_fk;
    $license_num=$driver->license_num;
    $esdar_date=$driver->esdar_date;
    $end_date=$driver->end_date;
    $licence_type_fk=$driver->licence_type_fk;
    $blood_fasila=$driver->blood_fasila;
    $edara_id_fk=$driver->edara_id_fk;



    $person_type =$driver->person_type;


    if($person_type ==1){

        $card_num =$driver->emp_card_num;
        $mob  =$driver->emp_mob;
        $nationality_result  =$driver->emp_nationality_fk;

    }elseif($person_type ==2){

        $card_num =$driver->person_card_num;
        $mob  =$driver->person_mob;
        $nationality_result  =$driver->person_nationality_fk;
    }

    $person_name =$driver->person_name;
    $person_nationality_fk =$driver->person_nationality_fk;
    $person_card_num =$driver->person_card_num;
    $person_job_title =$driver->person_job_title;
    $person_mob =$driver->person_mob;
    $emp_job_title_fk =$driver->emp_job_title_fk;
    $emp_num_wazyfy =$driver->emp_num_wazyfy;
    $emp_card_num =$driver->emp_card_num;
    $emp_mob =$driver->emp_mob;
    $emp_nationality_fk =$driver->emp_nationality_fk;

    $action=base_url().'Cars/all_drivers/Driver/edit_driver/'.$driver->id;

}else{
    $edara_id_fk='';
    $emp_id_fk='';
    $markz_taklfa_fk='';
    $license_num='';
    $esdar_date='';
    $end_date='';
    $licence_type_fk='';
    $blood_fasila='';


    $person_type ="";
    $person_name ="";
    $person_nationality_fk ="";
    $person_card_num ="";
    $person_job_title ="";
    $person_mob ="";
    $emp_job_title_fk  ="";
    $emp_num_wazyfy  ="";
    $emp_card_num ="";
    $emp_mob  ="";
    $emp_nationality_fk  ="";
    $card_num ="";
    $mob  ="";
    $nationality_result ="";

    $action=base_url().'Cars/all_drivers/Driver';
}
?>


<div class="col-sm-12 no-padding " >
  
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable col-xs-12 no-padding">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>

            </div>
<div class="panel-body">
  <div class="col-sm-9 no-padding">
                <form action="<?php echo $action;?>" method="post">
                  

                        <div class=" form-group col-md-3 padding-4">
                            <label class="label "> الإدارة </label>
                            <select name="edara_id_fk" id="edara_id_fk"
                                    onchange="get_emps()" class="form-control "
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php if(isset($adminstration)&&!empty($adminstration)){
                                    foreach ($adminstration as $row){?>
                                        <option value="<?php echo $row->id ;?>" <?php if($row->id==$edara_id_fk) echo "selected";?>><?php echo $row->name;?></option>
                                    <?php } }?>
                                     <option value="0" <?php if($edara_id_fk ==0){ echo'selected'; }?>> أخري</option>
                            </select>
                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label "> الإسم </label>
                            <div id="emp_id_fk">
                                <?php if($person_type ==1){ ?>
                                <select name="emp_id_fk" id="emp_id_fk"   data-validation="required"
                                        onchange="get_side_bar($(this).val())"   class="form-control " aria-required="true">
                                    <option value="">اختر</option>
                                    <?php
                                    if(isset($emps)&&!empty($emps)){
                                        foreach ($emps as $row){?>
                                            <option value="<?php echo $row->id;?>"
                                            <?php if(!empty($emp_id_fk)){
                                                if($emp_id_fk == $row->id){
                                                     echo'selected';
                                                }
                                            } ?>><?php echo $row->employee;?> </option>

                                        <?php }  }  ?>
                                </select>
                                <?php  } else{ ?>
                                    <input type="text" class="form-control " name="person_name" id="person_name" value="<?=$person_name?>" data-validation="required">

                                <?php    } ?>
                            </div>

                        </div>
                        <div class="form-group col-md-3  padding-4">
                            <label class="label ">الرقم الوظيفي</label>
                            <input type="text" name="num_wazyfy"
                                   data-validation="required" id="num_wazyfy" 
                                  class="form-control "
                                   data-validation-has-keyup-event="true"  value="<?=$emp_num_wazyfy?>"  disabled  onkeypress="validate_number(event);">

                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label ">المسمي الوظيفة</label>
                            <div id="job_title_div">
                                <?php if($person_type ==1){ ?>
                            <select name="job_title_id_hidden" id="job_title_id_hidden" <?php if($person_type ==1){  echo'disabled'; }?>
                                    data-validation="required"   class="form-control  "
                                    aria-required="true">
                                <option value="">إختر</option>
                                <?php
                                if(isset($jobtitles)&&!empty($jobtitles)) {
                                    foreach($jobtitles as $row){ ?>
                                        <option value="<?php echo $row->defined_id;?>"
                                            <?if(!empty($emp_nationality_fk)){
                                            if($emp_nationality_fk == $row->defined_id){
                                                echo'selected';
                                            }
                                        } ?> >
                                            <?php echo $row->defined_title;?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                                <?php  } else{ ?>
                                    <input type="text" name="person_job_title"class="form-control "
                                           value="<?=$person_job_title?>" data-validation="required">
                             <?php    } ?>
                            </div>
                         <input type="hidden" name="job_title_id_fk" id="job_title_id_fk">
                        </div>


                  
                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label "> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                            <input type="text" name="card_num" id="card_num" onkeyup="get_length($(this).val(),'hint');"
                                   maxlength="10"  class="form-control " value="<?=$card_num?>" <?php if($person_type ==1){  echo'disabled'; }?>
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                            <small  id="hint" class="myspan"  style="color: red;"> </small>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ""> الجوال <span class="span-allow"> (10ارقام) </span></label>
                            <input type="text" name="phone" maxlength="10" onkeyup="get_length($(this).val(),'tel');"
                                   data-validation="required" id="phone" class="form-control " value="<?=$mob?>"
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                            <small  id="tel" class="myspan"  style="color: red;"> </small>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ">الجنسيه</label>
                            <select id="nationality" data-validation="required" class="form-control "  <?php if($person_type ==1){  echo'disabled'; }?>
                                    name="nationality">
                                <option value="">إختر</option>
                                <?php
                                foreach($nationality as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                    <?if(!empty($nationality_result)){
                                        if($nationality_result == $row->id_setting){
                                            echo'selected';
                                        }
                                    }?>>
                                        <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="hidden" name="person_nationality_fk" id="person_nationality_fk">

                        </div>
                        <div class="form-group col-md-3  padding-4">
                            <label class="label ">رقم الرخصه</label>
                            <input type="text" name="license_num" maxlength="" onkeyup=""  data-validation="required" id="license_num" value="<?php echo $license_num;?>"
                                   class="form-control "
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                        </div>

                        <div class="form-group col-md-3  padding-4">
                            <label class="label ">تاريخ اصدار الرخصه </label>
                            <input type="text" name="esdar_date" maxlength="" onkeyup=""  data-validation="required" id="esdar_date"
                                   class="form-control  date_as_mask error" value="<?php echo $esdar_date;?>
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                        </div>
                    


                        <div class="form-group col-md-3  padding-4">
                            <label class="label ">تاريخ انتهاء الرخصه </label>
                            <input type="text" name="end_date" maxlength="" onkeyup=""  data-validation="required" id="end_date"
                                   class="form-control  date_as_mask error" value="<?php echo $end_date;?>
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label ">نوع الرخصه </label>
                            <select name="licence_type_fk" id="licence_type_fk"
                                    data-validation="required" onchange=""   class="form-control "
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php if(isset($types)&&!empty($types)){
                                    foreach ($types as $row){?>
                                        <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$licence_type_fk) echo "selected";?>><?php echo $row->title_setting;?></option>
                                    <?php } }?>


                            </select>
                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label "> فصيله الدم  </label>
                            <select name="blood_fasila" id="blood_fasila"
                                    data-validation="required" onchange=""   class="form-control "
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php if(isset($fasila)&&!empty($fasila)){
                                    foreach ($fasila as $row){?>
                                        <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$blood_fasila) echo "selected";?>><?php echo $row->title_setting;?></option>
                                    <?php } }?>


                            </select>
                        </div>
                      
                    <div class="col-md-12 text-center">
                        <button type="submit" name="add" id="save" class="btn btn-success btn-labeled" value="حفظ"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
                        </div>



                </form>
                  </div>
                  
                  
                  <div id="load_page">
                    <?php
                    if(isset($driver)&&!empty($driver)) {
                        $data["personal_data"] = $personal_data;
                        $this->load->view('admin/Cars/drivers/sidebar_person_data', $data);
                    }else{
                        $this->load->view('admin/Cars/drivers/sidebar_person_data');
                    }?>
            
                </div>
                  
                  
                </div>
            </div>

    


    
</div>
<?php
if(isset($drivers)&&!empty($drivers)) {
?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th class="text-center">م</th>
            <th>اسم السائق</th>
            <th>رقم الرخصه</th>
            <th>تاريخ بدايه الرخصه</th>
            <th>تاريخ انتهاء الرخصه</th>
            <th> فصيله الدم</th>

            <th>الاجراء</th>



        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a=1;

        if(isset($drivers)&&!empty($drivers)) {
            foreach ($drivers as $record) {
               ?>
                <tr>
                    <td><?php echo $a;?></td>
                    <td><?php echo $record->name;?></td>
                    <td><?php echo $record->license_num;?></td>
                    <td><?php echo $record->esdar_date;?></td>
                    <td><?php echo $record->end_date;?></td>
                    <td><?php echo $record->fasila_dm;?></td>

                    <td> <a href="<?php echo base_url(); ?>Cars/all_drivers/Driver/edit_driver/<?php echo $record->id; ?>"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <a href="<?php echo base_url().'Cars/all_drivers/Driver/delete_record/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <i class="fa fa-trash" aria-hidden="true"></i>



                    </td>




                </tr>
                <?php
                $a++;
            }
        }
        ?>
        </tbody>
    </table>

<?php } ?>

<script>


    function get_emps()
    {
        $('#num_wazyfy').val("");
        $('#job_title_id_fks').val("");
        $('#card_num').val("");
        $('#phone').val("");
        $('#nationality').val("");
      var valu= $('#edara_id_fk').val();

        if(valu =='0'){
            $("#job_title_div").html('<input type="text" name="person_job_title" ' +
                ' class="form-control " data-validation="required">');
            document.getElementById("num_wazyfy").removeAttribute("data-validation", "required");
            document.getElementById("num_wazyfy").setAttribute("disabled", "disabled");


            document.getElementById("card_num").setAttribute("data-validation", "required");
            document.getElementById("card_num").removeAttribute("readonly", "readonly");
            document.getElementById("phone").setAttribute("data-validation", "required");
            document.getElementById("phone").removeAttribute("disabled", "disabled");
            document.getElementById("nationality").setAttribute("data-validation", "required");
            document.getElementById("nationality").removeAttribute("disabled", "disabled");
            document.getElementById("nationality").value="";

        }

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Cars/all_drivers/Driver/get_emps",
            data:{valu:valu},
            success:function(d) {

                $('#emp_id_fk').html(d);


            }

        });
    }
</script>

<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
    function get_side_bar(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Cars/all_drivers/Driver/get_emp_siebar",
            data:{valu:valu},
            success:function(d) {

                $('#load_page').html(d);


            }

        });


        var myarr = JSON.parse( '<?php echo json_encode($jobtitles); ?>' );
	            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>Cars/all_drivers/Driver/GetEmployData",
                data:{valu:valu},
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                   // console.log(myarr);
                    document.getElementById("num_wazyfy").removeAttribute("data-validation", "required");
                    document.getElementById("num_wazyfy").setAttribute("readonly", "readonly");
                    div ='<select name="job_title_id_hidden" id="job_title_id_hidden" data-validation="required"  ' +
                        ' class="form-control  " aria-required="true"><option value="">إختر</option></select>';
                    $("#job_title_div").html(div);
                    GetOptions();
                    document.getElementById("job_title_id_hidden").removeAttribute("data-validation", "required");
                    document.getElementById("job_title_id_hidden").setAttribute("disabled", "disabled");
                    document.getElementById("card_num").removeAttribute("data-validation", "required");
                    document.getElementById("card_num").setAttribute("readonly", "readonly");
                    document.getElementById("phone").removeAttribute("data-validation", "required");
                   // document.getElementById("phone").setAttribute("readonly", "readonly");
                    document.getElementById("nationality").removeAttribute("data-validation", "required");
                    document.getElementById("nationality").setAttribute("disabled", "disabled");
                 $('#num_wazyfy').val(JSONObject['emp_code']);
                 $('#job_title_id_hidden').val(JSONObject['degree_id']);
                 $('#card_num').val(JSONObject['card_num']);
                 $('#phone').val(JSONObject['phone']);
                 $('#nationality').val(JSONObject['nationality']);
              document.getElementById("job_title_id_fk").value=JSONObject['degree_id'];
              document.getElementById("person_nationality_fk").value=JSONObject['nationality'];


                }
            });
    }

</script>


<script>

    function GetOptions() {
        var myarr = JSON.parse( '<?php echo json_encode($jobtitles); ?>' );
        var html = '<option>إختر </option>';
        for (i = 0; i < myarr.length; i++) {
            html += '<option value="' + myarr[i].defined_id + '"> ' + myarr[i].defined_title + '</option>';
        }
        $("#job_title_id_hidden").html(html);
    }
</script>






<script>
    function get_length(len,span_id)
    {

        if(len.length < 10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length >10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length ==10){
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = '';
        }
    }
</script>