<!DOCTYPE html>
<html>
<head>
    <title>验证码</title>
    <script src="jquery-3.6.0.js"></script>
    <script>
        $(function(){
            $('.btY').click(function(){
                $.post("yanzhengma.php",function(data){
                    $(".imgY").attr('src', 'yanzhengma.php');
                },"html")
            });
        })
    </script>
</head>
<body>
    <input type="text">
    <img src="yanzhengma.php" class="imgY">
    <button class="btY">刷新验证码</button>
    <button>提交</button>
</body>
</html>
