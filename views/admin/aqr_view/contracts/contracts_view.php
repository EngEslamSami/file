<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body">
            <?php
            if (isset($get_contract) && !empty($get_contract)){
                echo form_open_multipart('aqr/contracts/Contracts/update_contract/'.$get_contract->id);
               $contract_rkm = $get_contract->contract_rkm;
               $aqr_n = $get_contract->aqr_n;
               $aqr_fk = $get_contract->aqr_fk;
               $whda_type_n = $get_contract->whda_type_n;
               $whda_type_fk = $get_contract->whda_type_fk;
               $egar_value = $get_contract->egar_value;
               $egar_start_date_h = $get_contract->egar_start_date_h;
               $egar_start_date_m = $get_contract->egar_start_date_m;
               $egar_end_date_m = $get_contract->egar_end_date_m;
               $egar_end_date_h = $get_contract->egar_end_date_h;
               $period = $get_contract->period;
               $aqsat_num = $get_contract->aqsat_num;
               $qst_value = $get_contract->qst_value;
               $mostager_name = $get_contract->mostager_name;
               $mostager_rkm = $get_contract->mostager_rkm;
               $tamen = $get_contract->tamen;
               $tzker = $get_contract->tzker;


            } else{
                echo form_open_multipart('aqr/contracts/Contracts/add_contract');
                $contract_rkm = $rkm +1;
                $aqr_n = '';
                $aqr_fk = '';
                $whda_type_n ='';
                $whda_type_fk = '';
                $egar_value = '';
                $egar_start_date_h = '';
                $egar_start_date_m = '';
                $egar_end_date_m = '';
                $egar_end_date_h = '';
                $period = '';
                $aqsat_num = '';
                $qst_value = '';
                $mostager_name = '';
                $mostager_rkm = '';
                $tamen = '';
                $tzker ='';

            }
            ?>
            <div class="col-md-12 no-padding">


            <div class="col-md-6">

                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> رقم العقد </label>
                    <input type="text" name="contract_rkm"
                           value="<?= $contract_rkm?>"
                           class="form-control  " readonly  >

                </div>
                <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                    <label class="label">  العقار</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="aqr_n" id="aqr_n"
                           readonly="readonly"
                           onclick="$('#aqrModal').modal('show');"

                           style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                           data-validation="required"
                           value="<?= $aqr_n?>">
                    <input type="hidden" name="aqr_fk" id="aqr_fk" value="<?= $aqr_fk?>">

                    <button type="button"
                            onclick="$('#aqrModal').modal('show');"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>

                </div>
                <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                    <label class="label">  نوع الوحدة </label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="whda_type_n" id="whda_type_n"
                           readonly="readonly"
                           data-validation="required"
                           value="<?= $whda_type_n?>">

                    <input type="hidden" name="whda_type_fk" id="whda_type_fk" value="<?= $whda_type_fk?>">

                </div>



              <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> قيمة الايجار </label>
                    <input type="text" name="egar_value" id="egar_value"
                           value="<?= $egar_value?>"
                           data-validation="required"
                           class="form-control  "  onkeyup="get_value()"  onkeypress="validate_number(event)" >

                </div>
                    <div class="form-group col-md-5 col-sm-5 padding-4">

                        <label class="label text-center">
                            <img style="width: 18px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            بداية الايجار
                            <img style="width: 18px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>

                        <div id="cal-2" style="width: 50%;float: right;">
                            <input id="date-Hijri" name="egar_start_date_h" class="form-control bottom-input "
                                   type="text" onfocus="showCal2();" value="<?= $egar_start_date_h?>"
                                   style=" width: 100%;float: right"/>

                        </div>


                        <div id="cal-1" style="width: 50%;float: left;">
                            <input id="date-Miladi" name="egar_start_date_m" class="form-control bottom-input  "
                                   value="<?= $egar_end_date_m?>"
                                   type="text" onfocus="showCal1(); " style=" width: 100%;float: right"/>

                        </div>
                    </div>
                    <div class="form-group  col-md-5  col-sm-5 padding-4" >
                        <label class="label " style="text-align: center;">
                            <img style="width: 19px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            نهاية الايجار
                            <img style="width: 19px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>

                        <div id="cal-end-2" style="width: 50%;float: right;">
                            <input id="from_date_h" name="egar_end_date_h"
                                   class="form-control bottom-input " type="text"
                                   onfocus="showCalEnd2();" value="<?= $egar_end_date_h?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-end-1" style="width: 50%;float: left;">
                            <input id="from_date_m" name="egar_end_date_m"
                                   class="form-control bottom-input "
                                   type="text" onfocus="showCalEnd1(); "
                                   value="<?=$egar_end_date_m?>"
                                   style=" width: 100%;float: right" / >
                        </div>
                    </div>



                    <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                        <label class="label">  المدة </label>
                        <input type="text" name="period" id="period"
                               value="<?=$period?>"
                               class="form-control  " readonly  >

                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                        <label class="label">  عدد الأقساط </label>
                        <input type="text" name="aqsat_num" id="aqsat_num"
                               value="<?=$aqsat_num?>"
                               data-validation="required"
                               class="form-control  " onkeyup="get_value()"  onkeypress="validate_number(event)">

                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                        <label class="label">  قيمة القسط </label>
                        <input type="text" name="qst_value" id="qst_value"
                               value="<?=$qst_value?>"
                               class="form-control  " readonly  >

                    </div>




            </div>
            <div class="col-md-6">

                    <div class="form-group col-md-9 col-sm-9 col-xs-12 padding-4">
                        <label class="label">  اسم المستأجر </label>
                        <input type="text" class="form-control  testButton inputclass"
                               name="mostager_name" id="mostager_name"
                               readonly="readonly"
                               onclick="$('#mostagerModal').modal('show');"

                               style="width: 88%;float: right;cursor: pointer;"
                               data-validation="required"
                               value="<?=$mostager_name?>">

                        <button type="button"
                                onclick="$('#mostagerModal').modal('show');"
                                class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i></button>

                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label">  رقم المستأجر </label>
                        <input type="text" class="form-control  testButton inputclass"
                               name="mostager_rkm" id="mostager_rkm"
                               readonly="readonly"
                               data-validation="required"
                               value="<?=$mostager_rkm?>">

                    </div>



                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label">   التأمين </label>
                        <input type="text" class="form-control  "
                               name="tamen" id="tamen"
                               onkeypress="validate_number(event);"
                               value="<?=$tamen?>">

                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label">   التذكير قبل </label>
                        <input type="text" class="form-control  "
                               name="tzker" id="tzker"
                               onkeypress="validate_number(event);"
                               value="<?=$tzker?>">

                    </div>
            </div>

            </div>
                <div class="col-cs-12 text-center">
                <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add" id="add"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

            </div>
        </div>

    </div>
    </div>

