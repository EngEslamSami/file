
<style type="text/css">
    .print_forma{
        border:1px solid ;
        padding: 15px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .body_forma{
        margin-top: 40px;
    }
    .no-padding{
        padding: 0;
    }
    .heading{
        font-weight: bold;
        text-decoration: underline;
    }
    .print_forma hr{
        border-top: 1px solid #000;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .myinput.large{
        height:22px;
        width: 22px;
    }

    .myinput.large[type="checkbox"]:before{
        width: 20px;
        height: 20px;
    }
    .myinput.large[type="checkbox"]:after{
        top: -20px;
        width: 16px;
        height: 16px;
    }
    .checkbox-statement span{
        margin-right: 3px;
        position: absolute;
        margin-top: 5px;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 90px;
    }
    .no-border{
        border:0 !important;
    }
    .table-devices tr td{
        width: 50%;
        min-height: 20px
    }
    .gray_background{
        background-color: #eee;

    }
    table.th-no-border th,
    table.th-no-border td
    {
        border-top: 0 !important;
    }
</style>
<?php if(isset($records) && !empty($records) && $records!=null){?>

    <div class="col-sm-12 col-md-12 col-xs-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول البيانات</h4>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group col-sm-12 col-xs-12 no-padding">

                    <table id="example" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم </th>
                            <th>الإسم الخدمة</th>
                            <th>التفاصيل</th>
                            <th>الإجراء</th>
                             <th>الطباعه</th>
                        </tr>
                        <thead>
                        <tbody>

                        <?php $x=1;foreach ($records as $value){?>
                        <tr>
                            <td><?=$x++;?></td>
                            <td><?=$value->member_name?></td>
                            <td>مستلزمات مدرسية </td>
                            <td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal-<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button></td>
                            <td>
                                <a href="<?php echo base_url('').'services_orders/Services_orders/editServicesOrders/18/'.$value->id ?>" title="تعديل">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                <a onclick="$('#adele').attr('href', '<?php echo base_url('').'services_orders/Services_orders/DeleteSchoolSupplies/'.$value->id ?>');" data-toggle="modal" data-target="#modal-delete" title="حذف">
                                    <i class="fa fa-trash" aria-hidden="true"></i> </a>
                            </td>
                            
                            <td><a target="_blank" href="<?php echo base_url();?>services_orders/Print_orders/bag/<?php echo $value->id;?>"><i class="fa fa-print" aria-hidden="true"></a></td>

                            <?php }?>
                        </tr>
                        </tbody>
                    </table>

                    <?php $x=1;foreach ($records as $value){?>
                        <div class="modal" id="myModal-<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 90%">
                                <div class="modal-content row">
                                    <div class="modal-header col-xs-12">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تفاصيل الخدمة</h4>
                                    </div>
                                    <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                        <br/>
                                        <div class="col-xs-9">
                                            <div class="col-xs-12">
                                                <table class="table table-bordered table-devices">
                                                    <tbody>
                                                    <tr>
                                                        <th class="gray_background" style="width: 25%;" >إسم الام </th>
                                                        <td><?=$value->member_name?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="gray_background" style="width: 25%;">فئة الخدمة </th>
                                                        <td> خدمات عامة </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="gray_background" style="width: 25%;">نوع الخدمة </th>
                                                        <td> الحقيبة والمستلزمات المدرسية</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="gray_background" style="width: 25%;" >الاسم </th>
                                                        <td><?=$value->member_name?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="gray_background" style="width: 25%;">اسم المستلزمات المدرسية</th>
                                                        <td><?=$value->support_name?></td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
<div class="col-xs-3">
<div class="col-md-12 padd" style="height: 116px !important">
<img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
</div>

<div class="form-group col-sm-12 col-xs-12 padd">
<label class="label label-green col-xs-12 no-margin"> الإسم</label>
<input type="text" class="form-control  input-style" value="<?=$mother["full_name"]?>" readonly />
</div>

<div class="form-group col-sm-12 col-xs-12 padd">
<label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
<input type="text" value="<?=$mother["m_birth_date_hijri"]?>" class="form-control  input-style"   readonly />
</div>

<div class="form-group col-sm-12 col-xs-12 padd">
<label class="label label-green col-xs-12 no-margin">رقم الجوال </label>
<input type="text"  class="form-control  input-style" value="<?=$mother["m_mob"]?>" readonly />
</div>
</div>
                                    </div>
                                    <div class="modal-footer" style="border-top: 0;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>

                                </div>
                            </div>
                        </div>


                    <?php }?>



                </div>
            </div>
        </div>
    </div>

<?php }?>