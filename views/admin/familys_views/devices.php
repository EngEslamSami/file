<style>
label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error{
        color: #a94442  !important;
        font-size: 15px !important;
        position: absolute !important;
        bottom: -23px !important ;
        right: 50% !important ;
    }
</style>
 <?php
            $this->load->model("familys_models/Register");
            $data_load["basic_data_family"] = $basic_data_family;
            $data_load["mother_num"] = $this->uri->segment(4);
            $data_load["person_account"] = $basic_data_family["person_account"];
            $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
            $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
            $data_load["file_num"] = $basic_data_family["file_num"];
            $data_load["employees"] = $employees;
            $this->load->view('admin/familys_views/drop_down_button', $data_load); ?>
<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $header_title;?>
            
            </h3>
             
        </div>
        <?php // echo form_open('family_controllers/Family/devices/'.$mother_national_num,array('id'=>'form'))?>
        <div class="panel-body">
        <?php echo form_open('family_controllers/Family/devices/'.$mother_national_num,array('id'=>'form'))?>
		<div class="panel-body">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label label-green  half"> رقم السجل المدني للأب  </label>
                    <input type="number" class="form-control half input-style" 
                    value="<?php if(!empty($father_national_card))
                           { echo $father_national_card;}?>" readonly="readonly" />
                </div>
                <div class="form-group col-sm-5 col-xs-12 padding-4">
                    <label class="label label-green  half"> إسم الأب  </label>
                    <input type="text" class="form-control half input-style"
                     value="<?php  if(!empty($father_name))
                          {echo $father_name;} ?>" readonly="readonly" />
                </div>

            </div>

                <table class="table table-bordered" id="resultTable">
                    <thead>
                        <tr class="greentd">
                            <th>م</th>
                               <th style="text-align: center">الفئة</th>
                            <th style="text-align: center">الوصف </th>
                            <th style="text-align: center"> العدد</th>
                            <th style="text-align: center">الحاله</th>
                            <th style="text-align: center">ملاحظات</th>
        
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                    if(isset($result) && $result!=null){
                        $count=1;
                    foreach($result as $row){ ?>
                        <tr>
                            <td><?php echo $count;?></td>
                            <td style="text-align: center"><?php echo $row->main_name; ?> </td>
                            <td style="text-align: center"><?php echo $row->name; ?> </td>

                            <td style="text-align: center"><?php echo $row->d_count?></td>
                            <td style="text-align: center"><?php echo $house_device_status[$row->d_house_device_status_id_fk]?></td>
                            <td style="text-align: center"><?php echo $row->d_note?></td>
                            <td>
                                <a href="#"  data-toggle="modal" data-target="#modal-delete<?php echo $row->devices_id;?>"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                
                                <div class="modal" id="modal-delete<?php echo$row->devices_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p id="text">هل أنت متأكد من الحذف؟</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                                <a  href="<?php  echo base_url()?>family_controllers/Family/delete_device/<?php   echo $row->devices_id ;?>/<?php echo$mother_national_num;?>"> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $count++; }  }else{ ?>
                        <tr id="disp">
                            <td colspan="7" style="text-align: center;color: red"> لاتوجد بيانات</td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            <div class="col-md-12">
                <div class="col-sm-2"></div>
                <div class="form-group col-sm-3">
                   
                    <button type="button" onclick="add_row(),load()" class="btn btn-labeled btn-info " name="add" value="إضافة" style=" font-size: 16px;">
                            <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                    </button>
                </div>
                <div class="form-group col-sm-3">
                        
                     <button type="submit"  class="btn btn-labeled btn-success " name="add" value="حفظ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
             </div>


            </div>
             <br>



        </div>
        <?php echo form_close()?>

        </div>
    </div>
</div>

<script>
	function load(){

        var num ='num';

			var dataString = 'num=' + num ;
			$.ajax({
				type:'post',
				url: '<?php echo base_url() ?>family_controllers/Family/devices_load_page',
				data:dataString,
				dataType: 'html',
				cache:false,
				success: function(html){

					$(".option").html(html);
				}
			});
	}
</script>



<script>

    function add_row()
    {
        var x = document.getElementById('resultTable');



        var len = x.rows.length;

        $('#disp').hide();
        $('#resultTable').append('<tr class="child"><td>#</td><td><select  name="d_house_device_id_fk[]"  id='+len+' class="option form-control"  data-validation="required" aria-required="true" onchange="do_z('+len+');"> <option value="">اختر</option></select>' +
            '</td> <td><select name="sub_cat[]" class="'+len+' form-control"> <option>اختر</option></td>  <td><select name="d_count[]" class="form-control"> <option>اختر</option>' +
            '<option value = 1> 1</option><option value = 2> 2</option><option value = 3> 3</option> <option value = 4> 4</option> <option value = 5> 5</option>  </select></td> ' +
            '<td><select class="form-control" name="d_house_device_status_id_fk[]"  data-validation="required" aria-required="true"><option value="">اختر</option> <option value="1">جيد</option>  <option value="2">متوسط</option><option value="3">غير جيد</option><option value="4">يحتاج</option></select></td> <td><input type="text" class="form-control" name="d_note[]" data-validation="required" ></td>' +
            '<td>الاجراء</td></tr>');
    }




</script>


<script>

    function do_z(val_id)
    {
       var id=$('#'+val_id).val();
        $.ajax({
            type:'post',
            url:"<?php echo  base_url();?>family_controllers/family/fill_select",
            data:{id:id},
            success:function(d){

                var id=$('.'+val_id).html(d);
            }

        });

    }


</script>
