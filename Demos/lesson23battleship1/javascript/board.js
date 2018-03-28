var content = "";
for (var i = 0; i < 10; i++) {
    content += "<div>";
    for (var j = 0; j < 10; j++) {
        content += "<div class='cell'></div>";
    }
    content += "</div>";
}
document.getElementById("other").innerHTML = content;
document.getElementById("me").innerHTML = content;
var cellList = document.getElementsByClassName('cell');
for(var i=0; i < cellList.length; i++) {
    cellList[i].addEventListener('click', cellClicked);
}

function cellClicked(ev) {
    ev.target.style.backgroundColor = "white";
}
