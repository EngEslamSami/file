
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
        <?php
            $data['contact_s'] = 'active';
          //  $this->load->view('admin/public_relations/main_tabs',$data); ?>   
             <div class="col-xs-12 r-inner-details">
            
             <!---table------>
            <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">

                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">الإسم</th>
                                    <th class="text-center">رقم الجوال</th>
                                    <th class="text-center">البريد الإلكترونى </th>
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">الرسالة</th>
                                    
                                </tr>
                                </thead>
                                <tbody class="text-center">


                                <?php
                                $a=1;
                                foreach ($records as $record ): ?>
                                    <tr>
                                        <td><?php echo $a++ ?></td>
                                        <td><?php echo $record->name?></td>
                                        <td><?php echo $record->phone;?></td>
                                        <td><?php echo $record->email;?></td>
                                        <td><?php echo $record->address;?></td>
                                        <td><?php echo $record->content;?></td>
                                        </tr>
                                    <?php   endforeach;  ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php  else:?>
            <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>لا يوجد!</strong> رسائل واردة.
</div>    
            <?php  endif;  ?>
            <!---table------>
            </div>
             
</div> 
</div>
</div>         

