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
			<h3 class="panel-title">إحتياجات المنزل</h3>
		</div>
        <?php echo form_open('family_controllers/Family/home_needs/'.$mother_national_num,array('id'=>'form'))?>
		<div class="panel-body">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
                    <input type="number" class="form-control half input-style" value="<?php if(!empty($mothers_data[0]->mother_national_num_fk)){ echo$mothers_data[0]->mother_national_num_fk;}?>" readonly="readonly" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> إسم الأم <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style" value="<?php  if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;} ?>" readonly="readonly" />
                </div>

            </div>
            <?php if(isset($result) && $result!=null): ?>
                <table class="table table-bordered" id="tab_logic">
                    <thead>
                    <th>م</th>
                    <th style="text-align: center">نوع الجهاز</th>
                    <th style="text-align: center">العدد</th>
                    <th style="text-align: center" >ملاحظات</th>
                    <th style="text-align: center">الإجراء</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach($result as $row): ?>
                        <tr>
                            <td>#</td>
                            <td><?php echo $row->name; ?> </td>
                            <td><?php echo $row->h_count?></td>
                            <td><?php echo $row->h_note?></td>
                            <td>
                                <a href="#"  data-toggle="modal" data-target="#modal-delete<?php echo $row->home_needs_id;?>"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                <div class="modal" id="modal-delete<?php echo$row->home_needs_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
                                                <a  href="<?php  echo base_url()?>family_controllers/Family/delete_home_needs/<?php echo $row->home_needs_id;?>/<?php echo$mother_national_num;?>"> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif?>
             <br>
            <div class="col-md-12">
                <div class="form-group col-sm-8">
                    <label class="label label-green  half">عدد الإحتياجات <strong class="astric">*</strong></label>
                    <input type='text' id="device_num" placeholder="الرجاء إدخال في هذا الحقل ارقام فقط" class="form-control half" data-validation="required" onkeypress='validate(event)' onkeyup="lood($('#device_num').val());" />
                </div>
                <div class="col-lg-6 input-grup">
                    <div class="alert alert-success">
                        <strong>من فضلك</strong>  الرجاء إدخال عدد الإحتياجات
                    </div>
                </div>
            </div>
            <div id="optionearea1"></div>
            <div class="col-md-12">
                <input type="hidden" name="max" id="max" />

                <div class="form-group col-sm-4">
                    <input type="submit"  name="add" class="btn btn-blue btn-next"  value="حفظ " />
                </div>

            </div>
        </div>
        <?php echo form_close()?>
	</div>
</div>

<script>
    function validate(evt) {
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
	function lood(num){
		if(num>0 && num != '')
		{
			var id = num;
			var dataString = 'num=' + id ;
		$.ajax({
				type:'post',
				url: '<?php echo base_url() ?>family_controllers/Family/home_needs/<?php echo$mother_national_num;?>',
				data:dataString,
				dataType: 'html',
				cache:false,
				success: function(html){

					$("#optionearea1").html(html);
				}
			});
			return false;
		}
	}
</script>

