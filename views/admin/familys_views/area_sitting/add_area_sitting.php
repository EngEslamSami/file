<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            <div class="panel-body">
            <?php echo form_open('family_controllers/Setting/AreaSetting')?>
              <div class="form-group col-sm-12">
                  <br>
                    <div class="col-sm-6">
                        <label class="label label-green  ">فئة الأضافة </label>
                        <input tabindex="11" type="radio" id="square-radio-1" name="type" data-validation="required"  value="1" onclick="get_form('1');">
                        <label for="square-radio-1">منطقة </label>
                        <input tabindex="11" type="radio" id="square-radio-1" name="type" data-validation="required" value="2" onclick="get_form('2');">
                        <label for="square-radio-1">محافظة </label>
                        <input tabindex="11" type="radio" id="square-radio-1" name="type" data-validation="required" value="3" onclick="get_form('3');">
                        <label for="square-radio-1">مركز</label>
                        <input tabindex="11" type="radio" id="square-radio-1" name="type" data-validation="required" value="4" onclick="get_form('4');">
                        <label for="square-radio-1">الحي</label>
                    </div>
              </div>

       <div id="optiont">
            <div class="form-group col-sm-12">

                <div class="col-sm-6">
                    <label class="label label-green  half">إسم المنطقة</label>
                    <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">إسم المحافظة</label>
                    <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
                </div>

            </div>
            <div class="form-group col-sm-12">

                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم المركز</label>
                        <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم الحي</label>
                        <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
                    </div>

                </div>
       </div>
                <div class="col-md-12">
                    <button type="submit"  name="ADD" class="btn btn-blue btn-next"  value="ADD" >
                        حفظ
                    </button>
                </div>

       <?php echo form_close()?>

         <?php if (isset($data_table) && !empty($data_table) && $data_table!=null){?>
             <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                 <tr>
                     <th >#</th>
                     <th >الاسم </th>
                     <th >فئة الإضافة </th>
                     <th >الإجراء </th>
                 </tr>
                 </thead>
                 <?php $x=0; foreach ($data_table as $row){?>
                 <tr>
                     <td ><?=$x++?></td>
                     <td ><?=$row->title?></td>
                     <td ><?php  $arr_types=array("1"=>"منطقة","2"=>"محافظة","3"=>"مركز","4"=>"الحي");
                        echo $arr_types [$row->type ]?> </td>
                     <td >
                         <a href="<?php echo base_url().'family_controllers/Setting/UpdateAreaSetting/'.$row->id ?>" title="تعديل">
                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                         <span> </span>
                         <a href="<?=base_url()."family_controllers/Setting/DeleteAreaSetting/".$row->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                             <i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                 </tr>
                 <?php }?>
             </table>


         <?php }?>
       </div>
</div>


<script>
    function get_form(type) {

        if(type >0 && type  != '') {
            var dataString = 'form_tupe=' + type ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Setting/AreaSetting',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optiont").html(html);
                }
            });
            return false;
        }
    }
</script>

<!--------------------------------------->
<script>
    function plases(id_main,is_sub) {
        var value_id=$("#"+id_main).val();
        if(value_id) {
            var dataString = 'value_id=' + value_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Setting/AreaSetting',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#'+is_sub).html(html);
                }
            });
            return false;
        }
    }
</script>