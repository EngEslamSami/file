<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
   
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
</style>

<?php


    $date_end_estmara=$car->date_end_estmara;
    $date_end_fahsdawry=$car->date_end_fahsdawry;
    $date_end_tafweal=$car->date_end_tafweal;
    $date_end_tash3ol=$car->date_end_tash3ol;


    $out['form']='Cars/cars_data/Cars_data/addDates/'.$carId;

?>
<div class="col-sm-12 no-padding " >
 
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-info"> إستكمال البيانات</button>
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
<ul class="dropdown-menu">
    <li><a target=""
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $carId; ?>"> بيانات الأساسية  </a></li>
    <li><a target=""
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addInsurance/<?php echo $carId; ?>"> وثيقة التأمين   </a></li>
    <li><a target=""
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addDates/<?php echo $carId; ?>">  الوثائق والمستندات </a></li>

</ul>
                </div>

            </div>
<?php  $out2['form']='Cars/cars_data/Cars_data/add_files/'.$carId; ?>
            <div class="panel-body">
                <div class="col-sm-9 no-padding">
                    <button  class="btn btn-success btn-labeled" onclick="add_row();"> <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافه مرفق</button>


                    <?php   echo form_open_multipart($out2['form'])?>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>اسم الوثيقة</th>
                            <th>رفع الوثيقة </th>
                            <th>تاريخ الانتهاء </th>
                            <th>مدة التنبية </th>
                          <!--  <th>العدد </th> -->
                            <th>الاجراء </th>
                        </tr>

                        </thead>


                        <tbody class="tt">
                        <?php
                        if(isset($car_attach)&&!empty($car_attach)) {
                            $types=array(1=>'يوم',7=>'أسبوع',14=>'أسبوعين',30=>'شهر');
                            $z=1;

                            foreach ($car_attach as $file) {
                                ?>
                            <tr>
                                <td><?php echo $z;?></td>
                            
                                <td><?php echo $file->name;?></td>
                                <td><img src="<?php echo base_url();?>uploads/images/cars_img/<?php echo $file->img_file;?>" alt="Smiley face" class="" height="100" width="200"></td>
                            
                            
                                <td><?php echo $file->end_date;?></td>
                                <td><?php echo $types[$file->alert_type];?></td>
                              <!--  <td><?php echo $file->num;?></td> -->
                            
                            
                                <td>
                                
                                
                                    <a type="button" class="" data-toggle="modal" data-target="#myModal<?=$file->id?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                            
                                
                                <a href="<?php echo base_url().'Cars/cars_data/Cars_data/delete_image/'.$file->id.'/'.$carId ;?>" 
                                onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        
                                        
                                        
                                        
                                        </td>
                            </tr>
                            
                                <?php $z++;
                            }  } ?>


                        </tbody>



                    </table>
                    <div class="col-xs-12 no-padding text-center">
                          <button type="submit" name="add" id="save" class="btn btn-success btn-labeled fil" value="حفظ" style="display: none" ><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
                     </div>
 

                    <?php echo form_close();?>
                </div>

                           <!------------------------------------------------------------------>
                <?php  $this->load->view('admin/Cars/cars_data/sidebar_car_data');?>
                <!------ table -------->

            </div>
        </div>
 

    
    </div>


      
<?php
if(isset($car_attach)&&!empty($car_attach)) {

    foreach ($car_attach as $record) {
        $types=array(1=>'يوم',7=>'أسبوع',14=>'أسبوعين',30=>'شهر');
        ?>

        <div class="modal fade" id="myModal<?=$record->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  style="position: absolute;left: 10px; top: 14px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo form_open_multipart('Cars/cars_data/Cars_data/update_files/'.$record->id.'/'.$carId); ?>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>

                            <th>اسم الوثيقة</th>
                            <th>رفع الوثيقة </th>
                            <th>تاريخ الانتهاء </th>
                            <th>مدة التنبية </th>


                            </thead>
                        <tr>
                            <td><select class="form-control" data-validation="required" name="morfaq_id_fk">
                                    <option value="">اختر</option>
                                    <?php if(isset($files)&&!empty($files)){

                                        foreach ($files as $row1){
                                            $select1 = '';
                                           if($row1->id_setting == $record->morfaq_id_fk){
                                               $select1 = 'selected';
                                           }
                                            ?>

                                            <option value="<?php echo $row1->id_setting;?>" <?=$select1?>><?php echo $row1->title_setting;?></option>
                                        <?php } } ?>



                                </select>  </td>
                            <td><input type="file" class="form-control" name="file_update">  </td>

                            <td><input type="date" value="<?=$record->end_date ?>"  data-validation="required" class="form-control" name="end_date">  </td>
                            <td><select class="form-control" name="alert_type" data-validation="required">

                                    <option value="">اختر</option>
                                    <?php
                                    foreach ($types as $key=>$value){
                                        $select = '';
                                    if($key == $record->alert_type){
                                    $select = 'selected';
                                    }
                                    ?>

                                    <option value="<?php echo $key;?>" <?=$select?>><?php echo $value;?></option>
                                    <?php }  ?>



                                </select>  </td>
                        </tr>
</table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"   name="update_signature" class="btn btn-blue btn-close" value="حفظ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                    </div>
                    <?php echo form_close() ; ?>
                </div>
            </div>
        </div>


    <?php  } }  ?>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
    function add_row()
    {
        $('.fil').show();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/Cars/cars_data/Cars_data/add_row",
            data:{},
            success:function(d) {
              $('.tt').append(d);

            }

        });
    }

</script>