<?php
if (isset($contracts)&& !empty($contracts)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?php echo $title ; ?></h4>

            </div>
            <div class="panel-body" style="min-height: 300px;">
                <div class="col-xs-12">
                    <table  class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>رقم العقد</th>
                            <th>اسم العقار</th>
                            <th>نوع الوحدة</th>
                            <th>قيمة الايجار</th>
                            <th>عدد الأقساط</th>
                            <th>قيمة القسط</th>
                            <th>اسم المستأجر</th>
                            <th>رقم المستأجر</th>
                            <th> تسديد</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($contracts as $contract){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $contract->contract_rkm ?></td>
                                <td><?= $contract->aqr_n ?></td>
                                <td><?= $contract->whda_type_n ?></td>
                                <td><?= $contract->egar_value ?></td>
                                <td>
                                    <?php
                                    if (!empty($contract->aqsat_num)) { echo $contract->aqsat_num; } else{ echo 'غير محدد';}
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($contract->qst_value)) { echo $contract->qst_value; } else{ echo 'غير محدد';}
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($contract->mostager_name)) { echo $contract->mostager_name; } else{ echo 'غير محدد';}
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($contract->mostager_rkm)) { echo $contract->mostager_rkm; } else{ echo 'غير محدد';}
                                    ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#aqsatModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_qst_page(<?= $contract->id?>);">
                                        <i class="fa fa-list "></i></a>


                                </td>

                                <td>
                                    <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $contract->id?>);">
                                        <i class="fa fa-list "></i></a>
                                    <a href="#"  onclick="print_contract(<?= $contract->id ?>,'print_all_contract');">
                                        <i class="fa fa-print" aria-hidden="true"></i> </a>
                                    <?php
                                 if ($contract->paid==0){
                                        ?>
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

                                                window.location="<?php echo base_url().'aqr/contracts/Contracts/update_contract/'.$contract->contract_rkm  ?>";
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
                                                window.location="<?= base_url()."aqr/contracts/Contracts/delete_contract/".$contract->id?>";
                                                });'>
                                            <i class="fa fa-trash"> </i></a>
                                    <?php
                                   } elseif ($contract->paid==1){
                                        ?>
                                        <button class="btn btn-danger" type="button">لا يمكن التعديل او الحذف</button>
                                    <?php
                                   }
                                    ?>



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
    </div>
    <?php
}
?>
<!-- aqrModal  -->

