// definition des constantes
// état du jeu
const CONFIGURING = 1;  // jeu dans l'état CONFIGURING : le joueur ajoute les bateaux
const PLAYING = 2;      // jeu dans l'état PLAYING : le joueur joue
const DONE = 3;         // jeu dans l'état DONE : le jeu est terminé

var state = CONFIGURING;    // variable contenant l'état du jeu, valeur initale est CONFIGURING (1)

var size = 2;               // (sqrt) nombre de cellules du grid (tableau 2x2)

var nrShips = 0;            // nombre de bateaux (cellules) créés par l'utilisateur

/**
 * génère l'HTML d'une cellule
 * @param {string} board : le type de board (me | other)
 * @param {int} x : position x
 * @param {int} y : position y
 * @returns {String} le code HTML de la cellule
 */
function makeCellHtml(board, x, y) {
    return "<div data-board='" + board + "' data-x='" + x + "' data-y='" + y + "' class='cell'></div>";
}

/**
 * génère l'HTML d'un board (tableau)
 * @param {string} board
 * @param {int} size
 * @returns {String} le code HTML du board
 */
function makeBoardHtml(board, size) {
    var content = "";
    for (var i = 0; i < size; i++) {    // boucle sur les lignes
        content += "<div>";
        for (var j = 0; j < size; j++) {    // boucle sur les colonnes
            content += makeCellHtml(board, i, j);
        }
        content += "</div>";
    }
    return content;
}

// crée le board 'other'
document.getElementById("other").innerHTML = makeBoardHtml('other', size);
// crée le board 'me'
document.getElementById("me").innerHTML = makeBoardHtml('me', size);
// récupère la liste des cellules (du jeu)
var cellList = document.getElementsByClassName('cell');
// demande à l'engin Javascript (le brower) d'exécuter la fonction 'cellClicked' 
// lorsqu'une cellule est cliquée
// (quand je clique sur une cellule, la fonction 'cellClicked' est exécutée
for(var i=0; i < cellList.length; i++) {    // boucle sur les cellules
    cellList[i].addEventListener('click', cellClicked);     // exécute la fonction 'cellClicked' quand la cellule cellList[i] est cliquée
}

/**
 * code (callBack) exécuté lorsqu'on clique une cellule
 * @param {event} ev
 * @returns {undefined} nothing
 */
function cellClicked(ev) {
    var board = ev.target.getAttribute('data-board');
    if(board === 'me') {
        meCellClicked(ev);
    } else {
        otherCellClicked(ev);
    }
}

/**
 * code à exécuter lorsque l'on clique une cellule du board 'me'
 * @param {type} ev
 * @returns {undefined}
 */
function meCellClicked(ev) {
    // configurer les bateau
    if(state === CONFIGURING && ev.target.style.backgroundColor !== "white") {
        nrShips++;
        ev.target.setAttribute('data-boat', true);
        ev.target.style.backgroundColor = "white";
    }
}

/**
 * code à exécuter lorsqu'une cellule du board 'other' est cliquée
 * @param {type} ev
 * @returns {undefined}
 */
function otherCellClicked(ev) {
    switch(state) {
        case CONFIGURING:
            initOtherBoard(nrShips);
            state = PLAYING;
            setStatus(state);
            fire(ev.target);    // tir de l'utilisateur
            pcFire();           // tir du PC
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

/**
 * tire sur une cellule
 * @param {type} cellEl
 * @returns {undefined}
 */
function fire(cellEl) {
    if(cellEl.getAttribute('data-boat')) {
        cellEl.style.backgroundColor = 'red';
    } else {
        cellEl.style.backgroundColor = 'gray';
    }
}

/**
 * sélectionne une cellule au hazard
 * @param {type} board
 * @returns {Element}
 */
function selectCell(board) {
        var x = Math.floor(Math.random() * size);
        var y = Math.floor(Math.random() * size);
        return document.querySelector('#' + board + ' div[data-x="' + x + '"][data-y="' + y + '"]');
}

/**
 * Le PC tire
 * @returns {undefined}
 */
function pcFire() {
    var cellEl = selectCell('me');
    fire(cellEl);
}

/**
 * Crée le board 'other' (essentiellement crée les bateaux dans le board 'other')
 * @param {type} nrShips
 * @returns {undefined}
 */
function initOtherBoard(nrShips) {
    var n = nrShips;
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

// récupère le texte qui affiche l'état du jeu
var stateElement = document.getElementById('state');

/**
 * modifie l'état du jeu (dans l'interface utilisateur)
 * @param {type} state
 * @returns {undefined}
 */
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