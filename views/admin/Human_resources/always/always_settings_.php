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
                    echo form_open_multipart('human_resources/Always_setting/update_always/'.$record->id);
                }
                else{
                    echo form_open_multipart('human_resources/Always_setting/always_setting');
                }
                ?>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">إسم الدوام</label>
                    <input type="text" name="data[name]" placeholder="إسم الدوام" value="<?php if (isset($record->name)){echo $record->name;}?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <label class="label label-green half">الي</label>
                    <input type="time" name="data[alway_from]"  value="<?php if (isset($record->alway_from)){echo $record->alway_from;}?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <label class="label label-green half">من</label>
                    <input type="time" name="data[alway_to]" value="<?php if (isset($record->alway_to)){echo $record->alway_to;}?>" class="form-control half input-style" autofocus data-validation="required">

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
                            <th>إسم الدوام</th>
                            <th>من</th>
                            <th>الي</th>
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

                                <td><?php echo date('A H:i', strtotime($row->alway_from));?></td>
                                <td><?php echo date('A H:i', strtotime($row->alway_to));?></td>
                                <td>



                                    <a href="<?php echo base_url();?>human_resources/Always_setting/update_always/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a  href="<?php echo base_url();?>human_resources/Always_setting/delete_always/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


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