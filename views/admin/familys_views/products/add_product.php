<style>
    .title-top{
        padding: 8px;
        background-color: #1e65a2;
        color: #fff;
        border-radius: 5px;
        font-size: 15px;
    }
    .validation_radio span{

    }
    .top_radio{
        margin-bottom: 15px;
    }
.top_radio input[type=radio] {
    height: 30px;
    width: 30px;
    line-height: 0px;
    vertical-align: middle;

}
.top_radio .radio-inline,.top_radio .checkbox-inline {
    vertical-align: middle;
    font-size: 20px;
    
        padding: 10px;
    border-bottom: 2px solid #eee;
    border-radius: 8px;
}

</style>
<div class="col-xs-12 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?></h3>
        </div>
        <?php
  
        $dis1 ='disabled';
        $dis2 ='disabled';
        if(!empty($result)){
            $type =$result['from_id'];
            if($type ==0){
                $dis1 ='';
                $dis2 ='disabled';
            }elseif($result >0){
                $dis2 ='';
                $dis1 ='disabled';
            }
        }
        ?>

        <div class="panel-body">
        
<div class=" col-xs-12 text-center top_radio">
<label class="checkbox-inline">
<input type="radio" name="section"  onclick="showFunction(1);" <?php if(isset($type)){ if($type ==0){?> checked  <?php } } ?> value="1"/> الفئة </label>
<label class="checkbox-inline">
 <input type="radio" name="section" onclick="showFunction(2);" <?php if(isset($type)){ if($type >0){?> checked  <?php } } ?> value="2"/> الوصف </label>
