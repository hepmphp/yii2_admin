/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 18-5-19
 * Time: 下午2:19
 * To change this template use File | Settings | File Templates.
 */

$('.btnImg').click(function(){
    $(this).siblings('.submitImg').click();
});
$('.submitImg').change(function(){
    $(this).siblings('.btnImg').val("上传中...");
    $(this).parent().submit();
});


//图片上传成功
function onLoadSuccess(status,msg,data){
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
        layer.getChildFrame('body', 1).find('#'+form_name).find(".btnImg").val("上传成功");
        layer.getChildFrame('body', 1).find('#'+form_name).find(".imgPath").val(file_path);
    }else{
        alert(msg);
        //layer.getChildFrame('body', 1).find('#'+msg).find(".btnImg").val("上传失败");
    }
}
var words = ['boat', 'dog', 'drink', 'elephant', 'fruit', 'London'];

$(document).ready(function(){
    $('#block_id').autocomplete({
        hints: words
    });
});
//$(document).ready(function(){
//
//        $("#block_id").autocomplete({
//        source: function( request, response ) {
//            console.log("autocomplete...");
//            $.ajax( {
//                url: "?r=cms/cms-ad-block/auto-compelete-search",
//                dataType: "json",
//                data: {
//                    term: request.term
//                },
//                success: function( data ) {
//                    response( data.data );
//                }
//            } );
//        },
//        minLength:1,
//            select: function( event, ui ) {
//            $('#block_id').val(ui.item.id);
//            console.log(ui.item);
//            //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
//        }
//    });
//
//});










