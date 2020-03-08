

<style>
.modal_above{
  z-index: 1100;
}
</style>
<?php if (!empty($records)) { ?>

<!--
<table   class="table search_table  table-striped table-bordered">

  <thead>
    <tr class="info">
      <th class="text-center"> نوع القيد </th>
      <th class="text-center rkm">حالة القيد </th>
      <th class="text-center">رقم القيد </th>
      <th class="text-center">تاريخ القيد </th>
      <th class="text-center">مدين</th>
      <th class="text-center">دائن</th>
      <th class="text-center">رقم الحساب</th>
      <th class="text-center">إسم الحساب</th>
      <th class="text-center">رقم المرجع</th>
      <th class="text-center">العملية</th>
      <th class="text-center">البيان</th>
    </tr>
  </thead>
  <tbody <?php if (!empty($records)) { ?> <?php $a=1; foreach ($records as $row) {
 ?> <tr>
    <td><?php echo $row->no3_qued_name;  ?></td>
    <td><?php echo $row->halet_qued_name;  ?></td>
    <td class="rkm"><?php echo $row->rkm;  ?></td>
    <td><?php echo $row->qued_date_ar;  ?></td>
    <td><?php echo $row->maden;  ?></td>
    <td><?php echo $row->dayen;  ?></td>
    <td><?php echo $row->rkm_hesab;  ?></td>
    <td><?php echo $row->hesab_name;  ?></td>
    <td><?php echo $row->marg3;  ?></td>
    <td><?php echo $row->harka_name;  ?></td>
    <td><?php echo $row->byan;  ?></td>
    </tr>
    <?php $a++;} ?>
    <?php } ?>

  </tbody>
</table>

-->



<?php
$no3_qued ='';
$halet_qued ='';
$rkm ='';
$qued_date ='';
if ($_POST['array_search_id'] === 'rkm' || $_POST['array_search_id'] === 'no3_qued' ||
$_POST['array_search_id'] === 'halet_qued' ||
$_POST['array_search_id'] === 'qued_date'
) {
$_POST['array_search_id'] ='display:none';
?>

<table   class="table search_table  table-striped table-bordered">

  <thead>
    <tr class="info">
      <th class="text-center" style="<?php echo $no3_qued; ?>"> نوع القيد </th>
      <th class="text-center" style="<?php echo $halet_qued; ?>">حالة القيد </th>
      <th class="text-center" style="<?php echo $rkm; ?>">رقم القيد </th>
      <th class="text-center" style="<?php echo $qued_date; ?>">تاريخ القيد </th>
      <th class="text-center">قيمة القيد</th>
      <th class="text-center">القائم بالإدخال</th>
      <th class="text-center">التفاصيل</th>
    </tr>
  </thead>
  <tbody <?php if (!empty($records)) { ?> <?php $a=1; foreach ($records as $row) {
 ?> <tr>
    <td style="<?php echo $no3_qued; ?>"><?php echo $row->no3_qued_name;  ?></td>
    <td style="<?php echo $halet_qued; ?>"><?php echo $row->halet_qued_name;  ?></td>
    <td style="<?php echo $rkm; ?>"><?php echo $row->rkm;  ?></td>
    <td style="<?php echo $qued_date; ?>"><?php echo $row->qued_date_ar;  ?></td>
    <td><?php echo number_format($row->total_value, 2);  ?></td>
    <td><?php echo $row->publisher_name;  ?></td>
    <td><a type="button" onclick="getDetails(<?= $row->id ?>)" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailsModal" style="padding: 3px 5px;line-height: 1;">
          <i class="glyphicon glyphicon-list"></i> التفاصيل
        </a></td>
    </tr>
    <?php $a++;} ?>
    <?php } ?>

  </tbody>
</table>

<?php }else { ?>

  <table   class="table search_table  table-striped table-bordered" style="table-layout: fixed;" >

    <thead>
      <tr class="info">
        <th class="text-center"> نوع القيد </th>
        <th class="text-center rkm">حالة القيد </th>
        <th class="text-center">رقم القيد </th>
        <th class="text-center">تاريخ القيد </th>
        <th class="text-center">مدين</th>
        <th class="text-center">دائن</th>
        <th class="text-center">رقم الحساب</th>
        <th class="text-center">إسم الحساب</th>
        <th class="text-center">رقم المرجع</th>
        <th class="text-center">العملية</th>
        <th class="text-center">البيان</th>
      </tr>
    </thead>
    <tbody <?php if (!empty($records)) { ?> <?php $a=1; foreach ($records as $row) {
   ?> <tr>
      <td><?php echo $row->no3_qued_name;  ?></td>
      <td><?php echo $row->halet_qued_name;  ?></td>
      <td class="rkm"><?php echo $row->rkm;  ?></td>
      <td><?php echo $row->qued_date_ar;  ?></td>
      <td><?php echo $row->maden;  ?></td>
      <td><?php echo $row->dayen;  ?></td>
      <td><?php echo $row->rkm_hesab;  ?></td>
      <td><?php echo $row->hesab_name;  ?></td>
      <td><?php echo $row->marg3;  ?></td>
      <td><?php echo $row->harka_name;  ?></td>
      <td><?php echo $row->byan;  ?></td>
      </tr>
      <?php $a++;} ?>
      <?php } ?>

    </tbody>
  </table>

<?php } ?>


<?php }else{ ?>

 <div class="alert alert-danger">
               لا توجد نتائج للبحث !!
 </div>

<?php } ?>


<div class="modal fade modal_above"  id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">تفاصيل القيد </h4>
      </div>
      <div class="modal-body " id="optionearea1">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('.search_table').DataTable( {
  dom: 'Bfrtip',
  buttons: [
      'pageLength',
  'copy',
      'csv',
      'excelHtml5',
      {
        extend: "pdfHtml5",
        orientation: 'landscape'
    },

    {
      extend: 'print',
      exportOptions: { columns: ':visible'},
      orientation: 'landscape'
  },
  'colvis'
  ],
  colReorder: true
} );
</script>


<script>
  function getDetails(valu) {
    if (valu != 0 && valu != '') {
      var dataString = 'id=' + valu;
      $.ajax({
        type: 'post',
        url: '<?php echo base_url() ?>finance_accounting/box/quods/Quods/getDetails',
        data: dataString,
        dataType: 'html',
        cache: false,
        success: function(html) {
          $("#optionearea1").html(html);
        }
      });

    }

  }
</script>
