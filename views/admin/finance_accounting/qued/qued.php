<div class="col-xs-12 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
             <span id="message">
            <?php
            if(isset($_SESSION['message']))
                echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            </span>
            <?php echo form_open_multipart('admin/finance_accounting/sanad/',array('class'=>"form-horizontal",'role'=>"form" ,"method"=>"post"))?>

            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم القيد</label>
                    <input type="number" id="qued_num"  name="qued_num" value="<?php echo $qied_num?>"   class="form-control half input-style"  placeholder="رقم القيد" readonly="readonly"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ القيد  </label>
                    <input type="text"   class="form-control half input-style date_melady"   class="form-control docs-date" id="qued_date" name="qued_date" placeholder="شهر / يوم / سنة " />
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد حسابات المدين</label>
                    <input type="text" id="madeen_num"  name="madeen_num"    onkeypress="validate_number(event)"   class="form-control half input-style " placeholder="عدد  حسابات المدين" />
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد  حسابات الدائن</label>
                    <input type="text" id="dayen_num"  name="dayen_num" onkeypress="validate_number(event)"   class="form-control half input-style " placeholder="عدد  حسابات الدائن" />
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">البيان</label>
                    <input type="text" id="qued_byan"    name="qued_byan" class="form-control half input-style " placeholder="البيان"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12  col-lg-pull-1"  >
                    <input type="submit"  onclick="return go($('#dayen_num').val(),$('#madeen_num').val());" name="add" value="إضافة "  class="btn btn-sm btn-primary" />
                </div>

            <div class="row" id="option3"></div>
            </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>


 
<script>
  function go(dayen_num,madeen_num)
    {
        if(dayen_num && madeen_num )
        {
   
       var  qued_date =$("#qued_date").val();
       var  qued_num =$("#qued_num").val();
       var  qued_byan=$("#qued_byan").val();
     var dataString = 'dayen_num=' + dayen_num + '&madeen_num='+madeen_num +"&qued_date="+qued_date+"&qued_num="+qued_num +"&qued_byan="+qued_byan ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/finance_accounting/qued',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#option3').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#option3').html('');
            alert("من فضلك املأ كافه الحقول");
            return false;
        }
    }
</script>







