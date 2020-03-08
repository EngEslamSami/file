<style>
label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .form-group {
        margin-bottom: 0px;
    }
    .bootstrap-select>.btn {
        width: 100%;
        padding-right: 5px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important; 
        left: 4px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }
    .form-control{
        font-size: 15px;
        color: #000;
        border-radius: 4px;
        border: 2px solid #b6d089 !important;
    }
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
    .has-success  .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    </style>

<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>

        <div class="panel-body">

            <?php if ((isset($all_employees)) && (!empty($all_employees))) { ?>
                <?php echo form_open_multipart(base_url() . 'public_relations/website/about_us/About_us/insert_Executive_Management',array('id'=>'myform'));  ?>
                <div class="col-xs-12">
                    <br>
                    <table class="table table-striped table-bordered dt-responsive nowrap example">
                        <thead>
                        <tr class="info">
                            <th>#</th>
                            <th>م</th>
                            <th>إسم الموظف</th>
                            <th>الدور الوظيفي</th>
                            <th>الإدارة</th>
                            <th>القسم</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $a=1; foreach ($all_employees as $row) { ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="employees_id[]" <?php if(!empty($result)){  if(in_array($row->id,$result)){ echo 'checked'; } } ?>   value="<?php  echo$row->id; ?>"   />
                                </td>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $row->employee ?></td>
                                <td><?php echo $row->degree_name ?></td>
                                <td><?php echo $row->administration_name ?></td>
                                <td><?php echo $row->department_name ?></td>
                                <td></td>
                            </tr>
                        <?php $a++;} ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12 text-center">
                    <br />
                    <input type="hidden" name="save" value="save">
                    <button type="button" onclick="save_me()" name="save" value="save" class="btn btn-success"> حفظ</button>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>

    function save_me(){
        Swal.fire({
            title: "هل تريد   إضافة الموظفين الي الإدارة التنفيذية!",
            text: "",
            type: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3c990b',
            cancelButtonColor: '#d33',
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالحفظ !",
        }).then((result) => {
            if (result.value) {
                $('#myform').submit();

            }
        });
    }

</script>



