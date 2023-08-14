
    <?php
        //echo $_SERVER["QUERY_STRING"];
        session_start();
        if($_POST["value"] == $_SESSION["YZcode"]){
            echo  "注册成功";
        } else {
            echo "验证码错误";
        }
    ?>
