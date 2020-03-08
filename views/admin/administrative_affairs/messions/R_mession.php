<style>
    .r-cont {
        width: 95%;
    }

    .r-stores {
        margin-bottom: 60px;
        background: linear-gradient(to bottom, #eee 0%, #fff 100%);
        border-radius: 10px;
    }

    .r-stores img {
        padding-top: 15px;
        width: 46%;
        height: auto;
    }

    .r-stores h3 {
        font-size: 18px;
        color: #0c1e56;
        padding-bottom: 15px;
        margin-top: 15px;
    }

    .r-stores a {
        text-decoration: none;
        outline: none;
    }

    .store-btn {
        width: auto;
        outline: none;
    }

    .store-btn1 {
        width: 59px;
        height: 35px;
        background-color: #123456;
        color: #fff;
        outline: none;
    }

    .store-btn1:hover {
        background-color: #123456;
        color: #123456;
    }

    @media (max-width:768px) {
        .r-stores tr {
            display: table-row !important;
        }
    }

    @media (max-width:400px) {
        .r-cont {
            padding: 0;
        }
    }

    .modal1{
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: none;
        overflow: hidden;
        -webkit-overflow-scrolling: touch;
        outline: 0;
    }

    .padd {padding: 0 15px !important;}
    .no-padding {padding: 0;}
</style>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>تقرير المهمات</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-md-4 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> تاريخ من </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <input type="date" class="r-inner-h4 " name="date_from" id="date_from" placeholder="تاريخ من" />
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> تاريخ إلى </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <input type="date" class="r-inner-h4 " name="date_to" id="date_to" placeholder="تاريخ إلى" />
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> إسم الموظف </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <select name="emp_id" id="emp_id" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true">
                                        <option value="">--قم بإختيار الموظف--</option>
                                        <option value="all">الكل</option>
                                        <?php
                                        if(isset($employs) && $employs != null)
                                            foreach($employs as $employ){
                                                $select = '';
                                                if(isset($result['emp_id']) && $result['emp_id'] == $employ->id)
                                                    $select = 'selected';
                                                echo '<option value="'.$employ->id.'" '.$select.'>'.$employ->employee.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" name="add" onclick="return chk();" value="بحث" class="btn btn-purple w-md m-b-5"><i class="fa fa-search"></i> بحث</button>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<div id="optionearea1"></div>

<script>
    function chk(){
        $("#optionearea1").html('');
        if($('#emp_id').val() && $('#date_from').val() && $('#date_to').val()){
            if($('#date_from').val() > $('#date_to').val())
                alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية ');
            else{
                var dataString = 'date_from=' + $('#date_from').val() + '&date_to=' + $('#date_to').val() + '&emp_id=' + $('#emp_id').val();
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>Administrative_affairs/R_mession',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $("#optionearea1").html(html);
                    } 
                });
            }
        }
        return false;
    }
</script>                    