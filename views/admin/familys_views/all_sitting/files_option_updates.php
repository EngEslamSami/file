<div class="col-sm-12 col-md-12 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?>  </h4>
            </div>
        </div>

        <div class="panel-body">

            <form method="post" id="form" action="<?= base_url() ?><?php echo (isset($update))? 'family_controllers/Setting/update_files_option_updates/'.$update->id : 'family_controllers/Setting/files_option_updates'; ?>">
                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <div class="col-sm-6 col-xs-6 padd">
                        <label class="label label-green half">اسم التحديث</label>
                        <input type="text" name="file_update_name" class="form-control half input-style" value="<?= (isset($update))? $update->title : '' ?>" data-validation="required">
                    </div>
                    <div class="col-sm-6 col-xs-6 padd">
                        <label class="label label-green half">عدد الايام</label>
                        <input type="text" name="num_of_days" class="form-control half input-style" onkeypress="validate(event)" value="<?= (isset($update))? $update->num_of_day : '' ?>" data-validation="required">
                    </div>
                </div>



                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <div class="form-group col-sm-3 col-xs-12 padd">
                        <input type="submit" name="add_file_option" class="form-control half input-style" value="حفظ">
                    </div>
                </div>


            </form>

            <?php if (isset($updates) && !empty($updates) && $updates!=null){?>

             <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                 <tr>
                     <th >#</th>
                     <th >اسم التحديث  </th>
                     <th >عدد الايام </th>
                     <th >الإجراء </th>
                 </tr>
                 </thead>
                 <?php $x=1; foreach ($updates as $record=>$value){?>
                 <tr>
                     <td ><?=$x++?></td>
                     <td ><?=$updates[$record]->title ?></td>
                     <td ><?= $updates[$record]->num_of_day ?></td>

                     <td >
                         <a href="<?php echo base_url().'family_controllers/Setting/edit_files_option_updates/'.$updates[$record]->id ?>" title="تعديل">
                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                         <span> </span>
                         <a href="<?=base_url()."family_controllers/Setting/delete_files_option_updates/".$updates[$record]->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                             <i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                 </tr>
                 <?php }?>
             </table>


            <?php  }?>
        </div>

        </div>
    </div>




<script>
    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

