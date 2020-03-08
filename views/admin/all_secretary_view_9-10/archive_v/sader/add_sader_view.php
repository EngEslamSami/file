<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body">
            <?php

            $arr = array('1'=>'نعم','2'=>'لا');

            if (isset($get_sader) && !empty($get_sader)){
                echo form_open_multipart('all_secretary/archive/sader/Add_sader/update_sader/'.$get_sader->id);
                $ersal_date = $get_sader->ersal_date;
                $geha_ekhtsas_n = $get_sader->geha_ekhtsas_n;
                $geha_ekhtsas_fk = $get_sader->geha_ekhtsas_fk;
                $sader_rkm = $get_sader->sader_rkm;
                $folder_path = $get_sader->folder_path;
                $folder_id_fk = $get_sader->folder_id_fk;
                $no3_khtab_n = $get_sader->no3_khtab_n;
                $no3_khtab_fk = $get_sader->no3_khtab_fk;
                $mawdo3_name = $get_sader->mawdo3_name;
                $mawdo3_subject = $get_sader->mawdo3_subject;
                $tarekt_ersal_n = $get_sader->tarekt_ersal_n;
                $tarekt_ersal_fk = $get_sader->tarekt_ersal_fk;
                $is_secret = $get_sader->is_secret;
                $geha_morsel_n = $get_sader->geha_morsel_n;
                $geha_morsel_fk = $get_sader->geha_morsel_fk;
                $mostlem_name = $get_sader->mostlem_name;
                $awlawia_fk = $get_sader->awlawia_fk;
                $esthkak_date = $get_sader->esthkak_date;
                $need_follow = $get_sader->need_follow;
                $notes = $get_sader->notes;

            } else{
                echo form_open_multipart('all_secretary/archive/sader/Add_sader/add_sader');
                $sader_rkm = $rkm + 1;
                $ersal_date = date('Y-m-d');
                $geha_ekhtsas_n ='';
                $geha_ekhtsas_fk ='';
                $folder_path = '';
                $folder_id_fk ='';
                $no3_khtab_n ='';
                $no3_khtab_fk ='';
                $mawdo3_name ='';
                $mawdo3_subject ='';
                $tarekt_ersal_n ='';
                $tarekt_ersal_fk ='';
                $is_secret ='';
                $geha_morsel_n ='';
                $geha_morsel_fk ='';
                $mostlem_name ='';
                $awlawia_fk ='';
                $need_follow ='';
                $notes ='';
                $esthkak_date = date('Y-m-d');

            }
            ?>
            <div class="col-xs-12 no-padding">
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> تاريخ التسجيل  </label>
                    <input type="date" name="tasgel_date"
                           value="<?= date('Y-m-d')?>"
                           class="form-control  " readonly  >

                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> تاريخ الارسال  </label>
                    <input type="date" name="ersal_date"
                           value="<?= $ersal_date?>"
                           class="form-control  "   >

                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">  جهة الاختصاص</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="geha_ekhtsas_n" id="geha_ekhtsas_n"
                           readonly="readonly"

                           onclick="$('#gehatModal').modal('show');changegeha('geha_ekhtsas_fk','geha_ekhtsas_n')"

                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $geha_ekhtsas_n?>">
                    <input type="hidden" name="geha_ekhtsas_fk" id="geha_ekhtsas_fk" value="<?= $geha_ekhtsas_fk?>">
                    <input type="hidden" id="geha" data-id="" data-title="" >

                    <button type="button"
                            onclick="$('#gehatModal').modal('show');changegeha('geha_ekhtsas_fk','geha_ekhtsas_n')"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>


                </div>
                <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                    <label class="label">  رقم الصادر  </label>
                    <input type="text" name="sader_rkm"
                           value="<?= $sader_rkm?>"
                           class="form-control  " readonly  >

                </div>
                <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label ">   المجلد</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="folder_path" id="folder_path"
                           readonly="readonly"
                           onclick="$('#mogldModal').modal('show');"
                           ondblclick="$('#mogldModal').modal('show');"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"

                           value="<?= $folder_path?>">
                    <input type="hidden" name="folder_id_fk" id="folder_id_fk" value="<?= $folder_id_fk?>">

                    <button type="button"  onclick="$('#mogldModal').modal('show');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>


                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">    نوع الخطاب</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="no3_khtab_n" id="no3_khtab_n"
                           readonly="readonly"
                           onclick="$('#myModal').modal('show'); load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                           ondblclick="$('#myModal').modal('show');load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $no3_khtab_n?>">
                    <input type="hidden" name="no3_khtab_fk" id="no3_khtab_fk" value="<?= $no3_khtab_fk?>">
                    <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                    <button type="button"  onclick="$('#myModal').modal('show');load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>

                </div>

                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">   اسم الموضوع</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="mawdo3_name" id="mawdo3_name"
                           readonly="readonly"
                           onclick="$('#myModal').modal('show'); load_page(601);changePage('اسم الموضوع','', 'mawdo3_name');"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $mawdo3_name?>">
                    <button type="button"
                            onclick="$('#myModal').modal('show'); load_page(601);changePage('اسم الموضوع','', 'mawdo3_name');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>

                </div>
                <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label ">    الموضوع</label>

                    <input type="text" name="mawdo3_subject"
                           value="<?= $mawdo3_subject?>"
                           class="form-control  "   >

                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">    طريقة الارسال</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="tarekt_ersal_n" id="tarekt_ersal_n"
                           readonly="readonly"
                           onclick="$('#myModal').modal('show'); load_page(401);changePage(' طريقة الارسال','tarekt_ersal_fk', 'tarekt_ersal_n');"

                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $tarekt_ersal_n?>">
                    <input type="hidden" name="tarekt_ersal_fk" id="tarekt_ersal_fk" value="<?= $tarekt_ersal_fk?>">

                    <button type="button"
                            onclick="$('#myModal').modal('show'); load_page(401);changePage('طريقة الارسال','tarekt_ersal_fk', 'tarekt_ersal_n');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>


                </div>
                <div class="form-group padding-4 col-md-1 col-xs-12">
                    <label class="label ">    سري للغاية</label>
                    <select  type="text" name="is_secret"
                             value=""
                             class="form-control  ">
                        <?php
                        foreach ($arr as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($is_secret==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                        <?php
                        }
                        ?>

                    </select>

                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">     الجهة المرسل اليها</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="geha_morsel_n" id="geha_morsel_n"
                           readonly="readonly"
                           onclick="$('#gehatModal').modal('show');changegeha('geha_morsel_fk','geha_morsel_n')"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $geha_morsel_n?>">
                    <input type="hidden" name="geha_morsel_fk" id="geha_morsel_fk" value="<?= $geha_morsel_fk?>">

                    <button type="button"
                            onclick="$('#gehatModal').modal('show');changegeha('geha_morsel_fk','geha_morsel_n')"

                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>


                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">    اسم المستلم</label>

                    <input type="text" class="form-control  testButton inputclass"
                           name="mostlem_name" id="mostlem_name"
                           readonly="readonly"
                           onclick="load_mostlem();"

                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $mostlem_name?>">
                    <button type="button"  onclick="load_mostlem();"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>

                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">     الأولوية</label>

                    <select  type="text" name="awlawia_fk"
                             value=""
                             class="form-control  "   data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        $priority = array('1'=>'عادي','2'=>'هام','3'=>'هام جدا');
                        foreach ($priority as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($awlawia_fk==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                            <?php
                        }
                        ?>
                    </select>


                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> تاريخ الاستحقاق  </label>
                    <input type="date" name="esthkak_date"
                           value="<?= $esthkak_date ?>"
                           class="form-control  "   >

                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">     يحتاج متابعة</label>
                    <select  type="text" name="need_follow"
                             class="form-control  ">
                        <?php
                        foreach ($arr as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($need_follow==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                            <?php
                        }
                        ?>

                    </select>

                </div>
                <div class="form-group col-md-6 col-sm-4 col-xs-12 padding-4">
                    <label class="label">  ملاحظات  </label>
                    <input type="text" name="notes"
                           value="<?= $notes?>"
                           class="form-control  "   >

                </div>



                </div>


            <div class="  text-center col-xs-12">
                <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>


            <?php
            echo form_close();
            ?>

        </div>
    </div>
</div>
<?php
if (isset($all_sader) && !empty($all_sader)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?= $title ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>   رقم الصادر</th>
                        <th>تاريخ الارسال</th>
                        <th>جهة الاختصاص</th>
                        <th>اسم الموضوع</th>
                        <th>طريقة الارسال</th>
                        <th>الجهة المرسل اليها</th>
                        <th>اسم المستلم</th>

                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_sader as $row){
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><?= $row->sader_rkm?></td>
                            <td><?php if (!empty($row->ersal_date)) {
                                echo  $row->ersal_date;
                                } else{
                                echo 'غير محدد' ;
                                }
                               ?></td>
                            <td><?php if (!empty($row->geha_ekhtsas_n)) {
                                    echo  $row->geha_ekhtsas_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->mawdo3_name)) {
                                    echo  $row->mawdo3_name;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->tarekt_ersal_n)) {
                                    echo  $row->tarekt_ersal_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->geha_morsel_n)) {
                                    echo  $row->geha_morsel_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->mostlem_name)) {
                                    echo  $row->mostlem_name;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>


                            <td>
                                <a  class="btn btn-xs btn-warning" style="padding:1px 5px;" href="<?= base_url().'all_secretary/archive/sader/Add_sader/add_deal/'.$row->id?>">
                                    <i class="fa fa-list "></i>
                                    استكمال البيانات
                                </a>
                                <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_details(<?= $row->id?>);">
                                    <i class="fa fa-list "></i></a>
                                <a href="#" onclick='swal({
                                    title: "هل انت متأكد من التعديل ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-warning",
                                    confirmButtonText: "تعديل",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){

                                    window.location="<?php echo base_url(); ?>all_secretary/archive/sader/Add_sader/update_sader/<?php echo $row->id; ?>";
                                    });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href="#" onclick='swal({
                                    title: "هل انت متأكد من الحذف ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-danger",
                                    confirmButtonText: "حذف",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){
                                    swal("تم الحذف!", "", "success");
                                    window.location="<?php echo base_url(); ?>all_secretary/archive/sader/Add_sader/delete_sader/<?php echo $row->id; ?>";
                                    });'>
                                    <i class="fa fa-trash"> </i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <?php
}
?>

