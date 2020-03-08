<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
       .top-label {
        font-size: 13px;
        background-color: #5f9007  !important;
            border: 2px solid #5f9007  !important;
                text-shadow: none !important;
               font-weight: 500 !important;
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
.eye-view {
    cursor: pointer;
    position: absolute;
    left: 7px;
    top: 24px;
    font-size: 29px;
    color: #F2A516;
}

       label {
           margin-bottom: 5px !important;
           color: #002542 !important;
           display: block !important;
           text-align: right !important;
           font-size: 16px !important;
           padding: 0 !important;
           height: auto;
       }
</style>
<?php

if(isset($result->odwiat)&&!empty($result->odwiat))
{

    $no3_odwia_fk = $result->odwiat->no3_odwia_fk;

    if (isset($result->odwiat->rkm_odwia) ){
       // if ($no3_odwia_fk==102 || $no3_odwia_fk==103){
            $rkm_odiwa = $result->odwiat->rkm_odwia_full;
       // }
       // else{
            //$rkm_odiwa = $result->odwiat->rkm_odwia;
      //  }


    }



    $qrar_rkm = $result->odwiat->qrar_rkm;
    $subs_value = $result->odwiat->subs_value;
    $pay_method_fk = $result->odwiat->pay_method_fk ;
    $bank_id_fk = $result->odwiat->bank_id_fk ;
    $rkm_hesab = $result->odwiat->rkm_hesab ;
    $odwia_status_fk = $result->odwiat->odwia_status_fk ;



}else{
    $rkm_odwia_full = '';

    $rkm_odiwa = $odwia_rkm +1 .'/'. $main_data;
    $no3_odwia_fk = '';
    $qrar_rkm ='';
    $subs_value ='';
    $pay_method_fk ='';
    $bank_id_fk ='';
    $rkm_hesab ='';
    $odwia_status_fk ='';

}

    $out['form']='md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$this->uri->segment(5);

?>
<?php
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result->odwiat) && !empty($result->odwiat)){
                        //  $data_load["emp_code"]= $personal_data[0]->emp_code;
                        $data_load["id"]=$result->odwiat->id ;
                        $this->load->view('admin/md/all_gam3ia_omomia_members/drop_down_menu', $data_load);
                    }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">نوع العضوية </label>
                        <select name="no3_odwia_fk" id="no3_odwia_fk"
                                data-validation="required"   class="form-control "
                                aria-required="true"
                                <?php
                                if(isset($result->odwiat)&&!empty($result->odwiat))
                                {

                                ?>
                                onchange="changeOdwia()"
                        <?php } else { ?>
                                    onchange="changeOdwia_insert()"
                                <?php } ?>>
                            <option value="">إختر</option>
                            <?php

                            if(isset($membership_arr)&&!empty($membership_arr)) {
                                $membership_rmz=array('ع','م','ش','ف');
                                $x=0;


                                   foreach($membership_arr as $row){


                                    ?>
                                    <option data-name="<?php echo $membership_rmz[$x];?>"


                                     value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($no3_odwia_fk)){ if($row->id_setting==$no3_odwia_fk){ echo 'selected'; } } ?>>
                                        <?php echo $row->title_setting;?></option >
                                    <?php
                                       $x++;
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
                        <label class="label "> رقم العضوية </label>
                        <input type="text" name="rkm_odwia" id="rkm_odwia"
                               value="<?php echo $rkm_odiwa;?>"
                               class="form-control" readonly
                               data-validation-has-keyup-event="true"  >

                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label "> رقم القرار </label>
                        <input type="text" name="qrar_rkm" id="qrar_num" onkeypress="validate_number(event)"
                               value="<?php echo $qrar_rkm;?>" data-validation="required"
                               class="form-control "
                               data-validation-has-keyup-event="true"  >
                    </div>



                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">
                            <img style="width: 18px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ القرار
                            <img style="width: 18px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-2" style="width: 50%;float: right;">
                            <input id="date-Hijri" name="qrar_date_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCal2()" value="<?php  if(!empty($result->odwiat->qrar_date_h)){ echo $result->odwiat->qrar_date_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-1" style="width: 50%;float: left;">
                            <input id="date-Miladi" name="qrar_date_m" class="form-control bottom-input  "
                                   value="<?php  if(!empty($result->odwiat->qrar_date_m)){ echo $result->odwiat->qrar_date_m; }?>"
                                   type="text" onfocus="showCal1()"  style=" width: 100%;float: right"  />
                        </div>

                    </div>




                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">مبلغ الإشتراك السنوي </label>
                        <input type="text" name="subs_value" id="subs_year_value" onkeypress="validate_number(event)"
                               value="<?php echo $subs_value;?>" data-validation="required"
                               class="form-control "
                               data-validation-has-keyup-event="true"  >
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">
                            <img style="width: 18px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ بداية الإشتراك
                            <img style="width: 18px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-end-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-end" name="subs_from_date_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCalEnd2();" value="<?php  if(!empty($result->odwiat->subs_from_date_h)){ echo $result->odwiat->subs_from_date_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-end-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-end" name="subs_from_date_m" class="form-control bottom-input  "
                                   value="<?php  if(!empty($result->odwiat->subs_from_date_m)){ echo $result->odwiat->subs_from_date_m; }?>"
                                   type="text" onfocus="showCalEnd1();"  style=" width: 100%;float: right"  />
                        </div>

                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">
                            <img style="width: 18px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ نهاية الإشتراك
                            <img style="width: 18px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-ch-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-ch" name="subs_to_date_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCalch2();" value="<?php  if(!empty($result->odwiat->subs_to_date_h)){ echo $result->odwiat->subs_to_date_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-ch-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-ch" name="subs_to_date_m" class="form-control bottom-input  "
                                   value="<?php  if(!empty($result->odwiat->subs_to_date_m)){ echo $result->odwiat->subs_to_date_m; }?>"
                                   type="text" onfocus="showCalch1();"  style=" width: 100%;float: right"  />
                        </div>

                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">
                            <img style="width: 18px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ التحديث
                            <img style="width: 18px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-up-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-up" name="update_date_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCalup2()" value="<?php  if(!empty($result->odwiat->update_date_h)){ echo $result->odwiat->update_date_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-up-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-up" name="update_date_m" class="form-control bottom-input  "
                                   value="<?php  if(!empty($result->odwiat->update_date_h)){ echo $result->odwiat->update_date_h; }?>"
                                   type="text" onfocus="showCalup1();"  style=" width: 100%;float: right"  />
                        </div>

                    </div>
                    <!--                    osama -->

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">طريقة السداد</label>
                        <select id="pay_method_id_fk" data-validation="required" class="form-control "
                                name="pay_method_fk" onchange="GetPayType(this.value)">
                            <option value="">إختر</option>
                            <?php
                          //  $pay_arr =array('','نقدي','تحويل','شيك','بنك');
                             $pay_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');


                            for($s=1;$s<sizeof($pay_arr);$s++){
                                ?>
                                <option value="<?php echo $s;?>"
                                    <?php  if(!empty($pay_method_fk)){ if($s == $pay_method_fk){ echo 'selected'; } }
                                    ?>> <?php echo$pay_arr[$s];?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">إسم البنك</label>
                    <select name="bank_id_fk" id="bank_id_fk" class="form-control"
                        <?php if($pay_method_fk!=2 && $pay_method_fk !=4){ ?> disabled="disabled" <?php }?> aria-required="true">
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

                    <div class="form-group col-sm-3 col-xs-12 padding-4">
                        <label class="label ">رقم الحساب</label>
                        <input type="text" name="rkm_hesab" id="bank_account_num"  <?php
                        if($pay_method_fk !=2 && $pay_method_fk !=4){ ?> disabled="disabled" <?php }?>   onkeyup="length_hesab_om($(this).val());"
                               value="<?php $rkm_hesab?>"
                               class="form-control  "
                               data-validation-has-keyup-event="true" >

                      <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                    </div>
                    
                    
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label " style="width: 100%">صورة الحساب البنكي </label>
                        <input id="bank_account_img" onchange="readURL(this);" name="rkm_hesab_morfq"   style="padding: 0;" class=" form-control " type="file">
                        <?php if(!empty($bank_account_img)){?>
                            <a  data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                                onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $bank_account_img;?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php  } ?>
                    </div>
                    
                    </div>
                    
                      <div class="col-md-12">
                    
                          <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label " style="width: 100%">صورة قرار المجلس </label>
                        <input id="qrar_magls_img"  name="qrar_mgls_morfq"    style="padding: 0;"   class=" form-control " type="file">
                        <?php if(!empty($qrar_magls_img)){?>
                            <a data-toggle="modal" data-target="#myModal-view" class="eye-view" type="button" style="cursor: pointer"
                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $qrar_magls_img;?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php } ?>
                    </div>
                    
                     <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">حالة العضوية</label>
                        <select name="odwia_status_fk" onchange="check_odwia_status($(this).val())" id="membership_status" class="form-control"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php $membership_status_arr =array(0=>'غير نشط',1=>'نشط');
                            for($s=0;$s<sizeof($membership_status_arr);$s++){
                                ?>
                                <option value="<?php echo $s;?>"
                                    <?php if($odwia_status_fk !=''){ if($odwia_status_fk == $s){ echo'selected'; } }
                                    ?> > <?php echo$membership_status_arr[$s];?></option >
                                <?php
                            }?>
                        </select>
                    </div>

      <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">السبب</label>
                        <textarea name="odwia_status_reason" class="form-control reason"  cols="30" rows="2" disabled=""></textarea>
                    </div>
                   
                </div>
    


                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br />

                        <button type="submit"
                                class="btn btn-labeled btn-success " id="save" name="save" value="save" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                     
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/md/all_gam3ia_omomia_members/person_data');?>
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
/*

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
*/
    function GetPayType(valu) {
        //if(valu ==2 || valu ==4){
            if(valu ==6){
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

        function check_odwia_status(value) {
            if(value ==1){
                $('.reason').removeAttr('disabled');

            } else if(value ==0){

                $('.reason').attr('disabled',true);
            }

        }

    </script>
<script>
    function length_hesab_om(length) {
        var len = length.length;

        if (len < 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        else if (len > 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
       else  if (len == 24) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>



<script src='<?php echo base_url();?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/calendar.js'></script>
<script>



    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    <?php
    if(!isset($result->odwiat)&& empty($result->odwiat))
    { ?>
    date1.setAttribute("value",cal1.getDate().getDateString());
    date2.setAttribute("value",cal2.getDate().getDateString());
    <?php }?>

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();


    <?php
    if(!isset($result->odwiat)&& empty($result->odwiat))
    { ?>
    setDateFields1();
    <?php }?>

    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function() {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function() {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();


        date1.setAttribute("value",cal1.getDate().getDateString());
        date2.setAttribute("value",cal2.getDate().getDateString());


    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }




</script>

<script>


        var calEnd1 = new Calendar(),
            calEnd2 = new Calendar(true, 0, true, true),
            dateEnd1 = document.getElementById('date-Miladi-end'),
            dateEnd2 = document.getElementById('date-Hijri-end'),
            calEnd1Mode = calEnd1.isHijriMode(),
            calEnd2Mode = calEnd2.isHijriMode();

        <?php
        if(!isset($result->odwiat)&& empty($result->odwiat))
        { ?>
        dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
        <?php }?>

        document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
        document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



        calEnd1.show();
        calEnd2.show();

        <?php
        if(!isset($result->odwiat)&& empty($result->odwiat))
        { ?>
        setDateFieldsEnd1();
        <?php }?>




        calEnd1.callback = function () {
            if (calEnd1Mode !== calEnd1.isHijriMode()) {
                calEnd2.disableCallback(true);
                calEnd2.changeDateMode();
                calEnd2.disableCallback(false);
                calEnd1Mode = calEnd1.isHijriMode();
                calEnd2Mode = calEnd2.isHijriMode();
            } else

                calEnd2.setTime(calEnd1.getTime());
            setDateFieldsEnd1();
        };

        calEnd2.callback = function () {
            if (calEnd2Mode !== calEnd2.isHijriMode()) {
                calEnd1.disableCallback(true);
                calEnd1.changeDateMode();
                calEnd1.disableCallback(false);
                calEnd1Mode = calEnd1.isHijriMode();
                calEnd2Mode = calEnd2.isHijriMode();
            } else

                calEnd1.setTime(calEnd2.getTime());
            setDateFieldsEnd1();
        };





        calEnd1.onHide = function() {
            calEnd1.show(); // prevent the widget from being closed
        };

        calEnd2.onHide = function() {
            calEnd2.show(); // prevent the widget from being closed
        };





        function setDateFieldsEnd1() {
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();

            dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
            dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());


        }




        function showCalEnd1() {
            if (calEnd1.isHidden())
                calEnd1.show();
            else
                calEnd1.hide();
        }

        function showCalEnd2() {

            if (calEnd2.isHidden())
                calEnd2.show();

            else
                calEnd2.hide();







        }


        //# sourceURL=pen.js

    </script>

<script>



        var calch1 = new Calendar(),
            calch2 = new Calendar(true, 0, true, true),
            datech1 = document.getElementById('date-Miladi-ch'),
            datech2 = document.getElementById('date-Hijri-ch'),
            calch1Mode = calch1.isHijriMode(),
            calch2Mode = calch2.isHijriMode();

        <?php
        if(!isset($result->odwiat)&& empty($result->odwiat))
        { ?>
        datech1.setAttribute("value",calch1.getDate().getDateString());
        datech2.setAttribute("value",calch2.getDate().getDateString());
        <?php }?>

        document.getElementById('cal-ch-1').appendChild(calch1.getElement());
        document.getElementById('cal-ch-2').appendChild(calch2.getElement());


        calch1.show();
        calch2.show();


        <?php
        if(!isset($result->odwiat)&& empty($result->odwiat))
        { ?>
        setDateFieldsch1();
        <?php }?>

        calch1.callback = function () {
            if (calch1Mode !== calch1.isHijriMode()) {
                calch2.disableCallback(true);
                calch2.changeDateMode();
                calch2.disableCallback(false);
                calch1Mode = calch1.isHijriMode();
                calch2Mode = calch2.isHijriMode();
            } else

                calch2.setTime(calch1.getTime());
            setDateFieldsch1();
        };

        calch2.callback = function () {
            if (calch2Mode !== calch2.isHijriMode()) {
                calch1.disableCallback(true);
                calch1.changeDateMode();
                calch1.disableCallback(false);
                calch1Mode = calch1.isHijriMode();
                calch2Mode = calch2.isHijriMode();
            } else

                calch1.setTime(calch2.getTime());
            setDateFieldsch1();
        };


        calch1.onHide = function() {
            calch1.show(); // prevent the widget from being closed
        };

        calch2.onHide = function() {
            calch2.show(); // prevent the widget from being closed
        };
        function setDateFieldsch1() {
            datech1.value = calch1.getDate().getDateString();
            datech2.value = calch2.getDate().getDateString();


            datech1.setAttribute("value",calch1.getDate().getDateString());
            datech2.setAttribute("value",calch2.getDate().getDateString());


        }

        function showCalch1() {
            if (calch1.isHidden())
                calch1.show();
            else
                calch1.hide();
        }

        function showCalch2() {
            if (calch2.isHidden())
                calch2.show();
            else
                calch2.hide();
        }




    </script>


<script>
    var calup1 = new Calendar(),
    calup2 = new Calendar(true, 0, true, true),
    dateup1 = document.getElementById('date-Miladi-up'),
    dateup2 = document.getElementById('date-Hijri-up'),
    calup1Mode = calup1.isHijriMode(),
    calup2Mode = calup2.isHijriMode();

    <?php
    if(!isset($result->odwiat)&& empty($result->odwiat))
    { ?>
    dateup1.setAttribute("value",calup1.getDate().getDateString());
    dateup2.setAttribute("value",calup2.getDate().getDateString());
    <?php }?>

    document.getElementById('cal-up-1').appendChild(calup1.getElement());
    document.getElementById('cal-up-2').appendChild(calup2.getElement());


    calup1.show();
    calup2.show();


    <?php
    if(!isset($result->odwiat)&& empty($result->odwiat))
    { ?>
    setDateFieldsup1();
    <?php }?>

    calup1.callback = function () {
    if (calup1Mode !== calup1.isHijriMode()) {
    calup2.disableCallback(true);
    calup2.changeDateMode();
    calup2.disableCallback(false);
    calup1Mode = calup1.isHijriMode();
    calup2Mode = calup2.isHijriMode();
    } else

    calup2.setTime(calup1.getTime());
    setDateFieldsup1();
    };

    calup2.callback = function () {
    if (calup2Mode !== calup2.isHijriMode()) {
    calup1.disableCallback(true);
    calup1.changeDateMode();
    calup1.disableCallback(false);
    calup1Mode = calup1.isHijriMode();
    calup2Mode = calup2.isHijriMode();
    } else

    calup1.setTime(calup2.getTime());
    setDateFieldsup1();
    };


    calup1.onHide = function() {
    calup1.show(); // prevent the widget from being closed
    };

    calup2.onHide = function() {
    calup2.show(); // prevent the widget from being closed
    };
    function setDateFieldsup1() {
    dateup1.value = calup1.getDate().getDateString();
    dateup2.value = calup2.getDate().getDateString();


    dateup1.setAttribute("value",calup1.getDate().getDateString());
    dateup2.setAttribute("value",calup2.getDate().getDateString());


    }

    function showCalup1() {
    if (calup1.isHidden())
    calup1.show();
    else
    calup1.hide();
    }

    function showCalup2() {
    if (calup2.isHidden())
    calup2.show();
    else
    calup2.hide();
    }




    </script>
    
    <script>
        function changeOdwia() {


            var no3_odwia_fk = $('#no3_odwia_fk option:selected').attr('data-name');


            var odwia = '<?=$odwia_rkm .'/'. $main_data ?>';
            //var odwia = '<?=$rkm_odiwa ?>';
            var  full = odwia+'/' + no3_odwia_fk;

            $('#rkm_odwia').val(full);

        }
    </script>
    <script>
        function changeOdwia_insert() {
            $('#rkm_odwia').val('');
            var rkm= '<?= $rkm_odiwa ?>' ;

            var no3_odwia_fk = $('#no3_odwia_fk').val();

            var rkm_odwia = $('#rkm_odwia').val();


            if ( no3_odwia_fk ==102){

                $('#rkm_odwia').val(rkm_odwia);
                var rkm_full = rkm +  '/ع' ;
                $('#rkm_odwia').val(rkm_full);

            }
            else if(no3_odwia_fk ==103){
                var rkm_full = rkm +  '/م' ;
                $('#rkm_odwia').val(rkm_full);

            }

            else if(no3_odwia_fk ==104){
                var rkm_full = rkm +  '/ش' ;
                $('#rkm_odwia').val(rkm_full);

            }
            else if(no3_odwia_fk ==106){
                $('#rkm_odwia').val('');
                var rkm_full = rkm +'/ف' ;
                $('#rkm_odwia').val(rkm_full);

            }

            else {

                $('#rkm_odwia').val(rkm);

            }

        }
    </script>