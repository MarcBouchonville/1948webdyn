/**
 * Javascript pour gérer le jeu
 * actuellement, c'est seulement le squelette du jeu
 *  Il crée le jeu et écrit dans la console lorsqu'on clique sur une cellule
 * J'ai écrit le code dans l'ordre des appels
 * J'ai écrit une fonction par tâche, c'est une bonne pratique car cela rend le code plus testable et maintenable
 */

const GAME_STATE_CONFIGURING = 1;
const GAME_STATE_PLAYING = 2;
const GAME_STATE_DONE = 3;
var state = GAME_STATE_CONFIGURING;

const CELL_BOAT_ME_HEALTHY = 'white';
const CELL_BOAT_OTHER_HEALTHY = 'lightgrey';    // '#39CCCC';
const CELL_BOAT_SUNK = 'red';
const CELL_BOMB_WATER = 'black';

var size = 5;

initGame();   // initialise le jeu pour une taille de 10

/**
 * Initialise le jeu (effectue toutes les opérations nécessaires au démarrage du jeu
 * @param {type} board : type de tableau, peut prendre les valeurs ['me','other'], sert à identifier le <div> container
 */
function initGame() {
    insertBoard(size, 'other');
    insertBoard(size, 'me');
    initCellsOnClick();
}

/**
 * crée le tableau dans un div
 * @param {integer} size : nombre de cellules par ligne et par colonne
 * @param {type} board : type de tableau, peut prendre les valeurs ['me','other'], sert à identifier le <div> container
 * @returns {boolean} : true si l'opération est un succès, false ...
 */
function insertBoard(size, board) {
    var boardElement = document.getElementById(board);
    if (boardElement) {      // si boardElement n'est pas trouvé, document.getElementById retourne 'null'
        boardElement.innerHTML = createBoard(size, board);
        return true;
    } else {
        return false;
    }
}

/**
 * crée le HTML d'un tableau
 * @param {integer} size : nombre de cellules par ligne et par colonne
 * @param {string} board : type de tableau, peut prendre les valeurs ['me','other'], sert à identifier le <div> container
 * @returns {String} HTML représentant le tableau
 */
function createBoard(size, board) {
    var boardHtml = "";
    for (var x = 0; x < size; x++) {
        boardHtml += createBoardLine(x, size, board);
    }
    return boardHtml;
}

/**
 * crée le HTML d'une ligne du tableau
 * @param {integer} x : position x (ligne) de la ligne
 * @param {integer} size : nombre de cellules dans la ligne
 * @param {string} board : type de tableau, peut prendre les valeurs ['me','other'], sert à identifier le <div> container
 * @returns {String} HTML représentant une ligne du tableau
 */
function createBoardLine(x, size, board) {
    var boardLineHtml = "<div>";
    for (var y = 0; y < size; y++) {
        boardLineHtml += createCell(x, y, board);
    }
    boardLineHtml += "</div>";
    return boardLineHtml;
}

/**
 * crée l' HTML d'une cellule
 * @param {integer} x : position x (ligne) de la cellule
 * @param {integer} y : position y (colonne) de la cellule
 * @param {string} board : type de tableau, peut prendre les valeurs ['me','other'], sert à identifier le <div> container
 * @returns {String} HTML représentant une cellule
 */
function createCell(x, y, board) {
    return "<div class='cell' data-x=" + x + " data-y=" + y + " data-boat=false data-board='" + board + "'></div>";
}

/**
 * initialise les actions à exécuter lorsqu'on clique sur les cellules
 * @returns {integer} la longueur de la liste des cellules
 */
function initCellsOnClick() {
    var cellList = document.getElementsByClassName('cell');    // sélectionne toutes les cellules de la class "cell"
    for (var i = 0; i < cellList.length; i++) {                  // pour chaque cellule de la liste cellList
        cellList[i].addEventListener('click', clickCell);   // ajoute le event lister 'clickCell' à l'événement 'click'
        // => si on clique sur la cellule, le code de la function 'clickCell' sera exécuté
    }
    return cellList.length;
}

/**
 * exécute du code lorsqu'on clique sur une cellule
 * @param {type} ev : événement (standard Javascript, voir par exemple https://developer.mozilla.org/fr/docs/Web/API/Event)
 * @returns {nothing} : pas de valeur de retour
 */
