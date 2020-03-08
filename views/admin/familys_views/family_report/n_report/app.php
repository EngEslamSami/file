
 <?php
    $this->load->view('admin/requires/header');
       $this->load->view('admin/requires/tob_menu');

     
?>
   

    <table id="js_table_customer" 
    style="table-layout: fixed;"
    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
            <tr>
              <th style="width: 50px;">م </th>
                <th style="width: 50px;">رقم الملف </th>
                <th style="width: 170px;" >إسم رب الأسرة</th>
                <th style="width: 90px;" >رقم الهوية</th>
                <th style="width: 170px;">إسم الام</th>
                <th style="width: 90px;">هوية رقم</th>
                  <th style="width: 90px;">جوال التواصل</th>
                    <th style="width: 90px;">جوال أخر</th>
                  <th style="width: 90px;">حالة الملف</th>  
                    
  
                
            </tr>
        </thead>
    </table>
  

   
   
 <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<!--

<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.flash.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/jszip.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.colVis.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.responsive.min.js"></script>

 -->
   
    <?php

    
       echo $customer_js;
    ?>

   





 
    <?php      $this->load->view('admin/requires/footer'); ?>




<?php
/*


$query = $this->db->query('select * from basic ');
//$query = $this->db->query('select * from basic ');

$the_json_code =  json_encode($query->result());
//$the_json_code =  json_encode($records);

print_r($the_json_code);
*/
?>


<?php
/*
$jsonArray = json_decode($all_data,true);



echo '<pre>';
print_r($jsonArray);
echo '<pre>';
*/
?>

