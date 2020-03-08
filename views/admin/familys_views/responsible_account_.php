<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $header_title?> 
        
        <?php if($basic_data_family["suspend"] == 4 ) { ?>
<button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
<span class="">رقم ملف الأسرة</span>
</button>
<button  class="btn btn-success  btn-sm progress-button ">
 <span class="">
 <?php 
              echo $basic_data_family["file_num"];    
            ?>
 </span>
 </button>
 <?php } ?>
        
        
        
        </h3>
          <div class="pull-left">
                  <?php $data_load["mother_num"]=$this->uri->segment(4) ;
                        $data_load["person_account"]=$basic_data_family["person_account"] ;
                        $data_load["agent_bank_account"]=$basic_data_family["agent_bank_account"] ;
                        $this->load->view('admin/familys_views/drop_down_button', $data_load);?>
               </div>
    </div>
    <div class="panel-body">


        <?php echo form_open_multipart('family_controllers/Family/add_responsible_account/'.$this->uri->segment(4).'');?>





<div class="col-md-12">
         
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للأب <strong class="astric">*</strong> </label>
                    <input type="number" class="form-control half input-style" 
                    value="<?php if(!empty($father_national_card))
                        { echo $father_national_card;}?>" readonly="readonly" />
                </div>
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half"> إسم الأب <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style" 
                    value="<?php  if(!empty($father_name))
                          {echo $father_name;} ?>
                    " readonly="readonly" />
                </div>

          
       </div>

