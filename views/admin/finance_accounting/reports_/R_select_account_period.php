   <div class="col-sm-11 col-xs-12">
	<?php //$this->load->view('admin/finance_accounting/reports_tabs'); ?>
<?php echo form_open_multipart('admin/finance_accounting/R_select_account_period',array('class'=>"form-horizontal",'role'=>"form" ))?>






    <div class="row">
      <div class="col-md-4">
            <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ من </label>
                <input type="date" id="date_from"  name="date_from"    class="form-control text-right" placeholder=" تاريخ من" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ إلي </label>
                <input type="date" id="date_to"  name="date_to"    class="form-control text-right" placeholder=" تاريخ الي" />
            </div>
        </div>
    <div class="col-lg-4">
            <div class="form-group" >


                <label for="inputUser" class="control-label">الحساب:</label>
                
                            <select name="account_code" id="account_code"  class="selectpicker form-control" data-live-search="true" style="width:100%;" >
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


            </div>
            <input type="submit"  onclick="
            startDate = ($('#date_from').val());
                        endDate = ($('#date_to').val());
                        if (startDate > endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
                        return false;}
                        else{


      return account($('#date_from').val(),$('#date_to').val(), $('#account_code').val()

      )};" name="add" value="عرض" class="btn btn-primary"  >
            <div id="optionearea2"></div>
            </div>
            
            </fieldset>
            
            <?php echo form_close()?>

<script>
    function account(date_from, date_to, account_code)
    {
        if(date_from && date_to && account_code)
        {
            var dataString = 'account_code=' + account_code + '&date_from='+ date_from + '&date_to=' + date_to;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/finance_accounting/R_select_account_period',
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