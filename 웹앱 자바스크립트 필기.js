NAN = not a number

1 + "2" = "12"

"6" * "4" = "24"
"6" + "4" = "64"

charAt은 index로 주어진 값에 해당하는 문자를 리턴

var stringName = 'coding everybody';
alert(stringName.charAt(0)); // c
alert(stringName.charAt(stringName.length-1)); // y
alert(stringName.charAt(1000) == ''); // true


parseInt(value, base)
       // 값   ,  진수
parseInt("0123",10) = 123
parseInt("0123") = 83 // string이 0 으로시작하면  8진수로 간주

most logical operators automatically convert types:
5 < "7" is true
42 == 42.0 is true
"5.0" == 5 is true

=== and !== are strict equality tests; checks both type and value
"5.0" === 5 is false  


var newGallery = 1;
var current = newGallery || 'false';
alert(current); // Alert returns 1

var newGallery = 0;
var current = newGallery || 'false';
alert(current); // Alert returns false


array.shift("아이템") //배열의 첫번째 아이템 제거
array.unshift("아이템") // 배열의 첫번째에 아이템 추가

var s = "the quick brown fox";
var a = s.split(" ");          // ["the", "quick", "brown", "fox"]
a.reverse();                   // ["fox", "brown", "quick", "the"]
s = a.join("!");               // "fox!brown!quick!the"


<img id="main" src="aaa.png">
var maindv = document.getElementById("main");
maindiv.src = "lll.png"

<input id="aa" value="값"/>  //여기엔 value를 사용
<div id="ss">  값 </div>  여기엔 innerHtml을 사용
///
var div = document.getElementById("ss")
var input = document.getElementById("aa")
div.innerHTML =
input.valu =

clickMe.color = "red";  (x)
clickMe.style.color = "red"; (o)

function example() {
    for (var i = 0; i < arguments.length; i++) {
        alert(arguments[i]);
    }
}
example("how", "are", "you");

 