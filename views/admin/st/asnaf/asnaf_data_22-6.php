
 <?php
    $this->load->view('admin/requires/header');
       $this->load->view('admin/requires/tob_menu');

     
?>
 <style type="text/css">
     .top-label {
         font-size: 14px;
         font-weight: 500;

     }
     .print_forma{
         /*border:1px solid #73b300;*/
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
     .bordered-bottom{
         border-bottom: 4px solid #9bbb59;
     }
     .piece-footer{
         display: inline-block;
         float: right;
         width: 100%;
         border-top: 1px solid #73b300;
     }
     .piece-heading h5 {
         margin: 4px 0;
         color: #fff;
     }
     .piece-box table{
         margin-bottom: 0
     }
     .piece-box table th,
     .piece-box table td
     {
         padding: 2px 8px !important;
     }

     .piece-box h6 {
         font-size: 16px;
         margin-bottom: 5px;
         margin-top: 5px;
     }
     .print_forma table th{
         text-align: right;
     }
     .print_forma table tr th{
         vertical-align: middle;
     }
     .no-padding{
         padding: 0;
     }
     .header p{
         margin: 0;
     }
     .header img{
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

     .print_forma hr{
         border-top: 1px solid #73b300;
         margin-top: 7px;
         margin-bottom: 7px;
     }

     .no-border{
         border:0 !important;
     }

     .gray_background{
         background-color: #eee;

     }

     @page {
         size: A4;
         margin: 20px 0 0;
     }
     .open_green{
         background-color: #e6eed5;
     }
     .closed_green{
         background-color: #cdddac;
     }
     .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
     .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
     .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
         border: 1px solid #abc572;
         vertical-align: middle;
     }
     .under-line{
         border-top: 1px solid #abc572;
         padding-left: 0;
         padding-right: 0;
     }
     span.valu {
         padding-right: 10px;
         font-weight: 600;
         font-family: sans-serif;
     }

     .under-line .col-xs-3 ,
     .under-line .col-xs-4,
     .under-line .col-xs-6 ,
     .under-line .col-xs-8
     {
         border-left: 1px solid #abc572;
     }


     .nonactive{
         pointer-events: none;
         cursor: not-allowed;
     }


     label {
         margin-bottom: 5px !important;
         color: #002542 !important;
         display: block !important;
         text-align: right !important;
         font-size: 16px !important;
         padding: 0 !important;
         height: auto;
     }
 </style>
 <?php

 ?>


     <div class="col-sm-12 no-padding" >
     <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
             <div class="panel-heading">
                 <h3 class="panel-title"><?php echo $title;  ?></h3>
             </div>
             <div class="panel-body">
      <div class="col-sm-9 no-padding " >
         
                 <?php
                 if (isset($get_sanf)&& !empty($get_sanf)){
                     echo form_open_multipart('st/asnaf/Asnaf/update_asnaf/'.$get_sanf->id);
                     $code= $get_sanf->code;
                     $code_br= $get_sanf->code_br;
                     $code_qr= $get_sanf->code_qr;
                     $name= $get_sanf->name;
                     $fe2a= $get_sanf->fe2a;
                     $tasnef= $get_sanf->tasnef;
                     $whda= $get_sanf->whda;
                     $sbig= $get_sanf->sbig;
                     $ssmall= $get_sanf->ssmall;
                     $details= $get_sanf->details;
                     $price= $get_sanf->price;
                     $value = $get_sanf->code;
                     $readonly = 'readonly';
                     $checked= '';
                     $submitEdit = 'submit';
                     $submitAdd = 'button';

                 } else{
                     echo form_open_multipart('st/asnaf/Asnaf/add_asnaf');
                     $submitEdit = 'button';
                     $submitAdd = 'submit';
                     if (isset($code) && $code !=0){
                         $readonly = 'readonly';
                         $value = $code +1 ;
                     } else{
                         $readonly ='';
                         $value ='';
                     }
                     $code= '';
                     $code_br= '';
                     $code_qr= '';
                     $name= '';
                     $fe2a= '';
                     $tasnef= '';
                     $whda='';
                     $sbig= '';
                     $ssmall= '';
                     $details= '';
                     $price='';
                     $checked= 'checked';
                 }
                 ?>

                     <div class="form-group col-md-2 col-sm-6 padding-4">
                         <label class="label">كود الصنف</label>
                         <input type="number" name="code" id="code" value="<?= $value ?>"
                                class="form-control "
                                data-validation="required"
                                data-validation-has-keyup-event="true" <?= $readonly?>>
                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label"> كود الصنف الدولي(Barcode )</label>
                         <input type="text" name="code_br" id="code_br" value="<?= $code_br?>"
                                class="form-control"

                         >
                     </div>
                     <div class="form-group col-md-2 col-sm-6 padding-4">
                         <label class="label">كود الصنف (qrcode)</label>
                         <input type="text" name="code_qr" id="code_qr" value="<?= $code_qr?>"
                                class="form-control "
                         >
                     </div>
                     <div class="form-group col-md-5 col-sm-6 padding-4">
                         <label class="label">اسم الصنف </label>
                         <input type="text" name="name" id="name" value="<?= $name?>"
                                class="form-control "
                                data-validation="required"
                                data-validation-has-keyup-event="true"
                         >
                     </div>




                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label"> الفئه </label>
                         <select type="text" name="fe2a" id="fe2a" value=""
                                 class="form-control "
                                 data-validation="required"
                                 data-validation-has-keyup-event="true"
                                 onchange="get_tasnef(this.value);">
                             <option value="">--اختر--</option>
                             <?php
                             if (isset($fe2at) && !empty($fe2at)){
                                 foreach ($fe2at as $f){
                                     ?>
                                     <option value="<?= $f->id?>"
                                         <?php
                                         if ($fe2a==$f->id){
                                             echo 'selected';
                                         }
                                         ?>
                                     ><?= $f->name?></option>
                                     <?php
                                 }
                             }
                             ?>

                         </select>
                     </div>

                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label"> التصنيف </label>
                         <select type="text" name="tasnef" id="tasnef" value=""
                                 class="form-control "
                                 data-validation="required"
                                 data-validation-has-keyup-event="true" >
                                 <option value="">--اختر--</option>
                             <?php
                             if (isset($get_sanf) && !empty($get_sanf)){
                                 ?>
                                 <option value="<?= $get_sanf->tasnef ?>" selected="selected"><?php
                                     if ($get_sanf->tasnef==0){
                                         echo "لا يوجد تصنيفات تابعة" ;
                                     }else{
                                         echo $get_sanf->tasnef_name ;
                                         }
                                     ?></option>
                             <?php
                             }
                             ?>

                         </select>
                     </div>

                     <div class="form-group col-md-2 col-sm-6 padding-4">
                         <label class="label"> الوحدة الكلية </label>
                         <select type="text" name="whda" id="whda" value=""
                                 class="form-control "
                                 data-validation="required"
                                 data-validation-has-keyup-event="true" >
                             <option value="">--اختر--</option>
                             <?php
                             if (isset($we7da) && !empty($we7da)){
                                 foreach ($we7da as $we7da){
                                     ?>
                                     <option value="<?= $we7da->id_setting?>"
                                         <?php
                                         if ($whda==$we7da->id_setting){
                                             echo 'selected';
                                         }
                                         ?>
                                     ><?= $we7da->title_setting?></option>
                                     <?php
                                 }
                             }
                             ?>

                         </select>
                     </div>

                     <div class="form-group col-md-1 col-sm-6 padding-4">
                         <label class="label">  الكبري </label>
                         <input type="number" name="sbig" id="sbig" value="<?= $sbig?>"
                                class="form-control "

                         >

                     </div>
                     <div class="form-group col-md-1 col-sm-6 padding-4">
                         <label class="label">  الصغري </label>
                         <input type="number" name="ssmall" id="ssmall" value="<?= $ssmall?>"
                                class="form-control "

                         >

                     </div>
                 <div class="form-group col-md-2 col-sm-6 padding-4">
                     <label class="label">سعر الصنف </label>
                     <input type="number" name="price" id="price" value="<?= $price?>"
                            class="form-control "
                     >
                 </div>





                     <div class="form-group col-md-2 col-sm-6 padding-4">
                         <label class="label">   تاريخ الصلاحية </label>
                         <select type="text" name="slahia" id="slahia" value=""
                                 class="form-control "
                                >

                             <?php
                             $method_arr=array('لا','نعم');
                             foreach ($method_arr as $key=>$value){
                                 ?>
                                 <option value="<?= $key?>"
                                     <?php
                                     if (isset($get_sanf)&& $get_sanf->slahia==$key){
                                         echo 'selected';
                                     }
                                     ?>
                                 ><?= $value?></option>
                                 <?php
                             }
                             ?>

                         </select>


                     </div>

                 <div class="form-group col-md-2 col-sm-6 padding-4">
                     <label class="label">  صورة الصنف </label>
                     <input type="file" name="img" id="img"
                            class="form-control">


                 </div>

                 <div class="form-group col-md-8 col-sm-6 padding-4">
                     <label class="label">  مواصفات الصنف </label>
                     <input type="text" name="details" id="details"
                               class="form-control " value="<?= $details?>" >


                 </div>
                 <div class="col-xs-12 text-center">

                     <button type="<?= $submitAdd?>"  class="btn btn-labeled btn-success " name="save" value="save"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                         <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                     </button>
                     <button type="<?= $submitEdit ?>"  class="btn btn-labeled btn-warning" style="background-color: #FFB61E;border-color:#FFB61E"
                             name="save" value="save">
                         <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                     </button>
                     <button type="button" class="btn btn-labeled btn-danger ">
                         <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                     </button>

                     <button type="button" class="btn btn-labeled btn-purple ">
                         <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                     </button>


                     <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#myModal_search"  data-toggle="modal" >
                         <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                     </button>


                 </div>
                 <?php
                 echo form_close();
                 ?>

             </div>
   
                 <?php
                 if (isset($get_sanf) && !empty($get_sanf)){
                     ?>
                     <div class="col-md-3 col-xs-12  fadeInUp wow" >
                         <?php
                         if (isset($get_sanf->img) && !empty($get_sanf->img)){
                             ?>
                             <img src="<?= base_url()."uploads/st/asnaf/thumbs/".$get_sanf->img?>"  alt="">
                             <?php
                         }
                         ?>

                     </div>
                 <?php
                 } else{
                     ?>
                     <div class="col-sm-12 col-md-3 col-xs-12 fadeInUp wow" style="padding: 0;">


                         <div class="form-group col-sm-12 col-xs-12" style="height: 250px;overflow-y:scroll">
                             <?php

                             function buildTree($tree) {
                                 ?>
                                 <ul id="tree3">
                                     <?php foreach ($tree as $record) { ?>
                                         <li>
                                             <!--     <a href="<?=base_url().'st/asnaf/Asnaf/update_asnaf/'.$record->id?>"> -->
                                             <span style="background-color: ">
                              <?php if (isset($record->num) && $record->num !=0 )echo $record->num;?></span> <?=' - '.$record->name?></a>
                                             <div class="pull-right">
                                                 <?php if ( isset($record->from_id)) { ?>
                                                     <!--    <a  onclick="$('#adele').attr('href', '<?=base_url()."finance_accounting/dalel/Dalel/deleteAccount/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"><i class="fa fa-trash"></i></a>-->
                                                 <?php } else{
                                                     ?>
                                                     <!--    <a  href="<?=base_url()."st/asnaf/Asnaf/delete_asnaf/".$record->id?>" title="حذف"><i class="fa fa-trash"></i></a> -->
                                                     <a href="#" onclick='swal({
                                                             title: "هل انت متأكد من الحذف ؟",
                                                             text: "",
                                                             type: "warning",
                                                             showCancelButton: true,
                                                             confirmButtonClass: "btn-danger",
                                                             confirmButtonText: "حذف",
                                                             cancelButtonText: "إلغاء",
                                                             closeOnConfirm: false
                                                             },
                                                             function(){
                                                             swal("تم الحذف!", "", "success");
                                                             window.location="<?= base_url()."st/asnaf/Asnaf/delete_asnaf/".$record->id ?>";
                                                             });'>
                                                         <i class="fa fa-trash"> </i></a>

                                                     <a href="#" onclick='swal({
                                                             title: "هل انت متأكد من التعديل ؟",
                                                             text: "",
                                                             type: "warning",
                                                             showCancelButton: true,
                                                             confirmButtonClass: "btn-warning",
                                                             confirmButtonText: "تعديل",
                                                             cancelButtonText: "إلغاء",
                                                             closeOnConfirm: false
                                                             },
                                                             function(){

                                                             window.location="<?php echo base_url(); ?>st/asnaf/Asnaf/update_asnaf/<?php echo $record->id; ?>";
                                                             });'>
                                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                     <?php
                                                 }?>
                                                 <!--   <a href="#"  title="إضافة" onclick="$('#parent').val(<?=$record->id?>).selectpicker('refresh');getCode();"><i class="fa fa-plus-square"></i></a> -->

                                                 <!--  <a  href="<?=base_url()."finance_accounting/dalel/Dalel/editAccount/".$record->id?>" title="تعديل"><i class="fa fa-pencil-square"></i></a> -->
                                             </div>
                                             <?php
                                             if (isset($record->subs)) {
                                                 buildTree($record->subs);
                                             }
                                             ?>
                                         </li>
                                     <?php } ?>
                                 </ul>
                                 <?php
                             }
                             if (isset($tree) && $tree!=null) {
                                 buildTree($tree);
                             }
                             ?>




                         </div>

                     </div>
                 <?php
                 }
                 ?>
     
     

     

     
     
     
         </div>

     </div>  

 </div>





   

    <table id="js_table_asnaf"
   
    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
     <tr class="greentd">
              <th style="width: 20px;">م </th>
                <th style="width: 30px;">كود الصنف </th>
               <!-- <th style="width: 80px;" >  كود الصنف الدولي</th> -->
                <th >إسم الصنف</th>
                <th> الفئة</th>
                <th style="width: 100px;">التصنيف</th>
                <th style="width: 50px;" > الوحدة</th>

                <th style="width: 50px;" > الرصيد المتاح</th>
                <!--<th style="width: 90px;">تفاصيل</th>-->
                <th style="width: 50px;" >الإجراءات </th> 
            </tr>
        </thead>
    </table>
