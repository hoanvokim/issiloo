<h3 class="panel-title pull-left">Cập nhật phân khúc: <b><?php foreach ($currentCategory as $currentCat) {
            echo $currentCat['vi_name'];
        } ?> </b></h3>
<?php echo form_open('study-manager-update-category-submit'); ?>
<br><br/>
<?php foreach ($currentCategory as $currentCat) { ?>
    <input type="hidden" id="hide" name="catId" value="<?php echo $catId; ?>">
    <div class="form-group">
        <label class="control-label"> Phân nhóm cha </label>
        <div>
            <select class="form-control selectpicker"
                    name="parentCatId" disabled>
                <?php foreach ($parentCategory as $parentCat) { ?>
                    <option
                        value="<?php echo $parentCat['id'] ?>"
                    ><?php echo $parentCat['vi_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="demo-vs-definput" class="control-label">Tên phân nhóm</label>
        <input type="text" name="viCatName" class="form-control" value="<?php echo $currentCat['vi_name']; ?>">
    </div>
<?php } ?>
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Cập nhật</button>
<a href="<?php echo base_url() . "study-manager/update-category-cancel" ?>" type="submit"
   class="btn btn-default btn-xs"><i
        class="fa fa-close"></i> Huỷ</a>
</form>