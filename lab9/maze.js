/* CSE326 : Web Application Development
 * Lab 9 - Maze
 * 
 */
"use strict";

var loser = null;  // whether the user has hit a wall
var start= null;

// document.observe("keydown",function(){
// 	alert("dasd");
// });	
// document.observe("keydown", function(){
//     alert("준영 ㅄ ");
// });

window.onload = function() {
	var boundary = $$("div#maze div.boundary");
	var start = $("start");
	var end = $("end");
	start.onclick = startClick;
	for(var i=0; i<boundary.length; i++){
		boundary[i].onmouseover = overBoundary;
	}
	end.onmouseover = overEnd;
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
	if(start==true){
		var status = $("status");
		status.textContent = ("you lose");
		var boundary = $$("div#maze div.boundary");   //$$("") css를 불러오는 함수 배열로 저장해준다고 한다
		for(var i=0; i<boundary.length; i++){
			boundary[i].addClassName("youlose");
		}
		event.stop();
	}
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	start=true;
	var status = $("status");
	status.textContent = ("Click the \"S\" to begin.");
	var boundary = $$("div#maze div.boundary"); 
	for(var i=0; i<boundary.length; i++){
		boundary[i].removeClassName("youlose");
	}
	document.body.observe("mousemove", overBody);
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	var status = $("status");
	status.textContent = ("you win!");
	start = false;
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	if(event.element() == document.body&& start==true){
		overBoundary(event);
	}
}