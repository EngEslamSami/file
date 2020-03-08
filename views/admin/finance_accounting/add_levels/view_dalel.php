<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php if(isset($records)){?>

            <!----------------------->
            <?php if(isset($records) && !empty($records) && $records !=null ){?>
                <div class=" col-xs-12 ">
                    <table id="no-more-tables" class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th  class="text-left">كود الحساب</th>
                            <th  class="text-left">إسم الحساب</th>
                            <th  class="text-left">مدين قبل</th>
                            <th  class="text-left">دائن قبل</th>
                            <th  class="text-left">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count1 = 1;
                        function drow($data, $count, $class, $sum_madeen=0, $sum_dayen=0){
                            $total_madeen = 0;
                            $total_dayen = 0;
                            $count1 = $count;
                            for($z = 0 ; $z < count($data) ; $z++){
                                $button ='<a href="'.base_url().'admin/finance_accounting/update_levels/'.$data[$z]['id'].'">
                              <button class="btn btn-default "  title="تعديل بيانات الحساب ">
                              <i class="fa fa-pencil" aria-hidden="true"></i></button>
                             </a>';
                                if(isset($data[$z]['children'])){
                                    $class = 'btn-success';
                                    $count = drow($data[$z]['children'], $count1, 'btn-info',$sum_madeen,$sum_dayen);
                                    $sum_madeen = $data[$z]['madeen']+$count[1];
                                    $sum_dayen = $data[$z]['dayen']+$count[2];
                                    $count1 = $count[0];
                                }
                                else{
                                    $sum_madeen = $data[$z]['madeen'];
                                    $sum_dayen = $data[$z]['dayen'];
                                    $button .='<a href="'.base_url().'admin/finance_accounting/DeleteLevel/'.$data[$z]['id'].'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');">
                                <button class="btn btn-danger  "  title="حذف الحساب  ">
                                <i class="fa fa-trash-o" aria-hidden="true"  style="color:#fff"></i></button>
                               </a>';
                                }
                                echo '<tr class="'.$class.'">
                      <td>'.($count1++).'</td>
                      <td>'.$data[$z]['code'].'</td>
                      <td>'.$data[$z]['name'].'</td>
                      <td>'.sprintf("%.2f",$sum_madeen).'</td>
                      <td>'.sprintf("%.2f",$sum_dayen).'</td>
                      <td>'.$button.'</td>
                     
                      </tr>';
                                $total_madeen += $sum_madeen;
                                $total_dayen += $sum_dayen;
                            }
                            return array($count1,$total_madeen,$total_dayen);
                        }
                        for($x = 0 ; $x < count($records) ; $x++){
                            $button ='<a href="'.base_url().'admin/finance_accounting/update_levels/'.$records[$x]['id'].'">
                              <button class="btn btn-default "  title="تعديل بيانات الحساب ">
                              <i class="fa fa-pencil" aria-hidden="true"  style="color:#fff"></i></button>
                             </a>';
                            if(isset($records[$x]['children'])){
                                $count = drow($records[$x]['children'], $count1, 'btn-success');
                                $sum_madeen = $count[1];
                                $sum_dayen = $count[2];
                                $count1 = $count[0];
                            }
                            else{
                                $sum_madeen = $records[$x]['madeen'];
                                $sum_dayen = $records[$x]['dayen'];
                                $button .='<a href="'.base_url().'admin/finance_accounting/DeleteLevel/'.$records[$x]['id'].'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');">
                                <button class="btn btn-danger "  title="حذف الحساب  ">
                                <i class="fa fa-trash-o" aria-hidden="true" style="color:#fff"></i></button>
                               </a>';
                            }
                            echo '<tr class="btn-warning">
                  <td>'.($count1++).'</td>
                  <td>'.$records[$x]['code'].'</td>
                  <td>'.$records[$x]['name'].'</td>
                  <td>'.sprintf("%.2f",$sum_madeen).'</td>
                  <td>'.sprintf("%.2f",$sum_dayen).'</td>
                  <td>'.$button.'</td>
                  </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            <?php }?>
            <!----------------------->
  <?php }?>
        </div>
        </div>
</div>





<script>
    function get_code(code_post ,controller){

        if(code_post != 'nothing'){
            var dataString = 'code_post='+ code_post ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
        }

    }
</script>
<script>
    function get_code2(code_post ,controller){

        if(code_post != 'nothing'){
            var dataString = 'code_post='+ code_post ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller+'/'+<?php  echo $this->uri->segment(4)?>,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
        }

    }
</script>

<script>
    function get_rased(rased,controller){

        var dataString = 'rased='+ rased ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea2").html(html);
            }
        });
    }
</script>
<script>
    function get_rased2(rased,controller){

        var dataString = 'rased='+ rased ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller+'/'+<?php  echo $this->uri->segment(4)?>,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea2").html(html);
            }
        });
    }
</script>

<script>
    function get_select(name_post){


        var dataString = "name_post="+ name_post;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/Finance_accounting/select_code',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea4").html(html);
            }
        });

    }
</script>      
   