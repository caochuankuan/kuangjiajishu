//原生js：window.onload = function(){}
//jquery:
$(function(){
    var i=0;
    var box_aa = document.getElementsByClassName("aa")[0];
    console.log(box_aa);
    box_aa.onclick = function(){
        if(i++%2==0){
            box_aa.style = "background-color:green";
        }else{
            box_aa.style = "background-color:gray";
        }
    }
    
    var box_bb = document.getElementById("bb");
    box_bb.className = "bb";
    
    var box_cc = document.querySelectorAll(".cc")[0];
    console.log(box_cc);
    box_cc.style = "background-color:pink";
    
    var col = 255;
    $(".cc").click(function(){
        if(col<=0){
            col = 255;
        }
        $(".cc").css({
            backgroundColor: "rgb("+col+",0,0)",
    })
    col -= 32;
    })
})