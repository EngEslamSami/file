
<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
    .striped-ul li:nth-child(2n+1){
        background-color: #e1edf7;
    }
    .striped-ul li{
        padding: 10px 0;
    }
    .striped-ul{
        margin-bottom: 20px;
    }


</style>

<?php
if(isset($result)&&!empty($result))
{

    $k_yatem_full=$result->k_yatem_full;
    $k_yatem_half=$result->k_yatem_half;
    $k_armal=$result->k_armal;
    $k_mostafed=$result->k_mostafed;
  //  $k_status=$result->k_status;
        $k_status=$result->kafel_status;
    $start_kfala_date=$result->start_kfala_date;
    $num_days =$result->num_days ;
    $alert_type   =$result->alert_type ;
    $pay_method  =$result->pay_method ;
    $bank_id_fk   =$result->bank_id_fk ;
    $bank_account_num   =$result->bank_account_num ;
    $bank_branch  =$result->bank_branch ;
    $num  =$result->num  ;



}else{

    $k_yatem_full    ="";
    $k_yatem_half    ="";
    $k_armal    ="";
    $k_mostafed    ="";
    $start_kfala_date="";
    $k_status="";
    $alert_type   ="";
    $num_days   ="";
    $pay_method   ="";
    $bank_id_fk   ="";
    $bank_account_num   ="";
    $bank_branch  ="";
    $num ="";
}
?>





