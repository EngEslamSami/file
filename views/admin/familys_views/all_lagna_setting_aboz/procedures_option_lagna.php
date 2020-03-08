<div class="col-sm-12 col-md-12 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?>  </h4>
            </div>
        </div>

        <div class="panel-body">

            <?php if(isset($result_id)){
                echo form_open_multipart("family_controllers/LagnaSetting/update_procedures_option_lagna/".$result_id->id);
            }else{
                echo form_open_multipart("family_controllers/LagnaSetting/procedures_option_lagna");
            }?>
            <div class="form-group col-sm-12 col-xs-12">
                <div class="col-sm-3">
                    <label class="label label-green half">اللجنة </label>
                    <select name="lagna_id_fk" class=" selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <?php foreach ($all_legan as $row){?>
                            <option value="<?=$row->id_lagna?>" <?php if(isset($result_id)){if($row->id_lagna == $result_id->lagna_id_fk){ echo "selected";}}?>><?=$row->lagna_name?></option>
                        <?php }?>
                    </select>
                </div>
                   <div class="col-sm-3">
                    <label class="label label-green half">النوع  </label>
                    
                    
                            <select id="fe2a_type" data-validation="required" class="form-control bottom-input half"
                                name="type">
                            <option value="">إختر</option>
                            <?php
                            $f2a =array(1=>'الأسرة',2=>'الأفراد');
                            foreach($f2a as  $key => $value){
                                ?>
                                <option value="<?php echo $key;?>"

                                    <?php if(!empty($result_id->type)){
                                        if($key==$result_id->type){ echo 'selected'; }
                                    }else{  if($key ==1){echo'selected';}   }  ?>> <?php echo $value;?></option >
                                <?php
                            }
                            ?>
                        </select>
                    
                    
                    <!--
                    <select name="type" class=" selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                     
                            <option value="1">الملفات </option>
                            <option value="2">الافراد </option>
                      
                    </select>
                    -->
                    
                </div>
                
                <div class="col-sm-6">
                    <label class="label label-green half">اسم الاٍجراء</label>
                    <input type="text" name="option_name" class="form-control half input-style" value="<?= (isset($result_id))? $result_id->title : '' ?>" data-validation="required">
                </div>

            </div>



            <div class="form-group col-sm-12 col-xs-12">
                <div class="col-xs-12 ">
                    <input type="submit" name="add_option" class="form-control" value="حفظ">
                </div>
            </div>
            <?php echo form_close()?>

            <?php if (isset($options) && !empty($options) && $options!=null){?>

                <table id="" class="table table-bordered" role="table">

                    <thead>
                    <tr>
                        <th >#</th>
                        <th >اللجنة </th>
                         <th >النوع </th>
                        <th >اسم الاٍجراء </th>
                       
                        <th >الإجراء </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach($options as $record){

                      

                        ?>
                        <tr>
                        <td rowspan="<?php echo sizeof($record->sub);?>"><?php echo $x++?></td>
                        <td rowspan="<?php echo sizeof($record->sub);?>"><?php echo $record->lagna_name;?> </td>
                        <?php if(!empty($record->sub)){
                            foreach ($record->sub as $row){ 
                                   if($row->type == 1){
                            $bg_color = '#a0cc43';
                            $type_title = 'الأسرة';
                         }elseif($row->type == 2){
                            $bg_color = '#e9b51d';
                             $type_title = 'الأفراد';
                         }else{
                             $bg_color = '#7cc2ff';
                              $type_title = 'غير محدد';
                            
                         }
                                
                                
                                ?>
                                  <td style="color: white; background-color:<?php echo $bg_color;  ?>;"><?= $type_title; ?></td>
                               
                                <td><?= $row->title ?></td>
                              
                                <td >
                                    <a href="<?php echo base_url().'family_controllers/LagnaSetting/edit_procedures_option_lagna/'.$row->id ?>" title="تعديل">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <span> </span>
                                    <a href="<?=base_url()."family_controllers/LagnaSetting/delete_procedures_option_lagna/".$row->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                </tr>
                            <?php }
                        }else{ echo " <td></td> <td></td></tr>";}?>
                    <?php  }?>
                    </tbody>
                </table>


            <?php  }?>



        </div>
    </div>
</div>





