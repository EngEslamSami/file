
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-bd">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#add_notes" aria-controls="main-detailsfa" role="tab" data-toggle="tab">
                                    <i class="fa fa-clock-o" style=""></i>
                                    اضافة حدث او ملاحظة </a></li>
                            <li role="presentation"><a href="#notes" aria-controls="general-detailsfa" role="tab" data-toggle="tab"> <i class="fa fa-check-square-o" style=""></i>  الأحداث والملاحظات</a></li>
                            <li role="presentation"><a href="#my_notes" aria-controls="general-detailsfa" role="tab" data-toggle="tab"> <i class="fa fa-check-square-o" style=""></i>   الأحداث والملاحظات القادمه  </a></li>
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
                                            <input type="date"   id="date" name="date" data-validation="required" value="<?= date('Y-m-d')?>" class="form-control" >

                                        </div>

                                        <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   الوقت  </label>
                                            <input type="text" id="from_time" name="time" data-validation="required" value="" class="form-control" >

                                        </div>

                                        <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">    نوع التنبيه  </label>
                                            <?php
                                              $alarm_type = array('1'=>'شخصي','2'=>'قسم') ;
                                            ?>
                                            <select class="form-control" name="alarm_type"   data-validation="required" id="alarm_type" onchange="get_disable();" >
                                                <option value="">اختر</option>
                                                <?php
                                                   foreach ($alarm_type as $key=>$value){
                                                       ?>
                                                       <option value="<?= $key ?>"><?= $value?></option>
                                                <?php
                                                   }
                                                ?>

                                            </select>

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
                                            <button type="button" id="btn_depart" onclick="$('#departModal').modal('show');"
                                                    class="btn btn-success btn-next">
                                                <i class="fa fa-plus"></i></button>

                                        </div>
                                        <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   التصنيف  </label>
<!--                                            <input type="text"  id="tasnef" name="tasnef" value="" class="form-control">-->
                                            <input type="text" class="form-control  testButton inputclass"
                                                   name="tasnef_n" id="tasnef_n"
                                                   readonly="readonly"
                                                   onclick="$('#tasnefModal').modal('show');get_details_tasnef();"
                                                   style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                                                   data-validation="required"
                                                   value="">
                                            <input type="hidden" name="tasnef" id="tasnef" value="">
                                            <button type="button"  onclick="$('#tasnefModal').modal('show');get_details_tasnef();"
                                                    class="btn btn-success btn-next">
                                                <i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                            <label class="label">   مدة التنبيه  </label>
                                            <?php
                                              $alarm_arr = array('1'=>'يوميا','2'=>'أسبوعيا','3'=>'شهريا') ;
                                            ?>
                                            <select class="form-control" name="alarm_period" data-validation="required" id="alarm_period" >
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
                                            <textarea name="details" class="form-control" data-validation="required" id="details"></textarea>


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
                            <div role="tabpanel" class="tab-pane fade " id="my_notes">

