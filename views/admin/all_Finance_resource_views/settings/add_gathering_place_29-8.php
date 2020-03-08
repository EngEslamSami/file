<style type="text/css">
     .top-label {
    font-size: 13px;
 }
 
 .inner-heading-green{
    background-color: #5eab5e;
    padding: 10px;
    color: #fff;
}

</style>

<div class="col-sm-12  col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/add_gathering_place');?>
			<div class="col-sm-12 col-xs-12">

                <div class="col-sm-1 col-xs-12"></div>
                <div class="col-sm-10 col-xs-12">
                    <button type="button" onclick="add_row()"
                     class="btn btn-success btn-next"/><i class="fa fa-plus"></i> إضافة </button><br>
                    <table class="table table-striped table-bordered"   style="display: none" id="mytable">
                        <thead>
                        <tr class="info">
                            <th>جهة التحصيل</th>
                            <th>الإدارة</th>
                            <th>الأقسام</th>
                            <th>الموظفين</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="resultTable">

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1 col-xs-12"></div>
            </div>

             <div class="col-sm-12">
             <div class="col-sm-5"></div>
             <div class="col-sm-3">
                 <input type="submit" name="add" id="saves"  style="display: none" class="btn btn-blue btn-close" value="حفظ"/>
             </div>
             <div class="col-sm-4"></div>
			</div>
            <?php  echo form_close()?>

  <br><br>
            <div class="col-sm-12 " ><br>
                <?php if(!empty($records) && isset($records)){ ?>
                <table   class="table table-striped table-bordered "   >
                    <thead>
                    <tr class="info">
                        <th class="text-center" >م </th>
                        <th class="text-center">جهة التحصيل</th>
                        <th class="text-center">الإدارة</th>
                        <th class="text-center">الموظفين</th>
                        <th class="text-center" > الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; foreach($records as $record){ ?>
                        <tr>
                         <td style="text-align: center!important;" rowspan="<?php if(!empty($record->sub)){ echo sizeof($record->sub); } ?>"><?php echo $count; ?></td>
                        <td style="text-align: center!important;" rowspan="<?php if(!empty($record->sub)){ echo sizeof($record->sub); } ?>"><?php echo $record->gathering_place_title; ?></td>

                            <?php if(!empty($record->sub)){ foreach ($record->sub as $row){?>
                        <td style="text-align: center!important;"><?php echo $row->depart_name; ?></td>
                        <td style="text-align: center!important;"><?php echo $row->empolyee_name; ?></td>
                        <td style="text-align: center!important;">
                        <!--<a href="#"  data-toggle="modal" data-target="#modal-update<?php echo $row->id;?>"
                           onclick="getUpdateForm(<?php echo $row->id;?>)">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>-->
                        <a href=" <?php echo  base_url('').'all_Finance_resource/settings/Finance_resource_settings/Delete_gathering_place/'.$row->id."" ?>"
                           onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                       </td>
                    </tr>
                     <?php }} ?>
                        <!------------------------------------------------------------------------------------->
             <!--           <div class="modal" id="modal-update<?php /*echo $record->id;*/?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 70%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                    </div>
                                    <div class="modal-body" id="myUpdateForm<?php /*echo $record->id;*/?>"></div>
                                    <div class="modal-footer" style="display: inline-block;width: 100%">
                                        <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق </button>
                                    </div>
                                </div>
                            </div>
                        </div>
-->
                        <!------------------------------------------------------------------------------------->
                    <?php } ?>

                    </tbody>
                </table>


                <?php } ?>
            </div>
            

       </div>
   </div>


</div>

<script>
function add_row(){
    $("#mytable").show();
    var x = document.getElementById('resultTable');
   var length = x.rows.length + 1;

         var dataString   ='length=' + length   ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/get_data',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#resultTable").append(html);
                    $('#saves').show();
                  // get_new_option(2);
                }
            });

     }
   //-----------------------------------------------

</script>

<script>
    function getUpdateForm(update_id) {
        if( update_id !='' ){
            var dataString = 'update_id=' + update_id ;
            alert(dataString);
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/UpdateForm',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#myUpdateForm" + update_id).html(html);
                }
            });
        }
    }

</script>

