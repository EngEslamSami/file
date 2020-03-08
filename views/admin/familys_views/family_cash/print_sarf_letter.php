<?php 

/*echo '<pre>';
print_r($record);
*/

//print_r($sarf_details);

?>

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


<?php
/*
echo '<pre>';
print_r($emppp);*/
/*
echo '<pre>';
print_r($record);
*/
 ?>



<body onload="return printDiv('printdiv')" id="printdiv">
  <div class="col-xs-12" style="margin-top: 15px; margin-bottom: 15px">
        <div class="container" style="padding: 0">
            <div class="col-xs-12">
                <div class="col-xs-12" style="padding: 0; margin-bottom:15px;">
                    <h4 class="text-center"><b style="border-bottom:1px solid">
                   طلب تنفيذ برنامج </b></h4>

                </div>
                <div class="col-xs-12" style=" padding: 0">
                    <h4>
                    <b style="border-bottom:1px solid">
 <h4 style="font-weight: bold !important;font-size: 20px !important;" >سعادة/مدير الرعاية والبرامج التنموية &nbsp
 &nbsp  &nbsp  &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp   &nbsp  &nbsp  &nbsp 
  &nbsp  &nbsp  &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp   &nbsp  &nbsp  &nbsp 
    &nbsp  &nbsp  &nbsp   &nbsp  &nbsp  &nbsp سلمه الله   </h4>                    
                    
                  
                    </b> 
      
                    </h4>
              
 <h4 style=" font-size: 16px;  ">
        السلام عليكم ورحمه الله وبركاته ,, وبعد .      
  </h4>
  
  <?php if($record[0]->bnod_help_fk == 4 ){  ?>
    <h4 style=" font-size: 16px; line-height: 25px !important;  ">
   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp  <span style="font-weight: bold !important;">بناءً</span>
على الطلبات المقدمة من الأسر لصرف مساعدة إيجارات المنازل  وحسب لائحة صرف الإيجارات  نفيدكم ببيان الأسر المستفيدة وهي  كالتالي:
  </h4>
  <?php }else{ ?>
    
    <h4 style=" font-size: 16px; line-height: 25px !important;  ">
   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp  <span style="font-weight: bold !important;">بناءً</span>
 على خطة البرامج المقدمة للأسر لعام 2019م  وحسب لائحة صرف المساعدات نفيدكم ببيان الأسر المستفيدة لهذا البرنامج  وفقاً لأعداد ا
     لأسر المعتمدة حتى تاريخه وهي  كالتالي
  </h4>  
   <?php } ?>
  

  
  
  
  
  
  
     <table id="example" class="table table-striped " cellspacing="0" width="100%">
                  
                        <tr>
                            <th class="text-center" style="width: 5%">
                                <h5 style="margin: 2px; font-weight: bold;">اسم البرنامج  </h5>
                            </th>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px;font-weight: bold;"><?php 
                                if(isset($record[0]->about) and $record[0]->about !=null){
                                  echo $record[0]->about;   
                                }
                                ?></h5>
                            </th>
                        </tr>
                        </table>
  
  <?php 
  
  if($record[0]->bnod_help_fk == 4 ){ ?>
    
    <?php 
   /* echo '<pre>';
    print_r($sarf_details);*/
    
   
    
           if(!empty($sarf_details)) { ?>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                   <tr>
                  <th class="text-center">م </th>
                 <th class="text-center">رقم الملف</th>
                  <th class="text-center">إسم  الأسرة  </th>
                    <th class="text-center">عدد الأفراد </th> 
                <th class="text-center">الفئة </th>
                 <th class="text-center">قيمة عقد الإيجار </th>
                <th class="text-center">قيمة مساعدة الإيجار </th>
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
                        <td><?=$row->qemt_egar ?></td>
                        <td><?=$row->value?></td>  
                        </tr>
                        <?php  }?>
                        <tr style="background: #e8e8e8 !important;
    font-size: 17px !important;">
                        <td style="background: #e8e8e8 !important;
    font-size: 17px !important;"colspan="6"> الاجمالى</td>
        
                        <td style="background: #e8e8e8 !important;
    font-size: 17px !important;"><?=$total?></td>
                        </tr>
                        
                        </tbody>
                        </table>
                        
                            <?php  } ?>
    
    
    
    
 <?php  }else{ ?>
    
     <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px; font-weight: bold;">عدد الاسر </h5>
                            </th>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px;font-weight: bold;">فئه المستفدين</h5>
                            </th>
                            <th class="text-center">
                                <h5 style="margin: 2px;font-weight: bold;"> العدد </h5>
                            </th>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px;font-weight: bold;"> مبلغ المساعده </h5>
                            </th>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px;font-weight: bold;"> الاجمالي </h5>
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" ><?php
                                if(isset($record[0]->all_family_number) and $record[0]->all_family_number !=null){
                                  echo $record[0]->all_family_number;   
                                }
                                 ?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" >ايتام</h5>
                            </td>
                            <td class="text-center" >
                                <h5 style="font-weight: bold;" ><?php
                                if(isset($record[0]->all_aytam_number) and $record[0]->all_aytam_number !=null){
                                  echo $record[0]->all_aytam_number;   
                                }
                                 ?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" ><?php
                                if(isset($record[0]->value_yatem) and $record[0]->value_yatem !=null){
                                  echo $record[0]->value_yatem;   
                                }
                                 ?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" ><?php
                                if(isset($record[0]->total_value) and $record[0]->total_value !=null){
                                  echo $record[0]->total_value;   
                                }
                                 ?></h5>
                            </td>
                        </tr>
 </table>
  
    
    
 <?php  }
  
  ?>









  <h4 style=" font-size: 16px;  ">
 وعليه نرجو من سعادتكم التوجيه لعمل اللازم ،،،،،،،،،،
  </h4>


                </div>
    
    
 <!---------------------------------------->   
    
    
	    <div class="col-xs-12" style=" padding: 0">
			

             
		  <div class="col-xs-9">
	
            <h6 class="text-left" style="margin-bottom: 30px !important; font-weight: bold !important; "><?php 
               if(isset($record[0]->job_title_name) and $record[0]->job_title_name !=null){
                                  echo $record[0]->job_title_name .' / ';   
                                }
                                 ?>
            <?php 
               if(isset($record[0]->publisher_name) and $record[0]->publisher_name !=null){
                                  echo $record[0]->publisher_name;   
                                }
                                 ?>
          
            </h6>
            </div>

			<div class="col-xs-3 text-right">

			 <h6 style="font-weight: bold !important; ">التاريخ :   <?php echo date('d-m-Y'); ?>م</h6>

			</div>

		</div>
 <!----------------------------------------->   
                
                
                
                
                <div class="col-xs-12">
                <h5 class="text-center">
                <span style="border-bottom: 1px solid; padding-bottom: 3px; font-weight: bold;">توجيه مدير الإدارة</span>
                </h5>
                </div>
              
                 <div class="col-xs-12">
                 <div class="col-xs-12">
                <h5 style="position: relative;" >
    <input style="width: 23px !important ; height: 25px !important;" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
    <span style="position: absolute; top: 8px;margin-right: 8px; font-weight: bold; "> لا مانع </span>
     </h5>
      </div>  
      
      <div class="col-xs-12">
    <h5 style="position: relative;" >
     <input style="width: 23px !important ; height: 25px !important;" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">  
     <span style="position: absolute; top: 8px;margin-right: 8px; color: #c5c5c5 !important;"> ..............</span>
    </h5>
      </div>  
         </div>         
                
                
            	<div class="col-xs-12">
					
					<div class="col-xs-4"> 
						
					</div>
					<div class="col-xs-2 text-center">
					
					</div>
                    <div class="col-xs-6">
						<h6 style="font-weight: bold; font-size: 19px !important;" class="text-center"> مدير الرعاية والبرامج التنموية</h6> <br />
					<h6  style="font-weight: bold; font-size: 19px !important;" class="text-center">
                    <?php 
                    if(isset($modeer_tanmia) and $modeer_tanmia != null){
                        echo $modeer_tanmia;
                    }
                    ?>
                    
                    	</h6>
					</div>

				</div>    

            </div>

        </div>
    </div>
                     


    <script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js "></script>
    <script src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js "></script>

</body>