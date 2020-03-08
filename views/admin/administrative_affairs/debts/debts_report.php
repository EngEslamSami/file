<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4 ">الفترة من </h4>
                            </div>
                            <div class="col-xs-6 r-input ">
                                <div class="docs-datepicker">
                                    <div class="input-groupp">
                                        <input type="date" name="debt_date_from"  id="debt_date_from" class="form-control" required="required"   placeholder="شهر / يوم / سنة ">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4 "> الفترة الى </h4>
                            </div>
                            <div class="col-xs-6 r-input ">
                                <div class="docs-datepicker">
                                    <div class="input-groupp">
                                        <input type="date" name="debt_date_to" id="debt_date_to"  class="form-control " required="required"   placeholder="شهر / يوم / سنة ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12" >
                            <div class="col-xs-6">
                                <h4 class="r-h4"> الحالة </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="type" id="type" required="required">
                                 <option value="">إختر</option>
                                 <option value="3">الكل</option>
                                 <option value="1">الموافق</option>
                                 <option value="2">المرفوض</option>
                                 <option value="0">لم يتم الاجراء</option>
                             </select>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="form-group col-sm-12 col-xs-12">
                        <button onclick="return lood();" type="submit" name="report" value="تعديل" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-search" aria-hidden="true"></i></span> بحث </button>
                        </div>

                </div>

            </div>
        </div>
    </div>




</div>
</div>

<div class="col-xs-12 r-inner-details" id="optionearea2"></div>
<script>
    function lood(){
        var date_t=$("#debt_date_to").val();
        var date_f=$("#debt_date_from").val();
        var type=$("#type").val();
        if(date_f !='' && type != '' && date_t!='')
        {
            var dataString = 'debt_date_to=' + date_t +"&debt_date_from="+date_f+"&type="+type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/EmployeesDebtsReport',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
            return false;
        }
    }
</script>