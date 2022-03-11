let table = document.getElementById('targetTable');
let newRow = table.insertRow();

let newCell = newRow.insertCell();
let newText = document.createTextNode('山田');
newCell.appendChild(newText);

newCell = newRow.insertCell();
newText = document.createTextNode(18);
newCell.appendChild(newText);