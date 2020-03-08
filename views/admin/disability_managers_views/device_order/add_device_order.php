<?php if(isset($result_id) && !empty($result_id) && $result_id!=null ):
    $out['input']='UPDATE';
    $out['input_title']='تعديل ';
    $out['disable']='';
    $out['person_id']=$result_id[0]->person_id_fk;
   // $out['heddin_input']='<input type="hidden" name="person" value="'.$result_id[0]->person_id_fk.'">';
    $out['heddin_input']="";
    $out["order_date"]=$result_id[0]->order_date;
    $out['form']='disability_managers/DeviceOrders/UpdateDeviceOrders/'.$result_id[0]->order_num	;
else:
    $out['person_id']="";
    $out['heddin_input']="";
    $out["order_date"]="";
    $out['disable']='';
    $out['input']='INSERT';
    $out['input_title']='حفظ ';
    $out['form']='disability_managers/DeviceOrders';
endif?>
<div class="col-sm-12" >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open_multipart($out['form'])?>

            <div class="col-sm-12 form-group">
                <div class="col-sm-6">
                    <label class="label label-green  half">إسم المستفيد </label>
                    <input type="text" name="order_date" class="form-control half input-style date_melady " placeholder="شهر / يوم / سنة " data-validation="required" value="<?=$out["order_date"]?>">
                </div>

                <div class="col-sm-6">
                <label class="label label-green  half">إسم المستفيد </label>
                  <select  name="person" id="person" onchange="get_data();" <?=$out['disable']?>  class="selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                      <option value="">إختر</option>
                      <?php if(isset($all_person) && !empty($all_person) && $all_person!=null){
                            foreach ($all_person as $row){
                              $selected=""; if($row->id == $out['person_id']){$selected="selected";}  ?>
                          <option value="<?=$row->id?>"  <?=$selected?> ><?=$row->p_name?></option>
                      <?php }
                            }else{?>
                          <option value=""> لا يوجد أشخاص </option>
                      <?php }?>
                  </select>
                  <?=$out['heddin_input']?>
              </div>


            </div>

            <div  id="option">

                <?php if(isset($result)){?>
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">الاسم </label>
                        <input type="text" value="<?=$result["p_name"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">رقم السجل المدنى </label>
                        <input type="text" value="<?=$result["p_national_num"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">تاريخ الميلاد  </label>
                        <input type="text" value="<?=$result["p_date_birth"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">رقم الجوال </label>
                        <input type="text" value="<?=$result["p_mob"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">فئة الاعاقة </label>
                        <input type="text" value="<?=$result["disability_title"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">رقم المستفيد </label>
                        <input type="text" value="<?=$result["p_num"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                </div>
                <?php }?>

               <?php if(isset($result_id) && !empty($result_id) && $result_id!=null){?>
                  <table class="table table-bordered ">
                      <thead>
                      <tr>
                          <th>إسم الجهاز</th>
                          <th>العدد</th>
                          <th><i class="fa fa-plus-square" aria-hidden="true" onclick="add_row_up();"></i></th>
                      </tr>
                      </thead>
                      <tbody id="add_device">
                      <?php $x=1; foreach($result_id as $row_id){
                               if($row_id->approved_device == 0){
                                   $read_only=""; $dis_abled="";
                               }else{
                                   $read_only="readonly"; $dis_abled="disabled";
                                   echo '';
                               }?>
                      <tr>

                          <td> <select name="divice[]" class="form-control" <?=$dis_abled?>  data-validation="required">
                                  <option value=""> أختر </option>
                                  <?php if(isset($all_device) && !empty($all_device) && $all_device!=null){
                                      foreach ($all_device as $row_device){
                                          $selected=""; if($row_device->id == $row_id->device_id_fk){$selected="selected";}    ?>
                                          <option value="<?=$row_device->id?>"  <?=$selected?> > <?=$row_device->title?></option>
                                      <?php  }
                                  }else{
                                      echo '<option value=""> لا يوجد أجهزة </option>';
                                  }?>
                              </select>
                          </td>
                          <td> <input type="number" name="numbers[]" value="<?=$row_id->amount_device?>" <?=$read_only?>  class="form-control"  data-validation="required">  </td>
                          <td>
                           <?php if($row_id->approved_device == 0){?>
                               <?php if(sizeof($result_id) == 1){?>
                                   <a href="<?php echo base_url()."disability_managers/DeviceOrders/DeleteDeviceOrders/".$row_id->order_num?>" onclick="return confirm('هل انت متأكد من عملية حذف الطلب ؟');" >
                                       <i class="fa fa-trash button" aria-hidden="true"></i></a>
                               <?php }else{?>
                              <a href="<?php echo base_url()."disability_managers/DeviceOrders/DeleteDevice/".$row_id->order_id."/".$row_id->order_num?>" onclick="return confirm('هل انت متأكد من عملية حذف الجهاز ؟');" >
                                  <i class="fa fa-trash button" aria-hidden="true"></i></a>
                               <?php }?>
                           <?php }else{ echo "لا يمكنك الحذف  ";}?>
                          </td>
                      </tr>
                      <?php  $x++;}?>
                      </tbody>
                  </table>
               <?php }?>
            </div>
            <div class="col-sm-12">
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success ">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
            </div>
            <?php echo form_close()?>
            <?php if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>م</th>
                    <th>رقم الطلب  </th>
                    <th> تاريخ الطلب  </th>
                    <th>إسم المستفيد </th>
                    <th>رقم المستفيد </th>
                    <th> تفاصيل  </th>
                    <th> التحقق من الأهلية   </th>
                    <th> الاجراء </th>
                </tr>
                </thead>
                <tbody>
                <?php $x=1;foreach ($data_table as $row){?>
                <tr>
                    <td><?=$x++?></td>
                    <td><?=$row->order_num?></td>
                    <td><?=$row->order_date?></td>
                    <td><?=$row->p_name?></td>
                    <td><?=$row->p_num?></td>
                    <td><a  data-toggle="modal" data-target="#myModal<?=$row->order_num?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>

                    <td><a  data-toggle="modal" data-target="#Modal<?=$row->order_num?>"><i class="fa fa-id-card-o" aria-hidden="true"></i></a></td>

                    <td>
                        <?php if($row->approved_device == 0){?>
                        <a href="<?php echo base_url()."disability_managers/DeviceOrders/UpdateDeviceOrders/".$row->order_num?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <?php }?>
                        <a href="<?php echo base_url()."disability_managers/DeviceOrders/DeleteDeviceOrders/".$row->order_num?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                            <i class="fa fa-trash button" aria-hidden="true"></i></a>
                        <a href="<?php echo base_url()."disability_managers/DeviceOrders/PrintOrder/".$row->order_num?>">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>

                </tr>
                <?php }?>
                </tbody>
            </table>
                <?php $x=1;foreach ($data_table as $row){?>
<!-- Modal ---------------------------------------------------------->
<div class="modal fade" id="myModal<?=$row->order_num?>" role="dialog">
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close " data-dismiss="modal">&times;</button>
            <h4 class="modal-title">تفاصيل الطلب </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">رقم الطلب </label>
                        <input type="text" value="<?=$row->order_num?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">تاريخ الطلب  </label>
                        <input type="text" value="<?=$row->order_date?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم المستفيد </label>
                        <input type="text" value="<?=$row->p_name?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">رقم المستفيد </label>
                        <input type="text" value="<?=$row->p_num?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>إسم الجهاز</th>
                            <th>العدد</th>
                        </tr>
                        </thead>
                        <tbody id="add_device">
                        <?php foreach($row->sub as $row_id){?>
                            <tr>
                                <td><?=$row_id->title?></td>
                                <td> <?=$row_id->amount_device?>  </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        </div>
    </div>

</div>
</div>
<!-- Modal ---------------------------------------------------------->


<!-- Modal ---------------------------------------------------------->
<div class="modal fade" id="Modal<?=$row->order_num?>" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close " data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التحقق من الاهلية  </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        <div class="col-sm-6">
                            <label class="label label-green  half">رقم الطلب </label>
                            <input type="text" value="<?=$row->order_num?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                        </div>
                        <div class="col-sm-6">
                            <label class="label label-green  half">تاريخ الطلب  </label>
                            <input type="text" value="<?=$row->order_date?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="col-sm-6">
                            <label class="label label-green  half">إسم المستفيد  </label>
                            <input type="text" value="<?=$row->p_name?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                        </div>
                        <div class="col-sm-6">
                            <label class="label label-green  half">رقم المستفيد </label>
                            <input type="text" value="<?=$row->p_num?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <div class="col-sm-9">
                            <label class="label label-green  half"> المتقدم بحاجة الى الدعم </label>
                            <input  type="radio" <?php if($row->need_suport == 1){ echo 'checked';}?>  onclick="get_need_suport('<?=$row->order_num?>','1');" tabindex="11" name="need_suport" id="square-radio-1">
                            <label for="square-radio-1">نعم</label>
                            <input  type="radio" <?php if($row->need_suport == 2){ echo 'checked';}?>  onclick="get_need_suport('<?=$row->order_num?>','2');" tabindex="11" name="need_suport" id="square-radio-1">
                            <label for="square-radio-1">لا</label>
                        </div>

                    </div>

                    <div class="form-group col-sm-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>إسم الجهاز</th>
                                <th>العدد</th>
                                <th>الجهاز متوفر</th>
                                <th>المركز الطبى </th>
                            </tr>
                            </thead>
                            <tbody id="add_device">
                            <?php foreach($row->sub as $row_id){?>
                                <tr>
                                    <td><?=$row_id->title?></td>
                                    <td><?=$row_id->amount_device?>  </td>
                                    <td>   <?php $arr_yes_no=array("إختر","نعم"," لا ")?>
                                            <select class="form-control" id="approve-<?=$row_id->order_id?>" onchange="get_approved_device('<?=$row_id->order_id?>');" >
                                                <?php foreach ($arr_yes_no as $key=>$value){
                                                    $selected="";if($key == $row_id->approved_device){$selected="selected";}?>
                                                    <option value="<?=$key?>" <?=$selected?>> <?=$value?></option>
                                                <?php }?>
                                            </select>
                                    </td>
                                    <td>
                                       <select class="form-control " <?php if($row_id->approved_device !=2){echo 'disabled=""';}?> id="select-<?=$row_id->order_id?>" onchange="set_medical_company('<?=$row_id->order_id?>');">
                                           <option value="0"> أختر </option>
                                           <?php if(isset($all_medical) && !empty($all_medical) && $all_medical!=null){
                                               foreach ($all_medical as $row_device){
                                                   $selected="";if($row_device->id == $row_id->medical_company_id_fk){$selected="selected";}?>
                                                   <option value="<?=$row_device->id?>"  <?=$selected?> > <?=$row_device->title?></option>
                                               <?php  }
                                           }else{
                                               echo '<option value=""> لا يوجد مجمعات طبية  </option>';
                                           }?>
                                       </select>

                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">حفظ</button>
            </div>
        </div>

    </div>
</div>
<!-- Modal ---------------------------------------------------------->

                <?php }?>
            <?php }?>

        </div>

        </div>
    </div>



<script>
   // get_data();
    function get_data(){
       var dataString =  "person_code=" + $("#person").val();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>disability_managers/DeviceOrders/PageLoad',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option").html(html);
            }
        });
    }