<!-- gehatModal  -->

<div class="modal fade" id="gehatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> الجهات </h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($gehat)&& !empty($gehat)){
                    ?>
                <table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr class="greentd">
                        <th>#</th>
                        <th>الاسم</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                     foreach ($gehat as $row){
                         ?>
                         <tr>

                             <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                        id="gehat<?= $row->id ?>" ondblclick="GetgehaName(<?= $row->id ?>,'<?= $row->name?>')"></td>
                             <td><?= $row->name ?></td>

                         </tr>
                    <?php
                     }
                    ?>
                    </tbody>
                </table>

                <?php
                } else{
                    ?>
                    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                <?php
                }
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- gehatModal  -->

<!-- gehatModal  -->

<div class="modal fade" id="mogldModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title  "> المجلد </h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($folders)&& !empty($folders)){
                    ?>
                    <table class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>#</th>
                            <th>المسار</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($folders as $row){
                            ?>
                            <tr>

                                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                           id="fo<?= $row->id ?>" ondblclick="GetfolderName(<?= $row->id?>,'<?= $row->path?>')"></td>
                                <td><?= $row->path ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                } else{
                    ?>
                    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                    <?php
                }
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- gehatModal  -->

<!-- myModal Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  </h4>
            </div>
            <div class="modal-body">

                    <div id="output">

                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- myModal Modal -->
<div class="modal fade" id="mostlemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> اسم المستلم </h4>
            </div>
            <div class="modal-body">

                <div id="output_mostlem">

                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">


                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>
<script>
    function load_details(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/load_details",
            data: {row_id:row_id},
            success: function (d) {

                $('#result').html(d);

            }

        });

    }