<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                        $data_load['k_status'] = $k_status;
                        $this->load->view('admin/all_Finance_resource_views/sponsors/drop_down_menu', $data_load);
                    }?>
                </div>
            </div>
            <div class="panel-body">



            
                <?php  echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$this->uri->segment(5)); ?>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع الكفالة </label>
                    </div>
                    <?php
                    if(isset($kfalat_types)&&!empty($kfalat_types)) {
                        foreach($kfalat_types as $value){
                            ?>
                            <input  type="radio" name="kafala_type_fk" style="margin-right: 15px" onclick="GetKafalaTypeArr(<?=$value->id?>)" value="<?=$value->id ?>"
                                     <?php if(!empty($result_Kfala_data)){ if($result_Kfala_data['kafala_type_fk'] == $value->id){echo 'checked'; } } ?>  data-validation="required">

                            <label for="square-radio-1"><?=$value->title?></label>
                            <?php
                        }
                    }
                    ?>
                </div>







                <!-------------------------------------start---------------------------------------->

                <div class="col-md-12">

                            <table id="js_table_members" style="display: none"

                                   class="table table-striped table-bordered dt-responsive nowrap ">
                                <thead>
                                <tr class="half_khafala">
                                   
                                </tr>
                                </thead>
                            </table>

 
                    <div id="dataMember"></div>

                </div>
                <!-------------------------------------start---------------------------------------->

                <div class="col-md-12" id="button_div"  style="display: none"  >


                    <input type="hidden" name="kafel_id_fk" id="kafel_id_fk" value="<?=$this->uri->segment(5)?>">
                    <div class="form-group col-md-5 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="add" value="add"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
        
        

        
                <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">كفالات الكافل</h3>
                <div class="pull-left">
           
                    
                    
                    
                    
                    
                </div>
            </div>
            <div class="panel-body">
            
                  <?php $total=0; $table_total=0; if(isset($all_kafalat) && $all_kafalat!=null){
   $total =$all_kafalat[0]->mostafed_num['total'] + $all_kafalat[0]->aytam_num['total'] + $all_kafalat[0]->armal_num['total'];
                      $table_total +=$total;
                      ?>

                        <table class="table table-striped table-bordered dt-responsive nowrap ">
                                <thead>
                                <tr>
                                    <th style="">م</th>
                                    <th style="">رقم الملف</th>
                                    <th style=""> إسم المستفيد </th>
                                    <th style=""> التفاصيل </th>
                                    <th style="" >نوع  الكفالة </th>
                                    <th style="" >حالة  الكفالة </th>
                                    <th style="" >بداية  الكفالة </th>
                                    <th style="" >نهاية  الكفالة </th>
                                    <th style="" >قيمة  الكفالة </th>
                                    <th style="" >طريقة التوريد</th>
                                    <th style="" >متبقي علي انتهاء الكفالة</th>
                                    <th style="" >أيام السماح</th>
                                    <th style="" >الإجراء </th>
                                </tr>
                                </thead>
                                
                              <tbody>
                        <?php
                        $x=1;
                        foreach($all_kafalat as $row_kafala){

                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row_kafala->file_num;?></td>
                                <td><?php echo $row_kafala->person_name;?></td>
                                <td><a type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal<?php echo $row_kafala->id;?>">التفاصيل</a></td>
                              
                              <!--  <td  style="background-color: <?php echo $row_kafala->kafala_color;   ?>;">
                                    <?php echo $row_kafala->kafala_name;?></td>-->
    
<td  style="background-color: <?php echo $row_kafala->kafala_color;   ?>;">
    <?php if($row_kafala->kafala_type_fk==2){?>
   <button class="btn btn-add" data-toggle="modal" data-target="#half_khafala<?php echo $row_kafala->id;?>"> <?php echo $row_kafala->kafala_name;?></button>
<?php }else { echo  $row_kafala->kafala_name; } ?>  </td>                                
                               
                                    
                                    
                                    
                                <td style="background-color: <?php echo $row_kafala->halet_kafel_color;   ?>;">
                                    <?php echo $row_kafala->halet_kafel_title;?></td>
                                <td><?php echo $row_kafala->first_date_from_ar;?></td>
                                <td><?php echo $row_kafala->first_date_to_ar;?></td>
                                <td><?php echo $row_kafala->first_value;?></td>
                                <td><?php
                                    $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                                if(!empty($pay_method_arr[$row_kafala->pay_method])){
                                    echo $pay_method_arr[$row_kafala->pay_method]; }?></td>
                                <td>
                                    <?php
                                    $startDate = strtotime("now");
                                    $endDate = $row_kafala->first_date_to;
                                    $seconds_left = ($endDate - $startDate);
                                    $days_left = floor($seconds_left / 3600 / 24);
                                    //echo $days_left;
                                      if($days_left >= 0){
                                            $class_days_left = 'success';
                                        }elseif($days_left < 0){
                                         $class_days_left = 'danger'; 
                                        }
                                    
                                    
                                     ?>

                                    <button type="button" class="btn btn-sm btn-<?php echo $class_days_left; ?> btn-rounded">
                                        <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                        <?php echo $days_left; 
                                      
                                        
                                        
                                        ?> &nbsp;  أيام   </button>
                                </td>
                                <!---------------------------------->
                                <td>
                                    <button type="button" class="btn btn-success " id="days_button" data-toggle="modal" data-target="#myModals<?php echo $row_kafala->id;?>">
                                                  <?php if(!empty($row_kafala->days_num)){ echo$row_kafala->days_num.'أيام';
                                                  }else{ echo'أيام السماح'; } ?>

                                      </button>

                                </td>
                                <td>
                                    <?php if($row_kafala->kafala_type_fk ==2){
                                        $kafel_id =$row_kafala->first_kafel_id;

                                    }else{
                                        $kafel_id =$row_kafala->first_kafel_id;

                                    } ?>
                                    <a data-toggle="modal" data-target="#myModal_edit" onclick="GetEditData(<?php echo $row_kafala->id;?>,<?php echo $row_kafala->first_kafel_id;?>)"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/sponsors/Sponsor/deleteKfala_data/".$row_kafala->id."/".$kafel_id  ?>');"
                                       data-toggle="modal" data-target="#modal-delete"
                                       title="حذف"> <i class="fa fa-trash"
                                                       aria-hidden="true"></i> </a>
                                                       
                                                       
<a href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/print_card_kafala/<?php echo $kafel_id;?>/<?php echo $row_kafala->id; ?> " target="_blank">
<i style="background-color: #0a568c" class="fa fa-print" aria-hidden="true"></i> </a>
                                                       
                                                       
                                </td>

                                <!------------------------------------>
                            </tr>


                            <!----------------popup-------------------->

                            <?php




                            if( $row_kafala->kafala_type_fk ==4) {


                                $gender = 'ذكر';
                                if ( $row_kafala->person_data['m_gender'] == 2) {
                                    $gender = 'أنثى';
                                }


                                if( $row_kafala->person_data['m_birth_date_hijri'] !=''){

                                    $row_kafala->person_data['m_birth_date_hijri'] =$row_kafala->person_data['m_birth_date_hijri'];

                                }else{

                                    $row_kafala->person_data['m_birth_date_hijri'] ='غير محدد';
                                }

                                if( $row_kafala->person_data['m_birth_date_hijri_year'] !=''){

                                    $age = $current_hijry_year - $row_kafala->person_data['m_birth_date_hijri_year'];

                                }else{

                                    $age =0;
                                }

                            }else{

                                $gender = 'ذكر';
                                if ($row_kafala->person_data['member_gender'] == 2) {
                                    $gender = 'أنثى';
                                }


                                if( $row_kafala->person_data['member_birth_date_hijri'] !=''){

                                    $row_kafala->person_data['member_birth_date_hijri'] =$row_kafala->person_data['member_birth_date_hijri'];

                                }else{

                                    $row_kafala->person_data['member_birth_date_hijri'] ='غير محدد';
                                }

                                if( $row_kafala->person_data['member_birth_date_hijri_year'] !=''){

                                    $age = $current_hijry_year - $row_kafala->person_data['member_birth_date_hijri_year'];

                                }else{

                                    $age =0;
                                }

                            }
                            ?>



                            <div class="modal fade" id="myModal<?php echo $row_kafala->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-unstyled striped-ul" >
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  إسم رب الأسرة :</h6>

                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->father_name;?></h6>
                                                    </div>

                                                </li>

                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  اسم المستفيد :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->person_name;?> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  الجنس :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $gender;?> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  تاريخ الميلاد :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->person_data['member_birth_date_hijri'];?> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6> العمر :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $age;?> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6> الفئة :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6> </h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  حالة المستفيد :</h6>

                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->person_data['halt_elmostafid_title'];?> </h6>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer" style="display: inline-block;width: 100%">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="myModals<?php echo $row_kafala->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <?php echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/add_days_num/'.$row_kafala->id.'/'.$row_kafala->first_kafel_id); ?>

                                        <div class="modal-body">
                                            <div class="col-md-12 ">
                                                <div class="form-group col-md-8 col-sm-6 padding-4">
                                                    <label class="label label-green half">	الايام</label>
                                                    <input type="number" name="days_num" id="days_num" data-validation="required"
                                                           class="form-control half  " value="<?=$row_kafala->days_num?>"
                                                           data-validation-has-keyup-event="true">
                                                </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer" style="display: inline-block;width: 100%">
                                            <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                            <button type="submit" name="save" value="save"class="btn btn-success">حفظ</button>
                                        </div>
                                        <?php echo form_close()?>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            <!----------------popup-------------------->
                            
                            								
								       <!----------------start pob up second_khafel -------------------->
                            <div class="modal fade" id="half_khafala<?php echo $row_kafala->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"> تفاصيل نصف الكفاله الاخري </h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php if(!empty($row_kafala->second_kafel)){?>
                                            <ul class="list-unstyled striped-ul" >
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  اسم الكافل الثاني :</h6>

                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->second_kafel->name;?></h6>
                                                    </div>

                                                </li>

                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  تاريخ بدايه الكفاله :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo date('Y-m-d',$row_kafala->second_kafel->first_date_from);?></h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6>  تاريخ انتهاء الكفاله :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo date('Y-m-d',$row_kafala->second_kafel->first_date_to);?></h6>
                                                    </div>

                                                </li>
                                                <li class="col-xs-12">
                                                    <div class=" col-xs-4">
                                                        <h6> المبلغ :</h6>

                                                    </div>


                                                    <div class="col-xs-8">
                                                        <h6><?php echo $row_kafala->second_kafel->first_value;?></h6>
                                                    </div>

                                                </li>



                                            </ul>
                                            <?php } else { ?>
                                                <div class="alert alert-danger">لايوجد كافل اخر</div>
                                            <?php } ?>

                                        </div>
                                        <div class="modal-footer" style="display: inline-block;width: 100%">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----------------end pob up second_khafel -------------------->
                            
                            
                            

                            <?php
                            $x++;







                        }
                        ?>
                        <!----------------total-------------------->

                        <!-----------------total------------------->
                        </tbody>

                            <tr>
                                <td colspan="8" style="text-align: center;color: red">الإجمالي</td>
                                <td><?php echo$table_total; ?></td>

                            </tr>
                            </table>
              <!-------------------------buttons------------------------->
                      <div class="text-center">

                          <button type="button" class="btn btn-sm btn-success">
                              أرامل <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->armal_num['num']; ?></span>
                              <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->armal_num['total']; ?></span>
                          </button>
                          <button type="button" class="btn btn-sm btn-primary">
                              أيتام <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->aytam_num['num']; ?></span>
                             <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->aytam_num['total']; ?></span>
                          </button>

                          <button type="button" class="btn btn-sm btn-add">
                              مستفيدين <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->mostafed_num['num']; ?></span>
                              <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo  $all_kafalat[0]->mostafed_num['total']; ?></span>
                          </button>
                          <button type="button" class="btn btn-sm btn-add">
                              الإجمالي <span style="background-color: white; color: #000;" class="badge badge-light"><?php echo$total; ?></span>
                          </button>

                          <br />
                      </div>
                      <!-------------------------buttons------------------------->

                  <?php } ?>



            
            </div>

  </div>
 
        

    </div>
    
    
        
      






    <!------------------------------------------------------------------>

    <!------ table -------->

   </div>



