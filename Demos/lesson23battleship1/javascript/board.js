const CONFIGURING = 1;
const PLAYING = 2;
const DONE = 3;
var state = CONFIGURING;
var size = 10;
var nrCells = 0;
function makeCellDiff(board, x, y) {
    return "<div data-board='" + board + "' data-x='" + x + "' data-y='" + y + "' class='cell'></div>";
}
function makeContent(board, size) {
    var content = "";
    for (var i = 0; i < 10; i++) {
        content += "<div>";
        for (var j = 0; j < 10; j++) {
            content += makeCellDiff(board, i, j);
        }
        content += "</div>";
    }
    return content;
}
document.getElementById("other").innerHTML = makeContent('other', size);
document.getElementById("me").innerHTML = makeContent('me', size);
var cellList = document.getElementsByClassName('cell');
for(var i=0; i < cellList.length; i++) {
    cellList[i].addEventListener('click', cellClicked);
}

function cellClicked(ev) {
    var board = ev.target.getAttribute('data-board');
    if(board === 'me') {
        meCellClicked(ev);
    } else {
        otherCellClicked(ev);
    }
}

function meCellClicked(ev) {
    if(state === CONFIGURING && ev.target.style.backgroundColor !== "white") {
        nrCells++;
        ev.target.setAttribute('data-boat', true);
        ev.target.style.backgroundColor = "white";
    }
}

function otherCellClicked(ev) {
    switch(state) {
        case CONFIGURING:
            initOtherBoard(nrCells);
            state = PLAYING;
            setStatus(state);
            fire(ev.target);
            pcFire();
            break;
        case PLAYING:
            fire(ev.target);
            pcFire();
            break;
        case DONE:
            break;
        default:
            console.log("default of switch " + state);
    }
}

function fire(cellEl) {
    if(cellEl.getAttribute('data-boat')) {
        cellEl.style.backgroundColor = 'red';
    } else {
        cellEl.style.backgroundColor = 'gray';
    }
}

function selectCell(board) {
        var x = Math.floor(Math.random() * size);
        var y = Math.floor(Math.random() * size);
        return document.querySelector('#' + board + ' div[data-x="' + x + '"][data-y="' + y + '"]');
}

function pcFire() {
    var cellEl = selectCell('me');
    fire(cellEl);
}

function initOtherBoard(nrCells) {
    var n = nrCells;
    var antiHangup = 1000;
    while(n > 0 && antiHangup-- > 0) {
        var cellEl = selectCell('other');
        if(cellEl === null) {
            throw new Error('cell not found x=' + cellEl.getAttribute('data-x') + ' - y=' + cellEl.getAttribute('data-y'));;
        }
        if(!cellEl.getAttribute('data-boat')) {
            cellEl.setAttribute('data-boat', true);
            console.log('Add a boat at ' + cellEl.getAttribute('data-x') + "," + cellEl.getAttribute('data-y'));
            n--;
        }
    }
    if(antiHangup === 0) {
        throw new Error('No end loop');
    }
}

var stateElement = document.getElementById('state');
function setStatus(state) {
    switch(state) {
        case CONFIGURING:
            stateElement.innerHTML = "CONFIGURING";
            break;
        case PLAYING:
            stateElement.innerHTML = "PLAYING";
            break;
        case DONE:
            stateElement.innerHTML = "DONE";
            break;
        default:
            stateElement.innerHTML = "error unknown state " + state;
    }
}