<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: !block !important;
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
        display: inline-!block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-!block;
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
        display: inline-!block;
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
        margin-top: -4px;
    }

    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }


</style>

<?php
if(isset($records2) &&!empty($records2)){

foreach ($records as $record) { ?>
<div class="modal fade" id="myModal<?php echo $record->id; ?>" role="dialog">
       <div class="modal-dialog" style="width: 96%">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل</h4>
            </div>
            <div class="modal-body">
                <div class="print_forma col-xs-12 no-padding">
                    <div class="col-sm-9">
                        <div class="piece-box" style="margin-bottom: 0;">

                            <table class="table table-bordered" style="margin-top:4px">
                                <tr class="closed_green">

                                    <td class="text-center" style="width: 20%"> رقم الكافل</td>
                                    <td class="text-center" style="width: 25%"> إسم الكافل</td>

                                    <td class="text-center" style="width: 20%"> فئة الكافل</td>

                                </tr>
                                <tr class="open_green">

                                    <td class="text-center"><?php   if(!empty($record->k_num)){
                                            echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
                                    <td class="text-center"><?php if(!empty($record->k_name)){
                                            echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>

                                    <td class="text-center"><?php if($record->fe2a_type==1)echo "افراد"; else{ echo "مؤسسات"; } ?></td>

                                </tr>
                            </table>
    <?php
    if($record->fe2a_type==1)
    {?>
                            <table class="table table-bordered" style="margin-top:4px">
                                <tr class="closed_green">

                                    <td class="text-center" style="width: 15%"> الجنس</td>
                                    <td class="text-center" style="width: 20%"> الجنسية </td>
                                    <td class="text-center" style="width: 20%"> نوع الهوية</td>

                                </tr>
                                <tr class="open_green">

                                    <td class="text-center"><?php  if(!empty($gender_data[$record->k_gender_fk])){
                                            echo $gender_data[$record->k_gender_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                    <td class="text-center"><?php  if(!empty($nationality[$record->k_nationality_fk])){
                                            echo $nationality[$record->k_nationality_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"> <?php  if(!empty($type_card[$record->k_national_type])){
                                            echo $type_card[$record->k_national_type]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                            </table>
                            <table class="table table-bordered" style="margin-top:4px">
                                <tr class="closed_green">

                                    <td class="text-center" style="width: 20%">رقم الهوية(10اراقام)</td>
                                    <td class="text-center" style="width: 20%"> مصدر الهوية </td>
                                    <td class="text-center" style="width: 20%"> هل يوجد وكاله </td>
                                </tr>
                                <tr class="open_green">
                                    <td class="text-center"><?php  if(!empty($record->k_national_num)){
                                            echo $record->k_national_num; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($dest_card[$record->k_national_place])){
                                            echo $dest_card[$record->k_national_place]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php if($record->wakala_type==1)echo 'نعم';else echo 'لا'; ?>
                                    </td>
                                </tr>
                            </table>
        <?php } ?>



                            <!---------------------------------------------------->
                            <?php if($record->wakala_type==1){?>
                                <?php
                                if($record->fe2a_type==1)
                                {
                                    $title="اسم الوكيل";
                                    $desc="صفته";
                                    $num="رقم هويه الوكيل";
                                    $gawal="جوال الوكيل";

                                }else{
                                    $title="اسم المسئول";
                                    $desc="صفته";
                                    $num="رقم هويه المسئول";
                                    $gawal="جوال المسئول";
                                }
                                ?>
                                <table class="table table-bordered" style="margin-top:4px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 15%"><?php echo $title;?></td>
                                        <td class="text-center" style="width: 20%"> <?php echo $desc;?> </td>
                                        <td class="text-center" style="width: 15%"><?php echo $num;?></td>
                                        <td class="text-center" style="width: 25%"><?php echo $gawal;?></td>

                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($record->w_name)){
                                                echo $record->w_name; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->desc)){
                                                echo $record->desc; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->w_national_num)){
                                                echo $record->w_national_num; }else{ echo'غيرمحدد';}?></td>

                                        <td class="text-center"><?php  if(!empty($record->w_mob)){
                                                echo $record->w_mob; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                </table>
                            <?php } ?>



                            <!------------------------------------------------->
                            <table class="table table-bordered" style="margin-top:4px">
                                <tr class="closed_green">
                                    <td class="text-center" style="width: 20%"> المدينه</td>
                                    <td class="text-center" style="width: 20%"> العنوان </td>
                                    <td class="text-center" style="width: 20%"> المهنة </td>
                                    <td class="text-center" style="width: 20%"> جهة العمل </td>
                                    <td class="text-center" style="width: 20%"> التحصص </td>

                                </tr>

                                <tr class="open_green">
                                    <td class="text-center"><?php if(!empty($cities[$record->k_city])){
                                            echo $cities[$record->k_city]; }else{ echo 'غير محدد';} ?></td>
                                    <td class="text-center"><?php  if(!empty($record->k_addres)){
                                            echo $record->k_addres; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"> <?php  if(!empty($job_role[$record->k_job_fk])){
                                            echo $job_role[$record->k_job_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($record->k_job_place)){
                                            echo $record->k_job_place; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($specialize[$record->k_specialize_fk])){
                                            echo $specialize[$record->k_specialize_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                            </table>
                            <?php
                            if($record->fe2a_type==2){?>
                                <table class="table table-bordered" style="margin-top:10px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 15%">نشاط المؤسسة</td>

                                        <td class="text-center" style="width: 15%">رقم هاتف المؤسه </td>
                                        <td class="text-center" style="width: 15%">الجوال </td>
                                        <td class="text-center" style="width: 15%">فاكس المؤسسه </td>

                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($activity[$record->k_activity_fk])){
                                                echo $activity[$record->k_activity_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                        <td class="text-center"><?php  if(!empty($record->company_phone)){
                                                echo $record->company_phone; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->company_gawal)){
                                                echo $record->company_gawal; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->company_fax)){
                                                echo $record->company_fax; }else{ echo'غيرمحدد';}?></td>

                                    </tr>
                                </table>
                            <?php } ?>
                            <table class="table table-bordered" style="margin-top:4px">
                                <tr class="closed_green">


                                    <td class="text-center" style="width: 25%">صندوق بريد</td>
                                    <td class="text-center" style="width: 25%"> رمز بريدي</td>
                                    <td class="text-center" style="width: 20%">الفاكس</td>
                                </tr>
                                <tr class="open_green">


                                    <td class="text-center"><?php  if(!empty($record->k_barid_box)){
                                            echo $record->k_barid_box; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($record->k_bardid_code)){
                                            echo $record->k_bardid_code;
                                        }else{ echo'غيرمحدد'; }?></td>
                                    <td class="text-center"><?php  if(!empty($record->k_fax)){
                                            echo $record->k_fax; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                            </table>


                            <table class="table table-bordered" style="margin-top:4px">
                                <tr class="closed_green">

                                    <td class="text-center" style="width: 20%">البريد الالكتروني </td>
                                    <td class="text-center" style="width: 20%">الوقت المناسب للتواصل </td>
                                    <td class="text-center" style="width: 20%">حاله الكافل </td>
                                    <td class="text-center" style="width: 20%">السبب</td>

                                </tr>
                                <tr class="open_green">

                                    <td class="text-center"><?php  if(!empty($record->k_email)){
                                            echo $record->k_email; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($record->right_time_from)){
                                            echo $record->right_time_from; }else{ echo'غيرمحدد';}?> : <?php  if(!empty($record->right_time_to)){
                                            echo $record->right_time_to; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($record->halt)){
                                            echo $record->halt; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($record->reason)){
                                            echo $record->reason; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                            </table>
                            <!--
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> توريد الكفالة</td>
                                            <td class="text-center" style="width: 30%"> البنك </td>
                                            <td class="text-center" style="width: 20%"> رقم الحساب </td>
                                            <td class="text-center" style="width: 30%"> الفرع </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($pay_method_arr[$record->pay_method])){
                                echo $pay_method_arr[$record->pay_method];
                            }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->banks_settings_title)){
                                echo $record->banks_settings_title; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->bank_account_num)){
                                echo $record->bank_account_num;
                            }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->bank_branch)){
                                echo $record->bank_branch; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>-->
                            <table class="table table-bordered" style="margin-top:4px">
                                <tr class="closed_green">
                                    <td class="text-center" style="width: 30%">الطريقه المناسبة للمراسلة</td>
                                    <td class="text-center" style="width: 45%">هل ترغب المراسلة عن طريق رسائل الجوال</td>
                                    <td class="text-center" style="width: 25%"> ملاحظات </td>
                                </tr>
                                <tr class="open_green">
                                    <td class="text-center"><?php  if(!empty($k_message_method_arr[$record->k_message_method])){
                                            echo $k_message_method_arr[$record->k_message_method];
                                        }else{ echo'غيرمحدد'; }?></td>
                                    <td class="text-center"><?php  if(!empty($k_message_mob_arr[$record->k_message_mob])){
                                            echo $k_message_mob_arr[$record->k_message_mob]; }else{ echo'غيرمحدد';}?></td>
                                    <td class="text-center"><?php  if(!empty($record->k_notes)){
                                            echo $record->k_notes;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                            </table>
                        </div>


                    </div>
                    <div class="col-sm-3">
                        <div class="piece-box">
                            <?php if(!empty($record->person_img)){?>
                            <img src="<?php echo base_url();?>uploads/images/<?php echo $record->person_img;?>" class="center-ييblock"  style="width: 150px; padding: 10px">
        <?php } ?>
                            <table class="table table-bordered">
                            
                            <tr>
                                    <td>رقم الكافل</td>
                                    <td><?php   if(!empty($record->k_num)){
                                            echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">إسم الكافل</td>
                                    <td style="width: 50%"><?php if(!empty($record->k_name)){
                                            echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>
                                </tr>
                                
                            </table>
                        </div>

                    </div>

                </div>

            </div>
            <div class="modal-footer" style="border: 0;">
                <button type="button" class="btn btn-default btn-close-model" data-dismiss="modal">إغلاق</button>
            </div>
        </div>

    </div>

    
    
</div>
    <div class="modal fade" id="myModal_attach<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
                </div>
                <?php    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/add_attach');?>

                <div class="modal-body">
                    <button type="button" value="" id="" onclick="add_row()"
                            class="btn btn-success btn-next"/><i class="fa fa-plus"></i> إضافة </button><br><br>
                    <table class="table table-striped table-bordered"   <?php if(empty($record->Images)){ ?> style="display: !block" <?php } ?> id="mytable">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>إسم المرفق</th>
                            <th>الصورة</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="resultTable">
                        <?php if(!empty($record->Images)){ $a=1;foreach ($record->Images as $one_img){ ?>
                            <tr id="<?php echo$one_img->id; ?>">
                                <td><?php echo$a; ?></td>
                                <td><?php echo$one_img->title_setting; ?></td>
                                <td><img src="<?php echo base_url(); ?>uploads/images/<?php echo$one_img->img; ?>"  style="width: 150px" alt=""></td>
                                <td><a  onclick="DeleteImage(<?php echo$one_img->id; ?>);"
                                    <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
                            </tr>
                            <?php $a++;} } ?>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer" style="display: inline-!block;width: 100%">
                    <input type="hidden" name="person_id" value="<?php echo $record->id; ?>">
                    <button type="button" class="btn btn-danger"  style="float: left" data-dismiss="modal">إغلاق</button>
                    <button type="submit"   id="saves"  name="add" value="add" class="btn btn-success"
                            style="float: left;display: !block;padding: 6px 12px;" >حفظ</button>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>


    <?php
}  }
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');




?>
<div id="load_form"></div>

<button class="btn btn-add" onclick="func()"><li class="fa fa-plus"> اضافه كافل</li> </button>
<table id="js_table_customer"
       style="table-layout: fixed;"
       class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
    <thead>
    <tr>
        <th style="width: 10px;">م </th>
        <th style="width: 40px;">كود الكافل </th>
        <th style="width: 170px;" >اسم الكافل</th>
        <th style="width: 90px;" >رقم الجوال</th> 
        <th style="width: 50px;" >فئة الكافل</th>
        <th style="width: 50px;">حاله الكافل</th>
        <th style="width: 50px;">استكمال البيانات</th>
        <th style="width: 50px;">التفاصيل</th>
        <th style="width: 40px;" >المرفقات</th>
       
        <th style="width: 90px;" >الاجراء</th>


    </tr>
    </thead>
</table>




<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>



<?php


echo $customer_js;
?>








<?php      $this->load->view('admin/requires/footer'); ?>




<?php
/*


$query = $this->db->query('select * from basic ');
//$query = $this->db->query('select * from basic ');

$the_json_code =  json_encode($query->result());
//$the_json_code =  json_encode($records);

print_r($the_json_code);
*/
?>


<script>

    function func()
    {
      
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/form",
            data:{},
            success:function(d){
                $('.btn-add').hide();
                $('#load_form').html(d);





            }

        });
    }

</script>

<script>


    function modal_link(id)
    {
        var link='<?= base_url()?>all_Finance_resource/sponsors/Sponsor/delete_sponsor/'+id;
        $('#adele').attr('href', link);
    }
</script>

<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>




<script>
    function getAhai(city_id){
        if(city_id != ''){
            var dataString='city_id='+city_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getAhai',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#hai_id_fk').addClass("selectpicker");
                    document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "!!required");
                    document.getElementById("hai_id_fk").setAttribute("data-show-subtext", "true");
                    document.getElementById("hai_id_fk").setAttribute("data-live-search", "true");
                    $('#hai_id_fk').html(html);
                    $('#hai_id_fk').selectpicker("refresh");
                }
            });
        }else if(city_id == '' ) {

            $('#hai_id_fk').removeClass("selectpicker");

            $("#hai_id_fk").val('');
            document.getElementById("hai_id_fk").removeAttribute("data-show-subtext", "true");
            document.getElementById("hai_id_fk").removeAttribute("data-live-search", "true");
            document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "!!required");
            $('#hai_id_fk').selectpicker("refresh");
        }
    }
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
    function check_wakel_type(type) {
        if( type ==1 ){

            document.getElementById("w_name").removeAttribute("disabled", "disabled");
            document.getElementById("w_name").setAttribute("data-validation", "!!required");
            document.getElementById("wakel_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").setAttribute("data-validation", "!!required");
            document.getElementById("w_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("w_national_num").setAttribute("data-validation", "!!required");
            document.getElementById("w_mob").removeAttribute("disabled", "disabled");
            document.getElementById("w_mob").setAttribute("data-validation", "!!required");

            $('#wakel_relationship').selectpicker("refresh");
        } else {

            document.getElementById("w_name").setAttribute("disabled", "disabled");
            document.getElementById("w_name").value='';
            document.getElementById("wakel_relationship").setAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").value='';
            document.getElementById("w_national_num").setAttribute("disabled", "disabled");
            document.getElementById("w_national_num").value='';
            document.getElementById("w_mob").setAttribute("disabled", "disabled");
            document.getElementById("w_mob").value='';

            $('#wakel_relationship').selectpicker("refresh");
        }
    }
</script>






<script>

    function GetF2a(f2a_type) {
        var f2a = $('option:selected',f2a_type).attr("data-specialize");


        if( f2a ==1 ){
            //  alert("ddddddddd");
            $('.kafel').text('اسم الكافل ');

            $('.w_name').text('اسم الوكيل');
            $('.wakel_relationship').text('صفته ');
            $('.w_national_num').text('رقم هويته');
            $('.w_mob').text('جوال الوكيل');

            document.getElementById("k_gender_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_gender_fk").setAttribute("data-validation", "!!required");
            document.getElementById("k_nationality_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_nationality_fk").setAttribute("data-validation", "!!required");
            document.getElementById("social_status_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").setAttribute("data-validation", "!!required");
            document.getElementById("k_national_type").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_type").setAttribute("data-validation", "!!required");
            document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_num").setAttribute("data-validation", "!!required");
            document.getElementById("k_national_place").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_place").setAttribute("data-validation", "!!required");
            document.getElementById("work_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").setAttribute("data-validation", "!!required");
            document.getElementById("k_activity_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_activity_fk").removeAttribute("data-validation", "!!required");

            document.getElementById("company_phone").setAttribute("disabled", "disabled");
            document.getElementById("company_gawal").setAttribute("disabled", "disabled");
            document.getElementById("company_fax").setAttribute("disabled", "disabled");

            $(".company").css("display", "block");
            $('.member').hide();
            document.getElementById("k_activity_fk").value='';
        } else if( f2a ==2 )  {
            $('.kafel').text('اسم الكافل (الجهه)');

            document.getElementById("k_gender_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_gender_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("k_gender_fk").value='';
            document.getElementById("k_nationality_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_nationality_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("k_nationality_fk").value='';
            document.getElementById("social_status_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("social_status_id_fk").value='';
            document.getElementById("k_national_type").setAttribute("disabled", "disabled");
            document.getElementById("k_national_type").removeAttribute("data-validation", "!!required");
            document.getElementById("k_national_type").value='';
            document.getElementById("k_national_num").setAttribute("disabled", "disabled");
            document.getElementById("k_national_num").removeAttribute("data-validation", "!!required");
            document.getElementById("k_national_num").value='';
            document.getElementById("k_national_place").setAttribute("disabled", "disabled");
            document.getElementById("k_national_place").removeAttribute("data-validation", "!!required");
            document.getElementById("k_national_place").value='';
            document.getElementById("work_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("work_id_fk").value='';
            document.getElementById("k_activity_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_activity_fk").setAttribute("data-validation", "!!required");

            document.getElementById("company_phone").removeAttribute("disabled", "disabled");
            document.getElementById("company_gawal").removeAttribute("disabled", "disabled");
            document.getElementById("company_fax").removeAttribute("disabled", "disabled");
            $('.w_name').text('اسم المسئول');
            $('.wakel_relationship').text('صفته ');
            $('.w_national_num').text('رقم هويته');
            $('.w_mob').text('جوال المسئول');


            $('.company').hide();
            $('.member').show();
        }

    }

</script>
<script>

    function change_status(value) {
        if(value !=0){
            document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("k_mob").removeAttribute("disabled", "disabled");
        }else{
            document.getElementById("k_national_num").setAttribute("disabled", "disabled");
            document.getElementById("k_mob").setAttribute("disabled", "disabled");
            document.getElementById("k_national_num").value='';
            document.getElementById("k_mob").value='';
        }

    }




    function change_halet_kafel(value) {
        if(value !=8){
            document.getElementById("reasons_stop_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("reasons_stop_id_fk").value='';
        }else{
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }

    /*
     function change_method_kafel(value) {
     if(value ==1 || value == 3){
     document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
     document.getElementById("k_barid_box").value='';
     document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
     document.getElementById("k_bardid_code").value='';
     document.getElementById("k_email").removeAttribute("disabled", "disabled");

     }  else if(value ==2){
     document.getElementById("k_barid_box").removeAttribute("disabled", "disabled");
     document.getElementById("k_barid_box").value='';
     document.getElementById("k_bardid_code").removeAttribute("disabled", "disabled");
     document.getElementById("k_bardid_code").value='';
     document.getElementById("k_email").setAttribute("disabled", "disabled");
     document.getElementById("k_email").value='';
     }else{
     document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
     }

     }
     */


    function change_work_status(value) {
        if(value ==0){
            document.getElementById("k_job_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_job_fk").value='';
            document.getElementById("k_job_place").setAttribute("disabled", "disabled");
            document.getElementById("k_job_place").value='';
        }else{
            document.getElementById("k_job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_job_place").removeAttribute("disabled", "disabled");
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



<script>

    function add_row(){
        
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length+1;
        var mydiv ='<tr id="' + len +'"><td>' + len +'</td>' +
            '<td style="width: 243px;"><select  name="attach_id_fk[]" id="myselect' + len +'"  class="form-control "  ' +
            '><option value="">إختر</option></select></td>' +
            '<td><input type="file" name="img[]"></td>' +
            '<td>#</td></tr>';
        $("#resultTable").append(mydiv);
        GetOptions(len);
        $('#saves').show();
    }

</script>
<script>

    function GetOptions(len) {
        var myarr = <?php echo $attach_arr;?>;
        var html = '<option>إختر </option>';
        for (i = 0; i < myarr.length; i++) {
            html += '<option value="' + myarr[i].id_setting + '"> ' + myarr[i].title_setting + '</option>';
        }
        $("#myselect" + len).html(html);
    }
</script>


<script>

    function DeleteImage(valu) {
        $('#' + valu).remove();
        var x = document.getElementById('resultTable');
        var myLenth = x.rows.length;
        var dataString = 'id=' + valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/delete_attach/' + valu ,
            data:dataString,
            cache:false,
            success: function(json_data){
                if(myLenth == 0){
                    $("#mytable").hide();
                }
                var JSONObject = JSON.parse(json_data);
                //console.log(myLenth);
                alert(' تم حذف  المرفق بنجاح');

            }
        });

    }

</script>


<script>
    function change_method_kafel(value) {
        if(value ==1 ){
            document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").removeAttribute("data-validation", "!!required");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").removeAttribute("data-validation", "!!required");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").removeAttribute("disabled", "disabled");
            document.getElementById("k_email").setAttribute("data-validation", "email");
            document.getElementById("k_email").value='';
        }  else if(value ==2){
            document.getElementById("k_barid_box").removeAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").removeAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").setAttribute("disabled", "disabled");
            document.getElementById("k_email").removeAttribute("data-validation", "email");
            document.getElementById("k_email").value='';
        }else {
            document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").setAttribute("disabled", "disabled");
            document.getElementById("k_email").removeAttribute("data-validation", "email");
            document.getElementById("k_email").value='';
        }

    }

</script>