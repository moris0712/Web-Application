window.onload = function(){};  =   document.observe("dom:loaded",function(){});

document.observe("keydown",function(){});

/*
keyup: 키보드에서 손을땟을때 실행
keydown: 키보드를 눌렀을때 실행, 키보드는 누르고있을때 한번만 실행
keypress: 키보드를 눌렀을때 실행, 키보드는 누르고있을때 계속 실행돔

setTimeout(function(), 5000);  5초후 function실행
setInterval(function(), 1000); 1초마다 function실행


setTimeout(multiply, 2000, 6, 7);

function multiply(a, b) {
    alert(a * b);
}
  요게되네

*/ 