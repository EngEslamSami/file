<?php
$session_id=$_SESSION['user_id'];

################# remove item ################


################## list products in cart ###################







if(isset($_SESSION["sarf_edit".$session_id]) && count($_SESSION["sarf_edit".$session_id]) > 0){
  $mode = current($_SESSION["sarf_edit".$session_id]); ?>


  <table id="colored-bgg" class="table table-bordered success">
              <thead>
              <tr>
                <th>م</th>
                <th>اسم الحساب</th>
                <th>القيمة</th>
                <th>الأجراء</th>
              </tr>
              </thead>
              <tbody>
    <?php    $all_value=0; $i=1; for($x = 0 ; $x < count($_SESSION["sarf_edit".$session_id]) ; $x++){ ?>
  <tr>
    <td scope="row"><?php echo $i++?></td>
    <td><?php echo $mode['account_name'] ?></td>
    <td><?php echo $mode['value']?></td>

      <td><i class="fa fa-times" onclick="return CancelAcount(<?php echo $mode['account_code']?> ,'sarf_edit<?php echo$session_id;?>' );"></i></td>
  </tr>

  <?php $all_value += $mode['value']  ;
  $mode = next($_SESSION["sarf_edit".$session_id]);
}// END FOR ?>
<tr>
  <td colspan="2"> الإجمالى</td>
  <td><?php echo $all_value ?></td><td></td>
</tr>
</tbody>
</table>
<? }
?>

<script>
    function CancelAcount(code,name){
        //  alert(name);
        var dataString = 'code=' + code +"&session_name="+name;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/Sessins_data/sanad_sarf_account_edit',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#results').html(html);
            }
        });
        // return false;
    }


</script>


