/**
 * Javascript pour gérer le jeu
 * actuellement, c'est seulement le squelette du jeu
 *  Il crée le jeu et écrit dans la console lorsqu'on clique sur une cellule
 * J'ai écrit le code dans l'ordre des appels
 * J'ai écrit une fonction par tâche, c'est une bonne pratique car cela rend le code plus testable et maintenable
 */

/**
 * pseudo enum pour l'état du jeu
 * @type Number
 */
const CONFIGURING = 'CONFIGURING';
const PLAYING = 'PLAYING';
const DONE = 'DONE';

/**
 * pseudo enum pour l'état du bâteau
 * @type Number
 */
const HEALTHY = 'HEALTHY';
const TOUCH = 'TOUCH';
const SUNK = 'SUNK';

const COLOR_HEALTHY_ME = 'white';
const COLOR_HEALTHY_OTHER = 'white';
const COLOR_TOUCH = 'orange';
const COLOR_SUNK = 'red';
const COLOR_FIRE_IN_WATER = 'yellow';
const COLOR_WATER = 'blue';
const COLOR_UNKNOWN = 'blue';

/**
 * state of the game
 * @type pseudo-enum : [CONFIGURING | PLAYING | DONE]
 */
var gameState = "";
function setGameState(state) {
    gameState = state;
    document.getElementById('state').innerHTML = state;
}

/*
 * List of ships
 * @type Array
 */
var meShips = [];
var otherShips = [];

/**
 * Factory to build a ship object
 * @param {type} x : x position of the head of the ship
 * @param {type} y : y position of the head of the ship
 * @param {type} len : length of the ship
 * @param {type} dir : direction of the ship = ['LEFT'|'RIGTH']
 * @returns {ShipFactory.boardAnonym$0}
 */
function ShipFactory(x, y, len, dir) {
    return {
        x: x,
        y: y,
        len: len,
        dir: dir,
        state: HEALTHY
    };
}

var size = 2;
initGame(size);   // initialise le jeu pour une taille de 10

/**
 * Initialise le jeu (effectue toutes les opérations nécessaires au démarrage du jeu
 * @param {integer} size : nombre de cellules par ligne et par colonne
 */
function initGame(size) {
    insertBoard(size, 'other');
    insertBoard(size, 'me');
    initCellsOnClick();
    setGameState(CONFIGURING);
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
    return "<div class='cell' data-x=" + x + " data-y=" + y + " data-boat=0 data-board='" + board + "'></div>";
}

/**
 * initialise les actions à exécuter lorsqu'on clique sur les cellules
 * @returns {integer} la longueur de la liste des cellules
 */
function initCellsOnClick() {
    var cellList = document.querySelectorAll('[data-x]');    // sélectionne toutes les cellules ayant un attribut "data-x"
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
    showCell(ev.target);
    var isMeBoard = getCellAttributes(ev.target).board === 'me';
    switch (gameState) {
        case CONFIGURING:
            if(isMeBoard) {
                createShip(ev.target);
            } else {
                startPlaying(ev.target);
                fire(ev.target);
                pcFire('me');
            }
            break;
        case PLAYING:
            if(!isMeBoard) {
                fire(ev.target);
                pcFire('me');
            }
            break;
        case DONE:
            break;
        default:
            console.error("Error - unknown state " + gameState + "\n force PLAYING");
            gameState = PLAYING;
            clickCell(ev);
    }
}

/**
 * affiche les attributs custom d'une cellule dans la console
 * @param {type} cellElement : référence sur une cellule
 * @returns {nothing} 
 */
function showCell(cellElement) {
    console.log(cellElement.getAttribute("data-x"),
            cellElement.getAttribute("data-y"),
            cellElement.getAttribute("data-boat"),
            cellElement.getAttribute("data-board"));
}

/**
 * retourne un objet contenant tous les attributs de la cellules
 * @param {type} cellElement
 * @returns {getCellAttributes.boardAnonym$1}
 */
function getCellAttributes(cellElement) {
    return {
        x: Number(cellElement.getAttribute('data-x')),
        y: Number(cellElement.getAttribute('data-y')),
        boat: Number(cellElement.getAttribute('data-boat')),
        board: cellElement.getAttribute('data-board'),
        shipId: Number(cellElement.getAttribute('data-ship-id'))
    };
}

/**
 * create a ship from a cellElement
 * @param {type} cellElement (a div with attributes for the game)
 * @returns {undefined}
 */
function createShip(cellElement) {
    var cellAttributes = getCellAttributes(cellElement);
    if (cellAttributes.board === 'other') {
        return; // nothing to do
    }
    if (cellAttributes.boat) {
        return; // there is already a boat => nothing to do
    }
    var ship = ShipFactory(cellAttributes.x, cellAttributes.y, 1, 0);
    var shipId = meShips.push(ship) - 1;
    setShipOnCell(cellElement, shipId, cellAttributes.board);
}

/**
 * démarre le jeu
 * @returns {undefined}
 */
function startPlaying() {
    setGameState(PLAYING);
    var config = getShipConfiguration(meShips);
    generateRandomShips('other', config);
    setShipsFromList('other');
}

/**
 * retourne la configuration des bâteaux (un object comme {1: 3, 2:1} (3 bâteau de 1 et 1 bâteau de 2)
 * @param {type} shipList
 * @returns la liste des configuration de bâteaux
 */
function getShipConfiguration(shipList) {
    var shipConfig = Array(size+1).fill(0); // initialise à size+1 élément = 0
    shipList.forEach(ship => {
        shipConfig[ship.len]++;
    });
    return shipConfig;
}

