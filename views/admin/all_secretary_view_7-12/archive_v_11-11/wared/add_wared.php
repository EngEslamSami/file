<div class="col-sm-11 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <!-- <div class="panel-heading">
            <h3 class="panel-title"> تسجيل وارد  </h3>
         </div> -->
        <div class="panel-body" >
           <div class="vertical-tabs">
           <div class="col-sm-12 no-padding ">

<?php
if (isset($item) && !empty($item)) {
    $rkm=$item->rkm ;
    $tsgeel_date=$item->tsgeel_date;
    $wared_date=$item->wared_date;
    $estlam_date=$item->estlam_date;
    $geha_ekhtsas_name=$item->geha_ekhtsas_name;
    $geha_ekhtsas_id_fk=$item->geha_ekhtsas_id_fk;
    $title=$item->title;
    $title_id_fk=$item->title_id_fk;

$subject=$item->subject;
$tarekt_estlam=$item->tarekt_estlam;
$tarekt_estlam_name=$item->tarekt_estlam_name;
$geha_morsla_id_fk=$item->geha_morsla_id_fk;
$geha_morsla_name=$item->geha_morsla_name;
$morsel_name=$item->morsel_name;
$morsel_id_fk=$item->morsel_id_fk;
$awlawya=$item->awlawya;
$is_secret=$item->is_secret;
$esthkak_date=$item->esthkak_date;
$notes=$item->notes;
    $need_follow=$item->need_follow;
   
$folder=$item->folder_path;
$no3_khtab_n=$item->no3_khtab_n;
$no3_khtab_fk=$item->no3_khtab_fk;
$reply_moamla=$item->reply_moamla;
$wared_type=$item->wared_type;
$morfq_num=$item->morfq_num;

} else {
    $rkm=$last_rkm ;

    $tsgeel_date=date('Y-m-d\TH:i:s');
 
    $wared_date=date('Y-m-d\TH:i:s');
    $estlam_date=date('Y-m-d\TH:i:s');
    $geha_ekhtsas_name='';
    $geha_ekhtsas_id_fk='';
$title='';
$title_id_fk='';
$subject='';
$tarekt_estlam='';
$tarekt_estlam_name='';
$geha_morsla_id_fk='';
$geha_morsla_name='';
$morsel_name='';
$morsel_id_fk='';
$awlawya='';
  $is_secret='';
  $esthkak_date=date('Y-m-d\TH:i:s');
  $notes='';
  $need_follow='';
  $folder='';
  $no3_khtab_n='';
  $no3_khtab_fk='';
  $reply_moamla='';
  $wared_type='';
  $morfq_num='';


}
?>



			
				  <div class="col-xs-12 no-padding">
          <?php
                    if (isset($item) && !empty($item)){
                    ?>
                    <form action="<?php echo base_url() . 'all_secretary/archive/wared/Add_wared/update/' . $item->id; ?>"
                          method="post" id="form1">

                        <?php } else{ ?>
                        <form action="<?php echo base_url(); ?>all_secretary/archive/wared/Add_wared/add"
                              method="post" id="form1">

                            <?php } ?>



                            <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                      <label class="label">رقم الوارد</label>
                      <input type="text" class="form-control" style="width: 100%;float: right;"
                      name="rkm" id="rkm"   value="<?=$rkm?>"
                      readonly  />
                 
                    </div>
                    <div class="form-group padding-1 col-md-2 col-xs-12 padding-4">
                        <label class="label "> نوع الوارد</label>
                        <select  name="wared_type"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arrxx = array(1 => 'داخلي', 2 => 'خارجي');
                            foreach ($arrxx as $key => $value) {
                                $select = '';
                                if ($wared_type != '') {
                                    if ($key == $wared_type) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
            </div>
            <div class="form-group padding-4 col-md-2 col-xs-12 padding-4">
                        <label class="label "> ردا علي معامله سابقه</label>
                        <select  name="reply_moamla"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arrx = array(1 => 'نعم', 0 => 'لا');
                            foreach ($arrx as $key => $value) {
                                $select = '';
                                if ($reply_moamla != '') {
                                    if ($key == $reply_moamla) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
            </div>

          









                    
            <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                      <label class="label">تاريخ التسجيل</label>
                      <input  type="datetime-local" class="form-control" placeholder=""  name="tsgeel_date"
                      value="<?=$tsgeel_date?>"
                      readonly
                      />
                    </div>

                   

                    <!-- <div class="form-group col-md-2 col-sm-4 padding-4">
                      <label class="label">تاريخ الوارد</label>
                      <input type="date" class="form-control" placeholder="" name="wared_date" 
                      value="<?=$wared_date?>"
                      />
                    </div> -->
                    <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                      <label class="label">تاريخ الاستلام</label>
                      <input type="datetime-local" class="form-control" placeholder="" name="estlam_date" 
                      value="<?=$estlam_date?>"
                      />
                    </div>
                  
                   




                    <div class="form-group padding-5 col-md-3 col-xs-12">
                    <label class="label ">   المجلد</label>
                    <input type="text" class="form-control testButton inputclass"
                           name="folder" id="folder"
                           readonly="readonly"
                           onclick="$('#mogldModal').modal('show');"
                           ondblclick="$('#mogldModal').modal('show');"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"

                           value="<?= $folder?>">
                    <button type="button"  onclick="$('#mogldModal').modal('show');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>


                </div>


                <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label ">    نوع الخطاب</label>
                    <input type="text" class="form-control testButton inputclass"
                           name="no3_khtab_n" id="no3_khtab_n"
                           readonly="readonly"
                           onclick="$('#myModal').modal('show'); load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                           ondblclick="$('#myModal').modal('show');load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                           style="cursor:pointer;border: white;color: black;width: 78%;float: right;"
                           data-validation="required"
                           value="<?= $no3_khtab_n?>">
                    <input type="hidden" name="no3_khtab_fk" id="no3_khtab_fk" value="<?= $no3_khtab_fk?>">
                    <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                    <button type="button"  onclick="$('#myModal').modal('show');load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>

                </div> -->

                <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">نوع الخطاب</label>
                    <input type="text" name="no3_khtab_n" id="no3_khtab_n" value="<?php echo $no3_khtab_n ?>"
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:78%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_no3_khtab').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="no3_khtab_fk" id="no3_khtab_fk" 
                           value="<?php echo $no3_khtab_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_no3_khtab" 
                    onclick="get_details_no3_khtab()"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>



                <!-- <div class="form-group col-md-2 col-sm-4 padding-4">
                      <label class="label">عنوان الموضوع</label>
                      <input type="text" class="form-control" placeholder="" name="title" value="<?= $title; ?>"
                      data-validation="required" 
                      />
                    </div> -->
                    <div class="form-group col-md-2 col-sm-4 padding-4" 
                     >
                    <label class="label  ">عنوان الموضوع </label>
                    <input type="text" name="title_name" id="title_name" value="<?php echo $title ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_title').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="title_id_fk" id="title_id_fk" 
                           value="<?php echo $title_id_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_title" 
                    onclick="get_details_title()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>


                <div class="form-group col-md-1 col-sm-4 col-xs-12 padding-4">
                      <label class="label">عدد المرفقات</label>
                      <input type="number" class="form-control" placeholder="" name="morfq_num" value="<?=$morfq_num; ?>" />
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">طريقه الاستلام </label>
                    <input type="text" name="tarekt_estlam_name" id="tarekt_estlam_name" value="<?php echo $tarekt_estlam_name ?>"
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:78%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_estlam').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="tarekt_estlam" id="tarekt_estlam" 
                           value="<?php echo $tarekt_estlam;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_estlam" 
                    onclick="get_details_estlam()"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>

    










                    <div class="form-group padding-4 col-md-2 col-xs-12">
                        <label class="label "> درجه السريه</label>
                        <select  name="is_secret"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                           // $arr = (1 => 'نعم', 0 => 'لا');
                            foreach ($arr as $key) {
                                $select = '';
                                if ($is_secret != '') {
                                    if ($key->id == $is_secret) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                    </div>

                   



                   





                  
                
                   
            <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label">جهه الارسال  </label>
                    <input type="text" name="geha_morsla_name" id="geha_morsla_name" value="<?php echo $geha_morsla_name ?>"
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:78%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_morsel').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="geha_morsla_id_fk" id="geha_morsla_id_fk" 
                           value="<?php echo $geha_morsla_id_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_morsel" 
                    onclick="get_details_morsel()"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>
                   



                <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label"> اسم المرسل  </label>
                    <input type="text" name="morsel_name" id="morsel_name" value="<?php echo $morsel_name ?>"
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:84%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_geha_morsel').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" name="morsel_id_fk" id="morsel_id_fk" 
                           value="<?php echo $morsel_id_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_geha_morsel" 
                    onclick="get_details_geha_morsel()"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>

                <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label">جهه الاختصاص  </label>
                    <input type="text" name="geha_ekhtsas_name" id="geha_ekhtsas_name" value="<?php echo $geha_ekhtsas_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:77%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_travel_type').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           data-validation="required" 
                           readonly>
                           <input type="hidden" name="geha_ekhtsas_id_fk" id="geha_ekhtsas_id_fk" 
                           value="<?php echo $geha_ekhtsas_id_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_travel_type" 
                    onclick="get_details_geha()"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>

                   
                    
                 
                <div class="form-group padding-4 col-md-2 col-xs-12">
                        <label class="label ">الاولويه</label>
                        <select  name="awlawya"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(2=>'عادي',1 => 'هام', 0 => ' هام جدا');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($awlawya != '') {
                                    if ($key == $awlawya) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
            </div>
           
            <div class="form-group padding-4 col-md-1 col-xs-12">
                    <label class="label ">     يحتاج متابعة</label>
                    <select  type="text" name="need_follow"
                             class="form-control  ">
                        <?php
                             $arr = array('1'=>'نعم','2'=>'لا');
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


                  
                     
              
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                      <label class="label"> تاريخ الاستحقاق</label>
                      <input type="datetime-local" class="form-control" placeholder="" name="esthkak_date" value="<?=$esthkak_date; ?>"/>
                    </div>
                   
                    <div class="form-group padding-4 col-md-6 col-xs-12">
                      <label class="label">الموضوع</label>
                      <input type="text" class="form-control" placeholder=""  name="subject" value="<?= $subject; ?>"/>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-4  padding-4">
                      <label class="label">ملاحظات</label>
                      <input type="text" class="form-control" placeholder="" name="notes" value="<?=$notes; ?>" />
                    </div>
              
              
              
                  </div>
                  <div class="col-xs-12 text-center" style="margin-top: 15px;">
      
                  <button type="submit"
                                class="btn btn-labeled btn-success "  name="add" value="اضافه"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
    
                   
                    <button type="button" class="btn btn-labeled btn-danger ">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>
    
                    <button type="button" class="btn btn-labeled btn-purple ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>
                    
                    
                      <button type="button" class="btn btn-labeled btn-yellow " id="attach_button" data-target="#myModal_search" data-toggle="modal">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>
    
                </div>

				</div>
				


                </div>
        
        
        </div>
    </div>
</div>
<?php 
            
            if(isset($result)&&!empty($result)){?>
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">الوارد </h3>
            </div>
        <div class="panel-body">
           
                <table class="table example table-bordered table-striped table-hover">

                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>   رقم الوارد</th>
              
                    <th> تاريخ الاستلام</th>
                    <th>جهه الاختصاص</th> 
                     <th>الجهه المرسله</th> 
                     <th>  عنوان الموضوع</th>
                     <th> طريقه الاستلام</th>
                     <th> الاولويه</th>
                 
                    <th >الاجراء</th>
                   
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->rkm;?></td>
                        <td><?php echo $row->estlam_date;?></td>
                      <td><?php echo $row->geha_ekhtsas_name;?></td> 
                      <td><?php echo $row->geha_morsla_name;?></td> 
                      <td><?php echo $row->title;?></td>
                      <td><?php echo $row->tarekt_estlam_name;?></td>
                      
                    
                       <td><?php 
                       if($row->awlawya==1){echo 'هام';}elseif($row->awlawya==2){echo ' عادي  ';}elseif($row->awlawya==0){echo 'هام جدا  ';}  ?>
                    
                    
                    </td>
                        <td>
                        <button 
                                data-toggle="modal" data-target="#myModal_print"   
                                
                                onclick="get_print('<?php echo  $row->title?>','<?php echo  $row->date_ar?>' ,'<?php echo  $row->rkm?>');" 
                                class="btn btn-success">طباعه الباركود</button>




                        <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/compelete_details/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
                   
                  </ul>
                </div> 
             
    <?php if($row->suspend!=4){?>
        <div id="update_reason">
        <a onclick='swal({
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
        window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/update/' .$row->id  ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
    <a onclick=' swal({
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
        setTimeout(function(){window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/delete/' . $row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
                            
                           
                                            <!-- <a href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/update/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/delete/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                           -->
                                            <i onclick="get_details(<?= $row->id ?>)"
                                               class="fa fa-search-plus" aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"></i>

                                                   
                 
                      
                      
                <button 
                type="button"             class="btn btn-danger" aria-hidden="true"
                                               data-toggle="modal" onclick="get_reason_end(<?= $row->id ?>)"
                                               data-target="#myModal_end">انهاء للمعامله</button></div>
                                               <?php }else{
                                             
                                 $halet_eltalab = 'تم انهاء المعامله ';
                                $halet_eltalab_class = 'success';    
                                ?>
                                  
                                                <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                                <?php echo $halet_eltalab;  ?>
                                 </span>
                                
                                               <?php }?>
                        </td>
                    </tr>
                    <?php
                    $x++;
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
    
<!-- yara -->
<div class="modal fade" id="Modal_travel_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  جهه الاختصاص   </h4>
            </div>
            <div class="modal-body">


            
                 

                    <div id="myDiv_title"><br><br>
                   
                    </div>
      


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Modal_morsel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  جهه الارسال   </h4>
            </div>
            <div class="modal-body">


            
                 

                    <div id="myDiv_geha"><br><br>
                   
                    </div>
      


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal_geha_morsel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   مسؤولين الجهه   </h4>
            </div>
            <div class="modal-body">


            
                 

                    <div id="myDiv_gehaa"><br><br>
                   
                    </div>
      


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!-- new -->

<div class="modal fade" id="Modal_no3_khtab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   نوع الخطاب  </h4>
            </div>
            <div class="modal-body">
            <div id="no3_khtab_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input11112').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه   نوع الخطاب
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input11112" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">  نوع الخطاب </label>
                                    <input type="text" name="no3_khtab" id="no3_khtab" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_no3_khtab" style="display: block;">
                                    <button type="button" onclick="add_no3_khtab($('#no3_khtab').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_no3_khtab" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_no3_khtab">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

            
                 

                    <div id="myDiv_no3_khtab"><br><br>
                   
                    </div>
      


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- new -->
<div class="modal fade" id="Modal_estlam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  طريقه الاستلام  </h4>
            </div>
            <div class="modal-body">
            <div id="estlam_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه  طريقه الاستلام
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> طريقه الاستلام </label>
                                    <input type="text" name="estlam" id="estlam" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_estlam" style="display: block;">
                                    <button type="button" onclick="add_estlam($('#estlam').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_estlam" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_estlam">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

            
                 

                    <div id="myDiv"><br><br>
                   
                    </div>
      


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- new -->
<div class="modal fade" id="myModal_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> انهاء المعامله :
               
                </h4>
            </div>

            <div class="modal-body">
            <div id="reason_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input6').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافه سبب انهاء المعامله
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input6" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">سبب انهاء المعامله </label>
                                    <input type="text" name="reason_setting" id="reason_setting" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_reason_setting" style="display: block;">
                                    <button type="button" onclick="add_reason_setting($('#reason_setting').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_reason_setting" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_reason_setting">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
            </div>



              <div id="end">
               </div>
        
             </div>
       </div>
   </div>
</div>
</div>
<!-- new -->
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
                            <th>اسم المجلد</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($folders as $row){
                            ?>
                            <tr>

                                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                           id="fo<?= $row->id ?>" ondblclick="GetfolderName('<?= $row->path?>')"></td>
                                <td><?= $row->en_title ?></td>

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
<div class="modal fade" id="myModal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 class="modal-title">نموذج الطباعة </h4>
      </div>
      <div class="modal-body col-sm-12">
       <div class="col-sm-12">
                <div id="div_print" ></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
        <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
      </div>
    </div>

  </div>
</div>
<!-- yara -->
<div class="modal fade" id="Modal_title" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   عنوان الموضوع </h4>
            </div>
            <div class="modal-body">


                <div id="title_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه عنوان الموضوع 
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> عنوان الموضوع  </label>
                                    <input type="text" name="title" id="title" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_title" style="display: block;">
                                    <button type="button" onclick="add_title($('#title').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_title" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_title">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_title_sub"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_details_geha() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_geha",
            
            beforeSend: function () {
                $('#myDiv_geha1111').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_travel_type(value,id) {


        $('#geha_ekhtsas_id_fk').val(id);
        $('#geha_ekhtsas_name').val(value);

        $('#Modal_travel_type').modal('hide');
    }
</script>

<script>
    function get_details_estlam() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_estlam",
            
            beforeSend: function () {
                $('#myDiv').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_estlam(value,id) {


        $('#tarekt_estlam').val(id);
        $('#tarekt_estlam_name').val(value);

        $('#Modal_estlam').modal('hide');
    }
</script>

<script>
  
  function add_estlam(value) {

      $('#div_update_estlam').hide();
      $('#div_add_estlam').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'estlam=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_estlam',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#estlam').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",


      }
      );
      get_details_estlam();

              }
          });
      }

  }


</script>
<script>
    function update_estlam(id) {
        var id = id;
        $('#geha_input1111').show();
        $('#div_add_estlam').hide();
        $('#div_update_estlam').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_estlam",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#estlam').val(obj.title);


            }

        });

        $('#update_estlam').on('click', function () {
            var estlam = $('#estlam').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_estlam",
                type: "Post",
                dataType: "html",
                data: {estlam: estlam,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#estlam').val('');
                    $('#div_update_estlam').hide();
                    $('#div_add_estlam').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_details_estlam();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_estlam(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_estlam',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#estlam').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details_estlam();

                }
            });
        }

    }
</script>





























<script>
    function get_details_morsel() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_geha_morsel",
            
            beforeSend: function () {
                $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_morsel(value,id) {


        $('#geha_morsla_id_fk').val(id);
        $('#geha_morsla_name').val(value);

        $('#Modal_morsel').modal('hide');
    }
</script>

<script src="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.js"></script>
<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.css">
<script>
    function get_details_geha_morsel() {
       // $('#pop_rkm').text(rkm);
    var id=$('#geha_morsla_id_fk').val();
    console.log(id);
    if(id=='')
    {
      $('#Modal_geha_morsel').modal('hide');
     
swal({
    title: "من فضلك اختر الجهه اولا ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});


    }
    else{
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_morsel",
            data:{id:id},
            beforeSend: function () {
                $('#myDiv_gehaa').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_gehaa').html(d);

            }

        });
       }
    }
</script>
<script>
    function getTitle_geha_morsel(id,value) {


        $('#morsel_id_fk').val(id);
        $('#morsel_name').val(value);

        $('#Modal_geha_morsel').modal('hide');
    }
</script>
<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);

            }

        });
    }
