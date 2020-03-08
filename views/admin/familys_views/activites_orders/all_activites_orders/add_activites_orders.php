<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;
                ?> </h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open_multipart('family_controllers/activites_orders/ActivitesOrders')?>
            <div class="col-xs-12" >
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">الأنشطة القائمة </label>
                    <select    name=""  id="activity_id_fk_search" onchange="get_activite();"  class=" selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value="" >إختر </option>
                        <?php  if(isset($all_activite )  && !empty($all_activite) &&  $all_activite !=null){
                            foreach ($all_activite as $row):?>
                                <option value="<? echo $row->active_id_fk."-".$row->id ?>">
                                       <? echo $row->name;?></option>
                            <?php endforeach;
                        }else{
                            echo '<option value=""> لا يوجد برامج  مضافة</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-12" id="option_1" >
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ البداية </label>
                    <input type="text"  name="start_data" id="start_data" class="form-control half input-style" placeholder="أختر النشاط أولا" readonly="">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ النهاية </label>
                     <input type="text"  name="end_date" id="end_date" class="form-control half input-style" placeholder="أختر النشاط أولا" readonly="">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">مكان التنفيذ</label>
                    <input type="text"   id="place_name" class="form-control half input-style" placeholder="أختر النشاط أولا" readonly="">
                    <input type="hidden" name="place_id_fk" id="place_id_fk" />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half" style="width: 25% !important;">فئة المستفيد </label>
                    <input  type="radio"  id="type_id_fk" name="type_id_fk"  class="clik"  value="1"   onclick="get_persons('1');"  >
                    <label for="square-radio-1">كل الأسرة</label>

                    <input  type="radio" id="type_id_fk" name="type_id_fk"  class="clik" value="2"  onclick="get_persons('2');"  >
                    <label for="square-radio-1">كل الأيتام </label>

                    <input  type="radio" id="type_id_fk" name="type_id_fk" class="clik"  value="3"  onclick="get_persons('3');"  >
                    <label for="square-radio-1">الأرامل</label>

                    <input  type="radio" id="type_id_fk" name="type_id_fk"  class="clik" value="4"  onclick="get_persons('4');"  >
                    <label for="square-radio-1">الاأيتام البالغين </label>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">رقم السجل المدنى للام </label>
                    <input type="number" value="" name="mother_national_num_fk" id="mother_national_num_fk" onkeyup="get_persons(0);" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>  <!--   987987    -->
            </div>
            <div class="col-xs-12" id="option">

            </div>
            <div class="col-xs-12">
                <button type="submit" name="ADD" value="ADD" class="btn btn-purple w-md m-b-5">
                    <span><i class="fa fa-floppy-o" ></i></span> حفظ </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    //===========================================================
    function get_persons(type_id_fk) {
        var mother_num=$('#mother_national_num_fk').val();  //
        if(type_id_fk ==  0){
            //-----------------------------------------------
            var cbs = document.getElementsByClassName("clik");
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'radio') {
                    if(cbs[i].checked == true){
                        type_id_fk =cbs[i].value;
                    }
                }// end if check
            } // end for
            //-----------------------------------------------
        } //  end main if
        if(mother_num >0 && mother_num  != '' && type_id_fk !=0) {
            var active_id=$('#activity_id_fk').val();
            var start_id=$('#start_activ_id_fk').val();

            var dataString = 'type_id_fk=' + type_id_fk +"&mother_num="+mother_num +"&active_id="+active_id+"&start_id="+ start_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/activites_orders/ActivitesOrders',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#option").html(html);
                }
            });
            return false;
        }
    }
    //===========================================================
  function get_activite() {
      var activity=$('#activity_id_fk_search').val();
      var res = activity.split("-");
      var activite_id= res[0];
      var start_id_fk= res[1];
        if(start_id_fk >0 && start_id_fk  != '') {
            var dataString = 'get_activite=' + activite_id  +"&start_id="+ start_id_fk;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/activites_orders/ActivitesOrders',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                   $("#option_1").html(html);
                }
            });
            return false;
        }
    }
    //===========================================================


</script>