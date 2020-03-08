 <div class="col-sm-12 col-md-12 col-xs-12">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>تقرير تفصيلي لحساب</h4>
            </div>
        </div>

        <div class="panel-body">
<?php //echo form_open_multipart('admin/finance_accounting/R_select_account')?>
 

    <div class="form-group col-sm-6 col-xs-12">
        <label class="label label-green half">الحساب</label>
                
                            <select name="account_code" id="account_code"  class="selectpicker form-control half input-style" onchange="return account($('#account_code').val());" data-live-search="true" style="width:100%;" >
                                <option value="">قم بإختيار الحساب</option>
                          <?php 
                          foreach($query_admin as $row1){

                              if( sizeof($query_dep) >0){
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row1->id.'"  disabled>'.$row1->name.'</option>';
                              }else{
                                 echo'<option data-tokens="ketchup mustard"  value="'.$row1->id.'"  >'.$row1->name.'</option>';
                              }
                              //=
                          foreach($query_dep[$row1->id] as $row2){

                              if( sizeof($query_dep[$row2->id]) >0){
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row2->id.'"  disabled>'.$row2->name.'</option>';
                              }else{
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row2->id.'"  >'.$row2->name.'</option>';
                              }
                              //==
                              foreach($query_dep[$row2->id] as $row3){
                                  if(sizeof($query_dep[$row3->id]) >0){
                                      echo'<option data-tokens="ketchup mustard"  value="'.$row3->id.'"  disabled>'.$row3->name.'</option>';
                                  }else{
                                      echo'<option data-tokens="ketchup mustard"  value="'.$row3->id.'"  >'.$row3->name.'</option>';
                                  }
                                 //===
                                  foreach($query_dep[$row3->id] as $row4){
                                      if(sizeof($query_dep[$row4->id]) >0){
                                          echo'<option data-tokens="ketchup mustard"  value="'.$row4->id.'"  disabled>'.$row4->name.'</option>';
                                      }else{
                                          echo'<option data-tokens="ketchup mustard"  value="'.$row4->id.'"  >'.$row4->name.'</option>';
                                      }
                                     //====
                                      foreach ($query_dep[$row4->id] as $row5){
                                          if(sizeof($query_dep[$row5->id]) >0){
                                              echo'<option data-tokens="ketchup mustard"  value="'.$row5->id.'"  disabled>'.$row5->name.'</option>';
                                          }else{
                                              echo'<option data-tokens="ketchup mustard"  value="'.$row5->id.'"  >'.$row5->name.'</option>';
                                          }
                                          //=====
                                      }//row5
                                  }//$row4
                           }//$row3
                          }//$row2
                          }//$row1
                          ?>
                            </select>
                             
                </div>
               
            </div>

<div id="optionearea2"></div>
         </div>
       </div>


            <?php //echo form_close()?>

<script>
    function account(account_code)
    {
        if(account_code)
        {
            var dataString = 'account_code=' + account_code;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/finance_accounting/R_select_account',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea2').html('');
            return false;
        }

    }
</script>