
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-bd">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#add_notes" aria-controls="main-detailsfa" role="tab" data-toggle="tab">
                                    <i class="fa fa-clock-o" style=""></i>
                                    اضافة حدث او ملاحظة </a></li>
                            <li role="presentation"><a href="#notes" aria-controls="general-detailsfa" role="tab" data-toggle="tab"> <i class="fa fa-check-square-o" style=""></i>  الأحداث والملاحظات</a></li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="add_notes">
                                <div class="col-xs-12">
                                    <?php
                                    echo form_open_multipart('all_secretary/archive/notes/Notes/insert_notes');
                                    $config = array();
                                    $config['zoom'] = "auto";
                                    $marker = array();
                                    $marker['draggable'] = true;
                                    $marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
                                    $config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
                                    $config['geocodeCaching'] = TRUE;
                                    $center = '27.517571447136426,41.71273613027347';
                                    $config['center'] = $center;
                                    $this->google_maps->initialize($config);
                                    $this->google_maps->add_marker($marker);
                                    $data['maps'] = $this->google_maps->create_map();

                                    ?>


                                        <div class="form-group col-md-4 col-sm-2 col-xs-12 padding-4">
                                            <input type="hidden" id="row_id" name="row_id" value="">
                                            <label class="label">   النوع  </label>

                                            <div class="radio-content">
                                                <input type="radio"    id="type_sarf1" name="type"  class="sarf_types" value="1" data-validation="required" >
                                                <label for="type_sarf1"  class="radio-label  " style="color: #ffc751;">ملاحظة </label>
                                            </div>

                                            <div class="radio-content">
                                                <input type="radio"  id="type_sarf2" name="type"   class="sarf_types" value="2" data-validation="required" >
                                                <label for="type_sarf2" class="radio-label" style="color: #50ab20;">موعد </label>
                                            </div>

                                            <div class="radio-content">
                                                <input type="radio"   id="type_sarf3" name="type" class="sarf_types" value="3" data-validation="required" >
                                                <label for="type_sarf3" class="radio-label" style="color: #E5343D;">  حدث</label>
                                            </div>

                                            <div class="radio-content">
                                                <input type="radio" data-validation="required"   id="type_sarf4" name="type"  class="sarf_types" value="4">
                                                <label for="type_sarf4" class="radio-label" style="color: #3a87ad">مهمة</label>

                                            </div>

                                        </div>
                                        <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   التاريخ  </label>
                                            <input type="date"   id="date" name="date" value="<?= date('Y-m-d')?>" class="form-control" >

                                        </div>

                                        <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   الوقت  </label>
                                            <input type="text" id="from_time" name="time" value="" class="form-control" >

                                        </div>

                                        <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   القسم  </label>
<!--                                            <input type="text"  id="qsm" name="qsm" value="" class="form-control"  data-validation="required">-->

                                            <input type="text" class="form-control  testButton inputclass"
                                                   name="qsm_n" id="qsm_n"
                                                   readonly="readonly"
                                                   onclick="$('#departModal').modal('show')"
                                                   style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                                                   data-validation="required"
                                                   value="">
                                            <input type="hidden" name="qsm_id_fk" id="qsm_id_fk" value="">
                                            <button type="button"  onclick="$('#departModal').modal('show');"
                                                    class="btn btn-success btn-next">
                                                <i class="fa fa-plus"></i></button>

                                        </div>
                                        <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   التصنيف  </label>
