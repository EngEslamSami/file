<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    /*
        .top-label {
            color: white;
            background-color: #009688;
            border: 2px solid #009688;
            border-radius: 0;
            margin-bottom: 0;
            width: 100%;
            display: block;
            padding: 8px 4px;
        }
        .bottom-input{
            width: 100%;
            border-radius: 0;
        }
        */
    .top-label {
        font-size: 13px;
    }
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
    $b_car_board_num=$car->b_car_board_num;
    $b_car_color=$car->b_car_color;
    $b_car_structure_num=$car->b_car_structure_num;
    $b_car_fuel_fk=$car->b_car_fuel_fk;
    $b_car_img=$car->b_car_img;

    
    
    $out['form']='Cars/cars_data/Cars_data/update_car/'.$car->id;
}else{

    if(isset($last_car_code)){
        $car_code = $last_car_code + 1;
    }else{
        $car_code = 0;
    }
    $b_car_marka="";
    $b_car_traz="";
    $b_car_board_num="";
    $b_car_model_year="";
    $b_car_color="";
    $b_car_structure_num="";
    $b_car_fuel_fk="";
    $b_car_img="";
   
    $out['form']='Cars/cars_data/Cars_data/add_cars';
}
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <?php
                if(isset($car)&&!empty($car)) { ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a target=""
                               href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $car->id; ?>"> بيانات الاساسية  </a></li>
                        <li><a target=""
                               href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addInsurance/<?php echo $car->id; ?>"> بيانات التأمين  </a></li>
                        <li><a target=""
                               href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addDates/<?php echo $car->id; ?>">  بيانات التواريخ </a></li>

                    </ul>
                </div>
                <? } ?>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>

                <div class="col-md-12">
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">كود السيارة</label>
                        <input type="text" name="b_car_code" id="b_car_code" value="<?php echo $car_code;?>"
                               class="form-control bottom-input"
                            <?php  if(!empty($car_code)){ echo'readonly';
                            }else{ echo 'data-validation="required"';
                            } ?>
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">ماركة السياره</label>
                        <select id="b_car_marka" data-validation="required" class="form-control bottom-input"
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
                        <label class="label top-label">طراز السيارة</label>
                        <select id="b_car_traz" data-validation="required" class="form-control bottom-input"
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
                        <label class="label top-label">رقم اللوحة</label>
                        <input type="text" name="b_car_board_num" id="b_car_board_num" value="<?php echo $b_car_board_num;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">اللون</label>
                        <select id="b_car_color" data-validation="required" class="form-control bottom-input"
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
                        <label class="label top-label">سنة الموديل</label>
                        <input type="text" name="b_car_model_year" id="b_car_model_year" value="<?php echo $b_car_model_year;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    
                    
                    
                    </div>
                    <div class="col-md-12">
              
                  
                  </div>
                <div class="col-md-12">
                
                 <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">إسم المالك</label>
                        <input type="text" name="" id="" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    
                    
                     <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">هويته</label>
                        <input type="text" name="" id="" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                
                 <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">إسم المستخدم الفعلي </label>
                        <input type="text" name="" id="b_car_structure_num" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    
                    
                     <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">هويته</label>
                        <input type="text" name="" id="" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                
                
                    </div>
                <div class="col-md-12">
                  <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الرقم التسلسلي</label>
                        <input type="text" name="" id="" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">رقم هيكل السيارة</label>
                        <input type="text" name="b_car_structure_num" id="b_car_structure_num" value="<?php echo $b_car_structure_num;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    
                       <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع التسجيل</label>
                        <input type="text" name="" id="" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    
                    
                    
                    
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع الوقود</label>
                        <select id="b_car_fuel_fk" data-validation="required" class="form-control bottom-input"
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
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة السيارة </label>
                        <input id="b_car_img" onchange="readURL(this);" name="b_car_img"   style="padding: 0;" class=" form-control bottom-input" type="file">
                    </div>
                </div>
                <div class="col-md-12 ">
                    <input type="submit" id="save" name="add" value="حفظ"
                            class="btn btn-add center-block">
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/Cars/cars_data/sidebar_car_data');?>
    <!------ table -------->
    </div>
<?php if(isset($records)&&!empty($records)) { ?>
<div class="col-xs-12 no-padding">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">البيانات الأساسية</h3>
        </div>
        <div class="panel-body"><br>
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
                                <td><? echo $record->b_car_board_num; ?></td>
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
                                                   href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $record->id; ?>"> بيانات الاساسية  </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addInsurance/<?php echo $record->id; ?>"> بيانات التأمين  </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addDates/<?php echo $record->id; ?>">  بيانات التواريخ </a></li>

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



