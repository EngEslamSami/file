
<style>


.index-icons .box {
    height: 180px;
    }
    
    
    
        
        #circle_counter{
       /* float: right; */
    width: 200px;
    /* height: 50px; */
    border: 2px solid;
    line-height: 24px;
    padding: 4px 8px;
    border-radius: 5px;
    background-color: #5b69bc;
    margin-right: 20px;
    color: white;
    display: inline-block;
    width: 200px;
    height: 100px;
}
    #circle_counter  .counter{
        
    margin-top: 18px;
        display: block;
    font-size: 20px;
    color: #f8ffbf;
    font-weight: bold;
  
}
 #circle_counter span{
    font-size: 20px;
 }   
</style>


    <?php

    $image_name ='asisst/admin_asset/img/logo-atheer.png';
    if(isset($_SESSION['main_data_info'])) {

        $image_name = 'uploads/images/' . $_SESSION['main_data_info']->logo;

        if (file_exists($image_name) == 1) {
            $image_name = "uploads/images/" . $_SESSION['main_data_info']->logo;
        } else {
            $image_name = 'asisst/admin_asset/img/logo-atheer.png';
        }
    }


    ?>
            <!-- open panel-body-->

            <div class="col-xs-12  index-icons no-padding">
                <?php  if (isset($groups) && $groups!=null && !empty($groups)) { ?>
                    <?php foreach ($groups as $row): ?>
                    	<?php 
                        
                        /*if($row->count_level > 0){
								$link_to="Dash/mian_group/".$row->sub[0]->page_id ;
							}else{
								$link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
							}*/
                            
                            if($row->count_level > 0 && $row->page_link=='#'){
								$link_to="Dash/mian_group/".$row->sub[0]->page_id ;
							}elseif($row->page_link=='#'){
								$link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
							}elseif($row->page_link!='#'){
                       // $link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
                        $link_to=$row->page_link;
                    }
                            
                            ?>
                        <div class="col-md20 col-md-3 col-sm-4 padding-4  ">
                            <div class="box">
                                <a href="<?php echo base_url().$link_to ?>">
          <!-- <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->page_image ?>"
           onerror="this.src='<?php echo base_url()."asisst/admin_asset/"?>img/logo.png'"
            alt="" class="center-block" /> -->
                      <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->page_image ?>"
           onerror="this.src='<?php echo base_url()."$image_name"?>'"
            alt="" class="center-block" />
            
                                   	<h5 class="text-center"> <?php echo  $row->page_title?> </h5>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;
                } ?>
            </div>

<!-------------------------------------------------->
<style>
    .balance_title{
        margin: 0;
        padding: 7px 0px;
        background-color: #1a5113;
        color: #fff;
    }
    .counter{
        /*display: block;
        width:100px;*/
    }
</style>
<?php if($this->uri->segment(3)==512) {
$disp="block";
}else{
    $disp="none";
}
    ?>


     

<div class="col-xs-12 no-padding" style="margin-top: 30px;display: <?= $disp ?>">

<div class="col-md-12 text-center">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-success">
<div class="panel-heading">
<h2 style="margin: 0; color: white !important; font-size: 20px;">
رصيد الصندوق
</h2>
</div>
<div class="panel-body">

            <div id="circle_counter" style="background: green;">
            
            <span>نقدي</span>
            <div class=" counter" data-count="<?php echo $box_balance_naqdy; ?>">0 </div> 
            </div>

            <div id="circle_counter"  style="background: #b77b09;">
          
            <span>شيك</span> 
              <div class=" counter" data-count="<?php echo $box_balance_cheque; ?>">0 </div> 
            </div>

            
             <div id="circle_counter" style="background: #6d2147;">
              <span>عهدة نقدية</span>
            <div class=" counter" data-count="0">0</div> 
           
            </div> 
</div>
</div>
</div>
   <div class="col-md-2"></div>
            
            

<!--
    <div dir="ltr">

        <div id="chartContainer" style="height: 300px; width: 100%; "></div>
        <div class="col-xs-6 visible-print">
            <p class="">القائم بالطباعة : Hpl]</p>
        </div>
        <div class="col-xs-6 visible-print">
            <p class="">20-20-2025</p>
        </div>
    </div> -->
</div>
</div>










<script src="<?php echo base_url();?>asisst/admin_asset/js/canvasjs.js"></script>




<script>

    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
                padding: 8,
                text:"رصيد الصندوق  ",
                fontFamily: "GEFLOW",
                fontWeight: "bold",
                fontColor: "#fff",
                backgroundColor:"#1a5113"
            },
            Subtitle: {
                fontFamily: "GEFLOW",
                fontSize: 16
            },
            legend:{
                maxWidth: 380,
                itemWidth: 110,
                cursor: "pointer",
                itemclick: explodePie,
                fontSize: 16,
                fontFamily: "GEFLOW",
                fontWeight: "normal",
                fontColor: "black"
            },
            ToolTip: {
                fontSize: 18,
                fontColor: "black",
                fontFamily: "GEFLOW"
            },
            DataSeries: {
                indexLabelFontFamily: "GEFLOW",
                indexLabelFontWeight: "bold",
                indexLabelFontSize: 16
            },
            TextBlock: {
                fontFamily: "GEFLOW"
            },
            Crosshair: {
                labelFontFamily:  "GEFLOW"

            },
            StripLine: {
                labelFontFamily: "GEFLOW",
                labelFontSize: 16
            },
            Axis: {
                titleFontFamily: "GEFLOW",
                labelFontFamily: "GEFLOW",
                labelFontSize: 16
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y}</strong>",
                indexLabel: "{name} - {y}",
                indexLabelFontFamily: "GEFLOW",
                indexLabelFontSize: 16,
                indexLabelFontColor: "#222",
                indexLabelFontWeight: "bold",
                dataPoints: [

                    { y: '<?php echo $box_balance_naqdy;?>', name: "نقدي" },
                    { y: '<?php echo $box_balance_cheque ;?>', name: "شيك" },
                ]
            }]
        });
        chart.render();
    }

    function explodePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();

    }
</script>

<?php
//$box_balance_naqdy
//$box_balance_cheque


 ?>


