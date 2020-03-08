<style type="text/css">
    .line-text{
        display: inline-block;
        padding-left: 30px;
    }
</style>
<style type="text/css">
    .pdd{margin: 0;padding: 0}
</style>
<div class="col-md-8 col-sm-12 col-xs-12">

     <div class="panel panel-bd lobidrag" style="padding-top: 0;">
            <div class="panel-heading" style="">
                <h6 style="margin: 0">تفاصيل الجلسة </h6>
            </div>
            <div class="panel-body">
             <!-- <div class="form-group col-sm-6">
                <label class="label label-green half">إسم اللجنة</label>
                <input type="text"  value="<?=$session_data["lagna_name"]?>"  class="form-control half input-style"  readonly="readonly">
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green half">كود اللجنه</label>
                <input type="text" value="<?=$session_data["lagna_code"]?>"   class="form-control half input-style"  readonly="readonly"  >
            </div> -->
            <div class="form-group col-sm-6 pdd">
                <div class="form-group col-sm-12 pdd">
                    <div class="form-group col-sm-6 pdd">
                        <label class="label label-green half">رقم الجلسة</label>
                        <input type="text" value="<?=$session_data["session_number"]?>" readonly="readonly" class="form-control half input-style" >
                    </div>
                    <div class="form-group col-sm-6 pdd">
                        <label class="label label-green half">عام</label>
                        <input type="text" name="year" value="<?=$session_data["year"]?>" readonly="readonly" class="form-control half input-style">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green half">تاريخ الجلسة </label>
                <input type="text" value="<?=date("Y-m-d",$session_data["date"])?>" class="form-control half input-style "  readonly="readonly"  >
            </div>
            
            
            </div>
     </div>

    <?php if(isset($accepted)&&!empty($accepted)){?>

        <div class="panel panel-bd lobidrag" style="padding-top: 0;">
            <div class="panel-heading" style="">
                <h6 style="margin: 0">البنود الواردة ( الموافق عليها)</h6>
            </div>
            <div class="panel-body">
                <br>

                <?php if(!empty($accepted)){ ?>
                    <?php  $m=0; foreach($accepted as $row) { if(empty($row->transformation_lagna)){ continue; }else{ $m++; } ?>
                    <?php } }
                if($m ==0){?>
                    <div class="col-lg-12 alert alert-danger" > لا يوجد بنود موافق عليها</div>

                <?php   }else{ ?>

                    <?php if(!empty($accepted)){?>
                    
                    
                        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                            <thead>
                            <tr>
                                <th class="text-center"> م</th>
                                <th class="text-center"> المحور</th>
                                <th class="text-center">رقم الملف /الطلب</th>
                                <th class="text-center">إسم الأب</th >
                                <th class="text-center">رقم هوية الأب</th>
                                <th class="text-center"> التفاصيل</th>
                            </tr>
                            </thead>

                            <?php  $m=1; foreach($accepted as $row) {  if(empty($row->transformation_lagna)){ continue; } ?>
                                <tr>
                                <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $m;?></td>
                                <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $row->title;?></td>
                                <?php if(!empty($row->transformation_lagna)){ foreach ($row->transformation_lagna as $record){ ?>
                                    <td class="text-center"><?php echo $record->file_num;?></td>
                                    <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->full_name; }else{ echo'غير محدد'; } ?></td>
                                    <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->f_national_id; }else{ echo'غير محدد'; } ?></td>

                                    <td class="text-center">
                                        <button data-toggle="modal"
                                                data-target="#myModal"
                                                class="btn btn-sm btn-info" onclick="GetModalData(<?php echo$record->mother_national_num;?>,<?php echo$record->id;?>,1)"><i
                                                class="fa fa-list btn-info"></i> تفاصيل الاسره
                                        </button>
                                    </td>
                                    </tr>
                                <?php } } ?>
                                <?php $m++;} ?>
                            </tbody>
                        </table>
                    <?php  }else{?>
                        <div class="col-lg-12 alert alert-danger" > لا  توجد بنود واردة  موافق عليها</div>
                    <?php } } ?>
            </div>

        </div>


    <?php } ?>

    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">
            <h6 style="margin: 0">البنود المنتهى مناقشتها </h6>
        </div>
        <div class="panel-body">
            <br>
            <div class="col-sm-12 col-md-12 col-xs-12">
                <?php if(!empty($all_orders_end)){ ?>
                    <?php  $m=0; foreach($all_orders_end as $row) { if(empty($row->transformation_lagna)){ continue; }else{ $m++; } ?>
                    <?php } }
                if($m ==0){?>
                    <div class="col-lg-12 alert alert-danger" > لا يوجد بنود منتهى مناقشتها</div>

                <?php   }else{ ?>

                    <?php if(!empty($all_orders_end)){
                        $arr=array(1=>"تم قبول الطلب",2=>" رفض الطلب",0=>"لم يتم النظر ففي الطلب"); ?>
                        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                            <thead>
                            <tr>
                                <th class="text-center"> م</th>
                                <th class="text-center"> المحور</th>
                                <th class="text-center">رقم الملف /الطلب</th>
                                <th class="text-center">إسم الأب</th >
                                <th class="text-center">رقم هوية الأب</th>
                                <th class="text-center"> نتيجه الجلسة</th>
                                <th class="text-center"> التفاصيل</th>
                            </tr>
                            </thead>

                            <?php  $m=1; foreach($all_orders_end as $row) {  if(empty($row->transformation_lagna)){ continue; } ?>
                                <tr>
                                <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $m;?></td>
                                <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $row->title;?></td>
                                <?php if(!empty($row->transformation_lagna)){ foreach ($row->transformation_lagna as $record){ ?>
                                    <td class="text-center"><?php echo $record->file_num;?></td>
                                    <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->full_name; }else{ echo'غير محدد'; } ?></td>
                                    <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->f_national_id; }else{ echo'غير محدد'; } ?></td>
                                    <td style="color: red;"><?php echo $arr[$record->approved_lagna];?></td>
                                    <td class="text-center">
                                        <button data-toggle="modal"
                                                data-target="#myModal"
                                                class="btn btn-sm btn-info" onclick="GetModalData(<?php echo$record->mother_national_num;?>,<?php echo$record->id;?>,2)"><i
                                                class="fa fa-list btn-info"></i> تفاصيل الاسره
                                        </button>
                                    </td>
                                    </tr>
                                <?php } } ?>
                                <?php $m++;} ?>
                            </tbody>
                        </table>
                    <?php  }else{?>
                        <div class="col-lg-12 alert alert-danger" > لا يوجد بنود منتهى مناقشتها</div>
                    <?php } } ?>
                <?php if(!empty($accepted)){ ?>
                    <?php  $m=0; foreach($accepted as $row) { if(empty($row->transformation_lagna)){ continue; }else{ $m++; } ?>
                    <?php } }
                if($m ==0){?>
                    <a  id="finishsession"  >
                        <button type="button" class="btn btn-success " style="float: left" onclick="FinishSession(<?php echo$this->uri->segment(4);?>)"> إنهاء جلسة</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
<div class="col-md-4 col-sm-12 col-xs-12">

    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">
            <h6 style="margin: 0">أعضاء الجلسة </h6>
        </div>
        <div class="panel-body">
            <br>
            <ol>
                <?php
                if(isset($session_member)&&!empty($session_member)) {
                    foreach ($session_member as $row) {
                        ?>
                        <li><?php echo $row->member_name;?></li>
                        <?php
                    }
                }
                ?>
            </ol>
        </div>
        <div class="panel-footer">
            <span class="label label-info" style="font-size: 13px"> <strong>إجمالى الأعضاء :<?php echo count($session_member);?></strong></span>
        </div>
    </div>


</div>
<!---------------------------------------modal--------------------------------->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 90%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
            </div>
            <div class="modal-body">
                <div id="ModalheaderDiv"></div>
                <div id="ModalDataDiv"></div>
            </div>

        </div>
    </div>
</div>


<!--------------------------------------------modal---------------------------->

<script>
    function getAllFamilyDetails(mother_num) {
        var dataString = 'mother_num=' + mother_num ;
        alert(dataString);
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Administrative_affairs/getFamilyDetails',
            data:dataString,
            cache:false,
            success: function(json_data){
                JSONObject =JSON.parse(json_data);
                console.log(JSONObject);
            }
        });
        return false;
    }
