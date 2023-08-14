<?php
    header("Content-type:image/png");
    $im = imagecreatefrompng("pic1.png");
    imagepng($im);
?>