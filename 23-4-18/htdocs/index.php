<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>211曹传宽03</title>
    <script src="jquery-3.6.0.js"></script>
    <script>
        $(function(){
            $(".btY").click(function(){
                $.ajaxSettings.async = false;
                $.post("yzm.php",{"data":"709394"},function(iiii){
                    $(".imgY").attr("src",iiii.data);
                },"json");
                $.ajaxSettings.async = true;
            });
        });
    </script>
</head>
<body>
    <input type="text">
    <img class="imgY" src="yzm2.php" alt="">
    <button class="btY">刷新验证码</button>
    <button>提交</button>
</body>
</html>