<!--                                            <input type="text"  id="tasnef" name="tasnef" value="" class="form-control">-->
                                            <input type="text" class="form-control  testButton inputclass"
                                                   name="tasnef_n" id="tasnef_n"
                                                   readonly="readonly"
                                                   onclick="$('#tasnefModal').modal('show')"
                                                   style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                                                   data-validation="required"
                                                   value="">
                                            <input type="hidden" name="tasnef" id="tasnef" value="">
                                            <button type="button"  onclick="$('#tasnefModal').modal('show');"
                                                    class="btn btn-success btn-next">
                                                <i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   مدة التنبيه  </label>
                                            <?php
                                              $alarm_arr = array('1'=>'يوميا','2'=>'أسبوعيا','3'=>'شهريا') ;
                                            ?>
                                            <select class="form-control" name="alarm_period" id="alarm_period" >
                                                <option value="">اختر</option>
                                                <?php
                                                   foreach ($alarm_arr as $key=>$value){
                                                       ?>
                                                       <option value="<?= $key ?>-<?= $value?>"><?= $value?></option>
                                                <?php
                                                   }
                                                ?>

                                            </select>

                                        </div>
                                        <div class="form-group col-md-5 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   التفاصيل  </label>
                                            <textarea name="details" class="form-control" id="details"></textarea>


                                        </div>
                                        <div class="col-md-12">

                                            <button class="btn btn-labeled btn-warning" role="button" data-toggle="collapse"
                                                    href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                                                    style="color: #000;">
                                                <span class="btn-label"><i class=" glyphicon glyphicon-map-marker"></i></span> الموقع على
                                                الخريطة
                                            </button>


                                            <div class="collapse" id="collapseExample">
                                                <input type="hidden" name="map_google_lng" id="lng" value=""/>
                                                <input type="hidden" name="map_google_lat" id="lat" value=""/>
                                                <div id="div_map">
                                                    <?php echo $maps['html']; ?>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="  text-center col-md-12">
                                            <button type="submit"  name="add" value="add" style="margin-top: 25px;"   class="btn btn-labeled btn-success "    >
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>

                                        </div>


                                    <?php
                                    echo form_close();
                                    ?>

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade " id="notes">
                                <div class="col-xs-12">
                                    <div class="space"></div>
                                    <div id="calendar" ></div>
                                </div>
                            </div>
                            </div>

                </div>
            </div>

            <!-- departModal Modal -->

            <div class="modal fade" id="departModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title title ">  الأقسام </h4>
                        </div>
                        <div class="modal-body">

                            <div class="col-xs-12" id="hai_result">
                                <?php
                                if (isset($departs) && !empty($departs)){
                                    ?>
                                    <table class="table example table-bordered table-striped table-hover">
                                        <thead>
                                        <tr class="greentd">
                                            <th>#</th>

                                            <th>  القسم</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($departs as $row ){
                                            ?>
                                            <tr>
                                                <td>
                                                    <input style="width: 90px;height: 20px;" type="radio" name="radio"
                                                           ondblclick="GetName(<?= $row->id ?>,'<?= $row->name?>')">
                                                </td>


                                                <td><?= $row->name?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>

                                    <?php
                                } else{
                                    ?>

                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- departModal Modal -->

            <!-- tasnefModal Modal -->

            <div class="modal fade" id="tasnefModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title title ">  التصنيف </h4>
                        </div>
                        <div class="modal-body">

                            <div class="col-xs-12" id="hai_result">
                                <?php
                                if (isset($tasnef) && !empty($tasnef)){
                                    ?>
                                    <table class="table example table-bordered table-striped table-hover">
                                        <thead>
                                        <tr class="greentd">
                                            <th>#</th>
                                            <th>  التصنيف</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($tasnef as $row ){
                                            ?>
                                            <tr>
                                                <td>
                                                    <input style="width: 90px;height: 20px;" type="radio" name="radio"
                                                           ondblclick="GetTasnefName(<?= $row->id ?>,'<?= $row->title?>')">
                                                </td>


                                                <td><?= $row->title?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>

                                    <?php
                                } else{
                                    ?>

                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tasnefModal Modal -->
<script>
    function GetName(id,name) {

        $('#qsm_id_fk').val(id);
        $('#qsm_n').val(name);
        $('#departModal').modal('hide');

    }
</script>

 <script>
                function GetTasnefName(id,name) {

                    $('#tasnef').val(id);
                    $('#tasnef_n').val(name);
                    $('#tasnefModal').modal('hide');

                }
 </script>

            <script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>


            <script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>

            <script>
                $(document).ready(function(){
                    $('#from_time').mdtimepicker(); //Initializes the time picker
                });
            </script>

