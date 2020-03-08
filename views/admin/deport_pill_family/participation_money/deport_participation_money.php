<div class="col-sm-12" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-1" data-toggle="tab">نقدى</a></li>
                <li><a href="#tab-2" data-toggle="tab">شيك</a></li>
                <li><a href="#tab-3" data-toggle="tab">حوالة بنكية</a></li>
                <li><a href="#tab-4" data-toggle="tab">إستقطاع</a></li>
                <li><a href="#tab-5" data-toggle="tab">بنك </a></li>
                <li><a href="#tab-6" data-toggle="tab">شبكة </a></li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content">

                <div class="tab-pane fade in active" id="tab-1">
                    <div class="panel-body">
                           <?php if(isset($pay_1) && !empty($pay_1) && $pay_1 !=null){?>
                               <table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th><input type="checkbox"   onclick="checkAll(this,'pay_1')"></th>
                                       <th>الإسم</th>
                                       <th>القيمة</th>
                                       <th>	إسم الحساب</th>
                                       
                                       <th>إسم البرنامج</th>
                                       <th>الشهر</th>
                                       <th>السنة</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $x=1; foreach ($pay_1 as $row){?>
                                   <tr>
                                       <td><?=$x++;?></td>
                                       <td><input type="checkbox" name="pill[]" value="<?php echo $row->id."-".$row->value ?>" class="pay_1"> </td>
                                       <td><?php echo $row->sponsors_name;?></td>
                                       <td><?=$row->value?></td>
                                       <td><?=$row->title?></td>
                                       
                                       <td><?=$row->program_name?></td>
                                       <td><?=$row->month?></td>
                                       <td><?=$row->year?></td>
                                   </tr>
                                   <?php }?>
                                   </tbody>
                               </table>
                           <?php }else{
                               echo '<div class="alert alert-warning">
                                      <strong> لايوحد قيود للترحيل!</strong> .
                                     </div>';
                           }?>


                        <input type="hidden" name="ADD" value="1" class="pay_1" />
                        <input type="hidden" name="paid_type" value="1" class="pay_1" />
                        <button type="button" onclick="deport('pay_1');" data-toggle="modal" data-target="#modal-lg" class="add btn btn-purple w-md m-b-5">  ترحيل  </button>

                    </div>
                </div>
                <div class="tab-pane fade " id="tab-2">
                    <div class="panel-body">
                           <?php if(isset($pay_2) && !empty($pay_2) && $pay_2 !=null){?>
                               <table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th><input type="checkbox"   onclick="checkAll(this,'pay_2')"></th>
                                       <th>الإسم</th>
                                      
                                       <th>القيمة</th>
                                       <th>	إسم الحساب</th>
                                       
                                       <th>إسم البرنامج</th>
                                       <th>الشهر</th>
                                       <th>السنة</th>

                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $x=1; foreach ($pay_2 as $row){?>
                                   <tr>
                                       <td><?=$x++;?></td>
                                       <td><input type="checkbox" name="pill[]" value="<?php echo $row->id."-".$row->value ?>" class="pay_2"> </td>
                                       <td><?php echo $row->sponsors_name;?></td>
                                       <td><?=$row->value?></td>
                                       <td><?=$row->title?></td>
                                       
                                       <td><?=$row->program_name?></td>
                                       <td><?=$row->month?></td>
                                       <td><?=$row->year?></td>
                                   </tr>
                                   <?php }?>
                                   </tbody>
                               </table>
                           <?php }else{
                               echo '<div class="alert alert-warning">
                                      <strong> لايوحد قيود للترحيل!</strong> .
                                     </div>';
                           }?>

                        <input type="hidden" name="ADD" value="1" class="pay_2" />
                        <input type="hidden" name="paid_type" value="1" class="pay_2" />
                        <button type="button" onclick="deport('pay_2');" data-toggle="modal" data-target="#modal-lg" class="add btn btn-purple w-md m-b-5">  ترحيل  </button>

                    </div>
                </div>
                <div class="tab-pane fade " id="tab-3">
                    <div class="panel-body">
                           <?php if(isset($pay_3) && !empty($pay_3) && $pay_3 !=null){?>
                               <table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th><input type="checkbox"   onclick="checkAll(this,'pay_3')"></th>
                                       <th>الإسم</th>
                                      
                                       <th>القيمة</th>
                                       <th>	إسم الحساب</th>
                                       
                                       <th>إسم البرنامج</th>
                                       <th>الشهر</th>
                                       <th>السنة</th>

                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $x=1; foreach ($pay_3 as $row){?>
                                   <tr>
                                       <td><?=$x++;?></td>
                                       <td><input type="checkbox" name="pill[]" value="<?php echo $row->id."-".$row->value ?>" class="pay_3"> </td>
                                       <td><?php echo $row->sponsors_name;?></td>
                                       <td><?=$row->value?></td>
                                       <td><?=$row->title?></td>
                                       
                                       <td><?=$row->program_name?></td>
                                       <td><?=$row->month?></td>
                                       <td><?=$row->year?></td>
                                   </tr>
                                   <?php }?>
                                   </tbody>
                               </table>
                           <?php }else{
                               echo '<div class="alert alert-warning">
                                      <strong> لايوحد قيود للترحيل!</strong> .
                                     </div>';
                           }?>

                     <input type="hidden" name="ADD" value="1" class="pay_3" />
                     <input type="hidden" name="paid_type" value="1" class="pay_3" />
                     <button type="button" onclick="deport('pay_3');" data-toggle="modal" data-target="#modal-lg" class="add btn btn-purple w-md m-b-5">  ترحيل  </button>
                    </div>
                </div>
                <div class="tab-pane fade " id="tab-4">
                    <div class="panel-body">
                           <?php if(isset($pay_4) && !empty($pay_4) && $pay_4 !=null){?>
                               <table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th><input type="checkbox"   onclick="checkAll(this,'pay_4')"></th>
                                       <th>الإسم</th>
                                      
                                       <th>القيمة</th>
                                       <th>	إسم الحساب</th>
                                       
                                       <th>إسم البرنامج</th>
                                       <th>الشهر</th>
                                       <th>السنة</th>

                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $x=1; foreach ($pay_4 as $row){?>
                                   <tr>
                                       <td><?=$x++;?></td>
                                       <td><input type="checkbox" name="pill[]" value="<?php echo $row->id."-".$row->value ?>" class="pay_4"> </td>
                                       <td><?php echo $row->sponsors_name;?></td>
                                       <td><?=$row->value?></td>
                                       <td><?=$row->title?></td>
                                       
                                       <td><?=$row->program_name?></td>
                                       <td><?=$row->month?></td>
                                       <td><?=$row->year?></td>
                                   </tr>
                                   <?php }?>
                                   </tbody>
                               </table>
                           <?php }else{
                               echo '<div class="alert alert-warning">
                                      <strong> لايوحد قيود للترحيل!</strong> .
                                     </div>';
                           }?>


                     <input type="hidden" name="ADD" value="1" class="pay_4" />
                     <input type="hidden" name="paid_type" value="1" class="pay_4" />
                     <button type="button" onclick="deport('pay_4');" data-toggle="modal" data-target="#modal-lg" class="add btn btn-purple w-md m-b-5">  ترحيل  </button>
                    </div>
                </div>
                <div class="tab-pane fade " id="tab-5">
                    <div class="panel-body">
                           <?php if(isset($pay_5) && !empty($pay_5) && $pay_5 !=null){?>
                               <table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th><input type="checkbox"   onclick="checkAll(this,'pay_5')"></th>
                                       <th>الإسم</th>
                                      
                                       <th>القيمة</th>
                                       <th>	إسم الحساب</th>
                                       
                                       <th>إسم البرنامج</th>
                                       <th>الشهر</th>
                                       <th>السنة</th>

                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $x=1; foreach ($pay_5 as $row){?>
                                   <tr>
                                       <td><?=$x++;?></td>
                                       <td><input type="checkbox" name="pill[]" value="<?php echo $row->id."-".$row->value ?>" class="pay_4"> </td>
                                       <td><?php echo $row->sponsors_name;?></td>
                                       <td><?=$row->value?></td>
                                       <td><?=$row->title?></td>
                                       
                                       <td><?=$row->program_name?></td>
                                       <td><?=$row->month?></td>
                                       <td><?=$row->year?></td>
                                   </tr>
                                   <?php }?>
                                   </tbody>
                               </table>
                           <?php }else{
                               echo '<div class="alert alert-warning">
                                      <strong> لايوحد قيود للترحيل!</strong> .
                                     </div>';
                           }?>

                     <input type="hidden" name="ADD" value="1" class="pay_5" />
                     <input type="hidden" name="paid_type" value="1" class="pay_5" />
                     <button type="button" onclick="deport('pay_5');" data-toggle="modal" data-target="#modal-lg" class="add btn btn-purple w-md m-b-5">  ترحيل  </button>
                    </div>
                </div>
                <div class="tab-pane fade " id="tab-6">
                    <div class="panel-body">
                           <?php if(isset($pay_6) && !empty($pay_6) && $pay_6 !=null){?>
                               <table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th><input type="checkbox"   onclick="checkAll(this,'pay_6')"></th>
                                       <th>الإسم</th>
                                      
                                       <th>القيمة</th>
                                       <th>	إسم الحساب</th>
                                       
                                       <th>إسم البرنامج</th>
                                       <th>الشهر</th>
                                       <th>السنة</th>

                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $x=1; foreach ($pay_6 as $row){?>
                                   <tr>
                                       <td><?=$x++;?></td>
                                       <td><input type="checkbox" name="pill[]" value="<?php echo $row->id."-".$row->value ?>" class="pay_6"> </td>
                                       <td><?php echo $row->sponsors_name;?></td>
                                       <td><?=$row->value?></td>
                                       <td><?=$row->title?></td>
                                       
                                       <td><?=$row->program_name?></td>
                                       <td><?=$row->month?></td>
                                       <td><?=$row->year?></td>
                                   </tr>
                                   <?php }?>
                                   </tbody>
                               </table>
                           <?php }else{
                               echo '<div class="alert alert-warning">
                                      <strong> لايوحد قيود للترحيل!</strong> .
                                     </div>';
                           }?>


                     <input type="hidden" name="ADD" value="1" class="pay_6" />
                     <input type="hidden" name="paid_type" value="1" class="pay_6" />
                     <button type="button" onclick="deport('pay_6');" data-toggle="modal" data-target="#modal-lg" class="add btn btn-purple w-md m-b-5">  ترحيل  </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="modal fade modal-primary" id="modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">ترحيل السندات </h1>
            </div>
            <?php echo  form_open_multipart('DeportPillForFamily/DeportQuedParticipationMoney') ?>
            <div class="modal-body col-sm-12" >

                <div id="option">

                    <div class="alert alert-danger">
                        <strong>يجب إختيار سند واحد على الاقل!</strong> .
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق </button>
                <button  type="submit" id="submit_button"   name="DEPORT" value="DEPORT" class="btn btn-success disabled">ترحيل </button>
            </div>
            <?php echo form_close();?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

    function deport(name_form){
        var form_name =  "."+name_form;
        var dataString = $(form_name).serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>DeportPillForFamily/DeportParticipationMoney',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option").html(html);
            }
        });
        return false;
    }
    //===================================================
    function checkAll(bx,class_name) {
        var cbs = document.getElementsByClassName(class_name);
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
    //====================================================
    function get_account(){
        var madeen_num =  $("#madeen_num").val();
        var dayen_num = $("#dayen_num").val();
        var v_value = $("#value").val();

        if (madeen_num != 0 && madeen_num !="" && dayen_num != 0 && dayen_num !="" ){

            var dataString = "dayen_num="+dayen_num+"&madeen_num="+madeen_num +"&value="+v_value;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>DeportPillForFamily/DeportParticipationMoney',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#option_1").html(html);
                }
            });
            return false;
        }else{
            return false;
        }

    }
    //====================================================
</script>

