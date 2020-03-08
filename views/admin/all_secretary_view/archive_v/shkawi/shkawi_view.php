
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <div class="col-xs-12 no-padding">
                <?php
                 if ($_SESSION['role_id_fk']==1){
                     ?>
                     <div class="alert alert-danger">عفوا... لابد من أن تكون موظف !</div>
                <?php
                 } else{
                      if (isset($emp_data) && !empty($emp_data)){
                          $emp_name = $emp_data->employee;
                          $emp_code = $emp_data->emp_code ;
                          $emp_edara_id = $emp_data->administration ;
                          $emp_edara_n = $emp_data->edara_n ;
                          $emp_qsm_id = $emp_data->department ;
                          $emp_qsm_n = $emp_data->qsm_n ;
                      } else{
                          $emp_name = '';
                          $emp_code = '' ;
                          $emp_edara_id = '' ;
                          $emp_edara_n = '' ;
                          $emp_qsm_id = '' ;
                          $emp_qsm_n = '' ;
                      }
                      if (isset($get_shkwa)&& !empty($get_shkwa)){
                          echo form_open_multipart('all_secretary/archive/shkawi/Shkawi/update_shkwa/'.$get_shkwa->rkm);
                          $rkm = $get_shkwa->rkm ;
                          $type = $get_shkwa->type ;
                          $type_n = $get_shkwa->type_n ;
                          $sender_code = $get_shkwa->sender_code ;
                          $sender_id_fk = $get_shkwa->sender_id_fk ;
                          $sender_name = $get_shkwa->sender_name ;
                      } else{

                          echo form_open_multipart('all_secretary/archive/shkawi/Shkawi/add_shkwa');

                      }
                     ?>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label"> تاريخ اليوم </label>
                         <input type="date" name="send_date"
                                value="<?= date('Y-m-d')?>"
                                class="form-control  "  readonly>

                     </div>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label">   اسم الموظف</label>
                         <input type="text" name="sender_name"
                                value="<?= $emp_name?>"
                                class="form-control  "  readonly>
                         <input type="hidden" name="sender_code" class="form-control" value="<?= $emp_code?>">
                         <input type="hidden" name="sender_id_fk" class="form-control" value="<?= $_SESSION['emp_code']?>">

                     </div>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label">    الادارة</label>
                         <input type="text" name="sender_edara_n"
                                value="<?= $emp_edara_n?>"
                                class="form-control"  readonly>
                         <input type="hidden" name="sender_edara_fk" class="form-control" value="<?= $emp_edara_id?>">

                     </div>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label">    القسم</label>
                         <input type="text" name="sender_qsm_n"
                                value="<?= $emp_qsm_n?>"
                                class="form-control  "  readonly>
                         <input type="hidden" name="sender_qsm_fk" class="form-control" value="<?= $emp_qsm_id?>">

                     </div>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <?php
                          $type_arr = array('1'=>'شكوي','2'=>'شكر','3'=>'تقييم');
                         ?>
                         <label class="label">    نوع الرساله</label>
                          <select  name="m_type" class="form-control  " data-validation='required'>
                              <option value="">اختر</option>
                              <?php
                               foreach ($type_arr as $key=>$value){
                                   ?>
                                   <option value="<?= $key?>-<?=$value?>"><?= $value?></option>
                              <?php
                               }
                              ?>

                          </select>
                     </div>
                     <div class="form-group col-xs-2 no-padding">
                         <input type="hidden" name="input_from_rokect" id="input_from_rokect" value="0">

                         <label class="label "> الي</label>
                         <input type="text" class="form-control"
                                placeholder=""  style="width: 80%;float: right;"
                                name="to_user_n" id="to_user_n"
                                readonly="readonly"
                                data-toggle="modal"
                                data-target="#tahwelModal"
                                value="">

                         <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                         <input type="hidden" name="tawel_id" id="tawel_id" value="">
                         <button type="button"
                                 data-toggle="modal"
                                 data-target="#tahwelModal"
                                 class="btn btn-success btn-next">
                             <i class="fa fa-plus"></i></button>


                             <ol style="display: none">

                             </ol>



                     </div>
                     <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                         <label class="label">    نص الرساله</label>
                         <textarea name="content" class="form-control " id="" data-validation='required'>

                         </textarea>

                     </div>
                     <div class="col-md-5 ">
                         <button type="submit"  style="border-radius: 2px; margin-top: 44px;" id="add" name="add" value="add" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> إرسال

                         </button>
                     </div>

                <?php
                 }
                ?>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="esnad3" name="esnad_to" class="sarf_types" value="3"
                               onclick="load_tahwel()">
                        <label for="esnad3" class="radio-label"> اداره</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad2" name="esnad_to" class="sarf_types" value="2" onclick="load_tahwel()">

                        <label for="esnad2" class="radio-label"> قسم</label>
                    </div>

                    <div class="radio-content">
                        <input type="radio" id="esnad1" name="esnad_to" class="sarf_types" value="1"
                               onclick="load_tahwel()">
                        <label for="esnad1" class="radio-label"> موظف</label>
                    </div>
                </div>
                <div class="col-xs-12" id="tawel_result" style="display: none;">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>

    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
        //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/shkawi/Shkawi/load_tahwel',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result").html(html);

            }

        });

    }

</script>
<script>

    function GettahwelName(id, name, type,code) {
        var checkBox = document.getElementById("myCheck" + id + type);
        var fieldHTML = '<div><input type="hidden" name="reciver_id_fk[]" value=""/></div>';
        if (checkBox.checked == true) {
          //  $('#text111').hide();
            $("ol").append("<li name=f id='" + id + "'>" + name + "</li>");
            $('#to_user_n').append("<input type='hidden'  id='to_user_fk" + id + "' name='reciver_id_fk[]' value='" + id + "'/>" +
                "<input type='hidden'  data-validation='required' id='to_user_fk_name" + id + "'  name='reciver_name[]' value='" + name + "'/>" +
                "<input type='hidden'   id='to_user_fk_code" + id + "'  name='reciver_code[]' value='" + code + "'/>" +
                "<input type='hidden'   id='type" + id + "' name='type[]' value='" + type + "'/>");
            $('#to_user_n').val(name);

        } else {
            $("#" + id).remove();
            $("#id" + id).remove();
            $("#n" + id).remove();
            $("#type" + id).remove();

            if (checkBox == '') {
              //  $('#text111').show();
            }

        }



    }

</script>
