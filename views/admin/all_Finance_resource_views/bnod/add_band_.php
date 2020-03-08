<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?=$title?></h4>
        </div>
    </div>
    <div class="panel-body">

        <div class="form-group col-sm-12">
            <br>
            <div class="col-sm-6">
                <label class="label label-green  ">فئة الأضافة </label>
                <input tabindex="11" type="radio" id="square-radio-1" class="type" name="type" data-validation="required"  value="1" onclick="make_disable('1');">
                <label for="square-radio-1">نوع الايصال </label>
                <input tabindex="11" type="radio" id="square-radio-1"  class="type" name="type" data-validation="required" value="2" onclick="make_disable('2');">
                <label for="square-radio-1">نوع الايراد - التبرع </label>
                <input tabindex="11" type="radio" id="square-radio-1"  class="type" name="type" data-validation="required" value="3" onclick="make_disable('3');">
                <label for="square-radio-1">الفئه</label>
                <input tabindex="11" type="radio" id="square-radio-1" class="type" name="type" data-validation="required" value="4" onclick="make_disable('4');">
                <label for="square-radio-1">البند</label>
                <span class="type22" style="color:red; display: none;"> هذا الحقل مطلوب</span>
            </div>
        </div>

        <div id="optiont">
            <div class="form-group col-sm-12">

                <div class="col-sm-6">
                    <label class="label label-green  half">نوع الايصال</label>
                    <select class="form-control half input-style"disabled id="select1"onchange="get_option($(this).val(),2);">
                        <option value="">اختر</option>
                        <?php
                        if(isset($records)&&!empty($records)){

                         foreach ($records as $row){
                       ?>


                      <option value="<?php echo $row->id;?>" <?php if($row->CountChilds>3) echo 'disabled';?>><?php echo $row->name;?></option>
                        <?php } } ?>
                    </select>
                    <span class="select1" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">نوع الايراد - التبرع</label>
                    <select class="form-control half input-style"disabled id="select2" onchange="get_option($(this).val(),3);">
                        <option value="">اختر</option>
                        <?php
                        if(isset($records)&&!empty($records)){

                            foreach ($records as $row){
                                ?>


                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                            <?php } } ?>
                    </select>
                    <span class="select2" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>

            </div>
            <div class="form-group col-sm-12">

                <div class="col-sm-6">
                    <label class="label label-green  half">الفئه </label>
                    <select class="form-control half input-style"disabled id="select3" onchange="get_option($(this).val(),4);">
                        <option value="">اختر</option>
                        <?php
                        if(isset($records)&&!empty($records)){

                            foreach ($records as $row){
                                ?>


                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                            <?php } } ?>
                    </select>
                    <span class="select3" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">البند </label>
                    <select class="form-control half input-style"disabled id="select4">
                        <option value="">اختر</option>
                        <?php
                        if(isset($records)&&!empty($records)){

                            foreach ($records as $row){
                                ?>


                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                            <?php } } ?>
                    </select>
                    <span class="select4" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <button type="button" onclick="save_db();"  name="ADD" class="btn btn-blue btn-next"  value="ADD" >
                حفظ
            </button>
        </div>

