
var num=7;
function addrow(){
var norows=document.getElementById("gpatable").rows.length;
if (norows>=0 && norows<14) {
		num=num+1;
		var table = document.getElementById("gpatable");
		var row = table.insertRow(norows);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		cell1.innerHTML = "<tr><strong><th scope=\"row\">"+norows+"</th></strong>";
		cell2.innerHTML = "<td class=\"td\"><input type=\"text\" name=\"subname\" class=\"form-control col-md-8\"></td>";
		cell3.innerHTML = " <td class=\"td\"><select id=\"select_credits"+num+"\" class=\"custom-select\"><option selected value=\"0\">-</option><option value=\"1\">1.00</option><option value=\"2\">2.00<option value=\"3\">3.00</option><option value=\"4\">4.00</option></select>";
		cell4.innerHTML = " <td class=\"td\"> <select id=\"select_grades"+num+"\" class=\"custom-select\"><option selected value=\"0\">-</option><option value=\"4\">A+</option><option value=\"3.75\">A</option><option value=\"3.5\">A-</option><option value=\"3.25\">B+</option><option value=\"3\">B</option><option value=\"2.75\">B-</option><option value=\"2.5\">C+</option><option value=\"2.25\">C</option><option value=\"2\">C-</option><option value=\"0\">F</option></td> ";
	}
}

function subrow(){
	var norows=document.getElementById("gpatable").rows.length;
	if (norows>4){
   		document.getElementById("gpatable").deleteRow(norows-1);
   }
}



