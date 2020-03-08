<div class="col-sm-12 col-md-12 col-xs-12 no-padding">

    <div class="top-line"></div>
   


                <?php
                if(isset($record) && !empty($record) && $record!=null){
                    echo form_open_multipart('human_resources/Salaries_setting/update_salaries/'.$record->id);
                }
                else{
                    echo form_open_multipart('human_resources/Salaries_setting/salaries_setting');
                }
                ?>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label ">المستوي</label>
                    <input type="text" name="data[level]" placeholder="المستوي" value="<?php if (isset($record->level)){echo $record->level;}?>" class="form-control " autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label ">المرتبة</label>
                    <input type="text" name="data[grade]" placeholder="المرتبة" value="<?php if (isset($record->grade)){echo $record->grade;}?>" class="form-control " autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label ">الدرجة</label>
                    <input type="text" name="data[degree]" placeholder="الدرجة" value="<?php if (isset($record->degree)){echo $record->degree;}?>" class="form-control " autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label ">مقدار العلاوة السنوية</label>
                    <input type="number" name="data[year_bonus_value]" placeholder="مقدار العلاوة السنوية" value="<?php if (isset($record->year_bonus_value)){echo $record->year_bonus_value;}?>" class="form-control " autofocus data-validation="required">

                </div> 
                <div class="form-group col-sm-12 col-xs-12 text-center">
                    <button type="submit" name="add" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>

</form>
                <?php if(isset($records) && $records!=null){?>
                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd visible-md visible-lg">
                            <th>م</th>
                            <th>المستوي</th>
                            <th>المرتبة</th>
                            <th>الدرجة</th>
                            <th>مقدار العلاوة السنوية</th>
                            <th>الاجراء</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->level;?></td>
                                <td><?php echo $row->grade;?></td>
                                <td><?php echo $row->degree;?></td>
                                <td><?php echo $row->year_bonus_value;?></td>
                                <td>



                                    <a href="<?php echo base_url();?>human_resources/Salaries_setting/update_salaries/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a  href="<?php echo base_url();?>human_resources/Salaries_setting/delete_salaries/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                                </td>


                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>

                <?php } ?>
        
   
</div>