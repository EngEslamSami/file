<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    .top-label {
        font-size: 13px;
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

</style>

<?php
if(isset($result)&&!empty($result))
{
    $k_yatem_full=$result->k_yatem_full;
    $k_yatem_half=$result->k_yatem_half;
    $k_armal=$result->k_armal;
    $k_mostafed=$result->k_mostafed;
    $k_status=$result->k_status;
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
                        $data_load ='';
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
                    $k_type_arr =array('k_yatem_full'=>'كفالة شاملة','k_yatem_half'=>'نصف كفالة','k_mostafed'=>'كفالة مستفيد','k_armal'=>'كفالة أرملة');
                    if(isset($k_type_arr)&&!empty($k_type_arr)) {
                        foreach($k_type_arr as $key=>$value){
                            ?>
                            <input  type="checkbox" name="<?=$key?>" style="margin-right: 15px" value="1"

                                <?php if(!empty($$key)){
                                    if($$key ==1){?> checked <?php }} ?>>
                            <label for="square-radio-1"><?=$value?></label>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">حالة الكفالة </label>
                        <select name="k_status" id="k_status" data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <?php
                            $fe2a_type_arr =array('إختر','مستمر','متقطع','منتظم','موقوف');
                            if(isset($fe2a_type_arr)&&!empty($fe2a_type_arr)) {
                                foreach($fe2a_type_arr as $key => $value){
                                    ?>
                                    <option value="<?php echo $key;?>"
                                        <?php if(!empty($k_gender_fk)){
                                            if($key==$k_status){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ تسجيل الكفالة</label>
                        <input type="text" name="start_kfala_date" data-validation="required"
                               id="start_kfala_date" value="<?php echo $start_kfala_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                               onchange="checkYear($(this).val());">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تنبيه الإنتهاء </label>
                        <select id="alert_type"  class="form-control bottom-input"data-validation="required"
                                name="alert_type"  onchange="GetDays($(this).val(),$('#num').val())">
                            <?php
                            $alert_type_arr =array('إختر','يوم','أسبوع','شهر');
                            if(isset($alert_type_arr)&&!empty($alert_type_arr)) {
                                foreach($alert_type_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo $key;?>"
                                        <?php if(!empty($alert_type)){
                                            if($key == $alert_type){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">العدد</label>
                        <input type="text" name="num" id="num" onkeyup="GetDays($('#alert_type').val(),$(this).val())"
                               value="<?=$num?>"   onkeypress="validate_number(event);"
                               class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">عدد الايام</label>
                        <input type="text" name="num_days" id="num_days"
                               onkeypress="validate_number(event);" readonly
                               value=" <?php echo $num_days;?>" class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">توريد الكفالة</label>
                        <select id="pay_method" name="pay_method"
                                class="form-control bottom-input" data-validation="required">
                            <?php
                            $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                            if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                                foreach($pay_method_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if(!empty($pay_method)){
                                            if($key == $pay_method){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>




                <div class="col-md-12">

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> البنك</label>
                        <select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php if (!empty($banks)) {
                                foreach ($banks as $bank) { ?>
                                    <option value="<?php echo $bank->id; ?>"
                                        <?php if(!empty($bank_id_fk)){
                                            if($bank->id == $bank_id_fk){ echo 'selected'; }
                                        } ?>><?php echo $bank->ar_name; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-3 col-xs-12">
                        <label class="label top-label">رقم الحساب</label>
                        <input type="text" name="bank_account_num" id="bank_account_num"
                               onkeyup="length_hesab_om($(this).val());"
                               value="<?=$bank_account_num?>"
                               class="form-control bottom-input "
                               data-validation-has-keyup-event="true">

                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">الفرع</label>
                        <input type="text" name="bank_branch"  data-validation="required"
                               value="<?php echo $bank_branch;?>" class="form-control bottom-input" data-validation-has-keyup-event="true">
                    </div>


                </div>



                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="add" value="add"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/all_Finance_resource_views/sponsors/sidebar_kafel_data');?>
    <!------ table -------->

   </div>



    <!----- end table ------>
	    <script type="text/javascript">
        jQuery(function($){
            //	$(".date_as_mask").mask("99/99/9999");
            $(".date_as_mask").mask("99/99/9999");
        });
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



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
    
    function GetDays(alert_type,num_days) {
        var d = new Date();
        var weekDays = 7;
        var MonthDays = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();

        if(alert_type ==1 ){

         $('#num_days').val(num_days);
        } else if(alert_type ==2){

            $('#num_days').val(num_days * weekDays);

        } else if (alert_type ==3){

            $('#num_days').val(num_days * MonthDays);

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




