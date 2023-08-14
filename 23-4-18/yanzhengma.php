<?php
    header("Content-type: image/png");
    // 面板宽高
    $width = 200;
    $height = 60;
    // 设置面板
    $image1 = imagecreatetruecolor($width,$height);
    // 设置背景颜色
    $colorRed = imagecolorallocate($image1,255,0,0);
    $colorGreen = imagecolorallocate($image1,0,255,0);
    $colorBlue = imagecolorallocate($image1,0,0,255);
    $colorBlack = imagecolorallocate($image1,0,0,0);
    $colorBackground = imagecolorallocate($image1,rand(200,255),rand(200,255),rand(200,255));
    // 填充背景颜色
    imagefill($image1,0,0,$colorBackground);
    // 设置图片外框
    imagerectangle($image1,0,0,$width-1,$height-1,$colorBlack);
    // 随机100个干扰点
    for($i=0;$i<100;$i++){
        $colorPixel = imagecolorallocate($image1,rand(0,100),rand(0,100),rand(0,100));
        imagesetPixel($image1,rand(0,$width-1),rand(0,$height-1),$colorPixel);
    }
    // 随机干扰线
    for($i=0;$i<3;$i++){
        $colorLine = imagecolorallocate($image1,rand(0,100),rand(0,100),rand(0,100));
        imageline($image1,rand(0,$width/3),rand(0,$height),rand(($width*2)/3,$width-1),rand(0,$height-1),$colorLine);
    }
    // 输出图片
    imagepng($image1);
    // 关闭图片编辑器
    imagedestroy($image1);


?>