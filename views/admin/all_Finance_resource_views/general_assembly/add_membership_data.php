<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    .top-label {
        font-size: 13px;
    }
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    #map_canvas{

        height: 200px !important;

    }

</style>
<?php
if(isset($result)&&!empty($result))
{
    $membership_num =$result->membership_num;
    $membership_jobtitle =$result->membership_jobtitle;
    $membership_type =$result->membership_type;
    $qrar_num =$result->qrar_num;
    $qrar_date =$result->qrar_date;
    $subs_year_value =$result->subs_year_value;
    $subs_date_from =$result->subs_date_from;
    $subs_date_to =$result->subs_date_to;
    $updates_date =$result->updates_date;
    $pay_method_id_fk =$result->pay_method_id_fk;
    $bank_id_fk =$result->bank_id_fk;
    $bank_account_num =$result->bank_account_num;
    $membership_status =$result->membership_status;
    $qrar_magls_img =$result->qrar_magls_img;
    $bank_account_img =$result->bank_account_img;



}else{

    $membership_num  ='';
    $membership_jobtitle  ='';
    $membership_type  ='';
    $qrar_num  ='';
    $qrar_date  ='';
    $subs_year_value  ='';
    $subs_date_from  ='';
    $subs_date_to  ='';
    $updates_date  ='';
    $pay_method_id_fk ='';
    $bank_id_fk ='';
    $bank_account_num  ='';
    $membership_status  ='';
    $qrar_magls_img  ='';
    $bank_account_img  ='';
}

    $out['form']='all_Finance_resource/General_assembly/add_membership_data/'.$this->uri->segment(4);

