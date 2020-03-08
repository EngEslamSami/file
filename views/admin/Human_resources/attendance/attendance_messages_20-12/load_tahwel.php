
<?php if(isset($all) &&!empty($all)){
  
  $title = 'اسم الموظف';
  $code=' كود الموظف';
  $edra=' الاداره';
  $qsm=' القسم';
  
  
  $name = 'employee';
  $code_emp='emp_code';
  $id_card='edara';
  $email='qsm';
 


?>


<div id="body_table_filter">
<table id="tahwel3" class=" table  table-bordered table-striped" role="table">
  <thead>
  <tr class="greentd">
      <th width="2%">#</th>
 
      <th class="text-center"><?= $edra?></th>
      <th class="text-center"><?= $qsm?></th>
      <th class="text-center"><?= $title?></th>
      <th class="text-center"><?= $code?></th>

  </tr>
  </thead>
  <tbody>
  <?php
  $x = 1;
  foreach ($all as $row) {
    
      $row_n = $row->$name;
      $code_n=$row->$code_emp;
      $id_card_n=$row->$id_card;
      $email_n=$row->$email;

      ?>
      <tr>
      <!-- <input type="checkbox" id="myCheck"  onclick="myFunction()"> -->
          <td><input style="width: 90px;height: 20px;" type="checkbox" name="radio" id="myCheck<?= $row->id ?>"  data-id="<?= $row->id ?>"
                     onclick="GettahwelName('<?= $row_n?>',<?= $row->id ?>,<?= $row->emp_code ?>,'<?=$id_card_n ?>','<?=$row->administration ?>','<?= $email_n?>','<?=$row->department ?>')"></td>

          
          <td><?=$id_card_n ?></td>
          <td><?= $email_n?></td>
          <td><?= $row_n ?></td>
          <td><?= $code_n?></td>

      </tr>
      <?php
  }
  ?>
  </tbody>
</table>
</div>
<?php } else{
?>
<div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>

<?php
}
?>

<div class="col-md-12" style="margin-top: 10px;">
<div class="form-group col-sm-4 col-xs-12 padding-4 multi_sel" >

                <h5 class=" label-green-h"> الاداره </h5>

                <select name="edara[]" id="edara"
                        data-actions-box="true" onchange="filter_table(); get_qsm();"
                        class="choose-date selectpicker form-control dep"
                        multiple title="يمكنك إختيار أكثر من اداره"
                        aria-required="true" data-show-subtext="true" data-live-search="true">
                    <?php if (isset($edara) && !empty($edara) && $edara != null) {
                        foreach ($edara as $row ) { ?>


                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                        <?php }
                    } ?>

                </select>

            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4 multi_sel" >

<h5 class=" label-green-h"> القسم </h5>

<select name="qsm[]" id="qsm_id"  disabled
data-actions-box="true" onchange="filter_table(); get_emp();"
                        class="choose-date selectpicker form-control  "
                        multiple title="يمكنك إختيار أكثر من قسم"
                        aria-required="true" data-show-subtext="true" data-live-search="true"
       >
     

</select>

</div>


<div class="form-group col-sm-4 col-xs-12 padding-4 multi_sel" >

<h5 class=" label-green-h"> الموظف </h5>

<select name="emp[]" id="emp"  disabled
data-actions-box="true" onchange="filter_table()"
                        class="choose-date selectpicker form-control  "
                        multiple title="يمكنك إختيار أكثر من موظف"
                        aria-required="true" data-show-subtext="true" data-live-search="true"
       >
      
       <!-- <option value="">إختر</option> -->

</select>

</div>


</div>   
        
<script type="text/javascript">
	$('.selectpicker').selectpicker("refresh");
</script>
<script>

function filter_table() {
    
   
       
    var qsm = $('#qsm_id').val();
    
        var edara = $('#edara').val();
        var emp = $('#emp').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/attendance/attendance_messages/Attend_messages/filter_table",
            data: {
                
               
                edara: edara,
                qsm:qsm,
                emp:emp
                
            },
            success: function (d) {

                $('#body_table_filter').html(d);
                
            }

        });
    }


</script>
<script>

$('#tahwel3').DataTable( {
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
    function get_qsm(){
var edara_id=$('#edara').val();

console.log(edara_id);
        if(edara_id.length >0)
        {

          

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/attendance/attendance_messages/Attend_messages/get_qsm',
                data:{edara_id:edara_id},
                success: function(html){

                   $('#qsm_id').removeAttr('disabled');
                  
                  $("#qsm_id").html(html);
                  $('#qsm_id').selectpicker("refresh");
                }
            });
            return false;
        }
    }

    </script>
    <script>
    function get_emp(){
var edara_id=$('#edara').val();
var qsm_id=$('#qsm_id').val();
        if(edara_id.length >0 && qsm_id.length>0 )
        {

          

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/attendance/attendance_messages/Attend_messages/get_emp',
                data:{edara_id:edara_id,qsm_id:qsm_id},
                success: function(html){

                   $('#emp').removeAttr('disabled');
                  $("#emp").html(html);
                  $('#emp').selectpicker("refresh");
                }
            });
            return false;
        }
    }
</script>