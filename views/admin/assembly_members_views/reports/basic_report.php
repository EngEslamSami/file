<?php if(isset($all_student) && $all_student != null){ ?>
<div class="col-sm-12" style="    background: #eeee;
    padding: 6px 0px 0px;">
<table id="example" class="display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="2%">#</th>
                    <th width="10%" >التاريخ</th>
                    <th width="10%" >اسم العضو</th>
                    <th width="10%" > لسنه</th>
                    
                    <th width="10%" >قيمة المدفوع</th>
                    
                    <th width="10%" >متبقي</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($all_student as $student) {
                    if($x == 1){
                        $Link = '  
                                 <a href="'. base_url().'disability_managers/New_member_pill/print_data/'.$student->id.'" class="btn btn-info btn-xs   ">
                                 <i class="fa fa-print"></i> طباعة</a>

                                 <a href="'. base_url().'disability_managers/New_member_pill/delete/'.$student->id.'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');" class="btn btn-danger btn-xs   ">
                                 <i class="fa fa-trash"></i> حذف</a>
                                 ';
                    }else{
                        $Link = '<button class="btn btn-sm btn-primary">لا يمكنك التعديل والحذف علي السند</button>';
                    }
                ?>
                <tr>
                    <td><?=($x++)?></td>
                    <td><?=date("Y-m-d",$student->date)?></td>
                    <td><?=$student->name?></td>
                    <td><?=$student->year?></td>
                    <td><?=$student->paid?></td>
                   
                    <td><?=$student->remain?></td>
                   
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>

<?php } ?>
<script>
$('#example').DataTable( {
		
		dom: 'Bfrtip',
		buttons: [
		'copy', 
        'csv', 
        'excelHtml5',
        'pdfHtml5', 
        {
                extend: 'print',
                exportOptions: { columns: ':visible'}
        },
            'colvis'
		],
    colReorder: true






	}
    );
</script>