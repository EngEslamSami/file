<style>
td .fa-plus-square-o{
    padding: 1px 5px;
    font-size: 12px;
    line-height: 1.5;
    background-color: blue;
    color: #fff;
    border-radius: 2px;
}
.top-label{
    
    font-size: 15px !important;
}
</style>


<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->

                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(empty($table) && $table == null){
                        if(isset($result)){
                            echo  form_open_multipart('main_data/Main_data/update_main_data/'.$result['id']);
                        }
                        else{
                           echo form_open_multipart('main_data/Main_data/add_main_data');
                        }?>
                    <div class="col-xs-9">
                            <div class="form-group col-md-4 col-sm-6">
                                <label class="label top-label">إسم الجمعية:</label>
                                <input type="text" name="name" id="name"  placeholder="إسم الجمعية" class="form-control bottom-input " value="<?php if(isset($result)) echo $result['name'] ?>" data-validation="required">
                            </div>


                            <div class="form-group col-md-4 col-sm-6">
                                <label class="label top-label">مسجلة برقم:</label>
                                <input  class="form-control bottom-input" type="text" onkeypress="validate_number(event)" value="<?php if(isset($result)) echo $result['num'] ?>" id="num" name="num" placeholder="مسجلة برقم " data-validation="required">
                            </div>

                            <div class="form-group col-md-4 col-sm-6">
                                <label class="label top-label">اللوجو:</label>
                                <input type="file" class="form-control bottom-input " onchange="readURL(this)"; name="logo" id="logo" <?php if(isset($result)) echo ''; else echo'data-validation="required"' ?> accept="image/*" />
                            </div>



                        <div class="form-group col-md-4 col-sm-6">
                            <label class="label top-label">تاريخ الإنشاء:</label>
                            <input  class="form-control bottom-input" type="date" value="<?php if(isset($result)) echo $result['date_construct'] ?>" id="date_construct" name="date_construct" placeholder="شهر / يوم / سنة " data-validation="required">
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label class="label top-label">العنوان :</label>
                            <input  class="form-control bottom-input" type="text" value="<?php if(isset($result)) echo $result['address'] ?>" name="address" id="address" placeholder="العنوان" data-validation="required">
                        </div>

                        </div>
                    <div class="col-xs-3">
                        <?php
                        if(isset($result)) { ?>
                            <div id="post_img" class="imgContent" style="min-height: 120px;">
                                <img id="nume" src="<?php if(isset($result)){ echo base_url().'uploads/images/'.$result['logo'];}else{
                                    echo base_url().'uploads/images/momany_logo.png';
                                } ?>" alt="الصورة الشخصية" class="img-rounded" height="150px" width="150px">
                            </div>



                        <?php } ?>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group col-md-3 col-sm-6">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                    <th>ارقام الجوال</th>
                                    <th><a  onclick="apen('phone_option','phone','text','validate_number(event)','10');" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>

                                </tr>
                                </thead>

                                <tbody id="phone_option">
                                <?php
                                if(isset($phones) && !empty($phones)){ foreach ($phones as $item1 ){ ?>
                                    <tr>
                                    <td> <input class="form-control" onkeypress="validate_number(event)" maxlength="10" type="text" name="phone[]" onkeyup="chek_length(this,$(this).val(),10)" value="<?=$item1->tele?>" ></td>
                                    <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php } }
                                ?>
                                </tbody>
                            </table>
