//cardm gambar
//get cardm
var cardgambar = document.getElementById('cardgambar');

//get button gambar
var  bgambar= document.getElementById('bgambar');
//get button closenama
var  span= document.getElementById('closegambar');

bgambar.onclick = function(){
    cardgambar.style.display ="block";
};

span.onclick = function(){
    cardgambar.style.display ="none";
};

window.onclick = function(event){
    if(event.target == cardgambar){
        cardgambar.style.display="none";
    };
};


//cardm Nama
//get cardm
var cardnama = document.getElementById('cardnama');

//get button nama
var  bnama= document.getElementById('bnama');
//get button closenama
var  span= document.getElementById('closenama');

bnama.onclick = function(){
    cardnama.style.display ="block";
};

span.onclick = function(){
    cardnama.style.display ="none";
};

window.onclick = function(event){
    if(event.target == cardnama){
        cardnama.style.display="none";
    };
};



//cardm Email
//get cardm
var cardemail = document.getElementById('cardemail');

//get button email
var  bemail= document.getElementById('bemail');
//get button closenama
var  span= document.getElementById('closeemail');

bemail.onclick = function(){
    cardemail.style.display ="block";
};

span.onclick = function(){
    cardemail.style.display ="none";
};

window.onclick = function(event){
    if(event.target == cardemail){
        cardemail.style.display="none";
    };
};

//cardm PAss
//get cardm
var cardpass = document.getElementById('cardpass');

//get button email
var  bpass= document.getElementById('bpass');
//get button closenama
var  span= document.getElementById('closepass');

bpass.onclick = function(){
    cardpass.style.display ="block";
};

span.onclick = function(){
    cardpass.style.display ="none";
};

window.onclick = function(event){
    if(event.target == cardpass){
        cardpass.style.display="none";
    };
};