?>
<?php
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                        //  $data_load["emp_code"]= $personal_data[0]->emp_code;
                        $data_load["id"]=$result->id ;
                        $this->load->view('admin/all_Finance_resource_views/general_assembly/drop_down_menu', $data_load);
                    }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">نوع العضوية </label>
                        <select name="membership_type" id="membership_type"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($membership_arr)&&!empty($membership_arr)) {
                                foreach($membership_arr as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($membership_type)){ if($row->id_setting==$membership_type){ echo 'selected'; } } ?>>
                                        <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
<!--
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">المسمي الوظيفي </label>
                        <select name="membership_jobtitle" id="membership_jobtitle"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            $membership_jobtitle_arr =array(1=>'رئيس مجلس الإدارة',2=>'نائب رئيس مجلس الإدارة',3=>'عضو');
                            if(isset($membership_jobtitle_arr)&&!empty($membership_jobtitle_arr)) {
                                for($a=1;$a<=sizeof($membership_jobtitle_arr);$a++){
                                    ?>
                                    <option value="<?php echo $a;?>"
                                        <?php if(!empty($membership_jobtitle)){ if($a==$membership_jobtitle){ echo 'selected'; } } ?>>
                                        <?php echo $membership_jobtitle_arr[$a];?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
-->
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> رقم العضوية </label>
                        <input type="text" name="membership_num" id="membership_num"
                               value="<?php echo $membership_num;?>"
                               class="form-control bottom-input" readonly
                               data-validation-has-keyup-event="true"  >

                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> رقم القرار </label>
                        <input type="text" name="qrar_num" id="qrar_num" onkeypress="validate_number(event)"
                               value="<?php echo $qrar_num;?>" data-validation="required"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  >
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ القرار</label>
                        <input type="text" name="qrar_date" id="qrar_date"  data-validation="required"
                               value="<?php echo $qrar_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">مبلغ الإشتراك السنوي </label>
                        <input type="text" name="subs_year_value" id="subs_year_value" onkeypress="validate_number(event)"
                               value="<?php echo $subs_year_value;?>" data-validation="required"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  >
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ بداية الإشتراك</label>
                        <input type="text" name="subs_date_from" id="subs_date_from"  data-validation="required"
                               value="<?php echo $subs_date_from;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ نهاية الإشتراك</label>
                        <input type="text" name="subs_date_to" id="subs_date_to"  data-validation="required"
                               value="<?php echo $subs_date_to;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ التحديث</label>
                        <input type="text" name="updates_date" id="updates_date"  data-validation="required"
                               value="<?php echo $updates_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">طريقة السداد</label>
                        <select id="pay_method_id_fk" data-validation="required" class="form-control bottom-input"
                                name="pay_method_id_fk" onchange="GetPayType(this.value)">
                            <option value="">إختر</option>
                            <?php
                            $pay_arr =array('','نقدي','تحويل','شيك','بنك');
                            for($s=1;$s<sizeof($pay_arr);$s++){
                                ?>
                                <option value="<?php echo $s;?>"
                                    <?php  if(!empty($pay_method_id_fk)){ if($s == $pay_method_id_fk){ echo 'selected'; } }
                                    ?>> <?php echo$pay_arr[$s];?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">إسم البنك</label>
                    <select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input"
                        <?php if($pay_method_id_fk !=2 && $pay_method_id_fk !=4){ ?> disabled="disabled" <?php }?> aria-required="true">
                        <?php $yes_no = array('لا', 'نعم'); ?>
                        <option value="">إختر</option>
                        <?php if (!empty($banks)) {
                            foreach ($banks as $bank) {
                                $select = '';

                                if(!empty($bank_id_fk)){
                                    if($bank_id_fk ==$bank->id){
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $bank->id; ?>"
                                    <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>
                            <?php }
                        } ?>
                    </select>
                    </div>

                    <div class="form-group col-sm-3 col-xs-12">
                        <label class="label top-label">رقم الحساب</label>
                        <input type="text" name="bank_account_num" id="bank_account_num"  <?php if($pay_method_id_fk !=2 && $pay_method_id_fk !=4){ ?> disabled="disabled" <?php }?>   onkeyup="length_hesab_om($(this).val());"
                               value="<?=$bank_account_num?>"
                               class="form-control bottom-input "
                               data-validation-has-keyup-event="true">

                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                    </div>


                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">حالة العضوية</label>
                        <select name="membership_status" id="membership_status" class="form-control bottom-input"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php $membership_status_arr =array(0=>'غير نشط',1=>'نشط');
                            for($s=0;$s<sizeof($membership_status_arr);$s++){
                                ?>
                                <option value="<?php echo $s;?>"
                                    <?php if($membership_status !=''){ if($membership_status == $s){ echo'selected'; } }
                                    ?> > <?php echo$membership_status_arr[$s];?></option >
                                <?php
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة قرار المجلس </label>
                        <input id="qrar_magls_img"  name="qrar_magls_img"    style="padding: 0;"   class=" form-control bottom-input" type="file">
                        <?php if(!empty($qrar_magls_img)){?>
                            <a data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $qrar_magls_img;?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة الحساب البنكي </label>
                        <input id="bank_account_img" onchange="readURL(this);" name="bank_account_img"   <?php if($pay_method_id_fk !=2 && $pay_method_id_fk !=4){ ?> disabled="disabled" <?php }?>   style="padding: 0;" class=" form-control bottom-input" type="file">
                        <?php if(!empty($bank_account_img)){?>
                            <a  data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                                onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $bank_account_img;?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php  } ?>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="save" value="save"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/all_Finance_resource_views/general_assembly/general_assembly_person_data');?>
    <!------ table -------->

<!----- end table ------>

<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="my_image" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    jQuery(function($){

        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>


    function GetPayType(valu) {
        if(valu ==2 || valu ==4){

            document.getElementById("bank_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("bank_id_fk").setAttribute("data-validation", "required");
            document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");
            document.getElementById("bank_account_num").setAttribute("data-validation", "required");
            document.getElementById("bank_account_img").removeAttribute("disabled", "disabled");
            document.getElementById("bank_account_img").setAttribute("data-validation", "required");
        } else {
            document.getElementById("bank_id_fk").value='';
            document.getElementById("bank_account_num").value='';
            document.getElementById("bank_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("bank_account_num").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_num").removeAttribute("data-validation", "required");
            document.getElementById("bank_account_img").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_img").removeAttribute("data-validation", "required");

        }


    }

</script>

<script>
    function length_hesab_om(length) {
        var len = length.length;

        if (len < 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>



