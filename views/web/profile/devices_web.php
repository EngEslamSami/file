
<style type="text/css">

    .nav-pills>li.active>a,
    .nav-pills>li.active>a:hover,
    .nav-pills>li.active>a:focus {
        color: #fff;
        background-color: #008996;
        border-radius: 0;
    }
    .mother_forms_web .nav-pills {
        height: 400px;
        background-color: #fff;
        padding-left: 0;
        box-shadow: 0px 0px 2px #c2c6c5;
        border-left: 1px solid #eee;
    }
    .mother_forms_web .nav-pills>li>a {
        color: #008996;
        border-radius: 0;
        border-bottom: 1px solid #eee;
    }
    .mother_forms_web .nav-pills>li.active>a{
        color: #fff;
    }
    .mother_forms_web .tab-content{
        border-top: 2px solid #008996;
        background-color: #fff;
        min-height: 400px;
        padding-top: 10px;
    }


    .half{
        width: 50% !important;
        float: right !important;

    }
    .label-green {
        color: #fff;
        background-color: #008996;
        border: 2px solid #008996;
    }


    .main-label{
        height: 34px;
        line-height: 25px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        text-align: right !important;
        border-radius: 0;
    }
    .input-style{
        border-radius: 0px;
        border-right: transparent;
    }
    .padding-4{
        padding-right: 4px;
        padding-left: 4px;
    }
    .btn-default.btn-save {
        color: #fff;
        background-color: #008996;
        border-color: #000;
        margin-top: 10px !important;
        text-shadow: none;
        font-size: 14px;
        padding: 12px 30px;
        border:1px solid;
    }
    .btn-default.btn-save:hover {
        color: #008996;
        background-color: #fff;
        border-color: #008996;
    }
</style>

<?php  $this->load->view('web/profile/mother_data')  ; ?>


<?php if(isset($result)&&!empty($result)){ ?>

    <div class="text-center  mother_form">

        <table width="50%">
            <tr>
                <td> <h5> لتعديل بيانات ألاجهزه المطلوبه</h5></td>
                <td class="text-center">  <button class="btn" id="link_mother" onclick="hide_device_form();" style="color: #11525d;background-color: #a5dcec;">اضغط هنا  </button>
                </td>
            </tr>
        </table>
    </div>



<?php } ?>

<div class="device_form" <?php if(isset($result)&&!empty($result)){?> style="display: none;"  <?php } ?>>
<div class="tab-content col-md-10">
    <?php echo form_open('Mother_data/devices/'.$this->uri->segment(3),array('id'=>'form'))?>
    <div class="col-md-12">

        <div class="form-group col-sm-5 col-xs-12 padding-4">
            <label class="label label-green main-label  half">رقم السجل المدني للأم<strong class="astric">*</strong><strong></strong> </label>
            <input type="text" name="m_national_number"  id="m_national_number"  value="<?php echo  $this->uri->segment(3);?>"  class="form-control half input-style"  disabled="" />
        </div>
        <div class="form-group col-sm-6 col-xs-12 padding-4">
            <label class="label label-green main-label  half">إسم الأم<strong class="astric">*</strong><strong></strong> </label>
            <input type="text" name="m_name"  id="m_name"  value="<?php  if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;} else{ echo "لم يتم اضافته";}?> "  class="form-control half input-style"  disabled="" />
        </div>
        <?php if(isset($result) && $result!=null):?>
            <table class="table table-bordered" id="tab_logic" style="width=80%;">
                <thead style="color: #fff;background-color: #008996;">
                <th>م</th>
                <th style="text-align: center">نوع الجهاز</th>
                <th style="text-align: center">العدد</th>
                <th style="text-align: center">حالة الجهاز</th>
                <th style="text-align: center" >ملاحظات</th>
                <th style="text-align: center">الإجراء</th>
                </thead>
                <tbody>
                <?php
                $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                foreach($result as $row): ?>
                    <tr>
                        <td>#</td>
                        <td><?php echo $row->name; ?> </td>
                        <td><?php echo $row->d_count?></td>
                        <td><?php echo $house_device_status[$row->d_house_device_status_id_fk]?></td>
                        <td><?php echo $row->d_note?></td>
                        <td style="text-align: center">
                            <a href="#"  data-toggle="modal" data-target="#modal-delete<?php echo $row->devices_id;?>"><i class="fa fa-trash" style="font-size: 18px;color: #b14444;" aria-hidden="true"></i></a>


                            <div class="modal" id="modal-delete<?php echo$row->devices_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p id="text">هل أنت متأكد من الحذف؟</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                            <a  href="<?php  echo base_url()?>Mother_data/delete_device/<?php   echo $row->devices_id ;?>/<?php echo$this->uri->segment(3);?>"> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php endif?>
        <br>
    </div>
    <div class="col-md-12">
        <div class="form-group col-sm-8">
            <label class="label label-green main-label  half"> <?= (isset($result))? 'إضافة أجهزة اخري' : 'عدد الأجهزة' ?><strong class="astric">*</strong> <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 6px;
border-radius: 7px;">اكتب عدد الجهزه المطلوبه</span></label>
            <input type='text' id="device_num" placeholder="الرجاء إدخال في هذا الحقل ارقام فقط" class="form-control half" data-validation="required" onkeypress='validate(event)' onkeyup="return lood($('#device_num').val());" />
        </div>

    </div>
    <div class="col-md-12">
        <div id="optionearea1">
         </div>
    </div>
    <div class="col-md-12">
        <input type="hidden" name="max" id="max" />

        <div class="form-group col-sm-4">
            <input type="submit"  name="add" class="btn btn-default btn-sm btn-save mt-10"  value="حفظ " />
        </div>

    </div>

    <?php echo form_close()?>
</div>
    </div>
</div>
</section>

<script>
    function lood(num){
        if(num>0 && num != '')
        {

            var id = num;
            var dataString = 'num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Mother_data/devices/<?php echo $this->uri->segment(3); ?>',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){

                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
    }
</script>
<script>
    function validate(evt) {
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



<script>
    function hide_device_form() {

        $('.mother_form').hide();
        $('.device_form').show();



    }




</script>