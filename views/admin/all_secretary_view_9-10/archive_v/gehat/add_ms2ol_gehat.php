<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title;?>  <?= $geha; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($all) && !empty($all)) {
                $geha_id=$all->id;
                            $tasnef_id_fk=$all->tasnef_id_fk;
                            $tasnef_n=$all->tasnef_n;
                        // $geha_type_name=$result->gha_type_fk;
                            $name=$all->name;
                            $phone=$all->phone;
                            $gwal=$all->gwal;
                            $fax=$all->fax;
                            $email=$all->email;
                            $code=$all->code;
                            $status=$all->status;
                        
              
              } else {
                            $tasnef_id_fk='';
                            $tasnef_n='';
                            $name='';
                            $phone='';
                            $gwal='';
                            $fax='';
                            $email='';
                            $code='';
                            $status='';
                }
                if (isset($record) && !empty($record)) {
               
                                $ms2ol_id=$record->id;
                             
                                $name=$record->name;
                                $phone=$record->phone;
                                $gwal=$record->gwal;
                                $fax=$record->fax;
                                $email=$record->email;
                                $notes=$record->notes;
                                $address=$record->address;
                                
                                echo form_open_multipart('all_secretary/archive/gehat/Gehat/update_ms2ol/'.$ms2ol_id.'');  
                  
                  } else {
                              
                                $ms2ol_id='';
                                $name='';
                                $phone='';
                                $gwal='';
                                $fax='';
                                $email='';
                                $notes='';
                                $address='';
                                echo form_open_multipart('all_secretary/archive/gehat/Gehat/add_ms2ol_gehat/'.$geha_id.'');
                    }
                
            
                     ?>
                <div class="col-md-12">


               
            <div class="form-group col-sm-4">
                <label class="label ">إسم  المسؤول</label>
                <input type="text" class="form-control" placeholder="" data-validation="required" name="name"
              value="<?= $name?>"
                >
            </div>
            <div class="form-group col-sm-4">
                <label class="label ">الهاتف</label>
                <input type="number" name="phone" class="form-control  " placeholder=""  
                value="<?php echo $phone ?>"
                >
            </div>
            <div class="form-group col-sm-4">
                <label class="label ">الجوال</label>
                <input type="number" name="gwal" class="form-control  " placeholder=""  
                value="<?php echo $gwal ?>"
                >
            </div>


                </div>
               
     <div class="col-md-12">
            
            <div class="form-group col-sm-4">
                <label class="label "> الفاكس </label>
                <input type="number" class=" some_class form-control  " name="fax" 
                value="<?php echo $fax ?>"
                >
            </div>
               
            <div class="form-group col-sm-4">
                <label class="label "> البريد الالكتروني</label>
                <input type="email" class=" some_class form-control  " name="email"
                value="<?php echo $email ?>"
                >
            </div>
            <div class="form-group col-sm-4">
                <label class="label ">  العنوان</label>
                <input type="text" class=" some_class form-control  " name="address" value="<?= $address?>"
            
                >
            </div>

            <div class="form-group padding-4 col-md-12 col-xs-12">
                <label class="label ">   ملاحظات </label>
                <textarea id="editor"  name="notes" class="form-control  "  ><?= $notes?></textarea>

            </div>

           
         
         
     </div>
     <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">

                        <button type="submit " 
                                class="btn btn-labeled btn-success "  name="add" value="اضافه"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
            <!-- <div class="form-group col-sm-6">
                <input type="submit"name="add" value="اضافه" class="btn-success form-control">
            </div> -->
            </form>
        </div>
    </div>
</div>
<!-- update Modal1 -->

<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">مسؤول <?= $geha; ?> </h3>
            </div>
        <div class="panel-body">
            <?php 
            
            if(isset($result)&&!empty($result)){?>
            
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>اسم المسؤول </th>
                    <th> الفاكس</th>
                    <th>العنوان</th> 
                     <th>الهاتف</th> 
                     <th> الجوال</th>
                
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->fax;?></td> 
                        <td><?php echo $row->address;?></td>
                        <td><?php echo $row->phone;?></td> 
                      <td><?php echo $row->gwal;?></td> 
                  
                       
                        <td>
                            
                            
                           
                                            <a href="<?php echo base_url();?>/all_secretary/archive/gehat/Gehat/update_ms2ol/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/archive/gehat/Gehat/delete_ms2ol/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                          
                                          
                                                   
                 
                        </td>
                        
                        
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        
    </div>
</div>

