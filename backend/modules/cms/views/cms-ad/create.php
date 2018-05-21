<div class="container col-sm-12" style="margin-top: 10px;">

    <div class="form-horizontal">
        <input type="hidden" id="id" value="<?= $form['id'] ?>">

        <div class="form-group">
            <label class="col-sm-4 control-label" for="block_id">广告位置</label>

            <div class="col-sm-4">
                <input id="block_id" name="block_id" type="text" value="<?=$form['block_id'] ?>" placeholder="广告位置"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="title">广告标题</label>

            <div class="col-sm-4">
                <input id="title" name="title" type="text" value="<?= $form['title'] ?>" placeholder="广告标题"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">图片链接：</label>
            <form name="image_form_pic_url" id="image_form_pic_url" action="?r=api/upload-single/index" method="post"
                  enctype="multipart/form-data" target="imageFrame">
                <input type="hidden" name="form_name" value="image_form_pic_url">
                <div class="col-sm-4">
                    <input value="" name="pic_url" class="imgPath form-control" type="text" id="pic_url">
                </div>
                <button type="button" class="btnImg btn btn-success">浏览</button>
                <input name="submitImg" id="submitImg" class="submitImg" style="display:none" type="file"
                       accept=".jpg,.png,.gif,.jpeg">
                <iframe width="0" height="0" id="imageFrame" name="imageFrame" frameborder="0" scrolling="no"></iframe>
            </form>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="link_address">广告地址</label>
            <div class="col-sm-4">
                <input id="link_address" name="link_address" type="text" value="<?= $form['link_address'] ?>"
                       placeholder="广告地址" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4">开始时间：</label>
            <div class="col-sm-4">
                <input placeholder="开始时间" class="form-control date-range-start_time date-ico table-date" name="start_time"
                       id="start_time" type="text" value="<?php if(!empty($form['start_time'])){echo $form['start_time'];}?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">结束时间：</label>
            <div class="col-sm-4">
                <input placeholder="结束时间" class="form-control date-range-end_time date-ico table-date" name="end_time"
                       id="end_time" type="text" value="<?= $form['end_time'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="listorder">排序</label>
            <div class="col-sm-4">
                <input id="listorder" name="listorder" type="text" value="<?= $form['listorder'] ?>" placeholder="排序"
                       class="form-control input-md">
            </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-sm-4 control-label" for="status">状态</label>

            <div class="col-sm-4">
                <select id="status" name="status" class="form-control">
                    <option value="">请选择</option>
                    <?php
                    foreach ($config_status as $k => $vo) {
                        ?>
                        <option value="<?= $vo['id'] ?>" <?php if ($vo['id'] == $form['status']) {
                            echo "selected";
                        }?>><?=$vo['name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-sm-4 control-label" for="is_mobile">m版</label>
            <div class="col-sm-4">
                <select id="is_mobile" name="is_mobile" class="form-control">
                    <option value="">请选择</option>
                    <?php
                    foreach ($config_is_mobile as $k => $vo) {
                        ?>
                        <option value="<?= $vo['id'] ?>" <?php if ($vo['id'] == $form['is_mobile']) {
                            echo "selected";
                        }?>><?=$vo['name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>
</div>