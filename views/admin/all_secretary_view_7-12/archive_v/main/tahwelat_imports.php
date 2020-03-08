<div class="col-xs-12 no-padding">
           <table class="example table table-bordered table-striped ">
             <thead>
               <tr class="greentd">
                  <th>تاريخ التحويل</th>
                  <th>الموضوع</th>
                  <th>رقم المعاملة</th>
                  <th>واجب الرد</th>
                  <th>بواسطة</th>
                  <th>محول إلى</th>
<!--             
                  <th>خيارات</th> -->
               </tr>
             </thead>
             <tbody>
             <?php if ($_SESSION['role_id_fk'] == 1 )
{
  foreach($wared_mostalm as $row)
  {
  
  ?>

              <tr>
                <td><?= $row->date_ar;?></td>
                <td><?= $row->subject;?></td>
                <td><?= $row->rkm;?></td>
              
				   <td><span class="label label-danger text-center">واجب الرد قبل تاريخ <?= $row->esthkak_date;?></span></td>
                <td><?= $row->from_user_name;?></td>
                <td><?= $row->to_user_name;?></td>
             
                <!-- <td>
              
                <div class="btn-group">
                  <button type="button" class="btn btn-danger">إجراءات</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div> 
                
    
                </td> -->
              </tr>
              
             
<?php }?>
 <?php  foreach($sader_mostalm as $row)
  {
  
  ?>

              <tr>
              <td><?= $row->date_ar;?></td>
                <td><?= $row->mawdo3_subject;?></td>
                <td><?= $row->sader_rkm;?></td>
               
				   <td><span class="label label-danger text-center">واجب الرد قبل تاريخ <?= $row->esthkak_date;?></span></td>
                <td><?= $row->current_from_user_name;?></td>
                <td><?= $row->current_to_user_name;?></td>
             
                <!-- <td>
            
                <div class="btn-group">
                  <button type="button" class="btn btn-danger">إجراءات</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div> 
                
    
                </td> -->
              </tr>
              
             
<?php }?>


<?php }else{ ?>
  <?php 
  foreach($wared_mostalm as $row)
  {
  
  
if ($_SESSION['role_id_fk'] == 3&& $row->to_user_id==$_SESSION['emp_code']) {?>
             <tr>
                <td><?= $row->date_ar;?></td>
                <td><?= $row->subject;?></td>
                <td><?= $row->rkm;?></td>
          
				   <td><span class="label label-danger text-center">واجب الرد قبل تاريخ <?= $row->esthkak_date;?></span></td>
                <td><?= $row->current_form_user_name;?></td>
                <td><?= $row->current_to_user_name;?></td>
             
                <!-- <td>
            
                <div class="btn-group">
                  <button type="button" class="btn btn-danger">إجراءات</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div> 
                
    
                </td> -->
              </tr>
              
             
<?php } }?>
 <?php  foreach($sader_mostalm as $row)
  {
    if ($_SESSION['role_id_fk'] == 3&& $row->to_user_id==$_SESSION['emp_code']) {?>
  
  ?>

              <tr>
              <td><?= $row->date_ar;?></td>
                <td><?= $row->mawdo3_subject;?></td>
                <td><?= $row->sader_rkm;?></td>
               
				   <td><span class="label label-danger text-center">واجب الرد قبل تاريخ <?= $row->esthkak_date;?></span></td>
                <td><?= $row->current_from_user_name;?></td>
                <td><?= $row->current_to_user_name;?></td>
             
                 <!-- <td>
              
                <div class="btn-group">
                  <button type="button" class="btn btn-danger">إجراءات</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div> 
                
    
                </td> -->
              </tr>
              
             

<?php  }} }?>
            
            
              
             
             </tbody>
           </table>
        
         </div>