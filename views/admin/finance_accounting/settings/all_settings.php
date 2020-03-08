<div class="col-xs-12 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['catch_addtion'.$_SESSION["user_id"]]); ?>
<?php  ?>
 </span><br>
            <?php   if(isset($records)&&$records!=null):?>

                <table  class="table table-striped table-bordered" style="width:100%">
                    <tr class="info">
                        <th class="text-center">م </th>
                        <th class="text-center">رقم الاعداد</th>
                        <th class="text-center">الكود</th>
                        <th class="text-center">الإجراء </th>
                    </tr>
                    <?php $x=1; foreach($records as $row ):?>
                        <tr class="">
                            <td><?php echo $x++;?></td>
                            <td><?php echo $row->id; ?> </td>
                            <td><?php echo $row->code ?> </td>
                            <td>

                                <a type="button" class="" data-toggle="modal" data-target="#edit<?= $row->id ?>"> <i class="fa fa-pencil " aria-hidden="true"></i> </a> <!--osama-->

                            </td>
                        </tr>


                    <?php endforeach;?>
                </table>
            <?php else:?>
                <div class="alert alert-danger" role="alert">
                    <strong>عذرا...!</strong> لا توجد هناك سندات
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>


<?php   if(isset($records)&&$records!=null){ ?>
<?php  foreach($records as $row ){ ?>
<!------------------------------- detalils  Model -------------->
<div class="modal fade" id="edit<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <form action='<?= base_url("admin/Finance_accounting/update_settings/$row->id")?>' method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">تعديل الاعداد</h4>
            </div>

            <div class="modal-body">
                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <div class=" col-sm-12 col-xs-12">
                        <label class="label label-green  half">الكود</label>
                        <input class="form-control half"  name="code" type="text" data-validation="required" value="<?= $row->code ?>"  >
                    </div>

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block; width: 100%;">
                <input type="submit" name="edit" class="btn btn-info" value="حفظ" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
        <!------------------------------- end detalils  Model -------------->
    <?php } ?>
<?php } ?>
