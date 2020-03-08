<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="col-md-3 padding-4">
                    <label class="label">اسم الموظف</label>
                    <select name="emp_id_fk" id="emp_id_fk"  class="form-control   selectpicker" data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="none">إختر</option>
                        <option value="all">الكل </option>
                        <?php
                        if(isset($all_emp)&&!empty($all_emp)) {
                            foreach($all_emp as $row){
                                  ?>
                        <option value="<?php echo $row->id;?>"> <?php echo $row->employee;?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 padding-4">
                    <label class="label">من </label>
                    <input type="date" class="form-control " name="agza_from" id="agza_from" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col-md-2 padding-4">
                    <label class="label">الى </label>
                    <input type="date" class="form-control " name="agza_to" id="agza_to" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col-md-2 padding-4">
                    <button type="button" onclick=" make_search();" style="    margin-top: 26px;" class="btn btn-labeled btn-success  " id="reg" name="add" value="بحث">
                        <span class="btn-label"><i class="fa fa-search"></i></span>بحث
                    </button>


                </div>
            </div>


        </div>
    </div>
</div>
<div class="col-sm-12 no-padding " id="main_panal" style="display:none">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نتائج البحث</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12" id="my_search">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function make_search() {
      var emp_id_fk=$('#emp_id_fk').val();
      var agza_to=$('#agza_to').val();
      var agza_from=$('#agza_from').val();
      var start=new Date(agza_from);
      var end=new Date(agza_to);
      if (start > end ) {
        swal({
            title: "من فضلك اختر  فترة زمنية صحيحة ",
            text:"   الى فترة لا يجب ات تتعدي من فترة",
            type: 'warning',
            confirmButtonText: "تم",
        });
      }else {
        
      if (emp_id_fk !="none") {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/solaf/report/Reportes/get_solaf_search',
            data: {emp_id_fk: emp_id_fk,agza_to:agza_to,agza_from:agza_from},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
              $('#main_panal').show();
               $('#my_search').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
           },

            success: function (html) {
                $('#main_panal').show();
                $("#my_search").html(html);

            }
        });

      }else {
        swal({
            title: "من فضلك اختر احد الموظفين  ",
            type: 'warning',
            confirmButtonText: "تم",
        });
      }
      }

    }
</script>
