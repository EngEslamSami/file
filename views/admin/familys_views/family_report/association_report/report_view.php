<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <div class="form-group padding-4 col-md-2 col-xs-12">
                <label class="label ">        الأسرة تستفيد من جمعيات آخرى</label>
                <select name="gameiat_help" id="gameiat_help" class="form-control">
                    <option value="">اختر</option>
                    <option value="1">نعم</option>
                    <option value="2">لا</option>

                </select>

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


<script>
    function search_result() {
        var value = $('#gameiat_help').val();
       // alert(value);
        if (value!='') {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/reports/Family_reports/search_result",
                data: {
                    value: value

                },
                beforeSend: function() {
                   // $('#result').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                     $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');

                    },
                success: function (d) {
                    $('#result').html(d);

                },error: function() {
                    $('#result').html('<div class="text-center alert-denger"> <h4> خطأ ..... </h4> </div>');
                }

            });

        } else{
            swal({
                title: "من فضلك اختر نوع التقرير ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم",
            });
        }

    }
</script>
