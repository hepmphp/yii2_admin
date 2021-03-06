<?php
use backend\assets\AppCurdAsset;
AppCurdAsset::register($this);
AppCurdAsset::addCss($this,"/static/js/umeditor/themes/default/css/umeditor.css");
AppCurdAsset::addCss($this,"/static/js/select2/css/select2.min.css");
AppCurdAsset::addScript($this,"/static/js/logic/lib/image_upload.js");
AppCurdAsset::addScript($this,"/static/js/umeditor/lang/zh-cn/zh-cn.js");
AppCurdAsset::addScriptHead($this,"/static/js/umeditor/umeditor.config.js");
AppCurdAsset::addScriptHead($this,"/static/js/umeditor/umeditor.js");
AppCurdAsset::addScript($this,"/static/js/select2/js/select2.full.min.js");

?>
<div class="container col-sm-12" style="margin-top: 10px;">
    <div class="form-horizontal">
        <input type="hidden" id="id" value="<?=$form['id']?>">
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-sm-1 control-label" for="cate_id">分类</label>
            <div class="col-sm-4">
                <select id="cate_id" name="cate_id" class="form-control">
                    <option value="">请选择</option>
                    <?=$select_tree?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label" for="tag_ids">标签id  </label>
            <div class="col-sm-4">
                <select class="form-control tag" style="width:500px"  id="tag_ids" name="tag_ids[]" multiple="multiple">
                    <?php foreach($config_tag_id as $tag_id){?>
                        <option value="<?=$tag_id['id']?>"><?=$tag_id['name']?></option>
                    <?php }?>
                </select>
                <script>
                    var tag_ids_str = "<?=$form['tag_ids']?>";
                 
                </script>

<!--                <input id="tag_ids" name="tag_ids" type="text" value="--><?//=$form['tag_ids']?><!--" placeholder="标签id  " class="form-control input-md">-->
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label" for="title">标题</label>
            <div class="col-sm-4">
                <input id="title" name="title" type="text" value="<?=$form['title']?>" placeholder="标题" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label" for="keywords">关键词</label>
            <div class="col-sm-4">
                <input id="keywords" name="keywords" type="text" value="<?=$form['keywords']?>" placeholder="关键词" class="form-control input-md">
            </div>
        </div>
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-sm-1 control-label" for="description">描述</label>
            <div class="col-sm-4">
                <textarea class="form-control" id="description" name="description">default text</textarea>
            </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-sm-1 control-label" for="is_top">是否置顶</label>
            <div class="col-sm-4">
                <select id="is_top" name="is_top" class="form-control">
                    <option value="">请选择</option>
                    <?php
                    foreach($config_is_top as $k=>$vo){
                        ?>
                        <option value="<?=$vo['id']?>" <?php if($vo['id']==$form['is_top'] && is_numeric($vo['id'])){ echo "selected";}?>><?=$vo['name']?></option>
                    <?php }?>
                </select>
            </div>

        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">列表显示图片：</label>
            <form name="image_form_list_image_url" id="image_form_list_image_url" action="?r=api/upload-single/index" method="post" enctype="multipart/form-data" target="imageFrame">
                <input type="hidden" name="form_name" value="image_form_list_image_url">
                <div class="col-sm-4">
                    <input value="<?=$form['list_image_url']?>" name="list_image_url" class="imgPath form-control" type="text" id="list_image_url">
                </div>
                <button type="button" class="btnImg btn btn-success">浏览</button>
                <input name="submitImg" id="submitImg" class="submitImg" style="display:none" type="file" accept=".jpg,.png,.gif,.jpeg">
                <iframe width="0" height="0" id="imageFrame" name="imageFrame" frameborder="0" scrolling="no"></iframe>
            </form>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-sm-1 control-label" for="status">状态</label>
            <div class="col-sm-4">
                <select id="status" name="status" class="form-control">
                    <option value="">请选择</option>
                    <?php
                    foreach($config_status as $k=>$vo){
                        ?>
                        <option value="<?=$vo['id']?>" <?php if($vo['id']==$form['status'] && is_numeric($vo['id'])){ echo "selected";}?>><?=$vo['name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">内容：</label>
            <div class="col-sm-11">
                <script   type="text/plain" name="content" id="content" value="{$form['field']}" style="width:100%;height: 400px;"></script>
                <style>
                        /*设置按扭样式*/
                    .edui-icon-test{
                        background-position: -380px 0;
                    }
                </style>
                <script>
                    var um = UM.getEditor('content',{
                        toolbar: [
                            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
                            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
                            '| justifyleft justifycenter justifyright justifyjustify |',
                            'link unlink | emotion image video  | map',
                            '| horizontal print preview fullscreen', 'drafts', 'formula','test'
                        ]
                    });
                    um.ready(function() {
                        //设置编辑器的内容
                        um.setContent("<?=addslashes($form['content'])?>");
                        $('.edui-container').width("900px");
                        $('.edui-body-container').width("900px");
                    });
                    UM.registerUI('test',
                        function(name) {
                            var me = this;
                            var $btn = $.eduibutton({
                                icon : name,
                                click : function(){

                                    layer.open({
                                        type: 2, //iframe
                                        area: ['900px', '560px'],
                                        title: '选择图片',
                                        btn: ['确认','取消'],
                                        shade: 0.3, //遮罩透明度
                                        content:'http://yiiadmin.local/?r=cms/attach/index&iframe=1',
                                        yes: function(index, layero){
                                            var body = layer.getChildFrame('body', index);
                                            var image_list = '<p><img src="[src]" _src="[src]" ></p>'+"\n";
                                            var html_image_list = '';
                                            body.find('.image_border').each(function(){
                                                html_image_list = html_image_list+image_list.replace('[src]',$(this).attr('src')).replace('[_src]',$(this).attr('_src'));
                                                //attach_urls.push($(this).attr('src'));
                                            });

                                            $('#content').append(html_image_list);
                                            layero.close();
                                            console.log("checked...");
//                                            ajax_post(url,param);
                                        },btn2: function(index, layero){

                                        }
                                        // content:"{:U('Serverpolicy/add')}" //iframe的url
                                    });
                                },
                                title: '相册插入图片'
                            });

                            this.addListener('selectionchange',function(){
                                //切换为不可编辑时，把自己变灰
                                var state = this.queryCommandState(name);
                                $btn.edui().disabled(state == -1).active(state == 1)
                            });
                            return $btn;
                        }
                    );
                </script>
            </div>
        </div>




    </div>
</div>