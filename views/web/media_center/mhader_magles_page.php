<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
<style>

.omomia-table.table>thead>tr>th, .omomia-table.table>thead>tr>td {
    border-bottom-width: 2px;
    background-color: #ffb61e;
    color: #000;
    text-align: center;
    border-radius: 13px;
}
.omomia-table.table{
border-collapse:separate; 
border-spacing:0.8em;
 }
.omomia-table.table>tbody>tr{
    margin-bottom: 10px;
}
.omomia-table.table>tbody>tr>th, .omomia-table.table>tbody>tr>td {
    border-bottom-width: 2px;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
}
.inner-omomia {
    position: relative;
    z-index: 1;
}
.box-title {
    position: relative;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
    padding: 10px 7px;
    font-size: 18px;
    display: inline-block;
    min-width: 300px;
    z-index: 1;
}
.content_page{
    position: relative;
}
.content_page:after {
    position: absolute;
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    border: 3px dotted #999;
    position: absolute;
    top: 40px;
    z-index: 0;
}
 .dawra-nums{
    display: inline-block;
    width:100%;
    padding-bottom: 20px;
    border-bottom: 3px dotted #999;
}
.dawra-style {
    position: relative;
       display: inline-block;
    width: 100%;
}
.dawra-style h5 {
    /* margin: 0px 0 0; */
    margin-right: 40px;
    padding: 10px 17px 10px 0;
    background-color: #ffb61e;
    border-bottom-left-radius: 18px;
}
.dawra-style i {
position: absolute;
    top: 5px;
    /* padding: 10px; */
    width: 50px;
    height: 50px;
    background-color: #95c63d;
    color: #fff;
    font-size: 30px;
    text-align: center;
    line-height: 50px;
    border-radius: 50%;
}

.dawra-style i:after {
  pointer-events: none;
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  content: '';
  box-sizing: content-box;
  box-shadow: 0 0 0 3px #ffb61e;
  top: 0;
  left: 0;
  opacity: 0;
  transition: 300ms;
}

.dawra-style i:hover {
  background-color: #fff;
  color: #95c63d;
}

.dawra-style i:hover:after {
  opacity: 1;
  transform: scale(1.15);
}
.dawra-style .badge {
    background-color: #fff;
    color: #000;
    font-size: 16px;
    font-weight: 500;
    float: left;
    margin-left: 5px;
    margin-top: -2px;
}

.iconat-item i{
    font-size: 100px;
    color: #95c63d;
}
.iconat-item{
    margin: 20px 0;
}
.table-sec{
    padding: 0 10px;
}
.mhader-imgs{
   max-width: 100%;
    width: 700px;
    margin: auto; 
    box-shadow: -2px 2px 8px #999;
}
#mhader-banner .carousel-inner {
    max-width: 100%;
    width: 100%;

}
#mhader-banner .carousel-inner img{
    width: 100%;
    height: 500px;
}
</style>


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/news'?>">المركز الإعلامى</a></li>
            <li class="active">الأنظمة و اللوائح</li>
        </ol>
    </div>
</section> 