</div>
                        <div class="form-group col-md-3 col-sm-6">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                    <th>ارقام الفاكس</th>
                                    <th><a  onclick="apen('fax_option','fax','text','validate_number(event)','10')" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>
                                </tr>
                                </thead>
                                <tbody id="fax_option">
                                <?php
                                if(isset($faxs) && !empty($faxs)){ foreach ($faxs as $item2 ){ ?>
                                    <tr>
                                        <td> <input class="form-control" type="text" onkeypress="validate_number(event)" maxlength="10" name="fax[]" value="<?=$item2->fax?>" ></td>
                                        <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php } }
                                ?>
                                </tbody>

                            </table>
                    </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                    <th> البريد الاكتروني</th>
                                    <th><a onclick="apen('email_option','email','email','','50')"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>
                                </tr>
                                </thead>
                                <tbody id="email_option">
                                <?php
                                if(isset($emails) && !empty($emails)){ foreach ($emails as $item3 ){ ?>
                                    <tr>
                                    <td> <input class="form-control" type="email" name="email[]" value="<?=$item3->email?>" ></td>
                                    <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php } }
                                ?>
                                </tbody>
                            </table>
                </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group col-md-12 col-sm-12">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>

                                <tr class="info">
                                    <th> اسم البنك </th>
                                    <th>الرمز</th>
                                    <th>رقم الحساب</th>
                                    <th><a onclick="get_banks('banks_option')" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>
                                    <?php if(isset($result)){ ?>
                                    <th>الحالة</th>
                                    <?php } ?>

                                </tr>
                                </thead>
                                <tbody id="banks_option"><?php
                                if(isset($bank) && !empty($bank)){ foreach ($bank as $item ){ ?>
                                    <tr>
                                        <td>
                                            <select name="banks_id[]" id="main_bank_id_fk"
                                                    class="form-control bottom-input call"
                                                    onchange="get_banck_code($(this).val())" >
                                                <option value="">اسم البنك </option>
                                                <?php
                                                $code = '';
                                                if(!empty($banks)){
                                                    foreach ($banks as $bank){  $select=''; if(isset($result)){if($item->bank_id_fk == $bank->id){$select='selected'; $code = $bank->bank_code; }}?>
                                                        <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>"
                                                            <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                                                    <?php }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control bottom-input call1"
                                                   name="banks[]" readonly="readonly"  value="<?=$code?>"  id="om_bank_code"  placeholder="الرمز"/>
                                        </td>
                                        <td>

                                            <input type="text" class="form-control bottom-input"
                                                   name="banks_account[]" value="<?= $item->bank_account_fk?>"  onkeyup="chek_length(this,$(this).val(),24)"  id="banks_account" maxlength="24"  placeholder="رقم الحساب"  data-validation="required" />

                                        </td>
                                        <td><?php if($item->status != 1){ ?> <a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a><?php   } ?></td>
                                        <td> <?php if($item->status == 1){
                                                $class ="success";
                                                $value =0;
                                                $title ="نشط";
                                            } elseif($item->status == 0) {
                                                $class ="danger";
                                                $value =1;
                                                $title ="غير نشط";
                                            }?>
                                            <a href='<?=base_url()."main_data/Main_data/update_bank_status/$item->bank_id_fk/$item->bank_account_fk/".$result['id'] ?>' <?= $value?>>
                                      <button type="button" class="btn btn-sm btn-<?=$class?>"><?=$title?></button>
                                            </a></td>
                                    </tr>

                                <?php } } ?>
                                </tbody>
                            </table>
                         </div>
                    </div>








                        <div class="col-md-12 col-sm-12 col-xs-12  ">
                            <div class="col-xs-3 r-inner-btn">
                                <input type="submit" role="button" id="add" name="add" value="حفظ" class="btn pull-right" />
                            </div>
                        </div>

                    </div>
                    <?php echo form_close(); }?>
                </div>
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">إسم الجمعية</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                <?php
                                    echo '<tr>
                                            <td>'.$table[0]->name.'</td>
                                            <td>
                                                <a href="'.base_url().'main_data/Main_data/update_main_data/'.$table[0]->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            </td>
                                            
                                          </tr>';

                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <?php } ?>

            </div>
        </div>


<script>
    function remove(name) {
        $(name).parents('tr').remove();
    }
 function lood(num,div,page){
    var cleer = '#' + page;
    if(num != 0)
    {
        var id = num;
        var dataString = 'num_m=' + id + '&page=' + page;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/Public_relations/add_main_data',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $(div).html(html);
            }
        });
        return false;
        }
    else
    {
        $(cleer).val('');
        $(div).html('');
        return false;
    }
 }
</script>

<script>

    function apen(id,name_input,type,valid,max) {

        var html = '<tr>' + '<td> <input class="form-control" type="'+type+'" name="'+name_input+'[]" maxlength="'+max+'" onkeypress="'+valid+'" ></td> <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';

        $('#'+id).append(html);
    }

    function get_banks(id) {


        var ur = "url=<?php echo $this->uri->segment(3) ?>" ;

    $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/main_data/Main_data/get_banks',
            data: ur,
            dataType: 'html',
            cache:false,
            success: function(html){
                
                $('#'+id).append(html);
            }
        });

    }
</script>

<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>

<script>



    function get_banck_code(valu)
    {

        var cbs = document.getElementsByClassName('call');
        var cbs1 = document.getElementsByClassName('call1');
        for(var i=0; i < cbs.length; i++) {

            valu  = cbs[i].value ;
            valu=valu.split("-");
            cbs1[i].value =valu[1];

        }
    }


</script>
<script>

    function chek_length(th,value,lenth)
    {
        if(value.length >= lenth){

            document.getElementById("add").removeAttribute("disabled", "disabled");
            var inchek_out= value.substring(0,lenth);
            th.value = inchek_out;
        }
        else if(value.length < lenth){


            document.getElementById("add").setAttribute("disabled", "disabled");
       // alert('عدد الارقام يجب ان يكون اكبر من '+lenth);

        }
    }

</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#nume').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>