<!DOCTYPE HTML>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


</head>

<style>
    body {
        font-family: 'Cairo', sans-serif;
    }
    
    .rr-table td {
        padding: 5px 0;
    }
    
    .rr-title {
        font-weight: bold;
        font-size: 15px;
    }
    
    .rr-title span {
        font-weight: normal;
        padding-right: 5px;
    }
    
    .rr-high {
        height: 25px;
    }
    /*******/
    
    .rr-herader h6 {
        font-weight: bold;
    }
    
    .rr-content {
        min-height: 700px;
    }
    
    .rr-content h4 {
        font-weight: bold;
    }
    
    .rr-content p {
        margin-top: 35px;
        margin-bottom: 35px;
    }
    
    .rr-footer {
        border: 1px solid #000;
        border-radius: 25px;
        margin-top: 25px;
    }

</style>
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

        window.location = "<?php echo base_url('Directors/Directors/reports'); ?>";

    }
</script>

<body onload="return printDiv('printdiv')" id="printdiv">
    <header class="col-xs-12 rr-herader">
        <div class="col-xs-4" style="padding: 0">
            <h6 class="text-center">المملكة العربية السعودية</h6>
            <h6 class="text-center"> الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة (أكناف) </h6>
        </div>
        <div class="col-xs-4">
            <img src="<?php echo base_url()?>asisst/admin_asset/img/11-57.png" alt="" class="center-block" width="80%">
        </div>
        <div class="col-xs-4">
            <h6> الرقم :<span> ........ </span></h6>
            <h6> الترايخ :<span> ... / ... / 14.. هـ </span></h6>
            <h6> المرفقات :<span> ........ </span></h6>
        </div>
    </header>

    <div class="col-xs-12 rr-content" style="margin-top: 15px;">
        <div class="container">
            <h4 class="text-center"> قرار مجلس الادارة </h4>
            <h4 class="text-center"> بالتمرير </h4>
            <p>إن مجلس إداره الجمعية وبناء علي الصلاحيات المخولة له نظاما , وبناء علي اللائحة التنظيمية للجمعية , وبناء علي العرض المقدم من الامين العام للجمعية , يقرر ما يلي :</p>

            <table class="rr-table" style="width: 100%">
                       
       <?php if(isset($all_items_desions)&&$all_items_desions!=null){
          foreach ($all_items_desions as $record ) {?>
                     <tr class="rr-high"></tr>                                 
                  <tr>
                    <td class="rr-title"> الموضوع  : <span><?php echo $record->item_title;?></span></td>

                 </tr> 
                 <tr>
                    <td class="rr-title"> القرار : <span> <?php echo $record->decision_title;?></span></td>

                   </tr>    
                    <tr class="rr-high"></tr> 
      
             
              
              
     <?php } } ?>                       
                       
                       <?php /* ?>
                             
                  <?php
                  $val = $id;
                  if(isset($val)){
                  if (!empty($select_all_bydate[$val])):?>
               
                <?php $a=1;
                foreach ($select_all_bydate[$val] as $record ):?>
  
                  <?php if (!empty($decisions[$record->council_id_fk])):
                  foreach ($decisions[$record->council_id_fk] as $row):
                                                   
                                                    ?>
                                 
                                                    
                 <tr class="rr-high"></tr>                                 
                  <tr>
                    <td class="rr-title"> البند  <?=$a?> : <span><?php echo $row->item_title;?></span></td>

                 </tr> 
                 <tr>
                    <td class="rr-title"> القرار : <span> <?php echo $row->decision_title;?></span></td>

                   </tr>    
                    <tr class="rr-high"></tr>           
                <?php   $a++; endforeach;endif;?>
              
                        <?php
                      
                        endforeach;  ?>
                        <?php endif; ?>    
<?  }?>

<?php */ ?>


            </table>
        </div>
    </div>

    <footer class="col-xs-12">
        <h5 class="text-center" style="font-weight: bold;">والله ولي التوفيق .. </h5>
        <div class="col-xs-12 rr-footer">
            <h5 class="text-center"> المملكة العربية السعودية - منطقة الباحة </h5>
            <h5 class="text-center"> تليفون  : 0506070310 </h5>
        </div>
    </footer>


    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

</body>

</html>
