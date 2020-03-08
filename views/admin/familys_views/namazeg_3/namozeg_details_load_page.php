<!-- --><?php /*echo "<pre>";
 print_r($_POST);
 echo "</pre>";
 die;*/?>
<div class="container">
    <div class="print_forma  no-border    col-xs-12 allpad-12">


   <div class="col-xs-12">
            <div class="personality">
                <div class="col-xs-1"></div>
                <div class="col-xs-7 ahwal_style">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php echo $_POST['start_laqb'];?>/<?php echo $_POST['geha_name'];?>  </h4>
                </div>
                <div class="col-xs-3">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php echo $_POST['end_laqb'];?> </h4>
                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <br>

                </div>



                <div class="col-xs-12 no-padding">

						 <div class="form-group col-sm-12 col-xs-12">
									
									<textarea class="editor1" id="editor1"  name="namozg_head" rows="2"><?php echo$details['namozg_head'];?></textarea>
									<script type="text/javascript">
										     CKEDITOR.replace( 'editor1' );
											CKEDITOR.add  ;
                                            CKEDITOR.config.toolbar = [
                                               ['Styles','Format','Font','FontSize'],
                                               '/',
                                              
                                               ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                                               ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
                                            ] ;      
									   </script>
					   </div>
					   <div class="form-group col-sm-12 col-xs-12">
					   <table class="table table-bordered ">
					     <thead>
							<tr class="greentd">
							   <th class="text-center">إسم رب الأسرة</th>
							   <th class="text-center">السجل المدني</th>
							   <th class="text-center">رقم الملف</th>
							   <th class="text-center">عدد أفراد الأسرة</th>
						   </tr>
						 </thead>
						 <tbody>
						   <tr>
						   <td class="text-center"><?php echo $file_num_data['father_full_name']?></td>
						   <td class="text-center"><?php echo $file_num_data['father_national_num']?></td>
						   <td class="text-center"><?php echo $_POST['file_num']?></td>
						   <td class="text-center"><?php echo $family_members_num;?></td>
						   </tr>
						 </tbody>
					   </table>
                           <input type="hidden" name="no_afrad" value="<?php echo $family_members_num;?>" >
					   </div>
						<div class="form-group col-sm-12 col-xs-12">

										<textarea class="editor12" id="editor2"  name="namozg_footer"><?php echo$details['namozg_footer'];?></textarea>
										<script type="text/javascript">
										     CKEDITOR.replace( 'editor2' );
											CKEDITOR.add;
                                            CKEDITOR.config.toolbar = [
                                                   ['Styles','Format','Font','FontSize'],
                                                   '/',
                                                  
                                                   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                                                   ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
                                                ] ;        
									   </script>
							
						</div>



                </div>
            </div>


        </div>



        <div class="col-sm-12 form-group 4 text-center">
            <button type="submit"
                    class="btn btn-labeled btn-success " name="save" value="save">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
        </div>




    </div>
</div>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();

    CKEDITOR.replaceClass = 'ckeditor';


</script>