<?php
//echo "<pre>";
//print_r($rows);
//echo "</pre>";
//
//?>

        <?php if (isset($rows) && !empty($rows) && $rows!=null){

            ?>

            <table id="" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>فئه الايصال</th>
                    <th>نوع الايراد - التبرع </th>

                    <th>الفئه</th>
                    <th>البنود</th>
                    <th>الاجراء</th>
                </tr>

                </thead>
                <tbody>

                <?php
                $x = 0;
                foreach($rows as $record){$x++; ?>
                    <tr>
                        <td rowspan="<?php if(isset($record->fe2at[0]->bnod)) echo   sizeof($record->fe2at[0]->bnod);?>"><?php echo $x;?></td>
                        <td rowspan="<?php if(isset($record->fe2at[0]->bnod)) echo  sizeof($record->fe2at[0]->bnod);?>" ><?php echo$record->title;?> </td>
                        <td rowspan="<?php if(isset($record->fe2at[0]->bnod)) echo  sizeof($record->fe2at[0]->bnod);?>" > <?php if(!empty($record->erad->title)) echo $record->erad->title;?> </td>
                        <td rowspan="<?php if(isset($record->fe2at[0]->bnod)) echo  sizeof($record->fe2at[0]->bnod);?>" ><?php  if(!empty($record->fe2at[0]->title)) echo $record->fe2at[0]->title;?> </td>

                            <?php
                            if(isset($record->fe2at->bnod)&&!empty($record->fe2at->bnod)){
                                foreach ($record->fe2at[0]->bnod as $row) {?>
                                  <td> <?php echo $row->title; ?></td>
                                    <td>

                                        <a  href="<?php echo base_url();?>all_Finance_resource/bnod/Bnod/delete_record/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                    </td>
                                    </tr>
                <?php } }else{ ?>   <td> </td>
                                <td>

                                    <a  href="<?php echo base_url();?>all_Finance_resource/bnod/Bnod/delete_record/<?php echo $record->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                </td>
                            <?php } }?>



                </tbody>
            </table>


        <?php }?>
    </div>
</div>










<!--------------------------------------->


<script>
    function get_option2(valu,type)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/bnod/Bnod/get_sub_branch",
            data:{valu:valu},
            success:function(d){

              //  alert("تمت الاضافه بنجاح");
              $('#select'+type).html(d);




            }

        });
    }


</script>
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

<script>
    function make_disable(valu)
    {

        switch(valu) {
            case '1':
                $('#select1').attr('disabled',false);
                $('#select2').attr('disabled',true);
                $('#select3').attr('disabled',true);
                $('#select4').attr('disabled',true);
                 break;
            case '2':
                $('#select1').attr('disabled',false);
                $('#select2').attr('disabled',false);
                $('#select3').attr('disabled',true);
                $('#select4').attr('disabled',true);
                break;
            case '3':
                $('#select1').attr('disabled',false);
                $('#select2').attr('disabled',false);
                $('#select3').attr('disabled',false);
                $('#select4').attr('disabled',true);
                break;
            case '4':
                $('#select1').attr('disabled',false);
                $('#select2').attr('disabled',false);
                $('#select3').attr('disabled',false);
                $('#select4').attr('disabled',false);
                break;
            default:
               alert("اختيار خاطيء");
        }


    }



</script>

<script>
    function save_db(valu,type)
    {
      var type=$(".type:radio:checked").val();
        if(type)
        {
             var select1=$('#select1').val();


             var select2=$('#select2').val();
             var select3=$('#select3').val();
             var select4=$('#select4').val();
            var select1_text=$("#select1 option:selected").text();
            var select2_text=$("#select2 option:selected").text();
            var select3_text=$("#select3 option:selected").text();
            var select4_text=$("#select4 option:selected").text();



            if(select1=='')
              {
                  $('.select1').show();
                  return;
              }

            if(select2=='' && $('#select2').prop('disabled')==false)
            {
                $('.select2').show();
                return;
            }
            if(select3=='' && $('#select3').prop('disabled')==false)
            {
                $('.select3').show();
                return;
            }
            if(select4=='' && $('#select4').prop('disabled')==false)
            {
                $('.select4').show();
                return;
            }

            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>all_Finance_resource/bnod/Bnod/add_data",
                data:{select1:select1,select2:select2,select3:select3,select4:select4,type:type,select1_text:select1_text,
                    select2_text:select2_text,select3_text:select3_text,select4_text:select4_text},
                success:function(d){

                    alert("تمت الاضافه بنجاح");




                }

            });
















        }
   else{
            $('.type22').show();
            return;
        }


    }


</script>