</script>

<script>
    function add_row_up() {
        var dataString = "get_row="+ "1";

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>disability_managers/DeviceOrders/PageLoad',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){

                $("#add_device").append(html);
            }
        });
    }
</script>


<script>

    function get_need_suport(order_num,value){
        var dataString =  "order_num=" + order_num +"&need_suport_value=" + value ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>disability_managers/DeviceOrders/PageLoad',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
            }
        });
    }
    //======================================
    function get_approved_device(order_id){

        var approved_value=$("#approve-"+order_id).val();
        var dataString =  "order_id=" + order_id +"&approved_device=" + approved_value ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>disability_managers/DeviceOrders/PageLoad',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                if(approved_value == "2"){
                    $("#select-"+order_id).removeAttr("disabled");
                }else {
                    $("#select-"+order_id).attr("disabled","disabled");
                }
            }
        });
    }
    //======================================
    function set_medical_company(order_id){

        var medical_compan=$("#select-"+order_id).val();
         if(medical_compan != 0){
             var dataString =  "order_id=" + order_id +"&medical_company_id_fk=" + medical_compan ;
             $.ajax({
                 type:'post',
                 url: '<?php echo base_url() ?>disability_managers/DeviceOrders/PageLoad',
                 data:dataString,
                 dataType: 'html',
                 cache:false,
                 success: function(html){
                 }
             });
         }// end if
    }
</script>
