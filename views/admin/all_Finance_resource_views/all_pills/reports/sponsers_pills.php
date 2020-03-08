<style>
    .table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th {
        background-color: #c1c1c1;
    }
</style>
<div class="col-sm-4">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">بيانات الكفلاء</h3>
        </div>
        <div class="panel-body" style="height: 450px;overflow: scroll;">

            <table class="table table-bordered table-hover" style="table-layout: fixed;">
                <thead>
                <tr style="background-color: #428bca;color: #fff">
                    <th style="width:50px;">م</th>
                    <th>الاسم</th>

                    <th style="width: 25%">عدد الايصالات</th>
                </tr>
                </thead>
                <tbody style="cursor: pointer">
                <?php
                if (isset($sponsers) && $sponsers != null){
                    $x= 1;
                    
                    foreach ($sponsers as $row){
                       

                    ?>

                <tr onclick="add('<?= $row->id?>','<?= $row->k_name?>')">
                    <td><?=$x++?></td>
                    <td><?=$row->k_name?></td>
                    <td><button class="btn btn-sm" > <?= $row->count?></button>
                       </td>


                </tr>

<?php
                }}
                ?>

                </tbody>
            </table>


        </div>
    </div>
</div>


<div class="col-sm-8" style="display: none;" id="result">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title nam">تقرير الايصالات</h3>
        </div>
        <div class="panel-body" style="height: 450px;overflow: scroll;">
            <table class="table table-bordered" style="table-layout: fixed;">
                <thead>
                <tr style="background-color: #428bca;color: #fff">
                    <th style="width:50px;">م</th>
                    <th>تاريخ الايصال</th>
                    <th> رقم الايصال</th>
                    <th style="width: 28%;">نوع الايصال</th>
                    <th> طريقة التوريد</th>
                    <th>  المبلغ</th>

                </tr>
                </thead>
               
                <tbody id="t">

                </tbody>
            </table>




        </div>
    </div>
</div>


<script>
    function get() {
       // $('#result').show();
       // return value;
       // alert(value);

    }
</script>

<script>
    //var id = $('#result')
    function add(valu,nam) {
        var id = valu;
        //var nam = nam;


        var dataString   ='id=' + id;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/all_pills/AllPills/get_pill_details',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){
                //alert(html);
                $('#result').show();
                $('.nam').text('تقرير بايصالات'+ ' '+nam);

                $("#result tbody").html(html);

            }
        });

    }
</script>

