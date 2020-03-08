<?php
if(isset($row)&&!empty($row)) {
  //  $name=$row->title;
   // $account=$row->account_num;
    $account_num_length=$row->account_num_length;
    $bank_code=$row->bank_code;
    $ar_name=$row->ar_name;
    $en_name=$row->en_name;
}else{
   // $name="";
  //  $account="";
    $account_num_length="";
    $bank_code='';
    $ar_name='';
    $en_name='';
    
}



?>
<?php
if($this->uri->segment(4)){
    echo form_open_multipart('family_controllers/Setting/update_table_bank/'.$this->uri->segment(4).'/banks_settings/');
}else{
    echo form_open_multipart('family_controllers/Setting/add_setting_banks');
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">

</div>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>

            <div class="panel-body">
                <!--<div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green half">اسم البنك</label>
                    <input type="text" name="title" value="<?php echo $name;?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                -->
                <!--<div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green half">رقم الحساب</label>
                    <input type="number" name="bank_account" value="<?php echo $account;?>" class="form-control half input-style" autofocus data-validation="required">

                </div> -->
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green half">رمز البنك</label>
                    <input type="text" name="bank_code" value="<?php echo $bank_code;?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green half">الاسم العربي</label>
                    <input type="text" name="ar_name" value="<?php echo $ar_name;?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green half">الاسم الانجليزي</label>
                    <input type="text" name="en_name" value="<?php echo $en_name;?>" class="form-control half input-style" autofocus data-validation="required">

                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green half">طول رقم الحساب</label>
                    <input type="text" name="account_num_length" value="<?php echo $account_num_length;?>" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                </div>

                <div class="form-group col-sm-12 col-xs-12">
                    <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>
                <?php
                if(isset($records)&&!empty($records)){?>

                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg">
                            <th>مسلسل</th>
                              <th>رمز البنك</th>
                            <th>إسم البنك العربي</th>
                            <th>إسم البنك الإنجليزي</th>

                            <th>الاجراء</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){?>
                            <tr>
                                <td><?php echo $x;?></td>
                                  <td><?php echo $row->bank_code;?></td>
                                <td><?php echo $row->ar_name;?></td>
                                <td><?php echo $row->en_name;?></td>


                                <td>



                                    <a href="<?php echo base_url();?>family_controllers/Setting/update_table_bank/<?php echo $row->id;?>/banks_settings"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a  href="<?php echo base_url();?>family_controllers/Setting/delete_from_table_bank/<?php echo $row->id;?>/banks_settings" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                                </td>


                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>




                            <?php
                            }
                            ?>


                    </div>
                </div>
            </div>


        </div>



<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>

