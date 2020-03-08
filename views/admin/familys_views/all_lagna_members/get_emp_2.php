


<div class="col-xs-12">

        <div class="form-group col-md-6">
            <label class="label label-green half">الإدارات:</label>


            <select name="department" id="department"
                    onchange="getDepartmentEmp(this.value);" class="selectpicker form-control half"
                    aria-required="true" data-show-subtext="true"
                    data-live-search="true">
                <option value="">إختر  الإدارة</option>
                <?php  if(!empty($department_jobs)){

                    foreach ($department_jobs as $row){

                        $select='';
                        if($department_id == $row->id ){
                            $select='selected';
                        }
                        ?>
                    <option value="<?=$row->id?>" <?=$select?>><?=$row->name?></option>
                <?php } } ?>
            </select>
        </div>

</div>
<?php   if( !empty($department_emp)){ ?>
<div class="col-xs-12">



    <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center" width="15%">اختر </th>
            <th class="text-center" width="50%"> الاسم</th>
            <th>المنصب</th>

        </tr>
        </thead>
        <tbody class="FilterTable">
        <?php
        if(isset($department_emp)&&!empty($department_emp)) {
            foreach ($department_emp as $row) {
                    $name = $row->employee;
                
                ?>
                <input type="hidden" name="type[<?php echo $row->id;?>]" value="3">
                <td class="text-center"><input type="checkbox"   name="members_id[]" class="tmcheckbox"
                                               value="<?php echo $row->id;?>"/></td>
                <td class="heading text-center"><?php echo $name;?></td>
                <td ><input type="radio" name="members_job[<?php echo $row->id;?>]"
                            class="mains" onclick="checkMyStateMain(this.value,'employee<?php echo $row->id;?>'),checkMyStateMainTable(1,$('#lagna_num_show').val())" id="employee<?php echo $row->id;?>"   value="رئيس اللجنة">
                    <label for="square-radio-1"   style="margin-left: 10px;">رئيس اللجنة</label>
                    <input type="radio" name="members_job[<?php echo $row->id;?>]" id="subemployee<?php echo $row->id;?>"
                           onclick="checkMyStateSub(this.value,'subemployee<?php echo $row->id;?>'),checkMyStateSubTable(2,$('#lagna_num_show').val())"  class="subs"  value="نائب ">
                    <label for="square-radio-1"   style="margin-left: 10px;">نائب</label>

                    <input type="radio"  name="members_job[<?php echo $row->id;?>]"   value="عضو ">
                    <label for="square-radio-1"  style="margin-left: 10px;">عضو</label></td>


                </tr>
                <?php
            }
        }
        ?>



        </tbody>
    </table>
    <div class="col-xs-12"><br>
        <div class="col-xs-5"></div>
        <div class="col-xs-4">   <button type="submit"  name="add_lgna" value="add_lgna"
                                         class="btn btn-purple w-md m-b-5 add_lgna" >
                <span><i class="fa fa-disk-o" ></i></span> حفظ
            </button></div>
        <div class="col-xs-3"></div>

    </div>
</div>




<?php }else{ ?>

  <div class=" col-sm-12 btn btn-danger"> لايوجد موظفين !!</div>

<?php } ?>

<script>
    $(".tmcheckbox").change(function() {
        var value = $(this).val(),
            $list=$('.results');

        if (this.checked) {
            var allData = $(this).closest('tr').find('.heading').text();

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        }
        else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function() {
                $(this).remove();
            });
        }
    });
</script>
<script>

    function checkMyStateMain(valuxz,myid) {

        var main_ids=[];
        $(".mains:radio:checked").each(function () {
            main_ids.push($(this).val());
        })


        if( valuxz !=''){
            if(main_ids.length >1){
                alert('تم إختيار رئيس اللجنة');
                $('#' + myid).removeAttr('checked');
                //$('#myid' + myid).prop("checked", false);
            }



        }
    }

</script>

<script>

    function checkMyStateSub(valuxz,myid) {

        var sub_ids=[];
        $(".subs:radio:checked").each(function () {
            sub_ids.push($(this).val());
        })

        // alert(member_ids);
        if( valuxz !=''){
            if(sub_ids.length >1){
                alert('تم إختيار  نائب رئيس اللجنة');
                $('#' + myid).removeAttr('checked');
                //$('#myid' + myid).prop("checked", false);
            }



        }
    }

</script>