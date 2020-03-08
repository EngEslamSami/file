<?php if (!empty($records)) { ?>



<table  id="example_another" class="table  table-striped table-bordered">

  <thead>
    <tr class="info">
      <th class="text-center"> # </th>
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
    <td><?php echo $a;  ?></td>
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


<?php }else{ ?>

 <div class="alert alert-danger">
               لا توجد نتائج للبحث !!
 </div>

<?php } ?>


<script type="text/javascript">
$('#example_another').DataTable( {
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
