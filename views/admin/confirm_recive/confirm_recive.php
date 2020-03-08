
      <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="">
        </div>
        <div class="top-line"></div><!--message of delete will be showen here-->
        <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>قائمة بالمقابلات</h4>
            </div>
          </div>
          <div class="panel-body">
            <?php 
            if(isset($interviews) && $interviews != null){ 
            ?>
            <table id="example" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
              <thead>
               <tr  style="display: none;">
                <th>التسلسل</th>
                <th>إسم السجين</th>
                <th>نوع المساعدة</th>
                <th>تاريخ المقابلة</th>
                <th>الإجراء</th>
              </tr>

              <tr class="info">
                <th>التسلسل</th>
                <th>إسم السجين</th>
                <th>نوع المساعدة</th>
                <th>تاريخ المقابلة</th>
                <th>الإجراء</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                foreach($interviews as $interview){ 
                  if($interview->help_id == 1){
                    $help = 'نقدي';
                  }
                  else{
                    $help = 'عيني';
                  }
                ?>
                <tr>
                  <td></td>
                  <td><?=$interview->nazeel_name?></td>
                  <td><?=$help?></td>
                  <td><?=date("Y/m/d",$interview->date)?></td>
                  <td>
                    <?php if($interview->lgnadone == 1){ ?>
                    <a href="<?=base_url().'Dashboard/commite/'.$interview->id.'/update'?>"> <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i> تعديل رأي اللجنة</button></a>
                    <?php }else{ ?>
                    <a href="<?=base_url().'Dashboard/commite/'.$interview->id.'/add'?>"> <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-plus"></i> إضافة رأي اللجنة</button></a>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php 
            }
            else{
              echo'<div class="alert alert-danger">لا توجد مقابلات</div>';
            }
            ?>
          </div>
        </div>
      </div>
