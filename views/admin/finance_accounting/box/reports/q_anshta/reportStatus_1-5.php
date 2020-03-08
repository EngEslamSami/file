<style>
 label.label {
    margin-bottom: 5px !important;
    color: #002542 !important;
    display: block !important;
    text-align: right ;
    font-size: 16px !important;
    padding: 0 !important;
    height: auto;
}

    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
    .radio input[type=radio], 
    .radio-inline input[type=radio], 
    .checkbox input[type=checkbox], 
    .checkbox-inline input[type=checkbox],
    input[type=radio], input[type=checkbox] {
    position: absolute;
    margin-top: 4px \9;
    margin-right: -28px;
    width: 23px;
    height: 23px;
    margin-left: 5px;
}

</style>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <form id="myform">
                    <div class="col-md-12 no-padding">

                        <div class="form-group col-md-3 col-sm-6 padding-4 text-center">
                            <label class="label " style="text-align: center;">  نوع العرض</label>
                            <?php $array =array(1=>'تفصيلي',2=>'إجمالي تفصيلي');?>

                            <?php foreach ($array as  $key=>$value){ ?>
                                <label class="radio-inline"><input <?php if($key ==1){echo'checked'; }?> type="radio" value="<?php echo $key;?>" name="status" id="status_value"><?php echo $value;?></label>

                            <?php }  ?>
                            <!--<label class="radio-inline"><input checked type="radio" value="1" name="status">حالة 1</label>
                            <label class="radio-inline"><input type="radio" value="2" name="status">حالة 2</label>
-->
                        </div>

                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ">  الفترة من </label>
                            <input type="date" name="from_date" id="from_date" value="<?php echo  date('Y-m-d'); ?>" class="form-control ">
                        </div>


                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ">  الفترة إلي </label>
                            <input type="date" name="to_date" id="to_date" value="<?php echo  date('Y-m-d'); ?>"  class="form-control ">
                        </div>
                  
                    <!--  <div class="form-group col-md-3 col-sm-6 padding-4 text-center">
                      <div style="margin-top: 21px;">
                         <input type="checkbox"  name="zero"   /> عدم إظهار الأرصدة الصفرية</div>  
                        
                        </div> -->
                        
                         <div class="skin-square">
                          <div class="i-check"  style="margin-top: 21px;">
                                       <input tabindex="9" name="zero"  type="checkbox" checked id="square-checkbox-1">
                                       <label for="square-checkbox-1">عدم إظهار الأرصدة الصفرية </label>
                                    </div>
                            
                             </div>





                        <div class="form-group col-xs-12 padding-4 text-center">
                           
                            
                            <button type="button" class="btn btn-labeled btn-success search" id=""  name="add" onclick="SearchTable();"  >
                            <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                        </button>



                           <!--   <button type="button"  name="add"  onclick="SearchTable()"
                                    class="btn btn-warning ">
                                <span><i class="fa fa-floppy-o"></i></span> بحث
                            </button>
                          <span><span class="badge badge-info">برجاء الضغط مرتين لاظهار الطباعة</span>-->
                        </div>
















                    </div>



                </form>
            </div>
        </div>





    </div>



    <div class="col-sm-12 ">
       <!-- <div  class=" panel panel-bd lobipanel-noaction  ">
            <div class="panel-heading">
                <h3 class="panel-title">نتيجة البحث</h3>
            </div>
            <div class="panel-body">-->
                <div class="col-md-12 no-padding result">
                    <div class="alert alert-info" style="color: #0bc4a2;"> الرجاء ادخال بيانات البحث والبحث لاظهار النتيجة</div>
                </div>
           <!--   </div>
        </div>-->
    </div>


</div>

<script>


    function SearchTable()
    {

        var from = $('#from_date').val();
        var to = $('#to_date').val();
        var status = $('input[name=status]:checked').val();
         var zero = $('input[name=zero]:checked').val();
       //  var ssss = $('input[name=ssss]:checked').val(); 
         
         


        if (status !=0 &&   status!='') {
            var dataString = 'from=' + from +'&to='+ to +'&status='+ status +'&zero='+ zero;
           // alert(dataString);
            $.ajax({
                type:'post',
                url: "<?php echo base_url();?>finance_accounting/box/reports/Report/get_reportStatus", 
                 data:dataString,
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    //$('.result2').html("sssssssss");
                    $('.result').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                },
                success: function(html){
                    $(".result").html(html);
                }
            });

        }



    }


</script>


<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>plugins/icheck/icheck.min.js" type="text/javascript"></script>

<script>

$('.skin-square .i-check input').iCheck({
checkboxClass: 'icheckbox_square-green',
radioClass: 'iradio_square-green',
}).on('ifChanged', function(e) {
/*
var isChecked = e.currentTarget.checked;

if (isChecked == true) {
   
  
      $(this).closest("input").attr('checked', true);          

  
  
$('.i-check input').prop('checked', true);
} else if (isChecked == false) {
    
$(this).closest("input").attr('checked', false);

}*/
});

</script>
<script>
    function printDiv2(divName){

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    // var fauxTable = document.getElementById("faux-table");
    // var mainTable = document.getElementById("main-table");
    // var clonedElement = mainTable.cloneNode(true);
    // var clonedElement2 = mainTable.cloneNode(true);
    // clonedElement.id = "";
    // clonedElement2.id = "";
    // fauxTable.appendChild(clonedElement);
    // fauxTable.appendChild(clonedElement2);

</script>