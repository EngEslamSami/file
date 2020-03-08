 
 
 <div class="col-xs-12 " >
	<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title">
			
			</h3>
		</div>
		<div class="panel-body">
 
<table class="table table-bordered">
        <thead>
            <tr>
              <th style="width: 20px;">م </th>
                <th style="width: 20px;">رقم الملف </th>

                  <th style="width: 20px;">اسم الاب </th>
                   
                 <th style="width: 20px;">نصيب الفرد  </th>
                  <th style="width: 20px;">الفئة  </th>
                    <th style="width: 20px;">الفئة  </th>
            </tr>
              </thead>
              <tbody>
            <?php 
                $x = 0;
            foreach($customer as $row){ 
                $x++;
                
                
                

                    $title ='أ';
                    $id = '4';
                    if(!empty($row['nasebElfard']['f2a']->title)){
                        $title =$row['nasebElfard']['f2a']->title;
                         $id =$row['nasebElfard']['f2a']->id;
                    }


              
                $naseb ='0';
                    if(!empty(round($row['nasebElfard']['naseb']))){
                        $naseb =round($row['nasebElfard']['naseb']);
                    }
                
               
                
                
                
            ?>
            <tr>
            <td><?=$x ?></td>
            <td><?php echo $row['file_num']; ?></td>
            <td><?php echo $row['father_full_name']; ?></td>
             <td><?php echo  $naseb; ?></td>
           <td><?php echo $title; ?></td>
            <td><?php echo $id; ?></td>
           
            
           
            
            
            </tr>
            
            
            
            <?php } ?>
            
            
            
            
      </tbody>
    </table>
  </div>
  </div>