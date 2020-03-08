<div class="col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">

            <table class="example table table-responsive table-bordered">

                <thead>
                <tr>
                    <th>م</th>
                    <th> اسم الموظف</th>
                    <th> الرقم القومي</th>
                    <th> الاداره </th>
                    <th>  القسم</th>
                     <th>  الدوام</th>
                    
                    <th> النوع</th>
                    <th> الميعاد</th>
                </tr>
                </thead>
               
               
                <tbody id="result_body">
                <?php
                if(isset($emps)&& !empty($emps)){
                    $x=1;

                    foreach ($emps as $row){?>
                     <?php if($row->type==1){
                     $class="success";
                      $type="حضور";
                      }
                      else {
                     $class="danger";
                      $type="انصراف";
                      }
                      ?>



                <tr>
                    <td><?php echo $x ;?></td>

                    <td><?php echo $row->name ;?></td>
                    <td><?php echo $row->emp_national_num ;?></td>
                    <td><?php echo $row->adminstration ;?></td>
                    <td><?php echo $row->department ;?></td>
                    <td><?php echo $row->dwam ;?></td>
                    <td> <button class="btn btn-<?php echo $class ; ?>"> <?php echo $type ; ?></button> </td>
                     <td><?php echo $row->time_hdoor_absence ;?></td>

                </tr>

                <?php  $x++ ;  } } ?>
                </tbody>
                </table>

            </div>
            </div>
            </div>

<script>
    setInterval(function(){



            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>qr_c/motab3a_hdoor/Hdoor/get_hdoor_emps",
                data: {},
                success: function (d) {

                   $('#result_body').html(d);
                


                }

            });



        }


        , 3000);
</script>