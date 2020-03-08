

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
                <?php    echo form_open_multipart('all_Finance_resource/all_pills/AllPills/addPills/')?>
     
<!---------------- First row ----------------------->       
<div class="col-md-12 ">

                <div class="form-group col-sm-2 col-xs-12">
                            <label class="label label-green  half"> رقم الإيصال</label>
                            <input type="number" class="form-control half input-style"
                             value=""  />
</div>

                <div class="form-group col-sm-3 col-xs-12">
                            <label class="label label-green  half"> رقم الإيصال</label>
                            <input type="number" class="form-control half input-style"
                             value=""  />
</div>
                <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half"> رقم الإيصال</label>
                            <input type="number" class="form-control half input-style"
                             value=""  />
</div>
                <div class="form-group col-sm-6 col-xs-12">
                            <label class="label label-green  half"> رقم الإيصال</label>
                            <input type="number" class="form-control half input-style"
                             value=""  />
</div>




        <div class="form-group col-md-2  col-sm-6 padding-4">
            <label class="label top-label">رقم الإيصال</label>
            <input type="text"  data-validation="required" name="pill_num"
                    value=""
                   class="form-control bottom-input  "
                   data-validation-has-keyup-event="true">
        </div>
                             
        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label top-label">تاريخ اليوم</label>
            <input type="date" name="day_date" data-validation="required"
                   id="day_date" value="<?=date('Y-m-d')?>"
                   class="form-control bottom-input  "
                   data-validation-has-keyup-event="true"">
        </div>
        
        <div class="form-group col-md-2  col-sm-6 padding-4">
                <label class="label top-label">  نوع الإيصال </label>
               <select id="pill_type" name="pill_type" class="form-control bottom-input "
                          	 data-validation="required" aria-required="true">
                            <option value="">الإختيار الأول  </option>
                             
               </select>
        </div>
      
        <div class="form-group col-md-2  col-sm-6 padding-4">
                 <label class="label top-label">  طريقة الدفع </label>
                 <select id="pay_method" name="pay_method" class="form-control bottom-input "
                            onchange="GetPayType($(this).val())"	 data-validation="required" aria-required="true">
                  <option value="">إختر</option>
                        <?php
                   $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                        if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                            for($a=1;$a<sizeof($pay_method_arr);$a++){
                                ?>
                                <option value="<?php echo$a;?>"
                                    <?php if(!empty($pay_method)){
                                        if($a == $pay_method){ echo 'selected'; }
                                    } ?>> <?php echo $pay_method_arr[$a];?></option >
                                <?php
                            }
                        }
                        ?>
                    </select>
          </div>
        
          <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label top-label"> المبلغ</label>
                 <input type="number" step="any" name="value" data-validation="required"
                   
                   class="form-control bottom-input  "
                   data-validation-has-keyup-event="true"">
          </div>
        
        <div class="col-sm-2  padding-4">
                  <label class="label top-label">مركز التكلفة</label>
                   <select  name="markz_id_fk"  data-validation="required" class="selectpicker choose-date bottom-input form-control bottom-input"
                                 data-show-subtext="true" data-live-search="true"   aria-required="true" >
                        <option value="">اختر</option>
                         <?php foreach ($markz as $row):
                                $selected='';if($row->id_setting==$markz_id_fk){$selected='selected';}   ?>
                           <option value="<?php  echo $row->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row->title_setting;?></option>
                         <?php  endforeach;?>
                    </select>
        </div>
                                    
</div>  
<!---------------- Second row ----------------------->   
 <div class="col-md-12 ">
     <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">  نوع الإيراد </label>
                    <select id="" name="" class="form-control bottom-input "
                          	 data-validation="required" aria-required="true">
                            <option value=""> مقيد  </option> 
                            <option value=""> غير مقيد  </option>
                            <option value=""> أوقاف   </option>                                 
                    </select>
      </div>
   
     <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">  الفئة </label>
                    <select id="" name="" class="form-control bottom-input "
                          	 data-validation="required" aria-required="true">
                            <option value="">الزكاة  </option>
                             
                    </select>
      </div>
   
     <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label">  البند </label>
                    <select id="band" name="band" class="form-control bottom-input "
                          	 data-validation="required" aria-required="true">
                            <option value="">الإختيار الأول  </option>
                             
                    </select>
      </div>


     <div class="form-group col-md-2  col-sm-6 padding-4">
                    <label class="label top-label"> جهة التوريد </label>
                    <select id="supply_point" name="supply_point" class="form-control bottom-input "
                          	 data-validation="required" aria-required="true">
                            <option value="">القسم الرجالي   </option>
                             <option value="">القسم النسائي   </option>
                             
                    </select>
      </div>

    <div class="form-group col-md-3  col-sm-6 padding-4">
                    <label class="label top-label"> الفئة </label>
                 
                 
                       <?php
                    $k_type_arr =array('1'=>'كافل','2'=>'متبرع','3'=>'مشترك');
                    if(isset($k_type_arr)&&!empty($k_type_arr)) {
                        foreach($k_type_arr as $key=>$value){
                            ?>
                            <input  type="radio" name="fe2a" style="margin-right: 15px" onclick="GetF2aTypeArr(<?=$key?>)" value="<?=$key?>"
                                      data-validation="required"
                                <?php if(!empty($$key)){
                                    if($$key ==1){?> checked <?php }} ?>>
                            <label for="square-radio-1"><?=$value?></label>
                            <?php
                        }
                    }
                    ?>    
                 
      </div>



</div> 
<!---------------- End Second row -----------------------> 


<!-------------------------------------start---------------------------------------->

<div class="col-md-12">
            <table id="js_table_members" style="display: none"
                   class="table table-striped table-bordered dt-responsive nowrap ">
                <thead>
                <tr>
                    <th style="width: 50px;">#</th>
                    <th style="width: 50px;"> الإسم </th>
                    <th style="width: 170px;" >الهوية </th>
                    <th style="width: 170px;" >الجوال</th>
                </tr>
                </thead>
            </table>

    <div id="dataMember"></div>
</div>
<!-------------------------------------start---------------------------------------->



<div class="col-md-12" id="button_div" style="display: none">


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
        
        

        

    </div>
    


    <div class="col-sm-3 no-padding">
        <div  class=" panel panel-bd lobipanel-noaction  ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12 no-padding">
                    <div class="user-widget list-group">
                        <div class="list-group-item heading">



                            <img style="width: 100px;"  id="person_photo" class="media-object center-block" src="<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png"
                                 onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">
                            <div class="clearfix"></div>
                        </div>
                        <table class="table-bordered table table-pro" style="table-layout: fixed;">
                            <tbody>
                            <tr>
                                <th> <strong class="text-danger "> الإسم   </strong> </th>
                                <td><div id="name-emp"></div></td>
                            </tr>
                                <tr>
                                <th> <strong class="text-danger "> الفئة    </strong> </th>
                                <td><div id="name-emp"></div></td>
                            </tr>
                            <tr>
                                <th><strong class="text-danger ">رقم الهوية </strong></th>
                                <td><div id="num-emp"></div></td>
                            </tr>
                            
                              <tr>
                                <th><strong class="text-danger ">الجوال </strong></th>
                                <td><div id="num-emp"></div></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


   </div>


    <!----- end table ------>

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

    function GetF2aTypeArr(valu) {
   $('#js_table_members').show();
         var F2aType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/getConnection/' + F2aType,

            aoColumns:[
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





