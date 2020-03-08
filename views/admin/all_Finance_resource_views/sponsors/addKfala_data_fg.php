
<style type="text/css">
       .top-label {
        font-size: 13px;
        background-color: #428bca !important;
            border: 2px solid #428bca !important;
                text-shadow: none !important;
               font-weight: 500 !important;
    }
    
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
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


  .my_style{

      color: #222;
      font-size: 15px;
      font-weight: 500;

  }
</style>

<?php
if(isset($result)&&!empty($result))
{
    $k_yatem_full=$result->k_yatem_full;
    $k_yatem_half=$result->k_yatem_half;
    $k_armal=$result->k_armal;
    $k_mostafed=$result->k_mostafed;
  //  $k_status=$result->k_status;
        $k_status=$result->kafel_status;
    $start_kfala_date=$result->start_kfala_date;
    $num_days =$result->num_days ;
    $alert_type   =$result->alert_type ;
    $pay_method  =$result->pay_method ;
    $bank_id_fk   =$result->bank_id_fk ;
    $bank_account_num   =$result->bank_account_num ;
    $bank_branch  =$result->bank_branch ;
    $num  =$result->num  ;



}else{

    $k_yatem_full    ="";
    $k_yatem_half    ="";
    $k_armal    ="";
    $k_mostafed    ="";
    $start_kfala_date="";
    $k_status="";
    $alert_type   ="";
    $num_days   ="";
    $pay_method   ="";
    $bank_id_fk   ="";
    $bank_account_num   ="";
    $bank_branch  ="";
    $num ="";
}
?>
<?php
?>




