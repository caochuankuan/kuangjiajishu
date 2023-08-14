<?php

    $YZarray = [1,2,3,4,5,6,7,8,9,0];
    $YZcode = "";
    for($i=0;$i<4;$i++){
        $YZcode.=$YZarray[rand(0,count($YZarray)-1)];
    }
    // session_id();
    // session_start();
    // $_SESSION[$YZcode]= $YZcode;

    //保存验证码的文本到session
    preg_match("/\d{13}/",$_SERVER["QUERY_STRING"],$array);
    session_id($array[0]);
    session_start();
    $_SESSION["YZcode"]= $YZcode;

    // var_dump($_POST);
    header("Content-type:image/png");
    //画板宽高
    $width = 160;
    $height = 60;
    //新建画板
    $img = imagecreatetruecolor($width,$height);
    //配置颜色
    $colorBg = imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
    $colorBorder = imagecolorallocate($img,rand(0,60),rand(0,60),rand(0,60));
    $colorFont = imagecolorallocate($img,rand(0,100),rand(0,100),rand(0,100));
    //填充背景色
    imagefill($img,0,0,$colorBg);
    //画边框
    imagerectangle($img,0,0,$width-1,$height-1,$colorBorder);
    //生成100个干扰点
    for($i=0;$i<100;$i++){
        $colorPixel = imagecolorallocate($img,rand(0,100),rand(0,100),rand(0,100));
        imagesetpixel($img,rand(1,$width-2),rand(1,$height-2),$colorPixel);
    }
    //生成5条干扰线
    for($i=0;$i<5;$i++){
        $colorLine = imagecolorallocate($img,rand(0,100),rand(0,100),rand(0,100));
        imageline($img,rand(0,$width/3),rand(0,$height),rand(2*$width/3,$width),rand(0,$height),$colorLine);
    }
    //生成文本
    imagettftext($img,rand(35,45),rand(-10,10),rand(5,25),rand(40,60),$colorFont,"STCAIYUN.TTF",$YZcode);
    //输出图像，另存为图片文件
    imagepng($img);
    //关闭画图程序
    imagedestroy($img);



