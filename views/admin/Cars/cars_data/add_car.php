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
if(isset($car)&&!empty($car))
{
    $car_code=$car->b_car_code;
    $b_car_marka=$car->b_car_marka;
    $b_car_traz=$car->b_car_traz;
    $b_car_model_year=$car->b_car_model_year;
    $b_fi_car_board_num=$car->b_fi_car_board_num;
    $b_se_car_board_num=$car->b_se_car_board_num;
    
    
    $b_car_color=$car->b_car_color;
    $b_car_structure_num=$car->b_car_structure_num;
    $b_car_fuel_fk=$car->b_car_fuel_fk;
    $b_car_img=$car->b_car_img;
    //=======================================
    $amkan_twagod=$car->dep_id;
    $malek_name=$car->malek_name;
    $malek_card_name=$car->malek_card_name;
    $actual_user_name=$car->actual_user_name;
    $actual_user_card_num=$car->actual_user_card_num	;
    $tsalsol_num=$car->tsalsol_num;
    $reg_type=$car->reg_type;



    $out['form']='Cars/cars_data/Cars_data/update_car/'.$car->id;
}else{

    if(isset($last_car_code)){
        $car_code = $last_car_code + 1;
    }else{
        $car_code = 0;
    }
    $b_car_marka="";
    $b_car_traz="";
    $b_fi_car_board_num="";
    $b_se_car_board_num="";
    
    $b_car_model_year="";
    $b_car_color="";
    $b_car_structure_num="";
    $b_car_fuel_fk="";
    $b_car_img="";
//================================
   $amkan_twagod='';
    $malek_name='';
    $malek_card_name='';
    $actual_user_name='';
    $actual_user_card_num='';
    $tsalsol_num='';
    $reg_type='';
    $out['form']='Cars/cars_data/Cars_data/add_cars';
}
?>
<div class="col-sm-12 no-padding " >
   
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <?php
                if(isset($car)&&!empty($car)) { ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-info"> إستكمال البيانات </button>
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                <ul class="dropdown-menu">
                    <li><a target=""
                           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $car->id; ?>"> البيانات الأساسية  </a></li>
                    <li><a target=""
                           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addInsurance/<?php echo $car->id; ?>"> وثيقة التأمين  </a></li>
                    <li><a target=""
                           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addDates/<?php echo $car->id; ?>"> الوثائق والمستندات </a></li>
                
                </ul>
                </div>
                <? } ?>
            </div>
            <div class="panel-body">
            
             <div class="col-sm-9 no-padding" >
                <?php    echo form_open_multipart($out['form'])?>

              
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label ">كود السيارة</label>
                        <input type="text" name="b_car_code" id="b_car_code" value="<?php echo $car_code;?>"
                               class="form-control "
                            <?php  if(!empty($car_code)){ echo'readonly';
                            }else{ echo 'data-validation="required"';
                            } ?>
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">ماركة السياره</label>
                        <select id="b_car_marka" data-validation="required" class="form-control "
                                name="b_car_marka">
                            <option value="">إختر</option>
                            <?php if(isset($marka) && !empty($marka)){?>
                            <?php
                            foreach($marka as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$b_car_marka){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                           <?php }}else { ?>
                                <option value="">لا يوجد اختارات متاحة</option>
                            <? } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">طراز السيارة</label>
                        <select id="b_car_traz" data-validation="required" class="form-control "
                                name="b_car_traz">

                            <option value="">إختر</option>
                            <?php if(isset($traz) && !empty($traz)){?>
                            <?php
                            foreach($traz as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$b_car_traz){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                            <?php } } else{ ?>
                                <option value="">لا يوجد اختارات متاحة</option>
                            <? } ?>
                        </select>
                    </div>



                          <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">رقم اللوحة</label>
                        <input type="text" name="b_fi_car_board_num" id="b_car_board_num" 
                          value="<?php echo $b_fi_car_board_num;?>"
                               class="form-control  half"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                               <input class="form-control  half" name="b_se_car_board_num" 
                                value="<?php echo $b_se_car_board_num;?>"
                               class="form-control  half"
                               data-validation="required"
                               data-validation-has-keyup-event="true"
                               
                               
                                />
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">اللون</label>
                        <select id="b_car_color" data-validation="required" class="form-control "
                                name="b_car_color">

                            <option value="">إختر</option>
                            <?php if(isset($colors) && !empty($colors)){?>
                                <?php
                                foreach($colors as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$b_car_color){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                <?php } } else{ ?>
                                <option value="">لا يوجد اختارات متاحة</option>
                            <? } ?>
                        </select>
                    </div>


                      <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">سنة الموديل</label>
                        <input type="text" name="b_car_model_year" id="b_car_model_year" value="<?php echo $b_car_model_year;?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>



                  

                 <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">إسم المالك</label>
                        <input type="text" name="malek_name" id="malek_name" value="<?php echo $malek_name;?> "
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>


                     <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">هويته</label>
                        <input type="text" name="malek_card_name" id="malek_card_name" value="<?php echo $malek_card_name;?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                 <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">إسم المستخدم الفعلي </label>
                        <input type="text" name="actual_user_name" id="actual_user_name" value="<?php echo $actual_user_name;?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>


                     <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">هويته</label>
                        <input type="text" name="actual_user_card_num" id="actual_user_card_num" value="<?php echo $actual_user_card_num;?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>


                  <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">الرقم التسلسلي</label>
                        <input type="text" name="tsalsol_num" id="tsalsol_num" value="<?php echo $tsalsol_num;?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">رقم هيكل السيارة</label>
                        <input type="text" name="b_car_structure_num" id="b_car_structure_num" value="<?php echo $b_car_structure_num;?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                       <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">نوع التسجيل</label>
                           <select id="reg_type" data-validation="required" class="form-control "
                                   name="reg_type">

                               <option value="">إختر</option>
                               <?php if(isset($types_reg) && !empty($types_reg)){?>
                                   <?php
                                   foreach($types_reg as $row){
                                       ?>
                                       <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$reg_type){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                   <?php } } else{ ?>
                                   <option value="">لا يوجد اختارات متاحة</option>
                               <? } ?>
                           </select>

                    </div>




                    <div class="form-group col-md-1 col-sm-6 padding-4">
                        <label class="label ">نوع الوقود</label>
                        <select id="b_car_fuel_fk" data-validation="required" class="form-control "
                                name="b_car_fuel_fk">

                            <option value="">إختر</option>
                            <?php if(isset($fuel_types) && !empty($fuel_types)){?>
                                <?php
                                foreach($fuel_types as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$b_car_fuel_fk){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                <?php } } else{ ?>
                                <option value="">لا يوجد اختارات متاحة</option>
                            <? } ?>
                        </select>
                    </div>
                    
                    
                
                         <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">مكان التواجد </label>
                        <select id="dep_id" data-validation="required" class="form-control "
                                name="dep_id">

                            <option value="">إختر</option>
                            <?php if(isset($amaken) && !empty($amaken)){?>
                                <?php
                                foreach($amaken as $mkan){
                                    ?>
                                    <option value="<?php echo $mkan->id_setting;?>" <?php if($mkan->id_setting==$amkan_twagod){ echo 'selected'; } ?>> <?php echo $mkan->title_setting;?></option >
                                <?php } } else{ ?>
                                <option value="">لا يوجد اختارات متاحة</option>
                            <? } ?>
                        </select>
                    </div>
                    
                    
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label " style="width: 100%">صورة السيارة </label>
                        <input id="b_car_img" onchange="readURL(this);" name="b_car_img"   style="padding: 0;" class=" form-control " type="file">
                    </div>
              
                <div class="col-md-12 text-center">
                    <button type="submit" id="save" name="add" value="حفظ"
                            class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ</button>
                </div>
            </div>
            
            
             <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/Cars/cars_data/sidebar_car_data');?>
    <!------ table -------->
            

        </div>
    </div>

   
    </div>
