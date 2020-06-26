"use strict";

//make a summary of the table
$('#povzetekBtn').on("click", function () {
    var table = document.getElementById('stranka-table');
    let cena = 0;
    let razdalja = 0;
    
    for (var r = 1, n = table.rows.length; r < n; r++) {
        cena = cena + Number(table.rows[r].cells[6].innerHTML);    
        razdalja = razdalja + Number(table.rows[r].cells[5].innerHTML); 
    }

   alert("Imeli ste " + (table.rows.length -1) +" strank. " + "Prevozili ste " + razdalja +"km. Zaslužili ste " + cena.toFixed(2) +"€.");
});


//make a summary of the table
$('#povzetekBtn2').on("click", function () {
    var table = document.getElementById('stranka-table');
    let cena = 0;
    let razdalja = 0;
    
    for (var r = 1, n = table.rows.length; r < n; r++) {
        cena = cena + Number(table.rows[r].cells[6].innerHTML);    
        razdalja = razdalja + Number(table.rows[r].cells[5].innerHTML); 
    }

   alert("Imeli ste " + (table.rows.length -1) +" strank. " + "Prevozili ste " + razdalja +"km. Zaslužili ste " + cena.toFixed(2) +"€.");
});