/**
 * crée une série de bâteau sur base d'une configuration de bâteaux
 * @param {string} board : détermine le board (me ou other)
 * @param {ShiConfig} shipConfig
 * @returns {boolean} success or not
 */
function generateRandomShips(board, shipConfig) {
    var ships = (board === 'me') ? meShips : otherShips;
    shipConfig.forEach(cfg => {
        for (var i = 0; i < cfg; i++) {
            addRandomShip(ships);
        }
    });
    return true;
}

/**
 * Ajoute un bâteau au hazard dans la liste de bâteau
 * @param {Array<Ship>} ships
 * @returns {}
 */
function addRandomShip(ships) {
    var ship = null;    // le bâteau n'est pas encore fabriqué
    do {
        var pos = generateRandomXY(size);
        var found = findShip(ships, pos.x, pos.y);
        if(! found) {    // bâteau non trouvé => position disponible
            ship = ShipFactory(pos.x, pos.y, 1, 0);
            ships.push(ship);
        }
    } while(! ship);
}

/**
 * recherche un ship à la position (x, y)
 * @param {Array<Ship>} ships : liste de bâteau
 * @param {integer} x : position x
 * @param {integer} y : position y
 * @returns {Ship} le ship trouvé ou null
 */
function findShip(ships, x, y) {
    for(var i=0; i<ships.length; i++) {
        if(ships[i].x === x && ships[i].y === y) {
            return ships[i];
        }
    }
    return null;
}

/**
 * modifie les cellules pour indiquer qu'elles sont des bâteaux
 * @param {string} board : (me ou other)
 * @returns {undefined}
 */
function setShipsFromList(board) {
    resetBoard(board);
    var ships = (board === 'me') ? meShips : otherShips;
    for(var i=0; i<ships.length; i++) {
        setShipOnBoard(board, ships[i], i);
    }
}

/**
 * reset a board : erase all boats
 * @param {[me | other]} board
 * @returns {NodeList} list of nodes of the board
 */
function resetBoard(board) {
    var cellList = document.querySelectorAll('[data-board=' + board + ']');
    cellList.forEach(cell => {
        cell.setAttribute('data-boat', 0);
    });
    return cellList;
}

/**
 * Ajoute un bateau à la cellule
 * @param {[me | other]} board
 * @param {object Ship} ship : a ship object
 * @param {integer} shipId : index of the ship
 * @returns {Boolean}
 */
function setShipOnBoard(board, ship, shipId) {
    var cellElement = getCellElement(board, ship.x, ship.y);
    if (cellElement === null) {
        return false;
    } else {
        if(getCellAttributes(cellElement).boat) {
            return false;
        } else {
            setShipOnCell(cellElement, shipId);
            return true;
        }
    }
}


function setShipOnCell(cellElement, shipId, board) {
    board = board || getCellAttributes(cellElement).board;
    cellElement.setAttribute('data-boat', 1);
    cellElement.setAttribute('data-shipId', shipId);
    cellElement.style.backgroundColor = (board === 'me') ? COLOR_HEALTHY_ME : COLOR_HEALTHY_OTHER;
}

/**
 * génère les coordonnées x, y au hazard
 * @param {integer} size
 * @returns coordonnée
 */
function generateRandomXY(size) {
    return {
        x: Math.floor(Math.random() * size),
        y: Math.floor(Math.random() * size)
    };
}

/**
 * retourne une référence de la cellule
 * @param {string} board (me ou other)
 * @param {integer} x : position x
 * @param {integer} y : positoin y
 * @returns {Element} l'élément correspondant ou null (si non trouvé)
 */
function getCellElement(board, x, y) {
    return document.querySelector(
            getAttributeFilter('data-board', board) +
            getAttributeFilter('data-x', x) +
            getAttributeFilter('data-y', y));
}
;

/**
 * retourne le filtre sur une propriété et sa valeur (fonction utilitaire)
 * @param {string} property : nom de la propriété
 * @param {string} value : valeur de la propriété
 * @returns {String} le filtre
 */
function getAttributeFilter(property, value) {
    return '[' + property + '="' + value + '"]';
}

/**
 * tire sur une cellule
 * @param {Node} cellElement
 * @returns {Node} cellElement
 */
function fire(cellElement) {
    var cellAttributes = getCellAttributes(cellElement);
    if(!cellAttributes.boat) {
        cellElement.style.backgroundColor = COLOR_FIRE_IN_WATER;
    } else {
        var ships = (cellAttributes.board === 'me') ? meShips : otherShips;
        var ship = ships[cellAttributes.shipId];
        ship.state = SUNK;
        cellElement.style.backgroundColor = COLOR_SUNK;
        if(ship.state === SUNK) {
            if(areAllShipsSunk(cellAttributes.board)) {
                onGameDone(cellAttributes.board);
            }
        }
    }
    return cellElement;
}

function areAllShipsSunk(board) {
    var ships = (board === 'me') ? meShips : otherShips;
    var sunks = true;
    ships.forEach(ship => {
        sunks = sunks && (ship.state === SUNK);
    });
    return sunks;
}

function onGameDone(failedBoard) {
    setGameState(DONE);
    var result = (failedBoard === 'me') ? "OTHER" : "ME" + " WON";
    document.getElementById('result').innerHTML = result;
}

/**
 * le PC tire sur une cellule (normalement du board 'me')
 * @param {type} board
 * @returns {undefined}
 */
function pcFire(board) {
    var pos = generateRandomXY(size);
    var cellElement = getCellElement(board, pos.x, pos.y);
    fire(cellElement);
    }