<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                        $data_load['k_status'] = $k_status;
                        $this->load->view('admin/all_Finance_resource_views/sponsors/drop_down_menu', $data_load);
                    }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$this->uri->segment(5))?>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع الكفالة </label>
                    </div>
                    <?php
                    if(isset($kfalat_types)&&!empty($kfalat_types)) {
                        foreach($kfalat_types as $value){
                            ?>
                            <input  type="radio" name="kafala_type_fk" style="margin-right: 15px" onclick="GetKafalaTypeArr(<?=$value->id?>)" value="<?=$value->id ?>"
                                      data-validation="required">

                            <label for="square-radio-1"><?=$value->title?></label>
                            <?php
                        }
                    }
                    ?>
                </div>


                <!-------------------------------------start---------------------------------------->

                <div class="col-md-12">

                            <table id="js_table_members" style="display: none"

                                   class="table table-striped table-bordered dt-responsive nowrap ">
                                <thead>
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th style="width: 50px;">ملف الأسرة </th>
                                    <th style="width: 170px;" >إسم العائلة</th>
                                    <th style="width: 170px;" >إسم المستفيد</th>
                                    <th style="width: 90px;">فئة المستفيد</th>
                                    <th style="width: 90px;">الجنس</th>
                                    <th style="width: 90px;">تاريخ الميلاد</th>
                                    <th style="width: 60px;">العمر</th>
                                    <th style="width: 60px;">الفئة</th>
                                    <th style="width: 60px;">الحالة</th>
                                </tr>
                                </thead>
                            </table>

 
                    <div id="dataMember"></div>

                </div>
                <!-------------------------------------start---------------------------------------->



                <div class="col-md-12" id="button_div" style="display: none">


                    <input type="hidden" name="kafel_id_fk" id="kafel_id_fk" value="<?=$this->uri->segment(5)?>">
                    <div class="form-group col-md-5 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="add" value="add"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
        
        

        
                <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">كفالات الكافل</h3>
                <div class="pull-left">
           
                    
                    
                    
                    
                    
                </div>
            </div>
            <div class="panel-body">
            
                  <?php if(isset($all_kafalat) && $all_kafalat!=null){?>
                        <table id="" style=""

                                   class="table table-striped table-bordered dt-responsive nowrap ">
                                <thead>
                                <tr>
                                    <th style="">م</th>
                                    
                                    <th style=""> اسم رب الأسرة </th>
                                    <th style=""> إسم المستفيد </th>
                                     <th style="" >حالة  الكافل </th>
                                    <th style="" >نوع  الكفالة </th>
                                    <th style="" >من تاريخ</th>
                                    <th style="" >إلي تاريخ</th>
                                     <th style="" >قيمة  الكفالة </th>


                                </tr>
                                </thead>
                                
                              <tbody>
                        <?php
                        $x=1;
                        foreach($all_kafalat as $row_kafala){?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row_kafala->father_name;?></td>
                                <td><?php echo $row_kafala->person_name;?></td>
                               <td style="background-color: <?php echo $row_kafala->halet_kafel_color;   ?>;">
                                     <?php echo $row_kafala->halet_kafel_title;?></td>
                              
                                 <td  style="background-color: <?php echo $row_kafala->kafala_color;   ?>;">
                                    <?php echo $row_kafala->kafala_name;?></td>
                                 
                                   <td><?php echo $row_kafala->first_date_from_ar;?></td>
                                   <td><?php echo $row_kafala->first_date_to_ar;?></td>
                                    <td><?php echo $row_kafala->first_value;?></td>

                         


                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                                
                                
                            </table>
                            <?php } ?>
                            
            
            <?php
         /*  echo '<pre>';
            print_r($all_kafalat);
            echo '<pre>';*/
            ?>
            
            </div>

  </div>
 
        

    </div>
    
    
        
      






    <!------------------------------------------------------------------>
    <div class="col-sm-3 no-padding">
        <div  class=" panel panel-bd lobipanel-noaction  ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات الكافل</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12 no-padding">
                    <div class="user-widget list-group">
                        <div class="list-group-item heading">
                            <?php

                            $kafel_img="";
                            if(isset($result)){
                                $kafel_img= $result->person_img ;
                            }?>
                            <img style="width: 100px;" id="blah" class="media-object center-block" src="<?=base_url()?>/uploads/images/<?php echo $kafel_img ?>"
                                 onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">
                            <div class="clearfix"></div>
                        </div>
                        <table class="table-bordered table table-pro" style="table-layout: fixed;">
                            <tbody>
                            <tr>
                                <th> <strong class="text-danger "> إسم الكافل  </strong> </th>
                                <td><?php if(isset($result)){  echo $result->k_name;}?></td>
                            </tr>

                            <tr>
                                <th><strong class="text-danger ">رقم الكافل </strong></th>
                                <td><?php if(isset($result)){ echo  $result->k_num;}?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel-heading"  >
                    <h3 class="panel-title " >بيانات المستفيد</h3>
                </div>
                <div class="col-md-12 no-padding">
                    <div class="user-widget list-group">
                        <div class="list-group-item heading">
                            <?php

                            $user_img="";
                            if(isset($result)){
                                $user_img= "";
                            }?>
                            <img style="width: 100px;" id="blah" class="media-object center-block" src="<?=base_url()?>/uploads/images/<?php echo $user_img ?>"
                                 onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">
                            <div class="clearfix"></div>
                        </div>
                        <table class="table-bordered table table-pro" style="table-layout: fixed;">
                            <tbody>
                            <tr>
                                <th> <strong class="text-danger "> إسم المستفيد	  </strong> </th>
                                <td id="member_name"></td>
                            </tr>

                            <tr>
                                <th><strong class="text-danger ">رقم الملف </strong></th>
                                <td id="file_nmber"></td>
                            </tr>
                            <tr>
                                <th><strong class="text-danger ">اسم العائلة </strong></th>
                                <td id="father_name"></td>
                            </tr>
                            <tr>
                                <th><strong class="text-danger ">تاريخ الميلاد </strong></th>
                                <td id="birth_date"></td>
                            </tr>
                            <tr>
                                <th><strong class="text-danger ">العمر</strong></th>
                                <td id="age"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!------ table -------->

   </div>












    <!----- end table ------>
<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

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

    <script>
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

    <script>
        function chek_length(inp_id,len)
        {
            var inchek_id="#"+inp_id;
            var inchek =$(''+inchek_id).val();
            if(inchek.length < len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length > len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length == len){
                document.getElementById(""+ inp_id +"_span").innerHTML ='';
                document.getElementById("save").removeAttribute("disabled", "disabled");
            }
        }
    </script>


<script>

    function checkYear(valu) {
        nowyear = <?php echo$current_hijry_year;?>;
        var myDate =valu.split("/");
        if(parseInt(myDate[2]) > parseInt(nowyear) ){
           alert( " السنة الهجرية الحالية "  + nowyear);
        $('#start_kfala_date').val('');
        }
    }

</script>






<script>
    function length_hesab_om(length) {

        var len = length.length;

        if (len < 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>




<!------------------------------------start---------------------------->


<script>

    function GetKafalaTypeArr(valu) {
   $('#js_table_members').show();
         var KafalaType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/getConnection/' + KafalaType,

            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });

    }

</script>

<script type="text/javascript">
    function getMemberData(argument,kafalaType) {


        $('#button_div').show();
        var kafel_id_fk = $('#kafel_id_fk').val();

        
        var dataString = 'id=' + argument +'&& kafel_id_fk=' + kafel_id_fk +'&& kafalaType=' + kafalaType;
        //alert(dataString);
       if( kafalaType == 4) { 
        
        
            $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/getMotherData',
            data:dataString,
            cache:false,
            success: function(result){
             //   alert(result);
                $('#dataMember').html(result);
            }
        });
       }else { 
           $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/getMemberData',
            data:dataString,
            cache:false,
            success: function(result){
              //  alert(result);
                $('#dataMember').html(result);
            }
        });
        
        
       }
       
     

       var yearHijri =<?php echo $current_hijry_year;?>;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/GetSidebarData',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
               // console.log(JSONObject);
                if( JSONObject['kafalaType'] == 4){
                    $('#member_name').html( JSONObject['result'].full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].m_birth_date_hijri);
                    var member_year = JSONObject['result'].m_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);


                } else {
                    $('#member_name').html( JSONObject['result'].member_full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].member_birth_date_hijri);
                    var member_year = JSONObject['result'].member_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);

                }



            }
        });


    }
</script>


<?php /* ?>

<script type="text/javascript">
    function getMotherData(argument,kafalaType) {
        $('#button_div').show();
        var kafel_id_fk = $('#kafel_id_fk').val();
           alert(kafalaType);
        var dataString = 'id=' + argument +'&& kafel_id_fk=' + kafel_id_fk +'&& kafalaType=' + kafalaType;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/getMotherData',
            data:dataString,
            cache:false,
            success: function(result){
             //   alert(result);
                $('#dataMember').html(result);
            }
        });

       var yearHijri =<?php echo $current_hijry_year;?>;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/GetSidebarData',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
               // console.log(JSONObject);
                if( JSONObject['kafalaType'] == 4){
                    $('#member_name').html( JSONObject['result'].full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].m_birth_date_hijri);
                    var member_year = JSONObject['result'].m_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);


                } else {
                    $('#member_name').html( JSONObject['result'].member_full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].member_birth_date_hijri);
                    var member_year = JSONObject['result'].member_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);

                }



            }
        });


    }
</script>
<?php */ ?>

