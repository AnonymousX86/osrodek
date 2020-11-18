function maxkm()
{

var wiersze=document.getElementsByClassName("obiekt");    
var poletxt=Number(document.getElementById("maxd").value);   

for(let i=0; i<wiersze.length; i++)    
{
let wiersz=wiersze[i].dataset.distance;
console.log(wiersz);

if(wiersz>poletxt)    
{
wiersze[i].style.display="none";
}
    
}
    
    
}