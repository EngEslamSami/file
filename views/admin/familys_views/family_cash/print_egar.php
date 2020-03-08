<?php /* ?>
<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        window.location = "<?php echo base_url('family_controllers/FamilyCashing'); ?>";

    }
</script>
<?php */ ?>
	<title>طباعه </title>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">

<?php 
//echo 'asdadadsadada';
?>

<style>


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
    
 
  .table-bordered{
	       border-bottom: 0;
	   }
		 .table-bordered > tbody > tr > td,.table-bordered > tbody > tr > th{
		  background-color: #fff !important;
          border: 1px solid #777 !important;
          font-size:14px !important;
          
		}
        .table-bordered > thead > tr > th{
             background-color: #e8e8e8;
             font-size:16px;
        }
        .gray_background {
            background-color: #e8e8e8 !important;
        }
    
    }
    @page{
      
      /*  margin: 130px 15px 20px 15px;*/
       	margin: 160px 20px 200px 20px;
    }
        .gray_background {
            background-color: #969696 ;
        }
          
.table-bordered>thead>tr>th, 
.table-bordered>tbody>tr>th,
 .table-bordered>tfoot>tr>th,
  .table-bordered>thead>tr>td,
   .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
    border: 1px solid #000 !important;
        padding: 2px 8px !important;
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

<body onload="return printDiv('printdiv')" id="printdiv">
                <?php
                
                
                
                 $type =$this->uri->segment(4);
                 
  /*            
    echo '<pre>';
print_r($galsa_data);
*/

                  if(isset($galsa_data) and $galsa_data != null){
    
   $mahder_rkm = $galsa_data['glsa_rkm_full']; 
}

            ?>


<?php 
/*
echo '<pre>';
print_r($record);*/
/*
echo $record[0]->galsa_num_year['session_number'] / $record[0]->galsa_num_year['year']  ;
echo '<pre>';
print_r($record);
*/




