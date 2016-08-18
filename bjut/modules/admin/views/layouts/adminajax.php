<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" />
   <link rel="stylesheet" href="./assets/editer/dist/summernote.css">
<title>Demo</title>   
</head>

<body>

<!-- 网站主要内容 -->

<?= $content ?>


<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
<script data-main="./assets/editer/src/js/app" data-editor-type="bs3" src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.9/require.min.js"></script>
<script>
$(document).ready(function(){ 
    $("#search").click(function(){ 
        $.ajax({ 
            type: "GET",    
            url: "http://localhost/Tools/ajax/serverjson2.php?number=" + $("#keyword").val(),
            dataType: "json",
            success: function(data) {
                if (data.success) { 
                    $("#searchResult").html(data.msg);
                } else {
                    $("#searchResult").html("出现错误：" + data.msg);
                }  
            },
            error: function(jqXHR){     
               alert("发生错误：" + jqXHR.status);  
            },     
        });
    });


    $("#upload").click(function(){ 
        updatedcontent = $('#summernote').summernote('code');
        console.log(updatedcontent);
        alert("内容：" + updatedcontent);  // 仅调试时用 
        console.log($('#summernote').summernote('onImageUpload'));  // 仅调试时用 

        $.ajax({ 
            type: "POST",   
            url: "index.php?r=admin/article/upload",
            data: {
                name: $("#staffName").val(), 
                number: $("#staffNumber").val(), 
                sex: $("#staffSex").val(), 
                job: $("#staffJob").val()
            },
            dataType: "json",
            success: function(data){
                if (data.success) { 
                    $("#createResult").html(data.msg);
                } else {
                    $("#createResult").html("出现错误：" + data.msg);
                }  
            },
            error: function(jqXHR){     
               alert("发生错误：" + jqXHR.status);  
            },     
        });

    })
    
    $("#save").click(function(){ 
        $.ajax({ 
            type: "POST",   
            url: "http://localhost/Tools/ajax/serverjson.php",
            data: {
                name: $("#staffName").val(), 
                number: $("#staffNumber").val(), 
                sex: $("#staffSex").val(), 
                job: $("#staffJob").val()
            },
            dataType: "json",
            success: function(data){
                if (data.success) { 
                    $("#createResult").html(data.msg);
                } else {
                    $("#createResult").html("出现错误：" + data.msg);
                }  
            },
            error: function(jqXHR){     
               alert("发生错误：" + jqXHR.status);  
            },     
        });
    });
});
</script>
</body>
</html>