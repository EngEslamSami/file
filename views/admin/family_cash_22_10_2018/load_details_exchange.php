<div class="col-sm-12">

<div class="panel-group" id="accordion">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">تفاصيل الاسر</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الملف</th>
                        <th class="text-center">إسم رب الاسره  </th>
                        <th class="text-center">إسم مسؤول الحساب البنكى  </th>
                        <th class="text-center"> رقم الحساب  </th>
                        <th class="text-center"> إسم البنك  </th>
                        <th class="text-center">عدد الأفراد </th>
                        <th class="text-center">أرملة </th>
                        <th class="text-center">يتيم </th>
                        <th class="text-center">مستفيد </th>
                        <th class="text-center">إجمالى </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php  $total =0;$x=1; foreach ($sarf_details as $row){
                        $total += $row->value?>
                        <tr>
                            <td><?=$x++;?></td>
                            <td><?=$row->file_num_basic?></td>
                            <td><?=$row->father_full_name?></td>
                            <td><?=$row->person_name?></td>
                            <td><?=$row->bank_account_num?></td>
                             <td><?=$row->bank_name?></td>
                            <td><?=($row->mother_num_in+$row->down_child+$row->up_child)?></td>
                            <td><?=$row->mother_num_in?></td>
                            <td><?=$row->down_child?></td>
                            <td><?=$row->up_child?></td>
                            <td><?=$row->value?></td>
                        </tr>
                    <?php  }?>
                    <tr>
                        <td colspan="9"> الاجمالى</td>
                        <td><?=$total?></td>
                    </tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">المرفقات</a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">إسم المرفق </th>
                        <th class="text-center">المرفق  </th>
                        <th class="text-center"> تحميل </th>
                    </tr>
                    </thead>
                    <tbody class="text-center" id="body_attach">
                    <?php if(isset($sarf_attachments) && !empty($sarf_attachments)){
                        foreach ($sarf_attachments as $row){ ?>
                            <tr>
                                <td><?=$row->attachment_title?></td>
                                <td><img src="<?=base_url()."uploads/images/".$row->attachment?>" class="" width="100" height="100"></td>
                                <td>
                                    <a href="<?=base_url()."FamilyCashing/downloads/".$row->attachment?>">
                                    <i class="fa fa-cloud-download fa-2x" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


   
</div>