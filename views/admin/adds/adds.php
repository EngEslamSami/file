<div class="col-sm-12 col-md-12 col-xs-12">
  <div class="col-sm-2 col-md-2 col-xs-2">
    <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Adds/Adds/new_add';"><i class="fa fa-plus"></i> إضافة إعلان </button>
  </div>

</div>
<div class="col-sm-12 col-md-12 col-xs-12">
  <br>
  <div class="col-md-6 col-sm-6 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <div class="panel-heading">
        <h3 class="panel-title">الإعلانات</h3>
      </div>
      <div class="panel-body">
        <?php if(isset($adds) && $adds != null) { ?>
          <table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="info">
                <th>م</th>
                <th>الإسم</th>
                <th>الصورة</th>
                <th>الإجراء</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $x = 1;
              foreach ($adds as $value) { 
                $img = base_url().'asisst/web_asset/img/logo.png';
                if(file_exists('uploads/images/'.$value->img)) {
                  $img = base_url().'uploads/images/'.$value->img;
                }
                ?>
                <tr>
                  <td><?=($x++)?></td>
                  <td><?=$value->name?></td>
                  <td><img style="height: 50px; width: 50px;" class="img-circle" src="<?=$img?>"></td>
                  <td>
                    <a href="<?php echo base_url('Adds/Adds/edit_add').'/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    <span> </span>
                    <a onclick="$('#adele').attr('href', '<?=base_url()."Adds/Adds/delete_add/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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