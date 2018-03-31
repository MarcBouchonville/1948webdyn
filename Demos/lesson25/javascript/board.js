/**
 * Javascript pour gérer le jeu
 * actuellement, c'est seulement le squelette du jeu
 *  Il crée le jeu et écrit dans la console lorsqu'on clique sur une cellule
 * J'ai écrit le code dans l'ordre des appels
 * J'ai écrit une fonction par tâche, c'est une bonne pratique car cela rend le code plus testable et maintenable
 */

initGame(10);   // initialise le jeu pour une taille de 10

/**
 * Initialise le jeu (effectue toutes les opérations nécessaires au démarrage du jeu
 * @param {integer} size : nombre de cellules par ligne et par colonne
 * @param {type} board : type de tableau, peut prendre les valeurs ['me','other'], sert à identifier le <div> container
 */
function initGame(size) {
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
    if(boardElement) {      // si boardElement n'est pas trouvé, document.getElementById retourne 'null'
        boardElement.innerHTML = createBoard(size, board)
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
    for(var x=0; x<size; x++) {
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
    for(var y=0; y<size; y++) {
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
    var cellList = document.querySelectorAll('[data-x]');    // sélectionne toutes les cellules ayant un attribut "data-x"
    for(var i=0; i<cellList.length; i++) {                  // pour chaque cellule de la liste cellList
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

