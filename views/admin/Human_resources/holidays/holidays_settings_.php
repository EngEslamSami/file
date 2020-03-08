<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>

            <div class="panel-body">

                <?php
                if(isset($record) && !empty($record) && $record!=null){
                    echo form_open_multipart('human_resources/Holiday_setting/update_holidays/'.$record->id);
                }
                else{
                    echo form_open_multipart('human_resources/Holiday_setting/holidays_setting');
                }
                ?>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">الإسم </label>
                    <input type="text" name="data[name]" placeholder="الإسم" value="<?php if (isset($record->name)){echo $record->name;}?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">عدد أيام الأجازة</label>
                    <input type="number" name="data[num_days]" placeholder="عدد أيام الأجازة" value="<?php if (isset($record->num_days)){echo $record->num_days;}?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">الحد الادني للأجازة</label>
                    <input type="number" name="data[min_days]" placeholder="الحد الادني للأجازة" value="<?php if (isset($record->max_days)){echo $record->max_days;}?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">الحد الأقصي للأجازة</label>
                    <input type="number" name="data[max_days]" placeholder="الحد الأقصي للأجازة" value="<?php if (isset($record->min_days)){echo $record->min_days;}?>" class="form-control half input-style" autofocus data-validation="required">

                </div> 
                <div class="form-group col-sm-12 col-xs-12">
                    <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>

</form>
                <?php if(isset($records) && $records!=null){?>
                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg">
                            <th>مسلسل</th>
                            <th>الإسم</th>
                            <th>عدد الايام</th>
                            <th>الحد الادني للأجازة</th>
                            <th>الحد الأفصي للأجازة</th>
                            <th>الاجراء</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->name;?></td>
                                <td><?php echo $row->num_days;?></td>
                                <td><?php echo $row->min_days;?></td>
                                <td><?php echo $row->max_days;?></td>
                                <td>



                                    <a href="<?php echo base_url();?>human_resources/Holiday_setting/update_holidays/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a  href="<?php echo base_url();?>human_resources/Holiday_setting/delete_holidays/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


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
        </div>
    </div>
</div>