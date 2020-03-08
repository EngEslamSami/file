
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

 <div class="col-sm-12 no-padding " >
     <div class="col-sm-12" >
         <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
             <div class="panel-heading">
                 <h3 class="panel-title"><?php echo $title;  ?></h3>
             </div>
             <div class="panel-body">
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

                 } else{
                     echo form_open_multipart('st/asnaf/Asnaf/add_asnaf');
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
                 <div class="col-md-12">
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">كود الصنف</label>
                         <input type="number" name="code" id="code" value="<?= $value ?>"
                                class="form-control "
                                data-validation="required"
                                data-validation-has-keyup-event="true" <?= $readonly?>>
                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">كود الصنف الدولي</label>
                         <input type="number" name="code_br" id="code_br" value="<?= $code_br?>"
                                class="form-control"

                         >
                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">كود الصنف </label>
                         <input type="number" name="code_qr" id="code_qr" value="<?= $code_qr?>"
                                class="form-control "
                         >
                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">اسم الصنف </label>
                         <input type="text" name="name" id="name" value="<?= $name?>"
                                class="form-control "
                                data-validation="required"
                                data-validation-has-keyup-event="true"
                         >
                     </div>

                 </div>
                 <div class="col-md-12">

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
                                 <option value="<?= $get_sanf->tasnef ?>" selected="selected"><?php if ($get_sanf->tasnef_name !=0){echo $get_sanf->tasnef_name ;} else{echo " لايوجد أصناف تابعة";} ?></option>
                             <?php
                             }
                             ?>

                         </select>
                     </div>

                     <div class="form-group col-md-3 col-sm-6 padding-4">
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

                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">  الكبري </label>
                         <input type="number" name="sbig" id="sbig" value="<?= $sbig?>"
                                class="form-control "

                         >

                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">  الصغري </label>
                         <input type="number" name="ssmall" id="ssmall" value="<?= $ssmall?>"
                                class="form-control "

                         >

                     </div>

                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">  مواصفات الصنف </label>
                         <textarea type="number" name="details" id="details"
                                   class="form-control " ><?= $details?></textarea>



                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">  صورة الصنف </label>
                         <input type="file" name="img" id="img"
                                class="form-control">



                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
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
                        <!-- <input type="radio" name="slahia" value="1" id="radio-one" class="form-radio"
                             <?php
                             if( isset($get_sanf) && $get_sanf->slahia==1){ echo'checked';}
                             ?>
                         ><label for="radio-one">نعم </label>
                         <input type="radio" name="slahia" value="0" id="radio-two" class="form-radio"
                                <?= $checked?>

                             <?php
                             if( isset($get_sanf) && $get_sanf->slahia==0){ echo'checked';}
                             ?>
                         ><label for="radio-two"> لا </label> -->



                     </div>
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                         <label class="label">سعر الصنف </label>
                         <input type="number" name="price" id="price" value="<?= $price?>"
                                class="form-control "
                         >
                     </div>


                 </div>
                 <div class="col-xs-12 text-center">

                     <button type="submit"  class="btn btn-labeled btn-success " name="save" value="save"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                         <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                     </button>

                 </div>
                 <?php
                 echo form_close();
                 ?>

             </div>
         </div>

     </div>

 </div>
   

    <table id="js_table_asnaf"
    style="table-layout: fixed;"
    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
            <tr class="greentd">
              <th style="width: 20px;">م </th>
                <th style="width: 20px;">كود الصنف </th>
                <th style="width: 92px;" >  كود الصنف الدولي</th>
                <th style="width: 92px;">إسم الصنف</th>
                <th style="width: 30px;"> الفئة</th>
                <th style="width: 50px;">التصنيف</th>
                <th style="width: 30px;" > الوحدة</th>
                <th style="width: 8px;">تفاصيل</th>
                  <th style="width: 32px;" >الإجراءات </th>

                   
                
            </tr>
        </thead>
    </table>
<!-- detailsModal -->

 <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document" style="width: 95%">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" style="text-align: center;" >تفاصيل الصنف</h4>
             </div>
             <div class="modal-body" id="result">

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                     إغلاق
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



