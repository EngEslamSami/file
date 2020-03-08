<style>

    @media (min-width: 992px){
        .col-md-20 {
            width: 20%;
        }

    }
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
        height: 150px;
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




    <div class="col-xs-12 no-padding" style="margin-top: 30px;display: <?= $disp ?>">

        <div class="col-md-12 text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 style="margin: 0; color: white !important; font-size: 20px;">
                           إحصائيات الكفلاء
                        </h2>
                    </div>
                    <div class="panel-body">

                        <div id="circle_counter" style="background: green;">

                            <span>الأيتام</span>
                            <div class=" counter" data-count="<?php echo $all_data_count['aytam']['num']; ?>">0 </div>

                            <div style="width:50%;float: right;text-align: center">
                                <h5>غير مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['aytam']['not_guaranteed']; ?>">0 </div>
                            </div>
                            <div style="width:50%;float: right;text-align: center">
                                <h5> مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['aytam']['guaranteed']; ?>">0 </div>
                            </div>
                        </div>

                        <div id="circle_counter"  style="background: #b77b09;">

                            <span>الأرامل</span>
                            <div class=" counter" data-count="<?php echo $all_data_count['armal']['num']; ?>">0 </div>

                            <div style="width:50%;float: right;text-align: center">
                                <h5>غير مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['armal']['not_guaranteed']; ?>">0 </div>
                            </div>
                            <div style="width:50%;float: right;text-align: center">
                                <h5> مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['armal']['guaranteed']; ?>">0 </div>
                            </div>
                        </div>


                        <div id="circle_counter" style="background: #6d2147;">
                            <span>المستفيد البالغ</span>
                            <div class=" counter" data-count="<?php echo $all_data_count['mostafed']['num']; ?>">0</div>

                            <div style="width:50%;float: right;text-align: center">
                                <h5>غير مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['mostafed']['not_guaranteed']; ?>">0 </div>
                            </div>
                            <div style="width:50%;float: right;text-align: center">
                                <h5> مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['mostafed']['guaranteed']; ?>">0 </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>



  
        </div>
    </div>





<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ملف رقم </th>
      <th scope="col">هوية </th>
      <th scope="col">حالة </th>
    </tr>
  </thead>
  <tbody>
   
    
    <?php 
   /* echo '<pre>';
    print_r($all_bale3);
    */
    $i = 0;
    foreach($all_bale3 as $row){
        $i++;
        ?>
   
     <tr>
       <td>  <?=$i  ?><td>
      <td>  <?=$row->id  ?><td>
      <td>  <?=$row->mother_national_num_fk  ?><td>
    <td>  <?=$row->mother_national_num_fk  ?><td>
      <td>@mdo</td>
    </tr>
   
    
    <?php } ?>
    

  </tbody>
</table>




