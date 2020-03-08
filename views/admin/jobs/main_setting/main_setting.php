<div class="col-sm-12 col-md-12 col-xs-12">
  <div class="col-sm-2 col-md-2 col-xs-2">
    <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Jobs/Jobs/new_setting';"><i class="fa fa-plus"></i> إضافة مسمى وظيفي </button>
  </div>

</div>
<div class="col-sm-12 col-md-12 col-xs-12">
  <br>
  <div class="col-md-4 col-sm-6 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <div class="panel-heading">
        <h3 class="panel-title">المسميات الوظيفية</h3>
      </div>
      <div class="panel-body">
        <?php if(isset($jobs) && $jobs != null) { ?>
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
              foreach ($jobs as $value) { 
                ?>
                <tr>
                  <td><?=($x++)?></td>
                  <td><?=$value->title?></td>
                  <td>
                    <a href="<?php echo base_url('Jobs/JobsSetting/edit_setting').'/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    <span> </span>
                    <a onclick="$('#adele').attr('href', '<?=base_url()."Jobs/JobsSetting/delete_setting/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
</div>