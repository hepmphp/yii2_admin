/**
 * Created with JetBrains PhpStorm.
 * User: ok_fish
 * Date: 18-1-10
 * Time: 下午5:13
 * To change this template use File | Settings | File Templates.
 */

var urls = {
    create_url:'?r=cms/ad/create',
    update_url:'?r=cms/ad/update',
    delete_url:'?r=cms/ad/delete'
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
                CmsAd:{
					id:body.find('#id').val(),
					block_id:body.find('#block_id').val(),
					title:body.find('#title').val(),
					pic_url:body.find('#pic_url').val(),
					link_address:body.find('#link_address').val(),
					addtime:body.find('#addtime').val(),
					start_time:body.find('#start_time').val(),
					end_time:body.find('#end_time').val(),
					listorder:body.find('#listorder').val(),
					status:body.find('#status').val(),
					is_mobile:body.find('#is_mobile').val()
                }
            };
            //todo生成js验证
            if(param.CmsAd.id){
                var url = urls.update_url+'&id='+param.CmsAd.id;
            }else{
                var url = urls.create_url
            }
            ajax_post(url,param);

        },btn2: function(index, layero){

        }
        // content:"{:U('Serverpolicy/add')}" //iframe的url
    });
}