function clickCell(ev) {
    var cellElement = ev.target;
    logCell(cellElement);
    switch (state) {
        case GAME_STATE_CONFIGURING:
            if (getBoard(cellElement) === "me") {    // si clique dans 'me'
                createBoat(cellElement);            // crée un bateau
            } else {                                // si clique dans 'other'
                state = GAME_STATE_PLAYING;         // change l'état du jeu
                createOtherBoats();                 // crée les bateaux dans 'other'
                fire(cellElement);                  // tire sur la cellule
            }
            break;
        case GAME_STATE_PLAYING:
            fire(cellElement);
            otherFire();
            if (isDone() !== null)
                state = GAME_STATE_DONE;
            break;
        case GAME_STATE_DONE:
            break;
        default:
            console.log("ERROR, état inattendu: " + state)
    }
}

/**
 * affiche les attributs custom d'une cellule dans la console
 * @param {type} cellElement : référence sur une cellule
 * @returns {nothing} 
 */
function logCell(cellElement) {
    console.log(getX(cellElement),
            getY(cellElement),
            isBoat(cellElement),
            getBoard(cellElement));
}

function getCellElement(x, y, board) {
    return document.querySelector('[data-x="' + x + '"][data-y="' + y + '"][data-board=' + board + ']');
}

function getX(cellElement) {
    return cellElement.getAttribute("data-x");
}

function getY(cellElement) {
    return cellElement.getAttribute("data-y");
}

function isBoat(cellElement) {
    return cellElement.getAttribute("data-boat") === "true";
}

function getBoard(cellElement) {
    return cellElement.getAttribute("data-board");
}

function createBoat(cellElement) {
    cellElement.setAttribute('data-boat', true);
    var board = getBoard(cellElement);
    if (board === 'me') {
        cellElement.style.backgroundColor = CELL_BOAT_ME_HEALTHY;
    } else {
        cellElement.style.backgroundColor = CELL_BOAT_OTHER_HEALTHY;
    }
    return cellElement;     // bonne pratique
}

/**
 * tire sur une cellule
 * @param {type} cellElement
 * @returns {undefined}
 */
function fire(cellElement) {
    if (isBoat(cellElement)) {  // s'il y a un bateau sur la cellule
        cellElement.style.backgroundColor = CELL_BOAT_SUNK; // il est coulé
    } else {                    // s'il n'y a pas de bateau
        cellElement.style.backgroundColor = CELL_BOMB_WATER;    // à l'eau
    }
}

/**
 * crée les bateaux dans la tableau 'other'
 * par copie du tableau 'me'
 * @returns {undefined}
 */
function createOtherBoats() {
    var meBoatList = document.querySelectorAll('[data-boat=true]');     // sélectionne tous les bateaux de 'me'
    for (var i = 0; i < meBoatList.length; i++) {    // boucle sur tous les bateaux
        var meBoat = meBoatList[i];     // référence sur la cellule du bateau de me
        var x = getX(meBoat);           // position X du bateau de me
        var y = getY(meBoat);           // position Y du bateau de me
        var otherBoat = getCellElement(x, y, 'other');  // référence sur la cellule correspondante de other
        createBoat(otherBoat);          // création du bateau dans other
    }
}

/**
 * 
 * @returns {success} null : pas de gagant, me : moi, other : le PC
 */
function isDone() {
    if (isAllBoatsSunk('other'))
        return 'me';    // retourne 'me' si tous les bateaux de other sont coulés
    if (isAllBoatsSunk('me'))
        return 'other';    // retourne 'other' si tous les bateaux me sont coulés
    return null;    // personne n'a gagné
}

function isAllBoatsSunk(board) {
    var otherShips = document.querySelectorAll('[data-boat=true][data-board=' + board + ']');   // sélectionne tous les bateaux de other
    for (var i = 0; i < otherShips.length; i++) {      // boucle sur tous les bateaux de other
        if (!isBoatSunk(otherShips[i]))
            return false;  // chaque bateau doit avoir la couleur rouge
    }
    return true;
}

function isBoatSunk(cellElement) {
    return cellElement.style.backgroundColor === CELL_BOAT_SUNK;     // le bateau est coulé si cellule est rouge
}


function otherFire() {
    var x = Math.floor(Math.random() * size);
    var y = Math.floor(Math.random() * size);
    var cell = getCellElement(x, y, 'me');
    fire(cell);
}