<section class="main_content pbottom-50 ptop-30">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" id="firstDiv">
            <h4 class="sidebar_title"> المركز الإعلامى </h4>
            <div class="menu_sidebar">
                <ul class="list-unstyled" >
                    <li ><a href="<?=base_url().'Web/news'?>"> أخبار الجمعية </a></li>
                    <li><a href="<?=base_url().'Web/gallery'?>"> مكتبة الصور</a></li>
                    <li><a href="<?=base_url().'Web/videos'?>"> مكتبة الفيديوهات</a></li>
                    <li><a href="#"> الجمعية فى الصحافة</a></li>
                    <li><a href="<?=base_url().'Web/reports'?>"> التقارير</a></li>
                    <li><a href="<?=base_url().'Web/system'?>"> الأنظمة و اللوائح</a></li>
                    <li><a href="<?=base_url().'Web/plans'?>"> الخطة التشغيلية</a></li>
                    <li class="active"><a href="<?=base_url().'Web/mhader_magles'?>"> إجتماعات الجمعية العمومية</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="inner-omomia">
                   <div class="text-center">
                    <h2 class="box-title"> محاضر إجتماعات الجمعية العمومية</h2>
                  </div>
                  
                  <div class="dawra-nums">
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="dawra-style">
                          <a class="hover-fx"><i class="fa fa-sort-numeric-asc"></i></a>
                            <h5> رقم الجلسة <span class="badge droid">  3     </span></h5>
                               
                             
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="dawra-style">
                          <a class="hover-fx"><i class="fa fa-calendar-o"></i></a>
                            <h5> تاريخ الجلسة <span class="badge droid">20-2-2019</span></h5>
                             
                             
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="dawra-style">
                              <a class="hover-fx"><i class="fa fa-calendar-o"></i></a>
                                <h5> التوقيت <span class="badge droid">5 م </span></h5>
                                 
                                 
                              </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="dawra-style">
                              <a class="hover-fx"><i class="fa fa-calendar-o"></i></a>
                                <h5> مكان الانعقاد <span class="badge droid"> بالجمعية </span></h5>
                                 
                                 
                              </div>
                        </div>
                        
                        
                       
                    </div>
                    
                    <div class="iconat-algalsa">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="iconat-item text-center">
                              <a href="#" data-toggle="modal" data-target="#myModal"> <i class="fa fa-server" aria-hidden="true"></i> </a>
                              <a href="#" data-toggle="modal" data-target="#myModal"> <h5> المحاور </h5></a>
                           </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                           <div class="iconat-item text-center">
                              <a href="#"> <i class="fa fa-users" aria-hidden="true"></i> </a>
                              <a href="#"> <h5> الأعضاء الحاضرين </h5></a>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="iconat-item text-center">
                              <a href="#"> <i class="fa fa-hand-peace-o" aria-hidden="true"></i> </a>
                              <a href="#"> <h5> القرارات </h5></a>
                           </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="iconat-item text-center">
                                     <a href="#" download> <i class="fa fa-download" aria-hidden="true"></i> </a>
                                     <a href="#" download> <h5>  تحميل المحضر </h5></a>
                             </div>
                        </div>
                    </div>
                    
                    
                    
                     <div class="text-center">
                        <h2 class="box-title"> جدول الأعضاء </h2>
                      </div>
                    
                    <div class="table-sec mbottom-30 mtop-30">
                      <table class="table table-striped omomia-table"  id="myTable">
                          <thead>
                            <tr>
                              <th style="width: 60px;">م</th>
                              <th style="width: 140px;">رقم العضوية</th>
                              <th>إسم العضو</th>
                              <th style="width: 140px;">رقم الجوال</th>
                            </tr>
                          </thead>
                          <tbody>
                                <tr  >
                                    <td class="sorting_1">1</td>
                                    <td>
                                        1/ع/463                                    </td>
                                    <td>الشيخ/عبدالكريم بن عبدالعزيز الجاسر</td>
                                    <td>0555233777</td>

                                </tr>
                                <tr >
                                    <td class="sorting_1">2</td>
                                    <td>
                                        2/ع/463                                    </td>
                                    <td>الدكتور/راشد بن محمد عبدالله أباالخيل</td>
                                    <td>0505481920</td>

                                </tr>
                          
                          
                          
                          
                             </tbody>
                        </table>
                    </div>
                    
                    <div class="mhader-imgs text-center">
                    
                        <div id="mhader-banner" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#mhader-banner" data-slide-to="0" class="active"></li>
                                <li data-target="#mhader-banner" data-slide-to="1"></li>
                                <li data-target="#mhader-banner" data-slide-to="2"></li>
                              </ol>
                            
                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                  <img src="<?=base_url().'asisst/web_asset/'?>img/img2.jpg" />
                                  
                                </div>
                                <div class="item">
                                  <img src="<?=base_url().'asisst/web_asset/'?>img/img2.jpg" />
                                 
                                </div>
                              
                              </div>
                            
                              <!-- Controls -->
                              <a class="left carousel-control" href="#mhader-banner" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#mhader-banner" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="<?= base_url() . 'asisst/web_asset/' ?>js/jquery-1.10.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script> 