<div class="col-md-12">


        <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
            <select name="person_id_fk" id="person_id_fk" data-validation="required" aria-required="true" onchange="get_responsible($(this).val());" class="form-control half">
                <option value=""> اختر </option>
                <?php if(isset($name)&&!empty($name)) {?>


                        <option value="<?php echo $name->id.'-1' ;?>" style="color: red;"> <?php echo $name->full_name .'(الام)';?></option>
                <?php } ?>
                <?php if(isset($f_members)&&!empty($f_members)) {
                    foreach ($f_members as $row)
                    {

                    ?>


                    <option value="<?php echo $row->id.'-2' ;?>"> <?php echo $row->member_full_name .'(الابن)';?></option>
                <?php }

                }
                ?>


                  <option value="0">شخص اخر</option>





            </select>

        </div>

        <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green  half">اسم المسئول</label>
            <input type="text" name="person_name" disabled="disabled" id="person_name"  data-validation="required" value="" class="form-control half input-style"  />
        </div>


    <div class="form-group col-sm-4 col-xs-12 " >
        <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong> </label>
        <select name="person_relationship" id="person_relationship"  data-validation="required" aria-required="true" class=" no-padding form-control choose-date form-control half">


            <option value="">إختر</option>
            <?php if(!empty($relationships)){ foreach ($relationships as $record){

                ?>
                <option value="<?php echo $record->id_setting;?>" ><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>
    </div>
        <div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">  <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 6px;
border-radius: 7px;"> 10 ارقام فقط</span>رقم الهويه</label>
        <input type="text" name="person_national_card" maxlength="10"   onkeyup="check_len($(this).val());" onkeypress="validate_number(event)"  id="card_num"  value="" data-validation="required" class="form-control half input-style"  />
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 6px;
border-radius: 7px;"> 10 ارقام فقط</span> رقم الجوال</label>
        <input type="text" name="person_mob"  maxlength="10" onkeypress="validate_number(event)" onkeyup="check_len($(this).val());"  id="mob"  value=""  data-validation="required"class="form-control half input-style"  />
    </div>
    <div class="form-group col-sm-4 col-xs-12 ">
        <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
        <select name="bank_id_fk" id="m_account_id"  class="form-control half "  data-validation="required"  onchange="get_code2()";   >
            <?php $yes_no=array('لا','نعم');?>
            <option value="">إختر</option>
            <?php  if(!empty($banks)){
                foreach ($banks as $bank){  
                      $select=''; 
                      /* if($result['m_account_id']>0 &&  $result['m_account_id'] == $bank->id.'-'.$bank->bank_code){$select='selected';
                       } */ ?>
                    <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>" 
                           <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                <?php }
            } ?>
        </select>
    </div>
    </div>
    <div class="col-md-12 ">
    <div class="form-group col-sm-4 col-xs-12 " >
        <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
        <input type="text" class="form-control half input-style"
               name="bank_code" readonly="readonly"   id="ramz_code"    />
    </div>
    <div class="form-group col-sm-5 col-xs-12" >
        <label class="label label-green  half">رقم الحساب <strong class="astric">*</strong> </label>
        <input type="text"  class="form-control half input-style"maxlength="24" minlength="24"
               value=""
               name="bank_account_num" data-validation="required"   id="hesab_bank_2" onkeyup="length_hesab_om($(this).val());"

        />
        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
    </div>

    </div>




        <div class="col-md-12">
        <div class="form-group col-sm-4 col-xs-12" >
            <input type="submit"   id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ"/>
        </div>
            </div>
    <?php  echo form_close()?>



<?php
if(isset($records)&&!empty($records)){
?>

        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="visible-md visible-lg">
                <th>مسلسل</th>
                <th>اسم المسئول الحساب البنكي</th>
                <th>رقم الهويه</th>
                <th> رقم الجوال</th>
                <th>اسم البنك</th>
                <th>رمز البنك</th>
                <th>رقم الحساب</th>
                <th>حاله الحساب</th>
                <th>تعديل رقم الحساب</th>

                <th>الاجراء</th>
            </tr>

            </thead>
            <tbody>
            <?php
            $x = 1;
            if(isset($records)&&!empty($records)) {
                foreach ($records as $row) {
                    ?>
                    <?php if ($row->active == 0) {
                        $stat = "btn-danger";
                    } else {
                        $stat = "btn-success";
                    } ?>
                    <tr>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $row->person; ?></td>
                        <td><?php echo $row->person_national_card; ?></td>
                        <td><?php echo $row->person_mob; ?></td>
                        <td><?php echo $row->bank_name; ?></td>
                        <td><?php echo $row->bank_code; ?></td>


                        <td> <?php echo $row->bank_account_num; ?> </td>
                        <td>
                            <button class=" btn <?php echo $stat; ?>" value="<?php echo $row->active; ?>"
                                    onclick="change_status($(this).val(),<?php echo $row->id; ?>,
                                     <?php echo $row->family_national_num_fk; ?>,
                                        '<?php echo $row->bank_id_fk; ?>,
                                            <?php echo $row->bank_account_num; ?>')"> <?php if ($row->active == 0) {
                                    echo 'غيرنشط';
                                } else {
                                    echo "نشط";
                                } ?>
                            </button>
                            <button value="<?php if ($row->active == 0) {
                                echo 1;
                            } elseif ($row->active == 1) {
                                echo 0;
                            } ?>" class="btn  btn-info"
                                    onclick="change_status($(this).val(),<?php echo $row->id; ?>,<?php echo $row->family_national_num_fk; ?>,<?php echo $row->bank_id_fk; ?>,'<?php echo $row->bank_account_num; ?>')">
                                <i class=" fa fas fa-undo"></i></button>
                        </td>

                        <td> <?php  // if ($row->edit_status == 0) {
                            
                           if ($row->edit_status == 1||$row->edit_status == 2) { 
                            ?>
                                <button data-toggle="modal"
                                        data-target="#modal-info<?= $row->id ?>"
                                        class="btn btn-sm btn-info"><i
                                        class="fa fa-list btn-info"></i>تعديل رقم الحساب
                                </button>
                            <?php } else { ?>

                                <h6 style="color: red;">لايمكن التعديل علي رقم الحساب</h6>

                            <?php } ?></td>
                        <td>
                            <?php if ($row->delete_status == 0) { ?>


                                <a href="<?php echo base_url(); ?>/family_controllers/Family/delete_from_table/<?php echo $row->id; ?>/<?php echo $row->family_national_num_fk; ?>"
                                   onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                                 aria-hidden="true"></i>
                                </a>
                            <?php } else { ?>

                                <h6 style="color: red;">لايمكن الحذف</h6>

                            <?php } ?>


                        </td>


                    </tr>


                    <div class="modal" id="modal-info<?= $row->id ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         data-wow-duration="0.5s">
                        <div class="modal-dialog" role="document" style="width: 80%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> تعديل رقم الحساب</h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart('family_controllers/Family/edit_account/' . $this->uri->segment(4) . ''); ?>

                                    <div class="col-md-12">
                                        <div class="form-group col-sm-4 col-xs-12 ">
                                            <label class="label label-green  half">إسم البنك<strong
                                                    class="astric">*</strong><strong></strong> </label>
                                            <select name="edit_bank_id_fk" id="bank_name<?php echo $row->id; ?>"
                                                    class="form-control half " data-validation="required"
                                                    onchange="get_code_bank(<?php echo $row->id; ?>)" ;>
                                                <?php $yes_no = array('لا', 'نعم'); ?>
                                                <option value="">إختر</option>
                                                <?php if (!empty($banks)) {
                                                    foreach ($banks as $bank) {
                                                        $select = '';
                                                        if ($row->bank_id_fk == $bank->id) {
                                                            $select = 'selected';
                                                        } ?>
                                                        <option
                                                            value="<?php echo $bank->id; ?>-<?php echo $bank->bank_code; ?>" <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4 col-xs-12 ">
                                            <label class="label label-green  half">رمز البنك<strong
                                                    class="astric">*</strong> </label>
                                            <input type="text" value="<?php echo $row->bank_code; ?>"
                                                   class="form-control half input-style"
                                                   name="edit_bank_code" readonly="readonly"
                                                   id="ramz_code<?php echo $row->id; ?>"/>
                                        </div>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green  half">رقم الحساب <strong
                                                    class="astric">*</strong> </label>
                                            <input type="text" class="form-control half input-style" maxlength="24"
                                                   minlength="24"
                                                   value="<?php echo $row->bank_account_num; ?>"
                                                   name="edit_bank_account_num" data-validation="required"
                                                   id="hesab_bank_<?php echo $row->id; ?>"
                                                   onkeyup="limit_length(<?php echo $row->id; ?>,$(this).val());"

                                            />
                                            <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                                        </div>
                                        <input type="hidden" name="person_id" value="<?php echo $row->id; ?>"
                                        <input type="hidden" name="mother_num"
                                               value="<?php echo $row->family_national_num_fk; ?>"


                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <input type="submit" id="buttons<?php echo $row->id; ?>" name="edit"
                                                   class="btn btn-blue btn-close" value="تعديل"/>
                                        </div>

                                    </div>
                                    <?php echo form_close() ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $x++;
                }
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

<script>

function remove_dis(valu,id)
{
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>family_controllers/Family/edit_account",
        data:{valu:valu,id:id},
        success:function(d){

            alert(d);




        }

    });
}


</script>



<script>
    function get_code2()
    {
        var valu=$('#m_account_id').val();
        var valu=valu.split("-");
        $('#ramz_code').val(valu[1]);
    }




</script>


<script>



    function length_hesab_om(length) {
        var len=length.length;
        if(len<24){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len>24){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len==24){
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>



<script>

    function get_responsible(valu)
    {
        $('#person_relationship').val('');
        $('#mob').val('');
        $('#card_num').val('');

if(valu==0) {

    document.getElementById("person_name").removeAttribute("disabled", "disabled");

}else{
    document.getElementById("person_name").setAttribute("disabled", "disabled");


    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>family_controllers/Family/get_person_data",
        data:{valu:valu},
        success:function(d){


            var json=d;


            obj = JSON.parse(json);
            var type=valu;
            var type_person=valu.split("-")[1];

            if(type_person==1)
            {
             $('#person_relationship').val(obj.m_relationship);
                $('#mob').val(obj.m_mob);
                $('#card_num').val(obj.mother_national_num_fk);


            }else if(type_person==2){


                $('#person_relationship').val(obj.member_relationship);
                $('#mob').val(obj.member_mob);
                $('#card_num').val(obj.member_card_num);

            }






        }

    });

}


    }


</script>
<script>

 function get_code_bank(id)
 {
     var valu=$('#bank_name'+id).val();
     var valu=valu.split("-");
     $('#ramz_code'+id).val(valu[1]);
 }


</script>

<script>

    function limit_length(id,length)
    {
        var len=length.length;
        if(len<24){
            document.getElementById("buttons"+id).setAttribute("disabled", "disabled");
        }
        if(len>24){
            document.getElementById("buttons"+id).setAttribute("disabled", "disabled");
        }
        if(len==24){
            document.getElementById("buttons"+id).removeAttribute("disabled", "disabled");
        }
    }


</script>


<script>
    function check_len(length)
    {

        var len=length.length;
        if(len<10){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len>10){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len==10){
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }


    }



</script>

<script>

    function change_status(valu,id,mother_num,bank_id_fk,bank_account_num)
    {



 
       $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Family/make_active",
            data:{valu:valu,id:id,mother_num:mother_num,bank_id_fk:bank_id_fk,bank_account_num:bank_account_num},
            success:function(d){

                alert(d);
                location.reload();




            }

        });
    }


</script>