<div class="modal fade" id="aqrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">العقارات</h4>
            </div>
            <div class="modal-body">

                    <?php
                    if (isset($aqrat) && !empty($aqrat)){
                        ?>

                   <table id="" class="table example  table-bordered table-striped table-hover">
                       <thead>
                       <tr class="greentd">
                           <th>#</th>
                           <th>اسم العقار</th>
                           <th>نوع العقار (الوحدة) </th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php
                       foreach ( $aqrat as $aqr){
                           ?>
                           <tr>

                               <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                          id="aqr<?= $aqr->id ?>" ondblclick="GetName(<?= $aqr->id ?>,'<?= $aqr->aname?>',<?= $aqr->ttype_fk ?>,'<?= $aqr->ttype?>')">
                               </td>
                               <td><?= $aqr->aname ?></td>
                               <td><?= $aqr->ttype?></td>
                           </tr>
                       <?php
                       }
                       ?>

                       </tbody>

                   </table>

                        <?php
                    } else{
                        ?>
                        <div class="alert alert-danger">عفوا... لا توجد بيانات !</div>
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
<!-- aqrModal  -->
<!-- mostagerModal  -->

<div class="modal fade" id="mostagerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">المستأجرين</h4>
            </div>
            <div class="modal-body">

                    <?php
                    if (isset($mostager) && !empty($mostager)){
                        ?>

                        <table  class="table example  table-bordered table-striped table-hover">
                            <thead>
                            <tr class="greentd">
                                <th>#</th>
                                <th>اسم المستاجر</th>
                                <th>رقم المتأجر  </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ( $mostager as $row){
                                ?>
                                <tr>

                                    <td>
                                        <input style="width: 90px;height: 20px;" type="radio" name="mostager"
                                               id="m<?= $row->id ?>" ondblclick="GetMostager(<?= $row->rkm ?>,'<?= $row->aname?>')">
                                    </td>
                                    <td><?= $row->aname ?></td>
                                    <td><?= $row->rkm?></td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>

                        </table>

                        <?php
                    } else{
                        ?>
                        <div class="alert alert-danger">عفوا... لا توجد بيانات !</div>
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
<!-- mostagerModal  -->

<!-- qstModal  -->

<div class="modal fade" id="qstModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> تسديد اقساط العقد</h4>
            </div>
            <div class="modal-body">

                <?php
                if (isset($contracts) && !empty($contracts)){
                    ?>

                    <table  class="table example  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>رقم القسط</th>
                            <th> قيمة القسط  </th>
                            <th>  تسديد  </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($contracts as $row){
                            if (!empty($row->qst_details)){
                                $x=1;
                                foreach ($row->qst_details as $qst){
                                    ?>
                                    <tr>
                                        <td><?= $x++?></td>
                                        <td><?= $qst->qst_rkm?></td>
                                        <td><?= $qst->qst_value?></td>
                                        <td>

                                        </td>


                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                        }
                        ?>

                        </tbody>

                    </table>

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
<!-- qstModal  -->
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

                <button
                    type="button" onclick="print_contract(document.getElementById('contract_id').value,'print_contract');"
                    class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->
<!-- aqsatModal -->


<div class="modal fade" id="aqsatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="">بيانات العقد</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="qst">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">



                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- aqsatModal -->

<script>
    function GetName(id, name,type,type_n) {
        $('#aqr_fk' ).val(id);
        $('#aqr_n' ).val(name);
        $('#whda_type_fk' ).val(type);
        $('#whda_type_n' ).val(type_n);
        $('#aqrModal').modal('hide');

    }
</script>

<script>
    function GetMostager(id, name) {
        $('#mostager_rkm' ).val(id);
        $('#mostager_name' ).val(name);

        $('#mostagerModal').modal('hide');

    }
</script>
<script>
    function get_value() {
    //    alert('gg');
      var  total = $('#egar_value').val();
      var  num = $('#aqsat_num').val();
      if (total !='' && num !=''){
        //  var value = Math.ceil(parseFloat(total / num));
          var value = parseFloat(total / num);
      }  else{
          var value = 0;
      }

    //  var value = total / num;
      $('#qst_value').val(value);

    }
</script>
<script type="text/javascript">
    function gmod(n, m) {
        return ((n % m) + m) % m;
    }



</script>

<script type="text/javascript">
    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());

        time1 = Math.abs(date.getTime());

        time2 = 1000 * 3600 * 24 * days;

        total = time1 + time2;

        date = new Date(total);

        return date;
    }
</script>
<script>

    function get_date(end_date, start_date) {
      // alert(end_date);

       if (end_date == '' || start_date == '') {
            return 1;
        }
        var a = new Date(end_date);
        var x = new Date(start_date);

        diffDays = '';
        if (a >= x) {
            var timeDiff = Math.abs(a.getTime() - x.getTime());
            diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
          //  var days = Math.floor(diff/day);
            var months = Math.floor(diffDays/30);

            var date = new Date(document.getElementById("from_date_m").value);
            day = date.addDays(1).getDate();
            month = date.addDays(1).getMonth() + 1;
            year = date.addDays(1).getFullYear();

          //  document.getElementById("period").value = diffDays + 1;
          //  return diffDays + 1;
            return months + ' ' + 'شهر';
        } else {

            swal({
                title: 'من فضلك تأكد من تاريخ البداية والنهاية !',
                type: 'warning',
                confirmButtonText: 'تم'
            });

            document.getElementById("period").value = ' ';

            return 0;
          //  return months + ' ' + 'شهر';

        }
    }
</script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>aqr/contracts/Contracts/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>
<script>
    function load_qst_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>aqr/contracts/Contracts/load_qst_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#qst').html(d);

            }

        });

    }
