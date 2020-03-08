
<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;modal-FileConidtion
    padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .top_radio{
        margin-bottom: 15px;
    }
    .top_radio input[type=radio] {
        height: 24px;
        width: 24px;
        line-height: 0px;
        vertical-align: middle;
        margin-right: -33px;
        top: -5px;

    }
    .top_radio .radio,.top_radio .radio {
        vertical-align: middle;
        font-size:16px;

        padding: 10px;
        border-bottom: 2px solid #eee;
        border-radius: 8px;
        text-align: right;

    }
    .radio input[type="radio"] {
        opacity: 1;
    }
</style>


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
            <td>


                <?php if($_POST['mehwerType'] ==1){ ?>
                    <?php if($row->kafel_rabt==1){ ?>
                        <button type="button" class="btn btn-success btn-xs"
                                data-toggle="modal" data-target="#myModal_edit" onclick="GetEditData(<?php echo$row->categoriey_m;?>,<?php echo$value->mother_national_num_fk; ?>)">
                            الربط بكافل</button>

                    <?php }elseif ($row->kafel_rabt==2){ ?>
                        <button type="button" class="btn btn-success btn-xs" onclick="sendId(<?php echo$row->id; ?>,2)" id="button_<?php echo$row->id; ?>"
                                data-toggle="modal" data-target="#modal-rabt_kafel">
                            عدم الربط في الوقت الحالي</button>
                    <?php }else{ ?>
                        <button type="button" class="btn btn-info btn-xs" onclick="sendId(<?php echo$value->mother_national_num_fk; ?>,1)" id="button_<?php echo$value->mother_national_num_fk; ?>"
                                data-toggle="modal"  data-target="#modal-rabt_kafel">
                            التفاصيل</button>

                    <?php } } ?>
            </td>
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
                 <td>

                     <?php if($_POST['mehwerType'] ==1){ ?>
                         <?php if($row->kafel_rabt==1){ ?>
                             <button type="button" class="btn btn-success btn-xs"
                                     data-toggle="modal" data-target="#myModal_edit"   onclick="GetEditData(<?php echo$row->categoriey_member;?>,<?php echo$row->id; ?>)">
                                   الربط بكافل</button>

                 <?php }elseif ($row->kafel_rabt==2){ ?>
                             <button type="button" class="btn btn-success btn-xs" onclick="sendId(<?php echo$row->id; ?>,2)" id="button_<?php echo$row->id; ?>"
                                     data-toggle="modal" data-target="#modal-rabt_kafel">
                                 عدم الربط فلا الوقت الحالي</button>
                <?php }else{ ?>
                         <button type="button" class="btn btn-info btn-xs" onclick="sendId(<?php echo$row->id; ?>,2)" id="button_<?php echo$row->id; ?>"
                                   data-toggle="modal" data-target="#modal-rabt_kafel">
                             التفاصيل</button>

                     <?php } } ?>

                 </td>
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


<script>
    function sendId(value,type) {
        //alert(value);
        $('input[name=check]').prop("checked", false);
        $('#idValue').val(value);
        $('#typeValue').val(type);
    }
</script>
<script>

    function GetEditData(categoriey,mostafedId) {
//alert(mostafedId);
        var dataString = 'categoriey=' + categoriey +'& mostafed_id='+ mostafedId;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam/GetEditData',
            data:dataString,
            cache:false,
            beforeSend: function() {
                $("#edit_div").html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(html){
                $("#edit_div").html(html);
            }
        });


    }

</script>