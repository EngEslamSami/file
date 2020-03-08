<style type="text/css">
.nav.nav-tabs {
    border-bottom: 1px solid #eee;
}
	.table-blue thead th {
    background-color: #428bca;
    color: #f5f5f5;
}
.btn-pxs{
	padding: 2px 5px;
}
.cs-label {
    font-size: 14px;
    font-weight: normal;
}
.top_radio input[type=radio] {
    height: 24px;
    width: 24px;
    line-height: 0px;
    vertical-align: middle;
    margin-right: -33px;
    top: -5px;

}
.top_radio .radio,.top_radio .radio {
    vertical-align: middle;
    font-size:16px;

    padding: 10px;
    border-bottom: 2px solid #eee;
    border-radius: 8px;
    text-align: right;

}
.radio input[type="radio"] {
    opacity: 1;
}
</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $title?></h3>
	</div>
	<div class="panel-body">
		<div>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="<?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'in_cheque'){
				        echo active;
				    }
				}else{?>  active <?php } ?>"><a href="#in_cheque" aria-controls="in_cheque" role="tab" data-toggle="tab">الشيكات الواردة</a></li>
				<li role="presentation" class="<?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'out_cheque'){?>
				         active
				  <?php  }
				}?>"><a href="#out_cheque" aria-controls="out_cheque" role="tab" data-toggle="tab">الشيكات الصادرة</a></li>

			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade <?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'in_cheque'){
				        echo in; echo active;
				    }
				}else{?> in active<?php } ?>" id="in_cheque">
				<br>
                    <?php if(!empty($sheeks_qabd)){ ?>
					<table class="table table-hover table-bordered table-blue">
						<thead>
							<th>م</th>
							<th>نوع السند</th>
							<th>رقم السند</th>
							<th>تاريخ السند</th>
							<th>الإسم</th>
							<th>رقم الشيك</th>
							<th>البنك</th>
							<th>رقم الحساب</th>
							<th>تاريخ الشيك</th>
							<th>المبلغ</th>
							<th>البيان</th>
							<th>تواجد الشيك</th>
							<th>حالة الشيك</th>
							<th>نوع الشيك</th>
						</thead>
						<tbody>
                        <?php  $count=1; foreach ($sheeks_qabd as $row){ ?>






                            <?php
                            //sheek_type_color
                            if(isset($row->sheek_type)&&!empty($row->sheek_type)){
                                $sheek_type=$row->sheek_type_name;
                                $sheek_type_color=$row->sheek_type_color;
                            }else{
                                $sheek_type="لم يتم تحديد حاله تواجد الشيك";
                                $sheek_type_color="#95c11f";

                            }
                            if(isset($row->sheek_status)&&!empty($row->sheek_status)){
                                $sheek_status=$row->sheek_status_name;
                                $sheek_status_color=$row->sheek_status_color;

                            }else{
                                $sheek_status="لم يتم تحديد حاله  الشيك";
                                $sheek_status_color="#95c11f";


                            }

                            if(isset($row->twaged_sheek)&&!empty($row->twaged_sheek)){
                                $twaged_sheek=$row->twaged_sheek_name;
                                $twaged_sheek_color=$row->twaged_sheek_color;

                            }else{
                                $twaged_sheek="لم يتم تحديد حاله تواجد  الشيك";
                                $twaged_sheek_color="#95c11f";


                            }
                            ?>











                            <!------------------------------------modals-ahmedzidan----------------------------->



                            <div class="modal fade" id="myModalexit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">تواجد الشيك</h4>
                                        </div>
                                        <div class="modal-body">


                                            <div class=" col-xs-12 text-center top_radio">

                                                <?php
                                                if(isset($sheeks_ones) &&!empty($sheeks_ones)){

                                                    foreach ($sheeks_ones as $row2){

                                                        ?>
                                                        <div class="col-sm-6">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="sheeks_one"
                                                                           value="<?=$row2->id?>">
                                                                    <?php echo$row2->title?><br>
                                                                </label>
                                                            </div>
                                                        </div>


                                                    <?php } } ?>



                                            </div>
                                            <textarea name=""  style="height: 100px;box-shadow: 2px 2px 8px;" class="form-control text_div"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                            <button type="button" onclick="add_halet_cheque(<?=$row->rqm_sanad_id_fk?>,<?=$row->id?>,<?=$row->sheek_num?>,'<?=$row->bank_name?>',1);" style="float: left" class="btn btn-add">حفظ</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="myModalhalt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">حالة الشيك	</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class=" col-xs-12 text-center top_radio">

                                                <?php
                                                if(isset($sheeks_two) &&!empty($sheeks_two)){

                                                    foreach ($sheeks_two as $row2){

                                                        ?>

                                                        <div class="col-sm-6">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="sheeks_two"
                                                                           value="<?=$row2->id?>">
                                                                    <?php echo$row2->title?><br>
                                                                </label>
                                                            </div>
                                                        </div>


                                                    <?php } } ?>

                                            </div>
                                            <textarea name="" style="height: 100px;box-shadow: 2px 2px 8px;" class="form-control text_div"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                            <button type="button" onclick="add_halet_cheque(<?=$row->rqm_sanad_id_fk?>,<?=$row->id?>,<?=$row->sheek_num?>,'<?=$row->bank_name?>',2);" style="float: left" class="btn btn-add">حفظ</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="myModaltype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">نوع الشيك
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class=" col-xs-12 text-center top_radio">

                                                <?php
                                                if(isset($sheeks_three) &&!empty($sheeks_three)){

                                                    foreach ($sheeks_three as $row3){

                                                        ?>

                                                        <div class="col-sm-6">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="sheeks_three"
                                                                           value="<?=$row3->id?>">
                                                                    <?php echo$row3->title?><br>
                                                                </label>
                                                            </div>
                                                        </div>


                                                    <?php } } ?>
                                            </div>
                                            <textarea name=""  style="height: 100px;box-shadow: 2px 2px 8px;"  class="form-control text_div"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                            <button type="button" onclick="add_halet_cheque(<?=$row->rqm_sanad_id_fk?>,<?=$row->id?>,<?=$row->sheek_num?>,'<?=$row->bank_name?>',3);" style="float: left" class="btn btn-add">حفظ</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!------------------------------------modals-ahmedzidan----------------------------->



							<tr>
                                <td><?php echo$count;?></td>
								<td>قبض شيك</td>
                                <td><?php echo$row->rqm_sanad_id_fk?></td>
                                <td><?php echo $row->details->date_sanad_ar?></td>
                                <td><?php echo $row->details->person_name?></td>
                                <td><?php echo $row->sheek_num?></td>
                                <td><?php echo $row->bank_name?></td>
								<td>236596523</td>
                                <td><?php echo $row->sheek_date_ar?></td>
                                <td><?php echo $row->details->total_value?></td>
                                <td><button type="button"  class="btn btn-info btn-xs" onclick="Get_details(<?php echo$row->rqm_sanad_id_fk;?>,'qabd')" data-toggle="modal"  data-target="#myModalbyan">البيان</button></td>
                                <td><button type="button" data-text="" style="background-color: <?=$twaged_sheek_color?>" class="btn btn-info btn-xs" onclick="" data-toggle="modal" data-target="#myModalexit"><?php echo$twaged_sheek?></button></td>
                                <td><button type="button" data-text="" style="background-color: <?=$sheek_status_color?>"   class="btn btn-info btn-xs" onclick="" data-toggle="modal" data-target="#myModalhalt"><?php echo$sheek_status?></button></td>
                                <td><button type="button" data-text="" style="background-color: <?=$sheek_type_color?>"   class="btn btn-info btn-xs" onclick="" data-toggle="modal" data-target="#myModaltype"> <?php echo $sheek_type?></button></td>

							</tr>

                            <?php $count ++; } ?>

						</tbody>
					</table>
                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات واردة!</div>
                    <?php  } ?>
				</div>
				<div role="tabpanel" class="tab-pane fade <?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'out_cheque'){?>
				         in
				        active
				  <?php  }
				}?>" id="out_cheque">
				<br>
                    <?php if(!empty($sheeks_sarf)){ ?>
                        <table class="table table-hover table-bordered table-blue">
                            <thead>
                            <th>م</th>
                            <th>نوع السند</th>
                            <th>رقم السند</th>
                            <th>تاريخ السند</th>
                            <th>إسم المستفيد</th>
                            <th>رقم الشيك</th>
                            <th>البنك</th>
                            <th>رقم الحساب</th>
                            <th>تاريخ إصدار الشيك</th>
                            <th>المبلغ</th>
                            <th>البيان</th>
                            <th>حالة التسليم</th>
                            <th>حالة الشيك</th>
                            </thead>
                            <tbody>
                            <?php  $count=1; foreach ($sheeks_sarf as $row){ ?>
                            <tr>
                                <td><?php echo $count?></td>
                                <td>صرف شيك</td>
                                <td><?php echo $row->rqm_sanad_id_fk?></td>
                                <td><?php echo $row->details->date_sanad_ar?></td>
                                <td><?php echo $row->details->person_name?></td>
                                <td><?php echo $row->sheek_num?></td>
                                <td><?php echo $row->bank_name?></td>
                                <td>236596523</td>
                                <td><?php echo $row->sheek_date_ar?></td>
                                <td><?php echo $row->details->total_value?></td>
                                <td><button type="button"  class="btn btn-info btn-xs"  onclick="Get_details(<?php echo$row->rqm_sanad_id_fk;?>,'sarf')" data-toggle="modal" data-target="#myModalbyan">البيان</button></td>
                                <td><?php if($row->taslem_sheek == NULL){ ?>
                                <button class="btn btn-danger btn-pxs" data-toggle="modal" onclick="loadhalet_taslem(<?php echo$row->id;?>)" data-target="#myModalhalet_taslem" >لم يتم التسليم </button> <?php }else{  ?>
                                  <button class="btn  btn-pxs"style="background-color: <?php echo $row->taslem_sheek_color?>" data-toggle="modal" onclick="loadhalet_taslem(<?php echo$row->id;?>)" data-target="#myModalhalet_taslem" ><?php echo $row->taslem_sheek_name?> </button>
                                <?php } ?>
                                </td>
                                <td><?php if($row->sheek_status == NULL){ ?>
                                    <button  data-toggle="modal" data-target="#myModalhalet_sheek" onclick="loadhalet_sheek(<?php echo$row->id;?>)" class="btn btn-danger btn-pxs" >لم يتم الصرف</button><?php }else{ ?>

                                        <button class="btn  btn-pxs" style="background-color: <?php echo $row->sheek_status_color?>" data-toggle="modal" onclick="loadhalet_sheek(<?php echo$row->id;?>)" data-target="#myModalhalet_sheek" ><?php echo $row->sheek_status_name?> </button>
                                    <?php } ?>
                                </td>
                            </tr>


                                <?php $count ++; }  ?>
                            </tbody>
                        </table>
                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات صادرة!</div>
                  <?php  } ?>

				</div>

			</div>

		</div>

	</div>

