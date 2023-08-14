<?php
    header('Content-type:text/html;charset=utf-8');

    
    $link=@mysqli_connect('localhost','root','','',3306);
    
    mysqli_set_charset($link,'utf8');
    
    mysqli_select_db($link,"fly_bird");


    if($_POST["mode"] == "load") {
        $query1 = 'select * from score order by score DESC limit 10';
        $result1 = mysqli_query($link,$query1);
        $tmp = [];
        for ($i=0;$i<mysqli_num_rows($result1);$i++){
            $tmp[$i] = mysqli_fetch_assoc($result1);
        }
        echo json_encode($tmp);
        
    } else if ($_POST["mode"] == "up") {

        // echo $_SERVER['REMOTE_ADDR'];

        $query1 = 'select addr from score where addr="'.$_SERVER["REMOTE_ADDR"].'"';
        $result = mysqli_query($link,$query1);

        if(mysqli_num_rows($result) >= 1) {
            if($_POST["player"] == ""){
                echo "注册失败,名字为空";
            } else {
                $query2 = "update score set name='".$_POST["player"]."',score='".$_POST["score"]."' where addr='".$_SERVER["REMOTE_ADDR"]."'";
                if(mysqli_query($link,$query2) != null) {
                    echo "更新了本ip分数";
                }else {
                    echo "写不进数据库";
                }
            }
            
        } else {
            //插入新记录
            if($_POST["player"] == ""){
                echo "注册失败,名字为空";
            } else {
                $query2 = "insert into score(name,score,addr) values('".$_POST["player"]."','".$_POST["score"]."','".$_SERVER["REMOTE_ADDR"]."');";
                if(mysqli_query($link,$query2) != null) {
                    echo "新注册成功";
                }else {
                    echo "写不进数据库";
                }
                
            }
            
        }
    }
    

    mysqli_close($link);