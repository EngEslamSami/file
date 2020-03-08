<tr id="<?=$len?>">
<!--<td>--><?//=$len?><!--</td>-->
    <td>
        <input type="text" name="name<?=$len?>" onchange="make_dir();"
               class="form-control half file">
    </td>
    <td>
        <input type="file" name="file<?=$len?>" onchange="make_dir();"
               class="form-control half file">
    </td>
    <td>        <a href="#" onclick="remove_roww(<?=$len?>);"  >
          <i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>