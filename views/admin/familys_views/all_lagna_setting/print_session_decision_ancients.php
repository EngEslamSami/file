


    <link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/style.css">



<!--
    <style type="text/css">
        .print_forma{
            border:1px solid ;
            padding: 15px;
        }
        .print_forma table th{
            text-align: right;
        }
        .print_forma table tr th{
            vertical-align: middle;
        }
        .body_forma{
            margin-top: 40px;
        }
        .no-padding{
            padding: 0;
        }
        .heading{
            font-weight: bold;
            text-decoration: underline;
        }
        .print_forma hr{
            border-top: 1px solid #000;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .myinput.large{
            height:22px;
            width: 22px;
        }

        .myinput.large[type="checkbox"]:before{
            width: 20px;
            height: 20px;
        }
        .myinput.large[type="checkbox"]:after{
            top: -20px;
            width: 16px;
            height: 16px;
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
        @page{
          margin: 60px 15px; 
          size: a4; 
        }
    </style>

-->
<style>
body{
    /*
    font-family: tahoma !important;
    font-size: 12px !important;*/
}

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
        background-color:#6faadc ;
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
    
    
    .gray_background {
    background-color: #969696 !important;
}
    
    }
    @page{
      
      /*  margin: 130px 15px 20px 15px;*/
       	margin: 160px 20px 200px 20px;
    }
        .gray_background {
    background-color: #969696 !important;
}
  
.table-bordered>thead>tr>th, 
.table-bordered>tbody>tr>th,
 .table-bordered>tfoot>tr>th,
  .table-bordered>thead>tr>td,
   .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
    border: 1px solid #000 !important;
        padding: 3px 8px !important;
        font-weight: bold !important;
}

    input[type=radio] {
    border: 0px;
    width: 30px;
    height: 30px;
}
table td h5{
    margin: 3px 0 !important;
    font-size: 16px !important;
}
   
</style>


<div id="printdiv">
<!--
<div class="header col-xs-12 no-padding">
    <div class="col-xs-4 text-center">
        <p>المملكة العربية السعودية</p>
        <p>الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)</p>
        <p>مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463</p>
    </div>
    <div class="col-xs-4 text-center">
        <img src="<?php echo base_url();?>/asisst/admin_asset/img/logo.png">
    </div>
    <div class="col-xs-4 text-center">
        <p>المملكة العربية السعودية</p>
        <p>الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)</p>
        <p>مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463</p>
    </div>
</div>
-->
<div class="col-xs-12 Title">
    <h5 class="text-center"><br><br>
    <span style="border-bottom: 2px solid #999; padding-bottom: 3px;"> 
     <strong>محضر اجتماع لجنة الرعاية الإجتماعية رقم (<?php echo $row->year;?>/<?php echo 2; /*echo $row->session_number;*/ ?>) </strong>
     </span>
     </h5><br>
</div>

