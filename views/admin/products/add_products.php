<?php
//var_dump($all);
$main = ''; $sub = "";
if(isset($record)|| !empty($record)){ ?>
<div class="col-sm-12 col-md-12 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>ادارة الاصناف</h4>
            </div>
        </div>

        <div class="panel-body">
            <form method="post" id="form" action="<?=base_url() ?>productes/Productes/update_product/<?= $record->id ?>">
                <div class="form-group col-sm-12 col-xs-12 no-padding">

                    <?php $main = ''; $sub = ""; $dis =""; if($record->from_id == 0){
                        $main = 'checked';
                        $dis = "disabled";
                    }else{
                        $sub = 'checked';
                    } ?>

                    <div class=" col-sm-6 col-xs-6 padd">
                        <label class="label label-green  half">نوع الصنف</label>
                        <input disabled type="radio" class="" <?= $main ?>  value="0" name="product_type"  onclick="get_protcut_info('0'); get_codee(0);"  id="r-in" data-validation="required"> رئيسي
                        <input disabled type="radio" class="" <?= $sub ?> value="1" name="product_type" onclick="get_protcut_info('1');" id="r-out" data-validation="required"> فرعي
                    </div>

                    <div id="optionearea12">


                        <input type="hidden" class="" name="code" value="<?= $record->code ?>" readonly="readonly" />
                        <input type="hidden" name="level" value="<?= $record->level ?>" />
                        <input type="hidden" name="fromm_id" value="<?=  $record->from_id ?>"/>

                    </div>
                    <div id="optionearea1"></div>

                </div>

                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <div class="col-sm-6 col-xs-6 padd">

                        <label class="label label-green half">اقسام الاصناف</label>
                        <select disabled <?= $dis ?>  name="from_id" style="width: 50%;"  id="details" onchange="get_code($('#details').val(),'add_product')" class="choose-date form-control "  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                            <option data-subtext="" value=""> قم باختيار القسم</option>
                            <?php  foreach ($products as $product){
                                $select = '';
                                if($record->from_id == $product->id){
                                    $select = 'selected';
                                }

                                ?>
                            <option data-subtext=""   <?= $select ?> value="<?= $product->id ?>" > <?= $product->name ?> </option>
                            <?php  }  ?>
                        </select>
                    </div>

                    <div class="col-sm-6 col-xs-6 padd">
                        <label class="label label-green half">اسم الصنف</label>
                        <input type="text" name="product_name" class="form-control half input-style" value="<?= $record->name ?>" data-validation="required">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12 padd">
                        <input type="submit" name="update_product" class="form-control half input-style" value="حفظ">
                    </div>
                </div>


            </form>


        </div>


    </div>
</div>

<?php }else{ ?>




<div class="col-sm-12 col-md-12 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>ادارة الاصناف</h4>
            </div>
        </div>

        <div class="panel-body">
        <form method="post" id="form" action="<?=base_url() ?>productes/Productes/add_product">
			    <div class="form-group col-sm-12 col-xs-12 no-padding">   

                     <div class=" col-sm-6 col-xs-6 padd">
                        <label class="label label-green  half">نوع الصنف</label>
                        <input type="radio" class="" value="0" name="product_type"  onclick="get_protcut_info('0'); get_codee(0);"  id="r-in" data-validation="required"> رئيسي
                        <input type="radio" class="" value="1" name="product_type" onclick="get_protcut_info('1');" id="r-out" data-validation="required"> فرعي
                    </div>

                    <div id="optionearea12">


                    </div>
                    <div id="optionearea1"></div>
                
                </div>
                
                <div class="form-group col-sm-12 col-xs-12 no-padding">  
                <div class="col-sm-6 col-xs-6 padd">
                  	<label class="label label-green half">اقسام الاصناف</label>
                    <select name="from_id" style="width: 50%;" disabled="disabled" id="details" onchange="get_code($('#details').val(),'add_product')" class="choose-date form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option data-subtext="" value=""> قم باختيار القسم</option>
                    </select>
                 </div>
                 
                 <div class="col-sm-6 col-xs-6 padd">
                  	<label class="label label-green half">اسم الصنف</label>
                    <input type="text" name="product_name" class="form-control half input-style" value="" data-validation="required">
                 </div>
                 <div class="form-group col-sm-3 col-xs-12 padd">
                <input type="submit" name="add_product" class="form-control half input-style" value="حفظ">
                </div>
                </div>
                
                
            </form>   
            
            <?php if (isset($all) && !empty($all) && $all!=null){?>
             <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                 <tr>
                     <th >#</th>
                     <th >اسم الصنف </th>
<!--                     <th >النوع </th>-->
                     <th >الإجراء </th>
                 </tr>
                 </thead>
                 <?php $x=1; foreach ($all as $record=>$value){?>
                 <tr>
                     <td ><?=$x++?></td>
                     <td ><?=$all[$record]->name?></td>
<!--                     <td >--><?//=($all[$record]->from_id == 0)? "قسم رائيسي" : "تابع الي قسم : ".$all[$all[$record]->from_id]->name ?><!--</td>-->
                     
                     <td >
                         <a href="<?php echo base_url().'productes/Productes/update_product/'.$all[$record]->id ?>" title="تعديل">
                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                         <span> </span>
                         <a href="<?=base_url()."productes/Productes/delete_product/".$all[$record]->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                             <i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                 </tr>
                 <?php }?>
             </table>


         <?php }?> 
        </div>
       
        
   </div>
</div>


<?php } ?>
<script>
    function get_protcut_info(type){
        var type = type;
        if(type == 0){
            //$('#details').html('<option data-subtext="" value="nothing"> قم باخيارالصنف الرئيسي</option>');
           // $('#details').addAttr('disabled');
  		document.getElementById("details").setAttribute("disabled", "disabled");
        }
        if(type == 1){
        //$('#details').removeAttr('disabled', 'disabled');
       
     	document.getElementById("details").removeAttribute("disabled", "disabled");
        
        
          $.ajax({
          url: "<?= base_url() ?>productes/Productes/product_details",
          type:"POST",
          success: function (html) {
            $('#details').html(html);
          },
          error: function () {
            alert('error..');
          }
        }); 
        }
        
    }








    function get_codee(type){

        if(type == 0){

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>productes/Productes/add_codelevel',
                success: function(html){

                    $("#optionearea1").html(html);

                },
                error: function () {
                    alert('error..');
                }
            });
//            $.ajax({
//                type:'post',
//                url: '<?php //echo base_url() ?>//admin/Adminstratives/getcode_code',
//                success: function(html){
//                    $("#new_code").val(html);
//
//                },
//                error: function () {
//                    alert('error..');
//                }
//            });

        }

    }







    function get_code(code_post ,controller){

        if(code_post != 0){
            var dataString = 'code_post='+code_post ;
            // alert(dataString);
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>productes/Productes/'+controller,
                data:dataString,
                cache:false,
                success: function(html){

                    $("#optionearea12").html(html);

                }
            });
        }

    }

</script>




