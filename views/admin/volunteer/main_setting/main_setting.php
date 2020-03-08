<div class="col-sm-12 col-md-12 col-xs-12">
  <div class="col-sm-2 col-md-2 col-xs-2">
    <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Volunteers/VolunteerSetting/new_setting/1';"><i class="fa fa-plus"></i> إضافة مجالات التطوع </button>
  </div>

  <div class="col-sm-2 col-md-2 col-xs-2">
    <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Volunteers/VolunteerSetting/new_setting/2';"><i class="fa fa-plus"></i> إضافة أسباب التطوع</button>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-xs-12">
  <br>
  <div class="col-md-6 col-sm-6 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <div class="panel-heading">
        <h3 class="panel-title">مجالات التطوع</h3>
      </div>
      <div class="panel-body">
        <?php if(isset($fields) && $fields != null) { ?>
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
              foreach ($fields as $value) { 
                ?>
                <tr>
                  <td><?=($x++)?></td>
                  <td><?=$value->title?></td>
                  <td>
                    <a href="<?php echo base_url('Volunteers/VolunteerSetting/edit_setting').'/1/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    <span> </span>
                    <a onclick="$('#adele').attr('href', '<?=base_url()."Volunteers/VolunteerSetting/delete_setting/1/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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

  <div class="col-md-6 col-sm-6 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <div class="panel-heading">
        <h3 class="panel-title">أسباب التطوع</h3>
      </div>
      <div class="panel-body">
        <?php if(isset($reasons) && $reasons != null) { ?>
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
              foreach ($reasons as $value) { 
                ?>
                <tr>
                  <td><?=($x++)?></td>
                  <td><?=$value->title?></td>
                  <td>
                    <a href="<?php echo base_url('Volunteers/VolunteerSetting/edit_setting').'/2/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    <span> </span>
                    <a onclick="$('#adele').attr('href', '<?=base_url()."Volunteers/VolunteerSetting/delete_setting/2/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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