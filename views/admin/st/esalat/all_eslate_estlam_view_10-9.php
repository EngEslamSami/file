<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>

        </div>
        <div class="panel-body">
            <?php $pay_method_arr = array(1 => ' عيني ');//26-5-om
            ?>
            <div class="col-xs-12 no-padding text-center">


                <div class="col-xs-12 no-padding" id="counter_section">
                    <div class="col-md-12 col-xs-12  no-padding">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">إستلام الإيصالات</a></li>
                            <li><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">الإيصالات المحولة الي المستودع</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xs-12 no-padding">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <div class="panel-body">
                                    <?php if (!empty($eslat_estlam)) { ?>
                                        <table id="example"
                                               class=" display table table-bordered  table-striped  responsive nowrap"
                                               cellspacing="0" width="100%">

                                            <thead>
                                            <tr class="greentd">
                                                <th style="text-align: center !important;">م</th>
                                                <th style="text-align: center !important;">رقم الإيصال</th>
                                                <th style="text-align: center !important;">التاريخ</th>
                                                <th style="text-align: center !important;">نوع الإيصال</th>
                                                <th style="text-align: center !important;">طريقة التوريد</th>
                                                <th style="text-align: center !important;">المبلغ</th>
                                                <th style="text-align: center !important;">الإسم</th>
                                                <th style="text-align: center !important;">البند</th>
                                                
                                                <th style="text-align: center !important;">الإجراء</th>
                                                <th style="text-align: center !important;">تحديد</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 0;
                                            foreach ($eslat_estlam as $row) {
                                                $x++;
                                                ?>
                                                <tr>
                                                    <td><?= $x ?></td>
                                                    <td><?= $row->esal_num ?></td>
                                                    <td><?= $row->esal_date ?></td>
                                                    <td><?= $row->esal_type_title ?></td>
                                                    <td><?php if (!empty($pay_method_arr[$row->pay_method])) {
                                                            echo $pay_method_arr[$row->pay_method];
                                                        } ?></td>
                                                    <td><?= $row->value ?></td>
                                                    <td><?= $row->person_name ?></td>
                                                    <td><?= $row->band_title ?></td>

                                                    <td>
                                                        <a type="button" class="btn btn-info btn-xs" title="التفاصيل"
                                                                data-toggle="modal" style="padding: 1px 5px;"
                                                                onclick="GetTable(<?php echo $row->id; ?>)"
                                                                data-target="#myModal"><i class="fa fa-list"></i>
                                                        </a>
                                                
                                                        <a href='<?php echo base_url().'st/esalat/Esalat_estlam/Print_esal3/'.$row->id ?>'
                                                           target='_blank'><i class='fa fa-print' ></i></a>

                                                        <a href="<?php echo base_url(); ?>st/esalat/Esalat_estlam/addesal/<?php echo $row->id; ?>">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>

                                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "st/esalat/Esalat_estlam/Deleteesal/" . $row->esal_num ?>');"
                                                           data-toggle="modal" data-target="#modal-delete"
                                                           title="حذف"> <i class="fa fa-trash"
                                                                           aria-hidden="true"></i> </a>

                                                                           
                                                                           

<a title="عرض المرفق"
   onclick=" load_add_morfaq(<?php echo $row->id; ?>);$('#esal_id_morfaq').val(<?php echo $row->id; ?>)"
   data-toggle="modal"
   data-target="#modal-add_morfaq"> <i class="fa fa-cloud-upload"
                                       aria-hidden="true"></i> </a>


                                                    </td>

                                                    <td>
                                                         <div class="skin-square">
                                                    
                                                             <div class="i-check">
                                                               <input tabindex="9" type="checkbox" id="square-checkbox-<?= $row->id ?>" value="<?= $row->id ?>"  class="checkbox_esal">
                                                               <label for="square-checkbox-<?= $row->id ?>"></label>
                                                            </div>
                                                             
                                                           <!-- <input type="checkbox" value="<?= $row->id ?>"
                                                               class="checkbox_esal">-->
                                                         </div> 
                                                    </td>


                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>


                                    <?php } else { ?>
                                        <div style="color: red; font-size: large;" class="col-sm-12">لم يتم إضافة
                                            إيصالات !!
                                        </div>

                                    <?php } ?>

                                </div>
<!--
                                <div class="col-md-12" style="margin-top: 25px;">

                                    <button type="button" class="btn btn-warning" onclick="get_esalt()"
                                            style="float: left"> تحويل الإيصالات
                                        المحددة إلى المستودع
                                    </button>
                                </div> -->
                                
                                <div class="col-md-12" style="margin-top: 25px;">
                                <?php if (!empty($eslat_estlam)) { ?>
                                    <button type="button" class="btn btn-warning btn-labeled" onclick="get_esalt()"
                                            style="float: left;    font-family: 'hl';">
                                            <span class="btn-label"><i class="fa fa-share"></i></span> تحويل الإيصالات إلى المستودع
                                    </button>
                                <?php }?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="panel-body">


                                    <?php

                                    if (!empty($eslat_estlam_deport)) {
                                        ?>
                                        <table id=""
                                               class="table table-striped table-bordered dt-responsive nowrap example">
                                            <thead>
                                            <tr class="greentd">
                                                <th style="text-align: center !important;">م</th>
                                                <th style="text-align: center !important;">رقم الإيصال</th>
                                                <th style="text-align: center !important;">التاريخ</th>
                                                <th style="text-align: center !important;">نوع الإيصال</th>
                                                <th style="text-align: center !important;">طريقة التوريد</th>
                                                <th style="text-align: center !important;">المبلغ</th>
                                                <th style="text-align: center !important;">الإسم</th>
                                                <th style="text-align: center !important;">البند</th>
                                                <th style="text-align: center !important;">القائم بالترحيل</th>
                                                <th style="text-align: center !important;">تاريخ الترحيل</th>
                                                
                                                <th style="text-align: center !important;">الإجراء</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 0;
                                            foreach ($eslat_estlam_deport as $row) {
                                                $x++;

                                                ?>
                                                <tr>
                                                    <td><?= $x ?></td>
                                                    <td><?= $row->esal_num ?></td>
                                                    <td><?= $row->esal_date ?></td>
                                                    <td><?= $row->esal_type_title ?></td>
                                                    <td><?php if (!empty($pay_method_arr[$row->pay_method])) {
                                                            echo $pay_method_arr[$row->pay_method];
                                                        } ?></td>
                                                    <td><?= $row->value ?></td>
                                                    <td><?= $row->person_name ?></td>
                                                    <td><?= $row->band_title ?></td>
                                                    
                                                    <td>
                                                    <span style="color: white !important;" class="label label-success"><?= $row->store_deport_publisher_name ?></span>
                                                    </td>
                                                    <td>
                                                     <span style="color: white !important;" class="label label-success"><?= $row->store_deport_date_ar ?></span>
                                                    </td>
                                                    
                                                    

                                                    <td>
                                                        <a data-toggle="modal" class="btn btn-info btn-xs" title="التفاصيل"
                                                                style="padding: 1px 5px;"
                                                                onclick="GetTable(<?php echo $row->id; ?>)"
                                                                data-target="#myModal"> <i class="fa fa-list"></i>
                                                        </a>
                                                 
                                                        <button type="button" class="btn btn-sm btn-success " style="    padding: 1px 5px;"
                                                                onclick="window.location = '<?= base_url() . '/st/ezn_edafa/Ezn_edafa/add_esal_ezn/' . $row->id ?>'">
                                                           <i class="fa fa-plus"></i> إنشاء إذن إضافة
                                                        </button>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <div style="color: red; font-size: large;" class="col-sm-12">لم يتم إضافة
                                            إيصالات !!
                                        </div>

                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!---------------------------------------------------------myModals------------------------------------>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                </div>
                <div class="modal-body" id="optionearea1">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <!---------------------------------------------------------myModals------------------------------------>
<div class="modal fade" id="modal-add_morfaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافة مرفقات</h4>
            </div>
            <div class="modal-body" id="my_morfaq_add">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
    <!---------------------------------------------------------myModals------------------------------------>
<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="img_morfaq"
                     width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>



    <script>
        function GetTable(valu) {
            if (valu != 0 && valu != '') {
                var dataString = 'id=' + valu;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>st/esalat/Esalat_estlam/GetDetails',
                    data: dataString,
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#optionearea1").html(html);
                    }
                });

            }

        }

    </script>

    <script>
        
                    function get_esalt() {
          
         swal({
                    title: "هل تريد تحويل الإيصالات المحددة إلي المستودع ؟",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا ",
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true,
             
  input: 'select',
  inputOptions: {
    <?php
      if (!empty($storage)) { 
      foreach($storage as $row){?>
        '<?php echo $row->id_setting?>': '<?php echo $row->title_setting?>',
       

      <?php  }}
    ?>
  },
  inputPlaceholder: 'قم باختيار المستودع',
  inputValidator: (value) => {
    return new Promise((resolve) => {
      if (value != '') {
        resolve()
        //console.log("ffff"+value);
        sendajax(value);
      } else {
        resolve('يجب اختيار المستودع :)')
      }
    })
  }
  
  
})


        }

    function sendajax(store_id)
        {
            var checkbox_value = [];
            

            var oTable = $('#example').dataTable();
            var rowcollection = oTable.$(".checkbox_esal:checked", {"page": "all"});
            rowcollection.each(function (index, elem) {
                // var checkbox_value = $(elem).val();
                checkbox_value.push($(elem).val());
                $(elem).closest('tr').remove();
            });
            $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>st/esalat/Esalat_estlam/update_store_deport",
                            data: {checkbox_esal_id: checkbox_value,store_id:store_id},
                            success: function (d) {
                                console.log(" :تمت العمليه بنجاح" + d);
                                if (d == 1) {
                                    swal({
                                        title: "تم التحويل بنجاح.",
                                        type: "warning",
                                        confirmButtonText: "تم",
                                        closeOnConfirm: true

                                    });
                                    //location.reload();
                                
                                } else {

                                   
                                    swal({
                                        title: "حدث خطأ...  لم يتم التحويل.",
                                        text: "من فضلك اختر احد إيصالات لتحوليها ",
                                        type: "warning",
                                        confirmButtonText: "تم"
                                    });
                                }
                            }

                        });
        }




    
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url();?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>

<script>
 $('.skin-minimal .i-check input').iCheck({
     checkboxClass: 'icheckbox_minimal',
     radioClass: 'iradio_minimal',
     increaseArea: '20%'
 });
 
 $('.skin-square .i-check input').iCheck({
     checkboxClass: 'icheckbox_square-green',
     radioClass: 'iradio_square-green'
 });
 
 
 $('.skin-flat .i-check input').iCheck({
     checkboxClass: 'icheckbox_flat-red',
     radioClass: 'iradio_flat-red'
 });
 
 $('.skin-line .i-check input').each(function () {
     var self = $(this),
             label = self.next(),
             label_text = label.text();
 
     label.remove();
     self.iCheck({
         checkboxClass: 'icheckbox_line-blue',
         radioClass: 'iradio_line-blue',
         insert: '<div class="icheck_line-icon"></div>' + label_text
     });
 });
 
</script>


<script>
    function load_add_morfaq(esal_num) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/esalat/Esalat_estlam/show_attach_esal',
            data: {esal_num: esal_num},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#my_morfaq_add").html(html);

            }
        });

    }

</script>



