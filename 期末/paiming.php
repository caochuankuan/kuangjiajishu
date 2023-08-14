<?php
    header('Content-type:text/html;charset=utf-8');

    
    $link=@mysqli_connect('localhost','root','','',3306);
    
    mysqli_set_charset($link,'utf8');
    
    mysqli_select_db($link,"mlgm");


    if($_POST["mode"] == "look") {
        $query1 = 'select * from score where score>0 order by score asc limit 8';
        $result1 = mysqli_query($link,$query1);
        $tmp = [];
        for ($i=0;$i<mysqli_num_rows($result1);$i++){
            $tmp[$i] = mysqli_fetch_assoc($result1);
        }
        echo json_encode($tmp);
        
    } else if ($_POST["mode"] == "up") {
        // 登记成绩模式，以ip为标志，记录成绩，每个ip一条记录

        $query1 = 'select addr from score where addr="'.$_SERVER["REMOTE_ADDR"].'"';
        $result = mysqli_query($link,$query1);

        //如果找到ip记录存在，修改记录
        if(mysqli_num_rows($result) >= 1) {
            if($_POST["player"] == ""){
                echo "更新失败,名字为空";
            } else {
                $query2 = 'update score set name="'.$_POST["player"].'",score="'.$_POST["score"].'" where addr="'.$_SERVER["REMOTE_ADDR"].'"';
                //$query2 = "update score set name='aaa',score='888' where addr='ccc' ";
                if(mysqli_query($link,$query2) != null) {
                    echo "更新了本ip分数";
                }else {
                    echo "写不进数据库";
                }
            }
            
            
        } else {
            //如果ip记录不存在，插入新记录
            if($_POST["player"] == ""){
                echo "注册失败,名字为空";
            } else {
                // $query2 = 'insert into score(name,score,addr) values("'.$_POST["player"].'","'.$_POST["score"].'","'.$_SERVER["REMOTE_ADDR"].'")';
                $query2 = "insert into score(name,score,addr) values('".$_POST["player"]."','".$_POST["score"]."','".$_SERVER["REMOTE_ADDR"]."')";
                if(mysqli_query($link,$query2) != null) {
                    echo "新注册成功";
                }else {
                    echo "写不进数据库";
                }
                
            }
            
        }
    }
    

    mysqli_close($link);