var modal = document.getElementById('add-sched');
var btn = document.getElementById("addsched");
var span= document.getElementsByClassName("close")[0];
var cancel= document.getElementsByClassName("cancel")[0];


btn.onclick = function() {
   modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
cancel.onclick = function() {
    modal.style.display = "none";
}




var modal1 = document.getElementById('view-par');
var btn1 = document.getElementById("viewpar");
var span1= document.getElementsByClassName("close1")[0];

btn1.onclick = function() {
   modal1.style.display = "block";
}
span1.onclick = function() {
    modal1.style.display = "none";
}

/** View Schedule -Add par**/
var modalpar1 = document.getElementById('add-par');
var btnpar1 = document.getElementById("AddPar");
var spanpar1 = document.getElementsByClassName("closepar")[0];
var n = document.getElementsByClassName("cancelpar")[0];

btn2.onclick = function() {
   modal2.style.display = "block";
}
span2.onclick = function() {
    modal2.style.display = "none";
}

nobutton2.onclick = function() {
    modal2.style.display = "none";
}








var modal2 = document.getElementById('del-sched');
var btn2 = document.getElementById("delsched");
var span2 = document.getElementsByClassName("close2")[0];
var nobutton2 = document.getElementsByClassName("nodelete")[0];

btn2.onclick = function() {
   modal2.style.display = "block";
}
span2.onclick = function() {
    modal2.style.display = "none";
}

nobutton2.onclick = function() {
    modal2.style.display = "none";
}













