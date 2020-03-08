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

    $out['form']='Directors/General_assembly/add_membership_data/'.$this->uri->segment(4);

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
                        <label class="label top-label">
                            <img style="width: 23px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ القرار
                            <img style="width: 23px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-2" style="width: 50%;float: right;">
                            <input id="date-Hijri" name="qrar_date_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCal2()" value="<?php  if(!empty($result->qrar_date_h)){ echo $result->qrar_date_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-1" style="width: 50%;float: left;">
                            <input id="date-Miladi" name="qrar_date" class="form-control bottom-input  "
                                   value="<?php  if(!empty($result->qrar_date)){ echo $result->qrar_date; }?>"
                                   type="text" onfocus="showCal1()"  style=" width: 100%;float: right"  />
                        </div>

                    </div>




                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">مبلغ الإشتراك السنوي </label>
                        <input type="text" name="subs_year_value" id="subs_year_value" onkeypress="validate_number(event)"
                               value="<?php echo $subs_year_value;?>" data-validation="required"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  >
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">
                            <img style="width: 23px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ بداية الإشتراك
                            <img style="width: 23px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-end-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-end" name="subs_date_from_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCalEnd2();" value="<?php  if(!empty($result->subs_date_from_h)){ echo $result->subs_date_from_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-end-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-end" name="subs_date_from" class="form-control bottom-input  "
                                   value="<?php  if(!empty($result->subs_date_from)){ echo $result->subs_date_from; }?>"
                                   type="text" onfocus="showCalEnd1();"  style=" width: 100%;float: right"  />
                        </div>

                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">
                            <img style="width: 23px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ نهاية الإشتراك
                            <img style="width: 23px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-ch-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-ch" name="subs_date_to_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCalch2();" value="<?php  if(!empty($result->subs_date_to_h)){ echo $result->subs_date_to_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-ch-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-ch" name="subs_date_to" class="form-control bottom-input  "
                                   value="<?php  if(!empty($result->subs_date_to)){ echo $result->subs_date_to; }?>"
                                   type="text" onfocus="showCalch1();"  style=" width: 100%;float: right"  />
                        </div>

                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">
                            <img style="width: 23px;float: right;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ التحديث
                            <img style="width: 23px;float: left;    margin-top: -5px;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-up-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-up" name="updates_date_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCalup2()" value="<?php  if(!empty($result->updates_date_h)){ echo $result->updates_date_h; }?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-up-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-up" name="updates_date" class="form-control bottom-input  "
                                   value="<?php echo $updates_date; ?>"
                                   type="text" onfocus="showCalup1();"  style=" width: 100%;float: right"  />
                        </div>

                    </div>
                    <!--                    osama -->

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

                    <div class="form-group col-sm-3 col-xs-12 padding-4">
                        <label class="label top-label">رقم الحساب</label>
                        <input type="text" name="bank_account_num" id="bank_account_num"  <?php if($pay_method_id_fk !=2 && $pay_method_id_fk !=4){ ?> disabled="disabled" <?php }?>   onkeyup="length_hesab_om($(this).val());"
                               value="<?=$bank_account_num?>"
                               class="form-control bottom-input "
                               data-validation-has-keyup-event="true" placeholder="رقم الحساب لابد أن يكون 24 رقم">

                       <!-- <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>-->
                    </div>
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


                </div>
                <div class="col-md-12">
                   
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة قرار المجلس </label>
                        <input id="qrar_magls_img"  name="qrar_magls_img"    style="padding: 0;"   class=" form-control bottom-input" type="file">
                        <?php if(!empty($qrar_magls_img)){?>
                            <a data-toggle="modal" data-target="#myModal-view" class="eye-view" type="button" style="cursor: pointer"
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
                        <br />
                        
                      <button type="submit" class="btn btn-labeled btn-success " id="save" name="save" value="save">
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
    if(!isset($result)&& empty($result))
    { ?>
    date1.setAttribute("value",cal1.getDate().getDateString());
    date2.setAttribute("value",cal2.getDate().getDateString());
    <?php }?>

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();


    <?php
    if(!isset($result)&& empty($result))
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
        if(!isset($result)&& empty($result))
        { ?>
        dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
        <?php }?>

        document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
        document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



        calEnd1.show();
        calEnd2.show();

        <?php
        if(!isset($result)&& empty($result))
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
        if(!isset($result)&& empty($result))
        { ?>
        datech1.setAttribute("value",calch1.getDate().getDateString());
        datech2.setAttribute("value",calch2.getDate().getDateString());
        <?php }?>

        document.getElementById('cal-ch-1').appendChild(calch1.getElement());
        document.getElementById('cal-ch-2').appendChild(calch2.getElement());


        calch1.show();
        calch2.show();


        <?php
        if(!isset($result)&& empty($result))
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
    if(!isset($result)&& empty($result))
    { ?>
    dateup1.setAttribute("value",calup1.getDate().getDateString());
    dateup2.setAttribute("value",calup2.getDate().getDateString());
    <?php }?>

    document.getElementById('cal-up-1').appendChild(calup1.getElement());
    document.getElementById('cal-up-2').appendChild(calup2.getElement());


    calup1.show();
    calup2.show();


    <?php
    if(!isset($result)&& empty($result))
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