</script>
<script>
    function GetfolderName( name) {

        $('#folder').val(name);

        $('#mogldModal').modal('hide');


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
  
  function add_reason(id) {

    

var id=id;
    var value=$('#reason_id_fk').val();
    var name=$('#reason_name').val();
      if (value != 0 && value != '' ) {
         
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_end',
              data: {id:id,value:value,name:name},
              dataType: 'html',
              cache: false,
              success: function (html) {

                $('#myModal_end').modal('hide');
          
                  swal({
                      title: "تم انهاء المعامله بنجاح!",


      }
      );
    
$('#update_reason').hide();
$('#span_reason').append("<span class='label label-success' style='min-width: 140px;''>تم انهاءالمعامله </span>");
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء اختيار سبب لايقاف المعامله!",


      }
      );
    

      }

  }


</script>
<script>
    function getTitle_reason(id,value) {


        $('#reason_id_fk').val(id);
        $('#reason_name').val(value);

  
    }
</script>

<script>
    function get_reason_end(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_reason",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#end').html(d);

            }

        });
    }
</script>
<script>
    function get_print(id ,date,num){
       var print_id=id;
      var date_export=date;
      var num_post =num ;
        var dataString = 'id=' + print_id + '&type=' + 2 +  "&num="+num_post+"&date="+date_export ;
       $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/PrintCode',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>


<script>
    function get_details_no3_khtab() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_no3_khtab",
            
            beforeSend: function () {
                $('#myDiv_no3_khtab').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_no3_khtab').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_no3_khtab(value,id) {


        $('#no3_khtab_fk').val(id);
        $('#no3_khtab_n').val(value);

        $('#Modal_no3_khtab').modal('hide');
    }
</script>

<script>
  
  function add_no3_khtab(value) {

      $('#div_update_no3_khtab').hide();
      $('#div_add_no3_khtab').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'no3_khtab=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_no3_khtab',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#no3_khtab').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",


      }
      );
      get_details_no3_khtab();

              }
          });
      }

  }


