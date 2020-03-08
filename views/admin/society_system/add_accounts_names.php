<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 70px;
        height: 70px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
        <?php if(isset($record)){
           echo form_open_multipart("society_system/SocietySystem/addAccountsNames/".$record->id);
          
        } else {
            echo form_open_multipart("society_system/SocietySystem/addAccountsNames");
        }?>
            <div class="col-xs-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">اسم الحساب  </label>
                    <input type="text"  name="title" id="title" value="<?php if(isset($record)){echo $record->title;}?>" class="form-control half input-style" placeholder="ادخل البيانات " >
                    <input type="hidden" name="type" value="1" />
                </div>
            </div>
            <div class="col-xs-12">
                <input type="submit" name="add"  class="btn btn-success center-block " value="حفظ">
                <br>

            </div>
            <?php  echo form_close()?>

<?php if(isset($records) && !empty($records)) { ?>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="info">
                    <th class="text-center">م</th>
                    <th class="text-center">اسم الحساب</th>
                    <th class="text-center">اجرء</th>
                </tr>
                </thead>
                <tbody>
                    <?php $x = 1;
                    foreach ($records as $record) { ?>
                    <tr >
                        <td><?php echo $x++ ?></td>
                        <td><?php echo $record->title; ?></td>
                        <td>
                         <a href="<?= base_url() . "society_system/SocietySystem/addAccountsNames/" . $record->id ?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                <a href="<?= base_url() . "society_system/SocietySystem/delete/".$record->id.'/addAccountsNames' ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
             </table>
            <?php } ?>
         </div>
    </div>
</div>
