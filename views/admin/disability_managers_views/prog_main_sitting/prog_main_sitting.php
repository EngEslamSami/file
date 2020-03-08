      <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>disability_managers/Setting/new_sitting/1';"><i class="fa fa-plus"></i> اضافه مؤسسات طبيه</button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>disability_managers/Setting/new_sitting/2';"><i class="fa fa-plus"></i> اضافه اجهزه طبيه  </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>disability_managers/Setting/new_sitting/3';"><i class="fa fa-plus"></i> اضافه مؤهلات علميه </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>disability_managers/Setting/new_sitting/4';"><i class="fa fa-plus"></i> اضافه بيانات الاعاقه </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>disability_managers/Setting/new_sitting/5';"><i class="fa fa-plus"></i>اضافه صله قرابه</button>
        </div>
<div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>disability_managers/Setting/new_sitting/6';"><i class="fa fa-plus"></i>اضافه بدل سكن</button>
        </div>
        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>disability_managers/Setting/new_sitting/7';"><i class="fa fa-plus"></i>اضافه جنسيه</button>
        </div>

        
      </div>
      <div class="col-sm-12 col-md-12 col-xs-12">
        <br>
        <div class="top-line"></div><!--message of delete will be showen here-->
        <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">المؤسسات الطبيه</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($all['company']) && $all['company'] != null) { ?>
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
                  foreach ($all['company'] as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('disability_managers/Setting/edit_sitting').'/1/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."disability_managers/Setting/delete_sitting/1/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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

        <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">الاجهزه الطبيه</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($all['device']) && $all['device'] != null) { ?>
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
                  foreach ($all['device'] as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('disability_managers/Setting/edit_sitting').'/2/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."disability_managers/Setting/delete_sitting/2/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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

        <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">المؤهلات العلميه</h3>
            </div>
            <div class="panel-body">
             <?php if(isset($all['science']) && $all['science'] != null) { ?>
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
                  foreach ($all['science'] as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('disability_managers/Setting/edit_sitting').'/3/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."disability_managers/Setting/delete_sitting/3/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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

        

         <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">انواع حالات الاعاقه</h3>
            </div>
            <div class="panel-body">
             <?php if(isset($all['disability']) && $all['disability'] != null) { ?>
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
                  foreach ($all['disability'] as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('disability_managers/Setting/edit_sitting').'/4/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."disability_managers/Setting/delete_sitting/4/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
        <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">صله القرابه</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($all['relation']) && $all['relation'] != null) { ?>
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
                  foreach ($all['relation'] as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('disability_managers/Setting/edit_sitting').'/5/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."disability_managers/Setting/delete_sitting/5/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
        
         <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">بدل السكن</h3>
            </div>
            <div class="panel-body">
             <?php if(isset($all['house']) && $all['house'] != null) { ?>
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
                  foreach ($all['house'] as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('disability_managers/Setting/edit_sitting').'/6/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."disability_managers/Setting/delete_sitting/6/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
        <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">الجنسيات</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($all['nationality']) && $all['nationality'] != null) { ?>
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
                  foreach ($all['nationality'] as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('disability_managers/Setting/edit_sitting').'/7/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."disability_managers/Setting/delete_sitting/7/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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

      <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                </div>
                <div class="modal-body">
                    <p id="text">هل أنت متأكد من الحذف؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                </div>
            </div>
        </div>
    </div>