</script>
<script>
    function update_no3_khtab(id) {
        var id = id;
        $('#geha_input11112').show();
        $('#div_add_no3_khtab').hide();
        $('#div_update_no3_khtab').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_no3_khtab",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#no3_khtab').val(obj.title);


            }

        });

        $('#update_no3_khtab').on('click', function () {
            var no3_khtab = $('#no3_khtab').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_no3_khtab",
                type: "Post",
                dataType: "html",
                data: {no3_khtab: no3_khtab,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#no3_khtab').val('');
                    $('#div_update_no3_khtab').hide();
                    $('#div_add_no3_khtab').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_details_no3_khtab();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_no3_khtab(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#no3_khtab').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details_no3_khtab();

                }
            });
        }

    }
</script>


<script>
  
  function add_reason_setting(value) {

      $('#div_update_reason_setting').hide();
      $('#div_add_reason_setting').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'reason_setting=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_setting',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#reason_setting').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تمت الاضافه بنجاح!",


      }
      );
      get_reason_end();

              }
          });
      }

  }


</script>
<script>
    function update_reason_setting(id) {
        var id = id;
        $('#geha_input6').show();
        $('#div_add_reason_setting').hide();
        $('#div_update_reason_setting').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_reason_setting",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#reason_setting').val(obj.title);


            }

        });

        $('#update_reason_setting').on('click', function () {
            var reason_setting = $('#reason_setting').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_reason_setting",
                type: "Post",
                dataType: "html",
                data: {reason_setting: reason_setting,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason_setting').val('');
                    $('#div_update_reason_setting').hide();
                    $('#div_add_reason_setting').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_reason_end();    

                }

            });

        });

    }

  
