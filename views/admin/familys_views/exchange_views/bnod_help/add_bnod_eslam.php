<?php
if(isset($row)&&!empty($row)){
    $value =$row->title;
    $short_title =$row->short_title;
    
}else{
    $value ="";
    $short_title ="";
}

?>
<?php
if($this->uri->segment(4)){
echo form_open_multipart('family_controllers/Exchange/update_bnod_help/'.$this->uri->segment(4).'');
}else{
echo form_open_multipart('family_controllers/Exchange/add_bnod_help');
}
?>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$titles?></h4>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">اسم البند</label>
                    <input type="text" name="title" value="<?php echo $value;?>" class="form-control half input-style" autofocus data-validation="required">
                  
                </div>
                
                  <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">اسم مختصر</label>
                    <input type="text" name="short_title" value="<?php echo $short_title;?>" class="form-control half input-style" autofocus data-validation="required">
                  
                </div>
                
                
                <div class="form-group col-sm-12 col-xs-12 col-lg-pull-5">
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
<div class="top-line"></div>
<div class="panel panel-bd lobidrag" style="padding-top: 0;">
    <div class="panel-heading" style=""></div>
    <div class="panel-body">
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>اسم البند</th>
                    <th>اسم مختصر</th>
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
                        <td><?php echo $row->short_title;?></td>
                        
                        <td>
                            <a href="<?php echo base_url();?>family_controllers/Exchange/update_bnod_help/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                            <a  href="
                            <?php
                            if($row->checkDelete >0){

                                echo'#';


                            }else{
                                echo base_url();?>family_controllers/Exchange/delete_from_table/<?php echo $row->id;
                            }

                           ?>"  <?php   if($row->checkDelete >0){ ?> onclick=" alert('لايمكن الحذف');" <?php }else{?>  onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');" <?php } ?>><i class="fa fa-trash" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                    <?php  $x++; } ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </div>

</div>
</div>

