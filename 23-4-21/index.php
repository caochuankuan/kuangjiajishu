<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.6.0.js"></script>
    <script >
        $(function(){
            function getcode() {
                $(".yzm").attr("src","yanzhengma.php?num="+Date.now());
            }
            getcode();
            
            $(".yzm").click(function(){
                getcode();
            });

            $(".submit").click(function () {
                $.post("login.php",{"value":$(".tx1").val()},function (data) {
                    alert(data);
                });
            })
        });
    </script>
</head>
<body>
    <input class="tx1" type="text">
    <img class="yzm" alt="">
    <button class="submit">提交</button>
</body>
</html>