<?php if(isset($records)&&!empty($records)) { ?>
<div class="col-xs-12 no-padding">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">البيانات الأساسية</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12 no-padding">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th>كود السيارة</th>
                        <th class="text-center">طراز السيارة</th>
                        <th class="text-center">الماركة</th>
                        <th>رقم اللوحة</th>
                        <th>رقم الهيكل</th>
                        <th>سنة الموديل</th>


                        <th class="text-center">الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
<?php
$a=1;


if(isset($records)&&!empty($records)) {
    foreach ($records as $record) {
        ?>
    <tr>
    <td><?php echo $a ?></td>
    <td><? echo $record->b_car_code; ?></td>
    <td><? echo $record->traz; ?></td>
    <td><? echo $record->marka; ?></td>
    <td><? echo $record->b_fi_car_board_num; ?>/ <? echo $record->b_se_car_board_num; ?></td>
    <td><? echo $record->b_car_structure_num; ?></td>
    <td><? echo $record->b_car_model_year; ?></td>
    
    <td>
<div class="btn-group">
    <button type="button" class="btn btn-danger">اضافه</button>
<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
    <li><a target="_blank"
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $record->id; ?>"> البيانات الأساسية  </a></li>
    <li><a target="_blank"
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addInsurance/<?php echo $record->id; ?>"> وثيقة التأمين   </a></li>
    <li><a target="_blank"
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addDates/<?php echo $record->id; ?>">  الوثائق والمستندات </a></li>

</ul>
                                    </div>

<a href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $record->id; ?>"><i
class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
<a onclick="$('#adele').attr('href', '<?= base_url() . "Cars/cars_data/Cars_data/deleteCar/" . $record->id ?>');"
data-toggle="modal" data-target="#modal-delete"
title="حذف"> <i class="fa fa-trash"
           aria-hidden="true"></i> </a>


<!---->
<!---->
<!---->
<!--                                   -->
<!---->
<!---->
<!--                                    <a href = "--><?php //echo base_url('human_resources/Human_resources/print_employee_details').'/'.$record->id ?><!--" target = "_blank" >-->
<!--                                        <i class="fa fa-print" aria-hidden = "true" ></i > </a>-->
<!---->
<!--                                    <a  href = "--><?php //echo base_url('human_resources/Human_resources/print_card').'/'.$record->id ?><!--" target = "_blank" >-->
<!--                                        <i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>-->



                                </td>

                            </tr>
                            <?php
                            $a++;
                        }
                    } else {?>
                        <td colspan="7"><div style="color: red; font-size: large;">لم يتم اضافه سيارات الي الان</div></td>
                    <?php  }
                    ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<?  } ?>

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



