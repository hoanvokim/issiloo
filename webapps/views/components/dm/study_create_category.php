<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title pull-left">Thêm 1 phân nhóm mới</h3>
    </div>
    <div class="panel-body">
        <?php echo form_open('study-manager-create-category-submit'); ?>

        <div class="form-group">
            <label class="control-label"> Phân nhóm cha </label>
            <div>
                <select class="form-control selectpicker" name="parentCatId">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['vi_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="demo-vs-definput" class="control-label">Tên phân nhóm</label>
            <input type="text" name="viCatName" class="form-control">
        </div>

        <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
        <a href="<?php echo base_url() . "study-manager/create-category-cancel" ?>" type="submit"
           class="btn btn-default btn-xs"><i
                class="fa fa-close"></i> Huỷ</a>
        </form>
    </div>
</div>