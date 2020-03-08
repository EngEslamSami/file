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
</style>
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12">

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                         
                            <div class="col-sm-3">
                                <h4 class="r-h4"> تاريخ من </h4>
                            </div>
                            <div class="col-sm-3 r-input">
                                <input type="date" class="r-inner-h4 " name="date_from" id="date_from" required />
                            </div>
                            
                            <div class="col-sm-3">
                                <h4 class="r-h4"> تاريخ إلى </h4>
                            </div>
                            <div class="col-sm-3 r-input">
                                <input type="date" class="r-inner-h4 " name="date_to" id="date_to" required />
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-sm-3">
                                <h4 class="r-h4"> إسم الموظف </h4>
                            </div>
                            <div class="col-sm-3 r-input">
                                <select name="emp_id" id="emp_id" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بإختيار الموظف--</option>
                                    <option value="all">كل الموظفين</option>
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
                        
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 r-inner-btn">
                            <input type="button" onclick="return chk();" role="button" name="add" value="بحث" class="btn pull-right" />
                        </div>
                    </div>
                    
                </div> 
            </div>
            <div id="optionearea1"></div>
        </div>
    </div>
</div>
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
                    url: '<?php echo base_url() ?>/Messions/R_mession',
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