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
            // 服务器传来的当前时间
            // 服务器传来的结束时间
            <?php
                date_default_timezone_set("PRC");
                echo "var serverTime = ".time().";";
                echo "var endTime = ".strtotime("2023-4-14 14:11:00").";";
            ?>
            // 本地把这两个时间减出时间差
            var deltaTime = (endTime - serverTime)*1000;
            console.log(deltaTime);
            var ctime = new Date(deltaTime);
            // 用时间差算出剩余时分秒
            $(".hour").html(ctime.getHours()-8);
            $(".min").html(ctime.getMinutes());
            $(".sec").html(ctime.getSeconds());
            // 每个1秒刷新时分秒
            var aa = window.setInterval(function(){
                deltaTime = deltaTime - 1000;
                console.log(deltaTime);
                ctime = new Date(deltaTime);
                $(".hour").html(ctime.getHours()-8);
                $(".min").html(ctime.getMinutes());
                $(".sec").html(ctime.getSeconds());
                if(deltaTime<=0){
                    window.clearInterval(aa);
                    $(".in1").removeAttr("disabled");
                }
            },1000);
        })
    </script>
</head>
<body>

    <?php
        echo "<img src='pic1.png'>";
    ?>
    <br>
    <span class="hour"></span>小时
    <span class="min"></span>分钟
    <span class="sec"></span>秒
    <br>
    <input class="in1" type="button" value="立即抢购" disabled>
</body>
</html>