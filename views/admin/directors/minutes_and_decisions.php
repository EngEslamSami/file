<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<!---form------>


<div class="col-xs-12">
<!---table------>
<?php if(isset($records)):?>
<div class="col-xs-12">
<div class="panel-body">

    <div class="fade in active">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">تاريخ الجلسة</th>
                    <th class="text-center">بنود الجلسة </th>
                    <th class="text-center">الحضور</th>
                    <th class="text-center">القرارات</th>
                    <th class="text-center">الاجراء</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php if(isset($records)&&$records!=null):?>

            <?php
            $x=1;
            foreach ($records as $record ):?>
<tr>
<td><?php echo $x++; ?></td>
<td><?php echo $record->session_date_ar ?></td>
<td><a href="<?php echo base_url().'Directors/Directors/items_decisions/'.$record->id.'/minutes_and_decisions'?>"><button type="button" class="btn btn-sm  btn-info btn-md"  ><i class="fa fa-list"></i> عرض </button></a></td>
<td>
<!----------------------------------------------------------------->
<button type="button" class="btn btn-sm center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>



<div class="modal" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title"> التوقيعات : </h4>
					             	</div>
				                    <div class="modal-body">
                                    <div class="row">
                                    <table class="table table-striped table-bordered dt-responsive nowrap" style="margin-right: 18px;width: 97%;">
                            <thead>
                            <tr>
                                <th style="color:#0c72ca; ">م</th>
                                <th style="color:#0c72ca; ">إسم العضو</th>
                                <th style="color:#0c72ca; ">المسمي الوظيفي</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /*
                            echo '<pre>';
                            print_r($all_members);*/
                            ?>
                            
                         <?php if(!empty($all_members[$record->id])):
                             $a=1;
                             foreach ($all_members[$record->id] as $row):
                            ?>
                         <tr>
                            
                        <td><?php  echo $a++ ;?></td>
                        <td> <?php  echo $get_job_title[$row->members_nums]->member_name?></td>
                        <td> <?php echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->name ?></td>
                       </tr>
                        <?php    endforeach; endif;?>
                        </tbody>
                        </table>  
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
</div>
</div>
</div>
</div>
<!----------------------------------------------------------------->

</td>
                    <td><a href="<?php echo base_url().'Directors/Directors/add_decisions/'.$record->id?>"><button type="button" class="btn btn-sm center-block button "> إضافة</button></a></td>
                    <td>
                     <a href="<?php echo base_url().'Directors/Directors/delete_decision/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > 
                      <i class="fa fa-trash" aria-hidden="true">
                      </i> 
                      </a>
                      <a href="<?php echo base_url().'Directors/Directors/add_decisions/'.$record->id.'/edit' ?>"> 
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                       </a></td>
                </tr>
                <?php
              
            endforeach;  ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php endif; ?>

</div>
</div>
</div>

<script>
function lood(num){
if(num>0 && num != '')
{
var id = num;
var dataString = 'band_num=' + id ;
$.ajax({
    type:'post',
    url: '<?php echo base_url() ?>/Directors/Directors/add_time_table',
    data:dataString,
    dataType: 'html',
    cache:false,
    success: function(html){
        $("#optionearea1").html(html);
    }
});
return false;
}
else
{
$("#vid_num").val('');
$("#optionearea1").html('');
}
}
</script>
