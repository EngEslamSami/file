<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <?php
             if (isset($get_taswia) && !empty($get_taswia)){
                 echo form_open_multipart('finance_accounting/taswia/Taswia/update_taswia/'.$get_taswia->id,array('id'=>'myform'));
             } else{
                 echo form_open_multipart('finance_accounting/taswia/Taswia/add_taswia',array('id'=>'myform'));

             }
            ?>
            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label">اسم البنك </label>
                <select name="bank_id" class="form-control" id="chooseBank" onchange='getAccounts(<?=json_encode($banks)?>, $(this).val()); chooseBank(this);get_rased();'>
                    <option value="">اختر</option>
                    <?php
                    if (isset($banks) && $banks != null) {
                        foreach ($banks as $value) {

                            ?>
                            <option value="<?=$value->id?>"><?=$value->title?></option>
                            <?php
                        }
                    }
                    ?>
                </select>


            </div>

            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label">اسم الحساب </label>
                <select name="hesab_id" id="code_account_id" class="form-control" onchange="get_rased();" data-validation="required">
                    <option value="">اختر</option>

                </select>


            </div>
            <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                <label class="label"> الفتره </label>
                <input type="date" name="taswia_date" id="bank_date" onchange="get_rased();" value="<?= date('Y-m-d')?>" class="form-control">


            </div>
            <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                <label class="label"> رصيد الحساب </label>
                <input type="text"  name="prog_total_rased" id="prog_total_rased"  value="" class="form-control" readonly>

            </div>
            <div class="col-md-2 form-group ">
                <button type="button" onclick="search_result()" style="margin-top:27px;"  class="btn btn-labeled btn-success "  >
                    <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                </button>
            </div>

            <div class="clearfix"></div><br>

            <div class="col-xs-12" id="result_output">

            </div>
            <?php
            echo form_close();
            ?>

        </div>
    </div>

</div>

<?php
if (isset($get_all)&& !empty($get_all)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?= $title?></h4>

            </div>
            <div class="panel-body" style="min-height: 300px;">
                <div class="col-xs-12">
                    <table id="example" class="table  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th> رقم المذكرة</th>
                            <th> اسم البنك</th>
                            <th>  اسم الحساب</th>
                            <th> الفتره</th>
                            <th> رصيد الحساب</th>
                            <th>  القائم بالاضافة</th>
                            <th>تفاصيل</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($get_all as $all){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $all->rkm?></td>
                                <td>
                                    <?php
                                     if (!empty($all->bank_name)){
                                         echo $all->bank_name;
                                     } else{
                                         echo "غير محدد" ;
                                     }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($all->hesab_name)){
                                        echo $all->hesab_name;
                                    } else{
                                        echo "غير محدد" ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($all->taswia_date_ar)){
                                        echo $all->taswia_date_ar;
                                    } else{
                                        echo "غير محدد" ;
                                    }
                                    ?>
                                </td>

                                <td ><?php
                                    if (!empty($all->prog_total_rased)){
                                        echo $all->prog_total_rased;
                                    } else{
                                        echo "غير محدد" ;
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    if (!empty($all->publisher_name)){
                                        echo $all->publisher_name;
                                    } else{
                                        echo "غير محدد" ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $all->id ?>);">
                                        <i class="fa fa-list "></i></a>

                                </td>
                                <td>
                                    <a href="#" onclick="print_taswia(<?= $all->id ?>);">
                                        <i style="background-color: #0a568c" class="fa fa-print" aria-hidden="true"></i> </a>

                                    <a title="عرض المرفق" href="#" data-toggle="modal" data-target="#Modal_attach" onclick="load_morfaq(<?= $all->id ?>)"  > <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>



                                    <a href="#" onclick='swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){

                                            window.location="<?php echo base_url().'finance_accounting/taswia/Taswia/update_taswia/'.$all->id  ?>";
                                            });'>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                    <a href="#" onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="<?= base_url()."finance_accounting/taswia/Taswia/delete_taswia/".$all->id?>";
                                            });'>
                                        <i class="fa fa-trash"> </i></a>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">


                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->

<!--    Modal_attach -->
<div class="modal fade" id="Modal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  المرفق </h4>
            </div>
            <div class="modal-body" >
               <div class="container-fluid">
                   <div id="myDiv_morfq">

                   </div>

               </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<!--    Modal_attach -->

<!-- modal view -->
<div class="modal fade" id="myModal-view" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img id="image" src=""
                     width="100%" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- modal view -->

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/taswia/Taswia/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>

<script>
    function get_rased() {
        var  bank_id = $('#chooseBank').val();
        var  account_id = $('#code_account_id').val();
        var  bank_date = $('#bank_date').val();

        if (bank_id !='' && account_id !=''){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>finance_accounting/taswia/Taswia/get_rased",
                data: { bank_id:bank_id,account_id:account_id,bank_date:bank_date},
                dataType: 'html',
                cache:false,

                success: function (val) {

                    $('#prog_total_rased').val(val);
                }
            });

        } else{
            $('#prog_total_rased').val('');
        }





    }
</script>

<script>
    function getAccounts(banks,id) {
        var select = document.getElementById('code_account_id');
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        for (var x = 0; x < banks.length; x++) {
            var opt = document.createElement('option');
            if(banks[x].id == id){
                var accounts = banks[x].accounts;
                for (var z = 0; z < accounts.length; z++) {
                    $("#code_account_id").append($("<option></option>")
                        .attr("value",accounts[z].account_id_fk)
                        .text(accounts[z].title));
                }
                break;
            }
        }
    }

    function removeOptions(selectbox) {
        for(var i = selectbox.options.length - 1 ; i >= 0 ; i--) {
            selectbox.remove(i);
        }
    }
</script>

<script>
    function search_result() {
        var  bank_id = $('#chooseBank').val();
        var  account_id = $('#code_account_id').val();
        var  bank_date = $('#bank_date').val();
      //  alert(bank_date);
        if (bank_id !='' && account_id !=''){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>finance_accounting/taswia/Taswia/search_result",
                data: { bank_id:bank_id,account_id:account_id,bank_date:bank_date},
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    $('#result_output').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {

                    $('#result_output').html(html);
                }
            });

        }  else {
            swal({
                title: "من فضلك تأكد من  الاختيارات المتاحه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }
        var prog_total_rased = $('#prog_total_rased').val();
        var total = $('#total').val();
        if (prog_total_rased != total ) {
            $('#add').attr('disabled', 'disabled');
        } else {
            $('#add').removeAttr("disabled");
        }


    }
</script>
<script>
    function print_taswia(row_id) {

        var request = $.ajax({

            url: "<?=base_url().'finance_accounting/taswia/Taswia/print_taswia'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>

<script>
    function load_morfaq(id) {


        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>finance_accounting/taswia/Taswia/load_morfaq',
            data: {id:id},
            dataType: 'html',
            cache: false,
            success: function (html) {

                //    $('#attach_result').html(html);
                $('#myDiv_morfq').html(html);




            }
        });

    }
</script>



