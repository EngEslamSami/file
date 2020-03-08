<?php
/*
echo "<pre>";
print_r($all_cat);
echo "</pre>";*/

?>
<?php //die; ?>

<style>
table.dtable, table.ntable {
    border: 1px #ccc solid;
    border-collapse: collapse;
    padding: 5px;
}

.TABLE {
    margin-bottom: 5px;
}


</style>

<div class="col-sm-12 col-md-12 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h6><?= $title ?>  </h6>
            </div>
        </div>

        <div class="panel-body">

<!----------------- eslam -------------------->
<div class=" col-sm-12 col-xs-12 ">

<div class=" col-sm-6 col-xs-6 ">

</div>
  <div class=" col-sm-6 col-xs-6  ">
    <?php if (isset($all_cat) && !empty($all_cat) && $all_cat!=null){?>
<table align="left" style="top:5px;right:5px;;font-size:smaller;color:#545454" >
<tbody>
 <?php foreach ($all_cat as $cat){ ?>

<tr >
<td class="legendColorBox">
<div style="border:1px solid #ccc;padding:1px">
<div style="width:4px;height:0;border:5px solid <?php echo $cat->color;  ?>;overflow:hidden">
</div>
</div>
</td>
<td class="legendLabel" style="padding-right: 4px;"> <?php echo $cat->title;  ?></td>
</tr>
<?php } ?>

<!--
<tr>
<td class="legendColorBox">
<div style="border:1px solid #ccc;padding:1px">
<div style="width:4px;height:0;border:5px solid #405f72;overflow:hidden">
</div>
</div>
</td>
<td class="legendLabel">Data 2</td>
</tr>
<tr>
<td class="legendColorBox">
<div style="border:1px solid #ccc;padding:1px">
<div style="width:4px;height:0;border:5px solid #82adc8;overflow:hidden">
</div>
</div>
</td>
<td class="legendLabel">Data 3</td>
</tr>
<tr>
<td class="legendColorBox">
<div style="border:1px solid #ccc;padding:1px">
<div style="width:4px;height:0;border:5px solid #139ff8;overflow:hidden">
</div></div></td><td class="legendLabel">Data 4</td>
</tr>
-->
</tbody>
</table>
<?php } ?>
</div>



</div>

<!----------------- end eslam -------------------->

<!------------------------------->


<?php /* ?>
  <div class=" col-sm-2 col-xs-2 ">
 


  <?php if (isset($all_cat) && !empty($all_cat) && $all_cat!=null){?>
<table class="dtables">
			<tbody>
            
            <tr>
			<th>اللون</th>&nbsp;
			<th>الفئة</th>
		</tr>

    
    <?php foreach ($all_cat as $cat){ ?>
    
    	<tr>
			<td style="background:<?php echo $cat->color; ?>;">&nbsp;</td>&nbsp;
			<td><?php echo $cat->title; ?></td>
		</tr>
    
    

    
    <?php } ?>
 
    </tbody>
  </table>
  
  
  
  
  
  
  
  <?php  }?>
</div>

<?php */ ?>

  <div class=" col-sm-12 col-xs-12 ">
<!------------------------------->
            <?php if (isset($reports) && !empty($reports) && $reports!=null){ ?>
                <table id="exampsle" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th >المسلسل</th>
                        <th >رقم الاسرة </th>
                          <th >إسم الأم </th>
                           <th > إجمالي الدخل </th>
                            <th > عدد الأفراد </th>
                            <th >  الدخل علي الافراد </th>
                        <th >الفئة </th>
                    </tr>
                    </thead>
                    <?php $x=1; foreach ($reports as $record=>$value){
                        
                        $all_income = $reports[$record]->total_financial + $reports[$record]->mother_monthly_income;
                        $num_of_members = $reports[$record]->member_num +1;
                        ?>
                        <tr style="background: <?php echo $reports[$record]->category->color   ?>;">
                            <td ><?=$x++?></td>
                             <td ><?php echo($reports[$record]->mother_national_num ) ?></td>
                             
                               <td ><?php echo($reports[$record]->mother_name ) ?></td>
                             
                            
                            <td ><?=$all_income ?></td>
                             <td ><?php echo($num_of_members  ) ?></td>
                              <td ><?php echo($all_income/$num_of_members) ?></td>
                              
                              
                              
                            <td ><?=$reports[$record]->category->title ?></td>
                        </tr>
                    <?php }?>
                </table>


            <?php  }?>
        </div>


    </div>
</div>
