


	<style type="text/css">
	
		.reply-comment{
			display: inline-block;
			width: 100%;
			margin-bottom: 20px
		}
		.reply-img{
			width: 15%;	
			float: right;
		}
		.reply-img img{
			width: 100%;
			max-width: 70px;
			height: 70px;
			border:1px solid #eee;
		}
		.reply-comment{
			float: right;
			width: 85%;
		}
		.label-inverse{
			background-color: #888;
			color: #fff;
		}
		.reply-comment  span.label{
			text-align: center;
			padding-right: 10px;
			display: inline-block;
			width: auto;
            font-size:14px;
		}
		.reply-comment .name{
			color: #888;
            font-size:15px;
		}
		.comments-sec .well{
			height: 100%;
		}
		.bubble-div img{
			width: 150px;
			max-width: 100%;
		}
        .btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
            margin: 0 0 0 0;
        }
	</style>



</head>

<body id="page-top" data-spy="scroll" >
	
<?php
           
                $data["get_tazkra"] = $get_tazkra;
        
                $this->load->view('admin/technical_support/tazkra/tazkra_orders/tazkra_details', $data);
             
                ?>

	<div class="comments-sec">
		<div class="col-xs-12 no-padding">
			<h5>التعليقات</h5>
			<div class="well col-xs-12 no-padding">
				<div class="col-md-9 padding-4">
                <?php
      //  echo '<pre>'; print_r($result);
        if(isset($result)&&!empty($result)){

           
            foreach ($result as $row){

                ?>
					<article class="reply-comment">
						<div class="reply-img">
							<img src="<?php echo base_url()?>asisst/admin_asset/img/profile-icon.png" class="img-circle">
						</div>
						<div class="reply-comment ">
							<h5 class="name"><span class="label label-inverse"><?= $row->publisher_name;?> </span> <?= $row->date_ar;?> 
                            <!-- <a type="button" class="btn btn-danger btn-xs"  href="<?= base_url() . "technical_support/tazkra/tazkra_comments/Tazaker_comments/delete_comment/" . $row->id ."/".$row->tazkra_id_fk  ?>" style="float:left;"><i class="fa fa-trash"> </i></a>  -->
                           
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                                <button type="button" class="btn btn-default"  onclick='swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: false
                            },
                            function(){
                            swal("تم الحذف!", "", "success");
                            window.location="<?= base_url() . "technical_support/tazkra/tazkra_comments/Tazaker_comments/delete_comment/" . $row->id ."/".$row->tazkra_id_fk  ?>";
                            });'> <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  data-toggle="modal"
                                      
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                
                                </div>
                           
                           
                           
                           
                           <!-- <a href="#" type="button" class="btn btn-danger btn-xs"  style="float:left;" onclick='swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: false
                            },
                            function(){
                            swal("تم الحذف!", "", "success");
                            window.location="<?= base_url() . "technical_support/tazkra/tazkra_comments/Tazaker_comments/delete_comment/" . $row->id ."/".$row->tazkra_id_fk  ?>";
                            });'>
                            <i class="fa fa-trash"> </i></a> 
                        
                          
                          
                            <a type="button" class="btn btn-primary btn-xs" data-toggle="modal"style="float:left;"
                                       style="padding: 1px 5px;"
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></a>-->
                             </h5>
							<p><?= $row->comment;?></p>
						</div>
					</article>
                    <?php } } ?>
				
				</div>
				<div class="col-md-3 padding-4">
					<div class="bubble-div text-center">
						<img src="<?php echo base_url()?>asisst/admin_asset/img/comment-bubble.png">
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 no-padding">
        <?php   echo form_open_multipart('technical_support/tazkra/tazkra_comments/Tazaker_comments/add_comment/'.$get_all->id );?> 
			<div class="col-xs-12 form-group">
				<label class="label ">إضافة</label>
				<textarea class="form-control" rows="3" name="tazkra_comment" id="tazkra_comment"  data-validation="required" ></textarea>
			</div>
			
			<div class="col-md-6 form-group">

			</div>
			<div class="col-md-3 form-group">
                <button class="btn btn-success btn-labeled" type="submit" name="add" value="add"
                ><span class="btn-label"><i class="fa fa-reply"></i></span>إرسال</button>
			
                
            
            </div>
		</div>
        <?php
            echo form_close();
            ?>
	</div>

<!-- model -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التعليقات  </h4>
            </div>
            <div class="modal-body" id="details_result">
          
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php

                ?>
               
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
    
	


	<script>
		new WOW().init();
		$('.some_class').datetimepicker();
	</script>



</body>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>technical_support/tazkra/tazkra_comments/Tazaker_comments/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>