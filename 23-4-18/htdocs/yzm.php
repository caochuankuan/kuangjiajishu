<?php
    $data = "709394";
    if($data == "709394"){
        huatu("abc.png");
        echo '{"data":"abc.png"}';
    }else{
        echo '{"data":"0"}';
    }
    
    function huatu(){
        //header("Content-type:image/png");
        $width=200;
        $height=60;
        $image1=imagecreatetruecolor($width,$height);
        $colorRed=imagecolorallocate($image1,255,0,0);
        $colorGreen=imagecolorallocate($image1,0,255,0);
        $colorBule=imagecolorallocate($image1,0,0,255);
        $colorBlack=imagecolorallocate($image1,0,0,0);
        $colorBackground=imagecolorallocate($image1,rand(200,255),rand(200,255),rand(200,255));
        imagefill($image1,0,0,$colorBackground);
        imagerectangle($image1,0,0,$width-1,$height-1,$colorBlack);
        for($i=0;$i<100;$i++){
            $colorPixel=imagecolorallocate($image1,rand(0,100),rand(0,100),rand(0,100));
            imagesetpixel($image1,rand(0,$width-1),rand(0,$height-1),$colorPixel);
        }
        for($i=0;$i<6;$i++){
            $colorLine=imagecolorallocate($image1,rand(0,100),rand(0,100),rand(0,100));
            imageline($image1,rand(0,$width/3),rand(0,$height),rand(($width*2)/3,$width-1),rand(0,$height-1),$colorLine);
        }
        imagepng($image1,"abc.png");
        imagedestroy($image1);
    }
?>