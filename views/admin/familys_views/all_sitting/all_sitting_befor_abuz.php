<div class="col-sm-12 col-md-12 col-xs-12">


    <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray !=null){
           // success  info     primary  danger warning
        $array_class=array("success","info","primary","danger","warning");
       $x=0; foreach ($this->myarray as $key=>$value){
            ?>
    <!--<div class="col-sm-2 col-md-2 col-xs-2">
        <button type="button" onclick="window.location.href = '<?=base_url().'family_controllers/Setting/AddSitting/'.$key?>'" class="btn btn-<?=$array_class[$x]?> w-md m-b-5">
            </button>
    </div>-->
   <?php $x++;if($x == 4){$x=0;}
           }?>
   <?php }?>


</div>
<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div><!--message of delete will be showen here-->


    <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray !=null){
    foreach ($this->myarray as $key=>$value){?>
    <div class="col-md-4 col-sm-6 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">

                <h3 class="panel-title">
                    <a href="<?=base_url().'family_controllers/Setting/AddSitting/'.$key?>" title="اضف <?=$value?>">
                        <i class="fa fa-plus-circle" style="font-size: 24px;"></i>

                    </a> <?=$value?></h3>
            </div>
            <div class="panel-body">
                <?php if(isset($all[$key]) &&  !empty($all[$key]) &&$all[$key] != null) { ?>
                    <table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>الإسم</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($all[$key] as $value) {
                            ?>
                            <tr>
                                <td><?=($x++)?></td>
                                <td><?=$value->title_setting?></td>
                                <td>
                                    <a href="<?php echo base_url().'family_controllers/Setting/UpdateSitting/'.$value->id_setting."/".$key ?>" title="تعديل">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <span> </span>
                                    <a href="<?=base_url()."family_controllers/Setting/DeleteSitting/".$value->id_setting?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php
                }
                else {
                    echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php }?>
    <?php }?>


</div>

