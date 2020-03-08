<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title;?></h3>
    </div>
    <div class="panel-body">

        <?php  echo form_open_multipart('Sending/add_messageToDoners')?>
        <div class="col-xs-12">
            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-3">
                        <h4 class="r-h4"> المتبرع </h4>
                    </div>
                    <div class="col-xs-3 r-input">
                        <select name="phone_num[]" class="selectpicker form-control" id="id_label_multiple" multiple="multiple" data-validation="required"  aria-required="true" >
                            <option disabled value="">إختر</option>
                            <?php if(!empty($donors)):
                                foreach ($donors as $record):?>
                                    <option value="<?php echo $record->id;?>"><?php echo $record->name;?></option>
                                <?php endforeach; endif;?>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xs-12 ">

            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-3">
                        <h4 class="r-h4">  رقم الجوال  </h4>
                    </div>
                    <div class="col-xs-3 r-input">
                        <input type="text" onkeypress="validate_number(event)" name="mobile" data-validation="required">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 ">

            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-3">
                        <h4 class="r-h4">  محتوي الرسالة  </h4>
                    </div>
                    <div class="col-xs-8 r-input">
                        <textarea class="r-textarea" name="content" id="textarea" onkeyup="return textareakeyup();" maxlength="150" data-validation="required"></textarea>
                        <small>عدد الحروف المتاحة <span id="letters">150</span> حرف</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 ">

            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            </div>
        </div>
        <div class="col-xs-12 r-inner-btn">
            <div class="col-xs-3">
            </div>
            <div class="col-xs-3">
                <input style="float: left;" type="submit" role="button"  name="save" value="ارسال" class="btn-success form-control">
            </div>
            <?php echo form_close()?>
            <div class="col-xs-2">
                <button class="btn-success form-control" > عودة </button>
            </div>
            <div class="col-xs-7"></div>
        </div>
        <?php if(!empty($records)):?>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead><tr>
                    <th >م</th>
                    <th >رقم الهاتف</th>
                    <th >إسم المتبرع</th>
                    <th >التفاصيل</th>
                    <th >الإجراء</th>
                </tr></thead>
                <tbody>
                <?php  $serial = 0;
                foreach($records as $record):


                    $serial++; ?>
                    <tr>
                        <td><?php echo $serial ?></td>
                        <td><?php echo $record->donor_mob;?></td>

                        <td><?php echo $record->name;?></td>
                        <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                        <td> <a type="button" class="" data-toggle="modal" data-target="#d<?php echo $record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span></td>
                    </tr>
                    <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="gridSystemModalLabel">التفاصيل</h4>
                                </div>
                                <br />


                                <div class="col-sm-3" style="font-size: 16px;">كود المتبرع</div>
                                <div class="col-sm-9"  style="font-size: 16px;">
                                    <?php echo $record->id?>
                                </div>
                                <br />
                                <div class="col-sm-3" style="font-size: 16px;">إسم المتبرع</div>
                                <div class="col-sm-9"  style="font-size: 16px;">
                                    <?php echo $record->name;?>
                                </div>
                                <br /><br />
                                <div class="modal-body">


                                    <div class="col-md-3" style="font-size: 16px;"></div>
                                    <div class="col-md-9"></div>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-4" style="font-size: 16px;">الرسالة</div>
                                        <div class="col-sm-8">
                                            <?php echo $record->content?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

<!------------------------------- delete Model -------------->
                    <div class="modal fade" id="d<?= $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حذف الرسالة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" position: relative; top: -22px;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  <h6> هل انت متاكد من عملية الحذف؟</h6>

                                </div>
                                <div class="modal-footer">
                                    <form action="<?php echo base_url('Sending/delete_messageFromDonors').'/'.$record->id ?>">
                                        <button type="submit" class="btn btn-primary" >تاكيد</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach ;?>
                </tbody>
            </table>
        <?php endif;?>


    </div>



<script>
     function textareakeyup(){
        var len = $("#textarea").val().length;
        document.getElementById("letters").innerHTML = 150-len;
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