</script>

<script>
    function print_contract(row_id,method) {

        var request = $.ajax({

            url: "<?=base_url().'aqr/contracts/Contracts/'?>" + method,
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>


<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop1 = 0;
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value", cal1.getDate().getDateString());
    date2.setAttribute("value", cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


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
        var diffDays = get_date(document.getElementById("from_date_m").value, document.getElementById("date-Miladi").value);
        document.getElementById("period").value = diffDays;

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
        var diffDays = get_date(document.getElementById("from_date_m").value, document.getElementById("date-Miladi").value);
        document.getElementById("period").value = diffDays;

    };


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        if (loop1 === 0) {
            <?php if (isset($get_contract) && !empty($get_contract)) {  ?>
            loop1++;
            date1.value = '<?=$get_contract->egar_end_date_m?>';
            date2.value = '<?=$get_contract->egar_end_date_h?>';
            <?php }else{ ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();

            <?php  } ?>
        } else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();

        }
    //  var diffDays = get_date(document.getElementById("from_date_m").value, document.getElementById("date-Miladi").value);
     //   document.getElementById("period").value = diffDays;

        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
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

    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('from_date_m'),
        dateEnd2 = document.getElementById('from_date_h'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();


    dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    setDateFieldsEnd1();


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
        var diffDays = get_date(document.getElementById("from_date_m").value, document.getElementById("date-Miladi").value);
        document.getElementById("period").value = diffDays;

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
        var diffDays = get_date(document.getElementById("from_date_m").value, document.getElementById("date-Miladi").value);
        document.getElementById("period").value = diffDays;

    };


    calEnd1.onHide = function () {
        calEnd1.show(); // prevent the widget from being closed

    };

    calEnd2.onHide = function () {
        calEnd2.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd1() {
        if (loop1 == 0) {
            <?php if (isset($get_contract) && $get_contract != null) { ?>
            loop1++;
            dateEnd1.value = '<?=$get_contract->egar_end_date_m?>';
            dateEnd2.value = '<?=$get_contract->egar_end_date_h?>';
            <?php } else { ?>
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
            <?php } ?>
        } else {
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
        }

        // var diffDays = get_date(document.getElementById("from_date_m").value, document.getElementById("date-Miladi").value);
        // document.getElementById("period").value = diffDays;

        dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());
    }


    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
       // var diffDays = get_date(document.getElementById("from_date_m").value, document.getElementById("date-Miladi").value);
      //  document.getElementById("period").value = diffDays;

    }

    function showCalEnd2() {
        if (calEnd2.isHidden())
            calEnd2.show();
        else
            calEnd2.hide();
    }



</script>