<?php
    if (isset($my_notes) && !empty($my_notes)){
        $x=1;
        ?>
        <table id="examplee" class="table example table-bordered table-striped table-hover">
            <thead>
            <tr class="greentd">
                <th>م</th>
                <th>  النوع</th>
                <th>  التاريخ</th>
                <th>  التصنيف</th>
                <th>   مدة التنبيه</th>
                <th>  التفاصيل</th>
                <th>  الاجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($my_notes as $note ){
                ?>
                <tr>
                <td><?=$x;?> </td>
                <?php
if ($note->type==1){
$type_n = 'ملاحظة';
$className = 'btn-warning';
$color = '#ffc751';

} elseif ($note->type==2){
$type_n = 'موعد';
$className = 'btn-success';
$color = '#50ab20';
}
elseif ($note->type==3){
$type_n = 'حدث';
$className = 'btn-danger';

$color = '#E5343D';
}
elseif ($note->type==4){
$type_n = 'مهمة';
$className = 'btn-info';
$color = '#3a87ad';
}
?>
<td>
<label class=" label " style="color: <?= $color?>"><?= $type_n?></label>

</td>
<td><?php
if (!empty($note->date)){
echo $note->date;
}else{
echo 'غير محدد' ;
}
?></td>
<td><?php
if (!empty($note->tasnef_n)){
echo $note->tasnef_n;
}else{
echo 'غير محدد' ;
}
?></td>
<td><?php
if (!empty($note->alarm_period_n)){
echo $note->alarm_period_n;
}else{
echo 'غير محدد' ;
}
?></td>
<td>
<a onclick="notes_details(<?= $note->notes_id_fk ?>)"
                    aria-hidden="true"
                   data-toggle="modal"
                   data-target="#notes_detailsModal"><i class="fa fa-search" aria-hidden="true"></i></a></i>
</td>
<td >
<?php
if(isset($note->seen)&&!empty($note->seen)&&$note->seen==1)
{?>


<label class=" label " style="color:#50ab20"> تمت المشاهده</label>
<?php }
else
{?>
<label class=" label " style="color:#e5343d">  لم تتم المشاهده</label>

<?php }?>




</td>
                   

                </tr>
                <?php
           $x++; }
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
                                    $x=1;
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
                                                <td><?= $x;?></td>
                                                <td style="cursor: pointer" data-title="<?=  $row->id  ?>" onclick="GetName(<?= $row->id ?>,'<?= $row->name?>')"  >
                                                <?= $row->name?>
                                               </td>

                                                

                                            </tr>
                                            <?php
                                      $x++;  }
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


                <div id="tasnef_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#tasnef_input').show();"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span> 
                                  اضافه التصنيف
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="tasnef_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">التصنيف  </label>
                                    <input type="text" name="tasnef_name" id="tasnef_name" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_tasnef" style="display: block;">
                                    <button type="button" onclick="add_tasnef();"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_tasnef" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " id="update_tasnef">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_tasnef"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
         <!--  details-->
         <div class="modal fade" id="notes_detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result_notes">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>
         <!-- details -->
            <!-- tasnefModal Modal -->
            <script>

    function notes_details(id) {
       

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/notes/Notes/load_details",
            data: {row_id:id},
            success: function (d) {
                $('#result_notes').html(d);

            }

        });

    }
    </script>
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

<!-- tasneef_script//yara26-2-2020 -->
<script>
    function get_details_tasnef() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/notes/Notes/load_tasnef",
            
            beforeSend: function () {
                $('#myDiv_tasnef').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_tasnef').html(d);

            }

        });
    }
</script>
<script>
                function GetTasnefName(id,name) {

                    $('#tasnef').val(id);
                    $('#tasnef_n').val(name);
                    $('#tasnefModal').modal('hide');

                }
 </script>
<script>
  
  function add_tasnef() {
   var value=$('#tasnef_name').val();
      $('#div_update_tasnef').hide();
      $('#div_add_tasnef').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'tasnef=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/notes/Notes/add_tasnef',
              data: dataString,
              dataType: 'html',
              cache: false,
              beforeSend:function()
                {
                    swal({
    title: "جاري الحفظ ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
              success: function (html) {
                $('#tasnef_name').val('');
                  swal({
                      title: "تم الاضافه بنجاح!",
      }
      );
      get_details_tasnef();

              }
          });
      }

  }


</script>
<script>
    function update_tasnef(id) {
        var id = id;
        $('#tasnef_input').show();
        $('#div_add_tasnef').hide();
        $('#div_update_tasnef').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/notes/Notes/getById_tasnef",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#tasnef_name').val(obj.title);


            }

        });

        $('#update_tasnef').on('click', function () {
            var tasnef = $('#tasnef_name').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/notes/Notes/update_tasnef",
                type: "Post",
                dataType: "html",
                data: {tasnef: tasnef,id: id},
                beforeSend: function()
                {
                    swal({
    title: "جاري التعديل ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
                success: function (html) {
                    //  alert('hh');
                    $('#tasnef_name').val('');
                    $('#div_update_tasnef').hide();
                    $('#div_add_tasnef').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_tasnef();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_tasnef(id) {
        swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم",
  cancelButtonText: "لا",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/notes/Notes/delete_tasnef',
                data: {id: id},
                dataType: 'html',
                cache: false,
                beforeSend: function()
                {
                    swal({
    title: "جاري الحذف ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
                success: function (html) {
                    //   alert(html);
                    $('#tasnef').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details_tasnef();

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});










    }
</script>

<script>
function get_disable()
{
val=$('#alarm_type').val();
console.log(val);
if(val==1)
{
    $('#qsm_n').attr("disabled","disabled");    
    $('#btn_depart').attr("disabled","disabled"); 
  
}
else
{
    
    $('#qsm_n').removeAttr("disabled","disabled");    
    $('#btn_depart').removeAttr("disabled","disabled"); 

}
    
}
</script>