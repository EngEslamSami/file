
<div class="col-sm-12" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">

            <div class="form-group col-sm-12">
                <div class="col-sm-6">
                    <label class="label label-green  half">اللجان</label>
                    <select id="lagna_id" class="selectpicker form-control half"  onchange="get_sanf_unit()" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <?php if(isset($legan) && !empty($legan) && $legan !=null ){
                            foreach($legan as $row){       ?>
                                <option value="<?=$row->session_number?>"><?=$row->lagna_name?></option>
                            <?php  }
                        }else{
                            echo '<option value="">لا يوجد جلسات مفتوحة </option>';
                        }?>
                    </select>
                </div>
                <a target="_blank" id="link_but"  >
                    <button  class="btn btn-sm btn-warning" > بحث </button>
                </a>
            </div>


        </div>
    </div>
</div>
<script>
    function get_sanf_unit() {
        var lagna_id=$("#lagna_id").val();
        if(lagna_id >0 && lagna_id!=""){
            document.getElementById("link_but").setAttribute("href", "<?=base_url()."family_controllers/LagnaSetting/GetLagnaDesicion/";?>"+lagna_id);
        }else {
            document.getElementById("link_but").removeAttribute("href");
        }
    }
</script>