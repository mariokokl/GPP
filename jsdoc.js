function showBut() {
   document.getElementById('pokTeh').style.display = "block";
   document.getElementById('pokaz').style.display = "none";
}


function showBut2() {
   document.getElementById('pokPov').style.display = "block";
   document.getElementById('povijest').style.display = "none";
}

function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})



