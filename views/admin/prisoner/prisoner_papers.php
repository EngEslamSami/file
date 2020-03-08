<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open_multipart("Prisoner/prisoner_papers/".$this->uri->segment(3))?>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">رقم الملف </label>
                    <input type="text"   name="rkm_mlf" class="form-control half input-style"   >
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">الأوراق الثبوتية</label>
                    <input type="file"   name="image" class="form-control half input-style"   >
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">المقابلة الميدانية </label>
                    <input type="file"   name="image2" class="form-control half input-style"   >
                </div>
            </div>

            <!------------------------------------>
            <div class="col-xs-12 col-xs-pull-5">

                    <button type="submit" name="add_papers" value="add_papers" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> إضافة</button>

            </div>
            <?php  echo form_close()?>
        </div>
    </div>
</div>