</script>

<script type="text/javascript">
    function change_not_accept()
    {
        $('.accept2').hide();
        $('.detail').show();
    }
</script>
<script type="text/javascript">
    function change_accept()
    {
        $('.accept1').hide();
        $('.detail').show();
    }
</script>
<script>
    function change_aproved(value,row) {
        var reason=$('.txt2').val();
        var reason_text="0"; //$('.txt').val();
        var condition=$('.condition').val();
        var glsa_num=$('#glsa_num').val();  // main_type_id
         var main_type_id=$('#main_type_id').val();
        if(reason == 0 || reason == "0"){ 
            alert("تأكد من إدخال جميع البيانات ");
            return ;
        }
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/change_aproved",
            data:{value:value,row:row,reason:reason,glsa_num:glsa_num,condition:condition,reason_text:reason_text,main_type_id:main_type_id},
            success:function(d){
                alert(d);
                location.reload();
            }
        });
        
    }
</script>
<script>
    function GetModalData(mother_num,TransformationLagnaId,type) {
        if (mother_num >0 &&  mother_num !='' ) {
            GetheaderData(mother_num,TransformationLagnaId,type);
            var dataString ='mother_num=' + mother_num  +'&TransformationLagnaId=' + TransformationLagnaId +'&type=' + type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/LagnaSetting/details_family_files',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#ModalDataDiv").html(html);
                     GetMyMoney(mother_num);
                }
            });
        }
    }

</script>
<script>
    //----------------------------------------------------------
    function GetheaderData(mother_num,TransformationLagnaId,type) {
        if (mother_num >0 &&  mother_num !='' ) {
            var dataString ='mother_num=' + mother_num  +'&TransformationLagnaId=' + TransformationLagnaId +'&type=' + type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/LagnaSetting/GetHeaderData',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#ModalheaderDiv").html(html);
                     
                }
            });
        }
    }

</script>
<script>
function GetMyMoney(pass_mun) {
    var income_total = parseInt  ($('#all_income_values').val());
    var duties_total = parseInt ($('#all_duty_values').val());
      var total =parseInt(income_total) - parseInt(duties_total);
    
    var family_num = pass_mun;
    if ( total !='' && total >0) {
        var dataString = 'total=' + total +'&family_num=' + family_num;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/money_function',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
               $('#naseeb').text(Math.round(JSONObject['naseb']));
             
               $('#person_value').val(Math.round(JSONObject['naseb']));
                $('#f2a').text(JSONObject['f2a']);
                $('#family_cat').val(JSONObject['f2a_id']);
            }
        });
    }
}
</script>


<script>

    function FinishSession(session_num) {
        if (session_num >0 &&  session_num !='' ) {
            document.getElementById("finishsession").setAttribute("href", "<?=base_url()."family_controllers/LagnaSetting/FinishSession/";?>"+session_num);
        }
    }

</script>


<script>

  function get_sub_typies(main_type_id){
        var dataString = "main_type_id="+main_type_id;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/LagnaSetting/GetSubTypes',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_lagna_desiton").html(html);
            }
        });
        return false;
    }

</script>



