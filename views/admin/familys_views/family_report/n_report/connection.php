<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');
?>
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow no-padding no-margin">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <table id="js_table_members" 
      style="table-layout: fixed;"
      class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th style="width: 50px;">ملف الأسرة </th>
            <th style="width: 170px;" >إسم العائلة</th>
            <th style="width: 170px;" >إسم المستفيد</th>
            <th style="width: 90px;">فئة المستفيد</th>
            <th style="width: 90px;">الجنس</th>
            <th style="width: 90px;">تاريخ الميلاد</th>
            <th style="width: 60px;">العمر</th>
            <th style="width: 60px;">الفئة</th>
            <th style="width: 60px;">الحالة</th>
          </tr>
        </thead>
      </table>
    </div>
</div>

<div id="dataMember"></div>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript">
  function getMemberData(argument) {
    var dataString = 'id=' + argument;
      $.ajax({
          type:'post',
          url: '<?=base_url()?>family_controllers/reports/Family_reports/getMemberData',
          data:dataString,
          cache:false,
          success: function(result){
              $('#dataMember').html(result);
          }
      });
  }
</script>

<?php 
echo $member_js;
$this->load->view('admin/requires/footer'); 
?>