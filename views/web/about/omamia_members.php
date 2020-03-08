<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
<style>
h2.subtitle {
font-size: 20px;
    color: #96c73e;
    font-weight: bold;
    border-right: 9px solid #ffb61e;
    padding-right: 8px;
    line-height: 40px;
}

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
.dataTables_wrapper{
    z-index: 1;
}
.dataTables_wrapper .dataTables_filter {
 
    padding-right: 10px;
}
#addSearchInputs{
    display: none;
}
.dataTables_wrapper .dataTables_filter input{
    width: 200px;
}
</style>


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/king_word'?>">من نحن</a></li>
            <li class="active">أعضاء الجمعية العمومية</li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-50 ptop-30">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12"  id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12 " id="secondDiv">
            <div class="background-white content_page" style="padding: 5px;">
              <div class="text-center">
                <h2 class="box-title"> أعضاء الجمعية العمومية</h2>
              </div>
                <table class="table   table-striped omomia-table"  id="myTable">
                  <thead>
                    <tr>
                      <th style="width: 60px;">م</th>
                      <th style="width: 140px;">رقم العضوية</th>
                      <th>إسم العضو</th>
                    <!--  <th style="width: 140px;">رقم الجوال</th>-->
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $a = 1;
                        if (isset($all_gam3ia_omomia) && !empty($all_gam3ia_omomia)) {
                            foreach ($all_gam3ia_omomia as $record) {
                                ?>
                                <tr>
                                    <td class="droid"><?php echo $a ?></td>
                                    <td class="droid">
                                        <?php
                                        if (isset($record->odwiat->rkm_odwia_full) && ($record->odwiat->rkm_odwia_full)!= NULL ) {
                                            echo $record->odwiat->rkm_odwia_full;
                                        } else {
                                            echo "غير محدد";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $record->laqb_title.'/'. $record->name; ?></td>
                                  <!--  <td class="droid"><?php echo $record->jwal; ?></td> -->

                                </tr>
                                <?php
                                $a++;
                            }
                        } else { ?>
                            <td colspan="6">
                                <div style="color: red; font-size: large;">لم يتم اضافه أعضاء </div>
                            </td>
                        <?php }
                        ?>
                  
                  
                  
                  
                                     </tbody>
                </table>


                
        </div>
    </div>
</section>


<script type="text/javascript" src="<?= base_url() . 'asisst/web_asset/' ?>js/jquery-1.10.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>