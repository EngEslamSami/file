
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >

<style type="text/css">

    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }

    .checkbox-statement span{
        margin-right: 3px;
        position: absolute;
        margin-top: 5px;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 90px;
    }
    .no-border{
        border:0 !important;
    }
    .table-devices tr td{
        width: 30%;
        min-height: 20px
    }
    .gray_background{
        background-color: #eee;

    }
    table.th-no-border th,
    table.th-no-border td
    {
        border-top: 0 !important;
    }


    .piece-heading {
        background-color:#f7f7f7 ;
        display: inline-block;
        float: right;
        font-weight: normal !important;
        color: white !important;
        width: 100%;
    }

    .main-header img{
        height: 100px;
    }
    @media print{
        #rightlogo{
            width: 450px;
        }
          .footer{
        position: absolute;
        bottom: 0;
        width: 100%;
    }
    
    }
    @page{
      
      /*  margin: 130px 15px 20px 15px;*/
       	margin: 160px 20px 200px 20px;
    }
    
  
.table-bordered>thead>tr>th, 
.table-bordered>tbody>tr>th,
 .table-bordered>tfoot>tr>th,
  .table-bordered>thead>tr>td,
   .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
    border: 1px solid #000 !important;
        padding: 2px 8px !important;
        background-color: white !important;
}



</style>
<?php 
/*
echo '<pre>';
print_r($record);*/

?>
<div id = "printdiv" >
   
   <!--
    <div class="main-header">
        <div class="col-xs-6">
            <img src="<?php echo base_url();?>asisst/admin_asset/print/right-header.jpg" id="rightlogo">
        </div>
        <div class="col-xs-6">
                <h5 class="text-center">المملكة العربية السعودية </h5>
                <h5 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h5>
                <h5 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h5>

        </div>
    </div>
    <div class="clearfix">

    </div><br>
-->
<div class="col-xs-12 text-center">



<div class="col-xs-2 no-padding">
<h5  style="font-weight: bold;"  >رقم الطلب : <?php echo $record->id; ?></h5>
</div>
<div class="col-xs-7">
<h5 style="font-weight: bold;" >

<span style="border-bottom: 1px solid; padding-bottom: 3px !important;">
المستندات المطلوبة لفتح ملف مستفيد
</span>
</h5>
</div>

<div class="col-xs-3 no-padding">
 <h5 style="font-weight: bold;" >التاريخ : <?=date('d-m-Y',$record->date)?>م</h5>
</div>


</div>
    <!--
    <div class="piece-box no-border ">
        <div class="piece-heading">
            <div class="col-xs-4">
                <h5 >رقم الطلب : <?php echo $record->id; ?></h5>
            </div>
            <div class="col-xs-5 ">

            </div>
            <div class="col-xs-3">

                <h5>التاريخ : <?=date('d-m-Y',$record->date)?>م</h5>
            </div>
        </div>
    </div>
-->
    <div class="clearfix">

    </div>

    <table id="" class="table table-striped table-bordered" >
        <thead>
        <tr>
            <th style="background-color: #f7f7f7 !important; color: black !important ;
             font-weight: normal !important;"  colspan="2" >بيانات الاسرة</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td >اسم الاسرة / <?php echo $record->father_name; ?></td>
      
           <!-- <td  >السجل المدني /   <?php echo $record->father_national_num; ?></td> -->
           
              <!-- <td  >السجل المدني /
                <?php
                $number = $record->father_national_num;
                $array  = array_map('intval', str_split($number));
                for ($i=0; $i < count($array) ; $i++){
                    $s = $array[$i];
                ?>
                   <span style="border:1px solid;padding:0px 2px; margin-left: 5px; "><?=$s?></span>
                <?php
                }
                ?>
            </td>-->
                <td  colspan="2">السجل المدني /
                <?php


                $number = $record->father_national_num;

                $arr  = array_map('intval', str_split($number));
                $array = array_reverse($arr);



                for ($i=0; $i < count($array) ; $i++){
                    $s = $array[$i];


                    ?>

                    <span style="border:1px solid;padding:3px "><?=$s?></span>

                    <?php
                }
                ?>
            </td>
            
        </tr>


     <tr>
            <td > المدينة /   <?php echo $record->madina; ?> </td>
       
         <td >     الحي  /   <?php echo $record->hai; ?></td>
     </tr>


   <tr>
            <td> إسم مقدم الطلب  /   <?php echo $record->full_name_order; ?></td>
            <td> الجوال  /   <?php echo $record->contact_mob; ?></td>
     </tr>


        </tbody>
    </table>
   
    <?php if(isset($main_attach_files) && !empty($main_attach_files) ){?>
        <!--<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        -->
        <table id="" class="table table-striped table-bordered" width="100%" >
            <thead>
            <tr style="background-color: #f7f7f7; color: black !important;">
                <td style="background-color: #f7f7f7 !important; color: black !important ;
             font-weight: normal !important;">م</td>
                <td style="background-color: #f7f7f7 !important; color: black !important ;
             font-weight: normal !important;">نوع الطلب</td>
                <td style="background-color: #f7f7f7 !important; color: black !important ;
             font-weight: normal !important;">حالة الطلب</td>
                <td style="background-color: #f7f7f7 !important; color: black !important ;
             font-weight: normal !important;">ملاحظات</td>
            </tr>
            </thead>
            <tbody>
            <?php $status = array('غير محدد','تحت الطلب','تم التسلم'); $y=1;
           
                foreach ($main_attach_files as $file_row) {
                    if (isset($record->required_files[$file_row->id_setting])) {
                    if ($record->required_files[$file_row->id_setting]->doc_id_fk != $file_row->id_setting) {
                        continue;
                    }



                ?>

                <tr>
                    <td><?= $y ?>
                    </td>
                    <td><?=$file_row->title_setting?></td>
                    <td>


                            <?php foreach ($status as $key=>$value){ ?>

                                    <?php
                                    if(isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])){
                                        if( $record->required_files[$file_row->id_setting]->doc_status_fk ==$key){
                                           // echo $value;
                                        }}
                                    ?>

                            <?php } ?>


                    </td>
                    <td>
                        <?php
                        if(isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])){

                            echo $record->required_files[$file_row->id_setting]->doc_notes;
                        }
                        ?>

                    </td>
                </tr>
            <?php }
                $y++;
                } ?>
            </tbody>
        </table>
       
    <?php }  ?>

<div class="footer">
    <table style="background-color:#f7f7f7 ;  color: white !important;" id="" class="table table-striped table-bordered " >
        <thead>
        <tr>

            <th style="font-weight: normal !important;"  >الموظفـ/ـة  / <?php echo $record->user_name_submit; ?> </th>
            <th style="font-weight: normal !important;" > </th>
            <th style="font-weight: normal !important;" >جوال الجمعية / 
            <?php  
            if(isset($record->society_mob) and $record->society_mob != null){
              echo $record->society_mob;   
            }
            ?> 
            </th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="color: black;">المستلم </td>
            <td style="color: black;" >التوقيع </td>
            <td style="color: black;" >تاريخ الإستلام&nbsp; &nbsp; &nbsp; &nbsp;  / &nbsp; &nbsp; &nbsp;&nbsp;  /    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                &nbsp;</td>
        </tr>



        </tbody>
    </table>
</div>
    </div>


<script >

    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('family_controllers/Family/AddNewRegister') ?>";
    }, 3000);
</script >