<section class="main-body">
    <div class="container-fluid">
        <div class="print_forma no-border col-xs-12 no-padding">
            <div class="personality">
               <br />
               <h4>
                    <b style="border-bottom:1px solid; font-size: 16px ">
                    الحمد لله وحده والصلاه والسلام علي من لانبي بعده وبعد :
                    </b>
                    </h4> <br />
                <p>
     
                
                <?php 
                
             /*   echo '<pre>';
                print_r($records);
               */ 
                
                
                                   $date = date('d-m-Y',$row->date);
                    $dayOfWeek = date("l", strtotime($date));
    ?>
                    <h4 style=" font-size: 16px; font-weight: bold; "><?php  switch ($dayOfWeek) {
                            case "Saturday":
                                echo  ' في هذا اليوم الموافق السبت' .'('.$date.")";
                                break;
                            case "Sunday":
                                echo  ' في هذا اليوم الموافق الاحد' .'('.$date.")";
                                break;
                            case "Monday":
                                echo  ' في هذا اليوم الموافق الاثنين' .'('.$date.")";
                                break;
                            case "Tuesday":
                                echo  ' في هذا اليوم الموافق الثلاثاء' .'('.$date.")";
                                break;
                            case "Wednesday":
                                echo  ' في هذا اليوم الموافق الاربعاء' .'('.$date.")";
                                break;
                            case "Thursday":
                                echo  ' في هذا اليوم الموافق الخميس' .'('.$date.")";
                                break;
                            case "Thursday":
                                echo  ' في هذا اليوم الموافق الخميس' .'('.$date.")";
                                break;
                            default:
                                echo  ' في هذا اليوم الموافق الخميس' .'('.$date.")";
                        }
               
                
                
              //  echo date("Y-m-d",$row->date);
                
                
                
                
                
                ?>
                
                
                
                
                م عقدت لجنة الرعاية الإجتماعية إجتماعها رقم (<?php echo $row->year;?>/<?php echo 2;
                // $row->session_number;
                ?>)
                
                لمناقشة التالي : - 
                 </p>
                <?php if(isset($records)&&!empty($records)){
                    $x=1;
                    $indexs=array(1=>'المحور الأول',
                                  2=>'المحور الثاني',
                                  3=>'المحور الثالث',
                                  4=>'المحور الرابع',
                                  5=>'المحور الخامس');
                    $reasons = array(0 => 'قبول', 1 => 'رفض');
                    foreach($records as $row){

                    ?>
                <p style="font-size: 16px; margin-bottom: 14px;"><?php echo $x;?>- <?php echo $row->title;?> .</p>



                <?php  $x++ ; }  } ?>

                <?php if(isset($records)&&!empty($records)) {
                    $x = 0;
                    foreach ($records as $row) {
                       $x++;

                        ?>

                        <div class="col-xs-12 no-padding">
                        <h6 style="font-size: 16px;"><strong><?php echo $indexs[$x];?> :</strong><?php echo $row->title; ?></h6>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  
                        <thead>
                        <tr>
                            <th class="gray_background">م</th>
                            <th class="gray_background">رقم الملف</th>
                            <th class="gray_background">إسم رب الاسرة</th>
                            <th class="gray_background">عدد الأفراد</th>
                            <th class="gray_background">أرملة</th>
                            <th class="gray_background">يتيم</th>
                            <th class="gray_background">مستفيد</th>
                        
                            <th class="gray_background">سبب الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($row->decision) && !empty($row->decision)) {
                            $z = 0;
                            $all_member=0;
                            $armla=0;
                            $yateem=0;
                                
                            $mostafid=0;
                            $Tall_member = 0;
                             $Tyateem= 0;
                             $Tarmla= 0;
                            $Tmostafid= 0;
                           
                            foreach ($row->decision as $record) {
                                $z ++;


                               // $all_member = $all_member + $record->armla;
                               $all_member = $record->armla + $record->yateem + $record->mostafid;
                                 $armla=$armla+$record->armla;
                                 $yateem=$yateem+$record->yateem;

                                 $mostafid = $mostafid+$record->mostafid;
                                 
                               $Tall_member += $record->armla + $record->yateem + $record->mostafid;   
                               $Tarmla += $record->armla;
                               $Tyateem +=$record->yateem;
                               $Tmostafid += $record->mostafid;
                               
                                 

                            ?>
                            <tr>
                                <td><?php echo $z; ?></td>
                                <td><?php echo $record->file_num; ?></td>
                                <td width="30%"><?php echo $record->father;?></td>
                                <td><?php echo $all_member; ?></td>
                                <td> <?php echo $record->armla; ?></td>
                                <td><?php echo $record->yateem; ?></td>
                                <td> <?php echo $record->mostafid; ?></td>
                           
                                <td> <?php echo $record->reason_title; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                    <tfoot>
                    <th class="gray_background" colspan="3">الإجمالي</th>
                    <th><?php echo  $Tall_member ;?></th>
                    <th><?php echo  $Tarmla ;?></th>
                    <th><?php echo  $Tyateem ;?></th>
                    <th><?php echo  $Tmostafid ;?></th>
                    <th class="gray_background"></th>
                  
                    </tfoot>
                    </table>



                    </div>
                    <?php

                }
                } ?>
  <!------------------------------------------------------->
    <!--------------------- الايقافات ---------------------------------->
<?php /* ?>

                    <?php



                    
                
                     if(!empty($table)){ ?>
                    <h6><strong><?php echo $indexs[4];?> :</strong>إيقاف خدمات عن الأفراد</h6>



                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" 
                    cellspacing="0" width="100%" >

                        <thead>
                        <tr>
                            <th style="font-size: 13px;"  class="gray_background">م</th>
                            <th style="font-size: 13px;" style="width: 40px;" class="gray_background">رقم الملف</th>
                             <th style="font-size: 13px;" class="gray_background">إسم رب الاسرة</th>
                            <th style="font-size: 13px;" class="gray_background">إسم المستفيد</th>
                            <th style="font-size: 13px;" style="width: 40px;" class="gray_background">عدد الأفراد</th>
                            <th style="font-size: 13px;" class="gray_background">أرملة</th>
                            <th style="font-size: 13px;" class="gray_background">يتيم</th>
                            <th style="font-size: 13px;" class="gray_background">مستفيد</th> 

                            <th style="font-size: 13px;" class="gray_background">سبب الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
    <?php

     if(!empty($table)){ $count=1;  $total =0;    $total_armal =0;  $total_yatem =0; $total_mostafed =0; 
    foreach ($table as $row){

//$count ++;
      ?>


                        <tr> <!-- rowspan="<?php echo ($count); ?>" -->
                            <td style="font-size: 11px; "><?=($count )?></td>
                            <td style="font-size: 11px;"><?php echo $row->file_num; ?></td>
                            <td style="font-size: 11px;" ><?php echo $row->ab_name; ?></td>
                          
                            <td style="font-size: 11px;" style="width: 120px;" ><?php echo $row->name; ?>
                          
                       
                            </td>
                            <td style="font-size: 11px;" ><?php echo ($row->armal + $row->yatem + $row->mostafed);?></td>
                            <td style="font-size: 11px;"><?php echo $row->armal;?></td>
                            <td style="font-size: 11px;"><?php echo $row->yatem;?></td>
                            <td style="font-size: 11px;"><?php echo $row->mostafed;?></td>
                            <td style="font-size: 11px;"><?php echo $row->reason;?></td>
                            
                          
                        </tr>

  <?php     $total +=($row->armal + $row->yatem + $row->mostafed);

        $total_armal +=$row->armal;
        $total_yatem +=$row->yatem;
        $total_mostafed +=$row->mostafed;
        $count++;} 
        
         }
          ?>


                        </tbody>
                        <tfoot>
                        <th class="gray_background" colspan="4">الإجمالي</th>
                        <th><?=$total?></th>
                        <th><?=$total_armal?></th>
                        <th><?=$total_yatem?></th>
                        <th><?=$total_mostafed?></th>
                        <th class="gray_background"></th>


                        </tfoot>
                    </table>
                      <?php } ?>

<?php */ ?>
 <!------------------------- نهاية الايقافات------------------------------>
  
  
  
  <!---------------------------------------------------------->
   <br />
     <?php       if (isset($member_galsa) && !empty($member_galsa)){  ?>
       <div class="col-xs-12 no-padding text-center">
                        <!--<h6><strong></strong></h6>-->
                          <span style="border-bottom: 1px solid; padding-bottom: 3px; font-weight: bold;">أعضاء اللجنة</span>
               
                        
         <br />      <br />             
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
style="table-layout: fixed;"
>

                        <thead>
                        <tr>
                            <th style="width: 60px;" class="gray_background">م</th>
                            <th class="gray_background">الاســم</th>
                            <th style="width: 200px;" class="gray_background">الصفة</th>
                            <th  class="gray_background">التوقيع</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php       $x=1;  foreach ($member_galsa as $member) {  ?>
                            <tr>
                                <td> <?=$x++?>  </td>
                                <td> <?=$member->member_name?>  </td>
                                <td> <?=$member->galsa_member_job?>  </td>
                                <td>         </td>
                          
                            </tr>
                            <?php  } ?>

                    </tbody>
                    </table>
                    </div>
                     <?php  } ?>
           <!------------------------------------------------------->

                <div class="col-xs-12">
                <h5 class="text-center">
                <span style="border-bottom: 1px solid; padding-bottom: 3px; font-weight: bold;">توجيه المدير العام</span>
               
                </h5>
                </div>
              
                 <div class="col-xs-12">
                 <div class="col-xs-4">
                <h5 style="position: relative;" >
    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
    <span style="position: absolute; top: 8px;margin-right: 8px; font-weight: bold; "> لا مانع </span>
     </h5>
         <h5 style="position: relative;" >
     <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">  
     <span style="position: absolute; top: 8px;margin-right: 8px;"> ..............</span>
    </h5>
      </div>  
      <div class="col-xs-8">
      <br />
 <h5>.............................................</h5>
  <h5>.............................................</h5>
      </div>  
         </div>  

                    
                    <div class="header col-xs-12 no-padding">
                                <div class="col-xs-4 text-center">
                       
                            </div>
                            <div class="col-xs-4 text-center">
                    
                            </div>
                        <div class="col-xs-4  text-center">
                        <h5 style="margin-right: 15px; font-weight: bold; font-weight: bold !important; font-size: 20px !important;">مدير عام الجمعية</h6>
                     <br />
                        <h5 style="margin-right: 15px; font-weight: bold; font-weight: bold !important; font-size: 20px !important;">سلطان بن محمد الجاسر</h6>
                            </div>
                     </div>




            </div>
        </div>
    </div>
</section>

</div>







<?php 
  //   $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']); 
     
      ?>

<script type="text/javascript" src="<?php echo base_url();?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url();?>/asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url();?>/asisst/admin_asset/js/custom.js"></script>
<!--
    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window.location.href ="<?php echo base_url($previos_path) ?>";
        }, 1000);
    </script >
-->