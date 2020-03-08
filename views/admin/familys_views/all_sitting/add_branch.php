<?php
if(isset($row)&&!empty($row)){
    $title=$row->title;
}else{
 $title=$titles;
}

?>
<?php
if($this->uri->segment(4)){
echo form_open_multipart('family_controllers/Setting/update_table/'.$this->uri->segment(4).'/socity_branch');
}else{
echo form_open_multipart('family_controllers/Setting/add_socity_branch');
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">

</div>

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
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">اسم فرع الجمعية</label>
                    <input type="text" name="title" value="<?php echo $title;?>" class="form-control half input-style" autofocus data-validation="required">
                  
                </div>
                <div class="form-group col-sm-12 col-xs-12">
                    <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($records)&&!empty($records)){?>
<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
<div class="top-line"></div><!--message of delete will be showen here-->
<div class="panel panel-bd lobidrag" style="padding-top: 0;">
    <div class="panel-heading" style="">

    </div>
    <div class="panel-body">




            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>اسم فرع الجمعيه</th>

                    <th>الاجراء</th>
                </tr>

                </thead>
                <tbody>
                <?php
                $x=1;
                foreach($records as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->title;?></td>


                        <td>



                            <a href="<?php echo base_url();?>family_controllers/Setting/update_table/<?php echo $row->id;?>/socity_branch/"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                            <a  href="<?php echo base_url();?>family_controllers/Setting/delete_from_table/<?php echo $row->id;?>/socity_branch" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


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