<!-- detailsModal -->



 <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document" style="width: 70%;">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" style="text-align: center;" >تفاصيل الصنف</h4>
             </div>
             <div  class="modal-body" style="padding: 10px 0" id="result">

             </div>
             <div class="modal-footer" style="display: inline-block;width: 100%;">
                 <?php
             //    if (isset($get_all) && !empty($get_all) ){
                 ?>
                 <button
                         type="button" onclick="print_asnaf(document.getElementById('sanf_id').value)"
                         class="btn btn-labeled btn-purple ">
                     <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                 </button>
                     <?php
              //   }
                 ?>
                 <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                     <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                 </button>

             </div>

         </div>
     </div>
 </div>

<!-- detailsModal -->


   
   
 <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

   
    <?php

    
       echo $tasnef_js;
    ?>

    <?php      $this->load->view('admin/requires/footer'); ?>

 <script>

     function get_tasnef(fe2a_id) {

         if (fe2a_id != 0 && fe2a_id != "") {
             var dataString = "fe2a_id=" + fe2a_id;
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url() ?>st/asnaf/Asnaf/GetTasnef',
                 data: dataString,
                 dataType: 'html',
                 cache: false,
                 success: function (html) {
                     $("#tasnef").html(html);

                 }
             });
         }
     }
 </script>
 <script>
     function print_asnaf(row_id) {
         var request = $.ajax({
             // print_resrv -- print_contract
             url: "<?=base_url().'st/asnaf/Asnaf/Print_sanf'?>",
             type: "POST",
             data: {row_id: row_id},
         });
         request.done(function (msg) {
             var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
             WinPrint.document.write(msg);
             WinPrint.document.close();
             WinPrint.focus();
             /*  WinPrint.print();
               WinPrint.close();*/
         });
         request.fail(function (jqXHR, textStatus) {
             console.log("Request failed: " + textStatus);
         });
     }
 </script>