</script>

<script>
    function changePage(text,id,title) {
        $('.title').text(text);
        $('#page').data('id', id);
        $('#page').data('title', title);

    }
</script>
<script>
    function load_page(type) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#output").html(html);
            }
        });
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#page').data("id");
        var title_n = $('#page').data("title");
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#myModal').modal('hide');

    }
</script>
<script>
    function load_mostlem() {
        var geha_id = $('#geha_morsel_fk').val();
        if (geha_id !=''){
            $('#mostlemModal').modal('show');
          //  console.log(geha_id);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal',
                data: {geha_id:geha_id},
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $("#output_mostlem").html(html);
                }
            });

        }  else{
            swal({
                     title: "من فضلك اختر الجهة المرسل اليها اولا ! ",
                     type: "warning",
                     confirmButtonClass: "btn-warning"
                });
        }

    }
</script>
<script>
    function GetgehaName(id, name) {
        var title_fk = $('#geha').data("id");
        var title_n = $('#geha').data("title");
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#gehatModal').modal('hide');
        //
        $('#gehat'+id).prop('checked', false);


    }
</script>
<script>
    function changegeha(id,title) {
      //  $('.title').text(text);
        $('#geha').data('id', id);
        $('#geha').data('title', title);

    }
</script>

<script>
    function Getmostlem( name) {
        $('#mostlem_name').val(name);
        $('#mostlemModal').modal('hide');

    }
</script>
<script>
    function GetfolderName(id, name) {

        $('#folder_id_fk').val(id);
        $('#folder_path').val(name);

        $('#mogldModal').modal('hide');


    }
</script>