<?php
if( !empty($table)){?>

    <table  id="membersTbale" class="table table-striped table-hover table-bordered table-responsive" style="table-layout: fixed">
        <thead>
        <tr class="info">
            <th style="width: 80px;">م</th>
            <th>إسم المستفيد</th>
            <th>رقم الهوية</th>
            <th>الصلة</th>
            <th>العمر</th>
            <th>التصنيف</th>
            <th>حالة المستفيد</th>
            <?php if($_POST['mehwerType'] !=1){ ?>
            <th>حالة الكفالة</th>
            <?php } ?>
            <th>الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php $z=1;
if(!empty($mother_data)){
            foreach ($mother_data as  $value){

                $age='';
                if( isset($value->m_birth_date_year) && !empty($value->m_birth_date_year)){
                    $age =  date('Y')  -    $value->m_birth_date_year;
                }

                if($value->categoriey_m == 1){
                    $categoriey_member =  'أرملة ';
                }elseif($value->categoriey_m == 2){
                    $categoriey_member =  'يتيم ';
                }elseif($value->categoriey_m == 3){
                    $categoriey_member =  'مستفيد بالغ ';
                }else{
                    $categoriey_member =  'غير محدد  ';
                }

                ?>
        <tr>
            <td><?php echo$z; ?></td>
            <td><?php echo$value->full_name; ?></td>
            <td><?php echo$value->mother_national_num_fk; ?></td>
            <td><?php echo$value->relation_name; ?></td>
            <td><?php echo $age." عام"; ?></td>
            <td><?php echo $categoriey_member; ?></td>
            <td>
                <?php
                $button_class ="info";

                if(!empty($value->persons_status)) {
                    $button_title =  $value->persons_status->title ;
                    $button_style = "background-color:".$value->persons_status->color ;

                }else{
                    $button_title = "حالة الفرد " ;
                    $button_style = " " ;
                }
                ?>
                <button style="<?php echo$button_style; ?>;  color: black;" title="<?php echo $button_title;?>" class="btn btn-sm btn-info status">
                    </i> <?php echo $button_title;?>
                </button>
            </td>
            <?php if($_POST['mehwerType'] !=1){ ?>
            <td>   <?php
                if ($value->first_halet_kafala == 1) {
                    echo $first_status_name = ' منتطم ';
                } elseif ($value->first_halet_kafala == 2) {
                    echo $first_status_name = ' موقوف';
                } else {
                    echo $first_status_name = 'غير محدد';
                }

                ?></td>
            <?php } ?>
            <td>--</td>
        </tr>
         <?php $z++; } }?>
    <?php
    if(!empty($table)){
    $a=$z;foreach ($table as $row){ ?>

        <?php
        $age='';
        if( isset($row->member_birth_date_year) && !empty($row->member_birth_date_year)){
            $age =  date('Y')  -    $row->member_birth_date_year;
        }
        if($row->categoriey_member == 1){
            $categoriey_member =  'أرملة ';
        }elseif($row->categoriey_member == 2){
            $categoriey_member =  'يتيم ';
        }elseif($row->categoriey_member == 3){
            $categoriey_member =  'مستفيد بالغ ';
        }else{
            $categoriey_member =  'غير محدد  ';
        }

        ?>

        <tr>
                 <td><?php echo$a; ?></td>
                 <td><?php echo$row->member_full_name; ?></td>
                 <td><?php echo$row->member_card_num; ?></td>
                 <td><?php echo$row->relation_name; ?></td>
                 <td><?php echo $age." عام"; ?></td>
                 <td><?php echo $categoriey_member; ?></td>
                 <td>
                     <?php
                     $button_class ="info";

                     if(!empty($row->persons_status)) {
                         $button_title =  $row->persons_status->title ;
                         $button_style = "background-color:".$row->persons_status->color ;

                     }else{
                         $button_title = "حالة الفرد " ;
                         $button_style = " " ;
                     }
                     ?>
                     <button style="<?php echo$button_style; ?>;  color: black;" title="<?php echo $button_title;?>" class="btn btn-sm btn-info status">
                         </i> <?php echo $button_title;?>
                     </button>
                 </td>
            <?php if($_POST['mehwerType'] !=1){ ?>
            <td>
                <?php
                if ($row->first_halet_kafala == 1) {
                    echo $first_status_name = ' منتطم ';
                } elseif ($row->first_halet_kafala == 2) {
                    echo $first_status_name = ' موقوف';
                } else {
                    echo $first_status_name = 'غير محدد';
                }

                ?>
            </td>
               <?php } ?>
                 <td>--</td>
             </tr>
        <?php $a++;} }?>
        </tbody>
    </table>
<?php }else{ ?>

<div class="alert alert-danger"> لا توجد تفاصيل !!</div>

<?php } ?>


<script>
    table= $('#membersTbale').DataTable( {
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
