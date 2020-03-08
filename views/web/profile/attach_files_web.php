
<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
       /* position: absolute;*/
    }
    .help-block.form-error{
        color: #a94442  !important;
        font-size: 15px !important;
        position: absolute !important;
        bottom: -23px !important ;
        right: 50% !important ;
    }
    .small{



    }
</style>






<?php  $this->load->view('web/profile/mother_data')  ; ?>
<?php if(isset($result)&&!empty($result)){ ?>

    <div class="text-center  mother_form">

        <table width="50%">
            <tr>
                <td> <h5>لتعديل الوثائق</h5></td>
                <td class="text-center">  <button class="btn" id="link_mother" onclick="hide_attach_form();" style="color: #11525d;background-color: #a5dcec;">اضغط هنا  </button>
                </td>
            </tr>
        </table>
    </div>



<?php } ?>


<div class="tab-content col-md-10 attach_files_form" <?php if(isset($result)&&!empty($result)){ ?> style="display:none;"   <?php } ?> >
<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">رفع الوثائق</h3>
        </div>
        <?php
        if (isset($result) && !empty($result)) {


            $death_certificate=$result[0]->death_certificate;
            $family_card=$result[0]->family_card;
            $plowing_inheritance=$result[0]->plowing_inheritance;
            $instrument_agency_with_orphans =$result[0]->instrument_agency_with_orphans;
            $birth_certificate =$result[0]->birth_certificate;
            $ownership_housing =$result[0]->ownership_housing;
            $definition_school =$result[0]->definition_school;
            $social_security_card =$result[0]->social_security_card;
            $bank_statement =$result[0]->bank_statement;
            $collected_files =$result[0]->collected_files;
            $id=$result[0]->id;
            echo form_open_multipart('Mother_data/update_attach_files/'.$this->uri->segment(3));
            $button='update';


        }else{


            $death_certificate='';
            $family_card='';
            $plowing_inheritance='';
            $instrument_agency_with_orphans ='';
            $birth_certificate ='';
            $ownership_housing ='';
            $definition_school ='';
            $social_security_card ='';
            $bank_statement ='';
            $collected_files ='';
            $id='';
            echo form_open_multipart('Mother_data/attach_files/'.$this->uri->segment(3));

            $button='add';



        }?>


        <div class="panel-body "  >
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green main-label  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
                    <input type="number" class="form-control half input-style" value="<?php echo $this->uri->segment(3);?>" readonly="readonly" />
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green main-label  half"> إسم الأم <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style" value="<?php  if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;}else{ echo "لم يتم اضافته"; } ?>" readonly="readonly" />
                </div>


            </div>


            <?php
            $arr=array('death_certificate','family_card','plowing_inheritance','instrument_agency_with_orphans','birth_certificate','ownership_housing','definition_school','social_security_card','bank_statement','collected_files');
            for($i=0;$i<10;$i++) {
                ?>
                <div class="modal" id="<?php echo $arr[$i] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                            </div>
                            <div class="modal-body">
                                <p id="text">هل أنت متأكد من الحذف؟</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                <a href="<?php echo base_url();?>Mother_data/DeleteFile/<?php echo $arr[$i] ;?>/<?php echo $this->uri->segment(3);?>">
                                    <button type="button" name="save" value="save" class="btn btn-danger remove"
                                            id="Delete-Record">نعم
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            </td>
            </tr>

                </tbody>
                </table>

            <br>
        </div>
            <table class="table table-bordered" >
                <tr>
                    <th>م </th>
                    <th>إسم الملف </th>
                    <th>إرفاق </th>
                </tr>
                <tr >
                    <td> 1 </td>
                    <td> شهادة الوفاة <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($death_certificate)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$death_certificate ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$death_certificate ?>"target="_blank" > <i class="fa fa-eye" title=" قراءة"></i> </a>


                            <a href="#"  data-toggle="modal" data-target="#death_certificate"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>


                            <?php }else{ ?>
                                <input type="file" name="death_certificate"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf </small>
                            <?php } ?>
                    </td>
                </tr>
                <tr >
                    <td>2  </td>
                    <td> كارت العائلة  <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($family_card)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$family_card ?>" download> <i class="fa fa-download"  title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$family_card ?>" target="_blank" > <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#family_card"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>


                            <?php }else{ ?>
                                <input type="file" name="family_card"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>

                    </td>
                </tr>
                <tr >
                    <td>3  </td>
                    <td> صك حرث الارث  <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($plowing_inheritance)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$plowing_inheritance ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$plowing_inheritance ?>" target="_blank" > <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#plowing_inheritance"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>


                            <?php }else{ ?>
                                <input type="file" name="plowing_inheritance"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>

                    </td>
                </tr>
                <tr >
                    <td> 4 </td>
                    <td> صك الولاية <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($instrument_agency_with_orphans)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$instrument_agency_with_orphans ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$instrument_agency_with_orphans ?>" target="_blank" > <i class="fa fa-eye" title=" قراءة"></i> </a>


                            <a href="#"  data-toggle="modal" data-target="#instrument_agency_with_orphans"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>




                        <?php }else{ ?>
                                <input type="file" name="instrument_agency_with_orphans"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>
                    </td>
                </tr>
                <tr >
                    <td> 5 </td>
                    <td> شهادات الميلاد <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($birth_certificate)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$birth_certificate ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$birth_certificate ?>" target="_blank" > <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#birth_certificate"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>

                            <?php }else{ ?>
                                <input type="file" name="birth_certificate"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>
                    </td>
                </tr>
                <tr >
                    <td> 6 </td>
                    <td> صك ملكية السكن أو عقد الايجار  <strong class="astric">*</strong></td>

                    <td>

                        <?php if (!empty($ownership_housing)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$ownership_housing ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$ownership_housing ?>"  target="_blank"> <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#ownership_housing"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>

                            <?php }else{ ?>
                                <input type="file" name="ownership_housing"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>
                    </td>
                </tr>
                <tr >
                    <td> 7 </td>
                    <td> تعريف من المدرسة بجميع الأبناء و البنات <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($definition_school)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$definition_school ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$definition_school ?>" target="_blank" > <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#definition_school"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>

                            <?php }else{ ?>
                                <input type="file" name="definition_school"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>

                    </td>
                </tr>
                <tr >
                    <td> 8 </td>
                    <td>بطاقة الضمان  الاجتماعى  <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($social_security_card)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$social_security_card ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$social_security_card ?>"  target="_blank" > <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#social_security_card"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>

                            <?php }else{ ?>
                                <input type="file" name="social_security_card"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>

                    </td>
                </tr>
                <tr >
                    <td> 9 </td>
                    <td> الحساب البنكي ( رقم الأيبان ) <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($bank_statement)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$bank_statement ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$bank_statement ?>" target="_blank"> <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#bank_statement"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>

                            <?php }else{ ?>
                                <input type="file" name="bank_statement"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>

                    </td>
                </tr>
                <tr >
                    <td> 10 </td>
                    <td>رفع جميع المستندات <strong class="astric">*</strong></td>
                    <td>

                        <?php if (!empty($collected_files)){?>

                        <a href="<?php echo base_url() . 'Mother_data/downloads/'.$collected_files ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

                        <a href="<?php echo base_url() . 'Mother_data/read_file/'.$collected_files ?>" target="_blank"> <i class="fa fa-eye" title=" قراءة"></i> </a>

                            <a href="#"  data-toggle="modal" data-target="#collected_files"><i class="fa fa-trash " style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>

                            <?php }else{ ?>
                                <input type="file" name="collected_files"   />
                                <small class="" style="bottom:-13px;">
                                    برجاء إرفاق ملف pdf
                                </small>
                            <?php } ?>

                    </td>
                </tr>
            </table>
            <div class="form-group col-xs-12">
                <button type="submit" class="btn btn-default btn-sm btn-save mt-10" name="<?php echo $button;?>" id="register_data_mother" value="add">حفظ الأن</button>


            </div>
        </div>
        <?php echo form_close()?>
    </div>
</div>
</div>
</div>
</section>
<script>
    function HandleBrowseClick()
    {
        var fileinput = document.getElementById("browse");
        fileinput.click();
    }

    function Handlechange()
    {
        var fileinput = document.getElementById("browse");
        var textinput = document.getElementById("filename");
        textinput.value = fileinput.value;
    }

</script>
<script>
    function hide_attach_form() {

        $('.mother_form').hide();
        $('.attach_files_form').show();



    }




</script>