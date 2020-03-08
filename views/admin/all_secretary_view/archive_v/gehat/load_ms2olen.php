<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">مسؤولي الجهه </h3>
            </div>
        <div class="panel-body">
            <?php 
            
            if(isset($result)&&!empty($result)){?>
            
            <table id="geha1" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>اسم المسؤول </th>
                    <th> الفاكس</th>
                    <th>العنوان</th> 
                     <th>الهاتف</th> 
                     <th> الجوال</th>
                
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->fax;?></td> 
                        <td><?php echo $row->address;?></td>
                        <td><?php echo $row->phone;?></td> 
                      <td><?php echo $row->gwal;?></td> 
                  
                       
                        <td>
                            
                            
                           
                                            <a onclick="update_ms2ol_geha(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  onclick="delete_ms2ol_geha(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)"   ><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                          
                                          
                                                   
                 
                        </td>
                        
                        
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        
    </div>
</div>
<script>




$('#geha1').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        'copy',
        'csv',
        'excelHtml5',
        {
            extend: "pdfHtml5",
            orientation: 'landscape'
        },

        {
            extend: 'print',
            exportOptions: { columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
    ],
    colReorder: true
} );



</script>
