/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 18-5-19
 * Time: 下午3:23
 * To change this template use File | Settings | File Templates.
 */


//图片上传成功
function onLoadSuccess(status,msg,data){
    console.log(layer);
    console.log(data);
    /*
     if(window.location.host.indexOf('192.168.71.21')!=-1){
     var STATIC_URL = 'http://192.168.71.21:10002/';
     }else if(data.indexOf('.apk')!=-1){
     var STATIC_URL = 'http://download.youxi53.com/game/android/';
     }else{
     var STATIC_URL = 'http://www.youxi53.com/';
     }*/
    if(status==0){
        var file_path = data.file_path;
        var form_name = data.form_name;
        var layer_index =   window.frames["J_iframe"].layer.index;
        window.frames["J_iframe"].layer.getChildFrame('body',layer_index).find('#'+form_name).find(".btnImg").val("上传成功");
        window.frames["J_iframe"].layer.getChildFrame('body',layer_index).find('#'+form_name).find(".imgPath").val(file_path);
    }else{
        alert(msg);
        //layer.getChildFrame('body', 1).find('#'+msg).find(".btnImg").val("上传失败");
    }
}