?>

  <div class="col-xs-12" style="margin-top: 15px; margin-bottom: 15px">
        <div class="container" style="padding: 0">
            <div class="col-xs-12">
                <div class="col-xs-12" style="padding: 0; margin-bottom:15px;">
                    <h4 class="text-center"><b style="border-bottom:1px solid; font-size: 18px ;">
                     محضر اجتماع لجنة الرعاية الاجتماعية رقم (<?php 
                    // echo $record[0]->lagna_member[0]->lagna_num;
echo $mahder_rkm;
                     ?>) </b>
                     </h4>

                </div>
                <div class="col-xs-12" style="margin-bottom: 15px; padding: 0">
                    <h4>
                    <b style="border-bottom:1px solid; font-size: 16px ">
                    الحمد لله وحده والصلاه والسلام علي من لانبي بعده وبعد :
                    </b>
                    </h4>
                    <!--
                    <h4 style=" font-size: 16px ">
                    
                    في هذا اليوم الموافق(<?php
                     echo date('d-m-Y',$record['sarf_date'] );
                     
                     ?> م )
                     
                     
                          عقدت لجنة الرعاية الاجتماعية إجتماعها رقم (
                          <?php
                          // echo $record[0]->lagna_member[0]->lagna_num;
                           if(isset($galsa_data) and $galsa_data != null){
    
   $mahder_rkm = $galsa_data['glsa_rkm_full']; 
}
                           ?>)
                    لمناقشة التالي : 
                    
                    </h4>-->
                    
                                        <?php
                    // $date = date('d-m-Y',$record['sarf_date']);
                    $date = date('d-m-Y');
                    $dayOfWeek = date("l", strtotime($date));
    ?>
                    <h4 style=" font-size: 16px;  "><?php  switch ($dayOfWeek) {
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
                        ?>
                          عقدت لجنة الرعاية الاجتماعية إجتماعها رقم (
                          <?php 
                          echo $mahder_rkm;
                          ?>)
                    لمناقشة التالي : 
                    
                    </h4>
                    
                    <h4 style=" font-size: 16px "> 1- <?=$record['about'] ?>  .</h4>
                    <h4 style=" font-size: 16px " class="text-center">بعد الإجتماع والمناقشة قررت اللجنة</h4>
                    <h4 style=" font-size: 16px "> إعتماد   <?=$record['about'] ?>  وفقاَ للبيان التالى   :-</h4>


                     <?php 
                     
            
                     
                     if(!empty($sarf_details)) { ?>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  
                    <thead>
                        <tr>
                        <th  style="font-size: 18px !important;" class="text-center">م </th>
                            <th  style="font-size: 18px !important;" class="text-center">رقم الملف</th>
                            <th  style="font-size: 18px !important;" class="text-center">إسم  الأسرة  </th>
                    
                    <th  style="font-size: 18px !important;" class="text-center">عدد الأفراد </th> 
                    
                <th  style="font-size: 18px !important;" class="text-center">الفئة </th>
                            
                            <th  style="font-size: 18px !important;" class="text-center">قيمة مساعدة الإيجار </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        
                            
                                        <?php

                                        
                                        $total =0;
                            $all_afrad=0;
                            $all_aramel=0;
                            $all_aytam=0;
                            $all_ble3en=0;
                            $x=0;
                            
                        
                            
                            foreach ($sarf_details as $row){
                                $x++;
                            $total += $row->value;
                            
                            
                            $all_afrad += ($row->mother_num+$row->young_num+$row->adult_num);
                            $all_aramel  += $row->mother_num;
                            $all_aytam  +=$row->young_num;
                            $all_ble3en  +=$row->adult_num;
                            
                            
                            ?>
                        <tr>
                            
                            <td><?=$x;?></td>
                            <td style=" font-weight: bold !important;"><?=$row->file_num?></td>
                            <td><?=$row->father_full_name?></td>
                        
                        <td><?=($row->mother_num+$row->young_num+$row->adult_num)?></td> 

                        <td><?=$row->fe2a_title?></td>
                        <td><?=$row->value?></td>
                            
                            
                            
                            
                        </tr>
                        <?php  }?>
                        <tr>
                        <td style="font-size: 18px !important; background-color: #e8e8e8 !important;" colspan="5"> الاجمالى</td>
        
                        <td style="font-size: 18px !important; background-color: #e8e8e8 !important;" ><?=$total?></td>
                        </tr>
                        
                        </tbody>
                        </table>
                        
                            <?php  } ?>


                    <h5 class="text-center" style="margin-bottom: 5px;font-size: 18px !important;
                    "><b style="border-bottom:1px solid; font-weight: bold !important; font-size: 20px !important; "> اعضاء اللجنة: </b></h5>

                    <?php if(isset($member_galsa)&&!empty($member_galsa)){ ?>

 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                        <tr class="">
                            <th class="text-center gray_background " style="width: 10%">
                                <h6 style="font-size: 18px !important; font-weight: bold;">م </h6>
                            </th>
                            <th class="text-center gray_background " style="width: 40%">
                                <h6 style="font-size: 18px !important;  font-weight: bold;">الاسم</h6>
                            </th>
                            <th class="text-center gray_background " style="width: 20%">
                                <h6 style="font-size: 18px !important; font-weight: bold;"> الصفة </h6>
                            </th>
                            <th class="text-center gray_background ">
                                <h6 style="font-size: 18px !important; font-weight: bold;"> التوقيع </h6>
                            </th>



                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($member_galsa as $row){ ?>
                        <tr>
                            <td class="text-center gray_background">
                                <h5 style="font-size: 18px !important; margin-right: 15px; font-weight: bold;"><?php echo $x;?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-size: 18px !important; margin-right: 15px; font-weight: bold;"><?php echo $row->member_name;?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-size: 18px !important; margin-right: 15px; font-weight: bold;"><?php echo $row->galsa_member_job;?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-size: 18px !important; margin-right: 15px; font-weight: bold;"></h5>
                            </td>


                        </tr>
                        <?php
                        $x++;
                        } ?>
                        </tbody>
                        </table>

<!--
                    <h5 class="text-center" style="margin-bottom: 5px;">
                    
<b style="border-bottom:1px solid; font-weight: bold !important; font-size: 20px !important; "> توجيه المدير العام </b></h5>
                    <div class="header col-xs-12 no-padding">
                                <div class="col-xs-4 text-center">
            <input tabindex="11" type="radio" id="square-radio-1" name="square-radio">
            <label style="margin-right: 15px; font-weight: bold; font-size: 20px !important;"
                  for="square-radio-1">لا مانع</label><br>
            <input tabindex="11" type="radio" id="square-radio-1" name="square-radio">
            <label  style="margin-right: 15px; "for="square-radio-1">.........</label>                      
          
                            </div>
                            <div class="col-xs-4 text-center">
                                   <h5 style="margin-right: 15px; ">.....................................</h6>
                        <h5 style="margin-right: 15px; ">.....................................</h6>
                            </div>
                        <div class="col-xs-4  text-center">
         
                            </div>
                    </div><br>
 -->  
                <div class="col-xs-12">
                <h5 class="text-center">
                <span style="border-bottom: 1px solid; padding-bottom: 3px; font-weight: bold;">توجيه المدير العام</span>
                </h5>
                </div>
              
                 <div class="col-xs-12">
                 <div class="col-xs-5">
                <h5 style="position: relative;" >
    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
    <span style="position: absolute; top: 8px;margin-right: 8px; font-weight: bold; "> لا مانع </span>
     </h5>
         <h5 style="position: relative;" >
     <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">  
     <span style="position: absolute; top: 8px;margin-right: 8px;"> ..............</span>
    </h5>
      </div>  
      <div class="col-xs-7">
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

                    <?php } ?>

                </div>


            </div>

        </div>
    </div>






    <script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js "></script>
    <script src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js "></script>

</body>