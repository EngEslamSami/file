<option value="">اختر</option>
<?php
if (isset($bdlat) && !empty($bdlat)){
    foreach ($bdlat as $row){
        ?>
        <option value="<?= $row->id?>" ><?= $row->title?></option>

        <?php
    }
    ?>

<?php
}