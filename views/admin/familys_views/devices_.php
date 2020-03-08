<style>
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
<div class="col-sm-12  " >
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $header_title;?>
            <?php if($basic_data_family["suspend"] == 4 ) { ?>
<button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
<span class="">رقم ملف الأسرة</span>
</button>
<button  class="btn btn-success  btn-sm progress-button ">
 <span class="">
 <?php 
              echo $basic_data_family["file_num"];    
            ?>
 </span>
 </button>
 <?php } ?>
            
             <?php
              /* if($basic_data_family["suspend"] == 4){
                   echo  "/"."رقم الملف :".$basic_data_family["file_num"] ;
                   } */ ?>
            </h3>
		</div>
        <?php echo form_open('family_controllers/Family/devices/'.$mother_national_num,array('id'=>'form'))?>
		<div class="panel-body">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للأب <strong class="astric">*</strong> </label>
                    <input type="number" class="form-control half input-style" 
                    value="<?php if(!empty($father_national_card))
                           { echo $father_national_card;}?>" readonly="readonly" />
                </div>
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half"> إسم الأب <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style"
                     value="<?php  if(!empty($father_name))
                          {echo $father_name;} ?>" readonly="readonly" />
                </div>

            </div>

                <table class="table table-bordered" id="resultTable">
                    <thead>
                    <th>م</th>
                    <th style="text-align: center">النوع</th>
                    <th style="text-align: center">العدد</th>
                    <th style="text-align: center">الحالة</th>
                    <th style="text-align: center" >ملاحظات</th>
                    <th style="text-align: center">الإجراء</th>
                    </thead>
                    <tbody>
                    <?php
                    $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                    if(isset($result) && $result!=null){
                        $count=1;
                    foreach($result as $row){ ?>
                        <tr>
                            <td><?php echo $count;?></td>
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
                            <td colspan="5" style="text-align: center;color: red"> لاتوجد بيانات</td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            <div class="col-md-12">
                <div id=""></div>
                <div class="form-group col-sm-4">
                    <input type="button"   onclick="add_row(),load()" name="add" class="btn btn-blue btn-next"  value="إضافة " />
                </div>
                <div class="form-group col-sm-4">
                        <input type="submit"  name="add" class="btn btn-blue btn-next"  value="حفظ " />
             </div>


            </div>
             <br>



        </div>
        <?php echo form_close()?>
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
        $('#disp').hide();
        $('#resultTable').append('<tr class="child"><td>#</td><td><select  name="d_house_device_id_fk[]" class="option"  data-validation="required" aria-required="true"> <option value="">اختر</option></select>' +
            '</td>  <td><select name="d_count[]"> <option>اختر</option>' +
            '<option value = 1> 1</option><option value = 2> 2</option><option value = 3> 3</option> <option value = 4> 4</option> <option value = 5> 5</option>  </select></td> ' +
            '<td><select  name="d_house_device_status_id_fk[]"  data-validation="required" aria-required="true"><option value="">اختر</option> <option value="1">جيد</option>  <option value="2">متوسط</option><option value="3">غير جيد</option><option value="4">يحتاج</option></select></td> <td><input type="text" name="d_note[]" data-validation="required" ></td>' +
            '<td>الاجراء</td></tr>');
    }




</script>
