


 
<div class="col-xs-12 no-padding">
           <table class="table table-bordered table-striped example">
             <thead>
               <tr class="greentd">
                  <th>تاريخ التنبيه</th>
                  <th>الحدث / الملاحظة</th>
                  <th>المعاملة / العميل</th>
                  <th>بواسطة</th>
                  <th>تاريخ الإضافة</th>
                  <!-- <th>خيارات</th> -->
               </tr>
             </thead>
             <tbody>
       
             <?php if ($_SESSION['role_id_fk'] == 1 )
{
  foreach($wared as $row)
  {
  
  ?>

              <tr>
                <td><?= $row->esthkak_date;?></td>
                <td><?= $row->title;?></td>
                <td><?= $row->mohma_name;?></td>
                <td> <?= $row->from_user_name;?></td>
                <td><?= $row->date_ar;?></td>
             
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php }?>
 <?php  foreach($sader as $row)
  {
  
  ?>

              <tr>
                <td><?= $row->esthkak_date;?></td>
                <td><?= $row->mawdo3_name;?></td>
                <td><?= $row->mohema_n;?></td>
                <td> <?= $row->from_user_n;?></td>
                <td><?= $row->date_ar;?></td>
             
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php }?>


<?php }else{ ?>
  <?php 
  foreach($wared as $row)
  {
  
  
if ($_SESSION['role_id_fk'] == 3&& $row->to_user_id==$_SESSION['emp_code']) {?>
              <tr>
                <td><?= $row->esthkak_date;?></td>
                <td><?= $row->title;?></td>
                <td><?= $row->mohma_name;?></td>
                <td> <?= $row->from_user_name;?></td>
                <td><?= $row->date_ar;?></td>
             
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php } }?>
 <?php  foreach($sader as $row)
  {
    if ($_SESSION['role_id_fk'] == 3&& $row->to_user_id==$_SESSION['user_id']) {?>
  
  ?>

              <tr>
                <td><?= $row->esthkak_date;?></td>
                <td><?= $row->mawdo3_name;?></td>
                <td><?= $row->mohema_n;?></td>
                <td> <?= $row->from_user_n;?></td>
                <td><?= $row->date_ar;?></td>
             
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             

<?php  }} }?>   
             </tbody>
           </table>
          </div>