</script>
<script>
  
    
  function delete_reason_setting(id) {
  //  confirm('?? ??? ????? ?? ????? ????? ?');
       var r = confirm('هل انت متاكد من الحذف ?');
  if (r == true) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
              //   alert(html);
              $('#reason_setting').val('');
             // $('#Modal_esdar').modal('hide');
            
              swal({
                  title: "تم الحذف!",


  }
  );
  get_reason_end();

          }
      });
  }

}
</script>
<script>
    function get_details_title() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_title",
            
            beforeSend: function () {
                $('#myDiv_title_sub').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_title_sub').html(d);

            }

        });
    }
</script>
<script>
    function getTitle(value,id) {


        $('#title_id_fk').val(id);
        $('#title_name').val(value);

        $('#Modal_title').modal('hide');
    }
</script>
<script>
  
  function add_title(value) {

      $('#div_update_title').hide();
      $('#div_add_title').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'title=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_title',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#title').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",


      }
      );
      get_details_title();

              }
          });
      }

  }


</script>
<script>
    function update_title(id) {
        var id = id;
        $('#input1111').show();
        $('#div_add_title').hide();
        $('#div_update_title').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_title",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#title').val(obj.title);


            }

        });

        $('#update_title').on('click', function () {
            var title = $('#title').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_title",
                type: "Post",
                dataType: "html",
                data: {title: title,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#title').val('');
                    $('#div_update_title').hide();
                    $('#div_add_title').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_details_title();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_title(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_title',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#title').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details_title();

                }
            });
        }

    }
</script>