<!----------------popup-------------------->
<div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document" style="width: 85%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تعديل بيانات كفالة</h4>
            </div>
            <?php    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/updateKfala_data'); ?>

            <div class="modal-body">
                <div  id="edit_div"></div>

            </div>

            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" style="float: left" class="btn btn-danger " data-dismiss="modal">إغلاق</button>
                <button  type="submit"  id="save" name="add" value="add" class="btn btn-success edit_modal_but">حفظ</button>

            </div>
            <?php echo form_close();?>

        </div>
    </div>
</div>
<!----------------popup  khafala_detail  -------------------->

<div class="modal fade" id="khafala_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document" style="width: 85%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">بيانات الكافل </h4>
            </div>

            <div class="modal-body">
                <div  id="another_khafel"></div>

            </div>

            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" style="float: left" class="btn btn-danger " data-dismiss="modal">إغلاق</button>

            </div>

        </div>
    </div>
</div>








    <!----- end table ------>



<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

    <script>
        function validate_number(evt) {
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
        function length_hesab_om(length) {
            var len=length.length;
            if(len<24){
                alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
            }
            if(len>24){
                alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
            }
            if(len==24){
            }
        }
    </script>
    <script>
        function get_length(len,span_id)
        {
            if(len.length < 10){
                document.getElementById("save").setAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
            }
            if(len.length >10){
                document.getElementById("save").setAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
            }
            if(len.length ==10){
                document.getElementById("save").removeAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = '';
            }
        }
    </script>

    <script>
        function chek_length(inp_id,len)
        {
            var inchek_id="#"+inp_id;
            var inchek =$(''+inchek_id).val();
            if(inchek.length < len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length > len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length == len){
                document.getElementById(""+ inp_id +"_span").innerHTML ='';
                document.getElementById("save").removeAttribute("disabled", "disabled");
            }
        }
    </script>


<script>

    function checkYear(valu) {
        nowyear = <?php echo$current_hijry_year;?>;
        var myDate =valu.split("/");
        if(parseInt(myDate[2]) > parseInt(nowyear) ){
           alert( " السنة الهجرية الحالية "  + nowyear);
        $('#start_kfala_date').val('');
        }
    }

</script>






<script>
    function length_hesab_om(length) {

        var len = length.length;

        if (len < 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>




<!------------------------------------start---------------------------->


<script>

    function GetKafalaTypeArr(valu) {


   $('#js_table_members').show();
         var KafalaType = valu;

        if(valu==2) {
            $('.half_khafala').html('<th style="width: 50px;">#</th>'+

                '<th style="width: 50px;">ملف الأسرة </th>'+
                '<th style="width: 50px;">اسم العائله </th>'+
                '<th style="width: 50px;">اسم المستفيد </th>'+
                '<th style="width: 50px;">فئه  المستفيد </th>'+
                '<th style="width: 50px;"> الجنس </th>'+
                '<th style="width: 50px;">تاريخ  الميلاد </th>'+
                '<th style="width: 50px;"> العمر </th>'+
                '<th style="width: 50px;"> الفئه </th>'+
                '<th style="width: 50px;"> الحاله </th>'+
            '<th style="width: 50px;"> الكفاله الاخري</th>'


                );
            var oTable_usergroup = $('#js_table_members').DataTable({
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/getConnection/' + KafalaType,

                aoColumns: [
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true}

                ],

                buttons: [
                    'pageLength',
                    'copy',
                    'excelHtml5',
                    {
                        extend: "pdfHtml5",
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {columns: ':visible'},
                        orientation: 'landscape'
                    },
                    'colvis'
                ],

                colReorder: true,
                destroy: true

            });
        } else{
            $('.half_khafala').html('<th style="width: 50px;">#</th>'+
                '<th style="width: 50px;">ملف الأسرة </th>'+
                '<th style="width: 50px;">اسم العائله </th>'+
                '<th style="width: 50px;">اسم المستفيد </th>'+
                '<th style="width: 50px;">فئه  المستفيد </th>'+
                '<th style="width: 50px;"> الجنس </th>'+
                '<th style="width: 50px;">تاريخ  الميلاد </th>'+
                '<th style="width: 50px;"> العمر </th>'+
                '<th style="width: 50px;"> الفئه </th>'+
                '<th style="width: 50px;">الحاله  </th>'



            );
            var oTable_usergroup = $('#js_table_members').DataTable({
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/getConnection/' + KafalaType,

                aoColumns: [

                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},

                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                ],

                buttons: [
                    'pageLength',
                    'copy',
                    'excelHtml5',
                    {
                        extend: "pdfHtml5",
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {columns: ':visible'},
                        orientation: 'landscape'
                    },
                    'colvis'
                ],

                colReorder: true,
                destroy: true

            });

        }

    }

</script>

<script type="text/javascript">
    function getMemberData(argument,kafalaType) {
        /*
$.ajax({
    type: 'post',
    url: "<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/check_kafal",
    data: {type_kafa: kafalaType, person_id_fk: argument},


    success: function (d) {

        if(d>0)
        {
            alert("من فضلك قم بحذف الكفاله الشامله الاولي قبل اضافه الثانيه لهذا اليتيم");
           // $('.edit_modal_but').hide();
            return;


        }


    }

});

*/

        $('#button_div').show();
        var kafel_id_fk = $('#kafel_id_fk').val();

        
        var dataString = 'id=' + argument +'&& kafel_id_fk=' + kafel_id_fk +'&& kafalaType=' + kafalaType;
        //alert(dataString);
       if( kafalaType == 4) { 
        
        
            $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/getMotherData',
            data:dataString,
            cache:false,
            success: function(result){
             //   alert(result);
                $('#dataMember').html(result);
            }
        });
       }else { 
           $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/getMemberData',
            data:dataString,
            cache:false,
            success: function(result){
              //  alert(result);
                $('#dataMember').html(result);
            }
        });
        
        
       }
       
     

       var yearHijri =<?php echo $current_hijry_year;?>;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>all_Finance_resource/sponsors/Sponsor/GetSidebarData',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
               // console.log(JSONObject);
                if( JSONObject['kafalaType'] == 4){
                    $('#member_name').html( JSONObject['result'].full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].m_birth_date_hijri);
                    var member_year = JSONObject['result'].m_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);


                } else {
                    $('#member_name').html( JSONObject['result'].member_full_name);
                    $('#file_nmber').html( JSONObject['result'].file_num);
                    $('#father_name').html( JSONObject['result'].father_name);
                    $('#birth_date').html( JSONObject['result'].member_birth_date_hijri);
                    var member_year = JSONObject['result'].member_birth_date_hijri.split("/");
                    $('#age').html( yearHijri -  member_year[2]);

                }



            }
        });


    }
</script>



<script>

	function GetEditData(kafala_id) {

		var dataString = 'id=' + kafala_id;
		$.ajax({
			type:'post',
			url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/GetEditData',
			data:dataString,
			cache:false,
			success: function(html){
				$("#edit_div").html(html);
			}
		});


	}

</script>




<!---------------------------------------------------------->
<script>

    function get_another_khafel(yatem_id) {
        var sponsor_id='<?php echo $this->uri->segment(5);?>';
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/get_another_khafel",
            data: {sponsor_id: sponsor_id,yatem_id: yatem_id},


            success: function (d) {

                $('#another_khafel').html(d);

               // alert(d);
            }

        });
    }


</script>