</div>




            <div class=" col-xs-12">
                <fieldset  class="col-sm-6 col-xs-12"  id="main_section" <?php echo $dis1;?>>
                    <div>
                        <?php
                        if(!empty($result)){
                            echo form_open_multipart("family_controllers/Setting/update_product/".$result['id']);
                        }else{

                            echo form_open_multipart("family_controllers/Setting/add_product");
                        } ?>

                        <h5 class="title-top"> الفئة</h5>
                        <div class="form-group col-sm-14 col-xs-12">
                            <label class="label label-green  half"> الفئة </label>
                            <input type="text"  name="title" value="<?php  if(!empty($result['name'] )&& $type ==0){ echo$result['name']; }?>"   class="form-control half input-style" placeholder="الفئة" data-validation="required" aria-required="true">
                        </div>
                            <input type="hidden"  name="level" value="<?php  if(!empty($result['level']) && $type ==0){ echo $result['level'];
                            }else{
                                echo 1;
                            } ?>">

                        <div class="col-md-12">
                            <button type="submit"  name="add_main_product" class="btn btn-blue btn-next"  value="add_main_device" >
                                حفظ
                            </button>
                        </div>
                        <?php  echo form_close()?>
                    </div>
                </fieldset>
                <fieldset  class="col-sm-6 col-xs-12" id="sub_section" <?php echo $dis2;?>>
                        <?php
                        if(!empty($result)){
                            echo form_open_multipart("family_controllers/Setting/update_product/".$result['id']);
                        }else{

                            echo form_open_multipart("family_controllers/Setting/add_product");
                        } ?>
                        <h5 class="title-top"> الوصف</h5>
                        <div class="form-group col-sm-14 col-xs-12" >
                            <label class="label label-green  half">اختار الفئة</label>
                            <select  id="from_id" name="from_id"  data-validation="required" class="form-control half selectpicker " aria-required="true"
                                     data-show-subtext="true" data-live-search="true"    onchange="results()" >
                                <option value="">قم بالإختيار</option>
                                <?php
                                if(!empty( $main_products)){
                                    foreach($main_products as $sub){
                                        $select='';
                                        if(!empty($result)){
                                            if($result['from_id'] == $sub->id){
                                                $select='selected';
                                            }
                                        }

                                        echo '<option value="'.$sub->id.'" '.$select.'>'.$sub->name .'</option>';
                                    }
                                }else{
                                    ?>
                                    <option value="">لاتوجدتصنيفات رئيسية</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-14 col-xs-12">
                            <label class="label label-green  half"> الوصف</label>
                            <input type="text"  name="title" value="<?php  if(!empty($result['name']) && $type >0){echo$result['name'];} ?>"   class="form-control half input-style" placeholder="الوصف" data-validation="required" aria-required="true">
                        </div>

                    <div id="results"></div>
                        <div class="col-md-12">
                            <button type="submit"  name="add_sub_product" class="btn btn-blue btn-next"  value="add_sub_device" >حفظ
                            </button>
                        </div>
                        <?php  echo form_close()?>


            <!---------------------table--------------------->





                </fieldset>
            </div>



                <?php if(!empty($main_result_products)){      ?>
            <div class="col-sm-6">
                    <br><br>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">الفئة</th>
                        <th class="text-center">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php  $x=1;foreach ($main_result_products as $record ){

                        ?>
                        <td class="text-center"><?php echo $x;?></td>
                        <td class="text-center"><?php echo$record->name; ?></td>

                        <td class="text-center">
                            <?php if($record->count == 0){ ?>
                                <a href="<?php echo base_url();?>family_controllers/Setting/update_product/<?php echo $record->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                <a onclick="$('#adele').attr('href', '<?= base_url() . "family_controllers/Setting/delete_product/" . $record->id ?>');"
                                   data-toggle="modal" data-target="#modal-delete"
                                   title="حذف"> <i class="fa fa-trash"
                                                   aria-hidden="true"></i> </a>
                            <?php }else { ?>
                                <a href="<?php echo base_url();?>family_controllers/Setting/update_product/<?php echo $record->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                <button class="btn btn-sm btn-danger">لا يمكن الحذف</button>
                            <?php } ?>
                        </td>
                    </tr>


                        <?php $x++; } ?>
                    </tbody>
                </table>


            </div>
                <?php     } ?>




                <?php if(!empty($sub_products)){     ?> <div class="col-sm-6">
                <br><br>
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th class="text-center">الوصف</th>
                            <th class="text-center">الفئة</th>
                            <th class="text-center">الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php  $x=1;foreach ($sub_products as $record ){

                            ?>
                            <td class="text-center"><?php echo $x;?></td>
                            <td class="text-center"><?php echo$record->name; ?></td>
                            <td class="text-center"><?php echo$record->wasf; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url();?>family_controllers/Setting/update_product/<?php echo $record->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                <a onclick="$('#adele').attr('href', '<?= base_url() . "family_controllers/Setting/delete_product/" . $record->id ?>');"
                                   data-toggle="modal" data-target="#modal-delete"
                                   title="حذف"> <i class="fa fa-trash"
                                                   aria-hidden="true"></i> </a>

                            </td>
                        </tr>


                        <?php $x++; } ?>
                        </tbody>
                    </table>

                </div>

                <?php     } ?>




                    </div>
    </div>
</div>

<?php if(!empty($all)){?>
    <div class="col-xs-12 fadeInUp " >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">عرض الأجهزة  </h3>
            </div>
            <div class="panel-body">

                <!---------------------table--------------------->
                <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
                                <a id="deleteButton" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
<?php  } ?>

<script type="text/javascript">
    $('.selectpicker').selectpicker('refresh');
    function showFunction(type) {
        $(".btn-default").removeClass( "disabled" );
        if(type ==1){
            document.getElementById("main_section").removeAttribute("disabled", "disabled");
            document.getElementById("sub_section").setAttribute("disabled", "disabled");
        } else if (type ==2){
            $(".disabled").removeClass( "disabled" );
            document.getElementById("sub_section").removeAttribute("disabled", "disabled");
            document.getElementById("main_section").setAttribute("disabled", "disabled");
        }
    }
</script>

<script>
    function results(){
       $('#results').html('');
        var e = document.getElementById("from_id");
        var from_id_value = e.options[e.selectedIndex].value;
        if(from_id_value != ''){
            var dataString='from_id_value='+ from_id_value;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Setting/add_product',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });

        }
    }
</script>
