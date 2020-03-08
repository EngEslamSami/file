<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <div class="form-group padding-4 col-md-3 col-xs-12">
                <label class="label "> نوع التقرير  </label>
                <div class="radio-content">
                        <input type="radio" data-validation="required"  value="1" name="taqrer_type" id="taqrer_type1">
                        <label class="radio-label" for="taqrer_type1"> مفصل </label>
                    </div>
                <div class="radio-content">
                        <input type="radio" data-validation="required"  value="2" name="taqrer_type" id="taqrer_type2">
                        <label class="radio-label" for="taqrer_type2"> اجمالي  </label>
                    </div>

            </div>
            <div class="form-group padding-4 col-md-3 col-xs-12">
                <label class="label "> اختر الموظف</label>
                <input type="text" class="form-control  testButton inputclass"
                       name="tarekt_ersal_n" id="tarekt_ersal_n"
                       readonly="readonly"
                       onclick="$('#empModal').modal('show')"
                       style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                       data-validation="required"
                     >
                <input type="hidden" name="tarekt_ersal_fk" id="tarekt_ersal_fk" >
                <button type="button"
                        onclick="$('#empModal').modal('show');"
                        class="btn btn-success btn-next" >
                    <i class="fa fa-plus"></i></button>


            </div>
            <div class="form-group padding-4 col-md-2 col-xs-12">
                <label class="label ">      تاريخ البدء</label>
                <input type="date" class="form-control "
                       name="from_date" id="from_date" value="<?= date('Y-m-d')?>">

            </div>
            <div class="form-group padding-4 col-md-2 col-xs-12">
                <label class="label ">      تاريخ الانتهاء</label>
                <input type="date" class="form-control "
                       name="to_date" id="to_date" value="<?= date('Y-m-d')?>">
            </div>
            <div class="   col-md-2">
                <button type="button" onclick="search_result()" style="margin-top: 27px;"  class="btn btn-labeled btn-success " name="add" value="add"   >
                    <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                </button>
            </div>
            <div class="clearfix"></div><br>

            <div class="col-xs-12" id="result">

            </div>
        </div>
    </div>
</div>


<!-- empModal  -->

<div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> الموظفين </h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($all_emps)&& !empty($all_emps)){
                    ?>
                    <table id="" class="table example  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th style="text-align: center !important;">


                                    <div class="check-style">
                                        <input class="check_all_not" id="check_all_not"
                                               type="checkbox"
                                               onclick="check_all(this,'example');">
                                        <label class="checktitle" for="check_all_not"> الكل</label>

                                    </div>
                            </th>
                            <th>كود الموظف</th>
                            <th> الاسم</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($all_emps as $emp){
                            ?>
                            <tr>

                                <td>
                                    <div class="check-style">
                                    <input class=" checkbox  checkbox_emp" value="<?= $emp->emp_code ?>"
                                           type="checkbox" id="choose<?= $emp->id?>" data-name="<?= $emp->employee ?>">
                                        <label for="choose<?= $emp->id?>"> </label>

                                    </div>
                                </td>
                                <td><?= $emp->emp_code ?></td>
                                <td><?= $emp->employee ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                } else{
                    ?>
                    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                    <?php
                }
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="set_name()">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- empModal  -->



<script>


    function check_all(elem,table_id) {

        var oTable = $('.'+table_id).dataTable();
        var rowcollection = oTable.$(".checkbox", {"page": "all"});
        rowcollection.each(function (index, obj) {
            obj.checked = elem.checked;
        });


    }

</script>
<script type="text/javascript">
  function set_name() {

    var checkbox_name = [];
    var oTable = $('.example').dataTable();
    var rowcollection = oTable.$(".checkbox_emp:checked", {"page": "all"});
    rowcollection.each(function (index, elem) {
        checkbox_name.push($(elem).data('name'));
    });

    if (checkbox_name.length > 0) {
      $('#tarekt_ersal_n').val(checkbox_name);

    }
  }
</script>
<script>
    function search_result() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var checkbox_value = [];
        var checkbox_name = [];

        var oTable = $('.example').dataTable();
        var rowcollection = oTable.$(".checkbox_emp:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            checkbox_value.push($(elem).val());
            checkbox_name.push($(elem).data('name'));
        });
        if (checkbox_name.length > 0) {
          $('#tarekt_ersal_n').val(checkbox_name[0]);

        }
        var type_report = $("input[name='taqrer_type']:checked").val();
        if(type_report){

          if (type_report == 2) {
            if (checkbox_value.length == 0 ) {
              swal({
                      title: "من فضلك اختر  الموظف ",
                      type: "warning",
                      confirmButtonClass: "btn-warning",
                      confirmButtonText: "تم",
            });
            return ;
            }
          }
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/attendance/reports/Report/search_result",
            data: {
                from_date: from_date,
                to_date:   to_date,
                checkbox_value: checkbox_value,
                type_report:type_report
            },
            beforeSend: function() {
                $('#result').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#result').html(d);


            },error: function() {
              $('#result').html('<div class="text-center alert-denger"> <h4> خطأ ..... </h4> </div>');
            }

        });
      }else {
        swal({
                title: "من فضلك اختر نوع التقرير اولا ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم",
      });
    }
  }
</script>