</div>





<!------------------------------------------------modals----------------------------------------------->

<div class="modal fade" id="myModalbyan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">البيان</h4>
            </div>
            <div class="modal-body" id="details">

            </div>
            <div class="modal-footer">
                <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalhalet_taslem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الإجراء</h4>
            </div>
            <div id="halet_taslem">
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="myModalhalet_sheek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الإجراء</h4>
            </div>
            <div id="halet_sheek"></div>

        </div>
    </div>
</div>


<!------------------------------------------------modals----------------------------------------------->


<script>



    function loadhalet_taslem(valu) {


            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/loadhalet_taslem',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#halet_taslem").html(html);
                }
            });




    }


    function loadhalet_sheek(valu) {

        var dataString = 'id=' + valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/loadhalet_sheek',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#halet_sheek").html(html);
            }
        });


    }


    function Get_details(valu,type) {

        var dataString = 'id=' + valu  + '&type='+ type;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/load_details',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#details").html(html);
            }
        });


    }



</script>



<script>
    function add_halet_cheque(rqm_sand,row_id,sheek_num,bank_name,type)
    {

        if(type==1) {
            var option = $("input[name='sheeks_one']:checked").val();
        }
        if(type==2) {
            var option = $("input[name='sheeks_two']:checked").val();
        }
        if(type==3) {
            var option = $("input[name='sheeks_three']:checked").val();
        }

        if(option)
        {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>finance_accounting/box/sheek_tracks/Sheek_tracks/update_exit_cheque",
                data: {
                    row_id: row_id,
                    rqm_sand: rqm_sand,
                    option: option,
                    sheek_num:sheek_num,
                    bank_name:bank_name,
                    type:type

                },
                success: function (d) {

                    //alert(d);
                    // return;
                    if(type==1) {
                        alert("تم تغيير حاله تواجد الشيك بنجاح");
                    }
                    if(type==2) {
                        alert("تم تغيير حاله الشيك بنجاح");
                    }
                    if(type==3) {
                        alert("تم تغيير نوع الشيك  بنجاح");
                    }
                    location.reload();
                }

            });


        }else{
            alert("من فضلك اختر النوع ");
        }

    }

</script>