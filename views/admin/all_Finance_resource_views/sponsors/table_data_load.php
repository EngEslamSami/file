<?php if(isset($table_data)&&(!empty($table_data))){
?>
<table id="example" class=" table table-bordered">
  <thead>
    <tr>
      <th>م</th>
      <th>الاسم</th>
      <th>الإجراء</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($table_data as $key => $value) {
  ?>
  <tr ondblclick="set_data(<?php echo $value->id_setting; ?>,'<?php echo $value->title_setting; ?>');">
    <td><?php echo ++$key; ?></td>
    <td><?php echo $value->title_setting; ?></td>
    <td> <a onclick='swal({
            title: "هل انت متأكد من التعديل ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "تعديل",
            cancelButtonText: "إلغاء",
            closeOnConfirm: true
            },
            function(){
              $("#btn_pop").val(2);
              $("#btn_pop_span").text("تعديل");
              // document.getElementById("btn_pop").innerText="تعديل";
              $("#geha_input").show();
              $("#input_name").val("<?php echo $value->title_setting; ?>");
              $("#input_id").val(<?php echo $value->id_setting; ?>);
            });'>
        <i class="fa fa-pencil"> </i></a>


        <a onclick=' swal({
                title: "هل انت متأكد من الحذف ؟",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "حذف",
                cancelButtonText: "إلغاء",
                closeOnConfirm: true
                },
                function(){
                  delete_pop(<?php echo $value->id_setting; ?>);
                });'>
            <i class="fa fa-trash"> </i></a>

   </td>
  </tr>
  <?php
} ?>
  </tbody>
</table>
<?php
}else {
  ?>
  <div class="alert-dengur col-md-12">
    <h4> لا توجد بيانات </h4>
  </div>
  <?php
} ?>

<script>
function show_eidt_data(title,id) {
  
}
</script>


<script>




    $('#example').DataTable( {
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
