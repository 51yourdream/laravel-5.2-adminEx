/**
 * Created by Administrator on 2016/3/10.
 */
$("div[role='layer']").click(function(){
    var type,title,shadeClose,shade,w,h,content;
    type = parseFloat($(this).attr('type')) ? parseFloat($(this).attr('type')) : 0;
    title = $(this).attr('title') ? $(this).attr('title') : false;
    shadeClose = parseFloat($(this).attr('shadeClose')) ? true : false;
    shade = parseFloat($(this).attr('shade')) ? parseFloat($(this).attr('shade')) : 0;
    w = $(this).attr('with') ? $(this).attr('with') : '600px';
    h = $(this).attr('height') ? $(this).attr('height') : '400px';
    content = $(this).attr('content') ? $(this).attr('content') : '';
    layer.open({
        type: type,
        title: title,
        shadeClose: shadeClose,
        shade: shade,
        area: [w,h],
        content: content
    });
});