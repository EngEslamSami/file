<style>
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .header_h5 {
        text-align: center;
        background-color: #5f9007;
        padding: 10px;
        color: #fff;
    }
    
    
    .nav-tabs>li>a {
  /*  color: #222 !important;*/
    font-weight: 500 !important;
    border: 1px solid black !important;
    background: #e4e4e4;
}
</style>


<?php
$this->load->model("familys_models/Register");
$data_load["basic_data_family"] = $basic_data_family;
$data_load["mother_num"] = $this->uri->segment(4);
$data_load["person_account"] = $basic_data_family["person_account"];
$data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
$data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
$data_load["file_num"] = $basic_data_family["file_num"];
$data_load["employees"] = $employees;
$this->load->view('admin/familys_views/drop_down_button', $data_load); ?>
<div class="col-sm-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">رفع الوثائق

            </h3>

        </div>
        <div class="panel-body">
            <!-------------------------------------------------->
            <div class="col-md-12">
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label label-green  half"> رقم السجل المدني للأب </label>
                    <input type="number" class="form-control half input-style"
                           value="<?php if (!empty($father_national_card)) {
                               echo $father_national_card;
                           } ?>" readonly="readonly"/>
                </div>
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half"> إسم الأب </label>
                    <input type="text" class="form-control half input-style"
                           value="<?php if (!empty($father_name)) {
                               echo $father_name;
                           } ?>
                    " readonly="readonly"/>
                </div>
            </div>
            <?php echo form_open_multipart('family_controllers/Family/attach_files/' . $mother_national_num,array('id'=>'attach_form')); ?>
               <?php
               $image_type =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
               $files_type =  array('pdf','PDF','xls','xlsx',',doc','docx','txt');

               ?>
            <div class="col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1"   data-toggle="tab"> 
                      <i class="fa fa-file-pdf-o" aria-hidden="true"></i>


                        وثائق اساسية</a></li>
                        <li><a href="#tab2"  data-toggle="tab">
                        <i class="fa fa-files-o" aria-hidden="true"></i>

                        وثائق اخري</a></li>
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content">

                        <div class="tab-pane fade in active" id="tab1">
                            <div class="panel-body" ><br>
                                <h5 class="header_h5">وثائق اساسية</h5>
                                <input type="hidden" id="count_row" value="0"/>
                                <table class="table table-bordered" style="table-layout: fixed;">
                                    <thead>
                                    <tr class="greentd">
                                        <th style="text-align: center; width: 71px;">م</th>
                                        <th  style="text-align: center; ">تصنيف</th>
                                        <th style="text-align: center;  width: 40%;">المرفق</th>
                                        <th style="text-align: center; width: 100px;">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody id="result_Table">
                                    <?php if (isset($data_table) && !empty($data_table)) {
                                        $x = 1;
                                        foreach ($data_table as $row) { ?>
                                            <tr class="text-center">
                                            <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $x++ ?></td>
                                            <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $row->title_setting; ?> </td>
                                            <?php if (!empty($row->sub)) {
                                                foreach ($row->sub as $row_sub) {
                                                    $filename = $row_sub->file_attach_name;
                                                    $ext = pathinfo($filename, PATHINFO_EXTENSION);?>
                                                    <td class="text-center" >
                                                        <a href="<?php echo base_url() . 'family_controllers/Family/downloads_new/' . $row_sub->file_attach_name ?>"
                                                           download>
                                                            <i class="fa fa-download" title="تحميل"></i> </a>
                                                        <?php
                                                        if(in_array($ext,$image_type) ) { ?>
                                                            <a data-toggle="modal" data-target="#myModal-view-<?= $row_sub->id ?>">
                                                                <i class="fa fa-eye" title=" قراءة"></i> </a>

                                                   <?php }elseif(in_array($ext,$files_type)){ ?>

                                                            <a  href="<?php echo base_url().'family_controllers/Family/read_attached_file/'.$row_sub->file_attach_name?>" target="_blank">
                                                                <i class="fa fa-eye" title=" قراءة"></i> </a>

                                                       <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url() . 'family_controllers/Family/DeleteFileAttach/' . $row_sub->id . "/" . $row_sub->mother_national_num_fk ?>">
                                                            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                                    </td>
                                                    </tr>

                                                    <div class="modal fade" id="myModal-view-<?= $row_sub->id ?>" tabindex="-1"
                                                         role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="<?= base_url() . "uploads/family_attached/" . $row_sub->file_attach_name ?>"
                                                                         width="100%">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                        إغلاق
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php } // end sub foreach
                                            } else { ?>
                                                <td>--</td>
                                                <td>--</td></tr>

                                            <?php } // end else
                                        } // end main  foreach  ?>
                                    <?php } else { // end main if ?>
                                        <tr id="frist_one">
                                            <td colspan="4" style="text-align: center;color: red"> لا يوجد مرفقات</td>
                                        </tr>
                                    <?php } // end main if ?>
                                    </tbody>
                                    <tfoot><tr>
                                        <td colspan="4" id="save_button">
                                    <button  style="float: left;margin-left: 50px" type="button" onclick="add_row();" class="btn btn-labeled btn-add " name="add"
                                            value="إضافة" style=" font-size: 16px;">
                                        <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                                    </button></td></tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <div class="panel-body"><br>
                                <h5 class="header_h5">وثائق اخري </h5>
                                <input type="hidden" id="count_row_other" value="0"/>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="greentd">
                                        <th style="text-align: center;width: 71px;">م</th>
                                        <th style="text-align: center">اسم المرفق</th>
                                        <th style="text-align: center;width: 40%;">المرفق</th>
                                        <th style="text-align: center;width: 100px;">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody id="result_Table_other">
                                    <?php if (isset($data_table_other) && !empty($data_table_other)) {
                                        $x = 1;
                                        foreach ($data_table_other as $row_other) {

                                            $filename = $row_other->file_attach_name;
                                            $ext = pathinfo($filename, PATHINFO_EXTENSION);?>

                                            <tr class="text-center">
                                                <td><?php echo $x++ ?></td>
                                                <td><?php echo $row_other->file_attach_id_fk; ?> </td>

                                                <td>
                                                    <a href="<?php echo base_url() . 'family_controllers/Family/downloads_new/' . $row_other->file_attach_name ?>"
                                                       download>
                                                        <i class="fa fa-download" title="تحميل"></i> </a>

                                                    <?php
                                                    if(in_array($ext,$image_type) ) { ?>
                                                        <a  data-toggle="modal" data-target="#myModal-view-other-<?=$row_other->id?>" >
                                                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                                                    <?php }elseif(in_array($ext,$files_type)){ ?>

                                                        <a  href="<?php echo base_url().'family_controllers/Family/read_attached_file/'.$row_other->file_attach_name?>" target="_blank">
                                                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'family_controllers/Family/DeleteFileAttachOther/' . $row_other->id . "/" . $row_other->mother_national_num_fk ?>">
                                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                                </td>
                                            </tr>


                                            <div class="modal fade" id="myModal-view-other-<?= $row_other->id ?>" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?= base_url() . "uploads/family_attached/" . $row_other->file_attach_name ?>"
                                                                 width="100%">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <?php } // end sub foreach
                                    } else { // end main if ?>


                                        <tr id="sacend_one">

                                            <td colspan="4" style="text-align: center;color: red"> لا يوجد مرفقات</td>
                                        </tr>
                                    <?php } // end main if ?>
                                    </tbody>
                                    <tfoot><tr>
                                        <td colspan="4" id="save_button_other">
                                            <button  style="float: left;margin-left: 50px" type="button" onclick="add_row_other();" 
                                            class="btn btn-labeled btn-add " name="add"
                                                     value="إضافة" style=" font-size: 16px;">
                                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                                            </button></td></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <?php echo form_close() ?>



            <!-------------------------------------------------->
        </div>
    </div>
</div>


<script>
    function add_row() {
        var dataString = 'add_row=1';
        var count_value = $("#count_row").val();
        $("#frist_one").remove();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/attach_files/<?=$this->uri->segment(4);?>',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#result_Table").append(html);
//                    var x = document.getElementById('table_attach_files');
//                    var len_tab1 = x.rows.length;
                count_value = parseFloat(count_value) + 1;
                $("#count_row").val(count_value);
                //------------------------------

                $('#save_button').html('<button  style="float: left;margin-left: 50px" type="submit"  id="submit_t" class="btn btn-labeled btn-success " name="ADD" value="حفظ" >' +
                    '<span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i>' +
                    '</span>حفظ</button> ');


                //------------------------------
            }
        });
        return false;
    }


    function add_row_other() {



        var dataString = 'add_row_other=1';
        var count_value = $("#count_row_other").val();
        $("#sacend_one").remove();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/attach_files/<?=$this->uri->segment(4);?>',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#result_Table_other").append(html);
                count_value = parseFloat(count_value) + 1;
                $("#count_row_other").val(count_value);
                //------------------------------

                $('#save_button_other').html('<button  style="float: left;margin-left: 50px" type="submit"  id="submit_other" class="btn btn-labeled btn-success " name="ADDOther" value="حفظ" >' +
                    '<span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i>' +
                    '</span>حفظ</button>');

                //------------------------------
            }
        });
        return false;

    }

    //==========================
    function delete_row(this_part) {
        var count_value = $("#count_row").val();
        count_value = parseFloat(count_value) - 1;
        $("#count_row").val(count_value);
        $(this_part).parents('tr').remove();
        //------------------------------
        if (parseFloat($("#count_row").val()) > 0) {
            $('input[type="submit"]').removeAttr("disabled");
        } else {
            $('input[type="submit"]').attr("disabled", "disabled");
        }
        //------------------------------
    }
</script>

<!--
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
-->
<script> /*
    function save_me() {
        if(parseFloat( $("#count_row_other").val() ) != 0){
            $('#submit_other').removeAttr("disabled");
        }else {
            $('#submit_other').attr("disabled","disabled");
        }




            var title = "هل تريد حفظ الوثيقة ؟";
            var confirm = "نعم , قم بالحفظ";
            var text2 = "";

            Swal.fire({
                title: title,
                text: text2,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ليس الان',
                confirmButtonText: confirm
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        type: 'success',
                        title: 'تم الحفظ بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    })
                   // $('#attach_form').submit();
                }
            })


    }
*/

</script>
