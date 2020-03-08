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


    $card_num=$result->card_num;
    $gender=$result->gender;
    $nationality_id =$result->nationality;
    $marital_status=$result->marital_status;
    $esdar_geha=$result->esdar_geha;
    $esdar_date=$result->esdar_date;
    $birth_date=$result->birth_date;
    $mob=$result->mob;
    $another_mob=$result->another_mob;
    $city_id_fk=$result->city_id_fk;
    $hai_id_fk=$result->hai_id_fk;
    $street_name=$result->street_name;
    $adress=$result->adress;
    $email=$result->email;
    $degree=$result->degree;
    $scientific_qualification_id_fk =$result->scientific_qualification_id_fk;
    $working_life=$result->working_life;
    $job=$result->job;
    $employer_id=$result->employer;
    $work_adress=$result->work_adress;
    $work_mobile=$result->work_mobile;
    $location_google_lng=$result->location_google_lng;
    $location_google_lat=$result->location_google_lat;
    $img =$result->img ;
    $id_img =$result->id_img;
    $array_date=explode("/",$birth_date);
    if(isset($array_date[2])){
        $age = $current_hijry_year - $array_date[2];
    }else{
        $age ="";
    }

    $out['form']='Directors/General_assembly/update_member_maindata/'.$this->uri->segment(4);
}else{


    $membership_num ='';
    $qrar_num ='';
    $qrar_date ='';
    $subscription_value ='';
    $subscription_start_date ='';
    $subscription_end_date ='';
    $update_date ='';
    $pay_type ='';


    $img ='';
    $id_img ='';
    $out['form']='Directors/General_assembly/add_membership_data';
}
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
                        $this->load->view('admin/directors/general_assembly/drop_down_menu', $data_load);
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
                                        <?php if($row->id_setting==$gender){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> رقم العضوية </label>
                        <input type="text" name="membership_num" id="membership_num"
                               value="<?php echo $membership_num;?>"
                               class="form-control bottom-input"
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
                        <input type="text" name="subscription_value" id="subscription_value" onkeypress="validate_number(event)"
                               value="<?php echo $subscription_value;?>" data-validation="required"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  >
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ بداية الإشتراك</label>
                        <input type="text" name="subscription_start_date" id="subscription_start_date"  data-validation="required"
                               value="<?php echo $subscription_start_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ نهاية الإشتراك</label>
                        <input type="text" name="subscription_end_date" id="subscription_end_date"  data-validation="required"
                               value="<?php echo $subscription_end_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ نهاية الإشتراك</label>
                        <input type="text" name="update_date" id="update_date"  data-validation="required"
                               value="<?php echo $update_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">طريقة السداد</label>
                        <select id="pay_type" data-validation="required" class="form-control bottom-input"
                                name="pay_type" onchange="GetPayType(this.value)">
                            <option value="">إختر</option>
                            <?php
                            $pay_arr =array('','نقدي','تحويل','شيك','بنك');
                            for($s=1;$s<sizeof($pay_arr);$s++){
                                ?>
                                <option value="<?php echo $s;?>"
                                    <?php if($s == $pay_type){ echo 'selected'; } ?>> <?php echo$pay_arr[$s];?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">إسم البنك</label>
                    <select name="bank_id_fk" id="m_account_id" class="form-control bottom-input" data-validation="required" aria-required="true">
                        <?php $yes_no = array('لا', 'نعم'); ?>
                        <option value="">إختر</option>
                        <?php if (!empty($banks)) {
                            foreach ($banks as $bank) {
                                $select = ''; ?>
                                <option value="<?php echo $bank->id; ?>-<?php echo $bank->bank_code; ?>"
                                    <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>
                            <?php }
                        } ?>
                    </select>
                    </div>

                    <div class="form-group col-sm-3 col-xs-12">
                        <label class="label top-label">رقم الحساب</label>
                        <input type="text" name="bank_account_num" id="hesab_bank_2"  data-validation="required"  onkeyup="length_hesab_om($(this).val());"
                               value=""
                               class="form-control bottom-input "
                               data-validation-has-keyup-event="true">

                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">حالة العضوية</label>
                        <select name="bank_id_fk" id="m_account_id" class="form-control bottom-input" data-validation="required" aria-required="true">
                            <option value="">إختر</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة قرار المجلس </label>
                        <input id="qrar_img"  name="qrar_img"    style="padding: 0;" class=" form-control bottom-input" type="file">
                        <?php if(!empty($qrar_img)){?>
                            <a data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $qrar_img;?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة الحساب البنكي </label>
                        <input id="bank_img" onchange="readURL(this);" name="bank_img"    style="padding: 0;" class=" form-control bottom-input" type="file">
                        <?php if(!empty($bank_img)){?>
                            <a  data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                                onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $bank_img;?>');">
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
    <?php  $this->load->view('admin/directors/general_assembly/general_assembly_person_data');?>
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

            document.getElementById("job_title").removeAttribute("disabled", "disabled");
            document.getElementById("work_mobile").setAttribute("data-validation", "required");
        } else {
            document.getElementById("job_title").setAttribute("disabled", "disabled");
            document.getElementById("work_mobile").removeAttribute("data-validation", "required");

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



