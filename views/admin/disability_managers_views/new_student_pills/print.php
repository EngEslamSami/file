 <!DOCTYPE HTML>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>تقرير سند</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
</head>
<style>
    .r-content {
        border: 2px solid #000;
        border-radius: 15px;
        margin-top: 40px;
        padding-bottom: 20px;
    }
    
    .title {
        border: 2px solid #000;
        border-radius: 15px;
        position: relative;
        top: -40px;
        margin-bottom: -65px;
        background-color: #fff;
    }
    
    .no-padding {
        padding: 0;
    }

</style>

<body>

    <div id="printdiv">
    <div class="r-head col-xs-12" >
        <div class="col-xs-12">
            <div class="col-xs-4 no-padding" style="padding-top: 30px">
                <h4 class="text-center" style="font-size: 22px;"><strong>  الجمعية الخيرية لرعاية الايتام </strong><br> بحائل</h4>
            </div>
            <div class="col-xs-4">
                <img src="img/Saudi-Arabia-State-vector-logo.png" alt="" width="100%" height="100px">
            </div>
            
        </div>
        <?php 
        
        if(isset($sand) &&!empty($sand)){
        foreach($sand as $row){?>
        <div class="col-xs-12 r-content" style="margin-bottom: 70px;">
           <div class="col-xs-12">
                <div class="col-xs-4"></div>
                <div class="col-xs-4 title">
                    <h3 class="text-center" style="margin: 5px"> سـنـد قـبـض</h3>
                 
                </div>
                <div class="col-xs-4"></div>
            </div>
            
            <div class="col-xs-12" style="margin-top: 25px;">
                <h4 class="pull-left">استلمنا من المكرم: <span> <?php echo $row->name;?>  </span></h4>
                
            </div>
            <div class="col-xs-6">
                <h4 class="pull-left"> مبلغ وقدره: <span><?php echo $row->paid;?> ريال</span></h4>
               </div>
            
            <div class="col-xs-6">
                
                
                
                    <h4> تاريخه :<span> <?php echo  date("Y-m-d",$row->date_s);?> </span></h4>
                
                
            </div>
            <div class="col-xs-12">
              
                <div class="col-xs-4">
                    <h4 class="text-center">المستلم</h4>
                   
                    <h4 class="text-center">.......................</h4>
                </div>
                <div class="col-xs-4">
                    <h4 class="text-center">المحاسب</h4>
                    
                    <h4 class="text-center">........................</h4>
                </div>
                <div class="col-xs-4">
                    <h4 class="text-center">المدير</h4>
                   
                    <h4 class="text-center">.........................</h4>
                </div>
            </div>
        </div>
        <?php
        }
        }
        ?>
    </div>
   
    
    </div>
</body>

</html>


<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    setTimeout(function () {location.replace("<?php echo base_url('disability_managers/New_member_pill/new_member_pills')?>");}, 500);
</script>
