      <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Administrative_affairs/new_sitting/1';"><i class="fa fa-plus"></i> إضافة بنك جديد </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Administrative_affairs/new_sitting/2';"><i class="fa fa-plus"></i> إضافة أنواع مهامات  </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Administrative_affairs/new_sitting/3';"><i class="fa fa-plus"></i> إضافة أنواع الجزاءات  </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Administrative_affairs/new_sitting/4';"><i class="fa fa-plus"></i> إضافة أنواع الأجازات  </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Administrative_affairs/new_sitting/5';"><i class="fa fa-plus"></i> إضافة أنواع العقود  </button>
        </div>

        <div class="col-sm-2 col-md-2 col-xs-2">
          <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>Administrative_affairs/new_sitting/6';"><i class="fa fa-plus"></i> إضافة أنواع المكافآت  </button>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-xs-12">
        <br>
        <div class="top-line"></div><!--message of delete will be showen here-->
        <div class="col-md-4 col-sm-6 fadeInUp wow">
          <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
              <div class="panel-heading">
                <h3 class="panel-title">البنوك</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($banks) && $banks != null) { ?>
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
                  foreach ($banks as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('Administrative_affairs/edit_sitting').'/1/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_sitting/1/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
                <h3 class="panel-title">أنواع المهمات</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($missions) && $missions != null) { ?>
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
                  foreach ($missions as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('Administrative_affairs/edit_sitting').'/2/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_sitting/2/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
                <h3 class="panel-title">أنواع الجزاءات</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($penalties) && $penalties != null) { ?>
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
                  foreach ($penalties as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('Administrative_affairs/edit_sitting').'/3/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_sitting/3/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
                <h3 class="panel-title">أنواع الأجازات</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($holidays) && $holidays != null) { ?>
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
                  foreach ($holidays as $value) { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('Administrative_affairs/edit_sitting').'/4/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_sitting/4/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
                <h3 class="panel-title">أنواع العقود</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($contracts) && $contracts != null) { ?>
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
                  foreach ($contracts as $value) 
                  { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('Administrative_affairs/edit_sitting').'/5/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_sitting/5/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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
                <h3 class="panel-title">أنواع المكافآت</h3>
            </div>
            <div class="panel-body">
              <?php if(isset($rewards) && $rewards != null) { ?>
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
                  foreach ($rewards as $value) 
                  { 
                  ?>
                  <tr>
                    <td><?=($x++)?></td>
                    <td><?=$value->title?></td>
                    <td>
                      <a href="<?php echo base_url('Administrative_affairs/edit_sitting').'/6/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      <span> </span>
                      <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_sitting/6/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 
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