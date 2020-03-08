<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <div class="col-xs-12 no-padding">
                <?php
                 if (isset($records) && !empty($records)){
                     ?>
                <table id="example" class="table  table-bordered table-striped table-hover">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>نوع الرساله</th>
                        <th> تاريخ الارسال</th>
                        <th>  الي</th>
                        <th>  نص الرساله</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <?php
                 } else{
                     ?>
                     <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                <?php
                 }
                ?>
            </div>
        </div>
    </div>

</div>
