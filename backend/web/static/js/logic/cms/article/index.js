/**
 * Created with JetBrains PhpStorm.
 * User: ok_fish
 * Date: 18-1-10
 * Time: 下午5:13
 * To change this template use File | Settings | File Templates.
 */

var urls = {
    create_url:'?r=cms/article/create',
    update_url:'?r=cms/article/update',
    delete_url:'?r=cms/article/delete'
};

/***
 * 添加
 */
function add(){
    var url = urls.create_url;
    layer_form(url,1);
}
/**
 * 修改
 * @param id
 */
function edit(id) {
    var url = urls.update_url+"&id="+id;
    layer_form(url,2);
}

/***
 * * @param id
 */
function del(id) {
    layer.confirm('确定要删除?',{
            btn: ['确定','取消'], //按钮
            icon: 3,
            title:'提示'
        }, function(){
            ajax_post(urls.delete_url,{ids:id})
        },
        function(){

        }
    );
}

//表单
function layer_form(url,action){
    var content = url;
    var title = action==2?'修改':'添加';
    var btn =  action==2?['确认修改','取消']:['确认添加','取消'];
    layer.open({
        type: 2, //iframe
        area: ['500px', '560px'],
        title: title,
        btn: btn,
        shade: 0.3, //遮罩透明度
        content:content,
        yes: function(index, layero){
            var body = layer.getChildFrame('body', index);
            var param ={
                id:body.find('#id').val(),
                CmsArticle:{
					id:body.find('#id').val(),
					cate_id:body.find('#cate_id').val(),
					tag_id:body.find('#tag_id').val(),
					admin_id:body.find('#admin_id').val(),
					admin_username:body.find('#admin_username').val(),
					title:body.find('#title').val(),
					keywords:body.find('#keywords').val(),
					description:body.find('#description').val(),
					content:body.find('#content').val(),
					addtime:body.find('#addtime').val(),
					update_time:body.find('#update_time').val(),
					is_top:body.find('#is_top').val(),
					list_image_url:body.find('#list_image_url').val(),
					status:body.find('#status').val()
}
            };
            //todo生成js验证
            if(param.CmsArticle.id){
                var url = urls.update_url+'&id='+param.CmsArticle.id;
            }else{
                var url = urls.create_url
            }
            ajax_post(url,param);

        },btn2: function(index, layero){

        }
        // content:"{:U('Serverpolicy/add')}" //iframe的url
    });
}